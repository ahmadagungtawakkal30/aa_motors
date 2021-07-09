-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 04:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aa_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `barang` varchar(150) NOT NULL,
  `stok` decimal(60,0) NOT NULL,
  `harga` decimal(60,0) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `barang`, `stok`, `harga`, `created`, `modified`) VALUES
(1, 'Ban Mobil GT RADIAL 185/70 R13 86H', '2', '0', '2020-07-11 21:37:37', '2020-09-15 22:58:13'),
(2, 'Ban Mobil GT RADIAL 195/65 R13 84H', '4', '0', '2020-07-11 21:38:34', '2020-09-15 23:05:32'),
(3, 'Ban Mobil GT RADIAL 195/60 R15 88H', '1', '0', '2020-07-29 12:09:49', '2020-09-15 23:00:27'),
(4, 'Ban Mobil GT RADIAL 205/65 R15 94H', '1', '0', '2020-09-16 10:38:03', '2020-09-15 22:53:46'),
(5, 'Ban Mobil GT RADIAL 195/65 R14 89H', '7', '0', '2020-09-16 10:47:07', '2020-09-16 03:47:07'),
(6, 'Ban Mobil GT RADIAL 195/65 R15 91H', '2', '0', '2020-09-16 11:09:14', '2020-09-16 04:09:14'),
(7, 'Ban Mobil GT RADIAL 185/65 R15 88H', '1', '0', '2020-09-16 11:16:26', '2020-09-16 04:16:26'),
(8, 'Ban Mobil SPLT 5 185 R14 8P.R.', '4', '0', '2020-09-16 11:18:50', '2020-09-16 04:18:50'),
(9, 'Ban Mobil LT 5 175 R13 8P.R.', '3', '0', '2020-09-16 11:22:36', '2020-09-16 04:22:36'),
(10, 'Ban Mobil GOOD YEAR 7.50-16 LT', '1', '0', '2020-09-16 11:25:39', '2020-09-16 04:25:39'),
(11, 'Ban Motor KINGLAND 90/90-14 M/C 46P', '3', '0', '2020-09-16 11:29:58', '2020-09-16 04:29:58'),
(12, 'Ban Motor IRC REBORN 90/80-14 49P', '3', '0', '2020-09-16 11:33:40', '2020-09-16 04:33:40'),
(13, 'Ban Motor MAXXIS 90/80-14 49P', '3', '350000', '2020-09-16 11:35:54', '2020-09-15 23:37:21'),
(14, 'Ban Motor FDR GENSI 90/80-17 46S', '14', '250000', '2020-09-16 11:41:15', '2020-09-15 23:41:51'),
(15, 'Ban Motor FDR SPORT XR 80/80-17 41S', '2', '250000', '2020-09-16 11:43:59', '2020-09-16 04:43:59'),
(16, 'Ban Motor FDR GENSI 80/80-17 41S', '2', '200000', '2020-09-16 11:45:17', '2020-09-16 04:45:17'),
(17, 'Ban Motor FDR GENSI 100/80-17 52S', '1', '0', '2020-09-16 11:46:21', '2020-09-16 04:46:21'),
(18, 'Ban Motor FDR GENSI 100/80-14 48S', '1', '0', '2020-09-16 11:47:46', '2020-09-16 04:47:46'),
(19, 'Ban Motor FDR SPORT XR 80/80-14 43P', '2', '0', '2020-09-16 11:49:05', '2020-09-16 04:49:05'),
(20, 'Ban Motor FDR SPORT EFO 80/80-14 43P', '1', '0', '2020-09-16 11:50:11', '2020-09-16 04:50:11'),
(21, 'Ban Motor FDR GENSI 80/80-14 43P', '1', '0', '2020-09-16 11:51:14', '2020-09-16 04:51:14'),
(22, 'Ban Motor FDR CITYGO 100/90-12 59J', '1', '0', '2020-09-16 11:53:20', '2020-09-16 04:53:20'),
(23, 'Ban Motor IRC SS-560R 100/70-13 63P', '2', '0', '2020-09-16 11:56:11', '2020-09-16 04:56:11'),
(24, 'Ban Motor IRC SCT-005R 140/70-14 62P', '1', '0', '2020-09-16 11:57:13', '2020-09-16 04:57:13'),
(25, 'Ban Motor IRC EXATO 120/70-17 58S', '2', '0', '2020-09-16 11:58:24', '2020-09-16 04:58:24'),
(26, 'Ban Motor FDR FLEMMO 80/90-14 40P', '3', '0', '2020-09-16 12:00:19', '2020-09-16 05:00:19'),
(27, 'Ban Motor FDR FLEMMO 70/90-14 34P', '1', '0', '2020-09-16 12:01:23', '2020-09-16 05:01:23'),
(28, 'Ban Motor FDR FLEMMO 80/90-18 45P', '1', '0', '2020-09-16 12:02:07', '2020-09-16 05:02:07'),
(29, 'Ban Motor FDR FLEMMO 90/80-17 46S', '2', '0', '2020-09-16 12:02:50', '2020-09-16 05:02:50'),
(30, 'Ban Motor CORSA PLATINUM 70/90-14 34P', '1', '0', '2020-09-16 12:03:54', '2020-09-16 05:03:54'),
(31, 'Ban Motor IRC NR72 80/90-17 44P', '2', '0', '2020-09-16 12:04:46', '2020-09-16 00:17:15'),
(32, 'Ban Motor IRC NR78 80/90-17 44P', '1', '0', '2020-09-16 12:16:39', '2020-09-16 05:16:39'),
(33, 'Ban Motor IRC NR72 80/90-16 43P', '2', '0', '2020-09-16 12:19:12', '2020-09-16 05:19:12'),
(34, 'Ban Motor IRC NR72 70/90-17 38P', '3', '0', '2020-09-16 12:19:55', '2020-09-16 05:19:55'),
(35, 'Ban Motor IRC NR72 90/90-17 49P', '2', '0', '2020-09-16 12:20:40', '2020-09-16 05:20:40'),
(36, 'Ban Motor IRC NR72 90/90-18 51P', '2', '0', '2020-09-16 12:21:17', '2020-09-16 05:21:17'),
(37, 'Oli YAMALUBE SPORT ', '0', '50000', '2020-09-16 12:25:02', '2020-09-16 05:25:02'),
(38, 'Oli YAMALUBE SILVER', '0', '45000', '2020-09-16 12:26:04', '2020-09-16 05:26:04'),
(39, 'Oli YAMALUBE MATIC', '0', '45000', '2020-09-16 12:26:49', '2020-09-16 00:33:46'),
(40, 'Oli FEDERAL ULTRATECH', '0', '35000', '2020-09-16 12:28:39', '2020-09-16 05:28:39'),
(41, 'Oli EVALUBE PRO', '0', '30000', '2020-09-16 12:29:15', '2020-09-16 05:29:15'),
(42, 'Oli MPX1 1L', '0', '60000', '2020-09-16 12:30:15', '2020-09-16 05:30:15'),
(43, 'Oli MPX1 0,8L', '0', '45000', '2020-09-16 12:32:19', '2020-09-16 05:32:19'),
(44, 'Oli MPX2 0,8L', '0', '45000', '2020-09-16 12:32:31', '2020-09-16 05:32:31'),
(45, 'Oli YAMALUBE SUPER MATIC', '0', '70000', '2020-09-16 12:33:02', '2020-09-16 05:33:02'),
(46, 'Oli CASTROL GO', '0', '40000', '2020-09-16 12:34:37', '2020-09-16 05:34:37'),
(47, 'Oli CASTROL ACTIVE', '0', '35000', '2020-09-16 12:36:24', '2020-09-16 05:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` decimal(65,0) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `deskripsi`, `id_barang`, `jumlah`, `id_vendor`, `created`) VALUES
(1, 'Sell Ban Champion', 1, '2', 1, '2020-07-29 03:40:07'),
(2, 'Sell Ban Mobil Good Year', 2, '10', 1, '2020-07-29 03:41:45'),
(3, 'Sell Ban Mobil GT RADIAL 185/70 R13 86H', 1, '2', 1, '2021-06-22 01:21:23');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `delete_barang` AFTER DELETE ON `barang_keluar` FOR EACH ROW UPDATE  barang SET barang.stok = barang.stok + old.jumlah WHERE barang.id = old.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_barang` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE barang SET barang.stok = barang.stok - new.jumlah WHERE barang.id = new.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_barang` AFTER UPDATE ON `barang_keluar` FOR EACH ROW UPDATE  barang SET barang.stok = barang.stok - new.jumlah WHERE barang.id = new.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_barang2` BEFORE UPDATE ON `barang_keluar` FOR EACH ROW UPDATE  barang SET barang.stok = barang.stok + old.jumlah WHERE barang.id = old.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` decimal(65,0) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `deskripsi`, `id_barang`, `jumlah`, `id_petugas`, `created`) VALUES
(1, 'Tambah Ban Cahmpion', 1, '100', 1, '2020-07-29 03:51:09'),
(2, 'Tambah Ban Mobil Good Year', 2, '50', 1, '2020-07-29 04:26:46'),
(3, 'Tambah Ban Mobil Good Year', 2, '10', 1, '2020-07-29 04:55:53'),
(4, 'Tambah Ban Mobil GT RADIAL 185/70 R13 86H', 1, '3', 1, '2021-06-22 01:17:32');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `barang_masuk` FOR EACH ROW UPDATE  barang SET barang.stok = barang.stok - old.jumlah WHERE barang.id = old.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE barang SET barang.stok = barang.stok + new.jumlah WHERE barang.id = new.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `barang_masuk` FOR EACH ROW UPDATE  barang SET barang.stok = barang.stok - old.jumlah WHERE barang.id = old.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update2` BEFORE UPDATE ON `barang_masuk` FOR EACH ROW UPDATE  barang SET barang.stok = barang.stok + new.jumlah WHERE barang.id = new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telp` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'Ahmad', 'macinna', '123456789'),
(2, 'Agung', 'Herlang', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `change` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`, `created`, `change`) VALUES
(1, 'Ahmad Agung Tawakkal', 'ahmadagungt30@gmail.com', 'Ahmadagung', 'c89e720f491fa792b14416e4b1cf384c', '2020-07-29 09:23:00', '2020-07-29 09:23:00'),
(2, 'ahmadagung', 'ahmad100@gmail.com', 'ahmed30', 'c89e720f491fa792b14416e4b1cf384c', '2020-07-28 17:00:00', '2020-07-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telp` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'Agung', 'Bandung', '123456789'),
(2, 'Tawakkal', 'Bandung', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
