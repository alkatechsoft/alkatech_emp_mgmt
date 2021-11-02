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
                <h3 class="card-title"><b>DASHBOARD</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box {{session('MY_PERSONAL_INFO') ? 'bg-success':'bg-warning'}}">
                        <div class="inner text-center">
                          <h3 class="">Personal info</h3>
                          <p><i style="font-size: xx-large" class="fa fa-user"></i></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{url('user/personal-info')}}" class="small-box-footer"><b>{{session('MY_PERSONAL_INFO') ? 'GO':'Please Complete Personal info'}}</b> &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner text-center">
                          <h3>Acadmic info</h3>
                          <p><i style="font-size: xx-large" class="fa fa-graduation-cap"></i></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{url('user/academic-info')}}" class="small-box-footer">Please complete your acadmic info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner text-center">
                          <h3>Professional info</h3>
                          <p>n/a</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{url('user/professional-info')}}"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
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
