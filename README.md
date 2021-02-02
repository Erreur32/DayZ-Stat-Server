## Hi Survivor ☠ !!

![https://dayz.echosystem.fr](https://git.echosystem.fr/repo-avatars/191)



#   Simple live Stat for Dayz Standalone server ☠.
Inspired by Omega namager for the template.


## 🔥 STILL in Devlopment ...

### Required

 -  Set the *config.php* file and fill your `ip` , `port` , `query` and `omega server port mod`.

    >         $ipserv   = "6.6.6.6"; // IP server game
    >         $portserv = "2302" ;   // Game Server Port
    >         $modport  = "2312" ;   // Mod port omega (+10)
    >         $queryport= "27016";   // Queryport
 

### OPTIONAL:

 - Omega manager (to check mod only) 

 -  mysql database (to store status server for graph) 
 >     Schema database is not ready yet.

 - put *statserverjson.sh* in crontab like this  for mysql insert & creation of json file:
 >     */5 * * * *       /bin/sh /your/path/statserver_json.sh



### Library used:

  [PHP-Source-Query](https://github.com/xPaw/PHP-Source-Query) -     PHP library to query servers that implement Steam query protocol (also known as Source Engine Query protocol) 

 
 

### sample:

 [example live page](https://dayz.echosystem.fr/server/Namalsk2)
 
![https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/assets/Screenshot_2021-02-01.png](https://git.echosystem.fr/Erreur32/DayZ-Stat-Server/raw/master/assets/Screenshot_2021-02-01.png)



## 🔥 STILL in Devlopment ...


-----
Website: [dayz.echosystem.fr](https://dayz.echosystem.fr)

Author : Erreur32
