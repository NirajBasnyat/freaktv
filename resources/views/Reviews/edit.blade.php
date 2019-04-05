@extends('layouts.app')

@section('content')
<div class="card bg-primary">
    <div class="card-header text-center lead">Edit Review</div>
    <div class="card-body">
		<form action="{{ route('reviews.update',['id'=>$review->id]) }}" method="POST" class="form-group">
			{{csrf_field()}}
			<label>Title</label>
			<input type="text" name="title" class="form-control mb-2" value="{{$review->title}}">
			<label>Review</label>
			<textarea name="review" class="form-control mb-2">{{$review->review}}</textarea>
			<input type="submit" class="btn btn-sm btn-dark" value="Submit">
		</form>
	</div>
</div>

@endsection