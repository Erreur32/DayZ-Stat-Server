<?php

ini_set('display_errors', 1);
//error_reporting(E_ALL); // Display all types of error
set_time_limit ( 4 );      // Max execution time is set to 4 seconds

// Read JSON file
$readjson = file_get_contents('./server.json');

$myJSON = json_decode(utf8_encode($readjson), true);

//echo $expansion_gq['gq_numplayers'];

echo "JSON ARRAY:<br> ";
print_r($myJSON);

echo "<hr>";
echo "RecursiveArrayIterator: <br>";
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($readjson, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}


echo "<hr>";
echo "var dump: <br>"; var_dump($readjson);
echo "<hr>";

echo "Parsing data by using PHP Object <br/>";
 $objhigher=json_decode($readjson); //converts to an object
 $objlower = $objhigher[0];         // if the json response its multidimensional this lowers it
 $objlower = json_decode($readjson);  //converts to an array of objects

echo $objlower->hostname;
echo $obj->gq_address;

//echo $myJSON['hostname'];
//echo $myJSON[2];




?>



