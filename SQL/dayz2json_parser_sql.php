<?php

include_once('./config.php');
include_once('./consql.php');

 // set the default timezone to use. Available since PHP 5.1
 //   https://www.php.net/manual/en/timezones.others.php
   date_default_timezone_set('Etc/GMT-1');
 //date_default_timezone_set('Europe/Paris');
 $date = date('Y-m-d H:i:s');

// if server down update sql
if (empty($Info['HostName']))  {

$HostName  ="OFFLINE";
$PLayers   ="0";
$ping      ="0";
$timeserver="0";
$timespeed ="0";
$timespeedn="0";
$hive      ="0";
$battleye  ="0";
$mods      ="0";
$timespeed ="0";
$timespeedn="0";

$insql = "INSERT INTO $table (date,name,players,maxplayers,map,game,version,timeserver,timespeed,timespeedn,mods,battleye,hive,connect,secure,ping) VALUES ('$date','$HostName','$PLayers','$MaxPlayers','$Map','$Game','$Version','$timeserver','$timespeed','$timespeedn','$mods','$battleye','$hive','$urlserv','$Secure','$ping')";

 if (mysqli_query($con, $insql)) {
    // echo "New record created successfully";
   } else {
     echo "Error: " . $insql . "<br>" . mysqli_error($con);
   }

mysqli_close($con);
//exit ;
}

// REGEX TIME
$regtimsev  = "/[0-9]{1,2}[:][0-9]{1,2}/";
$result     =  preg_grep($regtimsev, explode(",", $InfoGT));
$timeserver =  $result[8];

$regtimeacd = "/([0-9][.][0-9]{1})/";
$result     =  preg_grep($regtimeacd, explode(",", $InfoGT));
$timespeed  =  $result[5];

$regtimeacn = "/([0-9][.][0-9]{1})/";
$result     =  preg_grep($regtimeacn, explode(",", $InfoGT));
$timespeedn =  $result[6];

// HIVE
$reghive   = '/[^,]...(Hive)/';
$result    =  preg_grep($reghive, explode(",", $InfoGT));
$hive      =  $result[2];

// battleye check
$regbattle = "/(battleye)/";
$result    =  preg_grep($regbattle, explode(",", $InfoGT));
$battleye  =  $result[0];

// DEBUG
$timespeed="2";
$timespeedn="4";

// SQL insert Query.
$insql = "INSERT INTO $table (date,name,players,maxplayers,map,game,version,timeserver,timespeed,timespeedn,mods,battleye,hive,connect,secure,ping) VALUES ('$date','$HostName','$PLayers','$MaxPlayers','$Map','$Game','$Version','$timeserver','$timespeed','$timespeedn','$mods','$battleye','$hive','$urlserv','$Secure','$ping')";

// Check if errors with SQL query
if (mysqli_query($con, $insql)) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $insql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


// end

?>
