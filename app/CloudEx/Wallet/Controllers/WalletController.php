<?php

namespace App\CloudEx\Wallet\Controllers;

use App\CloudEx\Wallet\Repositories\WalletRepository;

class WalletController
{

    private WalletRepository $repository;

    public function __construct(WalletRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find()
    {
        $wallet = $this->repository->find();
        return view('front.dashboard.dashboard', compact('wallet'));
    }
}
