<?php

$protocol         = 'https'; // http or https
$server           = 'nx5186.your-storageshare.de'; // required
$baseurl          = "$protocol://$server/ocs/v1.php/cloud/users"; // leave as is
$groupbaseurl     = "$protocol://$server/ocs/v1.php/cloud/groups";
$adminName        = 'Form-Admin'; // required
$adminPass        = 'Othmar1992+2'; // required
$defaultGroup     = 'Zugang Beantragt'; // leave empty if you don't want to assign a group
$defaultPassword  = 'Wesley2018'; // empty string to auto-generate
$userName         = 'Frank';
$userPass         =  $defaultPassword;

function requestRights($selectedGroupItems, $userEmail) {
    $selectedGroupItems = explode(',', $selectedGroupItems);
    foreach($selectedGroupItems as $groupItem) {
        $admins = getGroupAdmins($groupItem);
        foreach($admins as $admin) {
            sendRequestMail($admin, $groupItem, $userEmail);
        }
    }
}

function generateHash($admin, $groupItem, $userEmail) {
    $send_time = time();
    $user = array($userEmail, $admin, $groupItem, $send_time );
    $message = implode('||', $user);
    $param = SA_Encryption::encrypt_to_url_param($message);
    return $param;
}

function sendRequestMail($admin, $groupItem, $userEmail) {
    $email = getEMailFromUserID($admin);
    $hash = generateHash($admin, $groupItem, $userEmail);

    $empfaenger  = $email  ; // beachte das Komma

    $betreff = 'EMK-Interner-Bereich: Neue Berechtigunsanfrage';
    $nachricht = '
    <html>
    <head>
        <title>Berechtigungsanfrage</title>
    </head>
    <body>
        <p>Liebe(r) ' . $admin . '</p>
        <p>&nbsp;</p>
        <p>Der Benutzer mit der E-Mail-Adresse <b>'. $userEmail .'</b> hat die Berechtigung <b>'. $groupItem . '</b> beantragt.</p>
        <p>Da Sie Administrator dieser Berechtigung sind, müssen sie diesen Vorgang bestätigen. Bitte stellen Sie sicher, dass Sie die E-Mail-Adresse des neuen Benutzers kennen und bestätigen Sie dies mit:</p>
        <p><a href=https://anmeldung.methodisten.ch/validate.php?hash="' . $hash . '">Bestätigen</a></p>
        <p>Sollte ihnen die obige e-Mail adresse unbekannt sein, können sie dieses E-Mail löschen.</p>
        <p>Freundliche Grüsse</p>
        <p>EMK-Schweiz</p>
        <p>&nbsp;</p>
        <p>Dies ist eine automatisch gnerierte Nachricht, bitte antworten sie nicht darauf.</p>
        </body>
        </html>
        ';

    // für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
    $header[] = 'MIME-Version: 1.0';
    $header[] = 'Content-type: text/html; charset=utf-8';

    // zusätzliche Header
    $header[] = 'To: <' . $email . '>';
    $header[] = 'From: EMK-Schweiz <noreply@emk-schweiz.ch>';
    $header[] = 'Bcc: <marius.baumann@emk-schweiz.ch>';

    // verschicke die E-Mail
    // mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header));

    //$toEmail = $_POST["your_email"] ;
    //$mailHeaders = "From: noreply@emk-schweiz.ch <noreply@emk-schweiz.ch>\r\n MIME-Version: 1.0\r\n Content-type: text/html; charset=iso-8859-1";
    if(mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header))) {
        echo "";
    } else {
        echo"E-Mail konnte nicht gesendet werden.";
        return "Rquest E-Mail konnte nicht gesendet werden.";
    }

}

