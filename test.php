<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL); // Display all types of error

$re = '/[0-9]{1,2}[:][0-9]{1,2}/m';
$str = 'battleye,external,privHive,shard,lqs0,etm2.000000,entm5.500000,mod,23:17';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
//var_dump($matches);

echo '<pre>'; print_r($matches); echo '</pre>';

echo "<br>";

$encode = json_encode($matches);
echo $encode;
echo "<br>";

//echo $matches[0];
$output = implode(",", array($str));
echo $output;
echo "<br>";
$output1 = implode(",", array($matches));
echo $output1;
echo "<br>";

?>
