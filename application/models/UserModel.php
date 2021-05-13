<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model 
{
  public function selectAllData($table,$order_by){
   $this->db->select('*');
   $this->db->order_by($order_by);
   $this->db->from($table);
   $query = $this ->db-> get();    
   return $query->result_array();
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

   function insertAllData($table,$userdata)
  { 
    $this->db->insert($table, $userdata);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }


  public function check_credentials1($user_name)

  {

    $query = $this->db->get_where("restaurants", array("user_name" => $user_name));

    if(count($query->result()))

    {

      return $query->row();



    }else{

      return array();

    }

  }
   public function check_credentials($mobile_or_email)
  {
    $query = $this->db->query("SELECT * FROM users WHERE `phone`= '$mobile_or_email' OR `email`= '$mobile_or_email'");
    if(count($query->result()))
    {
      return $query->row();
    }else{
      return array();
    }
  } 
  public function check_user($id)
  {
    $query = $this->db->query("SELECT * FROM users WHERE `id`= '$id'");
    if(count($query->result()))
    {
      return $query->row();
    }else{
      return array();
    }
  }


   public function select_single_row($table,$key,$value) 
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($key,$value);
    $query = $this->db->get();
    return $query->row();
  }

  function updateData($table,$data,$id)
  { 
    $this->db->where('id', $id);
    $this->db->update($table, $data);
    return true;
  }

   public function get_last_creted_id($key,$table) 
  {
    $this->db->select("$key");
    $query = $this->db->get("$table");
    return  $query->last_row();
  }



  public function get_tarif($id) {
 $this->db->select("*");
    $this->db->from('vendor_tariff_time');
    $this->db->where("user_id",$id);
    $query= $this->db->get(); 

      $result = $query->row_array();
      return $result;  
        }


  public function get_user($id) {
 $this->db->select("*");
    $this->db->from('users');
    $this->db->where("id",$id);
    $query= $this->db->get(); 

      $result = $query->row_array();
      return $result;  
        }






  public function check_duplication($action = "", $email = "", $user_id = "") {
        $duplicate_email_check = $this->db->get_where('users', array('email' => $email));

       if ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return true;
            }
        }
    }

    public function edit_services($user_id = "") { 
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            
            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            
           

            if(!empty($_FILES['video']['name']))
        {
          $video = $_FILES["video"]['name'];
          $configVideo['upload_path'] = 'assetsfront/uploaded/video/';
          $configVideo['allowed_types'] = 'mp4|3gp|mkv|flv|webm|mp2|mpeg|mpe|mpv|ogg|m4p|m4v';
          $configVideo['file_name'] = $video;
          $configVideo['overwrite'] = TRUE;
          $configVideo['remove_spaces'] = TRUE;        
          $this->upload->initialize($configVideo);
          if (!$this->upload->do_upload('video')) {
            $error = array('error' => $this->upload->display_errors());
             echo $error['error'];
            }else{        
            $DetailArray = $this->upload->data();
            $data['video'] =  $DetailArray['file_name'];
          }
        }

       if(!empty($_FILES['id_proof']['name'])){
            $config['upload_path'] = 'assets/uploaded/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('id_proof')){
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
                $data['id_proof'] = $image;
            }else{
              $image = '0';
                }
                
             }

            $data['fname'] = $this->input->post('name');
            $data['phone'] = $this->input->post('mobile');
            $data['dob'] = $this->input->post('dob');
            $data['profession_id'] = $this->input->post('profession_id');
            $data['gender'] = $this->input->post('gender');
            $data['qualification'] = $this->input->post('qualification');
            $data['language'] = $this->input->post('language');
            // $data['skills'] = $this->input->post('skills');
           // $data['skills'] =  implode(",",$this->input->post('skills'));

            $data['about'] = $this->input->post('about');
            $data['about'] = $this->input->post('about');
            
            $data['pr_hours'] = $this->input->post('pr_hours');
            $data['pr_days'] = $this->input->post('pr_days');
            $data['min_charge'] = $this->input->post('min_charge');
            $data['extra_charge'] = $this->input->post('extra_charge');
                                

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
           $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>user_update_successfully...</strong>  
    </div>');
        }else {
 $this->session->set_flashdata("success_req",'<div class="alert alert-danger alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>email_duplication</strong>
    </div>');       

     }

}
  public function edit_servicestariff($user_id = "") { 

     $duplicate_user_id = $this->db->get_where('vendor_tariff_time', array('user_id' => $user_id));
             
         if ($duplicate_user_id->num_rows() > 0) {

                if ($duplicate_user_id->row()->user_id == $user_id) {                                    
                           $from_time = $this->input->post('from_time');
                          $to_time = $this->input->post('to_time');
                          $day_type = $this->input->post('day_type');
                          $day_name =$this->input->post('day_name');
                              for($i=0; $i<count($from_time) ;$i++){

                              if($from_time[$i]!=null || $from_time[$i]!="")
                              $from_timeData[] = array('FromTime' => $from_time[$i]);
                              }

                              for($i=0; $i<count($to_time) ;$i++){

                              if($to_time[$i]!=null || $to_time[$i]!="")
                              $to_timeData[] = array('ToTime' => $to_time[$i]);
                              }

                              for($i=0; $i<count($day_type) ;$i++){

                              if($day_type[$i]!=null || $day_type[$i]!="")
                              $day_typeData[] = array('Day_Type' => $day_type[$i]);
                              }
                             /* for($i=0; $i<sizeof($day_name) ;$i++){
                              
                              if($day_name[$i]!=null || $day_name[$i]!="")
                              $day_nameData[] = array('day_name' => $day_name[$i]);
                              }
*/

                         /* $dataIn = (object)array(
                  
                            "day_name" => array("day_name"=>$day_name),
                                  );*/
                             // for($i=0; $i<count($day_name) ;$i++){

                             //  if($day_name[$i]!=null || $day_name[$i]!="")
                             //  $day_nameData[] = array('day_name' => $day_name[$i]);
                             //  }

                          
     
      
                             // for($i=0; $i<count($day_name) ;$i++){

                             //  if($day_name[$i]!=null || $day_name[$i]!="")
                             //  $day_nameData[] = array('day_name' => $day_name[$i]);
                             //  }

                          
     
      
                           
                         echo json_encode($day_name);
                         die();
                        
                            $data['from_time'] = json_encode($from_timeData);;
                             $data['to_time'] = json_encode($to_timeData);
                             $data['day_type'] = json_encode($day_typeData);
                            $data['day_name'] = json_encode($day_nameData);


                                  
                            $id= $duplicate_user_id->row()->id;

                             $this->db->where('id', $id);
                             $this->db->update('vendor_tariff_time', $data);
           
                }

                else {
                    return false;
                }
            }else {
                
           
             /* $data['pr_hours'] = $this->input->post('pr_hours');
            $data['pr_days'] = $this->input->post('pr_days');
            $data['min_charge'] = $this->input->post('min_charge');
            $data['extra_charge'] = $this->input->post('extra_charge');*/
             $from_time = $this->input->post('from_time');
        $to_time = $this->input->post('to_time');
        $day_type = $this->input->post('day_type');
        $day_name = $this->input->post('day_name');
      /* $collection = array();
           $data= array('from_time' => $from_time, );
        array_push($collection,$data);*/

      /*  $dataIn = (object)array(
    "from_time" => array("from_time"=>$from_time),
    
);*/
   /*     $dataIn = (object)array(
 
  "from_time" => $from_time,
);

echo json_encode($dataIn);
*/

/*    for($i=0; $i<count($day_name);$i++)
{

$dataIn = (object)array(
 
  "day_name" => $day_name,
);
}*/


for($i=0; $i<count($from_time) ;$i++){

if($from_time[$i]!=null || $from_time[$i]!="")
$from_timeData[] = array('FromTime' => $from_time[$i]);
}


for($i=0; $i<count($to_time) ;$i++){

if($to_time[$i]!=null || $to_time[$i]!="")
$to_timeData[] = array('ToTime' => $to_time[$i]);
}


for($i=0; $i<count($day_type) ;$i++){

if($day_type[$i]!=null || $day_type[$i]!="")
$day_typeData[] = array('Day_Type' => $day_type[$i]);
}

/*
for($i=0; $i<count($day_name) ;$i++){
//echo $day_name[0];
if($day_name[$i]!=null || $day_name[$i]!="")
$day_nameData[] = array('day_name' => $day_name[$i]);
}*/


     $data['user_id'] = $user_id;
            $data['from_time'] = json_encode($from_timeData);;
            $data['to_time'] = json_encode($to_timeData);
            $data['day_type'] = json_encode($day_typeData);
             $data['day_name'] = json_encode($day_nameData);
            
        
           $this->db->insert('vendor_tariff_time', $data);
            }

       
    }
      


      

      public function edit_profile($user_id ="")
      {


         $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            
            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            $data['fname'] = $this->input->post('name');
            $data['phone'] = $this->input->post('mobile');
            $data['dob'] = $this->input->post('dob');
            $data['gender'] = $this->input->post('gender');

         if(!empty($_FILES['image']['name'])){
            $config['upload_path'] = 'assets/uploaded/users/';
            $config['allowed_types'] = '*';
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
        
            if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
                $data['image'] = $image;
            }else{
              $image = '0';
                }
                
             }
              $this->db->where('id', $user_id);
            $this->db->update('users', $data);

                $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>user_update_successfully...</strong>  
    </div>');
        }else {
 $this->session->set_flashdata("success_req",'<div class="alert alert-danger alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>email_duplication</strong>
    </div>');       

     }

      }
   
     function trim_and_return_json($untrimmed_array) {
        $trimmed_array = array();
        if(sizeof($untrimmed_array) > 0){
            foreach ($untrimmed_array as $row) {
                if ($row != "") {
                    array_push($trimmed_array, $row);
                }
            }
        }
        return json_encode($trimmed_array);
    }
   


 public function get_services()
 {
  $this->db->select("*");
  $this->db->from("category");
  $this->db->order_by("id", "asc");
$this->db->limit(3);
$query = $this->db->get();

return $query->result();
 }

