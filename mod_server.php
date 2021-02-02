<?php
//ini_set("allow_url_fopen", 1);


 include_once('./config.php');


$json      = file_get_contents('http://<?php echo $ipserv.":".queryport; ?>');
$objhigher = json_decode($json); //converts to an object
$objlower  = $objhigher[0]; // if the json response its multidimensional this lowers it
$objlower  = json_decode($json); //converts to an array of objects ?>


<center>

  <p class="before-list">
  <span style="padding: 5px 0px 2px 20px;"><?php echo count($objlower); ?> MODS </span>
  <span style="padding: 5px 0px 2px 20px;"> IP: <span style="color: orange;"><?php echo $urlserv; ?></span> </span>
  <br>
  <span style="padding: 5px 0px 2px 20px;">  <em><i>(clic to join) </i> </em>
  <a style="text-decoration:none;" href='steam://connect/<?php echo $urlserv; ?>/'><span class='label label-success'> </span></a></span>
  </p>


 <div class="mod-list">

<center>
<table class="table_ table-bordered_ table-striped_" style="">

  <thead>
     <tr>
       <th style="text-align:left;"><span class='label label-info'>MOD Name</span></th>
       <th><span class='label label-info'>steamWorkshopId</span></th>
       <th><span class='label label-info'>Taille  	</span></th>
     </tr>
  </thead>

   <tbody>
    <tr><td><br></td><td></td><br></tr>
<?php 
      //$objlower=json_decode($json); //converts to an array of objects
    foreach( $objlower as $item ) { ?>
    <tr>
    <td><?php echo $item->name; ?></td>
    <td><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=<?php echo $item->steamWorkshopId?>" data-type="Link"><?php echo $item->steamWorkshopId; ?> </td>
    <td> 
<div id="loading">
<?php

$getcontents = "https://steamcommunity.com/sharedfiles/filedetails/?id=" . "$item->steamWorkshopId";
$data_scrapped = file_get_contents($getcontents);

$thestart = explode('<div class="detailsStatsContainerRight">', $data_scrapped);
$theend = explode('</div>',$thestart[1]);
echo $theend[0];

?>


</div>
</td>
   </tr>
     <?php } ?>


   </tbody>

</table>
</center>


</div>
<br>
</center>

<style>




hr {
 border: 5px solid green;
  border-radius: 5px;
  width: 40%;
}

a,a:visited {
  color: green;
  text-decoration: none;
}
a:hover {
  color: orange;
  text-decoration: none;
}


.from-steam {
 padding: 10px 30px 3px 0;
    color: #449EBD;
}
.from-local {
    color: gray;
}

th, td {
        font: 100%/1.3 Roboto, Segoe UI, Tahoma, Arial, Helvetica, sans-serif;
}

td {
    padding: 3px 30px 3px 0;
}

h1 {
    padding: 20px 20px 0 20px;
    color: white;
    font-weight: 200;
    font-family: segoe ui;
    font-size: 3em;
    margin: 0;
}

em {
    font-variant: italic;
    color:silver;
}



