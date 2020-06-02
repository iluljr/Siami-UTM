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
		$this->load->model('model_admin');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['jumlah_data'] = $this->model_log->datatable_2a();
		$data['jumlah_data_MA'] = $this->model_admin->datatable_2a_MA();
		$data['jumlah_dosen'] = $this->model_admin->datatable_2a_Dosen();
		$data['jumlah_data_MB'] = $this->model_admin->datatable_2a_MB();

		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/dashboard",$data);
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
			if($data['id_tahun'] > 2019) {
				$nn = $data['id_tahun'] -  2019 ;
				$data['start'] = $nn;
			} else{
				$data['start'] = 0;
			}
		}

		$data['view_table2a'] = $this->model_log->gettable2a($data['id_tahun']);
		$data['jumlah_data'] = $this->model_log->datatable_2a($data['id_tahun']);
		$data['jumlah_data_MA'] = $this->model_admin->datatable_2a_MA($data['id_tahun']);
		$data['jumlah_dosen'] = $this->model_admin->datatable_2a_Dosen($data['id_tahun']);
		$data['jumlah_data_MB'] = $this->model_admin->datatable_2a_MB($data['id_tahun']);

		$data['dropdown']=$this->model_log->dropdown()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/134table_2a",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function tambah_data2a()
	{

		 $tahun = $this->input->post('tahun');
		 $dayatampung = $this->input->post('dayatampung');
		 $pendaftar = $this->input->post('pendaftar');
		 $lulusseleksi = $this->input->post('lulusseleksi');
		 $regulerb = $this->input->post('regulerb');
		 $transferb = $this->input->post('transferb');
		 $regulera = $this->input->post('regulera');
		 $transfera = $this->input->post('transfera');

		 $data = array(
		 	'tahun' => $tahun,
		 	'daya_tampung' => $dayatampung,
		 	'pendaftar' => $pendaftar,
		 	'lulus_seleksi' => $lulusseleksi,
		 	'jmb_reguler' => $regulerb,
		 	'jmb_transfer' => $regulerb,
		 	'jma_reguler' => $regulera,
		 	'jma_transfer' => $transfera,
		 );
		 $this->db->insert('tabel_2a',$data);
		 redirect('admin/table_2a');
	}
	public function edit_tabel2a($id)
	{
		$where = array('id_tabel2a' => $id );
		$data['tabel_2a'] = $this->model_admin->edit_data($where,'tabel_2a')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel2a', $data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function update_tabel2a()
	{
		$id = $this->input->post('id_tabel2a');
		$tahun = $this->input->post('tahun');
		$dayatampung = $this->input->post('dayatampung');
		$pendaftar = $this->input->post('pendaftar');
		$lulusseleksi = $this->input->post('lulusseleksi');
		$regulerb = $this->input->post('regulerb');
		$transferb = $this->input->post('transferb');
		$regulera = $this->input->post('regulera');
		$transfera = $this->input->post('transfera');
		$data = array(
			'tahun' => $tahun,
		 	'daya_tampung' => $dayatampung,
		 	'pendaftar' => $pendaftar,
		 	'lulus_seleksi' => $lulusseleksi,
		 	'jmb_reguler' => $regulerb,
		 	'jmb_transfer' => $transferb,
		 	'jma_reguler' => $regulera,
		 	'jma_transfer' => $transfera,
		);

		$where = array('id_tabel2a' => $id);
		$this->model_admin->update_data($where,$data,'tabel_2a');
		redirect('admin/table_2a');
	}
	public function hapus_tabel2a($id)
	{
		$where = array('id_tabel2a' => $id);
		$this->model_admin->hapus_data($where,'tabel_2a');
		redirect('admin/table_2a');
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

	public function table_8b()
	{
		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/5table_8b",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function table_8c()
	{
		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar_admin");
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/7table_8c",$data);
		$this->load->view("admin/layout/footer_admin");

	}
}
?>
