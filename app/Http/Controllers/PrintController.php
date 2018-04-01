<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultysubject;
use App\User;

class PrintController extends Controller
{
    public function printPreview($id)
    {
    	$facs = Facultysubject::find($id);
    	return view('printPreview')->with('facs', $facs);
    }
}
