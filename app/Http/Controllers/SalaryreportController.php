<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary_report;
use Illuminate\Support\Facades\DB;
use PDF;

class SalaryreportController extends Controller
{
    //
    public function downloadpdf(Request $request,$emp_id, $from_date,$to_date){
        // return $emp_id.' '.$from_date.' '.$to_date;
        $salary_report =   DB::select(DB::raw("SELECT TIMEDIFF(`attendances`.`out_time`,`attendances`.`in_time`) AS 'working_hour',`attendances`.`date`,`attendances`.`in_time`,`attendances`.`out_time`,`attendances`.`status` FROM `attendances` where `attendances`.`emp_id` = '$emp_id' AND `attendances`.`date` >= '$from_date' AND `attendances`.`date` <= '$to_date'"));
        $emp_info = DB::select(DB::raw("SELECT `emps`.id, `emps`.name,`emps`.email,`emps`.salary,status,`emp_personal_infos`.contact,`emp_personal_infos`.c_address,`emp_personal_infos`.c_city,`emp_personal_infos`.c_state,`emp_personal_infos`.c_pincode,`emp_personal_infos`.p_address,`emp_personal_infos`.p_city,`emp_personal_infos`.p_state,`emp_personal_infos`.p_pincode,`emp_personal_infos`.guardian_contact FROM emps LEFT JOIN emp_personal_infos ON emps.id=emp_personal_infos.emp_id LEFT JOIN emp_academic_infos ON emps.id=emp_academic_infos.emp_id LEFT JOIN emp_professional_infos ON emps.id=emp_professional_infos.emp_id WHERE emps.id='$emp_id'"));
        // return $emp_info[0]->salary;
        $absent_count = DB::select(DB::raw("SELECT COUNT(status) as leave_count FROM attendances where `attendances`.`emp_id` = '1' AND `attendances`.`date` >= '2021-12-1' AND `attendances`.`date` <= '2021-12-31' AND `attendances`.`status`='a'"));
        
        $month = explode("-", $from_date)['1'];
        $year = explode("-", $from_date)['0'];
        $no_of_days_this_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        // $salary_report {'salary_stats'}{'total_day'} = $no_of_days_this_month;
        // $salary_report {'salary_stats'}{'absent_count'} = $absent_count->leave_count;
        // $salary_report['total_day']=$no_of_days_this_month;
        // return $salary_report;
        // $emp = Salary_report::all();

        $salary_reports=[];
        $salary_reports['id']=$emp_info[0]->id;
        $salary_reports['from_date']=date("d-m-Y", strtotime($from_date));
        $salary_reports['to_date']=date("d-m-Y", strtotime($to_date));
        $salary_reports['full_name']=$emp_info[0]->name;
        $salary_reports['email']=$emp_info[0]->email;
        $salary_reports['contact']=$emp_info[0]->contact;
        $salary_reports['address']=$emp_info[0]->c_address.', <b>City:</b> '.$emp_info[0]->c_city.', <b>State:</b> '.$emp_info[0]->c_state.', <b>Pincode:</b> '.$emp_info[0]->c_pincode;
        $salary_reports['month_name']=date_format(date_create($from_date),"F");
        $salary_reports['absent_count']=$absent_count[0]->leave_count;
        $salary_reports['present_count']=$no_of_days_this_month-$absent_count[0]->leave_count;
        $salary_reports['net_salary']=round(($no_of_days_this_month-$absent_count[0]->leave_count)*($emp_info[0]->salary/$no_of_days_this_month));
        // return $salary_reports;
        view()->share('salary_report',$salary_report);
        $pdf = PDF::loadview('salary_report',compact('salary_reports'));
        return $pdf->download('salary_report.pdf');
    }
}
