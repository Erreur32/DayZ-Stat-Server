<?php
//ini_set('display_errors', 'on');
// include_once('./consql.php');
// MAKE json

//header("Content-Type: application/json; charset=UTF-8; pageEncoding=UTF-8");
include_once('config.php');

/*
$out = array_values($Info);
$json2echo = json_encode($out, JSON_INVALID_UTF8_IGNORE | JSON_INVALID_UTF8_SUBSTITUTE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE  | JSON_THROW_ON_ERROR);
print_r($json2echo);
*/

//$json2echo = json_encode($Info, true);
//echo $json2echo ;


// print json server
echo "<pre><code>";
print_r($Info);
echo "</code></pre>";

//  test  REGEX
echo "<h1>Parser JSON  </h1><code1>";
echo "Hostname: <strong> "     .$HostName   . "</strong><br>";
echo "Players: <strong>"      .$PLayers    . "</strong><br>";
echo "MaxPlayers: <strong>"   .$MaxPlayers . "</strong><br>";
echo "Secure: <strong>"       .$Secure     . "</strong><br>";
echo "Map: <strong>"          .$Map        . "</strong><br>";
echo "Os: <strong>"           .$Os         . "</strong><br>";
echo "Version: <strong>"      .$Version    . "</strong><br>";
echo "Port: <strong>"         .$GamePort   . "</strong><br>";
echo "Time server: <strong>"  .$timeserver ."</strong><br>";
echo "Timespeed: <strong>"    .$timespeed  ."</strong><br>";
echo "Timespeed night: <strong>".$timespeedn ."</strong><br>";
echo "Battleye: <strong>"     .$battleye   ."</strong><br>";
echo "Hive: <strong>"         .$hive       ."</strong><br>";
echo "</code1>";

?>

<style>
pre { width:min-content; }
/*pre:hover, pre:focus {  width: min-content;}*/
h1 { color: #590;}
code { display: block; padding: 12px; color: #F90; background:black; }
</style>
