-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2021 at 06:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`) VALUES
(2, 'admin', 'rahmi', 'Ms. Rahmi'),
(6, 'y', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_penduduk`
--

CREATE TABLE `tb_data_penduduk` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `pendidikan_terakhir` varchar(15) NOT NULL,
  `nomor_telephone` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_penduduk`
--

INSERT INTO `tb_data_penduduk` (`nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status`, `pendidikan_terakhir`, `nomor_telephone`, `pekerjaan`, `alamat`) VALUES
('123456789101', '134251617181', 'Darmawan', 'Panyabungan', '2000-01-11', 'Pria', 'Islam', 'Belum Kawin', 'SMA', '085654231212', 'Wiraswasta', 'Panyabungan'),
('241536152536', '565443423416', 'Sekar', 'Kotanopan', '2002-11-11', 'Perempuan', 'Islam', 'Belum Kawin', 'SMA', '07896543421', 'Pelajar', 'Panyabungan'),
('nik', '123123-00', 'nama', 'tem', '1991-01-01', 'Perempuan', 'Protestan', 'Menikah', 'S2', '09', 'job', 'alma');

-- --------------------------------------------------------

--
-- Table structure for table `tb_domisili`
--

CREATE TABLE `tb_domisili` (
  `id_domisili` int(5) NOT NULL,
  `nomor_domisili` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_domisili`
--

INSERT INTO `tb_domisili` (`id_domisili`, `nomor_domisili`, `nama`, `nik`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pekerjaan`, `status`) VALUES
(3, 'domisili', 'Darmawan', '123456789101', 'alamat', 'Panyabungan', '2000-01-11', 'Islam', 'job', 'Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_kematian`
--

CREATE TABLE `tb_sk_kematian` (
  `id_sk_kematian` int(5) NOT NULL,
  `nomor_sk_kematian` varchar(20) NOT NULL,
  `nama_alm` varchar(30) NOT NULL,
  `nik_alm` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(30) NOT NULL,
  `penyebab` varchar(30) NOT NULL,
  `penentu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sk_kematian`
--

INSERT INTO `tb_sk_kematian` (`id_sk_kematian`, `nomor_sk_kematian`, `nama_alm`, `nik_alm`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status`, `alamat`, `tanggal_meninggal`, `tempat_meninggal`, `penyebab`, `penentu`) VALUES
(1, '123', 'Darmawan', '123456789101', '2000-01-11', 'Pria', 'Katolik', 'Menikah', 'alamat', '2021-07-19', 'tempate', 'sebab', 'tentu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_usaha`
--

CREATE TABLE `tb_sk_usaha` (
  `id_sk_usaha` int(5) NOT NULL,
  `nama_pemilik` varchar(20) NOT NULL,
  `bidang_usaha` varchar(30) NOT NULL,
  `nik_pemilik` varchar(20) NOT NULL,
  `nomor_telephone` varchar(12) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_berdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sk_usaha`
--

INSERT INTO `tb_sk_usaha` (`id_sk_usaha`, `nama_pemilik`, `bidang_usaha`, `nik_pemilik`, `nomor_telephone`, `alamat`, `tanggal_berdiri`) VALUES
(2, 'namanya', 'bidangnya', 'nik', '08', 'alamat', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_tdk_mampu`
--

CREATE TABLE `tb_surat_tdk_mampu` (
  `id_tidak_mampu` int(5) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `nama_terkait` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_tdk_mampu`
--

INSERT INTO `tb_surat_tdk_mampu` (`id_tidak_mampu`, `nomor_surat`, `nama_terkait`, `nik`, `pekerjaan`, `alamat`, `tanggal_buat`) VALUES
(1, '123', 'namanya', 'nik', 'job', 'alamat', '2021-07-19'),
(3, '0898', 'nama terkait', '123456789101', 'job', 'alalmatnya', '2021-07-19'),
(4, '123', 'namanya', '241536152536', 'job', 'alamat', '2021-07-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_penduduk`
--
ALTER TABLE `tb_data_penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_domisili`
--
ALTER TABLE `tb_domisili`
  ADD PRIMARY KEY (`id_domisili`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tb_sk_kematian`
--
ALTER TABLE `tb_sk_kematian`
  ADD PRIMARY KEY (`id_sk_kematian`),
  ADD KEY `nik_alm` (`nik_alm`);

--
-- Indexes for table `tb_sk_usaha`
--
ALTER TABLE `tb_sk_usaha`
  ADD PRIMARY KEY (`id_sk_usaha`),
  ADD KEY `nik_pemilik` (`nik_pemilik`);

--
-- Indexes for table `tb_surat_tdk_mampu`
--
ALTER TABLE `tb_surat_tdk_mampu`
  ADD PRIMARY KEY (`id_tidak_mampu`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_domisili`
--
ALTER TABLE `tb_domisili`
  MODIFY `id_domisili` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sk_kematian`
--
ALTER TABLE `tb_sk_kematian`
  MODIFY `id_sk_kematian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sk_usaha`
--
ALTER TABLE `tb_sk_usaha`
  MODIFY `id_sk_usaha` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_surat_tdk_mampu`
--
ALTER TABLE `tb_surat_tdk_mampu`
  MODIFY `id_tidak_mampu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_domisili`
--
ALTER TABLE `tb_domisili`
  ADD CONSTRAINT `tb_domisili_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_data_penduduk` (`nik`);

--
-- Constraints for table `tb_sk_kematian`
--
ALTER TABLE `tb_sk_kematian`
  ADD CONSTRAINT `tb_sk_kematian_ibfk_1` FOREIGN KEY (`nik_alm`) REFERENCES `tb_data_penduduk` (`nik`);

--
-- Constraints for table `tb_sk_usaha`
--
ALTER TABLE `tb_sk_usaha`
  ADD CONSTRAINT `tb_sk_usaha_ibfk_1` FOREIGN KEY (`nik_pemilik`) REFERENCES `tb_data_penduduk` (`nik`);

--
-- Constraints for table `tb_surat_tdk_mampu`
--
ALTER TABLE `tb_surat_tdk_mampu`
  ADD CONSTRAINT `tb_surat_tdk_mampu_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_data_penduduk` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
