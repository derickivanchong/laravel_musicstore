<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Album;
use Session;

class AlbumController extends Controller
{

    //Retrive by albums.blade.php(for foreach)
    function album(){
    	$artists = Artist::all();
    	$albums = Album::all();
    	return view('albums.albums', compact('artists', 'albums'));
    }

    function create(Request $request){
    	$album = new Album;
    	$album->album_name = $request->albumname;
    	$album->year = $request->year;
    	$album->genre = $request->genre;
    	$album->artist_id = $request->artistid;
        $album->image_path = 'img/noimage.png';
    	$album->save();

        //if data has image file
        if ($request->hasFile('imagealbums')) {
            $extension = $request->imagealbums->getClientOriginalExtension();
            $request->imagealbums->move('imgs/', "$album->album_name.$extension");
            $album->image_path = "imgs/$album->album_name.$extension";
            $album->save();
        }

        Session::flash('success_msg', 'Album Added!');
                    //session name,   session data/value

    	return redirect('/albums');
    }
}
