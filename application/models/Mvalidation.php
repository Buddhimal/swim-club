<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mvalidation extends CI_Model
{

	public $validation_errors = array();

	function __construct()
	{
		parent::__construct();
	}

	public function is_valid($data)
	{
		$result = true;

		if (!(isset($data['first_name']) && $data['first_name'] != NULL && $data['first_name'] != '' && $this->name($data['first_name']))) {
			array_push($this->validation_errors, 'Invalid First Name.');
			$result = false;
		} else if (!(strlen($data['first_name']) <= 50)) {
			array_push($this->validation_errors, 'First Name is too long.');
			$result = false;
		}
		if (!(isset($data['last_name']) && $data['last_name'] != NULL && $data['last_name'] != '' && $this->name($data['first_name']))) {
			array_push($this->validation_errors, 'Invalid Last Name.');
			$result = false;
		} else if (!(strlen($data['last_name']) <= 50)) {
			array_push($this->validation_errors, 'Last Name is too long.');
			$result = false;
		}

		if (!(isset($data['email']) && $this->email($data['email']))) {
			array_push($this->validation_errors, 'Invalid Email.');
			$result = false;
		} elseif ($this->mvalidation->already_exists('sys_user', 'email', $data['email']) == TRUE) {
			array_push($this->validation_errors, 'Email already registered.');
			$result = false;
		}

		if (!(isset($data['tp']) && $this->telephone($data['tp']))) {
			array_push($this->validation_errors, 'Invalid Telephone.');
			$result = false;
		}

		return array("success" => $result, "data" => $this->validation_errors);
	}

	function email($email = '')
	{
		return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email) === 1;
	}

	function name($name = '')
	{
		return preg_match("/^[a-zA-z]*$/", $name) === 1;
	}

	function telephone($tp = '')
	{
		$length = strlen($tp);
		return ($length == 10);
	}

	function already_exists($table, $column, $value)
	{
		$this->db->select($column);
		$this->db->from($table);
		$this->db->where($column, $value);
//		$this->db->where('is_active', 1);
//		$this->db->where('is_deleted', 0);
		$result = $this->db->get();
		return ($result->num_rows() > 0);
	}

	function valid_date($date)
	{
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function valid_day($day)
	{
		if (preg_match("/^[1-7]{1}+$/", $day)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function valid_password($password)
	{
		if (preg_match("/^(?=.*\d).{6,20}$/", $password)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


}
