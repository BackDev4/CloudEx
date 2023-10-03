<?php

namespace App\CloudEx\Wallet\Models;

use Illuminate\Database\Eloquent\Model;

/*
 * @property-read int $id
 * @property string $currency
 * @property string $invested_power
 */

class Wallet extends Model
{
    protected $fillable = [
        'currency',
        'amount',
        'invested_power',
        'user_id',
    ];
}
