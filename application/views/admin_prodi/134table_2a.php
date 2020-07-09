<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 2a. Seleksi Mahasiswa Baru</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_2a'); ?>" method="post">
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
              <th rowspan="2">Tahun Akademik</th>
              <th rowspan="2">Daya Tampung</th>
              <th colspan="2">Jumlah Calon Mahasiswa</th>
              <th colspan="2">Jumlah Mahasiswa Baru</th>
              <th colspan="2">Jumlah Mahasiswa Aktif</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>Pendaftar</th>
              <th>Lulus Seleksi</th>
              <th>Reguler</th>
              <th>Transfer*)</th>
              <th>Reguler</th>
              <th>Transfer*)</th>
            </tr>
            <tr align="center">
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
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
          <?php elseif (empty($view_table2a)) : ?>
  						<tr>
  							<td colspan="12">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            foreach ($view_table2a as $tb) :
            ?>
            <tr align="center">
              <td><?= $tb['tahun']?> / <?= $tb['tahun']+1?></td>
              <td><?= $tb['daya_tampung']?></td>
              <td><?= $tb['pendaftar']?></td>
              <td><?= $tb['lulus_seleksi']?></td>
              <td><?= $tb['jmb_reguler']?></td>
              <td><?= $tb['jmb_transfer']?></td>
              <td><?= $tb['jma_reguler']?></td>
              <td><?= $tb['jma_transfer']?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel2a/'.$tb['id_tabel2a'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_tabel2a/'.$tb['id_tabel2a'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
          <tfoot>
            <tr align="center">
              <th colspan="2">Jumlah</th>
              <?php foreach ($jumlah_data as $jd): ?>
              <th><?= $jd['pendaftar']?></th>
              <th><?= $jd['lulus_seleksi']?></th>
              <th><?= $jd['jmb_reguler']?></th>
              <th><?= $jd['jmb_transfer']?></th>
              <?php endforeach;?>
                <?php foreach ($jumlah_data_MA as $jd2): ?>
              <th colspan="2"><?= $jd2['mahasiswa_aktif']?></th>
              <th colspan="2">Update</th>
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
        <?php foreach ($jumlah_data as $jd): ?>
          <td>Rasio pendaftar dan mahasiswa baru</td>
          <td>:</td>
          <?php if ($jd['pendaftar']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= $jd['pendaftar']/$jd['jmb_reguler']?></td>
          <?php endif; ?>
        <?php endforeach;?>
        <td></td>
        <td></td>
        <td align="center" bgcolor="#FAEBD7">IKU No.1</td>
      </tr>
      <tr>
          <td>Jumlah Mahasiswa Aktif</td>
          <td>: </td>
          <?php foreach ($jumlah_data_MA as $jd2): ?>
          <td align="center"><?= $jd2['mahasiswa_aktif']?></td>
          <?php endforeach;?>
      </tr>
      <tr>
          <td>Jumlah Dosen Tetap PS</td>
          <td>: </td>
          <?php foreach ($jumlah_dosen as $jdosen): ?>
          <td align="center"><?= $jdosen['jumlah_dosen']?></td>
          <td align="center"><a href="" data-toggle="modal" data-target="#dosenEdit<?= $jdosen['id_dosen']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a></td>
          <td align="center"><a href="" data-toggle="modal" data-target="#databaru_dosen" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i></td>
          <?php endforeach;?>
      </tr>
      <tr>
          <td>Rasio Dosen dan Mahasiswa</td>
          <td>: </td>
          <?php foreach ($jumlah_data_MA as $jd2): ?>
            <?php foreach ($jumlah_dosen as $jdosen): ?>
              <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= $jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']?></td>
            <?php endforeach;?>
          <?php endforeach;?>
          <td></td>
          <td></td>
        <td align="center" bgcolor="#FAEBD7">IKU No.3</td>
      </tr>
      <tr height="15px">
          <td></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
          <td>Rasio mahasiswa baru terhadap total mahasiswa</td>
          <td>: </td>
            <?php foreach ($jumlah_data_MA as $jdA): ?>
              <?php foreach ($jumlah_data_MB as $jdB): ?>
                <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= $jdB['mahasiswa_baru']/$jdA['mahasiswa_aktif']?></td>
              <?php endforeach;?>
            <?php endforeach;?>
            <td></td>
            <td></td>
            <td align="center" bgcolor="#FAEBD7">IKU No.4</td>
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

			<form action="<?= base_url('admin_prodi/tambah_data2a'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukan Tahun Ajaran
            </div>
						<input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Ajaran" required>
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
              Jumlah Daya Tampung
            </div>
						<input type="text" class="form-control" name="dayatampung" id="dayatampung" placeholder="Daya Tampung" required>
					</div>
					<div class="form-group">
            <div class="invalid-feedback>">
              Jumlah Calon Mahasiswa
            </div>
						<input type="text" class="form-control mb-2" name="pendaftar" id="pendaftar" placeholder="Pendaftar" required>
						<input type="text" class="form-control" name="lulusseleksi" id="lulusseleksi" placeholder="Lulus Seleksi" required>
					</div>
            <div class="form-group">
              <div class="invalid-feedback>">
                Jumlah Mahasiswa Baru
              </div>
              <input type="text" class="form-control mb-2" name="regulerb" id="regulerb" placeholder="Reguler" required>
              <input type="text" class="form-control" name="transferb" id="transferb" placeholder="Transfer" required>
            </div>
          <div class="form-group">
            <div class="invalid-feedback>">
              Jumlah Mahasiswa Aktif
            </div>
            <input type="text" class="form-control mb-2" name="regulera" id="regulera" placeholder="Reguler" required>
            <input type="text" class="form-control" name="transfera" id="transfera" placeholder="Transfer" required>
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

<!-- Modal Tambah Dosen -->
<div class="modal fade" id="databaru_dosen" tabindex="-1" role="dialog" aria-labelledby="DataBaru_dosen" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="DataBaru">Tambah Data dosen Tetap PS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('admin_prodi/tambah_dosen'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukan Tahun Ajaran
            </div>
						<input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Ajaran" required>
					</div>
          <div class="form-group">
              <div class="invalid-feedback>">
                Nama Program Studi
              </div>
                <select name="id_prodi" id="id_prodi" class="custom-select custom-select-sm">
                  <option disabled="disabled" class="dropdown-item" selected> - pilih program studi - </option>
                  <?php
                    foreach ($prodi as $ps):
                  ?>
                    <option value="<?= $ps['id_prodi']?>" class="dropdown-item"><?= $ps['nama_prodi']?></option>
                  <?php endforeach;?>
                </select>
  					</div>
					<div class="form-group">
            <div class="invalid-feedback>">
              Jumlah dosen
            </div>
						<input type="text" class="form-control" name="jumlah_dosen" id="jumlah_dosen" placeholder="Jumlah Dosen" required>
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

<?php foreach ($jumlah_dosen as $jdosen): ?>
<!-- Modal Edit -->
<div class="modal fade" id="dosenEdit<?= $jdosen['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="pelamarEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pelamarEditLabel">Edit Data Pelamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin_prodi/edit_tabel2a_dosen/' . $jdosen['id_dosen']); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Jumlah Dosen</label>
            <input type="hidden" name="id_dosen" value="<?= $jdosen['id_dosen']?>">
            <input type="text" class="form-control" id="jumlah_dosen" name="jumlah_dosen" value="<?= $jdosen['jumlah_dosen']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>
