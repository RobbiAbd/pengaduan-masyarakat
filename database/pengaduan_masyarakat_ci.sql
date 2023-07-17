-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 09:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat_ci`
--

--
-- Table structure for table `bukti`
--
DROP TABLE IF EXISTS `bukti`;
CREATE TABLE `bukti` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `id_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti`
--

LOCK TABLES `bukti` WRITE;
INSERT INTO `bukti` (`id`, `path`, `id_pengaduan`) VALUES
(1,'f158381b96b131e019fd1d6f3d9da57e.jpg',12),
(2,'c84e4069757743fa8f35c29a74c0d2b2.jpg',15),
(3,'d8695e60c4c69842e4209cbde61a4ced.jpg',16),
(8,'8fd647be4d1b8554e1a5f5ecf4c75fb3.jpg',26),
(0,'17c62806afa37b485290f469eab569a8.jpg',22),
(0,'98372ccd6427d0e116b83e1d1d24199a.jpg',23),
(0,'1269cf087e0fef797d2e23a3862e9feb.jpg',24),
(0,'bc1098fa77aa1625e0ec7a4f10fc6f6f.jpg',25),
(0,'c9b3b8793f5615b8b5db8272946ad06c.jpg',26),
(0,'40a5d8915866e663f2294ba74f3e1231.jpg',27);
/*!40000 ALTER TABLE `bukti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kabupaten`
--

DROP TABLE IF EXISTS `kabupaten`;
CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL,
  `ibukota` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

LOCK TABLES `kabupaten` WRITE;
INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`, `ibukota`) VALUES
(1, 'Bangka', 'Sungai Liat'),
(2, 'Bangka Barat', 'Muntok'),
(3, 'Bangka Selatan', 'Toboali'),
(4, 'Bangka Tengah', 'Koba'),
(5, 'Belitung', 'Tanjung Pandan'),
(6, 'Belitung Timur', 'Manggar'),
(7, 'Pangkal Pinang', 'Pangkal Pinang');
UNLOCK TABLES;

--
-- Table structure for table `masyarakat`
--

