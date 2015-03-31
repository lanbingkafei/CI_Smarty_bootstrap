<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Example extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
    }
    
    /*
    *model & restful
    * 结合model类，从数据库里面取值，返回给调用者
    *
    */

    function usermodel_get()
    {
        $this->load->model('User_model');
        $arr=$this->User_model->getjoin(array($this->get('id'),'mary'));
        // var_dump($arr);
        $this->response($arr, 200); 

    }


    /*
    *结合jquery datatable插件演示前端和restful结合的例子
    *返回格式：
    *{"draw":1,"recordsTotal":345,"recordsFiltered":40,"data":[["10.255.254.1","6379","master","60%","40%"],["10.255.254.5","6379","master","60%","40%"]]}
    */
    public function data_get(){
        //echo $this->input->get('draw');
        $output = array(
            "draw" => intval($_GET['draw']),
            "recordsTotal" =>345,
            "recordsFiltered" =>40,
            "data" => array()
        );
        $page=$this->get('draw');//第几页
        $length=$this->get('length');//每页显示条数
        // echo $length;
        for($i=1;$i<$length+1;$i++){
            $dataaaa= array(
            //"DT_RowId"=> "row_".$i,
            //"DT_RowClass"=>"gradeB",
            "10.255.254.".$i,
            "6379",
            "master",
            "60%",
            "40%"
          );
          $output['data'][]=$dataaaa; 
        }

       $this->response($output,200); 
    }

public function perfdata_post(){
   $arr = array('login'=>'1','message'=>'sucessful');
   $this->response($arr,200);
        //$arr1=array(array('value'=>'60%','name'=>'未命中率'),array('value'=>'60%','name'=>'未命中率')); 
        //$this->response($arr1,200);

}

public function perfdata1_post(){
        $arr2=array(array('value'=>'60%','name'=>'未命中率'),array('value'=>'60%','name'=>'未命中率')); 
        $this->response($arr2,200);

}

/*
*PHP ajax json交互操作
*
*/

public function ajaxjson_post(){
    $message=$this->post();
    //$message=file_get_contents("php://input");
     $arr=$message;
    $this->response($arr,200);
}

public function ajax_post(){
    $arr = array('name'=>$this->post('name'),'password'=>$this->post('password'));

    $this->response($arr,200);
}




  /*
  *获取redis hash键值---hmset
  */
  public function redishash_get(){
      $params = array('REDIS_HOST' => '10.255.254.63', 'REDIS_PORT' => 6379,'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);
      $this->load->library('phpredis', $params);
      //$this->phpredis->hashSet("customer",array("name"=>"mary1","age"=>129));
      $arr1=$this->phpredis->hashGet("customer",array(),2);
      //sleep(2);
      $this->response($arr1,200);
  }




    function user_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
    	$users = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
			2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
		);
		
    	$user = @$users[$this->get('id')];
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
    
    function user_post()
    {
        //$this->some_model->updateUser( $this->get('id') );
        $message = array('id' => $this->post('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }

    /*
    *post json串 演示
    */
    function userson_post()
    {
        $message=file_get_contents("php://input");
        $body=json_decode($message,true);
        $this->response($body,200);
    }


    
    function user_delete()
    {
    	//$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function users_get()
    {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $users = array(
			array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
			array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);
        
        if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }


	public function send_post()
	{
		var_dump($this->request->body);
	}


	public function send_put()
	{
		var_dump($this->put('foo'));
	}
}