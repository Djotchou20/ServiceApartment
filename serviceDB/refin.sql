-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for serviceapartment
CREATE DATABASE IF NOT EXISTS `serviceapartment` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `serviceapartment`;

-- Dumping structure for table serviceapartment.apartment
CREATE TABLE IF NOT EXISTS `apartment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `apartment_id` int DEFAULT NULL,
  `type` enum('RENT','LEASE') NOT NULL DEFAULT 'RENT',
  `location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(20,6) NOT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` text NOT NULL,
  `status` enum('ACTIVE','TAKEN') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ACTIVE',
  `bed` varchar(50) NOT NULL,
  `bathroom` varchar(50) NOT NULL,
  `toilet` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.apartment: ~6 rows (approximately)
INSERT INTO `apartment` (`id`, `apartment_id`, `type`, `location`, `price`, `description`, `image`, `status`, `bed`, `bathroom`, `toilet`) VALUES
	(1, 1, 'RENT', 'Lagos, Ajah', 176000.000000, 'Penthouse House ', 'property-4.jpg', 'ACTIVE', '4', '4', '3'),
	(2, 2, 'LEASE', 'Lagos, Lekki', 150000.000000, 'Golden Urban House', 'property-1.jpg', 'ACTIVE', '3', '3', '3'),
	(3, 3, 'RENT', 'Lagos, Orchid', 100000.000000, 'Terrace Duplex House ', 'property-6.jpg', 'ACTIVE', '4', '3', '4'),
	(4, 4, 'LEASE', 'Lagos, Ikoyi', 180000.000000, 'Detached Duplex', 'property-2.jpg', 'ACTIVE', '4', '4', '4'),
	(5, 5, 'RENT', 'Lagos, Agungi', 125000.000000, 'Duplex House ', 'property-3.jpg', 'ACTIVE', '3', '3', '3'),
	(6, 6, 'RENT', 'Lagos, Ologolo', 130000.000000, ' Semi-Duplex  House ', 'property-5.jpg', 'TAKEN', '4', '3', '5'),
	(7, 7, 'LEASE', 'Lagos, Ikeja', 170000.000000, 'Semi-Detached Duplex', 'property-1.jpg', 'ACTIVE', '4', '3', '4');

-- Dumping structure for table serviceapartment.form
CREATE TABLE IF NOT EXISTS `form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.form: ~10 rows (approximately)
INSERT INTO `form` (`id`, `firstname`, `lastname`, `email`, `message`) VALUES
	(1, 'Djotchou', 'Chukwuemeka', 'djotchou20@gmail.com', 'Just testing this form. \r\nThank you'),
	(2, 'Gabriel', 'Irabor', 'gabriel@gmail.com', 'A regular tester for service apartment'),
	(3, 'Djotchou', 'Chukwuemeka', 'djotchou20@gmail.com', 'What is your rate like?'),
	(4, 'Joko', 'Okupe', 'djotchou20@gmail.com', 'How can I get to be an agent on your platform'),
	(5, 'Jaye', 'Kope', 'djotchou20@gmail.com', 'I want to know how to apply to become an agent'),
	(6, 'Gabriel', 'Okunwa', 'gabriel01@gmail', 'I am a good tester'),
	(7, 'jamiu', 'adesanya', 'jamiu3@gmail.com', 'A good tester at work'),
	(8, 'Joseph', 'Haruna', 'joseph@gmail.com', 'Please, I want to know how this company registers an agent'),
	(9, 'Gift', 'Mary', 'gift@gmail.com', 'I am want to become an agent how can that be possible?'),
	(10, 'Jamine', 'Yolanda', 'jamine@gmail.com', 'I want t become an agent to post properties on this site, how can that be possible?');

-- Dumping structure for table serviceapartment.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'INACTIVE',
  `paid` enum('PAID','NOT PAID') DEFAULT 'NOT PAID',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.members: ~24 rows (approximately)
