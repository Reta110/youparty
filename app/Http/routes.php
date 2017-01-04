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

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('/', function () {
    return view('welcome');
});

//Channels
Route::get('/channels', [ 'uses' => 'ChannelsController@index'])->name('channels');

Route::group([ 'prefix' => '/channel' ], function () {

    //Show
    Route::get('/{id}', [ 'uses' => 'ChannelsController@show' ])->name('channel.show');

    //Search video by word
    Route::get('/{id}/search-videos/{word?}', [
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

    //Store
    Route::post('/channel/create', [ 'as' => 'channel.store', 'uses' => 'ChannelsController@store' ]);
});
