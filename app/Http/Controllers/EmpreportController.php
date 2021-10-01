<?php

namespace App\Http\Controllers;

use App\Exports\Empexport;
use Illuminate\Http\Request;
use Excel;
class EmpreportController extends Controller
{
    //

public function export(){
    // return Excel::download(new Empexport,'emp.xlsx');
    return Excel::store(new Empexport,'public/media/emp.xlsx');
}
}
