-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2023 at 03:14 AM
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
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `alamat`, `foto_profile`, `is_verified`) VALUES
(12345678918,'lulu','lululala','$2y$10$J23NNXSjscUHCEHXDkSaTOvbm8gQYRVmMtdqCGPQyJuFeuMfS.hJG','08111111111','PKG','user.png',1),
(1212345678912354,'aisyah','masyarakat','$2y$10$BqCVWU56ME/Y.MctVXBw7uI8w26d1gK/HY219JiQWe./ppfYVEeYS','08131111111','pangkal','user.png',1);

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
  `foto` varchar(255) NOT NULL,
  `status` enum('Diajukan','Diproses','Selesai','Ditolak') NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  PRIMARY KEY (`id_pengaduan`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

LOCK TABLES `pengaduan` WRITE;
/*!40000 ALTER TABLE `pengaduan` DISABLE KEYS */;
INSERT INTO `pengaduan` VALUES
(12,'2023-01-26',1212345678912354,'Sodara','Amir','Palembang','Riri','Pelecehan Seksual','Pelaku memukul korban menggunakan tauge','f158381b96b131e019fd1d6f3d9da57e.jpg','Diproses',7),
(15,'2023-01-26',1212345678912354,'kawan','Tedjo','bekasi','suasana','Kekerasan Dalam Rumah Tangga','lupa makan','c84e4069757743fa8f35c29a74c0d2b2.jpg','Diproses',6),
(16,'2023-02-14',1212345678912354,'Teman','Budi','Pantai','Raya','Kekerasan Dalam Rumah Tangga','Tidak memberikan izin tinggal','d8695e60c4c69842e4209cbde61a4ced.jpg','Diajukan',5);
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
  `foto_profile` varchar(225) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  UNIQUE KEY `username` (`username`)
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
  `kabupaten_id` int(11) NOT NULL,
  KEY `petugas_kabupaten_ibfk_1` (`petugas_id`),
  KEY `petugas_kabupaten_ibfk_2` (`kabupaten_id`),
  CONSTRAINT `petugas_kabupaten_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `petugas_kabupaten_ibfk_2` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_pengaduan` (`id_pengaduan`),
  KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

/*!40000 ALTER TABLE `tanggapan` DISABLE KEYS */;
INSERT INTO `tanggapan` VALUES (19,10,'2023-01-11','oke konfirm',6),(20,15,'2023-02-14','sedang didalami',6),(21,12,'2023-02-14','Sedang dalam proses',6);

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-04 10:29:03