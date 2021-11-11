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
    $(".fa-upload").hide();
    $(".upload_update").prepend('<i class="fa fa-spinner fa-pulse"></i>');
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
            $("#wrap").find(".created_row").remove();
            $(".fa-upload").show();
            $(".fa-spinner").hide();
          Toast.fire({
            icon: 'success',
            title:'&nbsp;&nbsp;'+result.msg
          })
        $('#upload_attendance_form')['0'].reset();
        $("#emp_search").select2("val",result.emp_id);
        }else if(result.status=="updated"){
        $("#emp_search").select2("val",result.emp_id);
        $(".fa-upload").show();
        $(".fa-spinner").hide();
          Toast.fire({
            icon: 'success',
            title:'&nbsp;&nbsp;'+result.msg
          })
          }else{
            $(".fa-upload").show();
            $(".fa-spinner").hide();
            Toast.fire({
              icon: 'warning',
              title:'&nbsp;&nbsp;'+result.msg
            })
          }
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
    jQuery("#wrap").append('<div class="row created_row mt-2" id="box_loop_'+box_count+'"><div class="col-3"><input type="date" required name="date[]" id="date" class="form-control"  placeholder=""></div><div class="col-3"><input type="time" required id="in_time" name="in_time[]" class="form-control"  placeholder=""></div><div class="col-3"><input type="time" required name="out_time[]" id="in_time" class="form-control"  placeholder=""></div><div class="col-3"><button class="btn btn-block btn-danger" name="submit" id="submit" value="&times" onclick=remove_more("'+box_count+'")><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>');
  
  
  }
  function remove_more(box_count){
    jQuery("#box_loop_"+box_count).remove();
    var box_count=jQuery("#box_count").val();
    box_count--;
    jQuery("#box_count").val(box_count);
  }
  
  function attendance_filter_handler(){
    // event.preventDefault();
    
    var data = 'aa'+'|'+$("#emp_search").val()+'|'+$("#from_date").val()+'|'+$("#to_date").val();
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "attendance_reporting_process",
      type :'post',
      dataType : 'json',
      delay : 200,
      data:data,
        success:function(result){
          if(result.status=="success"){
            console.log(result.data);
            var counter=0;
            var tableDataHTML = '';
          $.each(result.data, function (key,item){
            // $('tbody').append('<tr role="row" class="odd"><td> '+item.date+' </td><td> P </td><td><div class="btn-group"><a class="btn btn-primary">EDIT</a></div></td></tr>');

            tableDataHTML += '<tr id="searched-row-'+counter+'" class="js-result-tbl-tbody-tr">'+
            '<td>'+item.date+'</td>'+
            '<td> P </td>'+
            '<td><div class="btn-group"><a class="btn btn-primary">EDIT</a></div></td>'+ 
            '</tr>';    
          });
          $('tbody').empty();  
          $('tbody').append(tableDataHTML);  
          // alert('a');
          

        }
        }
     })
    }
  

    $('#test_ajax').submit(function(e){
      e.preventDefault();
    var table = $('#attendance_reporting').DataTable();
     
     $.ajax({
         url: 'attendance_reporting_process',
         data:$('#test_ajax').serialize(),
         type:'post',
         async: false,
         success:function(result){
          if(result.status=="success"){
            console.log(result.data);
            var counter=0;
            var tableDataHTML = '';
            $('tbody').empty();  
    
          $.each(result.data, function (key,item){
              
            console.log(item.id)
           
            table.row.add([
              item.date,
              item.in_time,
              item.out_time
            ]).draw();
    
          });
           
        }
       
         }
      })
    })

    function attendance_filter_before_upload_handler(){
      // event.preventDefault();
      
      var data = 'aa'+'|'+$("#emp_search").val()+'|'+$("#__from_date").val();
      $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "attendance_filter_before_upload_process",
        type :'post',
        dataType : 'json',
        delay : 200,
        data:data,
          success:function(result){
            if(result.status=="success"){
              console.log(result.data);
              $("#__in_time").val(result.data[0].in_time);
              $("#__out_time").val(result.data[0].out_time);
              $("#__update_id").val(result.data[0].id);
          }
          else{
            $("#__in_time").val('');
            $("#__out_time").val('');
            $("#__update_id").val('');
           }
          }
       })
      }

      
    $('#create_user').submit(function(e){
      e.preventDefault();
      if($("#name").val().length<1){
        $("#error_name").html("This field required");
      }
      if($("#email").val().length<1){
        $("#error_email").html("This field required");
      }
      if($("#official_email").val().length<1){
        $("#error_official_email").html("This field required");
      }
      if($("#password").val().length<1){
        $("#error_password").html("This field required");
      }

      if($("#name").val().length>0 && $("#email").val().length>0 && $("#official_email").val().length>0 && $("#password").val().length>0){
        create_user();
      } 

    })

    function user_name(){
      var user_name = /^[a-zA-Z'\s]{1,40}$/;
      if(user_name.test($('#name').val())){
           $('#error_name').html('');
          }else{
            $('#error_name').html('Please enter full name');
      }
    }
  
    function user_personal_email(){
      var regex_personal_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(regex_personal_email.test($('#email').val())){
           $('#error_email').html('');
          }else{
            $('#error_email').html('Please enter email');
      }
    }  
    function user_official_email(){
      var regex_official_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(regex_official_email.test($('#official_email').val())){
           $('#error_official_email').html('');
          }else{
            $('#error_official_email').html('Please enter email');
      }
    }
  

    function create_user(){
      var table = $('#emp_list').DataTable();
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
      });
       $.ajax({
           url: 'create_user',
           data:$('#create_user').serialize(),
           type:'post',
           async: false,
           success:function(result){
             if(result.status=="success"){
              Toast.fire({
                icon: 'success',
                title:'&nbsp;&nbsp;'+result.msg
              })
             }else{
              Toast.fire({
                icon: 'warning',
                title:'&nbsp;&nbsp;'+result.msg
              })
             }
              
          } 
         
         })
    }
    $('#send_emp_login_form').submit(function(e){
      e.preventDefault();
       var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
      });
     $.ajax({
         url: 'send_login_details_to_emp',
         data:$('#send_emp_login_form').serialize(),
         type:'post',
         success:function(result){
           console.log(result);
           if(result.status=="success"){
              $("#wrap").find(".created_row").remove();
              $(".fa-upload").show();
              $(".fa-spinner").hide();
            Toast.fire({
              icon: 'success',
              title:'&nbsp;&nbsp;'+result.msg
            })
          $('#upload_attendance_form')['0'].reset();
          $("#emp_search").select2("val",result.emp_id);
          }else if(result.status=="updated"){
          $("#emp_search").select2("val",result.emp_id);
          $(".fa-upload").show();
          $(".fa-spinner").hide();
            Toast.fire({
              icon: 'success',
              title:'&nbsp;&nbsp;'+result.msg
            })
            }else{
              $(".fa-upload").show();
              $(".fa-spinner").hide();
              Toast.fire({
                icon: 'warning',
                title:'&nbsp;&nbsp;'+result.msg
              })
            }
          }
      })
    })


    // Field validation rules
    function field_validation1(name1,id, errid){
      var regex_name = /^[a-zA-Z'\s]{1,40}$/;
    
      if($("#"+ id).val().length<2){
        $('#'+ errid).html('Please enter '+name);
       }else{
      $('#'+ errid).html('');
    }
    }
    function field_validation(name,id, errid){
      var regex_name = /^[a-zA-Z'\s]{1,40}$/;
    if(regex_name.test($("#"+ id).val())){
      $('#'+ errid).html('');
     }else{
       $('#'+ errid).html('Please enter '+name+' field');
    }
    }
    function date_validation(name,id, errid){
      var date_name = /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;
    if(date_name.test($("#"+ id).val())){
      $('#'+ errid).html('');
     }else{
       $('#'+ errid).html('Please enter '+name+' date');
    }
    }

    function contact_validation(name,id, errid){
      var contact_name = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;
    if(contact_name.test($("#"+ id).val())){
      $('#'+ errid).html('');
     }else{
       $('#'+ errid).html('Please enter '+name+' contact');
    }
    }

    function pincode_validation(name,id, errid){
      var regex_name = /^[0-9]{6,6}$/;
    if(regex_name.test($("#"+ id).val())){
      $('#'+ errid).html('');
     }else{
       $('#'+ errid).html('Please enter '+name+' field');
    }
    }
// Personal info management start
    
    $('#submit_personal_info_form').submit(function(e){
      alert("ioio");
      e.preventDefault();
  
      if($("#p_address").val().length<2){
        $("#error_p_address").html("Please enter address field");
       }else{
        $("#error_p_address").html("");
      }
      if($("#p_city").val().length<2){
        $("#error_p_city").html("Please enter city field");
       }else{
        $("#error_p_city").html("");
      }
      if($("#p_state").val().length<2){
        $("#error_p_state").html("Please enter state field");
       }else{
        $("#error_p_state").html("");
      }
      if($("#p_pincode").val().length === 6){
        $("#error_p_pincode").html("");
       }else{
      $("#error_p_pincode").html("Please enter pincode field");
      }
      if($("#personal_contact").val().length === 10){
        $("#error_personal_contact").html("");
       }else{
      $("#error_personal_contact").html("Please enter this field");
      }
      if($("#guardian_contact").val().length === 10){
        $("#error_guardian_contact").html("");
       }else{
      $("#error_guardian_contact").html("Please enter this field");
      }
  if($("#p_address").val().length>2 && $("#p_city").val().length>2 && $("#p_state").val().length>2 && $("#p_pincode").val().length === 6 && $("#personal_contact").val().length === 10 && $("#guardian_contact").val().length === 10){
    emp_personal_info();
  }
  
    })

    $("#is_it_curent_address").click(function(){
      $('#curent_address').hide();
      $("#error_c_address,#error_c_city,#error_c_state,#error_c_pincode").html("");

      })
      $("#no_curent_address").click(function(){
      $('#curent_address').show();
      if($("#c_address").val().length<2){
        $("#error_c_address").html("Please enter current addresss field");
       }else{
        $("#error_c_address").html("");
      }
      if($("#c_city").val().length<2){
        $("#error_c_city").html("Please enter current addresss field");
       }else{
        $("#error_c_address").html("");
      }
      if($("#c_state").val().length<2){
        $("#error_c_state").html("Please enter state field");
       }else{
        $("#error_c_state").html("");
      } 
      if($("#c_pincode").val().length === 6){
        $("#error_c_pincode").html("");

       }else{
        $("#error_c_pincode").html("Please enter pincode field");

      }
      })

      function emp_personal_info(){
         var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000
        });
        console.log("submit_personal_info_form");
       $.ajax({
           url: 'manage-personal-info',
           data:$('#submit_personal_info_form').serialize(),
           type:'post',
           success:function(result){
             console.log(result);
             if(result.status=="success"){
              Toast.fire({
                icon: 'success',
                title:'&nbsp;&nbsp;'+result.msg
              })
              window.location.href="personal-info"
            }else{
              Toast.fire({
                icon: 'error',
                title:'&nbsp;&nbsp;'+result.msg
              })
            }
           }
        })
      }
      $('#submit_update_personal_info_form').submit(function(e){
        alert("submit_update_personal_info_form");
        e.preventDefault();
        emp_update_personal_info();
      })
      
      function emp_update_personal_info(){

        var Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 1000
       });
       console.log("submit_update_personal_info_form");
      // $.ajax({
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          url: '/update-personal-info',
          data:$('#submit_update_personal_info_form').serialize(),
          type:'post',
          success:function(result){
            console.log(result);
            if(result.status=="success"){
             Toast.fire({
               icon: 'success',
               title:'&nbsp;&nbsp;'+result.msg
             })
             window.location.href="personal-info"
           }else if(result.status="error"){
             Toast.fire({
               icon: 'warning',
               title:'&nbsp;&nbsp;'+result.msg
             })
           }else{
            Toast.fire({
              icon: 'warning',
              title:'&nbsp;&nbsp;'+result.msg
            })
          }
          }
       })
     }
