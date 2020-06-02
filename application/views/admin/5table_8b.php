<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.b.1 Prestasi Akademik Mahasiswa</h4>
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
              <th rowspan="2">No.</th>
              <th rowspan="2">Nama Kegiatan</th>
              <th rowspan="2">Waktu Perolehan (YYYY)</th>
              <th colspan="3">Tingkat</th>
              <th rowspan="2">Prestasi Yang Dicapai</th>
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
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </br>
      <table class="">
        <tr>
          <td>Jumlah mahasiswa aktif pada saat TS (NM)</td>
          <td>:</td>
          <td></td>
          <td>NIM</td>
        </tr>
        <tr>
          <td>Jumlah prestasi akademik internasional (NI)</td>
          <td>:</td>
          <td></td>
          <td>NI</td>
        </tr>
        <tr>
          <td>Jumlah prestasi akademik nasional (NN)</td>
          <td>:</td>
          <td></td>
          <td>NN</td>
        </tr>
        <tr>
          <td>Jumlah prestasi akademik wilayah (NW)</td>
          <td>:</td>
          <td></td>
          <td>NW</td>
        </tr>
        <tr>
          <td>RI</td>
          <td>:</td>
          <td></td>
          <td>NI/NIM</td>
        </tr>
        <tr>
          <td>RN</td>
          <td>:</td>
          <td></td>
          <td>NN/NIM</td>
        </tr>
        <tr>
          <td>RW</td>
          <td>:</td>
          <td></td>
          <td>NW/NIM</td>
        </tr>
        <tr>
          <td>Pemenuhan IKU</td>
          <td>:</td>
          <td></td>
          <td>RI >= 0.1% (0.001)</td>
        </tr>
        <tr>
          <td></td>
          <td>Jika RI < IKU, tuliskan 0</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>Jika RI ≥IKU, tuliskan nilainya</td>
          <td></td>
        </tr>
      </table>
      <!-- End Data Table -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
