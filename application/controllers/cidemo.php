<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CIDemo extends CI_Controller {

    function __construct(){  
        parent::__construct();  
    } 
	    
	/*
	 *CI中使用类库和创建自己的类库
	 *详见：http://phpersite.sinaapp.com/jayjun/doc/ci/6/cid/11/aid/66
	 *
	 */

    public function lib2(){
    	$this->load->library('profiler');
    	echo $this->profiler->ccc();
    }


	/*
	 *CI中使用创建自己的类库
	 *
	 */
    public function lib1(){
    	$this->load->library('bian');
    	echo $this->bian->ccc();
    	print_r($this->input->server());


    }


    public function agent(){
    	$this->load->library('user_agent');
    	log_message('info', 'The purpose of some variable is to provide some value.');   
		echo $this->agent->platform();
		if ($this->agent->is_browser())
		{
		    echo 'You are using a browser.';
		}

    }

public function apidemo()
{
	$user = json_decode(file_get_contents("http://localhost/CI/index.php/example/user/id/3/format/json"));
	echo $user->name;
}




    /*
    *URL:  http://localhost/CI/index.php/CIDemo/index/eric/9
    *演示CI get方法 参考http://www.phpjyz.com/article-130-1.html
    *
    */


	public function index($name1,$id)
	{
		$this->output->enable_profiler(TRUE);
		// $this->output->enable_profiler(TRUE);
		// print_r($this->input->server());
		// $data1= file_get_contents("php://input");
		// print_r($data1);
		// print_r($this->input->post("name"));
		// print_r($this->input->request_headers());
		echo $this->config->item('base_url');
		echo "</br>";
		echo $this->config->system_url();
		// $data['title'] = '标题';  
  //       $data['num'] = '123456789';  
  //       $this->cismarty->assign('data',$data); // 亦可  
  //       $this->cismarty->display('CIDemo/test.html'); // 亦可  

	}


	/*
	*演示CI post json方法
	*
	*/


	public function jsonData()
	{
		$this->output->enable_profiler(TRUE);
		// print_r($this->input->server());
		$data1= file_get_contents("php://input");
		//print_r($data1);
		$arr=json_decode($data1,TRUE);
		// print_r($arr);
		echo $arr["name"];
		echo $arr["age"];
		// print_r($this->input->post(NULL,TRUE)); 

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
		$this->output->enable_profiler(TRUE);
		echo $this->input->get('id');
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

