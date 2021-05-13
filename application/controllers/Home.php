<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
     // $this->load->database();
   $this->load->model('UserModel');
   $this->load->model('Api_Model');
    $this->load->library('form_validation');
$this->load->helper('html');
$this->load->helper('array');


    error_reporting();
  }
 public function index()
 {
  
  //  $id=$this->session->userdata('Id');
  // if($this->session->userdata('user_login')){
  //     $data['servicesnear']=$this->UserModel->get_nearmeservices($id);
  //   }
  // $data['user_details']=$this->UserModel->get_user($id);

  // $requestData=$this->input->get($requestData);
  
  // $lang=$this->input->get($lang);
  // print_r($requestData);exit();
  // $lang=$this->input->post($lang);

$data['category']=$this->UserModel->get_services();

$data['services']=$this->UserModel->get_category();
// print_r($data['services']);exit();
$data['servicesnear']=$this->UserModel->get_nearmeservices();
// 22.7253303,print_r($data['servicesnear']);exit();
$data['popular']=$this->UserModel->get_popular_hired();
$data['offers']=$this->Api_Model->getOffers();
$data['offers_all']=$this->Api_Model->getAllOffers();

$data['expiry_offers']=$this->Api_Model->getExipryOffers();
// print_r($data['expiry_offers']);exit();

/*if($param1 == "Home"){
  $post_data['service_provider']= 0;
  $this->db->where('id',$id);
  $this->db->Update('users',$post_data);

}*/

  $this->load->view('frontend/home',$data);
 }

  public function Login()
  {
   $this->load->view('frontend/login');
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }



  function generateRandomString($length = 15) {
    $characters = substr(str_shuffle(str_repeat(MD5(microtime()), ceil($length/32))), 0, $length);
    $charactersLength = strlen($characters);

    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function Myprofile()
  { 
    if(! $this->session->userdata('user_login')){
    redirect('Home');
  }
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $this->load->view('frontend/myprofile',$data);
  }

  public function change_password()
  { 
    if(! $this->session->userdata('user_login')){
    redirect('Home');
  }
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $this->load->view('frontend/change_password',$data);
  }

  public function forgot_password()
  { 
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $this->load->view('frontend/forgot_password',$data);
  }


  public function Login_type()
  { 
    if(! $this->session->userdata('user_login')){
    redirect('Home');
  }
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $this->load->view('frontend/login_asservice',$data);
  }

public function updateprofile()
{ 
  if(! $this->session->userdata('user_login')){
  redirect('Home');
  }
  $id=$this->session->userdata('Id');
  $data['user_details']=$this->UserModel->get_user($id);
  $data['user_tarif']=$this->UserModel->get_tarif($id);
  $data['category']=$this->db->query('select * from professions ORDER BY id DESC')->result();
  $data['categoryskills']=$this->db->query('select * from subcategory ORDER BY id DESC')->result();
  $data['users']=$this->db->query('select * from users where skills='.$id.'')->row();
  $this->load->view('frontend/updateprofile',$data);
}


public function user_profile()
  { 
     if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
        $id=$this->session->userdata('Id');
      $data['user_details']=$this->UserModel->get_user($id);

         $this->load->view('frontend/user_updateprofile',$data);
}



public function match_otp()
{ 


 
  $this->load->view('frontend/match_otp');
}
public function set_password()

  { 
   $id=$this->session->userdata('Id');
      $data['user_details']=$this->UserModel->get_user($id);
    
         $this->load->view('frontend/set_password');
}


public function User_actions($param1 = "", $user_id = "") {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }

    if ($param1 == "add") {
      $this->UserModel->edit_user();
      redirect('Home');

    }
    elseif ($param1 == "edit") {
         $this->UserModel->edit_services($user_id);
      $this->UserModel->edit_servicestariff($user_id);
      
      redirect('Home/Myprofile');

    }elseif ($param1 == "user_edit") {
        $result= $this->UserModel->edit_profile($user_id);
      if($result){
      redirect('Home/Myprofile');
    }else
    {
      
      redirect('Home/Myprofilevendor');
    }

    }
  
  }


  public function services()
  { 
    // if(! $this->session->userdata('user_login')){
    //   redirect('Home');
    // }
   
    // $id=$this->session->userdata('Id');
 
    //$data['user_details']=$this->UserModel->get_user($id);
    $data["services"] = $this->UserModel->get_allservices();
    $this->load->view('frontend/services',$data);
}

  public function category_services($param1)

  { 
    if(! $this->session->userdata('user_login')){
    redirect('Home');
    }

    $id=$this->session->userdata('Id');

    $data['user_details']=$this->UserModel->get_user($id);
    $data["category_services"] = $this->UserModel->category_services($param1);


    $this->load->view('frontend/category_services',$data);
  }
  
  public function popular_hired()

  { 
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
       $id=$this->session->userdata('Id');
       $data['user_details']=$this->UserModel->get_user($id);
        $data["popular"] = $this->UserModel->get_allpopular();
        $this->load->view('frontend/popular_hired',$data);
}

  public function all_services_list($param1)
  { 
    if(! $this->session->userdata('user_login')){
    redirect('Home');
    }
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $data["all_service"] = $this->UserModel->getall_services_list($param1);
    $this->load->view('frontend/all_services_list',$data);
  }

  public function category_services_vendor($param1)
  { 
    if(! $this->session->userdata('user_login')){
    redirect('Home');
    }
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $data["all_service"] = $this->UserModel->getall_services_list($param1);
    $this->load->view('frontend/category_services_vendor',$data);
  }


  public function search_filter()
  { 
    // if(! $this->session->userdata('user_login')){
    // redirect('Home');
    // }
    $filter = $this->uri->segment(3, 0);
    $keyword=$this->input->post('keyword');
    $sort_price=$this->input->post('sort_price');
    // $lat=$this->input->post('lat');
    // $lang=$this->input->post('lang');
    // $id=$this->session->userdata('Id');
    // $data['user_details']=$this->UserModel->get_user($id);
    // print_r($data['user_details']);exit();
    // $data["all_service"] = $this->UserModel->getall_services_list($param1);

    $data["all_service"] = $this->UserModel->getall_services_vendor_list($keyword,$sort_price,$filter);
    $this->load->view('frontend/searchfilter',$data);
  }



