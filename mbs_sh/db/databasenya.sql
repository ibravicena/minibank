-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tabungan_siswa
CREATE DATABASE IF NOT EXISTS `tabungan_siswa` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `tabungan_siswa`;

-- Dumping structure for table tabungan_siswa.tb_admin
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabungan_siswa.tb_admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`, `telepon`, `foto`) VALUES
	(3mbs24, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin Tabungan', '0001', '105-Logo Kreatif  Minimalis AN Studio Monogram Kuning Hitam (1)_prev_ui.png');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- Dumping structure for table tabungan_siswa.tb_jtab
CREATE TABLE IF NOT EXISTS `tb_jtab` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `jns_tab` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabungan_siswa.tb_jtab: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_jtab` DISABLE KEYS */;
INSERT INTO `tb_jtab` (`id`, `jns_tab`) VALUES
	(1, 'Tabaqur'),
	(2, 'simpel (smk)');
/*!40000 ALTER TABLE `tb_jtab` ENABLE KEYS */;

-- Dumping structure for table tabungan_siswa.tb_nas
CREATE TABLE IF NOT EXISTS `tb_nas` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jns_tab` text NOT NULL,
  `alamat` text NOT NULL,
  `notlp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1882928927 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabungan_siswa.tb_nas: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_nas` DISABLE KEYS */;
INSERT INTO `tb_nas` (`id`, `nama`, `jns_tab`, `alamat`, `notlp`) VALUES
	(1882928907, 'Siswa 1', 'Kelas 11', ' KOTA BANDUNG Jl. Golf Selatan I No.26, Cisaranten Bina Harapan, Kec. Arcamanik, Kota Bandung Prov. Jawa Barat', '08129203922'),
	(1882928910, 'Siswa 2', 'Kelas 10', 'India', '0032'),
	(1882928912, 'Siswa 4', 'Kelas 11', 'jl mawar', '081292039'),
	(1882928916, 'Siswa 5', 'Kelas 11', 'Bogor', '08129203922'),
	(1882928918, 'Siswa 3', 'Kelas 10', 'Kab. Sleman', '0895273829991'),
	(1882928919, 'Siswa 6', 'Kelas 10', 'Kab Majalengka', '08129203922'),
	(1882928920, 'Aulia MP', 'Kelas 10', 'swis', '098');
/*!40000 ALTER TABLE `tb_nas` ENABLE KEYS */;

-- Dumping structure for table tabungan_siswa.tb_tran
CREATE TABLE IF NOT EXISTS `tb_tran` (
  `id_tran` int(50) NOT NULL AUTO_INCREMENT,
  `no_rek` text NOT NULL,
  `nama` text NOT NULL,
  `jns_tab` text NOT NULL,
  `tanggal` date NOT NULL,
  `setoran` int(11) NOT NULL,
  `penarikan` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id_tran`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabungan_siswa.tb_tran: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_tran` DISABLE KEYS */;
INSERT INTO `tb_tran` (`id_tran`, `no_rek`, `nama`, `jns_tab`, `tanggal`, `setoran`, `penarikan`, `saldo`) VALUES
	(9, '1882928907', 'Siswa 1', 'Kelas 11', '2020-10-14', 0, 5000, 15000),
	(10, '1882928910', 'Siswa 2', 'Kelas 11', '2020-10-14', 6000, 0, 15000),
	(11, '1882928912', 'Siswa 4', 'Kelas 11', '2020-10-14', 0, 7000, 7000),
	(12, '1882928919', 'Siswa 6', 'Kelas 10', '2020-10-14', 1000, 0, 10000);
/*!40000 ALTER TABLE `tb_tran` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
