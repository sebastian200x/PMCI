-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2024 at 12:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmci`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `name`) VALUES
(1, 'admin', '$2y$10$IIRit1a9NSWy0I6QBG4fW.w0aF2yqLyFrK6DgDxPIF8vn7gsrcykS', 'a@a.comasdasdasdas', 'adminaasd'),
(2, '$username', '$2y$10$2h6kZnSjT5fYOTitENu5Yus4KhbT/QszZSqhF59wu7pXjPmBppRje', '$email', '$name'),
(3, 'admin3', '$2y$10$OvlrzTV5IzZy1Ier7YsR2OY1dpmm7XFqQOjb2aTTqqUyn37WKI7pC', 'admin2@gmail.com', 'name'),
(4, 'admin5', '$2y$10$h8bkXs0UMW5rkmgr17Jveu.gYzKUQQykVpCvmFDJsuyOCUfzmMSiu', 'admin5@gmail.com', 'name'),
(5, 'admin11', '$2y$10$Q/hqgxRPMc4mS6qs3P9E.uYnVtDYOYy6osI/adk9Vb9P5/hFD7qfO', 'admin11@gmail.com', 'name'),
(6, 'asdasdasd', '$2y$10$y.afAYcjq8m99FBucnr.A.M4L9oRC776eIHA5F29wlxWFkmM/Lo5C', 'asdasd@asd.c', 'asdasd'),
(7, 'adminadmin', '$2y$10$iMoaOv4zDm/dYer6rJ.JLe/TbaB5OoiXhOPFYy6lG3xzBivqY/tUW', 'ads@gmail.com', 'Jet Sebastian');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image_path`, `title`, `description`, `reg_date`) VALUES
(1, 'newspics/NIASDNASDIASNIASNDINASNAS.png', 'CHAMPION ATA TO', 'A', '2024-03-21 00:00:00'),
(5, 'newspics/CentralOffice.jpg', 'Central Office', 'Basta office to', '2024-03-19 00:00:00'),
(7, 'newspics/asdasd.jpg', 'asdasd', 'asdasdasd', '2024-02-27 00:00:00'),
(8, 'newspics/asdasd.png', 'asdasd', 'asdasdasd', '2024-02-27 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
