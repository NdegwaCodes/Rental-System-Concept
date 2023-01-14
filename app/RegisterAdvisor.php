<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterAdvisor extends Model
{
    public function jazzid() {
        return $this->hasOne(JazzId::class,'advisor_id_fk','id');
    }
    public function post() {
        return $this->hasMany(AdvisorPost::class,'advisor_id_fk','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id_fk','id');
    }
}
