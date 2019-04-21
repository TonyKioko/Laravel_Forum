<?php

Route::group(['middleware'=>'auth'],function(){

    Route::resource('channels','ChannelsController');
    Route::resource('discussions','DiscussionsController');


});


Route::resource('forum','ForumsController');




Route::get('/', function () {
    return view('welcome');
});

Route::get('{providers}/auth', 'SocialsController@auth')->name('social.auth');

Route::get('/{providers}/redirect', 'SocialsController@auth_callback')->name('social.callback');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
