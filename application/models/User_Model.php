<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class User_Model extends CI_Model {



  public function check_credentials($mobile_or_email,$password)

  {

    $query = $this->db->query("SELECT * FROM users WHERE `phone`= '$mobile_or_email' AND password= '$password'");

    if(count($query->result()))

    {

      return $query->row();

    }else{

      return array();

    }

  }

	public function selectAllData($table,$order_by){

	   $this->db->select('*');

	   $this->db->order_by($order_by);

	   $this->db->from($table);

	   $query = $this ->db-> get();    

	   return $query->result_array();

  	}



  	public function selectAllDataArrayObject($table,$where,$order_by){

	   $this->db->select('*');

	   $this->db->from($table);

	   $this->db->where($where);

	   $this->db->order_by($order_by);

	   $query = $this->db->get();    

	   return $query->result();

  	} 



  	/*

		@functons for get only selected columns instead of all columns

		@return type array object

  	*/



  	public function getSelectedColumsArrayObject($table,$columns="",$where,$order_by)

  	{

  		if(!empty($columns))

  		{

  			$columnses = implode(',', $columns);

  		}else{

  			$columnses = "*";

  		}

	   $this->db->select("$columnses");

	   $this->db->from($table);

	   $this->db->where($where);

	   $this->db->order_by($order_by);

	   $query = $this->db->get();    

	   return $query->result();

  	}

  	

  	/*

		@functons for get only selected columns instead of all columns

		@return type array

  	*/



  	public function getSelectedColumsResultArray($table,$columns="",$where,$order_by){

  		if(!empty($columns))

  		{

  			$columnses = implode(',', $columns);

  		}else{

  			$columnses = "*";

  		}

	   	$this->db->select("$columnses");

		$this->db->from($table);

		$this->db->where($where);

		$this->db->order_by($order_by);

	    $query = $this->db->get();

	   return $query->result_array();

  	} 





  	public function getSelectedSingleRowdata($table,$columns="",$where)

  	{

  		if(!empty($columns))

  		{

  			$columnses = implode(',', $columns);

  		}else{

  			$columnses = "*";

  		}

  		

  		$this->db->select("$columnses");

    	$this->db->where($where);

    	$query=$this->db->get($table);

    	return $query->row();



    }







  	public function insertAllData($table,$userdata)

  	{ 

	    $this->db->insert($table, $userdata);

      // $this->db->order_by($order_by);

	    $insert_id = $this->db->insert_id();

	    return  $insert_id;

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



  	public function select_single_row($table,$key,$value) 

  	{

	    $this->db->select('*');

	    $this->db->from($table);

	    $this->db->where($key,$value);

	    $query = $this->db->get();

	    return $query->row();

  	}



	public function selectAllById($table,$wheredata,$order_by=""){

		$this->db->select('*');

		$this->db->from($table);

		$this->db->where($wheredata);

		$this->db->order_by($order_by);

	   // echo $this->db->last_query();exit();

	    $query = $this->db->get();

	   return $query->result_array();

	} 





	public function singleRowdata($where_data,$table){

    $this->db->where($where_data);

    $query=$this->db->get($table);

    return $query->row();

  }



  function updateData($table,$data,$id)

	{ 

    $this->db->where('id', $id);

    $this->db->update($table, $data);

    return true;

	}



	public function update($wheredata,$table,$data){

		$query = $this->db->where($wheredata);

		$query = $this->db->update($table,$data);	

		return $query;

	}



  public function updates($table,$data,$wheredata){

    $this->db->where($wheredata);

    $updateData=$this->db->update($table,$data);

    // echo $this->db->last_query();

    if($updateData){

    return $updateData;

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





 	public function selectWhere($table,$wheredata){

    $this->db->select('*');

    $this->db->from($table);

    $this->db->where($wheredata);

    $query = $this->db->get();

    return $query->result();

	}



	public function insert($table,$data)

	{   

		$this->db->insert($table, $data);

   	$insert_id = $this->db->insert_id();

  	return  $insert_id;      

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



   public function get_last_creted_id($key,$table) 

  {

    $this->db->select("$key");

    $query = $this->db->get("$table");

    return  $query->last_row();

  }





  function getAllData($data){



    $this->db->select($data['field']);

    $this->db->where($data['where']);

    $data = $this->db->get($data['table']);

    return $data->result();

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







}