<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // public $timestamps = false; //use this if your table doesnt have any timestamp

    function artist(){
    	return $this->belongsTo('App\Artist');
    }

    function songs(){
    	return $this->hasMany('App\Song');
    }
}
