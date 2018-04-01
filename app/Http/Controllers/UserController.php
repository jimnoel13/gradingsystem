<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Facultysubject;
use App\StudentAssign;
use App\Student;
use App\Completion;
use Auth;
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('professor.index')->with('assign', $user->assign);

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
        return view('professor.assign')->with('facs', $facs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subs = StudentAssign::find($id);
        return view('professor.edit')->with('subs',$subs);
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

        // CHEd Grade Encoding
        $subs = StudentAssign::find($id);
        $subs->prelim = $request->prelim;
        $subs->midterm = $request->midterm;
        $subs->final = $request->final;
        $subs->average = ($request->prelim + $request->midterm + $request->final)/3;

        // Remarks Conditional Statement
        
        if(!empty($request->prelim)){
            if($subs->average >= 75){
                $subs->remarks = "PASSED";
            }elseif($subs->average <= 74){
                $subs->remarks = "FAILED";
            }
        }elseif(!empty($request->midterm)){
            if($subs->average >= 75){
                $subs->remarks = "PASSED";
            }elseif($subs->average <= 74){
                $subs->remarks = "FAILED";
            }
        }elseif(!empty($request->final)){
            if($subs->average >= 75){
                $subs->remarks = "PASSED";
            }elseif($subs->average <= 74){
                $subs->remarks = "FAILED";
            }
        }

        if(empty($request->prelim)){
            $subs->remarks = "INC";
        }elseif(empty($request->midterm)){
            $subs->remarks = "INC";
        }elseif(empty($request->final)){
            $subs->remarks = "INC";
        }

        if(empty($request->prelim) and empty($request->midterm) and empty($request->final)){
            $subs->remarks = "NG";
        }



        // Rating Conditional Statement
        if($subs->average >= 99){
            $subs->rating = "1.00";
        }elseif($subs->average >= 96){
            $subs->rating = "1.25";
        }elseif($subs->average >= 93){
            $subs->rating = "1.50";
        }elseif($subs->average >= 90){
            $subs->rating = "1.75";
        }elseif($subs->average >= 87){
            $subs->rating = "2.00";
        }elseif($subs->average >= 84){
            $subs->rating = "2.25";
        }elseif($subs->average >= 81){
            $subs->rating = "2.50";
        }elseif($subs->average >= 78){
            $subs->rating = "2.75";
        }elseif($subs->average >= 75){
            $subs->rating = "3.00";
        }elseif($subs->average <= 74){
            $subs->rating = "5.00";
        }

        // Save to Database
        $subs->save();


        $fac_id = $request->facultyid;
        $facs = Facultysubject::find($fac_id);

        Session::flash('success', 'Grades Successfully Encoded!');

        return redirect()->back();
    }
}
