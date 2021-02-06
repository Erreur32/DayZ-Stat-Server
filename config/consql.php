<?php

//# Change with your credential here.
//  Create Database first ;)

// Edit this bloc for SQL

        $servdb = "localhost";
        $userdb = "dayz";
        $pdb    = "dayz32";
        $dbname = "dayzstat";
        $table  = "StatServer_5"; 
/*
        $servdb = "localhost";
        $userdb = "user";
        $pdb    = "pass";
        $dbname = "database";
        $table  = "StatServer_1";
*/

// Don't edit below !

      $StatServer = $table;
      $con = new mysqli($servdb, $userdb, $pdb, $dbname);

   if ($con->connect_error) {
	// Display the alert box  
        //	echo '<script>alert("...Connection failed with MYSQL")</script>'; 
		echo "<center><font color=red> ...Connection failed with MYSQL </font></center>";        
        //	die("Connection failed: " . $con->connect_error);
    }    else    {
      // echo "Connect Successfully";
    }


?>
