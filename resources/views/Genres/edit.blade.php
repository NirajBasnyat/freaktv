@extends('layouts.app')

@section('content')
<div class="card bg-primary">
    <div class="card-header text-center lead">Update Genre</div>
    <div class="card-body">
		<form action="{{ route('genre.update',['id' => $genre->id]) }}" method="POST" class="form-group">
			{{csrf_field()}}
			<label>Name</label>
			<input type="text" name="name" class="form-control mb-2" value="{{$genre->name}}">
			<input type="submit" class="btn btn-sm btn-dark" value="update">
		</form>
	</div>
</div>

@endsection