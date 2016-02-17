<?php
// load framework files
require_once("./libraries/api.php");
// connect to local server, authenticate and spawn an object for the virtual server on port 9987
$ts3_VirtualServer = TeamSpeak3::factory("serverquery://$user:$pass@$host:10011/?server_port=$dev");
// query clientlist from virtual server and filter by platform
// $arr_ClientList = $ts3_VirtualServer->clientList();
// // walk through list of clients
// foreach($arr_ClientList as $ts3_Client)
// {
//   // echo '<pre>'; var_dump($ts3_Client); echo '</pre>';
//   // echo '<br /><br />';
//   echo $ts3_Client["client_nickname"] . "<br />";
//   echo $ts3_Client["client_unique_identifier"] . "<br />";
//   echo $ts3_Client["client_idle_time"] . "<br />";
//   echo $ts3_Client["client_servergroups"] . "<br />";
//   echo '<br />';
//   echo '<br />';
// }
// echo '<pre>'; var_dump($ts3_VirtualServer); echo '</pre>';

// foreach($ts3_VirtualServer as $server) {
// 	echo $server['virtualserver_status'] . '<br />';
// 	echo $server['virtualserver_port'] . '<br />';
// }