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

      <form class="form-inline mb-2" action="<?= base_url('admin/table_2a'); ?>" method="post">
        <p class="mr-2 pt-2">Tahun Ajaran :</p>
        <select name="id_tahun" class="custom-select custom-select-sm">
          <option value="id_tahun" class="dropdown-item"> - pilih tahun ajaran - </option>
          <?php
            foreach ($dropdown as $dd):
          ?>
            <option value="<?php echo $dd->tahun;?>" class="dropdown-item"><?php echo $dd->tahun; ?>/<?php echo $dd->tahun+1; ?></option>
          <?php endforeach;?>
        </select>
        <input type="submit" name="submit" value="Tampil Data" class="btn btn-sm  btn-primary ml-2">
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
              <td><?php echo anchor('admin/edit_tabel2a/'.$tb['id_tabel2a'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin/hapus_tabel2a/'.$tb['id_tabel2a'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
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
      <table class="">
        <tr>
          <?php foreach ($jumlah_data as $jd): ?>
            <td>Rasio pendaftar dan mahasiswa baru</td>
            <td>:</td>
            <td><?= $jd['pendaftar']/$jd['jmb_reguler']?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($jumlah_data_MA as $jd2): ?>
            <td>Jumlah Mahasiswa Aktif</td>
            <td>: </td>
            <td><?= $jd2['mahasiswa_aktif']?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <?php foreach ($jumlah_dosen as $jdosen): ?>
            <td>Jumlah Dosen Tetap PS</td>
            <td>: </td>
            <td><?= $jdosen['jumlah_dosen']?></td>
          <?php endforeach;?> 
        </tr>
        <tr>
          <?php foreach ($jumlah_data_MA as $jd2): ?>
            <?php foreach ($jumlah_dosen as $jdosen): ?>
              <td>Rasio Dosen dan Mahasiswa</td>
              <td>: </td>
              <td><?= $jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']?></td>
            <?php endforeach;?> 
          <?php endforeach;?> 
        </tr>
        <tr>
          <?php foreach ($jumlah_data_MA as $jdA): ?>
            <?php foreach ($jumlah_data_MB as $jdB): ?>
              <td>Rasio mahasiswa baru terhadap total mahasiswa</td>
              <td>: </td>
              <td><?= $jdB['mahasiswa_baru']/$jdA['mahasiswa_aktif']?></td>
            <?php endforeach;?> 
          <?php endforeach;?>
        </tr>
      </table>
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

			<form action="<?= base_url('admin/tambah_data2a'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukan Tahun Ajaran
            </div>
						<input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Ajaran" required>
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
