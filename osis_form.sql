-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 03:19 AM
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
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `osis_form`
--

CREATE TABLE `osis_form` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `pilihan_divisi` varchar(50) NOT NULL,
  `pilihan_bph` varchar(50) DEFAULT NULL,
  `pilihan_sekbid` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto_path` mediumblob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osis_form`
--

INSERT INTO `osis_form` (`id`, `nama`, `kelas`, `no_wa`, `pilihan_divisi`, `pilihan_bph`, `pilihan_sekbid`, `alasan`, `visi`, `misi`, `foto_path`, `created_at`, `timestamp`) VALUES
(11, 'Wildan', 'TKJ', '0896715438754', 'MPK', 'Sekretaris', 'KWU', 'edeedededededed', 'ssssssssssssssssssssssssssssssssss', 'ssddddddddddddddddddddddd', 0x75706c6f61642f494d472d36363861353939316338326530352e34313330353937342e6a7067, '2024-07-07 09:02:09', '2024-07-07 09:02:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `osis_form`
--
ALTER TABLE `osis_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `osis_form`
--
ALTER TABLE `osis_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
