<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App\Facultysubject;
use App\Schooldept;
use Session;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('created_at','desc')->paginate(15);
        $course = Schooldept::all();
        return view('students.index')->with('students', $students)->with('course', $course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'student_id' => 'required|min:12|max:13|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students',
            'course' => 'required|min:2',
            'year' => 'required',
            'sex' => 'required|min:4',
            'location' => 'required',
            'contact_number' => 'required|min:11|max:11|unique:students'
        ]);

        $student = new Student;
        $student->student_id = $request->student_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->course = $request->course;
        $student->year = $request->year;
        $student->sex = $request->sex;
        $student->location = $request->location;
        $student->contact_number = $request->contact_number;
        $student->save();

        Session::flash('success', 'Student Successfully Created!');

        return redirect()->route('students.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->faculty()->sync($request->facultysubject_id, false);

        Session::flash('success','Student Successfully Assigned!');

        $facultysubjectid = $request->facultysubject_id;
        $facultysubject = Facultysubject::find($facultysubjectid);

        return redirect()->route('facultysubject.show', $facultysubject->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        Session::flash('success', 'Student Successfully Deleted!');

        return redirect()->route('students.index');
    }
}
