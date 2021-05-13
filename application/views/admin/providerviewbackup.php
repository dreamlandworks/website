
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		
		<meta charset="utf-8" />
		<title>Service Provider Profile view | Satarango </title>
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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Service Providers</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Application</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Service Provider</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#" class="text-muted">Profile</a>
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
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
	<!--begin::Nav Panel Widget 2-->
	<div class="card card-custom gutter-b">
		<!--begin::Body-->
		<div class="card-body">
			<!--begin::Wrapper-->
			<div class="d-flex justify-content-between flex-column pt-4 h-100">
				<!--begin::Container-->
				<div class="pb-5">
					<!--begin::Header-->
					<div class="d-flex flex-column flex-center">
						<!--begin::Symbol-->
						<div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
							<span class="symbol-label">
								<img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/avatars/007-boy-2.svg" class="h-75 align-self-end" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Username-->
						<a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">Jerry Kane</a>
						<!--end::Username-->
						<!--begin::Info-->
						<div class="font-weight-bold text-dark-50 font-size-sm pb-6"> Service Provider</div>
						<!--end::Info-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="pt-1">
						<!--begin::Text-->
						<p class="text-dark-75 font-weight-nirmal font-size-lg m-0 pb-7">About</p>
						<!--end::Text-->
						<!--begin::Item-->
						<div class="d-flex align-items-center pb-9">
							<!--begin::Symbol-->
							<div class="symbol symbol-45 symbol-light mr-4">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-2x svg-icon-dark-50">
										<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
												<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
												<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
												<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Text-->
							<div class="d-flex flex-column flex-grow-1">
								<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Car Technician</a>
								<span class="text-muted font-weight-bold">service,design,repaire</span>
							</div>
							<!--end::Text-->
							<!--begin::label-->
							<span class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">2.8</span>
							<!--end::label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex align-items-center pb-9">
							<!--begin::Symbol-->
							<div class="symbol symbol-45 symbol-light mr-4">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-2x svg-icon-dark-50">
										<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
												<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Text-->
							<div class="d-flex flex-column flex-grow-1">
								<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"> Jobs</a>
								<span class="text-muted font-weight-bold">Successfully completed </span>
							</div>
							<!--end::Text-->
							<!--begin::label-->
							<span class="font-weight-bolder label label-xl label-light-danger label-inline px-3 py-5 min-w-45px">7</span>
							<!--end::label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex align-items-center pb-9">
							<!--begin::Symbol-->
							<div class="symbol symbol-45 symbol-light mr-4">
								<span class="symbol-label">
									<span class="svg-icon svg-icon-2x svg-icon-dark-50">
										<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Globe.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
												<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Text-->
							<div class="d-flex flex-column flex-grow-1">
								<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Progress</a>
								<span class="text-muted font-weight-bold">Successful Fellas</span>
							</div>
							<!--end::Text-->
							<!--begin::label-->
							<span class="font-weight-bolder label label-xl label-light-info label-inline py-5 min-w-45px">+23</span>
							<!--end::label-->
						</div>
						<!--end::Item-->
					</div>
					<!--end::Body-->
				</div>
				<!--eng::Container-->
				<!--begin::Footer-->
				<div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
					<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Write a Message</button>
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Nav Panel Widget 2-->
	<!--begin::List Widget 17-->
	<div class="card card-custom gutter-b">
		<!--begin::Header-->
		<div class="card-header border-0 pt-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label font-weight-bolder text-dark"> Uploaded Documents </span>
				<span class="text-muted mt-3 font-weight-bold font-size-sm">2 Documents</span>
			</h3>
			<div class="card-toolbar">
				
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Body-->
		<div class="card-body pt-4">
			<!--begin::Container-->
			<div>
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-8">
					<!--begin::Symbol-->
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
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-8">
					<!--begin::Symbol-->
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
						<span class="text-muted font-weight-bold font-size-sm pb-4">Back side
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
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-8">
					<!--begin::Symbol-->
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
				<!--end::Item-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::List Widget 17-->
