-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2021 at 12:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mabac`
--

-- --------------------------------------------------------

--
-- Table structure for table `isi_kuisioner`
--

CREATE TABLE `isi_kuisioner` (
  `id` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `kode_pertanyaan` varchar(4) NOT NULL,
  `nilai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_kuisioner`
--

INSERT INTO `isi_kuisioner` (`id`, `nik`, `kode_pertanyaan`, `nilai`) VALUES
(243, 2147483647, 'P01', 5),
(244, 2147483647, 'P02', NULL),
(245, 2147483647, 'P03', NULL),
(246, 2147483647, 'P04', NULL),
(247, 2147483647, 'P05', NULL),
(248, 2147483647, 'P06', NULL),
(249, 2147483647, 'P07', NULL),
(250, 2147483647, 'P08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kode` varchar(4) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `alias` text NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `jabatan` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode`, `nik`, `nama`, `alias`, `pendidikan`, `jabatan`, `tgl_masuk`, `status`) VALUES
('', '11111111111111111111', 'DIANAA', 'DIAN', 'SMA', 'operator produksi', '2021-05-26', ''),
('', '123346457568786', 'coba', 'coba', 'SMA', 'Operator', '2021-05-25', ''),
('A01', '12345654321', 'Zuhdiana Mahmudiyah', 'Diana', 'S1', 'Admin', '2021-05-01', ''),
('', '123456788', 'Diana', 'Dian', 'S1', 'operator produksi', '2021-05-25', ''),
('A02', '1234567890', 'Bambang Pamungkas', 'Bams', 'SMA', 'Operator', '2021-05-19', '');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `kode` varchar(4) NOT NULL,
  `nama` text NOT NULL,
  `c01` int(3) NOT NULL,
  `c02` int(3) NOT NULL,
  `c03` int(3) NOT NULL,
  `c04` int(3) NOT NULL,
  `c05` int(3) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`kode`, `nama`, `c01`, `c02`, `c03`, `c04`, `c05`, `status`) VALUES
('A01', 'Zuhdiana Mahmudiyah', 5, 3, 4, 5, 5, ''),
('A02', 'Bambang Pamungkas', 4, 3, 4, 3, 5, ''),
('A03', 'coba', 100, 2, 3, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode` varchar(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tipe` varchar(7) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode`, `nama`, `tipe`, `bobot`) VALUES
('C01', 'Absensi', 'benefit', 5),
('C02', 'Disiplin Kerja', 'benefit', 5),
('C03', 'Pendidikan', 'benefit', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `kode` varchar(3) NOT NULL,
  `pertanyaan` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`kode`, `pertanyaan`, `status`) VALUES
('P01', 'apa kamu bekerja dengan benarrrrrrr?', ''),
('P02', 'Apa kamu bekerja dengan sungguh-sungguh?', ''),
('P03', 'Apakah kamu bertanggung jawab terhadap pekerjaan?', ''),
('P04', 'Tes?', ''),
('P05', 'tes satu', ''),
('P06', 'tes dua', ''),
('P07', 'tes empat', ''),
('P08', 'tes lima', '');

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE `opsi` (
  `nilai` int(1) NOT NULL,
  `opsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`nilai`, `opsi`) VALUES
(1, 'Sangat Tidak Baik'),
(2, 'Tidak Baik'),
(3, 'Cukup Baik'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik` int(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `nama` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nik`, `username`, `nama`, `password`, `role_id`) VALUES
(12345678, 'SuperAdmin', 'Zuhdiana Mahmudiyah', '123456', 1),
(123451111, 'diana', 'diana', '123456', 2),
(1234567890, 'Bambang', 'Bambang Pamungkas', '123456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `deskripsi`) VALUES
(1, 'Admin'),
(2, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isi_kuisioner`
--
ALTER TABLE `isi_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `opsi`
--
ALTER TABLE `opsi`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isi_kuisioner`
--
ALTER TABLE `isi_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
