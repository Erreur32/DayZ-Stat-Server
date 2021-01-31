<?php
        $servdb = "";
        $userdb = "";
        $pdb    = "";
        $dbname = "";

   $con = new mysqli($servdb, $userdb, $pdb, $dbname);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    else
    {
        //echo ("Connect Successfully");
    }
//    $query = "SELECT date, numplayers FROM StatServer"; // select column
//    $aresult = $con->query($query);

?>