// Personal info management end

// Academic info management start
      $('#submit_academic_info_form').submit(function(e){
        // $("#qualification_certificate").val()
        e.preventDefault();
       
        if($("#highest_qualification").val().length<2){
          $("#error_highest_qualification").html("Please enter this field");
         }else{
          $("#error_highest_qualification").html("");
        }
        if($("#university_college").val().length<2){
          $("#error_university_college").html("Please enter this field");
         }else{
          $("#error_university_college").html("");
        }
        if($("#from_date").val() !=''){
          $("#error_from_date").html("");
         }else{
          $("#error_from_date").html("Please enter this field");
        }
        if($("#to_date").val() !=''){
          $("#error_to_date").html("");
         }else{
        $("#error_to_date").html("Please enter this field");
        }
        if($("#qualification_certificate").val() !=''){
          $("#error_qualification_certificate").html("");
    
         }else{
        $("#error_qualification_certificate").html("Please upload certificate/marksheet copy");
        }
    if($("#highest_qualification").val().length>2 && $("#university_college").val().length>2 && $("#from_date").val() !='' && $("#to_date").val() !=''){
      let formData = new FormData(this);
      formData.append('highest_qualification', $("#highest_qualification").val());
      formData.append('university_college', $("#university_college").val());
      formData.append('from_date', $("#from_date").val());
      formData.append('to_date', $("#to_date").val());
      var input = document.querySelector('input[type=file]');
      var file = input.files[0];
      formData.append("qualification_certificate", file);
      // formData.append('qualification_certificate', $("#error_qualification_certificate").val(), 'fileName');
    
      console.log(formData);
      alert(formData);
      emp_academic_info(formData);
    }
  })

  function emp_academic_info(formData){
    
    var Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 2000
   });
   console.log("submit_academic_info_form");
  $.ajax({
      type:'post',
      url: 'manage-academic-info',
      data:formData,
      contentType: false,
      processData: false,
      success:function(result){
        console.log(result);
        if(result.status=="success"){
         Toast.fire({
           icon: 'success',
           title:'&nbsp;&nbsp;'+result.msg
         })
         window.location.href="academic-info"
       }else{
         Toast.fire({
           icon: 'error',
           title:'&nbsp;&nbsp;'+result.msg
         })
       }
      }
   })
 }
 $('#submit_update_academic_info_form').submit(function(e){
  e.preventDefault();

  if($("#highest_qualification").val().length>2 && $("#university_college").val().length>2 && $("#from_date").val() != '' && $("#to_date").val() != ''){
  alert("submit_update_academic_info_form");
  let formData = new FormData(this);
  formData.append('highest_qualification', $("#highest_qualification").val());
  formData.append('university_college', $("#university_college").val());
  formData.append('from_date', $("#from_date").val());
  formData.append('to_date', $("#to_date").val());
  var input = document.querySelector('input[type=file]');
  var file = input.files[0];
  formData.append("qualification_certificate", file);
  // formData.append('qualification_certificate', $("#error_qualification_certificate").val(), 'fileName');

   alert(formData);
  emp_update_academic_info(formData);
  }
})

