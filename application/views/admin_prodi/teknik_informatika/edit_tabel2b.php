<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
              <?php
                foreach ($tabel_2a as $tb ){
              ?>

              <form method="post" action="<?php echo base_url('admin_prodi/update_tabel2b'); ?>">
              <div class="form-group">
                <label>Jumlah Mahasiswa Aktif ( <?php echo $tb->tahun;?> )</label>
                <input type="hidden" name="tahun" value="<?php echo $tb->tahun;?>">
                <input type="text" name="jma_reguler" class="form-control" placeholder="Mahasiswa Aktif" value="<?php echo $tb->jma_reguler;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Mahasiswa Asing Penuh Waktu ( <?php echo $tb->tahun;?> )</label>
                <input type="text" name="jma_penuh" class="form-control" placeholder="Mahasiswa Asing Penuh Waktu" value="<?php echo $tb->jma_penuh;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Mahasiswa Asing Paruh Waktu ( <?php echo $tb->tahun;?> )</label>
                <input type="text" name="jma_paruh" class="form-control" placeholder="Mahasiswa Asing Paruh Waktu" value="<?php echo $tb->jma_paruh;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
