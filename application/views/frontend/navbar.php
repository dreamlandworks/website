    	<?php if($this->session->userdata('Id') > 0): ?>
      <?php $userdata= $this->db->query('select * from  users where id= '.$this->session->userdata('Id').'')->row() ?>
<?php endif; ?>
<nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
			<div class="container">
			
				<!-- Start Logo Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="<?php echo base_url()?>Home">
						<img src="<?php echo base_url()?>assetsfront/logo/logo 1-01.png" class="logo logo-display" alt="" style="margin-top: -25px">
						<img src="<?php echo base_url()?>assetsfront/logo/logo 1-01.png" class="logo logo-scrolled" alt="" style="margin-top: -25px">
					</a>

				</div>
				<!-- End Logo Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
				
					<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
			
						<li class="">
							<a href="<?php echo base_url()?>Home" class="dropdown-toggle" data-toggle="dropdown">Home</a>
							
						</li>
             
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Employer</a>
							<!-- <ul class="dropdown-menu animated fadeOutUp">
								
								<li><a href="create-job.html">Create Job</a></li>
								<li><a href="employer-detail.html">Employer Detail</a></li>
							</ul> -->
						</li>
							
				
						<?php if($this->session->userdata('Id') > 0): ?>

                   <?php if($userdata->service_provider == 0): ?>
						<li class="">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Offers</a>
						
						</li>
						

					<?php else: ?>
						<li class="">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Offers1</a>
						
						</li>
						<?php endif; ?>

					<?php endif; ?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs</a>
							<!-- <ul class="dropdown-menu animated fadeOutUp">
								<li><a href="candidate.html">Candidate</a></li>
								<li><a href="employer.html">Employer</a></li>
								<li><a href="featured-job.html">Featured Job</a></li>
								<li><a href="job-detail-2.html">Job Detail</a></li>
					
							</ul> -->
						</li>
					
				
						<?php if($this->session->userdata('Id') > 0): ?>

                   <?php if($userdata->service_provider == 0): ?>
                     <li class="nav-item active" id="service_provider<?=$userdata->id ?>">
						<a class="nav-link"  onclick="myFunction(<?=$userdata->id ?>,0); return confirm('Are you sure User Activation ?');" href="<?php echo base_url();?>Home/Myprofile" role="tab">
						User</a>
					</li>


					<li class="nav-item" id="service_provider<?=$userdata->id ?>">
						<?php if($userdata->profile == 0): ?>
						<a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>Home/updateprofile" role="tab">
						Provider</a>
						<?php else: ?>
						
                    <a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>VendorHome" role="tab">
                      Provider</a><?php endif; ?>
                    
					</li>
				<?php else: ?>
				 <li class="nav-item" id="service_provider<?=$userdata->id ?>">
						<a class="nav-link"  onclick="myFunction(<?=$userdata->id ?>,0); return confirm('Are you sure User Activation ?');" href="<?php echo base_url();?>Home/Myprofile" role="tab">
						User</a>
					</li>
						<li class="nav-item active" id="service_provider<?=$userdata->id ?>">
						<?php if($userdata->profile == 1): ?>
						
						<a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>VendorHome" role="tab">
						Provider</a>
						<?php else: ?>

                    <a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>Home/updateprofile" role="tab">
                     Provider</a> 
                 <?php endif; ?>
                    
					</li>
					<?php endif; ?>

					<?php endif; ?>
						
						
						
					</ul>
							 <?php if($this->session->userdata('Id') == 0): ?>
                      

                     
					<ul class="nav navbar-nav navbar-right">
						<li class="br-right"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signin"><i class="login-icon ti-user"></i>Login</a></li>
						<li class="sign-up"><a class="btn-signup red-btn" href="<?php echo base_url();?>LoginRegistration"><span class="ti-briefcase"></span>Sign Up</a></li> 
					</ul>

					            <?php endif; ?>


				 <?php if($this->session->userdata('Id') > 0): ?>
                   
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							 <?php
                                if (file_exists('assets/uploaded/users/'.$userdata->image)): ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/'.$userdata->image;?>" alt="" class="img-fluid">
                            <?php else: ?>
                                <img src="<?php echo base_url().'assets/uploaded/users/users.png';?>" alt="" class="img-fluid">
                            <?php endif; ?>
                        </a>
							<ul class="dropdown-menu animated fadeOutUp">
								 <?php if($userdata->service_provider == 0): ?>
								
                              	<li><a href="<?php echo base_url();?>Home/userAccount"><i class="fa fa-eye-slash"> </i>My Account</a></li>

								<?php else: ?>
								<?php if($userdata->profile == 0): ?>
								<li><a href="<?php echo base_url();?>Home/updateprofile"><i class="fa fa-eye-slash"> </i>My Account</a></li>
								
                                <?php else: ?>

     								<li><a href="<?php echo base_url();?>MyAccount"><i class="fa fa-eye-slash"> </i>My Account</a></li>


                                <?php endif; ?>
                                <?php endif; ?>
                                <li><a href="<?php echo base_url();?>Home/Myprofilevendor"><i class="fa fa-edit"></i>My Profile</a></li>
						      <li class="br-left"><a href="<?php echo base_url();?>LoginRegistration/logout"><i class="login-icon ti-power-off"></i>Logout</a></li>
							</ul>
						</li>
					      
					</ul>
					

					<?php endif; ?>
					<style type="text/css">
					.switch6 {  max-width: 17em;  margin: 0 auto; }
					.switch6-light > span, .switch-toggle > span {  color: #000000; }
					.switch6-light span span, .switch6-light label, .switch-toggle span span, .switch-toggle label {  color: #2b2b2b; }
					.switch-toggle a, 
					.switch6-light span span { display: none; }
					.switch6-light { display: block; height: 30px; position: relative; overflow: visible; padding: 0px; margin-left:0px; }
					.switch6-light * { box-sizing: border-box; }
					.switch6-light a { display: block; transition: all 0.3s ease-out 0s; }
					.switch6-light label, 
					.switch6-light > span { line-height: 30px; vertical-align: middle;}
					.switch6-light label {font-weight: 700; margin-bottom: px; max-width: 100%;}
					.switch6-light input:focus ~ a, .switch6-light input:focus + label { outline: 1px dotted rgb(136, 136, 136); }
					.switch6-light input { position: absolute; opacity: 0; z-index: 5; }
					.switch6-light input:checked ~ a { right: 0%; }
					.switch6-light > span { position: absolute; left: -100px; width: 100%; margin: 0px; padding-right: 100px; text-align: left; }
					.switch6-light > span span { position: absolute; top: 0px; left: 0px; z-index: 5; display: block; width: 50%; margin-left: 100px; text-align: center; }
					.switch6-light > span span:last-child { left: 50%; }
					.switch6-light a { position: absolute; right: 50%; top: 0px; z-index: 4; display: block; width: 50%; height: 100%; padding: 0px; }
					</style>
				</div>
				
			</div>   
		</nav>
<script>
    
function myFunction(userdata_id,service_provider) {

$.ajax({
        type: "POST",
        url: "<?= base_url();?>Home/serviceprovider_status",
        data: {userdata_id: userdata_id,service_provider:service_provider},
        success: function(result) {

            document.getElementById("service_provider"+userdata_id).innerHTML = result;
       
        }
  
});
}



</script>


            
