<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',array('uses' => 'ChannelsController@index', 'as' => 'channels'));
Route::get('/channels',array('uses' => 'ChannelsController@index', 'as' => 'channels'));

Route::get('channel/{id}',array('uses' => 'SearchController@index', 'as' => 'channel.search'));
Route::post('channel/search',array('uses' => 'SearchController@create', 'as' => 'search.create'));
Route::post('channel/saveVideo',array('uses' => 'SearchController@saveVideo', 'as' => 'search.save'));
Route::get('show/{id}', 'YoupartyController@index');

Route::get('channels/create', 'ChannelsController@create');
Route::post('channels/create', array('uses' => 'ChannelsController@store', 'as' => 'channels.store'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
