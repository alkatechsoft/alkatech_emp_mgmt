@extends('emp/layout')
@section('page_title','Academic | Info')
@section('professional_info_selected','active')
@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>PROFESSIONAL INFORMATION</b>
               <a href="{{url('user/manage-professional-info')}}/{{session('USER_ID')}}"  class="btn-sm btn btn-primary" style="
               position: absolute;
               right: 14px;
               margin: 0 auto;
               top: 8px;
           "><i class="fa fa-edit"></i></a>
                </h3>
              </div>
            
              <div class="row">
                <div class="col-12 ">
                  <div class="mt-3 ml-3 mr-3 card-primary card-outline card card-body">
                    <strong><i class="fa fa-laptop" aria-hidden="true"></i>
                      COMPANY NAME</strong>
    
                    <p class="text-muted">
                      {{$professional_info[0]->company_name}}
                    </p>
                    <hr>
                    
                    <strong> FROM</strong>
    
                    <p class="text-muted">
                      <span class="tag tag-danger">{{$professional_info[0]->from_date}}</span>
                    </p>
    
                    <hr>
    
                    <strong> TO</strong>
    
                    <p class="text-muted">{{$professional_info[0]->to_date}}</p>

                    <div class="row"> 
                    <div class="col-xl-6">
                    <label> EXPERIENCE LETTER</label>

                    <div class="form-group">
                        <embed
                        id="experience_letter_preview1" 
                        src="{{url('storage/media').'/'.$professional_info[0]->experience_letter}}" 
                        type="application/pdf"
                        frameBorder="0"
                        scrolling=""
                        height="400px"
                        width="100%"
                    ></embed>
                    {{-- <img style="height:auto; width:200px;"src="{{url('storage/media').'/'.$professional_info[0]->experience_letter}}" class="mt-2 text-muted"> --}}
                    </div>
                    </div>
                    <div class="col-xl-6">
                    <label> SALLARY SLIP</label>

                      <div class="form-group">
                    {{-- <img style="height:auto; width:200px;"src="{{url('storage/media').'/'.$professional_info[0]->sallary_slip}}" class="mt-2 text-muted"> --}}
                        <embed
                        id="experience_letter_preview1" 
                        src="{{url('storage/media').'/'.$professional_info[0]->sallary_slip}}" 
                        type="application/pdf"
                        frameBorder="0"
                        scrolling=""
                        height="400px"
                        width="100%"
                    ></embed>
                  </div>
                    </div>
                </div>
              
              </div>
              
              <!-- /.card-body -->
            </div>
          
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
