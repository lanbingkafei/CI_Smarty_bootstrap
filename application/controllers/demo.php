<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {


	public function index()
	{
		// echo "this is define;";
	    $data['content'] = array(
                          "name" => "军哥",
                          "welcome" => "欢迎光临PHPer小站。",
                          "question" => "军哥的外号是什么？",
                          "answer" => "排骨哥。源自‘男追女煮红烧肉，女追男烧排骨’。哈哈~~",
                    );	
		$this->load->view('demo1',$data);

	}
	/*
	 *演示model
	 *date：2015-01-29
	 *
	 */

	public function mode()
	{

		$this->load->model("User_model");
		$arr=$this->User_model->get(array(1,'mary'));
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}

	public function dbinsert()
	{
		$this->load->model("User_model");
		$arr=$this->User_model->insert(array('北京','mary'));
		echo "<pre>";
		print_r($arr);
		echo "</pre>";		
	}

	public function dbdel()
	{
		$this->load->model("User_model");
		$arr=$this->User_model->delete(array(7));
		echo "<pre>";
		print_r($arr);
		echo "</pre>";		
	}

	public function numcount()
	{
		$this->load->model("User_model");
		echo $this->User_model->numcount();
	}

	public function getjoin()
	{
		$this->load->model('User_model');
		$arr=$this->User_model->getjoin(array(1,'mary'));
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}

	public function dbop()
	{
		$config['hostname'] = "10.255.254.63";
		$config['username'] = "writeuser";
		$config['password'] = "ddbackend";
		$config['database'] = "test";
		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$config['cache_on'] = FALSE;
		$config['cachedir'] = "";
		$config['char_set'] = "utf8";
		$config['dbcollat'] = "utf8_general_ci";

		$this->load->database($config);
		// $this->load->database();
		$query = $this->db->query('SELECT name FROM user LIMIT 1');
		$row = $query->row();
		echo $row->name;
	}


}

