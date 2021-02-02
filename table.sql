-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `dayzstat`;
CREATE DATABASE `dayzstat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dayzstat`;

DROP TABLE IF EXISTS `StatServer_1`;
CREATE TABLE `StatServer_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `name` varchar(74) NOT NULL DEFAULT 'Offline',
  `numplayers` varchar(4) NOT NULL DEFAULT '0',
  `timeserver` varchar(12) DEFAULT NULL,
  `players` varchar(32) NOT NULL DEFAULT '0',
  `map` varchar(19) DEFAULT NULL,
  `game` varchar(4) DEFAULT NULL,
  `maxplayers` varchar(4) DEFAULT NULL,
  `requiredVersion` varchar(15) DEFAULT NULL,
  `version` varchar(15) DEFAULT NULL,
  `battleye` tinytext DEFAULT NULL,
  `hive` varchar(11) DEFAULT NULL,
  `connect` varchar(32) DEFAULT NULL,
  `secure` tinytext DEFAULT NULL,
  `ping` varchar(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `timeserver` (`timeserver`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-02-02 14:33:07


