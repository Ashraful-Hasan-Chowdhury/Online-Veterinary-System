<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function doctors(){
        return $this->belongsToMany('App\Doctor','time_doctors')->withTimeStamps();
    }
    public function appoinments(){
        return $this->belongsToMany('App\Appoinment','appoinment_times')->withTimeStamps();
    }
}
