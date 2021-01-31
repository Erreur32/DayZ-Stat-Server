<?php
        $servdb = "";
        $userdb = "";
        $pdb    = "";
        $dbname = "";

   $con = new mysqli($servdb, $userdb, $pdb, $dbname);

    if ($con->connect_error) {
    //       die("Connection failed: " . $con->connect_error);
	echo ("Connection failed with sql / need to set MYSQL");
    }
    else
    {
      // echo ("Connect Successfully");
    }


?>
