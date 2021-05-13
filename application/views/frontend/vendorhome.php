
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
    
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="<?php echo base_url()?>assetsfront/css/clock.css" rel="stylesheet">

    </head>
    
    <body class="green-skin">
        
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

    <!-- <div class="page-title light" style="background:url(<?php echo base_url()?>assetsfront/img/slider-2.jpg);">
            <div class="container">
                <div class="page-caption">
                    <h2></h2>
                </div>
            </div>
        </div> -->

    <br>
    <br>
    <br>
    <section class="gray">
			<div class="container">
				



                <!-- row -->


                
                <div class="row">
                            <h4>Leader board</h4>
                            <br>
                            <br>
                            <div class="text-right">
                            <a class="btn theme-btn btn-m" href="<?php echo base_url(); ?>VendorHome/leaderboard">View more</a>
                      
                      </div>
                       <?php $i= 1;
                       foreach($category AS $row):?>
                            <!-- Single Job -->
                            <div class="col-lg-4 col-md-4 col-sm-4">

                                <div class="clearfix content-heading">
                         <img  class="pull-left" src="<?php echo base_url()?>assets/media/users/<?=$row->image;?>" alt="" style="height: 50px; width: 50px; ">

                          <p>#<?php echo $i ?></p>
                            <p><?php echo ucwords($row->fname) ?></p>
                             </div>
                         <div>
                          </div>
                            </div>

                                    
                            <?php $i++; ?>
                             <?php endforeach;  ?>
                            <br>
                            
                            
                        </div>
                
				<!-- row -->
                <br>
                <br>
				<div class="row">
				
					<div class="col-md-12 col-sm-12">
						
						<h4>upcoming Bookings</h4>
                        <br>
                            <br>
                            <div class="text-right">
                            <a class="btn theme-btn btn-m" href="#">View more</a>
                      
                      </div>
				 <?php if($booking_list == ''): ?>
                <h5><?php echo " No  Booking  Available "; ?> </h5>
                <?php else:?>

             <?php foreach($booking_list AS $row):?>
						<!-- Single Verticle job -->
						<div class="job-verticle-list">
							<div class="vertical-job-card">
								<div class="vertical-job-body">
									<div class="row">
										<div class="col-md-4 col-sm4">
											
											<br>
											 <p> Scheduled in : </p>
											 <p> Location : </p>

										</div>
										<div class="col-md-4 col-sm-4">
											<div class="vrt-job-act">
												
												<p>2 Days 2 Hrs</p>
											
												</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="vrt-job-act">
												<p class="price">₹139</p>
												<p >Benz Circle, Vijayawada</p>
												
												</div>
										</div>
									</div>
								</div>
								<div class="vertical-job-footer">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cmp-job-rating">
												
                                 <p>Being a Blue collar Job this needs to be uniquely coloured so that users can easily understand </p>






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
						
						
						
               <?php endforeach;  ?>
           <?php endif; ?>

						
					</div>
					
				</div>
				<!-- End Row -->


                <!--  start row -->
              <br>
              <br>
                <div class="row">
                
                    <div class="col-md-12 col-sm-12">

                        <h4>Hot Jobs </h4>
                        <br>
                            <br>
                            <div class="text-right">
                            <a class="btn theme-btn btn-m" href="#">View more</a>
                      
                      </div>
                        <div class="col-md-4 col-sm4">

                        </div>
                        </div>
                        </div>

                        <!-- end row  -->
                        
                <!--  start row -->
              <br>
              <br>
                <div class="row">
                
                    <div class="col-md-12 col-sm-12">

                        <h4>Training</h4>
                        <br>
                            <br>
                            <div class="text-right">
                            <a class="btn theme-btn btn-m" href="#">View more</a>
                      
                      </div>
                        <div class="col-md-4 col-sm4">

                        </div>
                        </div>
                        </div>

                        <!-- end row  -->
                        


			</div>
		</section>
		
		<!-- ====================== End Job Detail 2 ================ -->


