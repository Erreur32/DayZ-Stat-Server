<?php
ini_set('display_errors', 'on');
// include_once('./consql.php');
// MAKE json

header("Content-Type: application/json; charset=UTF-8; pageEncoding=UTF-8");

include_once('./config.php');
$urlserv = $ipserv.":".$portserv ;

//echo $InfoGT;
//echo "<br><hr>";
//$results = json_decode($_GET["x"], false);
//error_reporting(E_ALL); // Display all types of error

require_once('GameQ/Autoloader.php');
$GameQ = new \GameQ\GameQ();
$GameQ->addServer([
    'id'      => 'server1',
    'type'    => 'dayz',
    'host'    => $urlserv,
    'options' => [
        'query_port' => $queryport,
    ],
]);
$GameQ->setOption('timeout', 5); // seconds
$GameQ->addFilter('normalize');
$results = $GameQ->process();

$server_gq = json_encode($results, JSON_INVALID_UTF8_IGNORE | JSON_INVALID_UTF8_SUBSTITUTE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE  | JSON_THROW_ON_ERROR);
echo $server_gq;


?>
