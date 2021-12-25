@extends('admin/layout')
@section('page_title','Leave | Management')
@section('leave_management_selected','active')
@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- <div class="container-fluid">
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
      </div> --}}
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <a class="card-title"><b>LEAVE LIST</b></a>
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
                          
                        <h3 class="card-title">CREATE NEW LEAVE </h3><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                       </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="create_leave">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">DATE</label>
                            <input type="date" name="date" class="form-control" id="date" value="" placeholder="Enter date">
                            <span id="error_date" class="text-danger" role="alert">
                            
                            </span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">DESCREPTION</label>
                            <textarea name="leave_desc" value="" id="leave_desc" rows="4" cols="50" class="form-control" placeholder="Enter description"> </textarea>
                            <span id="error_leave_desc" class="text-danger" role="alert">
                          
                            </span>
                          </div>
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-block btn-primary">CREATE</button>
                          <input type="hidden" id="leave_id" name="leave_id" value="">
                        </div>
                    
                      </form>
                    </div>
                
                    
                   <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <div class="card-body">
                <table id="leave_list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>NOTE</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($leave_datas as $leave_data)
                  <tr>
                    <td>{{$leave_data->date ? $leave_data->date:'n/a'}}</td>
                    <td>{{$leave_data->leave_desc ? $leave_data->leave_desc:'n/a'}} 
                     
                    <td>
                      <div class="btn-group mr-2" role="group" aria-label="First group">
                            {{-- <a class="btn btn-primary" href="{{ url('admin/leave/update') }}/{{ $leave_data->id }}">
                              <i class="fa fa-edit"></i>
                            </a> --}}
                            <a onclick="get_leave_by_id({{$leave_data->id}})" style="float: right" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-info">
                              <i class="fa fa-edit"></i>
                          </a>
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
