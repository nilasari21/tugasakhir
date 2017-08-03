-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 06:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machiko`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk_ukuran` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `status` enum('Siap','Menunggu','Produksi','Batal','Packing','Pengiriman','Selesai') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk_ukuran`, `jumlah_beli`, `status`, `created_at`, `updated_at`) VALUES
(98, 143, 133, 1, 'Packing', '2017-07-06 04:34:21', '2017-06-09 23:29:14'),
(99, 144, 125, 1, 'Siap', '2017-06-11 22:18:55', '2017-06-09 23:46:45'),
(100, 144, 127, 1, 'Siap', '2017-06-10 07:01:09', '2017-06-09 23:46:45'),
(101, 146, 128, 1, 'Siap', '2017-06-10 07:01:15', '2017-06-10 06:57:25'),
(102, 146, 125, 1, 'Siap', '2017-06-11 22:18:55', '2017-06-10 06:57:25'),
(103, 147, 127, 1, 'Pengiriman', '2017-06-15 15:04:32', '2017-06-10 07:00:34'),
(104, 147, 125, 1, 'Pengiriman', '2017-06-15 15:04:32', '2017-06-10 07:00:34'),
(105, 148, 133, 1, 'Siap', '2017-06-12 00:24:38', '2017-06-11 03:55:45'),
(106, 148, 125, 1, 'Siap', '2017-06-11 22:18:55', '2017-06-11 03:55:45'),
(123, 164, 139, 1, 'Menunggu', '2017-06-15 20:06:40', '0000-00-00 00:00:00'),
(124, 165, 195, 1, 'Siap', '2017-06-15 07:46:28', '2017-06-15 07:46:28'),
(125, 165, 193, 1, 'Menunggu', '2017-06-15 20:06:55', '2017-06-15 07:46:30'),
(126, 165, 139, 1, 'Menunggu', '2017-06-15 20:06:48', '2017-06-15 07:46:30'),
(127, 166, 195, 1, 'Siap', '2017-06-15 15:10:52', '2017-06-15 15:10:52'),
(128, 167, 195, 1, 'Siap', '2017-06-15 15:32:41', '2017-06-15 15:32:41'),
(132, 171, 195, 1, 'Siap', '2017-06-16 01:33:35', '2017-06-16 01:33:35'),
(133, 172, 193, 1, 'Menunggu', '2017-06-16 01:38:10', '2017-06-16 01:38:10'),
(134, 173, 193, 1, 'Menunggu', '2017-06-16 01:46:18', '2017-06-16 01:46:18'),
(135, 174, 195, 1, 'Siap', '2017-06-16 01:47:44', '2017-06-16 01:47:44'),
(139, 177, 127, 1, 'Siap', '2017-06-20 06:05:09', '2017-06-20 06:05:09'),
(140, 177, 195, 1, 'Siap', '2017-06-20 06:05:09', '2017-06-20 06:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak aktif','','') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Kaos', 'Aktif', '2017-06-13 23:23:03', '0000-00-00 00:00:00'),
(2, 'Aksesoris', 'Aktif', '2017-03-24 23:01:17', '2017-03-24 23:01:17'),
(3, 'Lightstick', 'Aktif', '2017-03-25 00:14:46', '2017-03-25 00:14:46'),
(4, 'Botol', 'Aktif', '2017-03-25 08:54:11', '2017-03-25 08:54:11'),
(5, 'Mug', 'Aktif', '2017-04-21 02:26:05', '2017-04-04 03:32:44'),
(6, 'Jaket', 'Aktif', '2017-04-15 07:23:56', '2017-04-15 07:23:56'),
(7, 'DVD', 'Aktif', '2017-05-10 18:43:51', '2017-05-10 18:43:51'),
(8, 'Sweater', 'Tidak aktif', '2017-05-19 03:44:13', '2017-05-14 23:34:55'),
(9, 'Paket hemat', 'Aktif', '2017-05-19 09:16:51', '2017-05-19 09:16:51'),
(10, 'Makanan', 'Aktif', '2017-06-06 07:37:09', '2017-06-06 07:37:09'),
(11, 'Tas', 'Aktif', '2017-06-06 19:13:39', '2017-06-06 19:13:39'),
(12, 'Totebag', 'Tidak aktif', '2017-06-06 19:40:36', '2017-06-06 19:26:25'),
(13, 'Perfume', 'Aktif', '2017-06-12 05:56:44', '2017-06-12 05:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `id_produk_ukuran` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `berat_total` int(11) DEFAULT NULL,
  `Total_harga` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `nama_rekening` varchar(50) DEFAULT NULL,
  `nomor_rekening` varchar(50) DEFAULT NULL,
  `total_transfer` int(11) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('Terima','Tolak','Pending','') DEFAULT NULL,
  `alasan_tolak` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `nama_rekening`, `nomor_rekening`, `total_transfer`, `tgl_transfer`, `foto`, `status`, `alasan_tolak`, `created_at`, `updated_at`) VALUES
(39, NULL, NULL, 340000, '2017-06-06', '1496471906.JPG', 'Pending', NULL, '2017-06-02 23:38:28', '2017-06-02 23:38:28'),
(40, NULL, NULL, 340000, '2017-06-06', '1496471942.JPG', 'Terima', NULL, '2017-06-03 06:39:35', '2017-06-02 23:39:35'),
(41, NULL, NULL, 110000, '2017-06-04', '1496564371.png', 'Terima', NULL, '2017-06-04 08:20:29', '2017-06-04 01:20:29'),
(42, NULL, NULL, 219000, '2017-06-04', '1496566978.png', 'Terima', NULL, '2017-06-04 09:03:16', '2017-06-04 02:03:16'),
(43, NULL, NULL, 123000, '2017-06-04', '1496005098.jpg', 'Pending', NULL, '2017-06-06 22:35:00', '2017-06-04 08:31:54'),
(44, NULL, NULL, 314000, '2017-06-12', '1496636153.jpg', 'Terima', 'total transfer tidak sesuai', '2017-06-06 22:34:24', '2017-06-04 21:16:21'),
(45, NULL, NULL, 130000, '2017-06-01', '1496005098.jpg', 'Terima', NULL, '2017-06-14 02:53:52', '2017-06-13 01:59:04'),
(46, NULL, NULL, 205000, '2017-06-07', '1496822556.JPG', 'Terima', NULL, '2017-06-09 06:58:37', '2017-06-08 23:58:37'),
(47, NULL, NULL, 93000, '2017-06-14', '1497380850.JPG', 'Terima', NULL, '2017-06-13 19:08:00', '2017-06-13 12:08:00'),
(48, NULL, NULL, 116000, '2017-06-15', '1497507280.jpg', 'Terima', NULL, '2017-06-15 06:15:14', '2017-06-14 23:15:14'),
(49, NULL, NULL, 556000, '2017-06-15', '1497513312.jpg', 'Terima', NULL, '2017-06-15 07:55:40', '2017-06-15 00:55:40'),
(50, NULL, NULL, 153000, '2017-06-15', '1497541887.jpg', 'Terima', NULL, '2017-06-15 15:52:00', '2017-06-15 08:52:00'),
(51, NULL, NULL, 152000, '2017-06-16', '1497580790.jpg', 'Terima', NULL, '2017-06-16 02:42:10', '2017-06-15 19:42:10'),
(52, NULL, NULL, 200000, '2017-06-16', '1497583467.jpg', 'Pending', NULL, '2017-06-15 20:24:28', '2017-06-15 20:24:28'),
(53, 'nila sari', '44571900', 214000, '2017-06-20', '1497941901.png', 'Pending', NULL, '2017-06-19 23:58:23', '2017-06-19 23:58:23'),
(54, 'nila sari', '889012345', 214000, '2017-06-20', '1498009086.jpg', 'Terima', NULL, '2017-06-21 01:39:23', '2017-06-20 18:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL,
  `display` varchar(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id` int(11) NOT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `nama_rekening` varchar(50) DEFAULT NULL,
  `nomor` varchar(30) DEFAULT NULL,
  `jenis` enum('Bank','Pulsa','COD','') DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif','','') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id`, `metode`, `nama_rekening`, `nomor`, `jenis`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BRI', 'Farista Dwi Vilandari', '6927-01-007782-53-4', 'Bank', 0, 'Aktif', '2017-06-15 20:19:21', '2017-06-15 13:19:21'),
