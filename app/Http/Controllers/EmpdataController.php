<?php

namespace App\Http\Controllers;

use App\Models\Empdata;
use Illuminate\Http\Request;

class EmpdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emp_registration_form()
    {
        //
       return view('frontend.emp_registration_form');
    }
    public function emp_registration_form_process(Request $request)
    {
        //
        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'guardian_contact'=>'required',
            'p_address'=>'required',
            'p_state'=>'required',
            'p_city'=>'required',
            'p_pincode'=>'required',
            'c_address'=>'required',
            'c_state'=>'required',
            'c_city'=>'required',
            'c_pincode'=>'required',
            'resume'=>'required|mimes:jpej,jpg,png,pdf,docx,dox',
            'higherqualification_ctft'=>'required|mimes:jpej,jpg,png,pdf,docx,dox',
            'professional_ctft'=>'mimes:jpej,jpg,png,pdf,docx,dox',
            'exp_letter'=>'mimes:jpej,jpg,png,pdf,docx,dox',
            'salary_slip'=>'mimes:jpej,jpg,png,pdf,docx,dox',
            ]);
            $empdata = new Empdata();
            $msg = "Registration Successfull";
            $resume=$request->file('resume');
            $extn1=$resume->extension();
            $resume_name='resume'.time().'.'.$extn1;

            $higherqualification_ctft=$request->file('higherqualification_ctft');
            $extn2=$higherqualification_ctft->extension();
            $higherqualification_ctft_name='higherqualification_ctft'.time().'.'.$extn2;

            $professional_ctft=$request->file('professional_ctft');
            $extn3=$professional_ctft->extension();
            $professional_ctft_name='professional_ctft'.time().'.'.$extn3;

            $exp_letter=$request->file('exp_letter');
            $extn4=$exp_letter->extension();
            $exp_letter_name='exp_letter'.time().'.'.$extn4;

            $salary_slip=$request->file('salary_slip');
            $extn5=$salary_slip->extension();
            $salary_slip_name='salary_slip'.time().'.'.$extn5;

            $empdata->f_name=$request->post('f_name');
            $empdata->l_name=$request->post('l_name');
            $empdata->email=$request->post('email');
            $empdata->contact=$request->post('contact');
            $empdata->guardian_contact=$request->post('guardian_contact');
            $empdata->last_company=$request->post('last_company');

            $empdata->p_address=$request->post('p_address');
            $empdata->p_state=$request->post('p_state');
            $empdata->p_city=$request->post('p_city');
            $empdata->p_pincode=$request->post('p_pincode');

            $empdata->c_address=$request->post('c_address');
            $empdata->c_state=$request->post('c_state');
            $empdata->c_city=$request->post('c_city');
            $empdata->c_pincode=$request->post('c_pincode');

            $empdata->resume=$resume_name;
            $empdata->higherqualification_ctft=$higherqualification_ctft_name;
            $empdata->professional_ctft=$professional_ctft_name;
            $empdata->exp_letter=$exp_letter_name;
            $empdata->salary_slip=$salary_slip_name;
            $resume->storeAS('/public/media',$resume_name);

            $salary_slip->storeAS('/public/media',$salary_slip_name);
            $higherqualification_ctft->storeAS('/public/media',$higherqualification_ctft_name);
            $professional_ctft->storeAS('/public/media',$professional_ctft_name);
            $exp_letter->storeAS('/public/media',$exp_letter_name);
            $empdata->save();
            $request->session()->flash('message',$msg);

       return redirect('/registration');
    }

    public function create()
    {
        //
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
     * @param  \App\Models\Empdata  $empdata
     * @return \Illuminate\Http\Response
     */
    public function show(Empdata $empdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empdata  $empdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Empdata $empdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empdata  $empdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empdata $empdata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empdata  $empdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empdata $empdata)
    {
        //
    }
}