public function get_allservices()
{
$this->db->select("*");
$this->db->from("subcategory");
$this->db->order_by("id", "desc");
$query = $this->db->get();

return $query->result();
}

  public function get_category()
  {
  $this->db->select("*");
  $this->db->from("subcategory as t1");
  $this->db->order_by("id", "desc");
  $this->db->limit(6);
  $query = $this->db->get();

  return $query->result();
  }




  public function get_allsub_services()
  {
    $this->db->select("*");
    $this->db->from("subcategory as t1");
    $this->db->order_by("id", "desc");
    $query = $this->db->get();
    return $query->result();
  }





  public function category_services($param1)
  {
    $this->db->select("t1.id,t1.name,t1.icon,t2.id as s_id,t2.name as s_name,t2.icon  as s_icon");
    $this->db->from("subcategory as t2");
    $this->db->join("category  as t1", "t1.id=t2.cat_id","LEFT");
    $this->db->where("t2.cat_id", $param1);
    $this->db->order_by("t2.id", "desc");
    $query = $this->db->get();
    return $query->result();
  }


  public function get_popular_hired()
  {
    $res=$this->db->query('SELECT rating_review.*,AVG(rating) as avg_rat,professions.name as professions_name,users.fname as vendor_name,users.image as vendor_image,users.address FROM `rating_review`
    LEFT JOIN professions ON professions.id=rating_review.service_id
    LEFT JOIN users ON users.id=rating_review.vendor_id
    GROUP by vendor_id LIMIT 4' )->result();
    return $res;
  }


 public function get_allpopular()
 {
 $res=$this->db->query('SELECT rating_review.*,AVG(rating) as avg_rat,professions.name as professions_name,users.fname as vendor_name,users.image as vendor_image FROM `rating_review`
    LEFT JOIN professions ON professions.id=rating_review.service_id
    LEFT JOIN users ON users.id=rating_review.vendor_id
    GROUP by vendor_id')->result();

return $res;
 }


public function getall_services_list($param1)
{
  $this->db->select('t1.id as user_id,t1.fname as user_name,t1.service_provider,t1.image as user_image,t1.address,t2.id,t2.name,t2.icon,t3.rating');
  $this->db->from('subcategory as t2');
  $this->db->join('users as t1','t1.skills = t2.id','LEFT');
  $this->db->join('rating_review as t3','t3.vendor_id=t1.id','left');
  $this->db->where('t2.id',$param1);
  
  $this->db->where('t1.service_provider',1);
  $this->db->order_by('t2.id','desc');
  $query =$this->db->get();
  $result = $query->result();


  return $result;
}


// public function getall_services_vendor_list($keyword,$sort_price,$filter)
// {

//   $issd=$this->session->userdata('Id');
//   $this->db->select('lat,lang');
//   $this->db->from('users');
//   $this->db->where('id',$issd);
//   $query1 =$this->db->get();
//   $lat=$query1->row()->lat;
//   $lang=$query1->row()->lang;
//   // $user_id=0;
//   $custom_query = "SELECT
//   users.id as user_id ,
//   users.fname as user_name,
//   users.image as user_image,
//   users.language,
//   users.lat,
//   users.lang,
//   users.qualification,
//   users.min_charge,
//   users.about,
//   subcategory.id,
//   subcategory.name,
//   subcategory.icon,

//   (SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review
//   WHERE rating_review.vendor_id =users.id) as rating,
//   ROUND((((acos(sin(('$lat'*pi()/180)) *sin((users.lat *pi()/180))+cos(('$lat'*pi()/180)) * cos((users.lat *pi()/180)) * cos((('$lang'- users.lang)*pi()/180))))*180/pi())*60*1.1515),1)
//   AS distance
//   FROM users
//   LEFT JOIN subcategory ON FIND_IN_SET(CAST(subcategory.ID AS CHAR), users.skills) > 0
//   WHERE 1 = 1 ";
//   if (!empty($keyword))
//   {
//   $custom_query .=" AND users.language LIKE '%$keyword%' OR subcategory.name LIKE '%$keyword%' OR users.fname LIKE '%$keyword%' OR users.qualification LIKE '%$keyword%'";

//   }
//   elseif(!empty($sort_price=='price-desc-rank'))
//   {
//   $custom_query .=" ORDER BY users.min_charge DESC ";

//   }

//   elseif(!empty($sort_price=='price-asc-rank'))
//   {
//   $custom_query .=" ORDER BY users.min_charge ASC ";

//   }
//   elseif(!empty($filter=='Reviews'))
//   {   
//    $custom_query .= " ORDER BY rating desc ";

//   }
//   elseif(!empty($filter=='Ranking'))
//   {
//   $custom_query .=" ORDER BY users.min_charge ASC ";

//   }
//   elseif(!empty($filter=='Near'))
//   {
//   $custom_query .=" ORDER BY distance ASC ";

//   }
//   elseif(!empty($filter=='Professional'))
//   {
//   $custom_query .=" ORDER BY users.min_charge ASC ";

//   }
//   elseif(!empty($filter=='Fresher'))
//   {
//   $custom_query .=" ORDER BY users.min_charge ASC ";

//   }
  
//   $query = $this->db->query($custom_query);
//   if($query->num_rows()>0)
//   {
//   return $query->result();
//   }
//   else
//   {
//   return false;
//   }
// }

/*changes cz before login*/
public function getall_services_vendor_list($keyword,$sort_price,$filter)
{

  // $issd=$this->session->userdata('Id');
  // $this->db->select('lat,lang');
  // $this->db->from('users');
  // $this->db->where('id',$issd);
  // $query1 =$this->db->get();
  // $lat=$query1->row()->lat;
  // $lang=$query1->row()->lang;
 
  $custom_query = "SELECT
  users.id as user_id ,
  users.fname as user_name,
  users.image as user_image,
  users.language,
  users.lat,
  users.lang,
  users.qualification,
  users.min_charge,
  users.about,
  subcategory.id,
  subcategory.name,
  subcategory.icon,

  (SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review
  WHERE rating_review.vendor_id =users.id) as rating
 
  FROM users
  LEFT JOIN subcategory ON FIND_IN_SET(CAST(subcategory.ID AS CHAR), users.skills) > 0
  WHERE 1 = 1 ";
  if (!empty($keyword))
  {
  $custom_query .=" AND users.language LIKE '%$keyword%' OR subcategory.name LIKE '%$keyword%' OR users.fname LIKE '%$keyword%' OR users.qualification LIKE '%$keyword%'";

  }
  elseif(!empty($sort_price=='price-desc-rank'))
  {
  $custom_query .=" ORDER BY users.min_charge DESC ";

  }

  elseif(!empty($sort_price=='price-asc-rank'))
  {
  $custom_query .=" ORDER BY users.min_charge ASC ";

  }
  elseif(!empty($filter=='Reviews'))
  {   
   $custom_query .= " ORDER BY rating desc ";

  }
  elseif(!empty($filter=='Ranking'))
  {
  $custom_query .=" ORDER BY users.min_charge ASC ";

  }
  elseif(!empty($filter=='Near'))
  {
  $custom_query .=" ORDER BY distance ASC ";

  }
  elseif(!empty($filter=='Professional'))
  {
  $custom_query .=" ORDER BY users.min_charge ASC ";

  }
  elseif(!empty($filter=='Fresher'))
  {
  $custom_query .=" ORDER BY users.min_charge ASC ";

  }
  // $custom_query .= " order by users.id desc,users.min_charge";
  // print_r($custom_query);exit();
  $query = $this->db->query($custom_query);
  if($query->num_rows()>0)
  {
  return $query->result();
  }
  else
  {
  return false;
  }
}

public function getall_services_vendor_listbooking($keyword,$sort_price,$filter)
{


  $issd=$this->session->userdata('Id');
 $this->db->select('lat,lang');
  $this->db->from('users');
  $this->db->where('id',$issd);
  $query1 =$this->db->get();
 $lat=$query1->row()->lat;
 $lang=$query1->row()->lang;
// $user_id=0;
$custom_query = "SELECT
users.id as user_id,
users.fname as user_name,
users.image as user_image,
users.language,
users.lat,
users.lang,
users.qualification,
users.min_charge,
users.about,
subcategory.id,
subcategory.cat_id,
subcategory.name,
subcategory.icon,

(SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review
WHERE rating_review.vendor_id =users.id) as rating,
ROUND((((acos(sin(('$lat'*pi()/180)) *sin((users.lat *pi()/180))+cos(('$lat'*pi()/180)) 
       * cos((users.lat *pi()/180)) * cos((('$lang'- users.lang)*pi()/180))))*180/pi())*60*1.1515),1)
AS distance
FROM users
INNER JOIN subcategory ON users.skills=subcategory.id WHERE users.id= $filter";


// $custom_query .= " order by users.id desc,users.min_charge";
// print_r($custom_query);exit();
$query = $this->db->query($custom_query);


if($query->num_rows()>0)
{
return $query->result();
}
else
{
return false;
}
}

public function count_total_rating($where,$filter) 
{
    $this->db->select('ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating');
    $this->db->from('rating_review');
        $this->db->where('vendor_id',$where);
        /*if($filter == "Reviews"){
          $this->db->order_by('rating','desc');
        }*/


  $query = $this->db->get();
if ($query->num_rows() == 0){
return 0;
}
else {
$result = $query->row();
return $result->rating;
}
}



    /*public function filterNearByMe($user_id,$filter)
    {
$id=$this->session->userdata('Id');
 $this->db->select('lat,lang');
  $this->db->from('users');
  $this->db->where('id',$id);
  $query1 =$this->db->get();
 $lat=$query1->row()->lat;
 $lang=$query1->row()->lang;
      // $this->db->select("Round(( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($lang) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ),3) AS distance"); 
      $this->db->select("Round((((acos(sin((".$lat."*pi()/180)) * sin((`lat`*pi()/180)) + cos((".$lat."*pi()/180)) * cos((`lat`*pi()/180)) * cos(((".$lang."- `lang`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344),1) as distance"); 

    $this->db->from('users');

    $this->db->where('id',$user_id);
    $this->db->order_by('distance','asc');
    
    $query = $this->db->get();
if ($query->num_rows() == 0){
return 0;
}
else {
$result = $query->row();
return $result->distance;
}
    }
*/
 
// public function get_nearmeservices($id)
// {
//   $this->db->select('lat,lang');
//   $this->db->from('users');
//   $this->db->where('id',$id);
//   $query1 =$this->db->get();
//   $lat=$query1->row()->lat;
//   $lang=$query1->row()->lang;

//   $query= "SELECT subcategory.id,subcategory.name,subcategory.icon, (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance 
//   from users INNER JOIN subcategory ON subcategory.id=users.skills WHERE users.skills!='0'  having distance <= 25 order by distance ASC LIMIT 4";
//   $result=$this->db->query($query);
//   return $result->result();
// } 


/*after changed*/
public function get_nearmeservices()
{
  $this->db->select('lat,lang');
  $this->db->from('users');
  // $this->db->where('id',$id);
  $query1 =$this->db->get();
  $lat=$query1->row()->lat;
  $lang=$query1->row()->lang;

  $query= "SELECT subcategory.id,subcategory.name,subcategory.icon, (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance 
  from users INNER JOIN subcategory ON subcategory.id=users.skills WHERE users.skills!='0'  having distance <= 25 order by distance ASC LIMIT 4";
  $result=$this->db->query($query);
  return $result->result();
} 


    

public function single_booking()
{

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
          $data['upload_doc']=$fileName;
      }

              $user_id = $this->session->userdata('Id');
            
              $data['user_id'] = $user_id;
              $data['service_id'] = $this->input->post('service_id');
              $data['vendor_id'] = $this->input->post('vendor_id');
            $to_time = $this->input->post('abc');
            $test_time=explode(" ",$to_time);
              
             $data['from_time'] = date("H:i", strtotime($test_time[0].''.$test_time[1]));

             $data['to_time'] = date("H:i", strtotime($test_time[3].''.$test_time[4]));
             
             
            $data['booking_date'] = $this->input->post('date');
            $data['start_location1'] = $this->input->post('address');
            $data['work_description'] = $this->input->post('description');
            $data['type'] = $this->input->post('type');
            $data['booking_type'] = $this->input->post('flexRadioDefault');
        
         
      
        
           $this->db->insert('booking_request', $data);


                $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>booking successfully...</strong>  
    </div>');
}


public function blue_booking()
{

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
          $data['upload_doc']=$fileName;
      }

              $user_id = $this->session->userdata('Id');
            
              $data['user_id'] = $user_id;
              $data['service_id'] = $this->input->post('service_id');
              $data['vendor_id'] = $this->input->post('vendor_id');
             /* $data['from_time'] = $this->input->post('from_time');
            $data['to_time'] = $this->input->post('to_time');*/

              $to_time = $this->input->post('abc');
            $test_time=explode(" ",$to_time);
              
             $data['from_time'] = date("H:i", strtotime($test_time[0].''.$test_time[1]));

             $data['to_time'] = date("H:i", strtotime($test_time[3].''.$test_time[4]));
              $nubervalue = $this->input->post('nubervalue');
              $job_estimate = $this->input->post('abcd');
             $data['job_estimate'] = $nubervalue.''.$job_estimate;
            $data['booking_date'] = $this->input->post('date');
            $data['work_description'] = $this->input->post('description');
            
            $data['type'] = $this->input->post('type');
        
            $data['booking_type'] = $this->input->post('flexRadioDefault');

      
        
           $this->db->insert('booking_request', $data);


                $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>booking successfully...</strong>  
    </div>');
}




