-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 06:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `groomer`
--

CREATE TABLE `groomer` (
  `id_groomer` char(6) NOT NULL,
  `nama_groomer` varchar(50) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `id_hewan` char(6) NOT NULL,
  `nama_hewan` varchar(50) NOT NULL,
  `tgl_lahir_hewan` date NOT NULL,
  `jenis_hewan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` char(6) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `email` char(25) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` char(6) NOT NULL,
  `waktu_layanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `harga_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_produk`
--

CREATE TABLE `masuk_produk` (
  `id_produk_masuk` varchar(6) NOT NULL,
  `id_produk` varchar(6) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `tgl_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk_produk`
--

INSERT INTO `masuk_produk` (`id_produk_masuk`, `id_produk`, `tgl_masuk`, `stok_masuk`, `tgl_exp`) VALUES
('MP0001', 'PR0010', '2022-12-07', 30, '2023-12-05');

--
-- Triggers `masuk_produk`
--
DELIMITER $$
CREATE TRIGGER `trigger_produk_masuk` AFTER INSERT ON `masuk_produk` FOR EACH ROW BEGIN
	UPDATE produk set total_produk = total_produk + NEW.stok_masuk
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` char(6) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(6) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `total_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori_produk`, `harga_produk`, `total_produk`) VALUES
('PR0001', 'Royal Canin', 'Makanan Kucing', 50000, 7),
('PR0002', 'Wellness Natural Cat Food', 'Makanan Kucing', 29000, 10),
('PR0003', 'Enblanc Pet Wipes', 'Tisu Basah', 23000, 20),
('PR0004', 'Sebazole Shampo', 'Shampo Kucing', 36500, 7),
('PR0005', 'Poop Bag', 'Plastik Roll', 4000, 30),
('PR0006', 'Mangkok Stainless Karet', 'Wadah Makan', 30000, 5),
('PR0007', 'Susu Royal Canin Baby Cat', 'Susu Kucing', 100000, 10),
('PR0008', 'Whiskas Junior Mackarel', 'Makanan Kucing', 6300, 30),
('PR0009', 'Equilibrio Adult 500 gr', 'Makanan Kucing', 45000, 4),
('PR0010', 'Pedigree Mini', 'Makanan Anjing', 67000, 40),
('PR0011', 'Royal Canin Chihuahua', 'Makanan Anjing', 17000, 15);

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `tambahProduk` AFTER INSERT ON `produk` FOR EACH ROW BEGIN
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(6) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` enum('Layanan','Produk') DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_layanan` char(6) DEFAULT NULL,
  `id_user` char(6) NOT NULL,
  `id_kasir` char(6) DEFAULT NULL,
  `id_hewan` char(6) DEFAULT NULL,
  `id_produk` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `qty`, `total`, `keterangan`, `id_layanan`, `id_user`, `id_kasir`, `id_hewan`, `id_produk`) VALUES
('PR0001', '2022-12-01', 'Produk', 3, 150000, '', NULL, 'PP0002', NULL, NULL, 'PR0001');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `trigger_produk_keluar` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET total_produk = total_produk - NEW.qty
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` enum('kasir','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `alamat`, `role`) VALUES
('PP0001', 'Nayara Saffa', 'nayara@gmail.com', 'qwertyuiop', 'Kopo', 'kasir'),
('PP0002', 'Amelia Nathasa', 'amelia@gmail.com', 'asdfghjkl', 'Kebon Kopi', 'member'),
('PP0003', 'Syifa Khairina', 'syifa@gmail.com', 'zxcvbnm', 'Tangerang Selatan', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groomer`
--
ALTER TABLE `groomer`
  ADD PRIMARY KEY (`id_groomer`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id_hewan`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `masuk_produk`
--
ALTER TABLE `masuk_produk`
  ADD PRIMARY KEY (`id_produk_masuk`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_layanan` (`id_layanan`,`id_user`,`id_kasir`,`id_hewan`,`id_produk`),
  ADD KEY `id_hewan` (`id_hewan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_member` (`id_user`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id_hewan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
