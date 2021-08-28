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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title"><b>DASHBOARD</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box {{session('MY_PERSONAL_INFO') ? 'bg-success':'bg-warning'}}">
                        <div class="inner text-center">
                          <h3 class="">ALL EMPLOYEE</h3>
                          <p><i style="font-size: xx-large" class="fa fa-users"></i></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{url('admin/emp')}}" class="small-box-footer"><b>GO</b> &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner text-center">
                          <h3>ATTENDANCE</h3>
                          <p><i style="font-size: xx-large" class="fa fa-clock-o"></i></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{url('admin/upload_attendance')}}" class="small-box-footer"><b>GO</b> &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner text-center">
                          <h3>REPORT</h3>
                          <p><i style="font-size: xx-large" class="fa fa-filter"></i></p>

                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{url('admin/attendance-reporting')}}" class="small-box-footer"><b>GO</b> &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                   
                  </div>
            
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
