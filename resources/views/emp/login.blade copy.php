
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
                <h3 class="card-title">User <small>Login</small></h3>
              </div>
              <!-- login form start -->
              <div class="card-body">
              <form  id="submit_login_Form">
                @csrf
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email"  oninput="lemailvalidation()" name="l_email" class="form-control" id="l_email" placeholder="Enter email">
                    <span id="error_l_email" class="text-danger" role="alert">
                       
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password"  oninput="lpasswordvalidation()" name="l_password" class="form-control" id="l_password" placeholder="Password">
                    <span id="error_l_password" class="text-danger" role="alert">
                     
                    </span>
                  </div>
               
                <div>
                  <button type="submit" class="btn btn-block btn-primary">Login</button>
                  @if (session('error') !==null)
                  <div class="mt-3 btn btn-block btn-warning" role="alert">
                   {{session('error')}}
               </div>  
              @endif
                  <div id="login_msg" class="mt-3 btn btn-block btn-warning" role="alert" style="display: none">
                  
               </div>  
                </div>
            
              </form>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Not registered? <a href="#" id="sign_up" class="ml-2">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
            
        
            </div>
            {{-- signup form --}}
            <div id="signup_Form" style="display:none" class="card card-primary mt-4">
                <div class="card-header style="float:inherit !important;">
                    
                  <h3 class="card-title">User <small>Signup</small></h3>
                </div>
                
                <!-- form start -->
                <div class="card-body">
                <form  id="submit_signup_form" >
                  @csrf
                 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Full Name</label>
                      <input type="text" oninput="namevalidation()" name="name" class="form-control" id="s_full_name" placeholder="Enter email">
                      
                      <span id="error_full_name" class="text-danger" role="alert">
                        
                      </span>
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" oninput="semailvalidation()" name="email" class="form-control" id="s_email" placeholder="Enter email">
                        
                        <span id="error_s_email" class="text-danger" role="alert">
                           
                        </span>
                       
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" oninput="spasswordvalidation()" name="password" class="form-control" id="s_password" placeholder="Password">
                       
                      <span id="error_s_password" class="text-danger" role="alert">
                        
                      </span>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" oninput="confirmpasswordvalidation()" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password">
                        <span id="error_confirm_password" class="text-danger" role="alert">
                        </span>
                      </div>
                  <div>
                    <button type="submit" id="signup_validation" disabled class="btn btn-block btn-primary">Sign Up</button>
                    <div id="register_success" class="mt-3 btn btn-block btn-success" role="alert" style="display: none">
                   </div>
                   <div id="register_fail" class="mt-3 btn btn-block btn-warning" role="alert" style="display: none">
                  </div>
                    @if (session('error') !==null)
                    <div class="mt-3 btn btn-block btn-warning" role="alert">
                   </div>  
                @endif
                  </div>
              
                </form>
                  <div class="mt-4">
                  <div class="d-flex justify-content-center links">
                    Already registered <a href="#" id="sign_in" class="ml-2">Sign In</a>
                  </div>
                  </div>
              </div>
            <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row -->
        
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
$(document).ready(function(){
  var s_name = 0;
  var s_email = 0;
  var s_password = 0;
  var s_confirm_password=0;
  $("#sign_up").click(function(){
  alert('aa');

    $("#signup_Form").css("display", "block");
    $("#login_Form").css("display", "none");
  });
  $("#sign_in").click(function(){
    $("#signup_Form").css("display", "none");
    $("#login_Form").css("display", "block");
  });
  // this.validation_check();
  function namevalidation(){
    alert('kl');
        if($('#s_full_name').val().length<2){
          s_name=0;
          $('#error_full_name').html('please enter full name');
         validation_check();
         }else{
          s_name=1;
        $('#error_full_name').html('');
        validation_check();

      }
    }
    function semailvalidation(){
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(regex.test($('#s_email').val())){
        s_email=1;
           $('#error_s_email').html('');

           this.validation_check();
          }else{
            s_email=0;
          $('#error_s_email').html('please enter valid email');

          this.validation_check();
      }
    }

    
    function spasswordvalidation(){
        if($('#s_password').val().length<5){
          s_password=0;
          $('#error_s_password').html('Password length should be 5 or more');
          this.validation_check();
         }else{
        s_password=1;
        $('#error_s_password').html('');
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
      if(s_name && s_email && s_password && s_confirm_password){
      $('#signup_validation').attr('disabled', false);
      console.log("disabled false");
      }else{
      $('#signup_validation').attr('disabled', true);
      console.log("disabled true");
     }
    }
    $('#submit_signup_form').submit(function(e){
      e.preventDefault();
     $.ajax({
         url: '{{url('user_signup')}}',
         data:$('#submit_signup_form').serialize(),
         type:'post',
         success:function(result){
           console.log(result);
           $("#register_success").css("display", "block");
           $("#register_success").html(result.msg);
        $('#submit_signup_form')['0'].reset();
        //   s_name = 0;
        // s_email = 0;
        // s_password = 0;
        // s_confirm_password=0;
        // this.validation_check();

         }
      })
    
    })


    function lemailvalidation(){
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(regex.test($('#l_email').val())){
           $('#error_l_email').html('');

          }else{
          $('#error_l_email').html('please enter valid email');

      }
    }
    function lpasswordvalidation(){
        if($('#l_password').val().length<1){
          $('#error_l_password').html('Please enter password');
         }else{
        $('#error_l_password').html('');

      }
    }


    $('#submit_login_Form').submit(function(e){
      e.preventDefault();
     $.ajax({
         url: '{{url('user_login_process')}}',
         data:$('#submit_login_Form').serialize(),
         type:'post',
         success:function(result){
           console.log(result);
           if(result.status=="success"){
             window.location.href='user/dashboard';
           }
           $("#login_msg").css("display", "block");
           $("#login_msg").html(result.msg);
          $('#submit_login_Form')['0'].reset();
         }
      })
    
    })
});  
</script>
</body>
</html>
