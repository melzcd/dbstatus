-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2015 г., 22:16
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dbstatus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `statusfb`
--

CREATE TABLE IF NOT EXISTS `statusfb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dnsdb` varchar(255) NOT NULL,
  `nameserver` varchar(255) NOT NULL,
  `namesoft` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `statuspostgres`
--

CREATE TABLE IF NOT EXISTS `statuspostgres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(255) NOT NULL,
  `namesoft` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `dbname` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `statuspostgres`
--

INSERT INTO `statuspostgres` (`id`, `host`, `namesoft`, `des`, `port`, `dbname`, `user`, `pass`) VALUES
(3, '127.0.0.1', '111', '222', '5432', 'postgres', 'postgres', 'cG9zdGdyZXM=');

-- --------------------------------------------------------

--
-- Структура таблицы `stausmysql2`
--

CREATE TABLE IF NOT EXISTS `stausmysql2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(255) NOT NULL DEFAULT '',
  `dbname` varchar(255) NOT NULL,
  `namesoft` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `stausmysql2`
--

INSERT INTO `stausmysql2` (`id`, `host`, `dbname`, `namesoft`, `des`, `user`, `pass`) VALUES
(1, '127.0.0.1', 'dbstatus', '1', '2', 'root', ''),
(2, '127.0.0.1', 'gost', '111', '111', 'root', ''),
(3, '127.0.0.1', 'gost', 'www', 'ww', 'root', ''),
(4, '127.0.0.1', 'gost', 'www', 'ww', 'root', ''),
(7, '127.0.0.1', 'gost', 'кп сдп', '222', 'root', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
