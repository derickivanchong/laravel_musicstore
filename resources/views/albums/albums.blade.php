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
			<li class="nav-item active">
				<a class="nav-link" href="/albums">Albums <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/songs">Songs</a>
			</li>
		</ul>			
	</div>
</nav> --}}


<div class="container">
	<div class="row">
		<div class="col-lg-12">

			<h1>This is the Album Page</h1>

			{{-- @if(Session::has('success_msg')) --}}

			<div class="alert alert-success">
				{{ Session::get('success_msg') }}
			</div>

			{{-- @elseif(Session::has('delete_msg')) --}}

			{{-- <div class="alert alert-danger">
				{{ Session::get('delete_msg') }}
			</div> --}}

			<form action="/albums/create" method="POST" enctype="multipart/form-data">

				@csrf
				
				<label>Album Name: </label>
				<input type="text" name="albumname" class="form-control">

				<label>Year: </label>
				<input type="number" name="year" id="" class="form-control" placeholder="YYYY">

				<label>Genre: </label>
				<input type="text" name="genre" id="" class="form-control">

				<label>Artist: </label>
				<select class="custom-select" name="artistid">

					<option>Choose an Artist</option>

					@foreach($artists as $artist)
					<option value="{{ $artist->id }}">{{ $artist->name }}</option>
					@endforeach

				</select>

				<label>Album Image:</label>
				<input type="file" name="imagealbums" class="form-control">

				<div style="display: flex; margin-top: 10px;">
					<button type="submit" class="btn btn-primary">Add</button>
					<form class="pl-1" method="" action="" style="margin-bottom: 0;">
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</div>
			</form>

			<div class="row">
				@foreach($albums as $album)
				<div class="col-lg-3 mb-3">
					<div class="card" style="">
						<img class="card-img-top" src="{{ $album->image_path }}" alt="Card image cap">
						<div class="card-body">

							{{-- @foreach($artists as $artist)
							@if($artist->id == $album->artists_id)
							<h5 class="card-title">Artist: {{ $artist->name }}</h5>
							@endif
							@endforeach --}}

							<h5 class="card-title">Artist: {{ $album->artist->name }}</h5>
							
							<h5 class="card-title">Album: {{ $album->album_name }}</h5>

							<h5 class="card-title">Year: {{ $album->year }}</h5>

							<h5 class="card-title">Genre: {{ $album->genre }}</h5>
							
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