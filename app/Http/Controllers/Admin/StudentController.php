<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
class StudentController extends Controller
{
    public function show_form1(){
		return view('admin/student/form_infor');
	}

	public function show_form2(){
		return view('admin/student/form_line');
	}

	public function show_list(){
		return view('admin/student/infor_list');
	}

	public function store(Request $request){
		//$this->validata($request,[	]);
		
		$users = User::all();
		foreach($users as $user){
			if
		}
		$student = new Student;
		$student -> user_id = $request->user()->id;
		$student->name = $request->get('');
		$student->sex = $request->get('');
		$student->class = $request->get('');
		$student->Student_number = $request->get('');
		$student->paper = $request->get('');
	}
}
