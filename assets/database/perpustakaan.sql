-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 03:27 PM
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
  `kategori_buku` varchar(255) NOT NULL,
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

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori_buku`, `isbn`, `penulis`, `penerbit`, `tahun_buku`, `sampul`, `lampiran`, `keterangan`, `tgl_masuk`, `status`, `is_deleted`) VALUES
(1, 'Test', 'Teknologi', '9785552220013', 'Jarwo', 'Sopo.ltd', '2019', 'buku.png', 'buku.pdf', 'ahahahaha', '2022-11-21 20:55:11', 1, 0),
(2, 'aidi', 'Teknologi', '9785552220012', 'isdias', 'diusidu', '2019', 'buku.png', 'buku.pdf', '', '2022-11-21 21:03:29', 1, 0),
(3, 'SAHDJH', 'Agama', '9785552220123', 'HDJHSA', 'DHAJH', '2013', 'buku.png', 'buku.pdf', '', '2022-11-21 21:07:56', 0, 0),
(4, 'skjdak', 'Agama', '9785552222012', 'kdjkjk', 'jqwjkdjk', '2020', 'buku.png', 'buku.pdf', '', '2022-11-21 21:10:13', 1, 0),
(5, 'asjdkj', 'Agama', '9785552222013', 'kjdkajk', 'jkdakj', '2014', 'buku.png', 'buku.pdf', '', '2022-11-21 21:11:21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role`, `is_active`, `is_deleted`, `date_created`) VALUES
(1, 'Rifqy Attaufi', 'rifqy1406@gmail.com', 'default.jpg', '$2y$10$/L5gGHtUAz/tO.kdVfnyuO3Zjo3OJnP5oZsuNGGF.jnUy/S.CqH3C', 1, 1, 0, 1668953612),
(2, 'Rifqy Attaufi', 'rifqy140@gmail.com', 'default.jpg', '$2y$10$wrz6GrT8yQmwVT9XH51ViePuVrc6bZZJaiV2Kbf7Je1gOU2Q9ZyNu', 1, 1, 0, 1668955346),
(3, 'RYAN ADI SAPUTRA', 'ryan.adi.21@student.se.ittelkom-sby.ac.id', 'default.jpg', '$2y$10$H79b1liD349OdeIqjaZbeOAhgja7jry06Wfm/YKd5790VWvUhVJV2', 1, 1, 0, 1669021718);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

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
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
