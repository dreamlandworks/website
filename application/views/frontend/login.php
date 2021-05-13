<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content" id="myModalLabel1">
					<div class="modal-body">
						<div class="text-center">
							<img style="height: 120px;width: 200px;" src="<?php echo base_url()?>assetsfront/logo/logo 1-01.png" alt="" class="img-responsive">
						</div>
						
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
							<li class="nav-item active">
								<a class="nav-link" data-toggle="tab" href="#employer" role="tab">
								<i class="ti-user"></i> Login</a>
							</li>
							
						</ul>
						<!-- Nav tabs -->
							
						<!-- Tab panels -->
						<div class="tab-content">
						
							<!-- Employer Panel 1-->
							<div class="tab-pane fade in show active" id="employer" role="tabpanel">
								 
                               
								<form  id="login-form" action="" method="post" onsubmit="return false;">
									<p id="demo"></p>
									<div class="form-group">
										<label>User Name</label>
										<input type="text" class="form-control" placeholder="User Name" name="mobile_email">
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password"  name="password" class="form-control" placeholder="*********" >
									</div>
									
									<div class="form-group">
									
										<a href="<?php echo base_url();?>Home/forgot_password" title="Forget" class="fl-right">Forgot Password?</a>
									</div>
									<div class="form-group text-center">
										<button type="submit" class="btn theme-btn full-width btn-m">LogIn </button>
									</div>
									
								</form>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
	
