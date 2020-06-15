<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
              <?php
                foreach ($tabel_8b as $tb ){
              ?>

              <form method="post" action="<?php echo base_url('admin_prodi/update_tabel8b'); ?>">
              <div class="form-group">
                <label>Masukan Nama Kegiatan</label>
                <input type="hidden" name="id_tabel8b" value="<?php echo $tb->id_tabel8b;?>">
                <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" value="<?php echo $tb->nama_kegiatan;?>">
              </div>
              <div class="form-group">
                <label>Masukan Tahun Waktu Perolehan</label>
                <input type="number" name="waktu_perolehan" class="form-control" placeholder="Tahun Perolehan" value="<?php echo $tb->waktu_perolehan;?>">
              </div>
              <div class="form-group">
                <label>Indeks Prestasi Kumulatif (*Min / Rata-rata / Max )</label>
                <select name="id_tingkat" class="custom-select custom-select-sm">
                  <option value="<?php echo $tb->id_tingkat;?>" class="dropdown-item" selected> - pilih Tingkat Prestasi - </option>
                  <?php
                    foreach ($tingkat as $ps):
                  ?>
                    <option value="<?php echo $ps->id_tingkat;?>" class="dropdown-item"><?php echo $ps->tingkat; ?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label>Prestasi yang dicapai</label>
                <input type="textarea" name="prestasi" class="form-control" placeholder="Prestasi yang dicapai" value="<?php echo $tb->prestasi;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
