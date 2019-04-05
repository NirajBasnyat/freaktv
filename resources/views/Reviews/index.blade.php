@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center lead bg-info">Reviews</div>
    <div class="card-body">
		
		<table class="table">
			<thead>
				<th>Movie</th>
				<th>Review</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach ($reviews as $review)
					<tr>
						<td>{{$review->movie->name}}</td>
						<td>{{$review->review}}</td>
						@if ($review->user_id == Auth::id() || Auth::user()->admin)
							<td><a href="{{ route('reviews.edit',['id'=>$review->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
							<td><a href="{{ route('reviews.delete',['id'=>$review->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
</div>

@endsection