@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center lead bg-info">Profile list</div>
    <div class="card-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Permission</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@if (count($users) > 0)
				@foreach ($users as $user)
					<tr>
						<td>{{$user->name}}</td>

						<td>
							@if ($user->admin){{-- if admin(you can remove privilages) --}}
								
								@if (Auth::id() !== $user->id) {{-- logged-in-id !== user's id --}}
									<a href="{{ route('users.reviewer',['id'=>$user->id]) }}" class="btn btn-sm btn-secondary">Remove permission</a>
								@else
									<p class="text-center">Currently logged</p>
								@endif
									
							@else
								{{-- if not_admin(you can grant admin privilages) --}}
								<a href="{{ route('users.admin',['id'=>$user->id]) }}" class="btn btn-sm btn-success">Make admin</a>
							@endif
						</td>
						
						<td>
							@if (Auth::id() !== $user->id)
								<a href="{{ route('users.delete',['id'=>$user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
							@endif
							
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5" class="text-center">No Profile</td>
				</tr>
			@endif
			
		</tbody>
	</table>
	</div>
</div>

@endsection