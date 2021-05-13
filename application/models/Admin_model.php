<?php







defined('BASEPATH') OR exit('No direct script access allowed');















class Admin_model extends CI_Model {







 public function get_subcategory(){



     $this->db->select('category.name as cat_name,subcategory.*');



     $this->db->join('category','category.id=subcategory.cat_id');



    return $this->db->get('subcategory')->result();



 } 



 public function getsub_subcategory(){



     $this->db->select('subcategory.name as subcat_name,sub_subcategory.*');



     $this->db->join('subcategory','subcategory.id=sub_subcategory.subcat_id');



    return $this->db->get('sub_subcategory')->result();



 }  







  public function selectAllData($table,$orderby="")







  {      







   $this->db->select('*');







   $this->db->order_by($orderby);







   $this->db->from($table);







   $query = $this->db-> get();







   return $query->result_array();







  }







  public function selectData($table)







  {      







   $this->db->select('*');







   $this->db->from($table);







   $query = $this->db-> get();







   return $query->row();







  }   



    







  public function selectAllById($table,$orderby="", $key, $value)



  {      







   $this->db->select('*');







   $this->db->from($table);







   $this->db->where($key,$value);







   $this->db->order_by($orderby);







   $query = $this->db-> get();







   return $query->result_array();







  }







  public function selectById($table,$wheredata)



  {



    $this->db->select('*');



    $this->db->from($table);



    $this->db->where($wheredata);



    $query = $this->db->get();



    return $query->result_array();



  } 











  public function count($tbl,$id)







  {







    $this->db->select($id);







    $this->db->from($tbl);



    



    $query = $this->db->get();







    return $query->num_rows();







  } 











  public function countwhere($tbl,$id,$wheredata)







  {







    $this->db->select($id);







    $this->db->from($tbl);



    $this->db->where($wheredata);



    $query = $this->db->get();







    return $query->num_rows();







  } 



















  public function is_record_exist($tbl,$key,$value)







  {







    $query = $this->db->get_where($tbl, array($key => $value));







    if(count($query->result()))







    {







      return true;















    }else{







      return false;







    }







  }















  public function is_record_exist_update($tbl,$key,$value,$id)

  { 


    $this->db->select('*');

    $this->db->from($tbl);

    $this->db->where($key.'=', $value);

    $this->db->where('id !=', $id); // Produces: WHERE name != 'Joe' AND id < 45.







    $query = $this->db->get();







  







    if(count($query->result()))







    {







      return true;















    }else{







      return false;







    }







  }











  function insertAllData($table,$data)



  { 







    $result = $this->db->insert($table, $data);



    $insert_id = $this->db->insert_id();



    return  $insert_id;



  }  















  function updateData($table,$data,$id)

  { 

    $this->db->where('id', $id);

    $this->db->update($table, $data);

    return true;
  }











  function updateDatas($table,$data,$key,$value)



  { 



    $this->db->where($key,$value);



    $this->db->update($table, $data);



    return true;



  }



  



 public function update($wheredata,$table,$data){



	$query = $this->db->where($wheredata);



	$query = $this->db->update($table,$data);



// 	echo $this->db->last_query();exit();



	$query = $this->db->get();



	return $query->result_array();



	



}















  public function select_single_row($table,$key,$value) 



  {







    $this->db->select('*');



    $this->db->from($table);



    $this->db->where($key,$value);



    $query = $this->db->get();



    return $query->row();



  }







  // public function select_row(){



  // }







  public function insert($table,$data)



  {   



    $this->db->insert($table, $data);



    $insert_id = $this->db->insert_id();



    return  $insert_id;



  } 











  public function select($table,$order_by){ 



    $this->db->select('*');



    $this->db->order_by($order_by);



    $this->db->from($table);



    $query = $this->db->get();



    return $query->result_array();



  }







  public function get_degree(){



    $query=$this->db->get('tbl_degree');



    $query_result = $query->result_array();



    return $query_result;



  }







  public function selectWhere($table,$wheredata="")



  {



    $this->db->select('*');



    $this->db->from($table);



    $this->db->where($wheredata);



    $query = $this->db->get();



    return $query->result_array();



  }



  public function selectWhereOrderby($table,$wheredata="",$orderby="")



  {



    $this->db->select('*');



    $this->db->from($table);



    $this->db->where($wheredata);



    $this->db->order_by($orderby);



    $query = $this->db->get();



    return $query->result();



  }



  public function GetVendorlist(){



             $this->db->order_by('id','desc');



        $query=$this->db->get('vendor')->result();



        return $query;



  }



  public function addVendor()



  {



    $data = array(



                  'name' =>$this->input->post('name'),



                  'email_id' =>$this->input->post('email'),



                  'mobile' =>$this->input->post('mobile'),



                  'password' =>$this->input->post('password'),



                   'services_id'=>implode(',',$this->input->post('service[]')) 



                   );



    $this->db->insert('vendor',$data);



      $lastid=$this->db->insert_id();



      $this->db->where('id',$lastid);



      $this->db->update('vendor',array('vendor_id' =>"EasyId0".$lastid));



      return;



  }



  



  



