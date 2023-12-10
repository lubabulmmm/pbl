-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 03:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbl_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(250) NOT NULL,
  `id` varchar(20) NOT NULL,
  `nama_user` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `password` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `id`, `nama_user`, `level`, `gambar`, `password`) VALUES
('jdexampledoe@gmail.com', '19993003', 'John Doe', 'user', 'profile.png', '$2y$10$SwfLVj6cM0SDJI9aFMRqEOk9WrScg0qxBNm6L6RgECzG.YbSNVI1K'),
('jurgenthboss@kop.co.uk', '20142023', 'Jurgen Klopp', 'admin', 'profile.png', '$2y$10$YCG9cLedGT/9ixB.piTpIeeWCINmwAXEC7wwVooyeRKxrhlavfmv6'),
('pepteam@gmail.com', '20162023', 'Pep Guardiola', 'admin', 'profile.png', '$2y$10$/7gCfTAbCY8PS9OipU4DHuWCUvClMsScY42d77JzD/gU.WEx3wOn2'),
('superadmin@vok.ub.ac.id', '20222025', 'Superadmin', 'superadmin', 'profile.png', '$2y$10$pTRDr8V/tgzuJuFkUb5ng.3FTkMLDQgIhi6lAhoggv9dzBQK02yOK'),
('supes13@gmail.com', '45019279', 'Michael Joe Doe', 'user', 'profile.png', '$2y$10$K0DM9yiOx0ftYxwZ4c3xROdEMnhKPxxBqFn2839.XHZ1uex.fK1SW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `nip` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
