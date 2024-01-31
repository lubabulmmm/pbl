-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 06:40 AM
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
-- Table structure for table `bunch`
--

CREATE TABLE `bunch` (
  `bunch_id` int(20) NOT NULL,
  `bunch_name` varchar(250) NOT NULL,
  `leader_id` varchar(250) NOT NULL,
  `project_id` int(20) NOT NULL,
  `grade` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bunch`
--

INSERT INTO `bunch` (`bunch_id`, `bunch_name`, `leader_id`, `project_id`, `grade`) VALUES
(1, 'SI A7', 'ifan@gmail.com', 43, 60),
(2, 'SI A6', 'kelvindwipangga15@gmail.com', 43, 0),
(3, 'SI B3', 'marcelladwi@gmail.com', 44, 60),
(10, 'SI A4', 'azeezee12@gmail.com', 44, 0),
(12, 'SI C6', 'ifan@gmail.com', 48, 0),
(13, 'TI C6', 'pedro123@gmail.com', 49, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bunch_member`
--

CREATE TABLE `bunch_member` (
  `id` int(20) NOT NULL,
  `bunch_id` int(20) NOT NULL,
  `member_id` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bunch_member`
--

INSERT INTO `bunch_member` (`id`, `bunch_id`, `member_id`, `role`) VALUES
(1, 1, 'lubabullm@gmail.com', 'Back End'),
(2, 1, 'icad@student.ub.ac.id', 'Business Analyst'),
(3, 2, 'arfi@gmail.com', 'Back End'),
(4, 3, 'nacellaa@gmail.com', 'Back End'),
(6, 10, 'makelor123@gmail.com', 'Front End'),
(7, 10, 'pedro123@gmail.com', 'Business Analyst'),
(8, 12, 'pedro123@gmail.com', 'System Analyst'),
(9, 12, 'kelvindwipangga15@gmail.com', 'Front End'),
(10, 13, 'nacellaa@gmail.com', 'System Analyst'),
(12, 1, 'azeezee12@gmail.com', 'System Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(20) NOT NULL,
  `comment_title` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date_submit` varchar(250) NOT NULL,
  `bunch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_title`, `comment`, `date_submit`, `bunch_id`) VALUES
(5, 'Konsultasi', 'Sedikit menambahkan dari notulensi yang telah kalian submit, untuk zona waktu yang dipakai di web adalah Waktu Indonesia Barat', '2024-01-19 21:41:02', 1),
(6, 'Lanjutkan laporan', 'Tolong minggu ke 4 fokus ke laporan UTS', '2024-01-22 16:43:46', 1),
(7, 'Mana ini', 'Kok belum ngapa ngapain', '2024-01-23 11:12:46', 2),
(8, 'Pengumpulan', 'segera di kumpulkan', '2024-01-23 12:04:51', 1),
(9, 'Minggu Ke-5', 'Untuk minggu ke-5 saya harap semuanya fokus pada proses pengkodean', '2024-01-29 15:34:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `features_project`
--

CREATE TABLE `features_project` (
  `id` int(20) NOT NULL,
  `project_id` int(20) NOT NULL,
  `feature_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_project`
--

CREATE TABLE `file_project` (
  `id` int(20) NOT NULL,
  `project_id` int(20) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  `upload_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(20) NOT NULL,
  `nama_proyek` varchar(500) NOT NULL,
  `deskripsi_proyek` varchar(2500) NOT NULL,
  `id_user` varchar(250) NOT NULL,
  `req` varchar(2500) NOT NULL,
  `minggu` int(10) NOT NULL,
  `status_show` varchar(10) NOT NULL,
  `feature_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `deskripsi_proyek`, `id_user`, `req`, `minggu`, `status_show`, `feature_id`) VALUES
(43, 'Sistem Informasi Manajemen Rapat', 'Sistem Informasi Manajemen Rapat (SIM-Rapat) adalah aplikasi atau platform yang dirancang khusus untuk membantu dalam pengelolaan dan pelaksanaan rapat di sebuah organisasi.', 'jurgenthboss@kop.co.uk', 'Perencanaan Rapat, Manajemen Agenda, Konfirmasi Kehadiran dan Pemantauan Rapat', 8, 'Yes', 43),
(44, 'Sistem Informasi Antrian Pujasera', 'Sistem Informasi Antrian adalah solusi teknologi yang dirancang untuk mengelola dan mengoptimalkan proses antrian di berbagai jenis organisasi atau layanan, seperti rumah sakit, pusat perbelanjaan, bank, kantor pemerintah, dan tempat-tempat lainnya yang menerima layanan publik.', 'jurgenthboss@kop.co.uk', 'Pendaftaran dan Pengambilan Nomor Antrian, Panggilan dan Pemanggilan Antrian dan Manajemen Antrian', 8, 'No', 44),
(48, 'Sistem Informasi Pajak', 'Sistem informasi perpajakan merupakan suatu sistem yang dirancang untuk membantu pengelolaan dan pengendalian terkait bidang keuangan dan perpajakan.', 'vincent@gmail.com', 'Sistem informasi perpajakan menyediakan informasi yang dibutuhkan untuk memenuhi tujuan-tujuan manajemen dalam bidang perpajakan.', 9, 'No', 2),
(49, 'Website PSIK Vokasi', 'Website buat apa ajalah', 'vincent@gmail.com', 'menfess', 10, 'No', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(20) NOT NULL,
  `bunch_id` int(20) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `status_req` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `bunch_id`, `user_id`, `role`, `status_req`) VALUES
(1, 13, 'arfi@gmail.com', 'Front End', 'Belum Diterima'),
(2, 13, 'kelvindwipangga15@gmail.com', 'System Analyst', 'Belum Diterima'),
(3, 1, 'makelor123@gmail.com', 'System Analyst', 'Belum Diterima'),
(5, 13, 'ifan@gmail.com', 'System Analyst', 'Ditolak'),
(6, 1, 'azeezee12@gmail.com', 'System Analyst', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(2, 'Business Analyst'),
(3, 'System Analyst'),
(4, 'Front End'),
(5, 'Back End'),
(6, 'Quality Assurance'),
(7, 'Technical Writer');

-- --------------------------------------------------------

--
-- Table structure for table `submit`
--

CREATE TABLE `submit` (
  `submit_id` int(11) NOT NULL,
  `link_youtube` varchar(250) NOT NULL,
  `proyek_url` varchar(250) NOT NULL,
  `proyek_file` int(11) NOT NULL,
  `bunch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit`
--

INSERT INTO `submit` (`submit_id`, `link_youtube`, `proyek_url`, `proyek_file`, `bunch_id`) VALUES
(1, 'https://youtu.be/i8yknBXEQ7o?si=RQyWL7eG2EWT4ddx', 'https://github.com/Ibrairsyad17/project-based-learning', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(20) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_desc` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `bunch_id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `minggu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_name`, `task_desc`, `category`, `bunch_id`, `member_id`, `minggu`) VALUES
(1, 'Wireframe UI / UX', 'Buat Wireframe UI / UX', 'Doing', 1, 2, 1),
(2, 'System Requirement', 'Buat System Requirement', 'Done', 1, 2, 1),
(3, 'Jadwal Perancangan', 'Buat Jadwal Perancangan', 'Done', 1, 1, 1),
(4, 'Template', 'Cari Wireframe', 'Done', 1, 2, 2),
(5, 'Konsultasi PIC', 'Konsultasi offline dengan PIC (1)', 'Done', 1, 1, 1),
(6, 'Rancangan UI / UX', 'Buat rancangan', 'Doing', 1, 1, 1),
(7, 'DFD Diagram', 'Buat DFD Diagram', 'Done', 1, 2, 1),
(10, 'Metode SDLC', 'Memilih metode SDLC (Disarankan agile atau prototype)', 'Done', 1, 2, 2),
(11, 'Rancangan Aplikasi', 'Buat Rancangan Aplikasi', 'Doing', 1, 2, 1),
(12, 'Membuat Laporan Bab 2', 'Bab 2 tentang requirement', 'Done', 1, 1, 3),
(13, 'Use Case Scenario Login', 'Menyusun Use Case Scenario Halaman Login', 'Done', 1, 1, 3),
(14, 'Wireframe', 'Buat wireframe minimal halaman admin', 'Doing', 10, 6, 1),
(15, 'First Gathering', 'FG di Suhat', 'To Do', 1, 2, 1),
(16, 'Wireframe', 'Buat Wireframe', 'Doing', 2, 3, 1),
(17, 'Diagram Context', 'Buat Diagram Context / DFD Diagram Level 0', 'Done', 10, 6, 1),
(18, 'System Requirement', 'Buat System Requirement', 'Done', 10, 6, 1),
(19, 'Konsultasi PIC', 'Konsultasi mengenai timeline perancangan', 'Done', 10, 6, 2),
(20, 'Rancangan Aplikasi', 'Rancangan UI / UX, minggu 3 jadi', 'Done', 10, 6, 1),
(21, 'Jadwal Perancangan', 'Buat jadwal perancangan minggu ke 1 s/d 5', 'Doing', 10, 7, 1),
(22, 'Activity Diagram', 'Buat activity diagram', 'Doing', 10, 7, 2),
(23, 'Rancangan Bussines Case', 'Business yang terjadi di lapangan', 'Doing', 10, 7, 3);

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
('aba@gmail.com', '123', 'o', 'admin', 'profile.png', '$2y$10$uRmO9j8fPKxxvxjFVIHS0el3nPnIrzJJBtygIDSTfpokYfkU43kRe'),
('abcdefghij@gmail.com', '234242342', 'halo teman', 'admin', 'profile.png', '$2y$10$R3jcZNX80K.54Qhdz2H09uFqAWKf7aSx4vZP16Qcwh8N58sFXIVqC'),
('arfi@gmail.com', '223140707111061', 'Arfianto Nugroho', 'user', 'profile.png', '$2y$10$94F5GNTIYNWqkbxvU.fH9OvaVepkxSb9L2vFSpdlE8/F766xNWini'),
('azeezee12@gmail.com', '223140707111096', 'Ahmad Azizi', 'user', 'profile.png', '$2y$10$kYFfEUoKTh6q0BuZ36SC9e5W1A4SN41o2NhkXTbXvYo5CatY777Pu'),
('icad@student.ub.ac.id', '223140707111111', 'Muhammad Irsyad Arif Nashrullah', 'user', 'profile.png', '$2y$10$/QFV/00BFBmB4RDXOVcOpeiU6ZuyudbtZhIqv/A6okNS81wKeNCS.'),
('ifan@gmail.com', '33000', 'Ifan', 'user', 'profile.png', '$2y$10$bQEzVWjgRY8wecb/rEo52OVmoUFc20W5edES0iYeOOs6yTn9V3HWW'),
('jurgenthboss@kop.co.uk', '20142023', 'Jurgen Klopp', 'admin', 'profile.png', '$2y$10$8Tzux6rAzVZNfEbYNK/tPOkKnOCc76gMdx12VrYmAD7QvGOrkJC0i'),
('kelvindwipangga15@gmail.com', '223140707111115', 'Kelvin Dwipangga', 'user', 'profile.png', '$2y$10$ZnAlf/daxlHb9Q5G1naSa.HvH4KXBD7cog8Q/m59q9qxmxc/E3eT.'),
('lubabullm@gmail.com', '223140707111082', 'Lubabul Ilmi', 'user', 'profile.png', '$2y$10$7VSqoc0mydAeoLzZZTS6wOSjRXjuyc0KDFPZr9jh3nWDrOF4Mq3Qq'),
('makelor123@gmail.com', '890034', 'Makelor Goreng', 'user', 'profile.png', '$2y$10$cVyO/xDQrVVwSeoqAb6PBuwvBKzVZ0oeRy2EcY49Hc4Ymgz4mK0IG'),
('marcelladwi@gmail.com', '670045', 'Marcella Dwi Arkana', 'user', 'profile.png', '$2y$10$UfYsRZ7IBliCbIApjbitV.AMJcwo95bnKwiIwq8TansI.zb1zzEf.'),
('mikelarteta@ars.co.uk', '20202023', 'Mikel Arteta', 'admin', 'profile.png', '$2y$10$mofKga8.Ig.uL0tknvCMtO8MMfrUijhAUUbXY6vV6OcnIlIgM.S5C'),
('nacellaa@gmail.com', '360023', 'Nacela Jessica Yolland', 'user', 'profile.png', '$2y$10$LWsAoFaLRJU7dtxQzSjbHuqi6rY7p9/m7UlX6Mqd93xGoXbeD4B42'),
('pedro123@gmail.com', '223112', 'Pedro Duarte', 'user', 'profile.png', '$2y$10$zilsknbC.rqwtoRv0dDBLO30iPTGFPRI1.MxeRuArLwrp4lsbrTqm'),
('superadmin@vok.ub.ac.id', '20222025', 'Superadmin', 'superadmin', 'profile.png', '$2y$10$pTRDr8V/tgzuJuFkUb5ng.3FTkMLDQgIhi6lAhoggv9dzBQK02yOK'),
('vincent@gmail.com', '20162024', 'Vincent Kompany', 'admin', 'profile.png', '$2y$10$/7gCfTAbCY8PS9OipU4DHuWCUvClMsScY42d77JzD/gU.WEx3wOn2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunch`
--
ALTER TABLE `bunch`
  ADD PRIMARY KEY (`bunch_id`),
  ADD KEY `leader_id_fk` (`leader_id`),
  ADD KEY `project_id_fk` (`project_id`);

--
-- Indexes for table `bunch_member`
--
ALTER TABLE `bunch_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bunch_id_fk` (`bunch_id`),
  ADD KEY `member_id_fk` (`member_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `bunch_comment_fk` (`bunch_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_user_projects` (`id_user`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_bunch_fk` (`bunch_id`),
  ADD KEY `user_request_fk` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `submit`
--
ALTER TABLE `submit`
  ADD PRIMARY KEY (`submit_id`),
  ADD KEY `bunch_submit_fk` (`bunch_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid` (`bunch_id`),
  ADD KEY `mid` (`member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `nip` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bunch`
--
ALTER TABLE `bunch`
  MODIFY `bunch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bunch_member`
--
ALTER TABLE `bunch_member`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submit`
--
ALTER TABLE `submit`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bunch`
--
ALTER TABLE `bunch`
  ADD CONSTRAINT `leader_id_fk` FOREIGN KEY (`leader_id`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `proyek` (`id_proyek`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bunch_member`
--
ALTER TABLE `bunch_member`
  ADD CONSTRAINT `bunch_id_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `bunch_comment_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`);

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `id_user_projects` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_bunch_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`),
  ADD CONSTRAINT `user_request_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`);

--
-- Constraints for table `submit`
--
ALTER TABLE `submit`
  ADD CONSTRAINT `bunch_submit_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `bid` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mid` FOREIGN KEY (`member_id`) REFERENCES `bunch_member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
