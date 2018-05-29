<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TeacherController extends Controller
{
	public function show_form1(){
		return view('admin/teacher/form_infor');
	}

	public function show_form2(){
		return view('admin/teacher/form_line');
	}

	public function show_list(){
		return view('admin/teacher/infor_list');
	}



}
