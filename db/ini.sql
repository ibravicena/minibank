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

-- Dumping data for table tabungan_siswa.tb_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`, `telepon`, `foto`) VALUES
	(34, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Tabungan', '0001', '401-mave.png');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- Dumping structure for table tabungan_siswa.tb_jtab
CREATE TABLE IF NOT EXISTS `tb_jtab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jns_tab` text COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table tabungan_siswa.tb_jtab: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_jtab` DISABLE KEYS */;
INSERT INTO `tb_jtab` (`id`, `jns_tab`) VALUES
	(1, 'simkah & simat'),
	(2, 'simpel (smk)'),
	(6, 'simpel(smp)'),
	(7, 'tabaqur');
/*!40000 ALTER TABLE `tb_jtab` ENABLE KEYS */;

-- Dumping structure for table tabungan_siswa.tb_nas
CREATE TABLE IF NOT EXISTS `tb_nas` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `jns_tab` text NOT NULL,
  `alamat` text NOT NULL,
  `notlp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1882928939 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabungan_siswa.tb_nas: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_nas` DISABLE KEYS */;
INSERT INTO `tb_nas` (`id`, `nama`, `jns_tab`, `alamat`, `notlp`) VALUES
	(1882928936, 'Aulia', 'simpel (smk)', 'majalengka', '06567890'),
	(1882928937, 'Nova', 'simpel (smk)', 'Madiun', '0965345678'),
	(1882928938, 'amin', 'simkah & simat', 'ngawi', '08565078');
/*!40000 ALTER TABLE `tb_nas` ENABLE KEYS */;

-- Dumping structure for table tabungan_siswa.tb_tran
CREATE TABLE IF NOT EXISTS `tb_tran` (
  `id_tran` int(50) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `nama` text NOT NULL,
  `jns_tab` text NOT NULL,
  `tanggal` date NOT NULL,
  `setoran` int(11) NOT NULL,
  `penarikan` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id_tran`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabungan_siswa.tb_tran: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_tran` DISABLE KEYS */;
INSERT INTO `tb_tran` (`id_tran`, `id`, `nama`, `jns_tab`, `tanggal`, `setoran`, `penarikan`, `saldo`) VALUES
	(14, 1234567, 'Aulia', 'simpel', '2022-10-28', 0, 0, 2000);
/*!40000 ALTER TABLE `tb_tran` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
