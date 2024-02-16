-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `token`, `tanggal`) VALUES
(33, 'dcb8177c3934214912fd272434060455', '2024-02-10 15:01:04'),
(34, '25632faca6b19e5d459f32be7c2a20f5', '2024-02-10 15:01:08'),
(35, 'da6ac9f3ac32987a5b5bc131bded886b', '2024-02-10 15:01:18'),
(36, 'd85ce1305e6c05a9aee0511fb1a0b065', '2024-02-10 15:02:09'),
(37, 'b5bb101adde296e7e2816e09683fba28', '2024-02-10 15:02:58'),
(38, 'c95ee06b92a3f502524936f044bdbee0', '2024-02-10 15:03:29'),
(39, '677832b2642fc35523a75922104635c6', '2024-02-10 15:04:34'),
(40, 'd62e52f9ad2917957bd229618fdd217e', '2024-02-10 15:04:46'),
(41, 'a933482549a5a5e410d104df7e1c6e70', '2024-02-10 15:05:11'),
(42, '8bb1c0cda33c8374d8b8d4bada40496a', '2024-02-10 15:05:27'),
(43, '7abc32922ea4efb815535fce957b0fa2', '2024-02-10 15:05:42'),
(44, '58b0d55d0cc5275566928bc7643571a0', '2024-02-10 15:06:04'),
(45, '8989a32fc807bb97f9e748fc0cc7a730', '2024-02-10 15:07:03'),
(46, 'cf7a173e1ddaaf130b97d532f42431f5', '2024-02-10 15:08:20'),
(47, '407a33e76e1f00d0fc990ac5296955d4', '2024-02-10 15:08:32'),
(48, '33ee635df7343851c33e7f6a21e4654b', '2024-02-10 15:09:16'),
(49, 'd7bffb0fb90b80c8cf297b706c18123a', '2024-02-10 15:09:41'),
(50, '3141f98a6464d94ee07e8bc55d899474', '2024-02-10 15:10:10'),
(51, '304299fcf20bce54b0f1f9874a8dcf2b', '2024-02-10 15:10:32'),
(52, '54b389fef02480fe783c3a101a26eba5', '2024-02-10 15:16:57'),
(53, 'e58ff52a9f6ba6ef87558ec299d51e3b', '2024-02-10 15:17:36'),
(54, '1b15615916a614dc58d5b1ccbc5ede6b', '2024-02-10 15:18:21'),
(55, 'ca56f4fc7fbb5d7e13c9488eeb9602b2', '2024-02-10 15:18:52'),
(56, '19b9cc7f0394796ab62f804faa51ad84', '2024-02-10 15:19:53'),
(57, '130ea61147e2f3e89b2c728ab33e76c2', '2024-02-10 15:20:43'),
(59, '17dd359fd2913bd0154e3c7b49fa1079', '2024-02-10 16:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_27_120745_create_siswas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgllhr` date NOT NULL,
  `role` varchar(30) DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `email`, `password`, `alamat`, `tgllhr`, `role`) VALUES
