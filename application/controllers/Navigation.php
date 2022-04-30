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
		$this->load->view('template/footer');
	}


}
