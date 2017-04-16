<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback/{token?}', 'SocialAuthController@callback');


//Channels
Route::get('/channels', [ 'uses' => 'ChannelsController@index'])->name('channels');

Route::group([ 'prefix' => '/channel' , 'middleware' => 'auth'], function () {

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

    Route::post('/video/delete/{video}', [
        'as'   => 'videos.delete',
        'uses' => 'VideosController@destroy'
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

    Route::post('/channel/delete/{channel}', [
        'as'   => 'channel.delete',
        'uses' => 'ChannelsController@destroy'
    ]);

    //Store
    Route::post('/channel/create', [ 'as' => 'channel.store', 'uses' => 'ChannelsController@store' ]);
});

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
