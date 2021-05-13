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
               <img src="<?php echo base_url().'assets/uploaded/users/'.$userdata->image;?>" alt="" class="img-fluid" style="height: 100px; width :100px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto; border: 3px solid #55b537;">
               <?php else: ?>
               <img src="<?php echo base_url().'assets/uploaded/users/users.png';?>" alt="" class="img-fluid" style="height: 100px; width :100px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto; border: 3px solid #55b537;">
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
                  <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                  Home</a>
                  <a href="#account" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>My Account</a>
                  <a href="#booking" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>My Bookings</a>
                  <a href="#bids" data-toggle="tab"><i class="fa fa-credit-card"></i>My Bids</a>
                  <a href="#profile" data-toggle="tab"><i class="fa fa-credit-card"></i>My Profile</a>
                  <a href="#setting" data-toggle="tab"><i class="fa fa-credit-card"></i>Settings</a>
                  <a href="<?php echo site_url('MyAccount/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
               </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
               <div class="tab-content" id="myaccountContent">
                  <!-- Single Tab Content Start -->
                  <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                     <div class="myaccount-content">
                        <h3>Home</h3>
                        <div class="welcome">
                           <p>Hello, <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?></strong> (If Not <strong><?= $this->session->userdata('login_id') ? $this->session->userdata('name') :''; ?> ! </strong><a href="<?php echo site_url('MyAccount/logout') ?>" class="logout"> Logout</a>)</p>
                        </div>
                        <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                           recent orders, manage your shipping and billing addresses and edit your
                           password and account details.
                        </p>
                     </div>
                  </div>
                  <!-- Single end Content -->
                  <!-- /////////////////////////////////  My Account start  ///////////////////////-->
                  <div class="tab-pane fade" id="account" role="tabpanel">
                     <!-- ///////////my account card start ////////////////// -->
                     <div class="card" style="background-color : #b9abab38; border-radius: 15px">
                        <div class="row">
                           <br>
                           <div class="col-md-3 col-sm-3">
                              <div class="emp-pic">
                                 <img src="<?php echo base_url().'assets/uploaded/users/'.$userdata->image;?>" alt="" class="img-fluid" style="height: 100px; width :100px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto; border: 3px solid #55b537;">
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
                     <!-- //////row start myacctount table /////// -->
                     <!--  <div class="row">
                        <h3>Earnings Summary</h3>
                        <div class="col-lg-12 col-md-12 col-sm-12">
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
                        <td>
                        <p class="price">₹280</p>
                        </td>     
                        <td>
                        <p class="price">₹280</p>
                        </td> 
                            <td>
                        <p class="price">₹280</p>
                        </td>
                        </tr>
                        
                        </tbody>
                        </table>
                         
                        </div>          
                        </div>
                         
                        </div> -->
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
                                       <td style="font-weight: 800; color: #55b537;">Free<br>
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
                              <li class="active"><a data-toggle="tab" href="#home">In Progress</a></li>
                              <li><a data-toggle="tab" href="#menu1">Upcoming</a></li>
                              <li><a data-toggle="tab" href="#menu2">Completed/Rejected</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 <br>
                                 <h4 style="color : #55b537; float :left"> This Week </h4>
                                 <br>
                                 <?php if($inprogress == ''): ?>
                                 <h5><?php echo " No  in Progress data found  "; ?> </h5>
                                 <?php else:?>
                                 <?php foreach($inprogress AS $row):?>
                                 <!-- Single Verticle job -->
                                 <div class="job-verticle-list12">
                                    <div class="vertical-job-card">
                                       <div class="vertical-job-body" style="padding: 25px;">
                                          <div class="row">
                                             <div class="col-md-6 col-sm6">
                                                <h5 class="myacc" style="float : left"> Started  :</h5>
                                                <h5 style="text-align : right"><?=date('d-M-Y',strtotime($row->booking_date));?></h5>
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
                                                <h5 class="myacc" style="float : left"> Time lapsed:</h5>
                                             </div>
                                             <div class="col-md-8 col-sm-8">
                                                <h5 style="text-align: left"> 40 Min</h5>
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
                                                <p  style="text-align: left;"><?php echo $row->work_description ;?> </p>
                                                <p style="float : left"><i class="fa fa-map-marker red-color" style"color : red" aria-hidden="true"></i>  <?php echo $row->start_location1; ?></p>
                                             </div>
                                          </div>
                                          <!-- row end -->
                                       </div>
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/inprogressbackground.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color: rgb(0 50 134); padding-left: 25px;"><i class="fa fa-refresh blue-color" aria-hidden="true"></i> You should start to user location</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;">Started</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endforeach;  ?>
                                 <?php endif; ?>
                              </div>
                              <!-- \\\\\\\\\\\\\\\\\\\in progress end \\\\\\\\\\\\\\\\\\\\\\\-->
                              <!-- //////////////////////////////////////////////upcoming start //////////////////////////////// -->
                              <div id="menu1" class="tab-pane fade">
                                 <br>
                                 <h4 style="color : #55b537; float :left"> This Week </h4>
                                 <br>
                                 <?php if($upcoming == ''): ?>
                                 <h5><?php echo " No  Booking  Available "; ?> </h5>
                                 <?php else:?>
                                 <?php foreach($upcoming AS $row):?>
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
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/upcomingbackground.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : red; padding-left: 25px;"> Cancel Booking</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : black">Re-schedule</a>
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;">Start</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endforeach;  ?>
                                 <?php endif; ?>
                              </div>
                              <!-- ///////////////////////////upcoming end  //////////////////////-->
                              <!-- ///////////////////////////completed start  //////////////////////-->
                              <div id="menu2" class="tab-pane fade">
                                 <br>
                                 <h4 style="color : #55b537; float :left"> This Week </h4>
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
                                       <div class="vertical-job-footer" style="background:url(<?php echo base_url();?>assets/media/completebackground.png); background-repeat: no-repeat;background-size: cover;">
                                          <div class="row" >
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : left; color : red; padding-left: 25px;"> Raise Support Ticket</a>
                                                </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6">
                                                <div class="cmp-job-rating">
                                                   <a href="#" style="float : right; color : #ffffff; padding-right: 25px;">View Details</a>
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
                  <div class="tab-pane fade" id="bids" role="tabpanel">
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
                        <form action="#" method="post" enctype="multipart/form-data">
                           <div class="myaccount-table table-responsive text-center">
                              <!-- start tab in  -->
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#Personal">Personal</a></li>
                                 <li><a data-toggle="tab" href="#Skills">Skills</a></li>
                                 <li><a data-toggle="tab" href="#Tarif">Tarif & Timings</a></li>
                              </ul>
                              <div class="tab-content">
                                 <!-- start personal -->
                                 <div id="Personal" class="tab-pane fade in active">
                                    <!-- General Information -->
                                    <div class="box">
                                       <div class="box-header">
                                          <h4>Service Provider information</h4>
                                       </div>
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <label> Name</label>
                                                <input type="text" class="form-control" name="name"  value="<?php echo $user_details['fname'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" name="mobile"  value="<?php echo $user_details['phone'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email"  value="<?php echo $user_details['email'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6 m-clear">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" name="dob"  value="<?php echo $user_details['dob'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Profession</label>
                                                <select name="profession_id" class="wide form-control selectpicker">
                                                   <option value="">Profession</option>
                                                   <?php foreach ($category as $row) {
                                                      if($user_details['profession_id'] == $row->id){ ?>
                                                   <option  selected value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                   <?php }else{ ?>
                                                   <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                   <?php }
                                                      ?>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                             <div class="col-sm-6">
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
                                 </div>
                                 <!-- /////////////end pesonal///////////////// -->
                                 <!-- start skills -->
                                 <div id="Skills" class="tab-pane fade">
                                    <div class="box">
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <label>Qualification</label>
                                                <input type="text" class="form-control" name="qualification" value="<?php echo $user_details['qualification'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Language Known</label>
                                                <input type="text" class="form-control" name="language" id="language_name" value="<?php echo $user_details['language'] ;?>" required>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <label>Keyword Skill</label>
                                                <input type="text" name="skills" id="search_data" placeholder="" autocomplete="off" class="form-control" />
                                                <br />
                                                <span id="name"></span>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>About Me</label>
                                                <textarea class="form-control height-120 textarea" placeholder="About Me" name="about"><?php echo $user_details['about'] ;?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Social Accounts -->
                                 <!-- Company Summery -->
                                 <!-- ////////////////end skills ///////////////// -->
                                 <!-- ////////////////Start Tarif ///////////////// -->
                                 <div id="Tarif" class="tab-pane fade">
                                    <div class="box">
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <label>Per Hours</label>
                                                <input type="text" class="form-control" name="pr_hours" value="<?php echo $user_details['pr_hours'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Per Day</label>
                                                <input type="text" class="form-control" name="pr_days" value="<?php echo $user_details['pr_days'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Minimum Charge</label>
                                                <input type="text" class="form-control" name="min_charge" value="<?php echo $user_details['min_charge'] ;?>" required>
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Extra Charge</label>
                                                <input type="text" class="form-control" name="extra_charge" value="<?php echo $user_details['extra_charge'] ;?>" required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="box">
                                       <div class="box-body">
                                          <div id="actions">
                                             <div id="action_area">
                                                <?php if ($user_tarif['user_id'] == $user_details['id']): ?>
                                                <?php if (count(json_decode($user_tarif['from_time'])) > 0): ?>
                                                <?php
                                                   $counter = 0;
                                                   $from_time= json_decode($user_tarif['from_time']);
                                                   $to_time= json_decode($user_tarif['to_time']);
                                                   $day_type= json_decode($user_tarif['day_type']);
                                                   $day_name= json_decode($user_tarif['day_name']);
                                                   $i=0;
                                                   
                                                   
                                                   
                                                   foreach ($from_time as $index => $value):?>
                                                <?php if ($counter == 0):
                                                   $counter++; ?>
                                                <div class="row">
                                                   <div class="col-sm-5">
                                                      <label>From Time</label>
                                                      <input type="time" class="form-control" name="from_time[]" value="<?php $test= json_encode($from_time[$index]->FromTime); echo $ph=json_decode($test); ?>" >
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>To Time</label>
                                                      <input type="time" class="form-control" name="to_time[]" value="<?php $to_time1= json_encode($to_time[$index]->ToTime); echo $to_times=json_decode($to_time1); ?>" >
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <?php $day_type1= json_encode($day_type[$index]->Day_Type);  $day_types=json_decode($day_type1);?>
                                                      <label>type</label>
                                                      <select name="day_type[]" class="wide form-control selectpicker">
                                                         <option value="" >You can select  Type</option>
                                                         <option <?php if($day_types=="Everyday"): echo " selected " ; endif ?>   value="Everyday">Everyday</option>
                                                         <option <?php if($day_types=="Week-days"): echo " selected " ; endif ?> value="Week-days">Week-days</option>
                                                         <option <?php if($day_types=="Week-ends"): echo " selected " ; endif ?> value="Week-ends">Week-ends</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>Day Name</label>
                                                      <?php $exp=explode(",",$day_name[$index]); ?>
                                                      <select name="day_name[]" class="wide form-control selectpicker select_addon" id="multi-select-demo" multiple="multiple" >
                                                         <option  disabled="" value="">You can select  Days  *</option>
                                                         <option  value="Sun"<?php  if(in_array('Sun',$exp)) echo 'selected="selected"';?>>Sunday</option>
                                                         <option  value="Mon" <?php  if(in_array('Mon',$exp)) echo 'selected="selected"';?>>Monday</option>
                                                         <option  value="Tue" <?php  if(in_array('Tue',$exp)) echo 'selected="selected"';?>>Tuesday</option>
                                                         <option  value="Wed" <?php  if(in_array('Wed',$exp)) echo 'selected="selected"';?>>Wednesday</option>
                                                         <option  value="Thu"<?php  if(in_array('Thu',$exp)) echo 'selected="selected"';?>>thursday</option>
                                                         <option  value="Fri"<?php  if(in_array('Fri',$exp)) echo 'selected="selected"';?>>Friday</option>
                                                         <option  value="Sat"<?php  if(in_array('Sat',$exp)) echo 'selected="selected"';?>>Saturday</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                </div>
                                                <?php else: ?>
                                                <div class="row">
                                                   <div class="col-sm-5">
                                                      <label>From Time</label>
                                                      <input type="time" class="form-control" name="from_time[]" value="<?php $test= json_encode($from_time[$index]->FromTime); echo $ph=json_decode($test); ?>" required>
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>To Time</label>
                                                      <input type="time" class="form-control" name="to_time[]" value="<?php $to_time1= json_encode($to_time[$index]->ToTime); echo $to_times=json_decode($to_time1); ?>" required>
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <?php $day_type1= json_encode($day_type[$index]->Day_Type);  $day_types=json_decode($day_type1);?>
                                                      <label>type</label>
                                                      <select name="day_type[]" class="wide form-control selectpicker">
                                                         <option value="" >You can select  Type</option>
                                                         <option <?php if($day_types=="Everyday"): echo " selected " ; endif ?>   value="Everyday">Everyday</option>
                                                         <option <?php if($day_types=="Week-days"): echo " selected " ; endif ?> value="Week-days">Week-days</option>
                                                         <option <?php if($day_types=="Week-ends"): echo " selected " ; endif ?> value="Week-ends">Week-ends</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>Day Name</label>
                                                      <?php $exp=explode(",",$day_name[$index]); ?>
                                                      <select name="day_name[]" class="wide form-control selectpicker select_addon" id="multi-select-demo" multiple="multiple">
                                                         <option  disabled="" value="">You can select  Days  *</option>
                                                         <option  value="Sun"<?php  if(in_array('Sun',$exp)) echo 'selected="selected"';?>>Sunday</option>
                                                         <option  value="Mon" <?php  if(in_array('Mon',$exp)) echo 'selected="selected"';?>>Monday</option>
                                                         <option  value="Tue" <?php  if(in_array('Tue',$exp)) echo 'selected="selected"';?>>Tuesday</option>
                                                         <option  value="Wed" <?php  if(in_array('Wed',$exp)) echo 'selected="selected"';?>>Wednesday</option>
                                                         <option  value="Thu"<?php  if(in_array('Thu',$exp)) echo 'selected="selected"';?>>thursday</option>
                                                         <option  value="Fri"<?php  if(in_array('Fri',$exp)) echo 'selected="selected"';?>>Friday</option>
                                                         <option  value="Sat"<?php  if(in_array('Sat',$exp)) echo 'selected="selected"';?>>Saturday</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-2">
                                                      <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeAction(this)"> <i class="fa fa-minus"></i> Remove</button>
                                                   </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php $i++; ?>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <div class="row">
                                                   <div class="col-sm-5">
                                                      <label>From Time</label>
                                                      <input type="time" class="form-control" name="from_time[]" >
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>To Time</label>
                                                      <input type="time" class="form-control" name="to_time[]" >
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>type</label>
                                                      <select name="day_type[]" class="wide form-control selectpicker">
                                                         <option value="" >You can select  Type</option>
                                                         <option  value="Everyday">Everyday</option>
                                                         <option  value="Week-days">Week-days</option>
                                                         <option  value="Week-ends">Week-ends</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>Day Name</label>
                                                      <select name="day_name[]" class="wide form-control selectpicker select_addon" id="multi-select-demo" multiple="multiple">
                                                         <option  disabled="" value="">You can select  Days  *</option>
                                                         <option value="Sun" >Sunday</option>
                                                         <option value="Mon">Monday</option>
                                                         <option value="Tue">Tuesday</option>
                                                         <option value="Wed">Wednesday</option>
                                                         <option value="Thu">thursday</option>
                                                         <option value="Fri">Friday</option>
                                                         <option value="Sat">Saturday</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <div class="row">
                                                   <div class="col-sm-5">
                                                      <label>From Time</label>
                                                      <input type="time" class="form-control" name="from_time[]" required>
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>To Time</label>
                                                      <input type="time" class="form-control" name="to_time[]" required>
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>type</label>
                                                      <select name="day_type[]" class="wide form-control selectpicker" required>
                                                         <option value="" >You can select  Type</option>
                                                         <option  value="Everyday">Everyday</option>
                                                         <option  value="Week-days">Week-days</option>
                                                         <option  value="Week-ends">Week-ends</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-5">
                                                      <label>Day Name</label>
                                                      <select name="day_name[]" class="wide form-control selectpicker select_addon" id="multi-select-demo" multiple="multiple" required>
                                                         <option  disabled="" value="">You can select  Days  *</option>
                                                         <option value="Sun" >Sunday</option>
                                                         <option value="Mon">Monday</option>
                                                         <option value="Tue">Tuesday</option>
                                                         <option value="Wed">Wednesday</option>
                                                         <option value="Thu">thursday</option>
                                                         <option value="Fri">Friday</option>
                                                         <option value="Sat">Saturday</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-sm-2">
                                                   </div>
                                                </div>
                                                <?php endif; ?>
                                                <div id="blank_action_field">
                                                   <div class="row">
                                                      <div class="col-sm-5">
                                                         <label>From Time</label>
                                                         <input type="time" class="form-control" name="from_time[]" id="actions" >
                                                      </div>
                                                      <div class="col-sm-5">
                                                         <label>To Time</label>
                                                         <input type="time" class="form-control" name="to_time[]" id="actions" >
                                                      </div>
                                                      <div class="col-sm-2">
                                                      </div>
                                                      <div class="col-sm-5">
                                                         <label>Type</label>
                                                         <select name="day_type[]" class="wide form-control " id="actions">
                                                            <option value="" >You can select  Type</option>
                                                            <option  value="Everyday">Everyday</option>
                                                            <option  value="Week-days">Week-days</option>
                                                            <option  value="Week-ends">Week-ends</option>
                                                         </select>
                                                      </div>
                                                      <div class="col-sm-5">
                                                    




                                                      </div>
                                                      <div class="col-md-2">
                                                         <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeAction(this)"> <i class="fa fa-minus"></i>Remove</button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <input type="text" id="servicetypesArray" name="data[day_name][]" value=""  hidden/>
                                          <input type="text" id="abc" name="abc[]" value=""  hidden/>
                                          <div class="col-sm-2">
                                             <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendAction()"> <i class="fa fa-plus"></i>Add </button>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="weekDays-selector">
                                                  <input type="checkbox" id="weekday-mon" class="weekday" />
                                                  <label for="weekday-mon">M</label>
                                                  <input type="checkbox" id="weekday-tue" class="weekday" />
                                                  <label for="weekday-tue">T</label>
                                                  <input type="checkbox" id="weekday-wed" class="weekday" />
                                                  <label for="weekday-wed">W</label>
                                                  <input type="checkbox" id="weekday-thu" class="weekday" />
                                                  <label for="weekday-thu">T</label>
                                                  <input type="checkbox" id="weekday-fri" class="weekday" />
                                                  <label for="weekday-fri">F</label>
                                                  <input type="checkbox" id="weekday-sat" class="weekday" />
                                                  <label for="weekday-sat">S</label>
                                                  <input type="checkbox" id="weekday-sun" class="weekday" />
                                                  <label for="weekday-sun">S</label>
                                                </div>

                                                
                                    <div class="box">
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <label>ID Proof</label>
                                                <input type="file" name="id_proof" class="form-control">
                                                <img src="<?=base_url()?>assets/uploaded/users/<?=$user_details['id_proof']?>" style="height: 200px; width: 200px;">
                                             </div>
                                             <div class="col-sm-6">
                                                <label>Upload video *</label>
                                                <input type="file" class="form-control" name="video" >
                                                <?=$user_details['video']==''?'NA':'<video width="150" height="100" controls>
                                                   <source src="'.base_url().'assetsfront/uploaded/video/'.$user_details['video'].'" type="video/mp4">
                                                   Your browser does not support the video tag.
                                                   </video>';?>
                                                <?php echo form_error('video', '<div class="error">', '</div>'); ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-center">
                                       <button type="submit" class="btn btn-m theme-btn" id="submit">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--///////////////////////// end Tarif ///////////////////////-->
                        </form>
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
         var i= 0;
         var blank_action = jQuery('#blank_action_field').html();
         jQuery(document).ready(function() {
          
            jQuery('#blank_action_field').hide();
         
         });
         function appendAction() {
         
           jQuery('#action_area').append(blank_action);
          i++;
            console.log(i);
         
         }
         
         function removeAction(actionElem) {
           jQuery(actionElem).parent().parent().remove();
         }
      </script>
      <script type="text/javascript">
         var c ="<?php echo count(json_decode($user_tarif['from_time'])) ;?>";
             
      </script>
      <!-- autocompletee -->
      <script>
         $(document).ready(function(){
             
           $('#search_data').tokenfield({
               autocomplete :{
                   source: function(request, response)
                   {
                       jQuery.get('<?php echo base_url('MyAccount/autocompleteDataee'); ?>', {
                           query : request.term
                       }, function(data){
                           data = JSON.parse(data);
                           response(data);
                       });
                   },
                   delay: 100
               }
           });
         
           $('#search').click(function(){
               $('#name').text($('#search_data').val());
           });
         
         });
      </script>
      <script>
         $(document).ready(function(){
             
           $('#language_name').tokenfield({
               
                   source: function(request, response)
                   {
                       jQuery.get('#', {
                           query : request.term
                       }, function(data){
                           data = JSON.parse(data);
                           response(data);
                       });
                   },
                   delay: 100
               
           });
         
           $('#search').click(function(){
               $('#name').text($('#language_name').val());
           });
         
         });
      </script>
      <!-- end auto completedata -->
      <script>
         $(document).ready(function() {
           $('.clickme').click(function() {
             var div = $(this).closest('div');
            var abc =div.find('input').val();
         
         
             document.getElementById('abc').value = abc; 
           });
         });
      </script>
      <script>
         $(document).ready(function(){
           $('.btn').click(function(){
             $('.btn').removeClass('activeed').addClass('inactiveed');
              $(this).removeClass('inactiveed').addClass('activeed');
             });
         })
      </script>
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
      color: #55b537;
      font-weight: 800;
      font-size: 14px;
      display: block;
      padding: 15px 15px 13px;
      text-transform: uppercase;
      }
      .myaccount-tab-menu a:hover, .myaccount-tab-menu a.active {
      background-color: #55b537;
      color: rgb(255 255 255);
      }
      .job-verticle-list12{
      border: 1px solid rgb(42 204 12);
      }
      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
      color: rgb(255 255 255);
      cursor: default;
      font-size: 16px;
      font-weight: 800;
      font-style: bold;
      background-color: rgb(85 181 55);
      border: none;
      border-bottom-color: rgb(0 0 0 / 0%);
      }
      a, a:active, a:focus, a:hover {
      color: rgb(85 181 55);
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
      color: #55b537;
      }
   </style>
   <!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>