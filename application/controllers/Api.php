<?php

  if(!defined('BASEPATH')) exit ('No direct script access allowed');

  class Api extends CI_Controller
  {


    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Calcutta');
      $this->load->model('Admin_model');
      $this->load->model('User_Model');
      $this->load->model('Api_Model');
      $this->load->helper('custom_helper');
      error_reporting(0);
    }

    private function hash_password($password)
    {
      return password_hash($password, PASSWORD_DEFAULT);
    }


    /*
      @create string for set pass
    */
    function generateRandomString($length = 15) {
      $characters = substr(str_shuffle(str_repeat(MD5(microtime()), ceil($length/32))), 0, $length);
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }



    /*
    @user user_signup api
    */
    public function signup()
    {
      $json = array();
      extract($_POST);
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name','name','trim|required');
      $this->form_validation->set_rules('email','email','trim|required');
      $this->form_validation->set_rules('mobile','mobile','trim|required');
      $this->form_validation->set_rules('dob','dob','trim|required');
      $this->form_validation->set_rules('lat','lat','trim|required');
      $this->form_validation->set_rules('lang','lang','trim|required');
      $this->form_validation->set_rules('fcm_id','fcm_id','trim|required');
      if($this->form_validation->run()==false){
        $json["result"] = "false";  
        $json["msg"] =  "parameter required name,email,mobile,dob,lat,lang,fcm_id,optional(address)";
      }else{
        $post_data = array(
          'fname'=>$this->input->post('name'),
          'email'=>$this->input->post('email'),
          'phone'=>$this->input->post('mobile'),
          'lat'=>$this->input->post('lat'),
          'lang'=>$this->input->post('lang'),
          'fcm_id'=>$this->input->post('fcm_id'),
          'address'=>$this->input->post('address'),
          'dob'=>$this->input->post('dob')
        );
        $post_data['phone']=$this->input->post('mobile');
        $user_id_data = $this->User_Model->get_last_creted_id('id','users');
        if($user_id_data)
        {
          $user_id = $user_id_data->user_id;
          $user_id++;
        }else{
          $user_id = "200001";
        }
        $random_no = rand(1000,9999);
        $post_data['otp'] = $random_no;
        if(!$this->User_Model->is_record_exist('users','email', "{$post_data['email']}" ))
        {

          if(!$this->User_Model->is_record_exist('users','phone', "{$post_data['phone']}" ))
          { 
            $result = $this->User_Model->insertAllData('users', $post_data);
            
            $message = urldecode("Dear+".$this->input->post('name')."%2CYour+OTP+for+completing+your+registration+in+Satrango+is+".$random_no."+Valid+for+30+minutes.+Please+do+not+share+this+OTP.%0A%0ARegards.Satrango+Team.");
           
            $send_sms = $this->SentSMS($message,$post_data['phone']);
            
            if($result)
            {

              $json['result'] = 'true';
              $json['data'] = $this->Admin_model->select_single_row('users','id',$result);
              $json['msg'] = "We send OTP to your mobile, Thanks";
              $json['mobile']  = $post_data['phone'];
              $json['OTP'] = $random_no;
            }else{
              $json['result'] = "false";
              $json['msg'] = "Something went wrong. Please try later.";
            }
          }else{
            $json['result'] = "false";
            $json['msg'] = "Mobile number already exits. Please Try another.";
          }
        }else{
          $json['result'] = "false";
          $json['msg'] = "Email already exits. Please Try another.";
        }
      }
      echo json_encode($json);
    }


  /*resend otp*/
  public function resend_otp(){
    $phone = $this->input->post('phone');
    if (!empty($phone)) {
      $userdetail=$this->db->query('select * from users where phone="'.$phone.'"')->row();
      if($userdetail)
      {
        $user_id=$userdetail->id;
        $random_no = rand(1000,9999);
        $post_data['otp'] = $random_no;
        $wheredata=array('id'=>$user_id);
        $result=$this->User_Model->updates('users',$post_data,$wheredata);
        $message = "Your Mobile verification OTP :{$random_no}";
        $send_sms = $this->smsSEND($message,$phone);
        if($result)
        {
          $json['result'] = 'true';
          $json['data'] = $this->Admin_model->select_single_row('users','id',$user_id);
          $json['msg'] = "We send OTP to mobile, Thanks";
          $json['email']  = $phone;
          $json['OTP'] = $random_no;
        }else{
          $json['result'] = "false" ;
          $json['msg'] = "Something went wrong. Please try later.";
        }
      }else{
        $json['result'] = "false" ;
        $json['msg'] = "Mobile No is not exits. Please Try another.";
      }
    }else{
      $json['result'] = "false" ;
      $json['msg'] = "parameter required phone";
    }
    echo json_encode($json);
  }


  /*logout from app*/
  public function logout(){
    extract($_POST);
    if(isset($user_id))
    {
      $this->db->where('id',$user_id);
      $this->db->update('users', array('fcm_id'=>''));
      $json['result'] = "true";
      $json['msg'] = "logout successfully.";
    }else{
      $json['result'] = "true";
      $json['msg'] = "user_id required.";
    }
    echo json_encode($json);
  }


  /*
  @user login api
  */
  public function login()
  { 
    extract($_POST);
    if(isset($mobile) && isset($password) && isset($fcm_id))
    {
      $psw=md5($password);
      $result =  $this->User_Model->check_credentials($mobile,$psw);
      if($result)
      {
        if($result->status!="1")
        {

          $wheredata=array('id'=>$result->id);

          $datas=array('fcm_id'=>$fcm_id,'fcm_id'=>$fcm_id);

          $res=$this->User_Model->updates('users',$datas,$wheredata);

          $result =  $this->User_Model->check_credentials($mobile,$psw);

          $data['result'] = "true";

          $data['data'] = $result;

          $data['msg']    = 'Successfully logged in.';

        }else{

          $data['result'] = "false";

          $data['msg']    = 'Your account currently Inactive';

        }

      }else{

        $data['result'] = "false";

        $data['msg']    = 'Invalid Password or email or mobile';

      }

    }else{

      $data['result'] = 'false';

      $data['msg']    = 'Please provide parameters(mobile,password,fcm_id)';

    } 

    echo json_encode($data);

  }





  // #otp verfy
  public function verify_otp(){
    $user_id=$this->input->post('user_id');
    $otp =$this->input->post('otp');
    extract($_POST);
    if (isset($user_id) && isset($otp)) {
      $check_otp=$this->db->query("SELECT * FROM `users` WHERE `id`='$user_id' AND `otp`='$otp' AND `verify_otp`= 1");
      if ($check_otp->num_rows()>0) {
        $data['result']="true";
        $data['msg']="Otp already verify";
      }else{
        $wheredata = array('field'=>'id',
          'table'=>'users',
          'where'=>array('id'=>$user_id,'otp'=>$otp)
        );
        $datas = array('verify_otp'=>1);
        $wheredatas = array('id'=>$user_id);
        $result=$this->User_Model->getAllData($wheredata);
        if($result) {
			$results=$this->User_Model->UpdateAllData('users',$wheredatas,$datas);
			$data['result']="true";
			$data['data']=$this->Admin_model->select_single_row('users','id',$user_id);
			$data['msg'] ="Otp verify Successfully.";
        }else{
          $data['result'] ="false";
          $data['msg'] ="sorry otp not valid.";
        }
      }

    }else{
      $data['result']="false";
      $data['msg'] ="parameter required user_id,otp";
    }
    echo json_encode($data);
  }









  /*set_password*/
  public function set_password(){

    $this->form_validation->set_rules('password','password','trim|required');

    $this->form_validation->set_rules('user_id','user_id','trim|required');

    $this->form_validation->set_rules('cnfpassword','cnfpassword','trim|required|matches[password]');

    if($this->form_validation->run()==false){

      $json["result"] = 'false'; 

      $json["msg"] =  strip_tags($this->form_validation->error_string());

    }else{

      $user_id=$this->input->post('user_id');

      $this->db->where('id',$user_id);

      $check= $this->db->update('users',array('password'=>md5($this->input->post('password'))));

      if($check){

        $json["result"] = 'true';  

        $json["msg"] =  "Password is updated";

        $json['data']=$this->Admin_model->select_single_row('users','id',$user_id);

      }else{

        $json["result"] = 'true'; 

        $json["msg"] =  "user id is not exist";

      }

    }

    echo json_encode($json);

  }


  /*
   @get profile profile section start 
  */  
  public function get_user_profile()
  {
    $user_id = $this->input->post('user_id');
    extract($_POST);
    if(isset($user_id) )
    {
      if($this->User_Model->is_record_exist('users','id',"{$user_id}"))
      {
        $res =  $this->User_Model->select_single_row('users','id',$user_id);
        if($res)
        {
          $json['result'] = "true";
          $json['msg'] = "User profile details.";
          $json['data'] = $res;
        }else{
          $json['result'] = "false";
          $json['msg'] = "Something went wrong.";
        }
      }else{
        $json['result'] = "false";
        $json['msg'] = "User id not exist.";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "Please give parameters(user_id)";
    }
    echo json_encode($json);
  }


  /*
  @edit profile
  */
  public function edit_user_profile()
  {
    $user_id=$this->input->post('user_id');
    if(isset($user_id))
    {
      $res =  $this->User_Model->select_single_row('users','id',$user_id);
      if($res)
      {
         $json['result'] = "true";
         $json['msg'] = "profile data.";
         $json['data'] = $res;
      }else{
        $json['result'] = "false";
        $json['msg'] = "Something went wrong.";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "Please give parameters(user_id)";
    }
    echo json_encode($json);
  }



  	public function check_duplication($action = "", $email = "", $id = "") {

        $duplicate_email_check = $this->db->get_where('users', array('email' => $email));

       if ($action == 'on_update') {

            if ($duplicate_email_check->num_rows() > 0) {

                if ($duplicate_email_check->row()->id == $id) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return true;
            }
        }
    }



   	public function check_duplicationmobile($action = "", $mobile = "", $id = "") {
        $duplicate_mobile_check = $this->db->get_where('users', array('phone' => $mobile));
       if ($action == 'on_updatemobile') {
            if ($duplicate_mobile_check->num_rows() > 0) {
                if ($duplicate_mobile_check->row()->id == $id) {
                    return true;
                }else{
                    return false;
                }
            }else{

                return true;
            }
        }
    }




    /*
    @change password
    */
    public function change_user_password()
    {
      extract($_POST);
      if(isset($mobile) && isset($old_password) && isset($new_password) && isset($confirm_password))
      {

        if($this->User_Model->is_record_exist('users','phone',"{$mobile}"))
        {

          $userdetail=$this->db->query('select * from users where phone="'.$mobile.'"')->row();
          $user_id=$userdetail->id;

          $old_encripted =  $this->Admin_model->select_single_row('users','id',$user_id)->password;

          if(md5($old_password)==$old_encripted)

          {

            if ($new_password==$confirm_password) {

              $post_data['password'] = md5($new_password);

              $result = $this->User_Model->updateData('users', $post_data,$user_id);

              if($result)

              {

                $json['result'] = "true";

                $json['msg'] = "Successfully updated password";

                $json['data'] =  $this->Admin_model->select_single_row('users','id',$user_id);

              }else{

                $json['result'] = "false" ;

                $json['msg'] = "Something went wrong. Please try later.";

              }

            }else{

              $json['result'] = "false" ;

              $json['msg'] = "New password and confirm_password not matched.";

            }

          }else{

            $json['result'] = "false";

            $json['msg']    = 'Invalid current Password';

          }

        }

        else

        { 

          $json['result'] = "false";

          $json['msg']    = 'mobile no does not exist';

        }

      } 

      else

      {

        $json['result'] = "false";

        $json['msg'] = "Please give parameters(mobile,old_password,new_password,confirm_password)";

      }

      echo json_encode($json);

    }



    /*
    @forget password
    */
    public function forgot_password()
    {
      $phone = $this->input->post('phone');
      if (isset($phone) ) {

        $result    = $this->User_Model->select_single_row('users','phone', $phone);

        if ($result) {
          $random_no = rand(1000,9999);
          $otp['otp']=$random_no;
          $wherenewpass=array('phone'=>$phone);
          $res  = $this->User_Model->updatePass($wherenewpass,'users', $otp);
          $message="Your OTP is:{$random_no}";
          $send_sms = $this->smsSEND($message,$result->phone);
          $res1 = $this->User_Model->selectAllByIds('users', $wherenewpass);
          if ($res) {
            $data_result['result'] = 'true';
            $data_result['msg']    = 'Please check your mobile for OTP';
            $data_result['password']    = $random_no;
          } else {
            $data_result['result'] = 'false';
            $data_result['msg']    = "something went wrong!!.";
          }
        }else{
          $data_result['result'] = 'false';
          $data_result['msg']    = "Mobile not exist.";
        }
      }else{
        $data_result['result']='false';
        $data_result['msg']='parameter phone required!!';
      }
      echo json_encode($data_result);
    }


    /*set password after forget*/
    public function reset_password(){
      $otp =$this->input->post('otp');
      $new_password =$this->input->post('new_password');
      $confim_password =$this->input->post('confim_password');
      if ( !empty($otp) && !empty($new_password) && !empty($confim_password)){
        $check_otp=$this->db->query("SELECT * FROM `users` WHERE `otp`=$otp");
        if ($check_otp->num_rows()>0) {
          $wheredata = array('field'=>'otp',
            'table'=>'users',
            'where'=>array('otp'=>$otp)
          );
          $datas = array(
            'password'=>md5($new_password)
          );
          $wheredatas = array('otp'=>$otp);
          $result=$this->Api_Model->getAllData($wheredata);
          if($result) {
            $results=$this->Api_Model->updated($wheredatas,'users',$datas);
            $data['result']="true";
            $data['data']=$this->User_Model->select_single_row('users','otp',$otp);
            $data['msg'] ="Password updated Successfully.";
          }else{
            $data['result'] ="false";
            $data['msg'] ="sorry otp not matched.";
          }
        }else{
          $data['result'] ="false";
          $data['msg'] ="Invalid otp.";
        }
      }else{
        $data['result']="false";
        $data['msg'] ="parameter required otp,new_password,confim_password";
      }
      echo json_encode($data);
    }


  /*term condition*/
  public function term_condition(){
    $type=$this->input->post('type');
    if(isset($type)){
      if($type=='user'){
        $result=$this->db->query("select terms from privacy where type= '$type' ")->row();
        if($result){
          $data['result']="true";
          $data['data']=$result;
          $data['msg']="privacy content";
        }else{
          $data['result']="false";
          $data['msg']="data not found";
        }
      }else{
        $result=$this->db->query("select terms from privacy where type= '$type'")->row();
        if($result){
          $data['result']="true";
          $data['data']=$result;
          $data['msg']="privacy content";
        }else{
          $data['result']="false";
          $data['msg']="data not found";
        }
      } 
    }else{
      $data['result']="false";
      $data['msg']="param required type(user,vendor)";
    }
    echo json_encode($data);
  }


  /*privacy policy*/
  public function privacy_policy(){
    $type=$this->input->post('type');
    if(isset($type)){
      if($type=='user'){
        $result=$this->db->query("select content from privacy where type= '$type' ")->row();
        if($result){
          $data['result']="true";
          $data['data']=$result;
          $data['msg']="privacy content";
        }else{
          $data['result']="false";
          $data['msg']="data not found";
        }
      }else{
        $result=$this->db->query("select terms from privacy where type= '$type' ")->row();
        if($result){
          $data['result']="true";
          $data['data']=$result;
          $data['msg']="privacy content";
        }else{
          $data['result']="false";
          $data['msg']="data not found";
        }
      }
    }else{
      $data['result']="false";
      $data['msg']="param required type(user,vendor)";
    }
    echo json_encode($data);
  }



  public function faq(){
    $type=$this->input->post('type');
    if(isset($type)){
      if($type=='user'){
        $result=$this->db->query("select * from faq where type= '$type' ")->result();
        if($result){
          $data['result']="true";
          $data['data']=$result;
          $data['msg']="All faq list";
        }else{
          $data['result']="false";
          $data['msg']="data not found";
        }
      }else{
        $result=$this->db->query("select * from faq where type= '$type' ")->result();
        if($result){
          $data['result']="true";
              $data['data']=$result;
              $data['msg']="All faq list";
            }else{
              $data['result']="false";
              $data['msg']="data not found";
            }
          }
        }else{
        $data['result']="false";
        $data['msg']="param required type(user,vendor)";
      }
      echo json_encode($data);

  }



  //sub category list 
  public function services_by_cat_id(){
    extract($cat_id);
    $cat_id=$this->input->post('cat_id');
    if (!empty($cat_id)) {
      $result=$this->db->query("SELECT subcategory.id,subcategory.cat_id,subcategory.name as service,subcategory.icon FROM subcategory INNER JOIN category ON category.id=subcategory.cat_id WHERE  subcategory.cat_id='$cat_id' ")->result();
      if($result){
        $data['result']="true";
        $data['data']=$result;
        $data['msg']="All srvices list by category";
      }else{
        $data['result']="false";
        $data['msg']="data not found";
      }
    }else{
      $data['result']="false";
      $data['msg']="parameter required cat_id";
    }
    echo json_encode($data);
  }



  public function search(){
    $this->form_validation->set_rules('search','search','trim|required');
    if($this->form_validation->run()==false){
      $data['result']=false;
      $data['msg']=strip_tags($this->form_validation->error_string());
    } else{
      $search=$this->input->post('search');
      $query="select category.id as cat_id, category.name as cat_name from category where name like '%$search%' UNION ALL SELECT subcategory.id as subcatid, subcategory.name as subcatname FROM subcategory WHERE name LIKE '%$search%' UNION ALL SELECT users.id as userid,users.fname as username FROM users WHERE fname like '%$search%'";
      $result=$this->db->query($query)->result();
      if($result){
        $data['result']="true";
        $data['data']=$result;
        $data['msg']="All  list";
      }else{
        $data['result']="false";
        $data['msg']="data not found";
      }
    } 
    echo json_encode($data);
  }


  public function send_message(){
    $this->form_validation->set_rules('user_id','user_id','trim|required');
    $this->form_validation->set_rules('text_message','text_message','trim|required');
    if($this->form_validation->run()==false){
      $data['result']=false;
      $data['msg']=strip_tags($this->form_validation->error_string());
    }else{
      $userid= $this->input->post('user_id');
      $postdata=array( 
        'sender_id'=>$this->input->post('user_id'),
        'message'=>$this->input->post('text_message'),
        'receiver_id'=>'0'
      );
      $result=$this->db->insert('chat',$postdata);
      $message=$this->db->query('select * from chat where sender_id ='.$userid.' OR receiver_id='.$userid.'')->result();
      if($result){
        $data['result']="true";
        $data['data']=$message;
        $data['msg']="message sent successfully.";
      }else{
        $data['result']="false";
        $data['msg']="data not found";
      }
    } 
    echo json_encode($data);
  }



  public function get_message(){
    $this->form_validation->set_rules('user_id','user_id','trim|required');
    if($this->form_validation->run()==false){
       $data['result']=false;
       $data['msg']=strip_tags($this->form_validation->error_string());
     }else{
      $userid= $this->input->post('user_id');
      $userdata=$this->db->query('select * from users where id='.$userid.'')->row();
      // $this->db->select('chat.*');
      // $this->db->join('users','users.id=chat.sender_id','LEFT');
      $this->db->where('chat.sender_id',$userid);
      $this->db->or_where('chat.receiver_id',$userid);
        $result=$this->db->get('chat')->result();
        foreach($result as $value){
          $value->userid=$userdata->id;
          $value->userimage=$userdata->image;
          $value->username=$userdata->fname;
        }
        if($result){
          $data['result']="true";
          $data['data']=$result;
          $data['msg']="messages.";
        }else{
          $data['result']="false";
          $data['msg']="data not found";
        }
      }
      echo json_encode($data);
    }    



    /*shivam*/ 

     public function post_jobs(){

      $user_id = (trim($this->input->post('user_id')));


      $title = (trim($this->input->post('title')));

      $desecration = (trim($this->input->post('desecration')));


      $amount = (trim($this->input->post('amount')));

      $start_date = (trim($this->input->post('start_date')));


      $end_date = (trim($this->input->post('end_date')));


      if($user_id == "" || $title == "" || $desecration == "" || $amount == "" ||$start_date == "" || $end_date == "")


      {


        $data['result']="false";

        $data['msg']="Please give parameters(user_id,title,desecration,amount,start_date,end_date)";

      }else{


        $post_jobs= array(
          'user_id' => $user_id,
          'title' => $title,
          'desecration' => $desecration,
          'amount' => $amount,
          'start_date' => $start_date,
          'end_date' => $end_date,
        );
        $this->db->insert('jobs',$post_jobs);
        $data['result'] = "true";
        $data['msg'] = "Successfully post job";

      }
      echo json_encode($data);
    }    



    public function get_jobs(){
		if($result = $this->Api_Model->get_jobs()){
			$data['result']="true";
			$data['msg']="jobs data";
			$data['data']=$result;
		}else{
			$data['result']="false";
			$data['msg']="data not found";
		}
    	echo json_encode($data);
	} 


  	public function update_jobs(){
	    $id = (trim($this->input->post('id')));
	    $user_id = (trim($this->input->post('user_id')));
	    $title = (trim($this->input->post('title')));
	    $desecration = (trim($this->input->post('desecration')));
	    $amount = (trim($this->input->post('amount')));
	    $start_date = (trim($this->input->post('start_date')));
	    $end_date = (trim($this->input->post('end_date')));
	    if($id== "" || $user_id == "" || $title == "" || $desecration == "" || $amount == "" ||$start_date == "" || $end_date == "")
	    {
	      $data['result']="false";
	      $data['msg']="Please give parameters(id,user_id,title,desecration,amount,start_date,end_date)";
	    }else{
      		if($result =$this->Api_Model->update_jobs($id)){
	        $post_jobs= array(
	          'user_id' => $user_id,
	          'title' => $title,
	          'desecration' => $desecration,
	          'amount' => $amount,
	          'start_date' => $start_date,
	          'end_date' => $end_date,
	        );
	        $this->db->where('id',$id);
	        $this->db->update('jobs',$post_jobs);
	        $data['result'] = "true";
	        $data['msg'] = "Successfully updated job";
	      }else{
	        $data['result']="false";
	        $data['msg']="please enter valid id ";
	      }
    	}
    	echo json_encode($data);
  	}    


  /*category as services*/
  public function services(){ 
    extract($_POST); 
    if (
      !empty($user_id) && !empty($lat) && !empty($lang)) {
      $result = $this->Api_Model->get_services($user_id,$lat,$lang);
      if ($result) {
        $data['result']="true";
        $data['data']=$result;
        $data['msg']="All services list";
      }else{
        $data['result']="false";
        $data['msg']="data not found";
      }
    }else{
      $data['result']="false";
      $data['msg']="parameters required user_id,lat,lang";
    }
    echo json_encode($data);
  }


  /*category as services*/
  public function service_at_home(){
  	extract($_POST);
  	if (!empty($user_id) && !empty($lat) && !empty($lang)) {
  		$result = $this->Api_Model->get_Hservices($user_id,$lat,$lang);
  		foreach ($result as $key => $value) {
  			$rrow = explode(',', $value->skills);
  			$datas=array(
  				'service'=>json_decode($rrow)
  			);
  			print_r($datas);exit();
			// if ($val==$cate['cat_id']) {
			//         echo$catName  = ucfirst($cate['cat_name']).',';
			//       }
  		}
		// $count = count($rrow);
		// if ($count==1) {
		//   foreach ($cat as $cate) {
		//     if ($rrow[0]==$cate['cat_id']) {
		//       echo ucfirst($cate['cat_name']);
		//     }else{
		//       echo '';
		//     }
		//   }
		// print_r($result);exit();
		if ($result) {
			$data['result']="true";
			$data['data']=$result;
			$data['msg']="All services list";
		}else{ 
			$data['result']="false";
			$data['msg']="data not found";
		}
	}else{
	  	$data['result']="false";
	    $data['msg']="parameters required user_id,lat,lang";
	}

    echo json_encode($data);
  }

  /*subcategory as category*/
  public function category(){ 
    $result = $this->Api_Model->get_category();
      if($result){
        $data['result']="true"; 
          $data['msg']="All category list";
          $data['data']=$result;
        }else{
        $data['result']="false";
          $data['msg']="data not found";
        }
      echo json_encode($data);
     }

  /*All service list*/
  public function services_list(){
  $result=$this->db->query('select subcategory.id,subcategory.name,subcategory.icon,category.id as cat_id,category.name as cate_name from subcategory left join category on category.id=subcategory.cat_id  order by subcategory.id desc')->result();
    if ($result) {
      $json['result']="true";
      $json['msg']="all services";
      $json['services']=$result;
    }else{
      $json['result']="false";
      $json['msg']="sorry data not found";
    }
    echo json_encode($json);
  }


  public function maincategory(){
    $result=$this->db->query('select * from category ')->result();
    if($result){
      $data['result']="true";
      $data['data']=$result;
      $data['msg']="All main category list";
    }else{
      $data['result']="false";
      $data['msg']="data not found";
    }
    echo json_encode($data);
  }


  public function post_rating(){
    date_default_timezone_set('Asia/Kolkata');
    $user_id = (trim($this->input->post('user_id')));
    $service_id = (trim($this->input->post('service_id')));
    $vendor_id = $this->input->post('vendor_id');
    $message = (trim($this->input->post('messag')));
    $Professionalism_rating = $this->input->post('Professionalism_rating');
    $Behaviour_rating = $this->input->post('Behaviour_rating');
    $Satisfaction_rating = $this->input->post('Satisfaction_rating');
    $Skills_rating = $this->input->post('Skills_rating');
    $date= date("Y-m-d");
    $time = date("h:i:s");
    if($user_id == "" || $service_id  == "" || $vendor_id=="" || $message == "" || $Professionalism_rating=="" || $Behaviour_rating =="" || $Satisfaction_rating=="" || $Skills_rating=="")
    {
      $data['result']="false";
      $data['msg']="Please give parameters(user_id,vendor_id,service_id,Professionalism_rating,Behaviour_rating,Satisfaction_rating,Skills_rating,messag)";
    }
    else{
      $this->db->select('*');
      $this->db->from('rating_review');
      $this->db->where('service_id',$service_id);
      $this->db->where('user_id',$user_id);
      $this->db->where('vendor_id',$vendor_id);
      $query = $this->db->get();
      $avg_rat=($Professionalism_rating+$Behaviour_rating+$Satisfaction_rating+$Skills_rating)/4;
      if($query->num_rows() == 0)
      {
        $post_rats= array(
          'user_id' => $user_id,
          'service_id' => $service_id,
          'vendor_id' => $vendor_id,
          'Professionalism_rating' => $Professionalism_rating,
          'Behaviour_rating' => $Behaviour_rating,
          'Satisfaction_rating' => $Satisfaction_rating,
          'Skills_rating' => $Skills_rating,
          'rating' => number_format($avg_rat,1),
          'message' => $message,
          'date' => $date,
          'time' => $time,
        );
        $this->db->insert('rating_review',$post_rats);
        $data['result'] = "true";
        $data['msg'] = "Successfully Rating";
      }
      else{
        $data['result']="false";
        $data['msg']="you have already rating this services";
      }
    }
    echo json_encode($data);
  }    


  public function get_rating(){
    $service_id = (trim($this->input->post('service_id')));
    if($service_id  == "" )
    {
      $data['result']="false";
      $data['msg']="Please give parameters(service_id)";
    }
    else{
      if($result = $this->Api_Model->get_rating($service_id))
      {
        $data['result'] = "true";
        $data['msg'] = "Rating data list";
        $data['data'] = $result;
        $data['rating count'] = $this->Api_Model->get_ratingcount($service_id);
      }
      else{
        $data['result']="false";
        $data['msg']="please enter valid service id";
      }
    }
    echo json_encode($data);
  } 

  //user post report
  public function post_report(){
    $user_id = (trim($this->input->post('user_id')));
    $reportuser_id = (trim($this->input->post('reportuser_id')));
    $reason = (trim($this->input->post('reason')));
    if($user_id == "" || $reason  == "" )
    {
      $data['result']="false";
      $data['msg']="Please give parameters(user_id,reportuser_id,reason)";
    }
    else{
      $this->db->select('*');
      $this->db->from('reports');

  $this->db->where('reportuser_id',$reportuser_id);
  $this->db->where('user_id',$user_id);
  $query = $this->db->get();
  if($query->num_rows() == 0)
  {
    $post_repo= array(
      'user_id' => $user_id, 
      'reportuser_id' => $reportuser_id,
      'reason' => $reason, 
    );
    $this->db->insert('reports',$post_repo);
    $data['result'] = "true";
    $data['msg'] = "Successfully report";
  }
  else{
    $data['result']="false";
    $data['msg']="you have already report this user";
  }
}
echo json_encode($data);
}    




  public function Apply_job(){
    date_default_timezone_set('Asia/Kolkata');
    $user_id = (trim($this->input->post('user_id')));
    $job_id = (trim($this->input->post('job_id')));
    $message = (trim($this->input->post('message')));
    $date= date("Y-m-d");
    $time = date("h:i:s");
    if($user_id == "" || $job_id  == "" ||  $message == "" )
    {
      $data['result']="false";
      $data['msg']="Please give parameters(user_id,job_id,message)";
    }
    else{
      $this->db->select('*');
      $this->db->from('apply_job');$this->db->where('job_id',$job_id);
      $this->db->where('user_id',$user_id);
      $query = $this->db->get();
      if($query->num_rows() == 0)
      {
      	$post_job= array(
      		'user_id' => $user_id,
      		'job_id' => $job_id,
      		'message' => $message,
      		'date' => $date,
      		'time' => $time,
      	);
      	$this->db->insert('apply_job',$post_job);
        $data['result'] = "true";
        $data['msg'] = "Successfully Apply Job";
    }
    else{
      	$data['result']="false";
        $data['msg']="you have already apply this job";
    }
  }
    echo json_encode($data);
}  



public function get_Applyjobs(){
	$user_id = (trim($this->input->post('user_id')));
	if($user_id  == "" )
	{
		$data['result']="false";
		$data['msg']="Please give parameters(user_id,job_id)";
	}
	else{
		if($result = $this->Api_Model->get_Applyjobs($user_id))
		{
			$data['result'] = "true";
			$data['msg'] = "Appy Job data list";
			$data['data'] = $result;
		}
		else{
			$data['result']="false";
			$data['msg']="please enter valid user id";
		}
	}
	echo json_encode($data);
}

//Dear user Your OTP for completing your registration in Satrango is 2236.Valid for 30 minutes.Please do not share this OTP. Regards Satrango Team
function SentSMS($message,$mobile){
	   	$username="Satrango";
	    $password = "Rango123";
	    $type ="TEXT";
	    $sender="STRNGO";
	    $PEID="1201160830805421467";
	    $HeaderId="1205160839566372449";
	    $TemplateId="1207161426257149557";

	   // $url="https://sms.prowtext.com/sendsms/sendsms.php?username=Satrango&password=Rango123&type=TEXT&mobile=8319566719&sender=STRNGO&message=Dear+user%2CYour+OTP+for+completing+your+registration+in+Satrango+is+2236.+Valid+for+30+minutes.+Please+do+not+share+this+OTP.%0A%0ARegards.Satrango+Team.&PEID=1201160830805421467&HeaderId=1205160839566372449&TemplateId=1207161426257149557";

	    $url="https://sms.prowtext.com/sendsms/sendsms.php";
	    //print_r($url);exit();
      $postData = array(
      	'username'=>$username,
      	'password' => $password,
      	'type' => $type,
      	'sender'=>$sender,
        'mobile'=>$mobile,
        'message'=>$message,
      	'PEID' => $PEID,
      	'HeaderId' => $HeaderId,
      	 'TemplateId' => $TemplateId,
      	'response'   => 'json'
          
      );
		//print_r($postData);exit();
	     $ch = curl_init();
      curl_setopt_array($ch, array(
          CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        //print_r($output);exit();
        curl_close($ch);
        $json = json_decode($output, true);
      
        return $json['type'];
  	} 


	function smsSEND($message,$mobile){
	   	$username="Satrango";
	    $password = "Rango123";
	    $type ="TEXT";
	    $sender="STRNGO";
	    //$url =$baseurl."?username=".$username."&password=".$password."&type=".$type."&sender=".$sender."&mobile=".$mobile."&message=".$message."&peid=".$peid."&tempid=".$tempid;
	    $url="https://sms.prowtext.com/sendsms/sendsms.php";
		$postData = array(
			'username'=>$username,
		  'password' => $password,
		  'type' => $type,
		  'sender'=>$sender,
		  'mobile' => $mobile,
		  'message' => $message,
		  //'peid' => $peid,
		  //'tempid' => $tempid,
		  'response'   => 'json'
		);
	    $ch = curl_init();
	    curl_setopt_array($ch, array(
	      	CURLOPT_URL => $url,
	          CURLOPT_RETURNTRANSFER => true,
	          CURLOPT_POST => true,
	          CURLOPT_POSTFIELDS => $postData
	      ));
	      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	      $output = curl_exec($ch);
	      curl_close($ch);
	      $json = json_decode($output, true);
	      return $json['type'];
  	}


  /*not use*/
  function smsApi($message,$mobile){
    $sender="STRNGO";
    $type="TEXT";
    $route = "6";
    $postData = array(
      'mobile'    => $mobile,
        'message'    => $message,
        'sender'     => $sender,
        'route'      => $route,
        'type'       => $type,
        'response'   => 'json'
    );
    // $url = "http://sms.prowtext.com/sendsms/apikey.php";
    $url = "https://sms.prowtext.com/sendsms/sendsms.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
       CURLOPT_POSTFIELDS => $postData
       ));
    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($output, true);
    return $json;
  }



  /*api for get professions*/
  public function get_professions_list(){
    $res=$this->db->query("select * from professions order by id desc")->result();
    if ($res) {
      $json['result']="true";
        $json['msg']="Professions list";
        $json['data']=$res;
      }else{
      $json['result']="false";
      $json['msg']="Sorry not any list";
    }
    echo json_encode($json);
  }


  /*add video*/
  public function upload_video(){
    $user_id=$this->input->post('user_id');
    $type=$this->input->post('type');
    if (!empty($type) && !empty($user_id)) {
      if ($type==1) {
          if(!empty($_FILES['video']['name'])){
            $config['upload_path'] = 'assets/uploaded/';
            $config['allowed_types'] = '*';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('video')){
              $uploadData = $this->upload->data();
              $video = $uploadData['file_name'];
            }else{
              $video = '';
            }
            $post_data['video'] = $video;
          }
          $wheredata=array('id'=>$user_id);
          // $res=$this->Api_Model->updateData('users',$post_data,$user_id);
          $res=$this->Api_Model->updates('users',$post_data,$wheredata);
        }elseif ($type==2) {
          if(!empty($_FILES['video']['name'])){
            $config['upload_path'] = 'assets/uploaded/';
            $config['allowed_types'] = '*';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('video')){
              $uploadData = $this->upload->data();
              $video = $uploadData['file_name'];
            }else{
              $video = '';
            }
            $post_data['video2'] = $video;
            unset($post_data['video']);
          }
          $wheredata=array('id'=>$user_id);
          $res=$this->Api_Model->updates('users',$post_data,$wheredata);
        }elseif($type==3){
          if(!empty($_FILES['video']['name'])){
            $config['upload_path'] = 'assets/uploaded/';
          $config['allowed_types'] = '*';
          $this->load->library('upload',$config);
          $this->upload->initialize($config);
          if($this->upload->do_upload('video')){
            $uploadData = $this->upload->data();
            $video = $uploadData['file_name'];
          }else{
            $video = '';
          }
          $post_data['video3'] = $video;
          unset($post_data['video']);
        }
        $wheredata=array('id'=>$user_id);
        $res=$this->Api_Model->updates('users',$post_data,$wheredata);
      }
      if ($res) {
        $json['result']="true";
        $json['msg']="upload video";
      }else{
        $json['result']="false";
        $json['msg']="sorry not upload video";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameter required user_id,type(1,2,3),video";
    }
    echo json_encode($json);
  }



  /*search_data*/
  public function search_data(){
    extract($_POST);
    if (!empty($keyword) && !empty($user_id) && !empty($lat) && !empty($lang)) {
      $res=$this->Api_Model->Alldatas($user_id,$keyword,$lat,$lang);
      // print_r($res);exit();
      foreach ($res as $key => $value) {

        $value->cat_name=$this->Api_Model->sub_services($value->cat_id)->cat_name;

      $value->Professionalism_rating = $this->Api_Model->rating_of_vendor($value->id)->Professionalism_rating ? $this->Api_Model->rating_of_vendor($value->id)->Professionalism_rating : "0";

      $value->Behaviour_rating = $this->Api_Model->rating_of_vendor($value->id)->Behaviour_rating ? $this->Api_Model->rating_of_vendor($value->id)->Behaviour_rating :"0";

      $value->Satisfaction_rating = $this->Api_Model->rating_of_vendor($value->id)->Satisfaction_rating ? $this->Api_Model->rating_of_vendor($value->id)->Satisfaction_rating :"0";
      $value->Skills_rating = $this->Api_Model->rating_of_vendor($value->id)->Skills_rating ? $this->Api_Model->rating_of_vendor($value->id)->Skills_rating :"0";
      $value->job_done = $this->Api_Model->rating_of_vendor($value->id)->job_done;
    }
    if ($res) {
      $json['result']="true"; 
      $json['msg']="search data list";
      $json['data']=$res;
    }else{
      $json['result']="false";
      $json['msg']="Sorry not any list";
    }

    }else{
      $json['result']="false";
      $json['msg']="param required keyword,lat,lang,user_id";
    }
    echo json_encode($json);
  }

  /*skills api as services*/
  public function get_skills(){
    $get_services=$this->Api_Model->GetServices();
    if ($get_services) {
      $json['result']="true";
      $json['msg']="All skills";
      $json['data']=$get_services;
    }else{
      $json['result']="false";
      $json['msg']="sorry not any service list";
    }
    echo json_encode($json);
  }



  // /*vendor Tariff add function*/
  public function add_tariff(){
    extract($_POST);
    $user_id=$this->input->post('user_id');
    $from_time =$this->input->post('from_time');
    $to_time =$this->input->post('to_time');
    $day_type =$this->input->post('day_type');
    $day_name =$this->input->post('day_name');
    if (isset($user_id) && isset($from_time) && isset($to_time) && isset($day_type) && isset($day_name)) {
      $res=$this->db->insert('vendor_tariff_time',$_POST);
      if ($res) {
        $json['result']="true";
         $json['msg']="added";
       }else{
        $json['result']="false";
         $json['msg']="sorry not added";
       }
    }else{
      $json['result']="false";
      $json['msg']="parameter required user_id,from_time,to_time,day_type,day_name";
    }
    echo json_encode($json);
  }


  /*msot popular hired user*/
  public function get_hired_profession(){
    $res=$this->db->query('SELECT rating_review.*,AVG(rating) as avg_rat,professions.name as professions_name,users.fname as vendor_name,users.image as vendor_image FROM `rating_review`
      LEFT JOIN professions ON professions.id=rating_review.service_id
    LEFT JOIN users ON users.id=rating_review.vendor_id
    GROUP by vendor_id')->result();
    if ($res) {
      $json['result']="true";
      $json['msg']="Most hired user";
      $json['hired_user']=$res;
    }else{
      $json['result']="false";
      $json['msg']="sorry not added";
    }
    echo json_encode($json);
  }


  /*serch services by user */
  public function search_services_ByUser(){
    extract($_POST);
    if (!empty($user_id) && !empty($keyword) && !empty($lat) && !empty($lang)) {
      $res=$this->Api_Model->searchServiceData($keyword,$lat,$lang);
      if ($res) {
        $json['result']="true";
        $json['msg']="search data";
        $json['data']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry data not found";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required user_id,keyword,lat,lang";
    }
    echo json_encode($json);
  }



  /*get vendor teriff details*/
  public function user_teriff(){
    extract($_POST);
    $user_id=$this->input->post('user_id');
    if (isset($user_id) ) {
      $getUserTeriff=$this->Api_Model->terriff($user_id);
      $res = json_decode($getUserTeriff->from_time, true);
      $res1 = json_decode($getUserTeriff->to_time, true);
      if ($res) {
        $json['result']="true";
        $json['msg']="added";
        // $json['data']=json_decode($getUserTeriff->from_time);
        $json['data']=$getUserTeriff;
       }else{
        $json['result']="false";
        $json['msg']="sorry not added";
       }
    }else{
      $json['result']="false";
      $json['msg']="parameter required user_id";
    }
    echo json_encode($json);
  }

  /*filter by distance and amount and keyword.......*/
  public function filter_services(){
    extract($_POST);
    if (!empty($user_id) && !empty($from_amount) && !empty($to_amount) && !empty($distance) && !empty($lat) && !empty($lang) && isset($keyword)) {

      $result=$this->Api_Model->filterNearByServices($user_id,$lat,$lang,$from_amount,$to_amount,$distance,$keyword);

     foreach ($result as $key => $value) {
      
      $value->cat_name=$this->Api_Model->sub_services($value->cat_id)->cat_name;
      $value->Professionalism_rating = $this->Api_Model->rating_of_vendor($value->id)->Professionalism_rating ? $this->Api_Model->rating_of_vendor($value->id)->Professionalism_rating : "0";
      $value->Behaviour_rating = $this->Api_Model->rating_of_vendor($value->id)->Behaviour_rating ? $this->Api_Model->rating_of_vendor($value->id)->Behaviour_rating :"0";
        $value->Satisfaction_rating = $this->Api_Model->rating_of_vendor($value->id)->Satisfaction_rating ? $this->Api_Model->rating_of_vendor($value->id)->Satisfaction_rating :"0";
        $value->Skills_rating = $this->Api_Model->rating_of_vendor($value->id)->Skills_rating ? $this->Api_Model->rating_of_vendor($value->id)->Skills_rating :"0";
        $value->job_done = $this->Api_Model->rating_of_vendor($value->id)->job_done;
      }
     if ($result) {
      $datas['result']="true";
      $datas['msg']="Service list";
      $datas['data']=$result;
    }else{
      $datas['result']="false";
      $datas['msg']="sorry data not found";
    }
  }else{
      $datas['result']="false";
      $datas['msg']="param required user_id,from_amount,to_amount,distance,lat,lang,keyword";
    }
    echo json_encode($datas);
  }

  /*sorting by distance and amount and keywords*/
  public function sorting_services(){
    extract($_POST);

    if (!empty($user_id) && isset($rating) && isset($nearby) && isset($highTolow) && isset($lowTohigh) && isset($profession) && isset($fresher) && isset($lat) && isset($lang) && isset($keyword)) {

      //$result=$this->Api_Model->sortingNearByServices($user_id,$lat,$lang,$lowTohigh,$lowTohigh,$keyword,$rating,$profession);
      $result=$this->Api_Model->sortingNearByServices($user_id,$highTolow,$lowTohigh,$lat,$lang,$keyword,$rating);
      //print_r($result);exit();

      foreach ($result as $key => $value) {
      $value->cat_name=$this->Api_Model->sub_services($value->cat_id)->cat_name;
      $value->Professionalism_rating = $this->Api_Model->rating_of_vendor($value->id)->Professionalism_rating ? $this->Api_Model->rating_of_vendor($value->id)->Professionalism_rating : "0";
      $value->Behaviour_rating = $this->Api_Model->rating_of_vendor($value->id)->Behaviour_rating ? $this->Api_Model->rating_of_vendor($value->id)->Behaviour_rating :"0";
      $value->Satisfaction_rating = $this->Api_Model->rating_of_vendor($value->id)->Satisfaction_rating ? $this->Api_Model->rating_of_vendor($value->id)->Satisfaction_rating :"0";
      $value->Skills_rating = $this->Api_Model->rating_of_vendor($value->id)->Skills_rating ? $this->Api_Model->rating_of_vendor($value->id)->Skills_rating :"0";
      $value->job_done = $this->Api_Model->rating_of_vendor($value->id)->job_done;
    }
    if ($result) {
      $datas['result']="true";
      $datas['msg']="Service list";
      $datas['data']=$result;
    }else{
      $datas['result']="false";
      $datas['msg']="sorry data not found";
    }
  }else{
    $datas['result']="false";
    $datas['msg']="param required user_id,rating,nearby,highTolow,lowTohigh,profession,lat,lang,fresher,keyword";
  }
  echo json_encode($datas);
  }

  /*view vendor profile details*/
  public function get_vendor_profile(){
    extract($_POST);
    if (!empty($user_id)) {
      $result=$this->Api_Model->vendor_profile($user_id);
      foreach ($result as $key => $value) {

      	$value->skills=$this->Api_Model->get_skills($value->skills);
      }
      if ($result) {
        $json['result']="true";
        $json['msg']="vendor profile";
        $json['data']=$result;
      }else{
        $json['result']="false";
        $json['msg']="not found user_id";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameters required user_id";
    }
    echo json_encode($json);
  }


  /*user update profile*/
  public function user_update_profile()
  {
    extract($_POST);
    if(isset($user_id) && isset($mobile) && isset($name) && isset($email))
    {
      if(!$this->User_Model->is_record_exist_update('users','phone', "{$mobile}",$user_id))
      {
        if(!empty($_FILES['image']['name'])){
          $config['upload_path'] = 'assets/uploaded/users/';
          $config['allowed_types'] = 'jpg|jpeg|png';
          //Load upload library and initialize configuration
          $this->load->library('upload',$config);
          $this->upload->initialize($config);
          if($this->upload->do_upload('image')){
            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];
          }else{
            $image = '';
          }
          $post_data['image'] = $image;
        }
        $post_data['fname'] = $name; 
        $post_data['phone'] = $mobile;
        $post_data['email'] = $email;
        $update =  $this->User_Model->updateData('users',$post_data, $user_id);
        if($update)
        {
          $json['result'] = "true";
          $json['msg'] = "profile data.";
          $json['data']=  $this->User_Model->select_single_row('users','id',$user_id);
        }else{
          $json['result'] = "false";
          $json['msg'] = "Something went wrong.";
        }
      }else{
        $json['result'] = "false" ;
        $json['msg'] = "Mobile number already exits. Please Try another.";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "Please give parameters(user_id,mobile,name,email,image(optional))";
    }
    echo json_encode($json);
  }


  /*Booking request*/
  public function booking(){
    extract($_POST);

    if (!empty($vendor_id) && !empty($user_id) && !empty($booking_date) && !empty($booking_time) && !empty($start_location1) && !empty($end_location1) && isset($work_description)) {

      if(!empty($_FILES['upload_doc']['name'])){

        $config['upload_path'] = 'assets/uploaded/users/';

        $config['allowed_types'] = '*';

        //Load upload library and initialize configuration

        $this->load->library('upload',$config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('upload_doc')){

          $uploadData = $this->upload->data();

          $upload_doc = $uploadData['file_name'];

        }else{

          $upload_doc = '';

        }

        $_POST['upload_doc'] = $upload_doc;

      }

      $_POST['bookingId']=mt_rand(100000, 999999);

      $res=$this->db->insert('booking_request',$_POST);

      if ($res) {

        $json['result'] = "true";

        $json['msg'] = "Booking success";

      }else{

        $json['result'] = "false";

        $json['msg'] = "Sorry something went wrong";

      }

    }else{

      $json['result'] = "false";

      $json['msg'] = "parameters required user_id,vendor_id,booking_date,booking_time,start_location1,end_location1,work_description,upload_doc,job_estimate,weight,optinals(start_location2,to_localtion2,end_location2,start_location3,to_localtion3,end_location3,job_estimate,weight)";

    }

    echo json_encode($json);

  }


  /*booking as single move*/
  public function single_move_booking(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($user_id) && !empty($booking_date) && !empty($from_time) && !empty($to_time) && !empty($start_location1) && isset($work_description) && isset($booking_type) && isset($service_id)) {
      $dataInfo = array();
      $dataInfo1 = array();
      $files = $_FILES;
      if(isset($_FILES["upload_doc"]) && $_FILES["upload_doc"]["size"]['0'] > 0){
        $cpt = count($_FILES['upload_doc']["name"]);
        for($i=0; $i<$cpt; $i++)
        {
          $_FILES['upload_doc']['name']= $files['upload_doc']['name'][$i];
          $_FILES['upload_doc']['type']= $files['upload_doc']['type'][$i];

          $_FILES['upload_doc']['tmp_name']= $files['upload_doc']['tmp_name'][$i];

          $_FILES['upload_doc']['error']= $files['upload_doc']['error'][$i];
          $_FILES['upload_doc']['size']= $files['upload_doc']['size'][$i];
          $config = array();
          $config['upload_path'] = 'assets/uploaded/users/';
          $config['allowed_types'] = '*';
          $config['max_size'] = '*';
          $config['overwrite'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload('upload_doc');
          $dataInfo[] = $this->upload->data();
          array_push($dataInfo1, $dataInfo[$i]['file_name']);
        }
        $fileName = implode(',',$dataInfo1);
        $_POST['upload_doc']=$fileName;
      }
      $bookingId_data = $this->Admin_model->get_last_creted_id('bookingId','booking_request');
      if($bookingId_data)
      {
        $bookingId = $bookingId_data->bookingId;
        $bookingId++;
      }else{
        $bookingId = "10000001";
      }
      $_POST['bookingId']=$bookingId;
      $_POST['type']='single move';
      $res=$this->db->insert('booking_request',$_POST);
      $id = $this->db->insert_id();
      if ($res) {
        $get_vendor=$this->db->query("SELECT * FROM users WHERE id=$vendor_id")->row();
        $notification = array(
            'title'=>"New booking",
            'body' =>"Booking ID",
            'bookingId' =>$id, 
            'type' =>'vendor'
          );
          send_notification($notification,$get_vendor->fcm_id);
         
          $dataNoti=array(
            "bookingId"=>$id,
              "sender_id"=>$user_id,
              "receiver_id"=>$vendor_id,
              "receiver_type"=>'vendor',
              "type_job"=>'booking',
              "message"=>'You have new booking request',
          );
          $this->db->insert('notification',$dataNoti);
          $json['result'] = "true";
          $json['msg'] = "Booking success";
          $json['data'] = $this->db->query("SELECT id as bookingId FROM booking_request WHERE id=$id")->row();
        }else{
          $json['result'] = "false";
          $json['msg'] = "Sorry something went wrong";
        }
      }else{
      $json['result'] = "false";
      $json['msg'] = "parameters required user_id,vendor_id,booking_date,from_time,to_time,start_location1,work_description,upload_doc,booking_type,service_id";
    }
     echo json_encode($json);
  }

  /*booking as single move*/
  public function blue_collar_booking(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($user_id) && !empty($booking_date) && isset($from_time) && isset($to_time)  && !empty($job_estimate) && isset($start_location1) && isset($work_description) && !empty($booking_type) && !empty($service_id)) {
      $dataInfo = array();
      $dataInfo1 = array();
      $files = $_FILES;
      if(isset($_FILES["upload_doc"]) && $_FILES["upload_doc"]["size"]['0'] > 0){
        $cpt = count($_FILES['upload_doc']["name"]);
        for($i=0; $i<$cpt; $i++)
        {
          $_FILES['upload_doc']['name']= $files['upload_doc']['name'][$i];
          $_FILES['upload_doc']['type']= $files['upload_doc']['type'][$i];
          $_FILES['upload_doc']['tmp_name']= $files['upload_doc']['tmp_name'][$i];
          $_FILES['upload_doc']['error']= $files['upload_doc']['error'][$i];
          $_FILES['upload_doc']['size']= $files['upload_doc']['size'][$i];
          $config = array();
          $config['upload_path'] = 'assets/uploaded/users/';
          $config['allowed_types'] = '*';
          $config['max_size'] = '*';
          $config['overwrite'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload('upload_doc');
          $dataInfo[] = $this->upload->data();
          array_push($dataInfo1, $dataInfo[$i]['file_name']);
        }

          $fileName = implode(',',$dataInfo1);
          $_POST['upload_doc']=$fileName;
        }
      // $_POST['bookingId']=mt_rand(100000, 999999);
        $bookingId_data = $this->Admin_model->get_last_creted_id('bookingId','booking_request');
        if($bookingId_data)
        {
          $bookingId = $bookingId_data->bookingId;
          $bookingId++;
        }else{
          $bookingId = "10000001";
        }
        $_POST['bookingId']=$bookingId;
        $_POST['type']='blue collar';
        $res=$this->db->insert('booking_request',$_POST);
        $id = $this->db->insert_id();
        if ($res) {

          $get_vendor=$this->db->query("SELECT * FROM users WHERE id=$vendor_id")->row();
        $notification = array(
            'title'=>"Blue collar booking",
            'body' =>"Booking ID",
            'bookingId' =>$id,
            'type' =>'vendor' 
          );
          send_notification($notification,$get_vendor->fcm_id);
          $dataNoti=array(
            "bookingId"=>$id,
              "sender_id"=>$user_id,
              "receiver_id"=>$vendor_id,
              "receiver_type"=>'vendor',
              "type_job"=>'booking',
              "message"=>'You have new booking request',
          );
          $this->db->insert('notification',$dataNoti);

          $json['result'] = "true";
          $json['msg'] = "Booking success";
          $json['data'] = $this->db->query("SELECT id as bookingId FROM booking_request WHERE id=$id")->row();
        }else{
          $json['result'] = "false";
          $json['msg'] = "Sorry something went wrong";
        }
      }else{
      $json['result'] = "false";
      $json['msg'] = "parameters required user_id,vendor_id,booking_date,from_time(optional),to_time(optional),start_location1(optional),job_estimate,work_description(optional),upload_doc,booking_type,service_id";
    }
    echo json_encode($json);
  }


  /*booking as multi move*/
  public function multi_move_booking(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($user_id) && !empty($booking_date) && isset($from_time) && isset($to_time) && !empty($to_location1) && !empty($weight) && !empty($start_location1) && !empty($end_location1) && isset($work_description) && !empty($booking_type) && !empty($service_id)) {
      $dataInfo = array();
      $dataInfo1 = array();
      $files = $_FILES;
      if(isset($_FILES["upload_doc"]) && $_FILES["upload_doc"]["size"]['0'] > 0){
        $cpt = count($_FILES['upload_doc']["name"]);
        for($i=0; $i<$cpt; $i++)
        {
          $_FILES['upload_doc']['name']= $files['upload_doc']['name'][$i];
          $_FILES['upload_doc']['type']= $files['upload_doc']['type'][$i];
          $_FILES['upload_doc']['tmp_name']= $files['upload_doc']['tmp_name'][$i];
          $_FILES['upload_doc']['error']= $files['upload_doc']['error'][$i];
          $_FILES['upload_doc']['size']= $files['upload_doc']['size'][$i];
          $config = array();
          $config['upload_path'] = 'assets/uploaded/users/';
          $config['allowed_types'] = '*';
          $config['max_size'] = '*';
          $config['overwrite'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload('upload_doc');
          $dataInfo[] = $this->upload->data();
          array_push($dataInfo1, $dataInfo[$i]['file_name']);
        }
        $fileName = implode(',',$dataInfo1);
          $_POST['upload_doc']=$fileName;
        }
        // $_POST['bookingId']=mt_rand(100000, 999999);
        $bookingId_data = $this->Admin_model->get_last_creted_id('bookingId','booking_request');
        if($bookingId_data)
        {
          $bookingId = $bookingId_data->bookingId;
            $bookingId++;
          }else{
          $bookingId = "10000001";
        }
        $_POST['bookingId']=$bookingId;
        $_POST['type']='multi move';
        $res=$this->db->insert('booking_request',$_POST);
        $id = $this->db->insert_id();
        if ($res) {

          $get_vendor=$this->db->query("SELECT * FROM users WHERE id=$vendor_id")->row();
        $notification = array(
            'title'=>"Multi move booking",
            'body' =>"Booking ID",
            'bookingId' =>$id,
            'type' =>'vendor' 
          );
          send_notification($notification,$get_vendor->fcm_id);
          $dataNoti=array(
            "bookingId"=>$id,
              "sender_id"=>$user_id,
              "receiver_id"=>$vendor_id,
              "receiver_type"=>'vendor',
              "message"=>'You have new booking request',
          );
          $this->db->insert('notification',$dataNoti);

          $json['result'] = "true";
          $json['msg'] = "Booking success";
          $json['data'] = $this->db->query("SELECT id as bookingId FROM booking_request WHERE id=$id")->row();
        }else{
          $json['result'] = "false";
          $json['msg'] = "Sorry something went wrong";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameters required user_id,vendor_id,booking_date,from_time,to_time(optional),start_location1,to_location1,end_location1,weight,work_description,upload_doc,booking_type,service_id";
    }
    echo json_encode($json);
  }



  /*get pending booking*/
  public function get_booking(){
    extract($_POST);
    if (!empty($vendor_id)) {
      $res=$this->db->query("SELECT booking_request.*,v.min_charge,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 
      INNER JOIN users ON users.id=booking_request.user_id
      INNER JOIN users as v ON v.id=booking_request.vendor_id
      WHERE booking_request.vendor_id=$vendor_id AND booking_request.job_status='Pending' ")->result();
      if ($res) {
        $json['result']="true";
        $json['msg']="New Booking list";
        $json['new_booking']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required vendor_id";
    }
    echo json_encode($json);
  }



  /*upcomming status after booking accepting */
  public function booking_accept_by_vendor(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($bookingId)) {
      $getBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$vendor_id");

      $get_user=$this->db->query("SELECT booking_request.id,booking_request.user_id,users.phone FROM booking_request INNER JOIN users ON users.id=booking_request.user_id WHERE booking_request.id=$bookingId")->row();
      // $get_user->phone;
      if ($getBook->num_rows()>0) {

        $random_no = rand(1000,9999);

        $message="Your booking OTP is:{$random_no}";
        $send_sms = $this->smsSEND($message,$get_user->phone);
        $wheredata = array('vendor_id' => $vendor_id,'id'=>$bookingId,'job_status'=>'Pending');

        $data = array('job_status'=>'Upcoming','otp'=>$random_no,'verify_otp'=>0);

        $res=$this->Api_Model->updates('booking_request',$data,$wheredata);
        if ($res) {
          $getBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$vendor_id")->row();
          $user_id=$getBook->user_id;
          $id=$getBook->id;
          $get_user=$this->db->query("SELECT * FROM users WHERE id=$user_id")->row();
          $notification = array(
            'title'=>"Confirm booking",
            'body' =>"Booking ID",
            'bookingId' =>$id, 
            'type' =>'user'
          );
          send_notification($notification,$get_user->fcm_id);
          $dataNoti=array(
            "bookingId"=>$id,
            "sender_id"=>$vendor_id,
            "receiver_id"=>$user_id,
            "receiver_type"=>'user',
          );
          $this->db->insert('notification',$dataNoti);
          $json['result']="true";
          $json['msg']="Booking confirm";
        }else{
          $json['result']="false";
          $json['msg']="sorry something went wrong";
        }
      }else{
        $json['result']="false";
        $json['msg']="Sorry booking id wrong";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameters required vendor_id,bookingId";
    }
    echo json_encode($json);
  }















  /*Get vendor time slot*/
  public function get_vendor_availability_time(){
    $vendor_id=$this->input->post('vendor_id');
    if (!empty($vendor_id)) {
      $res=$this->db->query("SELECT from_time,to_time FROM vendor_tariff_time WHERE user_id=$vendor_id")->result();
      // foreach ($res as $key => $value) {
        //   $arr=array(
        //     "from_time"=>$value->from_time,
        //     "to_time"=>$value->to_time
        //   );
        //   print_r($arr);
        // }
      if ($res) {
        $json['result']="true";
        $json['msg']="vendor availability time";
        $json['times']=$res;
      }else{
        $json['result']="false";
        $json['msg']="Not any availability time here";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameter required vendor_id";
    }
    echo json_encode($json);
  }


	/*booking cancel by vendor/user*/
	public function booking_cancel(){
	    extract($_POST);

	    if (!empty($user_id) && !empty($bookingId)) {
	      $getBook=$this->db->query("select * from booking_request where id=$bookingId and user_id=$user_id");
	      
	      $getvBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$user_id");
	     
	      $userType=$this->db->query("select * from users where id=$user_id")->row()->service_provider;

	      	//if ($userType==1) {
	      $type='vendor';
	      	if ($type='vendor') {

		        if ($getvBook->num_rows()>0) {
		          $wheredata = array('vendor_id'=>$user_id,'id'=>$bookingId,'job_status'=>'Pending');
		          //print_r($wheredata);exit();

		          $data = array('job_status'=>'Cancel','cancel_by'=>'vendor','reason'=>$this->input->post('reason'));

		          $res=$this->Api_Model->updates('booking_request',$data,$wheredata);

			        if (count($res)) {
			        	$json['result']="true";
			        	$json['msg']="Booking Cancelled";
			        }else{
			        	$json['result']="false";
			        	$json['msg']="sorry something went wrong";
			        }
			    }else{
			    	$json['result']="false";
			    	$json['msg']="Sorry booking id wrong";
			    }
			}else{
				if ($getBook->num_rows()>0) {
					$wheredata = array('user_id' => $user_id,'id'=>$bookingId,'job_status'=>'Pending');
					$data = array('job_status'=>'Cancel','cancel_by'=>'user');
					$res=$this->Api_Model->updates('booking_request',$data,$wheredata);
					if (count($res)) {
						$json['result']="true";
						$json['msg']="Booking Cancelled";
					}else{
						$json['result']="false";
						$json['msg']="sorry something went wrong";
					}
				}else{
					$json['result']="false";
					$json['msg']="Sorry booking id wrongs";
				}
	    	}
	    }else{
	      $json['result']="false";
	      $json['msg']="parameters required user_id(cancel by both side user or vendor),bookingId";
	    }
	    echo json_encode($json);
	}



















  /*user side show confirm booking*/



  public function user_confirm_booking_list(){



    $user_id=$this->input->post('user_id');



    if (!empty($user_id)) {



      $res=$this->db->query("SELECT booking_request.*,users.fname as vendor_name,users.phone as vendor_mobile,users.image as vendor_image,users.email as vendor_email FROM booking_request LEFT JOIN users ON users.id=booking_request.vendor_id WHERE booking_request.user_id=$user_id AND job_status='Inprogress' ")->result();



      if ($res) {



        $json['result']="true";



        $json['msg']="Confirm Booking list";



        $json['new_booking']=$res;



      }else{



        $json['result']="false";



        $json['msg']="sorry not any confirm list";







      }



    }else{



      $json['result']="false";



      $json['msg']="param required user_id";



    }







    echo json_encode($json);



  }















  /*app feedback*/







  public function app_feedback(){



    extract($_POST);



    $user_id=$this->input->post('user_id');



    if (!empty($user_id) && !empty($message) && !empty($over_all_rating) && isset($profession_rating) && isset($services_rating) && isset($app_interface_rating) && isset($customer_support_rating) && isset($type)) {



      $datas=array(



        'user_id'=>$user_id,



        'message'=>$message,



        'rating'=>$over_all_rating,



        'profession_rating'=>$profession_rating,



        'services_rating'=>$services_rating,



        'app_interface_rating'=>$app_interface_rating,



        'customer_support_rating'=>$customer_support_rating,



        'type'=>$type,



        'date_time'=>date("Y-m-d h:i:s")



      );



      $res=$this->db->insert('app_feedback',$datas);



      if ($res) {



        $json['result']="true";



        $json['msg']="Your feedback submitted";



      }else{



        $json['result']="false";



        $json['msg']="Not submitted";



      }



    }else{



      $json['result']="false";



      $json['msg']="param required user_id,message,over_all_rating,profession_rating,services_rating,app_interface_rating,customer_support_rating,type(user,vendor)";



    }



    echo json_encode($json);



  }











  /*app feedback*/



  public function complaints(){



    extract($_POST);



    $user_id=$this->input->post('user_id');



    if (!empty($user_id) && !empty($message) && !empty($reason) && isset($type)) {



      $datas =array(



        'user_id'=>$user_id,



        'message'=>$message,



        'reason'=>$reason,



        'type'=>$type,



        'created_at'=>date("Y-m-d H:i:s")



      );



      $res=$this->db->insert('complaints',$datas);



      if ($res) {



        $json['result']="true";



        $json['msg']="Your complaints submitted";



      }else{



        $json['result']="false";



        $json['msg']="Not submitted";



      }



    }else{



      $json['result']="false";



      $json['msg']="param required user_id,reason,message,type(user,vendor)";



    }



    echo json_encode($json);



  }











  /*Detail FOR ALL TYPE BOOKING*/
  public function booking_detail(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($bookingId)) {

      $res=$this->db->query("SELECT booking_request.*,v.min_charge,v.fname as vendor_name,v.phone as vendor_contact,v.address as vendor_address,v.image as vendor_profile,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,

        (SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating
        FROM booking_request 

        INNER JOIN users ON users.id=booking_request.user_id
        INNER JOIN users as v ON v.id=booking_request.vendor_id
        WHERE booking_request.id=$bookingId AND booking_request.vendor_id=$vendor_id AND (booking_request.job_status='Pending' OR booking_request.job_status='Upcoming') ")->result();
      if ($res) {
        $json['result']="true";
        $json['msg']="New Booking list";
        $json['new_booking']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required vendor_id,bookingId";
    }
    echo json_encode($json);
  }


  /*Canel booking list by vendor*/
  public function vendor_canel_booking_list(){
    extract($_POST);
    if (!empty($vendor_id)) {
      $res=$this->db->query("SELECT booking_request.*,v.min_charge,v.fname as vendor_name,v.phone as vendor_contact,v.address as vendor_address,v.image as vendor_profile,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,
      (SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating
      FROM booking_request 
      INNER JOIN users ON users.id=booking_request.user_id
      INNER JOIN users as v ON v.id=booking_request.vendor_id
      WHERE booking_request.vendor_id=$vendor_id AND booking_request.job_status='Cancel' ")->result();
      if ($res) {
        $json['result']="true";
        $json['msg']="New Booking list";
        $json['new_booking']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required vendor_id";
    }
    echo json_encode($json);
  }

 

  /*upcomming booking list*/
  public function get_upcoming_booking9(){
    extract($_POST);
    if (!empty($vendor_id)) {
      $res=$this->db->query("SELECT booking_request.*,bid_on_job.*,v.min_charge,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating 
      	FROM users  
      LEFT JOIN booking_request ON users.id=booking_request.user_id
      LEFT JOIN bid_on_job ON users.id=bid_on_job.vendor_id
      LEFT JOIN users as v ON v.id=booking_request.vendor_id
      WHERE (booking_request.vendor_id=$vendor_id AND booking_request.job_status='Upcoming') OR (bid_on_job.vendor_id=$vendor_id AND bid_on_job.status=1) ")->result();
      if ($res) {
        $json['result']="true";
        $json['msg']="New Booking list";
        $json['new_booking']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required vendor_id";
    }
    echo json_encode($json);


  }



  /*booking start*/
  public function booking_start_by_vendor(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($bookingId)) {
      $getBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$vendor_id");
      if ($getBook->num_rows()>0) {
        $get_users=$this->db->query("SELECT booking_request.id,booking_request.bookingId,users.fcm_id,users.phone FROM booking_request LEFT JOIN users ON users.id=booking_request.user_id WHERE booking_request.id=$bookingId ")->row();
        $start_time=date('H:i');
        // $random_no = rand(1000,9999);
        // $message="Your booking OTP is:{$random_no}";
        // $send_sms = $this->smsSEND($message,$get_users->phone);
        $wheredata = array('vendor_id' => $vendor_id,'id'=>$bookingId,'job_status'=>'Upcoming');
        // $data = array('job_status'=>'Inprogress','otp'=>$random_no,'start_time'=>$start_time);
        $data = array('job_status'=>'Inprogress','start_time'=>$start_time);
        $res=$this->Api_Model->updates('booking_request',$data,$wheredata);
        if ($res) {
          $getBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$vendor_id")->row();
          $user_id=$getBook->user_id;
          $id=$getBook->id;
          $get_user=$this->db->query("SELECT * FROM users WHERE id=$user_id")->row();
          $notification = array(
            'title'=>"Booking work start",
            'body' =>"Booking ID",
            'bookingId' =>$id,
            'type' =>'user'

          );
          send_notification($notification,$get_user->fcm_id);
          $dataNoti=array(
            "bookingId"=>$id,
            "sender_id"=>$vendor_id,
            "receiver_id"=>$user_id,
            "receiver_type"=>'user',
          );
          $this->db->insert('notification',$dataNoti);
          $json['result']="true";
          $json['msg']="Booking confirm and start";
        }else{
          $json['result']="false";
          $json['msg']="sorry something went wrong";
        }
      }else{
        $json['result']="false";
        $json['msg']="Sorry booking id wrong";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameters required vendor_id,bookingId";
    }
    echo json_encode($json);
  }


  /*match_otp for start work */
  public function booking_match_otp(){
    $vendor_id=$this->input->post('vendor_id');
    $bookingId=$this->input->post('bookingId');
    $otp =$this->input->post('otp');
    extract($_POST);
    if (isset($bookingId) && isset($otp)) {
      $check_otp=$this->db->query("SELECT * FROM `booking_request` WHERE `id`='$bookingId' AND `otp`='$otp' AND `verify_otp`= 1");
      if ($check_otp->num_rows()>0) {
        $data['result']="true";
        $data['msg']="Otp already verify";
      }else{
        $wheredata = array('field'=>'id',
          'table'=>'booking_request',
          'where'=>array('id'=>$bookingId,'otp'=>$otp)
        );
        $datas = array('verify_otp'=>1);
        $wheredatas = array('id'=>$bookingId);
        $result=$this->User_Model->getAllData($wheredata);
        if($result) {
          $results=$this->User_Model->UpdateAllData('booking_request',$wheredatas,$datas);
          $getBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$vendor_id");

          if ($results) {
          	if ($getBook->num_rows()>0) {
        $get_users=$this->db->query("SELECT booking_request.id,booking_request.vendor_id,booking_request.bookingId,users.fcm_id,users.phone FROM booking_request LEFT JOIN users ON users.id=booking_request.user_id WHERE booking_request.id=$bookingId ")->row();
        $start_time=date('H:i');
        // $random_no = rand(1000,9999);
        // $message="Your booking OTP is:{$random_no}";
        // $send_sms = $this->smsSEND($message,$get_users->phone);
        $wheredata = array('vendor_id' => $get_users->vendor_id,'id'=>$bookingId,'job_status'=>'Upcoming');
        // $data = array('job_status'=>'Inprogress','otp'=>$random_no,'start_time'=>$start_time);
        $data = array('job_status'=>'Inprogress','start_time'=>$start_time);
        $res=$this->Api_Model->updates('booking_request',$data,$wheredata);
        if ($res) {
          $getBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$vendor_id")->row();
          $user_id=$getBook->user_id;
          $id=$getBook->id;
          $get_user=$this->db->query("SELECT * FROM users WHERE id=$user_id")->row();
          $notification = array(
            'title'=>"Booking work start",
            'body' =>"Booking ID",
            'bookingId' =>$id, 
            'type' =>'user'
          );
          send_notification($notification,$get_user->fcm_id);
          $dataNoti=array(
            "bookingId"=>$id,
            "sender_id"=>$get_users->vendor_id,
            "receiver_id"=>$user_id,
            "receiver_type"=>'user',
          );
          $this->db->insert('notification',$dataNoti);
          $json['result']="true";
          $json['msg']="Booking confirm and start";
        }else{
          $json['result']="false";
          $json['msg']="sorry something went wrong";
        }
      }else{
        $json['result']="false";
        $json['msg']="Sorry booking id wrong";
      }
          }else{
          	$json['result']="false";
        	$json['msg']="Sorry something wrong";
          }
      

          //$data['result']="true";
          //$data['data']=$this->Admin_model->select_single_row('booking_request','id',$bookingId);
          //$data['msg'] ="Otp verify Successfully.";
        }else{
          $data['result'] ="false";
          $data['msg'] ="sorry otp not valid.";
        }
      }
    }else{
      $data['result']="false";
      $data['msg'] ="parameter required bookingId,otp,vendor_id";
    }
    echo json_encode($data);
  }


  // for booking inprogress match otp on booking 
  public function match_otp(){
    $bookingId=$this->input->post('bookingId');
    $otp =$this->input->post('otp');
    extract($_POST);
    if (isset($bookingId) && isset($otp)) {
      $check_otp=$this->db->query("SELECT * FROM `booking_request` WHERE `id`='$bookingId' AND `otp`='$otp' AND `verify_otp`= 1");
      if ($check_otp->num_rows()>0) {
        $data['result']="true";
        $data['msg']="Otp already verify";
      }else{
        $wheredata = array('field'=>'id',
          'table'=>'booking_request',
          'where'=>array('id'=>$bookingId,'otp'=>$otp)
        );
        $datas = array('verify_otp'=>1);
        $wheredatas = array('id'=>$bookingId);
        $result=$this->User_Model->getAllData($wheredata);
        if($result) {
          $results=$this->User_Model->UpdateAllData('booking_request',$wheredatas,$datas);
          
          $data['result']="true";
          $data['data']=$this->Admin_model->select_single_row('booking_request','id',$bookingId);
          $data['msg'] ="Otp verify Successfully.";
        }else{
          $data['result'] ="false";
          $data['msg'] ="sorry otp not valid.";
        }



      }



    }else{



      $data['result']="false";



      $data['msg'] ="parameter required bookingId,otp";



    }



    echo json_encode($data);



  }











  /*booking cancel by vendor/user after accept*/



  public function booking_cancel_after_accept(){
    extract($_POST);
    if (!empty($user_id) && !empty($bookingId)) {
      $getBook=$this->db->query("select * from booking_request where id=$bookingId and user_id=$user_id");
      $getvBook=$this->db->query("select * from booking_request where id=$bookingId and vendor_id=$user_id");
      $userType=$this->db->query("select * from users where id=$user_id")->row()->service_provider;

      if ($userType==1) {

        if ($getvBook->num_rows()>0) {
          $wheredata = array('vendor_id' => $user_id,'id'=>$bookingId,'job_status'=>'Upcoming');

          $data = array('job_status'=>'Cancel','cancel_by'=>'vendor','reason'=>$this->input->post('reason'));

          $res=$this->Api_Model->updates('booking_request',$data,$wheredata);
          $getvBook=$this->db->query("select booking_request.id,booking_request.bookingId,users.fname,users.fcm_id from booking_request left join users on users.id=booking_request.vendor_id where booking_request.id=$bookingId and users.id=$user_id")->row();
          $notification = array(
            'title'=>"Booking cancelled",
            'body' =>"Your Booking",   
            'bookingId' =>$getvBook->id, 
            'type' =>'user' 
          );
          send_notification($notification,$getvBook->fcm_id);
          $dataNoti=array(
            "bookingId"=>$getvBook->bookingId,
            "sender_id"=>$user_id,
            "receiver_id"=>$getvBook->vendor_id,
            "receiver_type"=>'user',
          );
          if (count($res)) {
            $json['result']="true";
            $json['msg']="Booking Cancelled";
          }else{
            $json['result']="false";
            $json['msg']="sorry something went wrong";
          }
        }else{
          $json['result']="false";
          $json['msg']="Sorry booking id wrong";
        }
      }else{
        if ($getBook->num_rows()>0) {
          $wheredata = array('user_id' => $user_id,'id'=>$bookingId,'job_status'=>'Upcoming');
          $data = array('job_status'=>'Cancel','cancel_by'=>'user');
          $res=$this->Api_Model->updates('booking_request',$data,$wheredata);

           $getuBook=$this->db->query("select booking_request.id,booking_request.bookingId,users.fname,users.fcm_id from booking_request left join users on users.id=booking_request.vendor_id where booking_request.id=$bookingId and users.id=$user_id")->row();

           $notification = array(
              'title'=>"Booking cancelled",
              'body' =>"Your Booking by user",   
              'bookingId' =>$getuBook->id,
              'type' =>'vendor'
            );
            send_notification($notification,$getuBook->fcm_id);
            $dataNoti=array(
              "bookingId"=>$getuBook->bookingId,
              "sender_id"=>$user_id,
              "receiver_id"=>$getuBook->vendor_id,
              "receiver_type"=>'vendor',
            );
          if (count($res)) {
            $json['result']="true";
            $json['msg']="Booking Cancelled";
          }else{
            $json['result']="false";
            $json['msg']="sorry something went wrong";
          }
        }else{
          $json['result']="false";
          $json['msg']="Sorry booking id wrong";
        }
      }
    }else{
      $json['result']="false";
      $json['msg']="parameters required user_id(cancel by both side user or vendor),bookingId,reason(optional)";
    }
    echo json_encode($json);
  }



  /*inprogress booking after work started both side*/
  public function get_inprogress_booking(){
    extract($_POST);
    if (!empty($vendor_id)) {
    	$res=$this->Api_Model->getVendorInprogressData($vendor_id);
    /*	foreach ($res as $key => $value) {
    		$value->extra_charge_status=$this->Api_Model->extraChargeStatus($value->id);
    	}*/
      if ($res) {
        $json['result']="true";
        $json['msg']="Inprogress Booking list";
        $json['new_booking']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required vendor_id";
    }
    echo json_encode($json);
  }


  /*Reshedule booking*/
  public function reshedule_booking(){

    //$bookingId=$this->input->post('bookingId');
  	extract($_POST);
    if (!empty($bookingId) && isset($booking_date) && isset($from_time) && isset($to_time)) {

      $post_data['booking_date']=$booking_date;

      $post_data['from_time']=$from_time;

      $post_data['to_time']=$to_time;

       $update =  $this->User_Model->updateData('booking_request',$post_data,$bookingId);

       if ($update) {

        $json['result']="true";

        $json['msg']="Submitted reshedule request";

       }else{

        $json['result']="false";

        $json['msg']="sorry something went wrong";

       }

    }else{

      $json['result']="false";

      $json['msg']="param required bookingId,booking_date,from_time,to_time";

    }

    echo json_encode($json);
  }



  /*get status for user*/
  public function get_work_status(){
    $user_id=$this->input->post('user_id');
    $bookingId=$this->input->post('bookingId');
    if (!empty($user_id) && !empty($bookingId)) {
      $res=$this->db->query('select * from booking_request where user_id='.$user_id.' and id='.$bookingId.' ')->row()->job_status;
      if ($res) {
        $json['result']="true";
        $json['msg']="Your booking status";
        $json['data']=$res;
      }else{
        $json['result']="false";
        $json['msg']="sorry something went wrong";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required user_id,bookingId";
    }
    echo json_encode($json);
  }

  function dateDiff($time1, $time2) 
  {
    $time1_ts = strtotime($time1);
    
    $time2_ts = strtotime($time2);
    $diff = $time2_ts - $time1_ts;
    return round($diff / 60.0);
    // return $diff;
  }

  public function get_time(){
    $selet_order=$this->db->query("SELECT * FROM booking_request WHERE id='1' ")->row();
    $from_time=$selet_order->from_time;
    $to_time=$selet_order->to_time;
    // $res=implode(':', $from_time);
    // $res=explode(':', $from_time);
    
    // foreach ($res as $key => $value) {
    //   $d=array(
    //     'hr'=>$value,
    //   'mnt'=>$value+1
    //   );
    //   print_r($d);exit();
    // }
    // print_r($res);
    // print_r($res);exit();
    // $selet_order=$to_time-$from_time;
    // $selet_order=$this->dateDiff($to_time,$from_time);
    // DATEDIFF(MINUTE, @Time1, @Time2); // 60  AS Incorrect,
    // $re=DATEDIFF(MINUTE,$to_time,$from_time); // 60.0 AS Correct


    // $duration = "1.33";
    // $hours    = (int)($duration / 60);
    // $minutes  = $duration - ($hours * 60);   
    // date_default_timezone_set('UTC');
    // $date = new DateTime($hours.":".$minutes);
    // echo $date->format('H:i:s');
    // $new_out= round(abs($from_time - $to_time) / 60,2). " minute";
    // $new_out=date('H:i',strtotime($from_time.'+ 12 hours'));
    if ($selet_order) {
      $json['result']="true";
      $json['msg']="true";
      $json['ti']=$selet_order;
    }else{
      $json['result']="false";
      $json['msg']="false";
    }
    echo json_encode($json);
  }





  public function forget_otp_verify(){
    $otp =$this->input->post('otp');
    extract($_POST);
    if (!empty($otp)) {
      $check_otp=$this->db->query("SELECT * FROM `users` WHERE `otp`='$otp' AND `verify_otp`= 1");
      if ($check_otp->num_rows()>0) {
        $data['result']="true";
        $data['msg']="Otp already verify";
      }else{
        $wheredata = array('field'=>'id',
          'table'=>'users',
          'where'=>array('otp'=>$otp)
        );
        $datas = array('verify_otp'=>1);
        $wheredatas = array('otp'=>$otp);
        $result=$this->User_Model->getAllData($wheredata);
        if($result) {
          $results=$this->User_Model->UpdateAllData('users',$wheredatas,$datas);
          $data['result']="true";
          // $data['data']=$this->Admin_model->select_single_row('users','id',$user_id);
          $data['msg'] ="Otp verify Successfully.";
        }else{
          $data['result'] ="false";
          $data['msg'] ="sorry otp not valid.";
        }
      }
    }else{

      $data['result']="false";

      $data['msg'] ="parameter required otp";

    }

    echo json_encode($data);
  }

  /*paushed time booking*/
  public function booking_paushed(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($booking_id) && !empty($paused_time)) {
      $where=array('id'=>$booking_id,'vendor_id'=>$vendor_id);
      $updata=array('paused_time'=>$paused_time,'job_status'=>'Paused');
      $res=$this->Api_Model->updated($where,'booking_request',$updata);
      if ($res) {
        $datas['result']="true";
        $datas['msg']="Your work time is paused";
      }else{
        $datas['result']="false";
        $datas['msg']="Sorry something went wrong";
      }
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required vendor_id,booking_id,paused_time";
    }
    echo json_encode($datas);
  }


  /*Resumed time booking*/
  public function booking_resumed(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($booking_id) && !empty($resume_time)) {
      $where=array('id'=>$booking_id,'vendor_id'=>$vendor_id);
      $updata=array('resume_time'=>$resume_time,'job_status'=>'Resume');
      $res=$this->Api_Model->updated($where,'booking_request',$updata);
      if ($res) {
        $datas['result']="true";
        $datas['msg']="Your work time is resume";
      }else{
        $datas['result']="false";
        $datas['msg']="Sorry something went wrong";
      }
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required vendor_id,booking_id,resume_time";
    }
    echo json_encode($datas);
  }


  /*Restart time booking*/
  public function booking_restart(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($booking_id) && !empty($restart_time)) {
      $where=array('id'=>$booking_id,'vendor_id'=>$vendor_id);
      $updata=array('restart_time'=>$restart_time);
      $res=$this->Api_Model->updated($where,'booking_request',$updata);
      if ($res) {
        $datas['result']="true";
        $datas['msg']="Your work time is resume";
      }else{
        $datas['result']="false";
        $datas['msg']="Sorry something went wrong";
      }
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required vendor_id,booking_id,restart_time";
    }
    echo json_encode($datas);
  }

  /*Complete time booking*/
  public function booking_complete(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($booking_id) && !empty($complete_time)) {
      $where=array('id'=>$booking_id,'vendor_id'=>$vendor_id);
      $updata=array('complete_time'=>$complete_time);
      $res=$this->Api_Model->updated($where,'booking_request',$updata);
      if ($res) {
        $datas['result']="true";
        $datas['msg']="Your work time is completed";
      }else{
        $datas['result']="false";
        $datas['msg']="Sorry something went wrong";
      }
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required vendor_id,booking_id,complete_time";
    }
    echo json_encode($datas);
  }

  /*vendor add exrta charge*/
  public function vendor_exrta_charge(){
    extract($_POST);
    if (isset($vendor_id) && isset($extra_charge) && isset($extra_material) && isset($booking_id)) {
      $where = array('vendor_id' => $vendor_id, 'id'=>$booking_id);

      $datas=array('extra_charge'=>$extra_charge,'extra_material'=>$extra_material,'extra_charge_status'=>1);

      $res=$this->Api_Model->updateData('booking_request',$datas,$booking_id);

      $get_vendor=$this->db->query("SELECT booking_request.id,users.id as userId,users.fcm_id FROM booking_request INNER JOIN users ON users.id=booking_request.user_id WHERE booking_request.id=$booking_id")->row();
    	$notification = array(
            'title'=>"Extra Demand charge",
            'body' =>"Booking ID",
            'bookingId' =>$id,
            'extra_charge' =>$extra_charge, 
            'type' =>'user'
      	);
		send_notification($notification,$get_vendor->fcm_id);
		//print_r($res);exit();
		//$dataNoti=array(
		//"bookingId"=>$id,
		// "sender_id"=>$user_id,
		//"receiver_id"=>$vendor_id,
		// "receiver_type"=>'vendor',
		//"type_job"=>'booking',
		//"message"=>'You have new booking request',
		//);
		//$this->db->insert('notification',$dataNoti);
      if ($res) {
        $json['result']="true";
        $json['msg']="submitted";
      }else{
        $json['result']="false";
        $json['msg']="sorry something went wrong";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameter required vendor_id,booking_id,extra_material,extra_charge";
    }
    echo json_encode($json);
  }


  /*pay description*/
  public function bill_detail(){
    extract($_POST);
    if (!empty($vendor_id) && isset($booking_id)) {
      $get_booking_bill=$this->Api_Model->get_billling($booking_id,$vendor_id);
      if ($get_booking_bill) {
        $json['result']="true";
        $json['msg']="booking bill details";
        $json['data']=$get_booking_bill;
        $json['refund']=$get_booking_bill->amount;
        // $json['total']=$get_booking_bill->amount-$get_booking_bill->extra_charge;
        $json['total']=$get_booking_bill->amount-$get_booking_bill->extra_charge;
      }else{
        $json['result']="false";
        $json['msg']="sorry booking id not exist";
      }
    }else{
      $json['result']="false";
      $json['msg']="parameter required vendor_id,booking_id";
    }
    echo json_encode($json);
  }


  /*booking complete confirm and send otp for complete*/
  public function booking_complete_confirm(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($booking_id)) {
      $get_otp=$this->db->query("SELECT * FROM booking_request WHERE id=$booking_id ")->row()->otp;
      $random_no = rand(1000,9999);
      
      $where=array('id'=>$booking_id,'vendor_id'=>$vendor_id);
      $updata=array('verify_otp'=>0,'otp'=>$random_no);
      $res=$this->Api_Model->updated($where,'booking_request',$updata);
      if ($res) {
        $datas['result']="true";
        $datas['msg']="Your Booking is completed";
        $datas['otp']=$random_no;
      }else{
        $datas['result']="false";
        $datas['msg']="Sorry something went wrong";
      }
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required vendor_id,booking_id";
    }
    echo json_encode($datas);
  }


  /*booking completed by user after verify otp*/
  public function booking_completed_by_user(){
    extract($_POST);
    if (!empty($user_id) && !empty($booking_id) && !empty($otp)) {
      $where=array('id'=>$booking_id,'user_id'=>$user_id);
      $get_otps=$this->db->query("SELECT * FROM booking_request WHERE id=$booking_id")->row();
      $get_otp=$get_otps->otp;
      $get_status=$get_otps->job_status;
      $get_points=$this->db->query("SELECT users.id,users.job_points,booking_request.vendor_id FROM users LEFT JOIN booking_request ON users.id=booking_request.vendor_id WHERE booking_request.id=$booking_id")->row();
       $vendor_points=$get_points->job_points;
       $vendorId=$get_points->vendor_id;
       if ($get_status!='Complete') {
       	
       
	      if ($get_otp==$otp) {
	        $updata=array('job_status'=>'Complete','verify_otp'=>1);

	        $where2=array('id'=>$vendorId);

	        $updata2=array('job_points'=>$vendor_points+1);
	        $res=$this->Api_Model->updated($where,'booking_request',$updata);
	        $res=$this->Api_Model->updated($where2,'users',$updata2);
	        if ($res) {
	          $datas['result']="true";
	          $datas['msg']="Your Booking is completed";
	        }else{
	          $datas['result']="false";
	          $datas['msg']="Sorry something went wrong";
	        }
	      }else{
	        $datas['result']="false";
	        $datas['msg']="Invalid OTP";
	      }
		}else{
			$datas['result']="false";
			$datas['msg']="Job Already completed";
		}
      
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required user_id,booking_id,otp";
    }
    echo json_encode($datas);
  }


  public function completed_booking(){
    extract($_POST);
    if (!empty($id)) {
      
      $res=$this->Api_Model->get_com_cancel_booking($id);
      if ($res) {
        $datas['result']="true";
        $datas['msg']="Your completed Booking";
        $datas['data']=$res;
      }else{
        $datas['result']="false";
        $datas['msg']="Sorry something went wrong";
      }
    }else{
      $datas['result']="false";
      $datas['msg'] ="Parameter required id";
    }
    echo json_encode($datas);
  }



  /*get pending user booking*/
  public function get_user_booking(){
    extract($_POST);
    if (!empty($user_id)) {
      $res=$this->Api_Model->getUserUpcommingData($user_id);
      $get_user_upcom=$this->Api_Model->getUserAwardedJob($user_id);
      if ($res) {
        $json['result']="true";
        $json['msg']="Your Booking list";
        $json['new_booking']=$res;
        $json['job']=$get_user_upcom;
      }else{
        $json['result']="false";
        $json['msg']="Sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="Param required user_id";
    }
    echo json_encode($json);
  }


  /*notification*/
  public function get_notification(){
    $vid=$this->input->post('vid');
    
    if (!empty($vid)) {
      
        $res=$this->Api_Model->getNotification($vid);
     
      if ($res) {
        $json['result']="true";
        $json['msg']="vendor's notification list";
        $json['data']= $res;
      }else{
        $json['result']="false";
        $json['msg']="data not found";
      }
    }else{
      $json['result']="false";
      $json['msg']="Param required vid";
    }
     echo json_encode($json);
  }

  /*get user notification*/
  public function get_user_notification(){
    $uid=$this->input->post('uid');
    
    if (!empty($uid)) {
      
        $res=$this->Api_Model->get_user_notification($uid);
     
      if ($res) {
        $json['result']="true";
        $json['msg']="user's notification list";
      }else{
        $json['result']="false";
        $json['msg']="data not found";
      }
    }else{
      $json['result']="false";
      $json['msg']="Param required uid";
    }
     echo json_encode($json);
  }



  /*Get latest offer*/
  public function get_latest_offer(){
    $get_offers=$this->Api_Model->getOffers();
    if ($get_offers) {
      $json['result']="true";
      $json['msg']="offers list";
      $json['data']=$get_offers;
    }else{
      $json['result']="false";
      $json['msg']="offers list";
    }
    echo json_encode($json);
  }


  /*Get expiry soon offers*/
  public function get_expiry_soon(){
    $get_offers=$this->Api_Model->getExipryOffers();
    if ($get_offers) {
      $json['result']="true";
      $json['msg']="offers list";
      $json['data']=$get_offers;
    }else{
      $json['result']="false";
      $json['msg']="offers list";
    }
    echo json_encode($json);
  }


   /*Get offers*/
  public function get_all_offers(){
    $get_offers=$this->Api_Model->getAllOffers();
    if ($get_offers) {
      $json['result']="true";
      $json['msg']="offers list";
      $json['data']=$get_offers;
    }else{
      $json['result']="false";
      $json['msg']="offers list";
    }
    echo json_encode($json);
  }


  /*JOB REQUIRES*/
  public function job_post(){
    extract($_POST);
    if (!empty($user_id) && !empty($date) && isset($time) && !empty($location) && !empty($description) && isset($bid_per) && !empty($bid_min_range) && !empty($bid_max_range) && isset($estimate_time) && isset($accept_bid_for) && !empty($language) && !empty($key_skills) && isset($job_type) && isset($apply_type)) {
      $dataInfo = array();
      $dataInfo1 = array();
      $files = $_FILES;
      if(isset($_FILES["attachment"]) && $_FILES["attachment"]["size"]['0'] > 0){
        $cpt = count($_FILES['attachment']["name"]);
        for($i=0; $i<$cpt; $i++)
        {
          $_FILES['attachment']['name']= $files['attachment']['name'][$i];
          $_FILES['attachment']['type']= $files['attachment']['type'][$i];
          $_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
          $_FILES['attachment']['error']= $files['attachment']['error'][$i];
          $_FILES['attachment']['size']= $files['attachment']['size'][$i];
          $config = array();
          $config['upload_path'] = 'assets/uploaded/users/';
          $config['allowed_types'] = '*';
          $config['max_size'] = '*';
          $config['overwrite'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload('attachment');
          $dataInfo[] = $this->upload->data();
          array_push($dataInfo1, $dataInfo[$i]['file_name']);
        }
        $fileName = implode(',',$dataInfo1);
          $_POST['attachment']=$fileName;
        }
        $job_id_data = $this->Admin_model->get_last_creted_id('job_id','job_requires');
        if($job_id_data)
        {
          $job_id = $job_id_data->job_id;
            $job_id++;
          }else{
          $job_id = "200001";
        }
        $_POST['job_id']=$job_id;
        $_POST['type']='Job requirement';
        $res=$this->db->insert('job_requires',$_POST);
        $idss = $this->db->insert_id();

        if ($res) {
          $get_vendor=$this->db->query("SELECT * FROM users WHERE service_provider=1 and id!='".$user_id."' ")->result_array();
          if(count($get_vendor))
          {

            foreach ($get_vendor as $jobs) 
            {

              $notification = array(
                'title'=>"Bid Job requirement",
                'body' =>"Job ID",
                'bookingId' =>$idss 
              );
              send_notification($notification,$get_vendor['fcm_id']);
              $dataNoti=array(
                "bookingId"=>$idss,
                "sender_id"=>$user_id,
                "receiver_id"=>$jobs['id'],
                "receiver_type"=>'vendor',
                "type"=>'job',
                "message"=>'You have new job request',
              );
              $this->db->insert('notification',$dataNoti);
            }
          }
          $json['result'] = "true";
          $json['msg'] = "Job success";
        }else{
          $json['result'] = "false";
          $json['msg'] = "Sorry something went wrong";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameters required user_id,date,time,location,estimate_time,description,attachment,bid_per,bid_min_range,bid_max_range,accept_bid_for,language,key_skills,job_type,apply_type(optional)";
    }
    echo json_encode($json);
  }


  /*get user job post*/
  public function user_posted_job(){
    $user_id=$this->input->post('user_id');
    if (!empty($user_id)) {
      $get_post=$this->Api_Model->GetPostedJob($user_id);
      foreach ($get_post as $jobs) 
        {
           $jobs->total_bid=$this->Api_Model->get_bid_on_job($jobs->id); 
           $jobs->avg_range=$this->Api_Model->get_range($jobs->id); 
        }
      if ($get_post) {
        $json['result'] = "true";
        $json['msg'] = "Your posted job list";
        $json['data'] = $get_post;
      }else{
        $json['result'] = "false";
        $json['msg'] = "sorry don't have posted any job ";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameter required user_id";
    }
    echo json_encode($json);
  }


  	/*get vendor posted job (New)*/
	public function get_vendor_jobs(){
	    $user_id=$this->input->post('user_id');
	    if (!empty($user_id)) {
	      $get_post=$this->Api_Model->get_vendor_job($user_id);
	      foreach ($get_post as $jobs) 
	        {
	           //$jobs->total_bid=$this->Api_Model->get_bid_on_job($jobs->id); 
	           $jobs->total_bid=$this->Api_Model->get_bid_on_jobNotOnBid($jobs->id,$user_id); 
	           $jobs->avg_range=$this->Api_Model->get_range($jobs->id);  
	        }
	      if ($get_post) {
	        $json['result'] = "true";
	        $json['msg'] = "Get job list";
	        $json['data'] = $get_post;
	      }else{
	        $json['result'] = "false";
	        $json['msg'] = "sorry don't have any job ";
	      }
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "parameter required user_id";
	    }
    	echo json_encode($json);
  	}


  /*Vendor Bid at posted job*/
  public function vendor_bid_at_job(){
    extract($_POST);
    if (!empty($vendor_id) && !empty($job_id) && !empty($bid_amount) && !empty($proposal) && isset($estimated_time) && isset($submission_type)){
        if(!$this->User_Model->is_record_exist_update('bid_on_job','job_id',$job_id,$vendor_id))
        {
        $dataInfo = array();
        $dataInfo1 = array();
        $files = $_FILES;
        if(isset($_FILES["attachment"]) && $_FILES["attachment"]["size"]['0'] > 0){
          $cpt = count($_FILES['attachment']["name"]);
          for($i=0; $i<$cpt; $i++)
          {
            $_FILES['attachment']['name']= $files['attachment']['name'][$i];
            $_FILES['attachment']['type']= $files['attachment']['type'][$i];
            $_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
            $_FILES['attachment']['error']= $files['attachment']['error'][$i];
            $_FILES['attachment']['size']= $files['attachment']['size'][$i];
            $config = array();
            $config['upload_path'] = 'assets/uploaded/users/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '*';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('attachment');
            $dataInfo[] = $this->upload->data();
            array_push($dataInfo1, $dataInfo[$i]['file_name']);
          }
          $fileName = implode(',',$dataInfo1);
          $_POST['attachment']=$fileName;
        }
        $bid_post=$this->db->insert('bid_on_job',$_POST);
        $postData['bid_status']=1;
        $this->db->where('id',$job_id);
        $this->db->update('job_requires',$postData);
      
        if ($bid_post) {
          $json['result'] = "true";
          $json['msg'] = "Bid submitted successfully";
        }else{
          $json['result'] = "false";
          $json['msg'] = "sorry don't have posted any job ";
        }

      }else{
        $json['result'] = "false";
        $json['msg'] = "sorry you have alredy posted at this job ";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameter required vendor_id,job_id,bid_amount,proposal,estimated_time,attachment,submission_type";
    }
    echo json_encode($json);
  }


  /*user Bid list at job*/
  public function get_bid_list(){
    $job_id=$this->input->post('job_id');
    
    if (!empty($job_id)) {
      $get_bid=$this->Api_Model->getBids($job_id);
      //print_r($get_bid);exit();
      foreach ($get_bid as $key => $value) {
      	$value->skills=$this->Api_Model->get_v_skills($value->vendor_id);
      	$value->v_skills=$this->Api_Model->get_skills($value->skills);
      	$value->rating=$this->Api_Model->get_avg_rating($value->vendor_id);
      	$value->total=$this->Api_Model->get_vendor_service($value->vendor_id);
      	$value->job_points=$this->Api_Model->get_rank($value->vendor_id);
      	$value->usersconn=$this->Api_Model->countAwarded($value->vendor_id);
      	$value->avg_range=$this->Api_Model->get_range($value->job_id);
      }
      if ($get_bid){
        $json['result'] = "true";
        $json['msg']    = "Bid list";
        $json['data']   = $get_bid;
       
      }else{
        $json['result'] = "false";
        $json['msg'] = "Not any bid detail";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameter required job_id";
    }
    echo json_encode($json);
  }


  /*Bid regect by user*/
  public function bid_reject(){
    extract($_POST);
    $date=date('Y-m-d H:i');
    if (!empty($user_id) && isset($bid_id) && isset($job_id)) {
      $where=array('id'=>$bid_id,'job_id'=>$job_id);
      $datas=array('reject_by'=>$user_id,'status'=>2,'modify_date'=>$date);
      $regect=$this->Api_Model->updated($where,'bid_on_job',$datas);
      if ($regect) {
        $json['result'] = "true";
        $json['msg'] = "Bid rejected successfully";
      }else{
        $json['result'] = "false";
        $json['msg'] = "sorry something went wrong";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameter required user_id,bid_id,job_id";
    }
    echo json_encode($json);
  }

  	/*Bid awarded by user*/
  	public function bid_awarded_by_user(){
	    extract($_POST);
	    $date=date('Y-m-d H:i');
	    if (!empty($user_id) && isset($bid_id) && isset($job_id) ) {
	      $getBid=$this->db->query("SELECT * FROM bid_on_job WHERE id=$bid_id AND status=0");
	      	if ($getBid->num_rows()>0) {
		        $where=array('id'=>$bid_id,'job_id'=>$job_id);
		        $datas=array('accepted_by'=>$user_id,'status'=>1,'modify_date'=>$date);
		        $regect=$this->Api_Model->updated($where,'bid_on_job',$datas);
		        if ($regect) {
		          $json['result'] = "true";
		          $json['msg'] = "Bid awarded successfully";
		        }else{
		          $json['result'] = "false";
		          $json['msg'] = "sorry something went wrong";
		        }
			}else{
				$json['result'] = "false";
				$json['msg'] = "sorry bid alredy cancel/awarded";
			}
	      
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "parameter required user_id,bid_id,job_id";
	    }
	    echo json_encode($json);
  	}

	/*Top Picks */
	public function Top_Picks(){
		$user_id=$this->input->post('user_id');
		if (isset($user_id)) {
		  //$get_user=$this->Api_Model->getVendorsss();
		  $get_user=$this->Api_Model->getTopVendor();
		  foreach ($get_user as $value) {

		    $value->skills=$this->Api_Model->get_skills($value->skills);

		    $value->avg_rating=$this->Api_Model->get_avg_rating($value->vendor_id);
		    $value->total_job=$this->Api_Model->get_vendor_service($value->vendor_id);
		  }
		  if ($get_user) {
		    $json['result'] = "true";
		    $json['msg'] = "all vendor";
		    $json['data'] = $get_user;
		  }else{
		    $json['result'] = "false";
		  $json['msg'] = "sorry data not found";
		  }
		}else{
		  $json['result'] = "false";
		  $json['msg'] = "parameter required user_id";
		}
		echo json_encode($json);
	}


  /*Multimove job post for multimove*/
  public function multi_move_job_post(){
    extract($_POST);
    if (!empty($user_id) && !empty($date) && isset($time) && !empty($location) && !empty($weight) && !empty($to_location) && !empty($end_location) && isset($description) && isset($bid_min_range) && isset($bid_max_range) && isset($bid_per) && isset($estimate_time) && !empty($key_skills) && isset($vehical_type) && isset($language) && isset($accept_bid_for)) {
      $dataInfo = array();
      $dataInfo1 = array();
      $files = $_FILES;
      //$_FILES["upload_doc"]=$_POST['attachment'];
      //unset($_POST['attachment']);
      if(isset($_FILES["attachment"]) && $_FILES["attachment"]["size"]['0'] > 0){
        $cpt = count($_FILES['attachment']["name"]);
        for($i=0; $i<$cpt; $i++)
        {
          $_FILES['attachment']['name']= $files['attachment']['name'][$i];
          $_FILES['attachment']['type']= $files['attachment']['type'][$i];
          $_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
          $_FILES['attachment']['error']= $files['attachment']['error'][$i];
          $_FILES['attachment']['size']= $files['attachment']['size'][$i];
          $config = array();
          $config['upload_path'] = 'assets/uploaded/users/';
          $config['allowed_types'] = '*';
          $config['max_size'] = '*';
          $config['overwrite'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload('attachment');
          $dataInfo[] = $this->upload->data();
          array_push($dataInfo1, $dataInfo[$i]['file_name']);
        }
        $fileName = implode(',',$dataInfo1);
          $_POST['attachment']=$fileName;
        }
       
        $job_id_data = $this->Admin_model->get_last_creted_id('job_id','job_requires');
        if($job_id_data)
        {
          $job_id = $job_id_data->job_id;
            $job_id++;
          }else{
          $job_id = "200001";
        }
        $_POST['job_id']=$job_id;
        $_POST['job_cat_type']='multi_move';
        $_POST['type']='multi move job';
        
        $res=$this->db->insert('job_requires',$_POST);
        $id = $this->db->insert_id();
        if ($res) {
          $get_vendor=$this->db->query("SELECT id,skills,fname,fcm_id FROM users WHERE skills like '%$key_skills%'")->result_array();
          foreach ($get_vendor as $key => $value) {
            $notification = array(
            'title'=>"Multi move Job",
            'body' =>"Booking ID",
            'bookingId' =>$id 
            );
            send_notification($notification,$value['fcm_id']);
            $dataNoti=array(
				"bookingId"=>$id,
				"sender_id"=>$user_id,
				"receiver_id"=>$value['id'],
				"type"=>'multi_move',
				"type_job"=>'booking',
				"receiver_type"=>'vendor',
				"message"=>'You have new job request',
            );
            $this->db->insert('notification',$dataNoti);
          }
          $json['result'] = "true";
          $json['msg'] = "Job success";
        }else{
          $json['result'] = "false";
          $json['msg'] = "Sorry something went wrong";
      }
    }else{
      $json['result'] = "false";
      $json['msg'] = "parameters required user_id,date,time,location,to_location,end_location,weight,description,attachment,bid_min_range,bid_max_range,bid_per,estimate_time,key_skills,vehical_type,language,accept_bid_for";
    }
    echo json_encode($json);
  }


  /*upcomming booking list*/
  public function get_upcoming_booking(){
    extract($_POST);
    if (!empty($vendor_id)) {
      $res=$this->Api_Model->get_upcomming_booking($vendor_id);
      $get_awarded_job=$this->Api_Model->get_awarded_job($vendor_id);
      if ($res) {
        $json['result']="true";
        $json['msg']="New Booking list";
        $json['new_booking']=$res;
        $json['confirm_bid']=$get_awarded_job;
      }else{
        $json['result']="false";
        $json['msg']="sorry doesn't new order";
      }
    }else{
      $json['result']="false";
      $json['msg']="param required vendor_id";
    }
    echo json_encode($json);


  }


  //upcomming job data
  public function get_upcomimg_job(){
  	extract($_POST);
  	if ($vendor_id) {
  		$get_awarded_job=$this->Api_Model->get_awarded_job($vendor_id);
  		if ($get_awarded_job) {
  			$data['result']="true";
  			$data['msg']="Your comming jobs";
  			$data['data']=$get_awarded_job;
  		}else{
  		$data['result']="false";	
  		$data['msg']="sorry not any upcomming job available";	
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="parameters required vendor_id";
  	}
  	echo json_encode($data);
  }


  	//Get vendor bid list
	public function get_vendor_bid_list(){
		extract($_POST);
	  if (isset($vendor_id)) {
	  	$res=$this->Api_Model->getVendorBidList($vendor_id);
	  	foreach ($res as $value) {
  			$value->total_bid=$this->Api_Model->get_bid_on_job($value->job_id);
  			$value->avg_range=$this->Api_Model->get_range($value->job_id);
  			
  		}
	  	if ($res) {
	  		$json['result']="true";
	  		$json['msg']="vendor bid list";
	  		$json['data']=$res;
	  	}else{
	  		$json['result']="false";
	  		$json['msg']="sorry data not found!!";
	  	}
	  	
	  }else{
	  	$json['result']="false";
	  	$json['msg']="param required vendor_id";
	  }
  		echo json_encode($json);
  	}


  	//Get vendor all bid list
	public function get_vendor_allbid_list(){
		extract($_POST);
	  if (isset($vendor_id)) {
	  	$res=$this->Api_Model->getVendorPlacedBidList($vendor_id);
	  	foreach ($res as $value) {
  			$value->total_bid=$this->Api_Model->get_Allbid_on_job($value->job_id);
  			$value->avg_range=$this->Api_Model->get_range($value->job_id);
  		}
	  	if ($res) {
	  		$json['result']="true";
	  		$json['msg']="vendor placed bid list";
	  		$json['data']=$res;
	  	}else{
	  		$json['result']="false";
	  		$json['msg']="sorry data not found!!";
	  	}
	  	
	  }else{
	  	$json['result']="false";
	  	$json['msg']="param required vendor_id";
	  }
  		echo json_encode($json);
  	}


  	//Get users bid list at job
	public function get_user_bid_list(){
		extract($_POST);
	  if (isset($user_id)) {
	  	$res=$this->Api_Model->getUserBidList($user_id);
	  	foreach ($res as $value) {
  			$value->total_bid=$this->Api_Model->get_bid_on_job($value->job_id);
  			$value->avg_range=$this->Api_Model->get_range($value->job_id);
  		}
	  	if ($res) {
	  		$json['result']="true";
	  		$json['msg']="user bid list";
	  		$json['data']=$res;
	  	}else{
	  		$json['result']="false";
	  		$json['msg']="sorry data not found!!";
	  	}
	  	
	  }else{
	  	$json['result']="false";
	  	$json['msg']="param required user_id";
	  }
  		echo json_encode($json);
  	}


  ////////////////////////DISCUSSION CHAT LIST///////////////////////////////////		

  //user discussion to vendor
  public function user_discuss_with_vendor(){
  	extract($_POST);
  	if (isset($user_id) && isset($job_id) && isset($vendor_id) && isset($message)) {

  		$datas=array('job_id'=>$job_id,'user_id'=>$user_id,'vendor_id'=>$vendor_id,'user_msg'=>$message,'date_time'=>date('Y-m-d h:i'));

  		if(!empty($_FILES['files']['name']))
        {
          $_FILES['file']['name']     = $_FILES['files']['name'];
          $_FILES['file']['type']     = $_FILES['files']['type'];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
          $_FILES['file']['error']    = $_FILES['files']['error'];
          $_FILES['file']['size']     =  $_FILES['files']['size'];
          $uploadPath = 'assets/uploaded/users/';
          $config['upload_path'] = $uploadPath;
          $config['allowed_types'] = '*';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if($this->upload->do_upload('file')){
            $fileData = $this->upload->data();
            $datas['files'] = $fileData['file_name'];
          }
        }
  		
  		$res=$this->Api_Model->insertAllData('tbl_discussion',$datas);
  		if ($res) {
  			$data['result']="true";
  			$data['msg']="message sent successfully";
  		}else{
  			$data['result']="false";
  			$data['msg']="sorry something went wrong!!";
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="param required job_id,user_id,vendor_id,message,optional(files)";
  	}
  	echo json_encode($data);
  }


  //user discussion to vendor
  public function vendor_discuss_with_user(){
  	extract($_POST);
  	if (isset($user_id) && isset($vendor_id) && isset($message) && isset($job_id)) {
  		$datas=array('job_id'=>$job_id,'vendor_id'=>$vendor_id,'user_id'=>$user_id,'vendor_msg'=>$message,'date_time'=>date('Y-m-d h:i'));
  		if(!empty($_FILES['files']['name']))
        {
          $_FILES['file']['name']     = $_FILES['files']['name'];
          $_FILES['file']['type']     = $_FILES['files']['type'];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
          $_FILES['file']['error']    = $_FILES['files']['error'];
          $_FILES['file']['size']     =  $_FILES['files']['size'];
          // File upload configuration
          $uploadPath = 'assets/uploaded/users/';
          $config['upload_path'] = $uploadPath;
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          // Upload file to server
          if($this->upload->do_upload('file')){
            $fileData = $this->upload->data();
              $datas['files'] = $fileData['file_name'];
          }
        }
  		$res=$this->Api_Model->insertAllData('tbl_discussion',$datas);
  		if ($res) {
  			$data['result']="true";
  			$data['msg']="message sent successfully";
  		}else{
  			$data['result']="false";
  			$data['msg']="sorry something went wrong!!";
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="param required job_id,vendor_id,user_id,message,optional(files)";
  	}
  	echo json_encode($data);
  }


  //user discussion to vendor
  public function user_get_chat(){
  	extract($_POST);
  	if (isset($user_id) && isset($job_id) &&  isset($vendor_id)) {

  		if ($job_id=="") {
  			$res=$this->Api_Model->getMsgSenderNotJobId($user_id,$vendor_id);

  		}else{

  			$res=$this->Api_Model->getMsgSender($user_id,$job_id,$vendor_id);
  		}
  		if ($res) {
  			$data['result']="true";
  			$data['msg']="All chat list";
  			$data['data']=$res;
  		}else{
  			$data['result']="false";
  			$data['msg']="sorry something went wrong!!";
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="param required user_id,job_id(optional),vendor_id";
  	}
  	echo json_encode($data);
  }


  //user discussion to vendor
  public function vendor_get_chat(){
  	extract($_POST);
  	if (isset($vendor_id) && isset($job_id) && isset($user_id)) {
  		if ($job_id=="") {
  			$res=$this->Api_Model->getMsgVendorOptJob($vendor_id,$user_id);
  		}else{
  			$res=$this->Api_Model->getMsgVendor($vendor_id,$job_id,$user_id);
  		}
  		
  		if ($res) {
  			$data['result']="true";
  			$data['msg']="All chat list";
  			$data['data']=$res;
  		}else{
  			$data['result']="false";
  			$data['msg']="Not here any chat listing at this job!!";
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="param required vendor_id,optional(job_id),user_id";
  	}
  	echo json_encode($data);
  }


  //my chat user's list
  public function discussion_list(){
  	extract($_POST);
  	if (isset($user_id) && isset($job_id)) {
  		if ($job_id=="") {
  			$res=$this->Api_Model->MychatUsersList($user_id);
  		}else{

  			$res=$this->Api_Model->MychatUsers($user_id,$job_id);

  		}
  		
  		if ($res) {
  			$data['result']="true";
  			$data['msg']="All chat vendor list";
  			$data['data']=$res;
  		}else{
  			$data['result']="false";
  			$data['msg']="sorry data not found!!";
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="param required user_id,job_id";
  	}
  	echo json_encode($data);
  }



  public function vendor_discussion_list(){
  	extract($_POST);
  	if (isset($vendor_id) && isset($job_id)) {
  		if ($job_id=="") {
  			$res=$this->Api_Model->AllVendorChatList($vendor_id);
  		}else{
  			$res=$this->Api_Model->chatUsersList($vendor_id,$job_id);
  		}
  		
  		if ($res) {
  			$data['result']="true";
  			$data['msg']="All chat user list";
  			$data['data']=$res;
  		}else{
  			$data['result']="false";
  			$data['msg']="sorry data not found!!";
  		}
  	}else{
  		$data['result']="false";
  		$data['msg']="param required vendor_id,job_id";
  	}
  	echo json_encode($data);
  }


  //get bid vendor list at job
  public function vendors_on_job_bid(){
  	extract($_POST);
  	if(!empty($vendor_id) && !empty($job_id)){
  		$result=$this->Api_Model->getVendorBids($job_id);

  		foreach ($result as $key => $value) {
  			$value->rating=$this->Api_Model->get_avg_rating($value->vendor_id);
	      	//$value->total=$this->Api_Model->get_vendor_service($value->vendor_id);
	      	$value->rank=$this->Api_Model->get_rank($value->vendor_id);
	      	$value->usersconn=$this->Api_Model->countAwarded($value->vendor_id);
  		}
  		if ($result) {
  			$data['result']=true;
  			$data['msg']="All bid vendors";
  			$data['job_id']=$job_id;
  			$data['bid_range']=$this->db->query("SELECT group_concat(bid_min_range,'-',bid_max_range) as bid_range FROM job_requires WHERE id='".$job_id."'")->row()->bid_range;
  			$data['data']=$result;
  		}else{
  			$data['result']=false;
  			$data['msg']="sorry not any bid";
  		}
  	}else{
  		$data['result']=false;
  		$data['msg']="param required vendor_id,job_id";
  	}
  	echo json_encode($data);

  } 

  

	/*
  	@submit changes profile
  	user_update_profile
  	*/
	public function add_vendor_profile()
  	{
	    extract($_POST);
	    if(isset($id) )
	    {
			//if(!$this->User_Model->is_record_exist_update('users','phone', $mobile,$id))
			if($this->User_Model->is_record_exist('users','id', $id))
			{
  				
          		$validitymobile = $this->check_duplicationmobile('on_updatemobile', $mobile, $user_id);
          		
        		if (!$validitymobile) {
            		if (!empty($mobile)) {
                		$post_data['phone'] = $mobile;
            		}
	          		//$post_data= (array) $this->input->post();
			        if(!empty($_FILES['image']['name']))
			        {
			          $_FILES['file']['name']     = $_FILES['image']['name'];
			          $_FILES['file']['type']     = $_FILES['image']['type'];
			          $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			          $_FILES['file']['error']     = $_FILES['image']['error'];
			          $_FILES['file']['size']     =  $_FILES['image']['size'];
			          // File upload configuration
			          $uploadPath = 'assets/uploaded/users/';
			          $config['upload_path'] = $uploadPath;
			          $config['allowed_types'] = 'jpg|jpeg|png|gif';
			          // Load and initialize upload library
			          $this->load->library('upload', $config);
			          $this->upload->initialize($config);
			          // Upload file to server
			          if($this->upload->do_upload('file')){
			            // Uploaded file data
			            $fileData = $this->upload->data();
			            $post_data['image'] = $fileData['file_name'];
			          }
			        }
			        if(!empty($_FILES['id_proof']['name'])){
			          $config['upload_path'] = 'assets/uploaded/users/';
			          $config['allowed_types'] = 'jpg|jpeg|png';
			          //Load upload library and initialize configuration
			          $this->load->library('upload',$config);
			          $this->upload->initialize($config);
			          if($this->upload->do_upload('id_proof')){
			            $uploadData = $this->upload->data();
			            $id_proof = $uploadData['file_name'];
			          }else{
			            $id_proof = '';
			          }
			          $post_data['id_proof'] = $id_proof;
			        }
					$post_data['fname'] = $this->input->post('name');
					unset($post_data['name']);
					//$post_data['phone'] = $this->input->post('mobile');
					//unset($post_data['mobile']);
					$post_data['qualification'] = $qualification;
					$post_data['about'] = $this->input->post('about');
					$post_data['language'] = $this->input->post('language');
					$post_data['dob'] = $this->input->post('dob');
					$post_data['gender'] = $this->input->post('gender');
					$post_data['skills'] = $this->input->post('skills');
					$post_data['profession_id'] = $this->input->post('profession_id');
					$post_data['pr_hours'] =$this->input->post('pr_hours');
					$post_data['pr_days'] =$this->input->post('pr_days');
					$post_data['min_charge'] =$this->input->post('min_charge');
					$post_data['extra_charge'] =$this->input->post('extra_charge');
					$post_data['address']=$this->input->post('address');
					$post_data['service_provider'] =1;
					$wheredata=array('id'=>$id);
					$update =  $this->User_Model->updatePass($wheredata,'users',$post_data);
					if($update)
					{
						$json['result'] = "true";
						$json['msg'] = "profile data.";
						$json['data']=  $this->User_Model->select_single_row('users','id',$id);
					}else{
						$json['result'] = "false";
						$json['msg'] = "Something went wrong.";
					}

				}else{
	      			$json['result'] = "false";
					$json['msg'] = "Mobile No already Exist.";
	      		}
	        }else{
	          $json['result'] = "false" ;
	          $json['msg'] = "user Not exits.";
	        }
		}else{
			$json['result'] = "false";
			$json['msg'] = "Please give parameters(id,mobile,name,profession_id,language,skills,qualification,about,id_proof,image(optional),pr_hours,pr_days,min_charge,extra_charge),dob,address(optional),gender";
		}
      	echo json_encode($json);
    }


	public function vendor_update_profile()
	{

	    $json = array();

	    extract($_POST);

	    if(isset($user_id))

	    {

	      if(!$this->Admin_model->is_record_exist_update('users','email', $post_data['email'], $user_id))

	      {

	        if(!$this->Admin_model->is_record_exist_update('users','phone', $post_data['mobile'],$user_id))

	        {
	        	$post_data['fname']=$name;
	        	$post_data['phone']=$mobile;
	        	$post_data['email']=$email;
	        	$post_data['dob'] = $dob;
	        	$post_data['gender'] = $gender;
	        	$post_data['profession_id'] = $profession_id;
	            
	            $update =  $this->Admin_model->updateData('users',$post_data, $user_id);

	            if($update)

	            {

	              $json['result'] = "true";

	              $json['msg'] = "profile data.";

	              $json['data'] =  $this->Admin_model->select_single_row('users','id',$user_id);

	            }else{

	              $json['result'] = "false";

	              $json['msg'] = "Something went wrong.";

	            }

	        }else{

	            $json['result'] = "false" ;

	            $json['msg'] = "Mobile number already exits. Please Try another.";

	        }

		}else{

			$json['result'] = "false" ;

			$json['msg'] = "Email already exits. Please Try another.";

		}

    }else{

      $json['result'] = "false";

      $json['msg'] = "Please give parameters(user_id,name,mobile,email,dob,profession_id,gender)";

    }

    echo json_encode($json);

  }


  	//update skills
  	public function vendor_update_skills()
	{
	    $json = array();
	    extract($_POST);
	    if(isset($user_id))
	    { 
	    	$post_data['qualification']=$qualification;
	    	$post_data['language']=$language;
	    	$post_data['skills']=$skills;
	    	$post_data['about'] = $about;
	        $update =  $this->Admin_model->updateData('users',$post_data, $user_id);
	        if($update)
	        {
	          $json['result'] = "true";
	          $json['msg'] = "profile data.";
	          $json['data'] =  $this->Admin_model->select_single_row('users','id',$user_id);
	        }else{
	          $json['result'] = "false";
	          $json['msg'] = "Something went wrong.";
	        }
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "Please give parameters(user_id,qualification,language,skills,about)";
	    }
    	echo json_encode($json);

  	}

  	///vendor_update_tariff
  	public function vendor_update_tariff()
	{
	    $json = array();
	    extract($_POST);
	    if(isset($user_id))
	    { 
	    	$post_data['pr_hours']=$pr_hours;
	    	$post_data['pr_days']=$pr_days;
	    	$post_data['min_charge']=$min_charge;
	    	$post_data['extra_charge'] = $extra_charge;
	        $update =  $this->Admin_model->updateData('users',$post_data, $user_id);
	        if($update)
	        {
	          $json['result'] = "true";
	          $json['msg'] = "profile data.";
	          $json['data'] =  $this->Admin_model->select_single_row('users','id',$user_id);
	        }else{
	          $json['result'] = "false";
	          $json['msg'] = "Something went wrong.";
	        }
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "Please give parameters(user_id,pr_hours,pr_days,min_charge,extra_charge)";
	    }
    	echo json_encode($json);
  	}

  	//bid job payment
  	public function bid_job_payment(){
  		extract($_POST);
  		if (!empty($user_id) && !empty($vendor_id) && !empty($bid_job_id) && !empty($amount) && !empty($payment_type)) {
  			$res=$this->db->insert('bid_job_payment',$_POST);
  			if ($res) {
  				$json['result'] = "true";
  				$json['msg'] = "Payment success";
  			}else{
  				$json['result'] = "false";
  				$json['msg'] = "sorry something went wrong";
  			}
  		}else{
  			$json['result'] = "false";
  			$json['msg'] = "Please give parameters(user_id,vendor_id,bid_job_id,amount,payment_type)";
  		}
  		echo json_encode($json);
  	}

  	//update bid detail
  	public function update_bid_job(){
  		extract($_POST);
    	if (!empty($vendor_id) && !empty($job_id) && isset($bid_amount) && isset($proposal) && isset($estimated_time) && isset($submission_type)){
        if($this->User_Model->is_record_exist_update('bid_on_job','job_id',$job_id,$vendor_id))
        {
	        $dataInfo = array();
	        $dataInfo1 = array();
	        $files = $_FILES;
	        if(isset($_FILES["attachment"]) && $_FILES["attachment"]["size"]['0'] > 0){
	          $cpt = count($_FILES['attachment']["name"]);
	          for($i=0; $i<$cpt; $i++)
	          {
	            $_FILES['attachment']['name']= $files['attachment']['name'][$i];
	            $_FILES['attachment']['type']= $files['attachment']['type'][$i];
	            $_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
	            $_FILES['attachment']['error']= $files['attachment']['error'][$i];
	            $_FILES['attachment']['size']= $files['attachment']['size'][$i];
	            $config = array();
	            $config['upload_path'] = 'assets/uploaded/users/';
	            $config['allowed_types'] = '*';
	            $config['max_size'] = '*';
	            $config['overwrite'] = TRUE;
	            $config['encrypt_name'] = TRUE;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('attachment');
	            $dataInfo[] = $this->upload->data();
	            array_push($dataInfo1, $dataInfo[$i]['file_name']);
	          }
	          $fileName = implode(',',$dataInfo1);
	          $postData['attachment']=$fileName;
	        }
	        $postData['bid_amount']=$bid_amount;
	        $postData['proposal']=$proposal;
	        $postData['estimated_time']=$estimated_time;
	        $postData['submission_type']=$submission_type;
	        $wheredata=array('job_id'=>$job_id,'vendor_id'=>$vendor_id);
	        $result=$this->User_Model->updates('bid_on_job',$postData,$wheredata);
	      
	        if ($result) {
	          $json['result'] = "true";
	          $json['msg'] = "Bid updated successfully";
	        }else{
	          $json['result'] = "false";
	          $json['msg'] = "sorry don't have posted any job ";
	        }

	      }else{
	        $json['result'] = "false";
	        $json['msg'] = "sorry you have alredy posted at this job ";
	      }
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "parameter required vendor_id,job_id,bid_amount,proposal,estimated_time,attachment,submission_type";
	    }
    	echo json_encode($json);
  	}


  	//online job everywhere
  	public function postJobEveryWhere(){
    	extract($_POST);
    	if (
    		!empty($user_id) && 
    		!empty($date) && 
    		isset($time) && 
    		!empty($description) && 
    		isset($bid_per) && 
    		!empty($bid_min_range) && 
    		!empty($bid_max_range) && 
    		isset($estimate_time) && 
    		isset($accept_bid_for) && 
    		!empty($language) && 
    		!empty($key_skills) && 
    		//isset($job_type) && 
    		isset($apply_type)
    	) {
	      $dataInfo = array();
	      $dataInfo1 = array();
	      $files = $_FILES;
	      if(isset($_FILES["attachment"]) && $_FILES["attachment"]["size"]['0'] > 0){
	        $cpt = count($_FILES['attachment']["name"]);
	        for($i=0; $i<$cpt; $i++)
	        {
	          $_FILES['attachment']['name']= $files['attachment']['name'][$i];
	          $_FILES['attachment']['type']= $files['attachment']['type'][$i];
	          $_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
	          $_FILES['attachment']['error']= $files['attachment']['error'][$i];
	          $_FILES['attachment']['size']= $files['attachment']['size'][$i];
	          $config = array();
	          $config['upload_path'] = 'assets/uploaded/users/';
	          $config['allowed_types'] = '*';
	          $config['max_size'] = '*';
	          $config['overwrite'] = TRUE;
	          $config['encrypt_name'] = TRUE;
	          $this->load->library('upload', $config);
	          $this->upload->initialize($config);
	          $this->upload->do_upload('attachment');
	          $dataInfo[] = $this->upload->data();
	          array_push($dataInfo1, $dataInfo[$i]['file_name']);
	        }
	        $fileName = implode(',',$dataInfo1);
	          $_POST['attachment']=$fileName;
	        }
	        $job_id_data = $this->Admin_model->get_last_creted_id('job_id','job_requires');
	        if($job_id_data)
	        {
	          $job_id = $job_id_data->job_id;
	            $job_id++;
	          }else{
	          $job_id = "200001";
	        }
	        $_POST['job_id']=$job_id;
	        //$_POST['type']='Job requirement';
	        $_POST['type']='everywhere';
	        $_POST['job_cat_type']='Online';
	        $res=$this->db->insert('job_requires',$_POST);
	        $idss = $this->db->insert_id();

	        if ($res) {
	          $get_vendor=$this->db->query("SELECT * FROM users WHERE service_provider=1 and id!='".$user_id."' ")->result_array();
	          if(count($get_vendor))
	          {

	            foreach ($get_vendor as $jobs) 
	            {

	              $notification = array(
	                'title'=>"Bid Job requirement",
	                'body' =>"Job ID",
	                'bookingId' =>$idss 
	              );
	              send_notification($notification,$get_vendor['fcm_id']);
	              $dataNoti=array(
	                "bookingId"=>$idss,
	                "sender_id"=>$user_id,
	                "receiver_id"=>$jobs['id'],
	                "receiver_type"=>'vendor',
	                "type"=>'job',
	                "message"=>'You have new job request',
	              );
	              $this->db->insert('notification',$dataNoti);
	            }
	          }
	          $json['result'] = "true";
	          $json['msg'] = "Job success";
	        }else{
	          $json['result'] = "false";
	          $json['msg'] = "Sorry something went wrong";
	      	}
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "parameters required user_id,date,time,location,estimate_time,description,attachment,bid_per,bid_min_range,bid_max_range,accept_bid_for,language,key_skills,apply_type(optional)";
	    }
    	echo json_encode($json);
  	}



  	/*resend otp*/
  	public function generateOTPOnBooking(){
	    //$vendor_id = $this->input->post('vendor_id');
	    $booking_id = $this->input->post('booking_id');
    	if (!empty($booking_id)) {
	      	$userdetail=$this->db->query('select * from booking_request where id="'.$booking_id.'"')->row();
	      	$userd=$this->db->query('select * from users where id="'.$user_id.'"')->row();
			if($userdetail)
			{
		        $user_id=$userdetail->user_id;
		        $phone=$userd->phone;
		        $random_no = rand(1000,9999);
		        $post_data['verify_otp'] = 0;
		        $post_data['otp'] = $random_no;
		        $wheredata=array('id'=>$booking_id);
		        $result=$this->User_Model->updates('booking_request',$post_data,$wheredata);
		        $message = "Dear {$userd->fname}, Your OTP for completing your registration in Satrango is {$random_no}. Valid for 30 minutes. Please do not share this OTP. Regards Satrango Team";
		        $send_sms = $this->smsSEND($message,$phone);
		        if($result)
		        {
		          $json['result'] = 'true';
		          $json['msg'] = "We send OTP to mobile, Thanks";
		          $json['OTP'] = $random_no;
		        }else{
		          $json['result'] = "false";
		          $json['msg'] = "Something went wrong. Please try later.";
		        }
			}else{
				$json['result'] = "false";
				$json['msg'] = "Mobile No is not exits. Please Try another.";
			}
	    }else{
	      $json['result'] = "false";
	      $json['msg'] = "parameter required booking_id";
	    }
    	echo json_encode($json);
  	}

  	/*inprogress booking after work started both side*/
  	public function user_inprogress_booking(){
	    extract($_POST);
	    if (!empty($user_id)) {
	      $res=$this->Api_Model->userInprogressBooking($user_id);
	      /*foreach ($res as $key => $value) {
	      	$value->extra_charge_status=$this->Api_Model->extraChargeStatus($value->id);
	      }*/
	      if ($res) {
	        $json['result']="true";
	        $json['msg']="Inprogress Booking list";
	        $json['new_booking']=$res;
	      }else{
	        $json['result']="false";
	        $json['msg']="sorry doesn't new order";
	      }
	    }else{
	      $json['result']="false";
	      $json['msg']="param required user_id";
	    }
	    echo json_encode($json);
  	}

  	public function vendor_upload_review_doc(){
  		extract($_POST);
  		if (!empty($vendor_id) && !empty($booking_id)) {

  			$getBookingStatus=$this->db->query("SELECT * FROM booking_request WHERE id=$booking_id and job_status='Inprogress'");
 
  			if ($getBookingStatus->num_rows()>0) {

				$dataInfo = array();
				$dataInfo1 = array();
				$files = $_FILES;
				if(isset($_FILES["vendor_doc"]) && $_FILES["vendor_doc"]["size"]['0'] > 0){
					$cpt = count($_FILES['vendor_doc']["name"]);
					for($i=0; $i<$cpt; $i++)
					{
						$_FILES['vendor_doc']['name']= $files['vendor_doc']['name'][$i];
						$_FILES['vendor_doc']['type']= $files['vendor_doc']['type'][$i];

						$_FILES['vendor_doc']['tmp_name']= $files['vendor_doc']['tmp_name'][$i];

						$_FILES['vendor_doc']['error']= $files['vendor_doc']['error'][$i];
						$_FILES['vendor_doc']['size']= $files['vendor_doc']['size'][$i];
						$config = array();
						$config['upload_path'] = 'assets/uploaded/users/';
						$config['allowed_types'] = '*';
						$config['max_size'] = '*';
						$config['overwrite'] = TRUE;
						$config['encrypt_name'] = TRUE;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload('vendor_doc');
						$dataInfo[] = $this->upload->data();
						array_push($dataInfo1, $dataInfo[$i]['file_name']);
					}
					$fileName = implode(',',$dataInfo1);
					$post_data['vendor_doc']=$fileName;
				}
				
				$uploadData=$this->Api_Model->updateData('booking_request',$post_data,$booking_id);
				if ($uploadData) {
					$resDoc=$this->db->query("SELECT * FROM booking_request WHERE id=$booking_id")->row();
					$json['result']="true";
					$json['msg']="Vendor Uploaded revert doc";
					$json['user_doc']=$resDoc->upload_doc;
					$json['vendor_doc']=$resDoc->vendor_doc;;
				}else{
					$json['result']="false";
					$json['msg']="Sorry something went wrong!!";
				}
  				
  			}else{
  				$json['result']="false";
  				$json['msg']="Sorry Booking Not Inprogress";
  			}

  		}else{
  			$json['result']="false";
	      	$json['msg']="param required vendor_id,booking_id,vendor_doc";
  		}
  		echo json_encode($json);
  	}


  	public function booking_doc_appropriate(){
  		extract($_POST);
  		if(!empty($user_id) && isset($booking_id)) {
  			$datas=array('appropriate_status'=>1);
  			$res=$this->Api_Model->updateData('booking_request',$datas,$booking_id);
  			if ($res) {
  				$json['result']=true;
  				$json['msg']='success';
  			}else{
  				$json['result']=false;
  				$json['msg']='Something went wrong';
  			}
  		}else{
  			$json['result']=false;
  			$json['msg']='parameter required user_id,booking_id';
  		}
  		echo json_encode($json);
  	}

  	public function get_week_days(){
  		extract($_POST);
  		if (isset($vendor_id)) {
			$date = date('Y-m-d');
			// parse about any English textual datetime description into a Unix timestamp 
			$ts = strtotime($date);
			// calculate the number of days since Monday
			$dow = date('w', $ts);
			$offset = $dow - 1;
			if ($offset < 0) {
			$offset = 6;
			}
			// calculate timestamp for the Monday
			$ts = $ts - $offset*86400;
			// loop from Monday till Sunday 
			for ($i = 0; $i < 7; $i++, $ts += 86400){
				//$arrayName = array('dates' => date("m/d/Y l", $ts) . "\n", );
				$daya[]= date("d-m-Y l", $ts);
			}

  			if ($date) {
  				$json['result']=true;
  				$json['msg']='All available days';
  				$json['data']=$daya;
  			}else{
  				$json['result']=false;
  				$json['msg']='something went wrong';
  			}
  		}else{
  			$json['result']=false;
  			$json['msg']='parameter required vendor_id';
  		}
  		echo json_encode($json);
  	}

  	//get booking List By Date
  	public function bookingListByDate(){
  		extract($_POST);
  		if (!empty($vendor_id) && !empty($date)) {
  			$bookingByDate=$this->Api_Model->BookingListByDate($vendor_id,$date);
  			if ($bookingByDate) {
  				$json['result']=true;
  				$json['msg']='Booking List';
  				$json['data']=$bookingByDate;
  			}else{
  				$json['result']=false;
  				$json['msg']='Sorry not any boooking';
  			}
  		}else{
  			$json['result']=false;
  			$json['msg']='parameter required vendor_id,date(Y-m-d)';
  		}
  		echo json_encode($json);
  	}

         
    //update exta booking status   
  	public function update_exta_booking_status(){
	    $booking_id = (trim($this->input->post('booking_id')));
	    $user_id = (trim($this->input->post('user_id')));
	    $status = (trim($this->input->post('status')));
	    if($booking_id== "" || $user_id == "" || $status == "")
	    {
	      $data['result']="false";
	      $data['msg']="Please give parameters(booking_id,user_id,status)";
	    }else{
      		if($result =$this->Api_Model->update_exta_booking_status($booking_id,$user_id)){
	        $post_data= array(
	          'extra_charge_status' => $status
	        );
	        $this->db->where('id',$id);
	        $this->db->update('booking_request',$post_data);
	        $data['result'] = "true";
	        $data['msg'] = "Successfully updated job";
	      }else{
	        $data['result']="false";
	        $data['msg']="no record found ";
	      }
    	}
    	echo json_encode($data);
  	} 


    //update exta booking status   
    public function mark_complete(){
      $booking_id = (trim($this->input->post('booking_id')));
      $user_id = (trim($this->input->post('user_id')));
      if($booking_id== "" || $user_id == "")
      {
        $data['result']="false";
        $data['msg']="Please give parameters(booking_id,user_id)";
      }else{
          if($result =$this->Api_Model->update_exta_booking_status($booking_id,$user_id)){
          $post_data= array(
            'mark_complete' => 1
          );
          $this->db->where('id',$id);
          $this->db->update('booking_request',$post_data);
          $data['result'] = "true";
          $data['msg'] = "Successfully mark completed";
          $data['amount'] = "120";
          $data['paid_amount'] = "120";
          $data['balance'] = "0";
          $data['extra_charge'] = "0";
          $data['extra_charge'] = "0";
          
        }else{
          $data['result']="false";
          $data['msg']="no record found ";
        }
      }
      echo json_encode($data);
    }   

  	
  
}