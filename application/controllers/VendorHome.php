<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class VendorHome extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
     // $this->load->database();
   $this->load->model('UserModel');
    $this->load->library('form_validation');
$this->load->helper('html');
$this->load->helper('array');


    error_reporting();
  }
 public function index()
 {

 $id=$this->session->userdata('Id');
  if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
// $data['user_details']=$this->UserModel->get_user($id);
    $data["booking_list"] = $this->UserModel->get_user_booking_list();
    $data["count"] = $this->UserModel->countimage();
    $data['category']=$this->UserModel->get_leaderlimit();


    

    $this->load->view('frontend/vendorhome',$data);


 }


 public function leaderboard()
 {

 $id=$this->session->userdata('Id');
  if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
   $data['user_details']=$this->UserModel->get_user($id);

    $data['category']=$this->UserModel->get_leaderdata();


    

    $this->load->view('frontend/leaderboard',$data);


 }



 // check booking pending 

public function checkbooking_status(){
    $id =$this->input->post('id');
    // extract($_POST);
    $this->db->select('*');
   $this->db->from('booking_request');
    $this->db->where('vendor_id',$id);
   $query = $this->db->get();
   $test = $query->row_array();
    $job_status= $test['job_status'];
    $id= $test['id'];
     
       if($job_status == "Pending")
       {
          $data['result']=true;
          $data['job_status']=$job_status;
          $data['id']=$id;
           $data['msg'] ="Successfully.";
      }
      else{
          $data['result'] =false;
          $data['msg'] ="please next booking";
        
      }
    
    echo json_encode($data);
  }



}