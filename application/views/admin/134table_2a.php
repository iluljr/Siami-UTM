<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 2a</h4>
      <table class="table">
        <tr>
          <td align="right">Tahun Ajaran :</td>
          <td>
            <div class="col-md-4">
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
        </tr>
      </table>

      <!-- Data Table -->
      <div class="table-responsive">
        <table class="table table-bordered" width="1600px" cellspacing="0">
          <thead>
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
