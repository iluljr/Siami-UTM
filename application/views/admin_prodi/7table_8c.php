<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <h4>Table 8.c Masa Studi Lulusan</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_8c'); ?>" method="post">
      <table align="center" class="mt-4">
        <tr>
          <td align="right">Tahun Sekarang :</td>
          <td>
            <div class="">
              <select name="id_tahun" id="dropdown" class="custom-select custom-select-sm">
                <?php foreach ($tahunsekarang_2b as $ts):?>
                  <option value="<?= $ts['tahun']?>" class="dropdown-item" selected> - pilih tahun sekarang - </option>
                <?php endforeach;?>
              <?php
                foreach ($dropdown as $dd):
              ?>
                <option value="<?php echo $dd->tahun;?>" class="dropdown-item"><?php echo $dd->tahun; ?>/<?php echo $dd->tahun+1; ?></option>
              <?php endforeach;?>
            </select>
          </div>
          </td>
          <td>&nbsp;</td>
          <td align="right">Nama Program Studi :</td>
          <td>
            <div class="">
              <select name="id_prodi" id="dropdown" class="custom-select custom-select-sm">
              <option value="0" disabled="disabled" class="dropdown-item"> - pilih program studi - </option>
              <?php
                foreach ($prodi as $ps):
              ?>
                <option value="<?= $ps['id_prodi']?>" class="dropdown-item" selected><?= $ps['nama_prodi']?></option>
              <?php endforeach;?>
            </select>
          </div>
          </td>
          <td>&nbsp;</td>
          <td>
            <input type="submit" name="submit" value="Tampil Data" class="btn btn-sm  btn-primary ml-2">
          </td>
        </tr>
      </table>
    </form>

      <!-- Data Table -->
      <div class="table-responsive">
        <table class="table table-bordered" width="1600px" cellspacing="0">
          <thead align="center">
            <tr>
              <?php
                foreach ($tahun_ms as $ts):
              ?>
              <th rowspan="2">Tahun Masuk</th>
              <th rowspan="2">Jumlah Mahasiswa Diterima</th>
              <th colspan="7">Jumlah Mahasiswa Yang Lulus Pada</th>
              <th rowspan="2">Jumlah Lulusan s.d. akhir <?= $ts['tahun_masuk']+3?></th>
              <th rowspan="2">Rata-rata Masa Studi</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>Akhir<br><?= $ts['tahun_masuk']-3?></th>
              <th>Akhir<br><?= $ts['tahun_masuk']-2?></th>
              <th>Akhir<br><?= $ts['tahun_masuk']-1?></th>
              <th>Akhir<br><?= $ts['tahun_masuk']?></th>
              <th>Akhir<br><?= $ts['tahun_masuk']+1?></th>
              <th>Akhir<br><?= $ts['tahun_masuk']+2?></th>
              <th>Akhir<br><?= $ts['tahun_masuk']+3?></th>
              <?php endforeach;?>
            </tr>
            <tr align="center">
              <td>1</td>
              <td></td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
              <td>9</td>
              <td>10</td>
              <td></td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pilih_data)) : ?>
  						<tr>
  							<td colspan="13">
  								<div class="alert alert-primary" role="alert">
  										Silahkan pilih tahun dan Tampil data untuk menampilkan data!
  								</div>
  							</td>
  						</tr>
          <?php elseif (empty($view_table8c)) : ?>
  						<tr>
  							<td colspan="13">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            $n = 0;
            foreach ($view_table8c as $tb) :
            ?>
            <tr align="center">
              <td><?= $tb['tahun_masuk']?></td>
              <td><?= $tb['mhs_diterima']?></td>
              <td><?= $tb['ts_6']?></td>
              <td><?= $tb['ts_5']?></td>
              <td><?= $tb['ts_4']?></td>
              <td><?= $tb['ts_3']?></td>
              <td><?= $tb['ts_2']?></td>
              <td><?= $tb['ts_1']?></td>
              <td><?= $tb['ts']?></td>
              <td><?= $tb['ts_6']+$tb['ts_5']+$tb['ts_4']+$tb['ts_3']+$tb['ts_2']+$tb['ts_1']+$tb['ts']?></td>
              <td><?= $tb['rata_studi']?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel8c/'.$tb['id_tabel8c'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_tabel8c/'.$tb['id_tabel8c'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
              </td>
            </tr>
          <?php
            endforeach;
          ?>
          </tbody>
          <tfoot>
            <tr align="center">
              <?php foreach ($view_table8c_jml as $tb) : ?>
                <td colspan="9"></td>
                <td>Rata-rata Masa Studi</td>
                <td><?= $tb['rata_rata']/4?></td>
                <td bgcolor="#FAEBD7" colspan="2">IKU No.7</td>
              <?php endforeach;?>
            </tr>
          </tfoot>
        </table>
      </div>
    </br>
      <?php if (empty($pilih_data)) : ?>
        <tr>
          <td colspan="12">
            &nbsp;
          </td>
        </tr>
      <?php else: ?>
      <table class="">
        <tr>
          <?php foreach ($view_table8c_jml_ts3 as $ts3) : ?>
            <td colspan="4">Jumlah mahasiswa yang diterima saat TS-3</td>
            <td align="center">:</td>
            <td><?= $ts3['mhs_diterima']?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8c_jml_ts3 as $ts3) : ?>
            <td colspan="4">Jumlah mahasiswa yang diterima saat TS-3 dan lulus pada akhir TS</td>
            <td align="center">:</td>
            <td><?= $ts3['ts']?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8c_jml_ts3 as $ts3) : ?>
            <td align="right" colspan="4">Persentase kelulusan tepat waktu</td>
            <td width="20px" align="center">:</td>
            <td><?= $ts3['ts']/$ts3['mhs_diterima']*100?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="center" bgcolor="#FAEBD7">IKU No.8</td>
          <td>Pemenuhan IKU </td>
          <td> </td>
          <?php foreach ($view_table8c_jml_ts3 as $ts3) : ?>
            <td bgcolor="#00FF00"><?= $ts3['ts']/$ts3['mhs_diterima']*100?></td>
          <?php endforeach;?>
          <td align="center">50%</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PTW < 50% , tuliskan 0</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PTW >= 50%  tuliskan nilainya</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">Data dari tahun masuk TS-3 sampai TS-6 </td>
          <td colspan="4">&nbsp;</td>
          <td>Skor Terbobot</td>
        </tr>
        <tr>
          <?php foreach ($view_table8c_jml_ts3_ts6 as $tss) : ?>
            <td colspan="4">Jumlah mahasiswa dengan masa studi <= 4 tahun</td>
            <td>:</td>
            <td align="center" bgcolor="yellow"><?= $tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']?></td>
            <td>B dibobot 1.0</td>
            <td>:</td>
            <td align="center" bgcolor="yellow"><?= $tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8c_jml_ts3_ts6 as $tss) : ?>
            <?php foreach ($view_table8c_jml as $tb) : ?>
              <td colspan="4">Jumlah mahasiswa dengan masa studi > 4 tahun sampai < 7 tahun</td>
              <td>:</td>
              <td align="center" bgcolor="yellow"><?= $tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6'])?></td>
              <td>C dibobot 0.5</td>
              <td>:</td>
              <td align="center" bgcolor="yellow"><?= ($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5?></td>
            <?php endforeach;?>
          <?php endforeach;?>
        </tr>
        <tr>
            <?php foreach ($view_table8c_jml as $tb) : ?>
              <td colspan="4">Jumlah mahasiswa</td>
              <td>:</td>
              <td align="center" bgcolor="yellow"><?= $tb['jumlah_mhs']?></td>
              <td>A</td>
              <td>:</td>
            <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8c_jml_ts3_ts6 as $tss) : ?>
            <?php foreach ($view_table8c_jml as $tb) : ?>
              <td colspan="3">&nbsp;</td>
              <<td>Persentase Keberhasislan Studi</td>
              <td>:</td>
              <?php if(empty($tss['jmb'])) : ?>
                <td>&nbsp;</td>
              <?php else: ?>
              <td align="center"><?= ((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs'])*100?></td>
              <?php endif; ?>
              <td>(B+C)/A</td>
            <?php endforeach;?>
          <?php endforeach;?>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <?php foreach ($view_table8c_jml_ts3_ts6 as $tss) : ?>
            <?php foreach ($view_table8c_jml as $tb) : ?>
              <td colspan="2">&nbsp;</td>
              <td align="center" bgcolor="#FAEBD7">IKU No. 9</td>
              <td>Pemenuhan IKU </td>
              <td>:</td>
              <?php if(empty($tss['jmb'])) : ?>
                <td>&nbsp;</td>
              <?php else: ?>
              <td bgcolor="#00FF00" align="center"><?= ((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs'])*100?></td>
              <?php endif; ?>
              <td align="right">85%</td>
            <?php endforeach;?>
          <?php endforeach;?>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PPS < 85% , tuliskan 0</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PPS >=85%  tuliskan nilainya </td>
        </tr>
      </table>
      <?php endif; ?>
      <!-- End Data Table -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="databaru" tabindex="-1" role="dialog" aria-labelledby="DataBaru" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="DataBaru">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('admin_prodi/tambah_data8c'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukkan Tahun Masuk
            </div>
						<input type="number" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk" required>
					</div>
  					<div class="form-group">
              <div class="invalid-feedback>">
                Masukkan Jumlah Mahasiswa Diterima
              </div>
  						<input type="number" class="form-control" name="mhs_diterima" placeholder="Jumlah mahasiswa diterima" required>
  					</div>
  				<div class="form-group">
              <div class="invalid-feedback>">
                Nama Program Studi
              </div>
                <select name="id_prodi" id="id_prodi" class="custom-select custom-select-sm">
                  <option value="0" disabled="disabled" class="dropdown-item"> - pilih program studi - </option>
                  <?php
                    foreach ($prodi as $ps):
                  ?>
                    <option value="<?= $ps['id_prodi']?>" class="dropdown-item" selected><?= $ps['nama_prodi']?></option>
                  <?php endforeach;?>
                </select>
  				</div>
          <div class="form-group">
              <div class="invalid-feedback>">
                Jumlah Mahasiswa yang lulus pada
              </div>
              <input type="text" class="form-control" name="ts_6" placeholder="Akhir TahunSekarang-6" >
              <input type="text" class="form-control" name="ts_5"  placeholder="Akhir TahunSekarang-5">
              <input type="text" class="form-control" name="ts_4"  placeholder="Akhir TahunSekarang-4" >
              <input type="text" class="form-control" name="ts_3" placeholder="Akhir TahunSekarang-3" >
              <input type="text" class="form-control" name="ts_2" placeholder="Akhir TahunSekarang-2" >
              <input type="text" class="form-control" name="ts_1" placeholder="Akhir TahunSekarang-1" >
              <input type="text" class="form-control" name="ts" placeholder="Akhir TahunSekarang" >
  				</div>
					<div class="form-group">
            <div class="invalid-feedback>">
              Rata-Rata Masa Studi
            </div>
						<input type="textarea" class="form-control" name="rata_studi" placeholder="Rata Rata Masa Studi" required>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
				</div>
			</form>

		</div>
	</div>
</div>
