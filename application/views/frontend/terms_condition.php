
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
<!-- <div class="page-title light" style="">
      <div class="container">
        <div class="page-caption">
          <h2>Vendor Services List</h2>
        </div>
      </div>
    </div> -->

    <div class="page-title light" style="background:url(<?php echo base_url()?>assetsfront/img/slider-2.jpg);">
            <div class="container">
                <div class="page-caption">
                    <h2>Terms & Conditions</h2>
                </div>
            </div>
        </div>

    <br>
    <br>
    <br>
    
<section>
      <div class="container">
      
        <!-- Nav tabs -->
        
        
          
          <!-- Recent Job -->
          
            <div class="row">
            <h2>Terms & Conditions</h2>


              <!-- Single Job -->
              <div class="col-lg-12col-md-12 col-sm-12">
                <div class="employer-widget">
                            <div class="u-content">
                  
                  <?php echo $Privacy->terms; ?>

                 
                </div>
                              
                    </div>                     
              </div>

                  
            
              </div>
                          
            <br>
            <br>
           
        </div>
        
        
        
    </section>

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
                        url: "<?= base_url(); ?>LoginRegistration/login", 
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
                                    window.location.href = "<?php echo base_url() ?>Home/Login_type";
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
    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>