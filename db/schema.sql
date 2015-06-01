-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Mai 2015 um 16:16
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `scip`
--

-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS scip;
USE scip;

--
-- Tabellenstruktur für Tabelle `tbl_pictures`
--

CREATE TABLE IF NOT EXISTS `tbl_pictures` (
  `id` int(10)  NOT NULL AUTO_INCREMENT,
  `picture` blob NOT NULL,
  `userId` int(10)  NOT NULL,
  `likes` int(10)  DEFAULT NULL,
  `dislikes` int(10)  DEFAULT NULL,
  `comments` varchar(1023) DEFAULT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(31) NOT NULL,
  `password` varchar(31) NOT NULL,
  `gender` tinyint(1) unsigned DEFAULT NULL,
  `mail` varchar(127) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `pictureId` int(11) DEFAULT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints der Tabelle `tbl_pictures`
--
ALTER TABLE `tbl_pictures`
ADD CONSTRAINT `tbl_pictures_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`id`);

ALTER TABLE `tbl_users`
ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`pictureId`) REFERENCES `tbl_pictures` (`id`);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

