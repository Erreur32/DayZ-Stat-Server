## Hi Dayz Survivor !!


## 🔥 STILL in Devlopment ... not ready yet

![https://dayz.echosystem.fr](https://git.echosystem.fr/repo-avatars/191)

     ☠  TEAM DayZ 🆃🅾🆇 https://dayz.echosystem.fr ☠ 


#  Simple live Stat for Dayz Standalone server.
   Inspired by Omega namager template.
   >  *The [OmegaManager](https://cftools.de/) is a local application to run your DayZ servers. It automatically deploys, runs, watches, restarts and updates your server.*

   This page will show your **DayZ server live stat**. It's working with directly on editing **config.php** file and if you have crontab and sql you can have some graph.

## Installation

### #1 Download Archive


 Download last archive https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/archive/0.32.zip
   
     # or Use the lastest version with git 
      git clone https://git.echosystem.fr/Erreur32/DayZ-Stat-Server.git 

 

### #2 Configuration Required

 -  Set the *config.php* file and fill your `ip` , `port` , `query` and `omega server port mod`.

    >         $ipserv   = "6.6.6.6"; // IP server game
    >         $portserv = "2302" ;   // Game Server Port
    >         $modport  = "2312" ;   // Mod port omega (+10)
    >         $queryport= "27016";   // Queryport
 
 - Omega manager (to check list mod only, but higly suggered !) 


### #3 Create SQL `dayzstat` database and insert SQL/table.sql .
 
 - mysql database (to store status server for graph) 
     Create `dayzstat` database first + user privilege.  Checkout Schema database in SQL/table.sql
     
>         -- Adminer 4.7.8 MySQL dump
> 
>         SET NAMES utf8;
>         SET time_zone = '+00:00';
>         SET foreign_key_checks = 0;
>         SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
> 
>         SET NAMES utf8mb4;
> 
>         DROP DATABASE IF EXISTS `dayzstat`;
>         CREATE DATABASE `dayzstat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
>         USE `dayzstat`;
> 
>         DROP TABLE IF EXISTS `StatServer_5`;
>         CREATE TABLE `StatServer_5` (
>           `id` int(11) NOT NULL AUTO_INCREMENT,
>           `date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
>           `name` varchar(74) NOT NULL DEFAULT 'Offline',
>           `players` varchar(32) NOT NULL DEFAULT '0',
>           `maxplayers` varchar(4) DEFAULT NULL,
>           `map` varchar(19) DEFAULT NULL,
>           `game` varchar(4) DEFAULT NULL,
>           `version` varchar(15) DEFAULT NULL,
>           `timeserver` varchar(12) DEFAULT NULL,
>           `timespeed` varchar(5) DEFAULT NULL,
>           `timespeedn` varchar(5) DEFAULT NULL,
>           `mod` varchar(5) DEFAULT NULL,
>           `battleye` tinytext DEFAULT NULL,
>           `hive` varchar(11) DEFAULT NULL,
>           `connect` varchar(32) DEFAULT NULL,
>           `secure` tinytext DEFAULT NULL,
>           `ping` varchar(3) DEFAULT '0',
>           PRIMARY KEY (`id`),
>           KEY `timeserver` (`timeserver`),
>           KEY `date` (`date`)
>         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
> 
> 
>         -- 2021-02-05 10:22:08
> 

 - **2 Differents way for your crontab** with Shell or php. Put *statserver_json.sh* in your crontab for mysql insert & creation of json file. 

### #4 Crontab to fill Database.

>#### For Shell (SQL insert + json)
>       */5 * * * *       /usr/sbin/sh /pathto/SQL/statserver_json.sh  2>&1
    
 OR

>#### For php (SQL insert)
>      */5 * * * *       /usr/local/bin/php -f /your/path/SQL/dayz2json_parser_sql.php 2>&1


  Check your time zone here. https://www.php.net/manual/en/timezones.others.php


## Et Voilà ! 
ENJOY :)


### TODO

     - make ~~Regex to catch~~ time serv to auto detect it, and it's fucking hard :p)

     - Need to finish SQL part for stat USER

     - Admin section with usefull info from your log server.

 



### Library used:

>  [PHP-Source-Query](https://github.com/xPaw/PHP-Source-Query) -     PHP library to query servers that implement Steam query protocol (also known as Source Engine Query protocol) 

 
 

### sample:

> [example live page](https://dayz.echosystem.fr/git-DayZ-server-stat/)
 
![https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/assets/Screenshot_2021-02-04.png](https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/assets/Screenshot_2021-02-04.png)



## 🔥 STILL in Devlopment ... not ready for production.


-----
Website: [dayz.echosystem.fr](https://dayz.echosystem.fr)

Author : Erreur32
