<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
</head>
<body>
    @include('inc.header')

    <div class="container">
        <div class="row">

            <div class="col-md-3"> {{-- Links  --}}
                @if (Auth::check())
                    <ul class="list-group">
                    <li class="list-group-item bg-dark"><a href="{{ route('home') }}">Home</a></li>
                    <li class="list-group-item bg-dark"><a href="{{ route('movies.index') }}">All movies</a></li>
                    <li class="list-group-item bg-dark"><a href="{{ route('movies.create') }}">Create Movies</a></li>
                    <li class="list-group-item bg-dark"><a href="{{ route('movies.trash') }}">Trashed Movies</a></li>
                    <li class="list-group-item bg-dark"><a href="{{ route('genre') }}">All Genre</a></li>
                    <li class="list-group-item bg-dark"><a href="{{ route('genre.create') }}">Create Genre</a></li>
                    @if (Auth::check())
                       @if (Auth::user()->admin)
                           <li class="list-group-item bg-dark"><a href="{{ route('users') }}">All Users</a></li>
                           <li class="list-group-item bg-dark"><a href="{{ route('users.create') }}">Create User</a></li>
                       @endif
                    @endif
                    <li class="list-group-item bg-dark"><a href="{{ route('users.profile') }}">My Profile</a></li>
                    <li class="list-group-item bg-dark"><a href="/reviews">All Reviews</a></li>
                    <li class="list-group-item bg-dark"><a href="/reviews?filter=me">My Reviews</a></li>
                </ul>
                @endif
               
            </div>

            <div class="col-md-9">
                @if (count($errors) > 0)
                   @foreach ($errors->all() as $error)
                       <p class="text-center text-danger bg-info p-2">{{$error}}</p>
                   @endforeach
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
    </script>
           
        
</body>
</html>
