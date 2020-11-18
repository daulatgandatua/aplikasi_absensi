-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 09:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kd_absen` int(5) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `pertemuan` varchar(20) NOT NULL,
  `kd_kelas` int(5) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kd_absen`, `mata_kuliah`, `pertemuan`, `kd_kelas`, `mahasiswa`, `status`) VALUES
(1, 'Animasi ', 'Minggu 1', 2, 'Daulat Ganda Tua', 'Hadir'),
(2, 'Animasi ', 'Minggu 1', 2, 'Ellysa Paska', 'Hadir'),
(3, 'Animasi ', 'Minggu 1', 2, 'Elsa Chyntia', 'Hadir'),
(4, 'Animasi ', 'Minggu 1', 2, 'Josephin Situmorang', 'Hadir'),
(5, 'Animasi ', 'Minggu 1', 2, 'Septian Manda', 'Hadir'),
(6, 'Animasi ', 'Minggu 2', 2, 'Daulat Ganda Tua', 'Hadir'),
(7, 'Animasi ', 'Minggu 2', 2, 'Ellysa Paska', 'Hadir'),
(8, 'Animasi ', 'Minggu 2', 2, 'Elsa Chyntia', 'Hadir'),
(9, 'Animasi ', 'Minggu 2', 2, 'Josephin Situmorang', 'Tidak Hadir'),
(10, 'Animasi ', 'Minggu 2', 2, 'Septian Manda', 'Hadir'),
(11, 'Animasi ', 'Minggu 3', 2, 'Daulat Ganda Tua', 'Hadir'),
(12, 'Animasi ', 'Minggu 3', 2, 'Ellysa Paska', 'Hadir'),
(13, 'Animasi ', 'Minggu 3', 2, 'Elsa Chyntia', 'Hadir'),
(14, 'Animasi ', 'Minggu 3', 2, 'Josephin Situmorang', 'Hadir'),
(15, 'Animasi ', 'Minggu 3', 2, 'Septian Manda', 'Hadir'),
(16, 'English I', 'Minggu 1', 2, 'Daulat Ganda Tua', 'Hadir'),
(17, 'English I', 'Minggu 1', 2, 'Ellysa Paska', 'Hadir'),
(18, 'English I', 'Minggu 1', 2, 'Elsa Chyntia', 'Hadir'),
(19, 'English I', 'Minggu 1', 2, 'Josephin Situmorang', 'Hadir'),
(20, 'English I', 'Minggu 1', 2, 'Septian Manda', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nip`, `password`, `nama`, `alamat`, `no_hp`) VALUES
(1, '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 'Robert', 'Bengkong', '081363020892');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id` int(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nip`, `password`, `fakultas`, `nama`, `no_hp`, `alamat`) VALUES
(3, '2222222222', 'e10adc3949ba59abbe56e057f20f883e', 'Teknik Informatika', 'Fitri Sulastri', '082288247772', 'Batam'),
(4, '2222222223', 'e10adc3949ba59abbe56e057f20f883e', 'Teknik Informatika', 'Ganda Pakpahan', '082288252227', 'Batam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kd_kelas` int(5) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `nama_kelas`) VALUES
(1, 'Regular'),
(2, 'Malam'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `kd_mahasiswa` int(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kd_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`kd_mahasiswa`, `nim`, `password`, `nama`, `jenis_kelamin`, `jurusan`, `no_hp`, `kd_kelas`) VALUES
(1, '3311711089', 'e10adc3949ba59abbe56e057f20f883e', 'Daulat Ganda Tua', 'Laki - Laki', 'Teknik Informatika', '082288252227', '2'),
(2, '3311711088', 'e10adc3949ba59abbe56e057f20f883e', 'Septian Manda', 'Laki - Laki', 'Teknik Informatika', '081234567800', '2'),
(3, '3311711091', 'e10adc3949ba59abbe56e057f20f883e', 'Ellysa Paska', 'Perempuan', 'Teknik Informatika', '081234567800', '2'),
(4, '3311711068', 'e10adc3949ba59abbe56e057f20f883e', 'Elsa Chyntia', 'Perempuan', 'Teknik Informatika', '081234567800', '2'),
(5, '3311711070', 'e10adc3949ba59abbe56e057f20f883e', 'Josephin Situmorang', 'Laki - Laki', 'Teknik Informatika', '081234567800', '2'),
(6, '3311711069', 'e10adc3949ba59abbe56e057f20f883e', 'M. Rava', 'Laki - Laki', 'Teknik Robotika', '082288265553', '1'),
(7, '3311711072', 'e10adc3949ba59abbe56e057f20f883e', 'Agung ', 'Laki - Laki', 'Teknik Robotika', '082288265553', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kd_matkul` int(5) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `sks` int(3) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `kd_kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`kd_matkul`, `nama_matkul`, `sks`, `dosen`, `kd_kelas`) VALUES
(1, 'Animasi ', 3, 'Fitri Sulastri', 2),
(2, 'English I', 3, 'Fitri Sulastri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertemuan`
--

CREATE TABLE `tb_pertemuan` (
  `kd_pertemuan` int(3) NOT NULL,
  `detail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`kd_pertemuan`, `detail`) VALUES
(1, 'Minggu 1'),
(2, 'Minggu 2'),
(3, 'Minggu 3'),
(4, 'Minggu 4'),
(5, 'Minggu 5'),
(6, 'Minggu 6'),
(7, 'Minggu 7'),
(8, 'Minggu 8'),
(9, 'Minggu 9'),
(10, 'Minggu 10'),
(11, 'Minggu 11'),
(12, 'Minggu 12'),
(13, 'Minggu 13'),
(14, 'Minggu 14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tata_usaha`
--

CREATE TABLE `tb_tata_usaha` (
  `id` int(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tata_usaha`
--

INSERT INTO `tb_tata_usaha` (`id`, `nip`, `password`, `nama`, `alamat`, `no_hp`) VALUES
(4, '1111111111', 'e10adc3949ba59abbe56e057f20f883e', 'Yusuf', 'Seraya Atas', '081212121212'),
(5, '1111111112', 'e10adc3949ba59abbe56e057f20f883e', 'Dede', 'Piayu', '081212121213');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`kd_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kd_matkul`);

--
-- Indexes for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  ADD PRIMARY KEY (`kd_pertemuan`);

--
-- Indexes for table `tb_tata_usaha`
--
ALTER TABLE `tb_tata_usaha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kd_absen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kd_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `kd_mahasiswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `kd_matkul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `kd_pertemuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_tata_usaha`
--
ALTER TABLE `tb_tata_usaha`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
