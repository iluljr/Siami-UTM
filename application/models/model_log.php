<?php
class model_log extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('');
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function ver($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query=$this->db->get('akun');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$sar= array('id_user' => $row->id_user,
					'username' => $row->username,
					'password' => $row->password,
					'level' => $row->level,
					'login' => 1);
			}
		$this->session->set_userdata($sar);
		$lvl=$this->session->userdata('level');
		if ($lvl == 1) {
			redirect('admin');
		}
		elseif($lvl == 2){
			redirect('prodi');
		}
		elseif($lvl == 3){
			redirect('user');
		}
		}
		else{
			redirect('auth');
		}
	}
	public function dropdown()
  {
  	$this->db->order_by('tahun', 'DESC');
    $query = $this->db->get('tabel_2a');
    return $query;
  }
	public function prodi($id)
  {
    $query = "
		SELECT prodi.id_prodi, prodi.nama_prodi
		FROM prodi JOIN user_access_data
		ON prodi.id_prodi = user_access_data.prodi
		WHERE user_access_data.akun = $id
		ORDER BY user_access_data.prodi ASC
		";
    return $this->db->query($query)->result_array();
  }
	public function tingkat()
  {
    $query = $this->db->get('tingkat_prestasi');
    return $query;
  }

	public function datatable_2a($id_tahun = null, $id_prodi = null)
  {
		if ($id_tahun !== null) {
				$query =
								"
			SELECT SUM(tb.pendaftar) AS 'pendaftar', SUM(tb.lulus_seleksi) AS 'lulus_seleksi', SUM(tb.jmb_reguler) AS 'jmb_reguler', SUM(tb.jmb_transfer) AS 'jmb_transfer'
			FROM tabel_2a tb WHERE tb.tahun <= $id_tahun and tb.tahun >= ($id_tahun-4) AND tb.id_prodi = $id_prodi
			";
		} else {
			$query =
							"
		SELECT SUM(tb.pendaftar) AS 'pendaftar', SUM(tb.lulus_seleksi) AS 'lulus_seleksi', SUM(tb.jmb_reguler) AS 'jmb_reguler', SUM(tb.jmb_transfer) AS 'jmb_transfer', SUM(tb.jma_reguler) AS 'jma_reguler', SUM(tb.jma_transfer) AS 'jma_transfer'
		FROM tabel_2a tb WHERE (tb.tahun <= (SELECT date_format(curdate(),'%Y')) and tb.tahun >= (SELECT date_format(curdate(),'%Y')-4))
		";
		}
		return $this->db->query($query)->result_array();
  }

	public function gettable2a($id_tahun = null, $id_prodi = null)
	 {
			 if ($id_tahun !== null) {

					 $query =
							 "
		 SELECT tb.id_tabel2a AS 'id_tabel2a', tb.tahun, tb.daya_tampung, tb.pendaftar, tb.lulus_seleksi, tb.jmb_reguler, tb.jmb_transfer, tb.jma_reguler, tb.jma_transfer
		 FROM tabel_2a tb WHERE tb.tahun <= $id_tahun and tb.tahun >= ($id_tahun-4) AND tb.id_prodi = $id_prodi ORDER BY tb.tahun
			 ";
			 } else {
					 $query =
							 "
		 SELECT  tb.id_tabel2a, tb.tahun, tb.daya_tampung, tb.pendaftar, tb.lulus_seleksi, tb.jmb_reguler, tb.jmb_transfer, tb.jma_reguler, tb.jma_transfer
		 FROM tabel_2a tb WHERE (tb.tahun <= (SELECT date_format(curdate(),'%Y')) and tb.tahun >= (SELECT date_format(curdate(),'%Y')-4)) ORDER BY tb.tahun
	 ";
			 }
			 return $this->db->query($query)->result_array();
	 }

	public function HitungSearch($id_tahun)
    {
        return $this->db
            ->SELECT('id_tahun', $id_tahun)
            ->from('tabel_2a')
            ->count_all_results();
    }
}
?>
