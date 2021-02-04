<?php


ini_set('display_errors', 1);
error_reporting(E_ALL); // Display all types of error
set_time_limit ( 4 );      // Max execution time is set to 4 seconds

// Read JSON file
$readjson = file_get_contents('./server.json');
$myJSON = json_decode(utf8_encode($readjson), true);

/*
echo "<h2>var dump: </h2><br>"; var_dump($myJSON);
echo "<hr>";

echo "<h2>JSON ARRAY:</h2><br> ";
print_r($myJSON);

echo "<h2>var_dump(json_decode: </h2><br>"; 

*/

var_dump(json_decode($readjson));

//$sname = $readjson->{'server1'};
//echo $sname;

/*
echo "<hr>";
$InfoGT = $Info['GameTags'];
echo $InfoGT;      

echo "<br>";
$sname = $Info['HostName'] ;
$Players = $Info['Players']  ;
$MaxPlayers = $Info['MaxPlayers'] ;
$Secure = $Info['Secure'] ;
$Map = $Info['Map'] ;
$Os = $Info['Os'] ;
$Version = $Info['Version'] ;
$GamePort = $Info['GamePort'] ;

$game = "Dayz"  ;
$ping = "666" ;

echo "Hostname: "     .$sname   .   "<br>";
echo "Players: "      .$Players    . "<br>";
echo "MaxPlayers: "   .$MaxPlayers . "<br>";
echo "Secure: "       .$Secure     . "<br>";
echo "Map: "          .$Map        . "<br>";
echo "Os: "           .$Os         . "<br>";
echo "Version: "      .$Version    . "<br>";
echo "Port: "         .$GamePort   . "<br><hr>";
*/

//preg_grep('/keywords \z map/', explode("\n", $readjson));


?>

