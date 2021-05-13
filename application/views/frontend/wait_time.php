
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
                    <h2>Booking</h2>
                </div>
            </div>
        </div>

    <br>
   
    <section class="gray">
            <div class="container">
                
                <!-- row -->
                <div class="row">
                    <!-- Start Sidebar -->
                    
                
                    <div class="col-md-12 col-sm-12">
                    
                
                <span id='red'></span>
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3, 0);?>" id="id">
                 <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="myModalLabel1">
                    <div class="modal-body">
                        <div class="tab-content"> 
                             <div class="tab-pane fade in show active" id="vendor" role="tabpanel">
                                
                                
                                <div class="page">
                                  <h6 style="text-align :center;">Please Wait ...</h6>                  
                               
                                <div class="circles-container">
                                   <div id="circle-1" data-circle-dialWidth=10 data-circle-skin="yellow">
                            <div class="loader-bg">
                                <!-- <div class="text">00:00:00</div> -->
                                <div><span id="time"> 03:00</span></div>
                            </div>
                        </div>
                    
                        </div>
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
        
        <!-- ====================== End Job Detail 2 ================ -->       
        
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


<script>
 

function myFunction() {
 var id = document.getElementById("id").value;


$.ajax({
        type: "POST",
        url: "<?= base_url();?>Home/checkbooking_status",
        data: {id: id},
        processData: true, 
        dataType: "json",
        success: function(data) {

           
           if(data.job_status == "Inprogress"){
            // alert("your booking is Inprogress");
            if (window.confirm('your booking is Inprogress'))
              {
                     window.location.href = "<?php echo base_url() ;?>Home/payment";
                   }
               else
                 {
              window.location.href = "<?php echo base_url() ;?>Home";

               }

            
           }
           else if(data.job_status == "Complete"){
            
             alert("your booking is Complete");

           } else if(data.job_status == "Upcoming"){
              if (window.confirm('your booking is Upcoming'))
              {

                     window.location.href = "<?php echo base_url() ;?>Home/payment";
                   }
               else
                 {
              window.location.href = "<?php echo base_url() ;?>Home";


               }

           }
           else if(data.job_status == "Cancel"){
            // alert("your booking is Cancel");


             if (window.confirm('your booking is Cancel'))
              {
                    window.location.href = "<?php echo base_url() ;?>Home";
                   }
               else
                 {
                 window.location.href = "<?php echo base_url() ;?>Home";

               }
           }
           else if(data.job_status == "Pending"){
            
                 $('#booking').modal('show');
         

           }
            else{
                
           }   
        }
  
});
}

$(function(){
setInterval(myFunction, 3000);
});


