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
	
	<!-- Bootsnav -->
    <link href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
	
    <!-- Icons -->
    <link href="<?php echo base_url()?>assetsfront/plugins/icons/css/icons.css" rel="stylesheet">
	
	<!-- Bootstrap wysihtml5 ditor-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootstrap-wysihtml5.css">
    
    <!-- Animate -->
    <link href="<?php echo base_url()?>assetsfront/plugins/animate/animate.css" rel="stylesheet">
	
	<!-- Nice Select Option css -->
	
	<!-- Date Dropper -->
    <link href="<?php echo base_url()?>assetsfront/plugins/date-dropper/datedropper.css" rel="stylesheet">
	
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
		<!-- ======================= End Navigation ===================== -->
		
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title light" style="background:url(<?php echo base_url()?>assetsfront/img/slider-2.jpg);">
			<div class="container">
				<div class="page-caption">
					<h2>Update profile</h2>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->

		<!-- ======================= Start Create Company ===================== -->
		<section class="create-company gray">
			<div class="container">
				
		 <form action="<?php echo base_url()?>Home/User_actions/user_edit/<?=$user_details['id']?>" method="post" enctype="multipart/form-data">

					
					<!-- General Information -->
					<div class="box">
						<div class="box-header">
						</div>
						<div class="box-body">
							<div class="row">
							
								<div class="col-sm-6">
									<label> Name</label>
									<input type="text" class="form-control" name="name"  value="<?php echo $user_details['fname'] ;?>" required>
								</div>
								<div class="col-sm-6">
									<label>Mobile</label>
									<input type="text" class="form-control" name="mobile"  value="<?php echo $user_details['phone'] ;?>" required>

								</div>
								<div class="col-sm-6">
									<label>Email</label>
									<input type="email" class="form-control" name="email"  value="<?php echo $user_details['email'] ;?>" required>
								</div>
								
								
								
								<div class="col-sm-6 m-clear">
									<label>Date Of Birth</label>
									<input type="date" class="form-control" name="dob"  value="<?php echo $user_details['dob'] ;?>" required>
								</div>
								
								
								<div class="col-sm-6">
									<label>Profile image</label>
                          <input type="file" name="image" class="form-control">
                                    <img src="<?=base_url()?>assets/uploaded/users/<?=$user_details['image']?>" style="height: 200px; width: 200px; border-radius: 15px;">
                                  </div>
								
								

								<div class="col-sm-6">
									<label>Gender</label>
									<select name="gender" class="wide form-control selectpicker">
										 <option <?php if($user_details['gender']=="Male"): echo " selected " ; endif ?>   value="Male">Male</option>
                                          <option <?php if($user_details['gender']=="Female"): echo " selected " ; endif ?> value="Female">Female</option>
                                          <option <?php if($user_details['gender']=="Other"): echo " selected " ; endif ?> value="Other">Other</option>
                                       
									</select>
								</div>
								
							</div>
						</div>
					</div>
					
					<!-- Company Address -->
					
					
					
				


					



					
            


					
                

					


					<div class="text-center">
						<button type="submit" class="btn btn-m theme-btn">Submit</button>

					</div>
					
				</form>
				<br>
			</div>
		</section>
		
		<!-- ====================== End Create Company ================ -->
		
		
		<!-- ================= footer start ========================= -->
		
		<?php $this->load->view('frontend/footer');?>
		<!-- Sign Up Window Code -->
		  
		<!-- End Sign Up Window -->
		 
		<!-- Color Switcher -->
		
		 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
>
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
		<script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
		<script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
		
		<!-- Aos Js -->
		<script src="<?php echo base_url()?>assetsfront/plugins/aos-master/aos.js"></script>
		
		<!-- Nice Select -->
		
		<!-- Custom Js -->
		<script src="<?php echo base_url()?>assetsfront/js/custom.js"></script>
		<script src="<?php echo base_url()?>assetsfront/js/jQuery.style.switcher.js"></script>
		
 
		
		<!-- Date Dropper Script-->
	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
 
       
        
  
<script type="text/javascript">

var blank_action = jQuery('#blank_action_field').html();
jQuery(document).ready(function() {
   jQuery('#blank_action_field').hide();
});
function appendAction() {
  jQuery('#action_area').append(blank_action);
}
function removeAction(actionElem) {
  jQuery(actionElem).parent().parent().remove();
}
</script>



 
       
		

		
      


    </body>


</html>