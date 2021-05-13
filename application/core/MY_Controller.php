<?php

class MY_Controller extends CI_Controller

{

	

}



class MY_VenderController extends CI_Controller
{
   public function __construct()
   {
   	parent::__construct();
   	if (!$this->session->userdata('login_id'))
      {
       	redirect('VendorLogin');	
      }
   }
}