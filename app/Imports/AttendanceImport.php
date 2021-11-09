<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
            //
            'emp_id'=>$row['emp_id'],
            'date'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
            'in_time'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['in_time']),
            'out_time'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['out_time'])
        ]);
 
    }
}
