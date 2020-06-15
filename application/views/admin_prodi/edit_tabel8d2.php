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

              <form method="post" action="<?php echo base_url('admin_prodi/update_table8d2'); ?>">
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
                <label>Jumlah lulusan dengan waktu tunggu mendapatkan pekerjaan  (*WT < 6 bulan / 6 ≤ WT ≤ 18 bulan / WT > 18 bulan )</label>
                <input type="text" name="rendah" class="form-control" placeholder="Rendah" value="<?php echo $tb->rendah;?>">
                <input type="text" name="sedang" class="form-control" placeholder="Sedang" value="<?php echo $tb->sedang;?>">
                <input type="text" name="tinggi" class="form-control" placeholder="Tinggi" value="<?php echo $tb->tinggi;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
