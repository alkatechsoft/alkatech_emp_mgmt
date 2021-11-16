@extends('emp/layout')
@section('page_title','Emp | Update personal info')
@section('professional_info_selected','active')

@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        {{-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div> --}}
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>MANAGE PROFESSIONAL INFORMATION.</b></h3>
               <a href="{{url('user/professional-info')}}" class="btn-sm btn-primary" style="float: right; position: absolute;right: 14px;margin: 0 auto;top: 8px;">  <i class="fa fa-arrow-left"  aria-hidden="true"></i></a>

              </div>
              <!-- /.card-header -->
              <form id="submit_update_professional_info_form">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                          <label for="p_address">Company Name*</label>
                          <input type="text" name="company_name" class="form-control" name="p_address" id="company_name" value="{{$update_professional_info[0]->company_name}}" oninput="field_validation('this','company_name','error_company_name')" placeholder="Permanent address" />
                          <span id="error_company_name" class="text-danger" role="alert">
                            
                         </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                        <label for="from_date">From*</label>
                        <input type="date" name="from_date" class="form-control" id="from_date" value="{{$update_professional_info[0]->from_date}}" oninput="date_validation('this','from_date','error_from_date')" placeholder="date">
                        <span id="error_from_date" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="to_date">To*</label>
                        <input type="date" name="to_date" class="form-control" id="to_date" value="{{$update_professional_info[0]->to_date}}" oninput="date_validation('this','to_date','error_to_date')" placeholder="date">
                        <span id="error_to_date" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="qualification_certificate">Upload experience letter*</label>

                        <input type="file" name="experience_letter" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="experience_letter" oninput="pincode_validation('this','qualification_certificate','error_qualification_certificate')" 
                        onchange="document.getElementById('upload_exp_letter').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="upload Experience letter">
                        {{-- <img  id="upload_exp_letter" src="{{url('storage/media').'/'.$update_professional_info[0]->experience_letter}}" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" /> --}}
                     <br>
                        <embed
                        id="upload_exp_letter" 
                        src="{{url('storage/media').'/'.$update_professional_info[0]->experience_letter}}" 
                        type="application/pdf"
                        frameBorder="0"
                        scrolling="auto"
                        height="400px"
                        width="100%"
                    ></embed>
                     
                     
                     
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="qualification_certificate">Upload sallary slip*</label>

                        <input type="file" name="sallary_slip" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="experience_letter" oninput="pincode_validation('this','qualification_certificate','error_qualification_certificate')" 
                        onchange="document.getElementById('upload_sallary_slip').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="upload Sallary Slip">
                        {{-- <img  id="upload_sallary_slip" src="{{url('storage/media').'/'.$update_professional_info[0]->sallary_slip}}" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" /> --}}
                        <br>
                        <embed
                        id="upload_sallary_slip" 
                        src="{{url('storage/media').'/'.$update_professional_info[0]->sallary_slip}}" 
                        type="application/pdf"
                        frameBorder="0"
                        scrolling=""
                        height="400px"
                        width="100%"
                    ></embed>
                      </div>
                    </div>
                   
                </div>
                  
                    
                    <div class="col-xl-4">
                        <div class="form-group">
                          <input type="hidden" name="update_user_id" value="{{session('USER_ID')}}">
                            <button class="btn btn-primary" type="submit" id="update_save_text_btn" >SAVE</button>
                       
                        </div>
              </div>
            </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
