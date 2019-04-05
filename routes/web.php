<?php

Route::get('/test',function(){
	return App\Review::find(1)->movie->name;
});

Auth::routes();

//----------------------------------------------------------------Routes for the fron-end jobs

Route::get('/',[
	'uses' => 'FrontendController@index',
	'as' => 'index'
]);

// For the searching functionality

Route::get('/results',function(){
	$movies = \App\Movie::where('name','like', '%' .request('query'). '%')->get();
	
	return view('search')->with('movies',$movies)
						 ->with('query',request('query'));
});

Route::get('single/{slug}',[
	'uses' => 'FrontendController@single',
	'as' => 'single'
]);


//-----------------------------------------------------------------------------Custom backend routes

Route::group(['middleware' => 'auth'],function(){

	Route::get('/home',[
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);

	// Routes for -----------------------------------------------MOVIES


	Route::get('/movies/trashed',[
		'uses' => 'MoviesController@trash',
		'as' => 'movies.trash'
	]);

	Route::get('/movies/kill/{id}',[
		'uses' => 'MoviesController@kill',
		'as' => 'movies.kill'
	]);

	Route::get('/movies/restore/{id}',[
		'uses' => 'MoviesController@restore',
		'as' => 'movies.restore'
	]);

	Route::resource('movies','MoviesController');

	//Routes for ---------------------------------------------------REVIEWS

	Route::get('/reviews',[
		'uses' => 'ReviewsController@index',
		'as' => 'reviews'
	]);

	Route::get('/reviews/edit/{id}',[
		'uses' => 'ReviewsController@edit',
		'as' => 'reviews.edit'
	]);

	Route::post('/reviews/update/{id}',[
		'uses' => 'ReviewsController@update',
		'as' => 'reviews.update'
	]);

	Route::get('/reviews/delete/{id}',[
		'uses' => 'ReviewsController@delete',
		'as' => 'reviews.delete'
	]);

	Route::get('/review/create/{id}',[
		'uses' => 'ReviewsController@create',
		'as' => 'reviews.create'
	]);

	Route::post('/review/store/{id}',[
		'uses' => 'ReviewsController@store',
		'as' => 'reviews.store'
	]);

	//Routes for ---------------------------------------------GENRE

	Route::get('/genre',[
		'uses' => 'GenresController@index',
		'as' => 'genre'
	]);

	Route::get('/genre/create',[
		'uses' => 'GenresController@create',
		'as' => 'genre.create'
	]);

	Route::post('/genre/store',[
		'uses' => 'GenresController@store',
		'as' => 'genre.store'
	]);

	Route::get('/genre/edit/{id}',[
		'uses' => 'GenresController@edit',
		'as' => 'genre.edit'
	]);

	Route::post('/genre/update/{id}',[
		'uses' => 'GenresController@update',
		'as' => 'genre.update'
	]);

	Route::get('/genre/delete/{id}',[
		'uses' => 'GenresController@destroy',
		'as' => 'genre.delete'
	]);

	// Routes for ---------------------------------------profiles and user

	Route::get('/users',[
		'uses' => 'UsersController@index',
		'as' => 'users'
	]);

	Route::get('/user/create',[
		'uses' => 'UsersController@create',
		'as' => 'users.create'
	]);

	Route::post('/user/store',[
		'uses' => 'UsersController@store',
		'as' => 'users.store'
	]);

	Route::get('/user/delete/{id}',[
		'uses' => 'UsersController@delete',
		'as' => 'users.delete'
	]);
	Route::get('/user/admin/{id}',[
		'uses' => 'UsersController@admin',
		'as' => 'users.admin'
	]);
 
	Route::get('/user/reviewer/{id}',[
		'uses' => 'UsersController@reviewer',
		'as' => 'users.reviewer'
	]);

	Route::get('/user/profile/',[
		'uses' => 'ProfilesController@index',
		'as' => 'users.profile'
	]);

	Route::post('/user/profile/update',[
		'uses' => 'ProfilesController@update',
		'as' => 'users.profile.update'
	]);

});
