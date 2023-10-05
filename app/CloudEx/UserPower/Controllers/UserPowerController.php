<?php

namespace App\CloudEx\UserPower\Controllers;

use App\CloudEx\UserPower\Models\UserPower;
use App\CloudEx\UserPower\Repositories\UserPowerRepository;
use App\CloudEx\Wallet\Models\Wallet;
use App\CloudEx\Wallet\Repositories\WalletRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPowerController extends Controller
{
    private UserPowerRepository $repository;

    public function __construct(UserPowerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $power = $this->repository->index();
        return view('front.dashboard.dashboard', compact('power'));
    }

    public function find(WalletRepository $walletRepository)
    {
        $power = $this->repository->find();
        $wallet = $walletRepository->find();
        return view('.front.dashboard.dashboard')->with([
            'power' => $power,
            'wallet' => $wallet,
        ]);
    }

    public function updateInvestedPower(Request $request)
    {
        $id = $request->input('id_up');
        $wallet = Wallet::find($id);
        $user = UserPower::find($wallet->user_id);
        if ($wallet) {
            if ($user->unused_power != 0) {
                $wallet->invested_power += 1;
                $user->unused_power -= 1;
                $user->save();
                $wallet->save();
            }
            // Отправьте ответ
            return response()->json(['invested_power' => $wallet->invested_power]);
        }

        return response()->json(['success' => false]);
    }

    public function decrementInvestedPower(Request $request)
    {
        $id = $request->input('id_down');

        $wallet = Wallet::find($id);
        $user = UserPower::find($wallet->user_id);
        if ($wallet) {
            $wallet->invested_power -= 1;
            $user->unused_power += 1;
            $user->save();
            $wallet->save();
            return response()->json(['invested_power' => $wallet->invested_power]);
        }

        return response()->json(['success' => false]);
    }

    public function all(Request $request)
    {
        $id = $request->input('id_all');

        $wallet = Wallet::find($id);
        $user = UserPower::find($wallet->user_id);
        if ($wallet) {

            $wallet->invested_power = $user->unused_power;
            $wallet->save();
            $user->unused_power = 0;
            $user->save();

            // Отправьте ответ
            return response()->json(['invested_power' => $wallet->invested_power]);
        }

        return response()->json(['success' => false]);
    }

    public function updateAmount(Request $request)
    {
        $id = auth()->id();
        $wallet = Wallet::where(['user_id' => $id, 'id' => $request->id])->first();
        try {
            $wallet->update([
                'currency' => $request->currency,
                'amount' => $request->amount
            ]);
            return response()->json(['message' => 'Amount updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
