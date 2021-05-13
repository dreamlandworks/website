
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    
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
                       <h4>All <span class="theme-cl">Services List</span></h4>
                       <p>Each services,belongs to categories used services applications every day.</p>
                    </div>
                </div>
            </div>
            <div class="row">
             <?php foreach($services AS $row):?>
              
              <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="employer-widget">
                    <div class="u-content">
                    <a href="<?php echo base_url()?>Home/all_services_list/<?=$row->id?>">
                        <img class="img-responsive" src="<?php echo base_url()?>assets/media/users/<?=$row->icon;?>" alt="" style="height: 200px; width: 185px;">
                    </a>
                   
                </div>
                <h5><br><a href="<?php echo base_url()?>Home/all_services_list/<?=$row->id?>"><?=ucfirst($row->name);?></a></h5>
                  <a href="<?=base_url();?>Home/vendors/<?=$row->id;?>" class="theme-cl" title="Read More..">view...</a>
                <br> <br>                  
              </div>
              </div>
            <?php endforeach;  ?>
            <br>
            
            </div>
            
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
                              var x = data.msg; 
                              var su = x.fontcolor("green");
                                        document.getElementById("demo").innerHTML = su;
                              $.toaster({ priority : 'success', title : 'Success', message : data.msg });
         
                              setTimeout(function(){ 
                                              
                                 
                                window.location.href = "<?php echo base_url() ?>Home/Login_type";
                              }, 1000);
                           }else{
                              var x = data.msg; 
                              var su = x.fontcolor("red");
                                        document.getElementById("demo").innerHTML = su;
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

</html>