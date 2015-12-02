<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

Class ChannelsTableSeeder extends Seeder{

    public function run() {

        $faker = Faker::create();

        for($i = 0; $i < 5; $i ++)
        {
            $id =  \DB::table('channels')->insertGetId(array(

                'name'          => $faker->word,
                'nick_name'     => $faker->word,
            ));



            \DB::table('channel_videos')->insert(array(

                'channel_id'   => $id,
                'url'   => 'http://www.youtube.com/'.$faker->userName,
                'viewed' => 0

            ));

        }
    }
}
?>