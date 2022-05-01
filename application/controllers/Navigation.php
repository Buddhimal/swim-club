<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Navigation extends CI_Controller
{
	private $common;

	public function __construct()
	{
		parent::__construct();
		if (is_login() == '') {
			redirect(site_url() . 'login');
		}
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('process_model');
		$this->load->model('user/muser');
		$this->common = new CommonHelper();
		$common_data['permission_list'] = $this->mlogin->get_all_permission_models();
		$this->load->vars($common_data);
	}

	public function index()
	{
		$this->load->view('template/header');
		$data["member_list"] = $this->process_model->get_new_members();
		$this->load->view('member/member_list', $data);
		$this->load->view('template/footer');
	}

	public function edit_member()
	{
		$member_id = base64_decode($this->input->get("member_id"));
		$this->load->view('template/header');
		$data["member"] = $this->process_model->get_member($member_id);
		$this->load->view('member/edit_member', $data);
		$this->load->view('template/footer');
	}


}
