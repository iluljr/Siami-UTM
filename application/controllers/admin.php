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
		$this->session->unset_userdata('id_tahun');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
		}

		$config['total_rows'] = $this->model_log->HitungSearch($data['id_tahun']);
		$data['total_rows'] = $config['total_rows'];

		$config['per_page'] = 5;

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['view_table2a'] = $this->model_log->gettable2a($config['per_page'], $data['start'],$data['id_tahun']);
		$data['jumlah_data'] = $this->model_log->datatable_2a($data['id_tahun']);

		$data['dropdown']=$this->model_log->dropdown()->result();
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
