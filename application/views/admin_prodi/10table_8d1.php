<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.d.1 Waktu Tunggu Lulusan</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_8d1'); ?>" method="post">
      <table align="center">
        <tr>
          <td align="right">Tahun Ajaran :</td>
          <td>
            <div class="">
              <select name="id_tahun" id="dropdown" class="custom-select custom-select-sm">
              <?php foreach ($tahunsekarang_2b as $ts):?>
                <option value="<?= $ts['tahun']?>" class="dropdown-item" selected> - pilih tahun ajaran - </option>
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
              <th colspan="3">Jumlah lulusan dengan waktu tunggu mendapatkan pekerjaan</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>WT < 6 bulan</th>
              <th>6 ≤ WT ≤ 18 bulan</th>
              <th>WT > 18 bulan</th>
            </tr>
            <tr align="center">
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td colspan="2">7</td>
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
          <?php elseif (empty($view_table8d1)) : ?>
  						<tr>
  							<td colspan="7">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            foreach ($view_table8d1 as $tb) :
            ?>
            <tr>
              <td width="150px"><?= $tb['tahun']?> / <?= $tb['tahun']+1?></td>
              <td><?= $tb['jml_lulus']?></td>
              <td><?= $tb['jml_lulus_ter']?></td>
              <td><?= $tb['wt_6']?></td>
              <td><?= $tb['wt_18']?></td>
              <td><?= $tb['wt_lebih']?></td>
              <td><?php echo anchor('admin_prodi/edit_table8d1/'.$tb['id_table8d1'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_table8d1/'.$tb['id_table8d1'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
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
              <th><?= $jd['wt_6']?></th>
              <th><?= $jd['wt_18']?></th>
              <th><?= $jd['wt_lebih']?></th>
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
          <td colspan="4">Jumlah lulusan dengan waktu tunggu mendapatkan pekerjaan </td>
          <td>:</td>
          <?php if ($jd['wt_6']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= $jd['wt_6']+$jd['wt_18']+$jd['wt_lebih']?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td colspan="4"></td>
          <td>:</td>
          <?php if ($jd['wt_6']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= (($jd['wt_6']*3)+($jd['wt_18']*12)+($jd['wt_lebih']*24))/($jd['wt_6']+$jd['wt_18']+$jd['wt_lebih'])?></td>
          <?php endif; ?>
          <td></td>
        </tr>
        <tr>
          <td colspan="4"></td>
          <td>:</td>
          <?php if ($jd['wt_6']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= (18-(($jd['wt_6']*3)+($jd['wt_18']*12)+($jd['wt_lebih']*24))/($jd['wt_6']+$jd['wt_18']+$jd['wt_lebih']))/3?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <td colspan="4">Persentase lulusan dengan waktu tunggu < 6 bulan</td>
          <td>:</td>
          <?php if ($jd['wt_6']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= ($jd['wt_6']/$jd['jml_lulus_ter'])*100?></td>
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
          <td>IKU No.10</td>
          <td>Pemenuhan IKU </td>
          <td>:</td>
          <?php if ($jd['wt_6']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= (18-(($jd['wt_6']*3)+($jd['wt_18']*12)+($jd['wt_lebih']*24))/($jd['wt_6']+$jd['wt_18']+$jd['wt_lebih']))/3?></td>
          <?php endif; ?>
          <td>(100%)</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika WT < 100% , tuliskan 0</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika WT >= 100%  tuliskan nilainya</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>Persentase responden minimum</td>
          <td>:</td>
          <?php if ($jd['jml_lulus'] >= 300): ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"> 30% </td>
          <?php elseif($jd['jml_lulus'] < 300): ?>
            <?php if ($jd['jml_lulus']==0) : ?>
              &nbsp;
            <?php else: ?>
              <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= 50-(($jd['jml_lulus']/300)*20) ?>%</td>
            <?php endif; ?>
          <?php endif; ?>
        </tr>
      </table>
      <?php endforeach;?>
      <?php endif; ?>
    </br>
    <p>Ketentuan persentase responden lulusan:
        <br>- untuk program studi dengan jumlah lulusan dalam 3 tahun (TS-4 s.d. TS-2) ≥ 300 orang, maka Prmin = 30%.
        <br>- untuk program studi dengan jumlah lulusan dalam 3 tahun (TS-4 s.d. TS-2) < 300 orang, maka Prmin = 50% - ((NL / 300) x 20%)
        <br>Jika persentase responden memenuhi ketentuan diatas, maka Skor akhir = Skor.
        <br>Jika persentase responden tidak memenuhi ketentuan diatas, maka berlaku penyesuaian sebagai berikut: Skor akhir = (PJ / Prmin) x Skor.
        <br>NL = Jumlah lulusan dalam 3 tahun (TS-4 s.d. TS-2)
        <br>NJ = Jumlah lulusan dalam 3 tahun (TS-4 s.d. TS-2) yang terlacak
        <br>PJ = Persentase lulusan yang terlacak = (NL / NJ) x 100%
        <br>Prmin = Persentase responden minimum</p>
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

			<form action="<?= base_url('admin_prodi/tambah_data8d1'); ?>" method="POST" class="needs-validation" novalidate>
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
                Jumlah lulusan dengan waktu tunggu mendapatkan pekerjaan
              </div>
              <input type="text" class="form-control mb-2" name="wt_6" id="wt_6" placeholder="WT < 6 bulan" required>
              <input type="text" class="form-control mb-2" name="wt_18" id="wt_18" placeholder="6 ≤ WT ≤ 18 bulan" required>
              <input type="text" class="form-control" name="wt_lebih" id="wt_lebih" placeholder="WT > 18 bulan" required>
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
