<?php
session_start();
$dbusername = "root";
$dbpassword = "";
$dbname = "website";
$host = "127.0.0.1";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

?>
