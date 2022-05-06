<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('user/muser');
		$this->load->model('mvalidation');
		$this->load->model('process_model');
		$common_data['permission_list'] = $this->mlogin->get_all_permission_models();
		$this->load->vars($common_data);
	}

	private function set_flash_data($msg, $alert_type = "alert-success")
	{
		$this->session->set_flashdata('msg', $msg);
		$this->session->set_flashdata('alert_type', $alert_type);
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function check_login()
	{

		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
		//echo $username;
		if ($this->mlogin->login($username, $password)) {
			//echo $return;
			echo '{ "retval": true,"url" : "' . base_url() . '' . '" }';
		} else {
			//echo $return;
			echo '{ "retval": false,"url" : "' . base_url() . 'login" }';
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_group_id');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect(base_url() . 'login');
	}

	public function change_password()
	{
		$current_pass = md5($this->input->post('current_pass'));
		$new_pass = md5($this->input->post('new_pass'));


		if ($this->mlogin->password_match($current_pass)) {

			$this->mlogin->password_update($new_pass);
			$this->session->unset_userdata('user_group_id');
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_group');
			$this->session->unset_userdata('sys_user_group_id');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();
			echo 'Password has been Changed..';

		} else {
			echo 'Sorry...!Current Password is Wrong';
		}
	}


	public function save_user()
	{

		$result = $this->mvalidation->is_valid($this->input->post());
		if ($result["success"]) {
			$post_data = $this->input->post();
			$post_data["first_name"] = $this->mvalidation->validate_string($post_data["first_name"]);
			$post_data["last_name"] = $this->mvalidation->validate_string($post_data["last_name"]);
			$post_data["address"] = $this->mvalidation->validate_string($post_data["address"]);
			$post_data["postcode"] = $this->mvalidation->validate_string($post_data["postcode"]);
			$post_data["role"] = $this->mvalidation->validate_string($post_data["role"]);
			$post_data["tp"] = $this->mvalidation->validate_string($post_data["tp"]);
			$password = $post_data['password'];
			unset($post_data['password']);
			$post_data["updated_at"] = date("Y-m-d H:i:s");

			$customer_data = $post_data;

			$customer_id = $this->process_model->insert('members', $customer_data);

			if ($customer_id) {

				$user_data['username'] = $post_data['email'];
				$user_data['password'] = md5($password);
				$user_data['email'] = $post_data['email'];
				$user_data['status_id'] = 1;
				$user_data['name'] = $post_data['first_name'];
				$user_data['user_group_id'] = $post_data['role'];
				$user_data['member_id'] = $customer_id;

				if ($this->muser->addnew_sys_user($user_data)) {

					$this->set_flash_data("Successfully Registered. Please wait until an Admin approve.", "alert-success");
					echo json_encode(array("success" => true, "data" => "login"));
				}
			} else {
				$this->set_flash_data("Failed to register new member", "alert-danger");
				echo 'register';
			}
		} else {
			echo json_encode($result);
		}
	}


}
