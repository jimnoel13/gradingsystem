<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bio;
use Session;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $userid = auth()->user()->id;
        $user = User::find($userid);
        return view('professor.profile')->with('users', $users)->with('bio', $user->bio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $userid = auth()->user()->id;
        $user = User::find($userid);
        return view('professor.profileedit')->with('users', $users)->with('bio', $user->bio);
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
            'email' => 'required',
            'contact_number' => 'required',
            'location' => 'required',   
        ]);

        if($request->hasFile('profile_picture')){
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profile_picture')->storeAs('public/cover_images', $fileNameToStore);
        }

        $users = User::find($id);
        $users->email = $request->email;
        $users->contact_number = $request->contact_number;
        $users->location = $request->location;
        if($request->hasFile('profile_picture')){
            $users->profile_picture = $fileNameToStore;
        }
        $users->save();

        Session::flash('success', 'Profile Successfully Update');

        return redirect()->route('profile.index');
    }
}
