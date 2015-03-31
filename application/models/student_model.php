<?php
class Student_model{  
  

    function getjoin(array $arr)  
    {  
	  $CI =& get_instance();
       $data='';
	   $sql='SELECT u.name,u.ID,u.address,p.age FROM user u,tb_person p WHERE u.id = ? AND u.name = ? and u.id=p.id';
	   $query = $CI->db->query($sql,$arr);
	   $data=$query->result_array();
        
       // echo $CI->config->base_url();
       return $data;
    }  

}