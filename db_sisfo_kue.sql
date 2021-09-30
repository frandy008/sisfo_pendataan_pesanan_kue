-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 03:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisfo_kue`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahan_baku`
--

CREATE TABLE `tbl_bahan_baku` (
  `kode_bahan_baku` int(5) NOT NULL,
  `nama_bahan_baku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bahan_baku`
--

INSERT INTO `tbl_bahan_baku` (`kode_bahan_baku`, `nama_bahan_baku`) VALUES
(1, 'Tepung Terigu'),
(2, 'Telur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_isi_pesanan`
--

CREATE TABLE `tbl_isi_pesanan` (
  `kode` int(10) NOT NULL,
  `kode_pesanan` varchar(15) NOT NULL,
  `kode_kue` varchar(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_isi_pesanan`
--

INSERT INTO `tbl_isi_pesanan` (`kode`, `kode_pesanan`, `kode_kue`, `jumlah`, `harga`) VALUES
(16, 'B2109170001', 'KUE-001', 9, 720000),
(17, 'B2109170001', 'KUE-002', 3, 300000),
(23, 'B2109170002', 'KUE-001', 2, 160000),
(24, 'B2109170002', 'KUE-002', 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kue`
--

CREATE TABLE `tbl_kue` (
  `kode_kue` varchar(10) NOT NULL,
  `nama_kue` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `modal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kue`
--

INSERT INTO `tbl_kue` (`kode_kue`, `nama_kue`, `harga`, `modal`) VALUES
('KUE-001', 'Kue Dancow', 80000, 40000),
('KUE-002', 'Palm Sugar', 100000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `kode_pembelian` int(10) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `kode_bahan_baku` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `kode_pesanan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kode_pembelian`, `tanggal`, `kode_bahan_baku`, `jumlah`, `harga`, `total_harga`, `kode_pesanan`) VALUES
(3, '2021-09-17', 1, 1, 12000, 12000, 'B2109170001'),
(4, '2021-09-17', 2, 10, 18000, 180000, 'B2109170001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penggunaan`
--

CREATE TABLE `tbl_penggunaan` (
  `kode_penggunaan` int(10) NOT NULL,
  `kode_pesanan` varchar(15) NOT NULL,
  `kode_bahan_baku` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penggunaan`
--

INSERT INTO `tbl_penggunaan` (`kode_penggunaan`, `kode_pesanan`, `kode_bahan_baku`, `jumlah`) VALUES
(3, 'B2109170001', 1, 1),
(4, 'B2109170001', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `kode_pesanan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`kode_pesanan`, `tanggal`, `nama`, `keterangan`, `status`) VALUES
('B2109170001', '2021-09-17', 'Mama Dilla', 'Untuk hari minggu', 1),
('B2109170002', '2021-09-17', 'Mama Dedeh', 'Untuk Reonian hari rabu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bahan_baku`
--
ALTER TABLE `tbl_bahan_baku`
  ADD PRIMARY KEY (`kode_bahan_baku`);

--
-- Indexes for table `tbl_isi_pesanan`
--
ALTER TABLE `tbl_isi_pesanan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tbl_kue`
--
ALTER TABLE `tbl_kue`
  ADD PRIMARY KEY (`kode_kue`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `tbl_penggunaan`
--
ALTER TABLE `tbl_penggunaan`
  ADD PRIMARY KEY (`kode_penggunaan`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bahan_baku`
--
ALTER TABLE `tbl_bahan_baku`
  MODIFY `kode_bahan_baku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_isi_pesanan`
--
ALTER TABLE `tbl_isi_pesanan`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `kode_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_penggunaan`
--
ALTER TABLE `tbl_penggunaan`
  MODIFY `kode_penggunaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
