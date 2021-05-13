<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8" />
      <title>Supports | satarango limitless</title>
      <meta name="description" content="Private chat example" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="canonical" href="https://keenthemes.com/metronic" />
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
      <!--end::Fonts-->
      <!--begin::Global Theme Styles(used by all pages)-->
      <link href="<?=base_url()?>assets/plugins/global/plugins.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
      <link href="<?=base_url()?>assets/plugins/custom/prismjs/prismjs.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
      <link href="<?=base_url()?>assets/css/style.bundle7b4a.css?v=7.1.0" rel="stylesheet" type="text/css" />
      <!--end::Global Theme Styles-->
      <!--begin::Layout Themes(used by all pages)-->
      <?php  $this->load->view('admin/layout/css'); ?>
      <!--end::Layout Themes-->
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
      >
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
            <?php $this->load->view('admin/layout/sidebar');  ?>
            <!--end::Aside Menu-->
         </div>
         <!--end::Aside-->
         <!--begin::Wrapper-->
         <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <?php  $this->load->view('admin/layout/header'); ?>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
               <!--begin::Entry-->
               <div class="d-flex flex-column-fluid">
                  <!--begin::Container-->
                  <div class="container">
                     <!--begin::Chat-->
                     <div class="d-flex flex-row">
                        <!--begin::Aside-->
                        <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                           <!--begin::Card-->
                           <div class="card card-custom">
                              <!--begin::Body-->
                              <div class="card-body">
                                 <!--begin:Search-->
                                 <div class="input-group input-group-solid">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text">
                                          <span class="svg-icon svg-icon-lg">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24" />
                                                   <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                   <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </span>
                                    </div>
                                    <input type="text" class="form-control py-4 h-auto" placeholder="Search user name" />
                                 </div>
                                 <!--end:Search-->
                                 <!--begin:Users-->
                                 <div class="mt-7 scroll scroll-pull">
                                    <?php  if($users){ foreach($users as $user){ ?>  
                                    <!--begin:User-->
                                    <div userid="<?=$user->userid?>" user="<?=$user->username?>" class="d-flex  chat align-items-center justify-content-between mb-5">
                                       <div class="d-flex align-items-center">
                                          <div class="symbol symbol-circle symbol-50 mr-3">
                                             <img alt="Pic" src="<?=base_url()?>assets/media/users/300_12.jpg" />
                                          </div>
                                          <div class="d-flex flex-column">
                                             <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg"><?=$user->username?></a>
                                             <span class="text-muted font-weight-bold font-size-sm"><?=$user->message?></span>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-column align-items-end">
                                          <span class="text-muted font-weight-bold font-size-sm">35 mins</span>
                                          <span class="label label-sm label-success">1</span>
                                       </div>
                                    </div>
                                    <!--end:User-->
                                    <?php  }  }  ?>
                                    <!--begin:User-->
                                    <!--<div class="d-flex align-items-center justify-content-between mb-5">-->
                                    <!--	<div class="d-flex align-items-center">-->
                                    <!--		<div class="symbol symbol-circle symbol-50 mr-3">-->
                                    <!--			<img alt="Pic" src="<?=base_url()?>assets/media/users/300_11.jpg" />-->
                                    <!--		</div>-->
                                    <!--		<div class="d-flex flex-column">-->
                                    <!--			<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">Charlie Stone</a>-->
                                    <!--			<span class="text-muted font-weight-bold font-size-sm">Art Director</span>-->
                                    <!--		</div>-->
                                    <!--	</div>-->
                                    <!--	<div class="d-flex flex-column align-items-end">-->
                                    <!--		<span class="text-muted font-weight-bold font-size-sm">7 hrs</span>-->
                                    <!--		<span class="label label-sm label-success">4</span>-->
                                    <!--	</div>-->
                                    <!--</div>-->
                                    <!--end:User-->
                                 </div>
                                 <!--end:Users-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Card-->
                        </div>
                        <!--end::Aside-->
                        <!--begin::Content-->
                        <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                           <!--begin::Card-->
                           <div class="card card-custom">
                              <!--begin::Header-->
                              <div class="card-header align-items-center px-4 py-3">
                                 <div class="text-left flex-grow-1">
                                 </div>
                                 <div class="text-center flex-grow-1">
                                    <div class="text-dark-75 font-weight-bold font-size-h5" id="username">Matt Pears</div>
                                    <div>
                                       <span class="label label-sm label-dot label-success"></span>
                                       <span class="font-weight-bold text-muted font-size-sm">Active</span>
                                    </div>
                                 </div>
                                 <div class="text-right flex-grow-1">
                                 </div>
                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body">
                                 <!--begin::Scroll-->
                                 <div class="scroll scroll-pull" data-mobile-height="450" id="message">
                                    <!--begin::Messages-->
                                    <div class="messages" >
                                       <!--begin::Message In-->
                                       <div class="d-flex flex-column mb-5 align-items-start">
                                          <div class="d-flex align-items-center">
                                             <div class="symbol symbol-circle symbol-40 mr-3">
                                                <img alt="Pic" src="<?=base_url()?>assets/media/users/300_12.jpg" />
                                             </div>
                                             <div>
                                                <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Demo</a>
                                                <span class="text-muted font-size-sm">2 Hours</span>
                                             </div>
                                          </div>
                                          <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">Your custom support chat </div>
                                       </div>
                                       <!--end::Message In-->
                                       <!--begin::Message Out-->
                                       <div class="d-flex flex-column mb-5 align-items-end">
                                          <div class="d-flex align-items-center">
                                             <div>
                                                <span class="text-muted font-size-sm">3 minutes</span>
                                                <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                             </div>
                                             <div class="symbol symbol-circle symbol-40 ml-3">
                                                <img alt="Pic" src="<?=base_url()?>assets/media/users/300_21.jpg" />
                                             </div>
                                          </div>
                                          <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">welcome! </div>
                                       </div>
                                       <!--end::Message Out-->
                                       <!--begin::Message In-->
                                       <!--<div class="d-flex flex-column mb-5 align-items-start">-->
                                       <!--	<div class="d-flex align-items-center">-->
                                       <!--		<div class="symbol symbol-circle symbol-40 mr-3">-->
                                       <!--			<img alt="Pic" src="<?=base_url()?>assets/media/users/300_21.jpg" />-->
                                       <!--		</div>-->
                                       <!--		<div>-->
                                       <!--			<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>-->
                                       <!--			<span class="text-muted font-size-sm">40 seconds</span>-->
                                       <!--		</div>-->
                                       <!--	</div>-->
                                       <!--	<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">Ok, Understood!</div>-->
                                       <!--</div>-->
                                       <!--end::Message In-->
                                       <!--begin::Message Out-->
                                       <!--<div class="d-flex flex-column mb-5 align-items-end">-->
                                       <!--	<div class="d-flex align-items-center">-->
                                       <!--		<div>-->
                                       <!--			<span class="text-muted font-size-sm">Just now</span>-->
                                       <!--			<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>-->
                                       <!--		</div>-->
                                       <!--		<div class="symbol symbol-circle symbol-40 ml-3">-->
                                       <!--			<img alt="Pic" src="<?=base_url()?>assets/media/users/300_21.jpg" />-->
                                       <!--		</div>-->
                                       <!--	</div>-->
                                       <!--	<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">You’ll receive notifications for all issues, pull requests!</div>-->
                                       <!--</div>-->
                                       <!--end::Message Out-->
                                    </div>
                                    <!--end::Messages-->
                                 </div>
                                 <!--end::Scroll-->
                              </div>
                              <!--end::Body-->
                              <!--begin::Footer-->
                              <div class="card-footer align-items-center">
                                 <!--begin::Compose-->
                                 <textarea id="mdata" class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                                 <input type="hidden" id="userid" value="" >
                                 <div class="d-flex align-items-center justify-content-between mt-5">
                                    <div class="mr-3">
                                       <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                                       <i class="flaticon2-photograph icon-lg"></i>
                                       </a>
                                       <a href="#" class="btn btn-clean btn-icon btn-md">
                                       <i class="flaticon2-photo-camera icon-lg"></i>
                                       </a>
                                    </div>
                                    <div>
                                       <button type="button" id="send" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                                    </div>
                                 </div>
                                 <!--begin::Compose-->
                              </div>
                              <!--end::Footer-->
                           </div>
                           <!--end::Card-->
                        </div>
                        <!--end::Content-->
                     </div>
                     <!--end::Chat-->
                  </div>
                  <!--end::Container-->
               </div>
               <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <?php $this->load->view('admin/layout/footer');  ?>
            <!--end::Footer-->
         </div>
         <!--end::Wrapper-->
      </div>
      <!--end::Page-->
      </div>
      <!--end::Main-->
      <?php $this->load->view('admin/layout/model');  ?>
      <!--end::Chat Panel-->
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
      <!--end::Scrolltop-->
      <!--end::Demo Panel-->
      <!--begin::Global Config(global config for global JS scripts)-->
      <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
      <!--end::Global Config-->
      <!--begin::Global Theme Bundle(used by all pages)-->
      <script src="<?=base_url()?>assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>
      <script src="<?=base_url()?>assets/plugins/custom/prismjs/prismjs.bundle7b4a.js?v=7.1.0"></script>
      <script src="<?=base_url()?>assets/js/scripts.bundle7b4a.js?v=7.1.0"></script>
      <!--end::Global Theme Bundle-->
      <!--begin::Page Scripts(used by this page)-->
      <script src="<?=base_url()?>assets/js/pages/custom/chat/chat7b4a.js?v=7.1.0"></script>
      <!--end::Page Scripts-->
      <script>
         $(document).ready(function(){
               	$('#message').scrollTop($('#message')[0].scrollHeight);
         });
      </script>
      <script type="text/javascript">
         $('#send').on('click',function(){
            
         	var message=$('#mdata').val();
         	var userid=$('#userid').val();
                  if( userid==="")
                      alert("select user to send message");
                      if(message==""){
                   $('#mdata').css('background-color','red');
                  }else{
                		$.ajax({
                           url:"<?=base_url()?>Admin/sendmessage",
                           method:"post",
                           data:{message:message,userid:userid},
                           success:function(data){
                           	$('#message').html(data);
                           }
                		});
                			$('#message').scrollTop($('#message')[0].scrollHeight);
         	
                  }
         });
         
         $('.chat').on('click',function(){
                var userid=$(this).attr('userid');
                var usern=$(this).attr('user');
                	$('#username').html(usern);
               // alert(userid);
                $.ajax({
                    url:"<?=base_url()?>Admin/getmessagebyuser",
                    method:"post", 
                    data:{userid:userid},
                    success:function(data){
                      //  console.log(data);
                    	$('#message').html(data);
                    	$('#userid').val(userid)
                    	$('#message').scrollTop($('#message')[0].scrollHeight);
                     
                    }
                });
         })
         $('#message').scrollTop($('#message')[0].scrollHeight);
      </script>
   </body>
   <!--end::Body-->
</html>