-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 10:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_sbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `no_ktp` char(16) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `alamat` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`no_ktp`, `nama`, `alamat`) VALUES
('3301203231225001', 'Bagasa Adi Saputra', 'Pemalang'),
('3301212186121123', 'Lutfi Andi Prasetyo', 'Purbalingga'),
('3301232918221002', 'Fifi Elsa Handanyani', 'Purwokerto'),
('3301252213324001', 'Chelsea Saputri', 'Kebumen'),
('3301292210221022', 'Ahmad Sayuri', 'Banyumas');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(32) NOT NULL,
  `nama_fasilitas` varchar(63) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
('FA001', 'Basement'),
('FA002', 'Penjaga Kebersihan'),
('FA003', 'Security'),
('FA004', 'Kolam Renang');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `no_gedung` varchar(16) NOT NULL,
  `nama_gedung` varchar(32) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `id_fasilitas` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`no_gedung`, `nama_gedung`, `kapasitas`, `harga_sewa`, `id_fasilitas`) VALUES
('GE001', 'Gedung Pamungkas Putih', 10000, 50000000, 'FA001'),
('GE002', 'Gedung Sentosa Lions', 15000, 70000000, 'FA004'),
('GE003', 'Gedung Trependent', 20000, 100000000, 'FA001'),
('GE004', 'Gedung Wangkara Jaya', 5000, 35000000, 'FA002'),
('GE005', 'Gedung Lestari Darasati', 15000, 64000000, 'FA003');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_penyewaan` varchar(16) NOT NULL,
  `no_ktp` char(16) DEFAULT NULL,
  `no_gedung` varchar(16) DEFAULT NULL,
  `tanggal_penyewaan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `no_ktp`, `no_gedung`, `tanggal_penyewaan`) VALUES
('PYN001', '3301292210221022', 'GE005', '2024-11-05'),
('PYN002', '3301203231225001', 'GE001', '2024-11-07'),
('PYN003', '3301212186121123', 'GE004', '2024-11-09'),
('PYN004', '3301232918221002', 'GE002', '2024-11-11'),
('PYN005', '3301292210221022', 'GE003', '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'igo', '$2y$10$1/SjIOAgWMnf2PIpQcYz..8zG7zXzeOqFyB7XVB09ZrmdOJ4InU4e', 'Igo PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`no_gedung`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `no_ktp` (`no_ktp`),
  ADD KEY `no_gedung` (`no_gedung`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gedung`
--
ALTER TABLE `gedung`
  ADD CONSTRAINT `gedung_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`);

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `anggota` (`no_ktp`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`no_gedung`) REFERENCES `gedung` (`no_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
