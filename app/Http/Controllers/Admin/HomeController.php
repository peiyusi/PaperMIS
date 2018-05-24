<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	//return view('home');
	public function index(){
		return view('admin/home');
	}
}
