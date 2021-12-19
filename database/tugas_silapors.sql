-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2021 at 03:26 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_silapors`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `date_created`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$VK2UL0WnPhoaz6NF1vy/7uKVc3cg6GfrdugskjB4L0NkJUlXXNW3y', '2021-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `antri`
--

CREATE TABLE `antri` (
  `id_antri` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `no_bpjs` varchar(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_antri` int(11) NOT NULL,
  `waktu_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antri`
--

INSERT INTO `antri` (`id_antri`, `id_jadwal`, `no_bpjs`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_antri`, `waktu_daftar`) VALUES
(1, 1, '4325', 'asdffsd', 'asdf', '0000-00-00', 'asdfasf', 1, '2021-12-08'),
(2, 1, '23454', 'asfafs', 'asdf', '0000-00-00', 'asdfas', 2, '2021-12-08'),
(3, 1, '2142134', 'fadfads', 'asfd', '0000-00-00', 'asdf', 3, '2021-12-08'),
(4, 1, '1234', 'asdf', 'asdf', '2021-05-12', 'asdf', 4, '2021-12-08'),
(5, 1, '1234', 'asdf', 'asdf', '2021-05-12', 'asdf', 5, '2021-12-08'),
(6, 3, '1234', 'asdf', 'asdf', '2021-08-12', 'asdf', 1, '2021-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `poli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `poli`) VALUES
(1, 'Bella', 'Anak'),
(2, 'Sintia', 'Kandungan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL DEFAULT '',
  `jam` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_dokter`, `hari`, `jam`) VALUES
(1, 1, 'Senin', '07:45'),
(2, 1, 'Senin', '08:10'),
(3, 2, 'Senin', '08:17');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_rumah_sakit`
--

CREATE TABLE `pendaftaran_rumah_sakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(130) NOT NULL,
  `ttl` date NOT NULL,
  `bpjs` varchar(130) NOT NULL,
  `alamat_ktp` int(130) NOT NULL,
  `dokter` varchar(256) NOT NULL DEFAULT '',
  `no_antrian` int(11) NOT NULL DEFAULT '0',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE KEY` (`email`);

--
-- Indexes for table `antri`
--
ALTER TABLE `antri`
  ADD PRIMARY KEY (`id_antri`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pendaftaran_rumah_sakit`
--
ALTER TABLE `pendaftaran_rumah_sakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `antri`
--
ALTER TABLE `antri`
  MODIFY `id_antri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran_rumah_sakit`
--
ALTER TABLE `pendaftaran_rumah_sakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