public function single_move_booking()

  { 
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
       $filter = $this->uri->segment(3, 0);
       
       $keyword=$this->input->post('keyword');
       $sort_price=$this->input->post('sort_price');
       $id=$this->session->userdata('Id');
       $data['user_details']=$this->UserModel->get_user($id);
       $data['gettime']=$this->UserModel->getvendor_time();
        /* print_r($data['gettime']);
          die();*/
        // $data["all_service"] = $this->UserModel->getall_services_list($param1);
        
        $data["all_service"] = $this->UserModel->getall_services_vendor_listbooking($keyword,$sort_price,$filter);
      
       
        $this->load->view('frontend/single_move_booking',$data);
}


public function blue_booking()

  { 
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
   $filter = $this->uri->segment(3, 0);
       $keyword=$this->input->post('keyword');
       $sort_price=$this->input->post('sort_price');
       $id=$this->session->userdata('Id');
       $data['user_details']=$this->UserModel->get_user($id);
        // $data["all_service"] = $this->UserModel->getall_services_list($param1);
        
        $data["all_service"] = $this->UserModel->getall_services_vendor_listbooking($keyword,$sort_price,$filter);
      
        $this->load->view('frontend/blue_booking',$data);
}




public function category_action($param1 = "") {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }

    if ($param1 == "single_booking") {
     $this->UserModel->single_booking();
   $bookid = $this->db->insert_id();
      redirect('Home/Wait_timebooking/'.$bookid);

    }
    elseif ($param1 == "blue_booking") {
     $this->UserModel->blue_booking();
        $bookid = $this->db->insert_id();
      
      redirect('Home/Wait_timebooking/'.$bookid);

    }elseif ($param1 == "multi_booking") {
         $this->UserModel->multi_booking();
       $bookid = $this->db->insert_id();
      redirect('Home/Wait_timebooking/'.$bookid);

    }
  
  }




