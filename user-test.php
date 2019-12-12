<!DOCTYPE html>
<html>
<head></head>
<body>

<?php

/*
$url = "https://nx5186.your-storageshare.de/ocs/v1.php/cloud/users";
$username = 'Admin';
$password = 'Othmar1992+2';
// create a new cURL resource
$myRequest = curl_init($url);

// do a POST request, using application/x-www-form-urlencoded type
curl_setopt($myRequest, CURLOPT_POST, TRUE);
// credentials
curl_setopt($myRequest, CURLOPT_USERPWD, "$username:$password");
// returns the response instead of displaying it
curl_setopt($myRequest, CURLOPT_RETURNTRANSFER, 1);

// do request, the response text is available in $response
$response = curl_exec($myRequest);
// status code, for example, 200
$statusCode = curl_getinfo($myRequest, CURLINFO_HTTP_CODE);

echo $response;
echo $statusCode;

// close cURL resource, and free up system resources
curl_close($myRequest);
*/




//###################
echo "Begun processing credentials , first it will be stored in local variables" . "<br/>";

// Loading into local variables
$userName =  "Frank";                           //             $_POST['Frank'];
$RRpassword = "Wesley2018";                                                  //$_POST['Wesley2018*'];

echo "Hello " . $userName . "<br/>";
echo "Your password is " . $RRpassword . "<br/>";

 // Login Credentials as Admin
 $ownAdminname = 'Admin';
 $ownAdminpassword = 'Othmar1992+2';


// Add data, to owncloud post array and then Send the http request for creating a new user
//$url = 'https://' . $ownAdminname . ':' . $ownAdminpassword . '@nx5186.your-storageshare.de/ocs/v1.php/cloud/users';
$url = 'https://nx5186.your-storageshare.de/ocs/v1.php/cloud/users';
echo "Created URL is " . $url . "<br/>"; 

$ownCloudPOSTArray = array(
    'key' => 'userid',
    'value' => $userName,
    'key' => 'password', 
    'value' => $RRpassword 
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, $ownAdminname . ":" . $ownAdminpassword);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'accept: application/json',
    'authorization: Basic <Admin>',
    'content-type: application/x-www-form-urlencoded',
    'OCS-APIRequest: true',
));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, $ownCloudPOSTArray);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
echo "Response from curl :" . $response;
echo "<br/>Created a new user in owncloud<br/>";

/*
// Add to a group called 'Users'
$groupUrl = $url . '/' . $userName . '/' . 'groups';
echo "Created groups URL is " . $groupUrl . "<br/>";

$ownCloudPOSTArrayGroup = array('groupid' => 'Users');

$ch = curl_init($groupUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $ownCloudPOSTArrayGroup);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo "Response from curl :" . $response;
echo "<br/>Added the new user to default group in owncloud";
*/


?>

</body>
</html>

