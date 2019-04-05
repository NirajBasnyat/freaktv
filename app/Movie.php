<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Movie extends Model
{
	use SoftDeletes;

    Protected $fillable = ['name','image','release_date','description','slug','count'];

    Protected $date = ['deleted_at'];

    public function genres()
    {
    	return $this->belongsToMany('App\Genre');
    }

    public function reviews()
    {
    	return $this->hasMany('App\Review');
    }

    public function has_been_reviewed()
    {
        //logic-> Each Review stores 'user_id' that tells who posted review.If Auth(logged_in) user's id matches with 'user_id' we can't leave review again.
        $id = Auth::id();

        $all_reviews = array();

        foreach ($this->reviews as $review) //getting single review in a movie
        {
            array_push($all_reviews, $review->user_id); //pushing review's user_id in array
        }
          
        if (in_array($id, $all_reviews)) //checking if logged-in user has posted review
        {
           return true;
        }
        else
        {
            return false;
        }
    }

}