function emp_update_academic_info(formData){

  var Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 1000
 });
 console.log("submit_update_personal_info_form");
// $.ajax({
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    url: '/update-academic-info',
    data:formData,
    type:'post',
    contentType: false,
    processData: false,
    success:function(result){
      console.log(result);
      if(result.status=="success"){
       Toast.fire({
         icon: 'success',
         title:'&nbsp;&nbsp;'+result.msg
       })
       window.location.href="personal-info"
     }else if(result.status="error"){
       Toast.fire({
         icon: 'warning',
         title:'&nbsp;&nbsp;'+result.msg
       })
     }else{
      Toast.fire({
        icon: 'warning',
        title:'&nbsp;&nbsp;'+result.msg
      })
    }
    }
 })
}
// academic info management end
// professional info management start
 $('#submit_professional_info_form').submit(function(e){
  // $("#qualification_certificate").val()
  e.preventDefault();
 
  if($("#company_name").val().length<2){
    $("#error_company_name").html("Please enter this field");
   }else{
    $("#error_company_name").html("");
  }
  
  if($("#from_date").val() !=''){
    $("#error_from_date").html("");
   }else{
    $("#error_from_date").html("Please enter this field");
  }
  if($("#to_date").val() !=''){
    $("#error_to_date").html("");
   }else{
  $("#error_to_date").html("Please enter this field");
  }
  if($("#experience_letter").val() !=''){
    $("#error_experience_letter").html("");

   }else{
  $("#error_experience_letter").html("Please upload experience letter");
  }
   if($("#sallary_slip").val() !=''){
    $("#error_sallary_slip").html("");

   }else{
  $("#error_sallary_slip").html("Please upload sallary slip");
  }
if($("#company_name").val().length>2 && $("#from_date").val() !='' && $("#to_date").val() !=''){
let formData = new FormData(this);
formData.append('company_name', $("#company_name").val());
formData.append('from_date', $("#from_date").val());
formData.append('to_date', $("#to_date").val());
formData.append('experience_letter', $("#experience_letter").val());

var input = document.querySelector('input[type=file]');
var file = input.files[0];
formData.append("qualification_certificate", file);
// formData.append('qualification_certificate', $("#error_qualification_certificate").val(), 'fileName');

console.log(formData);
alert(formData);
emp_professional_info(formData);
}
})

