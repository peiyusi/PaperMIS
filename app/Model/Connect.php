<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
   public $timestamps = true;

    public function getDateFormat() {
        return time();

    }    
}
