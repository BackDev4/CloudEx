<?php

namespace App\CloudEx\UserPower\Repositories;

use App\CloudEx\UserPower\Interfaces\UserPowerInterface;
use App\CloudEx\UserPower\Models\UserPower;
use Illuminate\Support\Facades\Auth;

class UserPowerRepository implements UserPowerInterface
{

    public function index()
    {
        return UserPower::all();
    }

    public function find()
    {
        $id = auth()->id();
        return UserPower::where(['user_id' => $id])->first();
    }
}
