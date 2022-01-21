<?php

namespace App\Http\Controllers;

use App\Exports\Empexport;
use Illuminate\Http\Request;
use App\Models\Emp;
use Illuminate\Support\Facades\DB;
use PDF;
use Excel;
class EmpreportController extends Controller
{
    //

public function export(){
    
    return Excel::download(new Empexport,'emp.xlsx');

}

} 
