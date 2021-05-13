<!DOCTYPE html>

<html class="no-js" lang="zxx">

   

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

   <body class="blue-skin" onload="startTimer()">

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

               <h2> Booking</h2>

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

                                    <li>

                                       <h5>Rating: <?= $row->rating;?> <span style="color: #FFD700; font-size:20x;" class="fa fa-star checked"> </h5>

                                    </li>

                                 </ul>

                              </div>

                           </div>

                           <div class="col-md-8 col-sm-8">

                              <div class="cmp-job-review">

                                 <ul>

                                    <li>Jobs <span>15</span></li>

                                    <li><?= $row->distance; ?>Kms Away </li>

                                 </ul>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <!-- Single Verticle job -->

               <?php endforeach;  ?>

               <?php endif; ?>

            </div>

            <!-- End Row -->

            <?php if($row->cat_id == 2): ?>

            <form action="<?php echo base_url()?>Home/category_action/single_booking" method="post" enctype="multipart/form-data">

               <!-- General Information -->

               <div class="box">

                  <div class="box-header">

                  </div>

                  <div class="box-body">

                     <div class="row">

                        <input type="hidden" name="type" value="single move">

                        <input type="hidden" name="vendor_id" value="<?= $row->user_id; ?>">

                        <input type="hidden" name="service_id" value="<?= $row->id; ?>">

                        <div class="col-sm-6 col-md-6">

                           <div class="form-check">

                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Book for now" checked>

                              <label class="form-check-label" for="flexRadioDefault2">

                              Book for now

                              </label>

                           </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <div class="form-check">

                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Schedule later" >

                              <label class="form-check-label" for="flexRadioDefault2">

                              Schedule later

                              </label>

                           </div>

                        </div>

                     </div>

                     <div class="row">

                        <?php

                           $from_time= json_decode($gettime['from_time']);

                           $to_time= json_decode($gettime['to_time']);

                           

                           

                           

                           

                               foreach ($from_time as $index => $value):?>

                        <div class="col-sm-3 col-md-3">

                           <input type="hidden" class="form-control" name="to_time" class="form-control input_text"

                              value="<?php 

                                 echo $fromtimes=date('h:i A',strtotime($from_time[$index]->FromTime)); ?> To <?php 

                                 echo $to_times=date('h:i A',strtotime($to_time[$index]->ToTime)); ?>" readonly>

                           <button type="button" class="clickme btn inactiveed" style="border-color :#fdc400; border 2px solid; border-radius : 5px;width :100%; height : 50px;"><?php 

                              echo $fromtimes=date('h:i A',strtotime($from_time[$index]->FromTime)); ?> To <?php 

                              echo $to_times=date('h:i A',strtotime($to_time[$index]->ToTime)); ?></button>

                        </div>

                        <?php endforeach; ?>

                        <input type="hidden" name="abc" value="" id="abc"> 

                     </div>

                     <div class="row">

                        <div class="col-sm-6 col-md-6">

                           <label> Date</label>

                           <input type="date" class="form-control" name="date"  required>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <div class="form-group">

                              <label class="">Address:<span class="text-danger">*</span></label>

                              <input type="text" name="address" id="location" value="" class="form-control"/>

                              <?php echo form_error('location', '<div class="error">', '</div>'); ?>

                              <div id="map_canvas" style="display: none;"></div>

                           </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <label>Work Description</label>

                           <input type="text" class="form-control" name="description" required>

                        </div>

                        <div class="col-sm-6 col-md-6">

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

            <?php elseif($row->cat_id == 1): ?>

            <!-- blue caller booking  -->

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

                        <div class="col-sm-6 col-md-6">

                           <div class="form-check">

                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Book for now" checked>

                              <label class="form-check-label" for="flexRadioDefault2">

                              Book for now

                              </label>

                           </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <div class="form-check">

                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Schedule later" >

                              <label class="form-check-label" for="flexRadioDefault2">

                              Schedule later

                              </label>

                           </div>

                        </div>

                     </div>

                     <div class="row">

                        <div class="col-sm-6 col-md-6">

                           <label> Date</label>

                           <input type="date" class="form-control" name="date"  required>

                        </div>

                     </div>

                     <div class="row">

                        <?php

                           $from_time= json_decode($gettime['from_time']);

                           $to_time= json_decode($gettime['to_time']);

                           

                           

                           

                           

                               foreach ($from_time as $index => $value):?>

                        <div class="col-sm-3 col-md-3">

                           <input type="hidden" class="form-control" name="to_time" class="form-control input_text"

                              value="<?php 

                                 echo $fromtimes=date('h:i A',strtotime($from_time[$index]->FromTime)); ?> To <?php 

                                 echo $to_times=date('h:i A',strtotime($to_time[$index]->ToTime)); ?>" readonly>

                           <button type="button" class="clickme btn inactiveed" style="border-color :#fdc400; border 2px solid; border-radius : 5px;width :100%; height: 50px;"><?php 

                              echo $fromtimes=date('h:i A',strtotime($from_time[$index]->FromTime)); ?> To <?php 

                              echo $to_times=date('h:i A',strtotime($to_time[$index]->ToTime)); ?></button>

                        </div>

                        <?php endforeach; ?>

                        <input type="hidden" name="abc" value="" id="abc"> 

                     </div>

                     <div class="row">

                        <div class="col-sm-12 col-md-12">

                           <label>Job Eastimate</label>

                        </div>

                        <div class="col-sm-3 col-md-3">

                           <input type="number" name="nubervalue" class="form-control" value=""/>

                        </div>

                        <div class="col-sm-3 col-md-3">

                           <input type="hidden" name="myvalue" class="form-control input_text" value="Hours"/>

                           <button type="button" class="clickmemore btns inactiveedmore" style="border-color :#fdc400; border 2px solid; border-radius : 5px; width :100%; height: 50px;">Hours</button>

                        </div>

                        <div class="col-sm-3 col-md-3">

                           <input type="hidden" name="myvalue" class="form-control input_text" value="Days"/>

                           <button type="button" class="clickmemore btns inactiveedmore" style="border-color :#fdc400; border 2px solid; border-radius : 5px; width :100%; height: 50px;">Days</button>

                        </div>

                        <div class="col-sm-3 col-md-3">

                           <input type="hidden" name="myvalue" class="form-control input_text" value="Week"/>

                           <button type="button" class="clickmemore btns inactiveedmore" style="border-color :#fdc400; border 2px solid; border-radius : 5px; width :100%; height: 50px;">Week</button>

                        </div>

                        <input type="hidden" name="abcd" value="" id="abcd"> 

                     </div>

                     <div class="row">

                        <div class="col-sm-6 col-md-6">

                           <label>Work Description</label>

                           <input type="text" class="form-control" name="description" required>

                        </div>

                        <div class="col-sm-6 col-md-6">

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

            <?php elseif($row->cat_id == 3): ?>

            <form action="<?php echo base_url()?>Home/category_action/multi_booking" method="post" enctype="multipart/form-data">

               <!-- General Information -->

               <div class="box">

                  <div class="box-header">

                  </div>

                  <div class="box-body">

                     <div class="row">

                        <input type="hidden" name="type" value="Multi Move">

                        <input type="hidden" name="vendor_id" value="<?= $row->user_id; ?>">

                        <input type="hidden" name="service_id" value="<?= $row->id; ?>">

                        <div class="col-sm-6 col-md-6">

                           <div class="form-check">

                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Book for now" checked>

                              <label class="form-check-label" for="flexRadioDefault2">

                              Book for now

                              </label>

                           </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <div class="form-check">

                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Schedule later" >

                              <label class="form-check-label" for="flexRadioDefault2">

                              Schedule later

                              </label>

                           </div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <label> Date</label>

                           <input type="date" class="form-control" name="date"  required>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <label>Time</label>

                           <input type="time" class="form-control" name="from_time" required>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <label class="">Start Location:<span class="text-danger">*</span></label>

                           <input type="text" name="start_location1" id="location" value="" class="form-control location"/>

                           <?php echo form_error('location', '<div class="error">', '</div>'); ?>

                           <div id="map_canvas" class="map_canvas" style="display: none;"></div>

                        </div>

                     </div>







                     <div class="tab-pane" id="outcomes">

                   <label class="">To Location:<span class="text-danger">*</span></label>



                        <div id = "outcomes_area">

                           <div class="row">

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <!-- <input type="text" class="form-control" name="addmore[]" id="location3" placeholder=""> -->

                                 





                             <input type="text" name="end_location" id="location3" value="<?php echo set_value('end_location'); ?>" class="form-control location"/>

                           <?php echo form_error('location', '<div class="error">', '</div>'); ?>

                           <div id="map_canvas" class="map_canvas" style="display: none;"></div>

                                 </div>

                              </div>

                              <div class="col-md-4">

                              </div>

                              <div class="col-md-2">

                                 <button type="button" class="btn btn-success btn-sm" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> Add </button>

                              </div>

                           </div>

                           <div id = "blank_outcome_field">

                              <div class="row">

                                 <div class="col-md-6">

                                    <div class="form-group">

                                       <!-- <input type="text" class="form-control" name="addmore[]" id="location4" placeholder=""> -->

                                   



                                   <input type="text" name="start_location1" id="location4" value="" class="form-control location"/>

                                    <?php echo form_error('location4', '<div class="error">', '</div>'); ?>

                                    <div id="map_canvas" class="map_canvas" style="display: none;"></div>

                                  </div>

                                 </div>

                                 <div class="col-md-4">

                                 </div>

                                 <div class="col-md-2">

                                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i>Remove</button>

                                 </div>

                              </div>

                           </div>

                        </div>

                     </div>







                     <div class="row">

                        <div class="col-sm-6 col-md-6">

                           <label class="">End Location:<span class="text-danger">*</span></label>

                           <input type="text" name="end_location" id="location1" value="<?php echo set_value('end_location'); ?>" class="form-control location"/>

                           <?php echo form_error('location', '<div class="error">', '</div>'); ?>

                           <div id="map_canvas" class="map_canvas" style="display: none;"></div>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <label>Work Description</label>

                           <input type="text" class="form-control" name="description" required>

                        </div>

                        <div class="col-sm-6 col-md-6">

                           <label>Approx. Weight </label>

                           <select name="weight" class="form-control">

                              <option  value="Lite">Lite</option>

                              <option value="Medium">Medium</option>

                              <option value="Heavy">Heavy</option>

                           </select>

                        </div>

                        <div class="col-sm-6 col-md-6">

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

            <?php endif; ?>

            <br>

         </div>

         <!-- container end -->

      </section>

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

      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-DnLv-o5tVV7l06DtmukXTJViCgyC1h4&libraries=places"></script>

      <script src="<?php echo base_url()?>assetsfront/js/jquery.timepicker.js"></script>

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

         .btn{color:black}

         .activeed{background:#fdc400;

         color: rgb(255 255 255);

         }

         .inactiveed{background:white}

      </style>

      <script>

         $(document).ready(function() {

           $('.clickmemore').click(function() {

             var div = $(this).closest('div');

            var abcd =div.find('input').val();

           

         

             document.getElementById('abcd').value = abcd; 

           });

         });

      </script>

      <script>

         $(document).ready(function(){

           $('.btns').click(function(){

             $('.btns').removeClass('activeedmore').addClass('inactiveedmore');

              $(this).removeClass('inactiveedmore').addClass('activeedmore');

             });

         })

      </script>











       <script type="text/javascript">

         var blank_outcome = jQuery('#blank_outcome_field').html();

         

         

         jQuery(document).ready(function() {

         

           jQuery('#blank_outcome_field').hide();

         

         

         });

         

         function appendOutcome() {

         

          



             







            $(document).ready(function() {

           //$('.timepicker1').timepicker();

       

         

           $('.basicExample').timepicker();

             var lat = -33.8688,

                 lng = 151.2195,

                 latlng = new google.maps.LatLng(lat, lng),

                 image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png'; 

                  

             var mapOptions = {           

                     center: new google.maps.LatLng(lat, lng),           

                     zoom: 13,           

                     mapTypeId: google.maps.MapTypeId.ROADMAP         

                 },

                 map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),

                 marker = new google.maps.Marker({

                     position: latlng,

                     map: map,

                     icon: image

                  });

         

                 var options = {

                   componentRestrictions: {country: "in"}

                  };

            

             var input = document.getElementById('location'); 

             var autocomplete = new google.maps.places.Autocomplete(input,options);   

         

             var place = autocomplete.getPlace(); 





              var input4 = document.getElementById('location4');

             var autocomplete4 = new google.maps.places.Autocomplete(input4,options);   

         

             var place4 = autocomplete.getPlace();   





            //document.getElementById('city2').value = place.name;

      





             

             autocomplete.bindTo('bounds', map); 

             var infowindow = new google.maps.InfoWindow(); 

          

             google.maps.event.addListener(autocomplete, 'place_changed', function() {

                 infowindow.close();

                 var place = autocomplete.getPlace();

                  document.getElementById('lat').value = place.geometry.location.lat();

                  document.getElementById('lang').value = place.geometry.location.lng();

                 if (place.geometry.viewport) {

                     map.fitBounds(place.geometry.viewport);

                 } else {

                     map.setCenter(place.geometry.location);

                     map.setZoom(17);  

                 }

                 

                 moveMarker(place.name, place.geometry.location);

             });  

             

             $("#location").focusin(function () {

                 $(document).keypress(function (e) {

                     if (e.which == 13) {

                         infowindow.close();

                         var firstResult = $(".pac-container .pac-item:first").text();

                         

                         var geocoder = new google.maps.Geocoder();

                         geocoder.geocode({"address":firstResult }, function(results, status) {

                             if (status == google.maps.GeocoderStatus.OK) {

                                 var lat = results[0].geometry.location.lat(),

                                     lng = results[0].geometry.location.lng(),

                                     placeName = results[0].address_components[0].long_name,

                                     latlng = new google.maps.LatLng(lat, lng);

                                    

                                 moveMarker(placeName, latlng);

                                 $("#location").val(firstResult);

                                 

                             }

                         });

                     }

                 });

             }); 

             

                 jQuery('#outcomes_area').append(blank_outcome);

              

            function moveMarker(placeName, latlng){

               marker.setIcon(image);

               marker.setPosition(latlng);

               infowindow.setContent(placeName);

               infowindow.open(map, marker);

            }

           

         });





        

         }

         

         function removeOutcome(outcomeElem) {

         

           jQuery(outcomeElem).parent().parent().remove();

         

         }

         

      </script>





      <style>

         .btns{color:black}

         .activeedmore{background:#fdc400;

         color: rgb(255 255 255);

         }

         .inactiveedmore{background:white}

      </style>

      <script type="text/javascript">

         $(document).ready(function() {

           //$('.timepicker1').timepicker();

           $('.basicExample').timepicker();

             var lat = -33.8688,

                 lng = 151.2195,

                 latlng = new google.maps.LatLng(lat, lng),

                 image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png'; 

                  

             var mapOptions = {           

                     center: new google.maps.LatLng(lat, lng),           

                     zoom: 13,           

                     mapTypeId: google.maps.MapTypeId.ROADMAP         

                 },

                 map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),

                 marker = new google.maps.Marker({

                     position: latlng,

                     map: map,

                     icon: image

                  });

         

                 var options = {

                   componentRestrictions: {country: "in"}

                  };

              

             var input = document.getElementById('location'); 

             var autocomplete = new google.maps.places.Autocomplete(input,options);   

         

             var place = autocomplete.getPlace(); 





             // third masp





                    var input3 = document.getElementById('location3');

             var autocomplete3 = new google.maps.places.Autocomplete(input3,options);   

         

             var place3 = autocomplete.getPlace();    





 





                    //second map data  

             var input1 = document.getElementById('location1');

             var autocomplete1 = new google.maps.places.Autocomplete(input1,options);   

         

             var place1 = autocomplete.getPlace();         

             

            //document.getElementById('city2').value = place.name;

      





             

             autocomplete.bindTo('bounds', map); 

             var infowindow = new google.maps.InfoWindow(); 

          

             google.maps.event.addListener(autocomplete, 'place_changed', function() {

                 infowindow.close();

                 var place = autocomplete.getPlace();

                  document.getElementById('lat').value = place.geometry.location.lat();

                  document.getElementById('lang').value = place.geometry.location.lng();

                 if (place.geometry.viewport) {

                     map.fitBounds(place.geometry.viewport);

                 } else {

                     map.setCenter(place.geometry.location);

                     map.setZoom(17);  

                 }

                 

                 moveMarker(place.name, place.geometry.location);

             });  

             

             $("#location").focusin(function () {

                 $(document).keypress(function (e) {

                     if (e.which == 13) {

                         infowindow.close();

                         var firstResult = $(".pac-container .pac-item:first").text();

                         

                         var geocoder = new google.maps.Geocoder();

                         geocoder.geocode({"address":firstResult }, function(results, status) {

                             if (status == google.maps.GeocoderStatus.OK) {

                                 var lat = results[0].geometry.location.lat(),

                                     lng = results[0].geometry.location.lng(),

                                     placeName = results[0].address_components[0].long_name,

                                     latlng = new google.maps.LatLng(lat, lng);

                                    

                                 moveMarker(placeName, latlng);

                                 $("#location").val(firstResult);

                                 

                             }

                         });

                     }

                 });

             }); 

             

             

              

            function moveMarker(placeName, latlng){

               marker.setIcon(image);

               marker.setPosition(latlng);

               infowindow.setContent(placeName);

               infowindow.open(map, marker);

            }

           

         });

         

          

      </script>

     

   </body>

</html>