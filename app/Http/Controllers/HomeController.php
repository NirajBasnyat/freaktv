<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with('movie_count',Movie::count())
                           ->with('genre_count',Genre::count())
                           ->with('user_count',User::count())
                           ->with('trash_count',Movie::onlyTrashed()->count());
    }
}
