<?php

include_once('./config.php');

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



echo $Info['Players']    ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;echo "<br>";
echo $Info['MaxPlayers'] ;




?>

