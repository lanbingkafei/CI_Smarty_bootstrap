<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RestClient extends CI_Controller {

    function __construct(){  
        parent::__construct();  
        $this->load->library('rest', array('server' => 'http://localhost/CI/index.php/example/'));
    } 
	    

    /*
    *参考 http://code.tutsplus.com/tutorials/working-with-restful-services-in-codeigniter-2--net-8814
    *
    */

	public function apidemo()
	{
		$user = json_decode(file_get_contents("http://localhost/CI/index.php/example/user/id/3/format/json"),true);
		echo $user['name'];
	}


function rest_client_php($id)
{
    $user = $this->rest->get('usermodel', array('id' => $id), 'serialize');
     
    // echo $user->name;    
    print_r($user[0]['name']);
}




function rest_client_example($id)
{
   
    // $this->load->spark('restclient/2.1.0');

     
    $user = $this->rest->get('user', array('id' => $id), 'json');
     
    echo $user->name;

 

/*
    // //$this->load->spark('restclient/2.1.0');

    // Load the library
    $this->load->library('rest');

    // Set config options (only 'server' is required to work)

    $config = array('server'=> 'http://localhost/CI/index.php/example/');

    // Run some setup
    $this->rest->initialize($config);

    // Pull in an array of tweets
    // $tweets = $this->rest->get('statuses/user_timeline/'.$username.'.xml');


    $user = $this->rest->get('user', array('id' => $id), 'json');
     
    echo $user->name;
*/

}


	
function rest_post()
{
    $user=$this->rest->post("user",array('id'=>'1', 'name' =>'bian', 'email' =>'b@dd.com', 'message' => 'ADDED!'),'json');
    $format=json_encode($user);
    $user1=json_decode($format,true);
    print_r($user1);
    echo "</br>";
    foreach ($user1 as $key => $value) {
        # code...
        echo $key."====>".$value."</br>";
    }
    // print_r($format[);
}





}

