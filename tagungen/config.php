<?php

$host = "emkyoung.mysql.db.internal";
$userName = "emkyoung_bartel";
$password = "byYsaSGf";
$dbName = "emkyoung_anmeldungbartel";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
