
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
<div class="page-title light" style="">
      <div class="container">
        <div class="page-caption">
          <h2>Popular Services</h2>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
    
<section>
      <div class="container">
      
        <!-- Nav tabs -->
        
        
        <div class="tab-content">
          
          <!-- Recent Job -->
          <div class="tab-pane fade in show active" id="recent" role="tabpanel">
            <div class="row">
               <div class="col-md-12">
                  <div class="heading">
                     <h4>Category By <span class="theme-cl">Services</span></h4>
                     <p>Each services,belongs to categories which is used services by  website as well as applications every day.</p>
                  </div>
               </div>
            </div>
            <div class="row">
                <?php if (count($services)) {?>
                    <?php foreach($services AS $row):?>
              
                <div class="col-md-4 col-sm-6">
                    <div class="blog-box blog-grid-box">
                        <div class="blog-grid-box-img">
                        <img class="img-responsive" src="<?php echo base_url()?>assets/media/users/<?=$row->s_icon;?>" alt="">
                        </div>
                     
                        <div class="blog-grid-box-content">
                        <!-- <?=$row->s_id;?> -->
                            <h4 style="text-align: center;"><a href="#"><?=$row->s_name;?></a></h4>
                            <?php if($this->session->userdata('user_login')==TRUE){?>
                            <a href="<?php echo base_url()?>Home/all_services_list/<?=$row->id?>" class="theme-cl" title="Read More..">Continue...</a>
                            <?php }else{?>
                                <a href="<?php echo base_url()?>Home/vendors/<?=$row->s_id?>" class="theme-cl" title="Read More..">Continue...</a>
                                <!-- <a class="theme-cl" href="javascript:void(0)"  data-toggle="modal" data-target="#signin">
                            <a class="theme-cl" href="javascript:void(0)"  data-toggle="modal" data-target="#signin" title="Read More..">Continue...</a> -->
                            <?php } ?>
                        </div>
                     
                    </div>
                </div>
               <?php endforeach;  ?>
                <br>
                <?php }else{?>

                    <p>Services Not Available</p>
            <?php } ?>
                
            
              </div>
              
            
              <!-- Single Job -->
            </div>
            <br>
            <br>
           
          </div>
          
          <!-- Featured Job -->
          

        </div>
        
        
        
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
    

    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>