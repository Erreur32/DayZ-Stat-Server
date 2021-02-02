<?php	

ini_set('display_errors', 'on');
error_reporting(E_ALL); // Display all types of error

require_once("config.inc.php");
require_once("GameQ/Autoloader.php");

function secondsToString($seconds) {
	$hours = floor($seconds / 3600);
	$mins = floor($seconds / 60 % 60);
	$secs = floor($seconds % 60);

	return $hours.":".$mins.":".$secs;
}

if (isset($_POST['query-servers']) && $_POST['query-servers'] == true)
{
	// Call the class, and add your servers.
	$gq = \GameQ\GameQ::factory();
	$gq->addServers($servers);

	// You can optionally specify some settings
	$gq->setOption('timeout', 2); //in seconds

	// Send requests, and parse the data
	$results = $gq->process();

       echo "<div class='div-table1'>\n";
        //iterate through each server

        foreach ($results as $key => $server)
        {
                //the server is online and running
                if ($server['gq_online'])
                {
                        //use var_dump for testing
                        //http://php.net/var_dump
//                      var_dump($server);


echo "<div class='players' title='Show Player Listing'><div class='like-link'><font size=4'><span class='label label-primary'>Players sur le serveur ToX  (  <span style='color:red;'><b> " . $server['gq_numplayers'] . "</b></span> ) </span></font></div></div><br>\n";

 if ($server['gq_numplayers'] == 0) //if there are players
			{
                          echo "<div class='panel panel-default'>";
			  echo "<div class='panel-heading'>";
		          echo "<div class='panel-title name'><h1>";
//			  echo  date("H:i:s"). "<br></h1></div></div>";

		 echo "<br>";
	         echo "<table class='10' style='border: 0px solid grey;'>";
                 echo "<tr><td><strong> " .$server['gq_numplayers']. "</strong> Joueur(s) &nbsp;&nbsp;&nbsp; ☠ &nbsp; </td><td> Temps de jeu des joueurs connectés</td></tr>\n";
                                foreach ($server['players'] as $player)
                                  {
                                 echo "<tr>\n";
                                 echo "<td><span class='label label-default' style='text-shadow: black 1px 1px 2px;'> survivant ".$player['gq_name']." </span></td> \n";
                                 echo "<td><span class='label label-default' style='text-shadow: black 1px 1px 2px;'>".secondsToString($player['gq_time'])." </span></td> \n";
                                 echo " </tr>\n";
	                          }
        	           echo "</table><br>";
                           echo "</div><br>";
		//	    include('./query-servers-live.php'); 
	}

   } else {
   echo "<div class='div-table-row'>";
   echo "<center><h1><span class='label label-danger'> SERVER " .$key. " is down.</span></h1></center>";
   echo "</div>";
      exit();
       }
      }

//   exit();
}

echo "</div>";

//exit();

?>

