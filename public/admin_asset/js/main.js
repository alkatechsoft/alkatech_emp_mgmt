var s_name = 0;
var s_email = 0;
var s_password = 0;
var s_confirm_password=0;
$(".sign_up").click(function(){
  $(".signup_Form").css("display", "block");
  $("#login_Form,.forgot_password_Form ").css("display", "none");
});
$(".sign_in").click(function(){
  $(".signup_Form,.forgot_password_Form").css("display", "none");
  $("#login_Form").css("display", "block");
});
$(".forgot_password").click(function(){
  $(".forgot_password_Form").css("display", "block");
  $("#login_Form,.signup_Form").css("display", "none");
});
// this.validation_check();
function namevalidation1(){
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
  function namevalidation(){
    var regex_name = /^[a-zA-Z'\s]{1,40}$/;
    if(regex_name.test($('#s_full_name').val())){
         s_name=1;
         $('#error_full_name').html('');
         validation_check();
        }else{
          s_name=0;
          $('#error_full_name').html('please enter full name');
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
       url: 'user_signup',
       data:$('#submit_signup_form').serialize(),
       type:'post',
       success:function(result){
         console.log(result);
    $('#signup_validation').attr('disabled', true);

         $("#register_success").css("display", "block");
         $("#register_success").html(result.msg);
      $('#submit_signup_form')['0'].reset();
    $('#signup_validation').attr('disabled', true);

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
       url: 'user_login_process',
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
  $('#submit_forgot_password_Form').submit(function(e){
    e.preventDefault();
   $.ajax({
       url: 'forgot_password_process',
       data:$('#submit_forgot_password_Form').serialize(),
       type:'post',
       success:function(result){
         console.log(result);
        
          $("#forgot_pass_msg").css("display", "block");
          $('#forgot_pass_msg').html(result.msg);
         
       }
    })
  })

  $('#upload_attendance_form').submit(function(e){
    e.preventDefault();
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000
    });
   $.ajax({
       url: 'upload_attendance_process',
       data:$('#upload_attendance_form').serialize(),
       type:'post',
       success:function(result){
         console.log(result);
         if(result.status=="success"){
          $("#mesg").html(result.msg);
          alert('You clicked the button!');
          $("#wrap>div").remove();

          Toast.fire({
            icon: 'success',
            title:'&nbsp;&nbsp;'+result.msg
          })
        } else{

          Toast.fire({
            icon: 'error',
            title:'&nbsp;&nbsp;'+result.msg
          })
          }
         $("#login_msg").css("display", "block");
        $('#upload_attendance_form')['0'].reset();
       }
    })
  })

  // 
  function executeExample(){
    alert('You clicked the button!');
    Swal.fire(
      'Good job!',
      'You clicked the button!',
      'success'
    );
  }


  function add_more(){
    var box_count=jQuery("#box_count").val();
    box_count++;
    jQuery("#box_count").val(box_count);
    // jQuery("#wrap").append('<div class="my_box" id="box_loop_'+box_count+'"><div class="field_box"><input type="textbox" name="name[]" id="name"></div><div class="button_box"><input type="button" name="submit" id="submit" value="Remove" onclick=remove_more("'+box_count+'")></div></div>');
    // jQuery("#wrap").append('<div class="row mt-2" id="box_loop_'+box_count+'"><div class="col-3"><input type="date" name="date[]" id="date" class="form-control"  placeholder=""></div><div class="col-3"><input type="time" id="in_time" name="in_time[]" class="form-control"  placeholder=""></div><div class="col-3"><input type="time" name="out_time[]" id="in_time" class="form-control"  placeholder=""></div><div class="col-3"><input type="button" class="btn btn-block btn-danger" name="submit" id="submit" value="Remove" onclick=remove_more("'+box_count+'")></div></div>');
    jQuery("#wrap").append('<div class="row mt-2" id="box_loop_'+box_count+'"><div class="col-3"><input type="date" required name="date[]" id="date" class="form-control"  placeholder=""></div><div class="col-3"><input type="time" required id="in_time" name="in_time[]" class="form-control"  placeholder=""></div><div class="col-3"><input type="time" required name="out_time[]" id="in_time" class="form-control"  placeholder=""></div><div class="col-3"><button class="btn btn-block btn-danger" name="submit" id="submit" value="&times" onclick=remove_more("'+box_count+'")><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>');
  
  
  }
  function remove_more(box_count){
    jQuery("#box_loop_"+box_count).remove();
    var box_count=jQuery("#box_count").val();
    box_count--;
    jQuery("#box_count").val(box_count);
  }
  
  // $("#emp_search").on('keyup',function(){
  //   // alert($("#emp_search").val());
  //   alert('as');
    
  // })
  