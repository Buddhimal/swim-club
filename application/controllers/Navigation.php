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
		$user_group_id = $this->session->userdata('user_group_id');
		if ($user_group_id == UserRole::Swimmer) {
			$member_id = $this->session->userdata('member_id');
			redirect('member/edit/detail?member_id=' . base64_encode($member_id));
		} elseif ($user_group_id != UserRole::Admin) {
			redirect('members');
		}
		$this->load->view('template/header');
		$data["member_list"] = $this->process_model->get_new_members();
		$this->load->view('member/new_member_list', $data);
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

	public function edit_member_detail()
	{
		$member_id = base64_decode($this->input->get("member_id"));
		$this->load->view('template/header');
		$data["member"] = $this->process_model->get_member($member_id);
		$data["parents"] = $this->process_model->select_where('members', array('role' => 2, 'is_verified' => 1));
		$data["coaches"] = $this->process_model->select_where('members', array('role' => 3, 'is_verified' => 1));
		$this->load->view('member/edit_member_detail', $data);
		$this->load->view('template/footer');
	}

	public function member_list()
	{
		$this->load->view('template/header');
		$user_group_id = $this->session->userdata('user_group_id');
		$member_id = $this->session->userdata('member_id');
		if ($user_group_id == UserRole::Parent) {
			$data["member_list"] = $this->process_model->select_where('members', array('parent_id' => $member_id));
		} elseif ($user_group_id == UserRole::Coach) {
			$data["member_list"] = $this->process_model->select_where('members', array('coach_id' => $member_id));
		} else {
			$data["member_list"] = $this->process_model->select_all('members');
		}
		$this->load->view('member/member_list', $data);
		$this->load->view('template/footer');
	}

	public function add_performance()
	{
		$this->load->view('template/header');
		$this->load->view('member/add_performance');
		$this->load->view('template/footer');
	}

	public function performance_list()
	{
		$this->load->view('template/header');
		$performance_details = $this->process_model->get_member_performance();
		$data["performance_details"] = $performance_details;
		$this->load->view('member/member_performance_list', $data);
		$this->load->view('template/footer');
	}

	public function add_race()
	{
		$this->load->view('template/header');
		$this->load->view('member/add_race');
		$this->load->view('template/footer');
	}

	public function races()
	{
		$this->load->view('template/header');
		$data["race_list"] = $this->process_model->select_all('race');
		$this->load->view('member/race_list', $data);
		$this->load->view('template/footer');
	}

	public function add_race_performance()
	{
		$this->load->view('template/header');
		$data["swimmers"] = $this->process_model->select_where('members', array('role' => UserRole::Swimmer));
		$this->load->view('member/add_race_performance', $data);
		$this->load->view('template/footer');
	}

	public function view_race_performance()
	{
		$this->load->view('template/header');
		$data["performance"] = $this->process_model->get_race_performance();
		$this->load->view('member/race_performance_list', $data);
		$this->load->view('template/footer');
	}

	public function performance()
	{
		$member_id = base64_decode($this->input->get('member_id'));
		$this->load->view('template/header');
		$member_details = $this->process_model->select_where('members', array('id' => $member_id));
		$performance_details = $this->process_model->select_where('Performance', array('member_id' => $member_id));
		$data["member_details"] = $member_details;
		$data["performance_details"] = $performance_details;
		$this->load->view('member/performance_list', $data);
		$this->load->view('template/footer');
	}

}
