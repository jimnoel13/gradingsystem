<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bio;
use Session;
use Hash;

class RegistrationController extends Controller
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
        return view('auth.register');
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|min:10',
            'sex' => 'required',
            'contact_number' => 'required|unique:users',
            'password' => 'required|confirmed',
            'profile_picture' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('profile_picture')){
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profile_picture')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $users = new User;
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->sex = $request->sex;
        $users->mi = $request->mi;
        $users->location = $request->location;
        $users->contact_number = $request->contact_number;
        $users->alt_con = $request->alt_con;
        $users->password = Hash::make($request->password);
        $users->profile_picture = $fileNameToStore;
        $users->admin_id = auth()->user()->id;
        $users->save();

        $userid = $users->id;
        $bio = new Bio;
        $bio->user_id = $userid;
        $bio->save();

        Session::flash('success', 'Faculty Successfully Created!');

        return redirect()->route('faculty.index');
    }
}
