<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
//$userid = $_SESSION['userid'];
 
//echo "Hallo User: ".$userid;

require_once('config.php');

$query = $conn->query("SELECT * FROM `contact_form_info` WHERE `id` =". $_POST['id']);
$myArray = array();
if ($result = $query) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    //print_r($myArray);
}

//echo $myArray[0]['email'];
//echo $myArray[0]['lang'];
//echo $myArray[0]['firstname'];
//echo $myArray[0]['name'];

//echo $_POST['id'];


$empfaenger  =  $myArray[0]['email']  ; // beachte das Komma
$lang  = $myArray[0]['lang']  ; // beachte das Komma
// Betreff
//$betreff = 'EMK-Schweiz: Bestätigung zur Anmeldung';

// Nachricht
if($lang == 'fr' || $lang == 'fr-CH' || $lang == 'fr-FR' ){
    
    $betreff = 'EEM-Suisse: Confirmation d\'inscription';
    $nachricht = '
<html>
<head>
    <title>confirmation de réservation</title>
</head>
<body style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">
    Bonjour ' . $myArray[0]['firstname'] . " " . $myArray[0]['name']  . ',


<p>Nous vous confirmons avec ces lignes, votre inscriptions pour la journée "Bible - Eglise - Homosexualité" du 30 nov. 2019</p>


<p>&nbsp;</p>
<p>Quelques informations :</p>
<p>Ouverture des portes à 9 h 30</p>
<p>La participation pour le repas de midi est de Fr. 10.-. Payable au guichet d\'accueil sur place.
<p>Parkings payants disponibles sur le lieu BERNEXPO</p>

<p>Nous nous réjouissons que vous participez à cette journée.</p>
<p>&nbsp;</p>
<p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Meilleures salutations,<o:p></o:p></span></p>
        <p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; "><o:p>&nbsp;</o:p></span></p>
        <p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Regina
            Schellenberg<o:p></o:p></span></p>
        <div>
          <p class="MsoNormal"><b><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;;">Sekretariat<o:p></o:p></span></b></p>
          <p class="MsoNormal"><b><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;;"><o:p>&nbsp;</o:p></span></b></p>
          <p class="MsoNormal"><b><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;;">Evangelisch-methodistische
                Kirche<o:p></o:p></span></b></p>
          <p class="MsoNormal"><i><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;;">Bereich
                GemeindeEntwicklung<o:p></o:p></span></i></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;;">Regina
              Schellenberg<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;;">Badenerstrasse
              69 </span><span style="font-size:10.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;; ">|</span><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">
              Postfach 1328<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">8021
              Zürich 1<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Schweiz<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Tel.:
              &#43;41 044 299 30 87<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; "><o:p>&nbsp;</o:p></span></p>

</body>
</html>
';

} else {
    $betreff = 'EMK-Schweiz: Bestätigung zur Anmeldung';
$nachricht = '
<html>
<head>
    <title>Anmeldungsbestätigung</title>
</head>
<body style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">
    <p>Guten Tag ' . $myArray[0]['firstname'] . " " . $myArray[0]['name']  . '</p>


 
<p>Vielen Dank für Ihre Anmeldung zur Tagung „Bibel – Kirche – Homosexualität“ am 30. November 2019, die wir Ihnen hiermit gerne bestätigen.<p>  

<p>&nbsp;</p>

<p>Hier noch ein paar kurze Informationen:</p>
<p>Die Türöffnung ist bereits um 9.30 Uhr, der Unkostenbeitrag für das Mittagessen beträgt CHF 10.- und wird am Anmeldeschalter eingezogen.</p>
<p>Gebührenpflichtige Parkplätze stehen auf dem Messegelände BERNEXPO zur Verfügung.</p>
<p>Wir freuen uns, dass Sie an diesem Anlass teilnehmen werden.</p>
 
<p>&nbsp;</p>
 
<p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Freundliche
            Grüsse,<o:p></o:p></span></p>
        <p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; "><o:p>&nbsp;</o:p></span></p>
        <p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Regina
            Schellenberg<o:p></o:p></span></p>
        <div>
          <p class="MsoNormal"><b><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Sekretariat<o:p></o:p></span></b></p>
          <p class="MsoNormal"><b><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; "><o:p>&nbsp;</o:p></span></b></p>
          <p class="MsoNormal"><b><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Evangelisch-methodistische
                Kirche<o:p></o:p></span></b></p>
          <p class="MsoNormal"><i><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Bereich
                GemeindeEntwicklung<o:p></o:p></span></i></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Regina
              Schellenberg<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Badenerstrasse
              69 </span><span style="font-size:10.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;; ">|</span><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">
              Postfach 1328<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">8021
              Zürich 1<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Schweiz<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; ">Tel.:
              &#43;41 044 299 30 87<o:p></o:p></span></p>
          <p class="MsoNormal"><span style="font-size:9.0pt;font-family:&quot;Verdana&quot;,&quot;sans-serif&quot;; "><o:p>&nbsp;</o:p></span></p>
</body>
</html>
';
}

// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
$header[] = 'MIME-Version: 1.0';
$header[] = 'Content-type: text/html; charset=utf-8';

// zusätzliche Header
$header[] = 'To: ' . $myArray[0]['firstname'] . '' . $myArray[0]['name'] . '<' . $myArray[0]['email'] . '>';
$header[] = 'From: Regina Schellenberg (Sekretariat) <regina.schellenberg@emk-schweiz.ch>';
$header[] = 'Cc: Regina Schellenberg (Sekretariat) <regina.schellenberg@emk-schweiz.ch>';
$header[] = 'Bcc: Marius Baumann <marius.baumann@emk-schweiz.ch>';

// verschicke die E-Mail
// mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header));



//$toEmail = $_POST["your_email"] ;
//$mailHeaders = "From: noreply@emk-schweiz.ch <noreply@emk-schweiz.ch>\r\n MIME-Version: 1.0\r\n Content-type: text/html; charset=iso-8859-1";
if(mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header))) {
echo "1";
$sql = "UPDATE `contact_form_info` SET `confirmationmail` = '1' WHERE `contact_form_info`.`id` =".$_POST['id'];
$result = $conn->query($sql);
} else {
echo "E-Mail konnte nicht gesendet werden.";
}

?>