public function multi_booking()
{

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
          $data['upload_doc']=$fileName;
      }

              $user_id = $this->session->userdata('Id');
            
              $data['user_id'] = $user_id;
              $data['service_id'] = $this->input->post('service_id');
              $data['vendor_id'] = $this->input->post('vendor_id');
              $data['from_time'] = $this->input->post('from_time');
            // $data['to_time'] = $this->input->post('to_time');
            $data['booking_date'] = $this->input->post('date');
         $data['start_location1'] = $this->input->post('start_location1');
         $data['end_location1'] = $this->input->post('end_location');
         $data['weight'] = $this->input->post('weight');

            $data['work_description'] = $this->input->post('description');
            $data['type'] = $this->input->post('type');
          $data['booking_type'] = $this->input->post('flexRadioDefault');


      
        
           $this->db->insert('booking_request', $data);


                $this->session->set_flashdata("success_req",'<div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>booking successfully...</strong>  
    </div>');
}


public function Privacy()
{
  $this->db->select('*');
  $this->db->from('privacy');
  $query =$this->db->get();
  $result= $query->row();
  return $result;

}
 

 public function faq()
    {

      $this->db->select("*");
    $this->db->from('faq');
    $query= $this->db->get(); 

      $result = $query->result();
      return $result;
    }


 public function booking_request()
    {

      $this->db->select("*");
    $this->db->from('booking_request');
    $query= $this->db->get(); 

      $result = $query->result();
      return $result;
    }

  function UpdateAllData($table,$id,$data){
    $this->db->where($id);
    return $this->db->update($table,$data);
  }

    public function selectAllByIds($table,$wheredata,$order_by=""){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($wheredata);
    $this->db->order_by($order_by);
    $query = $this->db->get();
    return $query->result_array();
  }


   public function updatePass($wheredata,$table,$data){

    $query = $this->db->where($wheredata);

    $query = $this->db->update($table,$data);

    return $query;
  } 

  function gettabledata($data){

    $this->db->select('*');
    $this->db->where($data['where']);
    $data = $this->db->get($data['table']);
    return $data->result();
  }



