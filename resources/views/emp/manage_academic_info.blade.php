@extends('emp/layout')
@section('page_title','Emp | Update personal info')
@section('academic_info_selected','active')


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
                <h3 class="card-title"><b>MANAGE PERSONAL INFORMATION</b></h3>
                <a href="{{url('user/academic-info')}}" class="btn-sm btn-primary" style="float: right; position: absolute;right: 14px;margin: 0 auto;top: 8px;">  <i class="fa fa-arrow-left"  aria-hidden="true"></i></a>

              </div>
              <!-- /.card-header -->
              <form id="submit_update_academic_info_form">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                          <label for="highest_qualification">HIGHEST QUALIFICATION*</label>
                          <input type="text" name="highest_qualification" class="form-control" id="highest_qualification" 
                          value="{{$update_academic_info[0]->highest_qualification}}" 
                          oninput="field_validation('this','highest_qualification','error_highest_qualification')" 
                          placeholder="Permanent address" />
                          <span id="error_highest_qualification" class="text-danger" role="alert">
                            
                         </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                        <label for="p_address">UNIVERSITY/COLLEGE*</label>
                        <input type="text" name="university_college" class="form-control" id="university_college" value="{{$update_academic_info[0]->university_college}}" oninput="field_validation('this','university_college','error_university_college')" placeholder="City">
                        <span id="error_university_college" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="p_state">FROM*</label>
                        <input type="date" name="from_date" class="form-control" id="from_date" value="{{$update_academic_info[0]->from_date}}" oninput="date_validation('this','from_date','error_from_date')" placeholder="State">
                        <span id="error_from_date" class="text-danger" role="alert">
                            
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="p_pincode">TO*</label>
                        <input type="date" name="to_date" class="form-control" id="to_date" value="{{$update_academic_info[0]->to_date}}" oninput="date_validation('this','to_date','error_to_date')" placeholder="Pincode">
                        <span id="error_to_date" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="qualification_certificate">Upload certificate/marksheet copy*</label>

                        <input type="file" name="qualification_certificate" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="qualification_certificate" oninput="pincode_validation('this','qualification_certificate','error_qualification_certificate')" 
                        onchange="document.getElementById('upload_ctft').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="upload certificate">
                         {{-- <img style="height:auto; width:200px;"src="{{url('storage/media').'/'.$update_academic_info[0]->qualification_certificate}}" class="mt-2 text-muted"> --}}

                        {{-- <span id="error_qualification_certificate" class="text-danger" role="alert">
                        </span> --}}
                        <img  id="upload_ctft" src="{{url('storage/media').'/'.$update_academic_info[0]->qualification_certificate}}" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" />
                      </div>
                    </div>
                </div>
          
                    <div class="col-xl-4">
                        <div class="form-group">
                          <input type="hidden" name="update_user_id" value="{{session('USER_ID')}}">
                            <button class="btn btn-primary" type="submit" >SAVE</button>
                       
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
