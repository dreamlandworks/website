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


    <br>

       <div class="container">
    <div class="main-body">
<br><br><br><br>
        <?php  if(isset($error)){ echo $error; }
                     echo $this->session->flashdata('success_req'); ?>
         				<div class="row">
					<!-- Start Sidebar -->
					
					
					<!-- Start Job List -->
					<div class="col-md-12 col-sm-12">
						
						
			 <?php if($user_details['service_provider'] == 0): ?>
                 <div class="col-md-12 col-sm12" style="text-align : center">
											<h5> My account</h5>
										</div>
            
						<!-- Single Verticle job -->
						<div class="job-verticle-list">
							<div class="vertical-job-card">
								<div class="vertical-job-body">
									<div class="row">


										<div class="col-md-4 col-sm4">
											
											
									   <?php
                                if (file_exists('assets/uploaded/users/'.$user_details['image'])): ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/'.$user_details['image'];?>" alt="" class="img-fluid" class="rounded-circle" width="150">
                            <?php else: ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/users.png';?>" alt="" class="img-fluid" class="rounded-circle" width="150">
                            <?php endif; ?>

										</div>
										<div class="col-md-4 col-sm-4">
											<div class="vrt-job-act">
												<b class="vendorname"><?= ucfirst($user_details['fname'] ); ?></b>
												<br>
												<div class="card-body">
													<h5>Balance</h5>
												<h3 class="price">₹280.00</h3>
													</div>
												</div>
												</div>
										</div>
										
									</div>
								</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-act">
												<div class="card-body">
													<h5>Job Postings</h5>
												<h3 class="price">₹280.00</h3>
													</div>
												</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-rating">
												<div class="card-body">
													<h5>Referrals</h5>
												<h3 class="price">₹230.00</h3>
													</div>
												</div>
											</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-review">
											<div class="card-body">
													<h5>Bookings</h5>
												<h3 class="price">₹50.00</h3>
													</div>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<p>Commission Earned</p>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-act">
												<div class="card-body">
													<h5>This Month</h5>
												<h3 class="price">5</h3>
													</div>
												</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-rating">
												<div class="card-body">
													<h5>Previous Month</h5>
												<h3 class="price">5</h3>
													</div>
												</div>
											</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-review">
											<div class="card-body">
													<h5>Change</h5>
												<h3 class="price">5</h3>
													</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                             <p>Transaction History
                                    </p>

 							</div>
						</div>	
					</div>
						</div>

								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                             <p>Current Plan
                                    </p>

 							</div>
						</div>	
					</div>
						</div>

								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                             <p>Add/ Withdraw Funds
                                    </p>

 							</div>
						</div>	
					</div>
						</div>

							</div>
						</div>
						
						<!-- Single Verticle job -->
						
						
						<!-- Single Verticle job -->
					
						
						<!-- Single Verticle job -->
					
						
						<!-- Single Verticle job -->
						
						
			

						
					</div>
                <?php else:?>
                      <div class="col-md-12 col-sm12" style="text-align : center">
											<h5> My account</h5>
										</div>
            
						<!-- Single Verticle job -->
						<div class="job-verticle-list">
							<div class="vertical-job-card">
								<div class="vertical-job-body">
									<div class="row">


										<div class="col-md-4 col-sm4">
											
											
									   <?php
                                if (file_exists('assets/uploaded/users/'.$user_details['image'])): ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/'.$user_details['image'];?>" alt="" class="img-fluid" class="rounded-circle" width="150">
                            <?php else: ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/users.png';?>" alt="" class="img-fluid" class="rounded-circle" width="150">
                            <?php endif; ?>

										</div>
										<div class="col-md-4 col-sm-4">
											<div class="vrt-job-act">
												<b class="vendorname"><?= ucfirst($user_details['fname'] ); ?></b>
												<br>
												<div class="card-body">
													<h5>Balance</h5>
												<h3 class="price">₹280.00</h3>
													</div>
												</div>
												</div>
										</div>
										
									</div>
								</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-3 col-sm-3">
											<div class="cmp-job-act">
												<div class="card-body">
													<h5>Tasks</h5>
												<h3 class="price">12</h3>
													</div>
												</div>
										</div>
										<div class="col-md-3 col-sm-3">
											<div class="cmp-job-rating">
												<div class="card-body">
													<h5>Bids</h5>
												<h3 class="price">12</h3>
													</div>
												</div>
											</div>
										
										<div class="col-md-3 col-sm-3">
											<div class="cmp-job-review">
											<div class="card-body">
													<h5>Referrals</h5>
												<h3 class="price">12</h3>
													</div>
											</div>
										</div>

										<div class="col-md-3 col-sm-3">
											<div class="cmp-job-review">
											<div class="card-body">
													<h5>Earnings</h5>
												<h3 class="price">510</h3>
													</div>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<p>Earnings Summary</p>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-act">
												<div class="card-body">
													<h5>This Month</h5>
												<h3 class="price">5</h3>
													</div>
												</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-rating">
												<div class="card-body">
													<h5>Previous Month</h5>
												<h3 class="price">5</h3>
													</div>
												</div>
											</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-review">
											<div class="card-body">
													<h5>Change</h5>
												<h3 class="price">5</h3>
													</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-act">
                                             <p>Bids Left -
                                    </p>

 							</div>
						</div>

							<div class="col-md-4 col-sm-4">
											<div class="cmp-job-act">
                                             <p>18/100 
                                    </p>

 							</div>
						</div>	

						<div class="col-md-4 col-sm-4">
											<div class="cmp-job-act">
                                            <a href="#">Buy More</a>
                                    </p>

 							</div>
						</div>	
					</div>
						</div>

								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                             <p>My Reviews (5)
                                    </p>

 							</div>
						</div>	
					</div>
						</div>

						<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                             <p>Transaction History
                                    </p>

 							</div>
						</div>	
					</div>
						</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="cmp-job-act">
                                             <p>Current Plan
                                    </p>

 							</div>
						</div>
							<div class="col-md-6 col-sm-6">
											<div class="cmp-job-act">
                                             <p>Free</p>
                                             <a href="#">View Plans</a>

 							</div>
						</div>	
					</div>
						</div>

								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                             <p>Add/ Withdraw Funds
                                    </p>

 							</div>
						</div>	
					</div>
						</div>

							</div>
						</div>
						
						<div class="job-verticle-list">
							<div class="vertical-job-card">
								<div class="vertical-job-body">
									<div class="row">
                            <div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                   <h5 style="text-align : center;"> Reviews</h5>


 							</div>
						</div> 

						 <div class="col-md-12 col-sm-12">
											<div class="cmp-job-act">
                                   <h5> Reviews & Rating</h5>


 							</div>
						</div>


									</div>	</div>	</div>	</div>
						<!-- Single Verticle job -->
						
						
						<!-- Single Verticle job -->
					
						
						<!-- Single Verticle job -->
					
						
						<!-- Single Verticle job -->
						
						
			

						
					</div>
					 <?php endif; ?>
					
        </div>
    </div>
    </div>



    <!-- end main  -->
    <?php  $this->load->view('frontend/footer'); ?>
        
         
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
                        url: "<?= base_url(); ?>LoginRegistration/Home", 
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
                                    window.location.href = "<?php echo base_url() ?>Home";
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
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
    
<script>
    
function myFunction(user_id,service_provider) {

$.ajax({
        type: "POST",
        url: "<?= base_url();?>LoginRegistration/Approve_status",
        data: {user_id: user_id,service_provider:service_provider},
        success: function(result) {

            document.getElementById("service_provider"+user_id).innerHTML = result;
       
        }
  
});
}



</script>
    </body>
<style type="text/css">


.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
</style>
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>