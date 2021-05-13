
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
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    </head>
    
    <body class="blue-skin" onload="startTimer()">
        
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
                    <h2>Reject Booking </h2>
                </div>
            </div>
        </div>

    <br>
   
    <section class="gray">
            <div class="container">
                
                <!-- row -->
                <div class="row">
                    <!-- Start Sidebar -->
                    
                
                    <div class="col-md-6 col-sm-6">
                    
                
                <span id='red'></span>
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3, 0);?>" id="id">
                 <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="myModalLabel1">
                    <div class="modal-body">
                        <div class="tab-content"> 
                             <div class="tab-pane fade in show active" id="vendor" role="tabpanel" style="">
                                
                                
                                <div class="page" style="text-align :center;">
                                    <h4 class="price"><u>Reasons for Rejection</u></h4>
                                    <br>
                                  <!-- <h6 style="text-align :center;">Please Wait ...</h6>   -->                
                                <b style="color :#fa9500">Looks like you are facing some diculties.
                                   Please let us help you next time</b> 
                                
                              <br>
                              <br>
                             

                                <b>This booking is rejected because</b>
                                <br><br>
                         <form class=" form" enctype="multipart/form-data" method="post" action="<?=base_url()?>Myaccount/testdat">
<!-- 
                                 <div class="col-sm-6 col-md-6">
                                <input class="form-control" type="text" name="postff" value="Location too far" style="border-color :#55b537; border 2px solid; border-radius : 5px;" readonly>
                              </div>
                              <div class="col-sm-6 col-md-6">
                                <input class="form-control" type="text" name="postff" value=" Not Interested" style="border-color :#55b537; border 2px solid; border-radius : 5px;" readonly>

                              </div>

                              <div class="col-sm-6 col-md-6">
                                <input class="form-control" type="text" name="postff" value="Not Available at that time" style="border-color :#55b537; border 2px solid; border-radius : 5px;" readonly>
                              </div>

                              <div class="col-sm-6 col-md-6">
                                <input class="form-control" type="text" name="postff" value="My Skilset is not matching" style="border-color :#55b537; border 2px solid; border-radius : 5px;" readonly>

                              </div> -->








                              <div class="col-sm-6 col-md-6" >
                                <input type="hidden" name="myvalue" class="form-control input_text" value="Location too far"/>
                                <button type="button" class="clickme btn inactiveed" style="border-color :#55b537; border 2px solid; border-radius : 5px;width :100%">Location too far</button>
                                </div>
                               
                                <div class="col-sm-6 col-md-6">
                                <input type="hidden" name="myvalue" class="form-control input_text" value="Not Interested"/>
                                <button type="button" class="clickme btn inactiveed" style="border-color :#55b537; border 2px solid; border-radius : 5px; width :100%">Not Interested</button>
                                </div>
                                <br> <br><br><br>
                                <div class="col-sm-6 col-md-6">
                                <input type="hidden" name="myvalue" class="form-control input_text" value="Not Available at that time"/>
                                <button type="button" class="clickme btn inactiveed" style="border-color :#55b537; border 2px solid; border-radius : 5px; width :100%">Not Available at that time</button>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                <input type="hidden" name="myvalue" class="form-control input_text" value="My Skilset is not matching"/>
                                <button type="button" class="clickme btn inactiveed" style="border-color :#55b537; border 2px solid; border-radius : 5px; width :100%">My Skilset is not matching</button>
                                </div>
                                 <br><br><br><br>



                              <div class="col-sm-12 col-md-12">
                                <label style="text-align:left">Others please specify </label>
                                <input class="form-control" type="text" name="postff" value="" style="border-color :#55b537; border 2px solid; border-radius : 5px;">

                              </div>

                             <input type="hidden" name="abc" value="" id="abc"> 
                         <button type="submit" class="btn btn-success button-radious" style="border-color :#55b537; border 2px solid; border-radius : 5px;">Submit</button>
                                 </div>
                                                
                    
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
                <!-- <h1>Please wait for booking<span id="time"> 03:00</span></h1>
                <h6><span id="hodm_results"></span></h6> -->

                

    

                    </div>
                    
                    
                    </div>
                
            </div>
        </section>
        <!-- ====================== End Job Detail 2 ================ -->       
        
        <!-- ================= footer start ========================= -->
        
        
        <!-- Sign Up Window Code -->
         
        <!-- End Sign Up Window -->
        
        <!-- Apply Job Popup -->
         


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
        
        
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#reject').modal('show');
    });
</script>



<script>
$(document).ready(function() {
  $('.clickme').click(function() {
    var div = $(this).closest('div');
   var abc =div.find('input').val();


    document.getElementById('abc').value = abc; 
  });
});
</script>
<script>
$(document).ready(function(){
  $('.btn').click(function(){
    $('.btn').removeClass('activeed').addClass('inactiveed');
     $(this).removeClass('inactiveed').addClass('activeed');
    });
})
</script>

<style>
.btn{color:green}
.activeed{background:green;
    color: rgb(255 255 255);
    }
.inactiveed{background:white}
</style>
</body>
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>