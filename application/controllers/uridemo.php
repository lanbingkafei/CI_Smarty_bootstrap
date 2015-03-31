<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class URIDemo extends CI_Controller {

	
	/*
	*参考http://codeigniter.org.cn/user_guide/libraries/uri.htmlß
	*访问URL：http://localhost/CI/index.php/URIDemo/index/name/eric/age/19/sex/male     -----》Array ( [name] => eric [age] => 19 [sex] => male )
	*/

	public function index()
	{
		$this->output->enable_profiler(TRUE);
		$arr = $this->uri->uri_to_assoc();
		print_r($arr);


	}


	public function index1()
	{
		$array = array('product' => 'shoes', 'size' => 'large', 'color' => 'red');

		$str = $this->uri->assoc_to_uri($array);
		echo $str;
	}


}

