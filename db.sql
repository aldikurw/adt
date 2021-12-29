-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 09:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `id_admin` int(11) NOT NULL,
                         `username` varchar(100) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
    (1, 'aldi', 'aldi', 'Aldi Kurniawan');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
                          `id_alamat` int(11) NOT NULL,
                          `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `nama`) VALUES
                                               (1, 'Sugihwaras'),
                                               (2, 'Pojok'),
                                               (3, 'Gajah');

-- --------------------------------------------------------

--
-- Table structure for table `calon_pelanggan`
--

CREATE TABLE `calon_pelanggan` (
                                   `id_calon_pelanggan` int(11) NOT NULL,
                                   `nama` varchar(100) NOT NULL,
                                   `jenis_kelamin` varchar(1) NOT NULL,
                                   `nik` varchar(16) NOT NULL,
                                   `jenis_langganan` enum('Home','Voucher') NOT NULL,
                                   `id_paket_home_wifi` int(11) DEFAULT NULL,
                                   `id_alamat` int(11) DEFAULT NULL,
                                   `alamat_lain` varchar(100) DEFAULT NULL,
                                   `lat` float DEFAULT NULL,
                                   `lng` float DEFAULT NULL,
                                   `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_pelanggan_wifi`
--

CREATE TABLE `invoice_pelanggan_wifi` (
                                          `id_invoice_pelanggan_home` int(11) NOT NULL,
                                          `uuid` varchar(100) NOT NULL,
                                          `id_pelanggan_home` int(11) NOT NULL,
                                          `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL DEFAULT 'Lunas',
                                          `tanggal_pembayaran` datetime NOT NULL DEFAULT current_timestamp(),
                                          `keterangan` varchar(100) DEFAULT NULL,
                                          `tahun` int(11) NOT NULL,
                                          `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_pelanggan_wifi`
--

