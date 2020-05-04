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
      <table class="table-responsive mb-3">
        <tr>
          <td align="right">Tahun Ajaran :</td>
          <td>
            <div>
              <select name="dropdown" id="dropdown" class="custom-select custom-select-sm">
                <option class="dropdown-item" selected> - pilih tahun ajaran - </option>
                <?php
                  foreach ($dropdown as $dd):
                ?>
                  <option value="<?php echo $dd->id_tahun_ajaran;?>" class="dropdown-item"><?php echo $dd->tahun; ?>/<?php echo $dd->tahun+1; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </td>
          <td>
            <button class="btn btn-sm btn-primary">Tampil data</button>
          </td>
        </tr>
      </table>

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
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2">Jumlah</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th colspan="2"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </br>
      <table class="">
        <tr>
          <td>Rasio pendaftar dan mahasiswa baru</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Jumlah Mahasiswa Aktif</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Jumlah Dosen Tetap PS</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Rasio Dosen dan Mahasiswa</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Rasio mahasiswa baru terhadap total mahasiswa</td>
          <td>:</td>
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

			<form action="<?= base_url('admin/table_2a'); ?>" method="POST" class="needs-validation" novalidate>
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
