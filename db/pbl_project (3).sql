-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 04:09 AM
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
  `grade` int(20) NOT NULL,
  `status_show` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bunch`
--

INSERT INTO `bunch` (`bunch_id`, `bunch_name`, `leader_id`, `project_id`, `grade`, `status_show`) VALUES
(1, 'SI A7', 'ifan@gmail.com', 43, 60, 'Yes'),
(3, 'SI B3', 'marcelladwi@gmail.com', 44, 60, 'Yes'),
(10, 'SI A4', 'azeezee12@gmail.com', 44, 0, 'No'),
(12, 'SI C6', 'ifan@gmail.com', 48, 0, 'No'),
(13, 'TI C6', 'pedro123@gmail.com', 49, 0, 'No'),
(15, 'SI D3', 'ibrahim1712@gmail.com', 44, 0, 'No'),
(17, 'SI Y5', 'baskaraadi@gmail.com', 55, 0, 'No'),
(18, 'SI Y7', 'aagusawan@gmail.com', 55, 0, 'No'),
(19, 'SI B6', 'nirmanaayu12@gmail.com', 50, 0, 'No');

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
(4, 3, 'nacellaa@gmail.com', 'Back End'),
(6, 10, 'makelor123@gmail.com', 'Front End'),
(7, 10, 'pedro123@gmail.com', 'Business Analyst'),
(8, 12, 'pedro123@gmail.com', 'System Analyst'),
(9, 12, 'kelvindwipangga15@gmail.com', 'Front End'),
(10, 13, 'nacellaa@gmail.com', 'System Analyst'),
(13, 13, 'mohdiaby@gmail.com', 'Back End'),
(14, 18, 'stefano99@gmail.com', 'Quality Assurance'),
(15, 1, 'baskaraadi@gmail.com', 'Front End'),
(16, 19, 'aagusawan@gmail.com', 'Business Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `category_name`) VALUES
(1, 'Web Development'),
(2, 'Internet Of Things'),
(3, 'Mobile Apps'),
(4, 'Artificial Intelligence');

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
(8, 'Pengumpulan', 'segera di kumpulkan', '2024-01-23 12:04:51', 1),
(9, 'Minggu Ke-5', 'Untuk minggu ke-5 saya harap semuanya fokus pada proses pengkodean', '2024-01-29 15:34:31', 1),
(10, 'Halo', 'Halo semuanya', '2024-02-03 09:05:25', 1),
(11, 'Kerjakan UI', 'Terakhir minggu 5', '2024-02-04 22:29:56', 12);

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
  `pict` varchar(250) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `deskripsi_proyek`, `id_user`, `req`, `minggu`, `status_show`, `pict`, `category`) VALUES
(43, 'Sistem Informasi Manajemen Rapat', 'Sistem Informasi Manajemen Rapat (SIM-Rapat) adalah aplikasi atau platform yang dirancang khusus untuk membantu dalam pengelolaan dan pelaksanaan rapat di sebuah kelompok.', 'jurgenthboss@kop.co.uk', 'Perencanaan Rapat, Manajemen Agenda, Konfirmasi Kehadiran dan Pemantauan Rapat Organisasi', 8, 'Yes', '1', 2),
(44, 'Sistem Informasi Antrian Pujasera', 'Sistem Informasi Antrian adalah solusi teknologi yang dirancang untuk mengelola dan mengoptimalkan proses antrian di berbagai jenis organisasi atau layanan, seperti rumah sakit, pusat perbelanjaan, bank, kantor pemerintah, dan tempat-tempat lainnya yang menerima layanan publik.', 'jurgenthboss@kop.co.uk', 'Pendaftaran dan Pengambilan Nomor Antrian, Panggilan dan Pemanggilan Antrian dan Manajemen Antrian', 8, 'No', '2', 1),
(48, 'Sistem Informasi Pajak', 'Sistem informasi perpajakan merupakan suatu sistem yang dirancang untuk membantu pengelolaan dan pengendalian terkait bidang keuangan dan perpajakan.', 'vincent@gmail.com', 'Sistem informasi perpajakan menyediakan informasi yang dibutuhkan untuk memenuhi tujuan-tujuan manajemen dalam bidang perpajakan.', 9, 'No', '3', 1),
(49, 'Website PSIK Vokasi', 'Website buat apa ajalah', 'vincent@gmail.com', 'menfess', 10, 'No', '4', 1),
(50, 'Sistem Informasi Gudang Inventory', 'Suatu sistem yang dirancang untuk membantu perusahaan dalam mengelola persediaan barang di gudang. Sistem ini dapat membantu perusahaan dalam melacak barang masuk dan keluar, memantau stok barang, dan membuat laporan persediaan.', 'jurgenthboss@kop.co.uk', 'Manajemen Stok: Fitur ini memungkinkan perusahaan untuk melacak barang masuk dan keluar, memantau stok barang, dan menentukan level stok minimum dan maksimum, Penerimaan Barang: Fitur ini memungkinkan perusahaan untuk mencatat penerimaan.', 10, 'No', '8', 1),
(54, 'Eye Tracking', 'Eye tracking is the process of measuring either the point of gaze or the motion of an eye relative to the head. An eye tracker is a device for measuring eye positions and eye movement.', 'mikelarteta@ars.co.uk', 'Mengikuti gerak mata', 8, 'No', '7', 2),
(55, 'Sistem Informasi Penanganan Sampah Desa', 'Saat ini sampah telah menjadi masalah serius yang harus ditangani, terutama dalam memelihara kelestarian dan kesehatan lingkungan. Sampah yang berserakan dapat merusak lingkungan yang berakibat terjadinya pencemaran lingkungan.', 'kevin56@gmail.com', 'CRUD (Create, Read, Update, Delete)', 8, 'No', '7', 1),
(56, 'Aplikasi Timer', 'Timer Aplikas', 'mikelarteta@ars.co.uk', 'Stop', 9, 'No', '3', 3);

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
(1, 13, 'arfi@gmail.com', 'Front End', 'Ditolak'),
(2, 13, 'kelvindwipangga15@gmail.com', 'System Analyst', 'Belum Diterima'),
(3, 1, 'makelor123@gmail.com', 'System Analyst', 'Belum Diterima'),
(5, 13, 'ifan@gmail.com', 'System Analyst', 'Ditolak'),
(6, 1, 'azeezee12@gmail.com', 'System Analyst', 'Diterima'),
(7, 13, 'galih123@gmail.com', 'Front End', 'Ditolak'),
(8, 13, 'mohdiaby@gmail.com', 'Back End', 'Diterima'),
(9, 18, 'stefano99@gmail.com', 'Quality Assurance', 'Diterima'),
(10, 1, 'baskaraadi@gmail.com', 'Front End', 'Diterima'),
(11, 19, 'aagusawan@gmail.com', 'Business Analyst', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `request_project`
--

CREATE TABLE `request_project` (
  `r_id` int(20) NOT NULL,
  `project_id` int(20) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `bunch_name` varchar(250) NOT NULL,
  `status_req` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_project`
