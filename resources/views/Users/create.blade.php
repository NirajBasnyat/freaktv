@extends('layouts.app')

@section('content')
<div class="card bg-info">
    <div class="card-header text-center lead">Create User</div>
    <div class="card-body">
		<form action="{{ route('users.store') }}" method="POST" class="form-group">
			{{csrf_field()}}
			<label>Name</label>
			<input type="text" name="name" class="form-control mb-2">
			<label>Email</label>
			<input type="email" name="email" class="form-control mb-2">
			<input type="submit" class="btn btn-sm btn-dark" value="Create">
		</form>
	</div>
</div>

@endsection