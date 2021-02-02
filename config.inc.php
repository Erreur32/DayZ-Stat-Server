<?php

// change this to reflect the servers that you want to query
// https://github.com/Austinb/GameQ/wiki/Examples-v3#different-client-and-query-ports
$servers = [
	[
		'id' => 'server1',
		'type' => 'dayz',
		'host' => '82.64.214.194:3201',
		'options' => [
			'query_port' => 27022
		]
	]


//	,[
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
