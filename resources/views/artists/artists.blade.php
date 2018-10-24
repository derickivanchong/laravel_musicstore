@extends('template')

@section('title', 'Artists')
@section('content')

{{-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="/">Music Store</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/artists">Artist <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/albums">Albums</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/songs">Songs</a>
			</li>				
		</ul>			
	</div>
</nav> --}}

<div class="container pt-5">
	<h1>Eto ang page ng mga Artists</h1>

	{{-- @if(Session::has('success_msg')) --}}

	<div class="alert alert-success">
		{{ Session::get('success_msg') }}
	</div>

	{{-- @elseif(Session::has('delete_msg'))

	<div class="alert alert-danger">
		{{ Session::get('delete_msg') }}
	</div> --}}

	<div class="row">
		<div class="col-lg-12">
			<form enctype="multipart/form-data">
				<div class="form-group pt-5">
					{{ csrf_field() }}
					<label>Artist Name:</label>
					<input type="text" name="artistname" id="artistid" class="form-control">

					<label>Artist Image:</label>
					<input type="file" name="imageartists" id="imageartistsid" class="form-control">

					<button type="button" class="addArtist btn btn-danger w-100 mt-3">Add</button>
				</div>
			</form>
		</div>
	</div>


	<div class="row">
		@foreach($artists as $artist)
		<div class="col-lg-3 mb-3">
			<div class="card" style="">
				<img class="card-img-top" src="{{ $artist->image_path }}" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">{{ $artist->name }}</h5>
					<p class="card-text">With a voice that's both warm and powerful, Lea Salonga is a Tony Award-winning singer and actress known for a lengthy stage résumé that includes originating the role of Kim in Miss Saigon. She's also known as the singing voice of not one but two Disney princesses (Jasmine and Mulan), and as an international recording artist with album sales in the tens of millions. </p>
					<div style="display: flex;">
						<a href="/artists/edit/{{ $artist->id }}" class="btn btn-primary" style="width: 50%;">Edit</a>
						<form method="POST" action="/artists/delete/{{ $artist->id }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection