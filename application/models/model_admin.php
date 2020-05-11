<?php  
class model_admin extends CI_Model
{
	public function datatable_2a_MA($id_tahun = null)
  	{
			$query =
							"
		SELECT ta.jma_reguler+ta.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a ta LIMIT 4,1
		";
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
