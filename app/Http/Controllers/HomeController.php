<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
  /*  public function __construct()
	{
		$this->middleware('auth');
	}
   */
	/**
	 * Show the application dashboard.
	 *
	 [C* @return \Illuminate\Http\Response
	 RR    */
	public function index(Request $request)
	{
		$email = $request->user()->email;
		$users = User::all();
		foreach ($users as $user){
			if($user->email == $email){
				if( $user->identy==1){
					//echo "学生";
					return view('/admin/student/home');
				}else{
					//echo "老师";
					return view('/admin/teacher/home');
				
				}
			}
		}



	/*	$User=new User;
		if($User->identy==1){
			return view('/admin/teacher/home');
		}else{
			return view('/admin/student/home');
	}*/
	}
}
