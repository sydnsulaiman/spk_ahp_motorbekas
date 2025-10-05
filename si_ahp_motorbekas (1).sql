-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 04:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_ahp_motorbekas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriterias`
--

CREATE TABLE `bobot_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_perhitungan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_kriteria_tujuan` int(11) NOT NULL,
  `bobot_kriteria` double DEFAULT NULL,
  `bobot_kriteria2` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bobot_subkriterias`
--

CREATE TABLE `bobot_subkriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_perhitungan` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_subkriteria_tujuan` int(11) NOT NULL,
  `bobot_subkriteria` int(11) NOT NULL,
  `bobot_subkriteria2` int(11) NOT NULL,
  `total_subkriteria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kriteria` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama_kriteria`, `kode_kriteria`, `created_at`, `updated_at`) VALUES
(4, 'Harga', 'C01', '2024-10-31 18:57:14', '2024-10-31 18:57:14'),
(5, 'Kapasitas Mesin', 'C02', '2024-10-31 18:57:49', '2024-10-31 18:57:49'),
(6, 'Tahun', 'C03', '2024-10-31 18:58:13', '2024-10-31 18:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_summaries`
--

CREATE TABLE `kriteria_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nama_kriteria` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kriteria` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_pembanding` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_09_05_064503_create_showrooms_table', 1),
(5, '2024_09_05_065129_create_produks_table', 1),
(6, '2024_10_30_062634_create_kriterias_table', 2),
(7, '2024_10_30_141852_create_kriteria_summaries_table', 2),
(8, '2024_10_30_142440_create_bobot_kriterias_table', 2),
(10, '2024_10_30_143649_create_subkriteria_summaries_table', 2),
(11, '2024_10_30_144204_create_perhitungans_table', 2),
(12, '2024_10_30_144434_create_bobot_subkriterias_table', 2),
(13, '2024_10_30_143201_create_subkriterias_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perhitungans`
--

CREATE TABLE `perhitungans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_eigen` double DEFAULT NULL,
  `ratio_index` double DEFAULT NULL,
  `ci` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_showroom` int(11) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `teknologi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_mesin` int(11) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `id_showroom`, `nama_produk`, `harga`, `tahun_produksi`, `teknologi`, `kapasitas_mesin`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 2, 'new data baru', 2555555, 2015, 'INJECTION', 115, '1726646885_gambar_produk.png', '2024-09-14 08:49:40', '2024-09-18 00:23:48', NULL),
(14, 2, 'data baru', 1500000, 2020, 'VVA', 125, '1726644657_gambar_produk.png', '2024-09-17 23:30:57', '2024-09-17 23:30:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `showrooms`
--

CREATE TABLE `showrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_showroom` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pic` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_berdiri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_hp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showrooms`
--

INSERT INTO `showrooms` (`id`, `nama_showroom`, `nama_pic`, `email`, `password`, `tahun_berdiri`, `alamat`, `no_hp`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'showroom', 'test', 'test@gmail.com', '$2y$10$KqMpISlc94sAf.R2mC4qKOECKF.8k.FVRDAkCSzeCG0pGo9rekNVq', '2000', 'Testing', '08134297111', '1726468834_gambar_showroom.png', '2024-09-15 22:40:34', '2024-09-15 22:43:26', '2024-09-15 22:43:26'),
(2, 'BARU SHOWROOM', 'pemilik showroom', 'showroom1@g.com', '$2a$12$U8LaldFdIOtcEZpyvXbv6.xZMCT23CU.k2iVznNkvvsLyPA5sGdoG', '2017', 'new testing alamat showroom', '081122223333', '1726646954_gambar_showroom.png', '2024-09-15 22:46:44', '2024-09-29 07:56:42', NULL),
(3, 'showroom', 'SHOWROOM TESTING', 'showroom@g.com', '$2a$12$U8LaldFdIOtcEZpyvXbv6.xZMCT23CU.k2iVznNkvvsLyPA5sGdoG', '2020', 'testing alamat showroom', '08123456789', '1726643830_gambar_showroom.png', '2024-09-17 23:17:11', '2024-09-17 23:17:11', NULL),
(4, 'SHOWROOM TEST', 'TEST SHOWROOM', 'showroom@test.com', '$2y$10$0yeM7l9KUUJt0iZlqtX9O.dRxn0xOqSc86DONL05spNKGZzDMJiE2', '2010', NULL, '081212122121', NULL, '2024-10-03 04:17:36', '2024-10-30 06:48:29', '2024-10-30 06:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `subkriterias`
--

CREATE TABLE `subkriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_subkriteria` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_subkriteria` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator` enum('<','>','<=','>=') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_pembanding` int(11) DEFAULT NULL,
  `satuan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_summaries`
--

CREATE TABLE `subkriteria_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) DEFAULT NULL,
  `id_perhitungan` int(11) DEFAULT NULL,
  `prioritas` double NOT NULL,
  `eigen_value` double NOT NULL,
  `jumlah` double NOT NULL,
  `total_eigen` double NOT NULL,
  `ratio_index` double NOT NULL,
  `ci` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_kriterias`
--
ALTER TABLE `bobot_kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot_subkriterias`
--
ALTER TABLE `bobot_subkriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_summaries`
--
ALTER TABLE `kriteria_summaries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showrooms`
--
ALTER TABLE `showrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria_summaries`
--
ALTER TABLE `subkriteria_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_kriterias`
--
ALTER TABLE `bobot_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bobot_subkriterias`
--
ALTER TABLE `bobot_subkriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria_summaries`
--
ALTER TABLE `kriteria_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perhitungans`
--
ALTER TABLE `perhitungans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `showrooms`
--
ALTER TABLE `showrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subkriterias`
--
ALTER TABLE `subkriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subkriteria_summaries`
--
ALTER TABLE `subkriteria_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
