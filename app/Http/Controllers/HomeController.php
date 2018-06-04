<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
		$teacher = new Teacher();
		$student = new Student();
		
		$this->uid = $request->user()->id; //��ȡ��½�û���userid

		$identy = $request->user()->identy;//��ȡ��¼�û������
		echo $email.'+'.$this->uid.'+'.$identy;

		if($identy == 1) {
			$flag = Student::where('user_id', $this->uid)->first(); //$flag�ж��Ƿ��Ѿ���ѧ�����д����˶�Ӧ��			
			if (!$flag) {
				$student->user_id = $this->uid;
				$student->save();
			}
		} else {
			$flag = Teacher::where('user_id', $this->uid)->first(); //$flag�ж��Ƿ��Ѿ��ڽ�ʦ���д����˶�Ӧ��
			if (!$flag) {
				$teacher->user_id = $this->uid;
				$teacher->save();
			}
		}

		$users = User::all();
		//�жϻ�ȡ�ĵ����ʼ��ǲ���users���еģ���������ж������ʲô
		foreach ($users as $user) {
			if ($user->email == $email) {
				if ( $user->identy==1) {
					return view('/admin/student/home');
				} else{
					return view('/admin/teacher/home');
				}
			}
		}
	}

}	
