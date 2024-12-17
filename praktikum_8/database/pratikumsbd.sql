-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 12:53 PM
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
-- Database: `pratikumsbd`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPelanggan` (IN `id` VARCHAR(16))   begin
	delete from tbpelanggan WHERE idpelanggan = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahPelanggan` (OUT `hasil` INT)   begin 
	select count(*) into hasil from tbpelanggan;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahPelangganSecond` (IN `alamat` VARCHAR(64), OUT `hasil` INT)   begin
	select count(*) into hasil from tbpelanggan
	where alamatpelanggan = alamat;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahPelanggan` (IN `idpelanggan` VARCHAR(16), IN `namapelanggan` VARCHAR(64), IN `alamatpelanggan` VARCHAR(64), IN `teleponpelanggan` VARCHAR(16))   begin 
insert into tbpelanggan(idpelanggan, namapelanggan, alamatpelanggan, teleponpelanggan)
values(idpelanggan, namapelanggan, alamatpelanggan, teleponpelanggan);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ubahPelanggan` (IN `id` VARCHAR(16), IN `nama` VARCHAR(64), IN `alamat` VARCHAR(64), IN `telepon` VARCHAR(16))   begin 
	update tbpelanggan set 
	namapelanggan = nama,
	alamatpelanggan = alamat,
	teleponpelanggan = telepon
	where idpelanggan = id;
end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jumlahStokFunction` (`id` INT(11)) RETURNS INT(11)  begin
	declare jumlah int;
	select stok into jumlah from tbproduk
	where idproduk = id;
	return jumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlahStokFunctionSecond` (`id` INT(11)) RETURNS INT(11)  begin
	declare jumlah int;
	select sum(stok) into jumlah from tbproduk
	where idkategori = id;
	return jumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlahStokFunctionThird` (`p_harga` INT(11)) RETURNS INT(11)  begin
	declare jumlah int;
	select count(harga) into jumlah from tbproduk
	where harga < p_harga;
	return jumlah;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailbeli`
--

CREATE TABLE `tbdetailbeli` (
  `iddetailbeli` int(11) NOT NULL,
  `notabeli` varchar(15) DEFAULT NULL,
  `idproduk` int(15) DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdetailbeli`
--

