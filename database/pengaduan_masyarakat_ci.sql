-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 09:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `id_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`id`, `path`, `id_pengaduan`) VALUES
(1, 'f158381b96b131e019fd1d6f3d9da57e.jpg', 12),
(2, 'c84e4069757743fa8f35c29a74c0d2b2.jpg', 15),
(3, 'd8695e60c4c69842e4209cbde61a4ced.jpg', 16),
(8, '8fd647be4d1b8554e1a5f5ecf4c75fb3.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ibukota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama`, `ibukota`) VALUES
(1, 'Bangka', 'Sungai Liat'),
(2, 'Bangka Barat', 'Muntok'),
(3, 'Bangka Selatan', 'Toboali'),
(4, 'Bangka Tengah', 'Koba'),
(5, 'Belitung', 'Tanjung Pandan'),
(6, 'Belitung Timur', 'Manggar'),
(7, 'Pangkal Pinang', 'Pangkal Pinang');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` bigint(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `alamat`, `foto_profile`, `is_verified`) VALUES
(12345678918, 'lulu', 'lululala', '$2y$10$J23NNXSjscUHCEHXDkSaTOvbm8gQYRVmMtdqCGPQyJuFeuMfS.hJG', '08111111111', 'PKG', 'user.png', 1),
(1212345678912354, 'aisyah', 'masyarakat', '$2y$10$BqCVWU56ME/Y.MctVXBw7uI8w26d1gK/HY219JiQWe./ppfYVEeYS', '08131111111', 'pangkal', 'user.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` bigint(16) NOT NULL,
  `hubungan` varchar(35) NOT NULL,
  `nama_pelaku` varchar(35) NOT NULL,
  `lokasi_kejadian` varchar(35) NOT NULL,
  `nama_korban` varchar(35) NOT NULL,
  `jenis_laporan` varchar(35) NOT NULL,
  `isi_laporan` text NOT NULL,
  `status` enum('Diajukan','Diproses','Selesai','Ditolak') NOT NULL,
  `id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `hubungan`, `nama_pelaku`, `lokasi_kejadian`, `nama_korban`, `jenis_laporan`, `isi_laporan`, `status`, `id_kabupaten`) VALUES
(12, '2023-01-26', 1212345678912354, 'Sodara', 'Amir', 'Palembang', 'Riri', 'Pelecehan Seksual', 'Pelaku memukul korban menggunakan tauge', 'Diproses', 7),
(15, '2023-01-26', 1212345678912354, 'kawan', 'Tedjo', 'bekasi', 'suasana', 'Kekerasan Dalam Rumah Tangga', 'lupa makan', 'Selesai', 6),
(16, '2023-02-14', 1212345678912354, 'Teman', 'Budi', 'Pantai', 'Raya', 'Kekerasan Dalam Rumah Tangga', 'Tidak memberikan izin tinggal', 'Diajukan', 5),
(26, '2023-06-09', 1212345678912354, 'teman', 'Dimas', 'Pantai Kuta', 'Saleh', 'Hak Asuh Anak', 'Jadi awalnya gini', 'Ditolak', 3);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `nik`, `username`, `password`, `telp`, `alamat`, `level`, `foto_profile`) VALUES
(2, 'putri', 3212345678912354, 'admin', '$2y$10$YlpZmz2Uq.RxG5bHvMjYjej5y2AYkEzr9JbDKGHe3sWbpFkVhkury', '08111111111', 'belitong', 'admin', 'user.png'),
(6, 'amini', 3212345678912352, 'petugas', '$2y$10$SIUNsTMGwDOoXJ62kgoMueorXuuDenxdG0ZKRU1NUigM2Xby0bAmC', '081222222222', 'mentok', 'petugas', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_kabupaten`
--

CREATE TABLE `petugas_kabupaten` (
  `id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_kabupaten`
--

INSERT INTO `petugas_kabupaten` (`id`, `petugas_id`, `kabupaten_id`) VALUES
(1, 2, 5),
(2, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(19, 10, '2023-01-11', 'oke konfirm', 6),
(20, 15, '2023-02-14', 'sedang didalami', 6),
(21, 12, '2023-02-14', 'Sedang dalam proses', 6),
(26, 26, '2023-06-09', 'kurang lengkap', 2);


-- Table structure for table `masyarakat_detail`
--

CREATE TABLE `masyarakat_detail` (
  `id` bigint NOT NULL,
  `nama` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  `id_masyarakat` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat_detail`
--

INSERT INTO `masyarakat_detail` (`id`, `nama`, `telp`, `alamat`, `foto_profile`, `id_masyarakat`) VALUES
(1, 'aisyah', '08131111111', 'pangkal', 'user.png', 1212345678912354), 
(2, 'lulu', '08111111111', 'PKG', 'user.png', 12345678918);

ALTER TABLE `masyarakat` DROP COLUMN `nama`;
ALTER TABLE `masyarakat` DROP COLUMN `telp`;
ALTER TABLE `masyarakat` DROP COLUMN `alamat`;
ALTER TABLE `masyarakat` DROP COLUMN `foto_profile`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat_detail`
--
ALTER TABLE `masyarakat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `petugas_kabupaten`
--
ALTER TABLE `petugas_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masyarakat`
--

ALTER TABLE `masyarakat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `nik` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212345678912355;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `petugas_kabupaten`
--
ALTER TABLE `petugas_kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
