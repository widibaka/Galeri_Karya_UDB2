-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_galeri_udb.dropped!wishlist
DROP TABLE IF EXISTS `dropped!wishlist`;
CREATE TABLE IF NOT EXISTS `dropped!wishlist` (
  `id_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `id_iklan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` int(50) DEFAULT 0,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.dropped!wishlist: ~12 rows (approximately)
DELETE FROM `dropped!wishlist`;
/*!40000 ALTER TABLE `dropped!wishlist` DISABLE KEYS */;
INSERT INTO `dropped!wishlist` (`id_wishlist`, `id_user`, `id_iklan`, `time`) VALUES
	(161, '1628868428', '1628868428_1628960706', 0),
	(162, '1628868428', '104', 0),
	(163, '1628687548', '1628868428_1628960706', 0),
	(164, '1628866787', '102', 0),
	(167, '1628868428', '1628868428_1628942945', 0),
	(168, '1628868428', '472', 1628962130),
	(169, '1628868428', '102', 1628962135),
	(170, '1628868428', '1628866787_1628961286', 1628962261),
	(171, '1628687548', '1628868428_1628942945', 1628963371),
	(172, '1628687548', '102', 1628963386),
	(173, '1628687548', '472', 1628963460),
	(174, '1628687548', '1628866787_1628961286', 1628964939);
/*!40000 ALTER TABLE `dropped!wishlist` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.karya
DROP TABLE IF EXISTS `karya`;
CREATE TABLE IF NOT EXISTS `karya` (
  `id_karya` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time` int(50) DEFAULT 0,
  `dihapus` int(1) DEFAULT 0,
  `published` int(1) DEFAULT 0,
  `loves` int(11) DEFAULT 0,
  `id_kategori` int(11) DEFAULT 0,
  `tim` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`id_karya`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.karya: ~8 rows (approximately)
DELETE FROM `karya`;
/*!40000 ALTER TABLE `karya` DISABLE KEYS */;
INSERT INTO `karya` (`id_karya`, `id_user`, `judul`, `deskripsi`, `youtube`, `link`, `time`, `dihapus`, `published`, `loves`, `id_kategori`, `tim`) VALUES
	('1628687548_1629796492', '1628687548', 'Project Android 1', '<ol><li>Satu</li><li>Dua</li><li>Tiga</li></ol>', 'https://youtu.be/20ZWyCOFG6g, https://www.youtube.com/embed/tMWkeBIohBs, https://www.youtube.com/watch?v=35WcRmWlHks', 'https://youtu.be/20ZWyCOFG6g', 1629831466, 0, 1, 5, 1, 'Aku, Kamu, Dia'),
	('1628687548_1629819781', '1628687548', 'Project Android 2', '<p><b>Halo</b></p>', '', '', 1629821124, 1, 0, 0, 1, 'Loa, Lenore, Hector'),
	('1628687548_1629821550', '1628687548', 'Project Android 2', '<p>1</p>', '', '', 1629821615, 0, 1, 3, 1, '1'),
	('1628866787_1628961286', '1628866787', 'Panen Buah Naga Pak ARI', '<p><span style="color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 18px;">Buah naga adalah buah dari beb</span><span style="font-size: 18px;">﻿</span><span style="color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 18px;">erapa jenis kaktus dari marga Hylocereus dan Selenicereus. Buah ini berasal dari Meksiko, Amerika Tengah dan Amerika Selatan namun sekarang juga dibudidayakan di negara-negara Asia seperti Taiwan, Vietnam, Filipina, Indonesia dan Malaysia.</span><', '', '', 1628961373, 0, 1, 0, 1, ''),
	('1628866787_1628961375', '1628866787', 'Panen Jambu Air Pak ARI', '<p>Jambu Air Manis. Saya suka</p>', '', '', 1628961421, 0, 1, 0, 1, ''),
	('1628866787_1628961423', '1628866787', 'Panen Melon Kuning', '<p>Logam berat sangat banyak berada di kali.</p>', '', '', 1628961478, 0, 1, 0, 1, ''),
	('1628868428_1628942945', '1628868428', 'Panen Apel Pak Cokro', 'Saya Tukang Bakso', '', '', 1628961836, 0, 1, 0, 1, ''),
	('1628868428_1628960706', '1628868428', 'Panen Mangga Pak Cokro', '<p><span style="color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;">Mangga atau </span><span style="font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 0);"><font color="#000000">mempelam </font></span><span style="color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;">adalah nama sejenis buah, demikian pula nama pohonnya. Mangga termasuk ke dalam marga Mangifera, yang terdiri dari 35-40 anggota dari suku Anacardiaceae. Nama "', '', '', 1628960828, 0, 1, 0, 1, '');
/*!40000 ALTER TABLE `karya` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.kategori: ~1 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Android');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `hp`, `photo`) VALUES
	('1628687548', 'widibaka55@gmail.com', 'widibaka', '321', '8552222222', '16286875481629796213.jpeg'),
	('1628866787', 'ari@gg.com', 'ARI', '123', '089979665445', ''),
	('1628868428', 'koko@gmail.com', 'KOKO', '123', '81226203761', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
