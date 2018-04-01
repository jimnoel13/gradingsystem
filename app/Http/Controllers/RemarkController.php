<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAssign;
use Session;

class RemarkController extends Controller
{
    
	public function update(Request $request, $id)
	{
		$rem = StudentAssign::find($id);
		$rem->remarks = $request->remarks;
		$rem->save();

		Session::flash('success', 'Remarks Successfully Update');

		return redirect()->back();
	}

}
