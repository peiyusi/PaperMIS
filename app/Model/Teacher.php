<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	public $timestamps = true;

	protected $table = 'teachers';

	protected $fillable = ['name', 'telephone', 'pro_title'];
    public function students() 
    {
        return $this->belongsToMany('App\Model\Student', 'connect', 'teacher_id', 'stu_id')->withPivot('approve');
    } 
}
