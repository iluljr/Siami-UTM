<?php

	function cek_login()
	{
		$oja = get_instance();
		if(!$oja->session->userdata('username')){
			redirect('auth');
		}
		else{
			$level_id = $oja->session->userdata('level');
			$menu = $oja->uri->segment(1);

			$queryMenu = $oja->db->get_where('user_menu', ['menu' => $menu])->row_array();
			$menu_id = $queryMenu['id'];

			$userAccess = $oja->db->get_where('user_access_menu', ['role_id' => $level_id, 'menu_id' => $menu_id]);

			if ($userAccess->num_rows() < 1) {
				redirect('auth/block');
			}
		}
	}

	function cek_akses($level_id, $menu_id)
	{
		$oja = get_instance();

		$oja->db->where('akun', $level_id);
		$oja->db->where('prodi', $menu_id);
		$hasil = $oja->db->get('user_access_data');

		if ($hasil->num_rows() > 0) {
			return 'checked="checked"';
		}
	}
