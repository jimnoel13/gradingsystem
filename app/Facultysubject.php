<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultysubject extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function stusub()
    {
    	return $this->hasMany('App\StudentAssign');
    }
}
