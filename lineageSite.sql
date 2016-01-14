-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 15 2016 г., 01:15
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lineagesite`
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
  `game_key` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Дамп данных таблицы `coefficients`
--

INSERT INTO `coefficients` (`sum`, `cost`, `c_id`, `server_id`, `game_name`, `col`, `game_key`) VALUES
(1000, 123, 111, 13, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000, 123, 112, 13, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000000, 123, 113, 13, 'lineage_classic_euro', 0, 'cl_eu'),
(1000, 123, 114, 4, 'lineage_classic_rus', 0, 'cl_rus'),
(1000000, 123, 115, 4, 'lineage_classic_rus', 0, 'cl_rus'),
(1000000000, 123, 116, 4, 'lineage_classic_rus', 0, 'cl_rus'),
(1000, 11, 117, 14, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000, 11, 118, 14, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000000, 0, 119, 14, 'lineage_classic_euro', 0, 'cl_eu'),
(1000, 12, 120, 15, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000, 12, 121, 15, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000000, 12, 122, 15, 'lineage_classic_euro', 0, 'cl_eu'),
(1000, 22, 123, 7, 'lineage_free', 0, 'free'),
(1000000, 22, 124, 7, 'lineage_free', 0, 'free'),
(1000000000, 22, 125, 7, 'lineage_free', 0, 'free'),
(1, 22, 126, 7, 'lineage_free', 0, 'free'),
(1, 22, 127, 7, 'lineage_free', 1, 'free'),
(1000, 23, 128, 8, 'lineage_free', 0, 'free'),
(1000000, 23, 129, 8, 'lineage_free', 0, 'free'),
(1000000000, 23, 130, 8, 'lineage_free', 0, 'free'),
(1, 232, 131, 8, 'lineage_free', 0, 'free'),
(1, 232, 132, 8, 'lineage_free', 1, 'free'),
(1000, 24, 133, 9, 'lineage_free', 0, 'free'),
(1000000, 24, 134, 9, 'lineage_free', 0, 'free'),
(1000000000, 24, 135, 9, 'lineage_free', 0, 'free'),
(1, 244, 136, 9, 'lineage_free', 0, 'free'),
(1, 244, 137, 9, 'lineage_free', 1, 'free'),
(1000, 55, 138, 10, 'lineage_free', 0, 'free'),
(1000000, 55, 139, 10, 'lineage_free', 0, 'free'),
(1000000000, 55, 140, 10, 'lineage_free', 0, 'free'),
(1, 555, 141, 10, 'lineage_free', 0, 'free'),
(1, 555, 142, 10, 'lineage_free', 1, 'free'),
(1000, 123, 143, 11, 'lineage_free', 0, 'free'),
(1000000, 123, 144, 11, 'lineage_free', 0, 'free'),
(1000000000, 123, 145, 11, 'lineage_free', 0, 'free'),
(1, 123, 146, 11, 'lineage_free', 0, 'free'),
(1, 123, 147, 11, 'lineage_free', 1, 'free'),
(1000, 123, 148, 12, 'lineage_free', 0, 'free'),
(1000000, 123, 149, 12, 'lineage_free', 0, 'free'),
(1000000000, 123, 150, 12, 'lineage_free', 0, 'free'),
(1, 123, 151, 12, 'lineage_free', 0, 'free'),
(1, 123, 152, 12, 'lineage_free', 1, 'free'),
(1000, 14, 153, 13, 'lineage_free', 0, 'free'),
(1000000, 14, 154, 13, 'lineage_free', 0, 'free'),
(1000000000, 14, 155, 13, 'lineage_free', 0, 'free'),
(1, 144, 156, 13, 'lineage_free', 1, 'free'),
(1000, 22, 161, 15, 'lineage_free', 0, 'free'),
(1000000, 22, 162, 15, 'lineage_free', 0, 'free'),
(1000000000, 22, 163, 15, 'lineage_free', 0, 'free'),
(1, 222, 164, 15, 'lineage_free', 1, 'free'),
(1000, 44, 165, 16, 'lineage_free', 0, 'free'),
(1000000, 44, 166, 16, 'lineage_free', 0, 'free'),
(1000000000, 44, 167, 16, 'lineage_free', 0, 'free'),
(1, 444, 168, 16, 'lineage_free', 1, 'free'),
(1000, 55, 169, 16, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000, 55, 170, 16, 'lineage_classic_euro', 0, 'cl_eu'),
(1000, 55, 171, 17, 'lineage_classic_euro', 0, 'cl_eu'),
(1000000, 55, 172, 17, 'lineage_classic_euro', 0, 'cl_eu'),
(0, 0, 179, 0, 'dota', 0, ''),
(12333, 0, 180, 0, '<?= $GLOBALS[''game_name'']?>', 0, ''),
(123, 0, 181, 0, '<?= $GLOBALS[''game_name'']?>', 0, ''),
(21, 0, 182, 0, '<?= $GLOBALS[''game_name'']?>', 0, ''),
(1000, 123, 183, 47, 'lineage_rus', 0, 'rus'),
(1000000, 123, 184, 47, 'lineage_rus', 0, 'rus'),
(1000000000, 123, 185, 47, 'lineage_rus', 0, 'rus'),
(100, 0, 186, 0, '<?= $GLOBALS[''game_name'']?>', 0, ''),
(0, 0, 187, 0, '<?= $GLOBALS[''game_name'']?>', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `cs`
--

CREATE TABLE IF NOT EXISTS `cs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `cost` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `cs`
--

INSERT INTO `cs` (`id`, `name`, `cost`) VALUES
(1, 'knife', '100$'),
(2, 'pistolet', '10k baksov');

-- --------------------------------------------------------

--
-- Структура таблицы `dota`
--

CREATE TABLE IF NOT EXISTS `dota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `cost` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `dota`
--

INSERT INTO `dota` (`id`, `name`, `cost`) VALUES
(1, 'set', '300$'),
(2, 'other set', '400$'),
(4, 'set', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_euro`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_euro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  `key` varchar(12) NOT NULL DEFAULT 'cl_eu',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `lineage_classic_euro`
--

INSERT INTO `lineage_classic_euro` (`id`, `server_name`, `key`) VALUES
(13, 'Qwerty', 'cl_eu'),
(14, 'eu 11', 'cl_eu'),
(15, 'eu 12', 'cl_eu');

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  `key` varchar(12) NOT NULL DEFAULT 'cl_rus',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `lineage_classic_rus`
--

INSERT INTO `lineage_classic_rus` (`id`, `server_name`, `key`) VALUES
(4, 'Qwerty', 'cl_rus');

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  `key` varchar(12) NOT NULL DEFAULT 'free',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(32) NOT NULL,
  `key` varchar(12) NOT NULL DEFAULT 'rus',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Дамп данных таблицы `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`, `key`) VALUES
(47, 'rus', 'rus');

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
  `col` tinyint(1) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
