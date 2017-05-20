-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2017 at 03:08 PM
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
  `id_produk` int(11) DEFAULT NULL,
  `id_detail` int(11) DEFAULT NULL,
  `status_pesan` enum('Pending','Produksi','Jadi','Packing','Pengiriman','Selesai') DEFAULT NULL,
  `keterangan_status` varchar(1000) NOT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `id_detail`, `status_pesan`, `keterangan_status`, `jumlah_beli`, `created_at`, `updated_at`) VALUES
(1, NULL, 10, NULL, 'Pending', '', 1, '2017-05-09 00:54:09', '2017-05-09 00:54:09'),
(2, NULL, 165, 93, 'Pending', '', 2, '2017-05-09 01:00:39', '2017-05-09 01:00:39'),
(3, NULL, 150, 83, 'Pending', '', 1, '2017-05-09 01:00:39', '2017-05-09 01:00:39'),
(7, 20, 165, 93, 'Produksi', '', 2, '2017-05-11 09:48:57', '2017-05-09 01:12:56'),
(8, 20, 150, 83, 'Pending', '', 1, '2017-05-09 01:12:56', '2017-05-09 01:12:56'),
(9, 21, 165, 93, 'Produksi', '', 2, '2017-05-11 09:49:08', '2017-05-09 01:15:09'),
(10, 21, 150, 83, 'Pending', '', 1, '2017-05-09 01:15:09', '2017-05-09 01:15:09'),
(11, 22, 170, NULL, 'Pending', '', 1, '2017-05-11 08:48:34', '2017-05-10 05:50:07'),
(12, 23, 182, NULL, 'Pending', '', 1, '2017-05-11 08:54:13', '2017-05-11 01:53:08'),
(13, 23, 142, NULL, 'Pending', '', 7, '2017-05-11 08:54:19', '2017-05-11 01:53:08'),
(14, 26, 190, NULL, 'Pending', '', 1, '2017-05-11 01:58:53', '2017-05-11 01:58:53'),
(15, 27, 202, 106, 'Pending', '', 4, '2017-05-17 07:35:31', '2017-05-17 07:35:31'),
(16, 27, 201, NULL, 'Pending', '', 6, '2017-05-17 07:35:31', '2017-05-17 07:35:31'),
(17, 27, 195, NULL, 'Pending', '', 66, '2017-05-17 07:35:31', '2017-05-17 07:35:31'),
(18, 28, 189, 100, 'Pending', '', 5, '2017-05-17 07:47:46', '2017-05-17 07:47:46'),
(19, 29, 199, 104, 'Pending', '', 7, '2017-05-17 07:50:28', '2017-05-17 07:50:28'),
(20, 30, 199, 104, 'Pending', '', 7, '2017-05-18 02:00:39', '2017-05-18 02:00:39'),
(21, 30, 195, NULL, 'Pending', '', 1, '2017-05-18 02:00:39', '2017-05-18 02:00:39'),
(22, 31, 202, 106, 'Pending', '', 1, '2017-05-18 02:50:46', '2017-05-18 02:50:46'),
(23, 33, 202, 106, 'Pending', '', 1, '2017-05-18 03:23:51', '2017-05-18 03:23:51'),
(24, 34, 195, NULL, 'Pending', '', 1, '2017-05-18 06:38:34', '2017-05-18 06:38:34'),
(25, 35, 186, NULL, 'Pending', '', 1, '2017-05-18 06:41:37', '2017-05-18 06:41:37'),
(26, 36, 196, NULL, 'Pending', '', 1, '2017-05-18 09:26:57', '2017-05-18 09:26:57'),
(27, 37, 194, NULL, 'Pending', '', 1, '2017-05-18 10:55:35', '2017-05-18 10:55:35'),
(28, 38, 201, NULL, 'Pending', '', 5, '2017-05-18 22:41:51', '2017-05-18 22:41:51'),
(29, 38, 199, 104, 'Pending', '', 1, '2017-05-18 22:41:51', '2017-05-18 22:41:51'),
(30, 38, 200, NULL, 'Pending', '', 1, '2017-05-18 22:41:52', '2017-05-18 22:41:52'),
(31, 40, 202, 106, 'Pending', '', 1, '2017-05-18 23:26:42', '2017-05-18 23:26:42'),
(32, 41, 199, 104, 'Pending', '', 3, '2017-05-18 23:57:27', '2017-05-18 23:57:27'),
(33, 41, 198, NULL, 'Pending', '', 2, '2017-05-18 23:57:27', '2017-05-18 23:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `status` enum('Aktif','Tidak aktif','','') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Kaos H', 'Aktif', '2017-05-08 22:46:24', '0000-00-00 00:00:00'),
(2, 'Aksesoris', 'Aktif', '2017-03-24 23:01:17', '2017-03-24 23:01:17'),
(3, 'Lightstick', 'Aktif', '2017-03-25 00:14:46', '2017-03-25 00:14:46'),
(4, 'Botol', 'Aktif', '2017-03-25 08:54:11', '2017-03-25 08:54:11'),
(5, 'Mug', 'Aktif', '2017-04-21 02:26:05', '2017-04-04 03:32:44'),
(6, 'Jaket', 'Aktif', '2017-04-15 07:23:56', '2017-04-15 07:23:56'),
(7, 'DVD', 'Aktif', '2017-05-10 18:43:51', '2017-05-10 18:43:51'),
(8, 'Sweater', 'Tidak aktif', '2017-05-19 03:44:13', '2017-05-14 23:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `id_produk_ukuran` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `berat_total` int(11) DEFAULT NULL,
  `Total_harga` int(11) DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `produk_id`, `user_id`, `id_produk_ukuran`, `jumlah`, `berat_total`, `Total_harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(79, 201, 2, NULL, 2, 400, 987654, NULL, '2017-05-19 11:45:44', '2017-05-19 04:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `total_transfer` int(11) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('Terima','Tolak','Pending','') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `total_transfer`, `tgl_transfer`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(21, 45000, '2017-05-05', '1494420390.png', 'Pending', '2017-05-10 05:46:30', '2017-05-10 05:46:30'),
(22, 67000, '2017-05-25', '1494891423.png', 'Pending', '2017-05-15 16:37:05', '2017-05-15 16:37:05'),
(23, 67000, '2017-05-25', '1494891423.png', 'Pending', '2017-05-15 16:37:05', '2017-05-15 16:37:05');

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
(1, 'BRI', 'Farista Dwi Vilandari', '13245794397777', 'Bank', 0, 'Aktif', '2017-05-09 05:16:09', '2017-05-08 22:16:09'),
(2, 'Pulsa As', '-', '083865123456', 'Pulsa', 1.2, 'Aktif', '2017-04-04 14:49:25', '2017-04-04 07:49:25'),
(3, 'Pulsa XL', '-', '083865123457', 'Pulsa', 1.3, 'Aktif', '2017-05-19 11:11:23', '2017-05-19 04:11:23'),
(4, 'COD', NULL, NULL, 'COD', NULL, 'Aktif', '2017-05-18 02:22:15', '0000-00-00 00:00:00'),
(5, 'BNI', 'Farista DV', '337669900', 'Bank', 0, 'Aktif', '2017-05-19 11:08:04', '2017-05-19 04:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `metode_produk`
--

CREATE TABLE `metode_produk` (
  `id_metode` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `metode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_produk`
--

INSERT INTO `metode_produk` (`id_metode`, `produk_id`, `metode_id`) VALUES
(1, 4, 3),
(2, 8, 2),
(3, 9, 2),
(4, 11, 2),
(5, 11, 3),
(6, 12, 1),
(7, 12, 2),
(32, 141, 1),
(33, 142, 1),
(34, 142, 2),
(35, 144, 1),
(36, 144, 2),
(37, 145, 1),
(38, 145, 2),
(39, 146, 1),
(40, 146, 2),
(41, 147, 1),
(42, 147, 2),
(43, 148, 1),
(44, 148, 2),
(45, 149, 1),
(46, 150, 1),
(47, 150, 2),
(48, 151, 1),
(49, 151, 2),
(50, 164, 1),
(51, 165, 1),
(52, 166, 2),
(53, 167, 1),
(54, 168, 1),
(55, 169, 3),
(56, 170, 1),
(57, 171, 1),
(58, 172, 1),
(59, 173, 1),
(60, 174, 1),
(61, 175, 1),
(62, 176, 1),
(63, 177, 1),
(64, 178, 1),
(65, 179, 1),
(66, 180, 2),
(67, 181, 3),
(68, 182, 1),
(69, 183, 1),
(70, 184, 2),
(71, 185, 2),
(72, 186, 3),
(73, 187, 2),
(74, 10, 3),
(75, 11, 1),
(76, 4, 1),
(77, 12, 3),
(78, 152, 2),
(79, 152, 1),
(80, 152, 1),
(81, 188, 1),
(82, 188, 2),
(83, 188, 3),
(84, 189, 1),
(85, 189, 2),
(86, 189, 3),
(87, 190, 1),
(88, 190, 2),
(89, 190, 3),
(90, 191, 1),
(91, 191, 2),
(92, 192, 1),
(93, 193, 1),
(94, 193, 2),
(95, 195, 1),
(96, 195, 2),
(97, 196, 1),
(98, 196, 2),
(99, 196, 3),
(100, 199, 1),
(101, 199, 2),
(102, 199, 3),
(103, 200, 1),
(104, 200, 2),
(105, 201, 1),
(106, 201, 2),
(107, 201, 3),
(108, 202, 1),
(109, 202, 2),
(110, 202, 3),
(111, 199, 4),
(112, 194, 1),
(113, 194, 4),
(114, 201, 4),
(115, 198, 1),
(116, 198, 2);

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
('admin1@admin.com', '$2y$10$vIVpRrPT7uML.ggI.mseZ.ALJRO/NDdXa7e19ScEuKkUSGx28.RuK', '2017-04-21 01:23:36');

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
(1, 2, 'Jawa Tengah', 'Klaten', 'gn lanang, tegalrejo', 'alamat rumah', 'nila nur', '085640235938', '2017-05-02 14:35:40', '0000-00-00 00:00:00'),
(2, 2, 'Jawa Barat', 'Bandung Barat', 'hbjkukhikjb hvhvhjbjnmnn', 'alamat ortu', 'Sari', '087665443123', '2017-05-18 01:50:09', '0000-00-00 00:00:00'),
(3, 2, 'DKI Jakarta', 'Jakarta Barat', 'Alamat satu', 'Alamat satu', 'Nila nur lita', '085640235938', '2017-05-18 23:57:27', '2017-05-18 23:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock_total` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `minimal_beli` int(11) DEFAULT NULL,
  `status` enum('PreOrder','Ready Stock','','') NOT NULL,
  `tgl_awal_po` date DEFAULT NULL,
  `tgl_akhir_po` date DEFAULT NULL,
  `batas_waktu_bayar` timestamp NULL DEFAULT NULL,
  `batas_jam` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`, `stock_total`, `berat`, `minimal_beli`, `status`, `tgl_awal_po`, `tgl_akhir_po`, `batas_waktu_bayar`, `batas_jam`, `foto`, `keterangan`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, '1', 212, 0, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 2, '2017-04-20 02:21:38', '2017-05-18 06:40:12'),
(2, 'w', 56000, 1, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 2, '2017-04-20 21:57:32', '2017-04-20 21:57:32'),
(3, 'fghj', 6670, 5, 5, 5, 'Ready Stock', NULL, NULL, NULL, 5, '1492947650.png', NULL, 2, '2017-04-21 00:56:05', '2017-04-21 00:56:05'),
(4, 'hvbjnm', 55, 6, 6, 6, 'Ready Stock', NULL, NULL, NULL, 6, '1492947469.png', NULL, 2, '2017-04-21 06:16:36', '2017-04-21 06:16:36'),
(5, 'ghvbnm,', 66666, 6, 6, 6, 'Ready Stock', NULL, NULL, NULL, 6, '1492947650.png', NULL, 5, '2017-04-21 06:18:19', '2017-04-21 06:18:19'),
(6, 'rdtfghjknm', 66668, 8, 8, 8, 'Ready Stock', NULL, NULL, NULL, 8, '1492947469.png', NULL, 4, '2017-04-21 06:20:05', '2017-04-21 06:20:05'),
(7, 'fgbjn', 666, 6, 6, 6, 'Ready Stock', NULL, NULL, NULL, 6, '1492947650.png', NULL, 3, '2017-04-21 06:24:12', '2017-04-21 06:24:12'),
(8, 'RDTFGHJK', 6, 6, 6, 6, 'Ready Stock', NULL, NULL, NULL, 8, '1492947469.png', NULL, 2, '2017-04-21 06:25:08', '2017-04-21 06:25:08'),
(9, 'TFGHJKN', 6, 9, 9, 78, 'Ready Stock', NULL, NULL, NULL, 4, '1492947650.png', NULL, 2, '2017-04-21 06:26:18', '2017-04-21 06:26:18'),
(10, 'kaos', 6, 0, 6, 8, 'PreOrder', '2017-04-24', '2017-04-29', '2017-04-28 17:00:00', 0, '1492947469.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-04-21 06:46:21', '2017-04-21 06:46:21'),
(11, 'n,,jk', 6, 6, 6, 8, 'Ready Stock', NULL, NULL, NULL, 9, '1492947650.png', NULL, 1, '2017-04-21 06:47:35', '2017-04-21 06:47:35'),
(12, 'rdtfyguhjk', 7, 7, 7, 7, 'Ready Stock', NULL, NULL, NULL, 7, '1492947469.png', NULL, 2, '2017-04-21 06:48:12', '2017-04-21 06:48:12'),
(141, 'contoh', 56000, 6, 1, 6, 'Ready Stock', NULL, NULL, NULL, 4, '1492947650.png', NULL, 2, '2017-04-22 18:49:18', '2017-04-22 18:49:18'),
(142, 'contoh selanjutnya', 456000, 5, 2, 7, 'Ready Stock', NULL, NULL, NULL, 3, '1492947469.png', NULL, 3, '2017-04-22 18:52:19', '2017-04-22 18:52:19'),
(143, 'cobasekian', 56000, 11, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:09:04', '2017-04-22 22:09:04'),
(144, 'hahaha', 33000, 11, 1, 11, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:20:25', '2017-04-22 22:20:25'),
(145, 'hahaha', 33000, 11, 1, 11, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:22:16', '2017-04-22 22:22:16'),
(146, 'uuuuu', 34000, 15, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 2, '2017-04-22 22:24:02', '2017-04-22 22:24:02'),
(147, 'uuuuu', 34000, 15, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 2, '2017-04-22 22:24:38', '2017-04-22 22:24:38'),
(148, 'uuuuu', 34000, 15, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 2, '2017-04-22 22:25:16', '2017-04-22 22:25:16'),
(149, 'bbbb', 89000, 16, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-04-22 22:26:06', '2017-04-22 22:26:06'),
(150, 'bababa', 70000, 16, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:29:31', '2017-05-14 04:04:44'),
(151, 'Kaos AA', 50000, 15, 1, 3, 'Ready Stock', NULL, NULL, NULL, 7, '1492947650.png', NULL, 1, '2017-04-22 22:33:29', '2017-04-22 22:33:29'),
(152, 'Kaos C', 67000, 6, 1, 8, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-04-22 22:35:44', '2017-04-22 22:35:44'),
(153, 'Kaos C', 67000, 5, 1, 8, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:36:22', '2017-05-18 06:42:28'),
(154, 'huhu', 78000, 8, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:38:09', '2017-04-22 22:38:09'),
(155, 'huhu', 78000, 5, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:42:17', '2017-05-15 08:47:14'),
(156, 'huhu', 78000, 8, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:43:34', '2017-04-22 22:43:34'),
(157, 'huhu', 78000, 8, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:44:31', '2017-04-22 22:44:31'),
(158, 'huhu', 78000, 8, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:46:03', '2017-04-22 22:46:03'),
(159, 'huhu', 78000, 8, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:46:21', '2017-04-22 22:46:21'),
(160, 'k', 10, 2, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:49:09', '2017-04-22 22:49:09'),
(161, 'k', 10, 2, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:50:30', '2017-04-22 22:50:30'),
(162, 'k', 10, 2, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:50:49', '2017-04-22 22:50:49'),
(163, 'k', 10, 2, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 1, '2017-04-22 22:51:01', '2017-04-22 22:51:01'),
(164, 'k', 10, 2, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:53:53', '2017-04-22 22:53:53'),
(165, 'ttt', 7, 7, 6, 6, 'Ready Stock', NULL, NULL, NULL, 6, '1492947650.png', NULL, 1, '2017-04-22 22:56:12', '2017-04-22 22:56:12'),
(166, 'uuu', 67000, 13, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-22 22:57:19', '2017-04-22 22:57:19'),
(167, 'weeee', 78000, 7, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 2, '2017-04-22 23:24:38', '2017-04-22 23:24:38'),
(168, 'mencoba', 20000, 4, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 2, '2017-04-22 23:26:26', '2017-04-22 23:26:26'),
(169, 'tututu', 89000, 80, 1, 2, 'Ready Stock', NULL, NULL, NULL, 2, '1492947650.png', NULL, 3, '2017-04-22 23:30:20', '2017-04-22 23:30:20'),
(170, 'hahahuuuu', 67000, 8, 8, 8, 'Ready Stock', NULL, NULL, NULL, 8, '1492947469.png', NULL, 4, '2017-04-22 23:32:12', '2017-04-22 23:32:12'),
(171, 'rerere', 89700, 6, 7, 7, 'Ready Stock', NULL, NULL, NULL, 9, '1492947650.png', NULL, 5, '2017-04-22 23:34:41', '2017-04-22 23:34:41'),
(172, 'yooo', 78600, 6, 7, 5, 'Ready Stock', NULL, NULL, NULL, 6, '1492947469.png', NULL, 2, '2017-04-23 00:35:46', '2017-04-23 00:35:46'),
(173, 'forest', 56000, 9, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 2, '2017-04-23 01:44:50', '2017-04-23 01:44:50'),
(174, 'asaaa', 67000, 6, 1, 3, 'Ready Stock', NULL, NULL, NULL, 3, '1492947469.png', NULL, 2, '2017-04-23 01:53:52', '2017-04-23 01:53:52'),
(175, 'ikan', 34500, 6, 5, 8, 'Ready Stock', NULL, NULL, NULL, 7, '1492947650.png', NULL, 2, '2017-04-23 01:58:44', '2017-04-23 01:58:44'),
(176, 'ikankecil', 56400, 3, 1, 3, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 1, '2017-04-23 02:09:34', '2017-04-23 02:09:34'),
(177, 'lolo', 32000, 6, 7, 5, 'Ready Stock', NULL, NULL, NULL, 7, '1492947650.png', NULL, 3, '2017-04-23 02:14:08', '2017-04-23 02:14:08'),
(178, 'w', 34, 2, 3, 3, 'Ready Stock', NULL, NULL, NULL, 3, '1492947469.png', NULL, 3, '2017-04-23 02:22:49', '2017-04-23 02:22:49'),
(179, 'a', 2, 5, 3, 5, 'Ready Stock', NULL, NULL, NULL, 3, '1492947650.png', NULL, 4, '2017-04-23 02:30:26', '2017-04-23 02:30:26'),
(180, 'we', 212, 2, 1, 12, 'Ready Stock', NULL, NULL, NULL, 3, '1492947469.png', NULL, 3, '2017-04-23 02:58:18', '2017-04-23 02:58:18'),
(181, 'lollooooo', 3, 2, 2, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 2, '2017-04-23 03:10:59', '2017-04-23 03:10:59'),
(182, 'ss', 1, 2, 2, 2, 'Ready Stock', NULL, NULL, NULL, 2, '1492947469.png', NULL, 2, '2017-04-23 04:13:53', '2017-04-23 04:13:53'),
(183, '1', 2, 2, 2, 2, 'Ready Stock', NULL, NULL, NULL, 2, '1492947650.png', NULL, 2, '2017-04-23 04:15:07', '2017-04-23 04:15:07'),
(184, '1', 1, 1, 1, 2, 'Ready Stock', NULL, NULL, NULL, 1, '1492947469.png', NULL, 2, '2017-04-23 04:32:56', '2017-04-23 04:32:56'),
(185, 'qq', 45, 5, 1, 1, 'Ready Stock', NULL, NULL, NULL, 1, '1492947650.png', NULL, 4, '2017-04-23 04:36:47', '2017-04-23 04:36:47'),
(186, 'eee', 3, 1, 3, 3, 'Ready Stock', NULL, NULL, NULL, 3, '1492947469.png', NULL, 2, '2017-04-23 04:37:49', '2017-05-18 06:40:57'),
(187, 'rrrrrrrr', 5, 81, 5, 5, 'Ready Stock', NULL, NULL, NULL, 5, '1492947650.png', NULL, 6, '2017-04-23 04:40:50', '2017-05-14 20:29:01'),
(188, 'mencoba', 30000, 89, 200, 5, 'Ready Stock', NULL, NULL, NULL, 4, '1493995892.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 2, '2017-05-05 07:51:33', '2017-05-14 20:29:00'),
(189, 'Kaos wings tour bts', 65000, NULL, 300, 5, 'PreOrder', '2017-05-12', '2017-05-26', '2017-05-28 17:00:00', NULL, '1494467320.JPG', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a</p>', 1, '2017-05-10 18:48:40', '2017-05-17 07:37:46'),
(190, 'Album YNWA', 789000, -13, 400, 5, 'Ready Stock', '2017-05-12', '2017-05-19', NULL, NULL, '1494467851.JPG', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a</p>', 7, '2017-05-10 18:57:32', '2017-05-14 03:48:41'),
(191, 'Asdfghj', 8976543, 35, 3522, 34, 'Ready Stock', NULL, NULL, NULL, 43, '1494481938.jpg', '<p>RGBFDVCX&nbsp;</p>', 2, '2017-05-10 22:52:20', '2017-05-14 02:59:08'),
(192, 'adsfgfhjkjl', 234567, 24361, 345, 55, 'Ready Stock', NULL, NULL, NULL, 567, '1494482373.JPG', '<p>qwretdrytuyiuk</p>', 6, '2017-05-10 22:59:33', '2017-05-14 06:43:17'),
(193, 'Nama Produk', 234567, NULL, 3422, 4, 'PreOrder', '2017-05-16', '2017-05-26', '2017-05-28 17:00:00', NULL, '1494482755.jpg', '<p>qewretrytuyiuolkjhngbfvdcxsazXcvb nmn</p>', 2, '2017-05-10 23:05:56', '2017-05-14 04:07:29'),
(194, 'hp', 76000, 76, 200, 67, 'Ready Stock', NULL, NULL, NULL, 8, '1494844287.jpg', 'ytugahdsbxqywtasxuizhsvdcgbhqSAYUDHNJ', 2, '2017-05-15 03:31:27', '2017-05-18 09:37:59'),
(195, 'hp', 76000, 97, 200, 67, 'Ready Stock', NULL, NULL, NULL, 8, '1494844518.jpg', 'ytugahdsbxqywtasxuizhsvdcgbhqSAYUDHNJ', 2, '2017-05-15 03:35:18', '2017-05-18 06:38:03'),
(196, 'rdgfbhjdnm xc', 657890, 55, 7, 8, 'Ready Stock', NULL, NULL, NULL, 8, '1494846773.jpg', 'yghjbnmskdfhcncdsj', 2, '2017-05-15 04:12:54', '2017-05-18 09:09:24'),
(197, 'cgjvhbnm', 87300, 583, 765, 7, 'Ready Stock', NULL, NULL, NULL, 8, '1494846873.jpg', 'ftyughjbxcuzysdgbcuh', 3, '2017-05-15 04:14:33', '2017-05-15 04:14:33'),
(198, 'cgjvhbnm', 87300, 573, 765, 7, 'Ready Stock', NULL, NULL, NULL, 8, '1494847043.jpg', 'ftyughjbxcuzysdgbcuh', 3, '2017-05-15 04:17:23', '2017-05-18 23:30:33'),
(199, 'cgjvhbnm', 87300, 564, 765, 7, 'Ready Stock', NULL, NULL, NULL, 8, '1494847066.jpg', 'ftyughjbxcuzysdgbcuh', 3, '2017-05-15 04:17:46', '2017-05-18 23:30:42'),
(200, 'djkbfgjkskfn', 78680, 87, 300, 7, 'Ready Stock', NULL, NULL, NULL, 8, '1494848515.png', 'vgshjdbcnmszbfdchjsmfbdd', 1, '2017-05-15 04:41:55', '2017-05-18 21:01:08'),
(201, 'sisgfhbjkscdb', 987654, 0, 400, 6, 'PreOrder', '2017-05-17', '2017-05-25', '2017-05-25 17:00:00', NULL, '1494848737.jpg', 'rgkujsbdnckjhawerlkd,anscb sjdkbf', 1, '2017-05-15 04:45:37', '2017-05-19 04:45:44'),
(202, 'yuyuyuuuuu', 456000, 0, 300, 4, 'PreOrder', '2017-05-25', '2017-05-30', '2017-05-30 17:00:00', NULL, '1494848874.jpg', 'uyedhbawngbesidkqhwiueajgVQHJEVS', 2, '2017-05-15 04:47:55', '2017-05-18 23:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `produk_ukuran`
--

CREATE TABLE `produk_ukuran` (
  `id_detail` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `ukuran_id` int(11) DEFAULT NULL,
  `harga_tambah` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_ukuran`
--

INSERT INTO `produk_ukuran` (`id_detail`, `produk_id`, `ukuran_id`, `harga_tambah`, `stock`, `created_at`, `updated_at`) VALUES
(51, NULL, NULL, NULL, NULL, '2017-04-22 00:15:13', '2017-04-22 00:15:13'),
(53, NULL, NULL, NULL, NULL, '2017-04-22 00:28:24', '2017-04-22 00:28:24'),
(65, NULL, NULL, NULL, NULL, '2017-04-22 02:45:04', '2017-04-22 02:45:04'),
(66, NULL, NULL, NULL, NULL, '2017-04-22 02:45:54', '2017-04-22 02:45:54'),
(67, NULL, NULL, NULL, NULL, '2017-04-22 03:16:39', '2017-04-22 03:16:39'),
(68, NULL, NULL, NULL, NULL, '2017-04-22 03:19:19', '2017-04-22 03:19:19'),
(71, 144, 3, 0, 5, '2017-04-22 22:20:25', '2017-04-22 22:20:25'),
(72, 144, 3, 9000, 6, '2017-04-22 22:20:25', '2017-04-22 22:20:25'),
(73, 145, 3, 0, 5, '2017-04-22 22:22:17', '2017-04-22 22:22:17'),
(74, 145, 3, 9000, 6, '2017-04-22 22:22:17', '2017-04-22 22:22:17'),
(75, 146, 3, 10000, 8, '2017-04-22 22:24:02', '2017-04-22 22:24:02'),
(76, 146, 3, 9000, 7, '2017-04-22 22:24:02', '2017-04-22 22:24:02'),
(77, 147, 3, 10000, 8, '2017-04-22 22:24:38', '2017-04-22 22:24:38'),
(78, 147, 3, 9000, 7, '2017-04-22 22:24:38', '2017-04-22 22:24:38'),
(79, 148, 3, 10000, 8, '2017-04-22 22:25:16', '2017-04-22 22:25:16'),
(80, 148, 3, 9000, 7, '2017-04-22 22:25:16', '2017-04-22 22:25:16'),
(81, 149, 3, 0, 6, '2017-04-22 22:26:06', '2017-04-22 22:26:06'),
(82, 149, 3, 4000, 10, '2017-04-22 22:26:06', '2017-04-22 22:26:06'),
(83, 150, 2, 7000, 10, '2017-04-22 22:29:31', '2017-04-22 22:29:31'),
(84, 150, 3, 5000, 12, '2017-04-22 22:29:31', '2017-04-22 22:29:31'),
(85, 151, 2, 0, 7, '2017-04-22 22:33:29', '2017-04-22 22:33:29'),
(86, 151, 3, 10000, 8, '2017-04-22 22:33:29', '2017-04-22 22:33:29'),
(87, 152, 2, 0, 6, '2017-04-22 22:35:44', '2017-04-22 22:35:44'),
(88, 153, 2, 0, 6, '2017-04-22 22:36:22', '2017-04-22 22:36:22'),
(90, 161, 3, 0, NULL, '2017-05-01 05:33:00', '2017-04-22 22:50:30'),
(91, 163, 3, 0, NULL, '2017-05-01 05:33:24', '2017-04-22 22:51:01'),
(92, 164, NULL, 0, 3, '2017-05-01 05:33:29', '2017-04-22 22:53:53'),
(93, 165, 2, 0, 7, '2017-04-22 22:56:12', '2017-04-22 22:56:12'),
(94, 166, 2, 0, 6, '2017-04-22 22:57:19', '2017-04-22 22:57:19'),
(95, 166, 3, 2000, 7, '2017-04-22 22:57:20', '2017-04-22 22:57:20'),
(96, 177, 2, 0, 6, '2017-04-23 02:14:08', '2017-04-23 02:14:08'),
(97, 178, 2, 4, 4, '2017-04-23 02:22:49', '2017-04-23 02:22:49'),
(98, 185, 2, 0, 5, '2017-04-23 04:36:47', '2017-04-23 04:36:47'),
(99, 187, 2, 5, 5, '2017-04-23 04:40:50', '2017-04-23 04:40:50'),
(100, 189, 2, 0, NULL, '2017-05-10 18:48:40', '2017-05-10 18:48:40'),
(101, 189, 3, 5000, NULL, '2017-05-10 18:48:40', '2017-05-10 18:48:40'),
(102, 193, 2, 0, NULL, '2017-05-10 23:05:56', '2017-05-10 23:05:56'),
(103, 193, 3, 0, NULL, '2017-05-10 23:05:56', '2017-05-10 23:05:56'),
(104, 199, 2, 0, 576, '2017-05-15 04:17:46', '2017-05-15 04:17:46'),
(105, 199, 3, 0, 7, '2017-05-15 04:17:46', '2017-05-15 04:17:46'),
(106, 202, 2, 600, NULL, '2017-05-15 04:47:55', '2017-05-15 04:47:55'),
(107, 202, 3, 5000, NULL, '2017-05-15 04:47:55', '2017-05-15 04:47:55'),
(108, 202, 4, 0, NULL, '2017-05-15 04:47:55', '2017-05-15 04:47:55');

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
(5, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1492947469.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1494464505.JPG', '2017-04-28 17:00:00', '0000-00-00 00:00:00'),
(8, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1494464505.JPG', '2017-05-10 18:01:46', '2017-05-10 18:01:46'),
(9, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1494583779.JPG', '2017-05-12 03:09:41', '2017-05-12 03:09:41'),
(10, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1494863032.jpg', '2017-05-15 08:43:53', '2017-05-15 08:43:53'),
(11, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1495165767.jpg', '2017-05-18 20:49:29', '2017-05-18 20:49:29');

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
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`, `id_metode`, `id_konfirmasi`, `id_penerima`, `status_bayar`, `total_berat`, `ongkir`, `kurir`, `total_bayar`, `resi`, `jenis_pemesanan`, `status_jenis_pesan`, `created_at`, `updated_at`) VALUES
(20, 2, '2017-05-15 23:37:05', 1, 23, 1, 'Belum lunas', 13, 14000, NULL, 91014, NULL, 'Reseller', 'Terima', '2017-05-09 01:12:56', '2017-05-15 16:37:05'),
(21, 2, '2017-05-10 12:46:30', 1, 21, 1, 'Belum lunas', 13, 14000, NULL, 91014, NULL, 'Reseller', 'Terima', '2017-05-09 01:15:09', '2017-05-10 05:46:30'),
(22, 2, '2017-05-10 11:50:07', 1, NULL, 1, 'Belum lunas', 8, 14000, NULL, 81000, NULL, 'Reseller', 'Terima', '2017-05-10 05:50:07', '2017-05-10 05:50:07'),
(23, 2, '2017-05-11 07:53:08', 1, NULL, 1, 'Belum lunas', 16, 14000, NULL, 3206001, NULL, 'Reseller', 'Terima', '2017-05-11 01:53:08', '2017-05-11 01:53:08'),
(26, 2, '2017-05-11 07:58:53', 1, NULL, 1, 'Belum lunas', 400, 14000, NULL, 803000, NULL, 'Reseller', 'Terima', '2017-05-11 01:58:53', '2017-05-11 01:58:53'),
(27, 2, '2017-05-17 13:35:31', 1, NULL, 1, 'Belum lunas', 16800, 238000, NULL, 13006324, NULL, 'Dropshipper', 'Terima', '2017-05-17 07:35:31', '2017-05-17 07:35:31'),
(28, 2, '2017-05-17 13:47:46', 2, NULL, 1, 'Belum lunas', 1500, 28000, NULL, 423600, NULL, 'Reseller', 'Terima', '2017-05-17 07:47:46', '2017-05-17 07:47:46'),
(29, 2, '2017-05-17 13:50:28', 3, NULL, 1, 'Belum lunas', 5355, 96000, NULL, 919230, NULL, 'Reseller', 'Terima', '2017-05-17 07:50:28', '2017-05-17 07:50:28'),
(30, 2, '2017-05-18 08:00:38', 1, NULL, 1, 'Belum lunas', 5555, 0, NULL, 687100, NULL, 'Dropshipper', 'Terima', '2017-05-18 02:00:38', '2017-05-18 02:00:38'),
(31, 2, '2017-05-18 08:50:46', 1, NULL, 1, 'Belum lunas', 300, 14000, 'YES', 470600, NULL, 'Dropshipper', 'Terima', '2017-05-18 02:50:46', '2017-05-18 02:50:46'),
(33, 2, '2017-05-18 09:23:51', 1, NULL, 1, 'Belum lunas', 300, 14000, '14000,OKE', 470600, NULL, 'Dropshipper', 'Terima', '2017-05-18 03:23:51', '2017-05-18 03:23:51'),
(34, 2, '2017-05-18 12:38:34', 1, NULL, 1, 'Belum lunas', 200, 16000, '16000,REG', 92000, NULL, 'Dropshipper', 'Terima', '2017-05-18 06:38:34', '2017-05-18 06:38:34'),
(35, 2, '2017-05-18 12:41:37', 3, NULL, 1, 'Belum lunas', 3, 16000, NULL, 20804, NULL, 'Dropshipper', 'Terima', '2017-05-18 06:41:37', '2017-05-18 06:41:37'),
(36, 2, '2017-05-18 15:26:57', 2, NULL, 1, 'Belum lunas', 7, 14000, 'OKE', 806268, NULL, 'Dropshipper', 'Terima', '2017-05-18 09:26:57', '2017-05-18 09:26:57'),
(37, 2, '2017-05-18 16:55:35', 4, NULL, 1, 'Belum lunas', 200, 0, 'COD', 76000, NULL, 'Dropshipper', 'Terima', '2017-05-18 10:55:35', '2017-05-18 10:55:35'),
(38, 2, '2017-05-19 04:41:51', 1, NULL, 1, 'Belum lunas', 1465, 28000, 'OKE', 1181634, NULL, 'Customer', '', '2017-05-18 22:41:51', '2017-05-18 22:41:51'),
(39, 2, '2017-05-19 04:54:42', 1, NULL, 1, 'Belum lunas', 1465, NULL, 'OKE', 1181634, NULL, 'Customer', '', '2017-05-18 22:54:42', '2017-05-18 22:54:42'),
(40, 2, '2017-05-19 05:26:42', 1, NULL, 1, 'Belum lunas', 300, 29000, 'YES', 485600, NULL, 'Customer', '', '2017-05-18 23:26:42', '2017-05-18 23:26:42'),
(41, 2, '2017-05-19 07:36:39', 1, NULL, 3, 'Belum lunas', 3825, 29000, 'OKE', 504500, NULL, 'Reseller', 'Terima', '2017-05-18 23:57:27', '2017-05-18 23:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `nama_ukuran` varchar(30) NOT NULL,
  `status` enum('Aktif','Tidak aktif','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id`, `nama_ukuran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S', 'Tidak aktif', '2017-04-04 14:10:58', '2017-04-04 07:10:58'),
(2, 'M', 'Aktif', '2017-04-04 05:45:22', '2017-04-04 05:45:22'),
(3, 'L', 'Aktif', '2017-04-04 07:27:57', '2017-04-04 07:27:57'),
(4, 'XS', 'Aktif', '2017-05-15 00:33:37', '2017-05-15 00:33:37'),
(5, 'XXL', 'Aktif', '2017-05-15 07:31:39', '2017-05-15 07:31:39');

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
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` enum('Tidak Aktif','Aktif','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirm_email` enum('Belum','Konfirm','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirm_admin` enum('Belum','Konfirm','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toko` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Customer','Reseller','Dropshipper') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_hp`, `tgl_lahir`, `jenis_kelamin`, `status_user`, `konfirm_email`, `konfirm_admin`, `toko`, `foto`, `level`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin1', '085640235938', '2012-09-20', 'Perempuan', 'Aktif', 'Konfirm', 'Konfirm', 'Beauty K-Shop', '1492947650.png', 'Reseller', 'admin1@admin.com', '$2y$10$AqA/cH9F6PQv7GK0rg0e9O7y3QzMmUY9/ytX9aqYsiWaOLdFJXYlW', 't1tqUuTh1Po89htgiSxLHPEXVpsCZwmH7IeWde6ghVqjnQSi7huVdcoVkOez', '2017-04-21 03:47:03', '2017-05-18 02:00:38');

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
(5, 1, 155, '2017-04-29 20:10:16', '2017-04-29 20:10:16'),
(7, 1, 10, '2017-04-29 20:10:36', '2017-04-29 20:10:36'),
(9, 1, 150, '2017-04-30 19:06:22', '2017-04-30 19:06:22'),
(10, 1, 10, '2017-04-30 19:06:33', '2017-04-30 19:06:33'),
(14, 1, 181, '2017-05-12 18:51:33', '2017-05-12 18:51:33'),
(16, 1, 155, '2017-05-15 08:45:51', '2017-05-15 08:45:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_detail` (`id_detail`),
  ADD KEY `id_status_pesan` (`status_pesan`),
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
  ADD KEY `produk_id` (`produk_id`),
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
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`produk_id`),
  ADD KEY `id_ukuran` (`ukuran_id`);

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
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`id_detail`) REFERENCES `produk_ukuran` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk_ukuran`) REFERENCES `produk_ukuran` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_produk_ukuran`) REFERENCES `produk_ukuran` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `metode_produk`
--
ALTER TABLE `metode_produk`
  ADD CONSTRAINT `metode_produk_ibfk_1` FOREIGN KEY (`metode_id`) REFERENCES `metode` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `metode_produk_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `penerima`
--
ALTER TABLE `penerima`
  ADD CONSTRAINT `penerima_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD CONSTRAINT `produk_ukuran_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ukuran_ibfk_2` FOREIGN KEY (`ukuran_id`) REFERENCES `ukuran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
