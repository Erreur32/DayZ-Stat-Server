#!/bin/bash

PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/home/dayz/database:/home/dayz/Dayz:/root/bin
#
#  Script Bash json to sql for Dayz Server Stat
#  Version : 0.1

##remise a zero  ID :
#  ALTER TABLE StatServer AUTO_INCREMENT=0
#  DELETE FROM `StatServer`;
#  TRUNCATE TABLE StatServer
#
# mod info: vanilla, namalsk
varMod="namalsk2"

TABLE2=""
# Game Port IP  mod
IpGame=""
PortGame=""
QueryGame=""

#######
# (will change in future update)
pathBin="/home/dayz/bin"
pathDBe="/home/dayz/DataBase/${varMod}"

#   NEED to SET
# SQL
DB_USER=""
DB_PASSWD=""
DB_NAME=""


datesql=$(date +'%F %T')
date=$(date +'%F %T')
CHECKstatserver="/tmp/CHECKstatserver_${varMod}.json"
statserver="/home/dayz/DataBase/${varMod}/statserver_${varMod}.json"
gameqjson="/home/dayz/DataBase/${varMod}/gameqjson_${varMod}.json"

#DEBUG:
# ls ${statserver}
########################


if [ -d /home/dayz/DataBase/${varMod} ]
then
    echo " ✅ Directory /home/dayz/DataBase/${varMod}  exist!"
else
    mkdir -p /home/dayz/DataBase/${varMod}
    echo " ✅ Directory /home/dayz/DataBase/${varMod} CREATED  ✅"
fi


