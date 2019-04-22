<?php



Route::post('/discussion/reply/{id}','DiscussionsController@reply')->name('discussion.reply')->middleware('auth');

Route::get('/reply/like/{id}','RepliesController@like')->name('reply.like')->middleware('auth');

Route::get('/reply/unlike/{id}','RepliesController@unlike')->name('reply.unlike')->middleware('auth');

Route::get('/channel/{slug}','ForumsController@channel')->name('channel')->middleware('auth');

Route::get('/discussion/watch/{id}','WatchersController@watch')->name('discussion.watch')->middleware('auth');

Route::get('/discussion/unwatch/{id}','WatchersController@unwatch')->name('discussion.unwatch')->middleware('auth');




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
