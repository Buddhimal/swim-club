<?php

class DateHelper
{
	public static function now()
	{
		return date("Y-m-d H:i:s");
	}

	public static function utc_date($date = '')
	{
		$date = date('Y-m-d H:i:s');

		$minutes_to_add = 330;
		$date = new DateTime($date);
		$date->add(new DateInterval('PT' . $minutes_to_add . 'M'));
		return $date->format('Y-m-d');
	}

	public static function format_date($date = '', $format = 'Y-m-d')
	{
		if (!$date)
			return '-';

		$date = new DateTime($date);
		return $date->format($format);
	}

	public static function slk_date($date = '')
	{
		$date = date('Y-m-d H:i:s');

		$minutes_to_add = 330;
		$date = new DateTime($date);
		$date->add(new DateInterval('PT' . $minutes_to_add . 'M'));
		return $date->format('Y-m-d');
	}

	public static function utc_datetime($date = '')
	{
		$date = date('Y-m-d H:i:s');

		$minutes_to_add = 330;
		$date = new DateTime($date);
		$date->add(new DateInterval('PT' . $minutes_to_add . 'M'));
		return $date->format('Y-m-d H:i:s');
	}

	public static function utc_time($date = '')
	{
		$date = date('Y-m-d H:i:s');

		$minutes_to_add = 330;
		$date = new DateTime($date);
		$date->add(new DateInterval('PT' . $minutes_to_add . 'M'));
		return $date->format('H:i:s');
	}

	public static function utc_day($date = '')
	{
		$date = date('Y-m-d H:i:s');
		$minutes_to_add = 330;
		$date = new DateTime($date);
		$date->add(new DateInterval('PT' . $minutes_to_add . 'M'));
		$date = $date->format('Y-m-d H:i:s');
		return date('N', strtotime($date));
	}

	public static function is_time_diff($time1, $time2)
	{
		$time1 = new DateTime($time1);
		$time2 = new DateTime($time2);
		return ($time1 > $time2);
//        return  $time1->diff($time2);
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
	public static function get_status_badge($status_id){

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

		return '<span class="badge ' . $data["badge"] . ' badge-pill ">' .$data["status"]. '</span>';
	}

	public static function get_active_badge($status_id){

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

		return '<span class="badge ' . $data["badge"] . ' badge-pill ">' .$data["status"]. '</span>';
	}

	public static function get_multiple_status_badge($status_id){

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

		return '<span class="badge ' . $data["badge"] . '  ">' .$data["status"]. '</span>';
	}
}
