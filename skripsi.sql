-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2019 pada 17.00
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `pm10` float NOT NULL,
  `co` float NOT NULL,
  `asap` float NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` float NOT NULL,
  `kategori_udara_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `pm10`, `co`, `asap`, `suhu`, `kelembapan`, `kategori_udara_id`, `created_at`, `updated_at`) VALUES
(1, 1, 17.96, 6.5, 33.5, 66.5, 1, '2018-12-03 11:07:04', '2018-12-03 11:07:04'),
(2, 2.35562, 17.9777, 6.67684, 33.2338, 66.277, 1, '2018-12-03 12:00:00', '2018-12-03 12:00:01'),
(3, 1.92544, 18.0373, 6.97661, 32.9304, 65.6169, 1, '2018-12-03 13:00:02', '2018-12-03 13:00:04'),
(5, 1, 1, 1, 1, 1, 1, '2018-10-31 17:00:00', '0000-00-00 00:00:00'),
(6, 7, 7, 7, 7, 9, 1, '2018-12-04 18:00:00', '0000-00-00 00:00:00'),
(7, 5, 4, 3, 9, 7, 1, '2018-12-04 19:00:00', '0000-00-00 00:00:00'),
(8, 8, 6, 5, 7, 8, 1, '2018-12-04 20:00:00', '0000-00-00 00:00:00'),
(9, 9, 7, 7, 5, 3, 1, '2018-12-04 21:00:00', '0000-00-00 00:00:00'),
(10, 7, 6, 5, 4, 3, 1, '2018-12-05 19:00:00', '0000-00-00 00:00:00'),
(11, 9, 8, 5, 4, 3, 1, '2018-12-05 20:00:00', '0000-00-00 00:00:00'),
(12, 7, 6, 5, 6, 5, 1, '2018-12-05 22:00:00', '0000-00-00 00:00:00'),
(13, 6, 59, 8, 76, 3, 1, '2018-12-05 23:25:04', '0000-00-00 00:00:00'),
(14, 34, 7, 6, 4, 6, 1, '2018-12-06 09:14:02', '0000-00-00 00:00:00'),
(15, 7.34, 9.33, 3.7, 34, 603, 1, '2018-12-06 08:51:32', '0000-00-00 00:00:00'),
(16, 12, 22, 23, 43, 54, 1, '2018-12-17 21:00:00', '0000-00-00 00:00:00'),
(17, 34, 12, 32, 12, 43, 1, '2018-12-17 22:00:00', '0000-00-00 00:00:00'),
(18, 29, 66, 45, 44, 34, 1, '2018-12-18 15:18:14', '0000-00-00 00:00:00'),
(19, 45, 34, 23, 33, 23, 1, '2018-12-18 18:00:00', '0000-00-00 00:00:00'),
(20, 11, 32, 44, 22, 55, 1, '2018-12-18 19:00:00', '0000-00-00 00:00:00'),
(21, 51, 22, 33, 11, 32, 1, '2018-12-19 00:09:00', '0000-00-00 00:00:00'),
(22, 32, 11, 14, 36, 66, 1, '2018-12-23 18:00:00', '0000-00-00 00:00:00'),
(23, 12, 32, 44, 23, 65, 1, '2018-12-23 19:00:00', '0000-00-00 00:00:00'),
(24, 34, 22, 45, 67, 55, 1, '2018-12-23 20:57:09', '0000-00-00 00:00:00'),
(25, 34, 11, 23, 78, 99, 1, '2018-12-23 22:06:00', '0000-00-00 00:00:00'),
(26, 34, 16, 67, 44, 87, 1, '2018-12-28 14:55:04', '0000-00-00 00:00:00'),
(27, 23, 55, 44, 56, 34, 1, '2019-01-20 07:35:53', '0000-00-00 00:00:00'),
(28, 34, 22, 34, 65, 56, 1, '2019-01-20 07:35:53', '0000-00-00 00:00:00'),
(29, 45, 65, 32, 43, 56, 1, '2019-01-20 07:35:53', '0000-00-00 00:00:00'),
(30, 78, 76, 88, 66, 87, 1, '2019-01-20 18:00:00', '0000-00-00 00:00:00'),
(31, 55, 65, 43, 44, 55, 1, '2019-01-20 19:00:00', '0000-00-00 00:00:00'),
(32, 51, 77, 66, 56, 66, 1, '2019-01-20 20:00:00', '0000-00-00 00:00:00'),
(33, 54, 66, 55, 44, 87, 1, '2019-01-21 17:00:00', '0000-00-00 00:00:00'),
(34, 44, 33, 66, 56, 87, 1, '2019-01-21 18:00:00', '0000-00-00 00:00:00'),
(35, 23, 49, 76, 78, 78, 1, '2019-01-23 19:00:00', '0000-00-00 00:00:00'),
(36, 56, 88, 67, 99, 66, 1, '2019-01-24 02:09:14', '0000-00-00 00:00:00'),
(37, 56, 44, 88, 56, 78, 2, '2019-01-24 02:09:14', '0000-00-00 00:00:00'),
(38, 89, 55, 78, 67, 19, 3, '2019-01-24 02:09:14', '0000-00-00 00:00:00'),
(39, 98, 56, 88, 99, 99, 4, '2019-01-24 02:19:02', '0000-00-00 00:00:00'),
(40, 190, 78, 67, 66, 77, 5, '2019-01-24 02:19:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_permenit`
--

CREATE TABLE `data_permenit` (
  `id` int(11) NOT NULL,
  `pm10` float DEFAULT NULL,
  `co` float DEFAULT NULL,
  `asap` float DEFAULT NULL,
  `suhu` float DEFAULT NULL,
  `kelembapan` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_permenit`
--

INSERT INTO `data_permenit` (`id`, `pm10`, `co`, `asap`, `suhu`, `kelembapan`, `created_at`, `updated_at`) VALUES
(114, 1, 18.062, 7.95, 33, 65, '2018-12-03 13:00:02', '2018-12-03 13:00:02'),
(115, 1, 18.0327, 7.77273, 33, 65.0455, '2018-12-03 13:01:04', '2018-12-03 13:01:04'),
(116, 1, 18.066, 7.85, 33, 65, '2018-12-03 13:02:01', '2018-12-03 13:02:01'),
(117, 1, 18.0968, 7.86364, 33, 65, '2018-12-03 13:03:03', '2018-12-03 13:03:03'),
(118, 3.18, 18.101, 7.95, 33, 65, '2018-12-03 13:04:00', '2018-12-03 13:04:00'),
(119, 1, 18.1005, 7.86364, 33, 65, '2018-12-03 13:05:02', '2018-12-03 13:05:02'),
(120, 1, 18.0986, 8.04545, 33, 65, '2018-12-03 13:06:04', '2018-12-03 13:06:04'),
(121, 2.184, 18.109, 7.7, 33, 65, '2018-12-03 13:07:01', '2018-12-03 13:07:01'),
(122, 6.92591, 18.1005, 7.45455, 33, 65.0909, '2018-12-03 13:08:04', '2018-12-03 13:08:04'),
(123, 1, 18.1225, 7.85, 33, 65.6, '2018-12-03 13:09:00', '2018-12-03 13:09:00'),
(124, 1, 18.0986, 7.68182, 33, 66, '2018-12-03 13:10:03', '2018-12-03 13:10:03'),
(125, 20.0186, 18.1041, 7.77273, 33, 66, '2018-12-03 13:11:05', '2018-12-03 13:11:05'),
(126, 1, 18.084, 7.65, 33, 66.35, '2018-12-03 13:12:02', '2018-12-03 13:12:02'),
(127, 1, 18.0868, 7.31818, 33, 66.1818, '2018-12-03 13:13:04', '2018-12-03 13:13:04'),
(128, 1, 18.016, 7.4, 33, 65.7, '2018-12-03 13:14:01', '2018-12-03 13:14:01'),
(129, 8.22636, 18.0855, 7.54545, 33, 65.5, '2018-12-03 13:15:03', '2018-12-03 13:15:03'),
(130, 1, 18.0675, 7.25, 32.9, 65.5, '2018-12-03 13:16:00', '2018-12-03 13:16:00'),
(131, 1, 18.0536, 7.36364, 32.6364, 65.5, '2018-12-03 13:17:02', '2018-12-03 13:17:03'),
(132, 1, 18.0532, 7.31818, 32.6818, 65.5, '2018-12-03 13:18:05', '2018-12-03 13:18:05'),
(133, 1, 18.06, 7.15, 32.7, 65.5, '2018-12-03 13:19:02', '2018-12-03 13:19:02'),
(134, 1, 18.0491, 7.31818, 32.6364, 65.5, '2018-12-03 13:20:04', '2018-12-03 13:20:04'),
(135, 1, 18.048, 7.15, 32.6, 65.5, '2018-12-03 13:21:01', '2018-12-03 13:21:01'),
(136, 1, 18.0509, 6.95455, 32.5909, 65.1818, '2018-12-03 13:22:03', '2018-12-03 13:22:03'),
(137, 1, 18.0585, 7.15, 32.5, 65.4, '2018-12-03 13:23:00', '2018-12-03 13:23:00'),
(138, 1, 18.055, 7.13636, 32.6364, 65.5455, '2018-12-03 13:24:02', '2018-12-03 13:24:02'),
(139, 3.62318, 18.0655, 7, 32.9545, 65.5455, '2018-12-03 13:25:05', '2018-12-03 13:25:05'),
(140, 1, 18.0535, 6.9, 32.95, 65.25, '2018-12-03 13:26:01', '2018-12-03 13:26:01'),
(141, 1, 18.0418, 6.59091, 33, 65.0909, '2018-12-03 13:27:04', '2018-12-03 13:27:04'),
(142, 1, 18.0365, 6.65, 33, 65, '2018-12-03 13:28:00', '2018-12-03 13:28:00'),
(143, 1, 18.0177, 6.36364, 33, 65.0455, '2018-12-03 13:29:03', '2018-12-03 13:29:03'),
(144, 1, 18.0359, 6.36364, 33, 65, '2018-12-03 13:30:05', '2018-12-03 13:30:05'),
(145, 1, 18.0255, 6.45, 33, 65, '2018-12-03 13:31:02', '2018-12-03 13:31:02'),
(146, 1, 18.0282, 6.40909, 33, 65, '2018-12-03 13:32:04', '2018-12-03 13:32:04'),
(147, 1, 18.031, 6.45, 33, 65, '2018-12-03 13:33:01', '2018-12-03 13:33:01'),
(148, 1, 18.0314, 6.95455, 33, 65.0455, '2018-12-03 13:34:03', '2018-12-03 13:34:03'),
(149, 18.3705, 18.0265, 7.9, 33, 65, '2018-12-03 13:35:00', '2018-12-03 13:35:00'),
(150, 1, 18.0259, 8.45455, 33, 65, '2018-12-03 13:36:02', '2018-12-03 13:36:02'),
(151, 1, 18.0295, 8.81818, 33, 65, '2018-12-03 13:37:05', '2018-12-03 13:37:05'),
(152, 1, 18.0415, 9.05, 33, 65, '2018-12-03 13:38:01', '2018-12-03 13:38:02'),
(153, 1, 18.0382, 9.31818, 33, 65.0455, '2018-12-03 13:39:04', '2018-12-03 13:39:04'),
(154, 1, 18.0365, 9.5, 33, 65, '2018-12-03 13:40:01', '2018-12-03 13:40:01'),
(155, 1, 18.0505, 9.59091, 33, 65, '2018-12-03 13:41:03', '2018-12-03 13:41:03'),
(156, 1, 18.0665, 9.7, 33, 65, '2018-12-03 13:42:00', '2018-12-03 13:42:00'),
(157, 1, 18.0609, 10.0455, 33, 65, '2018-12-03 13:43:02', '2018-12-03 13:43:02'),
(158, 1, 18.0577, 9.40909, 33, 65, '2018-12-03 13:44:05', '2018-12-03 13:44:05'),
(159, 1, 18.0545, 9.05, 33, 65, '2018-12-03 13:45:01', '2018-12-03 13:45:01'),
(160, 1, 18.0614, 9.40909, 33, 65, '2018-12-03 13:46:04', '2018-12-03 13:46:04'),
(161, 7.9115, 18.056, 9.25, 33, 65, '2018-12-03 13:47:00', '2018-12-03 13:47:00'),
(162, 3.35909, 18.0618, 9.45455, 33, 65, '2018-12-03 13:48:03', '2018-12-03 13:48:03'),
(163, 1, 18.05, 9.3, 33, 65, '2018-12-03 13:49:00', '2018-12-03 13:49:00'),
(164, 1, 18.055, 9.40909, 33, 65, '2018-12-03 13:50:02', '2018-12-03 13:50:02'),
(165, 1, 18.0532, 9.40909, 33, 65, '2018-12-03 13:51:04', '2018-12-03 13:51:04'),
(166, 1, 18.06, 10, 33, 65.05, '2018-12-03 13:52:01', '2018-12-03 13:52:01'),
(167, 1, 18.1032, 19.5909, 33, 65.1364, '2018-12-03 13:53:04', '2018-12-03 13:53:04'),
(168, 1, 18.0925, 10.5, 33, 65, '2018-12-03 13:54:00', '2018-12-03 13:54:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sementara`
--

CREATE TABLE `data_sementara` (
  `id` int(11) NOT NULL,
  `node_sensor_id` int(11) DEFAULT NULL,
  `kode_alat` varchar(100) DEFAULT NULL,
  `pm10` float NOT NULL,
  `co` float NOT NULL,
  `asap` float NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_sementara`
--

INSERT INTO `data_sementara` (`id`, `node_sensor_id`, `kode_alat`, `pm10`, `co`, `asap`, `suhu`, `kelembapan`, `created_at`, `updated_at`) VALUES
(3533, 3, NULL, 0, 2.19, 15, 32, 60, '2018-12-03 13:54:00', '2018-12-03 13:54:00'),
(3534, 4, NULL, 2, 34, 9, 34, 70, '2018-12-03 13:54:00', '2018-12-03 13:54:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_udara`
--

CREATE TABLE `kategori_udara` (
  `id` int(11) NOT NULL,
  `nama_kategori_udara` varchar(100) NOT NULL,
  `pm10_min` int(11) NOT NULL,
  `pm10_max` int(11) NOT NULL,
  `co_min` int(11) NOT NULL,
  `co_max` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_udara`
--

INSERT INTO `kategori_udara` (`id`, `nama_kategori_udara`, `pm10_min`, `pm10_max`, `co_min`, `co_max`, `created_at`, `updated_at`) VALUES
(1, 'BAIK', 0, 51, 0, 51, '2018-12-01 08:33:24', '2018-12-01 08:33:24'),
(2, 'SEDANG', 51, 101, 51, 101, '2018-12-01 08:33:48', '2018-12-01 08:33:48'),
(3, 'TIDAK SEHAT', 101, 199, 101, 199, '2018-12-01 08:35:28', '2018-12-01 08:35:28'),
(4, 'SANGAT TIDAK SEHAT', 200, 299, 200, 299, '2018-12-01 08:35:48', '2018-12-01 08:35:48'),
(5, 'BERBAHAYA', 300, 3000, 300, 3000, '2018-12-01 08:36:07', '2018-12-01 08:36:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_wilayah`
--

CREATE TABLE `master_wilayah` (
  `id` int(11) NOT NULL,
  `wilayah` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_wilayah`
--

INSERT INTO `master_wilayah` (`id`, `wilayah`, `created_at`, `updated_at`) VALUES
(3, 'paris', '2018-11-22 15:18:03', '2018-11-22 15:18:03'),
(4, 'imbon', '2018-11-23 03:33:29', '2018-11-23 03:33:29'),
(5, 'Parit Demang', '2018-11-23 16:27:07', '2018-11-23 16:27:07'),
(6, 'siskoms', '2018-11-25 01:17:42', '2018-12-29 09:17:46'),
(7, 'sambas', '2019-01-06 12:51:35', '2019-01-06 12:51:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_12_29_165506_create_permission_tables', 1),
(10, '2019_01_13_175610_create_push_subscriptions_table', 2),
(11, '2019_01_13_181309_create_push_subscriptions_table', 3),
(12, '2019_01_13_212202_create_push_subscriptions_table', 4),
(13, '2019_01_30_145936_create_notifikasis_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 11),
(3, 'App\\User', 14),
(3, 'App\\User', 51),
(3, 'App\\User', 52),
(3, 'App\\User', 54),
(3, 'App\\User', 56),
(3, 'App\\User', 58),
(3, 'App\\User', 59),
(3, 'App\\User', 60),
(3, 'App\\User', 61),
(3, 'App\\User', 62);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `node_sensor_id` int(100) DEFAULT NULL,
  `pm10` float DEFAULT NULL,
  `co` float DEFAULT NULL,
  `asap` float DEFAULT NULL,
  `suhu` float DEFAULT NULL,
  `kelembapan` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id`, `node_sensor_id`, `pm10`, `co`, `asap`, `suhu`, `kelembapan`, `created_at`, `updated_at`) VALUES
(3, 3, 8, 2.19, 15, 26, 60, '2018-11-26 17:00:00', '2019-02-01 21:24:12'),
(4, 4, 0.23, 31, 9, 27, 70, '2018-11-29 23:51:51', '2019-01-29 23:56:02'),
(5, 5, 1.32, 56, 868, 26, 76, '2019-01-23 17:00:00', '2019-01-26 17:00:00'),
(6, 6, 120, 88, 676, 26, 75, NULL, '2019-01-29 17:00:00'),
(7, 7, 3.43, 67, 67, 26, 71, NULL, '2019-01-31 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `node_sensor`
--

CREATE TABLE `node_sensor` (
  `id` int(11) NOT NULL,
  `kode_alat` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `wilayah_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `node_sensor`
--

INSERT INTO `node_sensor` (`id`, `kode_alat`, `nama`, `wilayah_id`, `created_at`, `updated_at`) VALUES
(3, 'sensor220181123', 'sensor 3 testing realtime', '5', '2018-11-30 07:22:07', '2018-11-30 07:22:07'),
(4, 'siskom_20181125', 'siskom', '6', '2018-11-25 01:18:20', '2018-11-25 01:18:20'),
(5, NULL, 'paris1', '3', '2018-12-29 08:08:05', '2018-12-29 08:08:05'),
(6, NULL, 'paris2', '3', '2018-12-29 08:08:15', '2018-12-29 08:08:15'),
(7, NULL, 'imbon1', '4', '2018-12-29 08:08:24', '2018-12-29 08:08:24'),
(8, NULL, 'imbon2', '4', '2018-12-29 08:08:32', '2018-12-29 08:08:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_udara_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `kategori_udara_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 5, 'Peringatan! Kualitas UdaraBERBAHAYA', '1. jangan keluar rumah\r\n\r\n2. menggunakan masker ketika berpergian\r\n\r\n3. perbanyak minum air putih', '2019-01-31 07:05:53', '2019-01-31 07:05:53'),
(3, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-01-31 07:32:33', '2019-01-31 07:32:33'),
(4, 3, 'Peringatan! Kualitas UdaraTIDAK SEHAT', '<p>1. perbanyak minum air putih</p>\r\n\r\n<p>2. konsumsi sayuran</p>', '2019-01-31 07:51:08', '2019-01-31 07:51:08'),
(5, 3, 'Peringatan! Kualitas UdaraTIDAK SEHAT', '<p>1. perbanyak minum air putih</p>\r\n\r\n<p>2. konsumsi sayuran</p>', '2019-02-01 09:52:01', '2019-02-01 09:52:01'),
(6, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-02-01 09:57:35', '2019-02-01 09:57:35'),
(7, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-01 09:57:56', '2019-02-01 09:57:56'),
(8, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-02-01 14:23:51', '2019-02-01 14:23:51'),
(9, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-01 14:24:15', '2019-02-01 14:24:15'),
(10, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-01 14:25:39', '2019-02-01 14:25:39'),
(11, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-01 14:26:24', '2019-02-01 14:26:24'),
(12, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-02-01 14:26:40', '2019-02-01 14:26:40'),
(13, 2, 'Peringatan! Kualitas UdaraSEDANG', '<p>1. gunakan masker ketika keluar dari rumah</p>\r\n\r\n<p>2. perbanyak minum air putih</p>', '2019-02-01 15:00:26', '2019-02-01 15:00:26'),
(14, 3, 'Peringatan! Kualitas UdaraTIDAK SEHAT', '<p>1. perbanyak minum air putih</p>\r\n\r\n<p>2. konsumsi sayuran</p>', '2019-02-01 15:01:11', '2019-02-01 15:01:11'),
(15, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-02-01 15:01:17', '2019-02-01 15:01:17'),
(16, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-02-01 15:01:18', '2019-02-01 15:01:18'),
(17, 5, 'Peringatan! Kualitas UdaraBERBAHAYA', '<p>1. jangan keluar rumah</p>\r\n\r\n<p>2. menggunakan masker ketika berpergian</p>\r\n\r\n<p>3. perbanyak minum air putih</p>', '2019-02-01 15:38:04', '2019-02-01 15:38:04'),
(18, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-01 15:38:28', '2019-02-01 15:38:28'),
(19, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-01 15:38:30', '2019-02-01 15:38:30'),
(20, 1, 'Peringatan! Kualitas UdaraBAIK', '<p>1. hidup sehat dengan udara yang segar</p>', '2019-02-02 10:27:56', '2019-02-02 10:27:56'),
(21, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-02 10:27:58', '2019-02-02 10:27:58'),
(22, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-02 10:28:00', '2019-02-02 10:28:00'),
(23, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-02 10:28:17', '2019-02-02 10:28:17'),
(24, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-02 10:30:36', '2019-02-02 10:30:36'),
(25, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-02 10:30:43', '2019-02-02 10:30:43'),
(26, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-02 10:32:19', '2019-02-02 10:32:19'),
(27, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 08:40:59', '2019-02-03 08:40:59'),
(28, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 08:41:24', '2019-02-03 08:41:24'),
(29, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 08:41:47', '2019-02-03 08:41:47'),
(30, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 09:17:48', '2019-02-03 09:17:48'),
(31, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 09:18:27', '2019-02-03 09:18:27'),
(32, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 09:18:45', '2019-02-03 09:18:45'),
(33, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 09:19:12', '2019-02-03 09:19:12'),
(34, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-03 09:54:41', '2019-02-03 09:54:41'),
(35, 2, 'Peringatan! Kualitas UdaraSEDANG', '<p>1. gunakan masker ketika keluar dari rumah</p>\r\n\r\n<p>2. perbanyak minum air putih</p>', '2019-02-03 09:55:38', '2019-02-03 09:55:38'),
(36, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-28 07:08:48', '2019-02-28 07:08:48'),
(37, 4, 'Peringatan! Kualitas UdaraSANGAT TIDAK SEHAT', '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-02-28 07:10:18', '2019-02-28 07:10:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('superadmin@email.com', '$2y$10$p2jyCVFNLtAiakt2FQW3zOMc.Mghr/jZFejyEd0KNGAwowzi61YWa', '2018-12-30 03:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `endpoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `push_subscriptions`
--

INSERT INTO `push_subscriptions` (`id`, `user_id`, `endpoint`, `public_key`, `auth_token`, `created_at`, `updated_at`) VALUES
(5, 59, 'https://fcm.googleapis.com/fcm/send/cGde6aW4YJ0:APA91bEKeSYzw0PJSgyQGmdD_fpf6BO1nE3UQ8otH3wrJXlBuWPbv2G3YySPK5E8pwxN-M7LUewa6kBsM3AGBnjC1wsMt4bsW3G7ryyhPrw-uET-8pjv0FsPFRQcdlQQSNL2tFY2dcAE', 'BKzNNKuyBCRhCeW6pXPOU2cZey22dfzT_ouhVe9DZyOLOrDroKWgDdpsX6p9N5N_XFbXqavNG8nHl791j7VF4fs', 'b1_XsJgGMpaCwwOWr4t-kg', '2019-02-01 08:31:20', '2019-02-01 08:31:20'),
(12, 6, 'https://fcm.googleapis.com/fcm/send/e6LL7eitO0Q:APA91bGjC7CKy7vJGfhEHlnkKyuJyFE2zd6_BjeSTg_doNibOH8aXqJdL6ZwoZfx69AlaQAmImXmdyJxwhYl187gFdYxg-PdTlzmpI1rJ9UdyzyL4CFzbHHMnGmZpaOQl-3d-JUSunHc', 'BIqhTjPhl7QYAtNB_AxHt15JmnQJfEE2OUeQ-f8E_EttC5-kNeOmrNUsL4I2DBhLmhQ69AfMh2jGlR2rwYuaqoA', 'GJ_nzdBNum3Py8RJqyezBQ', '2019-02-28 07:10:02', '2019-02-28 07:10:02'),
(13, 13, 'https://fcm.googleapis.com/fcm/send/cKzpdYfU5ec:APA91bHebLYJojogc--yDYpEaDO3DKrf9MHAZIbhi0cB2o6rdR4mYie99pa2-BTZ5fmxYAt138mh1V-ENjchlPAJ8-y1tmBdTzr16BxkgK-cLEBndd-PSwOQ2iLQ3XehHWVgSema6l12', 'BO8whZeRxIPBiIipP0Qm5G8WZhCYnGXgKFK1Aisk8g0Yy7XPay5PGZK69a_sofQ4Z-wQuxZYjsZahJ9kM5RHPac', 'qEyONmryu5Q5Fb3QrDd5jA', '2019-06-23 07:02:48', '2019-06-23 07:02:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` int(11) NOT NULL,
  `kategori_udara_id` int(11) NOT NULL,
  `pesan_rekomendasi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `kategori_udara_id`, `pesan_rekomendasi`, `created_at`, `updated_at`) VALUES
(1, 5, '<p>1. jangan keluar rumah</p>\r\n\r\n<p>2. menggunakan masker ketika berpergian</p>\r\n\r\n<p>3. perbanyak minum air putih</p>', '2018-11-24 02:24:37', '2018-11-24 02:24:37'),
(2, 4, '<p>1jmenggunakan bajus</p>\r\n\r\n<p>2. makan hijauk</p>\r\n\r\n<p>3. lakjdsfkldjsf&nbsp;</p>\r\n\r\n<p>4. lajdfjadsf</p>\r\n\r\n<p>5. hahahahahha</p>', '2019-01-31 07:33:23', '2019-01-31 07:33:23'),
(3, 1, '<p>1. hidup sehat dengan udara yang segar</p>', '2019-01-31 07:31:11', '2019-01-31 07:31:11'),
(4, 2, '<p>1. gunakan masker ketika keluar dari rumah</p>\r\n\r\n<p>2. perbanyak minum air putih</p>', '2019-01-31 07:31:42', '2019-01-31 07:31:42'),
(5, 3, '<p>1. perbanyak minum air putih</p>\r\n\r\n<p>2. konsumsi sayuran</p>', '2019-01-31 07:32:16', '2019-01-31 07:32:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', NULL, NULL),
(2, 'operator', 'web', NULL, NULL),
(3, 'guest', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `suhu` varchar(100) NOT NULL,
  `kelembapan` varchar(10) DEFAULT NULL,
  `asap` float DEFAULT NULL,
  `co` float NOT NULL,
  `pm10` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sensor`
--

INSERT INTO `sensor` (`id`, `suhu`, `kelembapan`, `asap`, `co`, `pm10`, `created_at`, `updated_at`) VALUES
(1, '2', '23', 3.93, 1.19, 8.9, '2018-11-18 06:54:48', '2018-11-18 06:54:48'),
(2, '30', '73', 765, 4.29, 0, '2018-11-21 03:01:22', '2018-11-21 03:01:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@email.com', NULL, NULL, '$2y$10$/Qwq9dbc3C3wRtT8SZrGLewEuX1HQ3ojwMepIJjK423HkYh6aVuUy', 'y9elhOkZSslvGM7EsXjI8aAkEIrYBV7AHn2Lmd3MYxB5GvUgjXbVqDtIwAoG', '2018-12-29 14:41:31', '2018-12-29 14:41:31'),
(6, 'ikhwan prayoga', 'ikhwan@email.com', '20181229103528ikhwanprayoga.jpg', NULL, '$2y$10$wuvSzgTJKIlOTaiKOA4FoeDOBEfRfcbUGKj4UTg6FRQMSt0kTTFhy', 'lDXYbhmIgnGjkXIzRckk2cEe9mBQgoYsWaTtieEX9bXrZl1EcB4mC7yW9oeS', '2018-12-29 15:35:28', '2018-12-29 15:35:28'),
(7, 'rudi', 'admin.attendance@local.dev', '20181229104212rudi.jpg', NULL, '$2y$10$P5toRo.JpoteQIXwqIPIXeSneZX2zp7Cq3VL62rqw5EmPLtQaMLWu', NULL, '2018-12-29 15:42:12', '2018-12-30 02:20:26'),
(8, 'baru', 'baru@email.com', '20190201103215baru.jpg', NULL, '$2y$10$kk20/cvwsjdff1v6jzyU8eANAFeBnpPZviYVjceaga1JANu/gTrf2', NULL, '2018-12-29 17:27:09', '2019-02-01 03:32:15'),
(11, 'operator1', 'operator1@email.com', '20181230094224operator1.jpg', NULL, '$2y$10$22tLqeDtjCM5wMdSrYZ5dO9ISvYIUPlwmu9fVt9GEWpvbOpKNPasW', 'CAqogV2ctO2O2FKkgBmuxEfqms6kt6Jgn0OKxaIdfy5sUIUd2VUvGED5jmX7', '2018-12-30 02:42:25', '2018-12-30 02:42:25'),
(12, 'tes pwa', 'pwa@email.com', NULL, NULL, '$2y$10$DYtGkxdLOO5i5IT7PsKOFO45mUNr0N/oBRcX4ml8mjiG4.Y9SRxvy', NULL, '2019-01-09 05:50:39', '2019-01-09 05:50:39'),
(13, 'lenovo', 'lenovo@email.com', NULL, NULL, '$2y$10$j9/cdhedFdXNttJX943uPePQw/0Cdwk5EHDDgy2kWUaTvEWgIKMWu', 'UKZwEEea5BYx13ysCnT0NhqQ2krJyOK4YwyX0xA0CGKG07VWDdqOdYlyobw9', '2019-01-13 15:10:54', '2019-01-13 15:10:54'),
(14, 'testing', 'testing@email.com', NULL, NULL, '$2y$10$aeCwtXymzOtbiTHi3QKzVugcEHVkQPCaeqtDAdjDARhG7Q.2NJGIq', 'zZlX8obEfOHgyS24G32bXpPfxneIQ1nvBK7tQKVQ6l0nvHfN1iHfnXdTjuFR', '2019-01-28 13:30:43', '2019-02-01 07:07:32'),
(51, 'kampus', 'io@l.com', NULL, NULL, '$2y$10$fb16d5KypSqd.iqkriweTOmz6MVxTGKy1LATO0wuKwyLN250HdpBW', '625VvYB3DDEChoRudhWw9Ygt7pQ0359ik17UbFPPWSZ67cGLvV02CZ5ThoFd', '2019-01-30 04:17:54', '2019-02-01 02:23:17'),
(52, 'Metah', 'merah@email.com', NULL, NULL, '$2y$10$TEwvEzY2lVI7aCGFBy.BjuXB0xKXx6GQ/nMULQixs4c0PHJPIKvAO', 'IsK1QmyKMEsoygyqRfgNaCUYdl3554aMVSh0KUxNGpYDTbD274vlGgR4MxFI', '2019-01-30 06:53:29', '2019-01-30 06:53:29'),
(53, 'itam', 'itam@email.com', NULL, NULL, '$2y$10$gnVoqpWJaku/B8I9iw1xQuTQQFAepNhd7fuFFEJ2KUQ0DWSGeqs1i', NULL, '2019-01-30 17:14:30', '2019-01-30 17:14:30'),
(54, 'was', 'waw@a.com', '20190201095326was.jpg', NULL, '$2y$10$cu8FBv2yidDMPEx3TGMQ0unCOfLlg1B343gnwe5bqwTxALqiKoz.S', NULL, '2019-02-01 02:53:26', '2019-02-01 02:53:26'),
(56, 'jumd', 'jum@j.com', '20190201020628jumd.jpg', NULL, '$2y$10$S9i37tEe1zRwz/2ueslesecHdv3jb1.g9tO/HmePJsKo1CoI51Aim', 'HXjJEXK7bayMsK1pxYZkEr3SfAgFmIkmFRdXdekqECYkO2XO7ulUpO9TUWFn', '2019-02-01 02:57:09', '2019-02-01 07:06:28'),
(58, 'minggu', 'ming@kk.com', NULL, NULL, '$2y$10$CGD7Qfyq.DYH16ROUMwLCOPgXxM6x1gTsPACmDLg11DswiohL0ily', 'XFrMgI7RjRZ1DMZ5EF6ko1xs9QJRLsXrTRv22sbTsaHQccvT5BqTyJy0byX1', '2019-02-01 03:00:17', '2019-02-01 03:00:17'),
(59, 'malu', 'malu@k.com', NULL, NULL, '$2y$10$l5QYbx2XogaWol1rA.QaVeHa5LRQcn4Wuf21HSpFYShHLhFTDZrb.', 'rCNx63V7fX2pBYoJPhQi8x93IXs2fd5mUrcCnHBFrIVgOlnXlpiya9iszVEN', '2019-02-01 08:30:38', '2019-02-01 08:30:38'),
(60, 'Kambing', 'kambing@email.com', NULL, NULL, '$2y$10$QWxK/maGjhALINgELLFmP.MnboLInylfRF9LE6oklYj7Kr3b5qiuO', NULL, '2019-02-01 09:29:20', '2019-02-01 09:29:20'),
(61, 'gile', 'gile@email.com', NULL, NULL, '$2y$10$9BSKiAuofimZC6S0ONOuP.34El0.WUT.reLI3VJRYsnt4cO2lH4Du', NULL, '2019-02-01 13:03:41', '2019-02-01 13:03:41'),
(62, 'visa', 'visa@email.com', NULL, NULL, '$2y$10$WAQjWo6wF9XqgNSvSZUGSO/gpXWifkZM6hYV1bZCbPWKIjxtaW0Ru', NULL, '2019-03-22 12:25:43', '2019-03-22 12:25:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_permenit`
--
ALTER TABLE `data_permenit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_sementara`
--
ALTER TABLE `data_sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_udara`
--
ALTER TABLE `kategori_udara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_wilayah`
--
ALTER TABLE `master_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `node_sensor`
--
ALTER TABLE `node_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `push_subscriptions_endpoint_unique` (`endpoint`),
  ADD KEY `push_subscriptions_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `data_permenit`
--
ALTER TABLE `data_permenit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT untuk tabel `data_sementara`
--
ALTER TABLE `data_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3535;

--
-- AUTO_INCREMENT untuk tabel `kategori_udara`
--
ALTER TABLE `kategori_udara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_wilayah`
--
ALTER TABLE `master_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `node_sensor`
--
ALTER TABLE `node_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD CONSTRAINT `push_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