(2, 'Pulsa As', '-', '082227384289', 'Pulsa', 1.2, 'Aktif', '2017-06-15 20:16:18', '2017-06-15 13:16:18'),
(4, 'COD', '-', '-', 'COD', 0, 'Aktif', '2017-05-21 00:20:55', '2017-05-20 17:20:55'),
(5, 'BNI', 'Farista DV', '0460263465', 'Bank', 0, 'Aktif', '2017-06-15 20:19:47', '2017-06-15 13:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `metode_produk`
--

CREATE TABLE `metode_produk` (
  `id_metode` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `metode_id` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_produk`
--

INSERT INTO `metode_produk` (`id_metode`, `produk_id`, `metode_id`, `status`, `created_at`, `updated_at`) VALUES
(117, 203, 1, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(118, 203, 2, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(120, 203, 4, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(121, 203, 5, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(122, 204, 1, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(123, 204, 2, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(125, 204, 4, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(126, 204, 5, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(127, 205, 1, 'Tidak Aktif', '2017-05-23 00:10:31', '2017-05-22 17:10:31'),
(128, 205, 2, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(130, 205, 4, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(131, 205, 5, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(132, 206, 1, 'Aktif', '2017-05-22 23:55:26', '2017-05-22 16:55:26'),
(133, 206, 2, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(135, 206, 4, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(136, 206, 5, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(137, 207, 1, 'Tidak Aktif', '2017-05-22 21:40:47', '2017-05-22 14:40:47'),
(138, 207, 2, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(140, 207, 4, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(141, 207, 5, 'Aktif', '2017-05-22 05:42:51', '0000-00-00 00:00:00'),
(142, 209, 1, 'Aktif', '2017-05-22 12:09:14', '0000-00-00 00:00:00'),
(143, 209, 2, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(145, 209, 4, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(146, 209, 5, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(157, NULL, 1, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(158, NULL, 2, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(160, NULL, 4, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(161, NULL, 5, 'Aktif', '2017-05-22 12:10:22', '0000-00-00 00:00:00'),
(162, 210, 1, NULL, '2017-05-25 01:20:19', '0000-00-00 00:00:00'),
(163, 210, 2, NULL, '2017-05-25 01:20:19', '0000-00-00 00:00:00'),
(165, 210, 4, NULL, '2017-05-25 01:20:19', '0000-00-00 00:00:00'),
(166, 210, 5, NULL, '2017-05-25 01:20:19', '0000-00-00 00:00:00'),
(167, 211, 1, NULL, '2017-06-02 05:30:44', '0000-00-00 00:00:00'),
(168, 211, 2, NULL, '2017-06-02 05:30:44', '0000-00-00 00:00:00'),
(170, 211, 4, NULL, '2017-06-02 05:30:44', '0000-00-00 00:00:00'),
(171, 211, 5, NULL, '2017-06-02 05:30:44', '0000-00-00 00:00:00'),
(172, 212, 1, NULL, '2017-06-07 03:12:37', '0000-00-00 00:00:00'),
(173, 212, 2, NULL, '2017-06-07 03:12:37', '0000-00-00 00:00:00'),
(175, 212, 4, NULL, '2017-06-07 03:12:37', '0000-00-00 00:00:00'),
(176, 212, 5, NULL, '2017-06-07 03:12:37', '0000-00-00 00:00:00'),
(177, 213, 1, NULL, '2017-06-07 03:39:26', '0000-00-00 00:00:00'),
(178, 213, 2, NULL, '2017-06-07 03:39:26', '0000-00-00 00:00:00'),
(180, 213, 4, NULL, '2017-06-07 03:39:26', '0000-00-00 00:00:00'),
(181, 213, 5, NULL, '2017-06-07 03:39:26', '0000-00-00 00:00:00'),
(182, 214, 1, NULL, '2017-06-12 13:09:00', '0000-00-00 00:00:00'),
(183, 214, 5, NULL, '2017-06-12 13:09:00', '0000-00-00 00:00:00'),
(184, NULL, 1, NULL, '2017-06-12 13:24:33', '0000-00-00 00:00:00'),
(185, NULL, 5, NULL, '2017-06-12 13:24:33', '0000-00-00 00:00:00'),
(186, NULL, 1, NULL, '2017-06-12 13:28:32', '0000-00-00 00:00:00'),
(187, NULL, 5, NULL, '2017-06-12 13:28:32', '0000-00-00 00:00:00'),
(188, NULL, 1, NULL, '2017-06-12 13:34:36', '0000-00-00 00:00:00'),
(189, NULL, 5, NULL, '2017-06-12 13:34:36', '0000-00-00 00:00:00'),
(190, NULL, 1, NULL, '2017-06-12 13:55:10', '0000-00-00 00:00:00'),
(192, NULL, 4, NULL, '2017-06-12 13:55:10', '0000-00-00 00:00:00'),
(194, NULL, 1, NULL, '2017-06-12 14:20:06', '0000-00-00 00:00:00'),
(195, NULL, 5, NULL, '2017-06-12 14:20:06', '0000-00-00 00:00:00'),
(196, NULL, 1, NULL, '2017-06-12 14:27:14', '0000-00-00 00:00:00'),
(197, NULL, 2, NULL, '2017-06-12 14:27:14', '0000-00-00 00:00:00'),
(199, NULL, 4, NULL, '2017-06-12 14:27:14', '0000-00-00 00:00:00'),
(200, NULL, 5, NULL, '2017-06-12 14:27:14', '0000-00-00 00:00:00'),
(202, NULL, 1, NULL, '2017-06-12 14:28:52', '0000-00-00 00:00:00'),
(203, NULL, 2, NULL, '2017-06-12 14:28:52', '0000-00-00 00:00:00'),
(205, NULL, 4, NULL, '2017-06-12 14:28:52', '0000-00-00 00:00:00'),
(206, NULL, 5, NULL, '2017-06-12 14:28:52', '0000-00-00 00:00:00'),
(208, NULL, 1, NULL, '2017-06-12 14:28:53', '0000-00-00 00:00:00'),
(209, NULL, 2, NULL, '2017-06-12 14:28:53', '0000-00-00 00:00:00'),
(211, NULL, 4, NULL, '2017-06-12 14:28:53', '0000-00-00 00:00:00'),
(212, NULL, 5, NULL, '2017-06-12 14:28:53', '0000-00-00 00:00:00'),
(214, NULL, 2, NULL, '2017-06-12 18:30:21', '0000-00-00 00:00:00'),
(215, NULL, 4, NULL, '2017-06-12 18:30:21', '0000-00-00 00:00:00'),
(216, NULL, 5, NULL, '2017-06-12 18:30:21', '0000-00-00 00:00:00'),
(218, NULL, 1, NULL, '2017-06-13 07:59:49', '0000-00-00 00:00:00'),
(219, NULL, 2, NULL, '2017-06-13 07:59:49', '0000-00-00 00:00:00'),
(221, NULL, 5, NULL, '2017-06-13 07:59:49', '0000-00-00 00:00:00'),
(223, NULL, 1, NULL, '2017-06-13 08:12:58', '0000-00-00 00:00:00'),
(224, NULL, 2, NULL, '2017-06-13 08:12:58', '0000-00-00 00:00:00'),
(226, NULL, 2, NULL, '2017-06-13 08:56:31', '0000-00-00 00:00:00'),
(228, NULL, 4, NULL, '2017-06-13 08:56:31', '0000-00-00 00:00:00'),
(229, NULL, 5, NULL, '2017-06-13 08:56:31', '0000-00-00 00:00:00'),
(230, NULL, 1, NULL, '2017-06-13 19:43:19', '0000-00-00 00:00:00'),
(231, NULL, 5, NULL, '2017-06-13 19:43:19', '0000-00-00 00:00:00'),
(232, NULL, 1, NULL, '2017-06-13 19:45:24', '0000-00-00 00:00:00'),
(233, NULL, 2, NULL, '2017-06-13 19:45:24', '0000-00-00 00:00:00'),
(234, NULL, 4, NULL, '2017-06-13 19:45:24', '0000-00-00 00:00:00'),
(235, NULL, 5, NULL, '2017-06-13 19:45:24', '0000-00-00 00:00:00'),
(236, NULL, 1, NULL, '2017-06-14 01:11:33', '0000-00-00 00:00:00'),
(237, NULL, 2, NULL, '2017-06-14 01:11:33', '0000-00-00 00:00:00'),
(238, NULL, 4, NULL, '2017-06-14 01:11:33', '0000-00-00 00:00:00'),
(239, NULL, 5, NULL, '2017-06-14 01:11:33', '0000-00-00 00:00:00'),
(240, NULL, 1, NULL, '2017-06-14 01:13:28', '0000-00-00 00:00:00'),
(241, NULL, 2, NULL, '2017-06-14 01:13:28', '0000-00-00 00:00:00'),
(242, NULL, 4, NULL, '2017-06-14 01:13:28', '0000-00-00 00:00:00'),
(243, NULL, 5, NULL, '2017-06-14 01:13:28', '0000-00-00 00:00:00'),
(244, NULL, 1, NULL, '2017-06-14 01:19:39', '0000-00-00 00:00:00'),
(245, NULL, 2, NULL, '2017-06-14 01:19:39', '0000-00-00 00:00:00'),
(246, NULL, 5, NULL, '2017-06-14 01:19:39', '0000-00-00 00:00:00'),
(247, NULL, 1, NULL, '2017-06-14 01:21:28', '0000-00-00 00:00:00'),
(248, NULL, 5, NULL, '2017-06-14 01:21:28', '0000-00-00 00:00:00'),
(249, NULL, 1, NULL, '2017-06-14 01:23:59', '0000-00-00 00:00:00'),
(250, NULL, 2, NULL, '2017-06-14 01:23:59', '0000-00-00 00:00:00'),
(251, NULL, 4, NULL, '2017-06-14 01:23:59', '0000-00-00 00:00:00'),
(252, NULL, 5, NULL, '2017-06-14 01:23:59', '0000-00-00 00:00:00'),
(253, NULL, 1, NULL, '2017-06-14 01:40:18', '0000-00-00 00:00:00'),
(254, NULL, 2, NULL, '2017-06-14 01:40:18', '0000-00-00 00:00:00'),
(255, NULL, 4, NULL, '2017-06-14 01:40:18', '0000-00-00 00:00:00'),
(256, NULL, 5, NULL, '2017-06-14 01:40:18', '0000-00-00 00:00:00'),
(257, NULL, 1, NULL, '2017-06-14 01:44:00', '0000-00-00 00:00:00'),
(258, NULL, 2, NULL, '2017-06-14 01:44:00', '0000-00-00 00:00:00'),
(259, NULL, 4, NULL, '2017-06-14 01:44:00', '0000-00-00 00:00:00'),
(260, NULL, 5, NULL, '2017-06-14 01:44:00', '0000-00-00 00:00:00'),
(261, NULL, 1, NULL, '2017-06-14 01:48:58', '0000-00-00 00:00:00'),
(262, NULL, 2, NULL, '2017-06-14 01:48:58', '0000-00-00 00:00:00'),
(263, NULL, 4, NULL, '2017-06-14 01:48:58', '0000-00-00 00:00:00'),
(264, NULL, 5, NULL, '2017-06-14 01:48:58', '0000-00-00 00:00:00'),
(265, NULL, 1, NULL, '2017-06-14 06:55:57', '0000-00-00 00:00:00'),
(266, NULL, 2, NULL, '2017-06-14 06:55:57', '0000-00-00 00:00:00'),
(267, NULL, 4, NULL, '2017-06-14 06:55:57', '0000-00-00 00:00:00'),
(268, NULL, 5, NULL, '2017-06-14 06:55:57', '0000-00-00 00:00:00'),
(269, NULL, 1, NULL, '2017-06-14 07:25:56', '0000-00-00 00:00:00'),
(270, NULL, 2, NULL, '2017-06-14 07:25:56', '0000-00-00 00:00:00'),
(271, NULL, 4, NULL, '2017-06-14 07:25:56', '0000-00-00 00:00:00'),
(272, NULL, 5, NULL, '2017-06-14 07:25:56', '0000-00-00 00:00:00'),
(273, NULL, 1, NULL, '2017-06-14 08:02:22', '0000-00-00 00:00:00'),
(274, NULL, 2, NULL, '2017-06-14 08:02:22', '0000-00-00 00:00:00'),
(275, NULL, 4, NULL, '2017-06-14 08:02:22', '0000-00-00 00:00:00'),
(276, NULL, 5, NULL, '2017-06-14 08:02:22', '0000-00-00 00:00:00'),
(277, 252, 1, NULL, '2017-06-15 07:29:56', '0000-00-00 00:00:00'),
(278, 252, 2, NULL, '2017-06-15 07:29:56', '0000-00-00 00:00:00'),
(279, 252, 4, NULL, '2017-06-15 07:29:56', '0000-00-00 00:00:00'),
(280, 252, 5, NULL, '2017-06-15 07:29:56', '0000-00-00 00:00:00'),
(281, 253, 1, NULL, '2017-06-15 07:42:36', '0000-00-00 00:00:00'),
(282, 253, 2, NULL, '2017-06-15 07:42:36', '0000-00-00 00:00:00'),
(283, 253, 4, NULL, '2017-06-15 07:42:36', '0000-00-00 00:00:00'),
(284, 253, 5, NULL, '2017-06-15 07:42:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_23_100117_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00d62bd7-e3ea-44f2-8f83-5636d3454d3a', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila ugm"}', NULL, '2017-06-15 15:33:08', '2017-06-15 15:33:08'),
('01a30ec3-92d0-44cc-8c88-717d1f71da01', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-06 04:39:01', '2017-06-06 04:39:01'),
('01c5b242-02e8-4d35-a963-d8025f0f9ca1', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 20, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-15 08:52:07', '2017-06-15 08:52:07'),
('0362b947-d7bc-427a-93fa-a2a2ccf64f38', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:27:07', '2017-05-28 08:27:07'),
('03727010-2af8-46b3-85f5-40ff0fcf672a', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:09:50', '2017-06-04 21:09:50'),
('03e1b51e-1325-4369-9117-7feafe3e8aa3', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru:Customer Olehnila nur lita sari"}', NULL, '2017-05-27 15:22:44', '2017-05-27 15:22:44'),
('068d2295-1ed3-4d9a-8bea-e8d1017c84c0', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:29:14', '2017-06-09 23:29:14'),
('08248a7b-3e46-4112-9a32-9379ca5f9947', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:13:30', '2017-06-09 23:13:30'),
('0afd45ae-3821-4e48-9fca-295ad4186843', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:09:50', '2017-06-04 21:09:50'),
('0cd2be62-6e8a-487d-a2b2-fbf04426d7a0', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:46:45', '2017-06-09 23:46:45'),
('0d699a4a-1cfe-461f-8b18-938bc8ac8e38', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 07:33:38', '2017-06-02 07:33:38'),
('10cf6231-9595-4e78-9eee-62b67d439f9c', 'App\\Notifications\\PermintaanUpgrade', 10, 'App\\User', '{"data":"Permintaan upgrade oleh nunu menjadi Reseller"}', NULL, '2017-06-06 06:25:32', '2017-06-06 06:25:32'),
('116a6243-12fc-4ad0-b6cf-da57e1734c07', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 07:37:17', '2017-06-02 07:37:17'),
('12acd02b-01b4-47b1-85f8-5122b76f4575', 'App\\Notifications\\UpgradeUser', 7, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-01 22:01:08', '2017-06-01 22:01:08'),
('137f7d76-c747-42ca-b7e5-96e536dec645', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:32:19', '2017-06-13 11:32:19'),
('147e0a70-de18-41e4-aa37-b56c205aad90', 'App\\Notifications\\UpgradeUser', 15, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-06 22:42:52', '2017-06-06 22:42:52'),
('14825235-f7fd-4d3c-8ece-5d2f83ddb1aa', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:06:54', '2017-05-28 07:06:54'),
('14bd268d-62de-473b-a2c7-080334b4c15c', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 12:04:21', '2017-06-13 12:04:21'),
('14c025be-3984-45e1-8c8e-f4a66240fdbd', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 00:46:30', '2017-06-15 00:46:30'),
('1837816c-b95d-4798-88fb-6ddffa0009f8', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:20:52', '2017-06-13 11:20:52'),
('18fcf774-5a3d-4531-b4fc-3a3e2d90d72c', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:07:27', '2017-05-28 07:07:27'),
('197bd8cd-50ce-400d-9bbe-d2321cd90e3e', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:46:29', '2017-06-14 01:46:29'),
('19f04d5e-151c-4e02-a22f-8a035a8fbc29', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 21, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-15 19:42:22', '2017-06-15 19:42:22'),
('1a160782-53f6-4ba5-b9dc-6e165481ebf1', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:20:58', '2017-05-28 08:20:58'),
('1adb46f6-696f-49e0-b248-36d4d2a7b455', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:48:42', '2017-06-02 16:48:42'),
('1d1c58fe-ff96-42b9-b6c6-dabe113aba94', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-07 00:58:04', '2017-06-07 00:58:04'),
('1d83d388-5781-400a-a8b0-60fdb360e044', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila ugm"}', NULL, '2017-06-15 13:08:43', '2017-06-15 13:08:43'),
('1e472456-e799-415c-af7b-5301c7054c99', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 08:10:55', '2017-06-15 08:10:55'),
('1e774cae-75fb-4fe1-a791-28952f5386fa', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:13:00', '2017-05-28 08:13:00'),
('1e8fd4bf-fe2b-481c-944a-85f6c1e66c2e', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:57:06', '2017-06-02 16:57:06'),
('1e976ca7-069a-4bff-ae80-572b76f68a43', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:24:24', '2017-06-09 23:24:24'),
('20a133f7-ffb8-443f-a3f2-caaddb583f8c', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-05 00:09:50', '2017-06-05 00:09:50'),
('211be6d3-a1a1-40e8-9d1b-1691dd8b8a7d', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 20:58:40', '2017-06-04 20:58:40'),
('21ef07fa-58c6-4dbf-9884-21da609ceab7', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:29:14', '2017-06-09 23:29:14'),
('226dae8a-64e6-47e2-8a9c-bd58c619e495', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 13:31:36', '2017-06-02 13:31:36'),
('237859a5-e613-46ce-be7b-1be057d1b3c1', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-05 23:50:47', '2017-06-05 23:50:47'),
('26436fe3-b5b9-4c4c-a02d-09c7a58822d1', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-13 18:59:23', '2017-06-13 18:59:23'),
('26a082f4-0f96-438c-9b4c-a85a4fff6cf3', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:21:03', '2017-05-28 08:21:03'),
('27529cfa-ba63-4105-80e9-74299c9eb78f', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nunu menjadi Reseller"}', NULL, '2017-06-06 06:25:24', '2017-06-06 06:25:24'),
('2841d1f3-4b9c-4c27-8bcd-3854fc262fbd', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:20:53', '2017-06-09 23:20:53'),
('288d8440-4d93-48d0-a5b8-c05fc05f00e3', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:27:11', '2017-05-28 08:27:11'),
('28d77efd-8359-4206-9e36-e51469d881c8', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 12:04:22', '2017-06-13 12:04:22'),
('293f27bb-c118-4cda-afeb-9a1ad6caf135', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:46:44', '2017-06-09 23:46:44'),
('29acc30e-7363-413a-bb0a-3e192ff371b0', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila ugm"}', NULL, '2017-06-15 08:49:35', '2017-06-15 08:49:35'),
('2ab23c11-a872-4b53-ac47-1e49b697f9c5', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila sari menjadi Reseller"}', NULL, '2017-06-04 10:03:22', '2017-06-04 10:03:22'),
('2b887c1b-8018-4856-acd0-61d126dc0a03', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:18:44', '2017-06-09 23:18:44'),
('2cca6e79-cf66-4e77-856e-0eff7a3fe829', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-12 06:58:25', '2017-06-12 06:58:25'),
('2ddabf75-6dd9-46ea-b2d4-3809dd40b12d', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:23:53', '2017-06-09 23:23:53'),
('2f10aaff-dbba-4cb1-900c-935bbcb97abc', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:29:14', '2017-06-09 23:29:14'),
('2fd62c09-585d-4c90-821e-347f68fcf046', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nunu menjadi Reseller"}', NULL, '2017-06-06 06:25:02', '2017-06-06 06:25:02'),
('3231cb2d-4035-4fc3-bd03-603418d2461f', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 20:58:39', '2017-06-04 20:58:39'),
('3279dcb7-e625-429f-896c-9fd1d8a62582', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 00:46:30', '2017-06-15 00:46:30'),
('3442f619-1a21-47fa-ad4d-f359d95442db', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:06:02', '2017-05-28 07:06:02'),
('346f51f9-4728-4faa-9208-5db92312d529', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:51:03', '2017-06-02 12:51:03'),
('3558a344-652d-4aac-97d5-d1787951b428', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 14, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-20 18:39:37', '2017-06-20 18:39:37'),
('357b92be-4d1c-499f-b25d-853f572db1ba', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:48:42', '2017-06-02 16:48:42'),
('37607ba6-6e30-4ef8-a4a6-2776e33950dc', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Oleharif"}', NULL, '2017-06-02 01:59:05', '2017-06-02 01:59:05'),
('3b641abf-a6ad-4156-9ea7-ade5c96c7c4f', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:43:22', '2017-06-02 12:43:22'),
('3d576562-4e21-49d6-b006-af9d6db6933d', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:01:05', '2017-06-04 21:01:05'),
('3d8f47fd-a956-4337-9af3-2c315d0c4fd0', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:48:09', '2017-06-14 01:48:09'),
('3e89350c-c839-46ae-8632-d3c297296f68', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 07:37:17', '2017-06-02 07:37:17'),
('41fb8ae0-c0e2-404e-b324-9c7f8926490b', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-02 23:39:12', '2017-06-02 23:39:12'),
('42433a3b-4eeb-48a6-89db-6b731355fbef', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru:Customer Olehnila nur lita sari"}', NULL, '2017-05-28 03:04:03', '2017-05-28 03:04:03'),
('42f91b7d-3555-4f61-a617-2686b824de6f', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-05 23:50:47', '2017-06-05 23:50:47'),
('45733ea2-917c-4fc6-aaf6-a0980573da9b', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:46:44', '2017-06-02 16:46:44'),
('46279d37-0fce-408d-b5f3-2539c7bf1c62', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru:Reseller Olehnila sari"}', NULL, '2017-05-28 03:12:16', '2017-05-28 03:12:16'),
('4752edd1-eb81-4977-95a3-9cc85d5bd1d4', 'App\\Notifications\\UpgradeUser', 7, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-01 22:19:28', '2017-06-01 22:19:28'),
('483cf07e-329e-4709-99e4-e73da030f21f', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:45:32', '2017-06-02 16:45:32'),
('4b7563bf-0e97-451b-bbe5-b793523c3e6e', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:57:25', '2017-06-09 23:57:25'),
('4cb10c0c-920c-4b69-baa0-dd66a8512def', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:02:34', '2017-05-28 07:02:34'),
('4d2d58db-a7be-4a89-ac04-da4bc9a1d608', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 08:07:17', '2017-06-02 08:07:17'),
('4d962881-af9d-4d57-8f17-26d61b1c1a78', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 18:33:37', '2017-06-15 18:33:37'),
('5043061e-e17b-4e75-8d25-efe143ef51e0', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:01:05', '2017-06-04 21:01:05'),
('5176a680-7533-4a15-b4a4-dbd711f7b285', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-04 01:20:34', '2017-06-04 01:20:34'),
('5365065c-85f2-4f18-8531-06cb09e0488d', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:06:23', '2017-06-04 21:06:23'),
('546c5e70-a82b-4fac-8f00-4342e83a9df5', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:29:14', '2017-06-09 23:29:14'),
('55c89b45-6cbb-42a5-9e64-337a1beb69df', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:09:50', '2017-06-04 21:09:50'),
('58533a66-d6a3-4f03-8071-209e2007746a', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 13:31:36', '2017-06-02 13:31:36'),
('58e1393e-8382-41e8-94c8-b2e65001c837', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 20:55:45', '2017-06-10 20:55:45'),
('598f492e-6ec3-4f03-b6cf-d9b77684c020', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila ugm"}', NULL, '2017-06-15 08:49:35', '2017-06-15 08:49:35'),
('5c04f65d-a465-406b-bcc3-713a62bed0ab', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-06 17:02:24', '2017-06-06 17:02:24'),
('5d410836-392e-4cb1-9b05-609ab882fc87', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 07:36:40', '2017-05-28 07:36:40'),
('5de44546-1d31-474a-a304-985ead51d102', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-13 12:08:20', '2017-06-13 12:08:20'),
('5e3bb617-75db-479d-9b24-c401246c9110', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 00:00:34', '2017-06-10 00:00:34'),
('5ea0d6da-5e5d-4e6e-813b-57bf7e912ff1', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-07 00:58:04', '2017-06-07 00:58:04'),
('6078672d-067f-4813-8a7a-21eb55eb5083', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 07:36:44', '2017-05-28 07:36:44'),
('60ea5d72-312a-4d2f-82c3-c3bdd0da5dc1', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:59:35', '2017-06-02 12:59:35'),
('61469760-a664-4b6c-b612-283850252a3c', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:46:44', '2017-06-09 23:46:44'),
('61eb6fe9-abfb-4507-86f1-557b3c842457', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-04 21:16:25', '2017-06-04 21:16:25'),
('6274d66c-0a6a-44cf-a2cb-75c5094bd15c', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 00:00:34', '2017-06-10 00:00:34'),
('634fdcfb-b991-4c77-9a5d-6944c0658ffe', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:08:34', '2017-06-09 23:08:34'),
('63d8195e-0b2e-42aa-b31e-566f820dc3ae', 'App\\Notifications\\KonfirmasiPembayaranDitolak', 7, 'App\\User', '{"data":"Konfirmasi pembayaran ditolak"}', NULL, '2017-06-04 21:14:33', '2017-06-04 21:14:33'),
('6469c6eb-9f1a-46e8-bc03-9b5d7855fb09', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-04 01:19:48', '2017-06-04 01:19:48'),
('64eb6b5d-000a-49e1-8667-af7c2fc70599', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-14 23:12:09', '2017-06-14 23:12:09'),
('659234c8-2cf4-46ec-88ff-9cce25432cb6', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:30:24', '2017-06-13 11:30:24'),
('67c9cebf-3cdf-426c-960f-4f6a2452cc6a', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:23:53', '2017-06-09 23:23:53'),
('680ced63-7215-48fb-9d49-1d5bd5dc843f', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:25:49', '2017-06-09 23:25:49'),
('697fcdda-d294-4b20-9064-5b444d2bbc5a', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 11, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-02 02:09:25', '2017-06-02 02:09:25'),
('6b4e7a37-69ba-44f9-a924-751eb11bc850', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-04 21:15:58', '2017-06-04 21:15:58'),
('6c096c0d-ec07-4761-9401-d67e9143a237', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:28:36', '2017-06-09 23:28:36'),
('6c91d3bc-47ab-4491-ae81-6b1866bdbe15', 'App\\Notifications\\PermintaanUpgrade', 10, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:07:34', '2017-05-28 07:07:34'),
('701e32f3-5dc6-4533-b3bf-3ba1e0a3a53f', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:13:30', '2017-06-09 23:13:30'),
('70632e8f-d4b0-414b-af16-38d6cd397cff', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 20:55:45', '2017-06-10 20:55:45'),
('73285a96-dec2-4aca-a2a9-beab5626ff27', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:27:48', '2017-06-13 11:27:48'),
('73377a15-db08-47dc-9fcf-b39214471eb9', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 00:42:54', '2017-06-14 00:42:54'),
('74c9792f-8db9-47cb-936b-b5e20860a577', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:57:25', '2017-06-09 23:57:25'),
('75027384-5f3e-4b7a-b1fd-f27a9f88a3d6', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:25:26', '2017-06-09 23:25:26'),
('754787b1-3add-4db0-bf8d-c276d4ad58bb', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru:Reseller Olehnila sari"}', NULL, '2017-05-28 03:08:34', '2017-05-28 03:08:34'),
('76593bcd-e8ad-4ec9-b867-d4ad59834052', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:25:49', '2017-06-09 23:25:49'),
('7934a406-ce84-4863-a203-1d609cede2a8', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:30:24', '2017-06-13 11:30:24'),
('79f22d43-4c16-4731-8da8-d7ca6aae52be', 'App\\Notifications\\UpgradeUser', 7, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-01 22:04:27', '2017-06-01 22:04:27'),
('7bc20ccb-e4fe-4e0d-adf1-2964d479656b', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-05-28 08:24:32', '2017-05-28 08:24:32'),
('819c7c62-a81c-4cd7-abcd-076a1e3c1b3b', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:46:29', '2017-06-14 01:46:29'),
('81dcd959-ac0e-4e6b-b3df-88a3a31351f3', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:26:18', '2017-06-09 23:26:18'),
('827b3aa6-8287-4f7c-bcdf-2cee1a3b19af', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Oleharif"}', NULL, '2017-06-02 01:59:05', '2017-06-02 01:59:05'),
('84c9e0ef-cc15-44bb-9242-3669ed3270e6', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-05 00:09:50', '2017-06-05 00:09:50'),
('84ea6dee-9bf5-4e93-9d01-5baeea8e6c5f', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 14, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-08 23:59:20', '2017-06-08 23:59:20'),
('850e3eb7-736c-40cd-b032-02a428593fca', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:09:03', '2017-06-09 23:09:03'),
('85f211be-3e1f-48f7-a603-38d9063acb3b', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:13:30', '2017-06-09 23:13:30'),
('862c6417-d5a5-4b30-a47a-ce8066ed900f', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-02 23:39:08', '2017-06-02 23:39:08'),
('870d88b9-627b-4f9e-9b21-e2e16a11fab9', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:06:23', '2017-06-04 21:06:23'),
('87125358-aa2d-4dff-bd59-0ddd269b128c', 'App\\Notifications\\UpgradeUser', 7, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-01 21:58:20', '2017-06-01 21:58:20'),
('87b9cb77-fe22-42b2-b948-9168573b0d26', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-13 19:05:56', '2017-06-13 19:05:56'),
('897c4622-14c0-4f8b-baed-42c251b347ce', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 20:55:45', '2017-06-10 20:55:45'),
('89bee1f6-d88d-4fa6-9723-d7f6292ce679', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 00:42:53', '2017-06-14 00:42:53'),
('8ca02444-d20f-44af-b8e3-4e71731f871e', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:57:06', '2017-06-02 16:57:06'),
('8e85a7d2-c9fe-4da7-9d31-cdc2befa8649', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:08:11', '2017-06-09 23:08:11'),
('8ee157b2-d376-45b2-827a-5efe6cee5d72', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-13 18:59:23', '2017-06-13 18:59:23'),
('8eed54fa-b23f-4ec2-a8f7-0798bec00fdc', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-13 18:59:23', '2017-06-13 18:59:23'),
('90301e82-a7bd-4286-953f-ae3bcd7c60ec', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:12:54', '2017-05-28 08:12:54'),
('90838192-fd9b-41a5-a1d3-42c223f65d7b', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:20:53', '2017-06-09 23:20:53'),
('9200410f-37d6-4195-ab88-976e91f4cc95', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila ugm"}', NULL, '2017-06-15 13:08:43', '2017-06-15 13:08:43'),
('921b09b1-de7b-4c3a-a68a-ffa7113aca10', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:26:28', '2017-05-28 08:26:28'),
('92f65e82-6b59-4154-87d0-45b30649236f', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 08:32:42', '2017-06-15 08:32:42'),
('945d2003-1c80-4020-8c9b-b592a432f290', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:46:29', '2017-06-14 01:46:29'),
('95c37d31-4517-448c-b6fd-720c8e0bef45', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:08:34', '2017-06-09 23:08:34'),
('95fb6589-ef6d-4a1d-a610-2e0b3a13f662', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 18:33:37', '2017-06-15 18:33:37'),
('987171e1-b54a-4c04-945e-6fdb953cc899', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:32:19', '2017-06-13 11:32:19'),
('9c6a0d0e-c728-49b4-a15c-20213441ee71', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-13 19:05:56', '2017-06-13 19:05:56'),
('9e0f1cf9-62ce-4fa7-a675-31a7cb2a3e7f', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 02:01:52', '2017-06-04 02:01:52'),
('9ea05012-f074-4ecc-8143-57d2d503ff39', 'App\\Notifications\\UpgradeUser', 7, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-01 22:05:04', '2017-06-01 22:05:04'),
('9fa8f656-459b-47d0-b7b2-ef920bbb1b4f', 'App\\Notifications\\PermintaanUpgrade', 10, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sarimenjadiReseller"}', NULL, '2017-05-28 06:46:27', '2017-05-28 06:46:27'),
('a2d7ed71-ba1e-4e84-b1f6-3210ad508987', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-12 06:58:25', '2017-06-12 06:58:25'),
('a3954b0d-63c4-4661-a3b3-e42b002f1d13', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:45:32', '2017-06-02 16:45:32'),
('a905961c-2596-42f5-8092-d3844e13be00', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:46:29', '2017-06-14 01:46:29'),
('ab6be1a3-c3c3-427f-8c5d-25f540189265', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:18:44', '2017-06-09 23:18:44'),
('ac2dadb3-a4c8-4803-b1a6-ec6b2b4fe5c2', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:51:03', '2017-06-02 12:51:03'),
('ad002831-ce6a-4b8f-b759-5648d7c1e5e1', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:09:03', '2017-06-09 23:09:03'),
('ad4a3dee-64f1-4499-83c4-f85b6e75f491', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila sari menjadi Reseller"}', NULL, '2017-06-04 10:03:38', '2017-06-04 10:03:38'),
('ad60afd9-28b7-48b2-93bc-0850be71b978', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:13:30', '2017-06-09 23:13:30'),
('af27ace1-34a1-4688-8711-42b28e64447d', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-06 04:39:01', '2017-06-06 04:39:01'),
('afc68bd1-046a-4666-9f62-49431541578a', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-01 03:08:30', '2017-06-01 03:08:30'),
('b09e3843-71e8-4dab-8028-9ba8777b9f38', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:02:01', '2017-05-28 07:02:01'),
('b1ce15df-3eda-4110-a88d-51c7ddb2c0d0', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-04 21:16:02', '2017-06-04 21:16:02'),
('b1da952c-bf7e-4ca2-86fc-2024c9c6332c', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:36:24', '2017-05-28 08:36:24'),
('b312b8ee-ddfd-49e9-8f70-2254df5d6973', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 08:07:17', '2017-06-02 08:07:17'),
('b3b948da-aef6-450c-b583-642e66fbd3f2', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 13:58:23', '2017-05-28 13:58:23'),
('b4d825fe-a6e1-430c-8023-d0a8a13ef305', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-03 20:27:30', '2017-06-03 20:27:30'),
('b6821c40-de65-4fdf-b4d4-36c66819605e', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 20:55:45', '2017-06-10 20:55:45'),
('b91df4c2-04fe-4f61-a2a7-2ab6133ab4fd', 'App\\Notifications\\UpgradeUser', 7, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-04 21:59:05', '2017-06-04 21:59:05'),
('ba5de3fa-4552-4a50-ac07-fae63f928943', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:28:36', '2017-06-09 23:28:36'),
('bc1e6df7-927c-46b4-9b80-dfc0349d514b', 'App\\Notifications\\PermintaanUpgrade', 10, 'App\\User', '{"data":"Permintaan upgrade oleh nila sari menjadi Reseller"}', NULL, '2017-06-04 10:03:42', '2017-06-04 10:03:42'),
('be57f2f6-d312-47fe-8a7c-221326ff6e2c', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:43:22', '2017-06-02 12:43:22'),
('be649090-5d03-4b66-ab4b-06c046ce53f3', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:24:24', '2017-06-09 23:24:24'),
('be8b4890-a2a4-46fe-837b-51039c130de9', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:26:05', '2017-06-09 23:26:05'),
('bedfff2a-4207-4777-9b03-463ec7403ef5', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 02:01:52', '2017-06-04 02:01:52'),
('c090dacf-8bd2-4e17-b575-58352ff99d6e', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-14 23:15:37', '2017-06-14 23:15:37'),
('c1f2667f-6583-4080-b880-c41a0402da9b', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-04 01:19:51', '2017-06-04 01:19:51'),
('c221d2de-7cfd-449f-94f5-1468238af7d9', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-06 17:02:24', '2017-06-06 17:02:24'),
('c3f65b7d-8919-48b8-a8dc-36bb4a01ca54', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 00:00:34', '2017-06-10 00:00:34'),
('c527bb8b-89be-46c3-b051-a826ee186c26', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-04 02:03:28', '2017-06-04 02:03:28'),
('c68d06a8-9ccc-4675-8167-dedcba035f40', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:48:09', '2017-06-14 01:48:09'),
('c6e143fb-d807-4fbf-b075-0e34f5384694', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 08:36:18', '2017-05-28 08:36:18'),
('c781de2b-8583-4890-b094-90da49eaea2c', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:20:52', '2017-06-13 11:20:52'),
('c807187e-7358-40db-b8cc-fc62795afb35', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-05-28 13:58:28', '2017-05-28 13:58:28'),
('c9beb2a3-3024-4a77-a182-b4ace8fcdc00', 'App\\Notifications\\UpgradeUser', 20, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-15 08:46:45', '2017-06-15 08:46:45'),
('ca92e925-ffb6-4c86-8514-1942530e4f7a', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-15 00:56:01', '2017-06-15 00:56:01'),
('cf792f05-24b6-45e0-bd2d-4b7338d590b4', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:22:38', '2017-06-02 12:22:38'),
('cf7e22f8-1675-45a2-aff3-fe5bbe759cdd', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-13 11:27:48', '2017-06-13 11:27:48'),
('d3861586-3c5a-484f-b6a9-e6fa4af9363d', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:57:25', '2017-06-09 23:57:25'),
('d38c8161-0515-461e-915d-edab6e93ddda', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 16:46:44', '2017-06-02 16:46:44'),
('d3f103bf-1a76-4008-b310-4d7ad9556c03', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-02 23:39:43', '2017-06-02 23:39:43'),
('d43b5fec-b576-4fff-be49-de936fd3164b', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:48:09', '2017-06-14 01:48:09'),
('d4935209-bd71-4ea7-acb4-93e22137606b', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 08:32:42', '2017-06-15 08:32:42'),
('d4ab537c-ed94-4000-9eb1-4e0176aaa56c', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:26:18', '2017-06-09 23:26:18'),
('d65e1549-b3ed-4907-88a3-2ef859f1dec1', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-01 03:08:31', '2017-06-01 03:08:31'),
('d726e5f5-9581-4fb3-accd-4c798d5bd39e', 'App\\Notifications\\UpgradeUser', 14, 'App\\User', '{"data":"Upgrade user disetujui"}', NULL, '2017-06-15 18:46:37', '2017-06-15 18:46:37'),
('d7ff8348-9466-45eb-a1f5-b26e5421027f', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  arif"}', NULL, '2017-06-02 02:04:40', '2017-06-02 02:04:40'),
('dc62e028-def9-4608-ada4-54926449ff81', 'App\\Notifications\\KonfirmasiPembayaran', 10, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  arif"}', NULL, '2017-06-02 02:05:06', '2017-06-02 02:05:06'),
('dc81c63b-f3cf-488a-8312-b565d0c4dbbe', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-15 08:10:55', '2017-06-15 08:10:55'),
('dd477aaa-9ce6-484f-aeb7-394a923b9827', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 21:09:49', '2017-06-04 21:09:49'),
('dd7b12b7-6323-47c9-897d-b480b9f48314', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 01:04:29', '2017-06-04 01:04:29'),
('de779761-1e23-413e-bb29-9f18c5c9675b', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-10 00:00:34', '2017-06-10 00:00:34'),
('e098c13f-5cf4-43de-b7de-dec2dffa0f34', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:22:38', '2017-06-02 12:22:38'),
('e16cab3b-865d-4ba7-89b5-1ee8fd516138', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila ugm"}', NULL, '2017-06-15 15:33:09', '2017-06-15 15:33:09'),
('e2a52474-36a1-4a76-a9ce-f47cf8ada2c1', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:25:26', '2017-06-09 23:25:26'),
('e3a4b216-825d-4bad-81d5-eb24dea2e607', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-05-28 03:40:29', '2017-05-28 03:40:29'),
('e461ab75-bd2b-437f-a5e3-17c2ff382a6e', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 07:33:38', '2017-06-02 07:33:38'),
('e560be18-1454-4550-99a6-bbf0750774bf', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:28:54', '2017-06-09 23:28:54'),
('e5d0d25d-9949-483d-b814-db6ec7d215a1', 'App\\Notifications\\KonfirmasiPembayaranDitolak', 7, 'App\\User', '{"data":"Konfirmasi pembayaran ditolak"}', NULL, '2017-05-28 08:37:29', '2017-05-28 08:37:29'),
('e712f87b-4bf1-42ce-b093-0ecf6871c7e2', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:57:25', '2017-06-09 23:57:25'),
('e7dad754-d747-407f-afa7-0575c0974dde', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 13:24:56', '2017-06-02 13:24:56'),
('e89950c4-27a7-48a2-890e-83975c896a9a', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:08:11', '2017-06-09 23:08:11'),
('ec18f577-26bf-410c-a316-828156e125b4', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:26:17', '2017-06-09 23:26:17'),
('ee308f57-1118-43dd-96ed-d732cd932f52', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:26:05', '2017-06-09 23:26:05'),
('eec0244a-0f15-423f-8fe1-ca3a9f339eb0', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 07:31:40', '2017-06-02 07:31:40'),
('f09ec42e-9ac5-4974-8afe-a01e73269e34', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:06:18', '2017-06-09 23:06:18'),
('f14c7bac-fb75-4faf-9e5a-4572a611a102', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:46:45', '2017-06-09 23:46:45'),
('f1d1448f-0e13-4f09-853d-66514bd7b293', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-14 23:12:09', '2017-06-14 23:12:09'),
('f23933c4-1733-44e0-9f36-f13ae95d8407', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-04 01:04:29', '2017-06-04 01:04:29'),
('f2d982a7-9add-4266-b2e4-3d2f3c787388', 'App\\Notifications\\UpgradeDitolak', 9, 'App\\User', '{"data":"Upgrade user ditolak"}', NULL, '2017-05-28 07:08:51', '2017-05-28 07:08:51'),
('f3bbe538-c312-4658-8163-d71461b76cc8', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:28:54', '2017-06-09 23:28:54'),
('f44ca19c-d89b-48ea-8a36-f3cdb4383ff8', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 13:24:56', '2017-06-02 13:24:56'),
('f4c23dfe-4d20-4f2a-9d57-f89aef700111', 'App\\Notifications\\PermintaanUpgrade', 2, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sarimenjadiReseller"}', NULL, '2017-05-28 06:46:24', '2017-05-28 06:46:24'),
('f4c2bfab-440c-4f4e-af9e-86075621ebab', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 00:42:53', '2017-06-14 00:42:53'),
('f4f2d02e-f70e-45d6-a5dd-d67b321dbd94', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 07:31:40', '2017-06-02 07:31:40'),
('f614fcc7-3b48-4a37-bf5d-f2eee2a61152', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  nila sari"}', NULL, '2017-06-02 23:38:50', '2017-06-02 23:38:50'),
('f62c5737-cb19-4efa-a8dd-72364d8079fe', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-03 20:27:30', '2017-06-03 20:27:30'),
('f6749177-a61a-4e85-be8a-42ba43376a59', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 01:48:09', '2017-06-14 01:48:09'),
('f762238b-b645-4578-8e41-90d63496d668', 'App\\Notifications\\KonfirmasiPembayaranDiterima', 7, 'App\\User', '{"data":"Konfirmasi pembayaran diterima"}', NULL, '2017-06-01 22:21:37', '2017-06-01 22:21:37'),
('f89ac052-6b38-47b9-9656-279f3ad52294', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-13 18:59:23', '2017-06-13 18:59:23'),
('fb48e3ef-7098-496a-b07d-207d80a05723', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:06:18', '2017-06-09 23:06:18'),
('fc397327-c164-497a-bc8c-a281d5391d0b', 'App\\Notifications\\KonfirmasiPembayaran', 2, 'App\\User', '{"data":"Konfirmasi pembayaran oleh  arif"}', NULL, '2017-06-02 02:05:00', '2017-06-02 02:05:00'),
('fd0f58e2-c923-4b64-aee2-747e03f2115e', 'App\\Notifications\\PostNewNotification', 2, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-14 00:42:53', '2017-06-14 00:42:53'),
('fd46097e-99ef-4b8b-a98e-699d2b7617d0', 'App\\Notifications\\PermintaanUpgrade', 10, 'App\\User', '{"data":"Permintaan upgrade oleh nila nur lita sari menjadi Reseller"}', NULL, '2017-05-28 07:02:37', '2017-05-28 07:02:37'),
('fe58ae7b-3621-4601-86e6-fba0ea67d187', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila sari"}', NULL, '2017-06-02 12:59:35', '2017-06-02 12:59:35'),
('ff201bc7-07c7-44da-8f78-d6088192ef3b', 'App\\Notifications\\PostNewNotification', 10, 'App\\User', '{"data":"Transaksi baru: Olehnila n"}', NULL, '2017-06-09 23:26:17', '2017-06-09 23:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin1@admin.com', '$2y$10$vIVpRrPT7uML.ggI.mseZ.ALJRO/NDdXa7e19ScEuKkUSGx28.RuK', '2017-04-21 01:23:36'),
('nilasari21jg@gmail.com', '$2y$10$yKDp5zfFcIUikK.0Il91zuPBmlFOysAUGwj4YeB.w5FDc4k1IHjra', '2017-06-10 23:06:11'),
('nilanurlita21@gmail.com', '$2y$10$8x2bAq60Uk2lzrBZqUs7CeS6NwcxzIk2Oswibhqm4zqvFuoz4gH1K', '2017-06-10 23:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL,
  `nama_alamat` varchar(50) DEFAULT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `no_hp_penerima` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `id_user`, `provinsi`, `kabupaten`, `alamat_lengkap`, `nama_alamat`, `nama_penerima`, `no_hp_penerima`, `created_at`, `updated_at`) VALUES
(20, 7, 'Jawa Tengah', 'Klaten', 'jl. semarang', 'Alamat rumah', 'Nila', '081834567223', '2017-06-02 07:31:36', '2017-06-02 07:31:36'),
(21, 7, 'Jawa Tengah', 'Klaten', 'jl. semarang', 'Alamat rumah', 'Nila', '081834567223', '2017-06-02 07:33:37', '2017-06-02 07:33:37'),
(22, 7, 'DKI Jakarta', 'Jakarta Barat', 'jl. solo', 'alamat nur', 'Nur', '085640235938', '2017-06-02 12:43:21', '2017-06-02 12:43:21'),
(23, 7, 'Jawa Timur', 'Magetan', 'desa kelurahan', 'alamat orang', 'yolanda', '083149831433', '2017-06-04 21:20:20', '2017-06-04 21:20:20'),
(24, 14, 'DI Yogyakarta', 'sleman', 'yogya', 'yogya', 'nisa', '098765', '2017-06-07 08:18:35', '2017-06-07 01:18:35'),
(25, 7, 'Jawa Barat', 'Bandung', 'GRHGHNHJ', 'Alamat dua', 'yani', '081834567223', '2017-06-06 04:38:59', '2017-06-06 04:38:59'),
(26, 7, 'DI Yogyakarta', 'Sleman', 'fhk', 'a', 'nila', '081834567223', '2017-06-06 17:02:21', '2017-06-06 17:02:21'),
(27, 14, 'Jawa Barat', 'Bandung', 'Jl. gatot kaca', 'Alamat rumah', 'Nila nur lita', '083149831433', '2017-06-07 00:53:39', '2017-06-07 00:53:39'),
(28, 14, 'Jawa Tengah', 'Klaten', 'Jl. Diponegoro nomor 19', 'alamat orang tua', 'Bapak Sugiono', '083149831433', '2017-06-07 01:12:38', '2017-06-07 01:12:38'),
(29, 14, 'DI Yogyakarta', 'Sleman', 'jl magelang', 'alamat pacar', 'bb', '083149831433', '2017-06-13 19:05:55', '2017-06-13 19:05:55'),
(30, 7, 'DKI Jakarta', 'Jakarta Barat', 'jl. jakarta', 'alamat orang tua', 'nunu', '083149831433', '2017-06-14 23:12:06', '2017-06-14 23:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `berat` int(11) NOT NULL,
  `minimal_beli` int(11) DEFAULT NULL,
  `jenis` enum('PreOrder','Ready Stock','','') NOT NULL,
  `tgl_awal_po` date DEFAULT NULL,
  `tgl_akhir_po` date DEFAULT NULL,
  `jumlah_minimal_produksi` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `id_kategori` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `berat`, `minimal_beli`, `jenis`, `tgl_awal_po`, `tgl_akhir_po`, `jumlah_minimal_produksi`, `foto`, `keterangan`, `id_kategori`, `created_at`, `updated_at`) VALUES
(203, 'Album YNWA', 250, 5, 'Ready Stock', NULL, NULL, NULL, '1496280538.jpg', 'READY STOCK!!!\r\n\r\n- Left ver. (Mint): SOLD OUT!!!\r\n- Right ver. (Pink): 5 pcs\r\n\r\nAlbum terdiri dari:\r\n*CD\r\n*Poster\r\n*Photobook 120 halaman\r\n*Photocard\r\n*first press gift: mini standing doll.\r\nCover, poster, dan photobook berbeda untuk setiap versi.\r\n\r\nDaftar lagu di dalam CD sebagai berikut:\r\n1. Intro : Boy Meets Evil \r\n2. Pi ddam nunmul - Blood Sweat & Tears\r\n3. Begin \r\n4. Lie \r\n5. Stigma \r\n6. First Love \r\n7. Reflection \r\n8. MAMA \r\n9, Awake \r\n10. Lost \r\n11. BTS Cypher 4 \r\n12. Am I Wrong \r\n13. 21 segi sonyeo - 21st Century Girls\r\n14. Dul! Set! (Geuraedo joheun nari deo manhgireul) - Two! Three! (Hoping For More Good Days)\r\n15. Bomnal - Spring Day\r\n16. Not Today\r\n17. Outro: WINGS\r\n18. A Supplementary Story: You Never Walk Alone\r\n\r\nHarga sudah termasuk tube poster.', 7, '2017-05-19 08:33:00', '2017-05-31 18:28:58'),
(204, 'Kaos Produce 101', 250, 6, 'PreOrder', '2017-06-01', '2017-06-02', 15, '1496280450.jpg', 'T-shirt/Kaos/Tee Akdong Musician (AKMU) ''Spring''\r\n\r\nBahan yg digunakan adalah MF. Bahan MF memiliki sifat lentur dan padat. bahan ini menjaga tubuh tetap sejuk dan kering. MF memiliki ciri pori-pori bahan yg banyak. Bahan yg adem dipakai dan sangat baik menyerap keringat cocok untuk dipakai sehari-hari.\r\n\r\nSIZE/UKURAN (Lebar x Panjang):\r\nS = 38 x 68 cm\r\nM = 41 x 63 cm\r\nL = 50 x 69 cm\r\nXL = 52 x 71 cm\r\nXXL = 56 x 76 cm\r\n\r\n*Proses pengerjaan kira-kira 2-4 hari kerja.\r\n*Tolong tulis size di keterangan\r\n*Kaos yg sudah dipesan tidak bisa dikembalikan dengan alasan size tidak sesuai, jadi diharapkan cek baik-baik size ukuran sesuai dengan size kamu\r\n*Jika kalian memerlukan bantuan, silahkan kirim pesan.', 1, '2017-05-19 08:39:19', '2017-05-31 18:27:30'),
(205, 'Kaos Wings Tour 2017', 300, 5, 'Ready Stock', NULL, NULL, NULL, '1496280379.jpeg', 'READY STOCK : Kaos Lengan Pendek Bangtan Boys - BTS 2017 The WINGS Tour\r\nMATERIAL : Cotton Combed 20s''\r\nAPLIKASI : Sablon\r\nTYPE : Pria / Wanita\r\nWARNA : Hitam\r\nSIZE : M - L - XL\r\nPRODUK : Lokal\r\nNOTE : TAMPAK DEPAN POLOS\r\nNOTE : READY STOCK SEMUA MEMBER', 1, '2017-05-19 08:49:13', '2017-05-31 18:26:19'),
(206, 'Paket A Tumblr', 200, 5, 'PreOrder', '2017-05-22', '2017-06-05', 5, '1496279979.jpg', 'Paket A (30000) :\r\n- 7 polaroid custom (nanti di beri caption bawahnya)\r\n- 7 wooden clip (motif random)\r\n- Tali', 9, '2017-05-19 09:25:52', '2017-06-03 22:06:36'),
(207, 'Paket B Tumblr', 200, 5, 'PreOrder', '2017-05-20', '2017-06-07', 10, '1495211272.JPG', 'Paket B (100000) :\r\n- 10 polaroid custom (nanti di beri caption bawahnya)\r\n- 10 wooden clip (motif random)\r\n- Tali\r\n- Tumblr light (-+8m)', 9, '2017-05-19 09:27:52', '2017-05-25 09:21:50'),
(209, 'T-Shirt "Shining Diamond"', 250, 5, 'PreOrder', '2017-05-26', '2017-06-09', 12, '1495211637.JPG', 'Bahan=> Cotton Combet 30s .\r\nUkuran:\r\nS => panjang 64/lebar 46\r\nM =>panjang 67/lebar 48\r\nL=> panjang 70/lebar 50\r\nXl=> panjang 72/lebar 54\r\nXxl=> panjang 72/lebar 57', 1, '2017-05-19 09:33:57', '2017-05-19 09:33:57'),
(210, 'sweater gucci jimin', 300, 3, 'PreOrder', '2017-06-01', '2017-06-16', 15, '1495675216.JPG', 'Ready stock Sweater Jimin Gucci \r\nHarga : IDR 165.000 \r\nBahan : Baby Terry \r\nSablon : Rubber\r\nSize Chart :\r\nLebar - Panjang - Pjg Lengan (cm)\r\nS : L48 - P64 - PL59 \r\nM : L52 - P67 - PL61', 6, '2017-05-24 18:20:18', '2017-05-24 18:20:18'),
(211, 'Kaos IKON', 200, 5, 'Ready Stock', NULL, NULL, NULL, '1497273146.jpg', 'Bahan Kaos Cotton Combed 30s\r\n\r\nSize :\r\n\r\nS 38 x 58cm\r\n\r\nM 41 x 63cm\r\n\r\nL 50 x 69cm \r\n\r\nXL 52 x 71cm', 1, '2017-06-01 22:30:42', '2017-06-01 22:30:42'),
(212, 'T-Shirt NCT127 Sum Market', 450, 2, 'PreOrder', '2017-06-16', '2017-06-30', 10, '1496805154.JPG', 'Bahan=> Cotton Combed (30s warna hitam, 20s warna putih biar ga terawang) \r\nSablon => Rubber Matsui\r\n\r\nUkuran:\r\nS => panjang 64 /lebar 46\r\nM=>panjang 68 /lebar 50\r\nL=>panjang 70 /lebar 50\r\nXL=> panjang 72 /lebar 54\r\nXXL=> panjang 72/lebar 57', 1, '2017-06-06 20:12:36', '2017-06-06 20:22:39'),
(213, 'Tas BTS', 300, 1, 'Ready Stock', NULL, NULL, NULL, '1496806765.JPG', 'Warna hitam.  Bahan kanvas. Panjang 40 cm, lebar 31 cm. Tebal 14 cm', 11, '2017-06-06 20:39:26', '2017-06-06 20:39:26'),
(214, 'W-Dressroom Perfume no. 64', 450, 2, 'PreOrder', '2017-06-12', '2017-06-27', 0, '1497272937.JPG', 'Produk dikirim dari Korea. Sudah termasuk EMS dan TAX .\r\nDress & Living Clear Perfume, Anti-bacteria, deodorant. Natural soft scent for bathroom, toilet, kitchen, bedroom, work, shoe rack, car, capet, valentine gifts.', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'W-Dressroom Perfume no. 97', 450, 2, 'PreOrder', '2017-06-12', '2017-06-27', 0, '1497273725.jpg', 'Produk dikirim dari Korea. Sudah termasuk EMS dan TAX . Dress & Living Clear Perfume, Anti-bacteria, deodorant. Natural soft scent for bathroom, toilet, kitchen, bedroom, work, shoe rack, car, capet, valentine gifts.', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'W-Dressroom Perfume no. 97', 450, 1, 'PreOrder', '2017-06-15', '2017-06-30', 0, '1497511794.jpg', 'Produk dikirim dari Korea. Sudah termasuk EMS dan TAX . Dress & Living Clear Perfume, Anti-bacteria, deodorant. Natural soft scent for bathroom, toilet, kitchen, bedroom, work, shoe rack, car, capet, valentine gifts.', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'Jersey EXOrdium White seoul', 250, 2, 'Ready Stock', NULL, NULL, NULL, '1497512554.jpg', 'Ready Stock jersey Exordium White Seoul', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk_ukuran`
--

CREATE TABLE `produk_ukuran` (
  `id_produk_ukuran` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `ukuran_id` int(11) DEFAULT NULL,
  `harga_pokok` int(11) DEFAULT NULL,
  `harga_tambah` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_ukuran`
--

INSERT INTO `produk_ukuran` (`id_produk_ukuran`, `produk_id`, `ukuran_id`, `harga_pokok`, `harga_tambah`, `stock`, `created_at`, `updated_at`) VALUES
(109, 203, 6, 300000, 0, 6, '2017-06-05 12:09:09', '2017-06-04 21:09:30'),
(110, 204, 2, 65000, 0, 0, '2017-06-02 19:58:11', '2017-05-21 01:52:19'),
(111, 204, 3, 65000, 0, 0, '2017-06-02 19:58:19', '2017-05-21 01:52:24'),
(112, 204, 5, 65000, 10000, 0, '2017-06-02 19:58:57', '2017-06-02 12:58:57'),
(113, 204, 7, 65000, 10000, 0, '2017-05-29 01:40:32', '2017-05-21 01:48:22'),
(114, 205, 2, 70000, 0, 1, '2017-06-04 09:01:25', '2017-06-04 02:01:25'),
(115, 205, 3, 70000, 0, 0, '2017-06-04 01:52:53', '2017-06-03 18:52:53'),
(116, 205, 4, 70000, 0, 1, '2017-06-04 01:52:53', '2017-06-03 18:52:53'),
(117, 205, 5, 70000, 10000, 1, '2017-06-04 01:52:53', '2017-06-03 18:52:53'),
(118, 205, 7, 70000, 0, 0, '2017-06-04 01:52:53', '2017-06-03 18:52:53'),
(119, 206, 6, 35000, 0, 0, '2017-06-04 09:01:16', '2017-06-04 02:01:16'),
(120, 207, 6, 100000, 0, 0, '2017-06-06 03:55:02', '2017-06-05 20:55:02'),
(121, 209, 2, 60000, 0, 0, '2017-06-06 06:49:23', '2017-06-05 23:49:23'),
(122, 209, 3, 60000, 0, 0, '2017-05-20 03:08:38', '2017-05-19 20:08:38'),
(123, 209, 5, 60000, 0, 0, '2017-06-06 11:33:15', '2017-06-06 04:33:15'),
(124, 209, 7, 60000, 10000, 0, '2017-06-02 23:46:18', '2017-06-02 16:46:18'),
(125, 210, 1, 155000, 0, 0, '2017-06-11 03:55:20', '2017-06-10 20:55:20'),
(126, 210, 2, 155000, 0, 0, '2017-05-29 01:39:52', '2017-05-28 03:11:48'),
(127, 211, 1, 65000, 0, 1, '2017-06-20 11:21:45', '2017-06-19 22:29:33'),
(128, 211, 2, 65000, 0, 1, '2017-06-10 06:57:57', '2017-06-09 23:48:11'),
(129, 211, 3, 65000, 0, 5, '2017-06-01 22:30:43', '2017-06-01 22:30:43'),
(130, 211, 4, 65000, 0, 0, '2017-06-03 09:47:37', '2017-06-02 01:53:19'),
(131, 211, 5, 65000, 5000, 2, '2017-06-01 22:30:43', '2017-06-01 22:30:43'),
(132, 211, 7, 65000, 0, 19, '2017-06-03 03:37:19', '2017-06-02 20:37:19'),
(133, 212, 2, 50000, 0, 0, '2017-06-14 19:47:45', '2017-06-14 12:47:45'),
(134, 212, 3, 50000, 0, 0, '2017-06-14 19:47:45', '2017-06-14 12:47:45'),
(135, 212, 4, 50000, 0, 0, '2017-06-14 19:47:45', '2017-06-14 12:47:45'),
(136, 212, 5, 50000, 0, 0, '2017-06-14 19:47:45', '2017-06-14 12:47:45'),
(137, 212, 7, 50000, 0, 0, '2017-06-14 19:47:45', '2017-06-14 12:47:45'),
(138, 213, 6, 90000, 0, 1, '2017-06-19 23:07:28', '2017-06-14 22:47:42'),
(139, 214, 9, 150000, 0, 1, '2017-06-19 23:07:28', '2017-06-15 00:44:55'),
(140, 214, 10, 150000, 50000, 0, '2017-06-12 13:17:15', '2017-06-12 06:17:15'),
(193, 252, 10, 150000, 50000, 0, '2017-06-16 03:19:00', '2017-06-15 20:19:00'),
(194, 252, 9, 150000, 0, 0, '2017-06-15 00:29:55', '2017-06-15 00:29:55'),
(195, 253, 6, 135000, 0, 1, '2017-07-06 06:07:51', '2017-07-05 23:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_po`
--

CREATE TABLE `riwayat_po` (
  `id_riwayat_po` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_status_po` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_po`
--

INSERT INTO `riwayat_po` (`id_riwayat_po`, `id_produk`, `id_status_po`, `created_at`, `updated_at`) VALUES
(1, 204, 1, '2017-06-03 05:16:44', '2017-06-03 05:16:44'),
(2, 206, 1, '2017-06-03 05:16:44', '2017-06-03 05:16:44'),
(3, 207, 1, '2017-06-03 05:16:44', '2017-06-03 05:16:44'),
(4, 209, 1, '2017-06-03 05:16:44', '2017-06-03 05:16:44'),
(5, 210, 1, '2017-06-03 05:16:44', '2017-06-03 05:16:44'),
(12, 206, 2, '2017-06-04 02:11:27', '2017-06-04 09:11:27'),
(15, 207, 2, '2017-06-06 00:06:04', '2017-06-06 07:06:04'),
(16, 209, 2, '2017-06-07 01:36:31', '2017-06-07 08:36:31'),
(17, 212, 1, '2017-06-11 03:48:02', '2017-06-11 03:48:02'),
(18, 210, 1, '2017-06-11 03:48:02', '2017-06-11 03:48:02'),
(30, 212, 2, '2017-06-10 21:53:10', '2017-06-11 04:53:10'),
(31, 210, 2, '2017-06-10 21:53:43', '2017-06-11 04:53:43'),
(35, 214, 1, '2017-06-12 06:09:01', '2017-06-12 06:09:01'),
(59, 252, 1, '2017-06-15 00:29:56', '2017-06-15 00:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `status_po`
--

CREATE TABLE `status_po` (
  `id_status_po` int(11) NOT NULL,
  `nama_status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_po`
--

INSERT INTO `status_po` (`id_status_po`, `nama_status`, `created_at`, `updated_at`) VALUES
(1, 'Open', NULL, NULL),
(2, 'Produksi', NULL, NULL),
(5, 'Selesai produksi', NULL, NULL),
(6, 'Batal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testi` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `Keterangan` varchar(200) NOT NULL,
  `foto_testi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `users_id`, `Keterangan`, `foto_testi`, `created_at`, `updated_at`) VALUES
(12, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1495396986.JPG', '2017-05-21 13:03:07', '2017-05-21 13:03:07'),
(13, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1495397563.jpg', '2017-05-21 13:12:43', '2017-05-21 13:12:43'),
(14, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1495530230.JPG', '2017-05-23 02:03:52', '2017-05-23 02:03:52'),
(15, 14, 'amsksoaosljms', '1496732409.png', '2017-06-06 00:00:11', '2017-06-06 00:00:11'),
(16, 14, 'Terimakasih kak, kaos nya bagus banget, nyaman dipakai. walaupun nunggu nya lama :)', '1497407368.JPG', '2017-06-13 19:29:29', '2017-06-13 19:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `tgl_transaksi` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_metode` int(11) DEFAULT NULL,
  `id_konfirmasi` int(11) DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `status_bayar` enum('Lunas','Belum lunas','','') DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `kurir` varchar(20) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `resi` varchar(30) DEFAULT NULL,
  `jenis_pemesanan` enum('Customer','Reseller','Dropshipper','') DEFAULT NULL,
  `status_jenis_pesan` enum('Terima','Tolak','Tunggu','') DEFAULT NULL,
  `status_pemesanan_produk` enum('Pending','Selesai','Produksi','Packing','Pengiriman','Batal') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`, `id_metode`, `id_konfirmasi`, `id_penerima`, `status_bayar`, `total_berat`, `ongkir`, `kurir`, `total_bayar`, `resi`, `jenis_pemesanan`, `status_jenis_pesan`, `status_pemesanan_produk`, `created_at`, `updated_at`) VALUES
(143, 14, '2017-07-06 04:34:22', 4, 43, 24, 'Lunas', 250, 8000, 'CTCYES', 60000, NULL, 'Customer', 'Terima', 'Packing', '2017-06-10 05:29:14', '2017-06-10 05:29:14'),
(144, 14, '2017-06-11 22:28:11', 4, 46, 24, 'Lunas', 500, 5000, 'CTC', 225000, NULL, 'Customer', 'Terima', 'Packing', '2017-06-10 05:46:42', '2017-06-10 05:46:42'),
(146, 14, '2017-06-11 22:28:11', 1, 42, 24, 'Lunas', 500, 4000, 'CTCOKE', 224000, NULL, 'Customer', 'Terima', 'Packing', '2017-06-10 05:57:23', '2017-06-10 05:57:23'),
(147, 14, '2017-06-15 15:04:32', 1, 45, 24, 'Lunas', 500, 5000, 'CTC', 220000, NULL, 'Customer', 'Terima', 'Pengiriman', '2017-06-10 06:00:33', '2017-06-10 06:00:33'),
(148, 14, '2017-06-12 00:24:38', 1, 45, 24, 'Lunas', 550, 8000, 'CTCYES', 223000, NULL, 'Customer', 'Terima', 'Packing', '2017-06-11 02:55:43', '2017-06-11 02:55:43'),
(164, 7, '2017-06-15 14:53:16', 1, 48, 30, 'Lunas', 450, 17000, 'OKE', 167000, NULL, 'Reseller', 'Terima', 'Pengiriman', '2017-06-15 05:12:06', '2017-06-15 06:13:57'),
(165, 7, '2017-06-15 15:02:28', 1, 49, 20, 'Lunas', 1150, 14000, 'OKE', 499000, NULL, 'Reseller', 'Terima', 'Pengiriman', '2017-06-15 07:46:27', '2017-06-15 07:51:30'),
(166, 7, '2017-06-15 15:36:07', 4, NULL, 29, 'Belum lunas', 250, 0, 'COD', 135000, NULL, 'Reseller', 'Terima', 'Batal', '2017-06-15 15:10:52', '2017-06-15 15:10:52'),
(167, 7, '2017-06-19 23:07:26', 1, NULL, 20, 'Belum lunas', 250, 14000, 'OKE', 149000, NULL, 'Reseller', 'Terima', 'Batal', '2017-06-15 15:32:41', '2017-06-15 15:32:41'),
(171, 7, '2017-06-19 23:07:26', 1, NULL, 20, 'Belum lunas', 250, 14000, 'OKE', 149000, NULL, 'Reseller', 'Terima', 'Batal', '2017-06-16 01:33:35', '2017-06-16 01:33:35'),
(172, 7, '2017-06-20 06:58:23', 1, 53, 20, 'Belum lunas', 450, 14000, 'OKE', 214000, NULL, 'Reseller', 'Terima', 'Batal', '2017-06-16 01:38:09', '2017-06-16 01:38:09'),
(173, 7, '2017-06-19 23:07:26', 1, NULL, 20, 'Belum lunas', 450, 14000, 'OKE', 214000, NULL, 'Reseller', 'Tunggu', 'Batal', '2017-06-16 01:46:18', '2017-06-16 01:46:18'),
(174, 14, '2017-06-21 01:39:23', 1, 54, 24, 'Lunas', 250, 25000, 'JTR', 160000, NULL, 'Dropshipper', 'Terima', 'Batal', '2017-06-16 01:47:44', '2017-06-16 01:47:44'),
(177, 7, '2017-07-06 06:47:05', 1, NULL, 20, 'Belum lunas', 450, 14000, 'OKE', 214000, NULL, 'Reseller', 'Tunggu', 'Batal', '2017-06-20 06:05:09', '2017-06-20 06:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `nama_ukuran` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak aktif','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id`, `nama_ukuran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XS', 'Aktif', '2017-06-07 02:38:36', '2017-06-06 19:38:36'),
(2, 'S', 'Aktif', '2017-06-02 19:52:40', '2017-04-04 05:45:22'),
(3, 'M', 'Aktif', '2017-06-02 19:52:46', '2017-04-04 07:27:57'),
(4, 'L', 'Aktif', '2017-06-02 19:52:52', '2017-05-15 00:33:37'),
(5, 'XL', 'Aktif', '2017-06-02 19:52:13', '2017-05-15 07:31:39'),
(6, 'Tidak ada ukuran', 'Aktif', '2017-05-19 08:02:43', '2017-05-19 08:02:43'),
(7, 'XXL', 'Aktif', '2017-06-02 19:52:22', '2017-05-19 08:02:59'),
(8, 'XXXL', 'Tidak aktif', '2017-06-07 02:51:21', '2017-06-06 19:51:21'),
(9, '70ml', 'Aktif', '2017-06-12 05:57:00', '2017-06-12 05:57:00'),
(10, '150ml', 'Aktif', '2017-06-12 05:57:10', '2017-06-12 05:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(30) DEFAULT NULL,
  `remember_token` varchar(100) NOT NULL,
  `status_user` enum('Aktif','Tidak Aktif','','') DEFAULT NULL,
  `konfirm` enum('1','0','','') DEFAULT NULL,
  `konfirm_admin` enum('1','0','','') NOT NULL,
  `toko` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirm_admin` enum('Terima','Tolak','Pending','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toko` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Customer','Reseller','Dropshipper') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `confirmation_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_hp`, `konfirm_admin`, `toko`, `foto`, `level`, `email`, `password`, `remember_token`, `confirmed`, `confirmation_code`, `created_at`, `updated_at`) VALUES
(2, 'admin1', '085640235938', 'Terima', 'Beauty K-Shop', '1492947650.png', 'Admin', 'admin1@admin.com', '$2y$10$AqA/cH9F6PQv7GK0rg0e9O7y3QzMmUY9/ytX9aqYsiWaOLdFJXYlW', 'GHcwgDBCMB3XNljfmPU84YdJGXxFBjno65NETAv3mbFjlJQMBW0nxrgix5OQ', 1, NULL, '2017-04-21 03:47:03', '2017-05-21 17:17:01'),
(7, 'nila sari', '083149831433', 'Terima', NULL, '1496045197.png', 'Reseller', 'nilasari21jg@gmail.com', '$2y$10$MN9sHgFekEcLXJUxS34/RO8vKoxoT23sHLuz0sbmLzE6UGbe/VaSW', 'kq1irsvEkkPLKFfuZM294VmCcMWcJrwHIW14hH5DPk35dSQ5C7Qlozp8cD22', 1, NULL, '2017-05-22 01:57:11', '2017-06-04 21:59:03'),
(10, 'admin machiko', '083149831433', 'Terima', NULL, NULL, 'Admin', 'machiko.kstore@gmail.com', '$2y$10$MN9sHgFekEcLXJUxS34/RO8vKoxoT23sHLuz0sbmLzE6UGbe/VaSW', 'ZimFYssqWgDxho6nL4T7yhExArSQxwGlVqt6GXCzwgaCr1SiNdyZozCr8GKh', 1, NULL, '2017-05-28 06:41:48', '2017-05-28 06:43:01'),
(14, 'nila n', '085640235938', 'Terima', 'Beauty K-Shop', '1497407287.jpg', 'Dropshipper', 'nilanurlita21@gmail.com', '$2y$10$tfgKUDwm62kGVKVTVuxU..x78zryCtIPWbSQ5zkMD27oJMPHbn2WG', 'z0wxmJNYbje0yArzWIVtbg0Zf5w3rwqGkdo2ABmrpTKdjTJZDakvqkYytExi', 1, NULL, '2017-06-02 05:06:28', '2017-06-15 18:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_produk`, `created_at`, `updated_at`) VALUES
(1, 7, 211, '2017-06-03 21:10:09', '2017-06-03 21:10:09'),
(2, 14, 210, '2017-06-05 23:48:07', '2017-06-05 23:48:07'),
(4, 14, 213, '2017-06-07 00:26:11', '2017-06-07 00:26:11'),
(5, 7, 253, '2017-06-15 08:36:32', '2017-06-15 08:36:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_detail` (`id_produk_ukuran`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_produk_ukuran` (`id_produk_ukuran`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_produk`
--
ALTER TABLE `metode_produk`
  ADD PRIMARY KEY (`id_metode`),
  ADD KEY `id_produk` (`produk_id`),
  ADD KEY `id_metode_bayar` (`metode_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`(191));

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD PRIMARY KEY (`id_produk_ukuran`),
  ADD KEY `id_produk` (`produk_id`),
  ADD KEY `id_ukuran` (`ukuran_id`);

--
-- Indexes for table `riwayat_po`
--
ALTER TABLE `riwayat_po`
  ADD PRIMARY KEY (`id_riwayat_po`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_status_po` (`id_status_po`);

--
-- Indexes for table `status_po`
--
ALTER TABLE `status_po`
  ADD PRIMARY KEY (`id_status_po`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_metode_bayar` (`id_metode`),
  ADD KEY `id_konfirmasi` (`id_konfirmasi`),
  ADD KEY `id_alamat` (`id_penerima`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `metode_produk`
--
ALTER TABLE `metode_produk`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  MODIFY `id_produk_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `riwayat_po`
--
ALTER TABLE `riwayat_po`
  MODIFY `id_riwayat_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `status_po`
--
ALTER TABLE `status_po`
  MODIFY `id_status_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`id_produk_ukuran`) REFERENCES `produk_ukuran` (`id_produk_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk_ukuran`) REFERENCES `produk_ukuran` (`id_produk_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_produk_ukuran`) REFERENCES `produk_ukuran` (`id_produk_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `metode_produk`
--
ALTER TABLE `metode_produk`
  ADD CONSTRAINT `metode_produk_ibfk_1` FOREIGN KEY (`metode_id`) REFERENCES `metode` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `metode_produk_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `penerima`
--
ALTER TABLE `penerima`
  ADD CONSTRAINT `penerima_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`);

--
-- Constraints for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD CONSTRAINT `produk_ukuran_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ukuran_ibfk_2` FOREIGN KEY (`ukuran_id`) REFERENCES `ukuran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_po`
--
ALTER TABLE `riwayat_po`
  ADD CONSTRAINT `riwayat_po_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_po_ibfk_2` FOREIGN KEY (`id_status_po`) REFERENCES `status_po` (`id_status_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_konfirmasi`) REFERENCES `konfirmasi` (`id_konfirmasi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id_penerima`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
