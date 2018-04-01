<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAssign;
use App\Schooldept;
use App\Facultysubject;
use App\User;
use App\Admin;
use Session;

class ProfileController extends Controller
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
            'facultysubject_id' => 'required'
        ]);

        $stusub = new StudentAssign;
        $stusub->facultysubject_id = $request->facultysubject_id;
        $stusub->student_code = $request->student_id;
        $stusub->student_id = $request->id;
        $stusub->name = $request->name;
        $stusub->course = $request->course;
        $stusub->year = $request->year;
        $stusub->save();

        $facultysubjectid = $request->facultysubject_id;
        $facultysubject = Facultysubject::find($facultysubjectid);

        Session::flash('success', 'Student Successfully Assigned!');

        return redirect()->route('facultysubject.show', $facultysubject->id);
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
        $course = Schooldept::all();
        return view('professor.show')->with('users', $users)->with('course', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stusub = StudentAssign::find($id);
        $stusub->delete();

        Session::flash('success', 'Student Successfully Removed!');

        return redirect()->back();
    }
}
