#!/usr/bin/php
<?php
/*
 * JSON2SQL PHP script
 * Written by Hay Kranen < http://www.haykranen.nl > < hay at bykr dot org >
 * Make this executable
 * $ chmod u+x json2sql
 * Then invoke it from the command line like this
 * $ json2sql tablename myfile.json
 * The script will automatically write the resulting file as myfile.sql
 */

$date = date('Y-m-d H:i:s');

function quit($msg) {
    die($msg . "\n");
}

$table = $argv[1];
if (!$table) quit("No tablename given!");

$filename = $argv[2];
if (!file_exists($filename)) quit("File does not exist: $filename");

$file = file_get_contents($filename);
if (!$file) quit("File read error with $filanme");

//echo "Processing $filename... \n";

$data = json_decode($file, true);
$sql = "";
foreach($data as $obj) {
    $keys   = implode('`,`', array_map('addslashes', array_keys($obj)));
    $values = implode("','", array_map('addslashes', array_values($obj)));
    $sql .= "INSERT INTO `$table` (`$keys`, `Dates`) VALUES ('$values', '$date');\n";
}
// Create a filename based on the input file
$out = pathinfo($filename, PATHINFO_FILENAME) . ".sql";
if(!file_put_contents($out, $sql)) quit("Could not write contents to $out");

quit("Written SQL data to $out");


// php -f json2sql.php StatServer_5 server.json