function sendConfirmationMail($email, $groupItem) {
    $userID = getUserIDfromEMail($email);

    $empfaenger  = $email  ; // beachte das Komma

    $betreff = 'EMK-Interner-Bereich: Berechtigung erteilt';
    $nachricht = '
    <html>
    <head>
        <title>Berechtigung erteilt</title>
    </head>
    <body>
        <p>Liebe(r) ' . $userID . '</p>
        <p>&nbsp;</p>
        <p>Der Administrator hat ihnen die Berechtigung für <b>'. $groupItem .'</b>&nbsp; erteilt.</p>
        <p>Sie können nun auf die entsprechenden Inhalte zugreifen. </p>
        <p><a href=https://cloud.medhodisten.ch">Einloggen</a></p>
        <p>&nbsp;
        <p>Freundliche Grüsse</p>
        <p>EMK-Schweiz</p>
        <p>&nbsp;</p>
        <p>Dies ist eine automatisch gnerierte Nachricht, bitte antworten sie nicht darauf.</p>
        </body>
        </html>
        ';

    // für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
    $header[] = 'MIME-Version: 1.0';
    $header[] = 'Content-type: text/html; charset=utf-8';

    // zusätzliche Header
    $header[] = 'To: <' . $email . '>';
    $header[] = 'From: EMK-Schweiz <noreply@emk-schweiz.ch>';
    $header[] = 'Bcc: <marius.baumann@emk-schweiz.ch>';

    // verschicke die E-Mail
    // mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header));

    //$toEmail = $_POST["your_email"] ;
    //$mailHeaders = "From: noreply@emk-schweiz.ch <noreply@emk-schweiz.ch>\r\n MIME-Version: 1.0\r\n Content-type: text/html; charset=iso-8859-1";
    if(mail($empfaenger, $betreff, $nachricht, implode("\r\n", $header))) {
        echo "";
    } else {
        echo"E-Mail konnte nicht gesendet werden.";
        return "Bestätiguns-E-Mail konnte nicht an den Benutzer gesendet werden.";
    }

}

function getEMailFromUserID($userID) {
    global $baseurl;
    $resultArray = [];

    $url       = $baseurl .'/'. $userID;
    $options   = array (CURLOPT_POST => 0,);
    
    $result = doCurl($url, $options);
    //print_r($result);

    $listArray = $result->{"ocs"}->{"data"}->{"email"};

    return $listArray;
}


function getGroupAdmins($groupItem) {
    global $groupbaseurl;
    $resultArray = [];

    $url       = $groupbaseurl .'/'. $groupItem . '/subadmins' ;
    $options   = array (CURLOPT_POST => 0,);
    
    $result = doCurl($url, $options);
    //print_r($result);

    $listArray = $result->{"ocs"}->{"data"};

    return $listArray;
}

function getGroupList($searchVal, $limit) {
    global $groupbaseurl;
    $resultArray = [];

    $url       = $groupbaseurl . "?search=" . $searchVal ;
    $options   = array (CURLOPT_POST => 0,);
    
    $result = doCurl($url, $options);
    //print_r($result);

    $listArray = $result->{"ocs"}->{"data"}->{"groups"};

    //print_r($listArray);
    $i = 0;
    foreach ($listArray as $Group) {
        if ($i > 5 && $limit == true) {
            break;
        }
        if ((strpos($Group, 'schreiben') !== false) || (strpos($Group, 'Zugang Beantragt') !== false) || (strpos($Group, 'admin') !== false)) {
            continue;
        }else {
            array_push($resultArray, $Group);
        }
        $i++;
    }

    return json_encode($resultArray);

}

function checkUserExist($userItem) {
    global $baseurl;

    $url       = $baseurl . '?search=' . $userItem;
    $options   = array (CURLOPT_POST => 0,);
    
    $result = doCurl($url, $options);
    //echo $result;
    
    //print(count($requestdata->{'ocs'}->{'data'}->users));

    $searchcount = count($result->{'ocs'}->{'data'}->users);
    //echo $searchcount;
    if($searchcount == 1){
        return TRUE;
    } else {
        return FALSE;
    }
}

function getUserIDfromEMail($userEmail) {
    global $baseurl;
    //if ($verbose == 1) { echo "$userID, group $groupName "; }
    //if ($verbose > 1)  { echo "Adding user $userID to group $groupName\n"; }
    $url       = $baseurl . '?search=' . $userEmail;
    $options   = array (CURLOPT_POST => 0,);
    
    $result = doCurl($url, $options);
    //echo $result;
    
    //print(count($requestdata->{'ocs'}->{'data'}->users));

    $searchcount = count($result->{'ocs'}->{'data'}->users);

    if($searchcount == 0) {
        echo "No user found";
        exit(1);
    }

    if($searchcount == 1) {
        return $result->{'ocs'}->{'data'}->users[0];
    }
    
    if($searchcount > 1) {
        echo "To many Users found";
        exit(1);
    }

}

function moveUserToGroup($userID, $userEmail, $groupName) {
    // Deliver either UserID or e-Mail-Adress
    global $baseurl;

    if($userID != "" || $userEmail != ""){
        if($userID == "") {
            $userID = getUserIDfromEMail($userEmail);
        }
    } else {
        echo "Please provide either UserID or e-Mail-Adress";
        exit(1);
    }

    if(checkUserExist($userID) == FALSE){
        echo "Can't move User because it doesn't exist.";
        exit(1);
    } else {
    
        //if ($verbose == 1) { echo "$userID, group $groupName "; }
        //if ($verbose > 1)  { echo "Adding user $userID to group $groupName\n"; }
        $url       = $baseurl . '/' . $userID . '/' . 'groups';
        $options   = array (CURLOPT_POST       => 1,
                            CURLOPT_POSTFIELDS => array('groupid' => $groupName)
                        );        
        
        $result = doCurl($url, $options);
        if($result == "102"){
            echo "Group does not exist.";
            exit(1);
        }
    }
}


