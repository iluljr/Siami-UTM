<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.d.1 Waktu Tunggu Lulusan</h4>
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
              <th colspan="3">Jumlah lulusan dengan waktu tunggu mendapatkan pekerjaan</th>
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
            </tr>
          </tfoot>
        </table>
      </div>
    </br>
      <table class="">
        <tr>
          <td colspan="4">Persentase lulusan dengan waktu tunggu < 6 bulan</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="4">Persentase lulusan dengan waktu tunggu < 6 bulan</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="4">Persentase lulusan dengan waktu tunggu < 6 bulan</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="4">Persentase lulusan dengan waktu tunggu < 6 bulan</td>
          <td>:</td>
          <td></td>
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
          <td>100%</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PBS < 60% , tuliskan 0</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="2">Jika PBS >= 60%  tuliskan nilainya</td>
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
        </tr>
      </table>
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