INSERT INTO `members` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `status`, `paid`, `created_at`) VALUES
	(2, '', 'Chima', 'rose@gmail.com', '0', '$2y$10$EXBr6zJtqzUmjqepFMzd3eMI29fblk5P1UbwNJwXSuT', 'INACTIVE', 'NOT PAID', NULL),
	(3, '', 'Chukwuemeka', 'rose20@gmail.com', '', '$2y$10$j.HBAh0hWjbojDn23GZ6veXTZUJsMjHpEE2IY8Hb3rX', 'INACTIVE', 'NOT PAID', NULL),
	(4, '', 'Favour', 'favour@gmail.com', '', '$2y$10$P4UfSLD0wOdBlzkUwKRBCu3anMjH8gU5P7s1palTzct', 'INACTIVE', 'NOT PAID', NULL),
	(5, '', 'Chukwuemeka', 'djotchou@gmail.com', '', '$2y$10$Aob9wk7jJjU457OO.e6S.e3AFp7YI0jXAyY2Sl4Fzki', 'INACTIVE', 'NOT PAID', NULL),
	(6, '', 'Long', 'john@gmail.com', '', '$2y$10$odrLFrE0LLujVCOU6nkvB.2KOKy6Bl7.SL1t.9vufxp', 'INACTIVE', 'NOT PAID', NULL),
	(7, '', 'Adejumo', 'kemi@gmail.com', '', '$2y$10$g./FYGO9Gj0tnxpY8AWgtO8yt133tZieQGXwIUIqjLE', 'INACTIVE', 'NOT PAID', NULL),
	(8, '', 'Modupe', 'seun@gmail.com', '09122448595', '$2y$10$xpSQ4XpDNhTrfQBrG.qH4OkXjT19PX/ysdx6SNdDn2N', 'INACTIVE', 'NOT PAID', NULL),
	(9, '', 'Folarin', 'folarin@gmail.com', '0707766445', '$2y$10$B4NWGH80EBqPEhz7eRnxKeKBFuptLGvO/kMTezG7Ddd', 'INACTIVE', 'NOT PAID', NULL),
	(10, '', 'Juwon', 'faith@gmail.com', '09122647488', '$2y$10$eM9oC1fGqFTMSEONJITXgOVUmrQIu84/h.mmEXKEGjQ', 'INACTIVE', 'NOT PAID', NULL),
	(11, '', 'Jam', 'jam@gmail.com', '08145390300', '$2y$10$75FJ.BInZsJsC0QC9xOIguSUgEFG3YTGMpqgZxBvTpR', 'INACTIVE', 'NOT PAID', NULL),
	(12, '', 'Mason', 'mason@gmail.com', '09023353537', '$2y$10$NalZKqc.junqtw.fvuDoKOC/hUyTh0WXMj3sMAQuGTO/B.FeyPMOe', 'INACTIVE', 'NOT PAID', NULL),
	(13, '', 'Chukwuemeka', 'djotchou21@gmail.com', '08054522505', '$2y$10$0UVXTH3BdbXAIBn7.6/usO5ocUWkqWMFddEBNaimzgqBuw8o4HUlm', 'INACTIVE', 'NOT PAID', NULL),
	(14, '', 'Chukwuemeka', 'cebastienemeka@gmail.com', '08054522505', '$2y$10$1dz54lzoLbTLpJ7zptenwugx27oGbOK4.Czx7lMSbjeJbxlUa4YQW', 'INACTIVE', 'NOT PAID', NULL),
	(15, 'Mary', 'Joshua', 'mary@gmail.com', '08054522505', '$2y$10$v/dX8To3U.emTOdbSEl/YOo/B.ro7yidvmlIFrE5KUJKtS.RsMDuW', 'ACTIVE', 'NOT PAID', NULL),
	(16, '', 'Chukwuma', 'godson@gmail.com', '07045473333', '$2y$10$ISz9778wIVXrG7jg5.ZkkeWWNJy8MPJF/jtGFIQvFLVKbZ338B9gi', 'INACTIVE', 'NOT PAID', NULL),
	(17, 'Zack', 'Hunsa', 'zack@gmail.com', '07023467584', '$2y$10$nuyNPz3Xvshc3Kg7aD4Fwuf3F13fKvHWpAisIL.eIZ3vBU6mmSG6m', 'ACTIVE', 'NOT PAID', NULL),
	(18, 'zion', 'Tega', 'zion@gmail.com', '08156354488', '$2y$10$Gecr9Ety5wuEElyW7Uab5.FtWbM.JiBCPQdK3F8mkzWnARkFfw8ri', 'ACTIVE', 'NOT PAID', NULL),
	(19, 'tom', 'Ajayi', 'tom@gmai.com', '07046468448', '$2y$10$Gecr9Ety5wuEElyW7Uab5.FtWbM.JiBCPQdK3F8mkzWnARkFfw8ri', 'ACTIVE', 'NOT PAID', NULL),
	(20, 'joy', 'Chioma', 'jot@gmail.com', '09064674838', '$2y$10$A6lfth9s8wbXymhG3r0hQOrTM202LS88/RczIA4SxTcX2Mt9i.NlW', 'ACTIVE', 'NOT PAID', NULL),
	(21, 'Kasali', 'Damilola', 'kasali@gmail.com', '070745537372', '$2y$10$Y4Fu563TfVRD7CfElpuWYu9yQTMerdW/LU5RvLSgKncS/Gh3/qjge', 'ACTIVE', 'NOT PAID', NULL),
	(29, 'Gabriel', 'Irabor', 'gabintoroy@gmail.com', '08054522505', '$2y$10$C46oUJa5hG9peR6F4FvP5Oej00MWTsBs3y/028kCHGXZCJYRW6AQ2', 'INACTIVE', 'NOT PAID', NULL),
	(30, 'Djotchou', 'Chukwuemeka', 'djotchou20@gmail.com', '08054522505', '$2y$10$8Ux8mkF64KmAAmWOHRVhzODSG6UW8Y/6fU.LcjQsjCbVqH1Ah5fJG', 'ACTIVE', 'NOT PAID', NULL),
	(31, 'Henshaw', 'Kate', 'kate@gmail.com', '09056637707', '$2y$10$p5bgQAxHoEba1tF3d1NNF.JwpypVKzo7Xc9GlE4I87qZ1NA5.Z3QG', 'INACTIVE', 'NOT PAID', NULL),
	(32, 'Kingdom', 'Emeka', 'kingdom@gmail.com', '08054522505', '$2y$10$L5dzx2U.gE3FUm44fmNmfusqdWt132iPJvym74Eh27ZX6iTUGhR/e', 'ACTIVE', 'NOT PAID', NULL),
	(33, 'Josiah', 'Martin', 'martin@gmail.com', '08054522505', '$2y$10$TgipXnUi1ki5i4so96.Lae1fiPhGg.HIB4RGp0KH0VCBtCHclLzyy', 'ACTIVE', 'NOT PAID', NULL),
	(34, 'Gift', 'Mary', 'gift@gmail.com', '08012345678', '$2y$10$89d52PuSLLqy8QYj8UBf3emKgFT44MZ2jzxl9yAqwGkH5ytJEtGFG', 'ACTIVE', 'NOT PAID', NULL),
	(35, 'Jasmine', 'Yolanda', 'jasmine@gmail.com', '08801234678', '$2y$10$gXPvU7xnXimY7stZnk6zheo3wD7/LpmyodBdrkBL/bD2EUwzvgaq6', 'ACTIVE', 'NOT PAID', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
