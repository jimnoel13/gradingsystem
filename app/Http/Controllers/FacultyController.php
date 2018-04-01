<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schooldept;
use App\Subject;

class FacultyController extends Controller
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
        $users = User::orderBy('created_at','desc')->paginate(15);
        $course = Schooldept::all();
        return view('faculty.index')->with('users', $users)->with('course', $course);
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
        $subjects = Subject::where('school_dept','=','CHEd')->orderBy('subject_code', 'asc')->get();
        $courses = Schooldept::all();
        $course = Schooldept::all();
        return view('faculty.show')->with('users', $users)->with('subjects', $subjects)->with('courses', $courses)->with('course', $course);
    }
}
