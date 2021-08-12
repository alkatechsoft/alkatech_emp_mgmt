@extends('admin/layout')
@section('page_title','Admin | Dashboard')
@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Attendance Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>UPLOAD ATTANDANCE</b></h3>
              </div>
              <!-- /.card-header -->
              <form id="upload_attendance_form">
                @csrf

              <div class="card-body">
                <div class="form-group">
                  <label>SELECT EMPLOYEE</label>
                  <select name="emp_id" id="emp_search" class="form-control select2" style="width: 100%;">
                    <option id="search_value" value="0">select</option>
                  </select>
                </div>
              
              <div id="wrap" class="card-body">
                
                <div class="row" id="TextBoxContainer">
                  <div class="col-4">
                    <input type="date" name="date[]" class="form-control" required  placeholder="">
                  </div>
                  <div class="col-4">
                    <input type="time" name="in_time[]" class="form-control" required placeholder="">
                  </div>
                  <div class="col-4">
                    <input type="time" name="out_time[]" class="form-control" required placeholder="">
                  </div>
                </div>
	            <input type="hidden" id="box_count" value="1">
 
              </div>
            <div class="row">
              <div class="col-2 mb-4 ml-4" style="margin: 0">
                <a onclick="add_more()" class="btn btn-primary btn-block start"><i class="fa fa-plus"></i></a>
              </div> 
            </div>
              <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary btn-block start">UPLOAD</button>
              </div>
            </div>
              </form>
              <!-- /.card-body -->
             
           
            </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
 
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
 
  
