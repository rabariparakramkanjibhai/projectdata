-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2023 at 03:25 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ad_id` int NOT NULL AUTO_INCREMENT,
  `ad_password` varchar(25) NOT NULL,
  `ad_email` varchar(25) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_password`, `ad_email`) VALUES
(1, 'jmgdhamdenap123', 'jmgdhamdenap@gmail.com'),
(2, 'gangaben_kanjibhai_19', 'gk@gmail.com'),
(3, 'lalo1520', 'lalo1520@gmail.com'),
(4, 'parakram2052', 'parakram2052@gmail.com'),
(5, 'xyz', 'xyz@gmail.com'),
(6, 'vijaybhav123', 'vijaybhav123@gmail.com'),
(7, 'vinayak', 'sidhivinayak@gmail.com'),
(9, 'i_love_india', 'i_love_india@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_date` int NOT NULL,
  `emp_id` int NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`a_id`, `a_date`, `emp_id`) VALUES
(1, 521, 1),
(2, 521, 2),
(3, 521, 3),
(4, 521, 4),
(5, 521, 5),
(6, 521, 6),
(7, 521, 7),
(8, 521, 8),
(9, 521, 9),
(10, 521, 10),
(11, 521, 11),
(12, 521, 12),
(13, 521, 13),
(14, 521, 14),
(15, 521, 15),
(16, 521, 16);

-- --------------------------------------------------------

--
-- Table structure for table `customerbill`
--

DROP TABLE IF EXISTS `customerbill`;
CREATE TABLE IF NOT EXISTS `customerbill` (
  `b1_id` int NOT NULL AUTO_INCREMENT,
  `b1_am` int NOT NULL,
  `cu_id` int NOT NULL,
  PRIMARY KEY (`b1_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customerbill`
--

INSERT INTO `customerbill` (`b1_id`, `b1_am`, `cu_id`) VALUES
(1, 211, 1),
(2, 211, 2),
(3, 211, 3),
(4, 211, 4),
(5, 211, 5),
(6, 211, 6),
(8, 211, 8),
(9, 191, 9),
(10, 191, 10),
(11, 191, 11),
(12, 191, 12),
(13, 191, 13),
(14, 191, 14),
(15, 191, 15),
(16, 191, 16);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `emp_email` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `emp_mo_no` bigint NOT NULL,
  `emp_password` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `emp_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `emp_work` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`emp_id`, `emp_name`, `emp_email`, `emp_mo_no`, `emp_password`, `emp_address`, `emp_work`) VALUES
(1, 'rabari_kgrabari', 'kgrabari200@gmail.com', 9999999898, '1520', '6/182murlidhar avas near ambaji mandir ghatlodiya', '80'),
(2, 'rabari_an', 'anrabari200@gmail.com', 9999999898, '1520', 'kantrodi,ahmedabad', '80'),
(3, 'rabari_dk', 'dk200@gmail.com', 9999999898, '1520', 'gothva,ahmedabad', '80'),
(4, 'rabari_pdrs', 'pdrs@gmail.com', 9999999898, '1520', 'denap,ahmedabad', '80'),
(5, 'rabari_parakram', 'parakram@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(6, 'vijaybhav', 'vijaybhav@gmail.com', 9898152021, '12345678910', 'murlidhar_denap', '11'),
(7, 'mn', 'mn@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(8, 'mb', 'mb@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(9, 'vv', 'vv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(10, 'bnanv', 'bbnsvbv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(11, 'nxbc', 'bbnsvbv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(12, 'bnb', 'bbnsvbv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(13, 'vbvbnv', 'bbnsvbv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(14, 'bjbmnbmnb', 'bbnsvbv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(15, 'bnvbbvb', 'bbnsvbv@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80'),
(16, 'xyz', 'xyz@gmail.com', 9999999898, '1520', 'murlidhar,ahmedabad', '80');

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

DROP TABLE IF EXISTS `emps`;
CREATE TABLE IF NOT EXISTS `emps` (
  `sa_id` int NOT NULL AUTO_INCREMENT,
  `a_id` int NOT NULL,
  `emp_id` int NOT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emps`
--

INSERT INTO `emps` (`sa_id`, `a_id`, `emp_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `inv_id` int NOT NULL AUTO_INCREMENT,
  `inv_no` int NOT NULL,
  `su_id` int NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `inv_no`, `su_id`) VALUES
(1, 23, 1),
(2, 23, 2),
(3, 291, 3),
(4, 291, 4),
(5, 291, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `o_id` int NOT NULL AUTO_INCREMENT,
  `o_qu` varchar(25) NOT NULL,
  `cu_id` int NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `o_qu`, `cu_id`) VALUES
(1, '521', 1),
(2, '521', 2),
(3, '521', 3),
(4, '521', 4),
(5, '521', 5),
(6, '521', 6),
(7, '521', 7),
(8, '521', 8),
(9, '521', 9),
(10, '521', 10),
(11, '521', 11),
(12, '521', 12),
(13, '30341', 13);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `su_id` int NOT NULL AUTO_INCREMENT,
  `su_name` varchar(25) NOT NULL,
  `su_email` varchar(45) NOT NULL,
  `su_mo_no` bigint NOT NULL,
  `sup_name` varchar(30) NOT NULL,
  `sup_qu` varchar(25) NOT NULL,
  PRIMARY KEY (`su_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`su_id`, `su_name`, `su_email`, `su_mo_no`, `sup_name`, `sup_qu`) VALUES
(1, 'mn', 'mn@gmail.com', 211, 'mn', '88'),
(2, 'mn', 'mn@gmail.com', 211, 'mn', '98'),
(4, 'jio', 'jio@gmail.com', 211, 'mn', '98'),
(5, 'jio', 'jio@gmail.com', 211, 'mn', '98');

-- --------------------------------------------------------

--
-- Table structure for table `workingpartner`
--

DROP TABLE IF EXISTS `workingpartner`;
CREATE TABLE IF NOT EXISTS `workingpartner` (
  `wp_id` int NOT NULL AUTO_INCREMENT,
  `wp_name` varchar(25) NOT NULL,
  `wp_mo_no` int NOT NULL,
  `wp_email` varchar(45) NOT NULL,
  PRIMARY KEY (`wp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `workingpartner`
--

INSERT INTO `workingpartner` (`wp_id`, `wp_name`, `wp_mo_no`, `wp_email`) VALUES
(1, 'kg_rabari', 2147483647, 'kg200@gmail.com'),
(2, 'an_rabari', 2147483647, 'an200@gmail.com'),
(3, 'dk_rabari', 2147483647, 'dk200@gmail.com'),
(4, 'pdrs_rabari', 2147483647, 'pdrs200@gmail.com'),
(5, 'parakram_rabari', 2147483647, 'parakram200@gmail.com'),
(6, 'vijaybhav', 2147483647, 'vijaybhav@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `workingpartnerbill`
--

DROP TABLE IF EXISTS `workingpartnerbill`;
CREATE TABLE IF NOT EXISTS `workingpartnerbill` (
  `wb1_id` int NOT NULL AUTO_INCREMENT,
  `wb1_am` int NOT NULL,
  `wp_id` int NOT NULL,
  PRIMARY KEY (`wb1_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `workingpartnerbill`
--

INSERT INTO `workingpartnerbill` (`wb1_id`, `wb1_am`, `wp_id`) VALUES
(1, 1520, 1),
(2, 1520, 2),
(3, 1520, 3),
(4, 1520, 4),
(5, 1520, 5),
(6, 1520, 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
