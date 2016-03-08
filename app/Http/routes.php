<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('foo', function () {
    return 'Hello World';
});

Route::get('user/{id}', function ($id2) {
    return 'User '.$id2;
});

Route::get('name/{post}/age/{comment}', function ($postId, $commentId) {
    echo "$postId - $commentId";
});

Route::get('name/{name?}', function ($name = 'John') {
    return $name;
});

// test with my controller
Route::group(['as' => 'admin::'], function () {

    Route::get('profile', [
	    'as' => 'profile', 'uses' => 'BillyController@showIndex'
	]);

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
