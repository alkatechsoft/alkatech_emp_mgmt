<?php

namespace App\Exports;
use App\Models\Emp;
use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class Empexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        //  return Attendance::where('date', '=', '2021-09-30')
        // ->get();
        // DB::table('attendances')
// wrap array in collection because query give result in array and we are telling export script to get your data from Collection
 $value = 11;
    # code...
//  return collect (DB::select('select * from attendances where date > current_date - interval 7 day AND id >'.$value, [1]));
 return collect (DB::select('select * from attendances'));
 
    }
   
}
