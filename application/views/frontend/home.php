<!DOCTYPE html>

<html class="no-js" lang="zxx">

   <head>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <meta name="description" content="">

      <meta name="keywords" content="">

      <meta name="robots" content="index,follow">

      <title>Satrango </title>

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

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

      

      </div>

   </head>

   <body class="blue-skin">

      <!-- ======================= Start Navigation ===================== -->

      <?php  $this->load->view('frontend/navbar'); ?>

      <!-- ======================= End Navigation ===================== -->

      <!-- ======================= Start Freelancer Banner ===================== -->



      <div class="freelancer banner" style="background:url(<?php echo base_url()?>assetsfront/img/trans-bg.png) no-repeat">

         <div class="container">

            <div class="col-md-6 col-sm-6">

               <div class="caption">

                  <h2>Find Perfect Jobs</h2>

                  <p>Grow your business with the top freelancing website.</p>

                  <form method="post" action="<?=base_url()?>Home/search_filter">

                     <div class="input-group">

                        <input type="text" name="keyword" id="search" class="form-control no-br" placeholder="What type of services do you need?" required="">

                        <span class="input-group-btn">

                        <button  class="btn banner-btn" type="submit">Find Services</button>

                        </span>

                     </div>

                  </form>

               </div>

            </div>

            <div class="col-lg-6 col-md-6">  

               <img src="<?php echo base_url()?>assetsfront/img/jb-4.png" class="img-responsive" alt="" />

            </div>

         </div>

      </div>

      <form method="post" action="" id="getLocation">

          <input type="hidden" name="lat" id="lat" required value="">

      <input type="hidden" name="lang" id="lang" required value="">

      </form>

     

      <!-- ======================= End Banner ===================== -->

      <!-- ================= Employer & Candidate Register Area ========================= -->

      <section>

         <div class="container">

            <?php if(count($offers) ==0):?>

               <!-- <h6>NO  Letest Offers</h6> -->

               <?php else: ?>

               <?php foreach($offers AS $offfer):?>

               

               <div class="row">

               <div class="col-md-12">

                  <div class="heading">

                     <h4>All Latest <span class="theme-cl">Offers</span></h4>

                     <p>Get offers to used services on every occasion.</p>

                  </div>

               </div>

            </div>



            <div class="employer-slide">

               

               <div class="employer-widget">

                  <img class="img-responsive" src="<?php echo base_url ()?>assets/media/users/<?php echo $offfer->banner; ?>" alt="" style="height: 200px;">    

               </div>



                  

            </div>

           

             <?php endforeach; ?>

               <?php endif; ?>

            

            <!-- ////////////////////////end //////////////////////////-->

            <br>

            <div class="tab-content">

              

               <div class="tab-pane fade in show active" id="recent" role="tabpanel">

                  <div class="row">

                     <div class="col-md-12">

                        <div class="heading">

                           <h4>All <span class="theme-cl">Services List</span></h4>

                           <p>Each services,belongs to categories used services applications every day.</p>

                        </div>

                     </div>

                  </div>

                  <div class="row">

                     <?php foreach($services AS $row):?>

                     <div class="col-md-4 col-sm-6">

                     <div class="blog-box blog-grid-box">

                        <div class="blog-grid-box-img">

                           <img src="<?php echo base_url()?>assets/media/users/<?=$row->icon;?>" class="img-responsive" alt="" />

                        </div>

                        <div class="blog-grid-box-content">

                        <div class="blog-avatar text-center">

                           

                        </div><br><br>

                        <!-- <?php echo $row->id;?> -->

                       

                        <p style="color:#003286;"><strong><?=ucwords($row->name);?></strong></p>

                     <a href="<?=base_url()?>Home/vendors/<?=$row->id;?>" class="theme-cl" title="Read More..">Continue...</a>

                  </div>

                        

                  </div>

                  </div>

                     

                     <?php endforeach;?>

                     <br>

                     <div class="col-md-12 mrg-top-40">

                        <div class="text-center">

                           <a href="<?php echo base_url()?>Home/services" class="btn theme-btn btn-m"> More Services </a>

                        </div>

                     </div>

                  </div>

               </div>

               <br>

               <br>



              <div class="row">

               <div class="col-md-12">

                  <div class="heading">

                     <h4>Browse By <span class="theme-cl">Category</span></h4>

                     <p>Each services,belongs to categories used services applications every day.</p>

                  </div>

               </div>

            </div>

            

            <div class="row">

               

                <?php foreach($category AS $row):?>

               <div class="col-md-4 col-sm-6">

                  <a href="<?=base_url();?>Home/category_service/<?=$row->id;?>">

                  <div class="blog-box blog-grid-box">

                     <div class="blog-grid-box-img">

                        <img class="img-responsive" src="<?php echo base_url()?>assets/media/users/<?=$row->icon;?>" alt="">

                     </div>

                     

                     <div class="blog-grid-box-content">

                        

                        <h4 style="text-align: center;"><a href="<?=base_url();?>Home/category_service/<?=$row->id;?>"><?=$row->name;?></a></h4>

                      

                       

                        <a href="<?=base_url();?>Home/category_service/<?=$row->id;?>" class="theme-cl" title="Read More..">Continue...</a>

                    

                     </div>

                     

                  </div>

               </a>

               </div>

               

               <?php endforeach;?>

            

              

            </div>

               

               <br>

               <br>



               <div class="row">

               <div class="col-md-12">

                  <div class="heading">

                     <h4>Registered <span class="theme-cl">Vendor List</span></h4>

                     <p>All registered vendor list belogs to multiple services we can hire needed serviecs.</p>

                  </div>

               </div>

               </div>

               <div class="row">

                  <?php foreach($popular AS $row):?>

                  <div class="col-md-4 col-sm-6">

                     <div class="blog-box blog-grid-box">

                        <div class="blog-grid-box-img">

                           <img src="<?=base_url()?>assets/uploaded/users/<?=$row->vendor_image;?>" class="img-responsive" alt="" />

                        </div>

                        <div class="blog-grid-box-content">

                        <div class="blog-avatar text-center">

                           

                        </div>

                        <p><strong></strong> <span class="theme-cl"></span></p><br>

                        <p><br><span style="color:#003286;font-weight: 700;" class="theme-cl"><?=ucwords($row->vendor_name);?></span></p>

                        

                        <p><i class="fa fa-map-marker" style="color: #126fb1;"></i> <?=$row->address;?></p>

                        <div class="">

                        <span style="color: #FFD700; font-size:15px;" class="<?php if ($row->rating >= 1) {

                           echo 'fa fa-star';

                           }else{ echo 'fa fa-star-o';} ?>"></span>

                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=2) {

                           echo 'fa fa-star';

                           }else{ echo 'fa fa-star-o'; } ?>" ></span>

                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=3) {

                           echo 'fa fa-star';

                           }else{ echo 'fa fa-star-o';} ?>"></span>

                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=4) {

                           echo 'fa fa-star';

                           }else{ echo 'fa fa-star-o'; } ?>" ></span>

                        <span style="color: #FFD700;font-size:15px;" class="<?php if ($row->rating >=5) {

                           echo 'fa fa-star';

                           }else{ echo 'fa fa-star-o'; } ?>">

                        </span>

                     </div>

                     <a href="#" class="theme-cl" title="Read More..">Continue...</a>

                  </div>

                        

                  </div>

                  </div>



                  <!-- Single Job -->

                  <?php endforeach;  ?>

                  <br>

                  <div class="col-md-12 mrg-top-40">

                     <div class="text-center">

                        <a href="<?php echo base_url()?>Home/popular_hired" class="btn theme-btn btn-m">More Sub Services</a>

                     </div>

                  </div>

               </div>

            </div>

            

         </div>

         <!-- Featured Offers -->

            <div class="row">

                     <div class="col-md-12">

                        <div class="heading">

                           <h4>All <span class="theme-cl">Offers</span></h4>

                           <p>Each services,belongs to categories used services applications every day.</p>

                        </div>

                     </div>

                  </div>

               <div class="employer-slide">

               

               <?php if(count($offers_all) == 0):?>

               <?php echo "NO offers_all"; ?>

               <?php else: ?>

               <?php foreach($offers_all AS $offers_alls):?>

               <div class="employer-widget">

                  <img class="img-responsive" src="<?php echo base_url ()?>assets/media/users/<?php echo $offers_alls->banner; ?>" alt="" style="height: 200px;">

                  

               </div>

               <?php endforeach; ?>

               <?php endif; ?>

            </div>

         </div>

      </section>

      <!-- ======================= All Jobs ==================================== -->

      <!-- ================= footer start ========================= -->

      <?php  $this->load->view('frontend/footer'); ?>

      <!-- Apply Job Popup -->

      <?php  $this->load->view('frontend/login'); ?>



      <!-- Jquery js-->

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



      <script>

         AOS.init();

      </script>



      <script type="text/javascript">

      $(function() { 

         window.onload = getLocation; 

         var geo = navigator.geolocation; 

         function getLocation() { 

            if (geo) { geo.getCurrentPosition(displayLocation); 

            } else { 

               alert("Oops, Geolocation API is not supported"); 

            } 

         } 

         function displayLocation(position) { 

         var lat = position.coords.latitude; 

         var lang = position.coords.longitude; 

         document.getElementById('lat').value = lat; 

         document.getElementById('lang').value = lang;



         if ($('#lat').val() && $('#lang').val()){ 

            $.ajax({

              data: {lat: lat,lang:lang},

              type: "post",

              url: "<?= base_url();?>Home/index",

               success: function(data){

                  // alert(lat);

                  // alert(lang);

                  // if (data.lat) {

                  //   alert(lat);

                  // }

              }

            })



         }

      



      }



       

   });



   </script>

     

      <script type="text/javascript">

         $(document).ready(function(){

         

             $('#login-form').validate({ 

                 rules: {

                     mobile_email: {

                         required: true,

                     },

                     password: {

                         required: true,

                     },

                 },

                 messages: {

                    mobile_email: {

                        required: "Enter email or Mobile",

                    },

                    password: {

                        required: "Enter password",

                    },

                },

               submitHandler: function(form) 

                {

                    $.ajax({

                        url: "<?= base_url(); ?>LoginRegistration/login", 

                        type: "POST",             

                        data: $(form).serialize(),

                        cache: false,             

                        processData: false, 

                        dataType: "json", 

                        success: function(data) 

                        {

                           if(data.result){

                              var x = data.msg; 

                              var su = x.fontcolor("green");

                                        document.getElementById("demo").innerHTML = su;

                              $.toaster({ priority : 'success', title : 'Success', message : data.msg });

         

                              setTimeout(function(){ 

                                              

                                 

                                 window.location.href = "<?php echo base_url() ?>Home/Login_type";

                              }, 1000);

                           }else{

                              var x = data.msg; 

                              var su = x.fontcolor("red");

                                        document.getElementById("demo").innerHTML = su;

                              $.toaster({ priority : 'danger', title : 'Error', message : data.msg });

                           }

                        }

                    });

                    return false;

                },

             });

         });   

      </script>

      <!-- auti -->

      <script type="text/javascript">

         $(function() {

            

            $( "#search" ).autocomplete({



              source: '<?php echo base_url('Home/getall_services_autocomplete'); ?>',

            });

            // alert(source);

         });

      </script>

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

      <!-- end auto -->

      <!-- Bootstrap Css -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

      <script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>

      <?php if($this->session->userdata('Id') == 0): ?>  

      <script type="text/javascript">

         $(window).on('load', function() {

             $('#signin').modal('show');

         });

      </script>





      <?php endif; ?>

   </body>

</html>