-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 11 2016 г., 15:27
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
  `sum` bigint(9) NOT NULL DEFAULT '0',
  `cost` float NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL,
  `game_name` varchar(44) NOT NULL,
  `col` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Дамп данных таблицы `coefficients`
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
(1000000, 123, 77, 6, 'lineage_free', 0),
(1000000000, 213, 78, 6, 'lineage_free', 0),
(1, 44, 79, 6, 'lineage_free', 0),
(1, 44, 80, 6, 'lineage_free', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_euro`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_euro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `lineage_classic_rus`
--

INSERT INTO `lineage_classic_rus` (`id`, `server_name`) VALUES
(1, 'Valera x10');

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `lineage_free`
--

INSERT INTO `lineage_free` (`id`, `server_name`) VALUES
(4, 'Valera x10'),
(5, '12'),
(6, 'Averia x12');

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`) VALUES
(40, 'йцуцу'),
(41, 'Valera x10'),
(42, 'Valera x10'),
(43, 'Averia');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
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
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`o_id`, `game`, `server`, `money`, `adena`, `nickname`, `contact`, `comment`, `status`, `time`) VALUES
(18, 'lineage_rus', 'Valera x100', 111, 1055, 'sfsdf', 'sdfsdf', 'qweqweq', 'done', '2016-01-04 09:39:25'),
(19, 'lineage_rus', 'Averia x100500', 1233, 287289, 'Valera', 'rewq', 'admin-loh', 'new', '2016-01-04 09:01:08'),
(20, 'lineage_rus', 'Averia x100500', 1233, 287289, 'Valera', 'rewq', 'admin-loh', 'done', '2016-01-04 09:03:41'),
(22, 'lineage_rus', '11111', 247, 1233, 'qwe', 'qwe', 'qqwe', 'done', '2016-01-04 13:53:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