public function Wait_timebooking() {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
           $id=$this->session->userdata('Id');
         $bookid = $this->uri->segment('3');
  
   // $data['booking_request']=$this->UserModel->booking_request();
   $data['user_details']=$this->UserModel->get_user($id);
   $this->load->view("frontend/wait_time",$data);
  
  }






public function booking_request() {
   
           // $id=$this->session->userdata('Id');

 
      $result=$this->UserModel->booking_request();
      if($result){
        $data['result']= true;
        $data['data']= $result;
        $data['msg']= "booking list";

      }else{

        $data['result']= false;
        $data['msg']= "data not found";
      }

  echo json_encode($data);
  }





public function Myprofilevendor($param1 = "") {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
       $id=$this->session->userdata('Id');
      $data['user_details']=$this->UserModel->get_user($id);
      $data['user_tarif']=$this->UserModel->get_tarif($id);
      $data['category']=$this->db->query('select * from professions ORDER BY id DESC')->result();


        $data['categoryskills']=$this->db->query('select * from subcategory ORDER BY id DESC')->result();
    $data['users']=$this->db->query('select * from users where skills='.$id.'')->row();
   

$this->load->view('frontend/user_updateprofile',$data);
  
  }
public function Privacy()
 {
  
   $id=$this->session->userdata('Id');
  if($this->session->userdata('user_login')){
      $data['servicesnear']=$this->UserModel->get_nearmeservices($id);
    }
$data['user_details']=$this->UserModel->get_user($id);
$data['Privacy']=$this->UserModel->Privacy();


    $this->load->view('frontend/privacy',$data);
 }



public function Terms_condition()
 {
  
   $id=$this->session->userdata('Id');
  if($this->session->userdata('user_login')){
      $data['servicesnear']=$this->UserModel->get_nearmeservices($id);
    }
$data['user_details']=$this->UserModel->get_user($id);
$data['Privacy']=$this->UserModel->Privacy();


    $this->load->view('frontend/terms_condition',$data);
 }


public function Faq()
 {
  
   $id=$this->session->userdata('Id');
  if($this->session->userdata('user_login')){
      $data['servicesnear']=$this->UserModel->get_nearmeservices($id);
    }
$data['user_details']=$this->UserModel->get_user($id);
$data['faq']=$this->UserModel->faq();
    $this->load->view('frontend/faq',$data);
 }


public function checkbooking_status(){
    $id =$this->input->post('id');
    // extract($_POST);
    $this->db->select('*');
   $this->db->from('booking_request');
    $this->db->where('id',$id);
   $query = $this->db->get();
   $test = $query->row_array();
    $job_status= $test['job_status'];
     
       if($job_status == "Inprogress")
       {
          $data['result']=true;
          $data['job_status']=$job_status;
           $data['msg'] ="Successfully.";
      }
      elseif($job_status == "Complete")
       { 
          $data['result']=true;
          $data['job_status']=$job_status;
           $data['msg'] ="Successfully.";
      }  elseif($job_status == "Upcoming")
       { 
          $data['result']=true;
          $data['job_status']=$job_status;
           $data['msg'] ="Successfully.";
      }
       elseif($job_status == "Cancel") {
          $data['result']=true;
          $data['job_status']=$job_status;
           $data['msg'] ="Successfully.";
      } elseif($job_status == "Pending") {
          $data['result']=true;
          $data['job_status']=$job_status;
           $data['msg'] ="Successfully.";
      }else{
          $data['result'] =false;
          $data['msg'] ="please next booking";
        
      }
    
    echo json_encode($data);
  }




