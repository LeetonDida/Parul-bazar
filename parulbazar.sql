-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for olx
CREATE DATABASE IF NOT EXISTS `olx` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `olx`;

-- Dumping structure for table olx.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table olx.admin_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Dumping structure for table olx.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table olx.categories: ~9 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category`) VALUES
	(5, 'Books'),
	(2, 'Electronics and Computer'),
	(6, 'Home and Furniture'),
	(3, 'Mobiles and Tablets'),
	(7, 'Other'),
	(21, 'Services'),
	(22, 'test'),
	(1, 'Vehicles'),
	(4, 'VIP Girls Hostel');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table olx.hostel
CREATE TABLE IF NOT EXISTS `hostel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hostel` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table olx.hostel: ~5 rows (approximately)
/*!40000 ALTER TABLE `hostel` DISABLE KEYS */;
INSERT INTO `hostel` (`id`, `name`) VALUES
	(1, 'Vip Boys Hostel'),
	(3, 'Vip Boys Hostel'),
	(4, 'Vip Boys Hostel'),
	(6, 'Vip Boys Hostel'),
	(7, 'Vip Boys Hostel');
/*!40000 ALTER TABLE `hostel` ENABLE KEYS */;

-- Dumping structure for table olx.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(12) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `pur_year` varchar(4) DEFAULT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filename2` varchar(255) NOT NULL,
  `filename3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table olx.products: ~35 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `price`, `created_at`, `pur_year`, `description`, `filename`, `filename2`, `filename3`) VALUES
	(1, 3, 3, 'Moto G', 7000, '0000-00-00 00:00:00', '2014', 'Moto G in good condition purchased in January 2014.', 'moto g.jpg', '', ''),
	(2, 3, 1, 'Indica Vista', 200000, '0000-00-00 00:00:00', '2011', 'Indica Vista purchased in 2011 travelled a total of 50,000 km. Price is negotiable.', 'indica vista.jpg', '', ''),
	(5, 3, 2, 'Lenovo IdeaPad Z510', 40000, '0000-00-00 00:00:00', '2014', 'The specs are: 2GB NVIDIA Graphics Card, 6GB RAM, 1TB Hard Disk, 15.6 inches Screen.', 'lenovo z510.jpg', '', ''),
	(6, 4, 2, 'HP Pavillion', 37000, '0000-00-00 00:00:00', '2014', 'HP Laptop White in color, 6GB RAM, 2GB NVIDIA GeForce 740M, 1TB Hard Disk, Windows 8.1, 15.6 inches screen in excellent condition.', 'hp laptop.jpg', '', ''),
	(9, 4, 1, 'Audi A4', 1000000, '0000-00-00 00:00:00', '0', 'Audi A4 with meter reading about 40,000 km.', 'audi.jpg', '', ''),
	(10, 4, 4, 'Shirt', 1000, '0000-00-00 00:00:00', '2014', 'Designer Shirt size XL', 'shirt.jpg', '', ''),
	(11, 4, 5, 'Inception DVD', 200, '0000-00-00 00:00:00', '2010', 'Inception Bluray quality DVD', 'inception.jpg', '', ''),
	(12, 4, 6, 'Sofa', 5000, '0000-00-00 00:00:00', '0', 'Bed Room sofa in nice condition.', 'bed room sofa.jpg', '', ''),
	(13, 4, 7, 'Cricket Bat', 1000, '0000-00-00 00:00:00', '0', 'Nice Cricket Bat', 'bat.jpg', '', ''),
	(14, 5, 4, 'Hoodie', 999, '0000-00-00 00:00:00', '0', 'Hoodie of Size XL', 'hoodie.jpg', '', ''),
	(15, 5, 5, 'Madagascar DVD', 400, '0000-00-00 00:00:00', '0', 'Madagascar series in bluray quality', 'madagascar dvd.jpg', '', ''),
	(16, 5, 6, 'Toshiba Refrigerator', 20000, '0000-00-00 00:00:00', '0', 'Medium sized Toshiba Regfrigerator', 'toshiba_ref.jpg', '', ''),
	(17, 5, 7, 'Football', 300, '0000-00-00 00:00:00', '0', 'Reebok Football', 'football.jpg', '', ''),
	(18, 3, 7, 'Basketball', 500, '0000-00-00 00:00:00', '0', 'Basketball in nice condition', '12-Wilson Basketball.jpg', '', ''),
	(19, 3, 5, 'Kane And Abel', 500, '0000-00-00 00:00:00', '0', 'It is an awesome novel written by Jeffrey Archer', 'kane and abel.jpg', '', ''),
	(20, 3, 3, 'Nexus 5', 15000, '0000-00-00 00:00:00', '2014', 'The google brand Nexus 5 in red color', '3-Nexus 5-nexus.png', '', ''),
	(21, 10, 7, 'burger', 150, '0000-00-00 00:00:00', '2019', 'This is bi', '10-burger-burg.jpg', '', ''),
	(22, 11, 7, 'Hot dog', 155, '0000-00-00 00:00:00', '2018', 'Teste Burguer', '11-Hot dog-burger.png', '', ''),
	(23, 12, 2, 'SoundBot SB32', 1500, '0000-00-00 00:00:00', '2019', 'sound', '12-SoundBot SB32-soundbot.jpg', '', ''),
	(25, 12, 4, 'cachoro quente', 155, '0000-00-00 00:00:00', '2019', 'sa', '12-cachoro quente-hotdog.jpg', '', ''),
	(26, 15, 2, 'Te', 200, '0000-00-00 00:00:00', '2009', 'Ty', '15-Te-image.jpeg', '', ''),
	(27, 15, 3, 'Err', 2990, '0000-00-00 00:00:00', '2009', 'Tty', '15-Err-image.jpg', '', ''),
	(28, 13, 2, 'Red', 20000, '0000-00-00 00:00:00', '2019', 'Ggg', '13-Red-1572974528995270545370.jpg', '', ''),
	(29, 15, 2, 'Er', 1299, '0000-00-00 00:00:00', '234', 'Rrr', '15-Er-image.jpg', '', ''),
	(30, 15, 2, 'Laptop', 20000, '0000-00-00 00:00:00', '2009', 'Ueueuene', '15-Laptop-image.jpg', '', ''),
	(31, 13, 2, 'Soundbot sb752', 1500, '0000-00-00 00:00:00', '2019', 'Grande som', '13-Soundbot sb752-15729749841901161176050.jpg', '', ''),
	(32, 14, 3, 'iPhone 5s', 7000, '0000-00-00 00:00:00', '2017', 'Teste iphon', '14-iPhone 5s-image.jpg', '', ''),
	(33, 15, 6, 'Beer cup', 45, '0000-00-00 00:00:00', '2019', 'Ttyy', '15-Beer cup-image.jpg', '', ''),
	(35, 12, 7, 'pard', 150, '0000-00-00 00:00:00', '2019', 'sas', '12-pard-logo_parul.png', '', ''),
	(37, 13, 2, 'Lg monitor', 5000, '0000-00-00 00:00:00', '2019', '2 months of use', '13-Lg monitor-1573061839345781969261.jpg', '', ''),
	(38, 15, 6, 'Wallpaper', 280, '0000-00-00 00:00:00', '2019', 'Wall to your room', '15-Wallpaper-15731179605491585051690.jpg', '', ''),
	(39, 21, 5, 'Book mark cuban', 1200, '0000-00-00 00:00:00', '2018', 'The best seller', '21-Book mark cuban-1573239262936-645030600.jpg', '', ''),
	(41, 21, 2, 'Teclado Bluetooth ', 700, '0000-00-00 00:00:00', '2018', 'Comes with mouse ', '21-Teclado Bluetooth-image.jpg', '', ''),
	(42, 0, 0, '', 0, '2019-11-09 16:30:23', NULL, '', '', '', ''),
	(43, 30, 30, 'Wireless Mouse', 500, '2019-11-09 16:40:00', '2018', 'Works with diongle', '12-Wireless Mouse-1573500693670210564713.jpg', '', '');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table olx.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `room_no` int(4) NOT NULL DEFAULT 0,
  `hostel_id` int(11) NOT NULL DEFAULT 0,
  `hostel_name` varchar(250) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  KEY `email` (`email`),
  KEY `hostel_id` (`hostel_id`),
  CONSTRAINT `hostel_id` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table olx.users: ~18 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `room_no`, `hostel_id`, `hostel_name`, `phone`, `email`, `username`, `password`, `type`) VALUES
	(3, 'Hemant', 'Mann', 0, 0, '7', '9999999999', 'hemant@gmail.com', 'Hemant', '$2y$10$MGRmYTMxZGRiNGU0NDg4NuirkyRFNXjZLMbIRx8valB135WV262ua', 1),
	(4, 'Abhishek', 'Rathee', 555, 0, '0', '9876543210', 'rathee@gmail.com', 'Abhi', '$2y$10$NDgzYTU3OTQ3YzhlZjU1MO13549jBdkx/1lNG6WTKxnQokBx/idyC', 1),
	(5, 'Prakhar', 'Sandhu', 0, 0, '0', '9876543221', 'prakhar@gmail.com', 'Prakhar', '$2y$10$ZjI4ZTJhMWFjZjA2OTFjNOwHvwfOhovz7Hydho5YdXx0NeWNiayrG', 1),
	(8, 'Abhishek', 'Arya', 0, 0, '0', '9877654321', 'arya@gmail.com', 'Arya', '$2y$10$MzFjYjAxMzhjNmEyMjAzNOAL7tW9m3kBuMVXE2lB7H5UHLeH3PMeu', 1),
	(9, 'Test', 'User', 0, 0, '0', '8888888888', 'tester@fake.com', 'yoyo', '$2y$10$YmVhOGUyMzYzOWEzNGNkNuQR5.UI4ECSlD0tM3Dm6DabSa616uOba', 1),
	(12, 'Dercio', 'Bobo', 0, 0, '0', '9484415140', 'derciobob@gmail.com', 'bobo', '$2y$10$ZTQ1ZGI0YTlmZWE3ZTU1YOye1yL97jG9rPYe9ehvmY2tN29YMeIcy', 2),
	(13, 'demo', 'demo', 505, 1, 'Parul', '8484415135', 'demo@demo.com', 'demo', '$2y$10$YjM1MjI1OTc4MGNlMTdlOOTHHiUueiEHjQsx6oHxz5OzbMKoLFZ1O', 1),
	(14, 'Kelvin', 'Paindane', 0, 0, '0', '9727977296', 'ke@ken.com', 'Kelvin', '$2y$10$MjU3ZjkzNjAwZjUzMjlkNO6S6lHMLDc08JWdh5wdWM8AwOcEsCVUS', 1),
	(15, 'Maila', 'Bobo', 0, 3, '0', '9484415038', 'maila@bobo.com', 'Maila', '$2y$10$ZmU2NDdmZjcwNGU0NTUwYed8v6/9Ab780mfmmz08kkblp9pusbF1S', 1),
	(16, 'Dércio', 'da', 0, 0, '0', '9484415144', 'derciobosb@gmail.com', 'nono', '$2y$10$NGJmYWJiMTUxZDIxNmE2Ne1mXHB43na8LQDyyxpagVbqGjSY8MLnC', 1),
	(17, 'www', 'www', 0, 0, '0', '9484415132', 'ffff@fff.com', 'bobo2', '$2y$10$NzQwYWY1YmQ5YjExZWYwMuChwu/S7Ekcuk9R8nzbEHo4WSf64yZma', 1),
	(18, 'qqq', 'qqqqq', 321, 0, 'INT', '9484415158', 'derciobo3b@gmail.com', 'bobo1', '$2y$10$ZjZlMTRlNzk5MjE5NTc2Nua48TZWLOXX/0xLPZBPHWOv3f.92s0wa', 1),
	(19, 'qwwq', 'qwqw', 32, 3, 'INT', '9484415141', 'derciobo@gmail.com', 'boboqw', '$2y$10$YThmNTk5NTdjMjFhYTg3YOPB5hyK6kOCmChI1IXl0cJ7G2V8bOCsi', 1),
	(20, 'aaa', 'qqqq', 555555, 0, 'IJNT', '9484415134', 'derciobossb@gmail.com', 'bobo22', '$2y$10$MDRhY2E5NjVkYzRjZTBiYe0kiHqXZvKzxnZMlaEB8MaQ89hVYAijW', 1),
	(21, 'eqeq', 'qeqeq', 413, 0, 'IJNT', '9444415140', 'derciobssob@gmail.com', 'bobo33', '$2y$10$YmVkM2U1YmJmMjM0ZWZiMeMdCfnxUAg0ogaPM0JQl18BaV/w85sxu', 1),
	(22, 'wqqw', 'wqwq', 413, 7, 'International', '9284415140', 'dercizzobssob@gmail.com', 'bobo12', '$2y$10$MjhkZjFkOTRiNzUzOTIxZ.vlepLMFqn3QDwr1HjyJOUHhLesSYLWK', 1),
	(23, 'wqqwww', 'wqwq', 413, 3, 'International', '9282415140', 'dersacizzobssob@gmail.com', 'bobo124', '$2y$10$MGUyOGMyYzkwYmJhZjhhMOIcOC8.4dDZih138.hepWDom4PIv0cOi', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
