<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tenetrelation() {
        return $this->hasOne(RegisterTenet::class,'user_id_fk','id');
    }
    public function adminrelation() {
        return $this->hasOne(RegisterAdmin::class,'user_id_fk','id');
    }
    public function advisorrelation() {
        return $this->hasOne(RegisterAdvisor::class,'user_id_fk','id');
    }

    
    public function user_1_conversation()
    {
        return $this->hasMany(Conversation::class,'user_1');
    }

    public function user_2_conversation()
    {
        return $this->hasMany(Conversation::class,'user_2');
    }
}
