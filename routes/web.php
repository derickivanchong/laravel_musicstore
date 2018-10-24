<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Artists
Route::get('/artists', 'ArtistController@artist');
Route::post('/artists/create', 'ArtistController@create');
Route::get('/artists/edit/{id}', 'ArtistController@edit');
Route::patch('/artists/edit/{id}', 'ArtistController@save');
Route::delete('/artists/delete/{id}', 'ArtistController@delete');



// Albums
Route::get('/albums', 'AlbumController@album');
ROute::post('/albums/create', 'AlbumController@create');



//Songs
Route::get('/songs', 'SongController@song');
ROute::post('/songs/create', 'SongController@create');

//Playlist
Route::get('/playlist', 'PlaylistController@playlist');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
