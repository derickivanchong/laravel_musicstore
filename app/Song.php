<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    function album(){
    	return $this->belongsTo('App\Album');
    }

    function playlists(){
    	return $this->belongsToMany('App\Playlist', 'playlist_songs')->withTimestamp();
    }
}
