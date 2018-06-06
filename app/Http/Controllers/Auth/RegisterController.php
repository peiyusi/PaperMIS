<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Gregwar\Captcha\CaptchaBuilder;  
use Session;
class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	 */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
			'identy' => 'required|integer',
			 ]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data)
	{
		$userInput = request('captcha');
		if (Session::get('milkcaptcha') == $userInput) {
			//用户输入验证码正确
			return User::create([
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
				'identy' => $data['identy'],
			]);
		}
	}


	/**
	 *验证码
	 *
	 */
	public function captcha($tmp)  
	{  
		//生成验证码图片的Builder对象，配置相应属性  
		$builder = new CaptchaBuilder;  
		//可以设置图片宽高及字体  
		$builder->build($width = 150, $height = 50, $font = null);  
		//获取验证码的内容  
		$phrase = $builder->getPhrase();  
		//把内容存入session  
		Session::flash('milkcaptcha', $phrase);	
		//生成图片  
		header("Cache-Control: no-cache, must-revalidate");  
		header('Content-Type: image/jpeg');  
		$builder->output();  
	}  
}
