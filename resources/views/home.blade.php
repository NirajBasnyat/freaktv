@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  		<div class="col-md-3">
       		<div class="card">
           		<div class="card-header bg-primary text-center mb-2">Movies</div>
           		<div class="card-body text-center lead">{{$movie_count}}</div>
       		</div>
      	</div>

      	 <div class="col-md-3">
  	    	<div class="card">
  	    		<div class="card-header bg-danger text-center mb-2">Trashed</div>
  	    		<div class="card-body text-center lead">{{$trash_count}}</div>
  	    	</div>
      	</div>

        <div class="col-md-3">
           	<div class="card">
           		<div class="card-header bg-success text-center mb-2">Genre</div>
           		<div class="card-body text-center lead">{{$genre_count}}</div>
           	</div>
       </div>

        <div class="col-md-3">
           	<div class="card">
           		<div class="card-header bg-secondary text-center mb-2">Admin</div>
           		<div class="card-body text-center lead">{{$user_count}}</div>
           	</div>
       </div>

        
    </div>
</div>
@endsection
