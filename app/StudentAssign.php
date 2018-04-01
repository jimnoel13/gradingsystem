<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAssign extends Model
{
    
	public function faculty()
	{
		return $this->belongsTo('App\Facultysubject');
	}

	public function student()
	{
		return $this->belongsTo('App\Student');
	}

}
