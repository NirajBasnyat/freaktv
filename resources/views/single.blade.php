@include('inc.navbar')		
<!-- ********************single Movies section************************ -->

<div class="single">
	<div class="container">
		<div class="lead p-4 display-4 title">{{$movie->name}}</div>
		<div class="row mb-5">

			<div class="col-lg-3 col-md-12">
				<img src="/storage/uploads/image/{{$movie->image}}" alt="" class="rounded clearfix">
				
			</div>
			
			<div class="col-lg-9 col-md-12">
				<div class="card">
					<div class="card-header lead text-center title"><strong>About Movie</strong></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th scope="col">Genre</th>
										<th scope="col">Released Date</th>
										<th scope="col">Description</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											@foreach ($movie->genres as $genre)
												{{$genre->name}}
											@endforeach
										</td>
										<td>{{$movie->release_date}}</td>
										<td class="text-justify"><p>{{$movie->description}}</p></td>
									</tr>
								</tbody>
							</table>
							<div class="card-footer">
								<span class="lead">Torrent Links &nbsp; &nbsp;</span>
								<button class="btn btn-sm btn-info">720.P</button>
								<button class="btn btn-sm btn-primary">1080.P</button>
								<button class="btn btn-sm btn-dark"> <span style="color: #f4f4f4;">&#x1f441;</span> {{$movie->count}}</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ********************Review_Comment section************************ -->

<div class="view">
	<div class="container">
		<div class="row">

			<div class="col-md-12 review mb-5">
				<h3 class="m-2">Reviews</h3>
				@if (count($movie->reviews) > 0)
					@foreach ($movie->reviews as $review)
						<h4 class="lead">Reviewed by <strong><i>{{$review->user->name}}</i></strong></h4>
						<p><strong>{{$review->title}}</strong></p>
						<p class="beam">{{$review->review}}</p>
					@endforeach
				@else
					<p class="lead text-center text-success p-4">No comments found !</p>
				@endif
				
			</div>
			<div class="col-md-12">
				<div class="box">
					<h3>Comments</h3>
					@include('inc.disqus')
				</div>
			</div>			
		</div>
	</div>
</div>

<footer>
	<p>FreakTV &copy; CodeSmith &bull; 2018  </p>
</footer>
	
	<script src="{{ asset('app/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('app/js/popper.js') }}"></script>
    <script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app/js/script.js') }}"></script>

   

</body>
</html>