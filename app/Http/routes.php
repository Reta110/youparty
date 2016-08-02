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

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/channel', 'ChannelsController');

Route::group([ 'prefix' => '/channel' ], function () {

    //Search video by word
    Route::get('/{id}/videos/search/{word?}', [
        'as'   => 'search.word',
        'uses' => 'VideosController@searchVideos'
    ]);

    //Videos list
    Route::get('/{id}/videos/', [
        'as'   => 'search.videos',
        'uses' => 'VideosController@videoList'
    ]);

    //Save video  to channel
    Route::post('/{id}/videos/save', [
        'as'   => 'save.video',
        'uses' => 'VideosController@saveVideo'
    ]);

    //Youparty
    Route::get('/{id}/show/', [
        'as'   => 'youparty.show',
        'uses' => 'YoupartyController@index'
    ]);
});

Route::group([ 'prefix' => 'admin', 'middleware' => 'auth' ], function () {

    Route::get('/', [
        'uses' => 'AdminController@index',
        'as'   => 'admin.index',
    ]);

    Route::get('/channel/create', [
        'as'   => 'channel.create',
        'uses' => 'ChannelsController@create'
    ]);

});
