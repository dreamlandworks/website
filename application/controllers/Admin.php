<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->model('User_Model');
    $this->load->library('form_validation');
    error_reporting();
  }
  
/**
 * @author : Chandan Singh
 * @version : 1.0.0
 * @since : 04 June 2020
 */
 
 
   /**Warning : service can only update . don't delete becoz all of manage by service id if service
    * id not found then which service realted data is not showing.
    * for service id show on url we can use service_url colom in data bases
    * keep always unique service_url
    * sub
    */


  

  public function index()
  {
       if($this->session->userdata('login_id')){
      redirect('Dashboard');
    }
      
    $this->load->view('admin/login');
  }

  // Admin login 
  public function login()
  {
        extract($_POST);

        if(isset($username) && isset($password))
        {
          $result =  $this->db->query('select * from admin where admin_email="'.$username.'" AND admin_password ="'.$password.'"  ')->row();
          if($result)
          {
                $newdata = array(
                 'name'    => $result->admin_name,
                 'email'  => $result->admin_email,

                 'logged_in' => TRUE,
                 'login_id'  =>$result->id,
                 'image'  =>$result->admin_image,
                'phone'  => $result->phone,

                );
                $this->session->set_userdata($newdata);
                 if(isset($remember)){
                $this->setSession($username,$password,$result->id);
                     }
                $data['result'] = 'true';
                $data['msg']    = 'Successfully logged in.';
             
          }else{
            $data['result'] = 'false';
            $data['msg']    = 'Invalid username and and password';
          }  
        }else{
          $data['result'] = 'false';
          $data['msg']    = 'username and password can not empty';            
        }          
        echo json_encode($data);

  }

   public function activejobs(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
   $data['Active_jobs']=$this->Admin_model->getActive();
        $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/activejob",$data);
  }
    
    //shivam

   public function activedetails($id){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Active Details";
   $data['details']=$this->Admin_model->getactivedetails($id);
        $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/active_details",$data);
  }

   public function pendingdetails($id){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Panding Details";
   $data['details']=$this->Admin_model->getpendingdetails($id);
    $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/pending_details",$data);
  }

   public function completedetails($id){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Panding Details";
   $data['details']=$this->Admin_model->getcompletedetails($id);
   $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/complete_details",$data);
  }

     public function Notification(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Notification";
    // $data['Notification']=$this->Admin_model->Notification();
    $first_date = $this->input->post('start_date');
      $second_date = $this->input->post('end_date');
      $search = $this->input->post('search');
   $data['Notifications']=$this->Admin_model->Notification($first_date,$second_date,$search);

  $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/Notification",$data);
  }
  
     public function pendingjobs(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="pending jobs";
    $data['pending_jobs']=$this->Admin_model->getpanding();
   
  $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/pending_jobs",$data);
  }
  

   public function pendingdelete($id){
      $this->db->query('DELETE FROM `jobs` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">jobs deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/pendingjobs');
  }

   public function Activedelete($id){
      $this->db->query('DELETE FROM `jobs` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">jobs deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/activejobs');
  }

  public function deactivepending($id){
      
      $this->db->query('UPDATE `jobs` SET `status`="1" WHERE id='.$id.'');
     $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">User deactivate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
     redirect('Admin/pendingjobs');
  }
  
  public function activepending($id){
       $this->db->query('UPDATE `jobs` SET `status`="0" WHERE id='.$id.'');
       $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">User activate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
      redirect('Admin/pendingjobs');
  }
  
  public function completedjobs(){
       if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Complete Job";
   $data['pending_jobs']=$this->Admin_model->getcomplete();
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/completedjob",$data);
  }


public function providerview($id){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Provider View";
 $data['provider']=$this->Admin_model->get_servicedetails($id);
 $data['Notification']=$this->Admin_model->getNotification();
     $this->load->view("admin/providerview",$data);
  }
