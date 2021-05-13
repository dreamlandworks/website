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
      <link href="<?php echo base_url()?>assetsfront/css/skin/default.css" rel="stylesheet">
      <!-- autocompleteteestart -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
      <!-- autocompleteteesend -->
      <!-- autocomplete -->
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
   </head>
   <body class="blue-skin">
      <?php  $this->load->view('frontend/navbar'); ?>
      <!-- ======================= Start Navigation ===================== -->
      <?php if($this->session->userdata('Id') > 0): ?>
      <?php $userdata= $this->db->query('select * from  users where id= '.$this->session->userdata('Id').'')->row() ?>
      <?php endif; ?>
      <!-- Preloader Start Here -->
      <!-- main -->
      <div class="page-title light" style="background:url(<?php echo base_url();?>assetsfront/img/slider-2.jpg);">
         <div class="container">
            <div class="page-caption">
               <h2>My Account</h2>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="container">
         <!--////////////////// prifile image///////////////////////// -->
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
               <?php
                  if (file_exists('assets/uploaded/users/'.$userdata->image)): ?>
               <img src="<?php echo base_url().'assets/uploaded/users/'.$userdata->image;?>" alt="" class="img-fluid" style="height: 100px; width :100px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto; border: 3px solid #1AE8FF;">
               <?php else: ?>
               <img src="<?php echo base_url().'assets/uploaded/users/users.png';?>" alt="" class="img-fluid" style="height: 100px; width :100px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto; border: 3px solid #1AE8FF;">
               <?php endif; ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
            </div>
         </div>
         <!--//////////////////////////////// profilr image end ////////////////////////////-->
         <!-- ////////////////////////// start user name///////////////////////////// -->
         <br>
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
               <p style="text-align :center; font-weight: bold;"> <?php echo ucwords($userdata->fname) ;?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
            </div>
         </div>
         <!-- //////////name ////// --> 
         <!-- ////////////////////////// start user name///////////////////////////// -->
         <br>
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
               <div style="width: 100%; background:url(<?php echo base_url();?>assets/media/vendotstatusbackground.png); background-repeat: no-repeat;background-size: cover; height : 60px;" >
                  <?php if($userdata->service_provider == 0): ?>
                  <div class="nav-item active" id="service_provider<?=$userdata->id ?>" style="text-align :left; width: 50%; float :left; padding-left: 20px; margin-top: 20px;">
                     <a class="nav-link"  onclick="myFunction(<?=$userdata->id ?>,0); return confirm('Are you sure User Activation ?');" href="<?php echo base_url();?>Home/Myprofile" role="tab" id="statuscolor">
                     User</a>
                  </div>
                  <div class="nav-item" id="service_provider<?=$userdata->id ?>" style="text-align :right; float :right; width: 50%; padding-right: 20px; margin-top: 20px;">
                     <?php if($userdata->profile == 0): ?>
                     <a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>Home/updateprofile" role="tab">
                     Provider</a>
                     <?php else: ?>
                     <a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>VendorHome" role="tab">
                     Provider</a><?php endif; ?>
                  </div>
                  <?php else: ?>
                  <div class="nav-item" id="service_provider<?=$userdata->id ?>" style="text-align :left ; float :left; width: 50%; padding-left: 20px; margin-top: 20px;" >
                     <a class="nav-link"  onclick="myFunction(<?=$userdata->id ?>,0); return confirm('Are you sure User Activation ?');" href="<?php echo base_url();?>Home/Myprofile" role="tab" id="statuscolor">
                     User</a>
                  </div>
                  <div class="nav-item active" id="service_provider<?=$userdata->id ?>" style="text-align :right ; float :right; padding-right: 20px; margin-top: 20px; width: 50%;">
                     <?php if($userdata->profile == 1): ?>
                     <a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>VendorHome" role="tab">
                     Provider</a>
                     <?php else: ?>
                     <a class="nav-link" onclick="myFunction(<?=$userdata->id ?>,1); return confirm('Are you sure Service Provider Activation ?');" href="<?php echo base_url();?>Home/updateprofile" role="tab">
                     Provider</a> 
                     <?php endif; ?>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
            </div>
         </div>
         <!-- //////////name ////// -->
         <br>
         <div class="row">
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-md-3 col-sm-3">
               <div class="myaccount-tab-menu nav" role="tablist">
                  <a href="<?= base_url('Home');?>"><i class="fa fa-dashboard"></i>
                  Home</a>
                  <a href="#post_job" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>Browse Categories</a>
                  <a href="#account" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>My Account</a>
                  <a href="#booking" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>My Bookings</a>
                  <a href="#Myjobpost" data-toggle="tab"><i class="fa fa-credit-card"></i>My Job Posts</a>
                  <a href="#profile" data-toggle="tab"><i class="fa fa-credit-card"></i>My Profile</a>
                  <a href="#setting" data-toggle="tab"><i class="fa fa-credit-card"></i>Settings</a>
                  <a href="<?php echo site_url('MyAccount/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
               </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
               <div class="tab-content" id="myaccountContent">
                  <!-- Post Job Tab Content Start -->
                  <div class="tab-pane fade show active" id="post_job" role="tabpanel">
                     <div class="myaccount-content">
                        <h3>Post Job</h3>
                        <div class="welcome">
                           <p>Hello, <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?></strong> (If Not <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?> ! </strong><a href="<?php echo site_url('MyAccount/logout') ?>" class="logout"> Logout</a>)</p>
                        </div>
                        <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                           recent orders, manage your shipping and billing addresses and edit your
                           password and account details.
                        </p>
                     </div>
                  </div>
                  <!-- Post Job end Content -->


                    <!-- Browser Category Tab Content Start -->
                  <div class="tab-pane fade show active" id="post_job" role="tabpanel">
                     <div class="myaccount-content">
                        <h3>Post Job</h3>
                        <div class="welcome">
                           <p>Hello, <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?></strong> (If Not <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?> ! </strong><a href="<?php echo site_url('MyAccount/logout') ?>" class="logout"> Logout</a>)</p>
                        </div>
                        <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                           recent orders, manage your shipping and billing addresses and edit your
                           password and account details.
                        </p>
                     </div>
                  </div>
                  <!-- Browser Category end Content -->
                  <!-- /////////////////////////////////  My Account start  ///////////////////////-->
                  <div class="tab-pane fade" id="account" role="tabpanel">
                     <!-- ///////////my account card start ////////////////// -->
                     <div class="card" style="background-color : #b9abab38; border-radius: 15px">
                        <div class="row">
                           <br>
                           <div class="col-md-3 col-sm-3">
                              <div class="emp-pic">
                                 <img src="<?php echo base_url().'assets/uploaded/users/'.$userdata->image;?>" alt="" class="img-fluid" style="height: 100px; width :100px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto; border: 3px solid #1AE8FF;">
                              </div>
                           </div>
                           <div class="col-md-2 col-sm-2">
                              <div class="emp-des">
                                 <h3 style="text-align :left;"> <?php echo ucwords($userdata->fname) ;?></h3>
                                 <span class="theme-cl">Balance</span>
                                 <p class="price">₹280</p>
                              </div>
                           </div>
                           <div class="col-md-7 col-sm-7">
                              <div class="emp-detail">
                                 <ul>
                                    <li><span class="cl-danger">12</span>Tasks</li>
                                    <li><span class="cl-success">12</span>Bids</li>
                                    <li><span class="cl-primary">12</span>Referrals</li>
                                    <li><span class="cl-primary">5110</span>Earnings</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- ///////////end my account card  ////////////////// -->
                     <br>
                    
                     <!-- ======================= Manage Resume ======================== -->
                     <section class="create-company gray">
                        <div class="row">
                           <div class="table-responsive">
                              <table class="table table-lg table-hover">
                                 <thead>
                                    <tr>
                                       <th>This month</th>
                                       <th>Previous Month</th>
                                       <th>Change</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td style="font-weight: 800;">
                                          ₹280.00
                                       </td>
                                       <td style="font-weight: 800;">₹280.00</td>
                                       <td class="price" style="font-weight: 800;">₹280.00</td>
                                    </tr>
                                    <tr>
                                       <td style="font-weight: 800;">Bids Left</td>
                                       <td style="color: #fa9500 ; font-weight: 800;"> 18/100</td>
                                       <td style="color: #fa9500 ; font-weight: 800;">Buy More</td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a href="#" style="font-weight: 800;">
                                          My Reviews (5)
                                          </a>
                                       </td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a href="#" style="font-weight: 800;">
                                          Transaction History
                                          </a>
                                       </td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a href="#" style="font-weight: 800;">
                                          Current Plan
                                          </a>
                                       </td>
                                       <td></td>
                                       <td style="font-weight: 800; color: #003286;">Free<br>
                                          <a href="#" style="color: #fa9500; font-weight: 800;">
                                          View Plans
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a href="#" style="font-weight: 800;">
                                          Add/ Withdraw Funds
                                          </a>
                                       </td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </section>
                     <!-- ====================== End Manage Resume ================ -->
                     <!-- //////row end myacctount table /////// -->
                     <!-- //////row end myacctount bids /////// -->
                  </div>
                  <!-- /////////////////////// my account end   //////////////////////////////// -->
                  <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\in progress start \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                  <!-- Single  Content Start -->
                  <div class="tab-pane fade" id="booking" role="tabpanel">
                     <div class="myaccount-content">
                        <h3>My Booking</h3>
                        <div class="myaccount-table table-responsive text-center">
                           <!-- start tab in  -->
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Pending</a></li>
                              <li><a data-toggle="tab" href="#menu1">In Progress</a></li>
                              <li><a data-toggle="tab" href="#menu2">Completed</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 <br>
                                 <h4 style="color : #003286; float :left"> This Week </h4>
                                 <br>
                                 <?php if($panding == ''): ?>
                                 <h5><?php echo " No  in Progress data found  "; ?> </h5>
                                 <?php else:?>
                                 <?php foreach($panding AS $row):?>
                                 <!-- Single Verticle job -->
                                 <div class="job-verticle-list12">
                                    <div class="vertical-job-card">
                                       <div class="vertical-job-body" style="padding: 25px;">
                                          <div class="row">
                                             <div class="col-md-6 col-sm6">
                                                <h5 class="myacc" style="float : left"> Scheduled in :</h5>
                                                <h5 style="float : right"><?=date('d-M-Y',strtotime($row->booking_date));?></h5>
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <img src="<?php echo base_url()?>assets/media/chat.png" style="height: 30; width :30; float : left"> 
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <img src="<?php echo base_url()?>assets/media/call.png" style="height: 30; width :30;"> 
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <h4 class="price" style="float :right">₹<?php echo $row->min_charge; ?></h4>
                                             </div>
                                             <div class="col-md-4 col-sm-4">
                                                <h5 class="myacc" style="float : left"> Time :</h5>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h5 style="text-align : left"> <?=date('h:i A',strtotime($row->from_time));?> to  <?=date('h:i A',strtotime($row->to_time));?></h5>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                          <!-- row start  -->
                                          <div class="row">
                                             <div class="col-md-4 col-sm-4">
                                                <img src="<?php echo base_url().'assets/uploaded/users/'.$row->v_image;?>" class"circleimage" style="height: 100px; width :100px; border-radius: 50%; float: left;margin-top: 10%;"> 
                                                <div style=" float: left">
                                                   <span style="color: #FFD700; font-size:17px;" class="<?php if ($row->user_rating >= 1) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o';} ?>"></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=2) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>" ></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=3) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o';} ?>"></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=4) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>" ></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=5) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>">
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h3 style="text-align: left;"><?php echo $row->v_name; ?></h3>
                                                <p style="text-align: left;"><?php echo $row->work_description ;?></p>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                       </div>
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/userpending.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : red; padding-left: 25px;"> Cancel Booking</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;">Re-schedule</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endforeach;  ?>
                                 <?php endif; ?>
                              </div>
                              <!-- \\\\\\\\\\\\\\\\\\\panding end \\\\\\\\\\\\\\\\\\\\\\\-->
                              <!-- //////////////////////////////////////////////inprogress start //////////////////////////////// -->
                              <div id="menu1" class="tab-pane fade">
                                 <br>
                                 <h4 style="color : #003286; float :left"> This Week </h4>
                                 <br>
                                 <?php if($inprogress == ''): ?>
                                 <h5><?php echo " No  Booking  Available "; ?> </h5>
                                 <?php else:?>
                                 <?php foreach($inprogress AS $row):?>
                                 <!-- Single Verticle job -->
                                 <div class="job-verticle-list12">
                                    <div class="vertical-job-card">
                                       <div class="vertical-job-body" style="padding: 25px;">
                                          <div class="row">
                                             <div class="col-md-6 col-sm6">
                                                <h5 class="myacc" style="float : left"> Scheduled in :</h5>
                                                <h5 style="float : right"><?=date('d-M-Y',strtotime($row->booking_date));?></h5>
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <img src="<?php echo base_url()?>assets/media/chat.png" style="height: 30; width :30; float : left"> 
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <img src="<?php echo base_url()?>assets/media/call.png" style="height: 30; width :30;"> 
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <h4 class="price" style="float :right">₹<?php echo $row->min_charge; ?></h4>
                                             </div>
                                             <div class="col-md-4 col-sm-4">
                                                <h5 class="myacc" style="float : left"> Time :</h5>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h5 style="text-align : left"> <?=date('h:i A',strtotime($row->from_time));?> to  <?=date('h:i A',strtotime($row->to_time));?></h5>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                          <!-- row start  -->
                                          <div class="row">
                                             <div class="col-md-4 col-sm-4">
                                                <img src="<?php echo base_url().'assets/uploaded/users/'.$row->user_image;?>" class"circleimage" style="height: 100px; width :100px; border-radius: 50%; float: left;margin-top: 10%;"> 
                                                <div style=" float: left">
                                                   <span style="color: #FFD700; font-size:17px;" class="<?php if ($row->user_rating >= 1) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o';} ?>"></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=2) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>" ></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=3) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o';} ?>"></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=4) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>" ></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=5) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>">
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h3 style="text-align: left;"><?php echo $row->user_name; ?></h3>
                                                <p style="text-align: left;"><?php echo $row->work_description ;?></p>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                       </div>

                                       <?php if($row->job_status == 'Paused'): ?>
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/resumebackground.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : red; padding-left: 25px;"> Service Provider Paused your work</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;"><?= $row->job_status; ?></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>

                                    <?php else: ?>
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/userpending.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : red; padding-left: 25px;"> Service Provider Paused your work</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;"><?= $row->job_status; ?></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endif; ?>
                                    </div>
                                 </div>
                                 <?php endforeach;  ?>
                                 <?php endif; ?>
                              </div>
                              <!-- ///////////////////////////inprogress end  //////////////////////-->
                              <!-- ///////////////////////////completed start  //////////////////////-->
                              <div id="menu2" class="tab-pane fade">
                                 <br>
                                 <h4 style="color : #003286; float :left"> This Week </h4>
                                 <br>
                                 <?php if($complete == ''): ?>
                                 <h5><?php echo " No  Booking  Available "; ?> </h5>
                                 <?php else:?>
                                 <?php foreach($complete AS $row):?>
                                 <!-- Single Verticle job -->
                                 <div class="job-verticle-list12">
                                    <div class="vertical-job-card">
                                       <div class="vertical-job-body" style="padding: 25px;">
                                          <div class="row">
                                             <div class="col-md-6 col-sm6">
                                                <h5 class="myacc" style="float : left"> Completed on  :</h5>
                                                <h5 style="float : right"> <?=date('d-M-Y',strtotime($row->modified_date));?></h5>
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <img src="<?php echo base_url()?>assets/media/chat.png" style="height: 30; width :30; float : left"> 
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <img src="<?php echo base_url()?>assets/media/call.png" style="height: 30; width :30;"> 
                                             </div>
                                             <div class="col-md-2 col-sm-2">
                                                <h4 class="price" style="float :right">₹<?php echo $row->min_charge; ?></h4>
                                             </div>
                                             <div class="col-md-4 col-sm-4">
                                                <h5 class="myacc" style="float : left"> Time :</h5>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h5 style="text-align: left;"> <?=date('h:i:a',strtotime($row->modified_date));?></h5>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                          <!-- row start  -->
                                          <div class="row">
                                             <div class="col-md-4 col-sm-4">
                                                <img src="<?php echo base_url().'assets/uploaded/users/'.$row->user_image;?>" class"circleimage" style="height: 100px; width :100px; border-radius: 50%; float: left;margin-top: 10%;"> 
                                                <div style=" float: left">
                                                   <span style="color: #FFD700; font-size:17px;" class="<?php if ($row->user_rating >= 1) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o';} ?>"></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=2) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>" ></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=3) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o';} ?>"></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=4) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>" ></span>
                                                   <span style="color: #FFD700;font-size:17px;" class="<?php if ($row->user_rating >=5) {
                                                      echo 'fa fa-star';
                                                      }else{ echo 'fa fa-star-o'; } ?>">
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h3 style="text-align: left;"><?php echo $row->user_name; ?></h3>
                                                <p style="text-align: left;"><?php echo $row->work_description ;?> </p>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                       </div>
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/userpending.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : red; padding-left: 25px;"> Raise Support Ticket</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;">Book Again</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endforeach;  ?>
                                 <?php endif; ?>
                              </div>
                              <!-- //////////////////completed end ///////////////////// -->
                           </div>
                           <!-- start end tab  -->
                        </div>
                     </div>
                  </div>
                  <!-- Single end Content -->
                  <!-- Single Tab Content Start -->
                  <div class="tab-pane fade" id="Myjobpost" role="tabpanel">
                     <div class="myaccount-content">
                        <h3>My Bids</h3>
                        <div class="welcome">
                           <p>Hello, <strong><?= $this->session->userdata('Id') ? $this->session->userdata('name') :''; ?></strong> (If Not <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?> ! </strong><a href="<?php echo site_url('LoginRegistration/logout') ?>" class="logout"> Logout</a>)</p>
                        </div>
                        <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                           recent orders, manage your shipping and billing addresses and edit your
                           password and account details.
                        </p>
                     </div>
                  </div>
                  <!-- Single end Content -->
                  <!-- start my profile  -->

                  <div class="tab-pane fade" id="profile" role="tabpanel">
                     <div class="myaccount-content">
                          <div class="container">

   <div class="col-md-12 col-sm-12">
        
        
         <!-- Single Verticle job -->
         <div class="job-verticle-list">
            <div class="vertical-job-card">
               <div class="vertical-job-body">
                  <div class="row">
                     <div class="col-md-4 col-sm4">
                        <img class="img-responsive" src="<?php echo base_url()?>assets/uploaded/users/<?=$user_details['image'];?>" alt="" style="height: 100px; width: 100px; border-radius: 15px">
                     </div>
                     <div class="col-md-4 col-sm-4">
                        <div class="vrt-job-act">
                           <b class="vendorname"><?= ucfirst($user_details['fname']); ?></b>
                           <br>
                           <!-- <p><?= ucfirst($row->name); ?> </p> -->
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-4">
                        <div class="vrt-job-act">
                         <!--   <h5> Min. Amount</h5>
                           <h3 class="price">₹<?= $row->min_charge; ?></h3> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="vertical-job-footer">
                  <div class="row">
                     <div class="col-md-4 col-sm-4">
                        <div class="cmp-job-rating">
                           <ul>
                              <!-- <li>
                                 <h5>Rating: <?= $row->rating;?> <span style="color: #FFD700; font-size:20x;" class="fa fa-star checked"> </h5>
                              </li> -->
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-8 col-sm-8">
                        <div class="cmp-job-review">
                          <!--  <ul>
                              <li>Jobs <span>15</span></a></li>
                              <li><b><span><?= $row->distance; ?></span>Kms Away </b></li>
                           </ul> -->
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
         
         
         <br>
         <br>
        
     <form action="<?php echo base_url()?>Home/User_accountupdate/<?=$user_details['id']?>" method="post" enctype="multipart/form-data">

          
          <!-- General Information -->
          <div class="box">
            <div class="box-header">
              <h4>User information</h4>
            </div>
            <div class="box-body">
              <div class="row">
              
                <div class="col-sm-4">
                  <label> Name</label>
                  <input type="text" class="form-control" name="name"  value="<?php echo $user_details['fname'] ;?>" required>
                </div>
                <div class="col-sm-4">
                  <label>Mobile</label>
                  <input type="text" class="form-control" name="mobile"  value="<?php echo $user_details['phone'] ;?>" required>

                </div>
                <div class="col-sm-4">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email"  value="<?php echo $user_details['email'] ;?>" required>
                </div>
                
                
                
                <div class="col-sm-4 m-clear">
                  <label>Date Of Birth</label>
                  <input type="date" class="form-control" name="dob"  value="<?php echo $user_details['dob'] ;?>" required>
                </div>
                
                
                
                
              

                <div class="col-sm-4">
                  <label>Gender</label>
                  <select name="gender" class="wide form-control selectpicker">
                     <option <?php if($user_details['gender']=="Male"): echo " selected " ; endif ?>   value="Male">Male</option>
                                          <option <?php if($user_details['gender']=="Female"): echo " selected " ; endif ?> value="Female">Female</option>
                                          <option <?php if($user_details['gender']=="Other"): echo " selected " ; endif ?> value="Other">Other</option>
                                       
                  </select>
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
                     </div>
                  </div>
                
                  <!-- end my profile-->
               </div>
            </div>
         </div>
      </div>
      <br>
      <br>
      <br>
      <!-- end main  -->
      <?php  $this->load->view('frontend/footer'); ?>
      <!-- //////////////how to post datd ajax -->
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
      <!-- Aos Js -->
      <script src="<?php echo base_url()?>assetsfront/plugins/aos-master/aos.js"></script>
      <!-- Nice Select -->
      <script src="<?php echo base_url()?>assetsfront/plugins/nice-select/js/jquery.nice-select.min.js"></script>
      <!-- Custom Js -->
      <script src="<?php echo base_url()?>assetsfront/js/jQuery.style.switcher.js"></script>
      <script>
         AOS.init();
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>
      <!--autocomplettee  -->
      <script src="<?php echo base_url()?>assetsfront/autocomplete/dist/bootstrap-tokenfield.min.js"></script>
      <!--autocomplettee  -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js" integrity="sha512-gH0SqyjTN7WJAtki1UvqOkhWi3WsF9LY05BMwdcSq6QdFDXrXeXy0q8iP0YmBXCqo7OnSgdIPrC5Vqn8/KRu/Q==" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous"></script>
      <!-- autocomplete -->
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <!-- autocomplettee -->
    
      <script type="text/javascript">
         var c ="<?php echo count(json_decode($user_tarif['from_time'])) ;?>";
             
      </script>
      <!-- autocompletee -->
     
      
      <!-- end auto completedata -->
    
      <style>
         .btn{color:green}
         .activeed{background:green;
         color: rgb(255 255 255);
         }
         .inactiveed{background:white}
      </style>
   </body>
   <style>
    .weekDays-selector input {
  display: none!important;
}

