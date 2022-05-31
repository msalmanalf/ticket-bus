-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 10:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `kd_access_menu` int(11) DEFAULT NULL,
  `kd_level` int(11) DEFAULT NULL,
  `kd_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`kd_access_menu`, `kd_level`, `kd_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(35) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `img_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(35) DEFAULT NULL,
  `level_admin` varchar(12) DEFAULT NULL,
  `status_admin` int(1) DEFAULT NULL,
  `date_create_admin` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `img_admin`, `email_admin`, `level_admin`, `status_admin`, `date_create_admin`) VALUES
('ADM0001', 'Administrator', 'admin', '$2y$10$v25.H4XMgDztA2NmxeJQSeaRl2nKboXeRTo1BjPe37R0JG3rXraZG', 'assets/adm/img/default.png', 'adm@gmail.com', '2', 1, '0000-00-00 00:00:00'),
('ADM0002', 'Pemilik Perusahaan', 'owner', '$2y$10$v25.H4XMgDztA2NmxeJQSeaRl2nKboXeRTo1BjPe37R0JG3rXraZG', 'assets/adm/img/default.png', 'owner@gmail.com', '1', 1, '0000-00-00 00:00:00'),
('ADM0003', 'Salman Alfarisi', 'salman', '$2y$10$L8pDDZRgL.jI4xZI0L3Eae6eutAGg/n0q0qEQpm2zV58JVRNNDnVi', 'assets/adm/img/default.png', 'salmanalfarisi@gmail.com', '1', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `kd_bank` varchar(50) NOT NULL,
  `nasabah_bank` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `nomrek_bank` varchar(50) DEFAULT NULL,
  `photo_bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`kd_bank`, `nasabah_bank`, `nama_bank`, `nomrek_bank`, `photo_bank`) VALUES
