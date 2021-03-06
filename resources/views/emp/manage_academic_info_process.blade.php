@extends('emp/layout')
@section('page_title','emp | Update Academic Info')
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
                          <input type="text" name="highest_qualification" class="form-control" name="highest_qualification" id="highest_qualification" oninput="field_validation('this','highest_qualification','error_highest_qualification')" placeholder="Highest qualification" />
                          <span id="error_highest_qualification" class="text-danger" role="alert">
                            
                         </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                        <label for="university_college">University/College*</label>
                        <input type="text" name="university_college" class="form-control" id="university_college" oninput="field_validation('this','university_college','error_university_college')" placeholder="City">
                        <span id="error_university_college" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="from_date">From*</label>
                        <input type="date" name="from_date" class="form-control" id="from_date" oninput="date_validation('correct','from_date','error_from_date')" placeholder="State">
                        <span id="error_from_date" class="text-danger" role="alert">
                            
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="to_date">To*</label>
                        <input type="date" name="to_date" class="form-control" id="to_date" oninput="date_validation('correct','to_date','error_to_date')" placeholder="Pincode">
                        <span id="error_to_date" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="qualification_certificate">Upload certificate/marksheet copy*</label>

                        <input type="file" name="qualification_certificate" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="qualification_certificate" oninput="file_validation('this','qualification_certificate','error_qualification_certificate')" 
                        onchange="document.getElementById('upload_ctft').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="upload certificate">
                        <span id="error_qualification_certificate" class="text-danger" role="alert">
                        </span>
                        {{-- <img  id="upload_ctft" src="" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" /> --}}
                        <embed
                          id="upload_ctft" 
                          src=""
                          type="application/pdf"
                          frameBorder="1"
                          scrolling="auto"
                          height="auto"
                          width="100%"
                      ></embed>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="professional_certificate">Upload professional cerificate copy*</label>

                        <input type="file" name="professional_certificate" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="professional_certificate" oninput="file_validation('this','professional_certificate','error_professional_certificate')" 
                        onchange="document.getElementById('upload_professional_ctft').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="upload certificate">
                        <span id="error_professional_certificate" class="text-danger" role="alert">
                        </span>
                        {{-- <img  id="upload_ctft" src="" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" /> --}}
                        <embed
                          id="upload_professional_ctft" 
                          src=""
                          type="application/pdf"
                          frameBorder="1"
                          scrolling="auto"
                          height="auto"
                          width="100%"
                      ></embed>
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
