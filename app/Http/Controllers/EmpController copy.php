<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use Illuminate\Http\Request;
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
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp $emp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emp $emp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp $emp)
    {
        //
    }
}
