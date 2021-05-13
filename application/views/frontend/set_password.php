<!DOCTYPE html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:52 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index,follow">

    <title>Satrango</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootstrap.min.css">
    
    <!-- Bootstrap Select Option css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootstrap-select.min.css">
    
    <!-- Icons -->
    <link href="<?php echo base_url()?>assetsfront/plugins/icons/css/icons.css" rel="stylesheet">
    
    <!-- Nice Select Option css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assetsfront/plugins/nice-select/css/nice-select.css">
    
    <!-- Animate -->
    <link href="<?php echo base_url()?>assetsfront/plugins/animate/animate.css" rel="stylesheet">
    
    <!-- Bootsnav -->
    <link href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
    
    <!-- Aos Css -->
    <link href="<?php echo base_url()?>assetsfront/plugins/aos-master/aos.css" rel="stylesheet">

    <!-- Slick Slider -->
    <link href="<?php echo base_url()?>assetsfront/plugins/slick-slider/slick.css" rel="stylesheet"> 
    
    <!-- Custom style -->
    <link href="<?php echo base_url()?>assetsfront/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assetsfront/css/responsiveness.css" rel="stylesheet">
    
    <!-- Custom Color -->
    <link href="<?php echo base_url()?>assetsfront/css/skin/default.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
   
    
    </head>
    
    <body class="blue-skin">
        
        <!-- ======================= Start Navigation ===================== -->
    

    <!-- Preloader Start Here -->
       <!-- main -->
<div class="page-title light" style="background:url(<?php echo base_url();?>assetsfront/img/slider-2.jpg);">
      <div class="container">
        <div class="page-caption">
          <h2>Set Password</h2>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
       <div class="container">

          <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 separator social-login-box"> <br>
                                                 
                                                  </div>
                        <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                       
                                <form  id="change-password" action="" method="post" onsubmit="return false;">
                        <input type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                              <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                              <input class="form-control" type="password" name="c_password" id="c_password" placeholder="Confirm  Password">
                            </div>
                          </div>
                          <div class="">
                  <button type="submit" class="btn icon-btn-save btn-success">Submit</button>
                </div>
                        </form>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3 separator social-login-box"> <br>
                                                 
                                                  </div>

                    </div>
                </div>


    <!-- end main  -->

        
         
        <!-- =================== START JAVASCRIPT ================== -->
        <!-- Jquery js-->
        <script src="<?php echo base_url()?>assetsfront/js/jquery.min.js"></script>
        
        <!-- Bootstrap js-->
        <script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Bootsnav js-->
        <script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/bootsnav.js"></script>
        <script src="<?php echo base_url()?>assetsfront/js/viewportchecker.js"></script>
        
        <!-- Slick Slider js-->
        <script src="<?php echo base_url()?>assetsfront/plugins/slick-slider/slick.js"></script>
        
        <!-- wysihtml5 editor js -->
        <script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
        
        <!-- Aos Js -->
        <script src="<?php echo base_url()?>assetsfront/plugins/aos-master/aos.js"></script>
        
        <!-- Nice Select -->
        <script src="<?php echo base_url()?>assetsfront/plugins/nice-select/js/jquery.nice-select.min.js"></script>
        
        <!-- Custom Js -->
        <script src="<?php echo base_url()?>assetsfront/js/custom.js"></script>
        <script src="<?php echo base_url()?>assetsfront/js/jQuery.style.switcher.js"></script>
        
        <script>
        AOS.init();
        </script>



        <script type="text/javascript">
    $(document).ready(function(){
        $('#change-password').validate({ 
            rules: {
                 password: {
                    required: true,
                    minlength: 6
                },
                c_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
              password: {
                  required: "Enter password",
                  minlength: "Password atleast 6 digit."
              },
              c_password:{
                  required: "Enter confirm password",
                  equalTo: "Confirm password don't match.",
              }
          },

           submitHandler: function(form) 
          {                   

              $.ajax({
                  url: "<?= base_url(); ?>LoginRegistration/set_password", 
                  type: "POST",             
                  data: $(form).serialize(),
                  cache: false,             
                  processData: false, 
                  dataType: "json",
                  // console.log(data);
                  success: function(data) 
                  {
                    if(data.result){
                      // $.toaster({ priority : 'success', title : 'Success', message : data.msg });
                      // setTimeout(function(){ 
                      //   window.location.href = "<?php echo base_url() ?>Home";
                      // }, 1000);

              swal.fire({
                                text: "success! Now you are login successfully..",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Login!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            }).then(function() {
                                    // KTUtil.scrollTop();
                                     window.location.href = "<?php echo base_url() ?>Home";
                                 });

                    }else{
                      // $.toaster({ priority : 'danger', title : 'Error', message : data.msg });
                      swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        // KTUtil.scrollTop();
                    });
                    }
                  }
              });
              return false;
          },
        });
    }); 
  </script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>