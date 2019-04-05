<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Movie;
use App\Review;

class ReviewsController extends Controller
{
	public function index()
	{
		switch (request('filter')) 
		{
			case 'me':
				$reviews = Review::where('user_id',Auth::id())->get();
				break;
			
			default:
				$reviews = Review::orderBy('created_at','asc')->paginate(6);
				break;
		}
		return view('Reviews.index')->with('reviews',$reviews);
	}


	public function create($id)
	{
		//$id  = Movie id, Comes from [Leave a review] in Movies.index
		return view('Reviews.create')->with('id',$id);
	}


    public function store(Request $request,$id)
    {
    	//dd($id);
    	$this->validate($request,[
    	    'title' => 'required',
    	    'review' => 'required'
    	]);

    	$review = Review::create([
    	    'title' => $request->input('title'),
    	    'review' => $request->input('review'),
    	    'user_id' => Auth::id(),
    	    'movie_id' => $id
    	]);

    	Session::flash('success','Review added');
    	return redirect()->route('reviews');
    }

    public function edit($id)
    {
    	$review = Review::find($id);
    	return view('Reviews.edit')->with('review',$review);
    }

    public function update($id)
    {
    	$this->validate(request(),[
    	    'title' => 'required',
    	    'review' => 'required'
    	]);

    	$review = Review::find($id);

    	$review->title = request()->input('title');
    	$review->review = request()->input('review');
    	$review->save();

    	Session::flash('success','Review updated');
    	return redirect()->route('reviews');
    }

    public function delete($id)
    {
    	$review = Review::find($id);
    	$review->delete();

    	Session::flash('success','Review deleted');
    	return redirect()->route('reviews');
    }
}
