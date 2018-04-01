<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentAssign;
use Input;
use DB;
use Excel;

class ExcelController extends Controller
{
    
    public function getExport()
    {
    	$grades = StudentAssign::all();
    	Excel::create('Export Data', function($excel) use($grades){
    		$excel->sheet('Sheet 1', function($sheet) use($grades){
    			$sheet->fromArray($grades);
    		});
    	})->export('xlsx');
    }

}
