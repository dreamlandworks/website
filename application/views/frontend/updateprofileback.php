<!DOCTYPE html>

<html class="no-js" lang="zxx">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">

    <title>Jobvivo - Job Portal Template</title>

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
	
      <link rel="stylesheet" href="<?php echo base_url()?>assetsfront/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assetsfront/multiform/style.css">
    
	</head>
	
	<body class="blue-skin">
		
		<!-- ======================= Start Navigation ===================== -->
		<?php  $this->load->view('frontend/navbar'); ?>
		<!-- ======================= End Navigation ===================== -->
		
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title light" style="background:url(assetsfront/img/slider-2.jpg);">
			<div class="container">
				<div class="page-caption">
					<h2>Update profile</h2>
					<p><a href="<?php echo base_url();?>Home" title="Home">Home</a> <i class="ti-arrow-right"></i> Create Company</p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->

		<!-- ======================= Start Create Company ===================== -->
		<section class="create-company gray">
			<div class="container" id="container">
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                <h3>
                    Account Setup
                </h3>
                <fieldset>
                    <h2>Creat your account</h2>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Eg: aucreative@gmail.com"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="repassword" id="repassword" placeholder="Confirm Password"/>
                    </div>
                </fieldset>

                <h3>
                    Social Profiles
                </h3>
                <fieldset>
                    <h2>Social profiles</h2>
                    <div class="form-group">
                        <input type="text" name="socials_twitter" id="socials_twitter" placeholder="Twitter"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="socials_facebook" id="socials_facebook" placeholder="Facebook"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="socials_google" id="socials_google" placeholder="Google Plus"/>
                    </div>
                </fieldset>

                <h3>
                    Personal Details
                </h3>
                <fieldset> 
                    <h2>Personal Details</h2>
                    <div class="form-group">
                        <input type="text" name="your_name" id="your_name" placeholder="Your name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="your_phone" id="your_phone" placeholder="Phone"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="your_addr" id="your_addr" placeholder="Address"/>
                    </div>
                </fieldset>
            </form>
        </div>

		</section>
		
		<!-- ====================== End Create Company ================ -->
		
		
		<!-- ================= footer start ========================= -->
		
		<?php $this->load->view('frontend/footer');?>
		<!-- Sign Up Window Code -->
		  
		<!-- End Sign Up Window -->
		 
	<!-- Color Switcher -->
		
		 
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
		


		   <script src="<?php echo base_url()?>assetsfront/multiform/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assetsfront/multiform/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo base_url()?>assetsfront/multiform/jquery-steps/jquery.steps.min.js"></script>
    <script src="<?php echo base_url()?>assetsfront/multiform/js/main.js"></script>
	
		
		<!-- Date Dropper Script-->
	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->
 
       
		

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
var blank_action = jQuery('#blank_action_field').html();
jQuery(document).ready(function() {
  jQuery('#blank_outcome_field').hide();
  jQuery('#blank_requirement_field').hide();
  jQuery('#blank_action_field').hide();
});
function appendOutcome() {
  jQuery('#outcomes_area').append(blank_outcome);
}
function removeOutcome(outcomeElem) {
  jQuery(outcomeElem).parent().parent().remove();
}

function appendRequirement() {
  jQuery('#requirement_area').append(blank_requirement);
}
function removeRequirement(requirementElem) {
  jQuery(requirementElem).parent().parent().remove();
}
function appendAction() {
  jQuery('#action_area').append(blank_action);
}
function removeAction(actionElem) {
  jQuery(actionElem).parent().parent().remove();
}
</script>

    </body>


</html>