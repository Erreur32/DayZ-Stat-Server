<?php

// ini_set("allow_url_fopen", 1);

// Need to  Edit this  


        $ipserv   = "103.58.149.102" ; // IP server game
        $servport = "2302"  ; // Game Server Port
        $modport  = "2312"  ; // Mod port omega (+10)
        $queryport= "27016" ; // Queryport

/*
   $ipserv   = "82.64.214.194" ; // IP server game
   $servport = "3201" ; // Game Server Port
   $modport  = "3211" ; // Mod port omega (+10)
   $queryport= "27001" ; // Queryport
*/

	$title    = "DayZ Stat SERVER Clan | by TOX" ; // Web title page
	$descript = "Your Clan/server desciption";  // Your clan/server description 
	//	$namemap  = "chernarusplus"; // choose between: chernarusplus / livonia / namalsk/
	$logoteam = "logoteam.png";
	$imagemap = "chernarus.jpg";

/*	
	// set the default timezone to use. Available since PHP 5.1
	//   https://www.php.net/manual/en/timezones.others.php
	date_default_timezone_set('Etc/GMT-1');
	//date_default_timezone_set('Europe/Paris');
	//$date = date('Y-m-d H:i:s');
*/
	// Don't touch below

  //   Don't touch below (or you know what you do)
        $urlserv = $ipserv.":".$servport ;
      // need to fix if mod = 0
        $json      = file_get_contents("http://".$ipserv.":".$modport."/"); // get info from server
	if (!$json) {
        //echo "The variable is not empty";
        $objhigher = json_decode($json);  //converts to an object
        $objlower  = $objhigher[0];       // if the json response its multidimensional this lowers it
        $objlower  = json_decode($json);  //converts to an array of objects
	} else {
	 $mods      = "";
	}
      // librarie SQ - info serv game
        require  'SQ_/bootstrap.php';
        use xPaw\SourceQuery\SourceQuery;
        define( 'SQ_SERVER_ADDR', "${ipserv}" );     // IP server
        define( 'SQ_SERVER_PORT', "${queryport}" );  // YOUR QUERY PORT
        define( 'SQ_TIMEOUT',     3 );
        define( 'SQ_ENGINE',      SourceQuery::SOURCE );

        $Timer   = MicroTime( true );
        $Query   = new SourceQuery( );
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
        $HostName   = $Info['HostName']   ;
        $Game       = $Info['ModDesc'] ;
        $Version    = $Info['Version'] ;
        $PLayers    = $Info['Players'];
        $MaxPlayers = $Info['MaxPlayers'] ;
        $Secure     = $Info['Secure'] ;
        $Map        = $Info['Map'];
        $Os         = $Info['Os'] ;
        $GamePort   = $Info['GamePort'] ;
        $GameID     = $Info['GameID'] ;
        $ping       = "666";
//      $mods       = "0";

?>

