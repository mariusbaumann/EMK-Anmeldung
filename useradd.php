
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

require_once('ocs-api-handler.php');

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
    $selectedGroupItems = $_POST['sendSelectedGroupItems'];

    addUser($userID, $userPass, $userEmail, $FirstName, $LastName, $quota);
    requestRights($selectedGroupItems, $userEmail);

    echo "1";

}

if($job == "addUserRights") {  
    $userEmail = $_POST['email'];    
    
    $selectedGroupItems = $_POST['sendSelectedGroupItems'];

    requestRights($selectedGroupItems, $userEmail);
    echo "1";
}

if($job == "getGroupListSearch") {
    $searchVal = $_POST['value'];
    print(getGroupList($searchVal, true));     
}

if($job == "getGroupListFull") {
    print(getGroupList("", false));     
}


?>