  public function getsubcategory(){



      



      $this->db->select('main_category.* ,main_category.name as maincatename, category.* , category.name as categoryname , sub_category.*');



      $this->db->join('main_category','main_category.id=sub_category.main_cate_id');



      $this->db->join('category','category.id=sub_category.cat_id');



      $qiery=$this->db->get('sub_category')->result();



       // print_r($qiery); die;



      return $qiery;



  }



  



  public function getcategory(){



      



      $this->db->select('main_category.* ,main_category.name as maincatename, category.*');



      $this->db->join('main_category','main_category.id=category.main_cate');



      $qiery=$this->db->get('category')->result();



      return $qiery;



  }











  public function get_users(){



      $this->db->select('chat.*, users.id as userid, users.image as userimage, users.fname as username ');



      $this->db->join('users','users.id=chat.sender_id');



      $this->db->group_by('chat.sender_id');



      return $this->db->get('chat')->result();      



  }







  public function Getallmessagesbyuser($userid){







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



           



           return $result;



  }







public function getpanding()



{



  $this->db->select('*');



  $this->db->from('jobs');



  $this->db->where('status',0);



 $query= $this->db->get();



 $result = $query->result();



 return $result;







}



public function getActive()
{
	date_default_timezone_set('Asia/Kolkata'); 
	$date= date("Y-m-d");
	$this->db->select('*');
	$this->db->from('jobs');
	$this->db->where('status',1);
	$query= $this->db->get();
	$result = $query->result();
	return $result;
}



public function getactivedetails($id)



{



   



  $this->db->select('t1.id,t2.fname,t2.email,t2.phone,t1.title,t1.desecration,t1.amount,t1.start_date,t1.end_date');



  $this->db->from('jobs as t1');



 $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');







  $this->db->where('t1.status',1);



  $this->db->where('t1.id',$id);



   



 $query= $this->db->get();



 $result = $query->row();



 return $result;







}







public function getpendingdetails($id)



{



   



  $this->db->select('t1.id,t2.fname,t2.email,t2.phone,t1.title,t1.desecration,t1.amount,t1.start_date,t1.end_date');



  $this->db->from('jobs as t1');



 $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');







  $this->db->where('t1.status',0);



  $this->db->where('t1.id',$id);



   



 $query= $this->db->get();



 $result = $query->row();



 return $result;







}











public function getcompletedetails($id)



{



    date_default_timezone_set('Asia/Kolkata'); 



      $date= date("Y-m-d");



  $this->db->select('t1.id,t2.fname,t2.email,t2.phone,t1.title,t1.desecration,t1.amount,t1.start_date,t1.end_date');



  $this->db->from('jobs as t1');



 $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');







  $this->db->where('t1.id',$id);



  $this->db->where('end_date<=',$date);



   



 $query= $this->db->get();



 $result = $query->row();



 return $result;







}











  public function getcomplete()



{



   date_default_timezone_set('Asia/Kolkata'); 



      $date= date("Y-m-d");



  $this->db->select('*');



  $this->db->from('jobs');



  $this->db->where('end_date<=',$date);



 $query= $this->db->get();



 $result = $query->result();



 return $result;







}







 public function get_service(){



   



    $this->db->select('t1.id,t2.image,t1.earning,t1.wages,t1.service_name,t1.status');



    $this->db->from('services as t1');



    $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;     



  }   







 public function repotslist($first_date,$second_date,$search){



   







    if (!empty($first_date) && !empty($second_date)) {



  $comparefirst = date('Y-m-d', strtotime($first_date));



     $comparesecond =  date('Y-m-d', strtotime($second_date));



       $this->db->where('t1.date >=', $comparefirst);



   $this->db->where('t1.date <=', $comparesecond);



 }   







 if(!empty($search))



 {



 $this->db->like('t2.fname', $search);



 } 



    $this->db->select('t1.id,t2.fname,Date(t1.date) as date,t2.email,t1.reason');



    $this->db->from('reports as t1');



    $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;     



  }   







 public function Notification($first_date,$second_date,$search){



   







    if (!empty($first_date) && !empty($second_date)) {



  $comparefirst = date('Y-m-d', strtotime($first_date));



     $comparesecond =  date('Y-m-d', strtotime($second_date));



       $this->db->where('t1.created_date >=', $comparefirst);



   $this->db->where('t1.created_date <=', $comparesecond);



 }   







 if(!empty($search))



 {



 $this->db->like('t1.subject', $search);



 } 



    $this->db->select('t1.id,t1.created_date as date,t1.type,t1.subject,t1.message');



    $this->db->from('notification as t1');



    // $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;     



  }   







