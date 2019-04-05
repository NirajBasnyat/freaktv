@extends('layouts.app')

@section('content')
<div class="card bg-info">
    <div class="card-header text-center lead">Create Movie</div>
    <div class="card-body">
		<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
			{{csrf_field()}}
			<label>Name</label>
			<input type="text" name="name" class="form-control" value="{{old('name')}}">
			<label>Released Date</label>
			<input type="text" name="release_date" class="form-control" value="{{old('release_date')}}">
			<label>Rating</label>
			<input type="number" name="rating" class="form-control" placeholder="out of 10">
			<label>Upload Image</label>
			<input type="file" name="image" class="form-control">
			<label>Genre</label><br>
			<div class="form-check-inline mb-2">
				<div class="form-check-label">
					@foreach ($genres as $genre)
						<input type="checkbox" name="genres[]" class="form-check-input" value="{{$genre->id}}">{{$genre->name}}
					@endforeach
				</div>
			</div><br>
			<label>Description</label>
			<textarea name="description" cols="5" rows="5" class="form-control mb-2">{{old('description')}}</textarea>
			<input type="submit" class="btn btn-sm btn-dark" value="Create">
		</form>
	</div>
</div>

@endsection