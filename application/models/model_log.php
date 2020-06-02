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
				$sar= array('username' => $row->username,
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
	public function prodi()
  {
    $query = $this->db->get('prodi');
    return $query;
  }

	public function datatable_2a($id_tahun = null)
  {
		if ($id_tahun !== null) {
				$query =
								"
			SELECT SUM(tb.pendaftar) AS 'pendaftar', SUM(tb.lulus_seleksi) AS 'lulus_seleksi', SUM(tb.jmb_reguler) AS 'jmb_reguler', SUM(tb.jmb_transfer) AS 'jmb_transfer'
			FROM tabel_2a tb WHERE tb.tahun <= $id_tahun
			";
		} else {
			$query =
							"
		SELECT SUM(tb.pendaftar) AS 'pendaftar', SUM(tb.lulus_seleksi) AS 'lulus_seleksi', SUM(tb.jmb_reguler) AS 'jmb_reguler', SUM(tb.jmb_transfer) AS 'jmb_transfer', SUM(tb.jma_reguler) AS 'jma_reguler', SUM(tb.jma_transfer) AS 'jma_transfer'
		FROM tahun_ajaran t, tabel_2a tb
		";
		}
		return $this->db->query($query)->result_array();
  }

	public function gettable2a($limit, $start, $id_tahun = null)
	 {
			 if ($id_tahun !== null) {

					 $query =
							 "
		 SELECT tb.id_tabel2a AS 'id_tabel2a', tb.tahun, tb.daya_tampung, tb.pendaftar, tb.lulus_seleksi, tb.jmb_reguler, tb.jmb_transfer, tb.jma_reguler, tb.jma_transfer
		 FROM tabel_2a tb WHERE tb.tahun <= $id_tahun ORDER BY tahun limit $start, $limit
			 ";
			 } else {
					 $query =
							 "
		 SELECT  tb.id_tabel2a, tb.tahun, tb.daya_tampung, tb.pendaftar, tb.lulus_seleksi, tb.jmb_reguler, tb.jmb_transfer, tb.jma_reguler, tb.jma_transfer
		 FROM tabel_2a tb WHERE tb.tahun <= (SELECT date_format(curdate(),'%Y')) limit $start, $limit
	 ";
			 }
			 return $this->db->query($query, $limit, $start, $id_tahun)->result_array();
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
