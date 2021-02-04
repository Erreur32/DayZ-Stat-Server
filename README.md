## Hi Dayz Survivor !!


## 🔥 STILL in Devlopment ... not ready yet

![https://dayz.echosystem.fr](https://git.echosystem.fr/repo-avatars/191)

☠  TEAM DayZ 🆃🅾🆇 https://dayz.echosystem.fr ☠ 


#   Simple live Stat for Dayz Standalone server ☠.
   Inspired by Omega namager template.
   >  *The [OmegaManager](https://cftools.de/) is a local application to run your DayZ servers. It automatically deploys, runs, watches, restarts and updates your server.*



### Configuration Required

 -  Set the *config.php* file and fill your `ip` , `port` , `query` and `omega server port mod`.

    >         $ipserv   = "6.6.6.6"; // IP server game
    >         $portserv = "2302" ;   // Game Server Port
    >         $modport  = "2312" ;   // Mod port omega (+10)
    >         $queryport= "27016";   // Queryport
 

### OPTIONAL:

 - Omega manager (to check list mod only, but higly suggered !) 

 - mysql database (to store status server for graph) 
     Create dayzstat database first + user privilege.
 >     Checkout Schema database in SQL/table.sql

 - **2 Differents way for your crontab** with Shell or php. Put *statserver_json.sh* in your crontab for mysql insert & creation of json file. 
 
     > ## For Shell (SQL insert + json)
     >       */5 * * * *       /usr/sbin/sh /pathto/SQL/statserver_json.sh  2>&1
     OR

     > ## For php (SQL insert)
     >       */5 * * * *       /usr/local/bin/php -f /your/path/SQL/dayz2json_parser_sql.php 2>&1


     Check your time zone here.
     https://www.php.net/manual/en/timezones.others.php

### TODO

     - make ~~Regex to catch~~ time serv to auto detect it, and it's fucking hard :p)

     - Need to finish SQL part for stat USER

     - Admin section with usefull info from your log server.

 



### Library used:

  [PHP-Source-Query](https://github.com/xPaw/PHP-Source-Query) -     PHP library to query servers that implement Steam query protocol (also known as Source Engine Query protocol) 

 
 

### sample:

 [example live page](https://dayz.echosystem.fr/git-DayZ-server-stat/)
 
![https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/assets/Screenshot_2021-02-01.png](https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/assets/Screenshot_2021-02-01.png)



## 🔥 STILL in Devlopment ... not ready for production.


-----
Website: [dayz.echosystem.fr](https://dayz.echosystem.fr)

Author : Erreur32
