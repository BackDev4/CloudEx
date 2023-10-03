<?php

namespace App\CloudEx\Referrals\Models;

/*
 * @property-read int $id
 * @property int $user_id
 * @property int $referral_id
 * @property int $level
 */

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
{
    protected $fillable = [
        'user_id',
        'referral_id',
        'level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function referral()
    {
        return $this->belongsTo(User::class,'referral_id');
    }
}
