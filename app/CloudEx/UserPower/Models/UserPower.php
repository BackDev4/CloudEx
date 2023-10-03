<?php

namespace App\CloudEx\UserPower\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/*
 * @property-read int $id
 * @property string $total_power
 * @property string $unused_power
 * @property string $active_plan
 * @property int $user_id
 */

class UserPower extends Model
{
    protected $fillable = [
        'total_power',
        'unused_power',
        'active_plan',
        'user_id',
    ];


    public function user()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
