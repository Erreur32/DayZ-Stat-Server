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

# need to create the directory if dosen't exist an error will appear.
pathd="/home/dayz/git-DayZ-server-stat"
# create directory
varMod="server1"

# Game Port IP  mod
IpGame="103.58.149.102"
PortGame="2302"
QueryGame="27016"


TABLE="StatServer_1"
DB_USER="fpinth_status"
DB_PASSWD="Nick053896077"
DB_NAME="fpinth_status"
DB_SERV="183.90.168.189"

CHECKstatserver="/tmp/CHECKstatserver_${varMod}.json"
statserver="${pathd}/${varMod}/statserver.json"
gameqjson="${pathd}/${varMod}/gameqjson.json"

####### don't touch below #####
# (will change in future update)
# pathBin="/dayz/bin"
pathDBe="${pathd}/${varMod}"

# NEED to SET date
# SQL
datesql=$(date +'%F %T')
date=$(date +'%F %T')


#DEBUG:
# ls ${statserver}
########################

if [ -d ${pathd}/${varMod} ]
then
    echo " ✅ Directory ${pathd}/${varMod}  ok"
else
    mkdir -p ${pathd}/${varMod}
    echo " ✅ Directory ${pathd}/${varMod} CREATED  ✅"
fi


if [ ! -r "$statserver" ]; then
    echo " ⛔Error:"${statserver}" doesn't exits"
#    exit 1
fi



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


##########################  not use 

insert_mysql_down() {
numplayers="0"
players="0"
ping="0"
mysql --host=$DB_SERV --user=$DB_USER --password=$DB_PASSWD --database=$DB_NAME << EOF
 SET NAMES utf8;
 insert into $TABLE (\`date\`,\`name\`,\`game\`,\`map\`,\`version\`,\`requiredVersion\`,\`numplayers\`,\`players\`,\`maxplayers\`,\`ping\`,\`timeserver\`,\`hive\`,\`battleye\`,\`connect\`,\`secure\`) VALUES ("$datesql","OFFLINE","$game","$map","$version","$requiredVersion","$numplayers","$players","$maxplayers","$ping","$timeserver","$hive","$battleye","$connect","$secure");

EOF
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
timeserver=$(echo $varcat | jq -r '.raw.tags[68:]')
speedtime=$(echo $varcat | jq -r '.raw.tags[41:42]')
speedtimenight=$(echo $varcat | jq -r '.raw.tags[54:55]')
timeLeft=$(echo $varcat | jq -r '.raw.rules.timeLeft')
secure=$(echo $varcat | jq -r '.raw.secure')
serverstatus="UP"
#timeserver="00:00"
###############
# check

echo " [✔] Server UP =>> update mysql"
echo " Debug: $numplayers"

insert_mysql() {
mysql --host=$DB_SERV --user=$DB_USER --password=$DB_PASSWD --database=$DB_NAME << EOF
 SET NAMES utf8;
 insert into $TABLE (\`date\`,\`name\`,\`game\`,\`map\`,\`version\`,\`requiredVersion\`,\`numplayers\`,\`players\`,\`maxplayers\`,\`ping\`,\`timeserver\`,\`hive\`,\`battleye\`,\`connect\`,\`secure\`) VALUES ("$datesql","$name","$game","$map","$version","$requiredVersion","$numplayers","$players","$maxplayers","$ping","$timeserver","$hive","$battleye","$connect","$secure");

EOF
}

insert_mysql && echo -e "\n ✅ Updated Mysql  " || echo -e "\n   Huston ,up  MYSQL  issue"

fi

echo -e "\nCheck Date SQL format:"
echo $date

exit 1
