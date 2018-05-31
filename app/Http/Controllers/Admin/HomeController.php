<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller\Auth\LoginController;
use App\Model\User;
class HomeController extends Controller
{
	//return view('home');
	public function index(Request $request){
		//throw new \Exception("hahaha",1);
		//return view('/admin');

		$users = User::all();
		foreach ($users as $user){
			echo $user->identy;
			$us=Auth::user()->name;
			echo $us;
		}	
	/*	 if($user->identy==1){
			  return view('admin/teacher/home');
		 }else{
			  return view('admin/student/home');
		 }*/
	}
}
