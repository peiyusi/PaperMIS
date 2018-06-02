<?php

namespace App\Http\Controllers\Admin;

use App\Model\Teacher;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Auth;

class TeacherController extends Controller
{
	public function index() {
		return view('admin.teacher.form_infor');
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
	
	//�����ʦ��Ϣ
	public function save(Request $request) {
		$id = Auth::id();
		
		$teacher = Teacher::where('user_id', $id)->first();
		($teacher);
		$user = User::find($id);
		if($request->isMethod('POST')) {
            //�ж��Ƿ��������Ҫ��
			$validator = \Validator::make($request->input(), [
                'Teacher.name'=> 'required|min:2',
                'Teacher.telephone'=> 'required|min:2',
                'Teacher.pro_title'=> 'required|min:2'
            ]); 	

			if($validator->fails()) {
				return redirect()->back()->withInput();
			} else {
				$data = $request->input('Teacher');		
				
				$num = Teacher::where('user_id', $id)->update($data); //��Ӧ��ModelӦ��Ҫ����������ֵ 

				if($num == 1) {
					return view('admin.teacher.form_infor',[
						'user' => $user,
						'teacher' => $teacher
					]);
				} else {
					return redirect()->back();
				}
			}	
		
		}
		return view('admin.teacher.form_infor', [
			'teacher' => $teacher,
			'user' => $user
		]);
	}

}
