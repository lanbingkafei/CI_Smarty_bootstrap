<?php
class User_model extends CI_Model {  
    function __construct()  
    {  
       parent::__construct();
       //$this->load->cismarty(); 
    }  
    //执行获取数据操作  
    function get(array $arr)  
    {  
	   $data='';
	   $sql='SELECT * FROM user WHERE id = ? AND name = ?';
	   $query = $this->db->query($sql,$arr);
	   $data=$query->result_array();
       return $data;
    }  
    //执行添加数据操作  
    function insert(array $arr)  
    {  
    	$sql="insert into user(name,address) VALUES(?,?)"; 
    	$query = $this->db->query($sql,$arr);
    	// $affect_r=$this->db->affected_rows();
    	$affect_r=$this->db->insert_id();
    	return $affect_r;
    }  
    //执行更新数据操作  
    function update()  
    {  
    //代码省略……  
    }  
    //执行删除数据操作  
    function delete(array $arr)  
    {  
       $data='';
	   $sql='delete FROM user WHERE id = ?';
	   $query = $this->db->query($sql,$arr);
	   $affect_r=$this->db->affected_rows();
	   return $affect_r;
    }

	function numCount()
	{
		$sql='SELECT * FROM user';
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
    function getjoin(array $arr)  
    {  
	   $data='';
	   $sql='SELECT u.name,u.ID,u.address,p.age FROM user u,tb_person p WHERE u.id = ? AND u.name = ? and u.id=p.id';
	   $query = $this->db->query($sql,$arr);
	   $data=$query->result_array();
       return $data;
    }  

}