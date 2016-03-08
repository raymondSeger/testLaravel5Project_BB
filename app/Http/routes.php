<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

// test middleware through controller's constructor
Route::get('testMiddlewareThroughController', ['uses' => 'BillyController@testMiddleware', 'as' => 'testMiddleware']);

// test sending form data
Route::get('testSendingFormData', [function () {
   	return view('billy_test_sending_form');
}]);
Route::post('testProcessFormData', [function (Request $request) {
   	echo "My path: {$request->path()}";
   	echo "<br />";
   	echo "My URL: {$request->url()}";
   	echo "<br />";
   	echo "My URL with query string: {$request->fullUrl()}";
	echo "<br />";
   	echo "My URL method: {$request->method()}";

   	echo "<br />";
   	$name = $request->input('name');
   	$age  = $request->input('age');
   	echo "Name: {$name} , age: {$age}";

   	// You can also get the cookie or set flash data (data is put to session, and it will be deleted after it has been shown in the next page);
   	// https://laravel.com/docs/5.2/requests
}]);

// test Responses
Route::get('testResponses', [function () {
   	// Returning a full Response instance allows you to customize the response's HTTP status code and headers
   	// You can send flashback data, cookie, json, file download, and redirect to controller&method or specific route / url.
   	// https://laravel.com/docs/5.2/responses
   	return response("I am the content")
            ->withHeaders([
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ]);
}]);

// test Views Blade Template
// https://laravel.com/docs/5.2/views
// and
// https://laravel.com/docs/5.2/blade
Route::get('testViewsAndBladeTemplate', [function () {

	if (view()->exists('testTemplate.specificPage')) {
    	return view('testTemplate/specificPage', [
    		'title'=>"The title",
    		 'name' => 'Raymond Seger', 
    		 'age' => 26
    		 ]);
	} else {
		echo "Oy vey!";
	}

}]);


// test encryption 
Route::get('testEncryption', [function () {
    $encrypted_string = Crypt::encrypt("My name is Raymond Seger");

    $decrypted_string = Crypt::decrypt($encrypted_string);

    echo "My encryped string is: $encrypted_string";
    echo "<br />";
 	echo "My string is: $decrypted_string";
}]);

// test logging
Route::get('testLogging', [function () {
    Log::emergency("emergency");
	Log::alert("alert");
	Log::critical("critical");
	Log::error("error");
	Log::warning("warning");
	Log::notice("notice");
	Log::info("info");
	Log::debug("deubg");
}]);

// test session
Route::get('testSession', ['middleware' => 'webWithoutCSRF', function (Request $request) {

   	if ($request->session()->has('my_name')) {
    	echo "Your session data: your name is {$request->session()->get('my_name')}";
	} else {
		$request->session()->put('my_name', 'Raymond Seger');
    	echo "now you have session data";
	}

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
