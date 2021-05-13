
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
                    <h2>Blue Booking</h2>
                </div>
            </div>
        </div>

    <br>
   
    <section class="gray">
			<div class="container">
				
				<!-- row -->
				<div class="row">
					<!-- Start Sidebar -->
					
					
					<!-- Start Job List -->
					<div class="col-md-12 col-sm-12">
						
						
				 <?php if($all_service == ''): ?>
                <h5><?php echo " No  Popular Services "; ?> </h5>
                <?php else:?>

             <?php foreach($all_service AS $row):?>
						<!-- Single Verticle job -->
						<div class="job-verticle-list">
							<div class="vertical-job-card">
								<div class="vertical-job-body">
									<div class="row">
										<div class="col-md-4 col-sm4">
											
											
									 <img class="img-responsive" src="<?php echo base_url()?>assets/media/users/<?=$row->user_image;?>" alt="" style="height: 100px; width: 100px; border-radius: 15px">

										</div>
										<div class="col-md-4 col-sm-4">
											<div class="vrt-job-act">
												<b class="vendorname"><?= ucfirst($row->user_name); ?></b>
												<br>
												<p><?= ucfirst($row->name); ?> </p>
												</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="vrt-job-act">
												<h5> Min. Amount</h5>
												<h3 class="price">₹<?= $row->min_charge; ?></h3>
												</div>
										</div>
									</div>
								</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="cmp-job-rating">
												<ul>
													<li><h5>Rating: <?= $row->rating;?> <span style="color: #FFD700; font-size:20x;" class="fa fa-star checked"> </h5>
														
														
                                           

													</li>
													
												</ul>
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<div class="cmp-job-review">
												<ul>
													<li>Jobs <span>15</span></a></li>
													<li><b><span><?= $row->distance; ?></span>Kms Away </b></li>
												</ul>
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
						
						
						
               <?php endforeach;  ?>
           <?php endif; ?>

						
					</div>
					
				</div>
				<!-- End Row -->
				
			</div>
			<div class="container">
				
		 <form action="<?php echo base_url()?>Home/category_action/blue_booking" method="post" enctype="multipart/form-data">

					
					<!-- General Information -->
					<div class="box">
						<div class="box-header">
						</div>
						<div class="box-body">
							<div class="row">
							<input type="hidden" name="type" value="blue collar">
							<input type="hidden" name="vendor_id" value="<?= $row->user_id; ?>">
							<input type="hidden" name="service_id" value="<?= $row->id; ?>">

							
								<div class="col-sm-6">
									<label>From Time</label>
									<input type="time" class="form-control" name="from_time" required>

								</div>
								
								
								
								<div class="col-sm-6 m-clear">
									<label>To Time</label>
									<input type="time" class="form-control" name="to_time" required>
								</div>	
									<div class="col-sm-6">
									<label> Date</label>
									<input type="date" class="form-control" name="date"  required>
								</div>
								<div class="col-sm-6">
								<label>Job Eastimate</label>
									<select name="job_estimate" class="form-control">
										 <option  value="3 Hours">3 Hours </option>
                                          <option value="3 Days">3 Days</option>
                                          <option value="3 Weeks">3 Weeks</option>
                                       
									</select>
								</div>
								
								
								
								<div class="col-sm-6 m-clear">
									<label>Work Description</label>
									<input type="text" class="form-control" name="description" required>
								</div>
								
								
								
								<div class="col-sm-6 m-clear">
                      <label>Attachments</label>   
                       <div class="input-group-btn"> 
                       <input type="file" name="upload_doc[]" id="files" class="form-control"  multiple="">
                        </div>
                            <span>Press Ctrl and Hold for select Multiple Images </span>							
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



	 	
     


    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>