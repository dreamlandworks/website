
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		
		<meta charset="utf-8" />
		<title>Profile view | Satarango </title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?=base_url()?>assets/plugins/custom/datatables/datatables.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?=base_url()?>assets/plugins/global/plugins.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/plugins/custom/prismjs/prismjs.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/css/style.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="<?=base_url()?>assets/css/themes/layout/header/base/light7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/css/themes/layout/header/menu/light7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/css/themes/layout/brand/dark7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/css/themes/layout/aside/dark7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico" />
		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="#">
				<img alt="Logo" src="<?=base_url()?>assets/logo2.png" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				
				<?php  $this->load->view('admin/layout/sidebar'); ?>
				
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<?php  $this->load->view('admin/layout/header'); ?>
				   	
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-1 mr-5">Change Password</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Application</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Change Password</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Password Edit</a>
											</li>
											
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
<div class="container">
<!--begin::Education-->
<div class="d-flex flex-row">
<!--begin::Aside-->

<!--end::Aside-->
<!--begin::Content-->
<div class="flex-row-fluid ml-lg-812">
	<!--begin::Card-->
	<div class="card card-custom gutter-bs">
		<!--Begin::Header-->
		<div class="card-header card-header-tabs-line">
			<div class="card-toolbar">
				
						<a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
							<span class="nav-icon mr-2">
								<span class="svg-icon mr-3">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Chat-check.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<span class="nav-text font-weight-bold">Change Password</span>
						</a>
					</div>
					
		</div>
		<!--end::Header-->
		<!--Begin::Body-->
		<div class="card-body px-0">
			<div class="tab-content pt-5">
				<!--begin::Tab Content-->
				<div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
					<form class="form" enctype="multipart/form-data" method="post" onSubmit = "return checkPassword(this)" action="<?=base_url()?>Admin/change_password/<?php echo $this->session->userdata('login_id');?>">
						<!--begin::Heading-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								
							
						
						<!--end::Heading-->
					
						
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Password</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" name="password" type="text" value="" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Confirm Password</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" type="text" name="confirm_password" value="" />
							</div>
						</div>
						
						
						<div class="separator separator-dashed my-10"></div>
						<!--begin::Heading-->
						
						<!--end::Heading-->
					
					
						
						<div class="separator separator-dashed my-10"></div>
						<!--begin::Heading-->
						
						<!--end::Heading-->
						 <div class="card-footer">
									  <button type="submit" class="btn btn-primary mr-2">Submit</button>
									  <button type="reset" class="btn btn-secondary">Cancel</button>
									 </div>
						</div>
						</div>
					</form>
				</div>
				<!--end::Tab Content-->
				<!--begin::Tab Content-->
				<div class="tab-pane" id="kt_apps_contacts_view_tab_3" role="tabpanel">
					<form class="form">
						<!--begin::Notice-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								<div class="alert alert-custom alert-light-danger fade show mb-9" role="alert">
									<div class="alert-icon">
										<i class="flaticon-warning"></i>
									</div>
									<div class="alert-text"> User Accounts</div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">
												<i class="ki ki-close"></i>
											</span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<!--end::Notice-->
						<!--begin::Heading-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								<h3 class="font-size-h6 mb-5">Account:</h3>
							</div>
						</div>
						<!--end::Heading-->
						
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Address</label>
							<div class="col-lg-9 col-xl-6">
								<div class="input-group input-group-lg input-group-solid">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-at"></i>
										</span>
									</div>
									<input type="text" class="form-control form-control-lg form-control-solid" value="nick.watson@loop.com" placeholder="Email" />
								</div>
								<span class="form-text text-muted">Email will not be publicly displayed. 
								<a href="#">Learn more</a>.</span>
							</div>
						</div>
						
						
						<div class="separator separator-dashed my-10"></div>
						<!--begin::Heading-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								<h3 class="font-size-h6 mb-5">Security:</h3>
							</div>
						</div>
						<!--end::Heading-->
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Login verification</label>
							<div class="col-lg-9 col-xl-6">
								<button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup login verification</button>
								<span class="form-text text-muted">After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised. 
								<a href="#">Learn more</a>.</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Password reset verification</label>
							<div class="col-lg-9 col-xl-6">
								<div class="checkbox-inline">
									<label class="checkbox">
									<input type="checkbox" />
									<span></span>Require personal information to reset your password.</label>
								</div>
								<span class="form-text text-muted">For extra security, this requires you to confirm your email or phone number when you reset your password. 
								<a href="#">Learn more</a>.</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
							<div class="col-lg-9 col-xl-6">
								<button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
							</div>
						</div>
					</form>
				</div>
				<!--end::Tab Content-->
				<!--begin::Tab Content-->
				<div class="tab-pane" id="kt_apps_contacts_view_tab_4" role="tabpanel">
					<form class="form">
						<div class="row">
							<label class="col-xl-3"></label>
							<div class="col-lg-9 col-xl-6">
								<h3 class="font-size-h6 mb-5">Setup Email Notification:</h3>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Notification</label>
							<div class="col-lg-9 col-xl-6">
								<span class="switch">
									<label>
										<input type="checkbox" checked="checked" name="email_notification_1" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						
						<div class="separator separator-dashed my-10"></div>
						
						
					</form>
				</div>
				<!--end::Tab Content-->
				<!--begin::Tab Content-->
				<div class="tab-pane" id="kt_apps_contacts_view_tab_1" role="tabpanel">
					<div class="container">
						<div class="separator separator-dashed my-10"></div>
						<!--begin::Timeline-->
						<div class="timeline timeline-3">
							<div class="timeline-items">
								<!-- begin document -->
								<div class="d-flex align-items-center mb-8">
					
									<div class="symbol mr-5 pt-1">
										<div class="symbol-label min-w-65px min-h-100px" style="background-image: url('<?=base_url()?>/assets/media/books/4.png')"></div>
									</div>
									<!--end::Symbol-->
									<!--begin::Info-->
									<div class="d-flex flex-column">
										<!--begin::Title-->
										<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Id  Proof </a>
										<!--end::Title-->
										<!--begin::Text-->
										<span class="text-muted font-weight-bold font-size-sm pb-4">front side
										<br /></span>
										<!--end::Text-->
										<!--begin::Action-->
										<div>
											<button type="button" class="btn btn-light font-weight-bolder font-size-sm py-2">Verify</button>
										</div>
										<!--end::Action-->
									</div>
									<!--end::Info-->
								</div>
								<!-- end docuemnt -->
							</div>
					    </div>
					    <!--end::Timeline-->
					    <!-- begin document -->
								<div class="d-flex align-items-center mb-8">
					
									<div class="symbol mr-5 pt-1">
										<div class="symbol-label min-w-65px min-h-100px" style="background-image: url('<?=base_url()?>/assets/media/books/4.png')"></div>
									</div>
									<!--end::Symbol-->
									<!--begin::Info-->
									<div class="d-flex flex-column">
										<!--begin::Title-->
										<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">address  Proof </a>
										<!--end::Title-->
										<!--begin::Text-->
										<span class="text-muted font-weight-bold font-size-sm pb-4">front side
										<br /></span>
										<!--end::Text-->
										<!--begin::Action-->
										<div>
											<button type="button" class="btn btn-light font-weight-bolder font-size-sm py-2">Verify</button>
										</div>
										<!--end::Action-->
									</div>
									<!--end::Info-->
								</div>
								<!-- end docuemnt -->
							</div>
					    </div>
					    <!--end::Timeline-->
					</div>
				</div>
				<!--end::Tab Content-->
			</div>
			</div>
		</div>
		<!--end::Body-->
	</div>
	<!--end::Card-->
