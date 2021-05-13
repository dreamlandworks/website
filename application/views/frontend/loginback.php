<!DOCTYPE html>

<html class="no-js" lang="zxx">
	
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:32:01 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">

    <title>Jobvivo</title>

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
	<div class="page-title light" style="background:url(<?php echo base_url();?>assetsfront/img/slider-2.jpg);">
			<div class="container">
				<div class="page-caption">
					<h2>Login</h2>
				</div>
			</div>
		</div>
	
				<div class="container">


			
					<div class="log-box">
						<h4 style="text-align:center;"><i class="ti-user"></i>Login</h4>
						<form  id="login-form" action="" method="post" onsubmit="return false;">
									
									<div class="form-group">
										<label>User Name</label>
										<input type="text" class="form-control" placeholder="User Name" name="mobile_email">
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password"  name="password" class="form-control" placeholder="*********" >
									</div>
									
									<div class="form-group">
										<!-- <span class="custom-checkbox">
											<input type="checkbox" id="44">
											<label for="44"></label>Remember me
										</span> -->
										<a href="<?php echo base_url();?>Home/forgot_password" title="Forget" class="fl-right">Forgot Password?</a>
									</div>
									<div class="form-group text-center">
										<button type="submit" class="btn theme-btn full-width btn-m">LogIn </button>
									</div>
									<div>	<a href="<?php echo base_url();?>LoginRegistration" title="Forget" class="fl-right">Sign Up</a>
									</div>
									
								</form>
						
						
						
				</div>
				
			</div>
		

	
		
	

		 
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










<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
	<script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
	
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

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:32:01 GMT -->
</html>