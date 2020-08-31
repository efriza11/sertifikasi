-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sertifikasi.field_objek_sertifikasi
CREATE TABLE IF NOT EXISTS `field_objek_sertifikasi` (
  `id_field` int(11) NOT NULL AUTO_INCREMENT,
  `id_objek` int(11) NOT NULL,
  `nama_field` varchar(50) DEFAULT NULL,
  `isi_field` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_field`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.field_objek_sertifikasi: ~11 rows (approximately)
/*!40000 ALTER TABLE `field_objek_sertifikasi` DISABLE KEYS */;
INSERT INTO `field_objek_sertifikasi` (`id_field`, `id_objek`, `nama_field`, `isi_field`) VALUES
	(1, 1, 'Nama FTM', 'FTM Banjarmasin'),
	(2, 1, 'Data Periode', 'Juli 2020'),
	(3, 1, 'ODC', '59 ODC'),
	(159, 1, 'Revenue', 'Rp. 4,923,773,273'),
	(160, 1, 'Kapasitas Rack', '7 Racks'),
	(161, 1, 'Port Terpakai ', '22,735 Port'),
	(162, 1, 'Port Idle', '7,201 Port'),
	(163, 1, 'Okupansi Port', '76%'),
	(166, 161, 'Nama Ruangan', 'FTM Kayutangi'),
	(167, 161, 'Periode', 'Agustus 2020'),
	(168, 162, 'a', 'a');
/*!40000 ALTER TABLE `field_objek_sertifikasi` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.jenis_sertifikasi
CREATE TABLE IF NOT EXISTS `jenis_sertifikasi` (
  `id_jenis_sertifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_objek_sertifikasi` int(11) NOT NULL,
  `nama_sertifikasi` varchar(50) NOT NULL,
  `tgl_sertifikasi` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `nama_certifier` varchar(50) DEFAULT NULL,
  `jabatan_certifier` varchar(50) DEFAULT NULL,
  `nik_certifier` varchar(50) DEFAULT NULL,
  `kode_qr` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_jenis_sertifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.jenis_sertifikasi: ~3 rows (approximately)
/*!40000 ALTER TABLE `jenis_sertifikasi` DISABLE KEYS */;
INSERT INTO `jenis_sertifikasi` (`id_jenis_sertifikasi`, `id_objek_sertifikasi`, `nama_sertifikasi`, `tgl_sertifikasi`, `valid_until`, `nama_certifier`, `jabatan_certifier`, `nik_certifier`, `kode_qr`, `created_date`) VALUES
	(1, 1, 'FTM Sehat', '2020-07-20', '2021-08-20', 'Arief Yulianto', 'GM Witel Kalsel', '670122', 'fyweh', '2020-07-27 10:54:11'),
	(19, 161, 'FTM Sehat', '2020-08-26', '2021-08-26', 'Efriza', 'Inovasi', '123456', 'gbrie', '2020-08-26 09:52:44'),
	(20, 162, 'Server Bersih', '2020-08-26', '2021-08-26', 'AAA', 'Ada', '123456', 'vsnry', '2020-08-26 09:58:01'),
	(21, 162, 'Ruangan Sehat', '2020-08-31', '2021-08-31', 'Efriza Irsad', 'INOVASI KALSEL', '123456', 'fzbca', '2020-08-31 09:35:21'),
	(22, 162, 'Server Baru', '2020-08-31', '2021-08-31', 'Efriza', 'INOVASI KALSEL', '123456', 'kixvd', '2020-08-31 10:50:04');
/*!40000 ALTER TABLE `jenis_sertifikasi` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.media
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `id_objek` int(11) NOT NULL,
  `tipe_media` varchar(50) DEFAULT NULL COMMENT 'PHOTO/VIDEO',
  `url` varchar(200) DEFAULT NULL,
  `deskripsi_media` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.media: ~4 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id_media`, `id_objek`, `tipe_media`, `url`, `deskripsi_media`) VALUES
	(4, 1, 'VIDEO', 'video.mp4', 'Video FTM Banjarmasin'),
	(167, 161, 'PHOTO', '167.jpg', 'Foto 1'),
	(168, 161, 'VIDEO', '168.mp4', 'Video 1'),
	(169, 162, 'VIDEO', '169.mp4', 'd');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.objek_sertifikasi
CREATE TABLE IF NOT EXISTS `objek_sertifikasi` (
  `id_objek` int(11) NOT NULL AUTO_INCREMENT,
  `id_sto` int(11) NOT NULL,
  `nama_objek_sertifikasi` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_objek`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.objek_sertifikasi: ~2 rows (approximately)
/*!40000 ALTER TABLE `objek_sertifikasi` DISABLE KEYS */;
INSERT INTO `objek_sertifikasi` (`id_objek`, `id_sto`, `nama_objek_sertifikasi`, `deskripsi`) VALUES
	(1, 12, 'FTM Banjarmasin', 'FTM (Fiber Termination Management) adalah perangkat yang berfungsi untuk melakukan cross connect dan interconnection atau mengelola terminasi dan koneksi kabel fiber optik antar FTB dalam satu ODF atau FTB antar ODF yang menghubungkan dengan perangkat aktif baik perangkat transmisi maupun akses, dengan menggunakan patchcord sebagai penghubung (kabel jumper fiber optik). Komponen utama dari FTM terdiri dari Rack, Optical Distribution Frame (ODF) / Fiber Termination Box (FTB) sebagai terminasi kabel optik yang dilengkapi dengan fiber duct atau fiber guide, untuk memudahkan proses administrasi perkabelan, operasi dan pemeliharaan jaringan kabel optik. Dalam upaya menjaga kualitas FTM, Witel Kalsel berinisiai untuk melakukan Sertifikasi FTM Sehat. Proses sertifikasi ini merupakan upaya Witel Kalsel untuk menjaga kondisi FTM agar tetap kondusif dan teratur sehingga mampu meminimalisasi risiko redaman yang mengakibatkan underspek.'),
	(161, 2, 'FTM Kayutangi', 'FTM Kayutangi'),
	(162, 2, 'Ruang Server Ulin', 'Ruang Server Ulin');
/*!40000 ALTER TABLE `objek_sertifikasi` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.sto
CREATE TABLE IF NOT EXISTS `sto` (
  `id_sto` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sto` varchar(15) NOT NULL,
  `nama_sto` varchar(25) NOT NULL,
  PRIMARY KEY (`id_sto`),
  UNIQUE KEY `kode_sto` (`kode_sto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.sto: ~0 rows (approximately)
/*!40000 ALTER TABLE `sto` DISABLE KEYS */;
/*!40000 ALTER TABLE `sto` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
