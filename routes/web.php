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


//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('user', 'admin\UserController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth','namespace' => 'Admin' ,'prefix' => 'admin' ],function(){
	Route::get('/home','HomeController@index');
	Route::get('/form_infor','TeacherController@show_form1');
	Route::get('/form_line','TeacherController@show_form2');
	Route::get('/infor_list','TeacherController@show_list');
});

Route::get('student', 'Admin\StudentController@index');
Route::get('teacher', 'Admin\TeacherController@index');

