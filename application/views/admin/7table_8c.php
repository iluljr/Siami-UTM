<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.c Masa Studi Lulusan</h4>
      <table align="center">
        <tr>
          <td align="right">Tahun Ajaran :</td>
          <td>
            <div class="">
              <select name="dropdown" id="dropdown" class="custom-select custom-select-sm">
              <option class="dropdown-item" selected> - pilih tahun ajaran - </option>
              <?php
                foreach ($dropdown as $dd):
              ?>
                <option value="<?php echo $dd->tahun;?>" class="dropdown-item"><?php echo $dd->tahun; ?>/<?php echo $dd->tahun+1; ?></option>
              <?php endforeach;?>
            </select>
          </div>
          </td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td align="right">Nama Program Studi :</td>
          <td>
            <div class="">
              <select name="dropdown" id="dropdown" class="custom-select custom-select-sm">
              <option class="dropdown-item" selected> - pilih program studi - </option>
              <?php
                foreach ($prodi as $ps):
              ?>
                <option value="<?php echo $ps->id_prodi;?>" class="dropdown-item"><?php echo $ps->nama_prodi; ?></option>
              <?php endforeach;?>
            </select>
          </div>
          </td>
        </tr>
      </table>

      <!-- Data Table -->
      <div class="table-responsive">
        <table class="table table-bordered" width="1600px" cellspacing="0">
          <thead align="center">
            <tr>
              <th rowspan="2">Tahun Masuk</th>
              <th rowspan="2">Jumlah Mahasiswa Diterima</th>
              <th colspan="7">Jumlah Mahasiswa Yang Lulus Pada</th>
              <th rowspan="2">Jumlah Lulusan s.d. akhir TS</th>
              <th rowspan="2">Rata-rata Masa Studi</th>
              <th rowspan="2" colspan="2">Update</th>
            </tr>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
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
            <?php
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
              <td><?php echo anchor('admin/edit_tabel8c/'.$tb['id_tabel8c'],('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
              <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('admin/hapus_tabel8c/'.$tb['id_tabel8c'],('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div>
              </td>
            </tr>
          <?php endforeach;?>
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
          <td colspan="2">&nbsp;</td>
          <td>Skor Terbobot</td>
        </tr>
        <tr>
          <td colspan="4">Jumlah mahasiswa dengan masa studi <= 4 tahun</td>
          <td>:</td>
          <td>B dibobot 1.0</td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="4">Jumlah mahasiswa dengan masa studi > 4 tahun sampai < 7 tahun</td>
          <td>:</td>
          <td>C dibobot 0.5</td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="4">Jumlah mahasiswa</td>
          <td>:</td>
          <td>A</td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>Persentase Keberhasislan Studi</td>
          <td>:</td>
          <td>(B+C)/A</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>IKU No. 9</td>
          <td>Pemenuhan IKU </td>
          <td>:</td>
          <td>85%</td>
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
      <!-- End Data Table -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
