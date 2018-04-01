<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
}
