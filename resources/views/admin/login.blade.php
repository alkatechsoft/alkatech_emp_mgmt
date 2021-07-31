
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_assets/css/adminlte.min.css')}}">
</head>
<body >
 
      <div class="container-fluid mt-5">
        <div class="row">
          <!-- left column -->
          <div class="col-xl-4 offset-xl-4 offset-lg-2 col-md-offset-2 col-sm-offset-2">
            <!-- jquery validation -->
           <div class="text-center"> <img class="text-center" src="https://www.alkatechsoft.com/wp-content/uploads/2018/12/alkatech-logo.png" alt="">
           </div>
            <div class="card card-primary mt-4">
              <div class="card-header style="float:inherit !important;">
                  
                <h3 class="card-title">Admin <small>Login</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('admin.auth')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    @error('email')
                    <span class="text-danger" role="alert">
                      Email required
                    </span>
                   @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                    <span class="text-danger" role="alert">
                     Password required
                    </span>
                   @enderror
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary">Submit</button>
                  @if (session('error') !==null)
                  <div class="mt-3 btn btn-block btn-warning" role="alert">
                   {{session('error')}}
               </div>  
              @endif
                </div>
            
              </form>
            </div>
        
            </div>
       
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="https://www.alkatechsoft.com/">Alkatech Software Solution Pvt.Ltd.io</a>.</strong> All rights reserved.
  </footer>

  --}}
 
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