('BK0001', 'Salman Alfarisi', 'BCA', '24351351', '/assets/frontend/img/bank/bca-icon1.jpg'),
('BK0002', 'Salman Alfarisi', 'Mandiri', '3351351351', '/assets/frontend/img/bank/mandiri-icon1.jpg'),
('BK0003', 'Tourismo Bus', 'BRI', '321545897', '/assets/frontend/img/bank/bri-icon1.jpg'),
('BK0004', 'Tourismo Bus', 'BNI', '456132578', '/assets/frontend/img/bank/bni-icon1.jpg'),
('BK0005', 'Tourismo Bus', 'CIMB BANK', '413526123', '/assets/frontend/img/bank/bank2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `kd_bus` varchar(50) NOT NULL,
  `nama_bus` varchar(50) DEFAULT NULL,
  `plat_bus` varchar(50) DEFAULT NULL,
  `kapasitas_bus` int(13) DEFAULT NULL,
  `status_bus` int(1) DEFAULT NULL,
  `desc_bus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bus`
--

INSERT INTO `tbl_bus` (`kd_bus`, `nama_bus`, `plat_bus`, `kapasitas_bus`, `status_bus`, `desc_bus`) VALUES
('B001', 'Tourismo 01', 'B 001', 15, 1, NULL),
('B002', 'Tourismo 02', 'B 002', 15, 1, NULL),
('B003', 'Tourismo 03', 'B 003', 15, 1, NULL),
('B004', 'Tourismo 04', 'B 2147 Y', 15, 1, NULL),
('B005', 'Tourismo 05', 'B 2934', 15, 0, NULL),
('B006', 'Tourismo 06', 'B 006', 15, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `kd_bus` varchar(50) DEFAULT NULL,
  `kd_tujuan` varchar(50) DEFAULT NULL,
  `kd_asal` varchar(50) DEFAULT NULL,
  `wilayah_jadwal` varchar(50) DEFAULT NULL,
  `jam_berangkat_jadwal` time DEFAULT NULL,
  `jam_tiba_jadwal` time DEFAULT NULL,
  `harga_jadwal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_bus`, `kd_tujuan`, `kd_asal`, `wilayah_jadwal`, `jam_berangkat_jadwal`, `jam_tiba_jadwal`, `harga_jadwal`) VALUES
('JD001', 'B001', 'TJ001', 'TJ002', 'Jakarta', '15:30:00', '20:45:00', '112000'),
('JD003', 'B007', 'TJ002', 'TJ001', 'Bandung', '12:11:00', '14:11:00', '150000'),
('JD004', 'B006', 'TJ004', 'TJ002', 'Yogyakarta', '09:30:00', '16:40:00', '190000'),
('JD005', 'B003', 'TJ007', 'TJ006', 'Malang', '11:15:00', '15:30:00', '250000'),
('JD006', 'B006', 'TJ009', 'TJ008', 'Jember', '13:10:00', '19:20:00', '150000'),
('JD007', 'B004', 'TJ011', 'TJ010', 'Banten', '17:05:00', '21:30:00', '280000'),
('JD008', 'B003', 'TJ013', 'TJ012', 'Purwokerto', '08:45:00', '13:15:00', '200000'),
('JD009', 'B002', 'TJ015', 'TJ014', 'Klaten', '09:05:00', '15:20:00', '280000'),
('JD010', 'B006', 'TJ007', 'TJ001', 'Malang', '10:15:00', '14:15:00', '300000'),
('JD011', 'B004', 'TJ006', 'TJ017', 'Jepara', '09:20:00', '16:30:00', '400000'),
('JD012', 'B001', 'TJ012', 'TJ018', 'Cirebon', '10:20:00', '12:30:00', '220000'),
('JD013', 'B003', 'TJ011', 'TJ016', 'Banten', '10:10:00', '14:15:00', '200000'),
('JD014', 'B004', 'TJ004', 'TJ005', 'Yogyakarta', '11:25:00', '14:15:00', '250000'),
('JD015', 'B001', 'TJ003', 'TJ002', 'Semarang', '10:15:00', '15:20:00', '300000'),
('JD016', 'B002', 'TJ011', 'TJ007', 'Banten', '10:15:00', '15:35:00', '320000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `kd_konfirmasi` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_konfirmasi` varchar(50) DEFAULT NULL,
  `nama_bank_konfirmasi` varchar(50) DEFAULT NULL,
  `norek_konfirmasi` varchar(50) DEFAULT NULL,
  `total_konfirmasi` varchar(50) DEFAULT NULL,
  `photo_konfirmasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`kd_konfirmasi`, `kd_order`, `nama_konfirmasi`, `nama_bank_konfirmasi`, `norek_konfirmasi`, `total_konfirmasi`, `photo_konfirmasi`) VALUES
('KF0001', 'ORD0001', 'M Salman Alfarisi', 'BCA', '321513', '112000', '/assets/frontend/upload/payment/struk5.jpg'),
('KF0002', 'ORD0002', 'Dini Kusuma', 'BRI', '65484621', '250000', '/assets/frontend/upload/payment/struk6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `kd_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`kd_level`, `nama_level`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `kd_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`kd_menu`, `nama_menu`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `kd_tiket` varchar(50) DEFAULT NULL,
  `kd_jadwal` varchar(50) DEFAULT NULL,
  `kd_pelanggan` varchar(50) DEFAULT NULL,
  `kd_bank` varchar(50) DEFAULT NULL,
  `asal_order` varchar(200) DEFAULT NULL,
  `nama_order` varchar(50) DEFAULT NULL,
  `tgl_beli_order` varchar(50) DEFAULT NULL,
  `tgl_berangkat_order` varchar(50) DEFAULT NULL,
  `nama_kursi_order` varchar(50) DEFAULT NULL,
  `umur_kursi_order` varchar(50) DEFAULT NULL,
  `no_kursi_order` varchar(50) DEFAULT NULL,
  `no_ktp_order` varchar(50) DEFAULT NULL,
  `no_tlpn_order` varchar(50) DEFAULT NULL,
  `alamat_order` varchar(100) DEFAULT NULL,
  `email_order` varchar(100) DEFAULT NULL,
  `expired_order` varchar(50) DEFAULT NULL,
  `qrcode_order` varchar(100) DEFAULT NULL,
  `status_order` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `kd_order`, `kd_tiket`, `kd_jadwal`, `kd_pelanggan`, `kd_bank`, `asal_order`, `nama_order`, `tgl_beli_order`, `tgl_berangkat_order`, `nama_kursi_order`, `umur_kursi_order`, `no_kursi_order`, `no_ktp_order`, `no_tlpn_order`, `alamat_order`, `email_order`, `expired_order`, `qrcode_order`, `status_order`) VALUES
(16, 'ORD0001', 'TORD0001JD001202205316', 'JD001', 'PL0001', 'BK0001', 'Bandung', 'Mohamad Salman Alfarisi', 'Senin, 30 Mei 2022, 23:00', '2022-05-31', 'Salman alfarisi', '22', '6', '213541684351', '081584815509', 'Jln Bulan No 44', 'salmanalfarisi889@gmail.com', '31-05-2022 23:00:24', 'assets/frontend/upload/qrcode/ORD0001.png', '2'),
(19, 'ORD0002', 'TORD0002JD0142022053112', 'JD014', 'PL0003', 'BK0003', 'Surabaya', 'Dini Kusuma Dewi', 'Selasa, 31 Mei 2022, 03:23', '2022-05-31', 'Dini Kusuma', '21', '12', '5465465132135', '085381324711', 'Jl. Wulan No.23', 'dinikd22@gmail.com', '01-06-2022 03:23:47', 'assets/frontend/upload/qrcode/ORD0002.png', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `kd_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `no_ktp_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `img_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_pelanggan` int(1) DEFAULT NULL,
  `date_create_pelanggan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`kd_pelanggan`, `username_pelanggan`, `password_pelanggan`, `no_ktp_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `telpon_pelanggan`, `img_pelanggan`, `status_pelanggan`, `date_create_pelanggan`) VALUES
('PL0003', 'dinikusuma', '$2y$10$Gzk9lmt//SAXpUxtyW2dY.4lE65otYqd8MNY054XJfrp.yumZbvtC', '354354641658', 'Dini Kusuma Dewi', 'Jl. Wulan No.23', 'dinikd22@gmail.com', '085381324711', 'assets/frontend/img/default.png', 1, '0000-00-00 00:00:00'),
('PL0001', 'salman', '$2y$10$Kh5qpu.DESXFB2TqmBX10O8ZofbgdnFR6.3Zl/POcTo5OUBGFD1l2', '35435464165812', 'Mohamad Salman Alfarisi', 'Jln Bulan No 44', 'salmanalfarisi889@gmail.com', '081584815509', 'assets/frontend/img/default.png', 1, '0000-00-00 00:00:00'),
('PL0002', 'ahmadputra', '$2y$10$WNMfwmZMo6gMPQB2lNiQw.Xtrr7K0/J7OgprnB7usvXch973/SgK6', '', 'Ahmad Putra Syahbani', 'Jln Bulang no.54', 'ahmad.putra@gmail.com', '0815848133329', 'assets/frontend/img/default.png', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `kd_sub_menu` int(11) NOT NULL,
  `kd_menu` int(11) DEFAULT NULL,
  `title_sub_menu` varchar(128) DEFAULT NULL,
  `url_sub_menu` varchar(128) DEFAULT NULL,
  `is_active_sub_menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`kd_sub_menu`, `kd_menu`, `title_sub_menu`, `url_sub_menu`, `is_active_sub_menu`) VALUES
(0, 1, 'Dashboard', 'backend/home', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `kd_tiket` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_tiket` varchar(50) DEFAULT NULL,
  `kursi_tiket` varchar(50) DEFAULT NULL,
  `umur_tiket` varchar(50) DEFAULT NULL,
  `asal_beli_tiket` varchar(50) DEFAULT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `etiket_tiket` varchar(100) DEFAULT NULL,
  `status_tiket` varchar(50) NOT NULL,
  `create_tgl_tiket` date DEFAULT NULL,
  `create_admin_tiket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`kd_tiket`, `kd_order`, `nama_tiket`, `kursi_tiket`, `umur_tiket`, `asal_beli_tiket`, `harga_tiket`, `etiket_tiket`, `status_tiket`, `create_tgl_tiket`, `create_admin_tiket`) VALUES
('TORD0001JD001202205316', 'ORD0001', 'Salman alfarisi', '6', '22 Tahun', 'Bandung', '112000', NULL, '2', '2022-05-30', 'salman'),
('TORD0002JD0142022053112', 'ORD0002', 'Dini Kusuma', '12', '21 Tahun', 'Surabaya', '250000', NULL, '2', '2022-05-31', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_pelanggan`
--

CREATE TABLE `tbl_token_pelanggan` (
  `kd_token` int(11) NOT NULL,
  `nama_token` varchar(256) DEFAULT NULL,
  `email_token` varchar(50) DEFAULT NULL,
  `date_create_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token_pelanggan`
--

INSERT INTO `tbl_token_pelanggan` (`kd_token`, `nama_token`, `email_token`, `date_create_token`) VALUES
(11, '2fd909995c1460e8d5d5975f4f301628', 'salmanalfarisi889@gmail.com', 1653907311),
(12, 'ad1dc9de12f9c898795657eff40d5ccf', 'ahmad.putra@gmail.com', 1653939170),
(13, '499fe0359f8da525e8f8d298bd5f3aa6', 'dinikd22@gmail.com', 1653942157);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tujuan`
--

CREATE TABLE `tbl_tujuan` (
  `kd_tujuan` varchar(10) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `nama_terminal_tujuan` varchar(50) NOT NULL,
  `terminal_tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tujuan`
--

INSERT INTO `tbl_tujuan` (`kd_tujuan`, `kota_tujuan`, `nama_terminal_tujuan`, `terminal_tujuan`) VALUES
('TJ001', 'Jakarta', 'Terminal Kayu Besar', 'Jl. Auto Ring Road Kapuk Kamal Kayu Besar, Cengkareng'),
('TJ002', 'Bandung', 'Terminal Bojongloa', 'Jl. Raya Sawahan, Situsaeur, Bojongloa Kidul'),
('TJ003', 'Semarang', 'Kalideres', 'Jl. Pangandaran no 232'),
('TJ004', 'Yogyakarta', 'Malioboro', 'Jl. Adi sucipto no 44, A Boulevard'),
('TJ005', 'Surabaya', 'Baya wae', 'Jl. Abc no 44'),
('TJ006', 'Jepara', 'Terminal Jepara', 'Jl. Letjen Haryono MT'),
('TJ007', 'Malang', 'Terminal Arjosari Malang', 'Jl. Raden Intan No.1'),
('TJ008', 'Banyuwangi', 'Terminal Blambangan', 'Jl. Basuki Rahmat'),
('TJ009', 'Jember', 'Terminal Tawang Alun Jember', 'Jl. Dharmawangsa'),
('TJ010', 'Tasikmalaya', 'Terminal Indihiang', 'Jl. Sukamajukidul'),
('TJ011', 'Banten', 'Terminal Kepandaian', 'Jl. Letnan Jidun No.1'),
('TJ012', 'Cirebon', 'Terminal Harjamukti Cirebon', 'Jl. Ahmad Yani'),
('TJ013', 'Purwokerto', 'Terminal Bulupitu', 'Jl. Karanggayam'),
('TJ014', 'Garut', 'Terminal Guntur Garut', 'Jl. Guntur Sari No.32'),
('TJ015', 'Klaten', 'Terminal Ir. Soekarno Klaten ', 'Jl. Tengahan'),
('TJ016', 'Depok', 'Terminal Parung', 'Jl. Parung'),
('TJ017', 'Bekasi Kota', 'Terminal Bekasi Kota', 'Jl. Ir. H. Juanda'),
('TJ018', 'Bogor', 'Terminal Baranang Siang', 'Jl. Manggis VI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`kd_bus`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_bus` (`kd_bus`),
  ADD KEY `kd_tujuan` (`kd_tujuan`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`kd_konfirmasi`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `kd_jadwal` (`kd_jadwal`),
  ADD KEY `kd_kustomer` (`kd_pelanggan`),
  ADD KEY `kd_tiket` (`kd_tiket`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`kd_sub_menu`),
  ADD KEY `kd_menu` (`kd_menu`);

--
-- Indexes for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`kd_tiket`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Indexes for table `tbl_token_pelanggan`
--
ALTER TABLE `tbl_token_pelanggan`
  ADD PRIMARY KEY (`kd_token`);

--
-- Indexes for table `tbl_tujuan`
--
ALTER TABLE `tbl_tujuan`
  ADD PRIMARY KEY (`kd_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `kd_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_token_pelanggan`
--
ALTER TABLE `tbl_token_pelanggan`
  MODIFY `kd_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`kd_bank`) REFERENCES `tbl_bank` (`kd_bank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