</div>
<!--end::Content-->
</div>
<!--end::Education-->
</div>	
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php  $this->load->view('admin/layout/footer') ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<?php  $this->load->view('admin/layout/model') ?>
		<!--end::Quick Panel-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
<style> 
			.gfg { 
				font-size:40px; 
				color:green; 
				font-weight:bold; 
				text-align:center; 
			} 
			.geeks { 
				font-size:17px; 
				text-align:center; 
				margin-bottom:20px; 
			} 
		</style> 
		<script> 
		
			// Function to check Whether both passwords 
			// is same or not. 
			function checkPassword(form) { 
				password = form.password.value; 
				confirm_password = form.confirm_password.value; 

				// If password not entered 
				if (password == '') 
					alert ("Please enter Password"); 
					
				// If confirm password not entered 
				else if (confirm_password == '') 
					alert ("Please enter confirm password"); 
					
				// If Not same return False.	 
				else if (password != confirm_password) { 
					alert ("\nPassword did not match: Please try again...") 
					return false; 
				} 

				// If same return True. 
				else{ 
					alert("Password Match!") 
					return true; 
				} 
			} 
		</script>
		<script src="<?=base_url()?>/assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>
		<script src="<?=base_url()?>/assets/plugins/custom/prismjs/prismjs.bundle7b4a.js?v=7.1.0"></script>
		<script src="<?=base_url()?>/assets/js/scripts.bundle7b4a.js?v=7.1.0"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?=base_url()?>/assets/js/pages/custom/education/student/profile7b4a.js?v=7.1.0"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->

</html>

</html>