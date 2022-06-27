-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 02:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad3`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `jenis_kelamin`, `alamat`, `email`) VALUES
('DSN001', 'Ahmad Moraldi, S.t, M.tss', 'LKs', 'Jl. Hr Soebranta123ss', 'dfbdffd@ejkfns.cosjd');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `jenjang_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`, `jenjang_pendidikan`) VALUES
('JRS001', 'Teknik Informatika', 'S1'),
('JRS002', 'Teknik Industri', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(50) NOT NULL,
  `kd_mk` varchar(50) NOT NULL,
  `mk_kuliah` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `kd_mk`, `mk_kuliah`, `email`) VALUES
(29, 'MKFST005', 'Bahasa Inggris', 'shinta@gmail.com'),
(32, 'MKFST007', 'Bahasa Inggris', 'kevin@yoo.my.id');

-- --------------------------------------------------------

--
-- Table structure for table `krs_admin`
--

CREATE TABLE `krs_admin` (
  `id_krs` int(50) NOT NULL,
  `semester` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs_admin`
--

INSERT INTO `krs_admin` (`id_krs`, `semester`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `kd_jurusan` varchar(50) NOT NULL,
  `kd_ruang` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `kd_jurusan`, `kd_ruang`, `nip`, `nama_mahasiswa`, `jenis_kelamin`, `angkatan`, `alamat`, `email`) VALUES
('12050110378', 'JRS001', 'FST001', 'DSN001', 'Kevin Maulana Risky', 'LK', '20', 'Jl. Hr Soebrantas', 'kevin@yoo.my.id');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kd_mk` varchar(50) NOT NULL,
  `kd_ruang` varchar(50) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `semester` int(50) NOT NULL,
  `jumlah_sks` int(50) NOT NULL,
  `prasyarat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kd_mk`, `kd_ruang`, `nama_mk`, `semester`, `jumlah_sks`, `prasyarat`) VALUES
('KDFST001', 'FST001', 'Metode Numerik', 4, 3, '1'),
('KDFST002', 'FST001', 'Bahasa Indonesia', 2, 2, '1'),
('KDFST003', 'FST003', 'Pemrograman Android', 4, 4, '1'),
('MKFST005', 'FST002', 'Data Mining', 4, 3, '1'),
('MKFST007', 'FST003', 'Bahasa Inggris', 4, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-06-14-075826', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1655193691, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prasyarat`
--

CREATE TABLE `prasyarat` (
  `id_prasyarat` varchar(50) NOT NULL,
  `mk_prasyarat` varchar(50) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `jumlah_sks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prasyarat`
--

INSERT INTO `prasyarat` (`id_prasyarat`, `mk_prasyarat`, `semester`, `jumlah_sks`) VALUES
('1', 'Tidak Ada Syarat', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kuliah`
--

CREATE TABLE `ruang_kuliah` (
  `kd_ruang` varchar(50) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `kapasitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_kuliah`
--

INSERT INTO `ruang_kuliah` (`kd_ruang`, `nama_ruang`, `kapasitas`) VALUES
('FST001', 'FASTE TIF A', 30),
('FST002', 'FASTE TIF B', 50),
('FST003', 'FASTE TIF C', 30),
('FST004', 'FASTE TIF D', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `new_email` varchar(191) DEFAULT NULL,
  `password_hash` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `nim` varchar(191) NOT NULL,
  `activate_hash` varchar(191) DEFAULT NULL,
  `reset_hash` varchar(191) DEFAULT NULL,
  `reset_expires` bigint(20) DEFAULT NULL,
  `role` enum('mhs','adm') NOT NULL DEFAULT 'mhs',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created` varchar(191) NOT NULL,
  `created_at` bigint(20) DEFAULT NULL,
  `updated_at` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `new_email`, `password_hash`, `name`, `nim`, `activate_hash`, `reset_hash`, `reset_expires`, `role`, `active`, `created`, `created_at`, `updated_at`) VALUES
(4, 'kevinmsan31@gmail.com', NULL, '$2y$10$JXcn/p6uUoDpBikEsqszTu8rma5.xEaJ3p0qjuJaRbiEsHdLeFHci', 'Kevin Maulanass', '', 'oBde07QD5AtFI2rpEby9GaV3ZxhKlJXY', NULL, NULL, 'mhs', 0, '', 1655483086, 1655483145),
(5, 'kevin@yoo.my.id', NULL, '$2y$10$ovRucHKLc6WCTIWmtoJOSegM4u9R5K2XHKI3dbbnP0twiTojtzIfS', 'Kevin Maulana', '', 'XCrDI0lLZmTKou39Wx1yfdM4BYQsVz5F', NULL, NULL, 'mhs', 0, '', 1655884158, 1655884158),
(6, 'admin@admin.com', NULL, '$2y$10$fJfXLwunWh.cn90sIi1AU.J7pmeSVAIyR4WEKkz19wENUSOteC7xy', 'Admin', '', 'f6uKXR4AljthYm7xVNs2QS8LO5aiMykg', NULL, NULL, 'adm', 0, '', 1655953583, 1655953583),
(7, 'shinta@gmail.com', NULL, '$2y$10$FKfPPdvSGj9ZCb2S7f2FTeRVI3zp3iWTYmiU19dA14Eh6O2TjMf.y', 'Shinta', '', 'CZWqcFvxBjkhlO6TEfzJ180iXYLoUtmp', NULL, NULL, 'mhs', 0, '', 1656207730, 1656207730);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `krs_admin`
--
ALTER TABLE `krs_admin`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kd_jurusan` (`kd_jurusan`,`kd_ruang`),
  ADD KEY `kd_ruang` (`kd_ruang`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kd_mk`),
  ADD KEY `kd_ruang` (`kd_ruang`,`prasyarat`),
  ADD KEY `prasyarat` (`prasyarat`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasyarat`
--
ALTER TABLE `prasyarat`
  ADD PRIMARY KEY (`id_prasyarat`);

--
-- Indexes for table `ruang_kuliah`
--
ALTER TABLE `ruang_kuliah`
  ADD PRIMARY KEY (`kd_ruang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `krs_admin`
--
ALTER TABLE `krs_admin`
  MODIFY `id_krs` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kd_ruang`) REFERENCES `ruang_kuliah` (`kd_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`kd_ruang`) REFERENCES `ruang_kuliah` (`kd_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mata_kuliah_ibfk_2` FOREIGN KEY (`prasyarat`) REFERENCES `prasyarat` (`id_prasyarat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
