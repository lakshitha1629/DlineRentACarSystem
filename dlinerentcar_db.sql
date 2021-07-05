-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2021 at 05:38 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlinerentcar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE IF NOT EXISTS `customer_details` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(50) NOT NULL,
  `drivingLicenseNo` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `customerPhoto` longtext NOT NULL,
  `customerNICPhoto` longtext NOT NULL,
  `customerLicensePhoto` longtext NOT NULL,
  `customerSignature` longtext NOT NULL,
  `Note` varchar(255) DEFAULT 'no note',
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activated` int(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_name`, `user_type`, `password`, `activated`) VALUES
(1, 'admin', 1, '81dc9bdb52d04dc20036dbd8313ed055', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
heroku_360407db4f12625