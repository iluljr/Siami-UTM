  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="1600px" cellspacing="0">
            <thead>
                <th>No</th>
                <th>&nbsp</th>
                <th>Kriteria Akreditasi Nasional (Klik Link)</th>
                <th>Uraian Kriteria</th>
                <th>Target Pemenuhan IKU</th>
                <th>Keterangan</th>
                <th>Laporan Kinerja</th>
                <th>Cross Reference dengan SM UB</th>
                <th>Pemenuhan IKU</th>
                <th>Skor Penilaian</th>
                <th>Keterangan (bukti dan alasan jika belum memenuhi) </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($jumlah_data as $jd): ?>
                  <td>1</td>
                  <td>K3</td>
                  <td><a href="<?= base_url("admin/table_2a")?>">C.3. Mahasiswa <br>C.3.4 Indikator Kinerja Utama <br>C.3.4 a) Kualitas input Mahasiswa <br>Tabel 2.a LKA Seleksi Mahasiswa </a></td>
                  <td>Rasio jumlah pendaftar terhadap jumlah mahasiswa baru</td>
                  <td>Rasio >= 5</td>
                  <td></td>
                  <td bgcolor="yellow">Rasio jumlah pendaftar terhadap jumlah mahasiswa baru adalah 11.3</td>
                  <td></td>
                  <td align="center"><?= $jd['pendaftar']/$jd['jmb_reguler']?></td>
                  
                  <td align="center"> 4 </td>
                  <td></td>
                <?php endforeach;?>
              </tr>
              <tr>
                <td>2</td>
                <td>K3</td>
                <td><a href="<?= base_url("admin/table_2b")?>">Tabel 2.b Mahasiswa Asing</a></td>
                <td>Persentase jumlah mahasiswa asing terhadap jumlah seluruh mahasiswa</td>
                <td>PMA >=1%</td>
                <td></td>
                <td bgcolor="yellow">Persentase jumlah mahasiswa asing terhadap jumlah seluruh mahasiswa adalah 0 %</td>
                <td></td>
                <?php foreach ($view_table2a_jumlahmhs as $jmblh) : ?>
                  <td><?= ($jmblh['jmblh_jma_penuh']+$jmblh['jmblh_jma_paruh'])/$jmblh['jmblh_jma_reg']?></td>
                <?php endforeach;?>
                <td align="center">1</td>
                <td></td>
              </tr>
              <tr>
                <?php foreach ($jumlah_data_MA as $jd2): ?>
                  <?php foreach ($jumlah_dosen as $jdosen): ?>
                    <td>3</td>
                    <td>K4</td>
                    <td><a href="<?= base_url("admin/table_2a")?>">C.4. Sumber Daya Manusia <br> C.4.4. Indikator Kinerja Utama <br> C.4.4.a) Profil Dosen <br> Tabel 3.a. LKA Dosen</a></td>
                    <td>Rasio jumlah mahasiswa PS terhadap jumlah DTPS. </td>
                    <td>15 <= RMD <= 25 (eksakta/sains tehnologi) 25 <= RMD <= 35 (sosial humaniora)</td>
                    <td></td>
                    <td bgcolor="yellow"></td>
                    <td>Pasal 49 ayat 2 (tetapi fakultas bukan PS)</td>
                    <td><?= $jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']?></td>
                    <td></td>
                    <td></td>
                  <?php endforeach;?>
                <?php endforeach;?>
              </tr>
              <tr>
                <?php foreach ($jumlah_data_MA as $jdA): ?>
                  <?php foreach ($jumlah_data_MB as $jdB): ?>
                    <td>4</td>
                    <td>K4</td>
                    <td><a href="<?= base_url("admin/table_2a")?>">C.4. Sumber Daya Manusia <br> C.4.4. Indikator Kinerja Utama <br> C.4.4.a) Profil Dosen <br> Tabel 3.a. LKA Dosen</a></td>
                    <td>Rasio total mahasiswa baru pada TS, terhadap total mahasiswa dalam lima tahun terakhir</td>
                    <td>0.18 ≤ RM < 0.22</td>
                    <td></td>
                    <td bgcolor="yellow"> </td>
                    <td></td>
                    <td><?= $jdB['mahasiswa_baru']/$jdA['mahasiswa_aktif']?></td>
                    <td></td>
                    <td></td>
                  <?php endforeach;?>
                <?php endforeach;?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
