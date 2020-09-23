<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function appoinments(){
        return $this->belongsToMany('App\Appoinment','appoinment_days')->withTimeStamps();
    }

    public function doctors(){
        return $this->belongsToMany('App\Doctor','day_doctors')->withTimeStamps();
    }
}
