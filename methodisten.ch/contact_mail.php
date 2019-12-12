<?php

$empfaenger  = $_POST["your_email"]  ; // beachte das Komma
$lang  = $_POST["detectedLang"]  ; // beachte das Komma
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
<body>
    <p>Chère Madame/Monsieur ' . $_POST["your_name"] . '</p>

    <p>Merci de votre intérêt pour l\'événement "Bible, Eglise - Homosexualité".
    Nous avons reçu votre inscription et nous continuerons à la traiter.</p>
    
    <p><b>Veuillez noter que : 
    Ce n\'est pas encore la confirmation finale de l\'inscription. Vous le recevrez avec un e-mail séparé (les personnes qui n\'appartiennent pas à l\'EMK, après le 16 octobre).</b></p>
    
    <p>Sincèrement vôtre</p>
    <p>Le comité organisateur</p>
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
<body>
    <p>Sehr geehrte/r Frau/Herr ' . $_POST["your_name"] . '</p>

    <p>Vielen Dank für Ihr Interesse an der Veranstaltung «Bibel, Kirche - Homosexualität».
    Wir haben Ihre Anmeldung erhalten und werden Sie weiter bearbeiten.</p>
    
    <p><b>Bitte beachten Sie: 
    Dies ist noch nicht die definitive Anmeldebestätigung. Diese erhalten Sie mit einer separaten E-Mail (Personen, die nicht zur EMK gehören, nach dem 16. Oktober)</b></p>
    
    <p>Mit freundlichen Grüssen</p>
    <p>Das Organisations-Komitee</p>
</body>
</html>
';
}

// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
$header[] = 'MIME-Version: 1.0';
$header[] = 'Content-type: text/html; charset=utf-8';

// zusätzliche Header
$header[] = 'To: ' . $_POST["firstname"] . '' . $_POST["your_name"] . '<' . $_POST["your_email"] . '>';
$header[] = 'From: EMK-Schweiz <noreply@emk-schweiz.ch>';

// verschicke die E-Mail
// mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header));



//$toEmail = $_POST["your_email"] ;
//$mailHeaders = "From: noreply@emk-schweiz.ch <noreply@emk-schweiz.ch>\r\n MIME-Version: 1.0\r\n Content-type: text/html; charset=iso-8859-1";
if(mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header))) {
echo "";
} else {
echo"E-Mail konnte nicht gesendet werden.";
}
?>