<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bio;
use Session;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bios = Bio::find($id);
        return view('professor.profilebio')->with('bios', $bios);
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

        $bios = Bio::find($id);
        $bios->who = $request->who;
        $bios->elementary = $request->elementary;
        $bios->highschool = $request->highschool;
        $bios->college = $request->college;
        $bios->bio = $request->bio;
        $bios->quote = $request->quote;
        $bios->skills = $request->skills;
        $bios->save();

        Session::flash('success', 'Personal Biography Successfully Updated!');

        return redirect()->route('profile.index');
    }
}
