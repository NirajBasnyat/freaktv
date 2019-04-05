<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Movie;

class FrontendController extends Controller
{
    public function index()
    {
    	return view('index')->with('movies',Movie::orderBy('created_at','desc')->take(4)->get());
    }

    public function single($slug)
    {
    	$movie = Movie::where('slug',$slug)->get()->first();

        //TO STORE COUNT
        $movieKey = 'movie_'. $movie->id; //Making a unique key

        if (!Session::has($movieKey))  // if(unique key doesn't exist)
        {
            $movie->increment('count'); //increment count
            Session::put($movieKey,1); //only need single key
        }
    	
    	return view('single')->with('movie',$movie);
    }

}
