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

		$this->uid = $request->user()->id; //获取登陆用户的userid

		$identy = $request->user()->identy;//获取登录用户的身份
		if($identy == 1) {
			$flag = Student::where('user_id', $this->uid)->first(); //$flag判断是否已经在学生表中创建了对应列			
			if (!$flag) {
				$student = new Student();
				$student->user_id = $this->uid;
				$student->save();
			}
		} else {
			$flag = Teacher::where('user_id', $this->uid)->first(); //$flag判断是否已经在教师表中创建了对应列
			if (!$flag) {
				$teacher = new Teacher();
				$teacher->user_id = $this->uid;
				$teacher->save();
			}
		}

		$users = User::all();
		//判断获取的电子邮件是不是users表中的，如果有再判断身份是什么
		foreach ($users as $user) {
			if ($user->email == $email) {
				if ( $user->identy==1) {
					return view('/admin/student/form_infor')->with('uid', $this->uid); //向视图传递userid
				} else{
					return view('/admin/teacher/form_infor')->with('uid', $this->uid);
				}
			}
		}
	}

	



}	
