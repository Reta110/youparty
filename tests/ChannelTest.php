<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChannelTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSeeList()
    {
        $this->visit('/channel')
            ->see('Listado de Canales');
    }


    public function testCreateChannel()
    {

        $user = \App\User::create([
            'name' => 'Rafael',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);

        $this->actingAs($user)
            ->visit('/channel/create');
    }
}
