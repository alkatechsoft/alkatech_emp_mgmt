<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use Illuminate\Http\Request;
use App\Models\Emp_personal_info;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mail;
use Crypt;
class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //\
        if($request->session()->has('USER_LOGIN')){
            return redirect('user/dashboard');
            }else{
            return view('emp.login');
            }
            return view('emp.login');
    }
    public function user_login_process(Request $request)
    {
    
        $result=Emp::where(['email'=>$request->post('l_email')])->get();
        if(isset($result[0])){
            $db_password=Crypt::decrypt($result[0]->password);
            $status=$result[0]->status;
            $is_verify=$result[0]->is_verify;
            if($is_verify==0){
            return response()->json(["status"=>"error", "msg"=>"Please verify your email"]);
            }
            if($status==0){
            return response()->json(["status"=>"error", "msg"=>"Your accout is deactivated"]);
                }
            if($db_password == $request->post('l_password')){
                $request->session()->put('USER_LOGIN',true);
                $request->session()->put('USER_ID',$result[0]->id);
                $request->session()->put('USER_NAME',$result[0]->name);
                return ["msg"=>"Login successfull", "status"=>"success"];
            }else{
                return ["msg"=>"Invalid password"];
            }
        }else{
            return ["msg"=>"Please enter valid email"];
        }
        if(isset($result['0']->id)){
            $request->session()->put('USER_LOGIN',true);
            $request->session()->put('USER_ID',$result['0']->id);
            print_r($result['0']->id);
            return redirect ('user/dashboard');

        } else {
            $request->session()->flash('error','Invalid login details');
            return redirect ('user');
         }
           
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_signup(Request $request)
    {
        //
    //   $valid = Validator::make($request->all(),[
    //         "name"=>'required',
    //         "email"=>'required|email|unique:emps.email',
    //         "password"=>'required'
    //     ]);


        $is_email_exist=Emp::where(['email'=>$request->post('email')])->get();
        if(isset($is_email_exist[0])){
            return ["msg"=>"Email exist"];
        }else{
            $emp_signup = new Emp();
            $emp_signup->name = $request->post('name');
            $emp_signup->email = $request->post('email');
            $emp_signup->password = Crypt::encrypt($request->post('password'));
            $rand_id=rand(111111111,999999999);
            $emp_signup->rand_id = $rand_id;
            $emp_signup->save();
            $data=['name'=>'sudhir','rand_id'=>$rand_id];
            $user['to']=$request->post('email');
            Mail::send('mail', $data, function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('verify email');
            });
            return ["msg"=>"Registerd successfully please check your email for verification"];
        }
           
    }
    function dashboard(){
       return view('emp.dashboard');
    }
    function email_verification(Request $request,$id){
        $result = DB::table('emps')
        ->where(['rand_id'=>$id])
        ->get();
        if(isset($result[0])){
            DB::table('emps')
            ->where(['id'=>$result[0]->id])
            ->update(['is_verify'=>1,'rand_id'=>'']);
            return view('emp.email_verified');
        } else {
            return redirect('/user');
           
        }
       
    }
    function forgot_password_process(Request $request){
        $email_exist=Emp::where(['email'=>$request->post('forgot_password_email'),'is_verify'=>1])->get();
        if(isset($email_exist[0])){
            $rand_id=rand(111111111,999999999);
            DB::table('emps')
            ->where(['email'=>$request->forgot_password_email])
            ->update(['is_forgot_password'=>1,'rand_id'=>$rand_id]);

            $data=['name'=>'sudhir','rand_id'=>$rand_id];
            $user['to']=$request->post('forgot_password_email');
            Mail::send('forgot_password', $data, function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Forgot Password');
            });
            return response()->json(["status"=>"success", "msg"=>"Please check your email id"]);

        } else {
            return response()->json(["status"=>"error", "msg"=>"Email id not registerd"]);
        }
    }
    function forgot_password_process_change(Request $request,$id){
        $result = DB::table('emps')
                ->where(['rand_id'=>$id,'is_forgot_password'=>1])
                ->get();
        if(isset($result[0])){
            $request->session()->put('FORGOT_PASSWORD_USER_ID', $result[0]->id);
           return view('emp.forgot_password_change');
        } else{
            return redirect('/');
        }
    }
    function forgot_password_process_change_update(Request $request){
        $result = DB::table('emps')
        ->where(['id'=>$request->session()->get('FORGOT_PASSWORD_USER_ID')])
        ->update(
            [
                'is_forgot_password'=>0,
                'password'=>Crypt::encrypt($request->post('f_password')),
                'rand_id'=>''
            ]
        );
        return response()->json(["status"=>"success", "msg"=>"Password Changed"]);
}
function personal_info(){
    $personal_info=Emp_personal_info::where(['emp_id'=>session('USER_ID')])->get();

    if(isset($personal_info[0]->id)){
    return view('emp.personal_info')->with('personal_info',$personal_info);
    }
    return view('emp.manage_personal_info_process');

 }
 function manage_personal_info_process(Request $request){
    $personal_info = new Emp_personal_info();
    $personal_info->emp_id=session('USER_ID');
    $personal_info->p_address=$request->post('p_address');
    $personal_info->p_state=$request->post('p_state');
    $personal_info->p_city=$request->post('p_city');
    $personal_info->p_pincode=$request->post('p_pincode');
    $personal_info->contact='2323';
    $personal_info->guardian_contact='1212';

    if($request->is_it_curent_address){
        $personal_info->c_address=$request->post('p_address');
        $personal_info->c_state=$request->post('p_state');
        $personal_info->c_city=$request->post('p_city');
        $personal_info->c_pincode=$request->post('p_pincode');
    
    } else{
        $personal_info->c_address=$request->post('c_address');
        $personal_info->c_state=$request->post('c_state');
        $personal_info->c_city=$request->post('c_city');
        $personal_info->c_pincode=$request->post('c_pincode');
    }


     if($personal_info->save()){
        $request->session()->put('MY_PERSONAL_INFO',true);
        return response()->json(["status"=>"success", "msg"=>"personal info saved successfully"]);
     } else{
        return response()->json(["status"=>"error", "msg"=>"something went wrong"]);
     }


 
 }


}
