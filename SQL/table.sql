-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `StatServer_5`;
CREATE TABLE `StatServer_5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(74) NOT NULL DEFAULT 'Offline',
  `players` varchar(32) NOT NULL DEFAULT '0',
  `maxplayers` varchar(4) DEFAULT NULL,
  `map` varchar(19) DEFAULT NULL,
  `game` varchar(4) DEFAULT NULL,
  `version` varchar(15) DEFAULT NULL,
  `timeserver` varchar(12) DEFAULT NULL,
  `timespeed` varchar(5) DEFAULT NULL,
  `timespeedn` varchar(5) DEFAULT NULL,
  `mods` varchar(5) DEFAULT NULL,
  `battleye` tinytext DEFAULT NULL,
  `hive` varchar(11) DEFAULT NULL,
  `connect` varchar(32) DEFAULT NULL,
  `secure` tinytext DEFAULT NULL,
  `ping` varchar(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `timeserver` (`timeserver`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-02-05 10:22:08
