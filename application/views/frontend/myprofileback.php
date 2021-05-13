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
    
   
    
    </head>
    
    <body class="blue-skin">
        
        <!-- ======================= Start Navigation ===================== -->
    <?php  $this->load->view('frontend/navbar'); ?>

    <!-- Preloader Start Here -->
       <!-- main -->


    <br>

       <div class="container">
    <div class="main-body">
<br><br><br><br>
        <?php  if(isset($error)){ echo $error; }
                     echo $this->session->flashdata('success_req'); ?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <?php
                                if (file_exists('assets/uploaded/users/'.$user_details['image'])): ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/'.$user_details['image'];?>" alt="" class="img-fluid" class="rounded-circle" width="150">
                            <?php else: ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/users.png';?>" alt="" class="img-fluid" class="rounded-circle" width="150">
                            <?php endif; ?>

                    <div class="mt-3">
                      <?php echo $user_details['fname'] ;?>
                      
                    </div>
                  </div>
                </div>
              </div>
              <br>
               <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href="<?php echo site_url(); ?>Home/change_password">Change Password<a>
                   
                  </li>
                    
                
                  
                </ul>
                <?php if($user_details['service_provider']==1){ ?>
                                                         <div id="service_provider<?=$user_details['id'] ?>">
                                                           <a class="btn btn-success" onclick="myFunction(<?=$user_details['id'] ?>,0)">Provider</a>
                                                              </div>
                                                        <?php }else{ ?>

                                                            <div id="service_provider<?=$user_details['id'] ?>">
                                                            
                                                       <a class="btn btn-warning" onclick="myFunction(<?=$user_details['id'] ?>,1)">User </a></div>

                                                             <?php } ?><br><br>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user_details['fname'] ;?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user_details['email'] ;?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $user_details['phone'] ;?>
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     
                     <?php echo $user_details['address'] ;?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  
                </div>
                <div class="col-sm-6 mb-3">
                  

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>



    <!-- end main  -->
    <?php  $this->load->view('frontend/footer'); ?>
    <?php  $this->load->view('frontend/login'); ?>
        
         
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

            $('#login-form').validate({ 
                rules: {
                    mobile_email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    mobile_email: {
                        required: "Enter email or Mobile",
                    },
                    password: {
                        required: "Enter password",
                    },
                },
                 submitHandler: function(form) 
                {
                    $.ajax({
                        url: "<?= base_url(); ?>LoginRegistration/Home", 
                        type: "POST",             
                        data: $(form).serialize(),
                        cache: false,             
                        processData: false, 
                        dataType: "json", 
                        success: function(data) 
                        {
                            if(data.result){
                                $.toaster({ priority : 'success', title : 'Success', message : data.msg });
                                setTimeout(function(){ 
                                    window.location.href = "<?php echo base_url() ?>Home";
                                }, 1000);
                            }else{
                                $.toaster({ priority : 'danger', title : 'Error', message : data.msg });
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
    
<script>
    
function myFunction(user_id,service_provider) {

$.ajax({
        type: "POST",
        url: "<?= base_url();?>LoginRegistration/Approve_status",
        data: {user_id: user_id,service_provider:service_provider},
        success: function(result) {

            document.getElementById("service_provider"+user_id).innerHTML = result;
       
        }
  
});
}



</script>
    </body>
<style type="text/css">


.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
</style>
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>