-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2015 г., 22:34
-- Версия сервера: 5.6.26
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lineagesite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_euro`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_euro` (
  `id` int(11) NOT NULL,
  `server_name` varchar(32) NOT NULL,
  `1kk` float NOT NULL,
  `100kk` float NOT NULL,
  `1000kk` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lineage_classic_euro`
--

INSERT INTO `lineage_classic_euro` (`id`, `server_name`, `1kk`, `100kk`, `1000kk`) VALUES
(2, 'Valera x10', 21, 10.2, 123),
(3, 'Qwerty', 123, 23, 33),
(4, '123', 444, 455, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_classic_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_classic_rus` (
  `id` int(11) NOT NULL,
  `server_name` varchar(32) NOT NULL,
  `1kk` float NOT NULL,
  `100kk` float NOT NULL,
  `1000kk` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lineage_classic_rus`
--

INSERT INTO `lineage_classic_rus` (`id`, `server_name`, `1kk`, `100kk`, `1000kk`) VALUES
(1, '23132', 21, 10.2, 15),
(2, 'qweert', 0, 0, 0),
(3, '123', 44, 55, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_free`
--

CREATE TABLE IF NOT EXISTS `lineage_free` (
  `id` int(11) NOT NULL,
  `server_name` varchar(32) NOT NULL,
  `1kk` float NOT NULL,
  `100kk` float NOT NULL,
  `1000kk` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lineage_free`
--

INSERT INTO `lineage_free` (`id`, `server_name`, `1kk`, `100kk`, `1000kk`) VALUES
(2, 'Averia', 10.8, 10.2, 52),
(3, 'qweqw', 0, 0, 1),
(4, '123', 444, 44, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lineage_rus`
--

CREATE TABLE IF NOT EXISTS `lineage_rus` (
  `id` int(11) NOT NULL,
  `server_name` varchar(32) NOT NULL,
  `1kk` float NOT NULL,
  `100kk` float NOT NULL,
  `1000kk` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lineage_rus`
--

INSERT INTO `lineage_rus` (`id`, `server_name`, `1kk`, `100kk`, `1000kk`) VALUES
(8, 'asd', 0, 0, 1),
(9, 'Valera x10', 21, 10.2, 15),
(10, 'фыв', 10.8, 12, 15),
(21, 'фыв', 10.8, 10.2, 15),
(22, 'Valera x10', 21, 10.2, 15);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lineage_classic_euro`
--
ALTER TABLE `lineage_classic_euro`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lineage_classic_rus`
--
ALTER TABLE `lineage_classic_rus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lineage_free`
--
ALTER TABLE `lineage_free`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lineage_rus`
--
ALTER TABLE `lineage_rus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lineage_classic_euro`
--
ALTER TABLE `lineage_classic_euro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `lineage_classic_rus`
--
ALTER TABLE `lineage_classic_rus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `lineage_free`
--
ALTER TABLE `lineage_free`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `lineage_rus`
--
ALTER TABLE `lineage_rus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