</script>

     <script type="text/javascript">
    // $(window).on('load', function() {
    //     $('#booking').modal('show');
    // });
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
<style type="text/css">body{margin:0;}
.page {
  width: 100%;
  background:#ffffff;
    body {
    margin: 0;
}
.page {
    width: 100%;
    background: #000;
}
.page > h1 {
    font-weight: 300 !important;
    color: #fff;
    font-size: 34px;
    margin: 0;
}
.circles-container {
    min-height: 300px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    background:#ffffff;
}
.loader {
    position: relative;
    user-select: none;
    box-sizing: border-box;
    width: 150px;
    height: 150px;
}
.loader-bg {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    box-sizing: border-box;
    border: 5px solid #eeeeee;
    display: flex;
    align-items: center;
    justify-content: center;
}
.spinner-holder-one {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 50%;
    height: 50%;
    background: transparent;
    box-sizing: border-box;
}
.spinner-holder-two {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 100%;
    height: 100%;
    background: transparent;
    box-sizing: border-box;
}
.loader-spinner {
    width: 200%;
    height: 200%;
    border-radius: 50%;
    border: 5px solid rgb(135, 206, 235);
    box-sizing: border-box;
}
.animate-0-25-a {
    transform: rotate(90deg);
    transform-origin: 100% 100%;
}
.animate-0-25-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.animate-25-50-a {
    transform: rotate(180deg);
    transform-origin: 100% 100%;
}
.animate-25-50-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.animate-50-75-a {
    transform: rotate(270deg);
    transform-origin: 100% 100%;
}
.animate-50-75-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.animate-75-100-a {
    transform: rotate(0deg);
    transform-origin: 100% 100%;
}
.animate-75-100-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.text {
    text-align: center;
    font-size: 20px;
    color: rgb(135, 206, 235);
    font-weight: bold;
}
.blue .loader-bg {
    border-color: rgba(255, 255, 255, 0.1);
    box-shadow: inset 2px 2px 20px 0 rgba(0, 0, 0, 0.1) !important;
}
.blue .text {
    font-size: 20px;
    color: #3ba8b6 !important;
}
.blue .loader-spinner {
    border-color: #3ba8b6;
}
.blue.circle-loaded-75 .text {
    color: #57a3d8 !important;
}
.blue.circle-loaded-75 .loader-spinner {
    border-color: #57a3d8;
}
.cobalt .loader-bg {
    border-color: #ccc;
    /*box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.4) !important;*/
}
.cobalt .text {
    font-size: 20px;
    color: #333 !important;
}
.cobalt .loader-spinner {
    border-color: #333;
}
.fire .loader {
}
.fire .loader-bg {
    border-color: #333;
    box-shadow: inset 2px 2px 20px 0 rgba(0, 0, 0, 0.4);
}
.fire .text {
    font-size: 20px;
    color: #ee4230 !important;
}
.fire .loader-spinner {
    border-color: #ee4230;
}
.fire.circle-loaded-75 .text {
    color: #c6594e !important;
}
.fire.circle-loaded-75 .loader-spinner {
    border-color: #c6594e;
}
.matte .loader-bg {
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow: 2px 2px 20px 0 rgba(0, 0, 0, 0.6);
}
.matte .text {
    color: rgba(20, 20, 20) !important;
    font-weight: bold;
}
.matte .loader-spinner {
    border-color: rgba(20, 20, 20);
}
.purple .loader-bg {
    border-color: rgba(255, 255, 255, 0.1);
    box-shadow: inset 2px 2px 20px 0 rgba(0, 0, 0, 0.1) !important;
}
.purple .text {
    font-size: 20px;
    color: #7b708d !important;
}
.purple .loader-spinner {
    border-color: #7b708d;
}
.purple.circle-loaded-75 .text {
    color: #a186ce !important;
}
.purple.circle-loaded-75 .loader-spinner {
    border-color: #a186ce;
}
.loader-bg {
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow: 2px 2px 20px 0 rgba(0, 0, 0, 0.6);
}
.text {
    color: rgb(135, 206, 235) !important;
    font-weight: bold;
}
.loader-spinner {
    border-color: rgb(135, 206, 235);
}
.white .loader-bg {
    border-color: rgba(255, 255, 255, 0.1);
    box-shadow: inset 2px 2px 20px 0 rgba(0, 0, 0, 0.1) !important;
}
.white .text {
    font-size: 20px;
    color: #fff !important;
}
.white .loader-spinner {
    border-color: #fff;
}
.white.circle-loaded-75 .text {
    color: #ddd !important;
}
.white.circle-loaded-75 .loader-spinner {
    border-color: #ddd;
}
.yellow .loader-bg {
    border-color: rgba(255, 255, 255, 0.1);
    box-shadow: inset 2px 2px 20px 0 rgba(0, 0, 0, 0.1) !important;
}
.yellow .text {
    font-size: 20px;
    color: #003286 !important;
}
.yellow .loader-spinner {
    border-color: #003286;
}
.yellow.circle-loaded-75 .text {
    color: #ffeb3b !important;
}
.yellow.circle-loaded-75 .loader-spinner {
    border-color: #ffeb3b;
}

}
.page > h1 {
  font-weight: 300 !important;
  color: #fff;
  font-size:34px;
  margin:0;
}
.circles-container {
  min-height: 300px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.loader {
    position: relative;
    user-select: none;
    box-sizing: border-box;
    width: 150px;
    height: 150px;
}
.loader-bg {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    box-sizing: border-box;
    border: 5px solid #eeeeee;
    display: flex;
    align-items: center;
    justify-content: center;
}
.spinner-holder-one {
    position: absolute;
    top:0;
    left:0;
    overflow: hidden;
    width: 50%;
    height: 50%;
    background: transparent;
    box-sizing: border-box;
}
.spinner-holder-two {
    position: absolute;
    top:0;
    left:0;
    overflow: hidden;
    width: 100%;
    height: 100%;
    background: transparent;
    box-sizing: border-box;
}
.loader-spinner {
    width: 200%;
    height: 200%;
    border-radius: 50%;
    border: 5px solid rgb(135, 206, 235);
    box-sizing: border-box;
}  
.animate-0-25-a {
    transform: rotate(90deg);
    transform-origin: 100% 100%;
}
.animate-0-25-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.animate-25-50-a {
    transform: rotate(180deg);
    transform-origin: 100% 100%;
}
.animate-25-50-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.animate-50-75-a {
    transform: rotate(270deg);
    transform-origin: 100% 100%;
}
.animate-50-75-b {
    transform: rotate(-90deg);
    transform-origin:100% 100%;
}
.animate-75-100-a {
    transform: rotate(0deg);
    transform-origin: 100% 100%;
}
.animate-75-100-b {
    transform: rotate(-90deg);
    transform-origin: 100% 100%;
}
.text {
    text-align: center;
    font-size: 20px;
    color: rgb(135, 206, 235);
    font-weight: bold;  
}
.blue .loader-bg {
  border-color: rgba(255,255,255,0.1);
  box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.1) !important;
}
.blue .text {
  font-size: 20px;
  color: #3ba8b6 !important;
}
.blue .loader-spinner {
  border-color: #3ba8b6;
}
.blue.circle-loaded-75 .text {
  color: #57a3d8 !important;
}
.blue.circle-loaded-75 .loader-spinner {
  border-color: #57a3d8;
}
.cobalt .loader-bg {
  border-color: #ccc;
  /*box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.4) !important;*/
}
.cobalt .text {
  font-size: 20px;
  color: #333 !important;
}
.cobalt .loader-spinner {
  border-color: #333;
}
.fire .loader {
}
.fire .loader-bg {
  border-color: #333;
  box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.4);
}
.fire .text {
  font-size: 20px;
  color: #ee4230 !important;
}
.fire .loader-spinner {
  border-color: #ee4230;
}
.fire.circle-loaded-75 .text {
  color: #c6594e !important;
}
.fire.circle-loaded-75 .loader-spinner {
  border-color: #c6594e;
}
.matte .loader-bg {
  border-color: rgba(255,255,255,0.4);
  box-shadow: 2px 2px 20px 0 rgba(0,0,0,0.6);
}
.matte .text {
  color: rgba(20, 20, 20) !important;
  font-weight: bold;
}
.matte .loader-spinner {
  border-color: rgba(20, 20, 20);
}
.purple .loader-bg {
  border-color: rgba(255,255,255,0.1);
  box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.1) !important;
}
.purple .text {
  font-size: 20px;
  color: #7b708d !important;
}
.purple .loader-spinner {
  border-color: #7b708d;
}
.purple.circle-loaded-75 .text {
  color: #a186ce !important;
}
.purple.circle-loaded-75 .loader-spinner {
  border-color: #a186ce;
}
.loader-bg {
  border-color: rgba(255,255,255,0.4);
  box-shadow: 2px 2px 20px 0 rgba(0,0,0,0.6);
}
.text {
  color: rgb(135, 206, 235) !important;
  font-weight: bold;
}
.loader-spinner {
  border-color: rgb(135, 206, 235);
}
.white .loader-bg {
  border-color: rgba(255,255,255,0.1);
  box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.1) !important;
}
.white .text {
  font-size: 20px;
  color: #fff !important;
}
.white .loader-spinner {
  border-color: #fff;
}
.white.circle-loaded-75 .text {
  color: #ddd !important;
}
.white.circle-loaded-75 .loader-spinner {
  border-color: #ddd;
}
.yellow .loader-bg {
  border-color: rgba(255,255,255,0.1);
  box-shadow: inset 2px 2px 20px 0 rgba(0,0,0,0.1) !important;
}
.yellow .text {
  font-size: 20px;
  color: #003286 !important;
}
.yellow .loader-spinner {
  border-color: #003286;
}
.yellow.circle-loaded-75 .text {
  color: #ffeb3b !important;
}
.yellow.circle-loaded-75 .loader-spinner {
  border-color: #ffeb3b;
}
</style>
<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>