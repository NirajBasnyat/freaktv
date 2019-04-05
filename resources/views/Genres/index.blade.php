@extends('layouts.app')

@section('content')
	<table class="table table-striped">
		<thead class="bg-info">
			<tr>
				<th></th>
				<th class="lead text-center">All Genres</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if (count($genres) > 0)
				@foreach ($genres as $genre)
					<tr>
						<td>{{$genre->name}}</td>
						<td><a href="{{ route('genre.edit',['id'=> $genre->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
						<td><a href="{{ route('genre.delete',['id'=> $genre->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="3">No Genre found!</td>
				</tr>
			@endif
		</tbody>
	</table>
@endsection