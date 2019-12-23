<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
//$userid = $_SESSION['userid'];
 
//echo "Hallo User: ".$userid;

require_once('../config.php');

$query = $conn->query("SELECT * FROM `settings`");
$myArray = array();
if ($result = $query) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    print_r($myArray);
}




?>