<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('Process_model');
		$this->load->model('mvalidation');
		$this->load->model('user/muser');

		if (is_login() == '') {
			redirect(site_url() . 'login');
		}
	}

	public function json_formatter($status, $data, $msg)
	{
		$array_sending = array(
			'status' => $status,
			'data' => $data,
			'msg' => $msg
		);
		echo json_encode($array_sending);
	}

	private function set_flash_data($msg, $alert_type = "alert-success")
	{
		$this->session->set_flashdata('msg', $msg);
		$this->session->set_flashdata('alert_type', $alert_type);
	}

	public function update_member()
	{
		$member_id = $this->input->post('member_id');

		$result = $this->mvalidation->is_valid($this->input->post(), true);
		if ($result["success"]) {
			$post_data = $this->input->post();
			unset($post_data['member_id']);
			$post_data["updated_at"] = date("Y-m-d H:i:s");

			$customer_data = $post_data;

			if ($this->Process_model->update_member($customer_data, base64_decode($member_id))) {
				redirect('/');
			}

		} else {

			$this->session->set_flashdata("errors", $result["data"]);
			redirect('member/edit?member_id=' . $member_id);
		}
	}

	public function verify_member()
	{
		$member_id = $this->input->get('member_id');
		$member_id = base64_decode($member_id);
		$this->Process_model->verify_member($member_id);
		redirect('/');
	}

	public function save_performance()
	{
		$post = $this->input->post();
		$post["member_id"] = base64_decode($this->input->post('member_id'));

		if ($this->Process_model->insert('performance', $post)) {
			redirect('member/performance?member_id=' . base64_encode($post["member_id"]));
		}

	}

	public function save_race_performance()
	{
		$post = $this->input->post();
		$post["race_id"] = base64_decode($this->input->post('race_id'));

		if ($this->Process_model->insert('race_performance', $post)) {
			redirect('race/performance/add');
		}

	}

	public function save_race()
	{
		$post = $this->input->post();

		if ($this->Process_model->insert('race', $post)) {
			redirect('races');
		}

	}

}
