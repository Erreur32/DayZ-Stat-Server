<?php

    ini_set("allow_url_fopen", 1);

     // Edit this  ->

        $ipserv   = "103.58.149.102" ; // IP server game
        $portserv = "2302"  ; // Game Server Port
	$modport  = "2312"  ; // Mod port omega (+10)
	$queryport= "27016" ; // Queryport 
/*
        $ipserv   = "82.64.214.194" ; // IP server game
        $portserv = "3222"  ; // Game Server Port
        $modport  = "3232"  ; // Mod port omega (+10)
        $queryport= "27022" ; // Queryport
*/
	$title    = "DayZ Stat SERVER Clan | by TOX" ; // Web title page
	$descript = "Your Clan/server desciption";  // Your clan/server description 
        $namemap  = "MAP CHERNARUS"; // you can put what you want.
	$logoteam = "logoteam.png";
	$imagemap = "chernarus.jpg";


    //   Don't touch below (or you know what you do)

       $urlserv = $ipserv.":".$portserv ;
	// need to fix if mod = 0 
                $json = file_get_contents("http://".$ipserv.":".$modport."/");
                $objhigher=json_decode($json); //converts to an object
                $objlower = $objhigher[0];     // if the json response its multidimensional this lowers it
                $objlower=json_decode($json);  //converts to an array of objects



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

?>

