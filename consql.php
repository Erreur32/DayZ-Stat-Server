<?php

//# Change with your credential here.
//  Create Database first ;)


        $servdb = "localhost";
        $userdb = "user";
        $pdb    = "pass";
        $dbname = "database";
	$table  = "StatServer_1"; 

      $StatServer = $table;
      $con = new mysqli($servdb, $userdb, $pdb, $dbname);

    if ($con->connect_error) {
	// Display the alert box  
        //	echo '<script>alert("...Connection failed with MYSQL")</script>'; 
		echo "<center><font color=red> ...Connection failed with MYSQL </font></center>";        
        //	die("Connection failed: " . $con->connect_error);
    }
    else
    {
      // echo "Connect Successfully";
    }


?>
