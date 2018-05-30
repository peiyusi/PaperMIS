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

Route::get('/', function () {
	return view('welcome');
});
//Route::get('/home', 'Auth\LoginController@login_next');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout');
Route::group(['middleware' => 'auth','namespace' => 'Admin' ,'prefix' => 'admin' ],function(){
	Route::get('/','HomeController@index');
	Route::get('/teacher/form_infor','TeacherController@show_form1');
	Route::get('/teacher/form_line','TeacherController@show_form2');
	Route::get('/teacher/infor_list','TeacherController@show_list');
	Route::get('/student/form_infor','StudentController@show_form1');
	Route::get('/student/form_line','StudentController@show_form2');
	Route::get('/student/infor_list','StudentController@show_list');


	//Route::get('logout','Auth\LoginController@logout');
});

Route::get('student', 'Admin\StudentController@index');
Route::get('teacher', 'Admin\TeacherController@index');

