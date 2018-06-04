<?php

namespace App\Http\Controllers\Admin;

use App\Model\Student;
use App\User;
use App\Model\Teacher;
use App\Model\Connect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{

	public function index() {

		return view('admin.student.home');
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
        $student =  Student::where('user_id', Auth::id())->first();

		return view('admin/student/infor_list')->withTeachers(Teacher::all())->withSelects($student->teachers);
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
				
				$num = Student::where('user_id', $id)->update($data); //对应的Model应该要开启批量赋值 

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

    public function selectTeacher(Request $request) {
		
		$tid = Input::get('tid');
		$sid = Student::where('user_id', Auth::id())->first()->id;
     	$flag = Connect::where('teacher_id', $tid)
	                ->where('stu_id', $sid)
                    ->first();
        if (!$flag) {
              $connect = new Connect();
              $connect->stu_id = $sid;
              $connect->teacher_id = $tid;
              $connect->approve = 0;
              $connect->save();
        } else {
            $flag->delete();
        }
         
            
        return view('admin/student/home')->with('message', '成功选择!');
    }
}
