<?php

use App\User;
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
        factory(User::class)->times(10)->create();

        User::create([
            'name'           => 'Rafael',
            'email'          => 'rafaeltorrealba6@gmail.com',
            'role'           => 'admin',
            'password'       => bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);
    }
}
