<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('model_log');
	}

	public function index()
	{
		$data['judul'] = 'Manajemen Menu';
		$data['user'] = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $data['user'];
		$data['profil']['nama'] = 'administrator';
		$data['profil']['gambar'] = 'default.jpg';

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$data['id_akses'] = $this->session->userdata('id_user');
		$data['prodi']=$this->model_log->prodi($data['id_akses']);
		$data['fakultas']=$this->model_log->fakultas($data['id_akses']);

		if ($this->form_validation->run() == false) {

					$this->load->view("admin/layout/header_admin");
					$this->load->view("admin/layout/sidebar",$data);
					$this->load->view("admin/layout/topbar_admin");
					$this->load->view("menu/index",$data);
					$this->load->view("admin/layout/footer_admin");
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('pesan', 'Menu baru berhasil ditambahkan');
			redirect('menu');
		}
	}

	public function delete($id)
	{

		if ($this->db->delete('user_menu', array('id' => $id))) {
			$this->db->delete('user_menu', array('id' => $id));
			$this->session->set_flashdata('pesan', 'Menu berhasil dihapus');
		} else {
			$this->session->set_flashdata('pesan', 'Menu gagal dihapus');
		}

		redirect('menu');
	}

	public function update($id)
	{
		$data = array(
			'menu' => $this->input->post('menu')
		);

		$this->db->where('id', $id);
		$this->db->update('user_menu', $data);
		$this->session->set_flashdata('pesan', 'Edit Data Menu berhasil');
		redirect('menu');
	}

	public function submenu()
	{
		$data['judul'] = 'Manajemen Submenu';
		$data['user'] = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $data['user'];
		$data['profil']['nama'] = 'administrator';
		$data['profil']['gambar'] = 'default.jpg';
		$data['id_akses'] = $this->session->userdata('id_user');
		$data['prodi']=$this->model_log->prodi($data['id_akses']);
		$data['fakultas']=$this->model_log->fakultas($data['id_akses']);

		$this->load->model('Menu_model', 'menu');

		$this->db->from('user_sub_menu');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['base_url'] = 'http://localhost/Siami-UTM/menu/submenu';
		$config['per_page'] = 10;
		$this->pagination->initialize($config);

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['subMenu'] = $this->menu->getSubMenu($config['per_page'], $data['start']);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['level'] = $this->db->get('user_level')->result_array();

		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');

		if ($this->form_validation->run() == false) {
				$this->load->view("admin/layout/header_admin");
				$this->load->view("admin/layout/sidebar",$data);
				$this->load->view("admin/layout/topbar_admin");
				$this->load->view("menu/submenu",$data);
				$this->load->view("admin/layout/footer_admin");
		} else {
			// $dataac = [
			// 	'role_id' => $this->input->post('level'),
			// 	'menu_id' => $this->input->post('menu_id')
			// ];
			// $data['ac']= $this->db->get('user_access_menu')->result_array();
			// if ($dataac['role_id'] == $data['ac']['role_id']) {
			// 	$this->db->insert('user_access_menu', $dataac);
			// }
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('pesan', 'Sub-Menu baru berhasil ditambahkan');
			redirect('menu/submenu');
		}
	}

	public function deletesm($id)
	{
		$this->db->delete('user_sub_menu', array('id' => $id));
		$this->session->set_flashdata('pesan', 'Sub-Menu berhasil dihapus');
		redirect('menu/submenu');
	}

	public function updatesm($id)
	{
		$data = array(
			'title' => $this->input->post('titleU'),
			'menu_id' => $this->input->post('menu_idU'),
			'url' => $this->input->post('urlU'),
			'icon' => $this->input->post('iconU'),
			'is_active' => $this->input->post('is_activeU')
		);

		$this->db->where('id', $id);
		$this->db->update('user_sub_menu', $data);
		$this->session->set_flashdata('pesan', 'Edit Data Sub-Menu berhasil');
		redirect('menu/submenu');
	}
}
