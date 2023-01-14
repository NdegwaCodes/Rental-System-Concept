<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvisorPost extends Model
{
    public function advisor()
    {
        return $this->belongsTo(RegisterAdvisor::class,'advisor_id_fk','id');
    }
}
