@extends('admin/layout')
@section('page_title','Admin | Dashboard')
@section('all_employee_selected','active')
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
              <li class="breadcrumb-item active">Employee</li>
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
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <a class="card-title"><b>EMPLOYEE LIST</b></a>
                <button type="button" style="float: right" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-info">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
              @if(session('message')!==null)
                            <div class="alert alert-success m-3" role="alert">
                                {{ session('message') }}
                            </div>
              @endif
              <!-- /.card-header -->
              <div class="modal modal-info fade" id="modal-info" style="display: none;">
                <div class="modal-dialog" style="pointer-events: all">
                        
                    <div class="card card-primary mt-4">
                      <div class="card-header style="float:inherit !important;">
                          
                        <h3 class="card-title">CREATE NEW USER </h3><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                       </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="create_user">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">NAME</label>
                            <input type="text" name="name" class="form-control" id="name" oninput="user_name();" placeholder="Enter email">
                            <span id="error_name" class="text-danger" role="alert">
                            
                            </span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">USER EMAIL</label>
                            <input type="email" name="email" class="form-control" id="email" oninput="user_personal_email();" placeholder="Enter email">
                            
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">OFFICIAL EMAIL</label>
                            <input type="email" name="official_email" class="form-control" id="official_email" oninput="user_official_email();" placeholder="Enter email">
                            <span id="error_official_email" class="text-danger" role="alert">
                            
                            </span>
                          </div>
                          <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <span id="error_password" class="text-danger" role="alert">
                            
                            </span>
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-block btn-primary">CREATE</button>
                          
                        </div>
                    
                      </form>
                    </div>
                
                    
                   <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <div class="card-body">
                <table id="emp_list" class="table table-bordered table-striped">
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
                            {{-- <form id="send_emp_login_form">
                              @csrf
                              <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Send login details!">
                                <input name="emp_id" type="hidden" value="{{ $employee->id }}">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                              </button>
                            </form> --}}
                            <a class="btn btn-warning"
                            href="{{url('admin/emp/send_login_details_to_emp')}}/{{ $employee->id }}"
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
