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

Route::get('view', function () {
    return view('welcome');
});

<<<<<<< HEAD
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
//basic routes
Route::get('basic1', function() {//the first parameter is the name of the route
	return 'hello';
});

Route::post('basic2', function() {
	return 'basic2';
});

//more routes requests
Route::match(['get', 'post'], 'multy1', function() {//it can accept the 'get' and 'post', 'multy1' is the name of route
	return 'multy1';
});

Route::any('multy2', function() {//this one can accept any route
	return 'multy2';
});

//routes with parameters
//Route::get('user/{id}', function($id) {
//	return 'User_id-'. $id;
//});

//Route::get('user/{name?}', function($name = 'sean') {
//	return 'User_name-'. $name;
//});


Route::get('user/{id}/{name?}', function($id, $name = 'sean') {
	    return 'User_id-'. $id. 'User_name-'. $name;
})->where(['id' => '[0-9]+','name' => '[A-Za-z]+']);//range of routing

//group of route
Route::group(['prefix' => 'member'], function() {
	Route::any('multy2', function() {//this one can accept any route
	    return 'member_multy2';
	});	
	Route::get('user/center', ['as' => 'center', function() {//another name of route
		return route('center');
	}]);
});

Route::get('member/info', 'MemberController@info');
//Route::get('member/info/{id}', ['uses' => 'MemberController@info']) -> where('id', '[0-9]+');
//Route::any('member/info', ['uses' => 'MemberController@info', 'as' => 'member']);



>>>>>>> paper
