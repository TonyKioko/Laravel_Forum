<?php



Route::post('/discussion/reply/{id}','DiscussionsController@reply')->name('discussion.reply');

Route::get('/reply/like/{id}','RepliesController@like')->name('reply.like');

Route::get('/reply/unlike/{id}','RepliesController@unlike')->name('reply.unlike');


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
