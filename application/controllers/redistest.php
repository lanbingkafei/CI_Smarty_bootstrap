 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class RedisTest extends CI_Controller {
        /*
	*默认构造函数，
	*定义css以及js路径
	*/

	function __construct(){
      parent::__construct();
	    $url=$this->config->base_url();
	    $this->cismarty->assign('url',$url);
         }	

	public function	redismonitor(){
	  // echo $this->config->base_url();
	   $params = array('REDIS_HOST' => '10.255.254.63', 'REDIS_PORT' => 6379,'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);

	   $this->load->library('phpredis', $params);
	   $arr=$this->phpredis->info();
           if(($arr['keyspace_misses']+$arr['keyspace_hits'])==0){
              $cache=0;
          }else{
              $cache=$arr['keyspace_hits']/($arr['keyspace_misses']+$arr['keyspace_hits'])*100;
               $cache=round($cache,3);
           }
            $miss=100-$cache;
            $data[]=array('命中率',$cache);
            $data[]=array('未命中率',$miss);
	    //print_r($data);
           $redisIP=$params['REDIS_HOST'];
	    $this->cismarty->assign('HOST',$redisIP);
            $this->cismarty->assign("name",json_encode($data));
            $this->cismarty->display('redismonitor.html');
	   
	}

  /*
  *通过twemproxy proxy获取redis键值
  */
  public function proxy(){
      $params = array('REDIS_HOST' => '10.255.254.63', 'REDIS_PORT' => 22121,'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);
      $this->load->library('phpredis', $params);
      //$this->phpredis->set("b",'{"name": "leto", "planet": "dune"}');
      for ($i=0; $i <1000; $i++) { 
        $this->phpredis->set("d".$i,'{"name":"mary","id":'.$i.'}');
      }
      
      //echo json_encode(array("name"=>"bian","id"=>"3"));
      $v=$this->phpredis->get("b");
      echo "<pre>";
      print_r(json_decode($v,true));
      echo "</pre>";
  }

  /*
  *通过twemproxy proxy获取hash键值
  */
  public function redishash(){
      $params = array('REDIS_HOST' => '10.255.254.63', 'REDIS_PORT' => 6379,'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);
      $this->load->library('phpredis', $params);
      $this->phpredis->hashSet("customer",array("name"=>"mary1","age"=>129));
      
      $arr=$this->phpredis->hashGet("customer",array("name"));
      echo $arr['name'];
      $arr1=$this->phpredis->hashGet("customer",array(),2);
      print_r($arr1);
  }

  public function hget(){
      $params = array('REDIS_HOST' => '10.255.254.63', 'REDIS_PORT' => 22121,'REDIS_CTYPE'=>1,'REDIS_DBNAME'=>'DB0','REDIS_TIMEOUT'=>0);
      $this->load->library('phpredis', $params);
      //$this->phpredis->set("b",'{"name": "leto", "planet": "dune"}');
      $this->phpredis->hashSet("customer",array("result"=>'{"name": "leto", "age":23}'));
      $arr=$this->phpredis->hashGet("customer",array("result"));  
      echo "<pre>";
      print_r(json_decode($arr['result'],true));
      echo "</pre>";
  }

	public function smarty()
        {
          $data['title'] = '标题';  
          $data['num'] = '123456789';  
          $this->cismarty->assign('data',$data); // 亦可  
          $this->cismarty->display('CIDemo/test.html'); // 亦可 
	}



}
