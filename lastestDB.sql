-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             12.8.0.6908
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
DROP DATABASE IF EXISTS `serviceapartment`;
CREATE DATABASE IF NOT EXISTS `serviceapartment` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `serviceapartment`;

-- Dumping structure for table serviceapartment.agents
DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('admin','agent','buyer') DEFAULT 'agent',
  `change_time` datetime NOT NULL,
  `changed_by` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `govt_id` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `photo` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'INACTIVE',
  `paid` enum('PAID','UNPAID') DEFAULT 'UNPAID',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.agents: ~1 rows (approximately)
DELETE FROM `agents`;
INSERT INTO `agents` (`id`, `name`, `username`, `email`, `password`, `phone`, `role`, `change_time`, `changed_by`, `address`, `govt_id`, `country`, `company_name`, `photo`, `status`, `paid`, `created_at`) VALUES
	(42, 'fred frecb', 'fred503', 'bryh@gmail.com', '$2y$10$3yx4KL.zPEe78YKTYJa1Uu1XD0hCgbJdNGMRYkRocPFnnZv9gK2ci', '09077425232', 'agent', '2025-03-02 11:50:30', 'admin807', 'ajah ilaje', '', 'Antigua and Barbuda', 'freeeeeeeeee', NULL, 'INACTIVE', 'PAID', '2025-03-02 11:41:45');

-- Dumping structure for table serviceapartment.apartment
DROP TABLE IF EXISTS `apartment`;
CREATE TABLE IF NOT EXISTS `apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_id` int(11) DEFAULT NULL,
  `type` enum('RENT','LEASE') NOT NULL DEFAULT 'RENT',
  `location` varchar(50) NOT NULL,
  `price` decimal(20,6) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `status` enum('ACTIVE','TAKEN') NOT NULL DEFAULT 'ACTIVE',
  `bed` varchar(50) NOT NULL,
  `bathroom` varchar(50) NOT NULL,
  `toilet` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.apartment: ~7 rows (approximately)
DELETE FROM `apartment`;
INSERT INTO `apartment` (`id`, `apartment_id`, `type`, `location`, `price`, `description`, `image`, `status`, `bed`, `bathroom`, `toilet`) VALUES
	(1, 1, 'RENT', 'Lagos, Ajah', 176000.000000, 'Penthouse House ', 'property-4.jpg', 'ACTIVE', '4', '4', '3'),
	(2, 2, 'LEASE', 'Lagos, Lekki', 150000.000000, 'Golden Urban House', 'property-1.jpg', 'ACTIVE', '3', '3', '3'),
	(3, 3, 'RENT', 'Lagos, Orchid', 100000.000000, 'Terrace Duplex House ', 'property-6.jpg', 'ACTIVE', '4', '3', '4'),
	(4, 4, 'LEASE', 'Lagos, Ikoyi', 180000.000000, 'Detached Duplex', 'property-2.jpg', 'ACTIVE', '4', '4', '4'),
	(5, 5, 'RENT', 'Lagos, Agungi', 125000.000000, 'Duplex House ', 'property-3.jpg', 'ACTIVE', '3', '3', '3'),
	(6, 6, 'RENT', 'Lagos, Ologolo', 130000.000000, ' Semi-Duplex  House ', 'property-5.jpg', 'TAKEN', '4', '3', '5'),
	(7, 7, 'LEASE', 'Lagos, Ikeja', 170000.000000, 'Semi-Detached Duplex', 'property-1.jpg', 'ACTIVE', '4', '3', '4');

-- Dumping structure for table serviceapartment.bookings
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `changed_by` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `thumbnail` text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `check_out` date NOT NULL,
  `change_time` datetime NOT NULL,
  `prop_url` text NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') DEFAULT 'pending',
  `payment_status` enum('pending','paid') DEFAULT 'pending',
  `payment_method` enum('card','bank_transfer','cash') DEFAULT 'card',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`),
  KEY `user_id` (`agent_id`) USING BTREE,
  KEY `FK_bookings_users` (`user_id`),
  CONSTRAINT `FK_bookings_agents` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_bookings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.bookings: ~0 rows (approximately)
DELETE FROM `bookings`;
INSERT INTO `bookings` (`id`, `property_id`, `user_id`, `agent_id`, `check_in`, `username`, `changed_by`, `name`, `thumbnail`, `title`, `check_out`, `change_time`, `prop_url`, `total_price`, `price`, `status`, `payment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
	(32, 42, 2, 42, '2025-03-01', 'ibry804', 'admin807', 'ibry moham', 'uploads/thumbnails/1740915948_efdd52fb341bfd38c45a.jpg', 'New Rose Land Estate Apartments', '2025-03-07', '2025-03-02 16:33:47', 'new-rose-land-estate-apartments', 140664.00, 23444.00, 'confirmed', 'paid', 'card', '2025-03-02 12:35:29', '2025-03-02 15:33:47');

-- Dumping structure for table serviceapartment.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.categories: ~4 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
	(1, 'Apartment', '2025-01-31 08:12:50'),
	(2, 'Villa', '2025-01-31 08:12:50'),
	(3, 'Studio', '2025-01-31 08:12:50'),
	(4, 'Penthouse', '2025-01-31 08:12:50');

