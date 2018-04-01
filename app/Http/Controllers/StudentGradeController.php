<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Session;

class StudentGradeController extends Controller
{
    public function show($id)
    {
    	$students = Student::find($id);
    	return view('students.studentgrade')->with('students', $students);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'student_code' => 'required|min:12|max:13',
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'contact_number' => 'required|min:11|max:11',
    	]);

    	$student = Student::find($id);
    	$student->student_id = $request->student_code;
    	$student->first_name = $request->first_name;
    	$student->last_name = $request->last_name;
    	$student->email = $request->email;
    	$student->location = $request->location;
    	$student->contact_number = $request->contact_number;
    	$student->course = $request->course;
    	$student->year = $request->year;
    	$student->sex = $request->sex;
    	$student->save();

    	Session::flash('success', 'Student successfully Updated!');

    	return redirect()->back();
    }	
}
