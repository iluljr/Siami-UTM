<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.b.1 Prestasi Akademik Mahasiswa</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>

      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_8b'); ?>" method="post">
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
        <table class="table table-bordered" id="dataTable" cellspacing="0">
          <thead align="center">
            <tr>
              <th rowspan="2">No.</th>
              <th rowspan="2">Nama Kegiatan</th>
              <th rowspan="2">Waktu Perolehan (YYYY)</th>
              <th colspan="3">Tingkat</th>
              <th rowspan="2" width="25%">Prestasi Yang Dicapai</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>Lokal/Wilayah</th>
              <th>Nasional</th>
              <th>Internasional</th>
            </tr>
            <tr align="center">
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td> </td>
              <td> </td>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pilih_data)) : ?>
  						<tr>
  							<td colspan="12">
  								<div class="alert alert-primary" role="alert">
  										Silahkan pilih tahun dan Tampil data untuk menampilkan data!
  								</div>
  							</td>
  						</tr>
          <?php elseif (empty($view_table8b)) : ?>
  						<tr>
  							<td colspan="12">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            foreach ($view_table8b as $tb) :
            ?>
            <tr align="center">
              <td> </td>
              <td><?= $tb['nama_kegiatan']?></td>
              <td><?= $tb['waktu_perolehan']?></td>
              <td>
                <?php if ($tb['id_tingkat'] == 1): ?>
                  <a><img src="<?php echo base_url('asset/image/centang.png')?>" title="centang" /></a>
                <?php elseif($tb['id_tingkat'] == 2): ?>

                <?php elseif($tb['id_tingkat'] == 3): ?>

                <?php endif; ?>
              </td>
              <td>
                <?php if ($tb['id_tingkat'] == 1): ?>

                <?php elseif($tb['id_tingkat'] == 2): ?>
                  <a><img src="<?php echo base_url('asset/image/centang.png')?>" title="centang" /></a>
                <?php elseif($tb['id_tingkat'] == 3): ?>

                <?php endif; ?>
              </td>
              <td>
                <?php if ($tb['id_tingkat'] == 1): ?>

                <?php elseif($tb['id_tingkat'] == 2): ?>

                <?php elseif($tb['id_tingkat'] == 3): ?>
                  <a><img src="<?php echo base_url('asset/image/centang.png')?>" title="centang" /></a>
                <?php endif; ?>
              </td>
              <td><?= $tb['prestasi']?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel8b/'.$tb['id_tabel8b'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_tabel8b/'.$tb['id_tabel8b'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
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
          <?php foreach ($jumlah_data_MA as $jd2): ?>
          <td>Jumlah mahasiswa aktif pada saat TS (NM)</td>
          <td>:</td>
          <td align="center" width="45px"><?= $jd2['mahasiswa_aktif']?></td>
          <td align="left">NIM</td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8b_jumlah_NI as $tb) : ?>
          <td>Jumlah prestasi akademik internasional (NI)</td>
          <td>:</td>
          <td align="center"><?= $tb['jumlah_ni']?></td>
          <td>NI</td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8b_jumlah_NN as $tb) : ?>
          <td>Jumlah prestasi akademik nasional (NN)</td>
          <td>:</td>
          <td align="center"><?= $tb['jumlah_nn']?></td>
          <td>NN</td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8b_jumlah_NW as $tb) : ?>
          <td>Jumlah prestasi akademik wilayah (NW)</td>
          <td>:</td>
          <td align="center"><?= $tb['jumlah_nw']?></td>
          <td>NW</td>
          <?php endforeach;?>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table class="">
        <tr>
          <?php foreach ($view_table8b_jumlah_NI as $tb) : ?>
            <?php foreach ($jumlah_data_MA as $jd2): ?>
              <td>RI</td>
              <td>:</td>
              <td align="center" width="200px"><?= ($tb['jumlah_ni']/$jd2['mahasiswa_aktif'])*100?></td>
              <td align="left">NI/NIM</td>
            <?php endforeach;?>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8b_jumlah_NN as $tb) : ?>
            <?php foreach ($jumlah_data_MA as $jd2): ?>
              <td>RN</td>
              <td>:</td>
              <td align="center"><?= ($tb['jumlah_nn']/$jd2['mahasiswa_aktif'])?></td>
              <td align="left">NN/NIM</td>
            <?php endforeach;?>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($view_table8b_jumlah_NW as $tb) : ?>
            <?php foreach ($jumlah_data_MA as $jd2): ?>
              <td>RW</td>
              <td>:</td>
              <td align="center"><?= ($tb['jumlah_nw']/$jd2['mahasiswa_aktif'])?></td>
              <td align="left">NW/NIM</td>
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
          <?php foreach ($view_table8b_jumlah_NI as $tb) : ?>
          <?php foreach ($view_table8b_jumlah_NN as $tb2) : ?>
          <?php foreach ($view_table8b_jumlah_NW as $tb3) : ?>
            <?php foreach ($jumlah_data_MA as $jd2): ?>
          <td>Pemenuhan IKU</td>
          <td> : </td>
          <td align="center"><?= (($tb['jumlah_ni']/$jd2['mahasiswa_aktif'])*100)+($tb2['jumlah_nn']/$jd2['mahasiswa_aktif'])+($tb3['jumlah_nw']/$jd2['mahasiswa_aktif'])?></td>
          <td align="left">RI >= 0.1% (0.001)</td>
            <?php endforeach;?>
          <?php endforeach;?>
          <?php endforeach;?>
          <?php endforeach;?>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Jika RI < IKU, tuliskan 0</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Jika RI ≥IKU, tuliskan nilainya</td>
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

			<form action="<?= base_url('admin_prodi/tambah_data8b'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukan Nama Kegiatan
            </div>
						<input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
					</div>
  					<div class="form-group">
              <div class="invalid-feedback>">
                Masukan Tahun Waktu Perolehan
              </div>
  						<input type="number" class="form-control" name="waktu_perolehan" placeholder="Tahun Waktu Perolehan" required>
  					</div>
  				<div class="form-group">
              <div class="invalid-feedback>">
                Nama Program Studi
              </div>
                <select name="id_prodi" id="id_prodi" class="custom-select custom-select-sm">
                  <option class="dropdown-item" selected> - pilih program studi - </option>
                  <?php
                    foreach ($prodi as $ps):
                  ?>
                    <option value="<?= $ps['id_prodi']?>" class="dropdown-item"><?= $ps['nama_prodi']?></option>
                  <?php endforeach;?>
                </select>
  				</div>
          <div class="form-group">
              <div class="invalid-feedback>">
                Tingkat (*Lokal/wilayah , Nasional , Internasional)
              </div>
                <select name="id_tingkat" class="custom-select custom-select-sm">
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
              Prestasi yang dicapai
            </div>
						<input type="textarea" class="form-control" name="prestasi" placeholder="prestasi" required>
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
