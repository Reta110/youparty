<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChannelTest extends TestCase
{
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
        $this->visit('/channel')
            ->click('Nuevo Canal')
            ->seePageIs('channel/create')
            ->type('Nuevo Canal de Rafa','name')
            ->press('Crear canal')
            ->see('Nuevo Canal de Rafa');
    }
}
