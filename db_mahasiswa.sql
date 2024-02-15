-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 09:43 AM
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
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `jabatan`, `nip`) VALUES
(7, '', 'jamalyafi', '$2y$10$0wmcTLamso2shH6qxp2ZBevxzeA4uD0G9MYxHLmZ/ftYA1nvcTOWW', '', 0),
(8, '', 'diego', '$2y$10$HVw6.zTCN00lfJrb3oBIDOR3F6ye3Wi18HfVOufrEBqJzh12uwCK2', '', 0),
(9, '', 'diego', '$2y$10$9J/Lauj.hSLaiAWDq2SSbe3HSwWW6HHYoWaxPqMwmMejdYSC.hx0K', '', 0),
(10, '', 'johndoe', '$2y$10$Eh8I3RIQaaEHb31zIU2pouA29P7DYCI/uhg9XeWPz3CLRzXMeeDkC', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_ulang`
--

CREATE TABLE `pendaftaran_ulang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_tinggal` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_ulang`
--

INSERT INTO `pendaftaran_ulang` (`id`, `nama`, `email`, `tanggal_lahir`, `tempat_tinggal`, `prodi`) VALUES
(10, 'Diego', 'diego@gmail.com', '2023-09-20', 'Jakarta', 'Informatika'),
(11, 'Diego N', 'ndiego@gmail.com', '2004-08-28', 'Solo', 'Telekomunikasi'),
(12, 'Nathanael', 'nathan@gmail.com', '2003-01-08', 'Jakarta', 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_tes`
--

CREATE TABLE `peserta_tes` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_tes` date NOT NULL,
  `no_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_tes`
--

INSERT INTO `peserta_tes` (`id`, `nama`, `email`, `tanggal_tes`, `no_peserta`) VALUES
(54, 'Alvin Nurhakim', 'alpinurhakim@gmail.com', '2023-09-01', 0),
(74, 'Fajar Rifqi Bagaskara', 'fajarrifqi@gmail.com', '2023-09-20', 2023),
(76, 'Nanang', 'nanang@gmail.com', '2023-09-20', 0),
(77, '', '', '0000-00-00', 241),
(78, '', '', '0000-00-00', 126),
(79, 'Nanang', 'nanang@gmail.com', '2023-09-20', 0),
(80, 'Nanang', 'nanang@gmail.com', '2023-09-20', 0),
(81, '', '', '0000-00-00', 583),
(82, 'Nanang', 'nanang@gmail.com', '2023-09-20', 0),
(83, 'Nanang', 'nanang@gmail.com', '2023-09-20', 0),
(84, 'Diego', 'diego@gmail.com', '2023-09-20', 0),
(85, 'Diego', 'diego@gmail.com', '2023-09-20', 0),
(86, 'Alfian', 'alfian@gmail.com', '2023-09-20', 0),
(87, 'Alfian', 'alfian@gmail.com', '2023-09-20', 0),
(88, 'Diego N', 'ndiego@gmail.com', '2023-09-20', 0),
(89, 'Diego N', 'ndiego@gmail.com', '2023-09-20', 0),
(90, 'Nathanael', 'nathan@gmail.com', '2023-09-20', 0),
(91, 'Nathanael', 'nathan@gmail.com', '2023-09-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `no_soal` int(11) NOT NULL,
  `teks_soal` text NOT NULL,
  `pilihan_a` varchar(255) NOT NULL,
  `pilihan_b` varchar(255) NOT NULL,
  `pilihan_c` varchar(255) NOT NULL,
  `pilihan_d` varchar(255) NOT NULL,
  `jawaban_benar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`no_soal`, `teks_soal`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban_benar`) VALUES
(1, 'Siapakah bapak proklamasi?', 'Soekarno', 'Hatta', 'Pattimura', 'Diponegoro', 'Soekarno'),
(2, 'Contoh Soal', 'A', 'B', 'C', 'D', 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_ulang`
--
ALTER TABLE `pendaftaran_ulang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_tes`
--
ALTER TABLE `peserta_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`no_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendaftaran_ulang`
--
ALTER TABLE `pendaftaran_ulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peserta_tes`
--
ALTER TABLE `peserta_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `no_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
