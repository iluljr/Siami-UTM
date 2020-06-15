<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
              <?php
                foreach ($table_8d1 as $tb ){
              ?>

              <form method="post" action="<?php echo base_url('admin_prodi/update_table8e1'); ?>">
              <div class="form-group">
                <label>Tahun Lulusan</label>
                <input type="hidden" name="id_table8d1" value="<?php echo $tb->id_table8d1;?>">
                <input type="text" name="tahun" class="form-control" placeholder="Tahun Lulusan" value="<?php echo $tb->tahun;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Lulusan</label>
                <input type="text" name="jml_lulus" class="form-control" placeholder="Jumlah Lulusan" value="<?php echo $tb->jml_lulus;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Lulusan yang Terlacak</label>
                <input type="text" name="jml_lulus_ter" class="form-control" placeholder="Jumlah Lulusan Terlacak" value="<?php echo $tb->jml_lulus_ter;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Lulusan yang Telah Bekerja/ Berwirausaha</label>
                <input type="text" name="berwirausaha" class="form-control" placeholder="Jumlah Lulusan yang Telah Bekerja/ Berwirausaha" value="<?php echo $tb->berwirausaha;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Lulusan yang Bekerja Berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausa  (*local / nasional / internasional )</label>
                <input type="text" name="lokal" class="form-control" placeholder="Lokal/ Wilayah/ Berwirausaha tidak Berbadan Hukum" value="<?php echo $tb->lokal;?>">
                <input type="text" name="nasional" class="form-control" placeholder="Nasional/ Berwirausaha Berbadan Hukum" value="<?php echo $tb->nasional;?>">
                <input type="text" name="internasional" class="form-control" placeholder="Multinasiona/ Internasional" value="<?php echo $tb->internasional;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
