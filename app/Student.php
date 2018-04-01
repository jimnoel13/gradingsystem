<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }

    public function stusub()
    {
    	return $this->hasMany('App\StudentAssign');
    }
}
