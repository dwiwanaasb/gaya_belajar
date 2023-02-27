-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 04:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gayabelajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciri`
--

CREATE TABLE `ciri` (
  `id_ciri` int(11) NOT NULL,
  `gaya_id` int(11) NOT NULL,
  `ciri` varchar(255) DEFAULT NULL,
  `mb` double DEFAULT NULL,
  `md` double DEFAULT NULL,
  `pakar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciri`
--

INSERT INTO `ciri` (`id_ciri`, `gaya_id`, `ciri`, `mb`, `md`, `pakar`) VALUES
(1, 1, 'anak selalu terlihat rapi (menyusun kembali barang yang telah digunakan) ', 0.7, 0.2, 0.5),
(2, 1, 'anak suka dengan gambaran/menggambar', 0.6, 0.1, 0.5),
(3, 1, 'anak suka belajar dari video', 1, 0.2, 0.8),
(4, 1, 'anak lebih suka membaca dari pada dibacakan', 0.8, 0.2, 0.6),
(5, 1, 'anak selalu memperhatikan penampilannya', 0.6, 0.1, 0.5),
(6, 2, 'anak mudah terganggu dengan keramaian saat belajar', 0.6, 1, 0.5),
(7, 2, 'anak berani berbicara di depan banyak orang', 0.6, 0.1, 0.5),
(8, 2, 'anak suka berbicara sendiri saat belajar', 0.7, 0.1, 0.6),
(9, 2, 'anak mudah mengingat apa yang diinstruksikan dengan ucapan', 0.8, 0.2, 0.6),
(10, 2, 'anak suka musik dan bernyanyi', 0.6, 0.2, 0.4),
(11, 3, 'anak terlihat aktif', 0.8, 0.2, 0.6),
(12, 3, 'anak lebih menyukai belajar secara langsung (praktik)', 0.8, 0.2, 0.6),
(13, 3, 'anak tidak bisa duduk diam dalam waktu lama', 0.6, 0.2, 0.4),
(14, 3, 'anak menggunakan jari sebagai penunjuk saat membaca', 0.7, 0.2, 0.5),
(15, 3, 'anak menyukai permainan dan olahraga', 0.6, 0.1, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `visual` double DEFAULT NULL,
  `auditori` double DEFAULT NULL,
  `kinestetik` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gaya`
--

CREATE TABLE `gaya` (
  `id_gaya` int(11) NOT NULL,
  `gaya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaya`
--

INSERT INTO `gaya` (`id_gaya`, `gaya`) VALUES
(1, 'visual'),
(2, 'auditori'),
(3, 'kinestetik');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_ciri` int(11) NOT NULL,
  `gaya_id` int(11) NOT NULL,
  `solusi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_ciri`, `gaya_id`, `solusi`) VALUES
(1, 1, 'Melakukan pembelajaran dengan materi pembelajaran yang sudah di visualisasikan dalam bentuk video.'),
(2, 1, 'Membaca buku yang memiliki lebih banyak gambar.'),
(3, 2, 'Belajar sambil mendengarkan lagu yang disukai anak.'),
(4, 2, 'Menemani anak belajar, sehingga anak dan orang tua bisa berdiskusi secara langsung.'),
(5, 3, 'Dapat mengajak anak untuk segera mempraktikan materi yang dipelajari.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciri`
--
ALTER TABLE `ciri`
  ADD PRIMARY KEY (`id_ciri`),
  ADD KEY `jenis` (`gaya_id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `gaya`
--
ALTER TABLE `gaya`
  ADD PRIMARY KEY (`id_gaya`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_ciri`),
  ADD KEY `jenis` (`gaya_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciri`
--
ALTER TABLE `ciri`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaya`
--
ALTER TABLE `gaya`
  MODIFY `id_gaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ciri`
--
ALTER TABLE `ciri`
  ADD CONSTRAINT `ciri_gaya` FOREIGN KEY (`gaya_id`) REFERENCES `gaya` (`id_gaya`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_gaya` FOREIGN KEY (`gaya_id`) REFERENCES `gaya` (`id_gaya`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
