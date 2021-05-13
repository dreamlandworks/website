<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">
	
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:32:01 GMT -->
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
	
    <!-- Icons -->
    <link href="<?php echo base_url()?>assetsfront/plugins/icons/css/icons.css" rel="stylesheet">
    
    <!-- Animate -->
    <link href="<?php echo base_url()?>assetsfront/plugins/animate/animate.css" rel="stylesheet">
    
    <!-- Bootsnav -->
    <link href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="<?php echo base_url()?>assetsfront/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assetsfront/css/responsiveness.css" rel="stylesheet">
	
	<!-- Custom Color -->
    <link href="<?php echo base_url()?>assetsfront/css/skin/default.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
	</head>
	
	<body class="blue-skin">
		
		<!-- ======================= Start Navigation ===================== -->
			<?php  $this->load->view('frontend/navbar'); ?>

		<!-- ======================= End Navigation ===================== -->
		
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title light" style="background:url(assetsfront/img/slider-2.jpg);">
			<div class="container">
				<div class="page-caption">
					<h2>Create An Account</h2>
					<p><a href="#" title="Home">Home</a> <i class="ti-arrow-right"></i> SignUp</p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
		
		<!-- ====================== Start Signup Form ============= -->
		<section class="gray">
			<div class="container">
				<div class="container">
			
					<div class="log-box">
						<form class="log-form" id="register-form" action="" method="post" onsubmit="return false;">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" placeholder="Your Name" name="fname" id="name" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Mobile</label>
										<input type="text" class="form-control" placeholder="Your Mobile Number.." name="phone" id="phone">
									</div>
								</div><div class="col-md-12">
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" placeholder="Your Email.." name="email" id="email">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Date </label>
										<input type="date" class="form-control" placeholder="Date of birth" name="dob" id="dob">
									</div>
								</div>
								
							</div>
							<input type="hidden" name="lat" id="lat" required value="">
							 <input type="hidden" name="lang" id="lang" required value="">

							<div class="row">
								<div class="col-md-12">
									<div class="form-group text-center mrg-top-15">
										<button type="submit" id="load" class="btn theme-btn btn-m">Register</button>
									</div>
								</div>
							</div>
							
						</form>
						
						<!-- <div class="log-option"><span>OR</span></div>
						
						<div class="row">
							<div class="col-md-6">
								<a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>SignUP With Facebook</a>
							</div>
							<div class="col-md-6">
								<a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>SignUp With Google+</a>
							</div>
						</div> -->
						
					</div>
				</div>
				
			</div>
		</section>
		<!-- ====================== End Signup Form ============= -->
		
		<!-- ================= footer start ========================= -->
	<?php  $this->load->view('frontend/footer'); ?>

		
		<!-- Sign Up Window Code -->
			<?php  $this->load->view('frontend/login'); ?> 
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
			
			$('#register-form').validate({ 
		        rules: {
		            name: {
		                required: true,
		               

		            },
		            phone: {
		                required: true,
		                minlength: 10,
		                maxlength: 10,
		                digits: true
		            },
		            email: {
		                required: true,
		                email: true
		            },
		            dob: {
		                required: true,
		                
		            }
		        },
		        messages: {
			        name: {
			            required: "Enter name",
			            name: "Enter The Name",
			        },
			        phone: {
			            required: "Enter mobile number",
			            minlength: "Mobile number should be 10 digit.",
			            maxlength: "Mobile number should be 10 digit.",

			        },
			        email: {
			            required: "Enter email",
			            email: "Enter Valid email",
			        },
			         dob: {
		                required: "Enter dob",
		              
		            }
			        
			    },
			     submitHandler: function(form) 
			    {
			       if ($('#lat').val()){ $.ajax({
			            url: "<?= base_url(); ?>/LoginRegistration/register", 
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
			            			window.location.href = "<?= base_url();?>Home/match_otp";
			            		 }, 1000);
			            	}else{
			            		$.toaster({ priority : 'danger', title : 'Error', message : data.msg });
			            	}
			            }
			        });
			        return false;
			    }
			    else{

			    	window.location.href = "<?= base_url();?>LoginRegistration";
			    		
			    }
			    },
		    });

		   



		});	
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
		 }
		  });


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
	<script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
	


    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:32:01 GMT -->
</html>