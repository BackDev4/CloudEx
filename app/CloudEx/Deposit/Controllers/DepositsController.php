<?php

namespace App\CloudEx\Deposit\Controllers;

use App\CloudEx\Deposit\Models\Deposits;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CloudEx\paykassa\src\PaykassaAPI;
use App\CloudEx\paykassa\src\PaykassaSCI;
use App\CloudEx\paykassa\src\PaykassaCurrency;

class DepositsController extends Controller
{

    public function all()
    {
        $deposits = Deposits::where(['user_id' => auth()->id()])->get();
        return view('front.dashboard.deposit')->with([
            'deposits' => $deposits,
        ]);
    }

    public function payment(Request $request)
    {

        $secret_keys_and_config = [
            "merchant_id" => "23983",
            "merchant_password" => "miJ9kVFiRnsoQjXGKCvjYnMFmmO9NJC0",
            "api_id" => "API ID",
            "api_password" => "API Password",
            "config" => [
                "test_mode" => true,
            ],
        ];

        $paykassa = new PayKassaSCI(
            $paykassa_shop_id = $secret_keys_and_config['merchant_id'],
            $paykassa_shop_password  =  $secret_keys_and_config['merchant_password'],
        );

        $payment =  $paykassa->createOrder($request->amount, 'BitCoin', 'BTC',1);
        if ($payment['error'] !== true) {
            Deposits::create([
                'amount' => $request->amount,
                'currency' => 'BTC',
                'type' => $request->type,
                'hash' => $payment['data']['params']['hash'],
                'user_id' => auth()->id(),
            ]);
        }
        return redirect($payment['data']['url']);
    }
}
