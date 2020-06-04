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
		$data['judul'] = 'Data Audit';


		$data['view_table2a_jumlahmhs'] = $this->model_admin->gettable2b_jumlahmhs();

		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("admin/layout/footer_admin");
	}

	//table 2a
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
		$data['judul'] = 'Table 2.a';

		$data['dropdown']=$this->model_log->dropdown()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
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
			'id_prodi' => 1,
		 	'daya_tampung' => $dayatampung,
		 	'pendaftar' => $pendaftar,
		 	'lulus_seleksi' => $lulusseleksi,
		 	'jmb_reguler' => $regulerb,
		 	'jmb_transfer' => $regulerb,
		 	'jma_reguler' => $regulera,
		 	'jma_transfer' => $transfera,
			'jma_penuh' => 0,
			'jma_paruh' => 0,
		 );
		 $this->db->insert('tabel_2a',$data);
		 redirect('admin/table_2a');
	}
	public function edit_tabel2a($id)
	{
		$where = array('id_tabel2a' => $id );
		$data['tabel_2a'] = $this->model_admin->edit_data($where,'tabel_2a')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
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

	//table 2b
	public function table_2b()
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


		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$data['view_table2a'] = $this->model_admin->gettable2b($data['id_tahun']);
		$data['view_table2a_min1'] = $this->model_admin->gettable2b_min1($data['id_tahun']);
		$data['view_table2a_min2'] = $this->model_admin->gettable2b_min2($data['id_tahun']);
		$data['tahunsekarang_2b']=$this->model_admin->tahunsekarang_2b($data['id_tahun']);
		$data['view_table2a_jumlahmhs'] = $this->model_admin->gettable2b_jumlahmhs($data['id_tahun']);
		$data['judul'] = 'Table 2.b';

		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/2table_2b",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function edit_tabel2b($tahun)
	{
		$where = array('tahun' => $tahun );
		$data['tabel_2a'] = $this->model_admin->edit_data($where,'tabel_2a')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel2b', $data);
		$this->load->view("admin/layout/footer_admin");
	}

	public function update_tabel2b()
	{
		$tahun = $this->input->post('tahun');
		$jma_reguler = $this->input->post('jma_reguler');
		$jma_penuh = $this->input->post('jma_penuh');
		$jma_paruh = $this->input->post('jma_paruh');
		$data = array(
		 	'jma_reguler' => $jma_reguler,
		 	'jma_penuh' => $jma_penuh,
		 	'jma_paruh' => $jma_paruh,
		);

		$where = array('tahun' => $tahun);
		$this->model_admin->update_data($where,$data,'tabel_2a');
		redirect('admin/table_2b');
	}

	//table 8a
	public function table_8a()
	{
		$this->session->unset_userdata('id_tahun');
		$this->session->unset_userdata('id_prodi');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$data['id_prodi'] = $this->input->post('id_prodi');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
			$this->session->set_userdata('id_prodi', $data['id_prodi']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
			$data['id_prodi'] = $this->session->userdata('id_prodi');
		}

		$data['view_table8a'] = $this->model_admin->gettable8a($data['id_tahun'],$data['id_prodi']);
		$data['tahunsekarang_2b']=$this->model_admin->tahunsekarang_2b($data['id_tahun']);
		$data['table8a_rata']=$this->model_admin->table8a_rata($data['id_tahun'],$data['id_prodi']);
		$data['judul'] = 'Table 8.a';

		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/5table_8a",$data);
		$this->load->view("admin/layout/footer_admin");

	}
	public function tambah_data8a()
	{

		 $tahun_lulus = $this->input->post('tahun_lulus');
		 $id_prodi = $this->input->post('id_prodi');
		 $jml_lulus = $this->input->post('jml_lulusan');
		 $ipk_min = $this->input->post('ipk_min');
		 $ipk_rata = $this->input->post('ipk_rata');
		 $ipk_max = $this->input->post('ipk_max');

		 $data = array(
		 	'tahun_lulus' => $tahun_lulus,
		 	'id_prodi' => $id_prodi,
		 	'jumlah_lulusan' => $jml_lulus,
		 	'ipk_min' => $ipk_min,
		 	'ipk_rata' => $ipk_rata,
		 	'ipk_max' => $ipk_max,
		 );
		 $this->db->insert('tabel_8a',$data);
		 redirect('admin/table_8a');
	}
	public function hapus_tabel8a($id)
	{
		$where = array('id_tabel8a' => $id);
		$this->model_admin->hapus_data($where,'tabel_8a');
		redirect('admin/table_8a');
	}

	public function edit_tabel8a($id)
	{
		$where = array('id_tabel8a' => $id );
		$data['tabel_8a'] = $this->model_admin->edit_data($where,'tabel_8a')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel8a', $data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function update_tabel8a()
	{
		$id = $this->input->post('id_tabel8a');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$jumlah_lulusan = $this->input->post('jumlah_lulusan');
		$ipk_min = $this->input->post('ipk_min');
		$ipk_rata = $this->input->post('ipk_rata');
		$ipk_max = $this->input->post('ipk_max');
		$data = array(
			'tahun_lulus' => $tahun_lulus,
		 	'jumlah_lulusan' => $jumlah_lulusan,
		 	'ipk_min' => $ipk_min,
		 	'ipk_rata' => $ipk_rata,
		 	'ipk_max' => $ipk_max,
		);

		$where = array('id_tabel8a' => $id);
		$this->model_admin->update_data($where,$data,'tabel_8a');
		redirect('admin/table_8a');
	}

	//table 8b
	public function table_8b()
	{
		$this->session->unset_userdata('id_tahun');
		$this->session->unset_userdata('id_prodi');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$data['id_prodi'] = $this->input->post('id_prodi');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
			$this->session->set_userdata('id_prodi', $data['id_prodi']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
			$data['id_prodi'] = $this->session->userdata('id_prodi');
		}

		$data['view_table8b'] = $this->model_admin->gettable8b($data['id_tahun'],$data['id_prodi']);
		$data['view_table8b_jumlah_NI'] = $this->model_admin->gettable8b_jumlah_NI($data['id_tahun'],$data['id_prodi']);
		$data['view_table8b_jumlah_NN'] = $this->model_admin->gettable8b_jumlah_NN($data['id_tahun'],$data['id_prodi']);
		$data['view_table8b_jumlah_NW'] = $this->model_admin->gettable8b_jumlah_NW($data['id_tahun'],$data['id_prodi']);

		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['tingkat']=$this->model_log->tingkat()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$data['judul'] = 'Table 8.b';
		$data['jumlah_data_MA'] = $this->model_admin->datatable_2a_MA();

		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/5table_8b",$data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function tambah_data8b()
	{

		 $nama_kegiatan = $this->input->post('nama_kegiatan');
		 $waktu_perolehan = $this->input->post('waktu_perolehan');
		 $id_prodi = $this->input->post('id_prodi');
		 $id_tingkat = $this->input->post('id_tingkat');
		 $prestasi = $this->input->post('prestasi');

		 $data = array(
		 	'nama_kegiatan' => $nama_kegiatan,
		 	'waktu_perolehan' => $waktu_perolehan,
		 	'id_prodi' => $id_prodi,
		 	'id_tingkat' => $id_tingkat,
		 	'prestasi' => $prestasi,
		 );
		 $this->db->insert('tabel_8b',$data);
		 redirect('admin/table_8b');
	}

	public function edit_tabel8b($id)
	{
		$where = array('id_tabel8b' => $id );
		$data['tabel_8b'] = $this->model_admin->edit_data($where,'tabel_8b')->result();
		$data['tingkat']=$this->model_log->tingkat()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel8b', $data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function update_tabel8b()
	{
		$id = $this->input->post('id_tabel8b');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$waktu_perolehan = $this->input->post('waktu_perolehan');
		$id_tingkat = $this->input->post('id_tingkat');
		$prestasi = $this->input->post('prestasi');
		$data = array(
			'nama_kegiatan' => $nama_kegiatan,
			'waktu_perolehan' => $waktu_perolehan,
			'id_tingkat' => $id_tingkat,
			'prestasi' => $prestasi,
		);

		$where = array('id_tabel8b' => $id);
		$this->model_admin->update_data($where,$data,'tabel_8b');
		redirect('admin/table_8b');
	}

	//table 8c
	public function table_8c()
	{
		$this->session->unset_userdata('id_tahun');
		$this->session->unset_userdata('id_prodi');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$data['id_prodi'] = $this->input->post('id_prodi');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
			$this->session->set_userdata('id_prodi', $data['id_prodi']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
			$data['id_prodi'] = $this->session->userdata('id_prodi');
		}

		$data['view_table8c'] = $this->model_admin->gettable8c($data['id_tahun'],$data['id_prodi']);
		$data['view_table8c_jml'] = $this->model_admin->gettable8c_jml_rata($data['id_tahun'],$data['id_prodi']);
		$data['view_table8c_jml_ts3'] = $this->model_admin->gettable8c_jml_ts3($data['id_tahun'],$data['id_prodi']);

		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$data['judul'] = 'Table 8.c';

		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/7table_8c",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	//table 8d1
	public function table_8d1()
	{
		$this->session->unset_userdata('id_tahun');
		$this->session->unset_userdata('id_prodi');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$data['id_prodi'] = $this->input->post('id_prodi');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
			$this->session->set_userdata('id_prodi', $data['id_prodi']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
			$data['id_prodi'] = $this->session->userdata('id_prodi');
		}

		$data['view_table8d1'] = $this->model_admin->gettable8d1($data['id_tahun'],$data['id_prodi']);
		$data['jumlah_data'] = $this->model_admin->datatable_8d1($data['id_tahun'],$data['id_prodi']);
		$data['judul'] = 'Table 8.d.1';

		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/10table_8d1",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function hapus_table8d1($id)
	{
		$where = array('id_table8d1' => $id);
		$this->model_admin->hapus_data($where,'table_8d1');
		redirect('admin/table_8d1');
	}

	public function edit_table8d1($id)
	{
		$where = array('id_table8d1' => $id );
		$data['table_8d1'] = $this->model_admin->edit_data($where,'table_8d1')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel8d1', $data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function update_table8d1()
	{
		$id = $this->input->post('id_table8d1');
		$tahun = $this->input->post('tahun');
		$jml_lulus = $this->input->post('jml_lulus');
		$jml_lulus_ter = $this->input->post('jml_lulus_ter');
		$wt_6 = $this->input->post('wt_6');
		$wt_18 = $this->input->post('wt_18');
		$wt_lebih = $this->input->post('wt_lebih');
		$data = array(
			'tahun' => $tahun,
		 	'jml_lulus' => $jml_lulus,
			'jml_lulus_ter' => $jml_lulus_ter,
		 	'wt_6' => $wt_6,
		 	'wt_18' => $wt_18,
		 	'wt_lebih' => $wt_lebih,
		);

		$where = array('id_table8d1' => $id);
		$this->model_admin->update_data($where,$data,'table_8d1');
		redirect('admin/table_8d1');
	}

	public function tambah_data8d1()
	{

		 $tahun = $this->input->post('tahun');
		 $id_prodi = $this->input->post('id_prodi');
		 $jml_lulus = $this->input->post('jml_lulusan');
		 $jml_lulus_ter = $this->input->post('jml_terlacak');
		 $wt_6 = $this->input->post('wt_6');
		 $wt_18 = $this->input->post('wt_18');
		 $wt_lebih = $this->input->post('wt_lebih');

		 $data = array(
		 	'tahun' => $tahun,
		 	'id_prodi' => $id_prodi,
		 	'jml_lulus' => $jml_lulus,
		 	'jml_lulus_ter' => $jml_lulus_ter,
		 	'wt_6' => $wt_6,
		 	'wt_18' => $wt_18,
		 	'wt_lebih' => $wt_lebih,
		 );
		 $this->db->insert('table_8d1',$data);
		 redirect('admin/table_8d1');
	}

	//table 8d2
	public function table_8d2()
	{
		$this->session->unset_userdata('id_tahun');
		$this->session->unset_userdata('id_prodi');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$data['id_prodi'] = $this->input->post('id_prodi');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
			$this->session->set_userdata('id_prodi', $data['id_prodi']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
			$data['id_prodi'] = $this->session->userdata('id_prodi');
		}

		$data['view_table8d2'] = $this->model_admin->gettable8d2($data['id_tahun'],$data['id_prodi']);
		$data['jumlah_data'] = $this->model_admin->datatable_8d2($data['id_tahun'],$data['id_prodi']);
		$data['judul'] = 'Table 8.d.2';

		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/11table_8d2",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function tambah_data8d2()
	{

		 $tahun = $this->input->post('tahun');
		 $id_prodi = $this->input->post('id_prodi');
		 $jml_lulus = $this->input->post('jml_lulusan');
		 $jml_lulus_ter = $this->input->post('jml_terlacak');
		 $rendah = $this->input->post('rendah');
		 $sedang = $this->input->post('sedang');
		 $tinggi = $this->input->post('tinggi');

		 $data = array(
		 	'tahun' => $tahun,
		 	'id_prodi' => $id_prodi,
		 	'jml_lulus' => $jml_lulus,
		 	'jml_lulus_ter' => $jml_lulus_ter,
		 	'rendah' => $rendah,
		 	'sedang' => $sedang,
		 	'tinggi' => $tinggi,
		 );
		 $this->db->insert('table_8d1',$data);
		 redirect('admin/table_8d1');
	}

	public function hapus_table8d2($id)
	{
		$where = array('id_table8d1' => $id);
		$this->model_admin->hapus_data($where,'table_8d1');
		redirect('admin/table_8d2');
	}

	public function edit_table8d2($id)
	{
		$where = array('id_table8d1' => $id );
		$data['table_8d1'] = $this->model_admin->edit_data($where,'table_8d1')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel8d2', $data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function update_table8d2()
	{
		$id = $this->input->post('id_table8d1');
		$tahun = $this->input->post('tahun');
		$jml_lulus = $this->input->post('jml_lulus');
		$jml_lulus_ter = $this->input->post('jml_lulus_ter');
		$rendah = $this->input->post('rendah');
		$sedang = $this->input->post('sedang');
		$tinggi = $this->input->post('tinggi');
		$data = array(
			'tahun' => $tahun,
			'jml_lulus' => $jml_lulus,
			'jml_lulus_ter' => $jml_lulus_ter,
			'rendah' => $rendah,
			'sedang' => $sedang,
			'tinggi' => $tinggi,
		);

		$where = array('id_table8d1' => $id);
		$this->model_admin->update_data($where,$data,'table_8d1');
		redirect('admin/table_8d2');
	}

	//table 8e1
	public function table_8e1()
	{
		$this->session->unset_userdata('id_tahun');
		$this->session->unset_userdata('id_prodi');
		if ($this->input->post('submit')) {
			$data['id_tahun'] = $this->input->post('id_tahun');
			$data['id_prodi'] = $this->input->post('id_prodi');
			$this->session->set_userdata('id_tahun', $data['id_tahun']);
			$this->session->set_userdata('id_prodi', $data['id_prodi']);
		} else {
			$data['id_tahun'] = $this->session->userdata('id_tahun');
			$data['id_prodi'] = $this->session->userdata('id_prodi');
		}

		$data['view_table8e1'] = $this->model_admin->gettable8e1($data['id_tahun'],$data['id_prodi']);
		$data['jumlah_data'] = $this->model_admin->datatable_8e1($data['id_tahun'],$data['id_prodi']);
		$data['judul'] = 'Table 8.e.1';

		$data['dropdown']=$this->model_log->dropdown()->result();
		$data['prodi']=$this->model_log->prodi()->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view("admin/12table_8e1",$data);
		$this->load->view("admin/layout/footer_admin");

	}

	public function tambah_data8e1()
	{

		 $tahun = $this->input->post('tahun');
		 $id_prodi = $this->input->post('id_prodi');
		 $jml_lulus = $this->input->post('jml_lulusan');
		 $jml_lulus_ter = $this->input->post('jml_terlacak');
		 $jml_berwirausaha = $this->input->post('jml_berwirausaha');
		 $lokal = $this->input->post('lokal');
		 $nasional = $this->input->post('nasional');
		 $internasional = $this->input->post('internasional');

		 $data = array(
		 	'tahun' => $tahun,
		 	'id_prodi' => $id_prodi,
		 	'jml_lulus' => $jml_lulus,
		 	'jml_lulus_ter' => $jml_lulus_ter,
		 	'berwirausaha' => $jml_berwirausaha,
		 	'lokal' => $lokal,
		 	'nasional' => $nasional,
		 	'internasional' => $internasional,
		 );
		 $this->db->insert('table_8d1',$data);
		 redirect('admin/table_8d1');
	}

	public function hapus_table8e1($id)
	{
		$where = array('id_table8d1' => $id);
		$this->model_admin->hapus_data($where,'table_8d1');
		redirect('admin/table_8e1');
	}

	public function edit_table8e1($id)
	{
		$where = array('id_table8d1' => $id );
		$data['table_8d1'] = $this->model_admin->edit_data($where,'table_8d1')->result();
		$this->load->view("admin/layout/header_admin");
		$this->load->view("admin/layout/sidebar",$data);
		$this->load->view("admin/layout/topbar_admin");
		$this->load->view('admin/edit_tabel8e1', $data);
		$this->load->view("admin/layout/footer_admin");
	}
	public function update_table8e1()
	{
		$id = $this->input->post('id_table8d1');
		$tahun = $this->input->post('tahun');
		$jml_lulus = $this->input->post('jml_lulus');
		$jml_lulus_ter = $this->input->post('jml_lulus_ter');
		$berwirausaha = $this->input->post('berwirausaha');
		$lokal = $this->input->post('lokal');
		$nasional = $this->input->post('nasional');
		$internasional = $this->input->post('internasional');
		$data = array(
			'tahun' => $tahun,
			'jml_lulus' => $jml_lulus,
			'jml_lulus_ter' => $jml_lulus_ter,
			'berwirausaha' => $berwirausaha,
			'lokal' => $lokal,
			'nasional' => $nasional,
			'internasional' => $internasional,
		);

		$where = array('id_table8d1' => $id);
		$this->model_admin->update_data($where,$data,'table_8d1');
		redirect('admin/table_8e1');
	}
}
?>
