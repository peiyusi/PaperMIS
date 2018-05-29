<?php

namespace App\Http\Controllers\Admin;

use App\Model\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
	public function index() {
		return view('teacher/TeacherInformation');
	}
	public function show_form1(){
		return view('admin/form_infor');
	}

	public function show_form2(){
		return view('admin/form_line');
	}

	public function show_list(){
		return view('admin/infor_list');
	}



}
