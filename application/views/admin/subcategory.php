<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	  <meta charset="utf-8" />
		<title>Category | Satarango </title>
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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Users</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Application</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Category</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#" class="text-muted"> category</a>
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
								<!--begin::Notice-->
								<?php  echo $this->session->flashdata('success_req'); ?>
								<div class="row"> 
									<div class=" card col-lg-6">
								    <form class=" form" enctype="multipart/form-data" method="post" action="<?=base_url()?>Admin/subcategory">
									 <div class="card-body ">
									    <div class="form-group">
									   <label>Select Category Name:</label>
									   <select name="cat_id" class="form-control selectpicker">
									       <?php if($category){ foreach($category as $value){  ?>
                                          <option value="<?=$value->id?>"><?=$value->name?></option>
                                         <?php  }  } ?>
                                         </select>
									  </div>
									  <div class="form-group">
									   <label>Category Name:</label>
									   <input type="text" name="name" class="form-control form-control-solid" placeholder="Enter  category name" required="" />
									   <span class="form-text text-muted">Please Enter  category Name</span>
									  </div>
									    
									    <div class="form-group row">
										<label class="col-xl-3 col-lg-3 text-right col-form-label"> Icon</label>
										<div class="col-lg-9 col-xl-9">
											<div class="image-input image-input-outline image-input-circle" id="kt_user_avatar" style="">
												<div class="image-input-wrapper" style="border-radius: initial;"></div>
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
												<i class="fa fa-pen icon-sm text-muted"></i>
												<input type="file" name="icon" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="profile_avatar_remove" />
												</label>
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
										<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
											</div>
										</div>
								</div>
									  
									 </div>
									 <div class="card-footer">
									  <button type="submit" class="btn btn-primary mr-2">Submit</button>
									  <button type="reset" class="btn btn-secondary">Cancel</button>
									 </div>
									</form>
								</div>
								<div class="col-lg-6">
									<div class="card">
										<div class="card-body">
                                           <div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title font-weight-bolder text-dark"> Category List</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
											<?php  if($subcategory){ foreach($subcategory as $subcategori){ ?>	
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-2">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="<?=base_url()?>assets/media/users/<?=$subcategori->icon?>" class="h-75 align-self-end" alt="" />
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1 font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg"><?=$subcategori->name?></a>
														<span class="text-muted"><?=$subcategori->cat_name?></span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="<?=base_url()?>Admin/deletesubcategory/<?=$subcategori->id?>" onclick="retrun confirm('Are you sure want to delete? ')" class="btn btn-hover-light-primary btn-sm btn-icon" >
															<i class="la la-trash"></i>
														</a>
														<a href="<?=base_url()?>Admin/updatesubcategory/<?=$subcategori->id?>" class="btn btn-hover-light-primary btn-sm btn-icon" >
															<i class="la la-edit"></i>
														</a>
														
													</div>
													<!--end::Dropdown-->
												</div>
											<?php  } } ?>	
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>


									    </div>
								    </div>
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
	<script src="<?=base_url()?>assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>
		<script src="<?=base_url()?>assets/plugins/custom/prismjs/prismjs.bundle7b4a.js?v=7.1.0"></script>
		<script src="<?=base_url()?>assets/js/scripts.bundle7b4a.js?v=7.1.0"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?=base_url()?>assets/js/pages/crud/file-upload/image-input7b4a.js?v=7.1.0"></script>
			<script src="<?=base_url()?>assets/js/pages/custom/education/student/profile7b4a.js?v=7.1.0"></script>
		<script src="<?=base_url()?>assets/js/pages/crud/datatables/extensions/buttons7b4a.js?v=7.1.0"></script>
		<!--end::Page Scripts-->
		
	</body>
	<!--end::Body-->

</html>