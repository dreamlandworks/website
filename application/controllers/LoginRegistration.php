
  <?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class LoginRegistration extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
     $this->load->database();
         date_default_timezone_set('Asia/Calcutta');
    $this->load->model('UserModel');

    $this->load->library('form_validation');
$this->load->helper('html');

    error_reporting();
  }
 public function index()
 {


    $this->load->view('frontend/signup');
 }

  

  private function hash_password($password)
	{
  	return hash_password($password, PASSWORD_DEFAULT);
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

  public function register()
  {

   	$json = array();
    

    $this->form_validation->set_rules('fname', 'Name', 'required',
            array('required' => 'You must provide a %s.')
          );
    $this->form_validation->set_rules('phone', 'Mobile', 'required',
            array('required' => 'You must provide a %s.')
          );
    $this->form_validation->set_rules('email', 'Email', 'required',
            array('required' => 'You must provide a %s.')
          );
   
           
    $this->form_validation->set_rules('lat', 'Allow Location', 'required',
            array('required' => 'You must provide a %s.')
          ); 
           $this->form_validation->set_rules('lang', 'Allow Location', 'required',
            array('required' => 'You must provide a %s.')
          );
    if ($this->form_validation->run() == FALSE)
    { 
      $json['result'] = false ;
      $json['msg'] = "All required field are not filled." ;
    }
    else
    {
      	$post_data = (array) $this->input->post();
       
      
       $random_no = rand(1000,9999);
        $post_data['otp'] = $random_no;
      
      if(!$this->UserModel->is_record_exist('users','email', "{$post_data['email']}" ))
      {
        if(!$this->UserModel->is_record_exist('users','phone', "{$post_data['phone']}" ))
        { 
          $result = $this->UserModel->insertAllData('users', $post_data);
          if($result)
          {
            $message = "Your Mobile verification OTP :{$random_no}";

            $send_sms = $this->smsSEND($message,$post_data['phone']);
           
             $json['result'] = true;
            $json['msg'] = "Send Your Otp in phone";
          }else{
            $json['result'] = false ;
            $json['msg'] = "Something went wrong. Please try later.";
          }
        }else{
            $json['result'] = false ;
            $json['msg'] = "Mobile number already exits. Please Try another.";
        }
      }else{
          $json['result'] = false ;
          $json['msg'] = "Email already exits. Please Try another.";
      }
    }
    echo json_encode($json);
  }




public function verify_otp(){
    $otp =$this->input->post('otp');
    extract($_POST);
    if (isset($otp)) {

      $check_otp=$this->db->query("SELECT * FROM `users` WHERE  `otp`='$otp' AND `verify_otp`= 1");
      if ($check_otp->num_rows() > 0) {

        $data['result']=false;
        $data['msg']="Otp already verify";
      }else{
        $wheredata = array(
          'table'=>'users',
          'where'=>array('otp'=>$otp)
        );
        $datas = array('verify_otp'=>1);
        $wheredatas = array('otp'=>$otp);
        $result=$this->UserModel->gettabledata($wheredata);
        if($result) {
          $results=$this->UserModel->UpdateAllData('users',$wheredatas,$datas);
          $id=$query = $this->db->get_where('users', array('otp'=>$otp))->row()->id;
         
          $data['result']=true;
          $data['id']=$id;

          $data['msg'] ="Otp verify Successfully.";
        }else{
          $data['result'] =false;
          $data['msg'] ="sorry otp not valid.";
        }
      }
    }else{
      $data['result']=false;
      $data['msg'] ="parameter required user_id,otp";
    }
    echo json_encode($data);
  }






 public function set_password(){

    $this->form_validation->set_rules('password','password','trim|required');


    $this->form_validation->set_rules('c_password','c_password','trim|required|matches[password]');
     // extract($_POST);
     $id =$this->input->post('id');
   
    
    
    if($this->form_validation->run()==false){
      $json["result"] = false;  
      $json["msg"] =  strip_tags($this->form_validation->error_string());
    }else{
       $post_data = (array) $this->input->post();
       unset($post_data['c_password']);
      $post_data['password'] = md5($post_data['password']);
      $this->db->where('id',$id);
      $check= $this->db->update('users',$post_data);
      if($check){
        $json["result"] = true;  
        $json["msg"] =  "successfully password";
      }else{
        $json["result"] = false;  
        $json["msg"] =  "user id is not exist";
      }
    }
    echo json_encode($json);
  }





  public function login()
  {  
   
    extract($_POST);
    if(isset($mobile_email) && isset($password))
    {
      $result =  $this->UserModel->check_credentials($mobile_email);
      if($result)
      {
          $pass= $result->password;
        $password=md5($this->input->post('password'));

        if ($pass == $password) {
          
            $newdata = array(
             'name'  => $result->fname,
             'email'     => $result->email,
             'service_provider'     => $result->service_provider,
             'user_login' => TRUE,
             'Id'=>$result->id
            );
             $this->session->set_userdata($newdata);
           
            $data['result'] = true;
            $data['msg']    = 'Successfully logged in.';
          
        }else{
          $data['result'] = false;
          $data['msg']    = 'Invalid Password';
        }
      }else{
        $data['result'] = false;
        $data['msg']    = 'Invalid email or mobile.';
      }  
    }else{
      $data['result'] = 'false';
      $data['msg']    = 'Please provide parameters(mobile,password)';            
    }          
    echo json_encode($data);
  }


 


 public function logout() { 
              $this->session->unset_userdata('user_login'); 
   $this->session->sess_destroy();
        redirect('Home'); 


      }


      public function confirm_epassword()
{
$id=$this->session->userdata('Id');

 extract($_POST);
    if(isset($old_password) && isset($password) && isset($c_password))
    {

      $result =  $this->UserModel->check_user($id);
      if($result)
      {
        if (md5($this->input->post('old_password'), $result->password)) 
        {
          
             $post_data  = array(
              'password' => md5($password), 
            );

              $this->db->where('id',$id);
              $res =    $this->db->update('users',$post_data);
                 
            if($res)
            {
               $this->session->unset_userdata('user_login'); 
                $this->session->sess_destroy();
              $data['result'] = true;
              $data['msg']    = 'Successfully change password'; 
            }else{
              $data['result'] = false;
              $data['msg']    = 'Something went wrong.'; 
            }
        }else{
          $data['result'] = false;
          $data['msg']    = 'Old Password Not Match';
        }
      }else{
        $data['result'] = false;
        $data['msg']    = 'Invalid password.';
      }  
    }else{
      $data['result'] = 'false';
      $data['msg']    = 'Please provide parameters(mobile,password)';            
    }          
    echo json_encode($data);
}



// Forgot password

public function forgot_password()
    {
      $email = $this->input->post('email');
      if (isset($email) ) {

        $wheredata = array(
        'email' => $email
        );

        $result    = $this->UserModel->selectAllByIds('users', $wheredata);

        if ($result) {
            $wherenewpass = array(
              'email' => $email
            );

            $random_no = rand(1000,9999);
            $otp['password'] = md5($random_no);
            $res  = $this->UserModel->updatePass($wherenewpass,'users', $otp);
            $res1 = $this->UserModel->selectAllByIds('users', $wherenewpass);
            if ($res1) {
              foreach ($res1 as $key => $value) {
                $myotp    = $value['password'];
                $name     = $value['fname'];   
              } 
            }

            

            $ri_email = 'satrangolimitless@gmail.com';
            $to       = $email;
            $subject  = 'Reset Your Password';
            $headers = "From: <" . $ri_email . ">" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $msg = '';
            $msg .= '
            <html><!doctype html>
              <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width">
                <title>Simple Transactional Email</title>
                <style>
                @media only screen and (max-width: 620px) {
                  table[class=body] h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important;
                  }
                  table[class=body] p,
                  table[class=body] ul,
                  table[class=body] ol,
                  table[class=body] td,
                  table[class=body] span,
                  table[class=body] a 
                  {
                    font-size: 16px !important;
                  }
                  table[class=body] .wrapper,
                  table[class=body] .article 
                  {
                    padding: 10px !important;
                  }
                  table[class=body] .content {
                  padding: 0 !important;
                  }
                  table[class=body] .container {
                  padding: 0 !important;
                  width: 100% !important;
                  }
                  table[class=body] .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important;
                  }
                  table[class=body] .btn table {
                    width: 100% !important;
                  }
                  table[class=body] .btn a {
                    width: 100% !important;
                  }
                  table[class=body] .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important;
                  }
                }
                @media all {
                  .ExternalClass {
                    width: 100%;
                  }
                  .ExternalClass,
                  .ExternalClass p,
                  .ExternalClass span,
                  .ExternalClass font,
                  .ExternalClass td,
                  .ExternalClass div {
                  line-height: 100%;
                  }
                  .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important;
                  }
                  #msgViewBody a {
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-family: inherit;
                    font-weight: inherit;
                    line-height: inherit;
                  }
                  .btn-primary table td:hover {
                    background-color: #34495e !important;
                  }
                  .btn-primary a:hover {
                    background-color: #34495e !important;
                    border-color: #34495e !important;
                  }
                }
                </style>
              </head>
              <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
                  <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                   <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                      <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
                        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
                        <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
                          <tr>
                            <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                 <tr>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.ucfirst($name).'</p>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"></p>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Please sign in to with your New Password.</p>
                                    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                                    <tbody>
                                      <tr>
                                        <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                              <tbody>
                                                <tr>
                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">Your New password is: <b>' . $random_no . '.</b>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thanks and Regards.</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">satarango Team.</p>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    </table>
                        </div>
                      </div>
                    </td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                  </tr>
                </table>
              </body>
            </html>';
            if (mail($to, $subject, $msg, $headers)) {
                $data['result'] = true;
                $data['msg']    = 'Please check your mail for new password';
                 $data['password']    = $random_no;
            } else {
                $data['result'] = false;

                $data['msg']    = "something went wrong!!.";
            }

        } else {
            $data['result'] = false;

            $data['msg']    = "Email not exist.";
        }

        }else{
          $data['result']=false;

          $data['msg']='parameter email required!!';
        }
        echo json_encode($data);

    }

     public function Approve_status(){
      $user_id=$this->input->post('user_id');
      $service_provider=$this->input->post('service_provider');
      $post_data = array('service_provider' =>$this->input->post('service_provider') );
      $this->db->where('id',$user_id);     
      $res= $this->db->update('users',$post_data);

      if($res){
        if($service_provider==1){
    
          echo '<a class="btn btn-success"  onclick="myFunction('.$user_id.',0)">Provider</a>';
    
        }else if($service_provider==0){
    
          echo '<a class="btn btn-warning"  onclick="myFunction('.$user_id.',1)">User</a>';
        }
    
      }

    }



// send otp signup
     function smsSEND($message,$mobile){


    $username="Satrango";


    $password = "Rango123";


    $type ="TEXT";


    $sender="STRNGO";

    $url="https://sms.prowtext.com/sendsms/sendsms.php";



    $postData = array(

      'username'=>$username,


      'password' => $password,

      'type' => $type,

      'sender'=>$sender,


      'mobile' => $mobile,
 'message' => $message,

  'response'   => 'json'


    );




    // print_r($postData);exit();


    $ch = curl_init();


      curl_setopt_array($ch, array(
     CURLOPT_URL => $url,

    CURLOPT_RETURNTRANSFER => true,

     CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => $postData
 ));



  //Ignore SSL certificate verification

  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

  $output = curl_exec($ch);
  curl_close($ch);


      $json = json_decode($output, true);

       return $json['type'];


  }


   

  

}