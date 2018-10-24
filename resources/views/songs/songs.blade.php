@extends('template')

@section('title', 'Album')

{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="/">Music Store</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/artists">Artist</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/albums">Albums <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="/songs">Songs</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/songs">Playlist</a>
			</li>
		</ul>			
	</div>
</nav> --}}


<div class="container">
	<div class="row">
		<div class="col-lg-12">

			<h1>This is the Song Page</h1>

			{{ Session::get('success_msg') }}
			
			<form action="/songs/create" method="POST" enctype="multipart/form-data">

				@csrf

				<label>Song Title: </label>
				<input type="text" name="songname" class="form-control">

				<label>Length: </label>
				<input type="text" name="songlength" class="form-control">				

				<label>Album Name: </label>
				<select class="custom-select" name="albumid">

					<option>Choose an Album</option>

					@foreach($albums as $album)

					<option value="{{ $album->id }}">{{ $album->album_name }}</option>

					@endforeach

				</select>

				<label>Song Image:</label>
					<input type="file" name="imagesongs" class="form-control">

				<div style="display: flex; margin-top: 10px;">
					<button type="submit" class="btn btn-primary">Add</button>
					<form class="pl-1" method="" action="" style="margin-bottom: 0;">
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</div>
			</form>

			<div class="row mt-3">
				@foreach($songs as $song)
				<div class="col-lg-3 mb-3">
					<div class="card" style="">
						<img class="card-img-top" src="{{ $song->image_path }}" alt="Card image cap">
						<div class="card-body">

							<h5 class="card-title">Song Title: {{ $song->title }}</h5>

							<h5 class="card-title">Length: {{ $song->length }}</h5>

							{{-- @foreach($artists as $artist)
							@if($artist->id == $album->artist_id)
							<h5 class="card-title">Artist: {{ $artist->name }}</h5>
							@endif
							@endforeach --}}


							<h5 class="card-title">Artist: {{ $song->album->artist->name }} </h5>

							{{-- {{ $song->album->artist->id }} --}}

							{{-- @foreach($albums as $album)
							@if($album->id == $song->album_id)
							<h5 class="card-title">Album Name: {{ $album->album_name }}</h5>
							@endif
							@endforeach --}}

							<h5 class="card-title">Album Name: {{ $song->album->album_name }}</h5>
							
							{{-- {{ $song->album->id }} --}}

							<p class="card-text">With a voice that's both warm and powerful, Lea Salonga is a Tony Award-winning singer and actress known for a lengthy stage résumé that includes originating the role of Kim in Miss Saigon.</p>	
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</div>
</div>


{{-- @endsection --}}