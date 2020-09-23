<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function cures(){
        return $this->belongsToMany('App\Cure','cure_animals')->withTimeStamps();
    }
}
