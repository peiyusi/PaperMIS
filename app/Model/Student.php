<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $timestamps = true;
    
    public function teachers() 
    {
        return $this->belongsToMany('App\Model\Teacher', 'connect', 'stu_id', 'teacher_id');
    }    
}
