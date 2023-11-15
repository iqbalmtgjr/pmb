-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2023 at 05:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya_kuliah_pmb`
--

CREATE TABLE `biaya_kuliah_pmb` (
  `id_biayakuliahpmb` int NOT NULL,
  `item_biaya` varchar(100) NOT NULL,
  `prestasi_biaya` int NOT NULL,
  `test_biaya` int NOT NULL,
  `reguler2_biaya` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_kuliah_pmb`
--

INSERT INTO `biaya_kuliah_pmb` (`id_biayakuliahpmb`, `item_biaya`, `prestasi_biaya`, `test_biaya`, `reguler2_biaya`) VALUES
(1, 'Registrasi Mahasiswa Baru', 1580000, 1580000, 1580000),
(2, 'Pengembangan Kampus', 3600000, 3600000, 3600000),
(3, 'SPP Tetap / Semester', 2320000, 2320000, 2320000),
(4, 'SKS per Semester', 65000, 65000, 200000),
(5, 'Pendaftaran Calon Maba', 200000, 250000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `id_bukti_bayar` int NOT NULL,
  `akunb_msiswa` varchar(225) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `bank_pengirim` varchar(50) NOT NULL,
  `tgl_trans` varchar(20) NOT NULL,
  `jam_trans` varchar(20) NOT NULL,
  `nomor_refe` varchar(225) NOT NULL,
  `jlh_bayar` int NOT NULL,
  `bukti_bayar` varchar(225) NOT NULL,
  `validasi_bukti` int NOT NULL,
  `tgl_validbukti` varchar(50) NOT NULL,
  `yg_validasi` varchar(10) NOT NULL,
  `konfirm_bauk` int NOT NULL,
  `yg_validasibauk` varchar(50) NOT NULL,
  `tgl_konfirmbauk` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint NOT NULL,
  `captcha_time` int NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL,
  `file` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`, `file`) VALUES
(258641, 1700013970, '207.46.13.36', '7789', '1700013970.3106.jpg'),
(258635, 1700013071, '180.242.215.77', '1609', '1700013071.4934.jpg'),
(258636, 1700013089, '180.242.215.77', '0880', '1700013088.7515.jpg'),
(258640, 1700013850, '153.92.9.20', '5595', '1700013850.4576.jpg'),
(258639, 1700013849, '153.92.9.20', '1351', '1700013848.8756.jpg'),
(258638, 1700013849, '153.92.9.20', '6376', '1700013848.5907.jpg'),
(258637, 1700013846, '153.92.9.20', '8555', '1700013845.7952.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_rinci`
--

CREATE TABLE `pembayaran_rinci` (
  `id_pembayaran_rinci` int NOT NULL,
  `bukti_id_bayar` int NOT NULL,
  `tanggal_rinci` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `akun_pembayaran` varchar(225) NOT NULL,
  `jenis_bayar_rinci` int NOT NULL,
  `user_id_rinci` varchar(225) NOT NULL,
  `jumlah_rinci` int NOT NULL,
  `semester_rinci` int NOT NULL,
  `smt_nama` varchar(20) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int NOT NULL,
  `kode_penerimaan` varchar(11) NOT NULL,
  `keputusan_text` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `kode_penerimaan`, `keputusan_text`) VALUES
(1, '', 'Pending'),
(2, '1', 'LULUS'),
(3, '2', 'TIDAK LULUS');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int NOT NULL,
  `unit_pengguna` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `last_login` int DEFAULT NULL,
  `apli` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `unit_pengguna`, `email`, `nama`, `password`, `pangkat`, `status`, `foto`, `last_login`, `apli`) VALUES
