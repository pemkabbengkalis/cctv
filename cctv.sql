-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table cctv.camera
CREATE TABLE IF NOT EXISTS `camera` (
  `id` int NOT NULL AUTO_INCREMENT,
  `embed` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('up','down') NOT NULL,
  `publish` enum('y','n') NOT NULL,
  `sort` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table cctv.camera: ~6 rows (approximately)
INSERT INTO `camera` (`id`, `embed`, `description`, `status`, `publish`, `sort`, `ip`) VALUES
	(1, 'https://www.youtube.com/embed/HaUjYIyDyeU', 'PELABUHAN PENYEBERANGAN <br> AIR PUTIH - SEI SELARI <br> (ANTRIAN MOBIL DEPAN)', 'up', 'y', '2', '10.10.30.18'),
	(25, 'https://www.youtube.com/embed/vS8alUcCPxs', 'PELABUHAN PENYEBERANGAN <br> AIR PUTIH - SEI SELARI <br> (ANTRIAN MOBIL)', 'up', 'y', '1', '10.10.30.14'),
	(26, 'https://www.youtube.com/embed/6ZOhqO7uD5M', 'PELABUHAN PENYEBERANGAN <br> AIR PUTIH - SEI SELARI <br> (ANTRIAN MOTOR)', 'up', 'y', '3', '10.10.30.15'),
	(27, 'https://www.youtube.com/embed/m_q-cwVDiLQ', 'PELABUHAN PENYEBERANGAN <br> SEI SELARI - AIR PUTIH <br> (ANTRIAN MOTOR)', 'up', 'y', '4', '10.10.30.17'),
	(28, 'https://www.youtube.com/embed/BtIuhcp-7cU', 'PELABUHAN PENYEBERANGAN <br> SEI SELARI - AIR PUTIH <br> (ANTRIAN MOBIL)', 'up', 'y', '5', '10.10.30.25'),
	(29, 'https://www.youtube.com/embed/GE1rNHKZJmo', 'PELABUHAN PENYEBERANGAN <br> SEI SELARI - AIR PUTIH <br> (PARKIR INAP MOBIL)', 'up', 'y', '6', '10.10.30.16');

-- Dumping structure for table cctv.counter
CREATE TABLE IF NOT EXISTS `counter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `date` date NOT NULL,
  `count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cctv.counter: ~3 rows (approximately)
INSERT INTO `counter` (`id`, `email`, `location`, `date`, `count`, `created_at`, `updated_at`) VALUES
	(11, 'bohatimulyadi99@gmail.com', NULL, '2025-03-14', 13, '2025-03-13 18:55:11', '2025-03-14 03:28:31'),
	(12, 'bohatimulyadi99@gmail.com', NULL, '2025-03-12', 3, '2025-03-13 18:57:00', '2025-03-14 03:28:41'),
	(13, 'bohatimulyadi99@gmail.com', NULL, '2025-03-13', 17, '2025-03-14 03:28:45', '2025-03-14 03:29:01');

-- Dumping structure for table cctv.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('y','n') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cctv.login: ~1 rows (approximately)
INSERT INTO `login` (`id`, `username`, `password`, `status`) VALUES
	(1, 'cctvbks', '21232f297a57a5a743894a0e4a801fc3', 'y');

-- Dumping structure for table cctv.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cctv.message: ~1 rows (approximately)
INSERT INTO `message` (`id`, `message`) VALUES
	(1, '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
