<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('page_title')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('front_assets/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/css/select2.min.css')}}">
  
<link href="{{ asset('admin_asset/css/sweetalert2.bootstrap-4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_asset/css/toastr.min.css') }}" rel="stylesheet">
  <!-- Theme style -->
  <link href="{{ asset('admin_asset/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_asset/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_asset/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_asset/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('front_assets/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/css/custom.css')}}">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
       
       
    </ul>

    <!-- SEARCH FORM -->
 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="margin-right: 13px !important;">
          <a href="#" class="dropdown-item">
             Admin 
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('admin/logout')}}" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel-1 mt-3 pb-3 mb-3 d-flex">
        <a  href="{{url('admin/dashboard')}}" class="image">
          <img src="{{asset('https://www.alkatechsoft.com/wp-content/uploads/2018/12/alkatech-logo.png')}}" alt="User Image">
        </a>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open mb-2">
            <a href="{{url('admin/dashboard')}}" class="nav-link">
              <i class="fa fa-dashboard"></i> &nbsp;&nbsp;
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item menu-open mb-2">
            <a href="#" class="nav-link" style="background: #343a40; color:#fff">
              <i class="fa fa-users"  aria-hidden="true"></i>
              <p>
                Employee Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/emp')}}"  class="@yield('all_employee_selected') nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    All Employee 
                  </p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item menu-open mb-2">
            <a href="#" class="nav-link" style="background: #343a40; color:#fff">
              <i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;
              <p>
                Attendance Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/upload_attendance')}}"  class="@yield('attendance_selected') nav-link">
                  <i class="nav-icon fa fa-clock-o"></i>
                  <p>
                    Attendance
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/import-attendance')}}"  class="@yield('import_form_selected') nav-link">
                  <i class="fa fa-upload"></i>&nbsp;
                  <p>
                    Import Attendance
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/attendance-reporting')}}" class="@yield('attendance_filter_selected') nav-link">
                  <i class="nav-icon fa fa-filter"></i>
                  <p>
                    Attendance Filter
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
               
            </ul>
          </li>
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  

    @section('container')

    @show

    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://alkatechsoft.com/">Alkatech soft</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
{{-- <script src="{{asset('front_assets/js/jquery.min.js')}}"></script> --}}
<!-- Bootstrap 4 -->


<script src="{{asset('admin_asset/js/jquery.min.js')}}"></script>
<script src="{{asset('admin_asset/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_asset/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_asset/js/select2.full.min.js')}}"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{asset('admin_asset/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin_asset/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_asset/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin_asset/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_asset/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin_asset/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin_asset/js/pdfmake.min.js')}}"></script>
<script src="{{asset('admin_asset/js/vfs_fonts.js')}}"></script>
<script src="{{asset('admin_asset/js/jszip.min.js')}}"></script>
<script src="{{asset('admin_asset/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin_asset/js/toastr.min.js')}}"></script>
<script src="{{asset('admin_asset/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin_asset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin_asset/js/main.js')}}"></script>

<script src="{{asset('admin_assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE App -->
<script>

$( document ).ready(function() {
  $(function () {

 
    var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content'); 
  $('#emp_search').select2({
    ajax:{
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      url: "search_employee",
      type :'post',
      dataType : 'json',
      delay : 200,
      data: function(params){
        return{
          search: params.term
        }
      },
      processResults: function(response){
        return {
          results: response
        }
      },
      cache: true
    }
  });
});
//Initialize Select2 Elements
$('#attendance_reporting').prepend('<caption style="caption-side: top"><h2 id="report_emp_name"></h2></caption>');
$('#attendance_reporting').append('<caption style="caption-side: bottom"><br><b>total Salary  : 20000</b></caption>');

    $('.select2').select2();
    $("#attendance_reporting").DataTable({
      "paging": true,"responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["csv", "excel", "pdf"]

    }).buttons().container().appendTo('#attendance_reporting_wrapper .col-md-6:eq(0)');
    $("#emp_list").DataTable({
      "paging": true,"responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["csv", "excel"]

    }).buttons().container().appendTo('#empl_list_wrapper .col-md-6:eq(0)');
 
  });
</script>
</body>
</html>