<!-- model popup -->

 <section class="gray">
            <div class="container">
                
                <!-- row -->
                <div class="row">
                    <!-- Start Sidebar -->
                    
                
                    <div class="col-md-6 col-sm-6">
                    
                
                <span id='red'></span>
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3, 0);?>" id="id">
                 <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="myModalLabel1">
                    <div class="modal-body">
                        <div class="tab-content"> 
                             <div class="tab-pane fade in show active" id="vendor" role="tabpanel" style="">
                                
                                
                                <div class="page" style="text-align :center; background:url(<?php echo base_url();?>assets/media/getbookimgrequest.png); background-repeat: no-repeat;">
                                    <h4 style="color:#55b537"><u>New Booking Request</u></h4>
                                    <br>
                                  <!-- <h6 style="text-align :center;">Please Wait ...</h6>   -->                
                                <b style="color :#fa9500">Date & Time</b> 
                                <p id="booking_date"></p>
 
                                <b style="color :#fa9500">Location</b>
                                <p id="start_location1"></p>
                                <b>Work</b>
                                <p id="work_description"></p>
                                <div class="circles-container">
                                   <div id="circle-1" data-circle-dialWidth=10 data-circle-skin="yellow">
                            <div class="loader-bg">
                                <!-- <div class="text">00:00:00</div> -->
                                <div><span id="time"> 03:00</span></div>
                            </div>
                        </div>
                        </div>
                  <a href="<?php echo base_url();?>MyAccount/reject" class="btn btn-default button-radious"style="margin-right: 90px; border: 2px solid; border-color: #55b537; color:#55b537">
                        Reject
                      </a>
                   <a href="<?php echo base_url();?>MyAccount" class="btn btn-success button-radious">Accept</a>
                    </div>
                                                
                    
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
                <!-- <h1>Please wait for booking<span id="time"> 03:00</span></h1>
                <h6><span id="hodm_results"></span></h6> -->

                

    

                    </div>
                    
                    
                    </div>
                
            </div>
        </section>


      <!-- ///////////////// reject model ///////////////////// -->


     

		
		<!-- ================= footer start ========================= -->
		
		
		<!-- Sign Up Window Code -->
		 
		<!-- End Sign Up Window -->
		
		<!-- Apply Job Popup -->
		 


    <!-- end main  -->
    <?php  $this->load->view('frontend/footer'); ?>
    <?php  $this->load->view('frontend/login'); ?>
        
         
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
	

	 	
     <script type="text/javascript">
    


     $('#exampleModal').on('hidden.bs.modal', function (e) {
   $('#booking').modal('show');
   

})
     </script>

   <script>
 

function myFunctiondddd() {
 var id = "<?php echo $this->session->userdata('Id') ?>";



$.ajax({
        type: "POST",
        url: "<?= base_url();?>MyAccount/checkbooking_status",
        data: {id: id},
        processData: true, 
        dataType: "json",
        success: function(data) {
           
           
           if(data.job_status == "Pending"){
            
             $('#booking').modal('show');

             var booking_date =data.booking_date;
           document.getElementById("booking_date").innerHTML = booking_date;
            
          var start_location1 =data.start_location1;
              // var start_location1 = moment(data.start_location1, "YY/MM/DD").format("DD/MM/YY");
           document.getElementById("start_location1").innerHTML = start_location1;
           
             var work_description =data.work_description;
           document.getElementById("work_description").innerHTML = work_description;
            
           }
            else{
                
           }   
        }
  
});
}

$(function(){
setInterval(myFunctiondddd, 3000);
});


</script>


<script>
    //define your time in second
    var c=180;
   
        var t;
        timedCount();

        function timedCount()
        {

            var hours = parseInt( c / 3600 ) % 24;
            var minutes = parseInt( c / 60 ) % 60;
            var seconds = c % 60;
            

            var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

             if(c<0)
           {
               $('#time').html("No Booking"); 
           }
           else
           {
            $('#time').html(result);
            if(c == 0 )
            {
                
                 
                window.location="";
                if (window.confirm('Your booking is not accept?'))
              {
                     window.location.href = "<?php echo base_url() ;?>/Home/search_filter";
                   }
               else
                 {
                  no
               }
            }

           
            c = c - 1;
            t = setTimeout(function()
            {
             timedCount()
            },
            1000);
        }
        }


  
    </script>
     
  <script type="text/javascript">
  $(document).ready(function() {
    $("#circle-1").Circlebar({
        maxValue: 180,
        fontSize: "14px",
        triggerPercentage: true
    });
    var t2 = new Circlebar({
        element: ".circle-2",
        maxValue: 152,
        dialWidth: 40,
        fontColor: "#777",
        fontSize: "30px",
        skin: "fire",
        type: "progress"
    });

    new Circlebar({
        element: "#circle-3",
        maxValue: 230,
        size: "240px",
        fontSize: "30px",
        type: "progress"
    });
    var prefs = {
        element: ".circlebar"
    };
    $('.circlebar').each(function() {
        prefs.element = $(this);
        new Circlebar(prefs);
    });

   
});

