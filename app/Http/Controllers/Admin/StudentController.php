<?php

namespace App\Http\Controllers\Admin;

use App\Model\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{

	public function index() {

		return view('admin.student.form_infor');
	}

    public function show_form1(){
		$student = new Student();
		$user = new User();

		$id = Auth::id();
		return view('admin/student/form_infor', [
			'student' => $student,
			'user' => $user,
		])->with('uid', $id);
	}

	public function show_form2(){
		return view('admin/student/form_line');
	}

	public function show_list(){
		return view('admin/student/infor_list');
	}
	
	//添加信息到数据库的学生表中
	public function create(Request $request) {
		$id = Auth::id();
		$student = Student::where('user_id', $id)->first();
		$user = User::find($id);
		if($request->isMethod('POST')) {
			//判断是否符合输入要求
			$validator = \Validator::make($request->input(), [
				'Student.name'=> 'required|min:2',
				'Student.class'=> 'required|min:2',
				'Student.student_number'=> 'required|min:1',
				'Student.sex'=> 'required|min:1',
				'Student.telephone' => 'required|min:1'
			]);

			//保持住信息 save data;
			if($validator->fails()) { 
				return redirect()->back()->withInput();
			} else {

				$data = $request->input('Student');
//				dd($data);
				
				$num = Student::where('user_id', $id)->first()->update($data); //对应的Model应该要开启批量赋值 

				if($num == 1) {
					return view('admin.student.form_infor', [
						'student' => $student,
						'user' => $user
					]);
				} else {
					return redirect()->back();
				}
			}
		}
		return view('admin.student.form_infor',
			['student' => $student,
			 'user' => $user
			]);
		
	}
}
