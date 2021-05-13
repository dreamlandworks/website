<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Api_Model extends CI_Model {

  public function get_List($table){
    $this->db->order_by('id','desc');
    $query=$this->db->get($table)->result();
    return $query;
  }


  public function get_shop_List(){

    if(!$this->input->post('service_id')==""){
      $this->db->where('service_id',$this->input->post('service_id'));
    }
    return $this->db->get('shop_details')->result();
  }



  public function get_product_List(){
    if(!$this->input->post('service_id')==""){
      $this->db->where('service_id',$this->input->post('service_id'));
    }
    if(!$this->input->post('vendor_id')==""){
      $this->db->where('vendor_id',$this->input->post('vendor_id'));
    }
    if(!$this->input->post('shop_id')==""){
      $this->db->where('shop_id',$this->input->post('shop_id'));
    }
    return $this->db->get('products')->result();
  }

  public function Get_Detail_list($table, $id){
    $this->db->where('id',$id);
    return $this->db->get($table)->result();
  }



   



   



  public function Add_to_cart(){
    $productdetail=$this->db->query('select * from products where id = '.$this->input->post('product_id').'')->row();
    if(!$productdetail){
      return false;
    }
    $data = array(
      'product_id' =>$this->input->post('product_id'),
      'name' =>$productdetail->product_name,
      'price' =>$productdetail->max_price,
      'quantity' =>'1',
      'image' =>$productdetail->image2,
      'vendor_id' =>$productdetail->vendor_id,
      'total_amount' =>$productdetail->max_price,
      'final_amount' =>$productdetail->max_price,
      'user_id' =>$this->input->post('user_id')
    );
    $query=$this->db->insert('cart',$data);
    return $query;
  }



    
  public function update_address(){



      $data=array(



        'state'=>$this->input->post('state'),



        'city'=>$this->input->post('city'),



        'user_id'=>$this->input->post('user_id'),



        'pin_code'=>$this->input->post('pin_code'),



        'house_no'=>$this->input->post('house_no'),



        'area'=>$this->input->post('area'),



        'landmark'=>$this->input->post('landmark'),



        'type'=>$this->input->post('type'),



        'mobile'=>$this->input->post('mobile')



      );



      $id= $this->input->post('address_id');



      $this->db->where('id',$id);



      $result=$this->db->update('address',$data);



      return true;



    }



   



   public function get_address(){



      $id= $this->input->post('address_id');



      $this->db->where('id',$id);



      $query=$this->db->get('address')->row();



      return $query;



   }



   public function get_address_list(){



       $this->db->where('user_id',$this->input->post('user_id'));



       $query=$this->db->get('address')->result();



       return $query;



   }



   public function Place_order(){



    $total=0;



     $cart= $this->db->query('select * from cart where user_id = '.$this->input->post('user_id').'')->result();



       foreach($cart as $value):



           



          $cart_detail=$this->db->query('select * from cart where id='.$value->id.'')->row();



          $total+=$cart_detail->total_amount;



          $data =array(



            'orderid'=>"ES00".$cart_detail->id,



            'address_id'=>$this->input->post('address_id'),



            'payment_method'=>$this->input->post('payment_method'),



            'product_id'=>$cart_detail->product_id,



            'name'=>$cart_detail->name,



            'image'=>$cart_detail->image,



            'user_id'=>$cart_detail->user_id,



            'vendor_id'=>$cart_detail->vendor_id,



            'addon'=>$cart_detail->addon,



            'addon_price'=>$cart_detail->addon_price,



            'instruction'=>$cart_detail->instruction,



            'price'=>$cart_detail->price,



            'quanitity'=>$cart_detail->quantity,



            'sub_total'=>$cart_detail->total_amount,



            'total'=>$total



          );



               



       endforeach;     



       $query=$this->db->insert('orders',$data);



        $this->db->query('DELETE FROM `cart` WHERE `user_id` = '.$this->input->post('user_id').'');  



       



       return $query;



   }



    



    public function productlowtohigh(){



        if($this->input->post('cate_id')){



             $this->db->where('sub_cat_id',$this->input->post('cate_id')); 



             $this->db->order_by('min_price','ASC');



        $result = $this->db->get('products')->result();



        return $result;



        }else{



            



             $this->db->order_by('min_price','ASC');



        $result = $this->db->get('products')->result();



         return $result;



        }



    }



    



   public function hightolow(){



        if($this->input->post('cate_id')){



             $this->db->where('sub_cat_id',$this->input->post('cate_id')); 



             $this->db->order_by('min_price','DESC');



        $result = $this->db->get('products')->result();



        return $result;



        }else{



            



             $this->db->order_by('min_price','DESC');



        $result = $this->db->get('products')->result();



         return $result;



        }



   }    



   



   



   



    public function Get_cart_list()



    {



        $this->db->select('products.*,cart.*');



        $this->db->join('products','products.id=cart.product_id');



      $this->db->where('user_id',$this->input->post('user_id'));



      return $this->db->get('cart')->result();



    }



    



    public function newestproduct(){



        if($this->input->post('cate_id')){



             $this->db->where('sub_cat_id',$this->input->post('cate_id')); 



             $this->db->order_by('id','DESC');



        $result = $this->db->get('products')->result();



        return $result;



        }else{



            



             $this->db->order_by('id','DESC');



        $result = $this->db->get('products')->result();



         return $result;



        }



    }



    



    public function get_feverite_list(){



        $this->db->select('products.*,product_fav');



        $this->db->join('products','products.id=product_fav.product_id');



        $this->db->where('product_fav.user_id',$this->input->post('user_id'));



        $query=$this->db->get('product_fav')->result();



        return $query;



    }







    //shivam 



    public function get_jobs(){



    date_default_timezone_set('Asia/Kolkata'); 



      $date= date("Y-m-d"); // time in India



    $this->db->select('t1.id,t2.fname as name,t2.email,t2.phone as mobile,t1.title,t1.desecration,t1.amount,t1.start_date,t1.end_date,t1.status');



    $this->db->from('jobs as t1');



    $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');



    // $this->db->where('end_date>=',$date);



    $this->db->where('start_date<=',$date);



    $this->db->where('end_date>=',$date);



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;     



  }



  



  public function update_jobs($id){



  



    $this->db->select('*');



    $this->db->from('jobs');







   $this->db->where('id',$id);



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;     



  }







 //  public function get_subcategory(){



 //     $this->db->select('subcategory.*,category.name as cat_name');



 //     $this->db->join('category','category.id=subcategory.cat_id');



 //    return $this->db->get('subcategory')->result();



 // } 











public function get_rating($service_id){

  $this->db->select('t1.*,t2.fname as name,t3.service_name');

  $this->db->from('rating_review as t1');

  $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');

  $this->db->join('services as t3','t3.id=t1.service_id', 'LEFT');

  $this->db->where('t3.id',$service_id);

  $query= $this->db->get(); 

  $result =$query->result();

  return $result;

  }



  

  public function get_ratingcount($service_id){

    $this->db->select('*');

    $this->db->from('rating_review');

    $this->db->where('service_id',$service_id);

    $query= $this->db->get(); 

    $result =$query->num_rows();

    return $result;

  }



  public function updates($table,$data,$wheredata){

    $this->db->where($wheredata);

    $updateData=$this->db->update($table,$data);

    if($updateData){

    return $updateData;

    }else{

      return false;

    }

  }





  public function updated($wheredata,$table,$data){

    $query = $this->db->where($wheredata);

    $query = $this->db->update($table,$data); 

    return $query;

  }













  function updateData($table,$data,$id)



  { 



    $this->db->where('id', $id);



    $this->db->update($table, $data);



    return true;



  }















  public function check_credential($mobile_or_username)



  {



    $query = $this->db->query("SELECT * FROM users WHERE (`phone` = '$mobile_or_username' OR `user_name` = '$mobile_or_username') ") ;



    if(count($query->result()))



    {



      return $query->row();



    }else{



      return array();



    }



  }



















  public function get_Applyjobs($user_id){



    $this->db->select('t1.*,t2.fname as name,t3.title');



    $this->db->from('apply_job as t1');



    $this->db->join('users as t2','t2.id=t1.user_id', 'LEFT');



    $this->db->join('jobs as t3','t3.id=t1.job_id', 'LEFT');



    $this->db->where('t1.user_id',$user_id);



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;



         



  }







  // function Alldatas($keyword){



  //   $this->db->select('*')->from('users')->where("language LIKE '%$keyword%' OR skills LIKE '%$keyword%' OR qualification LIKE '%$keyword%'");



  //   $query= $this->db->get(); 



  //   $result =$query->result();



  //   return $result;



  // }







  function GetServices(){



    $this->db->select('id,skills')->from('users')->where('skills!=" "  ');



    $query= $this->db->get(); 



    $result =$query->result();



    return $result;



  }











function terriff($user_id){



$sql=$this->db->query("select * from vendor_tariff_time where user_id=$user_id")->row();



return $sql;



}



 /*get_category as services*/



 // function get_services($user_id,$lat,$lang){



 //  $query= "SELECT category.id,category.name,category.icon, (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance from users INNER JOIN category ON category.id=users.skills WHERE users.skills!='0'  having distance <= 25 order by distance ASC";



 //  $result=$this->db->query($query);



 //  return $result->result();



  



 // }


/*get_category as services*/
 function get_services($user_id,$lat,$lang){
  $query= "SELECT subcategory.id,subcategory.cat_id,subcategory.name,category.name as cat_name,subcategory.icon, (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance 
  from users 
  INNER JOIN subcategory ON subcategory.id=users.skills
  LEFT JOIN category ON category.id=subcategory.cat_id 
  WHERE users.skills!='0'  having distance <= 25 order by distance ASC";
  $result=$this->db->query($query);
  return $result->result();
}



 /*get_category as services*/
 function get_Hservices($user_id,$lat,$lang){
  $query= "SELECT subcategory.id,subcategory.name,subcategory.icon,users.skills,users.id, (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance from users INNER JOIN subcategory ON subcategory.id=users.skills WHERE users.skills!='0'  having distance <= 25 order by distance ASC";
    $result=$this->db->query($query);
    return $result->result();
  }







 /*get_category as category*/



 function get_category(){



 



  $query="SELECT `category`.`id`,`category`.`name`, `category`.`icon` FROM category order by id ASC";



$result=$this->db->query($query);



  return $result->result();  



 }















 function searchServiceData($keyword,$lat,$lang){







  $query="SELECT users.id as user_id,users.fname as user_name,users.image as user_image, category.id,category.name,category.icon, (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance FROM category



    LEFT JOIN users ON category.id=users.skills 



    WHERE users.language LIKE '%$keyword%' OR category.name  having distance <= 25 order by distance ASC";



   



    $query= $this->db->query($query);



   



    $result =$query->result();



    return $result;



  }











 //  function searchServiceData($keyword){



 //    $this->db->select("t1.id,t1.id as user_id,t1.name,t2.fname as user_name,t2.image as user_image");



 //    $this->db->from("category as t1");



 //    $this->db->join("users as t2","t2.skills=t1.id","LEFT");



 //    $this->db->like("t1.name",$keyword);



 //    $query= $this->db->get();



 //    $result =$query->result();



 //    return $result;



 // }







 











 function Alldatas($user_id,$keyword,$lat,$lang){
  $query="SELECT users.id,users.fname,users.language,users.about,users.address,users.min_charge as min_amount,users.extra_charge as max_amount,users.pr_hours,users.pr_days,subcategory.id as cat_id,subcategory.name as service_name,(SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review 
    LEFT JOIN users ON users.id=rating_review.vendor_id 
    WHERE rating_review.vendor_id =users.id) as rating,(3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance FROM users
    LEFT JOIN subcategory ON FIND_IN_SET(CAST(subcategory.id AS CHAR), users.skills) > 0
    WHERE users.id!='$user_id' AND (users.language LIKE '%$keyword%' OR subcategory.name LIKE '%$keyword%' OR users.qualification LIKE '%$keyword%')  having distance <= 25 
    ORDER BY distance ASC;
    ";
    $query= $this->db->query($query);
    $result =$query->result();
    return $result;
  }

 // WHERE users.id!='$user_id' AND (users.language LIKE '%$keyword%' OR subcategory.name LIKE '%$keyword%' OR users.qualification LIKE '%$keyword%')  having distance <= 25 
 //    ORDER BY distance ASC;




  function sub_services($cat_id){



    $query="select subcategory.name,category.name as cat_name from subcategory left join category on category.id=subcategory.cat_id where cat_id='$cat_id'";



    $query= $this->db->query($query);



    $result =$query->row();



    return $result;



  }















  function filterNearByServices($user_id,$lat,$lang,$from_amount,$to_amount,$distance,$keyword){



    $query="SELECT users.id,users.skills,users.fname,users.language,users.min_charge as min_amount,category.id as cat_id,category.name as service_name,



   



    (SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review 



    LEFT JOIN users ON users.id=rating_review.vendor_id 



    WHERE rating_review.vendor_id =users.id) as rating,



    (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance



     FROM users



    INNER JOIN category ON category.id=users.skills 



    WHERE users.id!=$user_id AND (users.language LIKE '%$keyword%' OR category.name LIKE '%$keyword%' OR users.qualification LIKE '%$keyword%' OR users.min_charge between $from_amount AND $to_amount) having distance <= $distance 



    ORDER BY distance ASC;



    ";



    $query= $this->db->query($query);



    $result =$query->result();



    return $result;



  }











  function filterNearByServices11($lat,$lang,$from_amount,$to_amount,$distance){



    $query="SELECT users.id,users.fname,users.language,users.min_charge as min_amount,category.id as cat_id,category.name as service_name,(3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - lat) * pi()/180 / 2), 2) +COS($lat * pi()/180) * COS(lang * pi()/180) * POWER(SIN(( $lang - lang) * pi()/180 / 2), 2) ))) as distance FROM users



    LEFT JOIN category ON category.id=users.skills 



    WHERE users.min_charge between $from_amount and $to_amount having distance <= $distance 



    ORDER BY distance ASC;



    ";



    



    $query= $this->db->query($query);



    $result =$query->result();



    return $result;



  }











  public function sortingNearByServices($user_id,$highTolow,$lowTohigh,$lat,$lang,$keyword,$rating)



  { 







    $custom_query = "SELECT 



      users.id,



      users.fname,



      users.language,



      users.qualification,



      users.min_charge as min_amount,



      subcategory.cat_id,



      subcategory.name as service_name,







      (SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review 



      WHERE rating_review.vendor_id =users.id) as rating,



      (((acos(sin(('$lat'*pi()/180)) *sin((users.lat *pi()/180))+cos(('$lat'*pi()/180)) 



      * cos((users.lat *pi()/180)) * cos((('$lang'- users.lang)*pi()/180))))*180/pi())*60*1.1515) 



      AS distance



      FROM users 



      LEFT JOIN subcategory ON subcategory.id=users.skills



      WHERE 1 = 1 AND users.id!=$user_id";







    if (!empty($keyword)) 



    {



      $custom_query .=" (AND users.language LIKE '%$keyword%' OR category.name LIKE '%$keyword%' OR users.qualification LIKE '%$keyword%')";







    }                  



    elseif(!empty($rating=='rating')) 



    {



      $custom_query .= " ORDER BY rating desc ";



    



    } 



    elseif(!empty($highTolow=='highTolow'))



    {



      $custom_query .=" ORDER BY users.min_charge DESC ";



      



    }







    elseif(!empty($lowTohigh=='lowTohigh'))



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











    function vendor_profile($user_id){



      $query="SELECT users.id,users.fname as vendor_name,users.email,users.phone,users.address,users.image,users.dob,users.profession_id,professions.name as professions,subcategory.name as skills,users.about,users.language,users.qualification,users.min_charge,users.extra_charge,users.pr_hours,users.pr_days,(SELECT ROUND(AVG(((Professionalism_rating+Behaviour_rating+Satisfaction_rating+Skills_rating)/4)),1) as rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) as rating,



      (SELECT ROUND((SUM(Professionalism_rating)/(COUNT(Professionalism_rating))),1) as Professionalism_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Professionalism_rating,



      (SELECT ROUND((SUM(Behaviour_rating)/(COUNT(Behaviour_rating))),1) as Behaviour_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Behaviour_rating,



      (SELECT ROUND((SUM(Satisfaction_rating)/(COUNT(Satisfaction_rating))),1) as Satisfaction_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Satisfaction_rating,



      (SELECT ROUND((SUM(Skills_rating)/(COUNT(Skills_rating))),1) as Skills_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Skills_rating,



      (SELECT COUNT(id) as job_done FROM `booking_request` WHERE vendor_id=4 and job_status='Complete') AS job_done



      FROM users 



      LEFT JOIN professions ON professions.id=users.profession_id



      LEFT JOIN subcategory ON subcategory.id=users.skills



      WHERE users.id=$user_id";



      $result=$this->db->query($query);



      return $result->result();



    }











    /*count rating of vendor*/



    function rating_of_vendor($user_id){



      $query="SELECT users.id,



      (SELECT ROUND((SUM(Professionalism_rating)/(COUNT(Professionalism_rating))),1) as Professionalism_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Professionalism_rating,



      (SELECT ROUND((SUM(Behaviour_rating)/(COUNT(Behaviour_rating))),1) as Behaviour_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Behaviour_rating,



      (SELECT ROUND((SUM(Satisfaction_rating)/(COUNT(Satisfaction_rating))),1) as Satisfaction_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Satisfaction_rating,



      (SELECT ROUND((SUM(Skills_rating)/(COUNT(Skills_rating))),1) as Skills_rating FROM rating_review 



      WHERE rating_review.vendor_id =$user_id) AS Skills_rating,



      (SELECT COUNT(id) as job_done FROM `booking_request` WHERE vendor_id=4 and job_status='Complete') AS job_done



      FROM users 



      WHERE users.id=$user_id";



      $result=$this->db->query($query);



      return $result->row();



    }



    function getAllData($data){
    $this->db->select($data['field']);

    $this->db->where($data['where']);

    $data = $this->db->get($data['table']);

    return $data->result();

    }


    function get_billling($booking_id){
      $this->db->select('booking_request.amount,booking_request.extra_charge,users.min_charge as professional_change,users.phone');
      $this->db->from('booking_request');
      $this->db->join('users','booking_request.user_id=users.id','left');
      $this->db->where('booking_request.id',$booking_id);
      $res=$this->db->get()->row();
      return $res;
    }


    // function get_complete($id){
    //   $this->db->select('booking_request.*,users.fname,users.phone,users.email,users.image,v.phone as v_phone,users.fname as v_fname,users.email as v_email,users.image as v_image');
    //   $this->db->from('booking_request');
    //   $this->db->join('users','booking_request.user_id=users.id','left');
    //   $this->db->join('users as v','booking_request.vendor_id=users.id','left');
    //   $this->db->where('booking_request.user_id',$id);
    //   $this->db->or_where('booking_request.vendor_id',$id);
    //   $this->db->where('booking_request.job_status','Complete');
    //   $this->db->or_where('booking_request.job_status','Cancel');

    //   $res=$this->db->get()->result();
    //   // echo $this->db->last_query();exit();
    //   return $res;
    // }


//     function get_com_cancel_booking($id){
//       $qyery="SELECT `booking_request`.*, `users`.`fname` , `users`.`phone`, `users`.`email`, `users`.`image`, `v`.`phone` as `v_phone`, `users`.`fname` as `v_fname`, `users`.`email` as `v_email`, `users`.`image` as `v_image`
// FROM `booking_request`
// LEFT JOIN `users` ON `booking_request`.`user_id`=`users`.`id`
// LEFT JOIN `users` as `v` ON `booking_request`.`vendor_id`=`v`.`id`
// WHERE (`booking_request`.`user_id` = $id
// OR `booking_request`.`vendor_id` = $id)
// AND (`booking_request`.`job_status` = 'Complete'
// OR `booking_request`.`job_status` = 'Cancel')";
//       $res=$this->db->query($qyery);
//       return $res->result();

//     }


    function get_com_cancel_booking($id){
      $qyery="SELECT booking_request.*,v.min_charge,v.fname as v_name,v.phone as v_contact,v.address as v_address,v.image as v_image,users.fname as user_name,users.phone as user_contact,users.address,users.image as user_image,(SELECT ROUND(AVG(rating),2) as user_rating FROM user_rating_review LEFT JOIN users ON users.id=user_rating_review.user_id) as user_rating FROM booking_request 
      INNER JOIN users ON users.id=booking_request.user_id
      INNER JOIN users as v ON v.id=booking_request.vendor_id
      WHERE (booking_request.vendor_id=$id OR booking_request.user_id=$id) AND (booking_request.job_status='Complete' OR booking_request.job_status='Cancel')";
      $res=$this->db->query($qyery);
      return $res->result(); 
    }


    function getNotification($vid){
      $this->db->select('notification.bookingId,notification.sender_id,notification.receiver_id,notification.receiver_type,notification.message,notification.created_date,users.fname,users.image,booking_request.type');
      $this->db->from('notification');
      $this->db->where('notification.receiver_type','vendor');
      $this->db->join('users','users.id=notification.sender_id','left');
      $this->db->join('booking_request','booking_request.id=notification.bookingId','left');
      $this->db->where('notification.receiver_id',$vid);
      $res=$this->db->get()->result();
      return $res; 

    }

    function get_user_notification($uid){
      $this->db->select('notification.bookingId,notification.sender_id,notification.receiver_id,notification.receiver_type,notification.message,notification.created_date,users.fname,users.image,booking_request.type');
      $this->db->from('notification');
      $this->db->join('users','users.id=notification.sender_id','left');
      $this->db->join('booking_request','booking_request.id=notification.bookingId','left');
      $this->db->where('notification.receiver_type','user');
      $this->db->where('notification.receiver_id',$uid);
     $res=$this->db->get()->result();
      return $res; 
    }



    function getAllOffers(){
      $date=date('Y-m-d');
      $this->db->select('*');
      $this->db->from('offers');
      $this->db->where('end_date >=',$date);
      $this->db->order_by('id desc');
      $res=$this->db->get()->result();
      return $res; 
    }


    /*get Offers */
    function getOffers(){
      $date=date('Y-m-d');
      $this->db->select('*');
      $this->db->from('offers');
      $this->db->where('start_date >=',$date);
      $res=$this->db->get()->result();
      // echo $this->db->last_query();exit();
      return $res; 
    }


    function getExipryOffers(){
      $date=date('Y-m-d');
      $this->db->select('*');
      $this->db->from('offers');
      $this->db->where("DATE(`end_date`) - INTERVAL 1 DAY < NOW() ");
      $res=$this->db->get()->result();
      return $res; 
    }


    public function GetPostedJob($user_id){
      $this->db->select('job_requires.*,(select round((bid_min_range+bid_max_range)/2 )) as avg_range');
      $this->db->from('job_requires');
      $this->db->join('users','users.id=job_requires.user_id');
      $this->db->where('job_requires.user_id',$user_id);
      $this->db->order_by('job_requires.id','desc');
      $res=$this->db->get()->result();
      return $res;
    }
    
    public function get_bid_on_job($job_id){
        $this->db->select('count(bid_on_job.vendor_id) as total_bid');
        $this->db->from('bid_on_job');
        $this->db->join('job_requires','bid_on_job.job_id=job_requires.id');
        $this->db->where('bid_on_job.job_id',$job_id);
        $res=$this->db->get()->row()->total_bid;
        // echo $this->db->last_query();exit();
        return $res;
    }


    /*vendor get jobs (notification.sender_id,notification.receiver_id,notification.type,notification.message)*/
    function get_vendor_job($vendor_id){
      $this->db->select('notification.bookingId,job_requires.*,users.fname,users.image,(select round((job_requires.bid_min_range+job_requires.bid_max_range)/2 )) as avg_range');
      $this->db->from('notification');
      $this->db->join('job_requires','notification.bookingId=job_requires.id');
      $this->db->join('users','users.id=job_requires.user_id');
      $this->db->where('notification.receiver_id',$vendor_id);
      $this->db->where('notification.type','job');
      $res=$this->db->get()->result();
      return $res;
    }


    function getBids($job_id){
      $this->db->select('bid_on_job.*,users.fname as v_name,users.image as v_image');
      $this->db->from('bid_on_job');
      $this->db->join('job_requires','job_requires.id=bid_on_job.job_id');
      $this->db->join('users','users.id=job_requires.user_id');
      $this->db->where('bid_on_job.job_id',$job_id);
      $res=$this->db->get()->result();
      return $res;
    }


}