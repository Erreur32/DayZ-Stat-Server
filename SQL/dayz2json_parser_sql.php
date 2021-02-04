<?php

include_once('./config.php');
include_once('./consql.php');

    //   Don't touch below (or you know what you do)

        $urlserv = $ipserv.":".$servport ;

    // librarie SQ - info serv game
        require  'SQ_/bootstrap.php';
        use xPaw\SourceQuery\SourceQuery;

        define( 'SQ_SERVER_ADDR', "${ipserv}" );     // IP server
        define( 'SQ_SERVER_PORT', "${queryport}" );  // YOUR QUERY PORT
        define( 'SQ_TIMEOUT',     3 );
        define( 'SQ_ENGINE',      SourceQuery::SOURCE );

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

// DEBUG
/*
print_r($Info);
echo "<br><hr>";

echo "InfoGT: "       .$InfoGT     . "<br>";
echo "ModDesc: "      .$Info['ModDesc']    . "<br>";
echo "Hostname: "     .$Info['HostName']   . "<br>";
echo "Players: "      .$Info['Players']    . "<br>";
echo "MaxPlayers: "   .$Info['MaxPlayers'] . "<br>";
echo "Secure: "       .$Info['Secure']     . "<br>";
echo "Map: "          .$Info['Map']        . "<br>";
echo "Os: "           .$Info['Os']         . "<br>";
echo "Version: "      .$Info['Version']    . "<br>";
echo "Port: "         .$Info['GamePort']       . "<br>";
echo "GameID: "         .$Info['GameID']       . "<br>";
echo "<hr>test SQL";
*/


// Variables
$HostName = $Info['HostName']   ;
$Game     = $Info['ModDesc'] ;
$Version  = $Info['Version'] ;
$Players  = $Info['Players'];
$MaxPlayers = $Info['MaxPlayers'] ;
$Secure   = $Info['Secure'] ;
$Map      = $Info['Map']; 
$Os       = $Info['Os'] ;
$GamePort = $Info['GamePort'] ;
$GameID   = $Info['GameID'] ;


// set the default timezone to use. Available since PHP 5.1
//   https://www.php.net/manual/en/timezones.others.php
date_default_timezone_set('Etc/GMT-1');
//date_default_timezone_set('Europe/Paris');

$date = date('Y-m-d H:i:s');

// SQL insert Query.
$insql = "INSERT INTO $table (date,name,players,maxplayers,map,game,version,timeserver,timespeed,timespeedn,battleye,hive,connect,secure,ping) VALUES ('$date','$HostName','$Players','$MaxPlayers','$Map','$Game','$Version','2:20','2','4','battleye','hive','$urlserv','$Secure','666')";

// Check if errors with SQL query
if (mysqli_query($con, $insql)) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $insql . "<br>" . mysqli_error($con);
}

mysqli_close($con);




?>
