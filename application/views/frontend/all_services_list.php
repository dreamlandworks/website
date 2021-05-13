
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
                    <h2>Popular Services Vendor</h2>
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
                     <h4>Registered <span class="theme-cl">Vendor List</span></h4>
                     <p>All registered vendor list belogs to multiple services we can hire needed serviecs.</p>
                  </div>
               </div>
               </div>
                <br>
                <br>
                <?php if(count($all_service) == 0): ?>
                <h5><?php echo " No  Popular Services "; ?> </h5>
                <?php else:?>
                	<div class="row">
             <?php foreach($all_service AS $row):?>

              <!-- Single Job -->

                <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="employer-widget">
                    <div class="u-content">
                     <a href="#">
                        <img class="img-responsive" src="<?php echo base_url()?>assets/media/users/<?=$row->user_image;?>" alt="" style="height: 200px; width: 185px;">
                    </a>
                   
                </div>
                <h5><br><a href="<?php echo base_url()?>Home/all_services_list/<?=$row->id?>"><?=$row->user_name;?></a></h5>

                <p><i class="fa fa-map-marker" style="color: #126fb1;"></i> <?=$row->address;?></p>
                        <div class="">
                        <span style="color: #FFD700; font-size:15px;" class="<?php if ($row->rating >= 1) {
                           echo 'fa fa-star';
                           }else{ echo 'fa fa-star-o';} ?>"></span>
                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=2) {
                           echo 'fa fa-star';
                           }else{ echo 'fa fa-star-o'; } ?>" ></span>
                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=3) {
                           echo 'fa fa-star';
                           }else{ echo 'fa fa-star-o';} ?>"></span>
                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=4) {
                           echo 'fa fa-star';
                           }else{ echo 'fa fa-star-o'; } ?>" ></span>
                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=5) {
                           echo 'fa fa-star';
                           }else{ echo 'fa fa-star-o'; } ?>">
                        </span>
                     </div>

                  <a href="<?=base_url();?>Home/vendors/<?=$row->id;?>" class="theme-cl" title="Read More..">view...</a>
                <br> <br>                  
              </div>
              </div>


              
                  
              
               <?php endforeach;  ?>
           <?php endif; ?>
                <br>
            
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