<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); // Display all types of error

set_time_limit ( 4 );      // Max execution time is set to 4 seconds


// Load auto loader
require_once(__DIR__ . '/src/GameQ/Autoloader.php');
// Define the protocols path
$protocols_path = __DIR__ . "/src/GameQ/Protocols/";


$GameQ = new \GameQ\GameQ();
$GameQ->addServer([
    'type'    => 'dayz',
    'host'    => '82.64.214.194:3222',
    'options' => [
        'query_port' => 27022,
    ],
]);


//    'type'    => 'dayz',
//    'host'    => '82.64.214.194:2303',
//    'options' => [
//        'query_port' => 27023,
//    ],
//]);

// Define the servers you wish you query
//$GameQ = new \GameQ\GameQ(); // or //$GameQ = \GameQ\GameQ::factory();

$GameQ->setOption('timeout', 3); // 3 seconds
$results = $GameQ->process();

//print_r($results);
 //echo "<h2>// var dump </h2>  ";
  //var_dump(json_decode($readjson, true));
//echo "<h2> // echo </h2>  ";
//   echo  $readjson <br> ";
  //$data1 = json_decode("$readjson", true);
//echo "<h2>//Print data1</h2>" ;
  //print_r($data1);
echo "<hr>";


//$data = json_decode($readjson);
$data = json_decode($GameQ);
// class
$name = $data->{'name'};
$map = $data->{'map'};
$password = $data->{'password'};
$game = $data->{'raw'}->{'game'};
$secure = $data->{'raw'}->{'secure'};
$numplayers = $data->{'raw'}->{'numplayers'};
$version = $data->{'raw'}->{'version'};
$tags = $data->{'raw'}->{'tags'};

//$dedicated = $data->{'raw'}->{'rules'}->{'dedicated'};
//$island = $data->{'raw'}->{'rules'}->{'island'};


$connect = $data->{'connect'};
$ping = $data->{'ping'};
$time = "$tags[38]$tags[39]:$tags[41]$tags[42]";
$battleye =  substr($tags,0,8);
$hive = substr($tags,18,8);
$players = $data->{'players'};

//if(empty($players)) 
//    $players = "0";
//if (empty($players)) { "0"; }
//$playersuser = substr($players,0,8);
//$players = $data->{'array_filter($players)'};
//$player = $data->{'players'};

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Dayz ToX Server: <?php echo"${name}"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <style type="text/css">
        * {
            font-size: 10pt;
            font-family: Verdana, sans-serif;
        }
        h1 {
            font-size: 12pt;
        }
        table {
            border: 1px solid #000;
            background-color: #DDD;
            border-spacing: 1px 1px;
        }
        table thead {
            font-weight: bold;
            background-color: #CCC;
        }
        table tr.uneven td {
            background-color: #FFF;
        }
        table td {
            padding: 5px 8px;
        }
        table tbody {
            background-color: #F9F9F9;
        }
    </style>
</head>
<body>

<br><br>
<table>
    <thead>
    <tr>
        <td><?php print_r($results); ?></td>
    </tr>
</thead>
</table>
<br>
<table>
<thead>
    <tr>
        <td>
        </td>
        <td>Server Name</td><td> IP server</td> <td> Ping </td><td>  Time </td> <td>  Player Info</td> <td>  Joueurs</td><td>  Version</td> <td> Battleye</td>
    </tr>
</thead>
        <tr>
        <td>
        </td>
        <td><?php print_r($name); ?></td>
        <td><?php print_r($connect); ?></td><td><?php print_r($ping); ?></td><td><?php print_r($time); ?></td>
	<td><?php echo "☠ " . count($players);?></td>
	<td><?php print_r($numplayers); ?></td><td><?php print_r($version); ?></td>     
	<td><?php print_r($battleye); ?>  </td>
   </tr>
</table>

<br><br>


<table>
<thead>
    <tr>
        <td>  </td> <td>Players Info <?php    if(count($players) == 0)   {   echo " (0 joueurs) ";   }  else  {   echo " ☠ Joueurs ONLINE ☠ " ;   }  ?></td><td style="text-align: center;">Debug</td>
    </tr>
</thead>
    <tr>
       <td>Name</td>
    <td><?php 
   if(count($players) == 0)
   {
  echo "...(En attente de survivants) ";
   }  else  {
	 //   print_r(str_split("$players",1));
	//       print_r("$players",1);
	$uplayer = array(print_r($players));
//	       print_r($uplayer);
}


//print_r($players)[0];
//     echo print_r($players) . " = " . $numplayers;

     echo "</td><td><b>print_r</b> ";print_r($players);

?>
 </td>
    </tr>
</table>

<?php
echo "<hr>"; 
echo "<br><u>Resultat</u><br>";
echo "<br><b>Server Name</b>:<i> ${name} </i>\n";echo "<br>";
echo "<b>Map</b>: ${map} <br>";
echo "<b>Game</b>: ${game}<br>";
echo "<b>IP</b>: ${connect}<br>";
echo "Secure: ${secure}<br>";
echo "<b>Version</b>: ${version}<br>";
//echo "<b>Island</b>: ${island}<br>";
//echo "<b>dedicated</b>: ${dedicated}<br>";
echo "<b>Ping</b>: ${ping}<br>";
echo "<b>Time</b>:  $time <br>";
echo "<b>Nombre Joueurs</b>: ${numplayers}<br>";
echo "<b>Players</b>: "; if(count($players) == 1) {echo "il y a des joueurs"; } else {echo "0 player" ;} 
echo "<br>";
echo "<b>Tags:</b> ($tags)"; //printf("[%0.45s]<br>",$tags); //print_r($tags);
echo "<br><b>hive</b>: ${hive}<br>";
echo "<b>Battleye</b>: ${battleye}"; 
echo "<hr>";
?>


<!--
    if(empty( $arr )) {...}  //checks if there are any elements in the array
    if($arr) {...}   //checks if there are any elements in the array
    if(array_shift( $arr )) {...} //Check the presence of the first element
    if($arr[0]) {...}  //Check the first index
-->
</body>
</html>