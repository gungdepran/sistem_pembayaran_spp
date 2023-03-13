-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 05:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pembayaran_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addSiswa` (IN `var_nisn` VARCHAR(100), IN `var_nis` VARCHAR(100), IN `var_nama` VARCHAR(100), IN `var_alamat` VARCHAR(100), IN `var_telepon` VARCHAR(100), IN `var_kelas_id` INT(13), IN `var_pengguna_id` INT(13), IN `var_pembayaran_id` INT(13))  NO SQL
BEGIN
INSERT INTO siswa VALUES ('', var_nisn, var_nis, var_nama, var_alamat, var_telepon, var_kelas_id, var_pengguna_id, var_pembayaran_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_kelas` (IN `var_kelas` VARCHAR(4), IN `var_kompetensi_keahlian` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO kelas VALUES ('',var_kelas,var_kompetensi_keahlian);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_pembayaran` (IN `var_tahun_ajaran` VARCHAR(100), IN `var_nominal` INT(13))  NO SQL
BEGIN
INSERT INTO pembayaran VALUES('', var_tahun_ajaran, var_nominal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_pengguna` (IN `var_username` VARCHAR(100), IN `var_password` VARCHAR(100), IN `var_role` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO pengguna VALUES ('',var_username, MD5(var_password),var_role);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_petugas` (IN `nama` VARCHAR(100), IN `pengguna_id` INT(13))  BEGIN
  INSERT INTO petugas VALUES('', nama, pengguna_id);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_transaksi` (IN `var_tahun_dibayar` VARCHAR(20), IN `var_bulan_dibayar` VARCHAR(20), IN `var_siswa_id` INT(13), IN `var_petugas_id` INT(13), IN `var_pembayaran_id` INT(13))  NO SQL
BEGIN
INSERT INTO transaksi VALUES ('',NOW(),var_bulan_dibayar,var_tahun_dibayar,var_siswa_id,var_petugas_id,var_pembayaran_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kelas` (IN `var_id` INT(13))  NO SQL
BEGIN
DELETE FROM kelas WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pembayaran` (IN `var_id` INT)  NO SQL
BEGIN
DELETE FROM pembayaran WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pengguna` (IN `var_id` INT(13))  NO SQL
BEGIN
DELETE FROM pengguna WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_kelas` (IN `var_kelas` VARCHAR(4), IN `var_kompetensi_keahlian` VARCHAR(100), IN `var_id` INT(13))  NO SQL
BEGIN
UPDATE kelas SET nama = var_kelas, kompetensi_keahlian = var_kompetensi_keahlian
WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_pembayaran` (IN `var_tahun_ajaran` VARCHAR(100), IN `var_nominal` INT(13), IN `var_id` INT(13))  NO SQL
BEGIN
UPDATE pembayaran SET tahun_ajaran = var_tahun_ajaran, nominal = var_nominal WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_pengguna` (IN `var_username` VARCHAR(100), IN `var_password` VARCHAR(225), IN `var_id` VARCHAR(100))  NO SQL
BEGIN
UPDATE pengguna SET username = var_username, password = MD5(var_password)
WHERE id = var_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_petugas` (IN `var_nama` VARCHAR(100), IN `var_pengguna_id` INT(13), IN `id_petugas` INT(13))  NO SQL
BEGIN
UPDATE `petugas` SET `nama`= var_nama,`pengguna_id`= var_pengguna_id WHERE id= id_petugas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getKelas` ()  NO SQL
BEGIN
SELECT * FROM kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPembayaran` ()  NO SQL
BEGIN
SELECT * FROM pembayaran;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPengguna` ()  NO SQL
BEGIN
SELECT * FROM pengguna;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswa` ()  NO SQL
BEGIN
SELECT siswa.*, kelas.nama AS nama_kelas, kelas.kompetensi_keahlian, pengguna.username, pembayaran.tahun_ajaran FROM siswa
JOIN kelas ON kelas.id = siswa.kelas_id
JOIN pengguna ON pengguna.id = siswa.pengguna_id
JOIN pembayaran ON pembayaran.id = siswa.pembayaran_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bulan_ajaran` ()  NO SQL
BEGIN
SELECT * FROM bulan_ajaran;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_kelas` ()  NO SQL
BEGIN
    SELECT * FROM kelas
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_kelas_by_id` (IN `var_id` INT(13))  NO SQL
BEGIN
SELECT * FROM kelas WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pembayaran` ()  NO SQL
BEGIN
    SELECT * FROM pembayaran
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pembayaran_by_id` (IN `var_id` INT(13))  NO SQL
BEGIN
SELECT * FROM pembayaran WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pembayaran_by_siswa_id` (IN `var_siswa_id` INT(13))  NO SQL
BEGIN
SELECT * FROM transaksi WHERE siswa_id = var_siswa_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pengguna` (IN `var_username` VARCHAR(100), IN `var_password` VARCHAR(100))  BEGIN
    SELECT * 
    FROM pengguna
    WHERE username = var_username
    AND password = MD5(var_password);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pengguna_all` ()  NO SQL
BEGIN
    SELECT * FROM pengguna
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pengguna_by_id` (IN `var_id` INT(13))  NO SQL
BEGIN
SELECT * FROM pengguna WHERE id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_petugas` ()  BEGIN
    SELECT petugas.*, pengguna.username FROM petugas
    JOIN pengguna ON pengguna.id = petugas.pengguna_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_petugas_by_id` (IN `var_id` INT)  NO SQL
BEGIN
    SELECT petugas.*, pengguna.username FROM petugas
    JOIN pengguna ON pengguna.id = petugas.pengguna_id WHERE petugas.id = var_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_riwayat` ()  NO SQL
BEGIN
SELECT transaksi.*, siswa.nisn, siswa.nis, siswa.nama, kelas.nama AS nama_kelas, kelas.kompetensi_keahlian, pembayaran.tahun_ajaran, pembayaran.nominal FROM transaksi
JOIN siswa ON siswa.id = transaksi.siswa_id
JOIN kelas ON kelas.id = siswa.kelas_id
JOIN pembayaran ON pembayaran.id = transaksi.pembayaran_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_riwayat_by_siswa_id` (IN `var_siswa_id` INT)  NO SQL
BEGIN
SELECT transaksi.*, siswa.nisn, siswa.nis, siswa.nama, kelas.nama AS nama_kelas, kelas.kompetensi_keahlian, pembayaran.tahun_ajaran, pembayaran.nominal FROM transaksi
JOIN siswa ON siswa.id = transaksi.siswa_id
JOIN kelas ON kelas.id = siswa.kelas_id
JOIN pembayaran ON pembayaran.id = transaksi.pembayaran_id
WHERE transaksi.siswa_id = var_siswa_id
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_siswa` ()  BEGIN
    SELECT siswa.*, kelas.nama AS nama_kelas, kelas.kompetensi_keahlian, pengguna.username, pembayaran.nominal, pembayaran.tahun_ajaran FROM siswa
JOIN kelas ON kelas.id = siswa.kelas_id
JOIN pengguna ON pengguna.id = siswa.pengguna_id
JOIN pembayaran ON pembayaran.id = siswa.pembayaran_id
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_siswa_by_id` (IN `var_id` INT)  NO SQL
BEGIN
    SELECT siswa.*, kelas.nama AS nama_kelas, kelas.kompetensi_keahlian, pengguna.username, pembayaran.nominal, pembayaran.tahun_ajaran, pembayaran.id AS pembayaran_id_siswa FROM siswa
JOIN kelas ON kelas.id = siswa.kelas_id
JOIN pengguna ON pengguna.id = siswa.pengguna_id
JOIN pembayaran ON pembayaran.id = siswa.pembayaran_id
WHERE siswa.id = var_id
;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bulan_ajaran`
--

CREATE TABLE `bulan_ajaran` (
  `id` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan_ajaran`
--

INSERT INTO `bulan_ajaran` (`id`, `bulan`) VALUES
(1, 'Juli'),
(2, 'Agustus'),
(3, 'September'),
(4, 'Oktober'),
(5, 'November'),
(6, 'Desember'),
(7, 'Januari'),
(8, 'Februari'),
(9, 'Maret'),
(10, 'April'),
(11, 'Mei'),
(12, 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `kompetensi_keahlian`) VALUES
(1, 'X', 'RPL'),
(2, 'X', 'TKJ'),
(3, 'X', 'Multimedia'),
(4, 'XI', 'RPL'),
(5, 'XI', 'TKJ'),
(6, 'XI', 'Multimedia'),
(7, 'XII', 'RPL'),
(8, 'XII', 'TKJ'),
(9, 'XII', 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tahun_ajaran`, `nominal`) VALUES
(1, '2023', 1250000),
(2, '2022', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(2, 'petugas', '5f4dcc3b5aa765d61d8327deb882cf99', 'petugas'),
(3, 'siswa1', '5f4dcc3b5aa765d61d8327deb882cf99', 'siswa'),
(4, 'siswa2', '5f4dcc3b5aa765d61d8327deb882cf99', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `pengguna_id`) VALUES
(1, 'Uzumaki Naruto', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nis`, `nama`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES
(2, '0001', '001', 'Alex Santoso', 'Tabanan', '77777', 4, 3, 1),
(3, '00002', '0002', 'Boby Desanto', 'USA', '081345345345', 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_bayar` datetime NOT NULL DEFAULT current_timestamp(),
  `bulan_dibayar` varchar(20) NOT NULL,
  `tahun_dibayar` int(4) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_bayar`, `bulan_dibayar`, `tahun_dibayar`, `siswa_id`, `petugas_id`, `pembayaran_id`) VALUES
(7, '2023-03-12 14:33:50', 'November', 2022, 3, 1, 2),
(8, '2023-03-12 14:33:50', 'Desember', 2022, 3, 1, 2),
(9, '2023-03-12 14:55:17', 'Agustus', 2023, 2, 1, 1),
(10, '2023-03-12 21:58:30', 'September', 2023, 2, 1, 1),
(11, '2023-03-12 22:00:55', 'Juli', 2022, 3, 1, 2),
(12, '2023-03-12 22:00:55', 'Agustus', 2022, 3, 1, 2),
(13, '2023-03-12 22:00:55', 'September', 2022, 3, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan_ajaran`
--
ALTER TABLE `bulan_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_pengguna` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_pengguna` (`pengguna_id`),
  ADD KEY `siswa_pembayaran` (`pembayaran_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_petugas` (`petugas_id`),
  ADD KEY `transaksi_pembayaran` (`pembayaran_id`),
  ADD KEY `transaksi_siswa` (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan_ajaran`
--
ALTER TABLE `bulan_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
