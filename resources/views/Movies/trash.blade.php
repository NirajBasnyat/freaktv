@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center lead bg-info">Trashed Movies</div>
    <div class="card-body">
	<table class="table table-striped">
		<thead>
			<tr>
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
						<td><img src="/storage/uploads/image/{{$movie->image}}" alt="image" height="50px" width="60px"></td>
						<td><a href="{{ route('movies.restore',['id' => $movie->id]) }}" class="btn btn-sm btn-success">Restore</a></td>
						<td>
							<a href="{{ route('movies.kill',['id'=>$movie->id]) }}" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5" class="text-center lead">No Movies found</td>
				</tr>
			@endif
			
		</tbody>
	</table>
	</div>
</div>

@endsection