<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Schooldept;
use App\User;
use Session;

class DepEdController extends Controller
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
        $subjects = Subject::where('school_dept','=','DepEd')->orderBy('created_at','desc')->paginate(15);
        $course = Schooldept::all();
        return view('deped.index')->with('subjects',$subjects)->with('course', $course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deped.create');
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
            'subject_code' => 'required|min:2',
            'subject_title' => 'required|string',
            'units' => 'required',
        ]);

        $subjects = new Subject;

        $subjects->school_dept = $request->school_dept;
        $subjects->subject_code = $request->subject_code;
        $subjects->subject_title = $request->subject_title;
        $subjects->units = $request->units;
        $subjects->save();

        Session::flash('success', 'Subject Successfully Created!');

        return redirect()->route('deped.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subjects = Subject::find($id);
        $users = User::all();
        $course = Schooldept::all();
        return view('deped.show')->with('subjects', $subjects)->with('users', $users)->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subject::find($id);
        $course = Schooldept::all();
        return view('deped.edit')->with('subjects', $subjects)->with('course', $course);
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
        $this->validate($request, [
            'subject_code' => 'required|min:2',
            'subject_title' => 'required|min:5',
            'units' => 'required|max:1',
        ]);

        $subjects = Subject::find($id);

        $subjects->subject_code = $request->subject_code;
        $subjects->subject_title = $request->subject_title;
        $subjects->units = $request->units;
        $subjects->save();

        Session::flash('success','Subject Successfully Updated!');

        return redirect()->route('deped.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjects = Subject::find($id);

        $subjects->delete();

        Session::flash('success','Subject Successfully Deleted!');

        return redirect()->route('deped.index');
    }
}
