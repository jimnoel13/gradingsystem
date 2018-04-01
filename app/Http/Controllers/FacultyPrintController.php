<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultysubject;
use Session;

class FacultyPrintController extends Controller
{
    public function print($id)
    {
    	$facs = Facultysubject::find($id);
    	return view('faculty.print')->with('facs', $facs);
    }
}
