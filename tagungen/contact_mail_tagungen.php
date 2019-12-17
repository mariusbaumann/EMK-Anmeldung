<?php

$empfaenger  = $_POST["eMail"]  ; // beachte das Komma

$lang = $_POST['detectedLang'];
// Betreff
$betreff = 'EMK-Schweiz: Bestätigung zur Anmeldung';

if ($lang == 'fr' || $lang == 'fr-CH' || $lang == 'fr-FR') {
    switch ($_POST['dateprio']) {
        case "Thun":
            $date = "Samedi, 11. Jan. 2020 in Zofingen";
        case "Winterthur":
            $date = "Samedi, 25. Jan. 2020 in Winterthur";
        case "Zofingen":
            $date = "Samedi, 25. Jan. 2020 in Thun";
    }
} else {
    switch ($_POST['dateprio']) {
        case "Thun":
            $date = "Samstag, 11. Jan. 2020 in Zofingen";
        case "Winterthur":
            $date = "Samstag, 25. Jan. 2020 in Winterthur";
        case "Zofingen":
            $date = "Samstag, 25. Jan. 2020 in Thun";
    }
}

$query = $conn->query("SELECT * FROM settings");

if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        if($row["Setting"] == "latestConfirmDate"){
            $endate =  $row["Value"];
        }
    }
} else {
    echo "0 results";
}

if (isset($_POST['datealtThun'])) {
    $datealtThun = $conn->real_escape_string($_POST['datealtThun']);
} else {
    $datealtThun = 0;
}
if (isset($_POST['datealtWinterthur'])) {
    $datealtWinterthur = $conn->real_escape_string($_POST['datealtWinterthur']);
} else {
    $datealtWinterthur = 0;
}
if (isset($_POST['datealtZofingen'])) {
    $datealtZofingen = $conn->real_escape_string($_POST['datealtZofingen']);
} else {
    $datealtZofingen = 0;
}

if ($datealtThun + $datealtWinterthur + $datealtZofingen == 0) {
    $display_fr = ""; 
    $display_de = "";
 } else {
    $display_fr = "Si l'événement est déjà complet à la date souhaitée, vous serez inscrite pour l'une de vos dates alternatives."; 
    $display_de = "Sollte die Veranstaltung an ihrem gewünschten Termin bereits ausgebucht sein, werden Sie auf einen ihrer alternativ angegebenen Termine umgebucht.";
 }
if ($lang == 'fr' || $lang == 'fr-CH' || $lang == 'fr-FR' ){
// Nachricht
$nachricht = '
<html>
<head>
    <title>Anmeldungsbestätigung</title>
</head>
<body>
    <p>Madame, Monsieur, ' . $_POST["lastname"] . '</p>

    <p>Merci de l\'intérêt que vous portez à la journée d\'information du <b>'. $date .'</b>
    Nous avons reçu votre inscription et nous continuerons à la traiter.</p>
    
    <p><b>
    Veuillez noter que ce mail n\'est pas encore la confirmation définitive de votre inscription. <br> 
    Vous la recevrez par mail séparé. ' . $display_fr .'  L\'inscription définitive sera confirmée jusqu\'au '. $endate .'</b></p>
    
    <p>Meilleures salutations</p>
    <p>Le comité d\'organisation</p>

</body>
</html>
';
} else {

$nachricht = '
<html>
<head>
    <title>Anmeldungsbestätigung</title>
</head>
<body>
    <p>Sehr geehrte/r Frau/Herr ' . $_POST["lastname"] . '</p>

    <p>Vielen Dank für Ihr Interesse an der Info-Veranstaltung am <b>'. $date .'</b>
    Wir haben Ihre Anmeldung erhalten und werden Sie weiter bearbeiten.</p>
    
    <p><b>Bitte beachten Sie: 
    Dies ist noch nicht die definitive Anmeldebestätigung. Diese erhalten Sie mit einer separaten E-Mail. <br> 
    '. $display_de .' Die definitive Anmeldung wird Ihnen bis '. $endate .' bestätigt</b></p>
    
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
$header[] = 'To: ' . $_POST["firstname"] . '' . $_POST["lastname"];
$header[] = 'From: EMK-Schweiz <noreply@emk-schweiz.ch>';

// verschicke die E-Mail
//mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header));



//$toEmail = $_POST["your_email"] ;
//$mailHeaders = "From: noreply@emk-schweiz.ch <noreply@emk-schweiz.ch>\r\n MIME-Version: 1.0\r\n Content-type: text/html; charset=iso-8859-1";
if(mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header))) {
echo "";
} else {
echo"E-Mail konnte nicht gesendet werden.";
}
?>