function Circlebar(prefs) {
    this.element = $(prefs.element);
    this.element.append('<div class="spinner-holder-one animate-0-25-a"><div class="spinner-holder-two animate-0-25-b"><div class="loader-spinner" style=""></div></div></div><div class="spinner-holder-one animate-25-50-a"><div class="spinner-holder-two animate-25-50-b"><div class="loader-spinner"></div></div></div><div class="spinner-holder-one animate-50-75-a"><div class="spinner-holder-two animate-50-75-b"><div class="loader-spinner"></div></div></div><div class="spinner-holder-one animate-75-100-a"><div class="spinner-holder-two animate-75-100-b"><div class="loader-spinner"></div></div></div>');
    this.value, this.maxValue, this.counter, this.dialWidth, this.size, this.fontSize, this.fontColor, this.skin, this.triggerPercentage, this.type, this.timer;
    // var attribs = this.element.find("div")[0].parentNode.dataset;
    var attribs = this.element[0].dataset,
    that = this;
    this.initialise = function() {
        that.value = parseInt(attribs.circleStarttime) || parseInt(prefs.startTime) || 0;
        that.maxValue = parseInt(attribs.circleMaxvalue) || parseInt(prefs.maxValue) || 60;
        that.counter = parseInt(attribs.circleCounter) || parseInt(prefs.counter) || 1000;
        that.dialWidth = parseInt(attribs.circleDialwidth) || parseInt(prefs.dialWidth) || 5;
        that.size = attribs.circleSize || prefs.size || "150px";
        that.fontSize = attribs.circleFontsize || prefs.fontSize || "20px";
        that.fontColor = attribs.circleFontcolor || prefs.fontColor || "rgb(135, 206, 235)";
        that.skin = attribs.circleSkin || prefs.skin || " ";
        that.triggerPercentage = attribs.circleTriggerpercentage || prefs.triggerPercentage || false;
        that.type = attribs.circleType || prefs.type || "timer";


        that.element.addClass(that.skin).addClass('loader');
        that.element.find(".loader-bg").css("border-width", that.dialWidth + "px");
        that.element.find(".loader-spinner").css("border-width", that.dialWidth + "px");
        that.element.css({ "width": that.size, "height": that.size });
        that.element.find(".loader-bg .text")
        .css({ "font-size": that.fontSize, "color": that.fontColor });
    };
    this.initialise();
    this.renderProgress = function(progress) {
        progress = Math.floor(progress);
        var angle = 0;
        if (progress < 25) {
            angle = -90 + (progress / 100) * 360;
            that.element.find(".animate-0-25-b").css("transform", "rotate(" + angle + "deg)");
            if (that.triggerPercentage) {
                that.element.addClass('circle-loaded-0');
            }

        } else if (progress >= 25 && progress < 50) {
            angle = -90 + ((progress - 25) / 100) * 360;
            that.element.find(".animate-0-25-b").css("transform", "rotate(0deg)");
            that.element.find(".animate-25-50-b").css("transform", "rotate(" + angle + "deg)");
            if (that.triggerPercentage) {
                that.element.removeClass('circle-loaded-0').addClass('circle-loaded-25');
            }
        } else if (progress >= 50 && progress < 75) {
            angle = -90 + ((progress - 50) / 100) * 360;
            that.element.find(".animate-25-50-b, .animate-0-25-b").css("transform", "rotate(0deg)");
            that.element.find(".animate-50-75-b").css("transform", "rotate(" + angle + "deg)");
            if (that.triggerPercentage) {
                that.element.removeClass('circle-loaded-25').addClass('circle-loaded-50');
            }
        } else if (progress >= 75 && progress <= 100) {
            angle = -90 + ((progress - 75) / 100) * 360;
            that.element.find(".animate-50-75-b, .animate-25-50-b, .animate-0-25-b")
            .css("transform", "rotate(0deg)");
            that.element.find(".animate-75-100-b").css("transform", "rotate(" + angle + "deg)");
            if (that.triggerPercentage) {
                that.element.removeClass('circle-loaded-50').addClass('circle-loaded-75');
            }
        }
    };
    this.textFilter = function() {
        var percentage = 0,
        date = 0,
        text = that.element.find(".text");
        if (that.type == "timer") {
            that.timer = setInterval(function() {
                if (that.value < that.maxValue) {
                    that.value += parseInt(that.counter / 1000);
                    percentage = (that.value * 100) / that.maxValue;
                    that.renderProgress(percentage);
                    text[0].dataset.value = that.value;
                    date = new Date(null);
                    date.setSeconds(that.value); // specify value for seconds here
                    text.html(date.toISOString().substr(11, 8));
                } else {
                    clearInterval(that.timer);
                }
            }, (that.counter));
        }
        if (that.type == "progress") {
            function setDeceleratingTimeout(factor, times) {
                var internalCallback = function(counter) {
                    return function() {
                        if (that.value < that.maxValue && that.value < 100) {
                            that.value += 1;
                            that.renderProgress(that.value);
                            text[0].dataset.value = that.value;
                            text.html(Math.floor(that.value) + "%");
                            setTimeout(internalCallback, ++counter * factor);
                        }
                    }
                }(times, 0);
                setTimeout(internalCallback, factor);
            };
            setDeceleratingTimeout(0.1, 100);
        }
    }
    this.textFilter();
    this.setValue = function(val) {
        text = that.element.find(".text");
        that.value = val;
        that.renderProgress(that.value);
        text[0].dataset.value = that.value;
        text.html(that.value);
    }
}

(function($) {
    $.fn.Circlebar = function(prefs) {
        prefs.element = this[0];
        new Circlebar(prefs);
    };
})(jQuery);
</script>
    </body>




<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>