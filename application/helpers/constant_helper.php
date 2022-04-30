<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->ci =& get_instance();
$this->ci->load->database();


if ( ! function_exists('checkLogin'))
{
//    protected $CI;

	function is_login(){
		$a =& get_instance();

		$a->load->library('session');

		// This only returns the id does not set it.
		$user_id = $a->session->userdata('user_id');
		$login_token = $a->session->userdata('login_token');
		if($user_id != ''){
			$user = $a->db->select('login_token')->from('sys_user')->where('user_id',$user_id)->get();

			if($user->num_rows() && $login_token === $user->row()->login_token)
				return $user_id;
		}
		return '';
	}

    function last_query(){
        $ab =& get_instance();

        echo($ab->db->last_query());
    }

}

/* SYSTEM MODULES */
$query = $this->ci->db->get('sys_module');

foreach ($query->result() as $row) {
    define($row->module_const, $row->module_id);
}


/* SYSTEM USER GROUPS */
define("SYS_ROOT_GROUP",1);
define("SYS_ADMIN_GROUP",2);
define("ADMIN_USER_GROUP",3);


