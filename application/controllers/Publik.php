<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publik extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Portal SIAMI UTM 4.0';

		$this->load->view('template/template/header_public', $data);
		$this->load->view('template/template/topbar_public', $data);
		$this->load->view('Public/index', $data);
		$this->load->view('template/template/footer_public');
	}
}
