<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentComposer{

  //  private $data = null;//CommonUtils对象

    public function __construct(Request $request) {
      //  $this->data = new CommonUtils($request);//新建一个CommonUtils对象
    }

    public function compose(View $view) {
        $view->with([
			'uid' => 'test' 
        ]);//填充数据
    }
}
