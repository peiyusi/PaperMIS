<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	//return view('home');
	public function index(){
		//throw new \Exception("hahaha",1);
		return view('admin/home');
	}
}
