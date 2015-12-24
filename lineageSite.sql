-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2015 at 04:46 PM
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
  `sum` mediumint(9) NOT NULL DEFAULT '0',
  `cost` float NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL,
  `game_name` varchar(44) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coefficients`
--

INSERT INTO `coefficients` (`sum`, `cost`, `c_id`, `server_id`, `game_name`) VALUES
(100000, 8.1, 1, 2, 'lineage_classic_euro'),
(1000000, 7.4, 2, 3, 'lineage_classic_rus');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_classic_euro`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_euro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lineage_classic_euro`
--

INSERT INTO `lineage_classic_euro` (`id`, `server_name`) VALUES
(2, 'Valera x10'),
(3, 'Qwerty'),
(4, '123');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_classic_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lineage_classic_rus`
--

INSERT INTO `lineage_classic_rus` (`id`, `server_name`) VALUES
(1, '23132'),
(2, 'qweert'),
(3, '123');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lineage_free`
--

INSERT INTO `lineage_free` (`id`, `server_name`) VALUES
(2, 'Averia'),
(3, 'qweqw'),
(4, '123');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`) VALUES
(8, 'asd'),
(9, 'Valera x10'),
(10, 'фыв'),
(21, 'фыв'),
(22, 'Valera x10');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(40) NOT NULL,
  `server` varchar(44) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `adena` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nickname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `comment` varchar(256) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`r_id`, `game`, `server`, `money`, `adena`, `timestamp`, `nickname`, `contact`, `comment`) VALUES
(2, 'lineage_classic_euro', 'Valera x10', 111, 899, '2015-12-24 13:57:28', '', '', ''),
(3, 'lineage_classic_euro', '123', 123, 861, '2015-12-24 14:22:45', '123', '123', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
