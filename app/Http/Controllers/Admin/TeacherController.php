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
		return view('admin/teacher/form_infor');
	}

	public function show_form2(){
		return view('admin/teacher/form_line');
	}

	public function show_list(){
		return view('admin/teacher/infor_list');
	}
	
	//修改消息
	public function save(Request $request) {
		$data = $request->input('Teacher');	
	//	dd($data);

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
	//	$teacher = new teacher();
	//	$teacher->name = $data['name'];
	//	$teacher->telephone = $data['telephone'];
	//	$teacher->pro_title = $data['pro_title'];

	//	if($teacher->save()) {
	//		return view('teacher.TeacherInformation');
	//	} else {
	//		return redirect()->back();
	//	}
	}

}