--

INSERT INTO `request_project` (`r_id`, `project_id`, `user_id`, `bunch_name`, `status_req`) VALUES
(2, 44, 'ibrahim1712@gmail.com', 'SI D3', 'Diterima'),
(3, 48, 'galih123@gmail.com', 'SI H4', 'Diterima'),
(4, 48, 'mohdiaby@gmail.com', 'SI F4', 'Ditolak'),
(5, 55, 'baskaraadi@gmail.com', 'SI Y5', 'Diterima'),
(6, 55, 'aagusawan@gmail.com', 'SI Y7', 'Diterima'),
(7, 55, 'gustiseptiawan@gmail.com', 'SI Y3', 'Belum Diterima'),
(8, 55, 'nirmanaayu12@gmail.com', 'SI Y2', 'Belum Diterima'),
(9, 50, 'nirmanaayu12@gmail.com', 'SI B6', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(250) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `category`) VALUES
(2, 'Business Analyst (BA)', 1),
(3, 'System Analyst', 1),
(4, 'Front End', 1),
(5, 'Back End', 1),
(6, 'Quality Assurance', 1),
(8, 'Front End Apps', 3),
(9, 'Hardware Engineers', 2),
(13, 'AI Consultans', 4);

-- --------------------------------------------------------

--
-- Table structure for table `submit_file`
--

