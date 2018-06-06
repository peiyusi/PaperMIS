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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout');
Route::get('/register/captcha/{tmp}', 'Auth\RegisterController@captcha');
Route::group(['middleware' => 'auth','namespace' => 'Admin' ,'prefix' => 'admin' ],function(){
	Route::any('/teacher/form_infor',['uses'=>'TeacherController@save']);
	Route::get('/teacher/form_line','TeacherController@show_form2');
	Route::get('/teacher/infor_list','TeacherController@show_list');
    Route::post('/teacher/paperJudge', 'TeacherController@paperJudge');
    Route::post('teacher/download', 'UploadController@teacherDownload');
	Route::any('/student/form_infor',['uses'=>'StudentController@create']);

	Route::get('/teacher/home','TeacherController@index');
	Route::get('/student/form_line','StudentController@show_form2');
	Route::get('/student/home','StudentController@index');
	Route::get('/student/infor_list','StudentController@show_list');

	Route::post('/student/selectTeacher','StudentController@selectTeacher');
    Route::resource('student/papers', 'UploadController'); 
});

Route::get('student/home', 'Admin\StudentController@index');
Route::get('teacher/home', 'Admin\TeacherController@index');
Route::any('teacher/save', ['uses' => 'Admin\TeacherController@save']);
