<?php

namespace App\CloudEx\Bonuses\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/*
 * @property-read int $id
 * @property string $bonus
 * @property int $user_id
 */
class Bonuses extends Model
{

    protected $fillable = [
        'bonus',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class,'user_id');
    }

}
