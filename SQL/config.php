<?php


// Need to  Edit this  


	$ipserv   = "82.64.214.194" ; // IP server game
	$servport = "3222" ; // Game Server Port
	$modport  = "3232" ; // Mod port omega (+10)
	$queryport= "27022" ; // Queryport
/*
                $ipserv   = "103.58.149.102" ; // IP server game
                $portserv = "2302" ; // Game Server Port
		$modport  = "2312" ; // Mod port omega (+10)
		$queryport= "27016" ; // Queryport 
*/
	$title    = "DayZ Stat SERVER Clan | by TOX" ; // Web title page
	$descript = "Your Clan/server desciption";  // Your clan/server description 
	$logoteam = "logoteam.png";
	$imagemap = "chernarus.jpg";

	


	// set the default timezone to use. Available since PHP 5.1
	//   https://www.php.net/manual/en/timezones.others.php
	//date_default_timezone_set('Etc/GMT-1');
	//$date = date('Y-m-d H:i:s');

//
// Don't touch below
//

        $urlserv = $ipserv.":".$servport ;
        $json    = file_get_contents("http://".$ipserv.":".$modport."/"); // get info from server

	$modnum  = json_decode($json);


/*
//	if (!$json) {
//echo "The variable is not empty";
     //   $objhigher = json_decode($json);  //converts to an object
//        $objlower  = $objhigher[0];       // if the json response its multidimensional this lowers it
      //  $objlower  = json_decode($json);  //converts to an array of objects
//	} else {
//	 $mods      = "";
//	}
*/

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
          /*        print_r($Info);        */

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

// REGEX de la mort.

// time server
$regtimsev  = "/[0-9]{1,2}[:][0-9]{1,2}/";
$result     =  preg_grep($regtimsev, explode(",", $InfoGT));
 foreach ($result as $key => $val) { $timeserver = $val; }

// speedtime dayz
$regtimeacc = "/etm[0-9]{1,2}[.][0-9]{1}/";
$result     =  preg_grep($regtimeacc, explode(",", $InfoGT));
 foreach ($result as $key => $val) { $timespeed = trim($val,"entm.0"); }

// speedtime night
$regtimeacn = "/entm[0-9]{1,2}[.][0-9]{1}/";
$result     =  preg_grep($regtimeacn, explode(",", $InfoGT));
 foreach ($result as $key => $val) { $timespeedn = trim($val,"entm.0"); }

// HIVE
$reghive   = '/[^,]...(Hive)/';
$result    =  preg_grep($reghive, explode(",", $InfoGT));
 foreach ($result as $key => $val) { $hive = $val; }

// battleye
$regbattle = "/(battleye)/";
$result    =  preg_grep($regbattle, explode(",", $InfoGT));
 foreach ($result as $key => $val) { $battleye  = $val; }

// mod 
$regmod = "/(mod)/";
$result =  preg_grep($regmod, explode(",", $InfoGT));
 foreach ($result as $key => $val) { $mods = $val; }


?>

