<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    public function days(){
        return $this->belongsToMany('App\Day','appoinment_days')->withTimeStamps();
    }
    public function times(){
        return $this->belongsToMany('App\Time','appoinment_times')->withTimeStamps();
    }
    public function doctors(){
        return $this->belongsToMany('App\Doctor','appoinment_doctors')->withTimeStamps();
    }
    public function users(){
        return $this->belongsToMany('App\User','appoinment_users')->withTimeStamps();
    }
}
