<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Model\Student;
use App\Model\Connect;

class UploadController extends Controller {

    public function index(){

        $sid = Student::where('user_id', Auth::id())->first()->id;
        $filename = Student::where('id', $sid)->first()->paper; 
        $connect = Connect::where('stu_id', $sid)->first(); 
        
        if ($connect) {
          return view('admin/student/upload/home')->with('filename', $filename)->with('approve', $connect->approve);
        } else {
          return view('admin/student/upload/no_connect_home')->with('filename', $filename);
        }
    }

    public function store(Request $request) {
        $sid = Student::where('user_id', Auth::id())->first()->id;
        $filepath = 'papers/'.$sid;
        $filename = Input::file('paper')->getClientOriginalName();
        Storage::putFileAs($filepath , $request->file('paper'), $filename);

        Student::where('id', $sid)
                ->update(['paper' => $filename]);


        $connect = Connect::where('stu_id', $sid)->first(); 
        
        if ($connect) {
            return view('admin/student/upload/home')->with('filename', $filename)->with('approve', $connect->approve);
        } else {
          return view('admin/student/upload/no_connect_home')->with('filename', $filename);
        }
    }
        
    public function create(){
        $sid = Student::where('user_id', Auth::id())->first()->id;
        $filepath = '/var/tempone/mane/storage/app/papers/'.$sid.'/'.Student::where('id', $sid)->first()->paper; 
        return response()->download($filepath);
    }
    
    public function teacherDownload() {
        $sid = Input::get('sid');
        $filepath = '/var/tempone/mane/storage/app/papers/'.$sid.'/'.Student::where('id', $sid)->first()->paper; 

        return response()->download($filepath);

    }

}
