
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alkatech | user</title>

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
           
          <div class="col-xl-4 offset-xl-4 offset-lg-2 col-md-offset-2 col-sm-offset-2">
             
           <div class="text-center"> <img class="text-center" src="https://www.alkatechsoft.com/wp-content/uploads/2018/12/alkatech-logo.png" alt="">
           </div>
        
       

           <div id="login_Form" class="card card-primary mt-4">
            <div class="card-header style="float:inherit !important;">
              <h3 class="card-title">Reset <small>Password</small></h3>
            </div>
            <!-- login form start -->
            <div class="card-body">
                <form  id="submit_forgotpassword_form" >
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" oninput="spasswordvalidation()" name="f_password" class="form-control" id="s_password" placeholder="Password">
                      <span id="error_f_password" class="text-danger" role="alert">
                      </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" oninput="confirmpasswordvalidation()" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password">
                        <span id="error_confirm_password" class="text-danger" role="alert">
                        </span>
                      </div>
                  <div>
                    <button type="submit" id="signup_validation" disabled class="btn btn-block btn-primary">UPDATE</button>
                    <div id="register_success" class="mt-3 btn btn-block btn-success" role="alert" style="display: none">
                   </div>
                   <div id="forgot_pass_msg" class="mt-3 btn btn-block btn-warning" role="alert" style="display: none">
                  </div>
                    @if (session('error') !==null)
                    <div class="mt-3 btn btn-block btn-warning" role="alert">
                   </div>  
                @endif
                  </div>
              
                </form>
                <div class="mt-4">
                   
                </div>
            </div>
        
      </div><!-- /.container-fluid -->
 
 
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
// $(document).ready(function(){
  var s_name = 0;
  var s_email = 0;
  var s_password = 0;
  var s_confirm_password=0;
  
 
  $(".forgot_password").click(function(){
    $(".forgot_password_Form").css("display", "block");
    $("#login_Form,.signup_Form").css("display", "none");
  });
  // this.validation_check();
 
    
    function spasswordvalidation(){
        if($('#s_password').val().length<5){
          s_password=0;
          $('#error_f_password').html('Password length should be 5 or more');
          this.validation_check();
         }else{
        s_password=1;
        $('#error_f_password').html('');
        this.validation_check();

      }
    }
    function confirmpasswordvalidation(){
      if($('#confirm_password').val()===$('#s_password').val()){
        s_confirm_password=1;
      $('#error_confirm_password').html('');
     this.validation_check();
      this.validation_check();
         }else{
          s_confirm_password=0;
        $('#error_confirm_password').html('Password does not matched');
        this.validation_check();
      }
    }
    function validation_check(){
      if(s_password && s_confirm_password){
      $('#signup_validation').attr('disabled', false);
      console.log("disabled false");
      }else{
      $('#signup_validation').attr('disabled', true);
      console.log("disabled true");
     }
    }
  

 
    function lpasswordvalidation(){
        if($('#l_password').val().length<1){
          $('#error_l_password').html('Please enter password');
         }else{
        $('#error_l_password').html('');

      }
    }

 
    $('#submit_forgotpassword_form').submit(function(e){
      e.preventDefault();
     $.ajax({
         url: '{{url('forgot_password_process_change_update')}}',
         data:$('#submit_forgotpassword_form').serialize(),
         type:'post',
         success:function(result){
           console.log(result);
          
            $("#forgot_pass_msg").css("display", "block");
            $('#forgot_pass_msg').html(result.msg);
           
         }
      })
    })
// });  
</script>
</body>
</html>
