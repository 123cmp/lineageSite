-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2016 at 11:40 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lineageSite`
--

-- --------------------------------------------------------

--
-- Table structure for table `coefficients`
--

CREATE TABLE IF NOT EXISTS `coefficients` (
  `sum` bigint(9) NOT NULL DEFAULT '0',
  `cost` float NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL,
  `game_name` varchar(44) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `coefficients`
--

INSERT INTO `coefficients` (`sum`, `cost`, `c_id`, `server_id`, `game_name`) VALUES
(1000, 10.1, 1, 27, 'lineage_rus'),
(1000000, 10.1, 4, 28, 'lineage_rus'),
(1000000000, 9.5, 7, 29, 'lineage_rus');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_classic_euro`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_euro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lineage_classic_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`) VALUES
(27, 'Valera x10'),
(28, 'Valera x50'),
(29, 'Valera x100');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(50) NOT NULL,
  `server` varchar(50) NOT NULL,
  `money` bigint(20) NOT NULL,
  `adena` bigint(20) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `game`, `server`, `money`, `adena`, `nickname`, `contact`, `comment`, `time`) VALUES
(18, 'lineage_rus', 'Valera x100', 111, 1055, 'sfsdf', 'sdfsdf', 'qweqweq', '2016-01-04 09:39:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
