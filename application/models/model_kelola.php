<?php  
class model_kelola extends CI_Model
{
	public function tampil_data_admin()
	{
		return $this->db->get('kelola_admin');
	}
	public function tampil_data_prodi()
	{
		return $this->db->get('kelola_distributor');
	}
	public function tampil_data_user()
	{
		return $this->db->get('kelola_user');
	}
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>
