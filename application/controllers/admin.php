<?php
class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') !=1){
			redirect('auth');
		}
		$this->load->model('model_log');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/dashboard");
		$this->load->view("admin/layout/footer_admin");
	}

	public function table_2a()
	{
		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['datatable_2a']=$this->model_log->datatable_2a()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/134table_2a",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function table_2b()
	{
		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/2table_2b",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function table_8a()
	{
		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/5table_8a",$data);
		$this->load->view("admin/layout/footer_admin");

	}
}
?>
