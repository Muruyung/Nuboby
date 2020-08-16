-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 02:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nuboby`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_atlit`
--

CREATE TABLE `tb_atlit` (
  `id` int(11) NOT NULL,
  `nama_atlit` varchar(255) NOT NULL,
  `kontingen` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `hasil_menang` int(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tatami` int(5) NOT NULL,
  `bagan` int(5) NOT NULL,
  `poin_akhir` float(5,2) NOT NULL,
  `id_turnamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atlit`
--

INSERT INTO `tb_atlit` (`id`, `nama_atlit`, `kontingen`, `gender`, `hasil_menang`, `id_jenis`, `tatami`, `bagan`, `poin_akhir`, `id_turnamen`) VALUES
(1, 'Daffa', 'UPI', 'Male', 1, 1, 1, 1, 0.00, 2),
(2, 'Tasya', 'UPI', 'Female', 1, 1, 1, 1, 0.00, 0),
(3, 'Aldino', 'UPI', 'Male', 1, 1, 1, 1, 0.00, 0),
(5, 'Erin', 'UPI', 'Female', 1, 1, 1, 1, 0.00, 0),
(6, 'Ravie', 'UPI', 'Female', 1, 1, 1, 1, 0.00, 0),
(7, 'Wahyu', 'UPI', 'Male', 1, 1, 1, 1, 20.56, 2),
(8, 'Erpan', 'UPI', 'Male', 1, 1, 1, 1, 0.00, 0),
(9, 'Ipang', 'UPI', 'Male', 1, 1, 1, 1, 0.00, 0),
(10, 'Naufal', 'UPI', 'Male', 1, 1, 1, 1, 21.08, 2),
(11, 'Putri', 'UPI', 'Female', 1, 1, 1, 1, 0.00, 2),
(12, 'Sidik', 'UPI', 'Male', 1, 1, 1, 1, 0.00, 2),
(13, 'Isti', 'UPI', 'Female', 1, 1, 1, 1, 20.24, 2),
(14, 'Avie', 'UPI', 'Female', 1, 1, 1, 1, 21.36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `ronde` int(5) NOT NULL,
  `id_turnamen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id`, `kelas`, `ronde`, `id_turnamen`) VALUES
(1, 'Senior', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_juri`
--

CREATE TABLE `tb_juri` (
  `id` int(11) NOT NULL,
  `id_turnamen` int(11) NOT NULL,
  `nomor_juri` int(5) NOT NULL,
  `tatami` int(5) NOT NULL,
  `status` int(2) NOT NULL,
  `poinTec` float(5,1) NOT NULL,
  `id_atlit` int(11) NOT NULL,
  `poinAth` float(5,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_juri`
--

INSERT INTO `tb_juri` (`id`, `id_turnamen`, `nomor_juri`, `tatami`, `status`, `poinTec`, `id_atlit`, `poinAth`) VALUES
(2, 2, 1, 1, 0, 0.0, 0, 0.0),
(3, 2, 2, 1, 0, 0.0, 0, 0.0),
(4, 2, 3, 1, 0, 0.0, 0, 0.0),
(5, 2, 4, 1, 0, 0.0, 0, 0.0),
(7, 2, 5, 1, 0, 0.0, 0, 0.0),
(8, 2, 6, 1, 0, 0.0, 0, 0.0),
(9, 2, 7, 1, 0, 0.0, 0, 0.0),
(10, 2, 1, 2, 0, 0.0, 6, 0.0),
(11, 2, 2, 2, 0, 0.0, 6, 0.0),
(12, 2, 3, 2, 0, 0.0, 6, 0.0),
(13, 2, 4, 2, 0, 0.0, 6, 0.0),
(14, 2, 5, 2, 0, 0.0, 6, 0.0),
(15, 2, 6, 2, 0, 0.0, 6, 0.0),
(16, 2, 7, 2, 0, 0.0, 6, 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_turnamen`
--

CREATE TABLE `tb_turnamen` (
  `id` int(11) NOT NULL,
  `nama_turnamen` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(100) NOT NULL,
  `terisi` int(100) NOT NULL,
  `jumlah_tatami` int(100) NOT NULL,
  `jumlah_bagan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_turnamen`
--

INSERT INTO `tb_turnamen` (`id`, `nama_turnamen`, `lokasi`, `token`, `password`, `status`, `terisi`, `jumlah_tatami`, `jumlah_bagan`) VALUES
(2, 'Gabut Cup', 'Cianjur', 'tester', '123123', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_atlit`
--
ALTER TABLE `tb_atlit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_jenis_ibfk_1` (`id_turnamen`);

--
-- Indexes for table `tb_juri`
--
ALTER TABLE `tb_juri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_juri_ibfk_1` (`id_turnamen`);

--
-- Indexes for table `tb_turnamen`
--
ALTER TABLE `tb_turnamen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_atlit`
--
ALTER TABLE `tb_atlit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_juri`
--
ALTER TABLE `tb_juri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_turnamen`
--
ALTER TABLE `tb_turnamen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_atlit`
--
ALTER TABLE `tb_atlit`
  ADD CONSTRAINT `tb_atlit_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id`);

--
-- Constraints for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD CONSTRAINT `tb_jenis_ibfk_1` FOREIGN KEY (`id_turnamen`) REFERENCES `tb_turnamen` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
