<?php
class model_admin extends CI_Model
{
	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
		public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function datatable_2a_MA($id_tahun = null)
  	{
			if ($id_tahun !== null) {
			$query =
							"
		SELECT t.jma_reguler+t.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a t WHERE t.tahun = $id_tahun
		";} else {
			$query =
							"
		SELECT t.jma_reguler+t.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a t WHERE t.tahun = (SELECT date_format(curdate(),'%Y'))
		";
		}
		return $this->db->query($query)->result_array();
  	}

	public function datatable_2a_Dosen($id_tahun = null)
  	{
			$query =
							"
		SELECT ds.jumlah_dosen AS 'jumlah_dosen' FROM dosen ds
		";
		return $this->db->query($query)->result_array();
  	}

  	public function datatable_2a_MB($id_tahun = null)
  	{
			if ($id_tahun !== null) {
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb WHERE tb.tahun = $id_tahun
		";} else {
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb WHERE tb.tahun = (SELECT date_format(curdate(),'%Y'))
		";
		}
		return $this->db->query($query)->result_array();
  	}

		//table 2b
		public function tahunsekarang_2b($id_tahun = null)
  	{
			if ($id_tahun !== null) {
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb WHERE tb.tahun = $id_tahun
		";} else {
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb WHERE tb.tahun = (SELECT date_format(curdate(),'%Y'))
		";
		}
		return $this->db->query($query)->result_array();
  	}

}
?>
