<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Session;

class GenresController extends Controller
{
    public function index()
    {
    	return view('Genres.index')->with('genres',Genre::all());
    }

     public function create()
    {
    	return view('Genres.create');
    }

     public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required'
    	]);

    	Genre::create([
    		'name' => request()->input('name')
    	]);

    	Session::flash('success','Genre created');

    	return redirect()->route('genre');
    }

     public function edit($id)
    {
    	$genre = Genre::find($id);
    	return view('Genres.edit')->with('genre',$genre);
    }

    public function update($id)
    {
    	$genre = Genre::find($id);

    	$this->validate(request(),[
    		'name' => 'required'
    	]);

    	$genre->name = request()->input('name');
    	$genre->save();

    	Session::flash('success','Genre Updated');
    	return redirect()->route('genre');
    }
    public function destroy($id)
    {
    	$genre = Genre::find($id);
    	$genre->delete();

    	Session::flash('success','Genre Deleted');
    	return redirect()->route('genre');
    }

}
