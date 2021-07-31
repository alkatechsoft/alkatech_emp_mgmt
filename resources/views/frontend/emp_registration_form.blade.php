<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('front_assets/css/adminlte.min.css')}}">
</head>
<body>
   <!-- ./wrapper -->
   <center class=" p-4" style="background: #1573ba;color: #fff;font-size: 31px;font-weight: bold;">Welcome to Alkatech</center>

 <form action="{{ route('frontend.emp_registration_form_process') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class="row">
    <div class="col-xl-4">
      <div class="form-group">
        <label for="firstnamne">First Name*</label>
        <input type="text" name="f_name" class="form-control" id="f_name" placeholder="Enter First Name">
        @error('f_name')
        <span class="text-danger" role="alert">
          First Name field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="lastname">Last Name*</label>
        <input type="text" name="l_name" class="form-control" id="l_name" placeholder="Last Name">
        @error('l_name')
        <span class="text-danger" role="alert">
          Last Name field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
        <div class="form-group">
          <label for="emailaddress">Email address*</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
          @error('email')
          <span class="text-danger" role="alert">
            Email field required
          </span>
         @enderror
        </div>
      </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="contact">Contact*</label>
        <input type="tel" name="contact" class="form-control" id="contact" placeholder="Contact">
        @error('contact')
        <span class="text-danger" role="alert">
          Contact field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="guardian_contact">Guardian contact*</label>
        <input type="tel" name="guardian_contact" class="form-control" id="guardian_contact" placeholder="Guardian contact">
        @error('guardian_contact')
        <span class="text-danger" role="alert">
          Guardian Contact field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
        <div class="form-group">
          <label for="last_company">Last Company</label>
          <input type="text" name="last_company" class="form-control" id="last_company" placeholder="Enter Last Company">
        </div>
    </div>
    
    <hr style="height: 2px solid black">
    <div class="col-xl-12">
        <div class="form-group">
          <label for="p_address">Permanent Address*</label>
          <input type="text" name="p_address" class="form-control" name="p_address" id="p_address" placeholder="Permanent address" />
          @error('p_address')
          <span class="text-danger" role="alert">
            This field required
          </span>
         @enderror
        </div>
    </div>
    <div class="col-xl-4">
    <div class="form-group">
      <label for="p_address">City*</label>
      <input type="text" name="p_city" class="form-control" id="p_city" placeholder="City">
      @error('p_city')
      <span class="text-danger" role="alert">
        This field required
      </span>
     @enderror
    </div>
    </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="p_state">State*</label>
        <input type="text" name="p_state" class="form-control" id="p_state" placeholder="State">
        @error('p_state')
        <span class="text-danger" role="alert">
          This field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="p_pincode">Pincode*</label>
        <input type="text" name="p_pincode" class="form-control" id="p_pincode" placeholder="Pincode">
        @error('contact')
        <span class="text-danger" role="alert">
          Contact field required
        </span>
       @enderror
      </div>
    </div>

    
    <div class="col-xl-12">
        <div class="form-group">
          <label for="c_address">Current Address</label>
          <input type="textarea" name="c_address" class="form-control" id="c_address" placeholder="Current address">
          @error('c_address')
          <span class="text-danger" role="alert">
            This field required
          </span>
         @enderror
        </div>
    </div>
    <div class="col-xl-4">
    <div class="form-group">
        <label for="c_city">City</label>
        <input type="text"  name="c_city" class="form-control" id="c_city" placeholder="City">
        @error('c_city')
        <span class="text-danger" role="alert">
          This field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="c_state">State</label>
        <input type="text" name="c_state" class="form-control" id="c_state" placeholder="State">
        @error('c_state')
        <span class="text-danger" role="alert">
          This field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-4">
      <div class="form-group">
        <label for="c_pincode">Pincode</label>
        <input type="text" name="c_pincode" class="form-control" id="c_pincode" placeholder="Pincode">
        @error('c_pincode')
        <span class="text-danger" role="alert">
          This field required
        </span>
       @enderror
      </div>
    </div>
    <div class="col-xl-3">
      <div class="form-group">
        <label for="resume">Resume</label>
        <input type="file" name="resume" class="form-control-file" id="resume" placeholder="resume">
        @error('resume')
        <span class="text-danger" role="alert">
          This field required
        </span>
       @enderror
      </div>
    </div>

    <div class="col-xl-3">
        <div class="form-group">
          <label for="higherqualification_ctft">Higher qualification Certificate</label>
          <input type="file" name="higherqualification_ctft" class="form-control-file" id="higherqualification_ctft" placeholder="Enter email">
          @error('higherqualification_ctft')
          <span class="text-danger" role="alert">
            This field required
          </span>
         @enderror
        </div>
      </div>
 
      <div class="col-xl-3">
      <div class="form-group">
        <label for="professional_ctft">Professional Certificate</label>
        <input type="file" name="professional_ctft" class="form-control-file" id="professional_ctft" placeholder="Professional Certificate">
      </div>
    </div>
    <div class="col-xl-3">
        <div class="form-group">
          <label for="exp_letter">Experience Letter</label>
          <input type="file" name="exp_letter" class="form-control-file" id="exp_letter" placeholder="Experience Letter">
        </div>
    </div>
    <div class="col-xl-3">
        <div class="form-group">
            <label for="salary_slip">Salary Slip</label>
            <input type="file" name="salary_slip" class="form-control-file" id="salary_slip" placeholder="Salary Slip">
        </div>
    </div>
 
</div>
    <!-- /.card-body -->
    <p>
      @if(session('message')!==null)
  <div class="alert alert-success" role="alert">
      {{ session('message') }}
  </div>
@endif
  </p>
      <button class="btn btn-primary text-center" type="submit" id="sendMessageButton">SUBMIT</button> 
  </form> 
<!-- jQuery -->

<!-- jQuery -->
<script src="{{asset('front_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('front_assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('front_assets/js/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('front_assets/js/adminlte.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('front_assets/js/demo.js')}}"></script> 
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
 
</body>
</html>
