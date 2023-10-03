<?php

namespace App\CloudEx\Deposit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


/*
 * @property-read int $id
 * @property string $amount
 * @property string $currency
 * @property string $type
 * @property longText $hash
 * @property int $user_id
 */

class Deposits extends Model
{
    protected $fillable = [
        'amount',
        'currency',
        'type',
        'hash',
        'user_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