public function get_user_booking_list()
{
  $this->db->select("*");
  $this->db->from("booking_request");
  $query =$this->db->get();
  $result = $query->result_array();
  return $result;

}

 public function countimage()
    {
        $this->db->select('*');
        $q=$this->db->get('booking_request');

        if($q)
        {
            return $q->num_rows();
        }
        else
        {
            return false;
        }
    }


    // vendor home



 public function get_leaderlimit()
 {
  $this->db->select("*");
  $this->db->from("users");
  $this->db->where("service_provider",1);
  $this->db->order_by("id", "desc");
$this->db->limit(3);
$query = $this->db->get();

return $query->result();
 }



 public function get_leaderdata()
 {
  $this->db->select("*");
  $this->db->from("users");
  $this->db->order_by("id", "desc");
$query = $this->db->get();

return $query->result();
 }


// 12022021
public function getvendorUpcoming()
{

 
$vendor_id=$this->session->userdata('Id');

  $res=$this->db->query("SELECT booking_request.*,v.min_charge,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 

      INNER JOIN users ON users.id=booking_request.user_id

      INNER JOIN users as v ON v.id=booking_request.vendor_id

      WHERE booking_request.vendor_id=$vendor_id AND booking_request.job_status='Upcoming' ")->result();
return $res;
}





public function get_inprogressbooking_vendor()
{
   $vendor_id = $this->session->userdata('Id');
      $res=$this->db->query("SELECT booking_request.*,v.min_charge,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 

      INNER JOIN users ON users.id=booking_request.user_id

      INNER JOIN users as v ON v.id=booking_request.vendor_id

      WHERE booking_request.vendor_id=$vendor_id  AND booking_request.job_status='Inprogress' ")->result();


      return $res;
}


public function getvendorcompleted()
{

 
$vendor_id=$this->session->userdata('Id');

  $res=$this->db->query("SELECT booking_request.*,v.min_charge,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 

      INNER JOIN users ON users.id=booking_request.user_id

      INNER JOIN users as v ON v.id=booking_request.vendor_id

      WHERE booking_request.vendor_id=$vendor_id AND booking_request.job_status='Complete' OR booking_request.job_status='Cancel' ")->result();
return $res;
}


// get user panding data 
public function get_userpanding()
{

  $user_id=$this->session->userdata('Id');
   $res=$this->db->query("SELECT booking_request.*,v.min_charge,v.fname as v_name,v.phone as v_contact,users.address,users.image as v_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 
      INNER JOIN users ON users.id=booking_request.user_id
      INNER JOIN users as v ON v.id=booking_request.vendor_id
      WHERE booking_request.user_id=$user_id AND booking_request.job_status='Upcoming' ")->result();
   return $res;
}

public function get_userinprogress()
{

  
  $user_id=$this->session->userdata('Id');
   $res=$this->db->query("SELECT booking_request.*,v.min_charge,v.fname as user_name,v.phone as user_contact,v.address,v.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 
      INNER JOIN users ON users.id=booking_request.user_id
      INNER JOIN users as v ON v.id=booking_request.vendor_id
      WHERE booking_request.user_id=$user_id AND (booking_request.job_status='Inprogress' OR booking_request.job_status='Resume' OR booking_request.job_status='Paused') ")->result();
      

      return $res;
}

public function get_usercomplete()
{

  $user_id=$this->session->userdata('Id');

  $res=$this->db->query("SELECT booking_request.*,v.min_charge,v.fname as user_name,v.phone as user_contact,v.address,v.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 

      INNER JOIN users ON users.id=booking_request.user_id

      INNER JOIN users as v ON v.id=booking_request.vendor_id

      WHERE booking_request.user_id=$user_id AND booking_request.job_status='Complete' OR booking_request.job_status='Cancel' ")->result();
return $res;
}


public function getvendor_time()
{


     $this->db->select("*");
    $this->db->from('vendor_tariff_time');
    $this->db->where("user_id",29);
    $query= $this->db->get(); 

      $result = $query->row_array();
      return $result; 


}


public function getoffers()
{
     $this->db->select("*");
    $this->db->from('offers');
    $query= $this->db->get(); 
      $result = $query->result_array();
      return $result; 


}

/*////////////////23/2/MODEL START FOR WEB////////////////////////*/
/*////////////////23/2/MODEL START FOR WEB////////////////////////*/
/*////////////////23/2/MODEL START FOR WEB////////////////////////*/

  public function categoryServices($id)
  {
    $this->db->select("t1.id,t1.name,t1.icon,t2.id as s_id,t2.name as s_name,t2.icon  as s_icon,t1.icon as cat_icon");
    $this->db->from("subcategory as t2");
    $this->db->join("category  as t1", "t1.id=t2.cat_id","LEFT");
    $this->db->where("t2.cat_id", $id);
    $this->db->order_by("t2.id", "desc");
    $query = $this->db->get();
    return $query->result();
  }

  /*$this->db->select('s.id,s.name,u.fname as v_name,u.email as v_email,u.phone as v_contact,u.skills,u.image as v_image,u.address as v_address,(SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review 
  LEFT JOIN users ON users.id=rating_review.vendor_id 
  WHERE rating_review.vendor_id =users.id) as rating')*/

  public function vendorByServices($id)
  {
    $this->db->select('s.id,s.name,u.id as v_id,u.fname as v_name,u.email as v_email,u.phone as v_contact,u.skills,u.image as v_image,u.address as v_address,AVG(r.rating) as rating');
    $this->db->from("users as u");
    $this->db->join("subcategory as s","s.id=u.skills",'left');
    $this->db->join("rating_review as r","u.id=r.vendor_id",'left');
    $this->db->like("u.skills",$id);
    $query = $this->db->get();
    
    return $query->result();
  }


  /*,AVG(r.rating) as rating*/
  // public function vendorRate($v_id)
  // {
  //   $this->db->select('u.id as v_id,u.fname as v_name,u.email as v_email,u.phone as v_contact,u.skills,u.image as v_image,u.address as v_address,AVG(r.rating) as rating');
  //   $this->db->from("users as u");
  //   $this->db->join("rating_review as r","u.v_id=r.vendor_id",'left');
  //   $this->db->where("u.v_id",$v_id);
  //   $query = $this->db->get();
  //   return $query->result();
  // }
}