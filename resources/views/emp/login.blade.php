<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alkatech | user</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
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
              <form id="submit_login_Form">
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
                        Not registered? <a href="#" class="sign_up" class="ml-2">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a class="forgot_password" href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
            </div>
            {{-- forgot form --}}

            <div class="forgot_password_Form card card-primary mt-4" style="display: none">
              <div class="card-header style="float:inherit !important;">
                <h3 class="card-title">Forgot <small>Password</small></h3>
              </div>
              <!-- forgot form start -->
              <div class="card-body">
                <form id="submit_forgot_password_Form">
                  @csrf
                    <div class="form-group">
                      <label for="forgotpassword">Email address</label>
                      <input type="email"  oninput="lemailvalidation()" name="forgot_password_email" class="form-control" id="forgot_password_email" placeholder="Enter email">
                      <span id="error_f_email" class="text-danger" role="alert">
                        
                      </span>
                    </div>
                    <div>
                      <button type="submit" class="btn btn-block btn-primary">Send link</button>
                  </div>
                  <div id="forgot_pass_msg" class="mt-3 btn btn-block btn-success" role="alert" style="display: none">
                  </div>
                </form>
                <div class="mt-4">
                  <div class="d-flex justify-content-center links">
                      <a href="#" class="sign_up" class="ml-2">Sign Up</a>&nbsp;&nbsp;
                      <a href="#" class="sign_in" class="ml-2">Sign In</a>
                  </div>
                </div>
             </div>
            </div>













            {{-- signup form --}}
            <div class="signup_Form card card-primary mt-4" style="display:none" class="card card-primary mt-4">
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
                      Already registered <a href="#" class="sign_in" class="ml-2">Sign In</a>
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
<script src="{{asset('admin_asset/js/jquery.min.js')}}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script src="{{asset('admin_assets/js/main.js')}}"></script>
 
<script>
// $(document).ready(function(){
 
// });  

</script>
</body>
</html>
