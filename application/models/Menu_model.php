<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu($start, $limit)
	{
		$query =
			"
			SELECT user_sub_menu.*, user_menu.menu
	FROM user_sub_menu JOIN user_menu
	ON user_sub_menu.menu_id = user_menu.id limit $limit, $start
		";

		return $this->db->query($query, $start, $limit)->result_array();
	}
	public function getUserLevel($value='')
	{
		// code...
	}
}
