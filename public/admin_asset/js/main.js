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

    // $('#send_emp_login_form').submit(function(e){
    //   alert("jk");
    //   e.preventDefault();
    //    var Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 2000
    //   });
    //    $.ajax({
    //        url: 'emp/send_login_details_to_emp',
    //        data:$('#send_emp_login_form').serialize(),
    //        type:'post',
    //        async: false,
    //        success:function(result){
    //          if(result.status=="success"){
    //           Toast.fire({
    //             icon: 'success',
    //             title:'&nbsp;&nbsp;'+result.msg
    //           })
    //          }else{
    //           Toast.fire({
    //             icon: 'warning',
    //             title:'&nbsp;&nbsp;'+result.msg
    //           })
    //          }
              
    //       } 
         
    //      })
    // }
    // new here
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
    
    function pincode_validation(name,id, errid){
      var regex_name = /^[0-9]{6,6}$/;
    if(regex_name.test($("#"+ id).val())){
      $('#'+ errid).html('');
     }else{
       $('#'+ errid).html('Please enter '+name+' field');
    }
    }
    
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
  
  if($("#p_address").val().length>2 && $("#p_city").val().length>2 && $("#p_state").val().length>2 && $("#p_pincode").val().length === 6){
    emp_personal_info();
  }
  
      // emp_personal_info();
    //   var Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 2000
    //   });
    //   console.log("submit_personal_info_form");
    //  $.ajax({
    //      url: 'manage-personal-info',
    //      data:$('#submit_personal_info_form').serialize(),
    //      type:'post',
    //      success:function(result){
    //        console.log(result);
    //        if(result.status=="success"){
    //         Toast.fire({
    //           icon: 'success',
    //           title:'&nbsp;&nbsp;'+result.msg
    //         })
    //         window.location.href="personal-info"
    //       }else{
    //         Toast.fire({
    //           icon: 'error',
    //           title:'&nbsp;&nbsp;'+result.msg
    //         })
    //       }
    //      }
    //   })
    })
    $("#is_it_curent_address").click(function(){
      $('#curent_address').hide();
      })
      $("#no_curent_address").click(function(){
      $('#curent_address').show();
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