<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>LaraMovie</title>
    <link rel="stylesheet" href="{{ asset('app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/style.css') }}">
</head>
<body>
    <!-- ********************HEADER-SECTION************************ -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed">
          <a class="navbar-brand ml-2" href="#">FreakTv </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Browse Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login">Admin Panel</a>
              </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" method="GET" action="/results">
              <input class="form-control mr-sm-2" type="text" placeholder="Search Movie" name="query">
              <button class="btn btn-secondary btn-sm my-2 my-sm-0" type="submit">Search</button>
            </form>
            
          </div>
        </nav>
    </header>
