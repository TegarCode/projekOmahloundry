-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 08:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'vioneta0730@gmail.com', '1234'),
(2, 'ciakireina@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `narasumber` varchar(100) NOT NULL,
  `tanggal_up` varchar(100) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `narasumber`, `tanggal_up`, `judul_berita`, `isi_berita`, `foto`) VALUES
(8, 'Fulan Success', '2024-05-21', 'Maintenance', '404', 'valerie-v-8CACa5kjqMM-unsplash.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail`
-- (See below for the actual view)
--
CREATE TABLE `detail` (
`nomor_identitas` varchar(255)
,`namaCustomer` varchar(255)
,`alamatCustomer` varchar(100)
,`telpCustomer` varchar(255)
,`tgl_cuci` varchar(255)
,`tgl_selesai` varchar(255)
,`pickup` varchar(10)
,`jenisPemesanan` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `satuan_berat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `harga`, `satuan_berat`, `foto`) VALUES
(6, 'Cuci Basah', '100', 'Kilogram', 'cucibasah.png'),
(7, 'Cuci Kering', '100', 'Kilogram', 'cucikering.png'),
(8, 'Cuci Setrika', '100', 'Kilogram', 'seterika.png'),
(9, 'Dry Cleaning', '100', 'Kilogram', 'drycleaning.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nomor_identitas` varchar(255) NOT NULL,
  `namaPelanggan` varchar(255) NOT NULL,
  `alamatPelanggan` varchar(255) NOT NULL,
  `telpPelanggan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nomor_identitas`, `namaPelanggan`, `alamatPelanggan`, `telpPelanggan`) VALUES
(26, '2105240001', 'Fulan Success', 'Indonesia', '808');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nomor_identitas` varchar(255) NOT NULL,
  `namaCustomer` varchar(255) NOT NULL,
  `alamatCustomer` varchar(100) NOT NULL,
  `telpCustomer` varchar(255) NOT NULL,
  `tgl_cuci` varchar(255) NOT NULL,
  `tgl_selesai` varchar(255) NOT NULL,
  `pickup` varchar(10) NOT NULL,
  `jenisPemesanan` varchar(255) NOT NULL,
  `status_laundry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nomor_identitas`, `namaCustomer`, `alamatCustomer`, `telpCustomer`, `tgl_cuci`, `tgl_selesai`, `pickup`, `jenisPemesanan`, `status_laundry`) VALUES
(30, '2105240001', 'Fulan Success', 'Indonesia', '808', '2024-05-21', '2024-05-22', 'Ya', 'Dry Cleaning', 0);

-- --------------------------------------------------------

--
-- Structure for view `detail`
--
DROP TABLE IF EXISTS `detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail`  AS SELECT `pesan`.`nomor_identitas` AS `nomor_identitas`, `pesan`.`namaCustomer` AS `namaCustomer`, `pesan`.`alamatCustomer` AS `alamatCustomer`, `pesan`.`telpCustomer` AS `telpCustomer`, `pesan`.`tgl_cuci` AS `tgl_cuci`, `pesan`.`tgl_selesai` AS `tgl_selesai`, `pesan`.`pickup` AS `pickup`, `pesan`.`jenisPemesanan` AS `jenisPemesanan` FROM `pesan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