INSERT INTO `tbdetailbeli` (`iddetailbeli`, `notabeli`, `idproduk`, `jumlah`, `harga`, `subtotal`) VALUES
(1, 'PBN-1', 2, 2, 8000, 8000),
(2, 'PBN-2', 3, 3, 9000, 9000),
(3, 'PBN-3', 4, 1, 200000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailjual`
--

CREATE TABLE `tbdetailjual` (
  `notajual` varchar(15) NOT NULL,
  `idproduk` int(15) DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdetailjual`
--

INSERT INTO `tbdetailjual` (`notajual`, `idproduk`, `jumlah`, `harga`, `subtotal`) VALUES
('PJN-1', 2, 10, 40000, 40000),
('PJN-2', 3, 10, 30000, 30000),
('PJN-3', 4, 3, 600000, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `tbkaryawan`
--

CREATE TABLE `tbkaryawan` (
  `idkaryawan` int(11) NOT NULL,
  `namakaryawan` varchar(50) DEFAULT NULL,
  `teleponkaryawan` varchar(15) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `sandi` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbkaryawan`
--

INSERT INTO `tbkaryawan` (`idkaryawan`, `namakaryawan`, `teleponkaryawan`, `jabatan`, `sandi`) VALUES
(1, 'Wono Lukman', '082832732731', 'Karyawan', 'KA002'),
(2, 'Bambang ', '081724827328', 'Karyawan', 'KA001'),
(3, 'Samsul Arip', '089646354361', 'Karyawan Gudang', 'KAG001'),
(4, 'Gunawan Wahyudi', '081232763223', 'Karyawan Gudang', 'KAG002'),
(5, 'Zahidin Maulana', '089323265121', 'Karyawan', 'KA003');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `idkategori` int(3) NOT NULL,
  `namakategori` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`idkategori`, `namakategori`) VALUES
(1, 'Peralatan Pribadi'),
(2, 'Buku & Majalah'),
(3, 'Elektronik'),
(4, 'Buku & Alat Tulis'),
(5, 'Perlengkapan Rumah'),
(6, 'Makanan & Minuman'),
(7, 'Pakaian Pria'),
(8, 'Pakaian Wanita'),
(9, 'Hijab dan Sarung'),
(10, 'Peralatan Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `idpelanggan` int(10) NOT NULL,
  `namapelanggan` varchar(50) DEFAULT NULL,
  `alamatpelanggan` varchar(20) DEFAULT NULL,
  `teleponpelanggan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`idpelanggan`, `namapelanggan`, `alamatpelanggan`, `teleponpelanggan`) VALUES
(1, 'Farhan Wahyu Laksamana', 'Cianjur', '081723625536'),
(2, 'Darmawan', 'Tangerang Selatan', '0896434342'),
(3, 'Setia Budi', 'Bekasi', '08343746374'),
(4, 'Anans', 'Bekasi', '08983847384'),
(5, 'Anindya Saputri', 'Bogor', '081323762476'),
(6, 'Lutfi Prasetyo', 'Bandung Raya', '08912545273'),
(7, 'Abdul Gunawan', 'Serang', '08937267246'),
(8, 'Pratama Wisnu', 'Kuningan', '081332117472'),
(9, 'Windi Wulan Purnomo', 'Bandung Raya', '08112166325'),
(10, 'Arief Pamungkas', 'Ciamis', '085121425144');

-- --------------------------------------------------------

--
-- Table structure for table `tbpemasok`
--

CREATE TABLE `tbpemasok` (
  `idpemasok` int(5) NOT NULL,
  `namapemasok` varchar(50) DEFAULT NULL,
  `kontak` varchar(25) DEFAULT NULL,
  `pic` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpemasok`
--

INSERT INTO `tbpemasok` (`idpemasok`, `namapemasok`, `kontak`, `pic`) VALUES
(1, 'PT Kertamangun', '081252142139', 'Jamal Nurjan Kamsudin '),
(2, 'PT Makmur Sentosa', '082367273621', 'Chien Xie Jin'),
(3, 'PT Marmindo Antariksa', '089472872231', 'Jonathan Lamaka'),
(4, 'PT Murni Jaya', '089463746364', 'Lukman Puji Anto'),
(5, 'PT Rindu Kasih', '089323613131', 'Erning Wahyu Siti');

-- --------------------------------------------------------

--
-- Table structure for table `tbpembelian`
--

CREATE TABLE `tbpembelian` (
  `idpembelian` int(11) NOT NULL,
  `notabeli` varchar(64) NOT NULL,
  `tglbeli` date DEFAULT NULL,
  `idkaryawan` int(5) DEFAULT NULL,
  `idpemasok` int(5) DEFAULT NULL,
  `totalbeli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpembelian`
--

INSERT INTO `tbpembelian` (`idpembelian`, `notabeli`, `tglbeli`, `idkaryawan`, `idpemasok`, `totalbeli`) VALUES
(1, 'RRA18AA8', '2024-11-25', 5, 5, 600000),
(2, 'AE1A1AOP', '2024-11-23', 4, 4, 100000),
(3, 'IFZ27JWU', '2024-11-24', 3, 4, 200000),
(4, 'JRGQX5W1', '2024-11-26', 3, 4, 2000000),
(5, 'C971BBAA', '2024-11-26', 1, 3, 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbpenjualan`
--

CREATE TABLE `tbpenjualan` (
  `idpenjualan` int(11) NOT NULL,
  `notajual` varchar(15) DEFAULT NULL,
  `tgljual` date DEFAULT NULL,
  `idkaryawan` int(5) DEFAULT NULL,
  `idpelanggan` int(10) DEFAULT NULL,
  `totaljual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpenjualan`
--

INSERT INTO `tbpenjualan` (`idpenjualan`, `notajual`, `tgljual`, `idkaryawan`, `idpelanggan`, `totaljual`) VALUES
(1, 'PJN-1', '2024-11-26', 2, 3, 40000),
(2, 'PJN-2', '2024-11-25', 3, 5, 30000),
(3, 'PJN-3', '2024-11-26', 3, 2, 600000),
(4, 'PJN-2', '2024-11-26', 2, 10, 30000),
(5, 'PJN-3', '2024-11-24', 1, 9, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE `tbproduk` (
  `idproduk` int(15) NOT NULL,
  `namaproduk` varchar(70) DEFAULT NULL,
  `idkategori` int(3) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`idproduk`, `namaproduk`, `idkategori`, `stok`, `harga`) VALUES
(1, 'Realme C11', 3, 5, 1500000),
(2, 'Buku Tulis 52 Lembar', 4, 100, 4000),
(3, 'Bolpoin', 4, 100, 3000),
(4, 'Blender LG', 3, 10, 200000),
(5, 'Sarung Gajah Duduk', 9, 200, 80000),
(6, 'Kemeja Putih Lengan Panjang Pria', 7, 150, 100000),
(7, 'Bor Yundo', 10, 50, 800000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbdetailbeli`
--
ALTER TABLE `tbdetailbeli`
  ADD PRIMARY KEY (`iddetailbeli`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `tbdetailjual`
--
ALTER TABLE `tbdetailjual`
  ADD PRIMARY KEY (`notajual`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tbpemasok`
--
ALTER TABLE `tbpemasok`
  ADD PRIMARY KEY (`idpemasok`);

--
-- Indexes for table `tbpembelian`
--
ALTER TABLE `tbpembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `idkaryawan` (`idkaryawan`),
  ADD KEY `idpemasok` (`idpemasok`),
  ADD KEY `tbpembelian_ibfk_3` (`notabeli`);

--
-- Indexes for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `idkaryawan` (`idkaryawan`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `notajual` (`notajual`);

--
-- Indexes for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetailbeli`
--
ALTER TABLE `tbdetailbeli`
  MODIFY `iddetailbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `idkategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `idpelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbpemasok`
--
ALTER TABLE `tbpemasok`
  MODIFY `idpemasok` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpembelian`
--
ALTER TABLE `tbpembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  MODIFY `idpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbproduk`
--
ALTER TABLE `tbproduk`
  MODIFY `idproduk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbdetailbeli`
--
ALTER TABLE `tbdetailbeli`
  ADD CONSTRAINT `tbdetailbeli_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `tbproduk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbdetailjual`
--
ALTER TABLE `tbdetailjual`
  ADD CONSTRAINT `tbdetailjual_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `tbproduk` (`idproduk`);

--
-- Constraints for table `tbpembelian`
--
ALTER TABLE `tbpembelian`
  ADD CONSTRAINT `tbpembelian_ibfk_1` FOREIGN KEY (`idkaryawan`) REFERENCES `tbkaryawan` (`idkaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpembelian_ibfk_2` FOREIGN KEY (`idpemasok`) REFERENCES `tbpemasok` (`idpemasok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  ADD CONSTRAINT `tbpenjualan_ibfk_1` FOREIGN KEY (`idkaryawan`) REFERENCES `tbkaryawan` (`idkaryawan`),
  ADD CONSTRAINT `tbpenjualan_ibfk_2` FOREIGN KEY (`idpelanggan`) REFERENCES `tbpelanggan` (`idpelanggan`),
  ADD CONSTRAINT `tbpenjualan_ibfk_3` FOREIGN KEY (`notajual`) REFERENCES `tbdetailjual` (`notajual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD CONSTRAINT `tbproduk_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `tbkategori` (`idkategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
