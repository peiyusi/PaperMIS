<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class HomeController extends Controller
{
	//return view('home');
	public function index(Request $request){
		//throw new \Exception("hahaha",1);
		//return view('/admin');
		$user = DB::table('users')->where('name',"nihao");	
		echo $user;
		echo 12311242134;
		
	/*	 if($user->identy==1){
			  return view('admin/teacher/home');
		 }else{
			  return view('admin/student/home');
		 }*/
	}
}
