<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8a. IPK Lulusan</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_8a'); ?>" method="post">
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
              <th rowspan="2">No.</th>
              <th rowspan="2">Tahun Lulus</th>
              <th rowspan="2">Jumlah Lulusan</th>
              <th colspan="3">Indeks Prestasi Kumulatif</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>Min.</th>
              <th>Rata-rata</th>
              <th>Maks</th>
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
            <?php if (empty($pilih_data)) : ?>
  						<tr>
  							<td colspan="12">
  								<div class="alert alert-primary" role="alert">
  										Silahkan pilih tahun dan Tampil data untuk menampilkan data!
  								</div>
  							</td>
  						</tr>
          <?php elseif (empty($view_table8a)) : ?>
  						<tr>
  							<td colspan="12">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            foreach ($view_table8a as $tb) :
            ?>
            <tr align="center">
              <td> </td>
              <td><?= $tb['tahun_lulus']?></td>
              <td><?= $tb['jumlah_lulusan']?></td>
              <td><?= $tb['ipk_min']?></td>
              <td><?= $tb['ipk_rata']?></td>
              <td><?= $tb['ipk_max']?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel8a/'.$tb['id_tabel8a'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_tabel8a/'.$tb['id_tabel8a'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
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
          <?php foreach ($table8a_rata as $jml) : ?>
          <td>Rata-rata</td>
          <td>:</td>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= $jml['IPK_rata']?></td>
          <?php endforeach;?>
        </tr>
        <tr>
          <td></td>
          <td></td>
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

			<form action="<?= base_url('admin_prodi/tambah_data8a'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
            <div class="invalid-feedback>">
              Masukan Tahun Lulus
            </div>
						<input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Tahun Lulus" required>
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
                Indeks Prestasi Kumulatif
              </div>
              <input type="text" class="form-control mb-2" name="ipk_min" id="ipk_min" placeholder="IPK Minimum" required>
              <input type="text" class="form-control mb-2" name="ipk_rata" id="ipk_rata" placeholder="IPK Rata-Rata" required>
              <input type="text" class="form-control mb-2" name="ipk_max" id="ipk_max" placeholder="IPK Maximum" required>
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
