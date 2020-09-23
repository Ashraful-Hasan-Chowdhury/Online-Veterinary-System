<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function days(){
        return $this->belongsToMany('App\Day','day_doctors')->withTimeStamps();
    }
    public function times(){
        return $this->belongsToMany('App\Time','time_doctors')->withTimeStamps();
    }
    public function appoinments(){
        return $this->belongsToMany('App\Appoinment','appoinment_doctors')->withTimeStamps();
    }
    public function doctoradmins(){
        return $this->belongsToMany('App\Doctoradmin','doctoradmin_doctors')->withTimeStamps();
    }
}
