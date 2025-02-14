-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
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

-- Dumping structure for table serviceapartment.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.categories: ~4 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
	(1, 'Apartment', '2025-01-31 08:12:50'),
	(2, 'Villa', '2025-01-31 08:12:50'),
	(3, 'Studio', '2025-01-31 08:12:50'),
	(4, 'Penthouse', '2025-01-31 08:12:50');

-- Dumping structure for table serviceapartment.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
CREATE TABLE IF NOT EXISTS `features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.features: ~6 rows (approximately)
DELETE FROM `features`;
INSERT INTO `features` (`id`, `name`, `created_at`) VALUES
	(1, 'Swimming Pool', '2025-01-31 08:13:24'),
	(2, 'Gym', '2025-01-31 08:13:24'),
	(3, 'Parking Space', '2025-01-31 08:13:24'),
	(4, '24/7 Security', '2025-01-31 08:13:24'),
	(5, 'Balcony', '2025-01-31 08:13:24'),
	(6, 'Furnished', '2025-01-31 08:13:24');

-- Dumping structure for table serviceapartment.form
CREATE TABLE IF NOT EXISTS `form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.form: ~10 rows (approximately)
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
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.locations: ~4 rows (approximately)
DELETE FROM `locations`;
INSERT INTO `locations` (`id`, `city`, `state`, `country`, `created_at`) VALUES
	(1, 'Lagos', 'Lagos', 'Nigeria', '2025-01-31 08:13:53'),
	(2, 'Abuja', 'FCT', 'Nigeria', '2025-01-31 08:13:53'),
	(3, 'Accra', 'Greater Accra', 'Ghana', '2025-01-31 08:13:53'),
	(4, 'Nairobi', 'Nairobi County', 'Kenya', '2025-01-31 08:13:53');

