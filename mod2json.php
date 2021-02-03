<?php
//$page = $_SERVER['PHP_SELF'];
//$sec = "300";

ini_set('display_errors', 'on');
//error_reporting(E_ALL); // Display all types of error

// include_once('./consql.php');
   include_once('./config.php');

   //   Don't touch below (or you know what you do)
   //   need to fix if mod = 0

                $json = file_get_contents("http://".$ipserv.":".$modport."/");
                $objhigher=json_decode($json); //converts to an object
                $objlower = $objhigher[0];     // if the json response its multidimensional this lowers it
                $objlower=json_decode($json);  //converts to an array of objects
		print_r($objlower);

echo "<br><hr>";
var_dump($json);
echo "<br><hr>";
$myJSON = json_decode(utf8_encode($json), true);
var_dump($myJSON);


echo "<br>";


?>
