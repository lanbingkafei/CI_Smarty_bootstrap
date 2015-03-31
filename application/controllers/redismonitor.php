<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RedisMonitor extends CI_Controller {

	/*
	*
	*默认构造函数
	*/
    function __construct(){
        parent::__construct();
	    $url=$this->config->base_url();
	    $this->cismarty->assign('public',$url);
	    $this->load->helper('url');
	    $RedisMonitorURL=site_url();
	    $this->cismarty->assign('URL1',$RedisMonitorURL); 

    }

	public function index()
	{

        $this->cismarty->display('index/header.html'); 
		$this->cismarty->display('redis/search.html'); 
		$this->cismarty->display('index/foot.html');
	}

	/*
	*查看缓存命中率
	*/
	public function search(){
	   $params = array('REDIS_HOST' => $this->input->post('IP'), 'REDIS_PORT' => $this->input->post('port'),'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);
	   $this->load->library('phpredis', $params);
	   $arr=$this->phpredis->info();
           if(($arr['keyspace_misses']+$arr['keyspace_hits'])==0){
              $cache=0;
          }else{
              $cache=$arr['keyspace_hits']/($arr['keyspace_misses']+$arr['keyspace_hits'])*100;
               $cache=round($cache,2);
           }
        $miss=100-$cache;
	    $arr1=array('value'=>$cache,'name'=>"命中率");	
		$arr2=array('value'=>$miss,'name'=>"未命中率");	

        $redisIP=$params['REDIS_HOST'];
	    $this->cismarty->assign('HOST1',$redisIP);
        $this->cismarty->assign("XV",json_encode($arr1));
		$this->cismarty->assign("YV",json_encode($arr2));

	    //加载多个view视图
		$this->cismarty->display('index/header.html'); 
		$this->cismarty->display('index/body.html'); 
		//$this->cismarty->display('index/foot.html');
	}

	public function listAll(){
         $this->cismarty->display('index/header.html'); 
		$this->cismarty->display('redis/table.html'); 
		//$this->cismarty->display('index/foot.html');		
	}


	public function DataAA(){
		//echo $this->input->get('draw');
		$output = array(
			"draw" => intval($_GET['draw']),
			"recordsTotal" =>345,
			"recordsFiltered" =>40,
			"data" => array()
		);

	    for($i=1;$i<10;$i++){
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

		echo json_encode( $output );
	}


}


