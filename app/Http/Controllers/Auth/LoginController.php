<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

	use AuthenticatesUsers;


	/*public function index()
	{
		return view('auth/login');
	}

	 public function login_next(Request $request)
	 {
		 $name = $request->input("name");
		 $password = $request->input("password");
		 $user = DB::table('users')->where('name',$name)->where('password',$password)->first();
		 if($user != null){
			 return redirect('auth/register');
		 }else{
			 return redirect()->back()->withInput()->withErrors('error');
		 }
	}
	 */
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
