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

    <div class="page-title light" style="background:url(<?php echo base_url();?>assetsfront/img/slider-2.jpg);">
      <div class="container">
        <div class="page-caption">
             <h2>Login As</h2>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
       <div class="container">
               
          <div class="row">
                    <div class="col-xs-5 col-sm-4 col-md-4 separator social-login-box"> <br>
                         
                    </div>
                    
          
           <?php $userdata= $this->db->query('select * from  users where id= '.$this->session->userdata('Id').'')->row() ?>
                              


                    <div style="margin-top:80px;" class="col-xs-4 col-sm-4 col-md-4 login-box"  id="service_provider<?=$userdata->id ?>">
                       <div id="service_provider<?=$userdata->id ?>">
                             <a href="<?= base_url();?>Home" onclick="mylogionas(<?=$userdata->id ?>,0);" class="btn btn-info" style="width: 196px;">User</a>
                       </div>

                  
                          <br><br>


                        <div id="service_provider<?=$userdata->id ?>">
                              <?php if($userdata->profile == 0): ?>
                             
                              <a  href="<?= base_url();?>Home/updateprofile" onclick="mylogionas(<?=$userdata->id ?>,1);" class="btn btn-info" style="width: 196px;">Service Provider</a>
                             <?php else: ?>
                           <a  href="<?= base_url();?>VendorHome" onclick="mylogionas(<?=$userdata->id ?>,1);" class="btn btn-info" style="width: 196px;">Service Provider</a>

                        <?php endif; ?>
                         </div>
                         <br><br>
                   
                    </div>


                    <div class="col-xs-4 col-sm-4 col-md-4 separator social-login-box"> <br>
                         
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




        
        <script>
    
function mylogionas(userdata_id,service_provider) {

$.ajax({
        type: "POST",
        url: "<?= base_url();?>Home/serviceprovider_status",
        data: {userdata_id: userdata_id,service_provider:service_provider},
        success: function(result) {

            document.getElementById("service_provider"+userdata_id).innerHTML = result;
       
        }
  
});
}



</script>
  

    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>