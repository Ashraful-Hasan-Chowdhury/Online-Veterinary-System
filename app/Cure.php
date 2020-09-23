<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cure extends Model
{
    public function animals(){
        return $this->belongsToMany('App\Animal','cure_animals')->withTimeStamps();
    }
    public function diseases(){
        return $this->belongsToMany('App\Diseas','cure_diseas')->withTimeStamps();
    }
}
