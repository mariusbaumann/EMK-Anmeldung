<?php 

require_once("config.php");
if((isset($_POST['firstname'])&& $_POST['firstname'] !='') && (isset($_POST['eMail'])&& $_POST['eMail'] !='') && (isset($_POST['g-recaptcha-response'])))
{
 //require_once("../contact_mail.php");

$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$district = $conn->real_escape_string($_POST['district']);
$role = $conn->real_escape_string($_POST['role']);
$eMail = $conn->real_escape_string($_POST['eMail']);
$dateprioThun = $conn->real_escape_string($_POST['dateprioThun']);
$dateprioWintherthur = $conn->real_escape_string($_POST['dateprioWintherthur']);
$dateprioZofingen = $conn->real_escape_string($_POST['dateprioZofingen']);
$datealtThun = $conn->real_escape_string($_POST['datealtThun']);
$datealtWinterthur = $conn->real_escape_string($_POST['datealtWinterthur']);
$datealtZofingen = $conn->real_escape_string($_POST['datealtZofingen']);
$vegi = $conn->real_escape_string($_POST['vegi']);
$allergies = $conn->real_escape_string($_POST['allergies']);
$allergies = $conn->real_escape_string($_POST['detectedLang']);
$captcha=$_POST['g-recaptcha-response'];

$secretKey = "6Lc0hLQUAAAAAMYxzJAo_ODi07k11oT83C8iCi5t";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                $verfiedcapcha= true;
        } else {
                $verfiedcapcha= false;
        }

if($verfiedcapcha){
    $sql="INSERT INTO contact_form_information_events (firstname, lastname, district, role, eMail, dateprioThun, dateprioWintherthur, dateprioZofingen, datealtThun, datealtWinterthur, datealtZofingen, vegi, allergies) VALUES ('".$firstname."','".$lastname."', '".$district."', '".$role."', '".$eMail."', '".$dateprioThun."', '".$dateprioWintherthur."', '".$dateprioZofingen."', '".$datealtThun."', '".$datealtWinterthur."', '".$datealtZofingen."', '".$vegi."', , '".$allergies."')";
    if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
        if($detectedLang == "de-CH" || $detectedLang == "de" || $detectedLang == "de-DE" ){
                echo "Danke! Ihre Anmeldung wurde ihnen per e-Mail bestätigt.";
        }elseif ($detectedLang == "fr-CH" || $detectedLang == "fr" || $detectedLang == "fr-DE"){
                echo "Merci. Merci. Merci. Votre inscription a été confirmée par e-mail.";
        }
    }}
    else {
    echo "Captcha nicht gültig";
    }
}
else
{
echo "Fehler: Es wurden nicht alle Felder ausgefüllt!";
}
?>