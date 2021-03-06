@extends('admin/layout')
@section('page_title','Admin | Dashboard')
@section('import_form_selected','active')
@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        {{-- <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <a class="card-title"><b>IMPORT ATTENDENCE </b></a>
               
                <a data-toggle="tooltip" data-placement="left" 
                title="Please download demo file and upload with same field and type*"
                 href="{{url('storage/demo_files/attendance.xlsx')}}" 
                 class="btn btn-primary" 
                 style="padding: 0px 10px; float: right;" download><b><i class="fa fa-download"></i>&nbsp;&nbsp;demo file</b></a>
               
              </div>
              {{-- <div class="mb-3 card-header" style="">
                <a class="card-title"><b>Import Jobs</b></a>
                <a  href="{{url('storage/media/sitelist.xlsx')}}" class="btn btn-primary" style="float: right;" download><b><i class="fa fa-download"></i>&nbsp;&nbsp;demo file</b></a>
                </div> --}}
              @if(session('message')!==null)
                            <div class="alert alert-success m-3" role="alert">
                                {{ session('message') }}
                            </div>
              @endif
              <!-- /.card-header -->
            
              <div class="card-body">
                <form method="POST"  action="{{ route('admin.import_attendance_form_process') }}" enctype="multipart/form-data" class="">
                  @csrf
                  <input type="file" name="file" required accept=".xlsx" clas s="form-control">
                  <br>
                  <br>
                  <button type="submit" class="btn-md btn btn-md btn-primary"><b>UPLOAD</b></button>
                </form>
              </div>
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
