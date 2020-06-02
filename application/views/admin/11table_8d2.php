<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
      <h4>Table 8.d.2 Kesesuaian Bidang Kerja Kuliah</h4>
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
          <td colspan="4">Jumlah lulusan yang sesuai bidang kategori tinggi</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="4">Jumlah lulusan terlacak</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Persentase lulusan yang sesuai bidang</td>
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
          <td>PBS > = 60%</td>
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
