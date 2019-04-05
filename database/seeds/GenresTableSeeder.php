<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
        	'name' => 'Action'
        ]);

        Genre::create([
        	'name' => 'Comedy'
        ]);

        Genre::create([
        	'name' => 'Thriller'
        ]);


    }
}
