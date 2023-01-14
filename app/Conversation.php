<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function message()
    {
        return $this->hasMany(Message::class,'conversation_id');
    }


    public function user_1_reference()
    {
        return $this->belongsTo(User::class,'user_1');
    }


    public function user_2_reference()
    {
        return $this->belongsTo(User::class,'user_2');
    }
}
