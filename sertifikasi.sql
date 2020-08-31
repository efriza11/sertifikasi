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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.field_objek_sertifikasi: ~2 rows (approximately)
/*!40000 ALTER TABLE `field_objek_sertifikasi` DISABLE KEYS */;
INSERT INTO `field_objek_sertifikasi` (`id_field`, `id_objek`, `nama_field`, `isi_field`) VALUES
	(1, 1, 'Genset', '3'),
	(2, 1, 'Kipas', '10'),
	(3, 1, 'Sapu', '4');
/*!40000 ALTER TABLE `field_objek_sertifikasi` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.jenis_sertifikasi
CREATE TABLE IF NOT EXISTS `jenis_sertifikasi` (
  `id_jenis_sertifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_objek_sertifikasi` int(11) NOT NULL,
  `nama_sertifikasi` varchar(50) NOT NULL,
  `tgl_sertifikasi` date NOT NULL,
  `nama_certifier` varchar(50) NOT NULL,
  `jabatan_certifier` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_jenis_sertifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.jenis_sertifikasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `jenis_sertifikasi` DISABLE KEYS */;
INSERT INTO `jenis_sertifikasi` (`id_jenis_sertifikasi`, `id_objek_sertifikasi`, `nama_sertifikasi`, `tgl_sertifikasi`, `nama_certifier`, `jabatan_certifier`, `created_date`) VALUES
	(1, 1, 'Ruang FTM Sehat', '2020-07-27', 'Certi', 'IP Network', '2020-07-27 10:54:11');
/*!40000 ALTER TABLE `jenis_sertifikasi` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.media
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `id_objek` int(11) NOT NULL,
  `tipe_media` varchar(50) DEFAULT NULL COMMENT 'PHOTO/VIDEO',
  `url` varchar(200) DEFAULT NULL,
  `deskripsi_media` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.media: ~4 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id_media`, `id_objek`, `tipe_media`, `url`, `deskripsi_media`) VALUES
	(1, 1, 'PHOTO', '1.jpg', 'Foto Pertama'),
	(2, 1, 'PHOTO', '2.jpg', 'Foto Kedua'),
	(3, 1, 'PHOTO', '3.jpg', 'Foto Ketiga'),
	(4, 1, 'VIDEO', 'video.mp4', 'Video Pertama');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table sertifikasi.objek_sertifikasi
CREATE TABLE IF NOT EXISTS `objek_sertifikasi` (
  `id_objek` int(11) NOT NULL AUTO_INCREMENT,
  `id_sto` int(11) NOT NULL,
  `nama_objek_sertifikasi` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kode_qr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_objek`),
  UNIQUE KEY `kode_qr` (`kode_qr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sertifikasi.objek_sertifikasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `objek_sertifikasi` DISABLE KEYS */;
INSERT INTO `objek_sertifikasi` (`id_objek`, `id_sto`, `nama_objek_sertifikasi`, `deskripsi`, `kode_qr`) VALUES
	(1, 12, 'Ruang FTM', 'Ruangan adalah suatu tempat tertutup dengan langit-langit yang berada di rumah atau bentuk bangunan lainnya. Ruangan biasanya memiliki pintu dan beberapa jendela yang berfungsi sebagai tempat masuknya cahaya, aliran udara, dan akses menuju ruangan tersebut. Ruangan yang berukuran besar sering disebut dengan istilah aula. Beberapa ruangan memiliki nama spesifik sesuai dengan tujuan pembuatan dan penggunaannya. Sebagai contoh, ruangan untuk memasak disebut dengan dapur. Perencanaan struktur, penggunaan, dan dekorasi interior ruangan adalah bagian dari disiplin ilmu arsitektur.', 'fyweh');
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
