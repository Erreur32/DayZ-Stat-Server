<?php

// change this to reflect the servers that you want to query
// https://github.com/Austinb/GameQ/wiki/Examples-v3#different-client-and-query-ports
$servers = [
	[
		'id' => 'DAYZ',
		'type' => 'dayz',
		'host' => '103.58.149.102:2302',
		'options' => [
			'query_port' => 27016
		]
	]
	//[
		//'id' => 'Arma 2 OA Test',
		//'type' => 'armedassault2oa',
		//'host' => '107.191.44.98:2302'
	//],
//	[
// 		'id' => 'DayZ Test',
// 		'type' => 'dayz',
// 		'host' => '51.91.61.15:7217',
// 		 'options' => [
//                      'query_port' => 7217
//                 ]
// 	]
];


//TODO: currently offline, looking into alternatives
//change this to toggle querying geographic information based on the IP address
define("GEOIP", "false");


/* phparma2serverstatus version (you don't need to change this) */
define("VERSION", "0.32");

?>
