-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 09:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `level`) VALUES
(1, 'Taufiq NurHidayat', 'taufiq', '25d55ad283aa400af464c76d713c07ad', 'taufiqnurhidayat124@gmail.com', 'Teknisi'),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Owner'),
(3, 'Defani Ahmad', 'defani', '10cbda08a0da4de926bf1d3d79673354', 'defani@gmail.com', 'Teknisi'),
(4, 'Imam Arif', 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'imam@gmail.com', 'Teknisi'),
(5, 'Budiar Nadiem', 'budi', '65e3b88a1b1f50a0cf5ab65304dc024c', 'budi223@gmail.com', 'Teknisi'),
(6, 'Gus', 'gus', '84a26c4612a7f9958174ee6552625282', 'gus@gmail.com', 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `jenis`, `kategori`, `type`, `harga`) VALUES
(7, 'SSD', 'Komputer', 'Lenovo', 450000),
(8, 'RAM', 'Komputer', 'Samsung', 450000),
(9, 'Keyboard', 'Komputer', 'Lenovo G480', 150000),
(10, 'Service', 'Jasa', 'Install Ulang', 30000),
(11, 'Service', 'Jasa', 'Ganti Sparepart', 25000),
(12, 'Service', 'Jasa', 'Service PC/Laptop', 25000),
(13, 'Service', 'Jasa', 'Service Printer', 25000),
(14, 'HDD', 'Komputer', 'Samsung', 450000),
(15, 'Tinta Printer', 'Printer', 'Tinta', 200000),
(16, 'LCD', 'Komputer', 'Acer', 350000),
(17, 'LCD', 'Komputer', 'Asus', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `kategori`, `keterangan`) VALUES
(1, 'Service', 'Install Ulang PC'),
(3, 'Service', 'Ganti Sparepart'),
(4, 'Printer', 'Service Printer'),
(5, 'Komputer', 'Service Laptop/PC'),
(7, 'Komputer', 'Upgrade/Downgrade');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `password`, `hp`, `email`, `jk`, `alamat`, `status`) VALUES
(2, 'Taufansyah', '25d55ad283aa400af464c76d713c07ad', '089277266266', 't@gmail.com', 'Laki-laki', '   Krangkungan Sukoharjo																																																																																																																																																																																																																																							', 'Member'),
(18, 'Nur Hamsah', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'n@gmail.com', 'Laki-laki', '      Krangkungan Sukoharjo																																																																																																																																										', 'Member'),
(24, 'Rifki', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'r@gmail.com', 'Laki-laki', '      Klaten																																																																																																																																																																																																																																																			', 'Member'),
(25, 'Rolan', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'i@gmail.com', 'Laki-laki', '   Krangkungan Sukoharjo																																																																					', 'Belum Member'),
(26, 'Johan', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'johan@gmail.com', 'Laki-laki', ' Sragen																																																																																																																																										', 'Belum Member'),
(27, 'Juki', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'j@gmail.com', 'Perempuan', '    Klaten																																																																																												', 'Member'),
(28, 'Povian', '25d55ad283aa400af464c76d713c07ad', '085713448550', 'pov@gmail.com', 'perempuan', 'Yogyakarta', 'Member'),
(30, 'Dije', '25d55ad283aa400af464c76d713c07ad', '089654666777', 'd@gmail.com', 'Laki-laki', '  Solo																																														', 'Member'),
(31, 'Andi', '25d55ad283aa400af464c76d713c07ad', '098665555555', 'Andi@gmail.com', 'Laki-laki', 'Solo', 'Belum Member');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `no_service` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `progres` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `totharga` int(25) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tgl_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`no_service`, `id_pelanggan`, `kategori`, `type`, `keluhan`, `tanggal`, `progres`, `keterangan`, `totharga`, `id_admin`, `id_order`, `tgl_update`) VALUES
(26, 2, 'Komputer', 'Asus ROG', 'Upgrade SSD                                ', '2023-07-04 21:54:57', 'Di Ambil', ' Proses Upgrade SSD ASUS ROG', 480000, 1, 0, '2023-07-09 19:14:03'),
(27, 2, 'Printer', 'HP', 'Service Printer                                ', '2023-07-04 21:55:17', 'Selesai Pengerjaan', 'Sedang Proses Service Printer', 180000, 1, 0, '2023-07-07 02:12:12'),
(28, 2, 'Komputer', 'Acer', 'Install Ulang                                ', '2023-07-04 21:55:50', 'Di Ambil', ' Proses Install Ulang Laptop Selesai', 30000, 1, 0, '2023-07-05 11:40:10'),
(29, 27, 'Printer', 'Printer HP', 'Service Printer                                ', '2023-07-05 13:34:58', 'Proses Pengerjaan', ' Service Printer', 405000, 1, 0, '2023-07-09 19:34:43'),
(30, 27, 'Komputer', 'Acer Aspire', 'Ganti Batarai                                ', '2023-07-05 13:42:55', 'Proses Pengerjaan', ' ', 200000, 1, 0, '2023-07-07 02:10:08'),
(31, 26, 'Komputer', 'Lenovo G480', 'Ganti Baterai                                ', '2023-07-05 15:23:42', 'Di Ambil', 'Ganti baterai', 315000, 1, 0, '2023-07-07 02:12:35'),
(32, 28, 'Komputer', 'ASUS Zenbook', 'Upgrade RAM                                ', '2023-07-06 03:34:49', 'Selesai Pengerjaan', 'Selesai upgrade RAM', 427500, 4, 0, '2023-07-06 03:39:02'),
(33, 2, 'Komputer', 'Dell', 'Upgrade RAM\r\n                                ', '2023-07-10 21:23:33', 'Dalam Antrian', '', 0, 0, 0, '2023-07-10 21:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `id_order` int(20) NOT NULL,
  `no_service` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `va_number` varchar(30) DEFAULT NULL,
  `pdf_url` text NOT NULL,
  `status_code` char(5) NOT NULL,
  `batas_waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `troli`
--

CREATE TABLE `troli` (
  `id_troli` int(11) NOT NULL,
  `no_service` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `troli`
--

INSERT INTO `troli` (`id_troli`, `no_service`, `id_harga`, `jumlah`) VALUES
(260, 27, 15, 200000),
(261, 30, 15, 200000),
(264, 29, 14, 450000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`no_service`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `customer_id` (`no_service`);

--
-- Indexes for table `troli`
--
ALTER TABLE `troli`
  ADD PRIMARY KEY (`id_troli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `no_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `troli`
--
ALTER TABLE `troli`
  MODIFY `id_troli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
