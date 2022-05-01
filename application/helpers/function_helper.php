<?php

class FunctionHelper
{

	public static function get_role_name($role)
	{
		if ($role == 1)
			return "Admin";
		if ($role == 2)
			return "Parent";
		if ($role == 3)
			return "Coach";
		if ($role == 4)
			return "Swimmer";
	}
}

class DatabaseFunction
{ //only for testing

	public static function last_query()
	{
		$CI =& get_instance();
		echo($CI->db->last_query());
		die();
	}
}

class StatusHelper
{
	public static function get_status_badge($status_id)
	{

		$data["status"] = "";
		$data["badge"] = "";

		switch ($status_id) {
			case 0:
				$data["status"] = "Unverified";
				$data["badge"] = "bg-soft-danger text-danger";
				break;
			case 1:
				$data["status"] = "Verified";
				$data["badge"] = "bg-soft-success text-success";
				break;
		}

		return '<span class="badge ' . $data["badge"] . ' badge-pill ">' . $data["status"] . '</span>';
	}

	public static function get_active_badge($status_id)
	{

		$data["status"] = "";
		$data["badge"] = "";

		switch ($status_id) {
			case 0:
				$data["status"] = "In-Active";
				$data["badge"] = "bg-soft-danger text-danger";
				break;
			case 1:
				$data["status"] = "Active";
				$data["badge"] = "bg-soft-success text-success";
				break;
		}

		return '<span class="badge ' . $data["badge"] . ' badge-pill ">' . $data["status"] . '</span>';
	}

	public static function get_multiple_status_badge($status_id)
	{

		$data["status"] = "";
		$data["badge"] = "";

		switch ($status_id) {
			case 0:
				$data["status"] = "Pending";
				$data["badge"] = "badge-warning";
				break;
			case 1:
				$data["status"] = "Approved";
				$data["badge"] = "badge-success";
				break;
			case 2:
				$data["status"] = "Rejected";
				$data["badge"] = "badge-danger";
				break;
		}

		return '<span class="badge ' . $data["badge"] . '  ">' . $data["status"] . '</span>';
	}
}
