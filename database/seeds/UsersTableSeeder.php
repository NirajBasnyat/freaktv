<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = App\User::create([
        	'name' => 'Admin',
        	'email' => 'nirajf5@gmail.com',
            'admin' => 1,
        	'password' => bcrypt('password')
        ]);

        App\Profile::create([
            'user_id' => $user1->id,
            'links' =>'facebook.com'
        ]);

        $user2 = App\User::create([
            'name' => 'john doe',
            'email' => 'john@mail.com',
            'admin' => 0,
            'password' => bcrypt('password')
        ]);

        App\Profile::create([
            'user_id' => $user2->id,
            'links' =>'facebook.com'
        ]);
    }
}
