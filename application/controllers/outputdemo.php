<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OutputDemo extends CI_Controller {

	
	/*
	*参考http://codeigniter.org.cn/user_guide/libraries/uri.htmlß
	*访问URL：http://localhost/CI/index.php/URIDemo/index/name/eric/age/19/sex/male     -----》Array ( [name] => eric [age] => 19 [sex] => male )
	*/

	public function index()
	{
		$this->output->set_status_header(400);
		$this->output->set_content_type("application/json");
		$arr=$this->uri->uri_to_assoc(3);
		$this->output->set_output(json_encode($arr));
		// $this->output->append_output("demo");
	}


}