insert_mysql_down() {
numplayers="0"
players="0"
ping="0"
mysql --user=$DB_USER --password=$DB_PASSWD --database=$DB_NAME << EOF
 SET NAMES utf8;
 insert into $TABLE2 (\`date\`,\`name\`,\`game\`,\`map\`,\`version\`,\`requiredVersion\`,\`numplayers\`,\`players\`,\`maxplayers\`,\`ping\`,\`timeserver\`,\`hive\`,\`battleye\`,\`connect\`,\`secure\`) VALUES ("$datesql","OFFLINE","$game","$map","$version","$requiredVersion","$numplayers","$players","$maxplayers","$ping","$timeserver","$hive","$battleye","$connect","$secure");

EOF
}

#nmapGame=`nmap  82.64.214.194 -p $PortGame | grep filtered`
#[  -z "$nmapvar" ] && echo "Empty: Yes" || echo "Empty: No"
#if [  -z "$nmapGame" ]

nmapGame=`/usr/local/bin/gamedig --type dayz $IpGame:$QueryGame  > ${CHECKstatserver}`
catCHECKstatserver=`cat ${CHECKstatserver}`
if [[ "$catCHECKstatserver" ==  *error* ]]
then
       echo -e " ✅ Game is Down  | port  $PortGame closed! ⛔  "
       insert_mysql_down && echo -e " ✅ Mysql Updated " || echo -e "\n !!!!!!!!!!!!!  Huston ,  MYSQL issue ⛔"
#     echo -e "\n Mysql updated"
exit 1
else
echo -e " ✅ Game is UP | port  $PortGame OPEN ✅ !\n"
cp ${CHECKstatserver} ${statserver}

#curl -s  https://dayz.echosystem.fr/server/responsibleTab/json.php > ${gameqjson}
#cp ${gameqjson} /home/dayz/Dayz/server/
#/usr/local/bin/gamedig --type dayz $IpGame:$QueryGame > ${statserver}


if [ ! -r "$statserver" ]; then
    echo " ⛔Error:"${statserver}" doesn't exits"
    exit 1
#else
#echo -e "$statserver exist"
fi

cp ${statserver}  /home/dayz/Dayz/server/


print_info() {
echo -e "$name $map $password $game ($numplayers) $version $maxplayers $ping $connect $secure $requiredVersion $island [$players] $mod $hive $battleye $timeserver $speedtime $speedtimenight $timeLeft $secure" > $pathDBe/Info-all.txt
echo -e "- Statserver Expansion: ${date}" >  $pathDBe/Info-date.txt
echo "Name: $name" > $pathDBe/Info-name.txt
echo "Game: $game" > $pathDBe/Info-game.txt
echo "Numplayer: $numplayers" > $pathDBe/Info-numplayers.txt
echo "Version: $version" > $pathDBe/Info-version.txt
echo "Connect: $connect" > $pathDBe/Info-connect.txt
echo "Timeserver: $timeserver" > $pathDBe/Info-timeserver.txt
echo "Maxplayer: $maxplayers" > $pathDBe/Info-maxplayers.txt
echo "Password: $password" > $pathDBe/Info-password.txt
echo "RequireVersion: $requiredVersion" > $pathDBe/Info-requiredVersion.txt
echo "Secure: $secure" > $pathDBe/Info-secure.txt
echo "Island: $island" > $pathDBe/Info-island.txt
echo "Ping: $ping" > $pathDBe/Info-ping.txt
echo "Map: $map" > $pathDBe/Info-map.txt

echo "Hive: $hive"  > $pathDBe/Info-hive.txt
echo "Battleye: $battleye" > $pathDBe/Info-battleye.txt

echo "Players: $players" > $pathDBe/Info-players.txt
#echo "Players: $gq_players" >> $pathDBe/Info-players.txt
}

varcat=$(cat $statserver)

name=$(echo $varcat | jq -r  '.name')
map=$(echo $varcat | jq -r '.map')
password=$(echo $varcat | jq -r '.password')
game=$(echo $varcat | jq -r '.raw.game')
numplayers=$(echo $varcat | jq -r '.raw.numplayers')
version=$(echo $varcat | jq -r '.raw.version')
maxplayers=$(echo $varcat | jq -r '.maxplayers')
ping=$(echo $varcat | jq -r '.ping')
connect=$(echo $varcat | jq -r '.connect')
secure=$(echo $varcat | jq -r '.raw.secure')
requiredVersion=$(echo $varcat | jq -r '.raw.rules.requiredVersion')
island=$(echo $varcat | jq -r '.raw.rules.island')
#players=$(echo $varcat | jq -r '.players[]')
#players="on"
#gq_players=$(echo `cat ${gameqjson}` | jq -r 'gq_players')
mod=$(echo $varcat | jq -r '.raw.tags[63:66]')
hive=$(echo $varcat | jq -r '.raw.tags[18:26]')
battleye=$(echo $varcat | jq -r '.raw.tags[:8]')
timeserver=$(echo $varcat | jq -r '.raw.tags[67:]')
speedtime=$(echo $varcat | jq -r '.raw.tags[41:42]')
speedtimenight=$(echo $varcat | jq -r '.raw.tags[54:55]')
timeLeft=$(echo $varcat | jq -r '.raw.rules.timeLeft')
secure=$(echo $varcat | jq -r '.raw.secure')
serverstatus="UP"
#timeserver="00:00"
###############
# check

print_info  2>&1
# print only error
cat $pathDBe/Info-* > $pathDBe/Info_$varMod.txt
# cat $pathDBe/Info_$varMod.txt

echo " [✔] Server UP =>> update mysql"
echo " Debug: $numplayers"

insert_mysql() {
mysql --user=$DB_USER --password=$DB_PASSWD --database=$DB_NAME << EOF
 SET NAMES utf8;
 insert into $TABLE2 (\`date\`,\`name\`,\`game\`,\`map\`,\`version\`,\`requiredVersion\`,\`numplayers\`,\`players\`,\`maxplayers\`,\`ping\`,\`timeserver\`,\`hive\`,\`battleye\`,\`connect\`,\`secure\`) VALUES ("$datesql","$name","$game","$map","$version","$requiredVersion","$numplayers","$players","$maxplayers","$ping","$timeserver","$hive","$battleye","$connect","$secure");

EOF
}

insert_mysql && echo -e "\n ✅ Updated Mysql  " || echo -e "\n   Huston ,up  MYSQL  issue"

fi
exit 1
