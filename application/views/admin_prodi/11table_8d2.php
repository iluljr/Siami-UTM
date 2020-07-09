<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.d.2 Kesesuaian Bidang Kerja Kuliah</h4>
      <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#databaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Data</a>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_8d2'); ?>" method="post">
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
              <th colspan="3">Jumlah lulusan dengan waktu tunggu mendapatkan pekerjaan</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th>Rendah</th>
              <th>Sedang</th>
              <th>Tinggi</th>
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
          <?php elseif (empty($view_table8d2)) : ?>
  						<tr>
  							<td colspan="7">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php
            foreach ($view_table8d2 as $tb) :
            ?>
            <tr>
              <td width="150px"><?= $tb['tahun']?> / <?= $tb['tahun']+1?></td>
              <td><?= $tb['jml_lulus']?></td>
              <td><?= $tb['jml_lulus_ter']?></td>
              <td><?= $tb['rendah']?></td>
              <td><?= $tb['sedang']?></td>
              <td><?= $tb['tinggi']?></td>
              <td><?php echo anchor('admin_prodi/edit_table8d2/'.$tb['id_table8d1'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin_prodi/hapus_table8d2/'.$tb['id_table8d1'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
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
              <th><?= $jd['rendah']?></th>
              <th><?= $jd['sedang']?></th>
              <th><?= $jd['tinggi']?></th>
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
          <td colspan="4">Jumlah lulusan yang sesuai bidang kategori tinggi</td>
          <td>:</td>
          <td><?= $jd['tinggi']?></td>
        </tr>
        <tr>
          <td colspan="4">Jumlah lulusan terlacak</td>
          <td>:</td>
          <td><?= $jd['jml_lulus_ter']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Persentase lulusan yang sesuai bidang</td>
          <td>:</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= ($jd['tinggi']/$jd['jml_lulus_ter'])*100?></td>
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
          <td>IKU No.11</td>
          <td>Pemenuhan IKU </td>
          <td>:</td>
          <?php if ($jd['jml_lulus_ter']==0) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00" style="color:#ffffff;"><?= ($jd['tinggi']/$jd['jml_lulus_ter'])*100?></td>
          <?php endif; ?>
          <td>(PBS > = 60%)</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PBS < 60% , tuliskan 0</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PBS >= 60%  tuliskan nilainya</td>
        </tr>
      </table>
      <?php endforeach;?>
      <?php endif; ?>
      </br>
      <p>RENDAH: jenis pekerjaan/posisi jabatan dalam pekerjaan tidak sesuai atau kurang sesuai
        dengan profil lulusan yang direncanakan dalam dokumen kurikulum.
        <br>SEDANG : Jenis pekerjaan/posisi jabatan dalam pekerjaan cukup sesuai dengan profil lulusan
        yang direncanakan dalam dokumen kurikulum.
        <br>TINGGI:  Jenis pekerjaan/posisi jabatan dalam pekerjaan sesuai atau sangat sesuai dengan
        profil lulusan yang direncanakan dalam dokumen kurikulum</p>
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

			<form action="<?= base_url('admin_prodi/tambah_data8d2'); ?>" method="POST" class="needs-validation" novalidate>
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
              <input type="text" class="form-control mb-2" name="rendah" id="wt_6" placeholder="Rendah" required>
              <input type="text" class="form-control mb-2" name="sedang" id="wt_18" placeholder="Sedang" required>
              <input type="text" class="form-control" name="tinggi" id="wt_lebih" placeholder="Tinggi" required>
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
