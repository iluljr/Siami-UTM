<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getUsers($limit, $start, $keyword = null, $user)
    {
        //administrator
        if ($user == 1) {
            if ($keyword !== null) {
                $query =
                    "
			SELECT u.id_user,  u.username, u.level, l.level as level FROM akun u, user_level l WHERE u.level = l.id and (u.username LIKE '%$keyword%' OR l.level LIKE '%$keyword%') limit $start, $limit
		";
            } else {
                $query =
                    "
			SELECT u.id_user,  u.username, u.level, l.level as level FROM akun u, user_level l WHERE u.level = l.id limit $start, $limit
		";
            }
        }
        //admin prodi
        if (($user == 2)) {
            if ($keyword !== null) {
                $query =
                    "
			SELECT u.id_user,  u.username, u.level, l.level as level FROM akun u, user_level l WHERE u.level = l.id AND u.level != '1' AND u.level != '2' and (u.username LIKE '%$keyword%' OR l.level LIKE '%$keyword%') limit $start, $limit
		";
            } else {
                $query =
                    "
			SELECT u.id_user,  u.username, u.level, l.level as level FROM akun u, user_level l WHERE u.level != '1' AND u.level != '2' AND u.level = l.id limit $start, $limit
		";
            }
        }
        return $this->db->query($query, $limit, $start, $keyword)->result_array();
    }
    public function get_akun($id = null)
    {
      if ($id !== null) {
        $query = "
        SELECT a.id_user, a.username, l.level FROM akun a, user_level l WHERE a.level=l.id AND a.id_user = $id
        ";
      } else {
        $query = "
        SELECT a.id_user, a.username, l.level FROM akun a, user_level l WHERE a.level=l.id
        ";
      }

      return $this->db->query($query)->result_array();
    }
}
