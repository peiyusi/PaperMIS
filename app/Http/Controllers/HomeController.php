<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Student;
use App\Model\Teacher;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public $uid;

    public function __construct()
	{
		$this->middleware('auth');
	}
   
	public function index(Request $request)
	{
		$email = $request->user()->email;

		$this->uid = $request->user()->id; //��ȡ��½�û���userid

		$identy = $request->user()->identy;//��ȡ��¼�û������
		if($identy == 1) {
			$flag = Student::where('user_id', $this->uid)->first(); //$flag�ж��Ƿ��Ѿ���ѧ�����д����˶�Ӧ��			
			if (!$flag) {
				$student = new Student();
				$student->user_id = $this->uid;
				$student->save();
			}
		} else {
			$flag = Teacher::where('user_id', $this->uid)->first(); //$flag�ж��Ƿ��Ѿ��ڽ�ʦ���д����˶�Ӧ��
			if (!$flag) {
				$teacher = new Teacher();
				$teacher->user_id = $this->uid;
				$teacher->save();
			}
		}

		$users = User::all();
		//�жϻ�ȡ�ĵ����ʼ��ǲ���users���еģ���������ж������ʲô
		foreach ($users as $user) {
			if ($user->email == $email) {
				if ( $user->identy==1) {
					return view('/admin/student/form_infor')->with('uid', $this->uid); //����ͼ����userid
				} else{
					return view('/admin/teacher/form_infor')->with('uid', $this->uid);
				}
			}
		}
	}

	



}	
