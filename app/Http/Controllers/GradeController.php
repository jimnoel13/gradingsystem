<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAssign;
use App\Facultysubject;
use App\Schooldept;
use App\Student;
use App\User;
use Session;

class GradeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject_title' => 'required',
            'subject_code' => 'required',
            'student_code' => 'required',
            'student_id' => 'required',
            'school_dept' => 'required',
            'semester' => 'required',
            'name' => 'required',
            'course' => 'required',
            'year' => 'required'
        ]);

        $subs = new StudentAssign;
        $subs->facultysubject_id = $request->facultysubject_id;
        $subs->student_id = $request->student_id;
        $subs->subject_title = $request->subject_title;
        $subs->subject_code = $request->subject_code;
        $subs->student_code = $request->student_code;
        $subs->semester = $request->semester;
        $subs->school_dept = $request->school_dept;
        $subs->name = $request->name;
        $subs->course = $request->course;
        $subs->year = $request->year;
        $subs->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        $course = Schooldept::all();
        return view('students.grade')->with('students', $students)->with('course', $course);
    }
}
