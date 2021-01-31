<?php
        $servdb = "";
        $userdb = "";
        $pdb    = "";
        $dbname = "";
	$table  = "StatServer_20"; 

     $StatServer = $table;

     $con = new mysqli($servdb, $userdb, $pdb, $dbname);

    if ($con->connect_error) {
 echo (" SQL not active <font color=orange> // Function not ready yet </font> ");
//	echo ("<font color=red> ...Connection failed  need to set MYSQL </font><br>");        
	//	die("Connection failed: " . $con->connect_error);
    }
    else
    {
      // echo ("Connect Successfully");
    }


?>
