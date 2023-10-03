<?php

namespace App\CloudEx\Wallet\Interfaces;

interface WalletInterface
{
    public function find();
    public function update(int $id);
}
