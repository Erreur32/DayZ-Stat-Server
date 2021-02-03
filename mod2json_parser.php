<?php

   include_once('./config.php');

   //   Don't touch below (or you know what you do)
   //   need to fix if mod = 0

$modjson = file_get_contents("http://".$ipserv.":".$modport."/");

$myJSON = json_decode(utf8_encode($json), true);

//var dump
//print_r($results);

$array = json_decode($modjson, true);
foreach($array as $values) {
   echo $values['name']." ";
   echo $values['steamWorkshopId']."<br>";
}


?>