(39, 28, 'yopinusbobi@gmail.com', 'Boby', '$2y$10$sdzFMcKKEuWNMdAedzUko.MNScEkVaQwKRcl5B.7WJ1sk5TPzQfU6', 'admin', '0', 'd87ef4ba1b6d9ab84c39b5fab3299dc6.png', 1664331670, 'pmb'),
(45, 18, 'thesariopan@gmail.com', 'Herpanus', '$2y$10$pJ8VWn8oZCBiuT1/JTzc9O9kTl.6C5.g5h45Ynj.Wy/Jys/evxIk2', 'admin', '0', '1e5a4750cbb80053b2fa86d5e9c3bc52.jpg', 1697208937, 'pmb'),
(47, 22, 'adrianagandasari@gmail.com', 'Adriana Gandasari', '$2y$10$Y6JWsqamjQAi5as0iJsfoe8qkwD/ob83kt34NBxwyl90MLY8dx07O', 'admin', '0', '', 1690348961, 'pmb'),
(49, 15, 'humasit@gmail.com', 'Elly', '$2y$10$pl1gnABH8h.3o0yXup4f1ukjlhzZcW9ySPyS5Ov9pKNgCK7LDpkJ.', 'admin', '0', '', 1700013088, 'pmb'),
(54, 15, 'tameniatamenia@gmail.com', 'Tame', '$2y$10$lvORTFLp1jOcVZO/Oz3R9ecxejgP.c1fDlQ0RZkyFiGtn5ZB2OF3i', 'user', '0', '', 1700011198, 'pmb'),
(51, 29, 'pmbbaa@gmail.com', 'Tuti', '$2y$10$F0P1fNpWOkimI0kuza5VZu5mPhxTVRrH1Z0H.9KGOvVQiSE6aGqze', 'user', '0', '', 1672907012, 'pmb'),
(46, 15, 'iqbalmtgjr@gmail.com', 'Muhammad Iqbal', '$2y$10$8M/hgXDnFFQRwWuWj8R7ueNZoo6PEdkzXmr.C.D5N0cElkiWRn6n.', 'admin', '0', '', 1692844990, 'pmb'),
(53, 29, 'kirrigakure@gmail.com', 'Alexsius Tri Dirmanto', '$2y$10$ROD1gOjLSKZAEbFEY1d.9.vNi8tZ.CW08cTsIoMc7p0kR4cL6Vf1C', 'admin', '0', '', 1699923360, 'pmb');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pkkmb`
--

CREATE TABLE `pkkmb` (
  `id` int NOT NULL,
  `no_daftar` int NOT NULL,
  `pengenal_akun_pkkmb` varchar(100) NOT NULL,
  `kab_siswa` varchar(100) NOT NULL,
  `prov_siswa` varchar(100) NOT NULL,
  `ig_siswa` varchar(20) NOT NULL,
  `fb_siswa` varchar(20) NOT NULL,
  `tiktok_siswa` varchar(20) NOT NULL,
  `tahun_pmb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_akun`
--

CREATE TABLE `pmb_akun` (
  `id_akun_siswa` int NOT NULL,
  `pengenal_akun` varchar(100) NOT NULL,
  `email_akun_siswa` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kunci_akun_siswa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_akun` int NOT NULL,
  `last_login_siswa` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_ip_daftar` varchar(45) NOT NULL,
  `alamat_ip_login` varchar(45) DEFAULT NULL,
  `daftar_akun` int NOT NULL,
  `gelombang` int NOT NULL,
  `ujian` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kuncigudang` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb_akun`
--

INSERT INTO `pmb_akun` (`id_akun_siswa`, `pengenal_akun`, `email_akun_siswa`, `kunci_akun_siswa`, `status_akun`, `last_login_siswa`, `alamat_ip_daftar`, `alamat_ip_login`, `daftar_akun`, `gelombang`, `ujian`, `kuncigudang`) VALUES
(1, 'ivtoRYOnHU1lR2Hcj6Y5', 'iqbalmtgjr@gmail.com', '$2y$12$6.IbYunrnA1L6FerDbiHRu.FpQySE0FzSp12zm9x2fz8reYXF3Le.', 0, NULL, '127.0.0.1', NULL, 1700058200, 1, NULL, '916466');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_info`
--

