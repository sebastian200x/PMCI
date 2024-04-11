-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2024 at 03:53 AM
-- Server version: 5.7.40
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `name`) VALUES
(1, 'admin', '$2y$10$IIRit1a9NSWy0I6QBG4fW.w0aF2yqLyFrK6DgDxPIF8vn7gsrcykS', 'asdasdasd@adasd.casc', 'jlkjlkjlkj'),
(2, '$username', '$2y$10$2h6kZnSjT5fYOTitENu5Yus4KhbT/QszZSqhF59wu7pXjPmBppRje', '$email', '$name'),
(3, 'admin3', '$2y$10$Za237JDQhkMWGJ0YNYxJFOa9suqLwtMCshTmLhP6iFEBhTbWbSoti', 'admin@gmail.com', 'gagagasfafasf'),
(4, 'admin5', '$2y$10$h8bkXs0UMW5rkmgr17Jveu.gYzKUQQykVpCvmFDJsuyOCUfzmMSiu', 'admin5@gmail.com', 'name'),
(5, 'admin11', '$2y$10$Q/hqgxRPMc4mS6qs3P9E.uYnVtDYOYy6osI/adk9Vb9P5/hFD7qfO', 'admin11@gmail.com', 'name'),
(6, 'asdasdasd', '$2y$10$y.afAYcjq8m99FBucnr.A.M4L9oRC776eIHA5F29wlxWFkmM/Lo5C', 'asdasd@asd.c', 'asdasd'),
(7, 'adminadmin', '$2y$10$iMoaOv4zDm/dYer6rJ.JLe/TbaB5OoiXhOPFYy6lG3xzBivqY/tUW', 'ads@gmail.com', 'Jet Sebastian');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
CREATE TABLE IF NOT EXISTS `enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_sy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referral` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` int(11) NOT NULL,
  `psa` int(11) NOT NULL,
  `good_moral` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `ecd` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

DROP TABLE IF EXISTS `holiday`;
CREATE TABLE IF NOT EXISTS `holiday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `holiday_name`, `holiday_date`) VALUES
(1, 'New Year\'s Day', '2024-01-01'),
(2, 'EDSA Revolution Anniversary', '2024-02-25'),
(3, 'Araw ng Kagitingan', '2024-04-08'),
(4, 'Labor Day', '2024-05-01'),
(5, 'Araw ng Kalayaan', '2024-06-12'),
(6, 'Ninoy Aquino Day', '2024-08-21'),
(7, 'All Saints\' Day', '2024-11-01'),
(8, 'All Souls Day', '2024-11-02'),
(9, 'Bonifacio Day', '2024-11-30'),
(10, 'Feast of the Immaculate Conception of the Blessed Virgin Mary', '2024-12-08'),
(11, 'Christmas Eve', '2024-12-24'),
(12, 'Christmas Day', '2024-12-25'),
(13, 'Rizal Day', '2024-12-30'),
(14, 'New Year\'s Eve', '2024-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image_path`, `title`, `description`, `reg_date`) VALUES
(1, 'newspics/1.png', '12412d1212f1f12f', 'asd ad ad aa sdasd a asdad asd', '2024-03-07 00:00:00'),
(3, 'newspics/3.png', 'df sf s', 'df sdf sdf ', '2024-03-12 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
