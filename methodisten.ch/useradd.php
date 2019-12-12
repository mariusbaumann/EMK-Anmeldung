
<?php

// Written by Cameron Smith
// January, 2018

$usage            = <<<EOU
usage: addCloudUsers.php filepath

	This script will read a csv file and populate a [next|own]cloud instance
		with new users.

	The path to the csv file is provided as the sole parameter when invoking 
		the script.

	Check the code to see the expected csv format. Change the code for your 
		particular usage case.

	Good Luck!

EOU;

//$usersFile        = $argv[1];

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

    //Create a new user
  /*  $url       = $baseurl;
    $postfields = http_build_query(array('userid'   => $userName, 
                                            'password' => $userPass ));
    $options   = array (CURLOPT_POST       => 1,
                        CURLOPT_POSTFIELDS => array('userid'   => $userName, 
                                                    'password' => $userPass )
                    );
    doCurl ($url, $options);

    // Add the new user to the default group
    if ($defaultGroup) {
        if ($verbose == 1) { echo "$userName, group $defaultGroup "; }
        if ($verbose > 1)  { echo "Adding user $userName to group $defaultGroup\n"; }
        $url       = $baseurl . '/' . $userName . '/' . 'groups';
        $options   = array (CURLOPT_POST       => 1,
                            CURLOPT_POSTFIELDS => array('groupid' => $defaultGroup
                                                    )
                        );
        doCurl ($url, $options);
    }*/

//addUser("testuser", "Wesley2018*", "marius.baumann@methodisten.ch", "John", "Wesley", "1GB");
//echo checkUserExist("s");
//moveUserToGroup("", "marius.baumann@methodisten.ch", "Lesen Bezirkee");


$job = $_POST['job'];

if($job == "veryfiUser") {
    $userItem = $_POST['userItem'];

    if(checkUserExist($userItem)) {
        echo true;
    } else {
        echo false;
    }
}

if($job == "addUser") {
    $userID = $_POST['username'];
    $userPass = $_POST['password'];    
    $userEmail = $_POST['email'];    
    $FirstName = $_POST['firstname'];    
    $LastName = $_POST['name'];  
    $quota = "1 GB";  

    addUser($userID, $userPass, $userEmail, $FirstName, $LastName, $quota);
        
}

if($job == "getGroupList") {
   getGroupList();
        
}


function getGroupList() {
    global $groupbaseurl;

    $url       = $groupbaseurl ;
    $options   = array (CURLOPT_POST => 0,);
    
    $result = doCurl($url, $options);
    echo $result;
    print_r($result);
    
    //print(count($requestdata->{'ocs'}->{'data'}->users));

    //$searchcount = count($result->{'ocs'}->{'data'}->users);
    //echo $searchcount;
    
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
    //echo $response;
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

?>