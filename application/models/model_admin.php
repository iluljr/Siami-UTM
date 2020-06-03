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

		//TABEL 2B
		public function tahunsekarang_2b($id_tahun = null)
  	{
			if ($id_tahun !== null) {
			$query =
							"
							SELECT  tb.tahun
							FROM tabel_2a tb WHERE tb.tahun = $id_tahun ORDER BY tb.tahun
		";}
		else {
			$query =
							"
							SELECT  tb.tahun
							FROM tabel_2a tb WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')) ORDER BY tb.tahun
		";
		}
		return $this->db->query($query)->result_array();
  	}

		public function gettable2b($id_tahun = null)
		 {
				 if ($id_tahun !== null) {

						 $query =
								 "
			 SELECT  tb.id_tabel2a, tb.tahun, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = $id_tahun and tb.id_prodi=pd.id_prodi
				 ";
				 } else {
						 $query =
								 "
			 SELECT  tb.id_tabel2a, tb.tahun, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')) and tb.id_prodi=pd.id_prodi
		 ";
				 }
				 return $this->db->query($query)->result_array();
		 }

		 public function gettable2b_min1($id_tahun = null)
 		 {
 				 if ($id_tahun !== null) {

 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = ($id_tahun-1) and tb.id_prodi=pd.id_prodi
 				 ";
 				 } else {
 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')-1) and tb.id_prodi=pd.id_prodi
 		 ";
 				 }
 				 return $this->db->query($query)->result_array();
 		 }
		 public function gettable2b_min2($id_tahun = null)
 		 {
 				 if ($id_tahun !== null) {

 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = ($id_tahun-2) and tb.id_prodi=pd.id_prodi
 				 ";
 				 } else {
 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')-2) and tb.id_prodi=pd.id_prodi
 		 ";
 				 }
 				 return $this->db->query($query)->result_array();
 		 }
		 public function gettable2b_jumlahmhs($id_tahun = null)
 		 {
 				 if ($id_tahun !== null) {

 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, SUM(tb.jma_reguler) AS 'jmblh_jma_reg' , SUM(tb.jma_penuh) jmblh_jma_penuh, SUM(tb.jma_paruh) jmblh_jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun <= $id_tahun and tb.tahun >= ($id_tahun-2) and tb.id_prodi=pd.id_prodi ORDER BY tb.tahun
 				 ";
 				 } else {
 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, SUM(tb.jma_reguler) AS 'jmblh_jma_reg' , SUM(tb.jma_penuh) jmblh_jma_penuh, SUM(tb.jma_paruh) jmblh_jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE (tb.tahun <= (SELECT date_format(curdate(),'%Y')) and tb.tahun >= (SELECT date_format(curdate(),'%Y')-2)) and tb.id_prodi=pd.id_prodi
 		 ";
 				 }
 				 return $this->db->query($query)->result_array();
 		 }

		 //TABEL 8a
		 public function gettable8a($id_tahun = null, $id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
	 		 SELECT tb.id_tabel8a, tb.tahun_lulus, tb.jumlah_lulusan, tb.ipk_min, tb.ipk_rata, tb.ipk_max
	 		 FROM tabel_8a tb, prodi p WHERE tb.id_prodi=p.id_prodi and tb.tahun_lulus <= $id_tahun and tb.tahun_lulus >= ($id_tahun-2) and tb.id_prodi = $id_prodi ORDER BY tb.tahun_lulus
	 			 ";
	 			 } else {
	 					 $query =
	 							 "
	 		 SELECT  tb.id_tabel8a, tb.id_prodi, tb.tahun_lulus, tb.jumlah_lulusan, tb.ipk_min, tb.ipk_rata, tb.ipk_max
	 		 FROM tabel_8a tb,prodi p WHERE tb.id_prodi=p.id_prodi and (tb.tahun_lulus <= (SELECT date_format(curdate(),'%Y')) and tb.tahun_lulus >= (SELECT date_format(curdate(),'%Y')-2)) and tb.id_prodi = 1 ORDER BY tb.tahun_lulus
	 	 ";
	 			 }
	 			 return $this->db->query($query)->result_array();
	 	 }

		 public function table8a_rata($id_tahun = null, $id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT (sum(a.ipk_rata)/3) AS 'IPK_rata'
								 FROM tabel_8a a, prodi p WHERE a.id_prodi=p.id_prodi and a.tahun_lulus <= $id_tahun and a.tahun_lulus >= ($id_tahun-2) and a.id_prodi = $id_prodi
	 			 ";
	 			 } else {
	 					 $query =
	 							 "
								 SELECT (sum(a.ipk_rata)/3) AS 'IPK_rata'
								 FROM tabel_8a a, prodi p WHERE a.id_prodi=p.id_prodi and (a.tahun_lulus <= (SELECT date_format(curdate(),'%Y')) and a.tahun_lulus >= (SELECT date_format(curdate(),'%Y')-2)) and a.id_prodi = 1
	 	 			";
	 			 }
	 			 return $this->db->query($query)->result_array();
	 	 }

		 //table table_8d1
		 public function gettable8d1($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

					 $dd = $id_tahun-2;

	 					 $query =
	 							 "
								 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.wt_6, t.wt_18, t.wt_lebih
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= $dd AND t.tahun >= ($dd-2) AND t.id_prodi = $id_prodi ORDER BY t.tahun
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.wt_6, t.wt_18, t.wt_lebih
							 FROM table_8d1 t, prodi p
							 WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 1 ORDER BY t.tahun
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }


	 	public function datatable_8d1($id_tahun = null,$id_prodi = null)
		{
				if ($id_tahun !== null && $id_prodi !== null) {

					$dd = $id_tahun-2;

						$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.wt_6) AS 'wt_6', SUM(t.wt_18) AS 'wt_18', SUM(t.wt_lebih) AS 'wt_lebih'
								FROM table_8d1 t, prodi p
								WHERE t.id_prodi=p.id_prodi AND t.tahun <= $dd AND t.tahun >= ($dd-2) AND t.id_prodi = $id_prodi
				";
	 		} else {
				$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.wt_6) AS 'wt_6', SUM(t.wt_18) AS 'wt_18', SUM(t.wt_lebih) AS 'wt_lebih'
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 1
				";
	 		}


	 		return $this->db->query($query)->result_array();
	   }

		 //table table_8d2
		 public function gettable8d2($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

					 $dd = $id_tahun-2;

	 					 $query =
	 							 "
								 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.rendah, t.sedang, t.tinggi
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= $dd AND t.tahun >= ($dd-2) AND t.id_prodi = $id_prodi ORDER BY t.tahun
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.rendah, t.sedang, t.tinggi
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 1 ORDER BY t.tahun
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }


	 	public function datatable_8d2($id_tahun = null,$id_prodi = null)
	   {
	 		if ($id_tahun !== null) {

				$dd = $id_tahun-2;

	 				$query =
	 								"
									SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.rendah) AS 'rendah', SUM(t.sedang) AS 'sedang', SUM(t.tinggi) AS 'tinggi'
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= $dd AND t.tahun >= ($dd-2) AND t.id_prodi = $id_prodi
	 			";
	 		} else {
				$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.rendah) AS 'rendah', SUM(t.sedang) AS 'sedang', SUM(t.tinggi) AS 'tinggi'
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 1
				";
	 		}

	 		return $this->db->query($query)->result_array();
	   }

		 //table table_8e1
		 public function gettable8e1($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

					 $dd = $id_tahun-2;

	 					 $query =
	 							 "
								 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.berwirausaha, t.lokal, t.nasional, t.internasional
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= $dd AND t.tahun >= ($dd-2) AND t.id_prodi = $id_prodi ORDER BY t.tahun
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.berwirausaha, t.lokal, t.nasional, t.internasional
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 1 ORDER BY t.tahun
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }


	 	public function datatable_8e1($id_tahun = null,$id_prodi = null)
	   {
	 		if ($id_tahun !== null) {

				$dd = $id_tahun-2;

	 				$query =
	 								"
									SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.berwirausaha) AS 'berwirausaha', SUM(t.lokal) AS 'lokal', SUM(t.nasional) AS 'nasional', SUM(t.internasional) AS 'internasional'
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= $dd AND t.tahun >= ($dd-2) AND t.id_prodi = $id_prodi
	 			";
	 		} else {
				$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.berwirausaha) AS 'berwirausaha', SUM(t.lokal) AS 'lokal', SUM(t.nasional) AS 'nasional', SUM(t.internasional) AS 'internasional'
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 1
				";
	 		}

	 		return $this->db->query($query)->result_array();
	   }
}
?>
