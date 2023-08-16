-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 04:34 AM
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
(1, 'Rifki Ramadhan', 'rifki', '25d55ad283aa400af464c76d713c07ad', 'Rifki@gmail.com', 'Teknisi'),
(2, 'Defani Ahmad', 'defani', '10cbda08a0da4de926bf1d3d79673354', 'defani124@gmail.com', 'Owner'),
(3, 'Defani Ahmad', 'defani', '25d55ad283aa400af464c76d713c07ad', 'defani@gmail.com', 'Teknisi');

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
(7, 'SSD 128', 'Komputer', 'Lenovo', 250000),
(8, 'RAM 8GB', 'Komputer', 'Samsung', 300000),
(9, 'Keyboard', 'Komputer', 'Lenovo G480', 150000),
(12, 'Service', 'Jasa', 'Service PC/Laptop', 25000),
(13, 'Service', 'Jasa', 'Service Printer', 25000),
(14, 'HDD  500GB', 'Komputer', 'Samsung', 550000),
(15, 'Tinta Printer', 'Printer', 'Tinta', 200000),
(16, 'LCD 16\"', 'Komputer', 'Acer', 350000),
(17, 'LCD 16\"', 'Komputer', 'Lenovo', 300000),
(18, 'LCD 19\"', 'Komputer', 'Asus', 500000),
(19, 'SSD 256', 'Komputer', 'VGEN', 400000),
(20, 'Keyboard', 'Komputer', 'ASUS', 155000),
(21, 'Keyboard', 'Komputer', 'Acer', 158000);

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
(2, 'Taufansyah', '25d55ad283aa400af464c76d713c07ad', '089277266266', 't@gmail.com', 'Laki-laki', '   Krangkungan Sukoharjo																																																																																																																																																																																																																																							', 'Member'),
(18, 'Nur Hamsah', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'n@gmail.com', 'Laki-laki', '      Krangkungan Sukoharjo																																																																																																																																										', 'Member'),
(24, 'Rifki', '25d55ad283aa400af464c76d713c07ad', '089277266266', 'r@gmail.com', 'Laki-laki', '      Klaten																																																																																																																																																																																																																																																			', 'Belum Member'),
(33, 'Anggi', '25d55ad283aa400af464c76d713c07ad', '087567435678', 'anggi@gmail.com', 'perempuan', 'Surakarta', 'Belum Member'),
(34, 'taufiq', '25d55ad283aa400af464c76d713c07ad', '0867473885737', 'taufiq@gmail.com', 'laki-laki', 'Sukoharjo', 'Belum Member');

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
  `tanggal` date DEFAULT current_timestamp(),
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
(34, 2, 'Komputer', 'ASUS ROG', 'Upgrade RAM                                ', '2023-07-31', 'Di Ambil', ' Proses Upgrade RAM Selesai', 427500, 1, 1572259088, '2023-07-31 14:31:56'),
(35, 24, 'Komputer', 'Printer HP', 'Ganti tinta', '2023-07-31', 'Selesai Pengerjaan', ' Ganti tinta selesai', 202500, 1, 720239119, '2023-07-31 14:49:45'),
(36, 2, 'Printer', 'Printer HP', 'Ganti Tinta                                ', '2023-08-01', 'Di Ambil', 'Proses ganti tinta', 202500, 1, 0, '2023-08-15 10:59:15'),
(37, 2, 'Komputer', 'ACER', 'Tambah RAM                                ', '2023-08-01', 'Di Ambil', ' SELESAI', 427500, 1, 1469762024, '2023-08-01 08:50:31'),
(38, 2, 'Komputer', 'ASUS', 'Tambah RAM                                ', '2023-08-03', 'Selesai Pengerjaan', 'Proses pengerjaan tambah RAM ', 270000, 1, 0, '2023-08-16 01:00:29'),
(39, 33, 'Printer', 'HP', 'Service dan ganti tinta                                ', '2023-08-14', 'Selesai Pengerjaan', 'Proses pengerjaan service , segera membayar dan mengambil perangkat', 225000, 3, 962704556, '2023-08-14 15:04:43'),
(40, 33, 'Komputer', 'Lenovo Thinkbook', 'Install Ulang                                ', '2023-08-15', 'Selesai Pengerjaan', 'Proses Service Selesai', 25000, 1, 1147907509, '2023-08-15 11:01:12'),
(41, 34, 'Komputer', 'Asus', 'Tambah RAM                                ', '2023-08-15', 'Di Ambil', ' Selesai Upgrade RAM', 300000, 1, 1554099660, '2023-08-15 13:33:22'),
(42, 34, 'Printer', 'HP', 'Ganti Tinta                                ', '2023-08-15', 'Dalam Antrian', ' ', 0, 1, 0, '2023-08-16 01:50:17');

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

--
-- Dumping data for table `transaksi_midtrans`
--

INSERT INTO `transaksi_midtrans` (`id_order`, `no_service`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `batas_waktu`) VALUES
(720239119, 35, 202500, 'bank_transfer', '2023-07-31 14:49:27', 'bca', '16658632489', 'https://app.sandbox.midtrans.com/snap/v1/transactions/0ceeca7e-873e-4af2-9940-948e3fa05a0e/pdf', '200', '01-08-2023 14:49:27'),
(962704556, 39, 225000, 'bank_transfer', '2023-08-14 15:04:15', 'bca', '16658802718', 'https://app.sandbox.midtrans.com/snap/v1/transactions/8fe597f0-fda5-4909-9444-8b540d90ffa2/pdf', '200', '15-08-2023 15:04:15'),
(1147907509, 40, 25000, 'bank_transfer', '2023-08-15 11:00:50', 'bni', '9881665805239714', 'https://app.sandbox.midtrans.com/snap/v1/transactions/eced50a2-4dee-48dd-9a60-b43e2ada77cc/pdf', '200', '16-08-2023 11:00:50'),
(1469762024, 37, 427500, 'bank_transfer', '2023-08-01 08:47:07', 'bni', '9881665866428152', 'https://app.sandbox.midtrans.com/snap/v1/transactions/f5ac4c7c-d886-4aef-a789-ceb0f12a6c9e/pdf', '200', '02-08-2023 08:47:07'),
(1554099660, 41, 300000, 'bank_transfer', '2023-08-15 13:31:03', 'bca', '16658857503', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3063c4b9-3189-4063-87ec-4d7c0407243e/pdf', '200', '16-08-2023 13:31:03'),
(1565569220, 40, 25000, 'echannel', '2023-08-15 11:00:21', NULL, NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/34bf35e9-34d1-4609-b853-21abc6365722/pdf', '201', '16-08-2023 11:00:21'),
(1572259088, 34, 427500, 'bank_transfer', '2023-07-31 14:24:18', 'bca', '16658733347', 'https://app.sandbox.midtrans.com/snap/v1/transactions/07866995-a1d0-4d21-b3fd-04a65d777136/pdf', '200', '01-08-2023 14:24:18');

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
(267, 34, 8, 450000),
(269, 34, 11, 25000),
(270, 35, 13, 25000),
(271, 35, 15, 200000),
(272, 36, 15, 200000),
(273, 36, 13, 25000),
(274, 37, 8, 450000),
(275, 37, 12, 25000),
(276, 39, 13, 25000),
(277, 39, 15, 200000),
(279, 40, 12, 25000),
(280, 41, 8, 300000),
(281, 38, 8, 300000);

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `no_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `troli`
--
ALTER TABLE `troli`
  MODIFY `id_troli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

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
