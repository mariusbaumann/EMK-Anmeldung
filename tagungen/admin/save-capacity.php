<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
//$userid = $_SESSION['userid'];
 
//echo "Hallo User: ".$userid;

require_once('../config.php');

$query = $conn->query("UPDATE `settings` SET `Value`='" . $_POST['maxCapThun'] . "' WHERE `Setting`='maxCapThun'" );
$query = $conn->query("UPDATE `settings` SET `Value`='" . $_POST['maxCapWinterthur'] . "' WHERE `Setting`='maxCapWinterthur'" );
$query = $conn->query("UPDATE `settings` SET `Value`='" . $_POST['maxCapZofingen'] . "' WHERE `Setting`='maxCapZofingen'" );





?>