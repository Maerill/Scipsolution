-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jun 2015 um 09:40
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE Database IF NOT EXISTS scip;
Use scip;

--
-- Datenbank: `scip`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_pic`
--

CREATE TABLE IF NOT EXISTS `tbl_pic` (
  `id` int(10) NOT NULL,
  `pic` blob,
  `likes` int(10) DEFAULT NULL,
  `dislikes` int(10) DEFAULT NULL,
  `comments` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL,
  `username` varchar(31) NOT NULL,
  `pssword` varchar(60) NOT NULL,
  `mail` varchar(63) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `profilpic` blob NULL,
  `picId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_pic`
--
ALTER TABLE `tbl_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `picId` (`picId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`picId`) REFERENCES `tbl_pic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
