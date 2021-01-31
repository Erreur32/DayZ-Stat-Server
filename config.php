<?php
	        ini_set("allow_url_fopen", 1);

     // Edit this ->

                $ipserv   = "103.58.149.102" ; // IP server game
                $portserv = "2302" ; // Game Server Port
		$modport  = "2312" ; // Mod port omega (+10)
		$queryport= "27016" ; // Queryport 
		$title    = "MY stat SERVER " ;   // Web title page
		$descript = "Your crew desciption" ;
                $namemap  = "MAP CHERNARUS"; // you can put what you want.

     //   Don't touch below

                $urlserv = $ipserv.":".$portserv ;
                $json = file_get_contents('http://'.$ipserv.':'.$modport.'/');
                $objhigher=json_decode($json); //converts to an object
                $objlower = $objhigher[0]; // if the json response its multidimensional this lowers it
                $objlower=json_decode($json); //converts to an array of objects




	// librarie SQ - info serv game
        require  'SQ_/bootstrap.php';
        use xPaw\SourceQuery\SourceQuery;

        define( 'SQ_SERVER_ADDR', "${ipserv}" );   // IP server
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

