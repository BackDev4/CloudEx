<?php

namespace App\Http\Controllers\Auth;

use App\CloudEx\Referrals\Models\Referrals;
use App\CloudEx\UserPower\Models\UserPower;
use App\CloudEx\Wallet\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($referral_link = null): View
    {
        return view('front.home', compact('referral_link'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'referral_link' => 'ref/' . Str::random(10),
            'referral_user' => 'ref/' . $request->referral_user,
        ]);

        function getReferralLevel($referralId, $level = 0)
        {
            $referral = Referrals::where('user_id', $referralId)->first();

            if ($referral) {
                $referralLevel = $referral->level;
                $referralId = $referral->referral_id;

                if ($referralId) {
                    $level = getReferralLevel($referralId, $level + 1);
                }
            }
            return $level;
        }

        if ($request->referral_user != null) {
            $referrer = User::where(['referral_link' => 'ref/' . $request->referral_user])->first();
            $referral = Referrals::create([
                'referral_id' => $referrer->id,
                'user_id' => $user->id,
                'level' => getReferralLevel($referrer->id) + 1,
            ]);
        }
        $currencyCodes = ['BTC', 'ETH', 'BNB', 'LTC', 'TRX', 'DOGE'];

        $wallets = collect($currencyCodes)->map(function ($currencyCode) use ($user) {
            return Wallet::create([
                'user_id' => $user->id,
                'amount' => 0,
                'invested_power' => 0,
                'currency' => $currencyCode,
            ]);
        });

        $user_power = UserPower::create([
            'total_power' => 180,
            'unused_power' => 180,
            'active_plan' => 2,
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
