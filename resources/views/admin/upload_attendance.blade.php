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
            <h1>DataTables</h1>
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
              <div class="card-body">
                <div class="form-group">
                  <label>SELECT EMPLOYEE</label>
                  <select name="emp_id" class="form-control select2" style="width: 100%;">
                    <option value="1">Alaska</option>
                    <option value="2">Delaware</option>
                    <option value="3">Tennessee</option>
                    <option value="4">Texas</option>
                  </select>
                </div>
              </div>
              <div class="card-body">
                
                  @csrf
                <div class="row" id="TextBoxContainer">
                  <div class="col-3">
                    <input type="date" name="date" class="form-control" required placeholder="">
                  </div>
                  <div class="col-3">
                    <input type="time" name="in_time" class="form-control" required placeholder="">
                  </div>
                  <div class="col-3">
                    <input type="time" name="out_time" class="form-control" required placeholder="">
                  </div>
                  <div class="col-3">
                    <button  id="btnAdd" class="btn btn-primary btn-block start"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;ADD </button>
                  </div>
                </div>
                
                <br>
                <div class="col-3">
                  <button type="submit" class="btn btn-primary btn-block start">UPLOAD</button>
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
 
  
