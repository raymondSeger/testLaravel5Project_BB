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

// one param
Route::get('user/{id}', function ($id2) {
    return 'User '.$id2;
});

Route::get('name/{post}/age/{comment}', function ($postId, $commentId) {
    echo "$postId - $commentId";
});

// optional param
Route::get('name/{name?}', function ($name = 'John') {
    return $name;
});

// test with my controller
Route::group(['as' => 'admin::'], function () {

    Route::get('profile', [
	    'as' => 'profile', 'uses' => 'BillyController@showIndex'
	]);

});

Route::group(['prefix' => 'marketing', 'as' => 'marketing::'], function () {

    Route::get('users', ['as' => 'profile', function ()    {
        echo "I am in marketing/users";
        echo "<br />";
        echo  Route::current()->getName(); // marketing::profile
    }]);

});

/***************
* Basically middleware is similar with NodeJS middleware, the code is ran to tamper the datas in POST, GET, and our application before going to the controller
*/

// test middleware
Route::get('testMiddleware', ['middleware' => 'myCustomMiddleware1', function () {
    echo "i am the content of this route";
}]);


// test middleware group
Route::get('testMiddlewareGroup', ['middleware' => 'myCustomMiddlewareGroup', function () {
    echo "i am the content of this route";
}]);

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

// CSRF automatic protection, session state automatic handler
Route::group(['middleware' => ['web']], function () {
    //
});
