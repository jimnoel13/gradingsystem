<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultysubject;
use App\Student;
use App\Schooldept;
use App\User;
use App\Subject;
use Session;

class DepEdManageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facs = Facultysubject::find($id);
        $students = Student::orderBy('first_name', 'asc')->get();
        $course = Schooldept::all();
        return view('facultydeped.manage')->with('facs', $facs)->with('students', $students)->with('course', $course);
    }
}
