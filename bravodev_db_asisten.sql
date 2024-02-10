-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 10, 2024 at 02:03 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bravodev_db_asisten`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_absen_kehadiran`
--

CREATE TABLE `t_absen_kehadiran` (
  `kd_hadir` int(5) NOT NULL,
  `peserta_kd` varchar(30) NOT NULL,
  `agenda_kd` int(5) NOT NULL,
  `tgl_absen` datetime NOT NULL,
  `prov_kd` int(4) NOT NULL,
  `kab_kd` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `kd_admin` int(11) NOT NULL,
  `level_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwordnya` text NOT NULL,
  `last_login` date DEFAULT NULL,
  `kd_sidik` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`kd_admin`, `level_admin`, `username`, `passwordnya`, `last_login`, `kd_sidik`) VALUES
(29013121, 2, 'kadis', '$2y$10$/Opug3.0P3eWETi4V0qWQeTyE.huU/JXSqJO9FJhkpuY.qKEJimQe', NULL, NULL),
(82013127, 1, 'admin', '$2y$10$iz5Xcb3GLZqL08RZeRvJmei8Anlt9lMS54gIbqwWGA/5dvFMBnGyO', '2024-02-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_agenda`
--

CREATE TABLE `t_agenda` (
  `kd_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(50) NOT NULL,
  `tamu_utama` text,
  `tgl_agenda` date NOT NULL,
  `jam_agenda` varchar(5) NOT NULL,
  `naskah_pidato` text,
  `sts_agenda` int(11) NOT NULL,
  `admin_ygbuat` varchar(25) DEFAULT NULL,
  `tgl_buat` datetime NOT NULL,
  `alamat` text,
  `jam_akhir` varchar(5) DEFAULT NULL,
  `lokasi_acara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_agenda`
--

INSERT INTO `t_agenda` (`kd_agenda`, `nama_agenda`, `tamu_utama`, `tgl_agenda`, `jam_agenda`, `naskah_pidato`, `sts_agenda`, `admin_ygbuat`, `tgl_buat`, `alamat`, `jam_akhir`, `lokasi_acara`) VALUES
(45021905, 'fdsgfh', '<p>\r\n	hsfhs</p>\r\n', '2023-02-25', '03:06', '<p>\r\n	hsdhshfg</p>\r\n', 1, '', '2023-02-19 17:22:00', 'hdsh', '04:36', 'hdf');

-- --------------------------------------------------------

--
-- Table structure for table `t_agendaacara`
--

CREATE TABLE `t_agendaacara` (
  `kd_agenda` int(5) NOT NULL,
  `nama_agenda` varchar(200) NOT NULL,
  `tgl_acara` date NOT NULL,
  `jam_acara` varchar(30) NOT NULL,
  `lokasi_acara` varchar(150) NOT NULL,
  `titik_koordinat_lokasi` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ket_agenda` varchar(100) NOT NULL,
  `mak_peserta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_galleri`
--

CREATE TABLE `t_galleri` (
  `kd_galleri` int(5) NOT NULL,
  `katagori` int(1) NOT NULL,
  `nama_galleri` varchar(100) NOT NULL,
  `foto_galleri_2` varchar(100) NOT NULL,
  `foto_galleri_3` varchar(100) NOT NULL,
  `foto_galleri_4` varchar(100) NOT NULL,
  `foto_galleri_5` varchar(100) NOT NULL,
  `link_vidio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_hotel`
--

CREATE TABLE `t_hotel` (
  `kd_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(50) NOT NULL,
  `foto_1` varchar(50) NOT NULL,
  `foto_2` varchar(50) NOT NULL,
  `foto_3` varchar(50) NOT NULL,
  `foto_4` varchar(50) NOT NULL,
  `foto_5` varchar(50) NOT NULL,
  `titik_lokasi` varchar(50) NOT NULL,
  `ket_hotel` int(11) NOT NULL,
  `harga` float NOT NULL,
  `no_tlp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_kabupaten`
--

CREATE TABLE `t_kabupaten` (
  `kd_kab` int(5) NOT NULL,
  `prov_kd` int(4) NOT NULL,
  `nama_kab` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_level_admin`
--

CREATE TABLE `t_level_admin` (
  `kd_level` int(11) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_level_admin`
--

INSERT INTO `t_level_admin` (`kd_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Kadis');

-- --------------------------------------------------------

--
-- Table structure for table `t_lokasi_tujuan`
--

CREATE TABLE `t_lokasi_tujuan` (
  `kd_lokasi` int(4) NOT NULL,
  `nama_lokasi` varchar(180) NOT NULL,
  `ket_lokasi` text NOT NULL,
  `gambar_lokasi` varchar(100) NOT NULL,
  `link_vidio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_lokasi_venue`
--

CREATE TABLE `t_lokasi_venue` (
  `kd_venue` int(4) NOT NULL,
  `nama_venue` varchar(150) NOT NULL,
  `foto_venue` varchar(100) NOT NULL,
  `titik_lokasi` varchar(50) NOT NULL,
  `ket_venue` text NOT NULL,
  `status_` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_materi`
--

CREATE TABLE `t_materi` (
  `kd_materi` int(4) NOT NULL,
  `nama_materi` varchar(200) NOT NULL,
  `file_materi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_pendaftaran`
--

CREATE TABLE `t_pendaftaran` (
  `kd_daftar` varchar(30) NOT NULL,
  `undangan_kd` varchar(10) NOT NULL,
  `nama_peserta` varchar(120) NOT NULL,
  `tlp_peserta` varchar(30) NOT NULL,
  `email_peserta` varchar(100) NOT NULL,
  `level_peserta` int(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `tgl_verifikasi` datetime NOT NULL,
  `status_peserta` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta_level`
--

CREATE TABLE `t_peserta_level` (
  `kd_levelpeserta` int(1) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `warna_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_profil`
--

CREATE TABLE `t_profil` (
  `kd_profil` int(11) NOT NULL,
  `nama_profil_sistem` varchar(50) NOT NULL,
  `logo` text,
  `versi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_profil`
--

INSERT INTO `t_profil` (`kd_profil`, `nama_profil_sistem`, `logo`, `versi`) VALUES
(1, 'Asistenku', '58e93ca189cd067cc2285be684142504.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_provinsi`
--

CREATE TABLE `t_provinsi` (
  `kd_prov` int(4) NOT NULL,
  `nama_prov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_undangan`
--

CREATE TABLE `t_undangan` (
  `id_undangan` varchar(10) NOT NULL,
  `kode_undangan` varchar(30) NOT NULL,
  `prov_kd` int(4) NOT NULL,
  `kab_kd` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_wisata`
--

CREATE TABLE `t_wisata` (
  `kd_wisata` int(4) NOT NULL,
  `nama_wisata` varchar(150) NOT NULL,
  `ket_wisata` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `foto_1` varchar(100) NOT NULL,
  `foto_2` varchar(100) NOT NULL,
  `foto_3` varchar(100) NOT NULL,
  `foto_4` varchar(100) NOT NULL,
  `foto_5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_absen_kehadiran`
--
ALTER TABLE `t_absen_kehadiran`
  ADD PRIMARY KEY (`kd_hadir`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `t_agenda`
--
ALTER TABLE `t_agenda`
  ADD PRIMARY KEY (`kd_agenda`);

--
-- Indexes for table `t_agendaacara`
--
ALTER TABLE `t_agendaacara`
  ADD PRIMARY KEY (`kd_agenda`);

--
-- Indexes for table `t_galleri`
--
ALTER TABLE `t_galleri`
  ADD PRIMARY KEY (`kd_galleri`);

--
-- Indexes for table `t_hotel`
--
ALTER TABLE `t_hotel`
  ADD PRIMARY KEY (`kd_hotel`);

--
-- Indexes for table `t_kabupaten`
--
ALTER TABLE `t_kabupaten`
  ADD PRIMARY KEY (`kd_kab`);

--
-- Indexes for table `t_level_admin`
--
ALTER TABLE `t_level_admin`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indexes for table `t_lokasi_tujuan`
--
ALTER TABLE `t_lokasi_tujuan`
  ADD PRIMARY KEY (`kd_lokasi`);

--
-- Indexes for table `t_lokasi_venue`
--
ALTER TABLE `t_lokasi_venue`
  ADD PRIMARY KEY (`kd_venue`);

--
-- Indexes for table `t_materi`
--
ALTER TABLE `t_materi`
  ADD PRIMARY KEY (`kd_materi`);

--
-- Indexes for table `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  ADD PRIMARY KEY (`kd_daftar`);

--
-- Indexes for table `t_peserta_level`
--
ALTER TABLE `t_peserta_level`
  ADD PRIMARY KEY (`kd_levelpeserta`);

--
-- Indexes for table `t_profil`
--
ALTER TABLE `t_profil`
  ADD PRIMARY KEY (`kd_profil`);

--
-- Indexes for table `t_provinsi`
--
ALTER TABLE `t_provinsi`
  ADD PRIMARY KEY (`kd_prov`);

--
-- Indexes for table `t_undangan`
--
ALTER TABLE `t_undangan`
  ADD PRIMARY KEY (`id_undangan`);

--
-- Indexes for table `t_wisata`
--
ALTER TABLE `t_wisata`
  ADD PRIMARY KEY (`kd_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82013128;

--
-- AUTO_INCREMENT for table `t_agenda`
--
ALTER TABLE `t_agenda`
  MODIFY `kd_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45021906;

--
-- AUTO_INCREMENT for table `t_level_admin`
--
ALTER TABLE `t_level_admin`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_profil`
--
ALTER TABLE `t_profil`
  MODIFY `kd_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