INSERT INTO `invoice_pelanggan_wifi` (`id_invoice_pelanggan_home`, `uuid`, `id_pelanggan_home`, `status_pembayaran`, `tanggal_pembayaran`, `keterangan`, `tahun`, `bulan`) VALUES
                                                                                                                                                                               (1, '27b76c53-3778-11ec-bd86-0242ac120004', 12, 'Belum Lunas', '0000-00-00 00:00:00', NULL, 2021, 11),
                                                                                                                                                                               (7, '650af2ae-3779-11ec-bd86-0242ac120004', 12, 'Belum Lunas', '0000-00-00 00:00:00', NULL, 2021, 12),
                                                                                                                                                                               (8, '5ea78dbf-37a0-11ec-bd86-0242ac120004', 13, 'Belum Lunas', '0000-00-00 00:00:00', NULL, 2021, 11),
                                                                                                                                                                               (9, 'cec09041-37b5-11ec-bd86-0242ac120004', 12, 'Lunas', '2021-10-28 13:10:53', NULL, 2021, 10),
                                                                                                                                                                               (10, 'd5235b4c-37b5-11ec-bd86-0242ac120004', 13, 'Lunas', '2021-10-28 13:11:04', NULL, 2021, 10),
                                                                                                                                                                               (11, '1d830757-37b7-11ec-bd86-0242ac120004', 15, 'Belum Lunas', '0000-00-00 00:00:00', NULL, 2021, 10),
                                                                                                                                                                               (12, '6559eb93-37fa-11ec-bd86-0242ac120004', 16, 'Lunas', '2021-10-28 21:21:52', NULL, 2021, 10);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_gangguan`
--

CREATE TABLE `laporan_gangguan` (
                                    `id_laporan_gangguan` int(11) NOT NULL,
                                    `id_pelanggan` int(11) NOT NULL,
                                    `waktu_gangguan` datetime NOT NULL,
                                    `keterangan` varchar(1000) NOT NULL,
                                    `waktu_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket_home_wifi`
--

CREATE TABLE `paket_home_wifi` (
                                   `id_paket_home_wifi` int(11) NOT NULL,
                                   `nama` varchar(50) NOT NULL,
                                   `kecepatan` varchar(100) NOT NULL,
                                   `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_home_wifi`
--

INSERT INTO `paket_home_wifi` (`id_paket_home_wifi`, `nama`, `kecepatan`, `harga`) VALUES
                                                                                       (1, 'Basic', '2M/2M', 125000),
                                                                                       (2, 'Plus', '5M/5M', 175000),
                                                                                       (3, 'Premium', '10M/10M', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `paket_voucher`
--

CREATE TABLE `paket_voucher` (
                                 `id_paket_voucher` int(11) NOT NULL,
                                 `nama` varchar(100) NOT NULL,
                                 `kecepatan` varchar(100) NOT NULL,
                                 `durasi` varchar(100) NOT NULL,
                                 `harga_beli` int(11) NOT NULL,
                                 `harga_jual` int(11) NOT NULL,
                                 `target_bonus` int(11) NOT NULL,
                                 `jumlah_bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_voucher`
--

INSERT INTO `paket_voucher` (`id_paket_voucher`, `nama`, `kecepatan`, `durasi`, `harga_beli`, `harga_jual`, `target_bonus`, `jumlah_bonus`) VALUES
                                                                                                                                                (1, 'Bronze', '1500k/1500k', '12h', 1500, 2000, 100, 10),
                                                                                                                                                (2, 'Silver', '1500k/1500k', '7d', 15000, 20000, 50, 5),
                                                                                                                                                (3, 'Gold', '1500k/1500k', '30d', 45000, 50000, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
                             `id_pelanggan` int(11) NOT NULL,
                             `username` varchar(100) NOT NULL,
                             `password` varchar(100) NOT NULL,
                             `nama_lengkap` varchar(100) NOT NULL,
                             `username_akun` varchar(50) NOT NULL,
                             `password_akun` varchar(50) NOT NULL,
                             `nama` varchar(100) NOT NULL,
                             `nik` varchar(16) DEFAULT NULL,
                             `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
                             `kontak` varchar(13) NOT NULL,
                             `id_alamat` int(11) DEFAULT NULL,
                             `lat` float DEFAULT NULL,
                             `lng` float DEFAULT NULL,
                             `jenis_pemasangan` enum('Media converter','OLT','Antena') NOT NULL,
                             `url_foto_ktp` varchar(100) DEFAULT NULL,
                             `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_lengkap`, `username_akun`, `password_akun`, `nama`, `nik`, `jenis_kelamin`, `kontak`, `id_alamat`, `lat`, `lng`, `jenis_pemasangan`, `url_foto_ktp`, `created_at`) VALUES
                                                                                                                                                                                                                                              (32, 'slamet', '123', 'Slamet Wirawan', 'aldi', '123', 'Aldi Kurniawan', '3517031234', 'Laki-Laki', '0812345678', 1, -7.64031, 112.254, 'OLT', '32.png', '2021-10-27 16:23:00'),
                                                                                                                                                                                                                                              (33, 'www', '123', 'wwwwww', 'slamet', 'abc', 'Slamet Wirawan', '345345', 'Laki-Laki', '345346', 1, -7.6365, 112.255, 'OLT', '', '2021-10-27 16:24:37'),
                                                                                                                                                                                                                                              (35, 'budi', '123', 'budi budi', 'budi', 'kentang', 'Budi Dermawan', '3413425', 'Laki-Laki', '08123', 1, -7.63423, 112.253, 'OLT', '', '2021-10-28 13:20:06'),
                                                                                                                                                                                                                                              (40, 'paijo', '123', 'paijoooo', 'paijo', '123', 'Paijooo', '3413425', 'Laki-Laki', '08123456', 1, -7.63885, 112.254, 'Media converter', '40.png', '2021-10-28 21:00:11'),
                                                                                                                                                                                                                                              (41, 'ahmad', '123', 'ahmaaaad', 'ahmad', 'ahmad123', 'ahmad', '341234346', 'Laki-Laki', '08111', 3, -7.63946, 112.256, 'Media converter', '41.png', '2021-10-28 21:21:28'),
                                                                                                                                                                                                                                              (42, 'sukijan', '123', 'sukijaaaan', 'sukijan', '123', 'Sukijan', '56783465', 'Laki-Laki', '63412346', 1, -7.63867, 112.254, 'Media converter', NULL, '2021-10-28 22:39:59'),
                                                                                                                                                                                                                                              (432, 'asdf', 'asdf', 'asdfasdf', 'asdf', 'asdf', 'asdfasdf', '35134143', 'Laki-Laki', '0782345', 1, NULL, NULL, 'Media converter', NULL, '2021-12-29 09:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_home`
--

CREATE TABLE `pelanggan_home` (
                                  `id_akun_home_wifi` int(11) NOT NULL,
                                  `id_pelanggan` int(11) NOT NULL,
                                  `id_paket_home_wifi` int(11) NOT NULL,
                                  `jenis_koneksi` enum('IP static','PPPOE') NOT NULL,
                                  `ip_static` varchar(15) DEFAULT NULL,
                                  `username_pppoe` varchar(100) DEFAULT NULL,
                                  `password_pppoe` varchar(100) DEFAULT NULL,
                                  `tanggal_pemasangan` date DEFAULT NULL,
                                  `bulan_awal_penagihan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_home`
--

INSERT INTO `pelanggan_home` (`id_akun_home_wifi`, `id_pelanggan`, `id_paket_home_wifi`, `jenis_koneksi`, `ip_static`, `username_pppoe`, `password_pppoe`, `tanggal_pemasangan`, `bulan_awal_penagihan`) VALUES
                                                                                                                                                                                                             (12, 32, 2, 'IP static', '10.10.0.234', '', '', '2021-10-19', '2021-10-19'),
                                                                                                                                                                                                             (13, 33, 1, 'PPPOE', NULL, 'slamet@gmdp-ptr.net', '123', '2021-10-18', '2021-10-04'),
                                                                                                                                                                                                             (15, 35, 2, 'IP static', '10.10.3.65', '', '', '2021-10-14', '2021-10-28'),
                                                                                                                                                                                                             (16, 41, 1, 'IP static', '10.10.9.57', NULL, NULL, '2021-10-25', '2021-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_voucher`
--

CREATE TABLE `pelanggan_voucher` (
                                     `id_akun_reseller` int(11) NOT NULL,
                                     `id_pelanggan` int(11) NOT NULL,
                                     `ip_router` varchar(15) NOT NULL,
                                     `keterangan` varchar(100) DEFAULT NULL,
                                     `tanggal_pemasangan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_voucher`
--

INSERT INTO `pelanggan_voucher` (`id_akun_reseller`, `id_pelanggan`, `ip_router`, `keterangan`, `tanggal_pemasangan`) VALUES
                                                                                                                          (5, 40, '10.10.0.23', NULL, '2021-10-20'),
                                                                                                                          (6, 42, '10.10.0.32', NULL, '2021-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
                              `id` int(11) NOT NULL,
                              `nama_usaha` varchar(100) NOT NULL,
                              `slogan` varchar(100) NOT NULL,
                              `alamat` varchar(100) NOT NULL,
                              `telepon` varchar(20) NOT NULL,
                              `email` varchar(100) NOT NULL,
                              `jam_operasional` varchar(100) NOT NULL,
                              `embed_map` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_usaha`, `slogan`, `alamat`, `telepon`, `email`, `jam_operasional`, `embed_map`) VALUES
    (1, 'CV. Perdana mitra Inovasi', 'Solusi Internet Berkelas dan Cerdas Untuk Aktivitas Tanpa Batas', 'Rejoagung, Kec. Ploso, Kabupaten Jombang', '0857-3097-7330', 'sales@perdanamitrainovasi.com', 'Senin - Sabtu 9:00 - 17:00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15824.16830144113!2d112.2220068!3d-7.4605975!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8332a3e083e7fb6a!2sCV.%20PERDANA%20MITRA%20INOVASI!5e0!3m2!1sen!2sid!4v1640633042683!5m2!1sen!2sid\"  height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
    `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`tahun`) VALUES
    (2021);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_voucher`
--

CREATE TABLE `transaksi_voucher` (
                                     `id_transaksi_voucher` int(11) NOT NULL,
                                     `id_akun_reseller` int(11) NOT NULL,
                                     `total` int(11) NOT NULL,
                                     `keterangan` varchar(100) NOT NULL,
                                     `id_admin` int(11) NOT NULL,
                                     `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_voucher`
--

INSERT INTO `transaksi_voucher` (`id_transaksi_voucher`, `id_akun_reseller`, `total`, `keterangan`, `id_admin`, `created_at`) VALUES
                                                                                                                                  (5, 5, 150000, '', 0, '2021-10-28 21:00:40'),
                                                                                                                                  (10, 5, 225000, '', 0, '2021-10-29 04:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_voucher_detail`
--

CREATE TABLE `transaksi_voucher_detail` (
                                            `id_transaksi_voucher_detail` int(11) NOT NULL,
                                            `id_transaksi_voucher` int(11) NOT NULL,
                                            `id_paket_voucher` int(11) NOT NULL,
                                            `jumlah_pembelian` int(11) NOT NULL,
                                            `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_voucher_detail`
--

INSERT INTO `transaksi_voucher_detail` (`id_transaksi_voucher_detail`, `id_transaksi_voucher`, `id_paket_voucher`, `jumlah_pembelian`, `bonus`) VALUES
                                                                                                                                                    (1, 5, 1, 100, 20),
                                                                                                                                                    (8, 10, 1, 100, 10),
                                                                                                                                                    (9, 10, 2, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
    ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `calon_pelanggan`
--
ALTER TABLE `calon_pelanggan`
    ADD PRIMARY KEY (`id_calon_pelanggan`),
  ADD KEY `id_paket_wifihome` (`id_paket_home_wifi`),
  ADD KEY `id_alamat` (`id_alamat`);

--
-- Indexes for table `invoice_pelanggan_wifi`
--
ALTER TABLE `invoice_pelanggan_wifi`
    ADD PRIMARY KEY (`id_invoice_pelanggan_home`),
  ADD KEY `tahun` (`tahun`),
  ADD KEY `invoice_home_wifi_ibfk_1` (`id_pelanggan_home`);

--
-- Indexes for table `laporan_gangguan`
--
ALTER TABLE `laporan_gangguan`
    ADD PRIMARY KEY (`id_laporan_gangguan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `paket_home_wifi`
--
ALTER TABLE `paket_home_wifi`
    ADD PRIMARY KEY (`id_paket_home_wifi`);

--
-- Indexes for table `paket_voucher`
--
ALTER TABLE `paket_voucher`
    ADD PRIMARY KEY (`id_paket_voucher`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
    ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_alamat` (`id_alamat`);

--
-- Indexes for table `pelanggan_home`
--
ALTER TABLE `pelanggan_home`
    ADD PRIMARY KEY (`id_akun_home_wifi`),
  ADD KEY `id_paket_wifihome` (`id_paket_home_wifi`),
  ADD KEY `akun_home_wifi_ibfk_2` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
