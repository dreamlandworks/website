<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommanModel extends CI_Model 
{
  /*
    @select single row from database 
    @param table name, column - fields name array that is select from table
    @where clouse as array 
  */
  public function getSingleRow($table,$column="",$where)
  {
    if($column!='')
    {
      $fields = implode(",",$column);
    }else{
      $fields = "*";
    }
    $this->db->select($fields); 
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    return $query->row();
  }
  /*
    @select multiple row from database 
    @param table name, column - fields name array that is select from table
    @where clouse as array
    @ 
  */
  public function getDataForDataTable($table,$column="",$where)
  {
    if($column!='')
    {
      $fields = implode(",",$column);
    }else{
      $fields = "*";
    }
    $this->db->select($fields); 
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    return $query->row();
  }
  
  /*
    @insert data into database 
    @data as associative array collection of 
    @fields name and values as key and value
    @primary_key is database primary key 
  */

    /*
    @select single row with join of single table or multiple row from database 
    @param table name, column - fields name array that is select from table
    @where clouse as array 
  */
  public function getSingleRowWithJoin($table,$column="",$joins="",$where)
  {
    if($column!='')
    {
      $fields = implode(",",$column);
    }else{
      $fields = "*";
    }
    $this->db->select($fields); 
    $this->db->from($table);
    if(!empty($joins))
    {
      foreach ($joins as $k => $v) 
      {
        $this->db->join($v['table'], $v['on']);
      }
    }
    $this->db->where($where);
    $query = $this->db->get();
    return $query->row();
  }


  /*
    @select multiple row from database retuen type array 
    @param table name, column - fields name array that is select from table
    @param joins  - array of join table and ON table
    @where clouse as array 
  */
  public function getMultipleRowsObjectWithJoin($table,$column="",$joins="",$where)
  {
    if($column!='')
    {
      $fields = implode(",",$column);
    }else{
      $fields = "*";
    }
    $this->db->select($fields); 
    $this->db->from($table);
    if(!empty($joins))
    {
      foreach ($joins as $k => $v) 
      {
        $this->db->join($v['table'], $v['on']);
      }
    }
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }


   /*
    @select multiple row with join on multiple tables, from database retuen type array 
    @param table name, column - fields name array that is select from table
    @param joins  - array of join table and ON table
    @where clouse as array 
  */
  public function getMultipleRowsArrayWithJoin($table,$column="",$joins="",$where)
  {
    if($column!='')
    {
      $fields = implode(",",$column);
    }else{
      $fields = "*";
    }
    $this->db->select($fields); 
    $this->db->from($table);
    if(!empty($joins))
    {
      foreach ($joins as $k => $v) 
      {
        $this->db->join($v['table'], $v['on']);
      }
    }
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getMultipleRowsArrayWithLeftJoin($table,$column="",$joins="",$where)
  {
    if($column!='')
    {
      $fields = implode(",",$column);
    }else{
      $fields = "*";
    }
    $this->db->select($fields); 
    $this->db->from($table);
    if(!empty($joins))
    {
      foreach ($joins as $k => $v) 
      {
        $this->db->join($v['table'], $v['on'],'left');
      }
    }
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function insert($table,$post_data)
  {   
    $this->db->insert($table, $post_data);
      $insert_id = $this->db->insert_id();
    return  $insert_id;      
  }

  public function check_credential($email)
  {

    $query = $this->db->get_where("users", array("email" => $email));
    if(count($query->result()))
    {
      return $query->row();
    }else{
      return array();
    }
  }


  // function insertData($table,$data,$primary_key)
  // { 
  //   $result = $this->db->insert($table, $data);
  //   $insert_id = $this->db->insert_id();
  //   $primary_key_field = array($primary_key => $primary_key);
  //   $fieldsName = array_merge($primary_key_field,$data);
  //   $column = array_keys($fieldsName);
  //   return $this->getSingleRow($table,$column,array($primary_key=>$insert_id));
   
  // } 

  /*
    @get last id form 
  */

  public function get_last_creted_id($key,$table) 
  {
    $this->db->select("$key");
    $query = $this->db->get("$table");
    if($query->last_row())
    {
      return  $query->last_row()->$key;
    }else{
      return false;
    }
  } 

  /*
    @check record exist in database
  */
  public function is_record_exist($tbl,$where)
  {
    $query = $this->db->get_where($tbl,$where);
    if(count($query->result()))
    {
      return true;

    }else{
      return false;
    }
  }


  public function record_exist($tbl,$key,$value)
  {
    $query = $this->db->get_where($tbl, array($key => $value));
    if(count($query->result()))

    {
      return true;
    }else{
      return false;
    }
  }


  public function check_credentials($table,$field,$value)
  {
    $query = $this->db->query("SELECT * FROM $table WHERE $field = '$value'");
    if(count($query->result()))
    {
      return $query->row();
    }else{
      return array();
    }
  }

  
  public function selectAllData($table,$orderby="")
  {      
   $this->db->select('*');
   $this->db->order_by($orderby);
   $this->db->from($table);
   $query = $this->db-> get();
   return $query->result_array();
  }  


  public function selectRecent()
  {      
   $query ="SELECT 
   users.id,
   users.name,
   users.image
    FROM users 
    WHERE users.status='Active' ORDER BY id DESC  LIMIT 10";
   $result = $this->db->query($query);       
    return $result->result(); 
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

  public function selectAllByIds($table,$wheredata,$order_by=""){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($wheredata);
    $this->db->order_by($order_by);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function selectById($table,$wheredata,$order_by=""){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($wheredata);
    $this->db->order_by($order_by);
    $query = $this->db->get();
    return $query->row();
  }

  
  public function count($tbl,$id)
  {
    $this->db->select($id);
    $this->db->from($tbl);
    $query = $this->db->get();
    return $query->num_rows();
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

  function deleteRecord($table,$id)
  { 
    if($this->db->delete($table, array('id' => $id)))  
    {
      return true;
    }else{
      return false;
    }
  } 

 
  public function deletewhere($tableName,$wh) {
    $this->db->where($wh);
    $deleteData = $this->db->delete($tableName);
   if($deleteData){
      return true;
    }else{
      return false;
    }
  }


  function updateData($table,$data,$id)
  { 
    $this->db->where('id', $id);
    $this->db->update($table, $data);
    return true;
  }


  public function update($table,$data,$wheredata){
    $this->db->where($wheredata);
    $updateData=$this->db->update($table,$data);
    if($updateData){
      return $updateData;
    }else{
      return false;
    }
  }
  

  // function updateData($table,$data,$id)
  // { 
  //   $this->db->where('id', $id);
  //   $this->db->update($table, $data);
  //   // echo $this->db->last_query();exit();
  //   return true;
  // }


  function update_login_date_time($table,$data,$email)
  { 
    $this->db->where('email', $email);
    $this->db->update($table, $data);
    return true;
  }

  public function select_single_row($table,$key,$value) 
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($key,$value);
    $query = $this->db->get();
    return $query->row();
  }

  //job post list details
  public function job_post_list(){
    $query = 
    "SELECT 
     job_post.id as job_post_id,
     job_post.user_id,
     job_post.name,
     job_post.email, 
     job_post.age, 
     job_post.gender, 
     job_post.education, 
     job_post.job_profile, 
     job_post.city_name, 
     job_post.description, 
     DATE_FORMAT(job_post.date_time,'%d/%m/%Y') as date,
     job_post.status
     FROM job_post ORDER BY id desc;
    ";
    $result = $this->db->query($query);       
    return $result->result(); 
  }


  //all vacancies list
  public function vacancies_list(){
    $query = 
    "SELECT 
     post_vacancies.id as job_post_id,
     post_vacancies.user_id,
     post_vacancies.company_name,
     post_vacancies.email,
     post_vacancies.designation, 
    
     post_vacancies.min_salary, 
     post_vacancies.max_salary, 
     post_vacancies.place, 
     post_vacancies.required_qualification, 
     post_vacancies.description, 
     post_vacancies.age, 
     DATE_FORMAT(post_vacancies.created_date,'%d/%m/%Y') as date
    
     FROM post_vacancies
     ORDER BY id DESC
    ";
    $result = $this->db->query($query);       
    return $result->result(); 
  }

  // home post list by user_id
  public function get_user_home_post($user_id){
    
    $query = 
    "SELECT home_post.*,
     home_post.id as home_post_id,users.id as user_id,users.name,users.image as user_img,users.total_coin,
     DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date 

     FROM home_post
     LEFT JOIN users ON home_post.user_id=users.id
    
     WHERE home_post.user_id='$user_id' OR home_post.user_id !='$user_id'
     ORDER BY id DESC
    ";

    //  $res = $this->db->query($query)->result();

    //  $query2="SELECT share_post.sender_id,share_post.post_id FROM share_post";

    //  $res2 = $this->db->query($query)->result();


    // $result = array_merge($res,$res2);

    $result = $this->db->query($query);       
    return $result->result(); 
  }

  public function check_like($id,$user_id){
    $query = 
    "SELECT status
    FROM `like_on_post` 
    WHERE user_id='$user_id' AND post_id ='$id'";

    $result = $this->db->query($query);
    $data =  $result->row();
    if ($data){
      return $data->status;
    }else{
      return 0;
    }
  }


  //check followers
  public function check_followers($to_user_id,$user_id){
    $query ="SELECT COUNT(id) as follow_status
    FROM `follow_list` 
    WHERE `user_id`='$user_id' AND `to_user_id` ='$to_user_id'";
    $result=$this->db->query($query);
    $datas=$result->row();
    if ($datas) {
      return $datas->follow_status;
    }else{
      return 0;
    }
  }


  // check followers
  // public function check_followers11($user_id){
  //   $query ="SELECT COUNT(id) as follow_status
  //   FROM `follow_list` 
  //   WHERE `user_id`='$user_id'
  //   ";
  //   $result=$this->db->query($query);
  //   $datas=$result->row();
  //   if ($datas) {
  //     return $datas->follow_status;
  //   }else{
  //     return 0;
  //   }
  // }


  public function check_follow($user_id){
    $query ="SELECT status as follow_status
    FROM `follow_list` 
    WHERE `to_user_id`='$user_id'";
    $result=$this->db->query($query);
    // $result=num_rows()>0
    $datas=$result->row();
    if ($datas) {
      return $datas->follow_status;
    }else{
      return 0;
    }

  }


  //check frnd request
  public function check_frnd_request($receiver_id,$user_id){
    $query ="SELECT status as frnd_request_status
    FROM `friend_list` 
    WHERE `sender_id`='$user_id' AND `receiver_id` ='$receiver_id'";
    $result=$this->db->query($query);
    $datas=$result->row();
    if ($datas) {
      return $datas->frnd_request_status;
    }else{
      return 0;
    }

  }



  
  
  // total like on post
  public function like_count_post($id){
    $query = "SELECT COUNT(id) as total_like FROM `like_on_post` WHERE post_id='$id'";
    $result = $this->db->query($query);

    if ($result){
      return $result->row()->total_like;
    }else{
      return 0;
    }

  }

  public function count_following($user_id){
  $query="SELECT count(to_user_id) as total_following FROM follow_list WHERE follow_list.user_id='$user_id'";
    $result = $this->db->query($query);

    if ($result){
      return $result->row()->total_following;
    }else{
      return 0;
    }
  }

  public function count_followers($user_id){
    $query="SELECT count(to_user_id) as total_followers FROM follow_list WHERE follow_list.to_user_id='$user_id'";
    $result = $this->db->query($query);

    if ($result){
      return $result->row()->total_followers;
    }else{
      return 0;
    }

  }


  // total comment on post
  // total like on post
  public function comment_count_post($id){
    $query = "SELECT COUNT(id) as total_comment FROM `comment_list` WHERE post_id='$id'";
    $result = $this->db->query($query);
    if ($result){
      return $result->row()->total_comment;
    }else{
      return 0;
    }

  }



  public function user_total_coin($user_id){
    $query ="SELECT 
     
     SUM(home_post.coin) as total_coin
    
     FROM home_post
     WHERE home_post.user_id='$user_id'
     ORDER BY id DESC";
    return $result = $this->db->query($query);       
    
  }

  public function createData($data,$table){
    $this->db->set($data);
    $insertData = $this->db->insert($table);
    if($insertData){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  // public function record_count()
  //   {  
  //     $post_id=$this->input->post('post_id');
  //   $resultcount= $this->db->query("SELECT COUNT(*) AS `total count` FROM like_on_post WHERE `post_id`='$post_id'")->result();

  //   return $resultcount;
  
   
  //  }

  public function delete_record($wheredata,$tbl){
    $query = $this->db->where($wheredata);
    $query = $this->db->delete($tbl);
    return $query;
  }

  //delete like post
  public function delete_like($user_id,$post_id) 
  {
    $this->db->where('user_id', $user_id);
    $this->db->where('post_id', $post_id);
    // $this->db->where('status', 0);
    $this->db->delete('like_on_post');
  }

   public function insertAllData($table,$userdata)
  { 
    $this->db->insert($table, $userdata);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function singleRowdata($where_data,$table){
      $this->db->where($where_data);
      $query=$this->db->get($table);
      return $query->row();
  }

  //following
  public function following_details($user_id){
    $query = "SELECT *
    FROM follow_list
    INNER JOIN users ON follow_list.to_user_id = users.id
    WHERE follow_list.user_id = '{$user_id}'
    ";
    $result = $this->db->query($query);       
    return $result->result(); 

  }
  
  //my followers
  public function followers_details($user_id){
    // $query ="SELECT *
    // FROM follow_list
    // INNER JOIN users ON follow_list.user_id = users.id
    // WHERE follow_list.to_user_id = '{$user_id}'";
    $query ="SELECT 
      follow_list.id,
      follow_list.user_id,
      follow_list.to_user_id,
      users.email,users.gender,
      users.name,
      users.phone_number,
      users.image,
      users.created_at,
      users.modified_at
    FROM follow_list
    INNER JOIN users ON follow_list.user_id = users.id
    WHERE follow_list.to_user_id = '$user_id' ORDER BY id DESC";
    $result = $this->db->query($query);       
    return $result->result();
  }

  public function user_details($post_id){
    $query ="SELECT comment_list.*,DATE_FORMAT(comment_list.create_date,'%d-%m-%Y') as date,users.name,users.image
    FROM comment_list
    INNER JOIN users ON comment_list.user_id = users.id
    WHERE comment_list.post_id = '{$post_id}' ORDER BY id ASC";
    $result = $this->db->query($query);       
    return $result->result();
  }

   // home post list by user_id
  public function get_user_all($user_id){
    
    $query = 
    "SELECT * FROM users

     WHERE users.id !='$user_id'
     ORDER BY name ASC
    ";
    $result = $this->db->query($query);       
    return $result->result(); 
  }


   // my friend request
  public function request_detail($receiver_id){
    $query ="SELECT friend_list.*,
    
    users.name,
    users.image
    FROM friend_list
    INNER JOIN users ON friend_list.sender_id = users.id
    WHERE friend_list.receiver_id = '{$receiver_id}' AND friend_list.status='0'";
    $result = $this->db->query($query);       
    return $result->result();
  }


  // public function frnd_detail($receiver_id){
  //   $query ="SELECT friend_list.*,
  //   users.name,
  //   users.image
  //   FROM friend_list
  //   INNER JOIN users ON friend_list.sender_id = users.id
  //   WHERE friend_list.receiver_id ='$receiver_id' AND friend_list.status='0'";

  //   $result = $this->db->query($query);       
  //   return $result->result();
  // }


  public function frnd_detail($receiver_id){
    $query ="SELECT friend_list.*,
    us.name as reciver_name,
    us.image as reciver_image,
    users.name,
    users.image
    FROM friend_list
    INNER JOIN users ON friend_list.sender_id = users.id
    INNER JOIN users us  ON friend_list.receiver_id=us.id
    WHERE (friend_list.sender_id = '{$receiver_id}' OR friend_list.receiver_id = '{$receiver_id}') AND friend_list.status=1";
    $result = $this->db->query($query);       
    return $result->result();
  }


  public function countfrnd($receiver_id){

    $query="SELECT COUNT(friend_list.id) as total_friend FROM `like_on_post` 
     WHERE friend_list.sender_id='$receiver_id' OR friend_list.receiver_id='$receiver_id' AND status='1'";
    $result = $this->db->query($query);
    if ($result) {
      return $result->row()->total_like;
    }else{
      return 0;
    }
    // return $result->result();
  }

  




  public function updatePass($wheredata,$table,$data){

    $query = $this->db->where($wheredata);

    $query = $this->db->update($table,$data);

    return $query;
  }

  public function count_all_like_of_user_post($user_id){
    $query = "SELECT COUNT(like_on_post.id) as total_like FROM `like_on_post` 
      INNER JOIN home_post ON like_on_post.post_id = home_post.id

      WHERE home_post.user_id=$user_id";
    $result = $this->db->query($query);
    if ($result) {
      return $result->row()->total_like;
    }else{
      return 0;
    }
    // return $result->result();
  }



  public function count_all_like_post($post_id){
    $query = "SELECT COUNT(like_on_post.post_id) as total_like FROM `like_on_post` 
      INNER JOIN home_post ON like_on_post.post_id = home_post.id

      WHERE home_post.id='$post_id'";
    $result = $this->db->query($query);
    if ($result) {
      return $result->row()->total_like;
    }else{
      return 0;
    }
    // return $result->result();
  }


  public function share_post($user_id){
    $query = "SELECT *
    FROM share_post
    -- LEFT JOIN users ON share_post.sender_id = users.id
    WHERE share_post.sender_id = '{$user_id}'
    ";
    $result = $this->db->query($query);       
    return $result->result(); 

  }



  //10 higest coins user
  public function higest_coins(){
    $query="SELECT id,name,image,total_coin

    FROM `users` HAVING total_coin >= 100 
    ORDER BY total_coin DESC LIMIT 10";
    $result = $this->db->query($query);
    return $result->result();
  }


  // public function count_all_like_of_friends($user_id){
  //   $query = "SELECT 
  //   COUNT(like_on_post.id) as total_like,
  //   users.id,
  //   users.name,
  //   users.image 
  //   FROM `like_on_post` 
      
  //   INNER JOIN home_post ON like_on_post.post_id = home_post.id

  //   WHERE home_post.user_id=$user_id";
  //   $result = $this->db->query($query);
  //   // if ($result) {
  //   //   return $result->result()->total_like;
  //   // }else{
  //   //   return 0;
  //   // }
  //   return $result->result();
  // }

    public function deletePost($post_id){
      $this->db->where('id',$post_id);
      return $this->db->delete('home_post');
    }

    public function getAllJobs(){
      $this->db->select('u.name,j.*');
      $this->db->from('job_post j');
      $this->db->join('users u','j.user_id=u.id','left');
      $this->db->where('j.status','Open');
      $query = $this->db->get();
      return $query->result_array();
    }


    //like post list
    public function like_post($user_id=''){
      $query ="SELECT 
      like_on_post.user_id,
      like_on_post.post_id,
      home_post.post_img,
      home_post.post_video,
      home_post.text_message,
      home_post.question 
      FROM `like_on_post` 

      INNER JOIN home_post ON home_post.id=like_on_post.post_id

      WHERE like_on_post.user_id='$user_id'";
      $result = $this->db->query($query);       
      return $result->result();

    }

    public function selectAll($table,$orderby="")
    {      
     $this->db->select('*');
     $this->db->order_by($orderby);
     $this->db->from($table);
     $query = $this->db-> get();
     return $query->result_array();
    }

    // All home post list by user_id
    // public function get_user_home_posts($user_id){
    //   date_default_timezone_set('Asia/Calcutta');
    //   $today = date('Y-m-d');
     
    //   $query = 
    //   "SELECT home_post.*,
    //     home_post.id as home_post_id,u.id as user_id,u.name,u.image as user_img,u.total_coin,
    //     DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date,
    //    share_post.sender_id,us.name as sh_name,us.image as sh_image,
    //    DATE_FORMAT(share_post.created_date,'%d %b %Y %r') as share_post_date

    //     FROM home_post
    //     LEFT JOIN users u ON home_post.user_id=u.id
    //     LEFT JOIN share_post ON share_post.post_id=home_post.id
    //     LEFT JOIN users us  ON share_post.sender_id=us.id
    //     WHERE share_post.sender_id='$user_id' OR
    //       home_post.user_id!='$user_id' OR 
    //       home_post.user_id='$user_id' OR 
    //       share_post.sender_id!='$user_id' OR
    //       (home_post.expire_on >='$today')
         
    //     ORDER BY home_post.modify_date DESC
    //   ";

    //   $res = $this->db->query($query)->result();

    //   $query2="SELECT home_post.*,
    //    home_post.id as home_post_id,u.id as user_id,u.name,u.image as user_img,u.total_coin,
    //    DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date,
    //    share_post.sender_id,us.name as sh_name,us.image as sh_image,
    //    DATE_FORMAT(share_post.created_date,'%d %b %Y %r') as share_post_date
    //     FROM share_post
    //   INNER JOIN home_post ON share_post.post_id=home_post.id
    //   INNER JOIN users u ON home_post.user_id=u.id
    //   INNER JOIN users us  ON share_post.sender_id=us.id
    //    WHERE share_post.sender_id='$user_id' OR 
    //   home_post.user_id='$user_id' OR 
    //   home_post.user_id!='$user_id' OR
    //   (home_post.expire_on >='$today')
    //   -- (home_post.user_id=0 OR home_post.expire_on >= $today)
     
    //   ORDER BY home_post.modify_date DESC
    //     ";
    //   $res2 = $this->db->query($query2)->result();
     
    //   $result = array_merge($res,$res2);

    //   $result2=array_unique($result, SORT_REGULAR);  
    //   return $result2; 
    // }

    //All home post
    public function get_home_post_details(){
      $query ="SELECT home_post.*,
        home_post.id as home_post_id,u.id as user_id,u.name,u.image as        user_img,u.total_coin,
        DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date,
        share_post.id as share_post_id,share_post.sender_id,us.name as sh_name,us.image as sh_image,
       DATE_FORMAT(share_post.created_date,'%d %b %Y %r') as share_post_date
      FROM home_post 
      LEFT JOIN users u ON home_post.user_id=u.id
      LEFT JOIN share_post ON share_post.post_id=home_post.id
      LEFT JOIN users us  ON share_post.sender_id=us.id
      WHERE (home_post.expire_on > CURRENT_TIMESTAMP AND home_post.open_on < CURRENT_TIMESTAMP AND home_post.promo_status=1) OR home_post.type='image' OR home_post.type='' OR home_post.type='video' ORDER BY home_post.modify_date DESC";
      $result=$this->db->query($query);
      return $result->result();
    }

    // user post n share list
    // public function get_user_home_posts1($user_id){
      
    //   $query = 
    //   "SELECT home_post.*,
    //    home_post.id as home_post_id,u.id as user_id,u.name,u.image as user_img,u.total_coin,
    //    DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date,
    //    share_post.sender_id,us.name as sh_name,us.image as sh_image

    //    FROM home_post
    //    INNER JOIN users u ON home_post.user_id=u.id
    //    LEFT JOIN share_post ON share_post.post_id=home_post.id
    //    LEFT JOIN users us  ON share_post.sender_id=us.id
    //     WHERE share_post.sender_id='$user_id' OR home_post.user_id='$user_id' 
    //    ORDER BY id DESC
    //   ";

    //    $res = $this->db->query($query)->result();

    //    $query2="SELECT home_post.*,
    //    home_post.id as home_post_id,u.id as user_id,u.name,u.image as user_img,u.total_coin,
    //    DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date,
    //    share_post.sender_id,us.name as sh_name,us.image as sh_image FROM share_post
    //    INNER JOIN home_post ON share_post.post_id=home_post.id
    //    INNER JOIN users u ON home_post.user_id=u.id
    //     INNER JOIN users us  ON share_post.sender_id=us.id
    //     WHERE share_post.sender_id='$user_id' OR home_post.user_id='$user_id' ";
    //   $res2 = $this->db->query($query2)->result();

    //   $result = array_merge($res,$res2);

    //    $result2=array_unique($result, SORT_REGULAR);
        
    //   return $result2; 
    // }


    public function get_user_home_posts1($user_id){
      
      $query = 
      "SELECT home_post.*,
       home_post.id as home_post_id,u.id as user_id,u.name,u.image as user_img,u.total_coin,
       DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date
      FROM home_post
       INNER JOIN users u ON home_post.user_id=u.id
      
      WHERE home_post.user_id='$user_id' ORDER BY id DESC";

      $res = $this->db->query($query);
      return $res->result();

      //  $query2="SELECT home_post.*,
      //  home_post.id as home_post_id,u.id as user_id,u.name,u.image as user_img,u.total_coin,
      //  DATE_FORMAT(home_post.created_date,'%d %b %Y %r') as date,
      //  share_post.sender_id,us.name as sh_name,us.image as sh_image FROM share_post
      //  INNER JOIN home_post ON share_post.post_id=home_post.id
      //  INNER JOIN users u ON home_post.user_id=u.id
      //   INNER JOIN users us  ON share_post.sender_id=us.id
      //   WHERE share_post.sender_id='$user_id' OR home_post.user_id='$user_id' ";
      // $res2 = $this->db->query($query2)->result();

      // $result = array_merge($res,$res2);

      //  $result2=array_unique($result, SORT_REGULAR);
        
      // return $result2; 
    }

    public function GetPromotion(){
      $query="SELECT promotions.title,promotions.description,promotions.image,promotions.url,DATE_FORMAT(promotions.open_on,'%d %b %Y %r') as open_date,
      DATE_FORMAT(promotions.expire_on,'%d %b %Y %r') as expire_date 
      FROM promotions";

      $res = $this->db->query($query);
      return $res->result();     
    }

    private function getCoinForActionss($actions){
      $this->db->where('key_value','coins');
      $query = $this->db->get('settings')->row_array();
      $value = json_decode($query['value']);
      
      switch($actions)
      {   
        case 'claimUser':
        $index = array_search('claimUser',$value->coins_for);
        break;
      }
      return $value->amount[$index]; 
    }

    public function GetUserP(){
      $winerUser=$this->getCoinForActionss('claimUser');
      $query="SELECT user_id FROM claim
      ORDER BY RAND()
      LIMIT $winerUser";
      $userdata=$this->db->query($query);
      return $userdata->result();
    }


    public function UsersLike($post_id){
      $query="SELECT users.id,
      users.name,
      users.image,
      like_on_post.status
      FROM like_on_post
      INNER JOIN users ON users.id=like_on_post.user_id
      WHERE like_on_post.post_id='$post_id'
      ";
      $results=$this->db->query($query);
      return $results->result();
    }

    /*24/02*/
    //check frnd or not
    public function check_frnds($to_user_id,$user_id){
      $query ="SELECT status as friend_status
      FROM `friend_list` 
      WHERE `sender_id`='$user_id' AND `receiver_id` ='$to_user_id' AND (`status`=1 OR `status`=0)";
      $result=$this->db->query($query);
      $datas=$result->row();
      if ($datas) {
        return $datas->friend_status;
      }else{
        return "null";
      }
    }

    public function getToUserDetails($to_user_id){
      $query="SELECT users.id,
      users.name,
      users.image
      FROM users
      WHERE users.id='$to_user_id'
      ";
      $results=$this->db->query($query);
      return $results->row();
    }


    //get Notification
    public function GetNotification(){
     $query="SELECT notifications.title,notifications.image FROM notifications WHERE status=1 ORDER BY date_time DESC LIMIT 1";
     $result=$this->db->query($query);
     return $result->row();
    }

    //GET firebase notification
    public function get_fb_notification($user_id){
      $query="SELECT fb_notification.id,fb_notification.post_id,fb_notification.sender_id,fb_notification.message,fb_notification.types,
      DATE_FORMAT(fb_notification.date,'%d %b %Y %r') as date,
     users.name,users.image
      FROM fb_notification 
      INNER JOIN users ON users.id=fb_notification.sender_id
      WHERE fb_notification.reciever_id='$user_id' ORDER BY date DESC";
     $result=$this->db->query($query);
     return $result->result_array();
    }
     public function get_fb_notification1($user_id){
      $query="SELECT fb_notification.id,fb_notification.post_id,fb_notification.sender_id,fb_notification.message,fb_notification.types,
      DATE_FORMAT(fb_notification.date,'%d %b %Y %r') as date,
     users.name,users.image
      FROM fb_notification 
      INNER JOIN users ON users.id=fb_notification.sender_id
      WHERE fb_notification.reciever_id='$user_id' ORDER BY date DESC";
     $result=$this->db->query($query);
     return $result->result();
    }


    public function post_details($post_id){
      $query ="SELECT home_post.*,users.name,users.image FROM home_post
      INNER JOIN users ON users.id=home_post.user_id
       WHERE home_post.id='$post_id' ";
      $results=$this->db->query($query);
      return $results->row();
    }

}
?>