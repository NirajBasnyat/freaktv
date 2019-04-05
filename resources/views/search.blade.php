@include('inc.navbar')
        
<!-- ********************popular Movies section************************ -->

    <div class="popular">
        <div class="container">
            <h3 class="text-center p-5">Search results for: {{$query}}</h3>

            <div class="row">
              @if (count($movies) > 0)

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
                       <a href="{{ route('single',['slug'=> $movie->slug]) }}" class="center" >{{$movie->name}}</a>
                   </div>
                @endforeach
              @else
                  <h3 class="float-right display-4 text-success">No results found !!</h3>
              @endif
            </div>
        </div>
    </div>

  <footer>
      <p>FreakTV &copy; CodeSmith &bull; 2018 </p>
  </footer>

      <script src="{{ asset('app/js/jquery-2.1.3.min.js') }}"></script>
      <script src="{{ asset('app/js/popper.js') }}"></script>
      <script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('app/js/script.js') }}"></script>
  </body>
  </html>