//shivam
  public function serviceProvider(){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="Service Provider";

    $data['product']=$this->Admin_model->get_service();
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/serviceprovider",$data);
  }



  public function deactiveserver($id){
      
      $this->db->query('UPDATE `services` SET `status`="1" WHERE id='.$id.'');
     $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">serviceProvider  deactivate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
     redirect('Admin/serviceProvider');
  }
  
  public function activeserver($id){
       $this->db->query('UPDATE `services` SET `status`="0" WHERE id='.$id.'');
       $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">service Provider activate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
      redirect('Admin/serviceProvider');
  }
 public function servicedelete($id){
      $this->db->query('DELETE FROM `services` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">services deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/serviceProvider');
  }

    


  function signout(){
    $this->session->sess_destroy();
    redirect("Admin");
  }

  public function updatesubcategory($id){
       if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('name','Sub category name','trim|required');
    $this->form_validation->set_rules('cat_id','category name','trim|required');
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
       
           $postdata=array( 'name'=>$this->input->post('name'),'cat_id'=>$this->input->post('cat_id'));
             if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['icon'] = $uploadData['file_name'];
            }else{
              $postdata['icon'] = 'blank.png';
                }
                
             }
       $this->db->where('id',$id);
       $this->db->update('subcategory',$postdata);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong>Sub category added successfully...
    </div>');
         redirect('Admin/subcategory');
       
     }
    $data['category']=$this->db->query('select * from category ORDER BY id DESC')->result();
    $data['detail']=$this->db->query('select * from subcategory where id='.$id.'')->row();
    $data['subcategory']=$this->Admin_model->get_subcategory();
    $data['title']="add category";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/updatesubcategory",$data);
      
  } 


 public function updatesub_subcategory($id){
       if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('name','Sub Sub category name','trim|required');
    $this->form_validation->set_rules('subcat_id','Sub category name','trim|required');
    $this->form_validation->set_rules('cat_id',' category name','trim|required');
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
       
           $postdata=array( 'name'=>$this->input->post('name'),'subcat_id'=>$this->input->post('subcat_id'),'cat_id'=>$this->input->post('cat_id'));
             if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['icon'] = $uploadData['file_name'];
            }else{
              $postdata['icon'] = 'blank.png';
                }
                
             }
       $this->db->where('id',$id);
       $this->db->update('sub_subcategory',$postdata);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong>Sub category added successfully...
    </div>');
         redirect('Admin/sub_subcategory');
       
     }
         $data['category']=$this->db->query('select * from category ORDER BY id DESC')->result();

    $data['subcategoryis']=$this->db->query('select * from subcategory ORDER BY id DESC')->result();
   
    $data['subcategory']=$this->Admin_model->getsub_subcategory();
   $data['detail']=$this->db->query('select * from sub_subcategory where id='.$id.'')->row();
    // $data['subcategory']=$this->Admin_model->get_subcategory();
    $data['title']="add category";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/updatesub_subcategory",$data);
      
  } 



   public function subcategory(){
       if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('name','Sub category name','trim|required');
    $this->form_validation->set_rules('cat_id','category name','trim|required');
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
       
           $postdata=array( 'name'=>$this->input->post('name'),'cat_id'=>$this->input->post('cat_id'));
           if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['icon'] = $uploadData['file_name'];
            }else{
              $postdata['icon'] = 'blank.png';
                }
                
             }else{
              $postdata['icon'] = 'blank.png';
             }

       $this->db->insert('subcategory',$postdata);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong>Sub category added successfully...
    </div>');
         redirect('Admin/subcategory');
       
     }
    $data['category']=$this->db->query('select * from category ORDER BY id DESC')->result();
    $data['subcategory']=$this->Admin_model->get_subcategory();
    $data['title']="add category";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/subcategory",$data);
    } 


   public function sub_subcategory(){
       if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('name','Sub category name','trim|required');
    $this->form_validation->set_rules('subcat_id','Sub category name','trim|required');
    $this->form_validation->set_rules('cat_id','category name','trim|required');
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
       
           $postdata=array( 'name'=>$this->input->post('name'),'subcat_id'=>$this->input->post('subcat_id'),'cat_id'=>$this->input->post('cat_id'));
           if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['icon'] = $uploadData['file_name'];
            }else{
              $postdata['icon'] = 'blank.png';
                }
                
             }else{
              $postdata['icon'] = 'blank.png';
             }

       $this->db->insert('sub_subcategory',$postdata);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong>Sub category added successfully...
    </div>');
         redirect('Admin/sub_subcategory');
       
     }
    $data['category']=$this->db->query('select * from category ORDER BY id DESC')->result();
    $data['subscategory']=$this->db->query('select * from subcategory ORDER BY id DESC')->result();
    $data['subcategory']=$this->Admin_model->getsub_subcategory();
    $data['title']="add sub category";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/sub_subcategory",$data);
    } 


   public function addcategory(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('name','category name','trim|required');
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
       
           $postdata=array( 'name'=>$this->input->post('name'),'bgcolor'=>$this->input->post('bgcolor'));
          if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['icon'] = $uploadData['file_name'];
            }else{
              $postdata['icon'] = 'blank.png';
                }
                
             }else{
              $postdata['icon'] = 'blank.png';
             }

       $this->db->insert('category',$postdata);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> category added successfully...
    </div>');
         redirect('Admin/addcategory');
       
     }
     $data['category']=$this->db->query('select * from category ORDER BY id DESC')->result();
    $data['title']="add category";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/addcategory",$data);
  }
  public function Dashboard(){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    }
    $data['title']= "Satarango Limitless - dashboard";
     $data['Notification']=$this->Admin_model->getNotification();
     $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/dashboard",$data);
  }

  public function users(){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
    $data['users']=$this->db->get('users')->result();
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/users",$data);
  }
  
  public function privacy(){
       if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('content','content','trim|required');
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
         $this->db->where('id','1');
         $this->db->update('privacy',array('content'=>$this->input->post('content')));
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> Privacy updated successfully...
    </div>');
         redirect('Admin/privacy');
     }
    $data['title']="Privacy";
    $data['privacy']=$this->db->get('privacy')->row();
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/privacy",$data);
  }
   
  public function terms(){
      
         if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('content','content','trim|required');
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
         $this->db->where('id','1');
         $this->db->update('privacy',array('terms'=>$this->input->post('content')));
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> terms updated successfully...
    </div>');
         redirect('Admin/terms');
     }
    $data['title']="Privacy";
    $data['privacy']=$this->db->get('privacy')->row();
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/terms",$data);
  }
   
  public function deactiveaccunt($id){
      
      $this->db->query('UPDATE `users` SET `status`="1" WHERE id='.$id.'');
     $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">User deactivate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
     redirect('Admin/users');
  }
  
  public function activeaccunt($id){
       $this->db->query('UPDATE `users` SET `status`="0" WHERE id='.$id.'');
       $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">User activate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
      redirect('Admin/users');
  }
  
 public function profile(){
   if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
    $data['Notification']=$this->Admin_model->getNotification();
   
    $this->load->view("admin/profile",$data);
 }
  
  public function userlist(){
       $users=$this->db->get('users')->result();
        echo json_encode($users);
  }

  public function reports(){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
      $first_date = $this->input->post('start_date');
      $second_date = $this->input->post('end_date');
      $search = $this->input->post('search');
  // 
    $data['title']="users";
   $data['Notification']=$this->Admin_model->getNotification();
    $data['reports']=$this->Admin_model->repotslist($first_date,$second_date,$search);
    $this->load->view("admin/reports",$data);
  }
  

  //  public function reports(){
  //   if(!$this->session->userdata('login_id')){
  //     redirect('Admin');
  //   } 
  //   $data['title']="Reports";
  //    $first_date = $this->input->post('start_date');
  //    $second_date = $this->input->post('end_date');
  //    $search = $this->input->post('search');
  //    $data['payments']=$this->Admin_model->Getpaymentlist($first_date,$second_date,$search);
  //    // $data['reportdate']=$this->Admin_model->Getreportdate($first_date,$second_date,$search);
   
  //   $this->load->view("admin/reports",$data);
  // }
  
  
