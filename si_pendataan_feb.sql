-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 04:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_pendataan_feb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL,
  `ipk` double(3,2) DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_pendidikan_sd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_pendidikan_smp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_pendidikan_sma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_riwayat_pendidikan_sd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_riwayat_pendidikan_smp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_riwayat_pendidikan_sma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_mulai_bekerja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumnis`
--

INSERT INTO `alumnis` (`id`, `user_id`, `jenis_kelamin`, `npm`, `prodi`, `angkatan`, `tanggal_masuk`, `tanggal_lulus`, `ipk`, `pekerjaan`, `tempat_pekerjaan`, `pendidikan_terakhir`, `riwayat_pendidikan_sd`, `riwayat_pendidikan_smp`, `riwayat_pendidikan_sma`, `file_riwayat_pendidikan_sd`, `file_riwayat_pendidikan_smp`, `file_riwayat_pendidikan_sma`, `created_at`, `updated_at`, `tanggal_mulai_bekerja`) VALUES
(2, 5, 'Laki-Laki', 'B1A019030', 'Akuntansi', '2019', '2021-12-01', '2021-12-15', 3.89, 'Dan lainnya', 'Shopee', NULL, 'SD 02 Arga Makmur', 'SMP 06 Batam', 'SMA 02 Batam', NULL, NULL, NULL, '2021-12-08 02:25:20', '2021-12-27 07:38:39', '2021-12-21'),
(3, 3, 'Laki-Laki', NULL, 'Manajemen', '2019', '2021-12-25', '2021-12-24', 3.85, 'Pegawai Negeri Sipil', 'Kantor Camat', NULL, 'SD', 'SMP', 'SMA', 'img_61af1ac82f0fa4.44577302.png', 'img_61af1ac8307364.42335874.png', 'img_61af1ac83167b0.79224076.jpg', '2021-12-08 02:37:17', '2021-12-28 19:13:34', '2021-12-10'),
(4, 4, 'Perempuan', 'B1B019026', 'Manajemen Bisnis', '2019', '2021-12-10', '2022-01-01', 3.75, 'Pegawai Negeri Sipil', 'University of Bengkulu', NULL, 'SD 02 Arga Makmur', 'SMP 03 Arga Makmur', 'SMA 02 Arga Makmur', 'img_61af2d665e1de6.71570131.png', 'img_61af2d665f3649.27862682.png', 'img_61af2d665f9cd5.83995654.jpg', '2021-12-08 02:40:28', '2021-12-28 18:40:47', '2022-01-08'),
(5, 6, 'Laki-Laki', 'G1A019100', 'Informatika', '2021', '2021-12-07', '2021-12-25', 3.75, 'Karyawan Swasta', 'Shopee', NULL, 'SD', 'SMP', 'SMA', 'img_61b17c80aedce5.59258107.png', 'img_61b17c80d2d9f8.19372723.png', 'img_61b17c80d33584.19993825.jpg', '2021-12-08 20:48:24', '2021-12-28 18:41:28', '2021-12-22'),
(6, 11, 'Laki-Laki', 'G1A019099', 'Pendidikan Dokter', '2019', NULL, NULL, NULL, NULL, NULL, NULL, 'SD 02 Arga Makmur', 'SMP 03 Arga Makmur', 'SMA 02 Batam', 'img_61cbbb6e9168d6.22160620.png', 'img_61cbbb6eb48d78.22630679.png', 'img_61cbbb6eb58065.20319568.jpg', '2021-12-28 19:16:41', '2021-12-28 19:16:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(2, 'Website Developer', '<p>adddddddddddddddddd</p>', '2021-12-08 20:54:13', '2021-12-08 20:54:13'),
(3, 'Form Kuisioner', '<p>Silakan isi form berikut</p>', '2021-12-28 19:19:08', '2021-12-28 19:19:08');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kejuaraans`
--

CREATE TABLE `kejuaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kejuaraans`
--

