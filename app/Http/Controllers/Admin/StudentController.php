<?php

namespace App\Http\Controllers\Admin;

use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
	public function index() {
		//Student::
		$student = new Student();
		$student->user_id = 
		return view('student/studentInformation');
	}
    public function show_form1(){
		return view('admin/student/form_infor');
	}

	public function show_form2(){
		return view('admin/student/form_line');
	}

	public function show_list(){
		return view('admin/student/infor_list');
	}
	
	//添加信息到数据库的学生表中
	public function create(Request $request) {
		$data = $request->input('Student');
	//	var_dump($data);
		
		$student = new Student();
		$student->user_id = ;
		$student->name = $data['name'];
		$student->telephone = $data['telephone'];
		$student->class = $data['class'];
		$student->student_number = $data['student_number'];

		$student->sex = $data['sex'];
		if($student->save()) {
			return view('student/studentInformation');
		} else {
			echo '修改失败';
			return redirect()->back();
		}

            //$student = new Student();

//		if ($request->isMethod('POST')) {
//		      $data = $request->input('Student');
//             if (Student::create($data)) {
//                 // return view('student.studentInformation')->with('success', '添加成功！')返回提示信息
//				 echo '添加成功';
//				
//              }else {
//                  return redirect()->back();
//              }
//           }
//		   return view('student.create', [
//               'student' => $student,
//           ]);
	}
}
