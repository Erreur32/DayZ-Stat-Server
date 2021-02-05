<?php

ini_set('display_errors', 1);
error_reporting(E_ALL); // Display all types of error

//set_time_limit ( 4 );      // Max execution time is set to 4 seconds

// Read JSON file
//$readjson = file_get_contents('./server.json');
//$myJSON = json_decode(utf8_encode($readjson), true);


include_once('../config.php');
//include_once('consql.php');

//var_dump(json_decode($readjson));
    $urlserv = $ipserv.":".$servport ;

    // librarie SQ - info serv game
        require  '../SQ_/bootstrap.php';
        use xPaw\SourceQuery\SourceQuery;

        define( '../SQ_SERVER_ADDR', "${ipserv}" );     // IP server
        define( '../SQ_SERVER_PORT', "${queryport}" );  // YOUR QUERY PORT
        define( '../SQ_TIMEOUT',     3 );
        define( '../SQ_ENGINE',      SourceQuery::SOURCE );

        $Timer = MicroTime( true );
        $Query = new SourceQuery( );
        $Info    = Array( );
        $Players = Array( );

        try
        {
                $Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

                $Info    = $Query->GetInfo( );
                $Players = $Query->GetPlayers( );
        }
        catch( Exception $e )
        {
                $Exception = $e;
        }

        $Query->Disconnect( );

        $Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );

       $InfoGT = $Info['GameTags'];

print_r($Info);

echo "<hr><h1> RESULTS </h1>";

$sname = $Info['HostName'] ;
$Players = $Info['Players']  ;
$MaxPlayers = $Info['MaxPlayers'] ;
$Secure = $Info['Secure'] ;
$Map = $Info['Map'] ;
$Os = $Info['Os'] ;
$Version = $Info['Version'] ;
$GamePort = $Info['GamePort'] ;

echo "Hostname: "     .$sname      . "<br>";
echo "Players: "      .$Players    . "<br>";
echo "MaxPlayers: "   .$MaxPlayers . "<br>";
echo "Secure: "       .$Secure     . "<br>";
echo "Map: "          .$Map        . "<br>";
echo "Os: "           .$Os         . "<br>";
echo "Version: "      .$Version    . "<br>";
echo "Port: "         .$GamePort   . "<br><hr>";

echo "<h1>Payes ta regex</h1>";
$result = explode(",", $InfoGT);
print_r($result);
echo "<pre>".$InfoGT."</pre>";
//echo "<table><tr>";
echo "<hr>";

?>

<h2> example</h2>
<pre>

$regtimeacc  = "/etm([0-9]{1,2}[.][0-9]{1})/";<br>
$result =  preg_grep($regtimeacc, explode(",", $InfoGT));<br>
foreach ($result as $key => $val) {<br>
   echo $val;<br>
}<br>
</pre>

<?php
echo "<hr>";
echo "<pre>  '/(battleye)/' </pre> ";
$regtimsev = "/(battleye)/";
$result =  preg_grep($regtimsev, explode(",", $InfoGT));
//print_r($result);
//echo $result[0];
foreach ($result as $key => $val) {
   echo $val;
}
echo "<br><hr>";

echo "<pre> '/[^,]...(Hive)/'</pre>";
$re = '/[^,]...(Hive)/';
$result =  preg_grep($re,explode(",", $InfoGT));
foreach ($result as $key => $val) {
   echo $val;
}
echo "<br><hr>";

echo "<pre>  '/[0-9]{1,2}[:][0-9]{1,2}/' </pre>";
$regtimsev = "/[0-9]{1,2}[:][0-9]{1,2}/";
$result =  preg_grep($regtimsev, explode(",", $InfoGT));
foreach ($result as $key => $val) {
   echo $val;
}
echo "<br><hr>";

echo "<pre>  '/(mod)/' </pre>";
$regmod = "/(mod)/";
$result =  preg_grep($regmod, explode(",", $InfoGT));
foreach ($result as $key => $val) {
   echo $val;
}

echo "<br><hr>";

echo "<pre> '/etm([0-9]{1,2}[.][0-9]{1})/' </pre>";
$regtimeacc  = "/etm([0-9]{1,2}[.][0-9]{1})/";
$result =  preg_grep($regtimeacc, explode(",", $InfoGT));
//print_r($result);
//echo $result[5];
foreach ($result as $key => $val) {
   echo $val;
}
echo "<br><hr>";
//echo "<pre> '/entm[0-9]{1,2}[.][0-9]{1}/' </pre>";
$regtimeacn  = "/entm[0-9][.][0-9]{1}/";
echo "<pre> .$regtimeacn.</pre>";
$result =  preg_grep($regtimeacn, explode(",", $InfoGT));
//print_r($result);
//echo $result[6];
foreach ($result as $key => $val) {
   echo $val;
}

echo "<br><hr>";

echo "<h1>Payes ton explode</h1>";
$retest = explode(",", $InfoGT);
echo $retest[0] . "|".$retest[2]. "|". $retest[3]. "|". $retest[4]. "|". $retest[8]. "|". $retest[5]. "|". $retest[6]; 

/*
$regtimsev = "[0-9]{1,2}[:][0-9]{1,2}";
$reghive = "[^,]...(Hive)";
$regtimeacc  = "[^,etm][0-9][.][0-9]{1}";
//$regtimeacn  = "[^,entm][0-9][.][0-9]{1}";
$regtimeacn  = "([0-9][.][0-9]{1})";
//echo preg_grep('/[0-9]{1,2}[:][0-9]{1,2}/', explode("\n", $InfoGT));

echo preg_grep('/$regex/', $InfoGT);

$fl_array = preg_grep("/[^,entm][0-9][.][0-9]{1}/", $InfoGT);
echo $fl_array;
*/


echo "<hr>";

$re = '/[0-9]{1,2}[:][0-9]{1,2}/m';
//$str = 'battleye,external,privHive,shard,lqs0,etm2.000000,entm5.500000,mod,23:17';

preg_match_all($re, $InfoGT, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
//var_dump($matches);

echo '<pre>'; print_r($matches); echo '</pre>';

echo "<br>";

$encode = json_encode($matches);
echo $encode;
echo "<br>";

//echo $matches[0];
$output = implode(",", array($InfoGT));
echo $output;


?>

