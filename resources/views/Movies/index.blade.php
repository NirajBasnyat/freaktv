@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center lead bg-info">Movies list</div>
    <div class="card-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if (count($movies) > 0)
				@foreach ($movies as $movie)
					<tr>
						<td>{{$movie->name}}</td>
						<td><img src="storage/uploads/image/{{$movie->image}}" alt="" height="50px" width="60px"></td>
						<td><a href="{{ route('movies.edit',['id' => $movie->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
						<td>
							<form action="{{ route('movies.destroy',['id'=>$movie->id]) }}" method="post">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-sm btn-danger" value="Trash">							
							</form>
						</td>
						<td>
							@if ($movie->has_been_reviewed())
								<p class="btn btn-sm btn-success">Review posted</p>
							@else
								<a href="{{ route('reviews.create',['id'=>$movie->id]) }}" class="btn btn-sm btn-dark">leave a review</a>
							@endif
							
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5" class="text-center">No Movies found</td>
				</tr>
			@endif
			
		</tbody>
	</table>
	</div>
	<div class="card-footer">{{$movies->links()}}</div>
</div>

@endsection