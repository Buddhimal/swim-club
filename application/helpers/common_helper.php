<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->ci =& get_instance();
$this->ci->load->database();

class CommonHelper{

	public $login_user_id;
	public $login_token;

	public function __construct(){
		$a =& get_instance();
		$a->load->library('session');

		$this->login_user_id = $a->session->userdata('user_id');
		$this->login_token = $a->session->userdata('login_token');

	}

}

