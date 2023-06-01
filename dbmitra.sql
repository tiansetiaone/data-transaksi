-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmitra`
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
(1, 'A001', 'Barang A', '200000'),
(2, 'C025', 'Barang B', '350000'),
(3, 'A102', 'Barang C', '125000'),
(4, 'A301', 'Barang D', '300000'),
(5, 'B221', 'Barang E', '300000');

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

-- --------------------------------------------------------

--
-- Table structure for table `t_sales`
--

CREATE TABLE `t_sales` (
  `id` int(10) NOT NULL,
  `kodex` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `cust_id` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `ongkir` decimal(10,0) NOT NULL,
  `total_bayar` decimal(10,0) NOT NULL,
  `sales_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_sales`
--

INSERT INTO `t_sales` (`id`, `kodex`, `tgl`, `cust_id`, `jumlah`, `subtotal`, `diskon`, `ongkir`, `total_bayar`, `sales_id`) VALUES
(38, '202305-0005', '2023-05-19', 3, 25, '7200000', '70000', '11000', '7119000', 0),
(39, '202305-0006', '2023-05-20', 5, 25, '7200000', '70000', '5000', '7125000', 0),
(40, '202305-0007', '2023-05-12', 5, 25, '7200000', '50000', '11000', '7139000', 0),
(41, '202306-0008', '2023-06-01', 3, 15, '4050000', '5000', '1000', '4044000', 0);

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
(21, 'A001', '200000', 5, '10', '20000', '180000', '900000');

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
-- Indexes for table `t_sales`
--
ALTER TABLE `t_sales`
  ADD PRIMARY KEY (`id`,`cust_id`,`sales_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `kodex` (`kodex`),
  ADD KEY `sales_id` (`sales_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_sales`
--
ALTER TABLE `t_sales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `t_sales_dett`
--
ALTER TABLE `t_sales_dett`
  MODIFY `sales_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
