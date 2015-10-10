# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: eventDB
# Generation Time: 2015-10-10 21:29:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table client
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `clientName` varchar(40) NOT NULL DEFAULT '',
  `clientAreaCode` int(3) DEFAULT NULL,
  `eventName` varchar(12) NOT NULL DEFAULT '',
  `clientPhone` int(7) DEFAULT NULL,
  `position` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventID` int(11) DEFAULT NULL,
  PRIMARY KEY (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;

INSERT INTO `client` (`clientName`, `clientAreaCode`, `eventName`, `clientPhone`, `position`, `eventID`)
VALUES
	('Arun',111,'calHacks',1111111,1,NULL),
	('Satej',222,'calHacks',2222222,2,NULL),
	('Adithya',333,'bookstore',3333333,3,NULL),
	('Justin',NULL,'calHax',NULL,4,NULL);

/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventName` varchar(12) NOT NULL DEFAULT '',
  `rmtAcc` tinyint(1) NOT NULL,
  `smsP` int(4) NOT NULL,
  `avgWaitTime` int(4) NOT NULL,
  `closeF` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;

INSERT INTO `event` (`id`, `eventName`, `rmtAcc`, `smsP`, `avgWaitTime`, `closeF`)
VALUES
	(1,'Woo2823',1,20,20,0),
	(2,'Woo2823',1,20,20,0),
	(3,'Wooowow',0,20,20,20),
	(4,'Wooowow',1,20,20,20),
	(5,'woot',0,200,200,200),
	(6,'woot',1,200,200,200),
	(7,'calHacks',0,0,0,0);

/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table passwords
# ------------------------------------------------------------

DROP TABLE IF EXISTS `passwords`;

CREATE TABLE `passwords` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `passwordEnc` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `passwords` WRITE;
/*!40000 ALTER TABLE `passwords` DISABLE KEYS */;

INSERT INTO `passwords` (`id`, `passwordEnc`)
VALUES
	(1,'a8897eb4ec3a70dc2b1e7655ad815c64'),
	(2,'a8897eb4ec3a70dc2b1e7655ad815c64'),
	(3,'814989b983fd853fb374e1676a06ade4'),
	(4,'814989b983fd853fb374e1676a06ade4'),
	(5,'2f3949be9d591e4f6847e946db2fba78'),
	(6,'2f3949be9d591e4f6847e946db2fba78');

/*!40000 ALTER TABLE `passwords` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
