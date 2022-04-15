-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 04:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `ID_Dosen` int(11) NOT NULL,
  `Nama_Dosen` varchar(255) NOT NULL,
  `Email_Dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`ID_Dosen`, `Nama_Dosen`, `Email_Dosen`) VALUES
(2, 'MM Irfan', 'irfans@its.ac.id'),
(3, 'Wahyuddin', 'wahyuddin@its.ac.id'),
(4, 'Dini Navastara', 'dininavastara@its.ac.id'),
(5, 'Edy Subali', 'edysubali@its.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `list_mk`
--

CREATE TABLE `list_mk` (
  `id_LMK` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_MK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `list_mk`
--

INSERT INTO `list_mk` (`id_LMK`, `id_mhs`, `id_MK`) VALUES
(3, 5, 10),
(4, 5, 9),
(5, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(255) DEFAULT NULL,
  `nrp_mhs` varchar(255) DEFAULT NULL,
  `email_mhs` varchar(255) DEFAULT NULL,
  `jurusan_mhs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama_mhs`, `nrp_mhs`, `email_mhs`, `jurusan_mhs`) VALUES
(5, 'Hikmah Hanifa', '1234567', 'hikmah.18023@mhs.its.ac.id', 'Teknik Industri'),
(6, 'Tsania Az Zahra', '6181373', 'tsania.19051@mhs.its.ac.id', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `ID_MK` int(11) NOT NULL,
  `ID_DOSEN` int(11) DEFAULT NULL,
  `Nama_MK` varchar(255) NOT NULL,
  `Lokasi_MK` varchar(100) NOT NULL,
  `Waktu_MK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`ID_MK`, `ID_DOSEN`, `Nama_MK`, `Lokasi_MK`, `Waktu_MK`) VALUES
(9, 2, 'Pemrograman Perangkat Bergerak', 'Gedung Informatika | IF-107A', '07.00 - 09.50'),
(10, 2, 'Kecerdasan Komputasional', 'Gedung Informatika | IF-107A', '16.00 - 18.50'),
(11, 4, 'Big Data', 'Gedung Informatika | IF-107A', '07.00 - 09.50'),
(12, 4, 'Bahasa Indonesia', 'Gedung Informatika | IF-107A', '07.00 - 09.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`ID_Dosen`);

--
-- Indexes for table `list_mk`
--
ALTER TABLE `list_mk`
  ADD PRIMARY KEY (`id_LMK`) USING BTREE,
  ADD KEY `id_MK` (`id_MK`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`) USING BTREE;

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`ID_MK`),
  ADD KEY `ID_DOSEN` (`ID_DOSEN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `ID_Dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_mk`
--
ALTER TABLE `list_mk`
  MODIFY `id_LMK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `ID_MK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_mk`
--
ALTER TABLE `list_mk`
  ADD CONSTRAINT `list_mk_ibfk_1` FOREIGN KEY (`id_MK`) REFERENCES `mata_kuliah` (`ID_MK`),
  ADD CONSTRAINT `list_mk_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`ID_DOSEN`) REFERENCES `dosen` (`ID_Dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
