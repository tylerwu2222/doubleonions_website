<?php
$servername = "localhost";
$dbUsername = "doubleonions";
$dbPassword = "22onionking22";
$dbName = "double_onions";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);
if(!$conn){
	die("Connection failed: " . mysql_connect_error());
}
?>