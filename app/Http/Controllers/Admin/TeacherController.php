<?php

namespace App\Http\Controllers\Admin;

use App\Model\Connect;
use App\Model\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TeacherController extends Controller
{

	public function index() {
		return view('teacher/TeacherInformation');
	}
	public function show_form1(){
		return view('admin/teacher/form_infor');
	}

	public function show_form2(){
		return view('admin/teacher/form_line');
	}

	public function show_list(){
        $teacher = Teacher::where('user_id', Auth::id())->first();
        
        return view('admin/teacher/infor_list')->withStudents($teacher->students);
	}
	
	//修改消息
	public function save(Request $request) {
		$data = $request->input('Teacher');	

		$num = Teacher::where('user_id', $data['user_id'])->update(
			['name' => $data['name']],
			['telephone' => $data['telephone']],
			['pro_title' => $data['pro_title']]
		);
		if($num == 1) {
			return view('admin.teacher.form_infor');
		} else {
			echo '添加失败';
		}
	}
    //论文审核
    public function paperJudge() {
        
        $sid = Input::get('sid');
        
        $tid = Teacher::where('user_id', Auth::id())->first()->id;
        Connect::where('stu_id', $sid)
                ->where('teacher_id', $tid)
                ->update(['approve' => 1]);

        return view('admin/teacher/home');
    }

}

