<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/models/student_model.php';
class Form extends CI_Controller {

	/*
	*单元测试类
	*默认构造函数
	*/
    function __construct(){
        parent::__construct();
		$this->load->library('unit_test');
		$this->unit->active(true);
    
    }

	public function index()
	{
		//$this->load->helper('form');
		//$options=array('a'=>'a','b'=>'b','c'=>'c');
		//echo form_dropdown('form1',$options,'b');

		//$m=new Student_model();
		//print_r($m->getjoin(array(1,'mary')));
$this->output->enable_profiler(true);
//基准测试类
$this->benchmark->mark('one');

$test = 1 + 1;

$expected_result = 3;

$test_name = 'Adds one plus one';

$this->unit->run($test, $expected_result, $test_name);
$this->unit->run(5, 5, '测试相等性');
echo $this->unit->report();
//var_dump($this->unit->result());


$this->benchmark->mark('two');
echo $this->benchmark->elapsed_time('one','two');

	}







}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
