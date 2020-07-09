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

              <form method="post" action="<?php echo base_url('admin_prodi/update_tabel2a'); ?>">
              <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="hidden" name="id_tabel2a" value="<?php echo $tb->id_tabel2a;?>">
                <input type="text" name="tahun" class="form-control" placeholder="Tahun_akademik" value="<?php echo $tb->tahun;?>">
              </div>
              <div class="form-group">
                <label>Daya Tampung</label>
                <input type="text" name="dayatampung" class="form-control" placeholder="Daya_tampung" value="<?php echo $tb->daya_tampung;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Calon Mahsiswa (*pendaftar / lulus seleksi)</label>
                <input type="text" name="pendaftar" class="form-control" placeholder="Pendaftar" value="<?php echo $tb->pendaftar;?>">
                <input type="text" name="lulusseleksi" class="form-control" placeholder="lulus_seleksi" value="<?php echo $tb->lulus_seleksi;?>">
              </div>
              <div class="form-group">
                <label>jumlah Mahasiswa Baru (*regular / transfer)</label>
                <input type="text" name="regulerb" class="form-control" placeholder="Regular" value="<?php echo $tb->jmb_reguler;?>">
                <input type="text" name="transferb" class="form-control" placeholder="Transfer" value="<?php echo $tb->jmb_transfer;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Mahasiswa aktif (*regular / transfer)</label>
                <input type="text" name="regulera" class="form-control" placeholder="Regular" value="<?php echo $tb->jma_reguler;?>">
                <input type="text" name="transfera" class="form-control" placeholder="Transfer" value="<?php echo $tb->jma_transfer;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
