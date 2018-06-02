<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	public $timestamps = true;

	protected $table = 'teachers';

	protected $fillable = ['name', 'telephone', 'pro_title'];
}