CREATE TABLE `submit_file` (
  `sf_id` int(20) NOT NULL,
  `name_file` varchar(2000) NOT NULL,
  `size` int(20) NOT NULL,
  `ekstensi` varchar(250) NOT NULL,
  `path` varchar(2000) NOT NULL,
  `bunch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit_file`
--

INSERT INTO `submit_file` (`sf_id`, `name_file`, `size`, `ekstensi`, `path`, `bunch_id`) VALUES
(3, 'GExYEndawAApmy6.jpeg', 76634, 'jpeg', 'submit-path/GExYEndawAApmy6.jpeg', 1),
(4, 'shaking-hands.svg', 50640, 'svg', 'submit-path/shaking-hands.svg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submit_links`
--

CREATE TABLE `submit_links` (
  `links_id` int(20) NOT NULL,
  `web_url` varchar(2000) NOT NULL,
  `yt_url` varchar(2000) NOT NULL,
  `bunch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit_links`
--

INSERT INTO `submit_links` (`links_id`, `web_url`, `yt_url`, `bunch_id`) VALUES
(3, 'youtube.com', 'https://ibrahimirsad-crud.vercel.app/', 1);

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
(1, 'Wireframe UI / UX', 'Buat Wireframe UI / UX', 'To Do', 1, 15, 1),
(6, 'Rancangan UI / UX', 'Buat rancangan', 'Doing', 1, 1, 1),
(7, 'DFD Diagram', 'Buat DFD Diagram', 'To Do', 1, 2, 1),
(11, 'Rancangan Aplikasi', 'Buat Rancangan Aplikasi', 'Doing', 1, 2, 1),
(12, 'Membuat Laporan Bab 2 dan 3', 'Bab 2 tentang requirement', 'To Do', 1, 1, 3),
(13, 'Use Case Scenario Login', 'Menyusun Use Case Scenario Halaman Login', 'To Do', 1, 1, 3),
(14, 'Wireframe', 'Buat wireframe minimal halaman admin', 'To Do', 10, 6, 1),
(15, 'First Gathering', 'FG di Suhat', 'Done', 1, 2, 1),
(17, 'Diagram Context', 'Buat Diagram Context / DFD Diagram Level 0', 'Done', 10, 6, 1),
(18, 'System Requirement', 'Buat System Requirement', 'Done', 10, 6, 1),
(19, 'Konsultasi PIC', 'Konsultasi mengenai timeline perancangan', 'Done', 10, 6, 2),
(20, 'Rancangan Aplikasi', 'Rancangan UI / UX, minggu 3 jadi', 'Done', 10, 6, 1),
(21, 'Jadwal Perancangan', 'Buat jadwal perancangan minggu ke 1 s/d 5', 'Doing', 10, 7, 1),
(22, 'Activity Diagram', 'Buat activity diagram', 'Doing', 10, 7, 2),
(23, 'Rancangan Bussines Case', 'Business yang terjadi di lapangan', 'Doing', 10, 7, 3),
(30, 'SR', 'asdf', 'Done', 3, 4, 1),
(31, 'Tabel Quality Assurance', 'Buat tabel mengenai black box testing', 'To Do', 18, 14, 1),
(32, 'Rancangan Dokumentasi Proyek', 'Buatlah dokumentasi berdasarkan perintah dosen', 'To Do', 18, 14, 1),
(33, 'Memilih Framework (Plus/Minusnya)', 'Tailwind, Materialize, Bootstrap', 'Doing', 1, 15, 2),
(35, 'Wireframe', 'Buat Wireframe', 'Done', 1, 15, 2),
(36, 'Memilih Framework Back-End', 'Laravel or Codeigniter', 'Done', 1, 1, 3),
(37, 'System Requirements', 'SR sesuai riset di minggu ke-1', 'Done', 1, 2, 3),
(39, 'Tampilan Admin', 'Tampilan admin sesuai wireframe, kecuali bagian tabel halaman daftar member', 'Doing', 1, 15, 4),
(40, 'Halaman Login Back-End', 'Halaman login yang kemarin tolong koneksikan ke db', 'Doing', 1, 1, 4),
(42, 'Wireframe UI / UX', 'Buat Wireframe', 'Done', 19, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_file`
--

CREATE TABLE `task_file` (
  `tf_id` int(20) NOT NULL,
  `name_file` varchar(250) NOT NULL,
  `size` int(20) NOT NULL,
  `ekstensi` varchar(50) NOT NULL,
  `path` varchar(2000) NOT NULL,
  `task_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_file`
--

INSERT INTO `task_file` (`tf_id`, `name_file`, `size`, `ekstensi`, `path`, `task_id`) VALUES
(6, '108_110_149.pdf', 267999, 'pdf', 'path/108_110_149.pdf', 22),
(7, 'b9b5fbe0ce482fb220303222f70fcac0.jpg', 61787, 'jpg', 'path/b9b5fbe0ce482fb220303222f70fcac0.jpg', 11),
(8, 'Yellow Playful Illustration Brainstorm Presentation.pdf', 1457, 'pdf', 'path/Yellow Playful Illustration Brainstorm Presentation.pdf', 1),
(9, 'artworks-000655564504-zeq9sm-t500x500.jpg', 32456, 'jpg', 'path/artworks-000655564504-zeq9sm-t500x500.jpg', 1),
(11, 'Yellow Playful Illustration Brainstorm Presentation-1.pdf', 1457, 'pdf', 'path/Yellow Playful Illustration Brainstorm Presentation-1.pdf', 42),
(12, 'b9b5fbe0ce482fb220303222f70fcac0.jpg', 61787, 'jpg', 'path/b9b5fbe0ce482fb220303222f70fcac0.jpg', 42);

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
('aagusawan@gmail.com', '2478900111', 'Ahmad Agus Kurniawan', 'user', 'profile.png', '$2y$10$IcCDtj4RT50p2cIJVJWpQ.qaRsAIsGjBZAjxw.viJmlx6IlNepQ4K'),
('aba@gmail.com', '123', 'o', 'admin', 'profile.png', '$2y$10$uRmO9j8fPKxxvxjFVIHS0el3nPnIrzJJBtygIDSTfpokYfkU43kRe'),
('abcdefghij@gmail.com', '234242342', 'halo teman', 'admin', 'profile.png', '$2y$10$R3jcZNX80K.54Qhdz2H09uFqAWKf7aSx4vZP16Qcwh8N58sFXIVqC'),
('arfi@gmail.com', '223140707111061', 'Arfianto Nugroho', 'user', 'profile.png', '$2y$10$94F5GNTIYNWqkbxvU.fH9OvaVepkxSb9L2vFSpdlE8/F766xNWini'),
('azeezee12@gmail.com', '223140707111096', 'Ahmad Azizi', 'user', 'profile.png', '$2y$10$kYFfEUoKTh6q0BuZ36SC9e5W1A4SN41o2NhkXTbXvYo5CatY777Pu'),
('baskaraadi@gmail.com', '24780897', 'Baskara Adi', 'user', 'profile.png', '$2y$10$7gFNqCH7IKW03n3fh46DPOFueupVw6dFplTznUMon4VzNA5Hmsesi'),
('galih123@gmail.com', '123123128', 'galih', 'user', 'profile.png', '$2y$10$ZO8ASqJfF9McGoLIRv40AeNDRgiGO8rOeF3lRJowUaqmSgJDna3Ru'),
('gustiseptiawan@gmail.com', '2467889901', 'Gusti Andika Septiawan', 'user', 'profile.png', '$2y$10$0L9O7HZjrJNnI9OAQ3T6euD9OTRyyHNztbblv2WuHUEcn/I1xPeZq'),
('ibrahim1712@gmail.com', '223140707111108', 'Ibrahim Irsad', 'user', 'profile.png', '$2y$10$MJ70FyeplnJiGp191MjlA.1bxtedAHOzNzFFS6sgWbB4EmOFZhSWW'),
('icad@student.ub.ac.id', '223140707111111', 'Muhammad Irsyad Arif Nashrullah', 'user', 'profile.png', '$2y$10$/QFV/00BFBmB4RDXOVcOpeiU6ZuyudbtZhIqv/A6okNS81wKeNCS.'),
('ifan@gmail.com', '33000', 'Ifan', 'user', 'profile.png', '$2y$10$bQEzVWjgRY8wecb/rEo52OVmoUFc20W5edES0iYeOOs6yTn9V3HWW'),
('jurgenthboss@kop.co.uk', '20142023', 'Jurgen Klopp', 'admin', 'profile.png', '$2y$10$8Tzux6rAzVZNfEbYNK/tPOkKnOCc76gMdx12VrYmAD7QvGOrkJC0i'),
('kelvindwipangga15@gmail.com', '223140707111115', 'Kelvin Dwipangga', 'user', 'profile.png', '$2y$10$ZnAlf/daxlHb9Q5G1naSa.HvH4KXBD7cog8Q/m59q9qxmxc/E3eT.'),
('kevin56@gmail.com', '256887698', 'Kevin Sanjaya', 'admin', 'profile.png', '$2y$10$ZH81BSbX5JLTJKPJFVcCuej.BkNf..SeO/K4Ywvnra.LpRalMHQYi'),
('lubabullm@gmail.com', '223140707111082', 'Lubabul Ilmi', 'user', 'profile.png', '$2y$10$7VSqoc0mydAeoLzZZTS6wOSjRXjuyc0KDFPZr9jh3nWDrOF4Mq3Qq'),
('makelor123@gmail.com', '890034', 'Makelor Goreng', 'user', 'profile.png', '$2y$10$cVyO/xDQrVVwSeoqAb6PBuwvBKzVZ0oeRy2EcY49Hc4Ymgz4mK0IG'),
('marcelladwi@gmail.com', '670045', 'Marcella Dwi Arkana', 'user', 'profile.png', '$2y$10$UfYsRZ7IBliCbIApjbitV.AMJcwo95bnKwiIwq8TansI.zb1zzEf.'),
('mikelarteta@ars.co.uk', '20202023', 'Mikel Arteta', 'admin', 'profile.png', '$2y$10$mofKga8.Ig.uL0tknvCMtO8MMfrUijhAUUbXY6vV6OcnIlIgM.S5C'),
('mohdiaby@gmail.com', '45898589', 'mohdiaby@gmail.com', 'user', 'profile.png', '$2y$10$6qXSk9PIm73NWCAOKXHaIOrkfn3AbhKYesMOSfm0k1ZO8n537BLe6'),
('nacellaa@gmail.com', '360023', 'Nacela Jessica Yolland', 'user', 'profile.png', '$2y$10$LWsAoFaLRJU7dtxQzSjbHuqi6rY7p9/m7UlX6Mqd93xGoXbeD4B42'),
('nirmanaayu12@gmail.com', '245871926001', 'Nirmana Ayu Setiowati', 'user', 'profile.png', '$2y$10$xr9dff4xEiyMhP.zArx6L.nWNQhQx0Ob.CUqrNuvoxj9Hn8G7/6P.'),
('pedro123@gmail.com', '223112', 'Pedro Duarte', 'user', 'profile.png', '$2y$10$zilsknbC.rqwtoRv0dDBLO30iPTGFPRI1.MxeRuArLwrp4lsbrTqm'),
('stefano99@gmail.com', '2456818230', 'Stefano Cahyadi', 'user', 'profile.png', '$2y$10$Ff/eM3s3t.67utquQ7EsxubOkhrrw4X3wcAsV.T/kyec3naAO6hva'),
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
  ADD KEY `project_id_fk` (`project_id`),
  ADD KEY `leader_id_fk` (`leader_id`);

--
-- Indexes for table `bunch_member`
--
ALTER TABLE `bunch_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bunch_id_fk` (`bunch_id`),
  ADD KEY `member_id_fk` (`member_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

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
  ADD KEY `id_category_fk` (`category`),
  ADD KEY `id_user_projects` (`id_user`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_bunch_fk` (`bunch_id`),
  ADD KEY `user_request_fk` (`user_id`);

--
-- Indexes for table `request_project`
--
ALTER TABLE `request_project`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `project_fk_req` (`project_id`),
  ADD KEY `user_fk_req` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `cat_fk` (`category`);

--
-- Indexes for table `submit_file`
--
ALTER TABLE `submit_file`
  ADD PRIMARY KEY (`sf_id`),
  ADD KEY `submit_f_fk` (`bunch_id`);

--
-- Indexes for table `submit_links`
--
ALTER TABLE `submit_links`
  ADD PRIMARY KEY (`links_id`),
  ADD KEY `submit_l_fk` (`bunch_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid` (`bunch_id`),
  ADD KEY `mid` (`member_id`);

--
-- Indexes for table `task_file`
--
ALTER TABLE `task_file`
  ADD PRIMARY KEY (`tf_id`),
  ADD KEY `tf_task_fk` (`task_id`);

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
  MODIFY `bunch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bunch_member`
--
ALTER TABLE `bunch_member`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_project`
--
ALTER TABLE `request_project`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `submit_file`
--
ALTER TABLE `submit_file`
  MODIFY `sf_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submit_links`
--
ALTER TABLE `submit_links`
  MODIFY `links_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `task_file`
--
ALTER TABLE `task_file`
  MODIFY `tf_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bunch`
--
ALTER TABLE `bunch`
  ADD CONSTRAINT `leader_id_fk` FOREIGN KEY (`leader_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bunch_member`
--
ALTER TABLE `bunch_member`
  ADD CONSTRAINT `bunch_id_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `bunch_comment_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `id_category_fk` FOREIGN KEY (`category`) REFERENCES `categories` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_projects` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_bunch_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_request_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_project`
--
ALTER TABLE `request_project`
  ADD CONSTRAINT `project_fk_req` FOREIGN KEY (`project_id`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_req` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `cat_fk` FOREIGN KEY (`category`) REFERENCES `categories` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submit_file`
--
ALTER TABLE `submit_file`
  ADD CONSTRAINT `submit_f_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submit_links`
--
ALTER TABLE `submit_links`
  ADD CONSTRAINT `submit_l_fk` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `bid` FOREIGN KEY (`bunch_id`) REFERENCES `bunch` (`bunch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mid` FOREIGN KEY (`member_id`) REFERENCES `bunch_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_file`
--
ALTER TABLE `task_file`
  ADD CONSTRAINT `tf_task_fk` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
