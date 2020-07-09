<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
    </div>
    <div class="card-body">
              <?php
                foreach ($tabel_8c as $tb ){
              ?>

              <form method="post" action="<?php echo base_url('admin_prodi/update_tabel8c'); ?>">
              <div class="form-group">
                <label>Tahun Masuk</label>
                <input type="hidden" name="id_tabel8c" value="<?php echo $tb->id_tabel8c;?>">
                <input type="text" name="tahun_masuk" class="form-control" placeholder="tahun_masuk" value="<?php echo $tb->tahun_masuk;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Mahasiswa diterima</label>
                <input type="number" name="mhs_diterima" class="form-control" placeholder="mhs_diterima" value="<?php echo $tb->mhs_diterima;?>">
              </div>
              <div class="form-group">
                <label>Jumlah Mahasiswa yang lulus pada</label>
                <input type="text" class="form-control mb-2" name="ts_6" value="<?php echo $tb->ts_6;?>" placeholder="Akhir TahunSekarang-6" >
                <input type="texttext" class="form-control mb-2" name="ts_5" value="<?php echo $tb->ts_5;?>"  placeholder="Akhir TahunSekarang-5" >
                <input type="text" class="form-control mb-2" name="ts_4" value="<?php echo $tb->ts_4;?>" placeholder="Akhir TahunSekarang-4" >
                <input type="text" class="form-control mb-2" name="ts_3" value="<?php echo $tb->ts_3;?>" placeholder="Akhir TahunSekarang-3" >
                <input type="text" class="form-control mb-2" name="ts_2" value="<?php echo $tb->ts_2;?>" placeholder="Akhir TahunSekarang-2">
                <input type="text" class="form-control mb-2" name="ts_1" value="<?php echo $tb->ts_1;?>" placeholder="Akhir TahunSekarang-1">
                <input type="text" class="form-control mb-2" name="ts" value="<?php echo $tb->ts;?>" placeholder="Akhir TahunSekarang" >
              </div>
              <div class="form-group">
                <label>Rata Rata Masa Studi</label>
                <input type="text" name="rata_studi" class="form-control" placeholder="Rata Studi" value="<?php echo $tb->rata_studi;?>">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php } ?>
            </div>
	</div>
</div>