public function payment()
 {
  
  if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
          $id=$this->session->userdata('Id');

$data['user_details']=$this->UserModel->get_user($id);


    $this->load->view('frontend/payment',$data);
 }


     public function serviceprovider_status(){
      $userdata_id=$this->input->post('userdata_id');
      $service_provider=$this->input->post('service_provider');
      $post_data = array('service_provider' =>$this->input->post('service_provider') );
      $this->db->where('id',$userdata_id);     
      $res= $this->db->update('users',$post_data);
    

    }



    // check
     public function add_to_cart()
  {
    $json = array();
    extract($_POST);


    
    $day_name =$this->input->post("day_name[]");
                                


  $data['day_name'] = $day_name;



     $res=$this->db->insert('carts',$data); 

    if($res)
    {
      $json['result'] = true;
      $json['msg'] = "Successfully added in your cart.";
    }else{
      $json['result'] = false;
      $json['msg'] = "Already exist this product in your cart.";
      $json['cart_product'] = "";
    }
    echo json_encode($json);
  }

  // home  autocomplete search data
  public function getall_services_autocomplete()
  {
    $res = array();
    if(isset($_GET['term']))
    {
      $issd=$this->session->userdata('Id');
      $custom_query = "select id,name from subcategory  WHERE 1 = 1 ";
      $custom_query .="AND  name LIKE '%{$_GET['term']}%'";
      
      $query = $this->db->query($custom_query);
     
      if ($query->num_rows() >0) {
        $result=$query->result_array();
        foreach ($result as $row){
        $res[] = $row["name"];
      }
      }else{
        $res[]= "Record Not found";
      }
    }
    echo json_encode($res);
  }
 

  // get user account
  public function userAccount()
  {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
    $id=$this->session->userdata('Id');
    $data['user_details']=$this->UserModel->get_user($id);
    $data['user_tarif']=$this->UserModel->get_tarif($id);
    $data['category']=$this->db->query('select * from professions ORDER BY id DESC')->result();
    $data['categoryskills']=$this->db->query('select * from subcategory ORDER BY id DESC')->result();
    $data['users']=$this->db->query('select * from users where skills='.$id.'')->row();
    $data['inprogress'] = $this->UserModel->get_userinprogress();
    $data['complete'] = $this->UserModel->get_usercomplete();
    $data['panding'] = $this->UserModel->get_userpanding();
    $this->load->view('frontend/user_acount',$data);
  }

public function tsetdat()
{
  $data['panding'] = $this->UserModel->get_userpanding();
  echo json_encode($data);
}



public function vendor_tariff_time()
  {
    
$id=29;
$dates = array();

$sqlEvents = "SELECT user_id,from_time,to_time FROM vendor_tariff_time where user_id ='".$id."'";

 $query= $this->db->query($sqlEvents);

 $result = ($query->num_rows() > 0)?$query->row_array():FALSE;



            $from_time= json_decode($result['from_time']);
              $to_time= json_decode($result['to_time']);
              
             
   
    foreach($from_time as $key=>$value ){ 
      $val=$to_time[$key]; 
      $dates[$key]=array($value,$val); 
    } 
  
    // var_dump($dates);


         echo stripslashes(json_encode($dates));
  
}

// user update profile
public function User_accountupdate($user_id = "") {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }

   
         
      $this->UserModel->edit_services($user_id);
      
      redirect('Home/userAccount');
  
  }



  /*SDSDHSJHSSHDSDHS SDHSGDJHSGHSGDH JKGGFJIIIR SAAADASSASD*/
  public function category_service($id)

  { 
    // if(! $this->session->userdata('user_login')){
    //   redirect('Home');
    // }
   
    // $id=$this->session->userdata('Id');
    $ids=$this->uri->segment(3);
    // print_r($ids);exit();
    // $data['user_details']=$this->UserModel->get_user($id);
    $data["services"] = $this->UserModel->categoryServices($ids);
    $this->load->view('frontend/category_service',$data);
  }


  /*Vendor list*/
  public function vendors(){
    $ids=$this->uri->segment(3);
    $data["vendors"] = $this->UserModel->vendorByServices($ids);
    // print_r(count($data["vendors"]));exit();
    // $res= json_encode($data["vendors"]);

    // foreach ($res as $key => $value) {

    //   $value->v_id=$this->UserModel->vendorRate($value->v_id);
    //   print_r($value->v_id);
    // }

    $this->load->view('frontend/vendors',$data);
  }

}