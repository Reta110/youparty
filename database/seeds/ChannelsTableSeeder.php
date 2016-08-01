<?php

use App\Channel;
use App\User;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();

        factory(Channel::class)->times(10)->make()->each(function ($channel) use ($users) {
            $channel->user_id = $users->random()->id;
            $channel->save();
        });
    }
}
