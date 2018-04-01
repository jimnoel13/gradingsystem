<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultysubject;
use App\Schooldept;
use App\Student;
use App\User;
use Session;

class FacultySubjectController extends Controller
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
            'subject_code' => 'required',
            'subject_title' => 'required',
            'school_dept' => 'required|min:4',
            'units' => 'required',
            'semester' => 'required',
            'day' => 'required',
            'timefrom' => 'required',
            'timeto' => 'required',
            'year' => 'required',
            'user_id' => 'required'
        ]);

        $assignsubject = new Facultysubject;
        $assignsubject->subject_code = $request->subject_code;
        $assignsubject->subject_title = $request->subject_title;
        $assignsubject->school_dept = $request->school_dept;
        $assignsubject->units = $request->units;
        $assignsubject->course = $request->course;
        $assignsubject->day = $request->day;
        $assignsubject->day1 = $request->day1;
        $assignsubject->day2 = $request->day2;
        $assignsubject->timefrom = $request->timefrom;
        $assignsubject->timeto = $request->timeto;
        $assignsubject->year = $request->year;
        $assignsubject->to = $request->to;
        $assignsubject->semester = $request->semester;
        $assignsubject->user_id = $request->user_id;
        $assignsubject->save();

        $userid = $request->user_id;
        $user = User::find($userid);


        Session::flash('success', 'Subject Successfully Assigned!');

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
        $facs = Facultysubject::find($id);
        $students = Student::orderBy('first_name', 'asc')->get();
        $course = Schooldept::all();
        return view('faculty.assign')->with('facs', $facs)->with('students', $students)->with('course', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignsubject = Facultysubject::find($id);
        $assignsubject->delete();

        Session::flash('success', 'Subject Successfully Removed!');

        return redirect()->back();
    }
}
