<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		log_message("ERROR","错误信息");
        $this->cismarty->display('index/header.html'); 
		$this->cismarty->display('index/index1.html'); 
		$this->cismarty->display('index/foot.html');
	}

	/*
	*演示重定向redirect('/article/13', 'location', 301);
	*/
	public function redirect(){
		$this->load->helper('url');
		redirect('/welcome/mutilviewload', 'location', 301);
	}
	public function redirect1(){
		$this->load->helper('url');
		redirect('http://www.baidu.com');
	}

	/*
	*
	*加载多个view视图
	*
	*/
	public function mutilviewload(){
	   $params = array('REDIS_HOST' => '10.255.254.63', 'REDIS_PORT' => 6379,'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);
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
		$this->cismarty->display('index/foot.html'); 
	}

	/*
	*显示性能直线图
	*/
	public function line(){
		//line
		$verarr=array('V1001','V1002','V1003','V1004','V1005','V1006','V1007');
		$avgTPS=array(110, 110, 150, 130, 120, 130, 100);
		$this->cismarty->assign('softver',json_encode($verarr));
		$this->cismarty->assign('avgTPS',json_encode($avgTPS));
	    $this->cismarty->assign('name',"边学辉");

	    //加载多个view视图
		$this->cismarty->display('index/header.html'); 
		$this->cismarty->display('index/line.html'); 
		$this->cismarty->display('index/foot.html');		
	}

	/*
	*ajax 异步操作演示。函数版
	*/
	public function queryline(){


	    //加载多个view视图
		//$this->cismarty->display('index/header.html'); 
		$this->cismarty->display('index/queryline.html'); 
		//$this->cismarty->display('index/foot.html');		
	}


	/*
	*ajax 异步操作演示。
	*/
	public function ajax(){


		$this->cismarty->display('index/ajax.html'); 
	
	}

	/*
	*ajax 异步操作演示。
	*/
	public function ajaxjson(){


		$this->cismarty->display('index/ajaxjson.html'); 
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