</div>
<!--end::Aside-->
<!--begin::Content-->
<div class="flex-row-fluid ml-lg-8">
	<!--begin::Card-->
	<div class="card card-custom gutter-bs">
		<!--Begin::Header-->
		<div class="card-header card-header-tabs-line">
			<div class="card-toolbar">
				<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
					<li class="nav-item mr-3">
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
							<span class="nav-text font-weight-bold">Personal</span>
						</a>
					</li>
					<li class="nav-item mr-3">
						<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3">
							<span class="nav-icon mr-2">
								<span class="svg-icon mr-3">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Devices/Display1.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
											<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<span class="nav-text font-weight-bold">Account</span>
						</a>
					</li>
					<li class="nav-item mr-3">
						<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_4">
							<span class="nav-icon mr-2">
								<span class="svg-icon mr-3">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Globe.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
											<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<span class="nav-text font-weight-bold">Settings</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_1">
							<span class="nav-icon mr-2">
								<span class="svg-icon mr-3">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Notification2.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
											<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<span class="nav-text font-weight-bold">Documents</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!--end::Header-->
		<!--Begin::Body-->
		<div class="card-body px-0">
			<div class="tab-content pt-5">
				<!--begin::Tab Content-->
				<div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
					<form class="form">
						<!--begin::Heading-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								<h3 class="font-size-h6 mb-5">Student Info:</h3>
							</div>
						</div>
						<!--end::Heading-->
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Photo</label>
							<div class="col-lg-9 col-xl-9">
								<div class="image-input image-input-outline image-input-circle" id="kt_user_avatar" style="background-image: url(<?=base_url()?>/assets/media/users/blank.png)">
									<div class="image-input-wrapper" style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/avatars/007-boy-2.svg)"></div>
									<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
										<i class="fa fa-pen icon-sm text-muted"></i>
										<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
										<input type="hidden" name="profile_avatar_remove" />
									</label>
									<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
										<i class="ki ki-bold-close icon-xs text-muted"></i>
									</span>
									<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
										<i class="ki ki-bold-close icon-xs text-muted"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">First Name</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" type="text" value="Nick" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Last Name</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Dob</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" type="date" value="" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Organization</label>
							<div class="col-lg-9 col-xl-6">
								<input class="form-control form-control-lg form-control-solid" type="text" value="Loop Inc." />
								<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
							</div>
						</div>
						<div class="separator separator-dashed my-10"></div>
						<!--begin::Heading-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								<h3 class="font-size-h6 mb-5">Contact Info:</h3>
							</div>
						</div>
						<!--end::Heading-->
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
							<div class="col-lg-9 col-xl-6">
								<div class="input-group input-group-lg input-group-solid">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-phone"></i>
										</span>
									</div>
									<input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
								</div>
								<span class="form-text text-muted">We'll never share your email with anyone else.</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Address</label>
							<div class="col-lg-9 col-xl-6">
								<div class="input-group input-group-lg input-group-solid">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-at"></i>
										</span>
									</div>
									<input type="text" class="form-control form-control-lg form-control-solid" value="nick.bold@loop.com" placeholder="Email" />
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Site</label>
							<div class="col-lg-9 col-xl-6">
								<div class="input-group input-group-lg input-group-solid">
									<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Username" value="loop" />
									<div class="input-group-append">
										<span class="input-group-text">.com</span>
									</div>
								</div>
							</div>
						</div>
						<div class="separator separator-dashed my-10"></div>
						<!--begin::Heading-->
						<div class="row">
							<div class="col-lg-9 col-xl-6 offset-xl-3">
								<h3 class="font-size-h6 mb-5">Contact Info:</h3>
							</div>
						</div>
						<!--end::Heading-->
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
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 text-right col-form-label">Send Copy</label>
							<div class="col-lg-9 col-xl-6">
								<span class="switch">
									<label>
										<input type="checkbox" name="email_notification_2" />
										<span></span>
									</label>
								</span>
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