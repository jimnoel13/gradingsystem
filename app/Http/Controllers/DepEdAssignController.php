<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Schooldept;
use Session;

class DepEdAssignController extends Controller
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
        $users = User::find($id);
        $subjects = Subject::where('school_dept','=','DepEd')->orderBy('subject_code', 'asc')->get();
        $courses = Schooldept::all();
        $course = Schooldept::all();
        return view('facultydeped.show')->with('users', $users)->with('subjects', $subjects)->with('courses', $courses)->with('course', $course);
    }

    public function manage($id)
    {
        return 1;
    }
}
