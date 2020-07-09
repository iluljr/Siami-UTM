<?php
class model_admin_prodi extends CI_Model
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
	public function pilih_data($id_tahun = null, $id_prodi = null)
	 {
			 if ($id_tahun !== null) {

					 $query =
							 "
		 SELECT tb.id_tabel2a AS 'id_tabel2a'
		 FROM tabel_2a tb
			 ";
			 } else {
					 $query =
							 "
		 SELECT  tb.id_tabel2a
		 FROM tabel_2a tb WHERE tb.id_prodi=0
	 ";
			 }
			 return $this->db->query($query)->result_array();
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
		FROM tabel_2a tb WHERE (tb.tahun <= (SELECT date_format(curdate(),'%Y')) and tb.tahun >= (SELECT date_format(curdate(),'%Y')-4)) AND tb.id_prodi = 0
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
		 FROM tabel_2a tb WHERE (tb.tahun <= (SELECT date_format(curdate(),'%Y')) and tb.tahun >= (SELECT date_format(curdate(),'%Y')-4)) AND tb.id_prodi=0 ORDER BY tb.tahun
	 ";
			 }
			 return $this->db->query($query)->result_array();
	 }

	public function datatable_2a_MA($id_tahun = null, $id_prodi = null)
  	{
			if ($id_tahun !== null && $id_prodi !== null) {
			$query =
							"
		SELECT t.jma_reguler+t.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a t WHERE t.tahun = $id_tahun AND t.id_prodi = $id_prodi
		";} else {
			$query =
							"
		SELECT t.jma_reguler+t.jma_transfer AS 'mahasiswa_aktif' FROM tabel_2a t WHERE t.tahun = (SELECT date_format(curdate(),'%Y')) AND t.id_prodi = 0
		";
		}
		return $this->db->query($query)->result_array();
  	}

		public function datatable_2a_Dosen($id_tahun = null, $id_prodi = null)
			{
				if ($id_tahun !== null && $id_prodi !== null) {
				$query =
								"
								SELECT ds.id_dosen, ds.jumlah_dosen AS 'jumlah_dosen'
								FROM dosen ds, prodi p
								WHERE ds.id_prodi=p.id_prodi AND ds.id_prodi=$id_prodi AND ds.tahun_ajaran = $id_tahun
								";
				} else {
				$query =
								"
							SELECT ds.id_dosen, ds.jumlah_dosen AS 'jumlah_dosen'
							FROM dosen ds, prodi p
							WHERE ds.id_prodi=p.id_prodi AND ds.id_prodi=0 AND ds.tahun_ajaran = (SELECT date_format(curdate(),'%Y'))
							";
			}
			return $this->db->query($query)->result_array();
			}

  	public function datatable_2a_MB($id_tahun = null, $id_prodi = null)
  	{
			if ($id_tahun !== null) {
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb WHERE tb.tahun = $id_tahun AND tb.id_prodi = $id_prodi
		";} else {
			$query =
							"
		SELECT tb.jmb_reguler+tb.jmb_transfer AS 'mahasiswa_baru' FROM tabel_2a tb WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')) AND tb.id_prodi=0
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

		public function gettable2b($id_tahun = null, $id_prodi = null)
		 {
				 if ($id_tahun !== null && $id_prodi !== null) {

						 $query =
								 "
			 SELECT  tb.id_tabel2a, tb.tahun, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = $id_tahun and tb.id_prodi=pd.id_prodi AND tb.id_prodi =$id_prodi
				 ";
				 } else {
						 $query =
								 "
			 SELECT  tb.id_tabel2a, tb.tahun, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')) and tb.id_prodi=pd.id_prodi AND tb.id_prodi=0
		 ";
				 }
				 return $this->db->query($query)->result_array();
		 }

		 public function gettable2b_min1($id_tahun = null, $id_prodi = null)
 		 {
 				 if ($id_tahun !== null && $id_prodi !== null) {

 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = ($id_tahun-1) and tb.id_prodi=pd.id_prodi AND tb.id_prodi= $id_prodi
 				 ";
 				 } else {
 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')-1) and tb.id_prodi=pd.id_prodi AND tb.id_prodi=0
 		 ";
 				 }
 				 return $this->db->query($query)->result_array();
 		 }
		 public function gettable2b_min2($id_tahun = null, $id_prodi = null)
 		 {
 				 if ($id_tahun !== null && $id_prodi !== null) {

 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = ($id_tahun-2) and tb.id_prodi=pd.id_prodi AND tb.id_prodi= $id_prodi
 				 ";
 				 } else {
 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, pd.nama_prodi, tb.jma_reguler, tb.jma_penuh, tb.jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun = (SELECT date_format(curdate(),'%Y')-2) and tb.id_prodi=pd.id_prodi AND tb.id_prodi=0
 		 ";
 				 }
 				 return $this->db->query($query)->result_array();
 		 }
		 public function gettable2b_jumlahmhs($id_tahun = null, $id_prodi = null)
 		 {
 				 if ($id_tahun !== null && $id_prodi !== null) {

 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, SUM(tb.jma_reguler) AS 'jmblh_jma_reg' , SUM(tb.jma_penuh) jmblh_jma_penuh, SUM(tb.jma_paruh) jmblh_jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE tb.tahun <= $id_tahun and tb.tahun >= ($id_tahun-2) and tb.id_prodi=pd.id_prodi AND tb.id_prodi= $id_prodi ORDER BY tb.tahun
 				 ";
 				 } else {
 						 $query =
 								 "
 			 SELECT  tb.id_tabel2a, SUM(tb.jma_reguler) AS 'jmblh_jma_reg' , SUM(tb.jma_penuh) jmblh_jma_penuh, SUM(tb.jma_paruh) jmblh_jma_paruh
 			 FROM tabel_2a tb, prodi pd WHERE (tb.tahun <= (SELECT date_format(curdate(),'%Y')) and tb.tahun >= (SELECT date_format(curdate(),'%Y')-2)) and tb.id_prodi=pd.id_prodi AND tb.id_prodi=0
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
	 		 FROM tabel_8a tb,prodi p WHERE tb.id_prodi=p.id_prodi and (tb.tahun_lulus <= (SELECT date_format(curdate(),'%Y')) and tb.tahun_lulus >= (SELECT date_format(curdate(),'%Y')-2)) and tb.id_prodi = 0 ORDER BY tb.tahun_lulus
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
								 FROM tabel_8a a, prodi p WHERE a.id_prodi=p.id_prodi and (a.tahun_lulus <= (SELECT date_format(curdate(),'%Y')) and a.tahun_lulus >= (SELECT date_format(curdate(),'%Y')-2)) and a.id_prodi = 0
	 	 			";
	 			 }
	 			 return $this->db->query($query)->result_array();
	 	 }

		 //TABEL 8b
		 public function gettable8b($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT t.id_tabel8b, t.nama_kegiatan, t.waktu_perolehan, t.id_tingkat, t.prestasi
								 FROM tabel_8b t, prodi p
								 WHERE t.id_prodi=p.id_prodi AND t.waktu_perolehan <= $id_tahun AND t.waktu_perolehan >= ($id_tahun-2) AND t.id_prodi = $id_prodi ORDER BY t.waktu_perolehan
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_tabel8b, t.nama_kegiatan, t.waktu_perolehan, t.id_tingkat, t.prestasi
							 FROM tabel_8b t, prodi p
							 WHERE t.id_prodi=p.id_prodi AND t.waktu_perolehan <= (SELECT date_format(curdate(),'%Y')) AND t.waktu_perolehan >= (SELECT date_format(curdate(),'%Y')-2) AND t.id_prodi = 0 ORDER BY t.waktu_perolehan
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }
		 								//JUMLAH
		 public function gettable8b_jumlah_NI($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT COUNT(t.id_tingkat) AS 'jumlah_ni'
					FROM tabel_8b t, prodi p
					WHERE t.id_tingkat=3 and t.id_prodi=p.id_prodi AND t.waktu_perolehan <= $id_tahun AND t.waktu_perolehan >= ($id_tahun-2) AND t.id_prodi = $id_prodi
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT COUNT(t.id_tingkat) AS 'jumlah_ni'
							 FROM tabel_8b t, prodi p
							 WHERE t.id_tingkat=3 and t.id_prodi=p.id_prodi AND t.waktu_perolehan <= (SELECT date_format(curdate(),'%Y')) AND t.waktu_perolehan >= (SELECT date_format(curdate(),'%Y')-2) AND t.id_prodi = 0
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }
		 public function gettable8b_jumlah_NN($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT COUNT(t.id_tingkat) AS 'jumlah_nn'
								 FROM tabel_8b t, prodi p
			 					WHERE t.id_tingkat=2 and t.id_prodi=p.id_prodi AND t.waktu_perolehan <= $id_tahun AND t.waktu_perolehan >= ($id_tahun-2) AND t.id_prodi = $id_prodi
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT COUNT(t.id_tingkat) AS 'jumlah_nn'
							 FROM tabel_8b t, prodi p
							 WHERE t.id_tingkat=2 and t.id_prodi=p.id_prodi AND t.waktu_perolehan <= (SELECT date_format(curdate(),'%Y')) AND t.waktu_perolehan >= (SELECT date_format(curdate(),'%Y')-2) AND t.id_prodi = 0
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }
		 public function gettable8b_jumlah_NW($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT COUNT(t.id_tingkat) AS 'jumlah_nw'
								 FROM tabel_8b t, prodi p
			 					WHERE t.id_tingkat=1 and t.id_prodi=p.id_prodi AND t.waktu_perolehan <= $id_tahun AND t.waktu_perolehan >= ($id_tahun-2) AND t.id_prodi = $id_prodi
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT COUNT(t.id_tingkat) AS 'jumlah_nw'
							 FROM tabel_8b t, prodi p
							 WHERE t.id_tingkat=1 and t.id_prodi=p.id_prodi AND t.waktu_perolehan <= (SELECT date_format(curdate(),'%Y')) AND t.waktu_perolehan >= (SELECT date_format(curdate(),'%Y')-2) AND t.id_prodi = 0 ORDER BY t.waktu_perolehan
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }

		 //TABEL 8C
		 public function gettable8c($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT t.id_tabel8c, t.tahun_masuk, t.mhs_diterima, t.ts_6, t.ts_5, t.ts_4, t.ts_3, t.ts_2, t.ts_1, t.ts, t.rata_studi
								 FROM tabel_8c t, prodi p
								 WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk <= ($id_tahun-3) AND t.tahun_masuk >= ($id_tahun-6) AND t.id_prodi = $id_prodi ORDER BY t.tahun_masuk
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_tabel8c, t.tahun_masuk, t.mhs_diterima, t.ts_6, t.ts_5, t.ts_4, t.ts_3, t.ts_2, t.ts_1, t.ts, t.rata_studi
							 FROM tabel_8c t, prodi p
							 WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk <= (SELECT date_format(curdate(),'%Y')-3) AND t.tahun_masuk >= (SELECT date_format(curdate(),'%Y')-6) AND t.id_prodi = 0 ORDER BY t.tahun_masuk
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }
		 				//JUMLAH
		 public function gettable8c_jml_rata($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT t.id_tabel8c, sum(t.rata_studi) AS 'rata_rata', sum(t.mhs_diterima) AS 'jumlah_mhs'
								 FROM tabel_8c t, prodi p
								 WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk <= ($id_tahun-3) AND t.tahun_masuk >= ($id_tahun-6) AND t.id_prodi = $id_prodi ORDER BY t.tahun_masuk
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_tabel8c, sum(t.rata_studi) AS 'rata_rata', sum(t.mhs_diterima) AS 'jumlah_mhs'
							 FROM tabel_8c t, prodi p
							 WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk <= (SELECT date_format(curdate(),'%Y')-3) AND t.tahun_masuk >= (SELECT date_format(curdate(),'%Y')-6) AND t.id_prodi = 0 ORDER BY t.tahun_masuk
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 	}

		 	//JUMLAH DITERIMA SAAT TS-3
		 public function gettable8c_jml_ts3($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

	 					 $query =
	 							 "
								 SELECT t.id_tabel8c, t.mhs_diterima, t.ts
								 FROM tabel_8c t, prodi p
								 WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk = ($id_tahun-3) AND t.id_prodi = $id_prodi ORDER BY t.tahun_masuk
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_tabel8c, t.mhs_diterima, t.ts
							 FROM tabel_8c t, prodi p
							 WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk = (SELECT date_format(curdate(),'%Y')-3) AND t.id_prodi = 0 ORDER BY t.tahun_masuk
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }
		 		//JUMLAH Ts_3-ts_6
				public function gettable8c_jml_ts3_ts6($id_tahun = null,$id_prodi = null)
				{
						if ($id_tahun !== null && $id_prodi !== null) {

								$query =
										"
										SELECT t.id_tabel8c, SUM(t.ts) AS 'jmb',SUM(t.ts_1) AS 'jmb1', SUM(t.ts_2) AS 'jmb2', SUM(t.ts_3) AS 'jmb3', SUM(t.ts_4) AS 'jmb4', SUM(t.ts_5) AS 'jmb5', SUM(t.ts_6) AS 'jmb6'
										FROM tabel_8c t, prodi p
										WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk <= ($id_tahun-3) AND t.tahun_masuk >= ($id_tahun-6) AND t.id_prodi = $id_prodi ORDER BY t.tahun_masuk
						";
					}else{
							$query =
									"
									SELECT t.id_tabel8c, SUM(t.ts) AS 'jmb',SUM(t.ts_1) AS 'jmb1', SUM(t.ts_2) AS 'jmb2', SUM(t.ts_3) AS 'jmb3', SUM(t.ts_4) AS 'jmb4', SUM(t.ts_5) AS 'jmb5', SUM(t.ts_6) AS 'jmb6'
									FROM tabel_8c t, prodi p
									WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk <= (SELECT date_format(curdate(),'%Y')-3) AND t.tahun_masuk >= (SELECT date_format(curdate(),'%Y')-6) AND t.id_prodi = 0 ORDER BY t.tahun_masuk
					";
					}
					return $this->db->query($query)->result_array();
				}
				//Tahun tahunsekarang
				public function tahun_ms($id_tahun = null,$id_prodi = null)
				{
						if ($id_tahun !== null && $id_prodi !== null) {

								$query =
										"
										SELECT t.tahun_masuk
										FROM tabel_8c t, prodi p
										WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk = ($id_tahun-3) AND t.id_prodi=$id_prodi
						";
					}else{
							$query =
									"
									SELECT t.tahun_masuk
									FROM tabel_8c t, prodi p
									WHERE t.id_prodi=p.id_prodi AND t.tahun_masuk = (SELECT date_format(curdate(),'%Y')-3) AND t.id_prodi=1
					";
					}
					return $this->db->query($query)->result_array();
				}

		 //table table_8d1
		 public function gettable8d1($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

					 $dd = $id_tahun;

	 					 $query =
	 							 "
								 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.wt_6, t.wt_18, t.wt_lebih
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= ($dd-2) AND t.tahun >= ($dd-4) AND t.id_prodi = $id_prodi ORDER BY t.tahun
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.wt_6, t.wt_18, t.wt_lebih
							 FROM table_8d1 t, prodi p
							 WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 0 ORDER BY t.tahun
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }


	 	public function datatable_8d1($id_tahun = null,$id_prodi = null)
		{
				if ($id_tahun !== null && $id_prodi !== null) {

					$dd = $id_tahun;

						$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.wt_6) AS 'wt_6', SUM(t.wt_18) AS 'wt_18', SUM(t.wt_lebih) AS 'wt_lebih'
								FROM table_8d1 t, prodi p
								WHERE t.id_prodi=p.id_prodi AND t.tahun <= ($dd-2) AND t.tahun >= ($dd-4) AND t.id_prodi = $id_prodi
				";
	 		} else {
				$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.wt_6) AS 'wt_6', SUM(t.wt_18) AS 'wt_18', SUM(t.wt_lebih) AS 'wt_lebih'
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 0
				";
	 		}


	 		return $this->db->query($query)->result_array();
	   }

		 //table table_8d2
		 public function gettable8d2($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

					 $dd = $id_tahun;

	 					 $query =
	 							 "
								 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.rendah, t.sedang, t.tinggi
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= ($dd-2) AND t.tahun >= ($dd-4) AND t.id_prodi = $id_prodi ORDER BY t.tahun
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.rendah, t.sedang, t.tinggi
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 0 ORDER BY t.tahun
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }


	 	public function datatable_8d2($id_tahun = null,$id_prodi = null)
	   {
	 		if ($id_tahun !== null) {

				$dd = $id_tahun;

	 				$query =
	 								"
									SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.rendah) AS 'rendah', SUM(t.sedang) AS 'sedang', SUM(t.tinggi) AS 'tinggi'
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= ($dd-2) AND t.tahun >= ($dd-4) AND t.id_prodi = $id_prodi
	 			";
	 		} else {
				$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.rendah) AS 'rendah', SUM(t.sedang) AS 'sedang', SUM(t.tinggi) AS 'tinggi'
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 0
				";
	 		}

	 		return $this->db->query($query)->result_array();
	   }

		 //table table_8e1
		 public function gettable8e1($id_tahun = null,$id_prodi = null)
	 	 {
	 			 if ($id_tahun !== null && $id_prodi !== null) {

					 $dd = $id_tahun;

	 					 $query =
	 							 "
								 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.berwirausaha, t.lokal, t.nasional, t.internasional
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= ($dd-2) AND t.tahun >= ($dd-4) AND t.id_prodi = $id_prodi ORDER BY t.tahun
	 			 ";
			 }else{
					 $query =
							 "
							 SELECT t.id_table8d1, t.tahun, t.jml_lulus, t.jml_lulus_ter, t.berwirausaha, t.lokal, t.nasional, t.internasional
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 0 ORDER BY t.tahun
			 ";
			 }
	 			 return $this->db->query($query)->result_array();
	 	 }


	 	public function datatable_8e1($id_tahun = null,$id_prodi = null)
	   {
	 		if ($id_tahun !== null) {

				$dd = $id_tahun;

	 				$query =
	 								"
									SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.berwirausaha) AS 'berwirausaha', SUM(t.lokal) AS 'lokal', SUM(t.nasional) AS 'nasional', SUM(t.internasional) AS 'internasional'
					FROM table_8d1 t, prodi p
					WHERE t.id_prodi=p.id_prodi AND t.tahun <= ($dd-2) AND t.tahun >= ($dd-4) AND t.id_prodi = $id_prodi
	 			";
	 		} else {
				$query =
								"
								SELECT SUM(t.jml_lulus) AS 'jml_lulus', SUM(t.jml_lulus_ter) AS 'jml_lulus_ter', SUM(t.berwirausaha) AS 'berwirausaha', SUM(t.lokal) AS 'lokal', SUM(t.nasional) AS 'nasional', SUM(t.internasional) AS 'internasional'
				FROM table_8d1 t, prodi p
				WHERE t.id_prodi=p.id_prodi AND t.tahun <= (SELECT date_format(curdate(),'%Y')-2) AND t.tahun >= (SELECT date_format(curdate(),'%Y')-4) AND t.id_prodi = 0
				";
	 		}

	 		return $this->db->query($query)->result_array();
	   }
}
?>
