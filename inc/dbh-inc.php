<?php
$serverName = "";
$dbUsername = "root";
$dbPassword = "";
$dbName = "uon_orientation";

$conn = msql_connect($serverName, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
	die("Connection failed: " . mysql_connect_error());
}
?>