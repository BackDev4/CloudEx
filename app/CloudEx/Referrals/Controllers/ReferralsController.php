<?php

namespace App\CloudEx\Referrals\Controllers;

use App\CloudEx\Referrals\Models\Referrals;
use App\Http\Controllers\Controller;
use App\Models\User;

class ReferralsController extends Controller
{

    public function index()
    {
        $ref = Referrals::all();
        return view('front.dashboard.referrals')->with([
            'referrals' => $ref,
        ]);
    }

    public function find()
    {
        $referral =  Referrals::where('referral_id', auth()->id())->get();
        $referralLink = User::find(auth()->id())->referral_link;
        return view('front.dashboard.referrals')->with([
            'referrals' => $referral,
            'referralLink' => $referralLink,
        ]);
    }

}
