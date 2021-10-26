@extends('emp/layout')
@section('page_title','emp | Dashboard')
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
                <h3 class="card-title"><b>MANAGE ACADEMIC INFORMATION</b></h3>
              </div>
              <!-- /.card-header -->
              <form id="submit_academic_info_form" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                          <label for="highest_qualification">Highest qualification*</label>
                          <input type="text" name="highest_qualification" class="form-control" name="highest_qualification" id="highest_qualification" oninput="field_validation('Address','highest_qualification','error_p_address')" placeholder="Highest qualification" />
                          <span id="error_highest_qualification" class="text-danger" role="alert">
                            
                         </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                        <label for="university_college">University/College*</label>
                        <input type="text" name="university_college" class="form-control" id="university_college" oninput="field_validation('city','p_city','error_p_city')" placeholder="City">
                        <span id="error_university_college" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="from_date">From*</label>
                        <input type="date" name="from_date" class="form-control" id="from_date" oninput="field_validation('state','p_state','error_p_state')" placeholder="State">
                        <span id="error_from_date" class="text-danger" role="alert">
                            
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="to_date">To*</label>
                        <input type="date" name="to_date" class="form-control" id="to_date" oninput="pincode_validation('pincode','p_pincode','error_p_pincode')" placeholder="Pincode">
                        <span id="error_to_date" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="qualification_certificate">Upload certificate/marksheet copy*</label>
                        <input type="file" name="qualification_certificate" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="qualification_certificate" oninput="pincode_validation('pincode','p_pincode','error_p_pincode')" placeholder="Pincode">
                        <span id="error_qualification_certificate" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                   
                </div>
                   
                    <div class="col-xl-4">
                        <div class="form-group">
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
