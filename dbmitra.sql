-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2023 at 06:22 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20853889_host`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `id` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id`, `kode`, `nama`, `harga`) VALUES
(1, 'A001', 'Barang A', 200000),
(2, 'C025', 'Barang B', 350000),
(3, 'A102', 'Barang C', 125000),
(4, 'A301', 'Barang D', 300000),
(5, 'B221', 'Barang E', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

CREATE TABLE `m_customer` (
  `id` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`id`, `kode`, `name`, `telp`) VALUES
(13, '001', 'Tian Ahmad Setiawan', '081382221886');

-- --------------------------------------------------------

--
-- Table structure for table `t_saless`
--

CREATE TABLE `t_saless` (
  `id` int(10) NOT NULL,
  `kodex` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `cust_id` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `ongkir` decimal(10,0) NOT NULL,
  `total_bayar` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_saless`
--

INSERT INTO `t_saless` (`id`, `kodex`, `tgl`, `cust_id`, `jumlah`, `subtotal`, `diskon`, `ongkir`, `total_bayar`) VALUES
(1, '202306-0001', '2023-06-02', 1, 10, 2250000, 5000, 1000, 2244000);

-- --------------------------------------------------------

--
-- Table structure for table `t_sales_dett`
--

CREATE TABLE `t_sales_dett` (
  `sales_id` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `harga_bandrol` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_pct` decimal(10,0) NOT NULL,
  `diskon_nilai` decimal(10,0) NOT NULL,
  `harga_diskon` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_sales_dett`
--

INSERT INTO `t_sales_dett` (`sales_id`, `kode`, `harga_bandrol`, `qty`, `diskon_pct`, `diskon_nilai`, `harga_diskon`, `total`) VALUES
(21, 'A001', 200000, 5, 10, 20000, 180000, 900000),
(25, 'B221', 300000, 5, 10, 30000, 270000, 1350000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `t_saless`
--
ALTER TABLE `t_saless`
  ADD PRIMARY KEY (`id`,`cust_id`),
  ADD KEY `kodex` (`kodex`,`cust_id`);

--
-- Indexes for table `t_sales_dett`
--
ALTER TABLE `t_sales_dett`
  ADD PRIMARY KEY (`sales_id`,`kode`),
  ADD KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_saless`
--
ALTER TABLE `t_saless`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_sales_dett`
--
ALTER TABLE `t_sales_dett`
  MODIFY `sales_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
