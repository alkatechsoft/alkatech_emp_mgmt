@extends('admin/layout')
@section('page_title','Admin | Dashboard')
@section('all_employee_selected','active')
@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>EMPLOYEE LIST</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                   
                  @foreach ($employees as $employee)
                  <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}} 
                      @if ($employee->is_verify == 1)
                      <span class="badge badge-primary">verified</span> </td>
                    @else
                    <span class="badge badge-warning">not verified</span> </td>
                    @endif 
                    <td>
                      <div class="btn-group mr-2" role="group" aria-label="First group">
                        @if($employee->status == 1)
                            <a class="btn btn-primary"
                                href="{{ url('admin/emp/status/0') }}/{{ $employee->id }}">
                                Active
                            </a>
                            <a class="btn btn-warning"
                            href="{{ url('admin/emp/status/0') }}/{{ $employee->id }}"
                            data-toggle="tooltip" data-placement="top" title="Send login details!">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </a>
                        @elseif($employee->status == 0)
                            <a class="btn btn-danger"
                                href="{{ url('admin/emp/status/1') }}/{{ $employee->id }}">
                                Deactive
                            </a>
                        @endif
                    </div>
                  </td>
                  </tr>
                  @endforeach
               
                  </tfoot>
                </table>
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
