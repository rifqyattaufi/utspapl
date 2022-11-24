-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 01:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_buku` varchar(128) NOT NULL,
  `sampul` varchar(255) NOT NULL DEFAULT 'buku.png',
  `lampiran` varchar(255) NOT NULL DEFAULT 'buku.pdf',
  `keterangan` text NOT NULL,
  `tgl_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_kategori`, `isbn`, `penulis`, `penerbit`, `tahun_buku`, `sampul`, `lampiran`, `keterangan`, `tgl_masuk`, `status`, `is_deleted`) VALUES
(1, 'Testjhajdhs', 1, '9785552220013', 'Jarwo', 'Sopo.ltd', '2019', 'f709c442ebea7a8a69f20e48b1101458.JPG', '03223cbd47bdda022a0a8d751e9eea14.pdf', 'ahahahaha', '2022-11-21 20:55:11', 1, 0),
(2, 'aidi', 1, '9785552220012', 'isdias', 'diusidu', '2019', 'buku.png', 'buku.pdf', '', '2022-11-21 21:03:29', 1, 0),
(3, 'SAHDJH', 2, '9785552220123', 'HDJHSA', 'DHAJH', '2013', 'buku.png', 'buku.pdf', '', '2022-11-21 21:07:56', 0, 0),
(4, 'skjdak', 2, '9785552222012', 'kdjkjk', 'jqwjkdjk', '2020', 'buku.png', 'buku.pdf', '', '2022-11-21 21:10:13', 1, 0),
(5, 'asjdkj', 2, '9785552222013', 'kjdkajk', 'jkdakj', '2014', 'buku.png', 'buku.pdf', '', '2022-11-21 21:11:21', 1, 1),
(6, 'asjdh', 1, '9785552221212', 'ashdjh', 'djash', '2022', 'buku.png', 'buku.pdf', 'sads', '2022-11-22 19:35:12', 1, 0),
(7, 'ajshdjh', 2, '9786662220012', 'hsadhahd', 'jahsdj', '2022', '1135b7cc57b3b203ccff00e4aa700e74.png', '868173476e7642cf159c1fc4fbfa4998.pdf', '', '2022-11-23 22:44:19', 1, 0),
(8, 'buku kalkulus', 3, '9861384736218', 'bagus', 'setyoadi', '2022', '0240786b292f9861afbc0869b44200a5.png', '53d682f39e72a7ac20f77341cd07ae07.pdf', 'kalkulus', '2022-11-24 14:15:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `is_deleted`) VALUES
(1, 'Teknology', 0),
(2, 'Agama', 0),
(3, 'Mistery', 0),
(4, 'drama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_deleted`, `date_created`) VALUES
(1, 'Rifqy Attaufi', 'rifqy1406@gmail.com', '$2y$10$/L5gGHtUAz/tO.kdVfnyuO3Zjo3OJnP5oZsuNGGF.jnUy/S.CqH3C', 1, 0, 1668953612),
(3, 'RYAN ADI SAPUTRA', 'ryan.adi.21@student.se.ittelkom-sby.ac.id', '$2y$10$H79b1liD349OdeIqjaZbeOAhgja7jry06Wfm/YKd5790VWvUhVJV2', 1, 0, 1669021718),
(4, 'admin', 'admin@gmail.com', '$2y$10$255GORWi3Yr35kK3yqz/5.EWA6Cl9Tx3rYbwfxPT0Q1hNAkQCL2r.', 0, 0, 1669269118),
(5, 'User Baru', 'userbaru@gmail.com', '$2y$10$Bv.fPBLtCIXyYqif0KmCCuJdTLxYkf/M979HilDmJ7cvLob92VnjC', 1, 0, 1669273987);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
