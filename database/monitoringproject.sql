-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 03:35 AM
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
(1, 'Taufiq NurHidayat', 'taufiq', 'f4eff635e6dfe584a1a536dbc7718f3d', 'taufiqnurhidayat124@gmail.com', 'Teknisi'),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Owner'),
(3, 'Defani Ahmad', 'defani', '10cbda08a0da4de926bf1d3d79673354', 'defani@gmail.com', 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `detservice`
--

CREATE TABLE `detservice` (
  `id_detserv` int(11) NOT NULL,
  `no_service` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `teknisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detservice`
--

INSERT INTO `detservice` (`id_detserv`, `no_service`, `id_harga`, `jumlah`, `tgl_input`, `teknisi`) VALUES
(13, 17, 13, 1, '2023-07-03 21:05:40', 'Defani Ahmad'),
(14, 17, 15, 1, '2023-07-03 21:05:40', 'Defani Ahmad'),
(16, 22, 10, 1, '2023-07-03 21:12:32', 'Taufiq NurHidayat'),
(17, 22, 9, 1, '2023-07-03 21:12:32', 'Taufiq NurHidayat');

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
(15, 'Tinta Printer', 'Printer', 'Tinta', 200000);

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
(1, 'Service', 'Install Ulang'),
(3, 'Service', 'Ganti Sparepart'),
(4, 'Printer', 'Service Printer'),
(5, 'Komputer', 'Service Laptop/PC');

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
(2, 'Taufiq NurHidayat', 'f4eff635e6dfe584a1a536dbc7718f3d', '089277266266', 't@gmail.com', 'Laki-laki', '   Krangkungan Sukoharjo																																																																																																																																																																																																																																						', 'Member'),
(18, 'Nur Hamsah', 'b55178b011bfb206965f2638d0f87047', '089277266266', 'n@gmail.com', 'Laki-laki', '     Krangkungan Sukoharjo																																																																																																																			', 'Member'),
(24, 'Rifki', 'd41d8cd98f00b204e9800998ecf8427e', '089277266266', 'r@gmail.com', 'Laki-laki', '  Klaten																																														', 'Member'),
(25, 'Rolan', 'd41d8cd98f00b204e9800998ecf8427e', '089277266266', 'i@gmail.com', 'Laki-laki', ' Krangkungan Sukoharjo																							', 'Belum Member'),
(26, 'Johan', 'd41d8cd98f00b204e9800998ecf8427e', '089277266266', 'johan@gmail.com', 'Laki-laki', ' Sragen																							', 'Belum Member'),
(27, 'Juki', '87f39ffa3a64fd26beb2ea7442ad701f', '089277266266', 'j@gmail.com', 'Perempuan', 'Klaten', 'Belum Member');

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
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`no_service`, `id_pelanggan`, `kategori`, `type`, `keluhan`, `tanggal`, `progres`, `keterangan`) VALUES
(16, 2, 'Komputer', 'Lenovo', 'Booting lama, Install Ulang                                ', '2023-06-16 15:46:48', 'Selesai Pengerjaan', ' '),
(17, 2, 'Printer', 'HP', 'Tinta Habis                                ', '2023-06-16 15:47:03', 'Proses Pengerjaan', ' Proses Penggantian tinta printer HP'),
(18, 2, 'Komputer', 'Lenovo', ' Ganti Baterai\r\n                                ', '2023-06-16 16:24:07', 'Service Dibatalkan', 'Overload'),
(19, 2, 'Printer', 'Lenovo', 'Service dan ganti tinta\r\n                                ', '2023-06-20 13:23:42', 'Service Dibatalkan', 'Batal                                    '),
(20, 2, 'Komputer', 'Samsung', 'Install Ulang  Laptop                             ', '2023-06-20 13:29:57', 'Dalam Antrian', ' '),
(21, 18, 'Komputer', 'Asus ROG', 'Upgrade SSD                                ', '2023-06-21 11:56:21', 'Proses Pengerjaan', ' '),
(22, 24, 'Komputer', 'Asus Thinkbook', 'Ganti Keyboard                                ', '2023-06-21 12:16:13', 'Proses Pengerjaan', ' Proses ganti keyboard Laptop'),
(23, 2, 'Komputer', 'Acer', 'Install Ulang                                ', '2023-07-03 22:11:47', 'Proses Pengerjaan', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `id_order` int(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
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
  `jumlah` int(11) NOT NULL,
  `teknisi` varchar(255) NOT NULL,
  `totharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `troli`
--

INSERT INTO `troli` (`id_troli`, `no_service`, `id_harga`, `jumlah`, `teknisi`, `totharga`) VALUES
(145, 22, 12, 1, 'Defani Ahmad', 0),
(146, 22, 9, 1, 'Defani Ahmad', 0),
(169, 23, 10, 1, 'Defani Ahmad', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detservice`
--
ALTER TABLE `detservice`
  ADD PRIMARY KEY (`id_detserv`);

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
  ADD KEY `customer_id` (`id_pelanggan`);

--
-- Indexes for table `troli`
--
ALTER TABLE `troli`
  ADD PRIMARY KEY (`id_troli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detservice`
--
ALTER TABLE `detservice`
  MODIFY `id_detserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `no_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `troli`
--
ALTER TABLE `troli`
  MODIFY `id_troli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

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
