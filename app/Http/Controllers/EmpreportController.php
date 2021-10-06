<?php

namespace App\Http\Controllers;

use App\Exports\Empexport;
use Illuminate\Http\Request;
use App\Models\Emp;
use Illuminate\Support\Facades\DB;

use Excel;
class EmpreportController extends Controller
{
    //

public function export(){
    // return Excel::download(new Empexport,'emp.xlsx');

    $variable=[1,2];

foreach ($variable as $key => $value) {
    $path="public/media/{$value}emp1212.xlsx";
     Excel::store(new Empexport,$path);
}
}
}
