<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
	public function info() {
		//return 'hello, world!' . $id;
		//return route('member');
		return view('member/info');
	}
}
