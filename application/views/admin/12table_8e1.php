<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.e.1 Tempat Kerja Lulusan</h4>
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
              <th rowspan="2">Tahun Lulus</th>
              <th rowspan="2">Jumlah Lulusan</th>
              <th rowspan="2">Jumlah Lulusan yang Terlacak</th>
              <th rowspan="2">Jumlah Lulusan yang Telah Bekerja/ Berwirausaha</th>
              <th colspan="3">Jumlah Lulusan yang Bekerja Berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausa</th>
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
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <td>Jumlah</td>
              <td></td>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </br>
      <table class="">
        <tr>
          <td colspan="6">Persentase lulusan terlacak dari total lulusan</td>
          <td>NI</td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan yang bekerja di badan usaha tingkat internasional/multi nasional.</td>
          <td>NN</td>
          <td>:</td>
          <td>RI = (NI / NA) x 100%</td>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan yang bekerja di badan usaha tingkat nasional atau berwirausaha yang berizin.</td>
          <td>NL</td>
          <td>:</td>
          <td>RN = (NN / NA) x 100%</td>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan yang bekerja di badan usaha tingkat wilayah/lokal atau berwirausaha tidak berijin</td>
          <td>NA</td>
          <td>:</td>
          <td>RL = (NL / NA) x 100% </td>
        </tr>
        <tr>
          <td colspan="6">Jumlah lulusan terlacak</td>
          <td>NA</td>
          <td>:</td>
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
          <td>:</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>RN</td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>RL</td>
          <td>:</td>
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
      <!-- End Data Table -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
