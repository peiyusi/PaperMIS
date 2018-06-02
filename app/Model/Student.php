<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	const SEX_BOY = '男';
	const SEX_GRIL = '女';
	public $timestamps = true;

	protected $fillable = ['name', 'sex', 'class', 'student_num', 'telephone', 'paper']; 

	public function sex_($ind = null) {
		$arr = [
			self::SEX_BOY => '男',
			self::SEX_GRIL => '女',
		];
		if($ind != null) {
			return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_BOY];
		}
		return $arr;
	}
    
    public function teachers() 
    {
        return $this->belongsToMany('App\Model\Teacher', 'connect', 'stu_id', 'teacher_id');
    }    
}
