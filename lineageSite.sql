-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 25 2015 г., 14:07
-- Версия сервера: 5.5.46-0ubuntu0.14.04.2
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lineageSite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `coefficients`
--

CREATE TABLE IF NOT EXISTS `coefficients` (
  `sum` mediumint(9) NOT NULL DEFAULT '0',
  `cost` float NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL,
  `game_name` varchar(44) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `coefficients`
--

INSERT INTO `coefficients` (`sum`, `cost`, `c_id`, `server_id`, `game_name`) VALUES
(1000000, 10.1, 1, 27, 'lineage_rus'),
(0, 0, 2, 27, 'lineage_rus'),
(0, 0, 3, 27, 'lineage_rus'),
(1000000, 10.1, 4, 28, 'lineage_rus'),
(0, 0, 5, 28, 'lineage_rus'),
(0, 0, 6, 28, 'lineage_rus'),
(1000000, 9.5, 7, 29, 'lineage_rus'),
(0, 0, 8, 29, 'lineage_rus'),
(0, 0, 9, 29, 'lineage_rus'),
(12, 10.1, 10, 30, 'lineage_rus'),
(0, 0, 11, 30, 'lineage_rus'),
(0, 0, 12, 30, 'lineage_rus'),
(1000000, 10.1, 13, 31, 'lineage_rus'),
(0, 0, 14, 31, 'lineage_rus'),
(0, 0, 15, 31, 'lineage_rus'),
(1000000, 9.5, 16, 32, 'lineage_rus'),
(0, 0, 17, 32, 'lineage_rus'),
(0, 0, 18, 32, 'lineage_rus'),
(1000000, 10.1, 19, 33, 'lineage_rus'),
(0, 0, 20, 33, 'lineage_rus'),
(0, 0, 21, 33, 'lineage_rus'),
(1000000, 10.1, 22, 34, 'lineage_rus'),
(0, 0, 23, 34, 'lineage_rus'),
(0, 0, 24, 34, 'lineage_rus'),
(1000000, 10.1, 25, 35, 'lineage_rus'),
(0, 0, 26, 35, 'lineage_rus'),
(0, 0, 27, 35, 'lineage_rus'),
(12, 10.1, 28, 36, 'lineage_rus'),
(0, 0, 29, 36, 'lineage_rus'),
(0, 0, 30, 36, 'lineage_rus'),
(1000000, 10.1, 31, 37, 'lineage_rus'),
(0, 0, 32, 37, 'lineage_rus'),
(0, 0, 33, 37, 'lineage_rus'),
(12, 10.1, 34, 38, 'lineage_rus'),
(0, 0, 35, 38, 'lineage_rus'),
(0, 0, 36, 38, 'lineage_rus');

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_euro`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_euro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`) VALUES
(27, 'Valera x10'),
(28, 'Valera x50'),
(29, 'Valera x10'),
(30, 'йцуцу'),
(31, 'фыв'),
(32, 'фыв'),
(33, 'Valera x10'),
(34, 'йцуцу'),
(35, 'Valera x10'),
(36, 'Valera x10'),
(37, 'йцуцу'),
(38, 'Valera x50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
