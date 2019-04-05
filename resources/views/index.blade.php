@include('inc.navbar')
        
<!-- ********************popular Movies section************************ -->

    <div class="popular">
        <div class="container">
            <h3 class="lead text-center p-5 display-4 "><span>&hearts;</span> Popular Downloads</h3>

            <div class="row">

                @foreach ($movies as $movie)
                   <div class="col-lg-3 col-sm-6">
                       <div class="over-container">
                           <img src="storage/uploads/image/{{$movie->image}}" alt="" class="rounded">
                           <div class="overlay overlay-left">
                               <div class="text">
                                   <p class="text-center lead">{{$movie->rating}}/10</p>
                                   <h4 class="text-center">
                                    @foreach ($movie->genres as $genre)
                                       {{$genre->name}}
                                   @endforeach</h4>
                               </div>
                           </div>
                       </div>
                       <a href="{{ route('single',['slug'=> $movie->slug]) }}" class="center">
                       
                        {{$movie->name}}
                        </a>
                   </div>
                @endforeach

                
            </div>
        </div>
    </div>
        
<!-- ********************latest Movies section************************ -->

<div class="latest">
    <div class="container">
        <h3 class="lead text-center p-5 display-4"><span>&starf;</span>Latest Movies</h3>

        <div class="row mb-3">

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/5.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>&starf;&starf;&starf;&starf;&starf;</h2>
                            <p>Action/Drame</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">Game Plan</a>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/6.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>Rating</h2>
                            <p>Action/Adventure</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">Escape Plan</a>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/7.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>Rating</h2>
                            <p>Action/Adventure</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">Top Dog</a>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/8.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>Rating</h2>
                            <p>Action/Adventure</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">Dorado</a>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row pb-3">

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/9.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>&starf;&starf;&starf;&starf;&starf;</h2>
                            <p>Action/Drame</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">The Road</a>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/10.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>Rating</h2>
                            <p>Action/Adventure</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">Beast</a>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/11.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>Rating</h2>
                            <p>Action/Adventure</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">John tucker must die</a>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="over-container">
                    <img src="image/12.jpg" alt="" class="rounded">
                    <div class="overlay overlay-left">
                        <div class="text">
                            <h2>Rating</h2>
                            <p>Horror</p>
                        </div>
                    </div>
                </div>
                <a href="" class="center">John Wick</a>
            </div>

        </div>
    </div>
</div>
<!-- ********************latest Movies section************************ -->
<footer>
    <p>FreakTV &copy; CodeSmith &bull; 2018 </p>
</footer>

    

    
    <script src="{{ asset('app/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('app/js/popper.js') }}"></script>
    <script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app/js/script.js') }}"></script>

    
    {{-- <script>window.jquery || document.write('<script src="{{ asset('app/js/jquery-2.1.3.min.js') }}"><\/script>');</script> --}}

   {{--  <script>
        $(document).ready(function(){

            $( '.click' ).click(function() {
              var movieId =$(this).attr('data-id'); // Get the post ID from our data attribute
              registerMovieClick(movieId); // Pass that ID to our function. 
            });

            function registerMovieClick(movieId) {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

              $.ajax({
                type: 'post',
                dataType: 'JSON',
                url: '/movie/' + movieId + '/click',
                error: function (xhr, ajaxOptions, thrownError) {
                       console.log(xhr.status);
                       console.log(JSON.stringify(xhr.responseText));
                   }
              });
            }
        });
    </script> --}}

    {{-- <script>
    $('.click').click(function(){
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
         $.ajax({
           url: "/count",
           type:"POST",
           data: {
             movie_id: $(this).attr('data-id')
           },
           success: function (data) {
             console.log(data);
           },
           error: function (request, status, error) {
             console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
           }
         });
    });
    </script> --}}
</body>
</html>