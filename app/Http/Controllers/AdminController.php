<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schooldept;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Schooldept::all();
        $users = User::all();
        return view('admin')->with('course', $course)->with('users', $users);
    }
}
