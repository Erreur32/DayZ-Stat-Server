<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); // Display all types of error
//set_time_limit ( 4 );      // Max execution time is set to 4 seconds

include_once('config.php');

// print json server
echo "<pre>";
print_r($Info);
echo "</pre>";

//  test  REGEX
echo "<h1>RESULAT parser JSON  </h1><code>";
echo "Hostname: "     .$HostName   . "<br>";
echo "Players: "      .$PLayers    . "<br>";
echo "MaxPlayers: "   .$MaxPlayers . "<br>";
echo "Secure: "       .$Secure     . "<br>";
echo "Map: "          .$Map        . "<br>";
echo "Os: "           .$Os         . "<br>";
echo "Version: "      .$Version    . "<br>";
echo "Port: "         .$GamePort   . "</code><br><hr>";

echo "<h1>Payes ta regex</h1>";
$result = explode(",", $InfoGT);
print_r($result);
echo "<pre><code>".$InfoGT."</code></pre>";
//echo "<table><tr>";
echo "<hr>";

?>

<h2> example code</h2>
<pre><code>
$regtimeacc  = "/etm([0-9]{1,2}[.][0-9]{1})/";
$result =  preg_grep($regtimeacc, explode(",", $InfoGT));
foreach ($result as $key => $val) {
   echo $val;
}
</code></pre>

<?php
echo "<hr>";

$regbattle = "/(battleye)/";
echo "<pre><code>$regbattle </code></pre>";
$result =  preg_grep($regbattle, explode(",", $InfoGT));
foreach ($result as $key => $val) {   echo $val; }
echo "<br><hr>";

$rehive = '/[^,]...(Hive)/';
echo "<pre><code>$rehive </code></pre>";
$result =  preg_grep($rehive,explode(",", $InfoGT));
foreach ($result as $key => $val) {   echo $val; }
echo "<br><hr>";

$regtimsev = "/[0-9]{1,2}[:][0-9]{1,2}/";
echo "<pre><code>$regtimsev </code></pre>";
$result =  preg_grep($regtimsev, explode(",", $InfoGT));
foreach ($result as $key => $val) {   echo $val; }
echo "<br><hr>";

$regmod = "/(mod)/";
echo "<pre><code>$regmod </code></pre>";
$result =  preg_grep($regmod, explode(",", $InfoGT));
foreach ($result as $key => $val) {   echo $val; }

echo "<br><hr>";

$regtimeacc  = "/etm[0-9]{1,2}[.][0-9]{1}/";
echo "<pre><code>$regtimeacc </code></pre>";
$result =  preg_grep($regtimeacc, explode(",", $InfoGT));
foreach ($result as $key => $val) {
	echo trim($val,"entm.0");
//   $regrep = str_replace("etm", "", $val);
//    echo str_replace("00000", "", $regrep);
}
echo "<br><hr>";

$regtimeacn  = "/entm[0-9]{1,2}[.][0-9]{1}/";
echo "<pre><code> $regtimeacn</code></pre> ";
$result =  preg_grep($regtimeacn, explode(",", $InfoGT));
foreach ($result as $key => $val) {
  echo trim($val,"entm.0");
//   $regrepn = str_replace("entm", "", $val);
//    echo str_replace("00000", "", $regrepn);
}

echo "<br><hr>";

/*
$re = '/(?!etm)[0-9]{1,2}[.][0-9]{1}/';
$str = 'battleye,external,privHive,shard,lqs0,etm12.000000,entm2.000000,mod,01:43';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
var_dump($matches); // Print the entire match result
*/


echo "<h1>Payes ton explode</h1>";
$retest = explode(",", $InfoGT);
echo '<pre><code>';
echo $retest[0] . "|".$retest[2]. "|". $retest[3]. "|". $retest[4]. "|". $retest[8]. "|". $retest[5]. "|". $retest[6]; 
echo "</code></pre><hr>";

echo "<h1>Payes tes tests</h1>";
$re = '/[0-9]{1,2}[:][0-9]{1,2}/m';
preg_match_all($re, $InfoGT, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
//var_dump($matches);
echo '<pre><code>'; print_r($matches); echo '</code></pre>';
echo "<br>";

$encode = json_encode($matches);
echo $encode;
echo "<br>";

//echo $matches[0];
$output = implode(",", array($InfoGT));
echo $output;


?>

<style>
pre { width:min-content; }
/*pre:hover, pre:focus {  width: min-content;}*/
h1 { color: #590;}

code {
 display: block;
 padding: 12px;
 color: #F90;
 background:black;
}
</style>

