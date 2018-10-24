<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Album;
use App\Song;
use Session;

class SongController extends Controller
{
	function song(){
		$albums = Album::all();
		$songs = Song::all();
		$artists = Artist::all();
		return view('songs.songs', compact('albums', 'songs', 'artists'));
	}

	function create(Request $request){
		$song = new Song;
		$song->title = $request->songname;
		$song->length = $request->songlength;
		$song->album_id = $request->albumid;
		$song->image_path = 'img/noimage.png';
		$song->save();

		//if data has image file
		if ($request->hasFile('imagesongs')) {
			$extension = $request->imagesongs->getClientOriginalExtension();
			$request->imagesongs->move('imgs/', "$song->title.$extension");
			$song->image_path = "imgs/$song->title.$extension";
			$song->save();

		}

		Session::flash('success_msg', 'Song Added!');

		return redirect('/songs');

	}

}
