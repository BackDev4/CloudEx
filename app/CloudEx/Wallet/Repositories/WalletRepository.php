<?php

namespace App\CloudEx\Wallet\Repositories;

use App\CloudEx\Wallet\Interfaces\WalletInterface;
use App\CloudEx\Wallet\Models\Wallet;

class WalletRepository implements WalletInterface
{

    public function find()
    {
        $id = auth()->id();
        return Wallet::where(['user_id' => $id])->get();
    }

    public function update($id)
    {
        $wallet = Wallet::find($id);
        $wallet->update();
    }
}
