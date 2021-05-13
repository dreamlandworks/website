

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

    

    <body class="blue-skin">

        

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

                    <h2>Popular Services Vendor</h2>

                </div>

            </div>

        </div>



    <br>

    <br>

    <br>

    <section class="gray">

			<div class="container">

				

				<!-- row -->

				<div class="row">

					<!-- Start Sidebar -->

					<div class="col-md-3 col-sm-12">

					

						

						

						<div class="widget-boxed padd-bot-0">

							<div class="widget-boxed-header">

								<h4>Sort & Filter</h4>

							</div>

							<div class="widget-boxed-body">

								<div class="side-list no-border">

									

						<!-- <form method="post" action="<?=base_url()?>Home/search_filter"> -->

									<ul>

										

										<li>

											<span class="custom-checkbox">

												<input type="checkbox" class="chkbox"  name="Reviews" value="Reviews" id="Reviews">

												<label for="2"></label>

											</span>

											Reviews

									

										</li>

										<li>

											<span class="custom-checkbox">

												<input type="checkbox" class="chkbox" value="Ranking" id="Ranking">

												<label for="3"></label>

											</span>

											Ranking

											

										</li>

										<li>

											<span class="custom-checkbox">

												<input type="checkbox"  class="chkbox" value="Near" id="Near">

												<label for="4"></label>

											</span>

											Near Me

											

										</li>

											

											

										<li>

											<span class="custom-checkbox">

												<input type="checkbox" class="chkbox" value="Professional" id="Professional">

												<label for="7"></label>

											</span>

											Professional

										</li>	





										<li>

											<span class="custom-checkbox">

												<input type="checkbox" class="chkbox"  value="Fresher" id="Fresher">

												<label for="8"></label>

											</span>

											Fresher

										

										</li>

																					

										

										</li>

										

									</ul>

									<!-- <button class="btn btn-m theme-btn " type="submit">Search</button>-->                                

                                	<!-- </form> -->

                             	<br>

                             	<br>

                              

								</div>

							</div>

						</div><div class="widget-boxed padd-bot-0">

							<div class="widget-boxed-header">

								<h4>Sort & Filter</h4>

							</div>

							<div class="widget-boxed-body">

								<div class="side-list no-border">

									

						<!-- <form method="post" action="<?=base_url()?>Home/search_filter"> -->

                               

                                <!-- </form> -->

                                 <br>

                                 <br>

                                 <form method="post" action="<?=base_url()?>Home/search_filter">

                                 <select name="sort_price" class="sort_rang" id="sort">

                            <option value="">select prefernce</option>

                            <option selected="selected" value="price-asc-rank">Price: Low to High</option>

                            <option selected="selected" value="price-desc-rank">Price: High to Low</option>

                        </select>

                        <br>

                        <br>

                    			<button class="btn btn-m theme-btn " type="submit">Search</button>



                              </form>

								</div>

							</div>

							<br>

                        <br>

						</div>

						<div class="widget-boxed padd-bot-0">

							<div class="widget-boxed-header">

							<h3 class="sidebar-title">	Filter By Amount</h3>

							</div>

							<div class="sidebar mb-35">

							

							<div class="sidebar-price">

  							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">

								<!-- <div id="price-range"></div> -->

								<div id="slider-range"></div>

								<input type="hidden" id="min_price">

								<input type="hidden" id="max_price">

								<br>

								<button class="btn btn-m theme-btn search">Search</button>

							</div>

						</div>

						<br>

						<br>

						</div>



						

						

						

						

						

						

						

						

						

						

					</div>

					

					<!-- Start Job List -->

					<div class="col-md-9 col-sm-12">

						

						

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

											

											<br>

											

									 <img class="img-responsive" src="<?php echo base_url()?>assets/media/users/<?=$row->user_image;?>" alt="" style="height: 200px; width: 170px; border-radius: 15px">



										</div>

										<div class="col-md-4 col-sm-4">

											<div class="vrt-job-act">

												<b class="vendorname"><?= ucfirst($row->user_name); ?></b>

												<br>

												<p><?= ucfirst($row->name); ?> </p>

												<p><?= ucfirst($row->language); ?> </p>

												<p class="vendorabout"><?= ucfirst($row->about); ?> </p>

												</div>

										</div>

										<div class="col-md-4 col-sm-4">

											<div class="vrt-job-act">

												<h5> Min. Amount</h5>

												<h3 class="price">₹<?= $row->min_charge; ?></h3>

												<a href="#" class="read-more">Read More</a>

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
														<?php if($row->rating!=""){?>
															<h5>Rating: <?= $row->rating;?> <span style="color: #FFD700; font-size:20x;" class="fa fa-star checked"> </h5>

														<?php }else{?>

															<h5>Rating: 0 <span style="color: #FFD700; font-size:20x;" class="fa fa-star checked"> </h5>
														<?php }?>
														

													</li>

													

												</ul>

											</div>

										</div>

										<div class="col-md-8 col-sm-8">

											<div class="cmp-job-review">

												<ul>

													<li>Jobs <span>15</span></a></li>

													<li><b>

														<span>

														<!-- <?php //if($this->session->)?> -->

													<!-- <?= $row->distance; ?> -->

														102	

														</span>Kms Away </b></li>



													<?php if($this->session->userdata('user_login')==TRUE){?>
                     <a href="<?= base_url();?>Home/single_move_booking/<?= $row->user_id; ?>" class="btn-job theme-btn job-apply">Book Now</a>
                  <?php }else{?>
                  	<a  href="javascript:void(0)"  data-toggle="modal" data-target="#signin" class="btn-job theme-btn job-apply">
                     Book Now</a>
                  <?php } ?>

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

					

				</div>

				<!-- End Row -->

				

			</div>

		</section>

		<!-- ================= footer start ========================= -->

		

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


 <style type="text/css">

.job-verticle-list {

    border: 1px solid rgb(0 50 134);

}</style>

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

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
      <!-- end auto -->
      <!-- Bootstrap Css -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="<?php echo base_url()?>assetsfront/js/jquery.toaster.js"></script>

</body>


</html>