<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Emp;
use App\Imports\AttendanceImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use Crypt;
use Exporter;
use Excel;
use Cyberduck\LaravelExcel\Contract\SerialiserInterface;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataexport(){
        // $query=collect(DB::select('select * from attendances', [1]));
        // $query = DB::select('select * from attendances', [1]);
        // $query = DB::select('select * `id` from attendances')->get();
        $query = collect(DB::table('attendances')->select('id', 'date')->get());
       
         $variable=[1,2];
         foreach ($variable as $key => $value) {
             # code...
        $excel = Exporter::make('Excel');
        $yourFileName="abc.xlsx";
        // $excel->loadQuery($query);
        // $excel->stream($yourFileName);
        // return 'public/media/'.$yourFileName;

        $excel->save('public/media/','123.xlsx');
        // Exporter::make('Excel')->load(collect($query))->stream($yourFileName);
          
         }






        // $excel->loadQuery($query);
        // $excel->stream($yourFileName);
        // return $excel->save('public/media/'+$yourFileName);
        // return $collection = Exporter::make('Excel')->load($query)->setSerialiser(new ApplicantSerializer)->stream($yourFileName);

    }

    public function send_report_alert_mail_to_emp(){
    //   return public_path();
    $filename='abc';
    $count1=1;
    $count2=2;
    // return storage_path('app/public/media/abc.xlsx');
        $emp_email='sudhirsinghkumar11@gmail.com';
        $data=['name'=>'sudhir', "email"=>'sudhirsinghkumar11@gmail.com'];
        $user['to_emp_email'] = 'sudhirsinghkumar11@gmail.com';
        // $files = [
        //     public_path('public/media/abc.xlsx'),
        //     public_path('public/media/abc1.xlsx'),
        // ];
        $files = [
            storage_path('app/public/media/'.$filename.$count1.'.xlsx'),
            storage_path('app/public/media/'.$filename.$count2.'.xlsx'),
        ];
        Mail::send('email.send_report_alert_mail_to_emp', $data, function($messages) use ($user,$files){
           $messages->to($user['to_emp_email']);
           $messages->subject('Report details');
           foreach ($files as $file){
            $messages->attach($file);
        }
       }); 
       return 'Report send successfully';
    }
    public function index(Request $request)
    {
        //
        if($request->session()->has('ADMIN_LOGIN')){
        return redirect('admin/dashboard');
        }else{
        return view('admin.login');
        }
        return view('admin.login');
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $email = $request->post('email');
        $password = $request->post('password');
       
        $result=Admin::where(['email'=>$email])->get();
        if(isset($result[0])){
            $db_password=Crypt::decrypt($result[0]->password);
            if($db_password == $request->post('password')){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result[0]->id);
                return redirect ('admin/dashboard');
            } else {
                $request->session()->flash('error','Invalid login details');
                return redirect ('admin');
            }
        }
            if(isset($result[0]->id)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result[0]->id);
                return redirect ('admin/dashboard');
    
            } else {
                $request->session()->flash('error','Invalid login details');
                return redirect ('admin');
             }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
 
    public function emp_list()
    {
        //
        $employees=Emp::all();
        return view('admin.emp')->with('employees',$employees);
    }
    public function status(Request $request,$status,$id)
    {
        //
        echo $status;
       if($status == 1){
        $msg = 'Employee activated successfuly';
       }else{
        $msg = 'Employee deactivated successfuly';
       }
        
        $model=Emp::find($id);
        $model->status=$status;
        $model->save();
        
        $request->session()->flash('message',$msg);
        return redirect('admin/emp');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function upload_attendance(Request $request)
    {
        //
        return view('admin.upload_attendance');

    }
    public function upload_attendance_process(Request $request){

        $request->validate([
            'emp_id'=>'required',
            'date'=>'required',
            'in_time'=>'required',
            'out_time'=>'required'
        ]);
        if($request->__update_id>0){
        $updated_result = DB::table('attendances')
        ->where('id',$request->__update_id)
        ->where('emp_id',$request->emp_id)
        ->where('date',$request->date[0])
        ->update(['in_time'=>$request->in_time[0],'out_time'=>$request->out_time[0]]);
        // return $updated_result;
        if($updated_result){
            return response()->json(["status"=>"updated", "emp_id"=>$request->emp_id, "code"=>$updated_result, "msg"=>"updated successfully"]);
        }else{
            return response()->json(["status"=>"no_changed_data", "code"=>$updated_result, "msg"=>"No change found"]);
        }

        }else{
        for ($i=0; $i < count($request->date); $i++) { 
            $data=[
            'emp_id'=>$request->emp_id,
            'date'=> $request->date[$i],
            'in_time'=>$request->in_time[$i],
            'out_time'=>$request->out_time[$i]
            ];
          $result=DB::table('attendances')->insert($data);
        }
      }        
        return response()->json(["status"=>"success", "emp_id"=>$request->emp_id, "msg"=>"Attendance submited successfully"]);
    }
    public function attendance_reporting(Request $request)
    {
        //
    return view('admin.attendance_reporting');
    }

    public function attendance_reporting_process1(Request $request)
    {
        $get_data=$request;
        $data = explode("|",$get_data);
        if($data[1] !='' && $data[2] !='' && $data[3] !=''){
        // $filterd_data = $filterd_data = Attendance::whereBetween('date',[$data[2],$data[3]])->get();
        $filterd_data = $filterd_data = Attendance::where('date', '>=', $data[2])
                                                    ->where('date', '<=', $data[3])
                                                    ->where('emp_id', $data[1])
                                                    ->get();
        return response()->json(["status"=>"success", "data"=>$filterd_data]);

       }
       else
       { 
        return response()->json(["status"=>"error", "data"=>'Please select required details']);

        }

       }
       public function attendance_filter_before_upload_process(Request $request)
       {
           $get_data=$request;
           $data = explode("|",$get_data);
           if($data[1] !='' && $data[2] !=''){
           // $filterd_data = $filterd_data = Attendance::whereBetween('date',[$data[2],$data[3]])->get();
           $filterd_data = $filterd_data = Attendance::where('date', '=', $data[2])
                                                       ->where('emp_id', $data[1])
                                                       ->get();
            if(isset($filterd_data[0]->id)){
                return response()->json(["status"=>"success", "data"=>$filterd_data]);
            } else{ 
            return response()->json(["status"=>"error", "data"=>'']);
            }
   
          }
        }
   
       public function attendance_reporting_process(Request $request)
       {
        $filterd_data =   DB::select(DB::raw("SELECT TIMEDIFF(`attendances`.`out_time`,`attendances`.`in_time`) AS 'working_hour',`attendances`.`date`,`attendances`.`in_time`,`attendances`.`out_time` FROM `attendances` where `attendances`.`emp_id` = '$request->emp_id' AND `attendances`.`date` >= '$request->from' AND `attendances`.`date` <= '$request->to'"));
        // return $dataaa;
           // $filterd_data = $filterd_data = Attendance::whereBetween('date',[$data[2],$data[3]])->get();
        //    $filterd_dataa = $filterd_data = Attendance::where('date', '>=', $request->from)
        //                                                ->where('date', '<=', $request->to)
        //                                                ->where('emp_id', $request->emp_id)
        //                                                ->get();
            $emp_name =   DB::select(DB::raw("SELECT `name` FROM `emps` where `emps`.`id` = '$request->emp_id'"));

           return response()->json(["status"=>"success", "data"=>$filterd_data,"emp_name"=>$emp_name]);
          }

    public function updatepassword()
    {
        $r = Admin::find(1);
        $r->password=Hash::make('admin');
        $r->save();
    }
    public function search_employee(Request $request)
    {
 $search= $request->search;
//  return $search.'serach result';
if ($search == '') {
     $employees_by_search = Emp::orderby('name','asc')
    ->select('id','name')
    ->limit(5)
    ->get();

}else{
    $employees_by_search = Emp::orderby('name','asc')
    ->select('id','name')
    ->where('name','like','%'.$search.'%')
    ->limit(5)
    ->get();
    }
    // return response()->json(["status"=>"success", "data"=>$employees_by_search]);
    $response= array();
    foreach ($employees_by_search as $employee) {
    $response[] = array(
    'id'=>$employee->id,
    'text'=>$employee->name
    );
}
  return response()->json($response);
}

public function create_user(Request $request){
     $is_user_email_exist=Emp::where(['email'=>$request->post('email')])->get();
    if(isset($is_user_email_exist[0])){
        return response()->json(["status"=>"error", "msg"=>"User email allready exist"]);
    }else{
     $is_official_email_exist=Emp::where(['official_email'=>$request->post('official_email')])->get();
    if(isset($is_official_email_exist[0])){
        return response()->json(["status"=>"error", "msg"=>"Official email allready exist"]);
    }else{
        $emp_create = new Emp();
        $emp_create->name = $request->post('name');
        $emp_create->email = $request->post('email');
        $emp_create->official_email = $request->post('official_email');
        $emp_create->password = Crypt::encrypt($request->post('password'));
        $rand_id=rand(111111111,999999999);
        $emp_create->rand_id = $rand_id;
        $emp_create_status = $emp_create->save();
        $this->send_login_details_to_emp($request, $emp_create->id);
       if($emp_create_status){
        return response()->json(["status"=>"success", "msg"=>"User created successfully"]);
       }else {
        return response()->json(["status"=>"error", "msg"=>"Something went wrong"]);
       }

    }
}
  
}
public function send_login_details_to_emp($request, $id){
     $emp_detail=Emp::where(['id'=>$id])->get();
     $rand_id= $emp_detail[0]->rand_id;
     $password=Crypt::decrypt($emp_detail[0]->password);
     $personal_email=$emp_detail[0]->email;
     $official_email=$emp_detail[0]->official_email;
     $data=['name'=>'sudhir','rand_id'=>$rand_id,"email"=>$personal_email, "official_email"=>$official_email, "password"=>$password];
     $user['to_personal_email'] = $personal_email;
     $user1['to_official_email'] = $official_email;
     Mail::send('email.send_login_mail_to_emp', $data, function($messages) use ($user){
        $messages->to($user['to_personal_email']);
        $messages->subject('Login details');
    });  
    Mail::send('email.verify_mail', $data, function($messages) use ($user1){
        $messages->to($user1['to_official_email']);
        $messages->subject('Verify Email');
    });
    $msg = "Login details send  successfully";
    $request->session()->flash('message',$msg);

    return redirect('admin/emp');
}


public function import_attendance_form(){

return view('admin.import_attendance_form');
}

public function import_attendance_form_process(Request $request){
    Excel::import(new AttendanceImport, $request->file);
    $msg = "Record Imported successfully";
    $request->session()->flash('message',$msg);

    return redirect('admin/import-attendance');
    }
}
