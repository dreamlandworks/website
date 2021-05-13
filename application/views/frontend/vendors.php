<!DOCTYPE html>
<html class="no-js" lang="zxx">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="robots" content="index,follow">
      <title>Satrango </title>
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
      
      </div>
   </head>
   <body class="blue-skin">
      <!-- ======================= Start Navigation ===================== -->
      <?php  $this->load->view('frontend/navbar'); ?>
      <!-- ======================= End Navigation ===================== -->
      <section>
         <div class="container">
            <div class="tab-content">
               <br>
               <br>

               <div class="row">
               <div class="col-md-12">
                  <div class="heading">
                     <h4>Vendor Available <span class="theme-cl">on  services</span></h4>
                     <p>All registered vendor list on this service.</p>
                  </div>
               </div>
               </div>
               <div class="row">
                  <?php if (count($vendors)) {?>
                     <?php foreach($vendors as $row):?>
                  <div class="col-md-4 col-sm-6">
                     <div class="blog-box blog-grid-box">
                        <div class="blog-grid-box-img">
                           <img src="<?=base_url()?>assets/uploaded/users/<?=$row->v_image;?>" class="img-responsive" alt="" />
                        </div>
                        <div class="blog-grid-box-content">
                        <div class="blog-avatar text-center">
                           
                        </div>
                        <p><strong></strong> <span class="theme-cl"></span></p><br>
                        <p><br><span class="theme-cl"><?=ucwords($row->v_name);?></span></p>
                        <!-- <?=$row->v_id;?> -->
                        <p><i class="fa fa-map-marker" style="color: #126fb1;"></i> <?=$row->v_address;?></p>
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
                      <?php if($this->session->userdata('user_login')==TRUE){?>
                     <a href="<?=base_url()?>Home/single_move_booking/<?=$row->v_id?>" style="color: #0c0cf6;font-size: 15px;font-weight: 800;" title="Read More..">Book Now...</a>
                  <?php }else{?>
                     <a class="theme-cl" href="javascript:void(0)"  data-toggle="modal" data-target="#signin" title="Read More.." style="color: #0909b6;font-size: 15px;font-weight: 800;">Book Now</a>
                  <?php } ?>
                  </div>
                        
                  </div>
                  </div>

                  <?php endforeach;?>
                  <br>
                  <?php }else{ ?>
                     <p>Vendor Not available</p>
                  <?php } ?>

                  <!-- <div class="col-md-12 mrg-top-40">
                     <div class="text-center">
                        <a href="<?php //echo base_url()?>Home/popular_hired" class="btn theme-btn btn-m">More Info</a>
                     </div>
                  </div> -->
               </div>
            </div>
            
         </div>
         <!-- Featured Offers -->
            
       
      </section>
      <!-- ======================= All Jobs ==================================== -->
      <!-- ================= footer start ========================= -->
      <?php  $this->load->view('frontend/footer'); ?>
      <!-- Apply Job Popup -->
      <?php  $this->load->view('frontend/login'); ?>

      <!-- Jquery js-->
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
      $(function() { 
         window.onload = getLocation; 
         var geo = navigator.geolocation; 
         function getLocation() { 
            if (geo) { geo.getCurrentPosition(displayLocation); 
            } else { 
               alert("Oops, Geolocation API is not supported"); 
            } 
         } 
         function displayLocation(position) { 
         var lat = position.coords.latitude; 
         var lang = position.coords.longitude; 
         document.getElementById('lat').value = lat; 
         document.getElementById('lang').value = lang;

         if ($('#lat').val() && $('#lang').val()){ 
            $.ajax({
              data: {lat: lat,lang:lang},
              type: "post",
              url: "<?= base_url();?>Home/index",
               success: function(data){
                 
                  // alert(lang);
                  
              }
            })

         }
      

      }

       
   });

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
     
      
      <!-- auti -->
     
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
      <!-- end auto -->
      <!-- Bootstrap Css -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
      <?php if($this->session->userdata('Id') == 0): ?>  
      <script type="text/javascript">
         $(window).on('load', function() {
             $('#signin').modal('show');
         });
      </script>


      <?php endif; ?>
   </body>
</html>