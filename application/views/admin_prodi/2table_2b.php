<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 2b. Mahasiswa Asing</h4>
      <form class="form-inline mb-2" action="<?= base_url('admin_prodi/table_2b'); ?>" method="post">
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
          <thead>
          <thead align="center">
            <tr>
              <th rowspan="2">No.</th>
              <th rowspan="2">Program Studi</th>
              <th colspan="3">Jumlah Mahasiswa Aktif</th>
              <th colspan="3">Jumlah Mahasiswa Asing Penuh Waktu</th>
              <th colspan="3">Jumlah Mahasiswa Asing Paruh Waktu</th>
              <th rowspan="2" colspan="3">Update</th>
            </tr>
            <tr>
              <?php foreach ($tahunsekarang_2b as $ts): ?>
              <th><?= $ts['tahun']-2?></th>
              <th><?= $ts['tahun']-1?></th>
              <th><?= $ts['tahun']?></th>
              <th><?= $ts['tahun']-2?></th>
              <th><?= $ts['tahun']-1?></th>
              <th><?= $ts['tahun']?></th>
              <th><?= $ts['tahun']-2?></th>
              <th><?= $ts['tahun']-1?></th>
              <th><?= $ts['tahun']?></th>
              <?php endforeach;?>
            </tr>
            <tr align="center">
              <?php foreach ($tahunsekarang_2b as $ts): ?>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
              <td>9</td>
              <td>10</td>
              <td>11</td>
              <th><?= $ts['tahun']-2?></th>
              <th><?= $ts['tahun']-1?></th>
              <th><?= $ts['tahun']?></th>
              <?php endforeach;?>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pilih_data)) : ?>
  						<tr>
  							<td colspan="14">
  								<div class="alert alert-primary" role="alert">
  											Silahkan pilih tahun dan Tampil data untuk menampilkan data!
  								</div>
  							</td>
  						</tr>
          <?php elseif (empty($view_table2b)) : ?>
  						<tr>
  							<td colspan="14">
  								<div class="alert alert-danger" role="alert">
  									Data not found!
  								</div>
  							</td>
  						</tr>
  					<?php endif; ?>
            <?php foreach ($view_table2b as $tb) : ?>
              <?php foreach ($view_table2b_min1 as $tb1) : ?>
                <?php foreach ($view_table2b_min2 as $tb2) : ?>
            <tr align="center">
              <td> </td>
              <td><?= $tb['nama_prodi']?></td>
              <td><?= $tb2['jma_reguler']?></td>
              <td><?= $tb1['jma_reguler']?></td>
              <td><?= $tb['jma_reguler']?></td>
              <td><?= $tb2['jma_penuh']?></td>
              <td><?= $tb1['jma_penuh']?></td>
              <td><?= $tb['jma_penuh']?></td>
              <td><?= $tb2['jma_paruh']?></td>
              <td><?= $tb1['jma_paruh']?></td>
              <td><?= $tb['jma_paruh']?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel2b/'.($tb['tahun']-2),('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel2b/'.($tb['tahun']-1),('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><?php echo anchor('admin_prodi/edit_tabel2b/'.$tb['tahun'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              </td>
            </tr>
              <?php endforeach;?>
            <?php endforeach;?>
          <?php endforeach;?>
          </tbody>
          <tfoot>
            <?php foreach ($view_table2b_jumlahmhs as $jmblh) : ?>
            <tr align="center">
              <th colspan="2">Total</th>
              <th colspan="3"><?= $jmblh['jmblh_jma_reg']?></th>
              <th colspan="3"><?= $jmblh['jmblh_jma_penuh']?></th>
              <th colspan="3"><?= $jmblh['jmblh_jma_paruh']?></th>
              <th colspan="3">Update</th>
            </tr>
            <?php endforeach;?>
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
        <?php foreach ($view_table2b_jumlahmhs as $jmblh) : ?>
        <tr>
          <td>Jumlah Mahasiswa Asing</td>
          <td>:</td>
          <td align="center"><?= $jmblh['jmblh_jma_penuh']+$jmblh['jmblh_jma_paruh']?></td>
        </tr>
        <tr>
          <td>Jumlah Total Mahasiswa</td>
          <td>:</td>
          <td align="center"><?= $jmblh['jmblh_jma_reg']?></td>
        </tr>
        <tr>
          <td>Persentase mahasiswa asing dan total mahasiswa</td>
          <td >:</td>
          <?php if(empty($tss['jmb'])) : ?>
            <td>&nbsp;</td>
          <?php else: ?>
            <td align="center" bgcolor="#00FF00"><?= ($jmblh['jmblh_jma_penuh']+$jmblh['jmblh_jma_paruh'])/$jmblh['jmblh_jma_reg']?></td>
          <?php endif; ?>
          <td width="100px"></td>
          <td align="center" bgcolor="#FAEBD7">IKU No.2</td>
        </tr>
        <?php endforeach;?>
      </table>
      <?php endif; ?>
      <!-- End Data Table -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