function emp_professional_info(formData){

var Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 2000
});
console.log("submit_emp_professional_info");
$.ajax({
type:'post',
url: 'manage-professional-info',
data:formData,
contentType: false,
processData: false,
success:function(result){
  console.log(result);
  if(result.status=="success"){
   Toast.fire({
     icon: 'success',
     title:'&nbsp;&nbsp;'+result.msg
   })
   window.location.href="professional-info"
 }else{
   Toast.fire({
     icon: 'error',
     title:'&nbsp;&nbsp;'+result.msg
   })
 }
}
})

}



$('#submit_update_professional_info_form').submit(function(e){
  e.preventDefault();

  if($("#company_name").val().length>2 && $("#from_date").val() != '' && $("#to_date").val() != ''){
  alert("submit_update_academic_info_form");
  let formData = new FormData(this);
  formData.append('company_name', $("#company_name").val());
  formData.append('from_date', $("#from_date").val());
  formData.append('to_date', $("#to_date").val());
  var input = document.querySelector('input[type=file]');
  var file1 = input.files[0];
  var file2 = input.files[1];
  // formData.append("experience_letter", file1);
  // formData.append("sallary_slip", file2);
  // formData.append('qualification_certificate', $("#error_qualification_certificate").val(), 'fileName');

   alert(formData);
 
  emp_update_professional_info(formData);
  }
})

function emp_update_professional_info(formData){
$("#update_save_text_btn").html('processing...');
  var Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 1500
 });
 console.log("submit_update_personal_info_form");
   $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    url: '/update-professional-info',
    data:formData,
    type:'post',
    contentType: false,
    processData: false,
    success:function(result){
      setTimeout(function() {
        $("#update_save_text_btn").html('Save');
      }, 200);
      console.log(result);
      if(result.status=="success"){
       Toast.fire({
         icon: 'success',
         title:'&nbsp;&nbsp;'+result.msg
       })
       window.location.href="personal-info"
     }else if(result.status="error"){
       Toast.fire({
         icon: 'warning',
         title:'&nbsp;&nbsp;'+result.msg
       })
     }else{
      Toast.fire({
        icon: 'warning',
        title:'&nbsp;&nbsp;'+result.msg
      })
    }
    }
 })
}
// professional info management
