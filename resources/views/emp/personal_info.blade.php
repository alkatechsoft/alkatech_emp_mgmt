@extends('emp/layout')
@section('page_title','Personal | Info')
@section('personal_info_selected','active')
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
                <h3 class="card-title"><b>PERSONAL INFORMATION</b>
                  <a href="{{url('user/manage-personal-info')}}/{{session('USER_ID')}}"  class="btn-sm btn btn-secondary" style="
                  position: absolute;
                  right: 14px;
                  margin: 0 auto;
                  top: 8px;
              ">UPDATE</a>
                </h3>
              </div>
            
              <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="mt-3 ml-3 card-primary card-outline card card-body">
                    <strong><i class="fa fa-map-marker" aria-hidden="true"></i>
                      PERMANENT ADDRESS</strong>
    
                    <p class="text-muted">
                      {{$personal_info[0]->p_address}}
                    </p>
                    <hr>
                    <strong>CITY</strong>
    
                    <p class="text-muted">{{$personal_info[0]->p_city}}</p>
    
                    <hr>
    
                    <strong> STATE</strong>
    
                    <p class="text-muted">
                      <span class="tag tag-danger">{{$personal_info[0]->p_state}}</span>
                    </p>
    
                    <hr>
    
                    <strong> PINCODE</strong>
    
                    <p class="text-muted">{{$personal_info[0]->p_pincode}}</p>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="mt-3 mr-3 card-primary card-outline card card-body">
                    <strong><i class="fa fa-map-marker" aria-hidden="true"></i>
                      CURRENT ADDRESS</strong>
    
                    <p class="text-muted">
                      {{$personal_info[0]->c_address}}
                    </p>
    
                    <hr>
    
                    <strong>CITY</strong>
    
                    <p class="text-muted">{{$personal_info[0]->c_city}}</p>
    
                    <hr>
    
                    <strong> STATE</strong>
    
                    <p class="text-muted">
                      <span class="tag tag-danger">{{$personal_info[0]->c_state}}</span>
                    </p>
    
                    <hr>
    
                    <strong> PINCODE</strong>
    
                    <p class="text-muted">{{$personal_info[0]->c_pincode}}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mt-3 ml-3 mr-3 card-primary card-outline card card-body">
                   
                    <strong>PERSONAL CONTACT</strong>
    
                    <p class="text-muted">{{$personal_info[0]->contact}}</p>
    
                    <hr>
    
                    <strong> GUARDIAN CONTACT</strong>
    
                    <p class="text-muted">
                      <span class="tag tag-danger">{{$personal_info[0]->guardian_contact}}</span>
                    </p>
    
                    <hr>
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