-- Dumping structure for table serviceapartment.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `govt_id` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo` text,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'INACTIVE',
  `paid` enum('PAID','NOT PAID') DEFAULT 'NOT PAID',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.members: ~16 rows (approximately)
DELETE FROM `members`;
INSERT INTO `members` (`id`, `firstname`, `lastname`, `username`, `address`, `email`, `phone`, `govt_id`, `country`, `company_name`, `password`, `photo`, `status`, `paid`, `created_at`) VALUES
	(15, 'Mary', 'Joshua', '', '', 'mary@gmail.com', '08054522505', '', '', '', '$2y$10$v/dX8To3U.emTOdbSEl/YOo/B.ro7yidvmlIFrE5KUJKtS.RsMDuW', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(16, '', 'Chukwuma', '', '', 'godson@gmail.com', '07045473333', '', '', '', '$2y$10$ISz9778wIVXrG7jg5.ZkkeWWNJy8MPJF/jtGFIQvFLVKbZ338B9gi', NULL, 'INACTIVE', 'NOT PAID', NULL),
	(17, 'Zack', 'Hunsa', '', '', 'zack@gmail.com', '07023467584', '', '', '', '$2y$10$nuyNPz3Xvshc3Kg7aD4Fwuf3F13fKvHWpAisIL.eIZ3vBU6mmSG6m', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(18, 'zion', 'Tega', '', '', 'zion@gmail.com', '08156354488', '', '', '', '$2y$10$Gecr9Ety5wuEElyW7Uab5.FtWbM.JiBCPQdK3F8mkzWnARkFfw8ri', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(19, 'tom', 'Ajayi', '', '', 'tom@gmai.com', '07046468448', '', '', '', '$2y$10$Gecr9Ety5wuEElyW7Uab5.FtWbM.JiBCPQdK3F8mkzWnARkFfw8ri', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(20, 'joy', 'Chioma', '', '', 'jot@gmail.com', '09064674838', '', '', '', '$2y$10$A6lfth9s8wbXymhG3r0hQOrTM202LS88/RczIA4SxTcX2Mt9i.NlW', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(21, 'Kasali', 'Damilola', '', '', 'kasali@gmail.com', '070745537372', '', '', '', '$2y$10$Y4Fu563TfVRD7CfElpuWYu9yQTMerdW/LU5RvLSgKncS/Gh3/qjge', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(29, 'Gabriel', 'Irabor', '', '', 'gabintoroy@gmail.com', '08054522505', '', '', '', '$2y$10$C46oUJa5hG9peR6F4FvP5Oej00MWTsBs3y/028kCHGXZCJYRW6AQ2', NULL, 'INACTIVE', 'NOT PAID', NULL),
	(30, 'Djotchou', 'Chukwuemeka', '', '', 'djotchou20@gmail.com', '08054522505', '', '', '', '$2y$10$8Ux8mkF64KmAAmWOHRVhzODSG6UW8Y/6fU.LcjQsjCbVqH1Ah5fJG', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(31, 'Henshaw', 'Kate', '', '', 'kate@gmail.com', '09056637707', '', '', '', '$2y$10$p5bgQAxHoEba1tF3d1NNF.JwpypVKzo7Xc9GlE4I87qZ1NA5.Z3QG', NULL, 'INACTIVE', 'NOT PAID', NULL),
	(32, 'Kingdom', 'Emeka', '', '', 'kingdom@gmail.com', '08054522505', '', '', '', '$2y$10$L5dzx2U.gE3FUm44fmNmfusqdWt132iPJvym74Eh27ZX6iTUGhR/e', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(33, 'Josiah', 'Martin', '', '', 'martin@gmail.com', '08054522505', '', '', '', '$2y$10$TgipXnUi1ki5i4so96.Lae1fiPhGg.HIB4RGp0KH0VCBtCHclLzyy', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(34, 'Gift', 'Mary', '', '', 'gift@gmail.com', '08012345678', '', '', '', '$2y$10$89d52PuSLLqy8QYj8UBf3emKgFT44MZ2jzxl9yAqwGkH5ytJEtGFG', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(35, 'Jasmine', 'Yolanda', '', '', 'jasmine@gmail.com', '08801234678', '', '', '', '$2y$10$gXPvU7xnXimY7stZnk6zheo3wD7/LpmyodBdrkBL/bD2EUwzvgaq6', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(36, 'Ibrahim', 'Mohammed', '', '', 'bryhimsings54@gmail.com', '08112546594', '', '', '', '$2y$10$tZqHobwoixoqmypIi0gMOerPKlROvzNlAgaI3i/gnwa8VOFN8PnrG', NULL, 'ACTIVE', 'NOT PAID', NULL),
	(37, 'Ibrahim', 'Mohammed', 'Ibrahim', 'ilaje bus stop', 'myadmin@gmail.com', '09138668012', '1738109727_3ceb953ec1bd10f4e80a.jpg', 'Saint Kitts and Nevis', 'Simple Finance', '$2y$10$tGTookOlNnteutIfY.DlnOxBTYsovG7p78E14fmq7cE/tD9qnyFy6', '1738256058_aaa1aa7cd1158db80543.jpg', 'ACTIVE', 'NOT PAID', NULL);

-- Dumping structure for table serviceapartment.properties
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `location_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `bedrooms` int DEFAULT '0',
  `bathrooms` int DEFAULT '0',
  `area` int DEFAULT '0',
  `status` enum('available','sold','rented') DEFAULT 'available',
  `type` enum('Rent','Lease','Sell') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Rent',
  `visibility` enum('hidden','visible') DEFAULT 'visible',
  `is_featured` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `properties_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.properties: ~9 rows (approximately)
DELETE FROM `properties`;
INSERT INTO `properties` (`id`, `user_id`, `category_id`, `location_id`, `title`, `username`, `description`, `price`, `bedrooms`, `bathrooms`, `area`, `status`, `type`, `visibility`, `is_featured`, `created_at`, `updated_at`) VALUES
	(10, 4, 4, 3, 'Lagusssssssssss111', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:26:04', '2025-02-02 10:26:04'),
	(11, 4, 4, 3, 'drewwwww', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:26:32', '2025-02-02 10:26:32'),
	(12, 4, 4, 3, 'drewwwww', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:28:19', '2025-02-02 10:28:19'),
	(13, 4, 4, 3, 'drewwwww', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:31:14', '2025-02-02 10:31:14'),
	(14, 4, 4, 3, 'drewwwww', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:31:35', '2025-02-02 10:31:35'),
	(15, 4, 4, 3, 'ooooooooooooooh', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:32:05', '2025-02-02 10:32:05'),
	(16, 4, 4, 3, 'ooooooooooooooh', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:32:40', '2025-02-02 10:32:40'),
	(17, 4, 4, 3, 'ooooooooooooooh', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:46:55', '2025-02-02 10:46:55'),
	(18, 4, 4, 3, 'zzzzzzz', 'ibrahim515', 'dreeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaam', 180000.00, 3, 3, 321, 'available', 'Rent', 'visible', 0, '2025-02-02 10:47:42', '2025-02-02 10:47:42');

-- Dumping structure for table serviceapartment.property_features
CREATE TABLE IF NOT EXISTS `property_features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `feature_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`id`),
  KEY `feature_id` (`feature_id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_features_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `property_features_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.property_features: ~12 rows (approximately)
DELETE FROM `property_features`;

-- Dumping structure for table serviceapartment.property_images
CREATE TABLE IF NOT EXISTS `property_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.property_images: ~6 rows (approximately)
DELETE FROM `property_images`;
INSERT INTO `property_images` (`id`, `property_id`, `image_url`, `is_main`, `created_at`) VALUES
	(20, 17, 'uploads/properties/1738493216_e6ac5dea4e1d97d613c8.jpg', 1, '2025-02-02 10:46:56'),
	(21, 17, 'uploads/properties/1738493216_63b5a229ef75b284b94a.jpg', 0, '2025-02-02 10:46:56'),
	(22, 17, 'uploads/properties/1738493216_747f7e961e08ba0946c9.jpg', 0, '2025-02-02 10:46:56'),
	(23, 17, 'uploads/properties/1738493216_24074cef7e3a35003bc7.png', 0, '2025-02-02 10:46:56'),
	(24, 17, 'uploads/properties/1738493216_aa45b9b2df8ebbcc53dc.png', 0, '2025-02-02 10:46:56'),
	(25, 17, 'uploads/properties/1738493216_a1679308100bc2658c4c.jpeg', 0, '2025-02-02 10:46:56'),
	(26, 17, 'uploads/properties/1738493216_7d11a3c67d8c0c175c94.jpeg', 0, '2025-02-02 10:46:56'),
	(27, 17, 'uploads/properties/1738493216_60ef69db096749675386.jpeg', 0, '2025-02-02 10:46:56'),
	(28, 18, 'uploads/properties/1738493262_31c87d7a46b9c219fe2b.jpg', 1, '2025-02-02 10:47:42'),
	(29, 18, 'uploads/properties/1738493262_0d7911706902bf5992de.jpg', 0, '2025-02-02 10:47:42'),
	(30, 18, 'uploads/properties/1738493262_6483af8232fe79d1d204.jpg', 0, '2025-02-02 10:47:42'),
	(31, 18, 'uploads/properties/1738493262_7313f4e1a61f7864b56d.png', 0, '2025-02-02 10:47:42'),
	(32, 18, 'uploads/properties/1738493262_11884002bc0351deeb17.png', 0, '2025-02-02 10:47:42'),
	(33, 18, 'uploads/properties/1738493262_e1b181bec758dbce4102.jpeg', 0, '2025-02-02 10:47:42'),
	(34, 18, 'uploads/properties/1738493262_fdf9d836ab2229eb40be.jpeg', 0, '2025-02-02 10:47:42'),
	(35, 18, 'uploads/properties/1738493262_debc75859e408748ff78.jpeg', 0, '2025-02-02 10:47:42');

