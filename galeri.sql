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

-- Dumping structure for table db_galeri_udb.galeri_admin
DROP TABLE IF EXISTS `galeri_admin`;
CREATE TABLE IF NOT EXISTS `galeri_admin` (
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.galeri_admin: ~2 rows (approximately)
DELETE FROM `galeri_admin`;
/*!40000 ALTER TABLE `galeri_admin` DISABLE KEYS */;
INSERT INTO `galeri_admin` (`id_user`) VALUES
	('1628687545'),
	('1628687549');
/*!40000 ALTER TABLE `galeri_admin` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.galeri_chat
DROP TABLE IF EXISTS `galeri_chat`;
CREATE TABLE IF NOT EXISTS `galeri_chat` (
  `id_chat` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL DEFAULT 0,
  `id_user_penerima` int(20) DEFAULT 0,
  `msg` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `time` int(20) DEFAULT 0,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.galeri_chat: ~138 rows (approximately)
DELETE FROM `galeri_chat`;
/*!40000 ALTER TABLE `galeri_chat` DISABLE KEYS */;
INSERT INTO `galeri_chat` (`id_chat`, `id_user`, `id_user_penerima`, `msg`, `time`) VALUES
	(1, 1628866787, 1628866787, 'Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! Halo! ', 1),
	(2, 1628687545, 1628866787, 'Halo juga', 3),
	(3, 1628687545, 1628866787, ' HHHHH 2', 5),
	(4, 1628687545, 0, 'j', 1629919314),
	(5, 1628687545, 0, 'hh', 1629919682),
	(6, 1628687545, 0, 'ssss', 1629919748),
	(7, 1628687545, 0, 'Mantapanjing, YES', 1629919758),
	(8, 1628687545, 0, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 1629919929),
	(9, 1628687545, 0, 'm', 1629924562),
	(10, 1628687545, 0, 'm', 1629924714),
	(11, 1628687545, 0, 'm', 1629924714),
	(12, 1628687545, 0, 'm', 1629924718),
	(13, 1628687545, 0, 'm]', 1629924783),
	(14, 1628687545, 0, 'm]', 1629924943),
	(15, 1628687545, 0, 'ooooo', 1629924984),
	(16, 1628687545, 1628866787, 'h', 1629925286),
	(17, 1628687545, 0, 'hf', 1629929038),
	(18, 1628687545, 1628866787, 'selamat malam', 1630067329),
	(19, 1628687545, 1628866787, 's', 1630067346),
	(20, 1628687545, 1628866787, 'sv', 1630068338),
	(21, 1628687545, 1628866787, 'vvv', 1630068376),
	(22, 1628687545, 1628866787, 'fsa', 1630068385),
	(23, 1628687545, 1628866787, 'vvvvaw', 1630068410),
	(24, 1628687545, 1628866787, 'bbbb', 1630068610),
	(25, 1628687545, 1628866787, 'qqqq', 1630068628),
	(26, 1628687545, 1628866787, 'svv', 1630072236),
	(27, 1628687545, 1628866787, 'gggggggggg', 1630072241),
	(28, 1628687545, 1628866787, 's', 1630082940),
	(29, 1628687545, 1628866787, 'selamat malam', 1630082957),
	(30, 1628866787, 1628866787, 'malam', 1630085177),
	(31, 1628866787, 1628866787, 'online', 1630085417),
	(32, 1628866787, 1628866787, 'bagus', 1630085695),
	(33, 1628866787, 1628866787, 'selamat malam', 1630086007),
	(34, 1628866787, 1628866787, 'jos', 1630086044),
	(35, 1628866787, 1628866787, 's', 1630086662),
	(36, 1628866787, 1628866787, 'ngapain bang?', 1630087142),
	(37, 1628868428, 1628868428, 's', 1630087376),
	(38, 1628687545, 1628868428, 'SSSS.GRIDMAN', 1630087862),
	(39, 1628687545, 1628868428, 'SSSS.GRIDMAN', 1630087862),
	(40, 1628687545, 1628868428, 's', 1630087947),
	(41, 1628687545, 1628868428, 's', 1630087947),
	(42, 1628687545, 1628868428, 'kenapa dua?', 1630088015),
	(43, 1628687545, 1628868428, 'kenapa dua?', 1630088015),
	(44, 1628868428, 1628868428, 'k', 1630088079),
	(45, 1628687545, 1628868428, 'l', 1630088090),
	(46, 1628687545, 1628868428, 'l', 1630088090),
	(47, 1628687545, 1628868428, '8', 1630088178),
	(48, 1628687545, 1628868428, '8', 1630088178),
	(49, 1628687545, 1628868428, '===', 1630088234),
	(50, 1628687545, 1628868428, '===', 1630088234),
	(51, 1628687545, 1628866787, 'fixed', 1630088306),
	(52, 1628687545, 1628868428, 'halo selamat malam', 1630088424),
	(53, 1628868428, 1628868428, 'selamat malam om', 1630088438),
	(54, 1628687549, 1628868428, 'Betul kata bang widi, selamat malam', 1630088621),
	(55, 1628868428, 1628868428, 'k', 1630088747),
	(56, 1628868428, 1628868428, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1630088786),
	(57, 1628687549, 1628868428, 'Sudahlah, jangan berteman!', 1630089703),
	(58, 1628868428, 1628868428, 'po', 1630090006),
	(59, 1628687545, 1628868428, 'jg', 1630100371),
	(60, 1628687545, 1628868428, '[removed]', 1630100742),
	(61, 1628687545, 1628868428, '&lt;', 1630100751),
	(62, 1628687545, 1628868428, 's', 1630229778),
	(63, 1628687545, 1628866787, 'sss', 1630234886),
	(64, 1628868428, 1628868428, 'hhh', 1630234944),
	(65, 1628868428, 1628868428, 'jjj', 1630234956),
	(66, 1628868428, 1628868428, 'There is no turning back', 1630235222),
	(67, 1628866787, 1628866787, 'count me in', 1630235280),
	(68, 1628687545, 1628866787, 'ss', 1630235654),
	(69, 1628868428, 1628868428, 'weeeeeeeee', 1630235991),
	(70, 1628868428, 1628868428, 'lllllllllllllllllll', 1630236122),
	(71, 1628866787, 1628866787, 'vvvvvvvvvv', 1630236521),
	(72, 1628868428, 1628868428, 'bbbbb', 1630236615),
	(73, 1628868428, 1628868428, 'ggggggggg', 1630239192),
	(74, 1628866787, 1628866787, 'bbbbbbbbbbbeeee', 1630239419),
	(75, 1628866787, 1628866787, 'Chat', 1630239703),
	(76, 1628866787, 1628866787, 'chat lagi', 1630239719),
	(77, 1628866787, 1628866787, 'ssvv', 1630241438),
	(78, 1628868428, 1628868428, 'hai', 1630241472),
	(79, 1628868428, 1628868428, '2', 1630241576),
	(80, 1628868428, 1628868428, 'yeey', 1630242497),
	(81, 1628868428, 1628868428, 'chat baru', 1630243600),
	(82, 1628868428, 1628868428, 'coba lagi', 1630244750),
	(83, 1628868428, 1628868428, 'kok', 1630244757),
	(84, 1628868428, 1628868428, 'aku', 1630244768),
	(85, 1628868428, 1628868428, 'suka ', 1630244771),
	(86, 1628868428, 1628868428, 'kamu', 1630244773),
	(87, 1628687545, 1628868428, 'ke laut sana!', 1630244839),
	(88, 1628687545, 1628868428, 'hai', 1630248697),
	(89, 1628868428, 1628868428, 'sss', 1630248798),
	(90, 1628687545, 1628868428, 'ssss', 1630248807),
	(91, 1628687545, 1628868428, 'ssss', 1630248882),
	(92, 1628687545, 1628868428, 'hai koko', 1630251832),
	(93, 1628687545, 1628868428, 'mm', 1630252114),
	(94, 1628868428, 1628868428, 'uu', 1630252128),
	(95, 1628868428, 1628868428, '777', 1630252132),
	(96, 1628868428, 1628868428, '55', 1630252137),
	(97, 1628687545, 1628868428, 'peter parker', 1630252368),
	(98, 1628687545, 1628868428, 'l', 1630252426),
	(99, 1628687545, 1628868428, 'k', 1630252501),
	(100, 1628687545, 1628868428, 'kk', 1630252540),
	(101, 1628687545, 1628868428, 'dont you get it?', 1630252641),
	(102, 1628868428, 1628868428, 'i cant hear you', 1630252654),
	(103, 1628868428, 1628868428, 'how?', 1630252822),
	(104, 1628687545, 1628868428, 'tendency', 1630252833),
	(105, 1628687545, 1628866787, 'v', 1630253737),
	(106, 1628687545, 1628868428, 'v', 1630253742),
	(107, 1628687545, 1628868428, '000', 1630253752),
	(108, 1628687545, 1628868428, 'crying out', 1630253775),
	(109, 1628687545, 1628868428, '00', 1630253796),
	(110, 1628687545, 1628868428, 'tuls pesan', 1630253831),
	(111, 1628687545, 1628868428, 'weaks', 1630253876),
	(112, 1628687545, 1628868428, 'percobaan kesekian kalinya', 1630254340),
	(113, 1628687545, 1628868428, 'akhirnya', 1630254349),
	(114, 1628687545, 1628868428, 'bisa juga', 1630254405),
	(115, 1628687545, 1628868428, 'bikin ', 1630254409),
	(116, 1628687545, 1628868428, 'chatbox', 1630254414),
	(117, 1628687545, 1628868428, 'apa lagi sekarang?', 1630254432),
	(118, 1628868428, 1628868428, 's', 1630254461),
	(119, 1628868428, 1628868428, 'yaritori shiyo yo', 1630254519),
	(120, 1628687545, 1628868428, 'nani o hanasu?', 1630254531),
	(121, 1628868428, 1628868428, 'nandemo ii kara, ecchi na hanashi demo WWWW', 1630254552),
	(122, 1628687545, 1628866787, 'po', 1630254580),
	(123, 1628866787, 1628866787, 'apa sih? sok kenal', 1630254659),
	(124, 1628866787, 1628866787, 'govlok', 1630254669),
	(125, 1628866787, 1628866787, 'p', 1630291743),
	(126, 1628687545, 1628866787, 'samlekom', 1630291805),
	(127, 1628687545, 1628866787, 'ada apa bapak?', 1630291823),
	(128, 1628687545, 1628866787, 'status online', 1630291921),
	(129, 1628687545, 1628866787, 'OOP PHP', 1630291933),
	(130, 1628687545, 1628866787, 'yeeey', 1630291947),
	(131, 1628687545, 1628866787, 'telolet om', 1630291968),
	(132, 1628866787, 1628866787, 'ini dari tadi ngomongin apa sih', 1630291981),
	(133, 1628866787, 1628866787, 'bodo amat lah', 1630291998),
	(134, 1628866787, 1628866787, 'gg', 1630292032),
	(135, 1628687545, 1628866787, 'lha pie', 1630292046),
	(136, 1628687545, 1628866787, 'gelut ye?', 1630292054),
	(137, 1628687545, 1628866787, 'ra beres', 1630292094),
	(138, 1628687545, 1628868428, 's', 1630292231),
	(139, 1628687545, 1628866787, 'vv', 1630292273),
	(140, 1628687545, 1628866787, 'aa', 1630292404),
	(141, 1628687545, 1628866787, 'bugging', 1630292419),
	(142, 1628687545, 1628866787, 'Mangga atau mempelam adalah nama sejenis buah, demikian pula nama pohonnya. Mangga termasuk ke dalam ...', 1630292432),
	(143, 1628687545, 1628866787, 'svv', 1630292652),
	(144, 1628687545, 1628866787, 'Mangga atau mempelam adalah nama sejenis buah, demikian pula nama pohonnya. Mangga termasuk ke dalam ...', 1630292719),
	(145, 1628866787, 1628866787, 'hachigatsu nanoka', 1630292743),
	(146, 1628866787, 1628866787, 'v', 1630294705),
	(147, 1628687545, 1628866787, 'this', 1630330346),
	(148, 1628687545, 1628868428, 'this', 1630330351),
	(149, 1628687545, 1628866787, 'a', 1630330360),
	(150, 1628687545, 1628866787, 'b', 1630330361),
	(151, 1628687545, 1628866787, 'c', 1630330363),
	(152, 1628687545, 1628866787, 'd', 1630330364),
	(153, 1628687545, 1628866787, 'e', 1630330365),
	(154, 1628687545, 1628866787, 'f', 1630330366),
	(155, 1628687545, 1628866787, 'g', 1630330367),
	(156, 1628687545, 1628866787, 'h', 1630330369),
	(157, 1628687545, 1628866787, 'i', 1630330370),
	(158, 1628687545, 1628866787, 'j', 1630330371),
	(159, 1628687545, 1628866787, 'k', 1630330373);
/*!40000 ALTER TABLE `galeri_chat` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.galeri_karya
DROP TABLE IF EXISTS `galeri_karya`;
CREATE TABLE IF NOT EXISTS `galeri_karya` (
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

-- Dumping data for table db_galeri_udb.galeri_karya: ~7 rows (approximately)
DELETE FROM `galeri_karya`;
/*!40000 ALTER TABLE `galeri_karya` DISABLE KEYS */;
INSERT INTO `galeri_karya` (`id_karya`, `id_user`, `judul`, `deskripsi`, `youtube`, `link`, `time`, `dihapus`, `published`, `loves`, `id_kategori`, `tim`) VALUES
	('1628687548_1629796492', '1628687548', 'Project Android 1', 'Mangga atau mempelam adalah nama sejenis buah, demikian pula nama pohonnya. Mangga termasuk ke dalam marga Mangifera, yang terdiri dari 35-40 anggota dari suku Anacardiaceae.<br>', 'https://youtu.be/20ZWyCOFG6g, https://www.youtube.com/embed/tMWkeBIohBs, https://www.youtube.com/watch?v=35WcRmWlHks', 'https://youtu.be/20ZWyCOFG6g', 1629875549, 0, 1, 9, 1, 'Aku, Kamu, Dia'),
	('1628687548_1629819781', '1628687548', 'Project Android 2', '<p><b>Halo</b></p>', '', '', 1629821124, 1, 0, 0, 1, 'Loa, Lenore, Hector'),
	('1628687548_1629821550', '1628687548', 'Project Android 2', '<p>Mangga atau mempelam adalah nama sejenis buah, demikian pula nama pohonnya. Mangga termasuk ke dalam marga Mangifera, yang terdiri dari 35-40 anggota dari suku Anacardiaceae.<br></p>', '', '', 1630093523, 0, 1, 4, 1, '1'),
	('1628687548_1629874727', '1628687548', 'Project Android 3', '<p>1</p>', '', '', 1629874745, 1, 1, 0, 1, '1'),
	('1628687548_1629877288', '1628687548', 'Project Android 3', '<p>Mangga atau mempelam adalah nama sejenis buah, demikian pula nama pohonnya. Mangga termasuk ke dalam marga Mangifera, yang terdiri dari 35-40 anggota dari suku Anacardiaceae.<br></p>', '', '1', 1630093516, 0, 1, 1, 1, '1'),
	('1628687548_1629877320', '1628687548', 'SIBARMATI', '<p>3</p>', '3', '3', 1629877329, 1, 0, 0, 1, '3'),
	('1628687548_1629877487', '1628687548', 'SIBARMATI3333', '<p>s</p>', 's', '', 1629877500, 1, 0, 0, 1, 's'),
	('1628868428_1630088976', '1628868428', 'KOKO HEKMATYAR', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 'https://www.youtube.com/watch?v=J_IsnEZcl4E, https://youtu.be/PJIKigzBNw0, https://youtu.be/7ZX9TMg80ks, https://youtu.be/hB6fWrObqk4', 'https://koreksoftware.tech', 1630089320, 0, 0, 1, 1, 'Widi, Baka, Yuli');
/*!40000 ALTER TABLE `galeri_karya` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.galeri_kategori
DROP TABLE IF EXISTS `galeri_kategori`;
CREATE TABLE IF NOT EXISTS `galeri_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.galeri_kategori: ~1 rows (approximately)
DELETE FROM `galeri_kategori`;
/*!40000 ALTER TABLE `galeri_kategori` DISABLE KEYS */;
INSERT INTO `galeri_kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Android');
/*!40000 ALTER TABLE `galeri_kategori` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.galeri_notifikasi
DROP TABLE IF EXISTS `galeri_notifikasi`;
CREATE TABLE IF NOT EXISTS `galeri_notifikasi` (
  `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `teks` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_notifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.galeri_notifikasi: ~3 rows (approximately)
DELETE FROM `galeri_notifikasi`;
/*!40000 ALTER TABLE `galeri_notifikasi` DISABLE KEYS */;
INSERT INTO `galeri_notifikasi` (`id_notifikasi`, `judul`, `teks`, `time`) VALUES
	(5, 'SIBARMATI', '123', 1630349764),
	(7, 'Project Android 1', '0', 1630350011);
/*!40000 ALTER TABLE `galeri_notifikasi` ENABLE KEYS */;

-- Dumping structure for table db_galeri_udb.galeri_user
DROP TABLE IF EXISTS `galeri_user`;
CREATE TABLE IF NOT EXISTS `galeri_user` (
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `bukti_mahasiswa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `waktu_daftar` int(20) DEFAULT 0,
  `terakhir_online` int(20) DEFAULT 0,
  `admin` int(1) DEFAULT 0,
  `terakhir_dibaca_user` int(20) DEFAULT 0,
  `terakhir_dibaca_panitia` int(20) DEFAULT 0,
  `diblokir` int(1) DEFAULT 0,
  `notifikasi_dibaca` int(50) DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_galeri_udb.galeri_user: ~5 rows (approximately)
DELETE FROM `galeri_user`;
/*!40000 ALTER TABLE `galeri_user` DISABLE KEYS */;
INSERT INTO `galeri_user` (`id_user`, `email`, `username`, `password`, `hp`, `photo`, `bukti_mahasiswa`, `waktu_daftar`, `terakhir_online`, `admin`, `terakhir_dibaca_user`, `terakhir_dibaca_panitia`, `diblokir`, `notifikasi_dibaca`) VALUES
	('1628687545', 'widi@admin', 'Widi Dwi N', '321', '8552222222', '16286875451630338826.jpeg', '', 0, 1630353649, 1, 0, 0, 0, 2),
	('1628687548', 'widibaka55@gmail.com', 'widibaka', '321', '8552222222', '16286875481630093438.jpeg', '', 0, 1630096171, 0, 0, 0, 0, 0),
	('1628687549', 'ali@admin', 'Ali Basuki', '321', '8552222222', '16286875491630088594.jpeg', '', 0, 1630097268, 1, 0, 0, 0, 0),
	('1628866787', 'ari@gg.com', 'ARI', '123', '89979665445', '16288667871630086945.jpeg', '', 0, 1630330011, 0, 1630294748, 1630330423, 0, 0),
	('1628868428', 'koko@gmail.com', 'KOKO', '123', '81226203761', '16288684281630088877.jpeg', '', 0, 1630345763, 0, 1630345760, 1630330421, 0, 0);
/*!40000 ALTER TABLE `galeri_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
