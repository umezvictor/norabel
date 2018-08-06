-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2018 at 12:27 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `norabel`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `phone` text NOT NULL,
  `destination` varchar(200) NOT NULL,
  `mystate` varchar(100) NOT NULL,
  `departure` text NOT NULL,
  `arrival` text NOT NULL,
  `flight_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `fullname`, `phone`, `destination`, `mystate`, `departure`, `arrival`, `flight_type`) VALUES
(30, 'henry', '08023098735', 'Akwa-Ibom', 'ABIA', '2018.06.19', '2018.06.06', 'One way'),
(25, 'james', '08092221598', 'Akwa-Ibom', 'ABIA', '2018.05.22', '2018.05.21', 'One way'),
(26, 'Victor Umezuruike', '08065981230', 'Akwa-Ibom', 'ABIA', '2018.05.14', '2018.05.15', 'Round trip'),
(27, 'Pamela Nkemka', '09087654325', 'Akwa-Ibom', 'LAGOS', '2018.05.18', '2018.05.04', 'Round trip'),
(28, 'Samuel Agbai', '08123564553', 'Akwa-Ibom', 'ABIA', '2018.06.16', '2018.06.22', 'Round trip'),
(29, 'Precious Chukwuma Chidinma', '08011112222', 'America', 'LAGOS', '2018.07.07', '2018.09.23', 'Round trip');

-- --------------------------------------------------------

--
-- Table structure for table `myadmin`
--

DROP TABLE IF EXISTS `myadmin`;
CREATE TABLE IF NOT EXISTS `myadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myadmin`
--

INSERT INTO `myadmin` (`id`, `username`, `password`) VALUES
(1, 'Noruwa', 'norabel2018');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
