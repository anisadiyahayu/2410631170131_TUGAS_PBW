-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 08:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pembeli`, `tanggal`, `id_barang`, `nama_barang`, `harga`, `jumlah`, `total`, `pajak`, `total_bayar`) VALUES
(1, 'nisa', '2026-03-11', 1, 'Keyboard', 150000, 4, 600000, 60000, 660000),
(2, 'nisa', '2026-03-11', 1, 'Keyboard', 150000, 4, 600000, 60000, 660000),
(3, 'nisa', '2026-03-11', 1, 'Keyboard', 150000, 3, 450000, 45000, 495000),
(4, 'nisa', '2026-03-11', 1, 'Keyboard', 150000, 3, 450000, 45000, 495000),
(5, 'risqi', '2026-03-11', 2, 'Mouse', 50000, 10, 500000, 50000, 550000),
(6, 'rama', '2026-03-11', 1, 'Keyboard', 150000, 2, 300000, 30000, 330000),
(7, 'w', '2026-03-11', 2, 'Mouse', 50000, 1, 50000, 5000, 55000),
(8, 'diyah', '2026-03-11', 2, 'Mouse', 50000, 2, 100000, 10000, 110000),
(9, 'rama', '2026-03-31', 1, 'Keyboard', 150000, 1, 150000, 15000, 165000),
(10, 'bahar', '2026-03-11', 4, '', 0, 2, 0, 0, 0),
(11, 'bahar', '2026-03-11', 5, 'Printer', 1200000, 2, 2400000, 240000, 2640000),
(12, 'nisa', '2026-03-11', 1, 'Laptop', 5000000, 1, 5000000, 500000, 5500000),
(13, 'nisa', '2026-03-11', 1, 'Laptop', 5000000, 1, 5000000, 500000, 5500000),
(14, 'benedict', '2026-03-11', 3, 'Keyboard', 150000, 3, 450000, 45000, 495000),
(15, 'damar', '2026-03-11', 2, 'Mouse', 50000, 2, 100000, 10000, 110000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
