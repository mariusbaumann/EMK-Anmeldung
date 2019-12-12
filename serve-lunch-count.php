<?php

/*
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}*/
 
//Abfrage der Nutzer ID vom Login
//$userid = $_SESSION['userid'];
 
//echo "Hallo User: ".$userid;

require_once('config.php');

$query = $conn->query("SELECT * FROM contact_form_info");
$myArray = array();
$lunchCount = 0;
if ($result = $query) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //print_r($row['lunch']);
        if ($row['lunch'] == 1) {
            $lunchCount++;
        } 
    }
    //echo $lunchCount;
    if ($lunchCount > 440 ){
        echo 0;
    }
    else{
        echo 1;
    }
    //echo json_encode($myArray);
}

?>