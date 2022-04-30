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

	public function save_patient()
	{
		$post_data = $this->input->post();
		$post_data["updated_by"] = $this->session->userdata('user_id');
		$post_data["updated_at"] = date("Y-m-d H:i:s");
		$post_data["created_at"] = date("Y-m-d H:i:s");

		if ($this->Process_model->insert('patients', $post_data)) {
			$this->set_flash_data("New Patient Created Successfully");
		} else {
			$this->set_flash_data("Failed to add new patient", "alert-danger");

		}

		redirect('patient');
	}



}
