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
		SELECT ta.jma_reguler+ta.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a ta WHERE ta.tahun = $id_tahun
		";} else {
			$query =
							"
		SELECT ta.jma_reguler+ta.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a ta WHERE ta.tahun = (SELECT date_format(curdate(),'%Y'))
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
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb LIMIT 4,1
		";
		return $this->db->query($query)->result_array();
  	}
}
?>