-- Dumping structure for table serviceapartment.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('admin','agent','buyer') DEFAULT 'agent',
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `govt_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'INACTIVE',
  `paid` enum('PAID','NOT PAID') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'NOT PAID',
  `created_at` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table serviceapartment.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone`, `role`, `address`, `govt_id`, `country`, `company_name`, `photo`, `status`, `paid`, `created_at`) VALUES
	(1, 'John Doe', 'Doe', 'johndoe@example.com', '$10$tGTookOlNnteutIfY.DlnOxBTYsovG7p78E14fmq7cE/tD9qnyFy6', '08012345678', 'agent', '', '', '', '', NULL, 'INACTIVE', 'NOT PAID', '2025-02-02 07:49:46'),
	(2, 'Jane Smith', 'Smith', 'janesmith@example.com', '$10$tGTookOlNnteutIfY.DlnOxBTYsovG7p78E14fmq7cE/tD9qnyFy6', '08098765432', 'buyer', '', '', '', '', NULL, 'INACTIVE', 'NOT PAID', '2025-02-02 07:49:46'),
	(3, 'Admin User', 'Admin', 'admin@example.com', '$10$tGTookOlNnteutIfY.DlnOxBTYsovG7p78E14fmq7cE/tD9qnyFy6', '08123456789', 'admin', '', '', '', '', NULL, 'INACTIVE', 'NOT PAID', '2025-02-02 07:49:46'),
	(4, 'Ibrahim Mohammed', 'ibrahim515', 'joe@gmail.com', '$2y$10$Y5BiMCi4Wb/pPt4d3sQxZOpkhD7FoWcldMGOGtCiVi6HdKt2DF49K', '09138668012', 'agent', 'fdsfdfdf', '', 'Nigeria', 'Ciphernet', '1738488613_c1ab725981703fb45e1e.jpeg', 'ACTIVE', 'NOT PAID', '2025-02-02 08:57:02');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
