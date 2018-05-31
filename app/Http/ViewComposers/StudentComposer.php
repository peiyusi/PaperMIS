<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\HomeController;

class StudentComposer{

	private $data = null;


    public function compose(View $view) {
        $view->with([
            'test' => 'test' 
		]);
   	}


}