	public function getNotification(){
    	date_default_timezone_set('Asia/Kolkata'); 
      	$date= date("Y-m-d");
  		$comparefirst = date('Y-m-d', strtotime($date."-7 day"));
        $this->db->select('t1.id,t1.created_date as created_date,t1.type,t1.subject,t1.message');
        $this->db->from('notification as t1');
        $this->db->where('created_date>=',$comparefirst);
        $query= $this->db->get();
        $result =$query->result();
        return $result;
    }   


	public function get_servicedetails($id){
		$this->db->select('t2.image,t2.fname,t2.address,t2.dob,t2.phone,t1.earning,t1.wages,t1.service_name,t1.status');
		$this->db->from('services as t1');
		$this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');
		$this->db->where('t1.id',$id);
		$query= $this->db->get(); 
		$result =$query->row();
		return $result;
	}   











 public function get_last_creted_id($key,$table) 



  {



    $this->db->select("$key");



    $query = $this->db->get("$table");



    return  $query->last_row();



  }















public function getcategories($category) 



  {



    $this->db->select("*");



    $this->db->from("categories");



    $this->db->where("name",$category);



    $query = $this->db->get();



    return  $query->row();



  }











  /*BOOKING SECTION*/



  function pendingBooking(){



    $this->db->select('booking_request.*,users.fname,v.fname as vendor_name,subcategory.name as service');



    $this->db->from('booking_request');



    $this->db->join('users','users.id=booking_request.user_id','left');



    $this->db->join('users as v','v.id=booking_request.vendor_id','left');



    $this->db->join('subcategory','subcategory.id=users.skills','left');



    $this->db->where('job_status','Pending');



    $res=$this->db->get()->result();



    return $res;



  }







  /*inprogress Booking*/



  function inprogressBooking(){



    $this->db->select('booking_request.*,users.fname,v.fname as vendor_name');



    $this->db->from('booking_request');



    $this->db->join('users','users.id=booking_request.user_id','left');



    $this->db->join('users as v','v.id=booking_request.vendor_id','left');



    $this->db->where('job_status','Inprogress');



    $res=$this->db->get()->result();



    return $res;



  }



  /*complete Booking fun*/



  function completeBooking(){



    $this->db->select('booking_request.*,users.fname,v.fname as vendor_name');



    $this->db->from('booking_request');



    $this->db->join('users','users.id=booking_request.user_id','left');



    $this->db->join('users as v','v.id=booking_request.vendor_id','left');



    $this->db->where('job_status','Complete');



    $res=$this->db->get()->result();



    return $res;



  }











  /*Booking details*/



  function booking_details($bookingId){



    $this->db->select('booking_request.*,users.fname,users.phone,users.image,v.fname as vendor_name,subcategory.name as service');



    $this->db->from('booking_request');



    $this->db->join('users','users.id=booking_request.user_id','left');



    $this->db->join('users as v','v.id=booking_request.vendor_id','left');



    $this->db->join('subcategory','subcategory.id=users.skills','left');



    $this->db->where('booking_request.bookingId',$bookingId);



    $res=$this->db->get()->row();



    return $res;



  }







  /*app_feedback*/



  function app_feedback(){



    $this->db->select('app_feedback.*,users.fname,users.image');



    $this->db->from('app_feedback');



    $this->db->join('users','users.id=app_feedback.user_id','left');



    $this->db->order_by('app_feedback.id','desc');



    $res=$this->db->get()->result();



    return $res;



  }


  /*complaints List*/
  function complaintsList(){
    $this->db->select('complaints.*,users.fname,users.image');
    $this->db->from('complaints');
    $this->db->join('users','users.id=complaints.user_id','left');
    $this->db->order_by('complaints.id','desc');
    $res=$this->db->get()->result();
    return $res;
}


public function getSingleMove()
{
	date_default_timezone_set('Asia/Kolkata'); 
	$date= date("Y-m-d");
	$this->db->select('booking_request.*,users.fname');
	$this->db->from('booking_request');
	$this->db->join('users','users.id=booking_request.user_id','left');
	$this->db->where('booking_request.type','single move');
	$this->db->where('booking_request.job_status','Pending');
	$query= $this->db->get();
	$result = $query->result();
	return $result;
}

//get Single Move Detail
public function getSingleMoveDetail($id){
 date_default_timezone_set('Asia/Kolkata'); 
	$date= date("Y-m-d");
	$this->db->select('booking_request.*,users.fname,v.fname as v_name');
	$this->db->from('booking_request');
	$this->db->join('users','users.id=booking_request.user_id','left');
	$this->db->join('users as v','v.id=booking_request.vendor_id','left');
	$this->db->where('booking_request.type','single move');
	$this->db->where('booking_request.job_status','Pending');
	$this->db->where('booking_request.id',$id);
	$query= $this->db->get();
	$result = $query->row();
	return $result;
}

}?>