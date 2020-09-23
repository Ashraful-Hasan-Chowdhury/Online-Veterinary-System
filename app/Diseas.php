<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseas extends Model
{
    public function cures(){
        return $this->belongsToMany('App\Cure','cure_diseas')->withTimeStamps();
    }
}
