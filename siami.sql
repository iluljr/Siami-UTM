-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Waktu pembuatan: 11 Bulan Mei 2020 pada 05.36
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11
=======
-- Waktu pembuatan: 30 Apr 2020 pada 12.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188

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

<<<<<<< HEAD
DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
=======
CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Struktur dari tabel `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_dosen` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `dosen_ibfk_1` (`tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `jumlah_dosen`, `tahun_ajaran`) VALUES
(1, 32, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(251) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `jenjang`;
CREATE TABLE IF NOT EXISTS `jenjang` (
  `id_jenjang` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `prodi`;
CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(255) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `id_fakultas` (`id_fakultas`),
  KEY `id_jenjang` (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
=======
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188

--
-- Dumping data untuk tabel `prodi`
--

<<<<<<< HEAD
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
=======
INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Elektro'),
(3, 'Teknik Industri'),
(4, 'Teknik Mekatronika'),
(5, 'Sistem Informasi');
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_2a`
--

<<<<<<< HEAD
DROP TABLE IF EXISTS `tabel_2a`;
CREATE TABLE IF NOT EXISTS `tabel_2a` (
  `id_tabel2a` int(11) NOT NULL AUTO_INCREMENT,
=======
CREATE TABLE `tabel_2a` (
  `id_tabel2a` int(11) NOT NULL,
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188
  `id_tahun` int(11) NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `pendaftar` int(11) NOT NULL,
  `lulus_seleksi` int(11) NOT NULL,
  `jmb_reguler` int(11) NOT NULL,
  `jmb_transfer` int(11) NOT NULL,
  `jma_reguler` int(11) NOT NULL,
<<<<<<< HEAD
  `jma_transfer` int(11) NOT NULL,
  PRIMARY KEY (`id_tabel2a`),
  KEY `tahun` (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_2a`
--

INSERT INTO `tabel_2a` (`id_tabel2a`, `id_tahun`, `daya_tampung`, `pendaftar`, `lulus_seleksi`, `jmb_reguler`, `jmb_transfer`, `jma_reguler`, `jma_transfer`) VALUES
(1, 1, 149, 1130, 144, 114, 10, 434, 19),
(2, 2, 174, 1529, 174, 147, 3, 584, 17),
(3, 3, 139, 2081, 139, 126, 13, 585, 22),
(4, 4, 240, 1960, 247, 187, 6, 631, 26),
(5, 5, 120, 1403, 166, 141, 18, 645, 30);
=======
  `jma_transfer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

<<<<<<< HEAD
DROP TABLE IF EXISTS `tahun_ajaran`;
CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
=======
CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188

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

--
<<<<<<< HEAD
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
=======
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tabel_2a`
--
ALTER TABLE `tabel_2a`
  ADD PRIMARY KEY (`id_tabel2a`),
  ADD KEY `tahun` (`id_tahun`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_2a`
--
ALTER TABLE `tabel_2a`
  MODIFY `id_tabel2a` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--
>>>>>>> 77dda7c1e91d6a70445dd512f62a807b445ee188

--
-- Ketidakleluasaan untuk tabel `tabel_2a`
--
ALTER TABLE `tabel_2a`
  ADD CONSTRAINT `tabel_2a_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
