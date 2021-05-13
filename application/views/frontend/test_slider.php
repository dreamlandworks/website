
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
<link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <div class="container">
    <div class="row">

        <div class="col-md9 col-sm9">
  <ol class="carousel-indicators">
    <?php
    $i=0;
    if(count($booking_list)){
        foreach ($booking_list as $value) {
            if($i==0){
                echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                $i++;
            }
            else
            {
                echo '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';
                $i++;
            }
        }
    }
    ?>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?php
    $a=0;
    if(count($booking_list)){
        foreach ($booking_list as $value) {
            if($a==0){
                echo '<div class="item active">
      <img src="sliderImage/" alt="...">
      <div class="carousel-caption">'.$value["start_location1"].'</div>
    </div>';
                $a++;
            }
            else
            {
                echo '<div class="item">
      
      <div class="carousel-caption">'.$value["start_location1"].'</div>
    </div>';
                $a++;
            }
        }
    }
    ?>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div></div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $('.carousel').carousel()
    </script>

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
		$(document).ready(function(){

			 $( "#slider-range" ).slider({
		      range: true,
		      min: 0,
		      max: 100000,
		      values: [ 0, 10000 ],
		      slide: function( event, ui ) {
		      	$( "#amount" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
		        $("#min_price").val(ui.values[ 0 ]);
		        $("#max_price").val(ui.values[ 1 ]);
		      }

		    });
			 $( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 ) +
      " - ₹" + $( "#slider-range" ).slider( "values", 1 ) );

			$('.search').on('click', function(){
                var cate = $('#cate_id').val();
                var min_price = $('#min_price').val();
                var max_price = $('#max_price').val();
                window.location.href = "<?= base_url('products/search/'); ?>"+"<?= $this->uri->segment(3, 0); ?>/"+cate+"/"+min_price+"/"+max_price;
            });
          


	

		
		
		});
	</script>


	 	
      <script type="text/javascript">
     function searchFilter(){
    $.ajax({
        type: 'POST',
        url: '<?=base_url()?>Products/Sort_By',
        data: 'keywords='+$('#searchInput').val()+'&filter='+$('#sort-by').val(),
        beforeSend: function(){
            $('.loading-overlay').show();
        },
        success:function(html){
            $('.loading-overlay').hide();
            $('#userData').html(html);
        }
    });
}

    
    </script>

    <script>
    document.getElementById("sort-by").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = this.value;
        }        
    };
 </script>


<script type="text/javascript">
$(document).ready(function(){

     $(document).on('click','.chkbox',function(){
      var id=this.value;

       $.ajax({
        type: "POST",
        context: "application/json",
        data: {id:id},
        url: "<?=base_url()?>Home/search_filter",
        success: function(msg) 
        {
            
            window.location.href = "<?=base_url()?>Home/search_filter/"+id;
        }
    })
   });

 });
 </script>
    </body>

<!-- Mirrored from codeminifier.com/new-jobvivo-demo/jobvivo/freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Dec 2020 06:31:53 GMT -->
</html>