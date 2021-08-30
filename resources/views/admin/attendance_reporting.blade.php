@extends('admin/layout')
@section('page_title','Admin | Attendance  | Report')
@section('attendance_filter_selected','active')

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
              <li class="breadcrumb-item active">Attendance Reporting</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>ATTENDANCE REPORTING</b></h3>
              </div>
              <!-- /.card-header -->
              <form id="test_ajax">
                @csrf

              <div class="card-body">
                <div class="row">
                    <div class="col-3">
                    <div class="form-group">
                      <label>SELECT EMPLOYEE</label>
                      <select required onchange="attendance_filter_handler();" name="emp_id" id="emp_search"  class="form-control select2" style="width: 100%;">slect
                        <option id="search_value" value="">Search employee</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group">
                    <label>FROM</label>
                    <input type="date" name="from" id="from_date" onchange="attendance_filter_handler();" class="form-control" required  placeholder="">
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group">
                    <label>TO</label>
                    <input type="date" name="to" id="to_date" onchange="attendance_filter_handler();" class="form-control" required  placeholder="">
                    </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                      <label style="visibility: hidden">search </label>
                      <button type="submit" class="btn-info form-control">GO</button>
                    </div>
                  </div>
              </div>

                {{-- <div class="card card-primary"> --}}
                  {{-- <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                  </div> --}}
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="attendance_reporting" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>DATE</th>
                        <th>IN TIME</th>
                        <th>OUT TIME</th> 
                      </tr>
                      </thead>
                      <tbody>
                          
                      </tfoot>
                    </table>
                  </div>
              
                  <!-- /.card-body -->
                {{-- </div> --}}
               
 

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
 
  
