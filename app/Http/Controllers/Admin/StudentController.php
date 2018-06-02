<?php

namespace App\Http\Controllers\Admin;

use App\Model\Student;
use App\Model\Teacher;
use App\Model\User;
use App\Model\Connect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
	public function index() {
		return view('student/studentInformation')->withUsers(User::all());
	}

    public function show_form1(){
		return view('admin/student/form_infor');
	}

	public function show_form2(){
		return view('admin/student/form_line');
	}

	public function show_list(){
		return view('admin/student/infor_list')->withTeachers(Teacher::all());
	}
	
	//添加信息到数据库的学生表中
	public function create(Request $request) {
		$data = $request->input('Student');
	//	var_dump($data);
		
		$student = new Student();
		//$student->user_id = $request->user()->id;
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

	}

    public function selectTeacher() {
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
        }
            
        return view('admin/student/home')->with('message', '成功选择!');
    }
}
