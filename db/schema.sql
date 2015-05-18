--
-- Datenbank: `scip`
--

CREATE DATABASE `scip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `scip`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_pictures`
--

CREATE TABLE IF NOT EXISTS `tb_pictures` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Dislikes` int(11) NOT NULL,
  `Comments` varchar(1023) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(127) NOT NULL,
  `Password` varchar(127) NOT NULL,
  `Name` varchar(127) NOT NULL,
  `Forename` varchar(127) NOT NULL,
  `Gender` tinyint(1) DEFAULT NULL,
  `Mail` varchar(127) NOT NULL,
  `Birthday` date NOT NULL,
  `Phonenumber` int(11) NOT NULL,
  `Profilpic` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;
