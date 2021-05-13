<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home_model extends CI_Model {


  public function registration(){
    $post_data = array(
                    'name'=>$this->input->post('name'),
                    'email'=>$this->input->post('email'),
                    'password'=>md5($this->input->post('password')),
                    'mobile'=>$this->input->post('phone'),
                    'role'=>$this->input->post('role'),
                    'company_name'=>$this->input->post('company_name'),
                    'company_type'=>$this->input->post('company_type'),
                    'website'=>$this->input->post('website'),
                    'about_company'=>$this->input->post('about'),
                    'image'=>"user.png",
                    'status'=>'1',
                              );
    $this->db->insert('users',$post_data);
    return true;
  }
  
  public function product_detail($id){
    $this->db->select('products.*, company.*, main_category.*');
    $this->db->join('company','company.id=products.company_id');
    $this->db->join('main_category','main_category.id=products.main_cate_id');
    $this->db->where('products.id',$id); 
    $query=$this->db->get('products')->row();
    return $query;
  }
}