-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2016 at 07:22 PM
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
  `col` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `coefficients`
--

INSERT INTO `coefficients` (`sum`, `cost`, `c_id`, `server_id`, `game_name`, `col`) VALUES
(1000, 1, 54, 4, 'lineage_free', 0),
(1000000, 12, 55, 4, 'lineage_free', 0),
(1000000000, 123, 56, 4, 'lineage_free', 0),
(1, 250, 58, 4, 'lineage_free', 1),
(1000, 1, 59, 40, 'lineage_rus', 0),
(1000000, 23, 60, 40, 'lineage_rus', 0),
(1000000000, 44, 61, 40, 'lineage_rus', 0),
(1000, 1, 62, 41, 'lineage_rus', 0),
(1000000, 0, 63, 41, 'lineage_rus', 0),
(1000000000, 23, 64, 41, 'lineage_rus', 0),
(1000, 123, 65, 42, 'lineage_rus', 0),
(1000000, 123, 66, 42, 'lineage_rus', 0),
(1000000000, 123, 67, 42, 'lineage_rus', 0),
(1000, 1, 68, 43, 'lineage_rus', 0),
(1000000, 23, 69, 43, 'lineage_rus', 0),
(1000000000, 44, 70, 43, 'lineage_rus', 0),
(1000, 1, 71, 5, 'lineage_free', 0),
(1000000, 1, 72, 5, 'lineage_free', 0),
(1000000000, 12, 73, 5, 'lineage_free', 0),
(1, 2222, 75, 5, 'lineage_free', 1),
(1000, 12, 76, 6, 'lineage_free', 0),
(1000000, 11, 77, 6, 'lineage_free', 0),
(1000000000, 10, 78, 6, 'lineage_free', 0),
(1, 44, 80, 6, 'lineage_free', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE IF NOT EXISTS `cs` (
  `name` varchar(128) NOT NULL,
  `cost` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`name`, `cost`) VALUES
('knife', '100$');

-- --------------------------------------------------------

--
-- Table structure for table `dota`
--

CREATE TABLE IF NOT EXISTS `dota` (
  `name` varchar(128) NOT NULL,
  `cost` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dota`
--

INSERT INTO `dota` (`name`, `cost`) VALUES
('set', '300$'),
('other set', '400$');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lineage_classic_rus`
--

INSERT INTO `lineage_classic_rus` (`id`, `server_name`) VALUES
(1, 'Valera x10');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lineage_free`
--

INSERT INTO `lineage_free` (`id`, `server_name`) VALUES
(4, 'Valera x10'),
(5, '12'),
(6, 'Averia x12');

-- --------------------------------------------------------

--
-- Table structure for table `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`) VALUES
(40, 'йцуцу'),
(41, 'Valera x10'),
(42, 'Valera x10'),
(43, 'Averia');

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
  `status` enum('new','done') NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `col` tinyint(1) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `game`, `server`, `money`, `adena`, `nickname`, `contact`, `comment`, `status`, `time`, `col`) VALUES
(18, 'lineage_rus', 'Valera x100', 111, 1055, 'sfsdf', 'sdfsdf', 'qweqweq', 'done', '2016-01-04 09:39:25', 0),
(19, 'lineage_rus', 'Averia x100500', 1233, 287289, 'Valera', 'rewq', 'admin-loh', 'new', '2016-01-04 09:01:08', 0),
(20, 'lineage_rus', 'Averia x100500', 1233, 287289, 'Valera', 'rewq', 'admin-loh', 'done', '2016-01-04 09:03:41', 0),
(22, 'lineage_rus', '11111', 247, 1233, 'qwe', 'qwe', 'qqwe', 'done', '2016-01-04 13:53:15', 0),
(23, 'lineage_rus', 'Averia', 1111, 1111, '111', '111', '111111111', 'new', '2016-01-11 16:06:26', 0),
(24, 'lineage_free', 'Averia x12', 10, 440, 'qwe', 'qwe', 'qwe', 'new', '2016-01-11 16:24:16', 1),
(25, 'lineage_free', 'Averia x12', 10, 440, 'qweq', 'qweq', 'qweq', 'new', '2016-01-11 16:24:33', 1),
(26, 'lineage_free', 'Averia x12', 12003, 144036, 'asad', 'asd', 'asdasd', 'new', '2016-01-11 16:24:57', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