INSERT INTO `kejuaraans` (`id`, `user_id`, `tanggal`, `penyelenggara`, `region`, `file_sertifikat`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-12-09', 'Universitas Bengkulu', 'Sumatera', 'img_61b06599ca10b0.58679701.png', '2021-12-08 00:58:17', '2021-12-08 00:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_pendidikan_sd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_pendidikan_smp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_pendidikan_sma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_riwayat_pendidikan_sd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_riwayat_pendidikan_smp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_riwayat_pendidikan_sma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `user_id`, `jenis_kelamin`, `npm`, `prodi`, `angkatan`, `riwayat_pendidikan_sd`, `riwayat_pendidikan_smp`, `riwayat_pendidikan_sma`, `file_riwayat_pendidikan_sd`, `file_riwayat_pendidikan_smp`, `file_riwayat_pendidikan_sma`, `scan_ktp`, `created_at`, `updated_at`) VALUES
(6, 10, 'Laki-Laki', 'G1A019100', 'Akuntansi', '2019', 'SD', 'SMP', 'SMA', NULL, NULL, NULL, NULL, '2021-12-22 01:20:06', '2021-12-28 18:41:59'),
(8, 12, 'Laki-Laki', 'G1A019100', 'Manajemen', '2019', 'SD 02 Arga Makmur', 'SMP 03 Arga Makmur', 'SMA 02 Arga Makmur', 'img_61cbc34b4b63a8.38840843.png', 'img_61cbc34b4cf535.00473475.png', 'img_61cbc34b4e3f62.35201164.png', 'img_61cbc34b4f7452.99975652.png', '2021-12-28 19:08:19', '2021-12-28 19:33:29'),
(9, 13, 'Laki-Laki', 'G1A019032', 'Informatika', '2019', 'SD 02 Arga Makmur', 'SMP 03 Arga Makmur', 'SMA 02 Arga Makmur', NULL, NULL, NULL, NULL, '2021-12-28 19:30:50', '2021-12-28 19:30:50'),
(10, 14, 'Perempuan', 'G1A019078', 'Informatika', '2019', 'SD Curup', 'SMP Curup', 'SMA Curup', 'img_61cbd5d3a65b62.54096594.png', 'img_61cbd5d3a90436.79311708.png', 'img_61cbd5d3a97407.54863364.png', 'img_61cbd5d3a9e5d1.87256834.png', '2021-12-28 20:28:19', '2021-12-28 20:28:19');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_31_085143_create_prestasi_mahasiswas_table', 1),
(6, '2021_11_04_015046_create_mahasiswas_table', 1),
(7, '2021_11_04_020620_create_alumnis_table', 1),
(8, '2021_11_04_023211_create_yudisia_table', 1),
(9, '2021_11_22_083707_create_beritas_table', 1),
(10, '2021_11_26_094410_create_pelatihans_table', 1),
(11, '2021_11_26_094537_create_kejuaraans_table', 1),
(12, '2021_11_26_094707_create_organisasis_table', 1),
(13, '2021_12_27_143233_add_tanggal_mulai_to_alumnis_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organisasis`
--

CREATE TABLE `organisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisasis`
--

INSERT INTO `organisasis` (`id`, `user_id`, `nama_organisasi`, `jabatan`, `file_sertifikat`, `created_at`, `updated_at`) VALUES
(1, 4, 'Himafeb', 'Sekretaris', 'img_61b065c7b62263.60560942.jpg', '2021-12-08 00:59:03', '2021-12-08 00:59:03'),
(4, 11, 'HIMATIF', 'Ketua Umum', 'img_61cbbbc4c8cd31.81759663.png', '2021-12-28 18:37:08', '2021-12-28 18:37:08'),
(5, 12, 'HIMATIF', 'Ketua Umum', 'img_61cbc3adbb0185.06909190.png', '2021-12-28 19:10:53', '2021-12-28 19:10:53');

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
-- Table structure for table `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelatihans`
--

INSERT INTO `pelatihans` (`id`, `user_id`, `tanggal`, `penyelenggara`, `durasi`, `region`, `file_sertifikat`, `created_at`, `updated_at`) VALUES
(2, 3, '2021-12-01', 'Universitas Bengkulu', '4 Bulan', 'Sumatera', 'img_61b06f6535d842.54244437.png', '2021-12-08 01:40:05', '2021-12-08 01:40:05'),
(5, 12, '2021-12-10', 'Universitas Bengkulu', '4 Bulan 3 hari', 'Sumatera', 'img_61cbc38590a607.90572847.png', '2021-12-28 19:09:56', '2021-12-28 19:10:13'),
(6, 3, '2021-12-17', 'Kamus Merdeka', '4 Bulan', 'Bengkulu', 'img_61cbc48e7ba718.44642934.png', '2021-12-28 19:14:38', '2021-12-28 19:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi_mahasiswas`
--

CREATE TABLE `prestasi_mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('ADMIN','ALUMNI','MAHASISWA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MAHASISWA',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrei Jonior Gustari', 'ADMIN', 'andreijonior@gmail.com', NULL, '$2y$10$/lKudXWcdmqZTj0AwxIqAesdc6TGe4bz39aAUU/Sqwerwo23serb.', NULL, '2021-12-07 01:17:56', '2021-12-14 01:12:45'),
(3, 'Muhammmad Hafiz', 'ALUMNI', 'hafiz@gmail.com', NULL, '$2y$10$iDPIGgLJfX7/jqzVeDv3meTsq.xnIPm.e582rxXHQMKi0UfnkBLaO', NULL, '2021-12-07 01:17:56', '2021-12-08 02:37:17'),
(4, 'Aisyah', 'ALUMNI', 'aise@gmail.com', NULL, '$2y$10$FTeXTennl2UWXtDysF322ujEQtRBu23.avstJRtArB/295oktL6Pi', NULL, '2021-12-07 02:41:03', '2021-12-08 02:40:28'),
(5, 'Adde', 'ALUMNI', 'ade@gmail.com', NULL, '$2y$10$HXBB3nT2iw58gCqNQS773OQ.nksxr8sg0qQG4XOVzVLaV4eayupsm', NULL, '2021-12-07 02:48:02', '2021-12-08 02:25:20'),
(6, 'Danurifa Mubariq Imam', 'ALUMNI', 'danurifa@gmail.com', NULL, '$2y$10$Ea5tMMiPsvBBiUFKzalnrOpjZFjrhn2bESvT1MQkIiYDazmhy6G82', NULL, '2021-12-08 20:48:16', '2021-12-08 20:48:24'),
(10, 'krisna', 'MAHASISWA', 'krisna@gmail.com', NULL, '$2y$10$AXeZUtkpkkQX0uBDUhHqQOMuJIZwOZOpSF9GI83rDgpud9Rvix9hW', NULL, '2021-12-22 01:20:06', '2021-12-22 01:20:06'),
(11, 'Rolin Sanjaya Tamba', 'ALUMNI', 'rolinsanjaya@gmail.com', NULL, '$2y$10$aXb/zQyBoJZ5chSfrRmLtOCy5Zt2QVFxABVo1jgAgI.nfz03FRGQW', NULL, '2021-12-28 18:34:29', '2021-12-28 19:16:41'),
(12, 'Joko', 'MAHASISWA', 'joko@gmail.com', NULL, '$2y$10$Ld5ejgO9VVnKSoMI0jbVv.T8on4oVQw9WfOZ0qXpbce83fnyj8Bgy', NULL, '2021-12-28 19:08:19', '2021-12-28 19:08:19'),
(13, 'syadam aidil', 'MAHASISWA', 'syadam@gmail.com', NULL, '$2y$10$lR2gwSy4imcJwSdTnm/6/OyReNCp/T3DdeMLeMmLA46ueONOKKBK2', NULL, '2021-12-28 19:30:50', '2021-12-28 19:30:50'),
(14, 'Rasya', 'MAHASISWA', 'Rasya@gmail.com', NULL, '$2y$10$XlS59F3Tcvw7qFPE/B9OGub3UGaHHnBqKBy1Td.Ct1EL6mtKF8hr6', NULL, '2021-12-28 20:28:19', '2021-12-28 20:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `yudisia`
--

CREATE TABLE `yudisia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipk` double(3,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yudisia`
--

INSERT INTO `yudisia` (`id`, `user_id`, `npm`, `nama`, `prodi`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `nama_ayah`, `nama_ibu`, `masa_studi`, `umur`, `pas_photo`, `ipk`, `created_at`, `updated_at`) VALUES
(1, 11, 'G1A019099', 'Rolin Sanjaya Tamba', 'Pendidikan Dokter', 'Jakarta', '2021-12-09', 'Desa Pasar Semerap', '0842342532', 'James', 'Irdaniahh', '3 Tahun 8 Bulan 10 hari', '20 Tahun', 'img_61cbbbb015a273.14261601.png', 3.85, '2021-12-28 18:36:48', '2021-12-28 18:36:48'),
(2, 12, 'G1A019100', 'Joko', 'Akuntansi', 'Bengkulu', '2003-06-17', 'Gang Juwita', '8117482512', 'Kim', 'Irdaniahh', '3 Tahun 8 Bulan 10 hari', '20 Tahun', 'img_61cbc4146b3b77.51813990.png', 3.75, '2021-12-28 19:12:36', '2021-12-28 19:12:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnis_user_id_foreign` (`user_id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kejuaraans`
--
ALTER TABLE `kejuaraans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kejuaraans_user_id_foreign` (`user_id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasis`
--
ALTER TABLE `organisasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisasis_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihans_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prestasi_mahasiswas`
--
ALTER TABLE `prestasi_mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasi_mahasiswas_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yudisia`
--
ALTER TABLE `yudisia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yudisia_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kejuaraans`
--
ALTER TABLE `kejuaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `organisasis`
--
ALTER TABLE `organisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi_mahasiswas`
--
ALTER TABLE `prestasi_mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `yudisia`
--
ALTER TABLE `yudisia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD CONSTRAINT `alumnis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kejuaraans`
--
ALTER TABLE `kejuaraans`
  ADD CONSTRAINT `kejuaraans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `organisasis`
--
ALTER TABLE `organisasis`
  ADD CONSTRAINT `organisasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD CONSTRAINT `pelatihans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `prestasi_mahasiswas`
--
ALTER TABLE `prestasi_mahasiswas`
  ADD CONSTRAINT `prestasi_mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `yudisia`
--
ALTER TABLE `yudisia`
  ADD CONSTRAINT `yudisia_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
