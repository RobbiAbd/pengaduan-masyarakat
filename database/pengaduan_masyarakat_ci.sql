-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2023 at 12:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(8, '8fd647be4d1b8554e1a5f5ecf4c75fb3.jpg', 26),
(0, '17c62806afa37b485290f469eab569a8.jpg', 22),
(0, '98372ccd6427d0e116b83e1d1d24199a.jpg', 23),
(0, '1269cf087e0fef797d2e23a3862e9feb.jpg', 24),
(0, 'bc1098fa77aa1625e0ec7a4f10fc6f6f.jpg', 25),
(0, 'c9b3b8793f5615b8b5db8272946ad06c.jpg', 26),
(0, '40a5d8915866e663f2294ba74f3e1231.jpg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ibukota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `username`, `password`, `is_verified`) VALUES
(12345678918, 'lululala', '$2y$10$J23NNXSjscUHCEHXDkSaTOvbm8gQYRVmMtdqCGPQyJuFeuMfS.hJG', 1),
(1212345678912354, 'masyarakat', '$2y$10$BqCVWU56ME/Y.MctVXBw7uI8w26d1gK/HY219JiQWe./ppfYVEeYS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat_detail`
--

CREATE TABLE `masyarakat_detail` (
  `id_masyarakat` int(11) NOT NULL,
  `nama_masyarakat` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  `nik` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat_detail`
--

INSERT INTO `masyarakat_detail` (`id_masyarakat`, `nama_masyarakat`, `telp`, `alamat`, `foto_profile`, `nik`) VALUES
(1, 'aisyah', '08131111111', 'pangkal', 'user.png', 1212345678912354),
(2, 'lulu', '08111111111', 'PKG', 'user.png', 12345678918);

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
(12, '2023-01-26', 1212345678912354, 'Sodara', 'Amir', 'Palembang', 'Riri', 'Pelecehan Seksual', 'Pelaku memukul korban menggunakan tauge', 'Selesai', 7),
(15, '2023-01-26', 1212345678912354, 'kawan', 'Tedjo', 'bekasi', 'suasana', 'Kekerasan Dalam Rumah Tangga', 'lupa makan', 'Diproses', 6),
(16, '2023-02-14', 1212345678912354, 'Teman', 'Budi', 'Pantai', 'Raya', 'Kekerasan Dalam Rumah Tangga', 'Tidak memberikan izin tinggal', 'Diproses', 5),
(18, '2023-06-17', 12345678918, 'Tetangga', 'Susanto', 'Jalan Pramuka', 'Agus', 'Kekerasan Dalam Rumah Tangga', 'pencemaran nama baik', 'Diajukan', 7),
(21, '2023-06-19', 1212345678912354, 'teman', 'Budi Sentosa', 'Pantai Kuta', 'Charel', 'Kekerasan Dalam Rumah Tangga', 'Pemukulan sepihak', 'Diajukan', 7),
(22, '2023-06-19', 1212345678912354, 'teman', 'Budi Sentosa', 'Jl. Assalam', 'Charel', 'Kekerasan Dalam Rumah Tangga', 'asdf', 'Selesai', 7),
(23, '2023-06-19', 1212345678912354, 'teman', 'Budi Sentosa', 'Jl. Assalam', 'Saleh', 'Kekerasan Dalam Rumah Tangga', 'asdf', 'Ditolak', 7),
(24, '2023-06-19', 331301117223, 'teman', 'Budi Sentosa Wijaya', 'Jl. Assalam', 'Charel Adi', 'Kekerasan Dalam Rumah Tangga', 'pelaku memukul korban dengan tongkat baseball', 'Diajukan', 4),
(25, '2023-06-19', 331301117223, 'teman', 'Budi Sentosa Wijaya', 'Jl. Assalam', 'Charel Adi', 'Kekerasan Dalam Rumah Tangga', 'Pemukulan sepulang sekolah', 'Diajukan', 2),
(26, '2023-06-19', 331301117223, 'teman', 'Dimas', 'klaten', 'Kates', 'Hak Asuh Anak', 'Kates dipukul oleh dimas', 'Diajukan', 2),
(27, '2023-06-19', 1212345678912354, 'teman', 'Budi Sentosa', 'Jl. Assalam', 'Charel Adi', 'Kekerasan Dalam Rumah Tangga', 'Charel dipukul ditempat', 'Ditolak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `nik_petugas` bigint(16) NOT NULL,
  `username_petugas` varchar(25) NOT NULL,
  `password_petugas` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `nik_petugas`, `username_petugas`, `password_petugas`, `telp`, `alamat`, `level`, `foto_profile`) VALUES
(2, 'putri', 3212345678912354, 'admin', '$2y$10$YlpZmz2Uq.RxG5bHvMjYjej5y2AYkEzr9JbDKGHe3sWbpFkVhkury', '08111111111', 'belitong', 'admin', 'user.png'),
(6, 'amini', 3212345678912352, 'petugas', '$2y$10$SIUNsTMGwDOoXJ62kgoMueorXuuDenxdG0ZKRU1NUigM2Xby0bAmC', '081222222222', 'mentok', 'petugas', 'user.png'),
(7, 'Darsono', 0, 'darson112', '$2y$10$wIHKdPENug2c/.d0yIzYyO3SdsHv0gfBsfV2zQF0eatE1UbVYY49G', '082138702811', '', 'petugas', 'user.png');

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
(2, 6, 7),
(3, 7, 1);

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
(22, 22, '2023-06-19', 'Baik akan kami proses', 6),
(23, 23, '2023-06-19', 'Deskripsi kurang jelas.', 6),
(24, 16, '2023-06-19', 'Diterima, pengaduan akan diproses', 2),
(25, 27, '2023-06-19', 'Deskripsi kurang lengkap', 2);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `masyarakat_detail`
--
ALTER TABLE `masyarakat_detail`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `id_masyarakat` (`nik`);

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
  ADD UNIQUE KEY `username` (`username_petugas`);

--
-- Indexes for table `petugas_kabupaten`
--
ALTER TABLE `petugas_kabupaten`
  ADD KEY `petugas_kabupaten_ibfk_1` (`petugas_id`),
  ADD KEY `petugas_kabupaten_ibfk_2` (`kabupaten_id`);

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
-- AUTO_INCREMENT for table `masyarakat_detail`
--
ALTER TABLE `masyarakat_detail`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