-- Dumping structure for table serviceapartment.countries
DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.countries: ~196 rows (approximately)
DELETE FROM `countries`;
INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'Afghanistan', 'AF', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(2, 'Albania', 'AL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(3, 'Algeria', 'DZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(4, 'Andorra', 'AD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(5, 'Angola', 'AO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(6, 'Antigua and Barbuda', 'AG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(7, 'Argentina', 'AR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(8, 'Armenia', 'AM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(9, 'Australia', 'AU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(10, 'Austria', 'AT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(11, 'Azerbaijan', 'AZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(12, 'Bahamas', 'BS', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(13, 'Bahrain', 'BH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(14, 'Bangladesh', 'BD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(15, 'Barbados', 'BB', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(16, 'Belarus', 'BY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(17, 'Belgium', 'BE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(18, 'Belize', 'BZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(19, 'Benin', 'BJ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(20, 'Bhutan', 'BT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(21, 'Bolivia', 'BO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(22, 'Bosnia and Herzegovina', 'BA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(23, 'Botswana', 'BW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(24, 'Brazil', 'BR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(25, 'Brunei', 'BN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(26, 'Bulgaria', 'BG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(27, 'Burkina Faso', 'BF', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(28, 'Burundi', 'BI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(29, 'Cabo Verde', 'CV', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(30, 'Cambodia', 'KH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(31, 'Cameroon', 'CM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(32, 'Canada', 'CA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(33, 'Central African Republic', 'CF', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(34, 'Chad', 'TD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(35, 'Chile', 'CL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(36, 'China', 'CN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(37, 'Colombia', 'CO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(38, 'Comoros', 'KM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(39, 'Congo, Democratic Republic of the', 'CD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(40, 'Congo, Republic of the', 'CG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(41, 'Costa Rica', 'CR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(42, 'Cote d\'Ivoire', 'CI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(43, 'Croatia', 'HR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(44, 'Cuba', 'CU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(45, 'Cyprus', 'CY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(46, 'Czech Republic', 'CZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(47, 'Denmark', 'DK', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(48, 'Djibouti', 'DJ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(49, 'Dominica', 'DM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(50, 'Dominican Republic', 'DO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(51, 'East Timor (Timor-Leste)', 'TL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(52, 'Ecuador', 'EC', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(53, 'Egypt', 'EG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(54, 'El Salvador', 'SV', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(55, 'Equatorial Guinea', 'GQ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(56, 'Eritrea', 'ER', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(57, 'Estonia', 'EE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(58, 'Eswatini', 'SZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(59, 'Ethiopia', 'ET', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(60, 'Fiji', 'FJ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(61, 'Finland', 'FI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(62, 'France', 'FR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(63, 'Gabon', 'GA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(64, 'Gambia', 'GM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(65, 'Georgia', 'GE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(66, 'Germany', 'DE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(67, 'Ghana', 'GH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(68, 'Greece', 'GR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(69, 'Grenada', 'GD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(70, 'Guatemala', 'GT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(71, 'Guinea', 'GN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(72, 'Guinea-Bissau', 'GW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(73, 'Guyana', 'GY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(74, 'Haiti', 'HT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(75, 'Honduras', 'HN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(76, 'Hungary', 'HU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(77, 'Iceland', 'IS', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(78, 'India', 'IN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(79, 'Indonesia', 'ID', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(80, 'Iran', 'IR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(81, 'Iraq', 'IQ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(82, 'Ireland', 'IE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(83, 'Israel', 'IL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(84, 'Italy', 'IT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(85, 'Jamaica', 'JM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(86, 'Japan', 'JP', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(87, 'Jordan', 'JO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(88, 'Kazakhstan', 'KZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(89, 'Kenya', 'KE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(90, 'Kiribati', 'KI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(91, 'Korea, North', 'KP', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(92, 'Korea, South', 'KR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(93, 'Kosovo', 'XK', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(94, 'Kuwait', 'KW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(95, 'Kyrgyzstan', 'KG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(96, 'Laos', 'LA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(97, 'Latvia', 'LV', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(98, 'Lebanon', 'LB', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(99, 'Lesotho', 'LS', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(100, 'Liberia', 'LR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(101, 'Libya', 'LY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(102, 'Liechtenstein', 'LI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(103, 'Lithuania', 'LT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(104, 'Luxembourg', 'LU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(105, 'Madagascar', 'MG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(106, 'Malawi', 'MW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(107, 'Malaysia', 'MY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(108, 'Maldives', 'MV', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(109, 'Mali', 'ML', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(110, 'Malta', 'MT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(111, 'Marshall Islands', 'MH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(112, 'Mauritania', 'MR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(113, 'Mauritius', 'MU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(114, 'Mexico', 'MX', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(115, 'Micronesia', 'FM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(116, 'Moldova', 'MD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(117, 'Monaco', 'MC', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(118, 'Mongolia', 'MN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(119, 'Montenegro', 'ME', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(120, 'Morocco', 'MA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(121, 'Mozambique', 'MZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(122, 'Myanmar (Burma)', 'MM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(123, 'Namibia', 'NA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(124, 'Nauru', 'NR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(125, 'Nepal', 'NP', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(126, 'Netherlands', 'NL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(127, 'New Zealand', 'NZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(128, 'Nicaragua', 'NI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(129, 'Niger', 'NE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(130, 'Nigeria', 'NG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(131, 'North Macedonia (formerly Macedonia)', 'MK', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(132, 'Norway', 'NO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(133, 'Oman', 'OM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(134, 'Pakistan', 'PK', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(135, 'Palau', 'PW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(136, 'Panama', 'PA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(137, 'Papua New Guinea', 'PG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(138, 'Paraguay', 'PY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(139, 'Peru', 'PE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(140, 'Philippines', 'PH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(141, 'Poland', 'PL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(142, 'Portugal', 'PT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(143, 'Qatar', 'QA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(144, 'Romania', 'RO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(145, 'Russia', 'RU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(146, 'Rwanda', 'RW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(147, 'Saint Kitts and Nevis', 'KN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(148, 'Saint Lucia', 'LC', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(149, 'Saint Vincent and the Grenadines', 'VC', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(150, 'Samoa', 'WS', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(151, 'San Marino', 'SM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(152, 'Sao Tome and Principe', 'ST', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(153, 'Saudi Arabia', 'SA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(154, 'Senegal', 'SN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(155, 'Serbia', 'RS', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(156, 'Seychelles', 'SC', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(157, 'Sierra Leone', 'SL', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(158, 'Singapore', 'SG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(159, 'Slovakia', 'SK', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(160, 'Slovenia', 'SI', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(161, 'Solomon Islands', 'SB', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(162, 'Somalia', 'SO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(163, 'South Africa', 'ZA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(164, 'South Sudan', 'SS', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(165, 'Spain', 'ES', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(166, 'Sri Lanka', 'LK', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(167, 'Sudan', 'SD', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(168, 'Suriname', 'SR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(169, 'Sweden', 'SE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(170, 'Switzerland', 'CH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(171, 'Syria', 'SY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(172, 'Taiwan', 'TW', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(173, 'Tajikistan', 'TJ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(174, 'Tanzania', 'TZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(175, 'Thailand', 'TH', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(176, 'Togo', 'TG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(177, 'Tonga', 'TO', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(178, 'Trinidad and Tobago', 'TT', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(179, 'Tunisia', 'TN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(180, 'Turkey', 'TR', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(181, 'Turkmenistan', 'TM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(182, 'Tuvalu', 'TV', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(183, 'Uganda', 'UG', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(184, 'Ukraine', 'UA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(185, 'United Arab Emirates', 'AE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(186, 'United Kingdom', 'GB', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(187, 'United States of America', 'US', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(188, 'Uruguay', 'UY', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(189, 'Uzbekistan', 'UZ', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(190, 'Vanuatu', 'VU', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(191, 'Vatican City (Holy See)', 'VA', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(192, 'Venezuela', 'VE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(193, 'Vietnam', 'VN', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(194, 'Yemen', 'YE', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(195, 'Zambia', 'ZM', '2024-05-06 10:56:35', '2024-05-06 10:56:35'),
	(196, 'Zimbabwe', 'ZW', '2024-05-06 10:56:35', '2024-05-06 10:56:35');

-- Dumping structure for table serviceapartment.features
DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.features: ~46 rows (approximately)
DELETE FROM `features`;
INSERT INTO `features` (`id`, `name`, `created_at`) VALUES
	(1, 'Free Wi-Fi', '2025-02-26 15:43:03'),
	(2, 'Swimming Pool', '2025-02-26 15:43:03'),
	(3, 'Gym & Fitness Center', '2025-02-26 15:43:03'),
	(4, '24/7 Security', '2025-02-26 15:43:03'),
	(5, 'Air Conditioning', '2025-02-26 15:43:03'),
	(6, 'Fully Furnished', '2025-02-26 15:43:03'),
	(7, 'Smart TV', '2025-02-26 15:43:03'),
	(8, 'Parking Space', '2025-02-26 15:43:03'),
	(9, 'Housekeeping Services', '2025-02-26 15:43:03'),
	(10, 'Laundry Facilities', '2025-02-26 15:43:03'),
	(11, 'Elevator Access', '2025-02-26 15:43:03'),
	(12, 'Balcony', '2025-02-26 15:43:03'),
	(13, 'Kitchenette', '2025-02-26 15:43:03'),
	(14, 'Refrigerator', '2025-02-26 15:43:03'),
	(15, 'Microwave', '2025-02-26 15:43:03'),
	(16, 'Cookware & Utensils', '2025-02-26 15:43:03'),
	(17, 'Hot Water', '2025-02-26 15:43:03'),
	(18, 'Workspace/Desk', '2025-02-26 15:43:03'),
	(19, 'Garden or Terrace', '2025-02-26 15:43:03'),
	(20, 'Lounge Area', '2025-02-26 15:43:03'),
	(21, 'CCTV Surveillance', '2025-02-26 15:43:03'),
	(22, 'Pet Friendly', '2025-02-26 15:43:03'),
	(23, 'Children’s Playground', '2025-02-26 15:43:03'),
	(24, 'Conference Room', '2025-02-26 15:43:03'),
	(25, 'Spa & Wellness Center', '2025-02-26 15:43:03'),
	(26, 'Electricity Backup', '2025-02-26 15:43:03'),
	(27, 'Fire Extinguishers', '2025-02-26 15:43:03'),
	(28, 'Smoke Detectors', '2025-02-26 15:43:03'),
	(29, 'Intercom System', '2025-02-26 15:43:03'),
	(30, 'Gated Community', '2025-02-26 15:43:03'),
	(31, 'Tennis Court', '2025-02-26 15:43:03'),
	(32, 'Basketball Court', '2025-02-26 15:43:03'),
	(33, 'Barbecue Area', '2025-02-26 15:43:03'),
	(34, 'Rooftop Access', '2025-02-26 15:43:03'),
	(35, 'Onsite Restaurant', '2025-02-26 15:43:03'),
	(36, 'Mini Market', '2025-02-26 15:43:03'),
	(37, 'Reception & Concierge Services', '2025-02-26 15:43:03'),
	(38, 'Private Bathroom', '2025-02-26 15:43:03'),
	(39, 'Hair Dryer', '2025-02-26 15:43:03'),
	(40, 'Towels & Toiletries', '2025-02-26 15:43:03'),
	(41, 'Bicycle Rental', '2025-02-26 15:43:03'),
	(42, 'Public Transport Access', '2025-02-26 15:43:03'),
	(43, 'Beach Access', '2025-02-26 15:43:03'),
	(44, 'Lake View', '2025-02-26 15:43:03'),
	(45, 'Mountain View', '2025-02-26 15:43:03'),
	(46, 'Golf Course Nearby', '2025-02-26 15:43:03');

-- Dumping structure for table serviceapartment.form
DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.form: ~11 rows (approximately)
DELETE FROM `form`;
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
	(10, 'Jamine', 'Yolanda', 'jamine@gmail.com', 'I want t become an agent to post properties on this site, how can that be possible?'),
	(11, 'Ibrahim', 'Mohammed', 'bryhimsings54@gmail.com', 'akhslkaJLSalksaS');

-- Dumping structure for table serviceapartment.locations
DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.locations: ~4 rows (approximately)
DELETE FROM `locations`;
INSERT INTO `locations` (`id`, `city`, `state`, `country`, `created_at`) VALUES
	(1, 'Lagos', 'Lagos', 'Nigeria', '2025-01-31 08:13:53'),
	(2, 'Abuja', 'FCT', 'Nigeria', '2025-01-31 08:13:53'),
	(3, 'Accra', 'Greater Accra', 'Ghana', '2025-01-31 08:13:53'),
	(4, 'Nairobi', 'Nairobi County', 'Kenya', '2025-01-31 08:13:53');

-- Dumping structure for table serviceapartment.members
DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `govt_id` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `role` enum('admin','agent','user') DEFAULT 'admin',
  `paid` enum('PAID','NOT PAID') DEFAULT 'NOT PAID',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.members: ~20 rows (approximately)
DELETE FROM `members`;
INSERT INTO `members` (`id`, `firstname`, `lastname`, `username`, `address`, `email`, `phone`, `govt_id`, `country`, `company_name`, `password`, `photo`, `status`, `role`, `paid`, `created_at`) VALUES
	(15, 'Mary', 'Joshua', '', '', 'mary@gmail.com', '08054522505', '', '', '', '$2y$10$v/dX8To3U.emTOdbSEl/YOo/B.ro7yidvmlIFrE5KUJKtS.RsMDuW', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(16, '', 'Chukwuma', '', '', 'godson@gmail.com', '07045473333', '', '', '', '$2y$10$ISz9778wIVXrG7jg5.ZkkeWWNJy8MPJF/jtGFIQvFLVKbZ338B9gi', NULL, 'INACTIVE', 'agent', 'NOT PAID', NULL),
	(17, 'Zack', 'Hunsa', '', '', 'zack@gmail.com', '07023467584', '', '', '', '$2y$10$nuyNPz3Xvshc3Kg7aD4Fwuf3F13fKvHWpAisIL.eIZ3vBU6mmSG6m', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(18, 'zion', 'Tega', '', '', 'zion@gmail.com', '08156354488', '', '', '', '$2y$10$Gecr9Ety5wuEElyW7Uab5.FtWbM.JiBCPQdK3F8mkzWnARkFfw8ri', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(19, 'tom', 'Ajayi', '', '', 'tom@gmai.com', '07046468448', '', '', '', '$2y$10$Gecr9Ety5wuEElyW7Uab5.FtWbM.JiBCPQdK3F8mkzWnARkFfw8ri', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(20, 'joy', 'Chioma', '', '', 'jot@gmail.com', '09064674838', '', '', '', '$2y$10$A6lfth9s8wbXymhG3r0hQOrTM202LS88/RczIA4SxTcX2Mt9i.NlW', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(21, 'Kasali', 'Damilola', '', '', 'kasali@gmail.com', '070745537372', '', '', '', '$2y$10$Y4Fu563TfVRD7CfElpuWYu9yQTMerdW/LU5RvLSgKncS/Gh3/qjge', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(29, 'Gabriel', 'Irabor', '', '', 'gabintoroy@gmail.com', '08054522505', '', '', '', '$2y$10$C46oUJa5hG9peR6F4FvP5Oej00MWTsBs3y/028kCHGXZCJYRW6AQ2', NULL, 'INACTIVE', 'agent', 'NOT PAID', NULL),
	(30, 'Djotchou', 'Chukwuemeka', '', '', 'djotchou20@gmail.com', '08054522505', '', '', '', '$2y$10$8Ux8mkF64KmAAmWOHRVhzODSG6UW8Y/6fU.LcjQsjCbVqH1Ah5fJG', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(31, 'Henshaw', 'Kate', '', '', 'kate@gmail.com', '09056637707', '', '', '', '$2y$10$p5bgQAxHoEba1tF3d1NNF.JwpypVKzo7Xc9GlE4I87qZ1NA5.Z3QG', NULL, 'INACTIVE', 'agent', 'NOT PAID', NULL),
	(32, 'Kingdom', 'Emeka', '', '', 'kingdom@gmail.com', '08054522505', '', '', '', '$2y$10$L5dzx2U.gE3FUm44fmNmfusqdWt132iPJvym74Eh27ZX6iTUGhR/e', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(33, 'Josiah', 'Martin', '', '', 'martin@gmail.com', '08054522505', '', '', '', '$2y$10$TgipXnUi1ki5i4so96.Lae1fiPhGg.HIB4RGp0KH0VCBtCHclLzyy', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(34, 'Gift', 'Mary', '', '', 'gift@gmail.com', '08012345678', '', '', '', '$2y$10$89d52PuSLLqy8QYj8UBf3emKgFT44MZ2jzxl9yAqwGkH5ytJEtGFG', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(35, 'Jasmine', 'Yolanda', '', '', 'jasmine@gmail.com', '08801234678', '', '', '', '$2y$10$gXPvU7xnXimY7stZnk6zheo3wD7/LpmyodBdrkBL/bD2EUwzvgaq6', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(36, 'Ibrahim', 'Mohammed', '', '', 'bryhimsings54@gmail.com', '08112546594', '', '', '', '$2y$10$tZqHobwoixoqmypIi0gMOerPKlROvzNlAgaI3i/gnwa8VOFN8PnrG', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(38, 'Ibrahim', 'Mohammed', '', '', 'myadmin@gmail.com', '09138668012', '', '', '', '$2y$10$1GRW7agaFYwIyIADOX3yiuCiEDI/c0ANwAw8z/hGO924B7yxTnAky', NULL, 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(39, 'Ibrahim', 'Mohammed', 'admin', 'No 2Ajah Ilaje road', 'admin@gmail.com', '09138668012', '', 'Nigeria', 'Deltech', '$2y$10$bC9.qcjUN4m/xpJrvBg9w.6xieYRKpqn9z1/GUuJ92MQ5kE5NNIMu', '1738659119_59baa719224d6c2916b0.jpeg', 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(40, 'free', 'Account', 'free158', 'ajah ilaje ', 'adminpanel@gmail.com', '09112546594', '', 'Andorra', 'freeeeeeeeee', '$2y$10$YmGJjvnNFFwi738Jfs9bfenccB/kjss.Jb3EJaTmXo1YE8elT7dQa', '1740213252_db2b7bb2e0ed16bde5a6.jpg', 'ACTIVE', 'agent', 'NOT PAID', NULL),
	(41, 'Administration', 'System', 'admin807', 'No 2 Valentine Asemota ', 'dream@gmail.com', '739279372192', '', 'Algeria', 'Green Villa ', '$2y$10$6Dxk22yNOqzoUmXBJGfLreSlEu3tOggLRXbInIg9QgU/grUpIq0Fi', '1740777787_50465e9841b743b50852.jpeg', 'ACTIVE', 'admin', 'NOT PAID', NULL),
	(42, 'Femi', 'Shayo', 'femi329', 'No 2, Remi Olotu street, Lagos ', 'femi@gmail.com', '08123456789', '', 'Nigeria', 'Serviceapartment', '$2y$10$zedCXSr1qtHFNy3haw04Ce1y.j8ef5aU8X5rEhh/Oi/OEbBjWRyTS', '1740596351_e37172592814922f85be.jpg', 'ACTIVE', 'admin', 'NOT PAID', NULL),
	(43, 'Gabriel', 'Irabor', 'gabriel558', 'Hi-tech Bustop, Isheri-oshun,', 'gabintoroy1@gmail.com', '09034524450', '', 'Nigeria', 'SERVICE APARTMENT NIGERIA LIMITED', '$2y$10$cKeKSarQgNhh2Qn4B77MH.iU9SA0LnFfnnwGo1fFyPN/94oHg2bL.', '1740831244_af366bb32caa38b8d240.jpg', 'ACTIVE', 'admin', 'NOT PAID', NULL);

-- Dumping structure for table serviceapartment.payments
DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `payment_reference` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gateway` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `status` enum('success','failed','pending') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.payments: ~15 rows (approximately)
DELETE FROM `payments`;
INSERT INTO `payments` (`id`, `agent_id`, `payment_reference`, `email`, `phone`, `gateway`, `name`, `amount`, `payment_date`, `status`) VALUES
	(1, 13, 'PAYSTACK_67c30ff23f9ba', 'ublessing388@gmail.com', '08116809933', 'PAYSTACK_', 'Ajayi Ayodele', 10000.00, '2025-03-01 13:47:30', 'success'),
	(2, 12, 'PAYSTACK_67c3159082483', 'Fredy@gmail.com', '090233232322', 'PAYSTACK_', 'ibrahim', 50000.00, '2025-03-01 14:11:28', 'success'),
	(3, 13, 'PAYSTACK_67c315b139fe7', 'ublessing388@gmail.com', '08116809933', 'PAYSTACK_', 'Ajayi Ayodele', 50000.00, '2025-03-01 14:12:01', 'success'),
	(4, 11, 'PAYSTACK_67c315eea2359', 'dav@gmail.com', '09023546587', 'PAYSTACK_', 'shola Mohammed', 50000.00, '2025-03-01 14:13:02', 'success'),
	(5, 13, 'PAYSTACK_67c31c86906ac', 'gabintoroy@gmail.com', '08116809933', 'PAYSTACK_', 'Ajayi Ayodele', 50000.00, '2025-03-01 14:41:10', 'success'),
	(6, 2, 'PAYSTACK_67c4156201980', 'janesmith@example.com', '08098765432', 'PAYSTACK_', 'Jane Smith', 50000.00, '2025-03-02 08:22:58', 'success'),
	(7, 3, 'PAYSTACK_67c4156814fba', 'admin@example.com', '08123456789', 'PAYSTACK_', 'Admin User', 50000.00, '2025-03-02 08:23:04', 'success'),
	(8, 4, 'PAYSTACK_67c4156ef20d1', 'joe@gmail.com', '09138668012', 'PAYSTACK_', 'Ibrahim Mohammed', 50000.00, '2025-03-02 08:23:10', 'success'),
	(9, 5, 'PAYSTACK_67c415762bd39', 'amjustplayboy@gmail.com', '023213232133', 'PAYSTACK_', 'mohammed ibrahim ', 50000.00, '2025-03-02 08:23:18', 'success'),
	(10, 7, 'PAYSTACK_67c4157ce6296', 'freeff@gmail.com', '434214142323232', 'PAYSTACK_', 'freeeeeee', 50000.00, '2025-03-02 08:23:24', 'success'),
	(11, 6, 'PAYSTACK_67c415832c1d5', 'agent@gmail.com', '07132456789', 'PAYSTACK_', 'Agent verified', 50000.00, '2025-03-02 08:23:31', 'success'),
	(12, 13, 'PAYSTACK_67c4158a737fb', 'gabintoroy@gmail.com', '08116809933', 'PAYSTACK_', 'Ajayi Ayodele', 50000.00, '2025-03-02 08:23:38', 'success'),
	(13, 8, 'PAYSTACK_67c4159021a2d', 'brh@gmail.com', 'freee', 'PAYSTACK_', 'Mohammed IB', 50000.00, '2025-03-02 08:23:44', 'success'),
	(14, 11, 'PAYSTACK_67c41598b2c80', 'dav@gmail.com', '09023546587', 'PAYSTACK_', 'shola Mohammed', 50000.00, '2025-03-02 08:23:52', 'success'),
	(15, 42, 'PAYSTACK_67c446062766d', 'bryh@gmail.com', '09077425232', 'PAYSTACK_', 'fred frecb', 50000.00, '2025-03-02 11:50:30', 'success');

-- Dumping structure for table serviceapartment.properties
DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `locationmap` text NOT NULL,
  `change_time` datetime NOT NULL,
  `prop_url` text NOT NULL,
  `description` text NOT NULL,
  `changed_by` text NOT NULL,
  `thumbnail` text NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `bedrooms` int(11) DEFAULT 0,
  `toilets` int(11) DEFAULT 0,
  `bathrooms` int(11) DEFAULT 0,
  `area` int(11) DEFAULT 0,
  `status` enum('available','sold','rented') DEFAULT 'available',
  `type` enum('Rent','Lease','Sell','Shortlet') DEFAULT 'Shortlet',
  `visibility` enum('hidden','visible') DEFAULT 'visible',
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.properties: ~1 rows (approximately)
DELETE FROM `properties`;
INSERT INTO `properties` (`id`, `user_id`, `category_id`, `location_id`, `title`, `username`, `posted_by`, `location`, `locationmap`, `change_time`, `prop_url`, `description`, `changed_by`, `thumbnail`, `price`, `bedrooms`, `toilets`, `bathrooms`, `area`, `status`, `type`, `visibility`, `is_featured`, `created_at`, `updated_at`) VALUES
	(42, 42, 1, 0, 'New Rose Land Estate Apartments', 'admin807', 'admin807', 'ajah', '                <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>', '0000-00-00 00:00:00', 'new-rose-land-estate-apartments', 'New Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsvvvvvvvNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate ApartmentsNew Rose Land Estate Apartments', '', 'uploads/thumbnails/1740915948_efdd52fb341bfd38c45a.jpg', 23444.00, 3, 3, 3, 23, 'available', 'Shortlet', 'visible', 0, '2025-03-02 11:45:48', '2025-03-02 11:45:48');

-- Dumping structure for table serviceapartment.property_features
DROP TABLE IF EXISTS `property_features`;
CREATE TABLE IF NOT EXISTS `property_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `feature_id` (`feature_id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_features_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `property_features_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.property_features: ~84 rows (approximately)
DELETE FROM `property_features`;
INSERT INTO `property_features` (`id`, `property_id`, `feature_id`, `created_at`) VALUES
	(40, 32, 1, '2025-02-24 01:28:26'),
	(41, 32, 2, '2025-02-24 01:28:26'),
	(42, 32, 3, '2025-02-24 01:28:26'),
	(43, 32, 4, '2025-02-24 01:28:26'),
	(52, 35, 1, '2025-02-24 22:24:58'),
	(53, 35, 2, '2025-02-24 22:24:58'),
	(54, 35, 3, '2025-02-24 22:24:58'),
	(55, 35, 4, '2025-02-24 22:24:58'),
	(56, 36, 1, '2025-02-26 09:13:37'),
	(57, 36, 2, '2025-02-26 09:13:37'),
	(58, 36, 3, '2025-02-26 09:13:37'),
	(59, 36, 4, '2025-02-26 09:13:37'),
	(60, 38, 1, '2025-02-26 16:45:51'),
	(61, 38, 2, '2025-02-26 16:45:51'),
	(62, 38, 3, '2025-02-26 16:45:51'),
	(63, 38, 4, '2025-02-26 16:45:51'),
	(64, 38, 5, '2025-02-26 16:45:51'),
	(65, 39, 1, '2025-02-26 19:10:56'),
	(66, 39, 2, '2025-02-26 19:10:56'),
	(67, 39, 4, '2025-02-26 19:10:56'),
	(68, 39, 5, '2025-02-26 19:10:56'),
	(69, 39, 6, '2025-02-26 19:10:56'),
	(70, 39, 7, '2025-02-26 19:10:56'),
	(71, 39, 8, '2025-02-26 19:10:56'),
	(72, 39, 9, '2025-02-26 19:10:56'),
	(73, 39, 10, '2025-02-26 19:10:56'),
	(74, 39, 14, '2025-02-26 19:10:56'),
	(75, 39, 15, '2025-02-26 19:10:56'),
	(76, 39, 16, '2025-02-26 19:10:56'),
	(77, 39, 17, '2025-02-26 19:10:56'),
	(78, 39, 18, '2025-02-26 19:10:56'),
	(79, 40, 6, '2025-03-01 09:24:21'),
	(80, 40, 7, '2025-03-01 09:24:21'),
	(81, 40, 8, '2025-03-01 09:24:21'),
	(82, 40, 9, '2025-03-01 09:24:21'),
	(83, 40, 10, '2025-03-01 09:24:22'),
	(84, 40, 11, '2025-03-01 09:24:22'),
	(85, 40, 12, '2025-03-01 09:24:22'),
	(86, 40, 13, '2025-03-01 09:24:22'),
	(87, 40, 14, '2025-03-01 09:24:22'),
	(88, 40, 15, '2025-03-01 09:24:22'),
	(89, 40, 16, '2025-03-01 09:24:22'),
	(90, 40, 17, '2025-03-01 09:24:22'),
	(91, 40, 18, '2025-03-01 09:24:22'),
	(92, 40, 19, '2025-03-01 09:24:22'),
	(93, 40, 20, '2025-03-01 09:24:22'),
	(94, 40, 21, '2025-03-01 09:24:22'),
	(95, 40, 22, '2025-03-01 09:24:22'),
	(96, 40, 23, '2025-03-01 09:24:22'),
	(97, 40, 24, '2025-03-01 09:24:22'),
	(98, 40, 25, '2025-03-01 09:24:22'),
	(99, 40, 26, '2025-03-01 09:24:22'),
	(100, 40, 27, '2025-03-01 09:24:22'),
	(101, 40, 28, '2025-03-01 09:24:22'),
	(102, 40, 29, '2025-03-01 09:24:22'),
	(103, 40, 30, '2025-03-01 09:24:22'),
	(104, 40, 31, '2025-03-01 09:24:22'),
	(105, 40, 32, '2025-03-01 09:24:22'),
	(106, 40, 33, '2025-03-01 09:24:22'),
	(107, 40, 34, '2025-03-01 09:24:22'),
	(108, 40, 35, '2025-03-01 09:24:22'),
	(109, 40, 36, '2025-03-01 09:24:22'),
	(110, 41, 1, '2025-03-01 12:23:57'),
	(111, 41, 2, '2025-03-01 12:23:57'),
	(112, 41, 3, '2025-03-01 12:23:57'),
	(113, 41, 4, '2025-03-01 12:23:57'),
	(114, 41, 6, '2025-03-01 12:23:57'),
	(115, 41, 7, '2025-03-01 12:23:57'),
	(116, 41, 8, '2025-03-01 12:23:57'),
	(117, 41, 9, '2025-03-01 12:23:57'),
	(118, 41, 12, '2025-03-01 12:23:57'),
	(119, 41, 13, '2025-03-01 12:23:57'),
	(120, 41, 14, '2025-03-01 12:23:57'),
	(121, 41, 15, '2025-03-01 12:23:57'),
	(122, 41, 16, '2025-03-01 12:23:57'),
	(123, 41, 18, '2025-03-01 12:23:57'),
	(124, 41, 19, '2025-03-01 12:23:57'),
	(125, 41, 35, '2025-03-01 12:23:57'),
	(126, 41, 36, '2025-03-01 12:23:57'),
	(127, 41, 38, '2025-03-01 12:23:57'),
	(128, 42, 2, '2025-03-02 11:45:48'),
	(129, 42, 3, '2025-03-02 11:45:48'),
	(130, 42, 4, '2025-03-02 11:45:48'),
	(131, 42, 5, '2025-03-02 11:45:48');

-- Dumping structure for table serviceapartment.property_images
DROP TABLE IF EXISTS `property_images`;
CREATE TABLE IF NOT EXISTS `property_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_main` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.property_images: ~55 rows (approximately)
DELETE FROM `property_images`;
INSERT INTO `property_images` (`id`, `property_id`, `image_url`, `is_main`, `created_at`) VALUES
	(103, 32, 'uploads/properties/1740360506_df3933622d0f07662802.jpg', 0, '2025-02-24 01:28:26'),
	(104, 32, 'uploads/properties/1740360506_da0c81fcc414312e7e4d.jpg', 0, '2025-02-24 01:28:26'),
	(105, 32, 'uploads/properties/1740360506_94bf4015cd2f6cf89e27.jpg', 0, '2025-02-24 01:28:26'),
	(106, 32, 'uploads/properties/1740360506_1be15b8fc7cf6f664f90.jpg', 0, '2025-02-24 01:28:26'),
	(107, 32, 'uploads/properties/1740360506_73c9b86657dfe745e367.jpg', 0, '2025-02-24 01:28:26'),
	(120, 35, 'uploads/properties/1740435898_40f6ffe0340e4896188d.jpg', 0, '2025-02-24 22:24:58'),
	(121, 35, 'uploads/properties/1740435898_ba7ef55c07b7ad8baa72.jpg', 0, '2025-02-24 22:24:58'),
	(122, 35, 'uploads/properties/1740435898_54c35f0d32f1270b354d.jpg', 0, '2025-02-24 22:24:58'),
	(123, 35, 'uploads/properties/1740435898_fbbe3ef965468bef20a3.jpg', 0, '2025-02-24 22:24:58'),
	(124, 35, 'uploads/properties/1740435898_8a45dc0571cb2be7b82b.jpg', 0, '2025-02-24 22:24:58'),
	(125, 36, 'uploads/properties/1740561217_9e52004bcc1c4af9aaab.jpg', 0, '2025-02-26 09:13:37'),
	(126, 36, 'uploads/properties/1740561217_34e2892cec194014c0ac.jpg', 0, '2025-02-26 09:13:37'),
	(127, 36, 'uploads/properties/1740561217_0faa2f28815765e80464.jpg', 0, '2025-02-26 09:13:37'),
	(128, 36, 'uploads/properties/1740561217_c000eaae888f54a4c14f.jpg', 0, '2025-02-26 09:13:37'),
	(129, 36, 'uploads/properties/1740561217_42419a2ddfc3ac47f341.jpg', 0, '2025-02-26 09:13:37'),
	(131, 38, 'uploads/properties/1740588351_8fb09893e99b65aa76e6.jpg', 0, '2025-02-26 16:45:51'),
	(132, 38, 'uploads/properties/1740588351_58b4ef005239a1bb1ef8.jpg', 0, '2025-02-26 16:45:51'),
	(133, 38, 'uploads/properties/1740588351_5f8e8b677ed8b5a9b190.jpg', 0, '2025-02-26 16:45:51'),
	(134, 38, 'uploads/properties/1740588351_0ebc00d76fe4ab2eee1c.jpg', 0, '2025-02-26 16:45:51'),
	(135, 38, 'uploads/properties/1740588351_f182de142d57b866f012.jpg', 0, '2025-02-26 16:45:51'),
	(136, 38, 'uploads/properties/1740588351_eedcb603a857eaab9113.jpg', 0, '2025-02-26 16:45:51'),
	(137, 38, 'uploads/properties/1740588351_5ad35c8c149a4ba27ade.jpg', 0, '2025-02-26 16:45:51'),
	(138, 38, 'uploads/properties/1740588351_41ecee1354674a20a20f.jpg', 0, '2025-02-26 16:45:51'),
	(139, 38, 'uploads/properties/1740588351_2b1f10c4d469f5fa4597.jpg', 0, '2025-02-26 16:45:51'),
	(140, 39, 'uploads/properties/1740597056_c529f56084c21c09e5ab.jpg', 0, '2025-02-26 19:10:56'),
	(141, 39, 'uploads/properties/1740597056_20e4a3b4b5d692b38ab3.jpg', 0, '2025-02-26 19:10:56'),
	(142, 39, 'uploads/properties/1740597056_7a49607659e63fa2c2ff.jpg', 0, '2025-02-26 19:10:56'),
	(143, 39, 'uploads/properties/1740597056_154252d4e2b4bdcd32e0.jpg', 0, '2025-02-26 19:10:56'),
	(144, 39, 'uploads/properties/1740597057_602c94d1edccad629150.jpg', 0, '2025-02-26 19:10:57'),
	(145, 39, 'uploads/properties/1740597057_8d04eb12c68d2079b51d.jpg', 0, '2025-02-26 19:10:57'),
	(146, 39, 'uploads/properties/1740597057_1c23af92ce0375b1644d.jpg', 0, '2025-02-26 19:10:57'),
	(147, 39, 'uploads/properties/1740597057_0ab407e5a0ef5b107c54.jpg', 0, '2025-02-26 19:10:57'),
	(149, 39, 'uploads/properties/1740597057_84ae1138282f75577a05.jpg', 0, '2025-02-26 19:10:57'),
	(150, 39, 'uploads/properties/1740597057_ca13adcf15bc8ff0b6ad.jpg', 0, '2025-02-26 19:10:57'),
	(151, 40, 'uploads/properties/1740821062_67bb4b2c917966e46327.jpg', 0, '2025-03-01 09:24:22'),
	(152, 40, 'uploads/properties/1740821062_d5ab21e0717038b2062f.jpg', 0, '2025-03-01 09:24:22'),
	(153, 40, 'uploads/properties/1740821062_3a5a13c2d105647c0c43.jpg', 0, '2025-03-01 09:24:22'),
	(154, 40, 'uploads/properties/1740821062_d56bb0830b02099733fd.jpg', 0, '2025-03-01 09:24:22'),
	(155, 40, 'uploads/properties/1740821062_e800cdfedf09c4976f42.jpg', 0, '2025-03-01 09:24:22'),
	(156, 40, 'uploads/properties/1740821062_39dbf72cf31afb3121e6.jpg', 0, '2025-03-01 09:24:22'),
	(157, 40, 'uploads/properties/1740821062_520567347d9e95f645db.jpg', 0, '2025-03-01 09:24:22'),
	(158, 40, 'uploads/properties/1740821062_8cf20fe1a4917d8b8d7e.jpg', 0, '2025-03-01 09:24:22'),
	(159, 40, 'uploads/properties/1740821062_81e33ef1d8e080bd2468.jpg', 0, '2025-03-01 09:24:22'),
	(160, 40, 'uploads/properties/1740821062_31ca0091e882959afdb8.jpg', 0, '2025-03-01 09:24:22'),
	(161, 40, 'uploads/properties/1740821062_d874a8fe3ae5ecb0fbd6.jpg', 0, '2025-03-01 09:24:22'),
	(162, 41, 'uploads/properties/1740831837_240979b284d6c13f3734.png', 0, '2025-03-01 12:23:57'),
	(163, 41, 'uploads/properties/1740831837_4b3aedd3c722baf66ace.png', 0, '2025-03-01 12:23:57'),
	(164, 41, 'uploads/properties/1740831837_b73a44b36ae5c9f629a0.png', 0, '2025-03-01 12:23:57'),
	(165, 41, 'uploads/properties/1740831837_9369fb6d30d60f772f25.jpg', 0, '2025-03-01 12:23:57'),
	(166, 41, 'uploads/properties/1740831837_219f4cd3c8810623211b.jpg', 0, '2025-03-01 12:23:57'),
	(167, 42, 'uploads/properties/1740915948_2c808161f91d3a5a580a.jpg', 0, '2025-03-02 11:45:48'),
	(168, 42, 'uploads/properties/1740915948_0c3bbc01c41f48591b0a.jpg', 0, '2025-03-02 11:45:48'),
	(169, 42, 'uploads/properties/1740915948_e6f7edd395600ddb5521.jpg', 0, '2025-03-02 11:45:48'),
	(170, 42, 'uploads/properties/1740915948_0f690c28eb559f68496b.jpg', 0, '2025-03-02 11:45:48'),
	(171, 42, 'uploads/properties/1740915948_841f217590e5288e540c.jpg', 0, '2025-03-02 11:45:48');

-- Dumping structure for table serviceapartment.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `role` enum('admin','agent','user') DEFAULT 'admin',
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.settings: ~1 rows (approximately)
DELETE FROM `settings`;
INSERT INTO `settings` (`id`, `country`, `address`, `photo`, `company_name`, `email`, `password`, `facebook`, `role`, `instagram`, `twitter`, `phone`) VALUES
	(1, 'Nigeria', 'Ajah Ilaje  no 2 folabi street broadway', '1740601193_bc8d2c24c5d0ff99b0dc.jpeg', 'service Apartment', 'info@serviceapartment.africa', '111', '', 'admin', '', '', '09073659222');

-- Dumping structure for table serviceapartment.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `role` enum('admin','agent','user') DEFAULT 'user',
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table serviceapartment.users: ~6 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `username`, `name`, `country`, `phone`, `status`, `role`, `email`, `address`, `password`, `photo`, `created_at`) VALUES
	(1, 'ibra413', 'Babby vim', NULL, '45354354', 'INACTIVE', 'user', 'amjustplayboy1@gmail.com', 'No 24, chief kola ologolo, off barware road, lekki lagos.ss', NULL, '1740595889_708c0971dba4cf09ebbe.jpg', '2025-02-14 14:49:54'),
	(2, 'ibry804', 'ibrahim mohammed', 'Albania', '09043214127', 'ACTIVE', 'user', 'amjustplayboy@gmail.com', 'Lekki Phase 1', '$2y$10$tZHVLMsSUXhXBximUUUWlu.AolidXM8TsNJRcjruA6W.LGvZIKAEq', '1739547846_62479838b7c645f1aa6c.jpeg', '2025-02-14 14:51:59'),
	(3, 'damilola260', 'Damilolas', 'Niger', '08054522555', 'INACTIVE', 'user', 'cebastien1999@gmail.com', 'No 24, chief kola ologolo, off barware road, lekki lagos.ss', '$2y$10$q8qa2PQlrRwz5W2dLsl90ucrfCPtXHwkBfo6no4QT0VI12xAj8M/i', '1740585622_20408d3d5af80e7043af.png', '2025-02-26 15:51:37'),
	(4, 'tayo611', 'Tayo Aina', 'Nigeria', '09123456789', 'INACTIVE', 'user', 'tayo@gmail.com', 'No 2, Eleko street', '$2y$10$tax4ErWk4/rdAPS4cIcQEu6h49ClMn5ZuKKsrlywKVJE13g5FB6Pe', '1740595889_708c0971dba4cf09ebbe.jpg', '2025-02-26 18:49:48'),
	(5, 'blessing605', 'blessing chisom ubah', NULL, '09048123636', 'ACTIVE', 'user', 'gabintroy@gmail.com', NULL, '$2y$10$vuQYg6BnKLO7p8sC8fQdHuUzDi.SNyU7rUh7t8xwJIl3giXgq4zM2', NULL, '2025-03-01 12:46:21'),
	(6, 'ayodele284', 'AYODELE AJAYI', 'Nigeria', '09048123636', 'ACTIVE', 'user', 'serviceapartment.com@gmail.com', '23b fola osibo rd Lekki phase 1', '$2y$10$KUQNZoZ1H77L9gQoSONaaelqQuxw4PBti4prIII52HjPVZ3S5C0OO', '1740833343_4eebd40efdf5c762c492.jpg', '2025-03-01 12:48:13');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
