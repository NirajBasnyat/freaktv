<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$t1 = 'Ocean 8';
    	$t2 = 'Avengers Infinity war';
    	$t3 = 'Deadpool 2';
    	$t4 = 'Hereditary';

        $m1 = [
        	'name' => $t1,
        	'image' => '/storage/app/public/uploads/image/1.jpg',
        	'release_date' => '14 April 2018',
            'slug' => str_slug($t1),
        	'description' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, nesciunt rem nostrum eligendi magnam impedit tenetur sed, obcaecati optio temporibus voluptas soluta dicta ducimus ipsum quae minima pariatur. Ex, vitae.',
            'rating' => 8
        ];

        $m2 = [
        	'name' => $t2,
        	'image' => '/storage/app/public/uploads/image/2.jpg',
        	'release_date' => '21 May 2018',
             'slug' => str_slug($t2),
        	'description' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, nesciunt rem nostrum eligendi magnam impedit tenetur',
            'rating' => 8
        ];

        $m3 = [
        	'name' => $t3,
        	'image' => '/storage/app/public/uploads/image/3.jpg',
        	'release_date' => '22 jan 2017',
            'slug' => str_slug($t3),
        	'description' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, nesciunt rem nostrum eligendi magnam impedit tenetur haha',
            'rating' => 8
        ];

         $m4 = [
        	'name' => $t4,
        	'image' => '/storage/app/public/uploads/image/4.jpg',
        	'release_date' => '22 feb 2016',
            'slug' => str_slug($t4),
        	'description' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, nesciunt rem nostrum eligendi magnam impedit tenetur haha hohoasdasdsadasd',
            'rating' => 8
        ];

        Movie::create($m1);
        Movie::create($m2);
        Movie::create($m3);
        Movie::create($m4);
    }
}