function addUser($userID, $userPass, $userEmail, $FirstName, $LastName, $quota) {
    global $baseurl;
    
    if(checkUserExist($userID)){
        echo "User already exists";
        exit(1);
    } else {
        $url       = $baseurl;
        $postfields = http_build_query(array('userid'   => $userID, 
                                            'password' => $userPass ));
        $options   = array (CURLOPT_POST       => 1,
                        CURLOPT_POSTFIELDS => array('userid'   => $userID, 
                                                    'password' => $userPass,
                                                    'email' => $userEmail,
                                                    'displayname' => $FirstName . ' ' . $LastName,
                                                    'quoata' => $quota )
        );
         
        
        if (doCurl($url, $options)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }  
}


// FUNCTION: Do the curl call
function doCurl ($url, $options) {
	global $adminName, $adminPass, $verbose, $doe;
	
	$options = $options +
			   array(CURLOPT_RETURNTRANSFER => true,
					 CURLOPT_USERPWD        => $adminName . ":" . $adminPass,
					 CURLOPT_HTTPHEADER     => array('OCS-APIRequest:true', 'Accept: application/json'),
			   );

	if ($verbose > 2) {
		$options = $options +
				   array(CURLOPT_VERBOSE => TRUE,
						 CURLOPT_HEADER  => TRUE
				   );
	}

	$ch = curl_init($url);

 	curl_setopt_array( $ch, $options);
	
//  For use with Charles proxy:
// 	curl_setopt($ch, CURLOPT_PROXYPORT, '8888');
// 	curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
// 	curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1');

    $response = curl_exec($ch);
    //print_r($response);
    $response = json_decode($response);
    //print_r($response);

    $statuscode =  $response->{'ocs'}->{'meta'}->statuscode;

    
    if($statuscode != "100"){
            echo $statuscode;
            echo $response->{'ocs'}->{'meta'}->message;
            return $statuscode;
            exit(1);
    }

    if($response === false) {
        echo 'Curl error: ' . curl_error($ch) . "\n";
		exit(1);
	}
	
	curl_close($ch);
    
	/* An error causes an exit
	if (preg_match("~<statuscode>(\d+)</statuscode>~", $response, $matches)) {
        $responseCode = $matches[1]; // what's the status code
        //echo $matches[3];
        //echo "<h3>" . $response . "</h3>";
        if ($responseCode == '404') {
            return "2";
            exit(2);
        } elseif ($responseCode != '100') {
            echo "1Error response code; exiting\n$response\n";
			exit(1);
		}
	}
	else { // something is definitely wrong
        echo "No statuscode response; exiting:\n$response\n";
        
		exit(1);
	}
    */
	// What sort of response do we want to give
//	if ($verbose == 1) { echo "Response code from server: $responseCode\n"; }
	//if ($verbose == 1) { echo "\n"; }
	//if ($verbose > 1)  { echo "Response from server:\n$response\n\n"; }

	return $response;
}

class SA_Encryption{
    //http://www.rndblog.com/php-encrypt-decrypt-a-request-param/
 
    const OPEN_SSL_METHOD = 'aes-256-cbc';
    // Generate a 256-bit encryption key
    const BASE64_ENCRYPTION_KEY = 'BmhKVv4uqXRqlRjtnLwZphXsQGcMlKTCmGnxdzTdhqk';//base64_encode(openssl_random_pseudo_bytes(32));
    const BASE64_IV = 'cHlpud12rtBVLkniablmpo';//base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC)));
                       
    static private function base64_url_encode($input) {
        return strtr(base64_encode($input), '+/=', '-_,');
    }
 
    static private function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_,', '+/='));
    }
 
 
    static function encrypt_to_url_param($message){
        $encrypted = openssl_encrypt($message, self::OPEN_SSL_METHOD, base64_decode(self::BASE64_ENCRYPTION_KEY), 0, base64_decode(self::BASE64_IV));
        $base64_encrypted = self::base64_url_encode($encrypted);
        return $base64_encrypted;
    }
 
    static function decrypt_from_url_param($base64_encrypted){
        $encrypted = self::base64_url_decode($base64_encrypted);
        $decrypted = openssl_decrypt($encrypted, self::OPEN_SSL_METHOD, base64_decode(self::BASE64_ENCRYPTION_KEY), 0, base64_decode(self::BASE64_IV));
        return $decrypted;
    }
}
?>