//   supports

 public function supports(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
   $data['users']=$this->Admin_model->get_users();
    //print_r($data['users']); die;
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/support",$data);
  }
  
     public function offers(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    }
   
    $data['offers']=$this->db->query('select * from offers ORDER BY id DESC')->result();
    $data['title']= "Satarango Limitless - dashboard";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/offers",$data);
  }
  
  public function Banners(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    }
    $data['title']= "Satarango Limitless - dashboard";
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/banners",$data);
  }
  public function createoffers(){
      if(!$this->session->userdata('login_id')){
      redirect('Admin');
    }
    $this->form_validation->set_rules('title','title','trim|required');
    $this->form_validation->set_rules('code','code','trim|required');
    $this->form_validation->set_rules('offertype','offertype','trim|required');
    $this->form_validation->set_rules('start_date','start date','trim|required');
    $this->form_validation->set_rules('end_date','end date','trim|required');
    if($this->form_validation->run()==false){
       if($this->form_validation->error_string()!=""){
            $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
       }        
    }else{
        $postdata=array('title'=>$this->input->post('title'),'code'=>$this->input->post('code'),'type'=>$this->input->post('offertype'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date'));
         if($this->input->post('amount')){
             $postdata['amount']=$this->input->post('amount');
         }
         if($this->input->post('percentage')){
             $postdata['percentage']=$this->input->post('percentage');
         }
         
          if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['banner'] = $uploadData['file_name'];
            }else{
              $postdata['banner'] = 'blank.png';
                }
                
             }else{
              $postdata['banner'] = 'blank.png';
             }
         $this->db->insert('offers',$postdata);
         redirect('Admin/offers');
       }
    
    $data['title']= "Satarango Limitless - dashboard";
    $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/createoffers",$data);
    
  }
  public function userdetail($id){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
    $data['user']=$this->db->query('select * from users where id='.$id.'')->row();
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/userdetails",$data);
  }

  public function userdelete($id){
      $this->db->query('DELETE FROM `users` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">User deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/users');
  }
 
  public function deletefaq($id){
       $this->db->query('DELETE FROM `faq` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">FAQ deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/faq');
  }
 
  public function offerdelete($id){
       $this->db->query('DELETE FROM `offers` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">Offer deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/offers');
  }
 
   public function deletecategory($id){
        $this->db->query('DELETE FROM `category` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">Category deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/addcategory');
   }
   
   public function deletesubcategory($id){
         $this->db->query('DELETE FROM `subcategory` WHERE `id`='.$id.'');
      $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">Sub Category deleted successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
                             
       redirect('Admin/subcategory');
   }
      
  public function updatecategory($id){
                if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('name','category name','trim|required');
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
        $postdata=array( 'name'=>$this->input->post('name'),'bgcolor'=>$this->input->post('bgcolor'));
          if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['icon'] = $uploadData['file_name'];
            }else{
             //  print_r($this->upload->display_errors()); die;
            }
                
             }
       $this->db->where('id',$id);
       $this->db->update('category',$postdata);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> category update successfully...
    </div>');
         redirect('Admin/addcategory');
       
     }
     $data['category']=$this->db->query('select * from category ORDER BY id DESC')->result();
    $data['title']="update category| ";
    $data['detail']=$this->db->query('select * from category where id='.$id.'')->row();
    $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/updatecategory",$data);
  }
  
   public function addFaq(){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 

   $this->form_validation->set_rules('question','question','trim|required');
   $this->form_validation->set_rules('answer','answer','trim|required');
   if($this->form_validation->run()==false){
      if($this->form_validation->error_string()!==""){
              $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';  
      }
   }else{
        $postdata = array('question' =>$this->input->post('question'),'answer'=>$this->input->post('answer'));
       $this->db->insert('faq',$postdata);
$this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> faq added successfully...
    </div>');
       redirect('Admin/faq');
   }

    $data['title']="users";
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/addfaq",$data);
  }

   public function faq(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
   $data['faqs']=$this->db->query('select * from faq ORDER BY id DESC')->result();
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/faq",$data);
   }
  
 
  
  public function logout(){
      $this->session->sess_destroy();
      redirect('Admin');
  }
  

   
  
  
  public function updateprofile(){
       if(!$this->session->userdata('admin_id')){
      redirect('Admin');
    }
     $this->form_validation->set_rules('name','name','trim|required');
     $this->form_validation->set_rules('email','email','trim|required');
     $this->form_validation->set_rules('mobile','mobile','trim|required');
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
         
          $image="icon.png";         
       if(!empty($_FILES['file']['name'])){
            $config['upload_path'] = 'assets/uploaded/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
            }else{
              $image = '0';
                }
                
             }
             $this->db->where('admin_id',1);
         $this->db->update('admin',array('admin_name'=>$this->input->post('name'),'admin_image'=>$image,'admin_email'=>$this->input->post('email'),'admin_phone'=>$this->input->post('mobile')));
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> profile update successfully...
    </div>');
         redirect('Admin/updateprofile');
     }  
      
      
    $data['userdata']=$this->db->query('select * from `admin` where admin_id=1 ')->row();
    $data['title']="product detail | ";
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("super-admin/updateprofile",$data); 
  }
  
  
  public function changepassword(){
          if(!$this->session->userdata('admin_id')){
      redirect('Admin');
    }
     $this->form_validation->set_rules('old_password','old_password','trim|required');
     $this->form_validation->set_rules('password','password','trim|required');
     $this->form_validation->set_rules('cnfpassword','confirm password','trim|required|matches[password]');
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
           $admindata=$this->db->query('select * from admin where admin_id =1 ')->row();
         
                 if($this->input->post('old_password')==$admindata->admin_password){
                       $this->db->where('admin_id',1);
                 $this->db->update('admin',array('admin_password'=>$this->input->post('password')));
                  $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success!</strong> password is  update successfully...
                        </div>');
                 redirect('Admin/changepassword');
                 }else{
                       $this->session->set_flashdata("success_req",'<div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success!</strong> old password is not matched |
                        </div>');
                    redirect('Admin/changepassword');
                 }
        
      }  
      
      
    $data['userdata']=$this->db->query('select * from `admin` where admin_id=1 ')->row();
    $data['title']="profile  | ";
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("super-admin/changepassword",$data);
  }
  
   public function offerstatus(){
       $offerid=$this->input->post('id');
       $status=$this->input->post('status');
         if($status=="0"){
             $this->db->where('id',$offerid);
             $this->db->update('offers',array('status'=>'1'));
         }else{
              $this->db->where('id',$offerid);
             $this->db->update('offers',array('status'=>'0'));
         }
         echo "success";
   }
   
    public function offerupdate($id){
         if(!$this->session->userdata('login_id')){
      redirect('Admin');
    }
    $this->form_validation->set_rules('title','title','trim|required');
    $this->form_validation->set_rules('code','code','trim|required');
    $this->form_validation->set_rules('offertype','offertype','trim|required');
    $this->form_validation->set_rules('start_date','start date','trim|required');
    $this->form_validation->set_rules('end_date','end date','trim|required');
    if($this->form_validation->run()==false){
       if($this->form_validation->error_string()!=""){
            $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
       }        
    }else{
        $postdata=array('title'=>$this->input->post('title'),'code'=>$this->input->post('code'),'type'=>$this->input->post('offertype'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date'));
         if($this->input->post('amount')){
             $postdata['amount']=$this->input->post('amount');
         }
         if($this->input->post('percentage')){
             $postdata['percentage']=$this->input->post('percentage');
         }
         
          if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = 'assets/media/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('icon')){
                $uploadData = $this->upload->data();
               $postdata['banner'] = $uploadData['file_name'];
            }else{
              $postdata['banner'] = 'blank.png';
                }
                
             }
             $this->db->where('id',$id);
         $this->db->update('offers',$postdata);
           $this->session->set_flashdata("success_req",'<div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success!</strong>offer is updated successfully |
                        </div>');
         
         redirect('Admin/offers');
       }
    $data['offer']=$this->db->query('select * from offers where id='.$id.'')->row();
    $data['title']= "Satarango Limitless - dashboard";
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/updateoffers",$data);
    }
    
    public function updatefaq($id){
         if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 

   $this->form_validation->set_rules('question','question','trim|required');
   $this->form_validation->set_rules('answer','answer','trim|required');
   if($this->form_validation->run()==false){
      if($this->form_validation->error_string()!==""){
              $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';  
      }
   }else{
        $postdata = array('question' =>$this->input->post('question'),'answer'=>$this->input->post('answer'));
        $this->db->where('id',$id);
       $this->db->update('faq',$postdata);
$this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> faq updated successfully...
    </div>');
       redirect('Admin/faq');
   }

    $data['title']="users";
   $data['faq']=$this->db->query('select * from faq where id ='.$id.'')->row();
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/updatefaq",$data);
    }
    
    
    
   public function getmessagebyuser(){
    $userid=$this->input->post('userid');
      $messageww=$this->Admin_model->Getallmessagesbyuser($userid);
     // print_r($usrid);die;
      //$this->db->query('UPDATE `chat` SET `status`=1 WHERE `userid`='.$userid.'');
      foreach ($messageww as $key => $value) { 
               if($value->sender_id=="0"){ 
                    echo '<div class="d-flex flex-column mb-5 align-items-end">
              <div class="d-flex align-items-center">
                <div>
                  <span class="text-muted font-size-sm">3 minutes</span>
                  <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                </div>
                
              </div>
              <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
              '.$value->message.'
              </div>
            </div>';
                        
            } else{ 
                      echo '<div class="d-flex flex-column mb-5 align-items-start">
              <div class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-40 mr-3">
                  <img alt="Pic" src="'.base_url().'assets/media/users/300_12.jpg" />
                </div>
                <div>
                  <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">'.$value->username.'</a>
                  <span class="text-muted font-size-sm">just now</span>
                </div>
              </div>
              <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                '.$value->message.'
              </div>
            </div>';

                     } }  
  
  }
  
  
  
  
  
     public function sendmessage()
   {
     $message=$this->input->post('message');
     $userid=$this->input->post('userid');
     $data = array('receiver_id' =>$userid,'message'=>$message,'sender_id'=>'0' );
     $this->db->insert('chat',$data);
    // echo"message"; die;
     $messageww=$this->Admin_model->Getallmessagesbyuser($userid);
      // echo'';
        foreach ($messageww as $key => $value) { 
               if($value->sender_id=="0"){ 
                    echo '<div class="d-flex flex-column mb-5 align-items-end">
              <div class="d-flex align-items-center">
                <div>
                  <span class="text-muted font-size-sm">3 minutes</span>
                  <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                </div>
                
              </div>
              <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
              '.$value->message.'
              </div>
            </div>';
                        
            } else{ 
                      echo '<div class="d-flex flex-column mb-5 align-items-start">
              <div class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-40 mr-3">
                  <img alt="Pic" src="'.base_url().'assets/media/users/300_12.jpg" />
                </div>
                <div>
                  <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">'.$value->username.'</a>
                  <span class="text-muted font-size-sm">just now</span>
                </div>
              </div>
              <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                '.$value->message.'
              </div>
            </div>';

                     } }  
   }
  
//shivam
  public function change_password($id){
                if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $this->form_validation->set_rules('password','password','trim|required');
    // $this->form_validation->set_rules('confirm_password','Plan name ','trim|required');
 
   
   
     if($this->form_validation->run()==false){
         if($this->form_validation->error_string()!==""){
             $data['error']='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong>Warning!</strong> '.$this->form_validation->error_string().'

        </div>';
         }
     }else{
        $postdata=$this->input->post('password');
        $data=array('admin_password' => $postdata);
       $this->db->where('id',$id);
       $this->db->update('admin',$data);
          $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> subscription_plan update successfully...
    </div>');
         redirect('Admin/profile');
       
     }
    $data['title']=" Change Password| ";
    $data['detail']=$this->db->query('select * from admin where id='.$id.'')->row();
   $data['Notification']=$this->Admin_model->getNotification();
    $this->load->view("admin/change_password",$data);
  }




 public function deactiveoffers($id){
      
      $this->db->query('UPDATE `offers` SET `status`="1" WHERE id='.$id.'');
     $this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                              <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                              </div>
                              <div class="alert-text">offers deactivate successfully...</div>
                              <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                  </span>
                                </button>
                              </div>
                            </div>');
     redirect('Admin/offers');
  }
  
  public function activeoffers($id){
	$this->db->query('UPDATE `offers` SET `status`="0" WHERE id='.$id.'');
	$this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
	<div class="alert-icon">
	<i class="flaticon-warning"></i>
	</div>
	<div class="alert-text">offers activate successfully...</div>
	<div class="alert-close">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">
	<i class="ki ki-close"></i>
	</span>
	</button>
	</div>
	</div>');
	redirect('Admin/offers');
  }



  public function confirm_booking(){
     if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="users";
    $data['Active_jobs']=$this->db->query('select * from booking_request order by id desc')->result();
    $this->load->view("admin/confirm-booking",$data);
  }



  public function single_move_bookings(){
    if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="singleMove Booking";
   	$data['singleMoves']=$this->Admin_model->getSingleMove();
    $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/single_move_list",$data);
  }


  public function delete_singleMove_booking($id){
  	$this->db->query('DELETE FROM `booking_request` WHERE `id`='.$id.'');
  	$this->session->set_flashdata("success_req",'<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
	<div class="alert-icon">
	<i class="flaticon-warning"></i>
	</div>
	<div class="alert-text">Booking Deleted...</div>
	<div class="alert-close">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">
	<i class="ki ki-close"></i>
	</span>
	</button>
	</div>
	</div>');                     
   	redirect('Admin/single_move_bookings');
  }

  ////singleMove_booking_detail.php
  public function booking_detail($id){
  	if(!$this->session->userdata('login_id')){
      redirect('Admin');
    } 
    $data['title']="singleMove Booking";
   	$data['details']=$this->Admin_model->getSingleMoveDetail($id);
   	
    $data['Notification']=$this->Admin_model->getNotification();

    $this->load->view("admin/singleMove_booking_detail",$data);
	//booking_detail
  }
  
  }?>