<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use Session;

class ArtistController extends Controller
{
	function artist() {
		$artists = Artist::all();
		return view('artists.artists', compact('artists'));	
	}


	function create(Request $request){
		$artist = new Artist;
		$artist->name = $request->artistname;
		$artist->image_path = 'img/noimage.png'; //If data has no image file, this would be the default image
		$artist->save();

		//if data has image file
		if ($request->hasFile('imageartists')) {
			$extension = $request->imageartists->getClientOriginalExtension();
			$request->imageartists->move('imgs/', "$artist->name.$extension");
			$artist->image_path = "imgs/$artist->name.$extension";
			$artist->save();
		}

		// Session::flash('success_msg', 'Artist Added!');

		// return redirect('/artists' . '#artists');
	}

	function edit($id){
		$artist = Artist::find($id);
		// dd($artist);
		return view('artists.edit_artist', compact('artist'));
	}

	function save(Request $request, $id){
		$artist = Artist::find($id);
		$artist->name = $request->editartistname;

		if ($request->hasFile('editartistimage')) {
			$extension = $request->editartistimage->getClientOriginalExtension();
			$request->editartistimage->move('imgs/', "$artist->name.$extension");
			$artist->image_path = "imgs/$artist->name.$extension";
		}

		$artist->save();
		return redirect('/artists' . '#artist');
	}

	function delete($id){
		$artist = Artist::find($id);
		$artist->delete();

		return redirect('/artists' . '#artist');

	}
	

}
