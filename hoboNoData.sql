 -- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hobo
CREATE DATABASE IF NOT EXISTS `hobo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `hobo`;

-- Dumping structure for table hobo.abonnement
CREATE TABLE IF NOT EXISTS `abonnement` (
  `AboID` int(10) NOT NULL AUTO_INCREMENT,
  `AboNaam` varchar(50) DEFAULT NULL,
  `MaxDevices` int(10) DEFAULT NULL,
  `StreamKwaliteit` int(10) DEFAULT NULL,
  PRIMARY KEY (`AboID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.aflevering
CREATE TABLE IF NOT EXISTS `aflevering` (
  `AfleveringID` int(10) NOT NULL AUTO_INCREMENT,
  `SeizID` int(10) NOT NULL,
  `Rang` int(10) DEFAULT NULL,
  `AflTitel` varchar(100) DEFAULT NULL,
  `Duur` int(10) DEFAULT NULL,
  PRIMARY KEY (`AfleveringID`),
  KEY `FKAflevering938760` (`SeizID`),
  CONSTRAINT `FKAflevering938760` FOREIGN KEY (`SeizID`) REFERENCES `seizoen` (`SeizoenID`)
) ENGINE=InnoDB AUTO_INCREMENT=15734 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `GenreID` int(10) NOT NULL AUTO_INCREMENT,
  `GenreNaam` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GenreID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.klant
CREATE TABLE IF NOT EXISTS `klant` (
  `KlantNr` int(10) NOT NULL AUTO_INCREMENT,
  `AboID` int(10) NOT NULL,
  `Voornaam` varchar(50) DEFAULT NULL,
  `Tussenvoegsel` varchar(10) DEFAULT NULL,
  `Achternaam` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Genre` varchar(255) NOT NULL,
  `ContentManager` tinyint(1) unsigned DEFAULT 0,
  `Admin` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`KlantNr`),
  KEY `FKKlant` (`AboID`),
  CONSTRAINT `FKKlant746383` FOREIGN KEY (`AboID`) REFERENCES `abonnement` (`AboID`)
) ENGINE=InnoDB AUTO_INCREMENT=11050 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.seizoen
CREATE TABLE IF NOT EXISTS `seizoen` (
  `SeizoenID` int(10) NOT NULL AUTO_INCREMENT,
  `SerieID` int(10) NOT NULL,
  `Rang` int(11) DEFAULT NULL,
  `Jaar` int(4) DEFAULT NULL,
  `IMDBRating` int(10) DEFAULT NULL,
  PRIMARY KEY (`SeizoenID`),
  KEY `FKSeizoen` (`SerieID`)
) ENGINE=InnoDB AUTO_INCREMENT=1312 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.serie
CREATE TABLE IF NOT EXISTS `serie` (
  `SerieID` int(10) NOT NULL AUTO_INCREMENT,
  `SerieTitel` varchar(100) DEFAULT NULL,
  `IMDBLink` varchar(100) DEFAULT NULL,
  `Actief` int(11) DEFAULT 0,
  `TrailerVideo` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT 'amazing serie description loaded from database',
  PRIMARY KEY (`SerieID`)
) ENGINE=InnoDB AUTO_INCREMENT=642 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.serie_genre
CREATE TABLE IF NOT EXISTS `serie_genre` (
  `SerieID` int(10) NOT NULL,
  `GenreID` int(10) NOT NULL,
  PRIMARY KEY (`SerieID`,`GenreID`),
  KEY `FKSerie_Genre` (`GenreID`),
  CONSTRAINT `FKSerie_Genr109508` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`),
  CONSTRAINT `FKSerie_Genr458403` FOREIGN KEY (`SerieID`) REFERENCES `serie` (`SerieID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.stream
CREATE TABLE IF NOT EXISTS `stream` (
  `StreamID` int(10) NOT NULL AUTO_INCREMENT,
  `KlantID` int(10) NOT NULL,
  `AflID` int(10) NOT NULL,
  `d_start` datetime DEFAULT NULL,
  `d_eind` datetime DEFAULT NULL,
  `IP` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`StreamID`),
  KEY `FKStream1` (`AflID`),
  KEY `FKStream2` (`KlantID`),
  CONSTRAINT `FKStream706155` FOREIGN KEY (`AflID`) REFERENCES `aflevering` (`AfleveringID`),
  CONSTRAINT `FKStream895793` FOREIGN KEY (`KlantID`) REFERENCES `klant` (`KlantNr`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.

-- Dumping structure for table hobo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
