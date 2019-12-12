<?php 
require_once("config.php");
if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['your_email'])&& $_POST['your_email'] !='') && (isset($_POST['g-recaptcha-response'])))
{
 require_once("contact_mail.php");

$yourName = $conn->real_escape_string($_POST['your_name']);
$yourEmail = $conn->real_escape_string($_POST['your_email']);
$firstname = $conn->real_escape_string($_POST['firstname']);
$city = $conn->real_escape_string($_POST['city']);
$church = $conn->real_escape_string($_POST['church']);
$lunch = $conn->real_escape_string($_POST['lunch']);
$detectedLang = $conn->real_escape_string($_POST['detectedLang']);
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
    $sql="INSERT INTO contact_form_info (name, email, firstname, city, church, lunch, lang) VALUES ('".$yourName."','".$yourEmail."', '".$firstname."', '".$city."', '".$church."', '".$lunch."', '".$detectedLang."')";
    if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
        if($detectedLang == "de-CH" || $detectedLang == "de" || $detectedLang == "de-DE" ){
                echo "Danke! Ihre Anmeldung wurde Ihnen per e-Mail bestätigt.";
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