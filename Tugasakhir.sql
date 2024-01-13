-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 13, 2022 at 05:28 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_penduduk`
--

CREATE TABLE `chart_penduduk` (
  `id` bigint(11) NOT NULL,
  `ket` varchar(30) NOT NULL,
  `jumlah` int(150) NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_penduduk`
--

INSERT INTO `chart_penduduk` (`id`, `ket`, `jumlah`, `tahun`) VALUES
(1, 'penduduk', 1, '2021'),
(2, 'penduduk', 2, '2022'),
(3, 'penduduk', 0, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `chart_penduduk1`
--

CREATE TABLE `chart_penduduk1` (
  `id` bigint(11) NOT NULL,
  `ket` varchar(30) DEFAULT NULL,
  `ket1` varchar(50) DEFAULT NULL,
  `jumlah` int(150) DEFAULT NULL,
  `label` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_penduduk1`
--

INSERT INTO `chart_penduduk1` (`id`, `ket`, `ket1`, `jumlah`, `label`) VALUES
(1, 'asli', NULL, 1, 'Asli'),
(2, NULL, 'pendatang', 2, 'Pendatang');

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
-- Table structure for table `master_agama`
--

CREATE TABLE `master_agama` (
  `kode_agama` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_agama`
--

INSERT INTO `master_agama` (`kode_agama`, `agama`, `created_at`, `updated_at`, `id`) VALUES
('AG0001', 'hindu', '03/03/2022', '03/03/2022', 1),
('AG0002', 'islam', '03/03/2022', '03/03/2022', 2),
('AG0003', 'protestan', '03/03/2022', '03/03/2022', 3),
('AG0004', 'katolik', '03/03/2022', '03/03/2022', 4),
('AG0005', 'buddha', '03/03/2022', '03/03/2022', 5),
('AG0006', 'khonghucu', '03/03/2022', '03/03/2022', 6);

-- --------------------------------------------------------

--
-- Table structure for table `master_banjar`
--

CREATE TABLE `master_banjar` (
  `id` int(11) NOT NULL,
  `kode_banjar` varchar(100) NOT NULL,
  `nama_banjar` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `id_register` varchar(50) DEFAULT NULL,
  `nama_kelian` varchar(255) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_banjar`
--

INSERT INTO `master_banjar` (`id`, `kode_banjar`, `nama_banjar`, `alamat`, `nik`, `id_register`, `nama_kelian`, `created_at`, `updated_at`) VALUES
(1, 'B0001', 'Pengeragoan Dauh Tukad', 'jln.test', '898978733', NULL, 'Kadek Satria Kantra Wibawa', '03/03/2022', '03/03/2022'),
(2, 'B0002', 'Pengeragoan Dangin Tukad', 'jln.test', '26267672762', NULL, 'Gde Adi Baskara', '03/03/2022', '03/03/2022'),
(3, 'B0003', 'Badingkayu', 'jln.test', '1234567890123456', NULL, 'Ni Luh Wulandari', '03/03/2022', '03/03/2022'),
(4, 'B0004', 'Mengenuanyar', 'jln.test', '0006778997', NULL, 'Kadek Surya Saputra', '03/03/2022', '03/03/2022'),
(5, 'B0005', 'Pasut', 'jln.test', '123456789876543', NULL, 'Kadek Arya Kantra', '03/03/2022', '03/03/2022');

-- --------------------------------------------------------

--
-- Table structure for table `master_surat`
--

CREATE TABLE `master_surat` (
  `id` int(11) NOT NULL,
  `kode_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tgl_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `konfirmasi` text COLLATE utf8mb4_unicode_ci,
  `foto_ktp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_permohonan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT '1',
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL
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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_01_29_142752_add_username_to_users_table', 1),
(12, '2022_01_30_035653_create_register_table', 1),
(13, '2022_01_30_042251_create_role_table', 1),
(16, '2022_01_30_035653_create_pengajuan_table', 2);

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
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tgl_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `konfirmasi` text COLLATE utf8mb4_unicode_ci,
  `foto_ktp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_permohonan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT '1',
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` int(11) DEFAULT '1',
  `alert` int(11) NOT NULL DEFAULT '1',
  `alert1` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id`, `kode_surat`, `jenis_surat`, `id_register`, `nik`, `no_kk`, `nama`, `kepala_keluarga`, `tgl_lahir`, `tempat_lahir`, `gender`, `agama`, `status_perkawinan`, `pekerjaan`, `desa`, `rt`, `rw`, `kode_pos`, `kec`, `kota`, `kab`, `provinsi`, `negara`, `alamat`, `tgl_surat`, `keterangan`, `konfirmasi`, `foto_ktp`, `foto_kk`, `jenis_permohonan`, `value`, `created_at`, `updated_at`, `jenis`, `alert`, `alert1`) VALUES
(0, '0000', NULL, NULL, '0', 'null', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `no` int(11) NOT NULL,
  `id_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banjar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) NOT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pernikahan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sarjana` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masyarakat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`no`, `id_register`, `nik`, `no_kk`, `nama`, `tgl_lahir`, `gender`, `alamat`, `banjar`, `desa`, `kec`, `kab`, `provinsi`, `negara`, `keterangan`, `value`, `created_at`, `updated_at`, `status_pernikahan`, `agama`, `tempat_lahir`, `pekerjaan`, `pendidikan`, `sarjana`, `masyarakat`, `tahun`) VALUES
(2, 'MSY0002', '26267672762', '00028772872', 'Gde Adi Baskara', '2022-02-04', 'Laki-laki', 'jln.test', 'Pengeragoan Dangin Tukad', 'Pengeragoan', 'Pekutatan', 'Jembarana', 'Bali', 'Indonesa', NULL, 1, '26-02-2022', '2022-03-28', 'belum menikah', 'hindu', 'darmasaba', 'swasta', 'SD', NULL, 'asli', '2021'),
(3, 'MSY0003', '5103045713030005', '0000045713030005', 'Ni Luh Wulandari', '2022-03-19', 'Perempuan', 'Jln. Padangsambian Kelod, No.23, Denpasar', 'Pengeragoan Dauh Tukad', 'Pengeragoan', 'Pekutatan', 'Jembarana', 'Bali', 'Indonesia', NULL, 1, '2022-03-19', '2022-03-27', 'Belum Menikah', 'Hindu', 'Darmasaba', 'pelajar', 'S1', NULL, 'pendatang', '2022'),
(4, 'MSY0004', '990001893873', '878467674761', 'Wahyu Putra Pratama', '2022-03-27', 'Laki-laki', 'Jln. Padangsambian Kelod, No.23, Denpasar', 'Pengeragoan Dauh Tukad', 'Pengeragoan', 'Pekutatan', 'Jembarana', 'Bali', 'Indonesia', NULL, 1, '2022-03-27', '2022-04-02', 'Belum Menikah', 'Hindu', 'Darmasaba', 'Swasta', 'S2', NULL, 'pendatang', '2022');

--
-- Triggers `register`
--
DELIMITER $$
CREATE TRIGGER `perhitungan_chart` BEFORE INSERT ON `register` FOR EACH ROW UPDATE chart_penduduk SET chart_penduduk.ket = 'penduduk',
    chart_penduduk.jumlah = chart_penduduk.jumlah + 1 
    WHERE chart_penduduk.tahun = NEW.tahun
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah` BEFORE INSERT ON `register` FOR EACH ROW UPDATE chart_penduduk1 SET chart_penduduk1.ket = 'asli',
    chart_penduduk1.jumlah = chart_penduduk1.jumlah + 1 
      WHERE chart_penduduk1.ket = NEW.masyarakat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah1` BEFORE INSERT ON `register` FOR EACH ROW UPDATE chart_penduduk1 SET chart_penduduk1.ket1 = 'pendatang',
    chart_penduduk1.jumlah = chart_penduduk1.jumlah + 1 
      WHERE chart_penduduk1.ket1 = NEW.masyarakat
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_permohonan`
--

CREATE TABLE `surat_permohonan` (
  `id_surat` bigint(20) UNSIGNED NOT NULL,
  `kode_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tgl_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `konfirmasi` text COLLATE utf8mb4_unicode_ci,
  `foto_ktp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_permohonan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` int(11) DEFAULT '2',
  `alert` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_permohonan`
--

INSERT INTO `surat_permohonan` (`id_surat`, `kode_surat`, `jenis_surat`, `id_register`, `nik`, `no_kk`, `nama`, `kepala_keluarga`, `tgl_lahir`, `tempat_lahir`, `gender`, `agama`, `status_perkawinan`, `pekerjaan`, `desa`, `rt`, `rw`, `kode_pos`, `kec`, `kota`, `kab`, `provinsi`, `negara`, `alamat`, `tgl_surat`, `keterangan`, `konfirmasi`, `foto_ktp`, `foto_kk`, `jenis_permohonan`, `value`, `created_at`, `updated_at`, `jenis`, `alert`) VALUES
(0, '0000', NULL, NULL, '0000', '00000', 'nulll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'pegawai', NULL, NULL),
(3, 'masyarakat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `no` int(11) DEFAULT NULL,
  `kode_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_register` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `no`, `kode_user`, `nik`, `nama`, `password`, `role`, `id_register`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 'A0001', '26267672762', 'Gde Adi Baskara', '$2y$10$JWbeViCmryr1rOSDatRobeDgyEfmv6ky5F/JW1UDkkZrpwv3oMKfi', 'admin', 'MSY0002', NULL, '27-03-2022', '27-03-2022', 'admin'),
(14, 2, 'P0002', '5103045713030005', 'Ni Luh Wulandari', '$2y$10$yjCIngWsxDnaER5FfhVQ4uzmGnhhCUNOMI4swLPnVAP63lnplJEYK', 'pegawai', 'MSY0003', NULL, '2022-03-19', '2022-03-27', 'pegawai'),
(15, 3, 'M0003', '26267672762', 'Gde Adi Baskara', '$2y$10$/LsLNU8AiGwuPXKOwEW36ONUgrUYnKKpcpKWMDaU7wqWEio6lo1t2', 'masyarakat', 'MSY0002', NULL, '27-03-2022', '27-03-2022', 'baskara'),
(21, 4, 'M0004', '990001893873', 'Wahyu Putra Pratama', '$2y$10$ancfyt7swLXb6kY/4pPKKOfjRbs9n2gqvCWdHNrttSFf.Cqa5cPp6', 'masyarakat', 'MSY0004', NULL, '02-04-2022', '02-04-2022', 'wahyu'),
(24, 5, 'M0005', '5103045713030005', 'Ni Luh Wulandari', '$2y$10$44cw2CTxlvaQ81ktV.2NJeg/.ls089NkYC433//vcer0F8B815emy', 'masyarakat', 'MSY0003', NULL, '02-04-2022', '02-04-2022', 'wulan1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_penduduk`
--
ALTER TABLE `chart_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_penduduk1`
--
ALTER TABLE `chart_penduduk1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `master_agama`
--
ALTER TABLE `master_agama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agama` (`agama`),
  ADD KEY `kode_agama` (`kode_agama`);

--
-- Indexes for table `master_banjar`
--
ALTER TABLE `master_banjar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_banjar` (`kode_banjar`),
  ADD KEY `nama_banjar` (`nama_banjar`);

--
-- Indexes for table `master_surat`
--
ALTER TABLE `master_surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_surat` (`kode_surat`),
  ADD KEY `id_register` (`id_register`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_kk` (`no_kk`);

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
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `kode_surat` (`kode_surat`),
  ADD KEY `id_register` (`id_register`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `nik` (`nik`),
  ADD KEY `banjar` (`banjar`),
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `agama` (`agama`);

--
-- Indexes for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_register` (`id_register`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `relation` (`role`),
  ADD KEY `kode_user` (`kode_user`),
  ADD KEY `id_register` (`id_register`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart_penduduk`
--
ALTER TABLE `chart_penduduk`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chart_penduduk1`
--
ALTER TABLE `chart_penduduk1`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_surat`
--
ALTER TABLE `master_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD CONSTRAINT `koneksi` FOREIGN KEY (`id_register`) REFERENCES `register` (`id_register`);

--
-- Constraints for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD CONSTRAINT `relasi1` FOREIGN KEY (`id_register`) REFERENCES `register` (`id_register`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `koneksi2` FOREIGN KEY (`id_register`) REFERENCES `register` (`id_register`),
  ADD CONSTRAINT `relation` FOREIGN KEY (`role`) REFERENCES `tb_level` (`level`),
  ADD CONSTRAINT `relation1` FOREIGN KEY (`nik`) REFERENCES `register` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
