<?php

//ini_set('display_errors', 'on');

include('./consql.php');
include_once('config.php');

// MYSQL table
// $StatServer = "StatServer_20"; // set in consql.php

   $queryP = "SELECT date, players FROM ".$StatServer."   ORDER BY id DESC  LIMIT 80";
   $arrPlay = $con->query($queryP);
?>

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <script src="morris/morris.js"></script>
    <link rel="stylesheet" href="morris/morris.css">
</head>

<body>
<h3>☠  Players on <small style='color: grey;'>  <?php echo  $Info['HostName']; ?></small></h3>

<div id="graph32"></div>

<script>
var day_data = [<?php while($row = mysqli_fetch_assoc($arrPlay)){  echo "{'Date': '".$row["date"]."', 'Players': ".$row["players"]."}, "; }  ?> ];

Morris.Line({
  element: 'graph32',
 data: day_data,
  xkey: 'Date',
  ykeys: ['Players'],
  labels: ['Players on <?php echo $namemap ;?>'],
yLabelFormat: function(y){return y != Math.round(y)?'':y;},
grid: false,
//ymin: 0,
//parseTime: false,
hideHover:'auto'
});
</script>

</body>

