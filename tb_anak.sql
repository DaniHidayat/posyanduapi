-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2023 at 10:23 AM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1606221_db_posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anak`
--

CREATE TABLE `tb_anak` (
  `id_anak` int(11) NOT NULL,
  `kode_anak` varchar(50) NOT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `lingkar_lengan` int(11) DEFAULT NULL,
  `lingkar_kepala` int(11) DEFAULT NULL,
  `kode_alat_posyandu` varchar(50) DEFAULT NULL,
  `suhu_anak` int(11) DEFAULT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anak`
--
ALTER TABLE `tb_anak`
  ADD PRIMARY KEY (`id_anak`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anak`
--
ALTER TABLE `tb_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