DROP TABLE IF EXISTS `masyarakat`;
CREATE TABLE `masyarakat` (
  `nik_masyarakat` bigint(16) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`nik_masyarakat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

LOCK TABLES `masyarakat` WRITE;
INSERT INTO `masyarakat` (`nik_masyarakat`, `username`, `password`, `is_verified`) VALUES
(12345678918, 'lululala', '$2y$10$J23NNXSjscUHCEHXDkSaTOvbm8gQYRVmMtdqCGPQyJuFeuMfS.hJG', 1),
(1212345678912354, 'masyarakat', '$2y$10$BqCVWU56ME/Y.MctVXBw7uI8w26d1gK/HY219JiQWe./ppfYVEeYS', 1);
UNLOCK TABLES;

--
-- Table structure for table `masyarakat_detail`
--

DROP TABLE IF EXISTS `masyarakat_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masyarakat_detail` (
  `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masyarakat` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  `nik_masyarakat` bigint(20) NOT NULL,
  PRIMARY KEY (`id_masyarakat`),
  KEY `id_masyarakat` (`id_masyarakat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masyarakat_detail`
--

LOCK TABLES `masyarakat_detail` WRITE;
INSERT INTO `masyarakat_detail` (`id_masyarakat`, `nama_masyarakat`, `telp`, `alamat`, `foto_profile`, `nik_masyarakat`) VALUES
(1,'aisyah','08131111111','pangkal','user.png',1212345678912354),
(2,'lulu','08111111111','PKG','user.png',12345678918);
UNLOCK TABLES;


--
-- Table structure for table `pengaduan`
--

DROP TABLE IF EXISTS `pengaduan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(16) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

LOCK TABLES `pengaduan` WRITE;
INSERT INTO `pengaduan` VALUES 
(12,'2023-01-26',1212345678912354,'Sodara','Amir','Palembang','Riri','Pelecehan Seksual','Pelaku memukul korban menggunakan tauge','f158381b96b131e019fd1d6f3d9da57e.jpg','Selesai',7),
(15,'2023-01-26',1212345678912354,'kawan','Tedjo','bekasi','suasana','Kekerasan Dalam Rumah Tangga','lupa makan','c84e4069757743fa8f35c29a74c0d2b2.jpg','Diproses',6),
(16,'2023-02-14',1212345678912354,'Teman','Budi','Pantai','Raya','Kekerasan Dalam Rumah Tangga','Tidak memberikan izin tinggal','d8695e60c4c69842e4209cbde61a4ced.jpg','Diproses',5),
(18,'2023-06-17',12345678918,'Tetangga','Susanto','Jalan Pramuka','Agus','Kekerasan Dalam Rumah Tangga','pencemaran nama baik','8fd647be4d1b8554e1a5f5ecf4c75fb3.jpg','Diajukan',7),
(21,'2023-06-19',1212345678912354,'teman','Budi Sentosa','Pantai Kuta','Charel','Kekerasan Dalam Rumah Tangga','Pemukulan sepihak','17c62806afa37b485290f469eab569a8.jpg','Diajukan',7),
(22,'2023-06-19',1212345678912354,'teman','Budi Sentosa','Jl. Assalam','Charel','Kekerasan Dalam Rumah Tangga','asdf','17c62806afa37b485290f469eab569a8.jpg','Selesai',7),
(23,'2023-06-19',1212345678912354,'teman','Budi Sentosa','Jl. Assalam','Saleh','Kekerasan Dalam Rumah Tangga','asdf','98372ccd6427d0e116b83e1d1d24199a.jpg','Ditolak',7),
(24,'2023-06-19',331301117223,'teman','Budi Sentosa Wijaya','Jl. Assalam','Charel Adi','Kekerasan Dalam Rumah Tangga','pelaku memukul korban dengan tongkat baseball','1269cf087e0fef797d2e23a3862e9feb.jpg','Diajukan',4),
(25,'2023-06-19',331301117223,'teman','Budi Sentosa Wijaya','Jl. Assalam','Charel Adi','Kekerasan Dalam Rumah Tangga','Pemukulan sepulang sekolah','bc1098fa77aa1625e0ec7a4f10fc6f6f.jpg','Diajukan',2),
(26,'2023-06-19',331301117223,'teman','Dimas','klaten','Kates','Hak Asuh Anak','Kates dipukul oleh dimas','c9b3b8793f5615b8b5db8272946ad06c.jpg','Diajukan',2),
(27,'2023-06-19',1212345678912354,'teman','Budi Sentosa','Jl. Assalam','Charel Adi','Kekerasan Dalam Rumah Tangga','Charel dipukul ditempat','40a5d8915866e663f2294ba74f3e1231.jpg','Ditolak',1);
/*!40000 ALTER TABLE `pengaduan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `nik_petugas` bigint(16) NOT NULL,
  `username_petugas` varchar(25) NOT NULL,
  `password_petugas` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  UNIQUE KEY `username_petugas` (`username_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `nik_petugas`, `username_petugas`, `password_petugas`, `telp`, `alamat`, `level`, `foto_profile`) VALUES
(2, 'putri', 3212345678912354, 'admin', '$2y$10$YlpZmz2Uq.RxG5bHvMjYjej5y2AYkEzr9JbDKGHe3sWbpFkVhkury', '08111111111', 'belitong', 'admin', 'user.png'),
(6, 'amini', 3212345678912352, 'petugas', '$2y$10$SIUNsTMGwDOoXJ62kgoMueorXuuDenxdG0ZKRU1NUigM2Xby0bAmC', '081222222222', 'mentok', 'petugas', 'user.png'),
(7,'Darsono',0,'darson112','$2y$10$wIHKdPENug2c/.d0yIzYyO3SdsHv0gfBsfV2zQF0eatE1UbVYY49G','082138702811','','petugas','user.png');
UNLOCK TABLES;

--
-- Table structure for table `petugas_kabupaten`
--

DROP TABLE IF EXISTS `petugas_kabupaten`;
CREATE TABLE `petugas_kabupaten` (
  `id_petugaskab` int(11) NOT NULL,
  `nama_petugaskab` varchar(255) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  KEY `petugas_kabupaten_ibfk_1` (`petugas_id`),
  KEY `petugas_kabupaten_ibfk_2` (`kabupaten_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_kabupaten`
--

LOCK TABLES `petugas_kabupaten` WRITE;
INSERT INTO `petugas_kabupaten` (`id_petugaskab`, `nama_petugaskab`, `petugas_id`, `kabupaten_id`) VALUES
(2, 'amini', 6, 7),
(3, 'darsono', 7, 1);
UNLOCK TABLES;

--
-- Table structure for table `tanggapan`
--

DROP TABLE IF EXISTS `tanggapan`;
CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_pengaduan` (`id_pengaduan`),
  KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

LOCK TABLES `tanggapan` WRITE;
INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(19,10,'2023-01-11','oke konfirm',6),
(20,15,'2023-02-14','sedang didalami',6),
(21,12,'2023-02-14','Sedang dalam proses',6),
(22,22,'2023-06-19','Baik akan kami proses',6),
(23,23,'2023-06-19','Deskripsi kurang jelas.',6),
(24,16,'2023-06-19','Diterima, pengaduan akan diproses',2),
(25,27,'2023-06-19','Deskripsi kurang lengkap',2);
UNLOCK TABLES;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
