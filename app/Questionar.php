<?php

namespace QA;

use Illuminate\Database\Eloquent\Model;

class Questionar extends Model
{
    //
    protected $guarded = [];

    function questions(){
        return $this->hasMany(Question::class);
    }




}
