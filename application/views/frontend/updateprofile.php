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
	
	<!-- Bootsnav -->
    <link href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
	
    <!-- Icons -->
    <link href="<?php echo base_url()?>assetsfront/plugins/icons/css/icons.css" rel="stylesheet">
	
	<!-- Bootstrap wysihtml5 ditor-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assetsfront/plugins/bootstrap/css/bootstrap-wysihtml5.css">
    
    <!-- Animate -->
    <link href="<?php echo base_url()?>assetsfront/plugins/animate/animate.css" rel="stylesheet">
	
	<!-- Nice Select Option css -->
	
	<!-- Date Dropper -->
    <link href="<?php echo base_url()?>assetsfront/plugins/date-dropper/datedropper.css" rel="stylesheet">
	
	<!-- Aos Css -->
    <link href="<?php echo base_url()?>assetsfront/plugins/aos-master/aos.css" rel="stylesheet">

	<!-- Slick Slider -->
    <link href="<?php echo base_url()?>assetsfront/plugins/slick-slider/slick.css" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="<?php echo base_url()?>assetsfront/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assetsfront/css/responsiveness.css" rel="stylesheet">
	
	<!-- Custom Color -->
    <link href="<?php echo base_url()?>assetsfront/css/skin/default.css" rel="stylesheet">
	
    
    
	</head>
	
	<body class="blue-skin">
		
		<!-- ======================= Start Navigation ===================== -->
		<?php  $this->load->view('frontend/navbar'); ?>
		<!-- ======================= End Navigation ===================== -->
		
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title light" style="background:url(<?php echo base_url();?>assetsfront/img/slider-2.jpg);">
			<div class="container">
				<div class="page-caption">
					<h2>Update profile</h2>
					<p><a href="<?php echo base_url();?>Home" title="Home">Home</a></p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->

		<!-- ======================= Start Create Company ===================== -->
		<section class="create-company gray">
			<div class="container">
				
		 <form action="" method="post" enctype="multipart/form-data">

					
					<!-- General Information -->
					<div class="box">
						<div class="box-header">
							<h4>Service Provider information</h4>
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
					<div class="box">
						
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-4">
									<label>Qualification</label>
									<input type="text" class="form-control" name="qualification" value="<?php echo $user_details['qualification'] ;?>" required>
								</div>
								
								<div class="col-sm-4">
									<label>Language Known</label>
									<input type="text" class="form-control" name="language" value="<?php echo $user_details['language'] ;?>" required>
								</div>
								
								<!-- <div class="col-sm-4">
									<label>Keywords Skills</label>
									<input type="text" class="form-control" name="skills" value="<?php echo $user_details['skills'] ;?>" required>
								</div> -->

                        <div class="col-sm-4">
                        	<label>Keywords Skills</label>

								 <select name="skills[]" class="form-control selectpicker" multiple="multiple">
									  	<option value="">- Select Skills -</option>
								 <?php foreach ($categoryskills as $rowdata) {
		                        if($users->skills == $rowdata->id){ ?>
		                          <option selected value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->name; ?></option>
		                       <?php }else{ ?>
		                          <option value="<?php echo $rowdata->id; ?>"><?php echo $rowdata->name; ?></option>
		                       <?php }
		                      ?>
		                        <?php } ?>
		                                         </select>
		                                         </div>
								
							</div>
						</div>
					</div>
					
					<!-- Social Accounts -->
				
					
					<!-- Company Summery -->
					<div class="box">
						
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-12">
									<label>About Me</label>
									<textarea class="form-control height-120 textarea" placeholder="About Me" name="about"><?php echo $user_details['about'] ;?></textarea>
								</div>
								
							</div>
						</div>
					</div>
					


					<div class="box">
						
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-3">
									<label>Per Hours</label>
									<input type="text" class="form-control" name="pr_hours" value="<?php echo $user_details['pr_hours'] ;?>" required>
								</div>
								
								<div class="col-sm-3">
									<label>Per Day</label>
									<input type="text" class="form-control" name="pr_days" value="<?php echo $user_details['pr_days'] ;?>" required>
								</div>
								
								<div class="col-sm-3">
									<label>Minimum Charge</label>
									<input type="text" class="form-control" name="min_charge" value="<?php echo $user_details['min_charge'] ;?>" required>
								</div>
								
								<div class="col-sm-3">
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
								
								<div class="col-sm-2">
									<label>From Time</label>
									<input type="time" class="form-control" name="from_time[]" value="<?php $test= json_encode($from_time[$index]->FromTime); echo $ph=json_decode($test); ?>" >
								</div>
								
								<div class="col-sm-2">
									<label>To Time</label>
									<input type="time" class="form-control" name="to_time[]" value="<?php $to_time1= json_encode($to_time[$index]->ToTime); echo $to_times=json_decode($to_time1); ?>" >
								</div>
								
								<div class="col-sm-3">
									<?php $day_type1= json_encode($day_type[$index]->Day_Type);  $day_types=json_decode($day_type1);?>
									<label>type</label>
							<select name="day_type[]" class="wide form-control selectpicker">
                                 <option value="" >You can select  Type</option>
                              
								<option <?php if($day_types=="Everyday"): echo " selected " ; endif ?>   value="Everyday">Everyday</option>
                                          <option <?php if($day_types=="Week-days"): echo " selected " ; endif ?> value="Week-days">Week-days</option>
                                          <option <?php if($day_types=="Week-ends"): echo " selected " ; endif ?> value="Week-ends">Week-ends</option>
                                      </select> 
								</div>
								
								<div class="col-sm-3">
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
								
							</div>


							              <?php else: ?>

							              <div class="row">
								
								<div class="col-sm-2">
									<label>From Time</label>
									<input type="time" class="form-control" name="from_time[]" value="<?php $test= json_encode($from_time[$index]->FromTime); echo $ph=json_decode($test); ?>" required>
								</div>
								
								<div class="col-sm-2">
									<label>To Time</label>
									<input type="time" class="form-control" name="to_time[]" value="<?php $to_time1= json_encode($to_time[$index]->ToTime); echo $to_times=json_decode($to_time1); ?>" required>
								</div>
								
								<div class="col-sm-3">
						<?php $day_type1= json_encode($day_type[$index]->Day_Type);  $day_types=json_decode($day_type1);?>

									<label>type</label>
							<select name="day_type[]" class="wide form-control selectpicker">
                                 <option value="" >You can select  Type</option>

								<option <?php if($day_types=="Everyday"): echo " selected " ; endif ?>   value="Everyday">Everyday</option>
                                          <option <?php if($day_types=="Week-days"): echo " selected " ; endif ?> value="Week-days">Week-days</option>
                                          <option <?php if($day_types=="Week-ends"): echo " selected " ; endif ?> value="Week-ends">Week-ends</option>
                                      </select> 
								</div>
								
								<div class="col-sm-3">
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
                
                <div class="col-sm-2">
                  <label>From Time</label>
                  <input type="time" class="form-control" name="from_time[]" >
                </div>
                
                <div class="col-sm-2">
                  <label>To Time</label>
                  <input type="time" class="form-control" name="to_time[]" >
                </div>
                
                <div class="col-sm-3">
                  <label>type</label>
              <select name="day_type[]" class="wide form-control selectpicker">
                 <option value="" >You can select  Type</option>

                <option  value="Everyday">Everyday</option>
                  <option  value="Week-days">Week-days</option>
                  <option  value="Week-ends">Week-ends</option>
              </select> 
                </div>
                
                <div class="col-sm-3">
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

                
              </div>  
                    <?php endif; ?>
                     <?php else: ?>
         <div class="row">
                
                <div class="col-sm-2">
                  <label>From Time</label>
                  <input type="time" class="form-control" name="from_time[]" required>
                </div>
                
                <div class="col-sm-2">
                  <label>To Time</label>
                  <input type="time" class="form-control" name="to_time[]" required>
                </div>
                
                <div class="col-sm-3">
                  <label>type</label>
              <select name="day_type[]" class="wide form-control selectpicker" required>
                 <option value="" >You can select  Type</option>

                <option  value="Everyday">Everyday</option>
                  <option  value="Week-days">Week-days</option>
                  <option  value="Week-ends">Week-ends</option>
              </select> 
                </div>
                
                <div class="col-sm-3">
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

                
              </div> 
                    <?php endif; ?>
                    

                                              
           			<div id="blank_action_field">

                     <div class="row">
                
                <div class="col-sm-2">
                  <label>From Time</label>
                  <input type="time" class="form-control" name="from_time[]" id="actions" >
                </div>
                
                <div class="col-sm-2">
                  <label>To Time</label>
                  <input type="time" class="form-control" name="to_time[]" id="actions" >
                </div>
                
                <div class="col-sm-3">
                  <label>Type</label>
              <select name="day_type[]" class="wide form-control " id="actions">
                   <option value="" >You can select  Type</option>
                <option  value="Everyday">Everyday</option>
                  <option  value="Week-days">Week-days</option>
                  <option  value="Week-ends">Week-ends</option>
              </select> 
                </div>
                
                <div class="col-sm-3">
                  <label>Day Name </label>
                  
                         <select name="day_name[]" class="form-control select_addon" id="multi-select-demo" multiple="multiple">
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

                            <div class="col-md-2">
                  <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeAction(this)"> <i class="fa fa-minus"></i>Remove</button>
                </div>

                
              </div>

					</div>
				</div>
				</div>

				 <input type="text" id="servicetypesArray" name="data[day_name][]" value="" hidden/>
                       

                        <div class="col-sm-2">
                          <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendAction()"> <i class="fa fa-plus"></i>Add </button>
                      </div>
					</div>
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
						<button type="submit" class="btn btn-m theme-btn" onclick="myfunc();" id="submit">Submit</button>

					</div>
					
				</form>
				<br>
			</div>
		</section>
		
		<!-- ====================== End Create Company ================ -->
		
		
		<!-- ================= footer start ========================= -->
		
		<?php $this->load->view('frontend/footer');?>
		<!-- Sign Up Window Code -->
		  
		<!-- End Sign Up Window -->
		 
		<!-- Color Switcher -->
		
		 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

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
		<script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
		<script src="<?php echo base_url()?>assetsfront/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
		
		<!-- Aos Js -->
		<script src="<?php echo base_url()?>assetsfront/plugins/aos-master/aos.js"></script>
		
		<!-- Nice Select -->
		
		<!-- Custom Js -->
		<script src="<?php echo base_url()?>assetsfront/js/custom.js"></script>
		<script src="<?php echo base_url()?>assetsfront/js/jQuery.style.switcher.js"></script>
		
 
		
		<!-- Date Dropper Script-->
	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
 
       
        
  
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



 
       

<script type="text/javascript">


      $(document).on('change', 'select[name="day_name[]"]', function(){
  
        var selectedValues = {};
        $('select[name="day_name[]"]').each(function(){
            var text = $(this).children("option").filter(":selected").text();
            var value = $(this).val();
            selectedValues[text] = value;

        });

        var textValue = $('#servicetypesArray').val(selectedValues);
     
     var abc = JSON.stringify(selectedValues);




      $.ajax({
                     type: "POST",
                     url: "<?= base_url(); ?>"+"Home/add_to_cart", 
                     data: {"day_name":abc},
                     dataType: "json",  
                     cache:false,
                     success: function(data){
                     	
                      if(data.result){
			            		$.toaster({ priority : 'success', title : 'Success', message : data.msg });
			            		setTimeout(function(){ 
			            			window.location.href = "<?= base_url();?>Home";
			            		 }, 1000);
			            	}else{
			            		$.toaster({ priority : 'danger', title : 'Error', message : data.msg });
			            	}
                     }
                 });

    });

</script>



    </body>


</html>