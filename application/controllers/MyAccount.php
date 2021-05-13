<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class MyAccount extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->library('form_validation');
  }

// service proviuder my account
  public function index()
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
   

     $data['upcoming'] = $this->UserModel->getvendorUpcoming();
    $data['inprogress'] = $this->UserModel->get_inprogressbooking_vendor();
    $data['complete'] = $this->UserModel->getvendorcompleted();


    $this->load->view('frontend/my_account',$data);
  }

// reviews list 
 public function Reviews()
  {
    if(! $this->session->userdata('user_login')){
      redirect('Home');
    }
   


    $this->load->view('frontend/my_reviews');
  }


  // check booking win32_set_service_status(

public function checkbooking_status(){
    $id =$this->input->post('id');
    // extract($_POST);
    $this->db->select('*');
   $this->db->from('booking_request');
    $this->db->where('vendor_id',29);
    $this->db->where('job_status',"Pending");

   $query = $this->db->get();
   $sql = $this->db->last_query();
   $test = $query->row_array();
    $job_status= $test['job_status'];
     
       if($job_status == "Pending")
       {
          $data['result']=true;
          $data['job_status']=$job_status;
          $data['id']=$test['id'];
          $data['from_time']=$test['from_time'];
          $data['to_time']=$test['to_time'];
          $data['booking_date']=date('d-M-Y',strtotime($test['booking_date'])).' '.date('h:i A',strtotime($test['to_time'])).' to '.date('h:i A',strtotime($test['from_time']));
          $data['start_location1']=$test['start_location1'];
          $data['work_description']=$test['work_description'];
           $data['msg'] ="Successfully.";
      }
    else{
          $data['result'] =false;
          $data['msg'] ="please next booking";
        
      }
    
    echo json_encode($data);
  
  }

public function reject()
{
  $this->load->view("frontend/reject");
}

public function testdat()
{
  $abc = $this->input->post('abc');
  $postff = $this->input->post('postff');
$arrayName = array('postff' => $postff,
                    'abc' => $abc, );
echo json_encode($arrayName);

}






 function autocompleteDataee() {
                   $data = array();

            if(isset($_GET["query"]))
            {
             
        $this->db->select('name');
        $this->db->from('subcategory');
          $this->db->like('name', $_GET["query"]);
         $this->db->order_by('name','ASC');
           $this->db->limit(15);


               $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;


            foreach ($result as $row){
                $data[] = $row["name"];
            }
        


             
           }

            echo json_encode($data);
              
         }

}