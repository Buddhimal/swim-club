<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Created by PhpStorm.
 * User: Buddhimal Gunasekara
 * Date: 9/25/2019
 * Time: 10:20 PM
 */
class Process_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function query($query)
	{
		return $this->db->query($query);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function select_all($table)
	{
		$res = $this->db->select('*')->from($table)->get();
		return $res;
	}

	public function select_where($table, $where)
	{
		$res = $this->db->select('*')->from($table)->where($where)->get();
		return $res;
	}

	public function delete_where($table, $column, $value)
	{
		$this->db->where($column, $value);
		$this->db->delete($table);
	}

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);

		return true;
	}

	public function get_new_members()
	{
		return $this->db
			->select('*')
			->from("members")
			->where('is_verified', false)
			->get();
	}

	public function get_member($id)
	{
		return $this->db
			->select('*')
			->from("members")
			->where('id', $id)
			->get()->row();
	}

	public function update_member($customer_data, $member_id)
	{
		$this->db
			->set($customer_data)
			->where('id', $member_id)
			->update('members');

		return true;
	}

	public function verify_member($member_id)
	{
		$this->db
			->set('is_verified', 1)
			->where('id', $member_id)
			->update('members');

		$this->db
			->set('is_verified', 1)
			->where('member_id', $member_id)
			->update('sys_user');

		return true;
	}

	public function get_member_performance(){
		return $this->db->query('SELECT
							p.record_type,
							p.swimming_type,
							p.date,
							p.duration,
							CONCAT(m.first_name," ", m.last_name) as member_name,
							m.coach_id,
							CONCAT(c.first_name," ", c.last_name) as coach_name
						FROM
							performance AS p
							INNER JOIN members AS m ON p.member_id = m.id
							LEFT JOIN members AS c ON m.coach_id = c.id'
		);
	}


}