.weekDays-selector input[type=checkbox] + label {
  display: inline-block;
  border-radius: 6px;
  background: #dddddd;
  height: 40px;
  width: 30px;
  margin-right: 3px;
  line-height: 40px;
  text-align: center;
  cursor: pointer;
}

.weekDays-selector input[type=checkbox]:checked + label {
  background: #2AD705;
  color: #ffffff;
}
   </style>
   <style type="text/css">
      .form-control{
      border-radius: 5px;
      }
      .myaccount-tab-menu a {
      border: 1px solid rgb(238 238 238);
      border-bottom: none;
      color: #003286;
      font-weight: 800;
      font-size: 14px;
      display: block;
      padding: 15px 15px 13px;
      text-transform: uppercase;
      }
      .myaccount-tab-menu a:hover, .myaccount-tab-menu a.active {
      background-color: #003286;
      color: rgb(255 255 255);
      }
      .job-verticle-list12{
      border: 1px solid #1AE8FF;
      }
      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
      color: #000000;
      cursor: default;
      font-size: 16px;
      font-weight: 800;
      font-style: bold;
      background-color: rgb(253 196 0);
      border: none;
      border-bottom-color: #003286;
      }
      a, a:active, a:focus, a:hover {
      color: black;

      outline: none;
      font-weight: 800;
      font-size: 14px;
      text-decoration: none;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      }
      .myacc{
      color: #747474;
      }
      .red-color {
      color:red;
      }
      .blue-color {
      color: rgb(0 50 134);;
      }
      .myp {
      line-height:1.8;
      font-family: 'Montserrat', sans-serif;
      -webkit-transition: .2s ease-in;
      -moz-transition: .2s ease-in;
      transition: .2s ease-in;
      }
      #statuscolor{
      color: white;
      }
      #vendorcolor{
      color: #003286;
      }

      .nav-tabs>li>a {
    background-color: #003286;
}



   </style>
   <!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>

