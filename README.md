# ☠   [TEAM DayZ](https://dayz.echosystem.fr) (-🆃🅾🆇-)

### Presents


 <p align="center">
  <a href="https://github.com/Erreur32/DayZ-Stat-Server/releases">
    <img alt="Releases" src="https://img.shields.io/github/v/release/Erreur32/DayZ-Stat-Server?label=release&logo=DocuSign&logoColor=%23fff&style=for-the-badge" />
  </a>
  <a href=""><img alt="" src="" /></a>
  <a href=""><img alt="" src="" /></a>
</p>
 <p align="center">
  <a href="https://github.com/Erreur32/DayZ-Stat-Server/tags">
<img alt="GitHub tag (latest by date)"     src="https://img.shields.io/github/v/tag/Erreur32/DayZ-Stat-Server">
  </a>
  <a href=""><img alt="" src="" /></a>
  <a href=""><img alt="" src="" /></a>
</p>
 
![](https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/img/DayZStats.png)

#  📈 Simple live Stat for Dayz Standalone server.
   Inspired by the *Excelent* __Omega manager__.
   
   >  *The [OmegaManager](https://cftools.de/) is a local application to run your DayZ servers. It automatically deploys, runs, watches, restarts and updates your server.*

   This page will show your **DayZ server live stat**. It's working with directly on editing **config.php** file and if you have crontab and sql you can have some graph.



> [example live page](https://dayz.echosystem.fr/)


## Installation

### #1 Download Archive


 - Download lastest archive https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/archive/0.32.zip
   

#### or Use the lastest version with git 

  >   
        git clone https://git.echosystem.fr/Erreur32/DayZ-Stat-Server.git 

 

### #2 Configuration Required

 -  Set the *config.php* file in *config* directory  and fill your `ip` , `port` , `query` and `omega server port mod`.
 
#### edit config/config.php
 
 >
         $ipserv   = "6.6.6.6"; // IP server game
         $portserv = "2302" ;   // Game Server Port
         $modport  = "2312" ;   // Mod port omega (+10)
         $queryport= "27016";   // Queryport
 
 - Omega manager (to check list mod only, but higly suggered !) 


### #3 Create SQL `dayzstat` database and insert SQL/table.sql .
 
 - mysql database (to store status server for graph) 
     Create `dayzstat` database first + user privilege.  Checkout Schema database in SQL/table.sql

#### edit config/consql.php

 >
>              -- Adminer 4.7.8 MySQL dump
>              
>              SET NAMES utf8;
>              SET foreign_key_checks = 0;
>              SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
>      
>              SET NAMES utf8mb4;
>      
>              CREATE TABLE `StatServer_5` (
>                `id` int(11) NOT NULL AUTO_INCREMENT,
>                `date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
>                `name` varchar(74) NOT NULL DEFAULT 'Offline',
>                `players` varchar(32) NOT NULL DEFAULT '0',
>                `maxplayers` varchar(4) DEFAULT NULL,
>                `map` varchar(19) DEFAULT NULL,
>                `game` varchar(4) DEFAULT NULL,
>                `version` varchar(15) DEFAULT NULL,
>                `timeserver` varchar(12) DEFAULT NULL,
>                `timespeed` varchar(5) DEFAULT NULL,
>                `timespeedn` varchar(5) DEFAULT NULL,
>                `mod` varchar(5) DEFAULT NULL,
>                `battleye` tinytext DEFAULT NULL,
>                `hive` varchar(11) DEFAULT NULL,
>                `connect` varchar(32) DEFAULT NULL,
>                `secure` tinytext DEFAULT NULL,
>                `ping` varchar(3) DEFAULT '0',
>                PRIMARY KEY (`id`),
>                KEY `timeserver` (`timeserver`),
>                KEY `date` (`date`)
>              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>      
>      
>              -- 2021-02-05 10:22:08
     

 - **2 Differents way for your crontab** with Shell or php (recommended). 

### #4 Crontab to fill Database.

> #### For php (SQL insert)
>           */5 * * * *       php -f /yourpath.../config/dayz2json_parser_sql.php  &>/dev/null
>           

 tips change  __&>/dev/null__ to __2>&1__ to know what is going on, maybe spam your mail log.


Check your time zone here. https://www.php.net/manual/en/timezones.others.php and adapt in dayz2json_parser_sql.php.


## Et Voilà ! 
ENJOY :)


### TODO

     - Need to finish SQL part for stat USER NAME ;)

     - Admin section with usefull info from your log server.
 



### Library used:

>
>  [PHP-Source-Query](https://github.com/xPaw/PHP-Source-Query) -     PHP library to query servers that implement Steam query protocol (also known as Source Engine Query protocol) 
>  
>  [Morris](https://morrisjs.github.io/morris.js/)              -     PHP library to generate graph.
 
 

### sample:

>   [example live page](https://dayz.echosystem.fr/git-DayZ-server-stat/)

![https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/asset/Screenshot_2021-02.png](https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/asset/Screenshot_2021-02.png)
# Author : Erreur32

![https://dayz.echosystem.fr](https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/img/DayZStats.png)

Website: [dayz.echosystem.fr](https://dayz.echosystem.fr)

