<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
use Auth;

class UsersController extends Controller
{
	public function __construct()
	{
		return $this->middleware('admin');
	}

    public function index()
    {
    	return view('Users.index')->with('users',User::all());
    }

    public function create()
    {
    	return view('Users.create');
    }

    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'email' => 'required|email'
    	]);

    	$user = User::create([
    		'name' => request()->input('name'),
    		'email' => request()->input('email'),
    		'password' =>  bcrypt('password')
    	]);

    	$profile = Profile::create([
    		'user_id' => $user->id
    	]);

    	Session::flash('success','User created');
    	return redirect()->route('users');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success','User deleted');
        return redirect()->route('users');
    }

    public function admin($id) //make admin
    {
    	$user = User::find($id);

    	$user->admin = 1;
    	$user->save();

    	Session::flash('success','Admin Privileges granted');
    	return redirect()->route('users');
    }

    public function reviewer($id) //remove admin ie make-reviewer
    {
    	$user = User::find($id);

    	$user->admin = 0;
    	$user->save();

    	Session::flash('success','Admin Privileges removed');
    	return redirect()->route('users');
    }
}