CREATE TABLE `pmb_info` (
  `id_info` int NOT NULL,
  `info_siswa_akun` varchar(100) NOT NULL,
  `nama_informan` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `media_info` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_jadwal`
--

CREATE TABLE `pmb_jadwal` (
  `id_pmb_jadwal` int NOT NULL,
  `daftar_buka` varchar(100) NOT NULL,
  `pres_mum1` varchar(100) NOT NULL,
  `pres_mum2` varchar(100) NOT NULL,
  `tes_lak` varchar(100) NOT NULL,
  `tes_mum` varchar(100) NOT NULL,
  `regi` varchar(100) NOT NULL,
  `reguler` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb_jadwal`
--

INSERT INTO `pmb_jadwal` (`id_pmb_jadwal`, `daftar_buka`, `pres_mum1`, `pres_mum2`, `tes_lak`, `tes_mum`, `regi`, `reguler`) VALUES
(1, '1 Desember 2023 - 30 Maret 2024', '4 April 2024', '-', '1 - 8 April 2024', '10 April 2024', '11 - 25 April 2024', ''),
(2, '1 April- 29 Juni 2024', '15 Mei 2024', '11 Juli 2024', '1 - 8 Juli 2024', '11 Juli 2024', '12 - 26 Juli 2024', ''),
(3, '1 Juli - 24 Agustus 2024', '31 Juli 2024', '30 Agustus 2024', '26 - 29 Agustus 2024', '30 Agustus 2024', '31 Agustus - 7 September 2024', ''),
(4, '1 Desember 2023 - 17 Agustus 2024', '18 - 21 Agustus 2024', '23 Agustus 2024', '', '', '24 Agustus - 7 September 2024', '');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_ortu`
--

CREATE TABLE `pmb_ortu` (
  `id_ortu` int NOT NULL,
  `ortu_pengenal_siswa` varchar(100) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `tmp_lahir_ayah` varchar(50) NOT NULL,
  `tgl_lahir_ayah` varchar(20) NOT NULL,
  `alamat_ayah` varchar(225) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pendidikan_ayah` varchar(11) NOT NULL,
  `hp_ayah` varchar(20) NOT NULL,
  `npwp_ayah` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tmp_lahir_ibu` varchar(50) NOT NULL,
  `tgl_lahir_ibu` varchar(20) NOT NULL,
  `alamat_ibu` varchar(225) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `pendidikan_ibu` varchar(11) NOT NULL,
  `hp_ibu` varchar(20) NOT NULL,
  `npwp_ibu` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_penerimaan`
--

CREATE TABLE `pmb_penerimaan` (
  `id_penerimaan` int NOT NULL,
  `siswa_penerimaan` varchar(225) NOT NULL,
  `status_penerimaan` varchar(225) NOT NULL,
  `note_penerimaan` text NOT NULL,
  `prodi_penerimaan` varchar(5) NOT NULL,
  `umumkan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_prodi`
--

CREATE TABLE `pmb_prodi` (
  `id_prodi_pmb` int NOT NULL,
  `prodi_id_siswa` varchar(100) NOT NULL,
  `pilihan_satu` int NOT NULL,
  `pilihan_dua` int NOT NULL,
  `pembayaran` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jalur` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb_prodi`
--

INSERT INTO `pmb_prodi` (`id_prodi_pmb`, `prodi_id_siswa`, `pilihan_satu`, `pilihan_dua`, `pembayaran`, `jalur`) VALUES
(4, 'ivtoRYOnHU1lR2Hcj6Y5', 2, 4, NULL, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_sekolah`
--

CREATE TABLE `pmb_sekolah` (
  `id_sekolah` int NOT NULL,
  `sekolah_id_siswa` varchar(100) NOT NULL,
  `jenis_sekolah` varchar(10) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(225) NOT NULL,
  `jurusan_sekolah` varchar(20) NOT NULL,
  `tahun_lulus_sekolah` int NOT NULL,
  `skhun_sekolah` varchar(100) NOT NULL,
  `ijasah_sekolah` varchar(100) NOT NULL,
  `nilai_satu` varchar(10) NOT NULL,
  `nilai_dua` varchar(10) NOT NULL,
  `nilai_tiga` varchar(10) NOT NULL,
  `nilai_empat` varchar(10) NOT NULL,
  `nilai_lima` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_siswa`
--

CREATE TABLE `pmb_siswa` (
  `id_siswa` int NOT NULL,
  `akun_siswa` varchar(100) NOT NULL,
  `metode_bayar` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `valid_bayar` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ref` bigint NOT NULL,
  `nik_siswa` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nis_siswa` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tmp_lahir_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tgl_lahir_siswa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jekel_siswa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `agama_siswa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_siswa` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `dusun_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rtrw_siswa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `desa_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kec_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pos_siswa` int DEFAULT NULL,
  `hp_siswa` varchar(50) NOT NULL,
  `jenis_tiggal_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `transpot_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kps_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb_siswa`
--

INSERT INTO `pmb_siswa` (`id_siswa`, `akun_siswa`, `metode_bayar`, `valid_bayar`, `ref`, `nik_siswa`, `nis_siswa`, `nama_siswa`, `tmp_lahir_siswa`, `tgl_lahir_siswa`, `jekel_siswa`, `agama_siswa`, `alamat_siswa`, `dusun_siswa`, `rtrw_siswa`, `desa_siswa`, `kec_siswa`, `pos_siswa`, `hp_siswa`, `jenis_tiggal_siswa`, `transpot_siswa`, `kps_siswa`) VALUES
(4, 'ivtoRYOnHU1lR2Hcj6Y5', NULL, NULL, 311107, NULL, '123123', 'Muhammad Iqbal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08996979079', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pmb_sms`
--

CREATE TABLE `pmb_sms` (
  `id_sms` int NOT NULL,
  `jumlah_sms` int NOT NULL,
  `tgl_sms` varchar(30) NOT NULL,
  `jam_sms` varchar(30) NOT NULL,
  `ref_sms` varchar(50) NOT NULL,
  `akun_sms` varchar(225) NOT NULL,
  `id_buktibayar` varchar(20) NOT NULL,
  `created_sms` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_transaksi`
--

CREATE TABLE `pmb_transaksi` (
  `order_id` char(20) NOT NULL,
  `akun_siswa_tran` varchar(100) NOT NULL,
  `gross_amount` int NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `status_code` char(3) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va_number` varchar(50) NOT NULL,
  `pdf_url` text NOT NULL,
  `payment_code` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_upload`
--

CREATE TABLE `pmb_upload` (
  `id_upload` int NOT NULL,
  `upload_id_siswa` varchar(100) NOT NULL,
  `foto_upload` varchar(225) NOT NULL,
  `ijasah_upload` varchar(225) NOT NULL,
  `skhu_upload` varchar(225) NOT NULL,
  `skkb_upload` varchar(225) NOT NULL,
  `skck_upload` varchar(250) NOT NULL,
  `kk_upload` varchar(225) NOT NULL,
  `akta_lahir_upload` varchar(225) NOT NULL,
  `ktp_upload` varchar(225) NOT NULL,
  `ket_lulus_upload` varchar(225) NOT NULL,
  `pembayaran_upload` varchar(225) NOT NULL,
  `semes_satu` varchar(225) NOT NULL,
  `semes_dua` varchar(225) NOT NULL,
  `semes_tiga` varchar(225) NOT NULL,
  `semes_empat` varchar(225) NOT NULL,
  `semes_lima` varchar(225) NOT NULL,
  `piagam` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_wali`
--

CREATE TABLE `pmb_wali` (
  `id_wali` int NOT NULL,
  `wali_akun_siswa` varchar(100) NOT NULL,
  `nik_wali` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `tmp_lahir_wali` varchar(50) NOT NULL,
  `tgl_lahir_wali` varchar(20) NOT NULL,
  `alamat_wali` text NOT NULL,
  `kerja_wali` varchar(50) NOT NULL,
  `hp_wali` varchar(20) NOT NULL,
  `npwp_wali` varchar(50) NOT NULL,
  `penghasil_wali` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `id_prodi_baru` int NOT NULL,
  `nama_prodi_baru` varchar(100) NOT NULL,
  `akronim_baru` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id_prodi_baru`, `nama_prodi_baru`, `akronim_baru`) VALUES
(1, 'Pendidikan Bahasa dan Sastra Indonesia', 'PBSI'),
(2, 'Pendidikan Matematika', 'PMAT'),
(3, 'Pendidikan Ekonomi', 'PEK'),
(4, 'Pendidikan Pancasila dan Kewarganegaraan', 'PKN'),
(5, 'Pendidikan Komputer', 'PKOM'),
(6, 'Pendidikan Biologi', 'PBIO'),
(7, 'Pendidikan Anak Usia Dini', 'PAUD'),
(8, 'Pendidikan Bahasa Inggris', 'PBI'),
(9, 'Pendidikan Guru Sekolah Dasar', 'PGSD');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `akronim` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `akronim`) VALUES
(1, 'Pendidikan Bahasa dan Sastra Indonesia', 'PBSI'),
(2, 'Pendidikan Matematika', 'PMAT'),
(3, 'Pendidikan Ekonomi', 'PEK'),
(4, 'Pendidikan Pancasila dan Kewarganegaraan', 'PKN'),
(5, 'Pendidikan Komputer', 'PKOM'),
(6, 'Pendidikan Biologi', 'PBIO'),
(7, 'Pendidikan Anak Usia Dini', 'PAUD'),
(8, 'Pendidikan Bahasa Inggris', 'PBI'),
(9, 'Pendidikan Guru Sekolah Dasar', 'PGSD');

-- --------------------------------------------------------

--
-- Table structure for table `prodlulus`
--

CREATE TABLE `prodlulus` (
  `id_prodi_lulus` int NOT NULL,
  `lulus_prodi` varchar(100) NOT NULL,
  `akronim_lulus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int NOT NULL,
  `unit` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `singkatan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ruangan` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit`, `singkatan`, `ruangan`) VALUES
(15, 'UPT Humas dan IT', 'it', 'Gedung A1'),
(17, 'Kewirausahaan', 'usaha', 'Gedung A1'),
(18, 'Wakil Ketua 2 STKIP', 'waka2', 'Gedung A2'),
(19, 'Lembaga Pengawas Internal', 'lpi', 'Gedung A2'),
(22, 'Wakil Ketua 1 STKIP', 'waka1', 'Gedung A2'),
(23, 'LPM', 'lpm', 'Gedung A2'),
(24, 'LPPM', 'lppm', 'Gedung A2'),
(25, 'Lembaga Bahasa dan Budaya', 'lbb', 'Gedung A1'),
(26, 'Pusat Kerjasama dan Pengembangan', 'pkp', 'Gedung A1'),
(27, 'Koordinator Pangkalan Data', 'kpd', 'Gedung A2'),
(28, 'BAUK', 'bauk', 'Gedung A1'),
(29, 'BAA', 'baa', 'Gedung A2'),
(30, 'Bagian Kemahasiswaan dan Alumni', 'kemahasiswaan', 'Kemahasiswaan'),
(31, 'UPT Laboratorium', 'lab', 'Gedung E'),
(32, 'UPT Perpusatakaan', 'perpus', 'Gedung E'),
(33, 'Program Studi Biologi', 'pbio', 'Gedung E1'),
(34, 'Program Studi Pendidikan Bahasa dan Sastra Indonesia', 'pbsi', 'Gedung A1'),
(35, 'Program Studi Pendidikan Ekonomi', 'pe', 'Gedung A1'),
(36, 'Program Studi PKn', 'pkn', 'Gedung A1'),
(37, 'Program Studi PGSD', 'pgsd', 'Gedung ER'),
(38, 'Program Studi Pendidikan Bahasa Inggris', 'pbi', 'Gedung ER'),
(39, 'Program Studi PG-PAUD', 'paud', 'Gedung ER'),
(40, 'Program Studi Pendidikan Matematika', 'pspm', 'Gedung A1'),
(41, 'Program Studi Pendidikan Komputer', 'pspk', 'Gedung E1'),
(42, 'Koordinator Keamanan', 'koke', 'Keamanan'),
(43, 'Pengurus dan Pengawas PBPKB', 'PBPKB', 'Gedung A2'),
(44, 'Ketua STKIP Persada Khatulistiwa', 'KET', 'Gedung A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Iqbal', 'iqbalmtgjr@gmail.com', NULL, '$2y$12$6.IbYunrnA1L6FerDbiHRu.FpQySE0FzSp12zm9x2fz8reYXF3Le.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya_kuliah_pmb`
--
ALTER TABLE `biaya_kuliah_pmb`
  ADD PRIMARY KEY (`id_biayakuliahpmb`);

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`id_bukti_bayar`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_rinci`
--
ALTER TABLE `pembayaran_rinci`
  ADD PRIMARY KEY (`id_pembayaran_rinci`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pkkmb`
--
ALTER TABLE `pkkmb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `pmb_akun`
--
ALTER TABLE `pmb_akun`
  ADD PRIMARY KEY (`id_akun_siswa`);

--
-- Indexes for table `pmb_info`
--
ALTER TABLE `pmb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `pmb_jadwal`
--
ALTER TABLE `pmb_jadwal`
  ADD PRIMARY KEY (`id_pmb_jadwal`);

--
-- Indexes for table `pmb_ortu`
--
ALTER TABLE `pmb_ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `pmb_penerimaan`
--
ALTER TABLE `pmb_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `pmb_prodi`
--
ALTER TABLE `pmb_prodi`
  ADD PRIMARY KEY (`id_prodi_pmb`);

--
-- Indexes for table `pmb_sekolah`
--
ALTER TABLE `pmb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `pmb_siswa`
--
ALTER TABLE `pmb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `pmb_sms`
--
ALTER TABLE `pmb_sms`
  ADD PRIMARY KEY (`id_sms`);

--
-- Indexes for table `pmb_transaksi`
--
ALTER TABLE `pmb_transaksi`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pmb_upload`
--
ALTER TABLE `pmb_upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `pmb_wali`
--
ALTER TABLE `pmb_wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id_prodi_baru`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `prodlulus`
--
ALTER TABLE `prodlulus`
  ADD PRIMARY KEY (`id_prodi_lulus`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

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
-- AUTO_INCREMENT for table `biaya_kuliah_pmb`
--
ALTER TABLE `biaya_kuliah_pmb`
  MODIFY `id_biayakuliahpmb` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  MODIFY `id_bukti_bayar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258642;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran_rinci`
--
ALTER TABLE `pembayaran_rinci`
  MODIFY `id_pembayaran_rinci` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pkkmb`
--
ALTER TABLE `pkkmb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmb_akun`
--
ALTER TABLE `pmb_akun`
  MODIFY `id_akun_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmb_info`
--
ALTER TABLE `pmb_info`
  MODIFY `id_info` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmb_jadwal`
--
ALTER TABLE `pmb_jadwal`
  MODIFY `id_pmb_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pmb_ortu`
--
ALTER TABLE `pmb_ortu`
  MODIFY `id_ortu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmb_penerimaan`
--
ALTER TABLE `pmb_penerimaan`
  MODIFY `id_penerimaan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmb_prodi`
--
ALTER TABLE `pmb_prodi`
  MODIFY `id_prodi_pmb` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pmb_sekolah`
--
ALTER TABLE `pmb_sekolah`
  MODIFY `id_sekolah` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmb_siswa`
--
ALTER TABLE `pmb_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pmb_sms`
--
ALTER TABLE `pmb_sms`
  MODIFY `id_sms` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmb_upload`
--
ALTER TABLE `pmb_upload`
  MODIFY `id_upload` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmb_wali`
--
ALTER TABLE `pmb_wali`
  MODIFY `id_wali` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id_prodi_baru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodlulus`
--
ALTER TABLE `prodlulus`
  MODIFY `id_prodi_lulus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
