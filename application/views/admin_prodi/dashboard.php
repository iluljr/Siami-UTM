  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sistem Audit Mutu Internal IAPS 4.0</h6>
        <form class="form-inline mb-2" action="<?= base_url('admin_prodi'); ?>" method="post">
        <table align="center" class="mt-4">
          <tr>
            <td align="right">Tahun Sekarang :</td>
            <td>
              <div class="">
                <select name="id_tahun" id="dropdown" class="custom-select custom-select-sm">
                  <?php foreach ($tahunsekarang_2b as $ts):?>
                    <option value="<?= $ts['tahun']?>" class="dropdown-item" selected> - pilih tahun sekarang - </option>
                  <?php endforeach;?>
                <?php
                  foreach ($dropdown as $dd):
                ?>
                  <option value="<?php echo $dd->tahun;?>" class="dropdown-item"><?php echo $dd->tahun; ?>/<?php echo $dd->tahun+1; ?></option>
                <?php endforeach;?>
              </select>
            </div>
            </td>
            <td>&nbsp;</td>
            <td align="right">Nama Program Studi :</td>
            <td>
              <div class="">
                <select name="id_prodi" id="dropdown" class="custom-select custom-select-sm">
                <option value="0" disabled="disabled" class="dropdown-item"> - pilih program studi - </option>
                <?php
                  foreach ($prodi as $ps):
                ?>
                  <option value="<?= $ps['id_prodi']?>" class="dropdown-item" selected><?= $ps['nama_prodi']?></option>
                <?php endforeach;?>
              </select>
            </div>
            </td>
            <td>&nbsp;</td>
            <td>
              <input type="submit" name="submit" value="Tampil Data" class="btn btn-sm  btn-primary ml-2">
            </td>
          </tr>
        </table>
      </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="2000px" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>&nbsp</th>
                <th>Kriteria Akreditasi Nasional (Klik Link)</th>
                <th>Uraian Kriteria</th>
                <th>Target Pemenuhan IKU</th>
                <th>Keterangan</th>
                <th>Laporan Kinerja</th>
                <th>Cross Reference dengan SM UB</th>
                <th>Pemenuhan IKU</th>
                <th>Skor Penilaian (Skor '1' jika tidak memenuhi dan skor '4' jika memenuhi)</th>
                <th>Keterangan (bukti dan alasan jika belum memenuhi) </th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($pilih_data)) : ?>
    						<tr>
    							<td colspan="11">
    								<div class="alert alert-primary" role="alert">
    									Silahkan Pilih Prodi terlebih dahulu!
    								</div>
    							</td>
    						</tr>
            <?php elseif (empty($view_table2a)) : ?>
    						<tr>
    							<td colspan="11">
    								<div class="alert alert-danger" role="alert">
    									Data tabel2a pada tahun dan prodi yang dipilih belum terisi data !
    								</div>
    							</td>
    						</tr>
              <?php elseif (empty($jumlah_dosen)) : ?>
                    <tr>
                      <td colspan="11">
                        <div class="alert alert-warning" role="alert">
                          Pada tabel2a jumlah dosen pada tahun atau prodi yang di pilih belum terinput !
                        </div>
                      </td>
                  </tr>
            <?php elseif (empty($view_table8a)) : ?>
      						<tr>
      							<td colspan="11">
      								<div class="alert alert-success" role="alert">
      									Semua Data tabel8a pada tahun dan prodi yang dipilih belum terisi data !
      								</div>
      							</td>
      						</tr>
            <?php elseif (empty($view_table8b)) : ?>
                  <tr>
                    <td colspan="11">
                      <div class="alert alert-success" role="alert">
                        Semua Data tabel8b pada tahun dan prodi yang dipilih belum terisi data !
                      </div>
                    </td>
                  </tr>
            <?php elseif (empty($view_table8c)) : ?>
                  <tr>
                    <td colspan="11">
                      <div class="alert alert-success" role="alert">
                        Semua Data tabel8c pada tahun dan prodi yang dipilih belum terisi data !
                      </div>
                    </td>
                  </tr>
            <?php elseif (empty($view_table8d1)) : ?>
                  <tr>
                    <td colspan="11">
                      <div class="alert alert-success" role="alert">
                        Semua Data tabel8d1 pada tahun dan prodi yang dipilih belum terisi data !
                      </div>
                    </td>
                  </tr>
            <?php elseif (empty($view_table8d2)) : ?>
                  <tr>
                    <td colspan="11">
                      <div class="alert alert-success" role="alert">
                        Semua Data tabel8d2 pada tahun dan prodi yang dipilih belum terisi data !
                      </div>
                    </td>
                  </tr>
            <?php elseif (empty($view_table8e1)) : ?>
                  <tr>
                    <td colspan="11">
                      <div class="alert alert-success" role="alert">
                        Semua Data tabel8e1 pada tahun dan prodi yang dipilih belum terisi data !
                      </div>
                    </td>
                  </tr>
    				<?php else: ?>
              <tr>
                <?php foreach ($jumlah_data as $jd): ?>
                  <td>1</td>
                  <td>K3</td>
                  <td><a href="<?= base_url("admin_prodi/table_2a")?>">C.3. Mahasiswa <br>C.3.4 Indikator Kinerja Utama <br>C.3.4 a) Kualitas input Mahasiswa <br>Tabel 2.a LKA Seleksi Mahasiswa </a></td>
                  <td>Rasio jumlah pendaftar terhadap jumlah mahasiswa baru</td>
                  <td>Rasio >= 5</td>
                  <td></td>
                  <td bgcolor="yellow">Rasio jumlah pendaftar terhadap jumlah mahasiswa baru adalah 11.3</td>
                  <td></td>
                  <td align="center"><?= $jd['pendaftar']/$jd['jmb_reguler']?></td>
                  <?php if (($jd['pendaftar']/$jd['jmb_reguler']) >= 5): ?>
                    <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                  <?php elseif ( ((4*($jd['pendaftar']/$jd['jmb_reguler']))/5) < 4 && ((4*($jd['pendaftar']/$jd['jmb_reguler']))/5) > 1 ): ?>
                    <td align="center" bgcolor="yellow"><p style="color: white;"><?=(4*($jd['pendaftar']/$jd['jmb_reguler']))/5?></p></td>
                  <?php else: ?>
                    <td align="center" bgcolor="red"><p style="color: white;"><?=(4*($jd['pendaftar']/$jd['jmb_reguler']))/5?></p></td>
                  <?php endif; ?>
                  <td></td>
                <?php endforeach;?>
              </tr>
              <tr>
                <td>2</td>
                <td>K3</td>
                <td><a href="<?= base_url("admin_prodi/table_2b")?>">Tabel 2.b Mahasiswa Asing</a></td>
                <td>Persentase jumlah mahasiswa asing terhadap jumlah seluruh mahasiswa</td>
                <td>PMA >=1%</td>
                <td></td>
                <td bgcolor="yellow">Persentase jumlah mahasiswa asing terhadap jumlah seluruh mahasiswa adalah 0 %</td>
                <td></td>
                <?php foreach ($view_table2a_jumlahmhs as $jmblh) : ?>
                  <td><?= ($jmblh['jmblh_jma_penuh']+$jmblh['jmblh_jma_paruh'])/$jmblh['jmblh_jma_reg']?></td>

                  <?php if ((($jmblh['jmblh_jma_penuh']+$jmblh['jmblh_jma_paruh'])/$jmblh['jmblh_jma_reg']) >= 1): ?>
                    <td align="center" bgcolor="blue"><p style="color: white;">B = 4</p></td>
                  <?php else: ?>
                    <td align="center" bgcolor="yellow"><p style="color: black;">B = <?=(2+(200*(($jmblh['jmblh_jma_penuh']+$jmblh['jmblh_jma_paruh'])/$jmblh['jmblh_jma_reg'])))?></p></td>
                  <?php endif; ?>

                <?php endforeach;?>
                <td></td>
              </tr>
              <tr>
                <?php foreach ($jumlah_data_MA as $jd2): ?>
                  <?php foreach ($jumlah_dosen as $jdosen): ?>
                    <td>3</td>
                    <td>K4</td>
                    <td><a href="<?= base_url("admin_prodi/table_2a")?>">C.4. Sumber Daya Manusia <br> C.4.4. Indikator Kinerja Utama <br> C.4.4.a) Profil Dosen <br> Tabel 3.a. LKA Dosen</a></td>
                    <td>Rasio jumlah mahasiswa PS terhadap jumlah DTPS. </td>
                    <td>15 <= RMD <= 25 (eksakta/sains tehnologi) 25 <= RMD <= 35 (sosial humaniora)</td>
                    <td></td>
                    <td bgcolor="yellow"></td>
                    <td>Pasal 49 ayat 2 (tetapi fakultas bukan PS)</td>
                    <td><?= $jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']?></td>

                    <?php if (($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']) >= 15 && ($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']) <= 25): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php elseif ( ($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']) < 15 ): ?>
                      <td align="center" bgcolor="yellow"><p style="color: white;"><?=(4*($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']))/15?></p></td>
                    <?php elseif ( ($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']) > 25 && ($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen']) <= 35 ): ?>
                      <td align="center" bgcolor="yellow"><p style="color: white;"><?=(70-(2*($jd2['mahasiswa_aktif']/$jdosen['jumlah_dosen'])))/5?></p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="red"><p style="color: white;">0</p></td>
                    <?php endif;?>

                    <td></td>
                  <?php endforeach;?>
                <?php endforeach;?>
              </tr>
              <tr>
                <?php foreach ($jumlah_data_MA as $jdA): ?>
                  <?php foreach ($jumlah_data_MB as $jdB): ?>
                    <td>4</td>
                    <td>K4</td>
                    <td><a href="<?= base_url("admin_prodi/table_2a")?>">C.4. Sumber Daya Manusia <br> C.4.4. Indikator Kinerja Utama <br> C.4.4.a) Profil Dosen <br> Tabel 3.a. LKA Dosen</a></td>
                    <td>Rasio total mahasiswa baru pada TS, terhadap total mahasiswa dalam lima tahun terakhir</td>
                    <td>0.18 ≤ RM < 0.22</td>
                    <td></td>
                    <td bgcolor="yellow"> </td>
                    <td></td>
                    <td><?= $jdB['mahasiswa_baru']/$jdA['mahasiswa_aktif']?></td>

                    <?php if (0.18 <= ($jdB['mahasiswa_baru']/$jdA['mahasiswa_aktif']) && ($jdB['mahasiswa_baru']/$jdA['mahasiswa_aktif']) < 0.21): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="red"><p style="color: white;">1</p></td>
                    <?php endif;?>

                    <td></td>
                  <?php endforeach;?>
                <?php endforeach;?>
              </tr>
              <tr>
                <td>5</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8a")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Rata Rata IPK lulusan </td>
                <td>RIPK >= 3.25</td>
                <td></td>
                <td bgcolor="yellow">rata rata ipk lulusan adalah 3.3</td>
                <td>Pasal 42 Ayat 1 dan 2 (capaian ip minimal kelulusan)</td>
                <?php foreach ($table8a_rata as $rt): ?>

                <td><?= $rt['IPK_rata']?></td>

                <?php if ($rt['IPK_rata'] >= 3.25): ?>
                  <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                <?php elseif ($rt['IPK_rata'] < 3.25 && $rt['IPK_rata'] >= 2.00): ?>
                  <td align="center" bgcolor="yellow"><p style="color: white;"><?=((8*($rt['IPK_rata']))-6)/5?></p></td>
                <?php else: ?>
                  <td align="center" bgcolor="white"><p style="color: black;">2</p></td>
                <?php endif;?>

                <?php endforeach; ?>

                <td></td>
              </tr>
              <tr>
                <td>6</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8b")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Jumlah penghargaan atau prestasi di bidang akademik mahasiswa dalam 3 tahun terakhir.</td>
                <td>RI>=0,1%</td>
                <td>RI = NI / NM<br>
                  RN = NN / NM<br>
                  RW = NW / NM<br>
                  NI = Jumlah prestasi akademik internasional. NN = Jumlah prestasi akademik nasional. NW = Jumlah prestasi akademik wilayah. <br>
                  NM = Jumlah mahasiswa aktif pada saat TS.</td>
                <td bgcolor="yellow">Jumlah penghargaan atau prestasi di bidang akademik mahasiswa dalam 3 tahun terakhir adalah 0.3</td>
                <td></td>
                <?php foreach ($view_table8b_jumlah_NI as $tb) : ?>
                <?php foreach ($view_table8b_jumlah_NN as $tb2) : ?>
                <?php foreach ($view_table8b_jumlah_NW as $tb3) : ?>
                  <?php foreach ($jumlah_data_MA as $jd2): ?>

                    <td><?= (($tb['jumlah_ni']/$jd2['mahasiswa_aktif'])*100)+($tb2['jumlah_nn']/$jd2['mahasiswa_aktif'])+($tb3['jumlah_nw']/$jd2['mahasiswa_aktif'])?></td>

                    <?php if (($tb['jumlah_ni']/$jd2['mahasiswa_aktif']) >= 0.001): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php elseif (($tb['jumlah_ni']/$jd2['mahasiswa_aktif']) < 0.001 && ($tb2['jumlah_nn']/$jd2['mahasiswa_aktif']) >= 0.01): ?>
                      <td align="center" bgcolor="yellow"><p style="color: black;"><?=(3+(($tb['jumlah_ni']/$jd2['mahasiswa_aktif'])/0.001))?></p></td>
                    <?php elseif (($tb['jumlah_ni']/$jd2['mahasiswa_aktif']) < 0.001 && ($tb['jumlah_ni']/$jd2['mahasiswa_aktif']) > 0 && ($tb2['jumlah_nn']/$jd2['mahasiswa_aktif']) < 0.01 && ($tb2['jumlah_nn']/$jd2['mahasiswa_aktif']) > 0 ): ?>
                      <td align="center" bgcolor="yellow"><p style="color: black;"><?=(2+(2*(($tb['jumlah_ni']/$jd2['mahasiswa_aktif'])/0.001))+(($tb2['jumlah_nn']/$jd2['mahasiswa_aktif'])/0.01)-((($tb['jumlah_ni']/$jd2['mahasiswa_aktif'])*($tb2['jumlah_nn']/$jd2['mahasiswa_aktif']))/(0.001*0.01)) )?></p></td>
                    <?php elseif (($tb['jumlah_ni']/$jd2['mahasiswa_aktif']) == 0 && ($tb2['jumlah_nn']/$jd2['mahasiswa_aktif']) == 0 && ($tb3['jumlah_nw']/$jd2['mahasiswa_aktif']) >= 0.02 ): ?>
                      <td align="center" bgcolor="white"><p style="color: black;">2</p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="red"><p style="color: white;"><?=(2*($tb3['jumlah_nw']/$jd2['mahasiswa_aktif']))/0.02?></p></td>
                    <?php endif;?>

                  <?php endforeach;?>
                <?php endforeach;?>
                <?php endforeach;?>
                <?php endforeach;?>

                <td></td>
              </tr>
              <tr>
                <td>7</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8c")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Masa studi dalam 3 tahun terakhir</td>
                <td>3.5 < MS <= 4.5 </td>
                <td></td>
                <td bgcolor="yellow">Masa studi dalam 3 tahun terakhir adalah 4.9</td>
                <td>Pasal 31 Ayat 1a (masa studi sarjana)</td>
                <?php foreach ($view_table8c_jml as $tb) : ?>

                  <td><?= $tb['rata_rata']/4?></td>

                <?php if (3.5 < ($tb['rata_rata']/4) && ($tb['rata_rata']/4) <= 4.5): ?>
                  <td align="center" bgcolor="blue"><p style="color: black;">4</p></td>
                <?php elseif (3 < ($tb['rata_rata']/4) && ($tb['rata_rata']/4) <= 3.5): ?>
                  <td align="center" bgcolor="yellow"><p style="color: black;"><?=((8*($tb['rata_rata']/4))-24)?></p></td>
                <?php elseif (4.5 < ($tb['rata_rata']/4) && ($tb['rata_rata']/4) <= 7): ?>
                  <td align="center" bgcolor="yellow"><p style="color: black;"><?=((56-(8*($tb['rata_rata']/4)))/5)?></p></td>
                <?php else: ?>
                  <td align="center" bgcolor="red"><p style="color: white;">0</p></td>
                <?php endif;?>

                <?php endforeach; ?>

                <td></td>
              </tr>
              <tr>
                <td>8</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8c")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Persentase kelulusan tepat waktu.</td>
                <td>PTW >= 50%</td>
                <td></td>
                <td bgcolor="yellow">Persentase kelulusan tepat waktu. Adalah 8.2 % kurang dari PTW >= 50%</td>
                <td></td>
                <?php foreach ($view_table8c_jml_ts3 as $ts3) : ?>
                  <td><?= $ts3['ts']/$ts3['mhs_diterima']*100?></td>
                <?php if (($ts3['ts']/$ts3['mhs_diterima']*100) >= 50): ?>
                  <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                <?php else: ?>
                  <td align="center" bgcolor="yellow"><p style="color: black;"><?=(1+(6*($ts3['ts']/$ts3['mhs_diterima'])))?></p></td>
                <?php endif;?>

                <?php endforeach; ?>

                <td></td>
              </tr>
              <tr>
                <td>9</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8c")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Persentase keberhasilan studi</td>
                <td>PPS >= 85%</td>
                <td></td>
                <td bgcolor="yellow">Persentase keberhasilan studi adalah 70.1 %, dan kurang dari target pemenuhan PPS >= 85</td>
                <td></td>
                <?php foreach ($view_table8c_jml_ts3_ts6 as $tss) : ?>
                  <?php foreach ($view_table8c_jml as $tb) : ?>
                    <td><?= ((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs'])*100?></td>

                    <?php if ((((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs'])*100) >= 85): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php elseif (((((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs'])*100) >= 30) && ((((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs'])*100) < 85)) : ?>
                      <td align="center" bgcolor="yellow"><p style="color: black;"><?=(((80*((($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+($tss['jmb6'])+($tb['jumlah_mhs']-($tss['jmb']+$tss['jmb1']+$tss['jmb2']+$tss['jmb3']+$tss['jmb4']+$tss['jmb5']+$tss['jmb6']))*0.5))/$tb['jumlah_mhs']))-24)/11)?></p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="red"><p style="color: white;">0</p></td>
                    <?php endif;?>

                  <?php endforeach; ?>
                <?php endforeach; ?>

                <td>Prosentase keberhasilan lulusan tidak memenuhi PPS >= 85%</td>
              </tr>
              <tr>
                <td>10</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8d1")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Waktu tunggu lulusan untuk bekerja (mendapatkan pekerjaan atau berwirausaha) yang relevan dengan bidang studi</td>
                <td>WT <= 6 bulan</td>
                <td></td>
                <td bgcolor="yellow">Waktu tunggu lulusan untuk bekerja (mendapatkan pekerjaan atau berwirausaha) yang relevan dengan bidang studi adalah </td>
                <td>Tracer Study/UPKK</td>
                <?php foreach ($jumlah_data_8d1 as $jd8): ?>
                    <td><?= (18-(($jd8['wt_6']*3)+($jd8['wt_18']*12)+($jd8['wt_lebih']*24))/($jd8['wt_6']+$jd8['wt_18']+$jd8['wt_lebih']))/3?></td>

                    <?php if (((18-(($jd8['wt_6']*3)+($jd8['wt_18']*12)+($jd8['wt_lebih']*24))/($jd8['wt_6']+$jd8['wt_18']+$jd8['wt_lebih']))/3) <= 6): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="red"><p style="color: white;">1</p></td>
                    <?php endif;?>

                <?php endforeach; ?>

                <td></td>
              </tr>
              <tr>
                <td>11</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8d2")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Kesesuaian bidang kerja lulusan dengan bidang studi (instrumen tracer studi)</td>
                <td>PBS ≥ 60%</td>
                <td></td>
                <td bgcolor="yellow">Kesesuaian bidang kerja lulusan dengan bidang studi (instrumen tracer studi) adalah 16.5 %</td>
                <td>Tracer Study/UPKK</td>
                <?php foreach ($jumlah_data_8d2 as $jd82): ?>
                    <td><?= ($jd82['tinggi']/$jd82['jml_lulus_ter'])*100?></td>

                    <?php if ((($jd82['tinggi']/$jd82['jml_lulus_ter'])*100) >= 60): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="yellow"><p style="color: black;"><?=((20*($jd82['tinggi']/$jd82['jml_lulus_ter']))/3)?></p></td>
                    <?php endif;?>

                <?php endforeach; ?>

                <td></td>
              </tr>
              <tr>
                <td>12</td>
                <td>K9</td>
                <td><a href="<?= base_url("admin_prodi/table_8e1")?>">C.9. Luaran dan Capaian Tridharma<br>C.9.4. Indikator Kinerja Utama<br>C.9.4.a) Pendidikan</a></td>
                <td>Tingkat dan ukuran tempat kerja lulusan.</td>
                <td>RI >= 5%</td>
                <td>RI = (NI / NA) x 100%
                  <br>RN = (NN / NA) x 100%
                  <br>RL = (NL / NA) x 100%
                  <br>Faktor: a = 5% , b = 20% , c = 90% .
                  <br>NI = Jumlah lulusan yang bekerja di badan usaha tingkat internasional/multi nasional.
                  <br>NN = Jumlah lulusan yang bekerja di badan usaha tingkat nasional atau berwirausaha yang berizin.
                  <br>NL = Jumlah lulusan yang bekerja di badan usaha tingkat wilayah/lokal atau berwirausaha tidak berijin</td>
                <td bgcolor="yellow">Tingkat dan ukuran tempat kerja lulusan. Adalah 0.02 %</td>
                <td>Tracer Study/UPKK</td>
                <?php foreach ($jumlah_data_8e as $jd8e): ?>
                    <td><?= ($jd8e['internasional']/$jd8e['jml_lulus_ter'])*100/100?></td>

                    <?php if ((($jd8e['internasional']/$jd8e['jml_lulus_ter'])*100/100) >= 5): ?>
                      <td align="center" bgcolor="blue"><p style="color: white;">4</p></td>
                    <?php else: ?>
                      <td align="center" bgcolor="red"><p style="color: white;">1</p></td>
                    <?php endif;?>

                <?php endforeach; ?>

                <td></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
