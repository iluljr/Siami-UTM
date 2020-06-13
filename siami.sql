-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2020 pada 13.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siami`
--
CREATE DATABASE IF NOT EXISTS `siami` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `siami`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `jumlah_dosen` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `jumlah_dosen`, `tahun_ajaran`) VALUES
(1, 32, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(251) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Hukum'),
(2, 'Ekonomi dan Bisnis'),
(3, 'Pertanian'),
(4, 'Teknik'),
(5, 'Ilmu Sosial dan Ilmu Budaya (FISIB)'),
(6, 'Keguruan dan Ilmu Pendidikan (FKIP)'),
(7, 'Ilmu-Ilmu Keislaman (FIK)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `jenjang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `jenjang`) VALUES
(1, 'D3'),
(2, 'S1'),
(3, 'S2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id_fakultas`, `id_jenjang`) VALUES
(1, 'Teknik Informatika', 4, 2),
(2, 'Teknik Elektro', 4, 2),
(3, 'Teknik Industri', 4, 2),
(4, 'Teknik Mekatronika', 4, 2),
(5, 'Sistem Informasi', 4, 2),
(6, 'Manajemen Informatika', 4, 1),
(7, 'Ilmu Hukum', 1, 2),
(8, ' Manajemen', 2, 2),
(9, 'Akuntansi', 2, 2),
(10, 'Ekonomi Pembangunan', 2, 2),
(11, 'Akuntansi Sektor Publik', 2, 1),
(12, 'Enterpreneurship', 2, 1),
(13, 'Teknologi Industri Pertanian', 3, 2),
(14, 'Agribisnis', 3, 2),
(15, 'Agroekoteknologi ', 3, 2),
(16, 'Ilmu Kelautan', 3, 2),
(17, 'Sosiologi ', 5, 2),
(18, 'Sastra Inggris', 5, 2),
(19, 'Ilmu Komunikasi', 5, 2),
(20, 'Psikologi', 5, 2),
(21, 'PGSD', 6, 2),
(22, 'Pendidikan Informatika', 6, 2),
(23, 'Pendidikan IPA', 6, 2),
(24, 'Pendidikan Anak Usia Dini', 6, 2),
(25, 'Pendidikan bahasa dan sastra indonesia', 6, 2),
(26, 'Hukum Bisnis Syariah', 7, 2),
(27, 'Ekonomi Syariah', 7, 2),
(28, 'Ilmu Ekonomi', 2, 3),
(29, 'Manajemen', 2, 3),
(30, 'Akuntansi Forensik', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_2a`
--

CREATE TABLE `tabel_2a` (
  `id_tabel2a` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `pendaftar` int(11) NOT NULL,
  `lulus_seleksi` int(11) NOT NULL,
  `jmb_reguler` int(11) NOT NULL,
  `jmb_transfer` int(11) NOT NULL,
  `jma_reguler` int(11) NOT NULL,
  `jma_transfer` int(11) NOT NULL,
  `jma_penuh` int(11) NOT NULL,
  `jma_paruh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_2a`
--

INSERT INTO `tabel_2a` (`id_tabel2a`, `tahun`, `id_prodi`, `daya_tampung`, `pendaftar`, `lulus_seleksi`, `jmb_reguler`, `jmb_transfer`, `jma_reguler`, `jma_transfer`, `jma_penuh`, `jma_paruh`) VALUES
(1, 2016, 1, 149, 1130, 144, 114, 10, 434, 19, 0, 0),
(2, 2017, 1, 174, 1529, 174, 147, 3, 584, 17, 0, 0),
(3, 2018, 1, 139, 2081, 139, 126, 13, 585, 22, 0, 0),
(4, 2019, 1, 240, 1960, 247, 187, 6, 631, 26, 0, 0),
(5, 2020, 1, 120, 1403, 166, 141, 18, 645, 30, 0, 0),
(7, 2015, 1, 654, 343, 235, 532, 235, 674, 45, 0, 0),
(8, 2021, 1, 550, 3123, 3131, 321, 17, 674, 46, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_8a`
--

CREATE TABLE `tabel_8a` (
  `id_tabel8a` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `jumlah_lulusan` int(11) NOT NULL,
  `ipk_min` float NOT NULL,
  `ipk_rata` float NOT NULL,
  `ipk_max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_8a`
--

INSERT INTO `tabel_8a` (`id_tabel8a`, `id_prodi`, `tahun_lulus`, `jumlah_lulusan`, `ipk_min`, `ipk_rata`, `ipk_max`) VALUES
(1, 1, 2020, 92, 3.01, 3.39, 3.86),
(2, 1, 2019, 100, 2.71, 3.35, 3.36),
(3, 1, 2018, 128, 1.9, 3.2, 3.85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_8b`
--

CREATE TABLE `tabel_8b` (
  `id_tabel8b` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nama_kegiatan` varchar(500) DEFAULT NULL,
  `waktu_perolehan` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `prestasi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_8b`
--

INSERT INTO `tabel_8b` (`id_tabel8b`, `id_prodi`, `nama_kegiatan`, `waktu_perolehan`, `id_tingkat`, `prestasi`) VALUES
(1, 1, 'A', 2020, 1, NULL),
(2, 1, 'B', 2018, 3, NULL),
(3, 1, 'C', 2018, 3, NULL),
(4, 1, 'D', 2018, 2, 'Juara 2 Membuat Game sederhana dengan Unity3D'),
(5, 1, 'A', 2017, 3, ''),
(6, 1, 'A', 2019, 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_8c`
--

CREATE TABLE `tabel_8c` (
  `id_tabel8c` int(11) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `mhs_diterima` int(11) NOT NULL,
  `ts_6` int(11) DEFAULT NULL,
  `ts_5` int(11) DEFAULT NULL,
  `ts_4` int(11) DEFAULT NULL,
  `ts_3` int(11) DEFAULT NULL,
  `ts_2` int(11) DEFAULT NULL,
  `ts_1` int(11) DEFAULT NULL,
  `ts` int(11) DEFAULT NULL,
  `rata_studi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_8c`
--

INSERT INTO `tabel_8c` (`id_tabel8c`, `tahun_masuk`, `id_prodi`, `mhs_diterima`, `ts_6`, `ts_5`, `ts_4`, `ts_3`, `ts_2`, `ts_1`, `ts`, `rata_studi`) VALUES
(1, 2017, 1, 134, NULL, NULL, NULL, NULL, NULL, NULL, 11, 4),
(2, 2016, 1, 174, NULL, NULL, NULL, NULL, NULL, 2, 29, 4.94),
(3, 2015, 1, 149, NULL, NULL, NULL, NULL, 5, 40, 27, 5.31),
(4, 2014, 1, 124, NULL, NULL, NULL, 2, 83, 18, 16, 5.4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_8d1`
--

CREATE TABLE `table_8d1` (
  `id_table8d1` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `jml_lulus` int(11) NOT NULL,
  `jml_lulus_ter` int(11) NOT NULL,
  `wt_6` int(11) NOT NULL,
  `wt_18` int(11) NOT NULL,
  `wt_lebih` int(11) NOT NULL,
  `rendah` int(11) NOT NULL,
  `sedang` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berwirausaha` int(11) NOT NULL,
  `lokal` int(11) NOT NULL,
  `nasional` int(11) NOT NULL,
  `internasional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_8d1`
--

INSERT INTO `table_8d1` (`id_table8d1`, `tahun`, `id_prodi`, `jml_lulus`, `jml_lulus_ter`, `wt_6`, `wt_18`, `wt_lebih`, `rendah`, `sedang`, `tinggi`, `berwirausaha`, `lokal`, `nasional`, `internasional`) VALUES
(1, 2016, 1, 120, 84, 8, 46, 30, 28, 45, 11, 74, 26, 45, 2),
(2, 2015, 1, 101, 74, 13, 38, 23, 21, 39, 14, 65, 35, 38, 1),
(3, 2014, 1, 120, 84, 8, 46, 30, 28, 45, 11, 74, 26, 45, 2),
(4, 2016, 3, 200, 108, 42, 13, 8, 0, 0, 0, 0, 0, 0, 0),
(6, 2018, 1, 124, 89, 10, 46, 33, 25, 48, 16, 76, 41, 46, 2),
(7, 2017, 1, 105, 74, 13, 38, 23, 21, 39, 14, 65, 35, 38, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun`) VALUES
(1, 2016),
(2, 2017),
(3, 2018),
(4, 2019),
(5, 2020),
(6, 2015),
(7, 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_prestasi`
--

CREATE TABLE `tingkat_prestasi` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tingkat_prestasi`
--

INSERT INTO `tingkat_prestasi` (`id_tingkat`, `tingkat`) VALUES
(1, 'Lokal/Wilayah'),
(2, 'Nasional'),
(3, 'Internasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_data`
--

CREATE TABLE `user_access_data` (
  `id` int(11) NOT NULL,
  `akun` int(11) NOT NULL,
  `prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_data`
--

INSERT INTO `user_access_data` (`id`, `akun`, `prodi`) VALUES
(15, 1, 1),
(16, 1, 2),
(17, 1, 3),
(18, 1, 4),
(19, 1, 5),
(20, 1, 6),
(21, 1, 7),
(22, 1, 30),
(23, 1, 8),
(24, 1, 9),
(25, 1, 10),
(26, 1, 11),
(27, 1, 12),
(28, 1, 13),
(29, 1, 14),
(30, 1, 15),
(31, 1, 16),
(32, 1, 17),
(33, 1, 18),
(34, 1, 19),
(35, 1, 20),
(36, 1, 21),
(37, 1, 22),
(38, 1, 23),
(39, 1, 24),
(40, 1, 25),
(41, 1, 26),
(42, 1, 27),
(43, 1, 28),
(44, 1, 29),
(45, 4, 1),
(47, 4, 3),
(48, 4, 2),
(49, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(10, 2, 10),
(11, 3, 11),
(12, 4, 12),
(23, 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `ket`) VALUES
(1, 'admin', 'Akses level tertinggi'),
(2, 'Admin prodi', 'Akses level admin prodi'),
(3, 'Dosen', 'Akses level dosen'),
(4, 'Mahasiswa', 'Akses level mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Menu'),
(9, 'User'),
(10, 'Admin'),
(11, 'Dosen'),
(12, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(34, 1, 'Data Audit', 'admin', 'fas fa-fw fa-table', 1),
(35, 1, 'Table 2.a', 'admin/table_2a', 'fas fa-fw fa-table', 1),
(36, 1, 'Table 2.b', 'admin/table_2b', 'fas fa-fw fa-table', 1),
(37, 1, 'Table 8.a', 'admin/table_8a', 'fas fa-fw fa-table', 1),
(38, 1, 'Table 8.b', 'admin/table_8b', 'fas fa-fw fa-table', 1),
(39, 1, 'Table 8.c', 'admin/table_8c', 'fas fa-fw fa-table', 1),
(40, 1, 'Table 8.d.1', 'admin/table_8d1', 'fas fa-fw fa-table', 1),
(41, 1, 'Table 8.d.2', 'admin/table_8d2', 'fas fa-fw fa-table', 1),
(42, 1, 'Table 8.e.1', 'admin/table_8e1', 'fas fa-fw fa-table', 1),
(99, 9, 'Manajemen User', 'admin/user_akun', 'fas fa-fw fa-user', 1),
(109, 9, 'Data Akses', 'admin/level', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`level`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `dosen_ibfk_1` (`tahun_ajaran`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indeks untuk tabel `tabel_2a`
--
ALTER TABLE `tabel_2a`
  ADD PRIMARY KEY (`id_tabel2a`),
  ADD KEY `prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tabel_8a`
--
ALTER TABLE `tabel_8a`
  ADD PRIMARY KEY (`id_tabel8a`),
  ADD KEY `prodi_tabel8a` (`id_prodi`);

--
-- Indeks untuk tabel `tabel_8b`
--
ALTER TABLE `tabel_8b`
  ADD PRIMARY KEY (`id_tabel8b`),
  ADD KEY `prodi_tabel8b` (`id_prodi`),
  ADD KEY `tingkat_prestasi` (`id_tingkat`);

--
-- Indeks untuk tabel `tabel_8c`
--
ALTER TABLE `tabel_8c`
  ADD PRIMARY KEY (`id_tabel8c`),
  ADD KEY `prodi_tabel8c` (`id_prodi`);

--
-- Indeks untuk tabel `table_8d1`
--
ALTER TABLE `table_8d1`
  ADD PRIMARY KEY (`id_table8d1`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indeks untuk tabel `tingkat_prestasi`
--
ALTER TABLE `tingkat_prestasi`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indeks untuk tabel `user_access_data`
--
ALTER TABLE `user_access_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_data_ibfk_1` (`akun`),
  ADD KEY `user_access_data_ibfk_2` (`prodi`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_menu_ibfk_2` (`menu_id`),
  ADD KEY `menu_id` (`role_id`) USING BTREE;

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tabel_2a`
--
ALTER TABLE `tabel_2a`
  MODIFY `id_tabel2a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_8a`
--
ALTER TABLE `tabel_8a`
  MODIFY `id_tabel8a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_8b`
--
ALTER TABLE `tabel_8b`
  MODIFY `id_tabel8b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_8c`
--
ALTER TABLE `tabel_8c`
  MODIFY `id_tabel8c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `table_8d1`
--
ALTER TABLE `table_8d1`
  MODIFY `id_table8d1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tingkat_prestasi`
--
ALTER TABLE `tingkat_prestasi`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_data`
--
ALTER TABLE `user_access_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `user_level` (`id`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prodi_ibfk_2` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Ketidakleluasaan untuk tabel `tabel_2a`
--
ALTER TABLE `tabel_2a`
  ADD CONSTRAINT `prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tabel_8a`
--
ALTER TABLE `tabel_8a`
  ADD CONSTRAINT `prodi_tabel8a` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_8b`
--
ALTER TABLE `tabel_8b`
  ADD CONSTRAINT `prodi_tabel8b` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `tingkat_prestasi` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat_prestasi` (`id_tingkat`);

--
-- Ketidakleluasaan untuk tabel `tabel_8c`
--
ALTER TABLE `tabel_8c`
  ADD CONSTRAINT `prodi_tabel8c` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `table_8d1`
--
ALTER TABLE `table_8d1`
  ADD CONSTRAINT `table_8d1_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `user_access_data`
--
ALTER TABLE `user_access_data`
  ADD CONSTRAINT `user_access_data_ibfk_1` FOREIGN KEY (`akun`) REFERENCES `akun` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_data_ibfk_2` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id_prodi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
