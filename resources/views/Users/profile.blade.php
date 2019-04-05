@extends('layouts.app')

@section('content')
<div class="card bg-info">
    <div class="card-header text-center lead">Make Profile</div>
    <div class="card-body">
		<form action="{{ route('users.profile.update') }}" method="POST" class="form-group">
			{{csrf_field()}}
			<label>Name</label>
			<input type="text" name="name" class="form-control mb-2" value="{{$user->name}}">

			<label>Email</label>
			<input type="email" name="email" class="form-control mb-2" value="{{$user->email}}">

			<label>New Password</label>
			<input type="password" name="password" class="form-control mb-2">

			<label>Link</label>
			<input type="text" name="links" class="form-control mb-2" value="{{$user->profile->links}}">

			<label>About</label>
			<textarea name="about" class="form-control mb-3">{{$user->profile->about}}</textarea>

			<input type="submit" class="btn btn-sm btn-dark" value="Update Profile">
		</form>
	</div>
</div>

@endsection