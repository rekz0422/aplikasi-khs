-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 11:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NID` varchar(15) NOT NULL,
  `NAMA_DOSEN` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NID`, `NAMA_DOSEN`, `ALAMAT`) VALUES
('D01', 'Tarjo Sutarjo', 'Ambon'),
('D02', 'Susi Susanti', 'Banda'),
('D03', 'Mahadi Widadi', 'Namlea'),
('D04', 'Andi Supriadi', 'Namlea'),
('D05', 'Darari Yogitisna', 'Surabaya'),
('D06', 'Dhea', 'Ambon'),
('D07', 'Mahadi', 'Ambon');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(5) NOT NULL,
  `huruf_grade` char(2) NOT NULL,
  `no_grade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id_grade`, `huruf_grade`, `no_grade`) VALUES
(1, 'A', 4),
(2, 'B', 3),
(3, 'C', 2),
(4, 'D', 1),
(5, 'E', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(15) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `kaprodi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `kaprodi`) VALUES
('J01', 'Sistem Informasi', 'D01'),
('J02', 'Teknik Informatika', 'D02'),
('J03', 'Manajemen Informatika', 'D03'),
('J04', 'Komputerisasi Akuntansi', 'D04'),
('J05', 'Pariwisata', 'D05'),
('J06', 'Server Administrator', 'D06'),
('J07', 'Administrator', 'D02');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `id_khs` char(20) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `sks` int(5) NOT NULL,
  `grade` int(2) NOT NULL,
  `total_nilai_bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`id_khs`, `matakuliah`, `sks`, `grade`, `total_nilai_bobot`) VALUES
('1', 'Prak. Web Programming', 4, 4, 16),
('2', 'Web Programming', 4, 3, 12),
('3', 'Prak. Pemrograman Web', 2, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(20) NOT NULL,
  `NAMA_MHS` varchar(100) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `KODE_JURUSAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `NAMA_MHS`, `ALAMAT`, `KODE_JURUSAN`) VALUES
('1900001', 'Mahmud', 'STAIN', 'J01'),
('1900002', 'Mahadi', 'Galunggung', 'J02'),
('1900003', 'Nanda Wulandari', 'Tulehu', 'J02'),
('1900004', 'Sofyan Kaliky', 'Luhu', 'J01'),
('1900005', 'Susi Susanti', 'Namlea', 'J03'),
('1900006', 'Fikri Widadi', 'Namlea', 'J03'),
('1900007', 'Clint', 'Passo', 'J01');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_mk` varchar(15) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `kode_jurusan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_mk`, `nama_mk`, `sks`, `semester`, `kode_jurusan`) VALUES
('MK001', 'Sistem Basis Data', 3, 2, 'J01'),
('MK002', 'Prak. Sistem Basis  Data', 1, 2, 'J01'),
('MK003', 'Pengembangan Web', 3, 4, 'J01'),
('MK004', 'Prak. Pengembangan Web', 1, 4, 'J01'),
('MK005', 'Pemrograman Web', 3, 2, 'J02'),
('MK006', 'Prak. Pemrograman Web', 1, 2, 'J02'),
('MK007', 'Web Programming', 3, 2, 'J03'),
('MK008', 'Prak. Web Programming', 1, 1, 'J02'),
('MK009', 'Save_edit_delete', 3, 3, 'J06');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `ID_NILAI` int(11) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `KODE_MK` varchar(50) DEFAULT NULL,
  `UTS` int(11) DEFAULT NULL,
  `UAS` int(11) DEFAULT NULL,
  `TUGAS` int(11) DEFAULT NULL,
  `NID` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`ID_NILAI`, `NIM`, `KODE_MK`, `UTS`, `UAS`, `TUGAS`, `NID`) VALUES
(1, '1900001', 'MK001', 80, 78, 100, 'D01'),
(2, '1900001', 'MK002', 85, 70, 91, 'D02'),
(3, '1900002', 'MK003', 80, 78, 100, 'D01'),
(4, '1900002', 'MK004', 85, 70, 91, 'D02'),
(5, '1900004', 'MK004', 70, 75, 95, 'D01'),
(6, '1900007', 'MK003', 70, 75, 95, 'D01'),
(7, '1900003', 'MK005', 80, 78, 100, 'D01'),
(8, '1900004', 'MK003', 85, 70, 91, 'D02'),
(9, '1900007', 'MK004', 80, 78, 100, 'D01'),
(10, '1900005', 'MK008', 85, 70, 91, 'D02'),
(11, '1900005', 'MK007', 70, 75, 95, 'D01'),
(12, '1900003', 'MK006', 70, 75, 95, 'D01'),
(13, '1900005', 'MK003', 90, 99, 90, 'D06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NID`);
ALTER TABLE `dosen` ADD FULLTEXT KEY `NID` (`NID`,`NAMA_DOSEN`,`ALAMAT`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id_khs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`ID_NILAI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `ID_NILAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
