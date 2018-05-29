<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
	public function index()
	{
		//return view('home');
		$User=new User;
		      //  foreach($User as $user){
				///	
				//	         echo $user;
		         //}
		if($User->identy==1){
			return view('/admin/teacher/home');
		}else{
			return view('/admin/student/home');
		}
	}
}