(13, 'Admin', 'admin@gmail.com', '$2y$12$v8HxMt03MGk9kiKrXC4eBubk.Q4SzVhb7DJp1MOYJO63gT1ozrKb6', 'SMA 1 Mejobo', '2023-12-30', 'admin'),
(20, 'Farauq Rifky', 'maulanafarauq@gmail.com', '$2y$12$U/3hrKhr.iOVeELdFCJNo.PyP5ClVHFO6V/dvcdhVJgwPJBgO.gX.', 'Ds. Getaspejaten, Kab. Kudus', '2002-06-01', 'siswa'),
(35, 'Wieline Dewi Azzahra', 'wielineazzahraa@gmail.com', '$2y$12$7CzH7cBopv/xQrw5OKr9UO9HH73E9CrLNg7vmYNu6ddb00T7ufxfC', 'Perumahan Sumber Indah 1 C/99', '2006-07-30', 'siswa'),
(36, 'Bagas Malik Ibrahim', 'bagasmalik20@gmail.com', '$2y$12$bzrOFY4.Qse9Q/jqL9pPYO3tmy4ShAZ2ZK513sBMSUwlN6FGs/yM2', 'Jl. Pattimura, Mlati Kidul, Kec. Kota Kudus', '2006-02-06', 'siswa'),
(37, 'Nabella Devyana Putri', 'nabelladp@gmail.com', '$2y$12$PprQIkLPFPK.4pr787wMmONgGpFmb8EDuSNpMovUgeJ/gjRm9.zUi', 'Ds. Gulang, Kec.Mejobo', '2006-01-07', 'siswa'),
(38, 'Rasyita Nursafitri', 'rasyitans@gmail.com', '$2y$12$bADlVUj0ZJj6R0i4QIMwdO8aIPfaxbTh587BlA8ENfGBfDDn.CJMa', 'Jl. Suryokusumo No. 121 Kudus', '2006-12-09', 'siswa'),
(39, 'Muhammad Jovin Prasetyo', 'mjovinprasetyo25@gmail.com', '$2y$12$TTsOJR7FSivRcvuENtrs6uGUGSFixanOBDmClzkix5Cmeg9xt1G9e', 'JL. GETAS PEJATEN, RT 01/, RW 02', '2006-02-06', 'siswa'),
(40, 'Muhammad Fatish Misbachuddin', 'estehbakar13@gmail.com', '$2y$12$wP5b83QrTHxLRVMqRwbLeOjL16mMRHpRnW7rk15Ctk1LWTgiAUyN6', 'Ds. Mejobo RT 1 RW 3', '2006-10-01', 'siswa'),
(41, 'Taufiq Anwar', 'taufiqanwar04@gmail.com', '$2y$12$LhXgK0Phq7YSZ2fxtuahz.O41d.oxFVIC4u/jHRUnIUUGuUEw.Cy2', 'Purwosari', '2006-11-21', 'siswa'),
(42, 'Rakhman', 'rakhmanafrilianto10@gmail.com', '$2y$12$D4zH0qJFFRk5WrMH72nNhuNxDs8n2XYYtC5cmD1w2xGXUilM5q0s2', 'Wergu Tempel, Kec.Kota', '2006-04-01', 'siswa'),
(43, 'Melly Jayaningtyas', 'jayaningtyasm@gmail.com', '$2y$12$pPs7OFKWf1bNGYFOSAmWV.tZIsGcb4Phew8YSRGEgs09b5OoxEZaW', 'DS.Mlatinorowito Rt.05 Rw.07', '2006-09-12', 'siswa'),
(44, 'Ninik', 'ninik123@gmail.com', '$2y$12$Mog01i9Bco/V3Qf8kOmsE.gR8SmpxTLksWW5OgVOumeyjk2/yMn5C', 'Undaan lor', '2006-08-17', 'siswa'),
(45, 'Mutiara Ramadhani', 'mutiarar712@gmail.com', '$2y$12$7vFWFVW7kBuwDdIhIztNSOg.CWSZPQSmXEGdTtRlWgiAmmpJNopSe', 'Mejobo', '2006-12-03', 'siswa'),
(46, 'Khoirunnisa Wasiyatul Hakiki', 'khoirunnisahakiki2@gmail.com', '$2y$12$glXGj/huP7fe2rERMYyaoeWuFf1kddXIMT/9mZTgq1wkP2ZmKRDEi', 'Desa Megawon', '2006-03-02', 'siswa'),
(47, 'Nurul Utami', 'nurultriutami97@gmail.com', '$2y$12$J0ejdPELJM0Qw/P7.OMgVeeFhoLTzvhE/a8usOe/j6JW.MwHuy6f6', 'Loram kulon', '2006-10-03', 'siswa'),
(48, 'Alfiyatunni\'mah', 'alfiyatunnimah7@gmail.com', '$2y$12$YInK.Kkzbl6kGlsYPKZBPewQ.8IYxREuJHzm2HMg4pAqj1zH7ramO', 'Desa Payaman Rt.01 Rw.09', '2006-05-01', 'siswa'),
(49, 'Nadhira Alya Putri', 'nadira.putri707@gmail.com', '$2y$12$.vxRmSsxvgErEJbcRVMtS.RK5UTrC7Ai61MvukXRIjy1LYHMSPBiO', 'Besito Rt.03 Rw.06, Kecamatan.Gebog', '2006-12-26', 'siswa'),
(50, 'Naharul Muthmainnah', 'naharulnew@gmail.com', '$2y$12$Ro2sXMfqUL4cCWy/KX5n0.Of63UztZjmGD1DeLFotVgUWDm7dzpN2', 'Jl. Krasak Pandean No.27 Kec.Jati', '2006-09-18', 'siswa'),
(51, 'Eva Anistiya', 'eanistiya33@gmail.com', '$2y$12$42TQ1xVuLiceczz2cQDHRuVzcFG619xK88vZUt/T1VQu5xMiRAWMK', 'Loram Kulon', '2006-04-06', 'siswa'),
(52, 'Muhammad fauzul himam', 'muhammadfauzul123@gmail.com', '$2y$12$/YfDDOeashR.b6taZ6CDeetiQ2frE12HY7jLU3RW4hUvPxGQs.3qW', 'Ds golantepus rt 5 rw 3', '2006-04-11', 'siswa'),
(53, 'Muhammad Atalla Nur Aufa', 'atallanur37@gmail.com', '$2y$12$fYJCHcJuG7WCm7qEHppxGeMVKupUfnwSEGqp4N9h7VoxDZye7FZW.', 'Perumahan Megawon Indah', '2009-09-02', 'siswa'),
(54, 'Gutti Zaidan Syauqi', 'gutizidan@gmail.com', '$2y$12$u6o6nQyv6FQhkDLTiygPk.6eO7ODe8QQo7HLQDeYZT0TIkOCHktcq', 'Getas Pejaten', '2006-08-15', 'siswa'),
(55, 'Dita Afriani', 'ditafriani12@gmail.com', '$2y$12$QlAmU46PwcSrzCouMmcJWeSE.Jxbe23l0iGIPtNOa.dMRZe5b/L5W', 'Tanjungkarang, Jati Kudus', '2006-02-28', 'siswa'),
(56, 'Putri Permata', 'Putripermagas@gmail.com', '$2y$12$Ej4azbZA1LdvYu.Tkvi0QeR4xLEMELJr0p.kIkEzGtR/Rh1NbDaIm', 'Ds singocandi', '2006-03-25', 'siswa'),
(57, 'Putri Elni Melati', 'pmelati207@gmail.com', '$2y$12$R0pxMyuHFNJ41sf1h4fP4.QpvqhZL7PsmcWf6tZndD1xPsx4/sjLu', 'Ds. Dersalam', '2006-09-27', 'siswa'),
(58, 'Ahmad Pujianto', 'jian.pujianto31@gmail.com', '$2y$12$ZuzNWJ9GEhsNLVdThswwDeaPTXHc4qrDvZBTc6vTBPAdvMMnK4UEy', 'Desa Getas Pejaten RT 11 RW 03, Kec. Jati', '2006-06-30', 'siswa'),
(59, 'Aliviana putri', 'alivianaputri@gmail.com', '$2y$12$rWgf4Si0l9p1dAayJkz35O8GOCc5.lkj6AkADj3vc5cKvJcPJixJ.', 'Loram kulon rt 04/02', '2006-02-10', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `value` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`value`, `id`, `created`, `expired`) VALUES
('130ea61147e2f3e89b2c728ab33e76c2', 59, '2024-02-10 15:16:03', '2024-02-10 15:20:43'),
('17dd359fd2913bd0154e3c7b49fa1079', 20, '2024-02-10 16:53:18', '2024-02-10 16:57:45'),
('19b9cc7f0394796ab62f804faa51ad84', 58, '2024-02-10 15:15:31', '2024-02-10 15:19:53'),
('1b15615916a614dc58d5b1ccbc5ede6b', 56, '2024-02-10 15:14:51', '2024-02-10 15:18:21'),
('25632faca6b19e5d459f32be7c2a20f5', 36, '2024-02-10 14:51:54', '2024-02-10 15:01:08'),
('281a8c5e8fef5079f11376ff56de1314', 34, '2024-02-06 21:51:10', '2024-02-07 21:51:10'),
('304299fcf20bce54b0f1f9874a8dcf2b', 53, '2024-02-10 15:00:21', '2024-02-10 15:10:32'),
('3141f98a6464d94ee07e8bc55d899474', 52, '2024-02-10 14:59:25', '2024-02-10 15:10:10'),
('33ee635df7343851c33e7f6a21e4654b', 50, '2024-02-10 14:58:50', '2024-02-10 15:09:16'),
('407a33e76e1f00d0fc990ac5296955d4', 49, '2024-02-10 14:58:13', '2024-02-10 15:08:32'),
('54b389fef02480fe783c3a101a26eba5', 54, '2024-02-10 15:14:14', '2024-02-10 15:16:57'),
('58b0d55d0cc5275566928bc7643571a0', 46, '2024-02-10 14:57:04', '2024-02-10 15:06:04'),
('677832b2642fc35523a75922104635c6', 41, '2024-02-10 14:54:42', '2024-02-10 15:04:34'),
('67899c04222b8f1e67a9082c9b3b16f1', 13, '2024-02-08 22:40:12', '2024-02-09 22:40:12'),
('7702a37022d15b791a7e80ef0c323b44', 35, '2024-02-08 22:35:27', '2024-02-09 22:35:27'),
('7abc32922ea4efb815535fce957b0fa2', 45, '2024-02-10 14:56:45', '2024-02-10 15:05:41'),
('8989a32fc807bb97f9e748fc0cc7a730', 47, '2024-02-10 14:57:19', '2024-02-10 15:07:03'),
('8bb1c0cda33c8374d8b8d4bada40496a', 44, '2024-02-10 14:55:47', '2024-02-10 15:05:27'),
('8fd06b225bede6d975d046ba13479b90', 30, '2024-02-06 15:19:55', '2024-02-06 15:20:40'),
('91f605db7ea9cdb272b5e700bc74914e', 24, '2024-02-06 12:44:50', '2024-02-07 12:44:50'),
('935cbdbfe2b1ba6c1b055ca8e7ab02bf', 13, '2024-01-18 10:05:27', '2024-01-18 10:05:47'),
('9ad827e3f54d4c02c65b24f798def094', 13, '2024-01-17 14:33:31', '2024-01-17 14:33:53'),
('9c7ea2064665f6a3ac7ee888025ed5c4', 20, '2024-02-10 16:59:13', '2024-02-11 16:59:13'),
('9c865c080f271ba0220be50faf0b943b', 13, '2024-01-29 17:05:29', '2024-01-30 17:05:29'),
('a3d0b2792fc725ef24c8ff6c846d15fa', 13, '2024-01-21 23:53:51', '2024-01-22 23:53:51'),
('a933482549a5a5e410d104df7e1c6e70', 43, '2024-02-10 14:55:16', '2024-02-10 15:05:11'),
('aa1fcff358c63d3c6dd990810ae4aaff', 13, '2024-02-16 15:18:14', '2024-02-17 15:18:14'),
('b30815bc04c56bebc2c43a1787d6cbbb', 13, '2024-01-18 10:30:38', '2024-01-18 10:35:43'),
('b410194078d314ef9df76741a7b52b94', 13, '2024-01-18 10:07:21', '2024-01-18 10:07:41'),
('b5bb101adde296e7e2816e09683fba28', 39, '2024-02-10 14:54:09', '2024-02-10 15:02:58'),
('b9e779c2c1f42aee2f324d5f283ed8c6', 1, '2024-01-03 09:57:21', '2024-01-03 09:57:39'),
('ba8833dd1b5d764d9015300d2c724327', 20, '2024-01-28 23:10:16', '2024-01-29 23:10:16'),
('bd6a3fc36ada59c293b705760b88d518', 25, '2024-02-06 13:38:39', '2024-02-06 13:39:02'),
('bdf8653f97141de5ebb1a2903705b649', 20, '2024-01-20 02:56:44', '2024-01-20 02:57:47'),
('c3dc2c1cd694c5e6c66766585f8a854e', 19, '2024-01-20 17:50:47', '2024-01-20 18:40:06'),
('c407f0abf9e0a16da6a18f8aadc502c5', 13, '2024-01-18 10:20:30', '2024-01-18 10:20:46'),
('c6867358670eb5aec61273ed1f427377', 13, '2024-01-28 17:03:03', '2024-01-29 17:03:03'),
('c7cfa955c5fd3097a80cfb69f59f9d8c', 19, '2024-01-16 09:44:43', '2024-01-17 09:44:43'),
('c822d4616d09c22bf831ab747a7ffd9e', 20, '2024-01-16 21:55:10', '2024-01-16 21:55:43'),
('c8b7381143a56d2d332187c3b8c55a5e', 20, '2024-02-10 15:22:53', '2024-02-10 15:26:37'),
('c8cc2d22e4a29dd0b2c748da2ba2ac91', 13, '2024-01-23 17:05:11', '2024-01-24 17:05:11'),
('c95ee06b92a3f502524936f044bdbee0', 40, '2024-02-10 14:54:28', '2024-02-10 15:03:29'),
('ca56f4fc7fbb5d7e13c9488eeb9602b2', 57, '2024-02-10 15:15:09', '2024-02-10 15:18:52'),
('cad59540f9c9f3ea65a822a8fce604c8', 19, '2024-01-15 14:10:43', '2024-01-16 09:42:38'),
('cbc7f465d10a66200f4a183393332ba9', 13, '2024-02-03 16:11:25', '2024-02-04 16:11:25'),
('cf7a173e1ddaaf130b97d532f42431f5', 48, '2024-02-10 14:57:36', '2024-02-10 15:08:20'),
('d02e0937ebb07505c4a70be10807bda7', 20, '2024-02-08 23:03:06', '2024-02-09 21:42:50'),
('d03ca868a9da45d1d574e0e18844972c', 26, '2024-02-06 13:42:57', '2024-02-07 13:42:57'),
('d62e52f9ad2917957bd229618fdd217e', 42, '2024-02-10 14:54:57', '2024-02-10 15:04:46'),
('d7bffb0fb90b80c8cf297b706c18123a', 51, '2024-02-10 14:59:09', '2024-02-10 15:09:41'),
('d85ce1305e6c05a9aee0511fb1a0b065', 38, '2024-02-10 14:52:45', '2024-02-10 15:02:09'),
('da6ac9f3ac32987a5b5bc131bded886b', 37, '2024-02-10 14:52:23', '2024-02-10 15:01:18'),
('dbfd1cc07063683c8d3d799ab01b1806', 13, '2024-01-17 14:55:32', '2024-01-18 10:05:08'),
('dc33384548e7a7cae692138cdc762b15', 20, '2024-01-28 22:15:46', '2024-01-28 22:16:32'),
('dcb8177c3934214912fd272434060455', 35, '2024-02-10 14:51:24', '2024-02-10 15:01:04'),
('e22472ae055706395f37fd85dc1a4690', 1, '2024-01-03 10:05:47', '2024-01-03 10:40:01'),
('e389125964c81aa6e7a739bdc499c064', 20, '2024-01-20 14:56:06', '2024-01-20 14:56:19'),
('e58ff52a9f6ba6ef87558ec299d51e3b', 55, '2024-02-10 15:14:34', '2024-02-10 15:17:36'),
('e7aff442a97839d22a6419ab634656cf', 19, '2024-01-29 17:14:35', '2024-01-29 17:14:52'),
('e7dc12f08bc1114645e84e34fc3f7b74', 19, '2024-01-29 17:08:14', '2024-01-29 17:08:57'),
('e9ea2a4590e678d2f5bd4b6f5d8a1268', 20, '2024-01-16 13:57:55', '2024-01-16 21:51:26'),
('ec75f8580dd9f5e209be4b1656214f54', 25, '2024-02-06 13:39:09', '2024-02-07 13:39:09'),
('f2cc863b9e0a9aad90e5f0dd842a68be', 1, '2024-01-03 09:35:40', '2024-01-03 09:37:06'),
('f430547ee926b83e9ac1d78f51f65e39', 1, '2024-01-13 03:37:16', '2024-01-14 03:37:16'),
('f49791c910cf4c548595b196f747b5ca', 28, '2024-02-06 15:16:24', '2024-02-06 15:20:09'),
('f8eb5e00f9b832edf6d977114152bfd9', 20, '2024-01-18 10:39:18', '2024-01-18 11:00:29'),
('fa62238d824e5c53a8d8da605f684df8', 13, '2024-01-24 19:28:33', '2024-01-25 19:28:33'),
('fe20658539b72ba27b136ad95899a79f', 13, '2024-01-17 03:21:10', '2024-01-17 11:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`value`);

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
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
