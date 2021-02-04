<?php

include_once('./config.php');
include_once('./consql.php');
    //   Don't touch below (or you know what you do)
 
        $urlserv = $ipserv.":".$portserv ;

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
date_default_timezone_set('UTC+1');

$date = date('Y-m-d H:i:s');

$insql = "INSERT INTO $table (date,name,game,map,version,players,maxplayers,ping,timeserver,hive,battleye,connect,secure) VALUES  ('$date','$HostName', '$Game', '$Map', '$Version',  '$Players', '$MaxPlayers', '0', '2:20', 'hive', 'battleye', '$urlserv', '$Secure')";

if (mysqli_query($con, $insql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $insql . "<br>" . mysqli_error($con);
}

mysqli_close($con);




?>
