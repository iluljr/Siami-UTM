<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.e.1 Tempat Kerja Lulusan</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_8e1'); ?>" method="post">
      <table align="center">
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
              <th rowspan="2">Tahun Lulus</th>
              <th rowspan="2">Jumlah Lulusan</th>
              <th rowspan="2">Jumlah Lulusan yang Terlacak</th>
              <th rowspan="2">Jumlah Lulusan yang Telah Bekerja/ Berwirausaha</th>
              <th colspan="3">Jumlah Lulusan yang Bekerja Berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausa</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>Lokal/ Wilayah/ Berwirausaha tidak Berbadan Hukum</th>
              <th>Nasional/ Berwirausaha Berbadan Hukum</th>
              <th>Multinasiona/ Internasional</th>
            </tr>
            <tr align="center">
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td colspan="2">8</td>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pilih_data)) : ?>
  						<tr>
  							<td colspan="7">
  								<div class="alert alert-primary" role="alert">
  										Silahkan pilih tahun dan Tampil data untuk menampilkan data!
  								</div>
  							</td>
  						</tr>
          <?php elseif (empty($view_table8e1)) : ?>
  						<tr>
  							<td colspan="7">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            foreach ($view_table8e1 as $tb) :
            ?>
            <tr>
              <td width="150px"><?= $tb['tahun']?> / <?= $tb['tahun']+1?></td>
              <td><?= $tb['jml_lulus']?></td>
              <td><?= $tb['jml_lulus_ter']?></td>
              <td><?= $tb['berwirausaha']?></td>
              <td><?= $tb['lokal']?></td>
              <td><?= $tb['nasional']?></td>
              <td><?= $tb['internasional']?></td>
              <td><?php echo anchor('admin_prodi/edit_table8e1/'.$tb['id_table8d1'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_table8e1/'.$tb['id_table8d1'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
          <tfoot>
            <tr>
              <td>Jumlah</td>
              <?php foreach ($jumlah_data as $jd): ?>
              <th><?= $jd['jml_lulus']?></th>
              <th><?= $jd['jml_lulus_ter']?></th>
              <th><?= $jd['berwirausaha']?></th>
              <th><?= $jd['lokal']?></th>
              <th><?= $jd['nasional']?></th>
              <th><?= $jd['internasional']?></th>
              <?php endforeach;?>
              <th colspan="2">&nbsp;</th>
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
    <?php foreach ($jumlah_data as $jd): ?>
      <table class="">
        <tr>
          <td colspan="6">Persentase lulusan terlacak dari total lulusan</td>
          <td>&nbsp;</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;">: <?= ($jd['jml_lulus_ter']/$jd['jml_lulus'])*100/100?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan yang bekerja di badan usaha tingkat internasional/multi nasional.</td>
          <td>NI</td>
          <td>: <?= $jd['internasional']?></td>
          <td>RI = (NI / NA) x 100%</td>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan yang bekerja di badan usaha tingkat nasional atau berwirausaha yang berizin.</td>
          <td>NN</td>
          <td>: <?= $jd['nasional']?></td>
          <td>RN = (NN / NA) x 100%</td>
        </tr>
        <tr>
          <td colspan="6" width="50%">Jumlah lulusan yang bekerja di badan usaha tingkat wilayah/lokal atau berwirausaha tidak berijin</td>
          <td>NL</td>
          <td>: <?= $jd['lokal']?></td>
          <td>RL = (NL / NA) x 100% </td>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan terlacak</td>
          <td>NA</td>
          <td>: <?= $jd['jml_lulus_ter']?></td>
          <td>Faktor: a = 5% , b = 20% , c = 90% .</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="9"> NI = Jumlah lulusan yang bekerja di badan usaha tingkat internasional/multi nasional.</td>
        </tr>
        <tr>
          <td colspan="9"> NN = Jumlah lulusan yang bekerja di badan usaha tingkat nasional atau berwirausaha yang berizin.</td>
        </tr>
        <tr>
          <td colspan="9"> NL = Jumlah lulusan yang bekerja di badan usaha tingkat wilayah/lokal atau berwirausaha tidak berijin</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>R1</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;">: <?= ($jd['internasional']/$jd['jml_lulus_ter'])*100/100?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>RN</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;">: <?= ($jd['nasional']/$jd['jml_lulus_ter'])*100/100?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>RL</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;">: <?= ($jd['lokal']/$jd['jml_lulus_ter'])*100/100?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>IKU No.12</td>
          <td>Pemenuhan IKU </td>
          <td>:</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= ($jd['internasional']/$jd['jml_lulus_ter'])*100/100?></td>
          <?php endif; ?>
          <td>RI >= 5%</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="1">Jika RI < 5% , tuliskan 0</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="">Jika RI >=5% tuliskan nilai dari RI</td>
        </tr>
      </table>
      <?php endforeach;?>
      <?php endif; ?>
      <!-- End Data Table -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah data table_8d2 -->
<div class="modal fade" id="databaru" tabindex="-1" role="dialog" aria-labelledby="DataBaru" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="DataBaru">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('admin_prodi/tambah_data8e1'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukan Tahun Lulus
            </div>
						<input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Lulus" required>
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
              Jumlah Lulusan
            </div>
						<input type="text" class="form-control" name="jml_lulusan" id="jml_lulusan" placeholder="Jumlah Lulusan" required>
					</div>
					<div class="form-group">
            <div class="invalid-feedback>">
              Jumlah Lulus Yang Terlacak
            </div>
						<input type="text" class="form-control mb-2" name="jml_terlacak" id="jml_terlacak" placeholder="Jumlah Lulus Yang Terlacak" required>
					</div>
					<div class="form-group">
            <div class="invalid-feedback>">
              Jumlah Lulusan yang Telah Bekerja/ Berwirausaha
            </div>
						<input type="text" class="form-control mb-2" name="jml_berwirausaha" id="jml_terlacak" placeholder="Jumlah Lulus Yang Terlacak" required>
					</div>
            <div class="form-group">
              <div class="invalid-feedback>">
                Jumlah Lulusan yang Bekerja Berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausaha
              </div>
              <input type="text" class="form-control mb-2" name="lokal" id="wt_6" placeholder="Lokal" required>
              <input type="text" class="form-control mb-2" name="nasional" id="wt_18" placeholder="Nasional" required>
              <input type="text" class="form-control" name="internasional" id="wt_lebih" placeholder="Internasional" required>
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
