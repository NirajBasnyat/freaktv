@extends('layouts.app')

@section('content')
<div class="card bg-primary">
    <div class="card-header text-center lead">Leave Review</div>
    <div class="card-body">
		<form action="{{ route('reviews.store',['id'=>$id]) }}" method="POST" class="form-group">
			{{csrf_field()}}
			<label>Title</label>
			<input type="text" name="title" class="form-control mb-2">
			<label>Review</label>
			<textarea name="review" class="form-control mb-2"></textarea>
			<input type="submit" class="btn btn-sm btn-dark" value="Submit">
		</form>
	</div>
</div>

@endsection