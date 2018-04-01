<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schooldept;
use Session;

class CourseController extends Controller
{
    public function store(Request $request){
    	$this->validate($request, [
    		'course' => 'required|unique:schooldepts',
    	]);

    	$co = new Schooldept;
    	$co->course = $request->course;
    	$co->save();

    	Session::flash('success', 'Course Successfully Added!');

    	return redirect()->back();
    }

    public function destroy($id){
        $course = Schooldept::find($id);

        $course->delete();

        Session::flash('success', 'Course Succeefully Deleted!');

        return redirect()->back();
    }
}
