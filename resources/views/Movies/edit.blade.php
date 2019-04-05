@extends('layouts.app')

@section('content')
<div class="card bg-primary">
    <div class="card-header text-center lead">Edit Movie</div>
    <div class="card-body">
		<form action="{{ route('movies.update',['id'=>$movie->id]) }}" method="POST" enctype="multipart/form-data" class="form-group">
			{{csrf_field()}}
			{{method_field('PUT')}}

			<label>Name</label>
			<input type="text" name="name" class="form-control" value="{{$movie->name}}">
			<label>Released Date</label>
			<input type="text" name="release_date"  class="form-control" value="{{$movie->release_date}}">
			<label>Rating</label>
			<input type="number" name="rating" class="form-control" placeholder="out of 10" value="{{$movie->rating}}">
			<label>Upload Image</label>
			<input type="file" name="image" class="form-control">
			<label>Genre</label><br>
			<div class="form-check-inline mb-2">
				<div class="form-check-label">
					@foreach ($genres as $genre)
						<input type="checkbox" name="genres[]" class="form-check-input" value="{{$genre->id}}"
							@foreach ($movie->genres as $g)
								@if ($g->id == $genre->id)
									checked 
								@endif
							@endforeach
						>{{$genre->name}}
					@endforeach
				</div>
			</div><br>
			<label>Description</label>
			<textarea name="description" cols="5" rows="5" class="form-control mb-2">{{$movie->description}}</textarea>
			<input type="submit" class="btn btn-sm btn-dark" value="Update">
		</form>
	</div>
</div>

@endsection