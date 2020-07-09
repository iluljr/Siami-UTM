<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
              <?php
                foreach ($tabel_8a as $tb ){
              ?>

              <form method="post" action="<?php echo base_url('admin_prodi/update_tabel8a'); ?>">
              <div class="form-group">
                <label>Tahun Lulusan</label>
                <input type="hidden" name="id_tabel8a" value="<?php echo $tb->id_tabel8a;?>">
                <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulusan" value="<?php echo $tb->tahun_lulus;?>">
              </div>
              <div class="form-group">
                <label>Daya Tampung</label>
                <input type="text" name="jumlah_lulusan" class="form-control" placeholder="Jumlah Lulusan" value="<?php echo $tb->jumlah_lulusan;?>">
              </div>
              <div class="form-group">
                <label>Indeks Prestasi Kumulatif (*Min / Rata-rata / Max )</label>
                <input type="text" name="ipk_min" class="form-control" placeholder="IPK Minimum" value="<?php echo $tb->ipk_min;?>">
                <input type="text" name="ipk_rata" class="form-control" placeholder="IPK Rata-Rata" value="<?php echo $tb->ipk_rata;?>">
                <input type="text" name="ipk_max" class="form-control" placeholder="IPK Maximum" value="<?php echo $tb->ipk_max;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
