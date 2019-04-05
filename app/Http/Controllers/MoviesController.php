<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Movies.index')->with('movies',Movie::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Movies.create')->with('genres',Genre::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image',
            'release_date' => 'required',
            'description' => 'required',
            'genres' => 'required',
            'rating' => 'required'
        ]);

        //Code for the image
        if ($request->hasFile('image')) 
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get only image name   
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get only image extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //file_name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('image')->storeAs('public/uploads/image',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'book.png';
        }

        $movie = Movie::create([
            'name' => $request->input('name'),
            'image' => $fileNameToStore,
            'release_date' =>  $request->input('release_date'),
            'slug' => str_slug($request->input('name')),
            'description' => $request->input('description'),
            'rating' => $request->input('rating')
        ]);
        $movie->genres()->attach($request->input('genres'));

        Session::flash('success','Movie added to database');
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('Movies.edit')->with('movie',$movie)
                                  ->with('genres',Genre::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'rating' => 'required'
        ]);

        //Code for the image
        if ($request->hasFile('image')) 
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get only image name   
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get only image extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //file_name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('image')->storeAs('public/uploads/image',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'movie.png';
        }

        $movie = Movie::find($id);

        $movie->name = $request->input('name');
        $movie->release_date = $request->input('release_date');
        $movie->description = $request->input('description');
        $movie->slug = str_slug($request->input('name'));
        $movie->rating = $request->input('rating');

        if($request->hasFile('image'))
        {
           $movie->image = $fileNameToStore;
        }

        $movie->genres()->sync($request->input('genres'));
        $movie->count = $request->input('visitCount');
      //  dd(request('visitCount'));

        $movie->save();

        Session::flash('success','Movie updated');

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        Session::flash('success','Movie deleted from database');

        return redirect()->route('movies.index');
    }

    public function trash()
    {
        $movies = Movie::onlyTrashed()->get();
       // Session::flash('success','Movie Trashed');
        return view('movies.trash')->with('movies',$movies);
    }

    public function kill($id)
    {
        $movie = Movie::withTrashed()->where('id',$id)->first();
        $movie->forceDelete();
        Session::flash('success','Movie deleted permanently');
        return redirect()->back();
    }

     public function restore($id)
    {
        $movie = Movie::withTrashed()->where('id',$id)->first();
        $movie->restore();
        Session::flash('success','Movie restored');
        return redirect()->route('movies.index');
    }
   
}
