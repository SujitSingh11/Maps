-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2019 at 09:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `administrative_area_level_1` varchar(100) DEFAULT NULL,
  `administrative_area_level_2` varchar(100) DEFAULT NULL,
  `lat` float(100,6) NOT NULL,
  `lng` float(100,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `country`, `locality`, `administrative_area_level_1`, `administrative_area_level_2`, `lat`, `lng`) VALUES
(26, 'United States', 'Las Vegas', 'Nevada', 'Clark County', 36.169941, -115.139832),
(25, 'India', 'Jalandhar', 'Punjab', 'Jalandhar', 31.326015, 75.576180),
(24, 'United States', 'Philadelphia', 'Pennsylvania', 'Philadelphia County', 39.952583, -75.165222),
(23, 'United States', 'Washington', 'District of Columbia', 'District of Columbia', 38.907192, -77.036873);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
