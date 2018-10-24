@extends('template')

@section('title', 'Artists')
@section('content')

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Music Store</a>
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
</nav>

<div class="container">
	<div class="row">
		<div class="col-lg-4 mt-5">
			<form method="POST" action="/artists/edit/{{ $artist->id }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label>Artist Name</label>
					<input type="text" name="editartistname" class="form-control" value="{{ $artist->name }}">
				</div>

				<div class="form-group">
					<label>Artist Image</label>
					<input type="file" name="editartistimage" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-success form-control">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>




@endsection