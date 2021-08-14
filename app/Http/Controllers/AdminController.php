<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Emp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Crypt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        // return count($request->date);
        $request->validate([
            'emp_id'=>'required',
            'date'=>'required',
            'in_time'=>'required',
            'out_time'=>'required'
        ]);
        for ($i=0; $i < count($request->date); $i++) { 
            $data=[
            'emp_id'=>$request->emp_id,
            'date'=> $request->date[$i],
            'in_time'=>$request->in_time[$i],
            'out_time'=>$request->out_time[$i]
            ];
          $result=DB::table('attendances')->insert($data);
        }        
        return response()->json(["status"=>"success", "msg"=>"Attendance submited successfully"]);

    }
    public function attendance_reporting(Request $request)
    {
        //
    return view('admin.attendance_reporting');
    }

    public function attendance_reporting_process(Request $request)
    {
        if ($search == '') {
            $filterd_data = Attendance::orderby('name','asc')
           ->select('id','name')
           ->limit(5)
           ->get();
       
       }else{
           $filterd_data = Attendance::orderby('name','asc')
           ->select('id','name')
           ->where('name','like','%'.$search.'%')
           ->limit(5)
           ->get();
           }
           // return response()->json(["status"=>"success", "data"=>$employees_by_search]);
        return response()->json(["status"=>"success", "data"=>$filterd_data]);

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
}
