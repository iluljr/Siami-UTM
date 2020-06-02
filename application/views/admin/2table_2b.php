<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 2b. Mahasiswa Asing</h4>
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
                <option value="<?php echo $dd->id_tahun_ajaran;?>" class="dropdown-item"><?php echo $dd->tahun; ?>/<?php echo $dd->tahun+1; ?></option>
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
          <thead>
          <thead align="center">
            <tr>
              <th rowspan="2">No.</th>
              <th rowspan="2">Program Studi</th>
              <th colspan="3">Jumlah Mahasiswa Aktif</th>
              <th colspan="3">Jumlah Mahasiswa Asing Penuh Waktu</th>
              <th colspan="3">Jumlah Mahasiswa Asing Paruh Waktu</th>
            </tr>
            <tr>
              <th>ts-2</th>
              <th>ts-1</th>
              <th>ts</th>
              <th>ts-2</th>
              <th>ts-1</th>
              <th>ts</th>
              <th>ts-2</th>
              <th>ts-1</th>
              <th>ts</th>
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
              <td>9</td>
              <td>10</td>
              <td>11</td>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2">Total</th>
              <th colspan="3"></th>
              <th colspan="3"></th>
              <th colspan="3"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </br>
      <table class="">
        <tr>
          <td>Jumlah Mahasiswa Asing</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Jumlah Total Mahasiswa</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Persentase mahasiswa asing dan total mahasiswa</td>
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
