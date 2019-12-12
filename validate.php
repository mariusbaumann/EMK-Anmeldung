<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 

  <style>
    #loading-img{
      display:none;
    }
    .response_msg{
      margin-top:10px;
      font-size:13px;
      color:#ffffff;
      padding:3px;
      display:none;
    }
    body {
      font-family: 'Roboto Slab', Verdana, Sans-Serif;
    }
    .navbar {
      background-color: #fff ;
      height: 111px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 2px solid #dcdfe1;
      border-radius: 0px;
      padding: 1.4rem 0 2.2rem 0;
    }
    .navbar.contanier-fluid {
      height: 60px;
    }
    .navbar-brand {
      height: 80px;
      margin-left: -20px;
    }
    .btn {
      margin-top: 15px;
    }
    h3 {
      margin-bottom: 40px;
    }
    .container {
      margin-bottom: 40px;
    }
    .navbar-toggle {
      display: none;
    }
    .margin-bottom {
      margin-bottom: 10px;
    }
    .img-center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
  </style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img style="height: 60px" src="logo.jpg" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php

require_once('ocs-api-handler.php');

$param = $_GET['hash'];

$message = SA_Encryption::decrypt_from_url_param($param);
$user = explode('||', $message);
$receive_time = time();
$diff = $receive_time - $user[3];
if ($diff > (2 * 24 * 60 * 60)){
    echo "expired token\n";
}else{
    $result = moveUserToGroup("", strval($user[0]), strval($user[2]));
    if($result == "") {
        sendConfirmationMail(strval($user[0]), strval($user[2]));
        echo "Der Benuter mit der E-Mail-Adresse <b>" . strval($user[0]) . "</b> wurde erfoglreich mit <b>" . strval($user[2]) . "</b> berechtigt. Der Benutzer wird automatisch über diesen Vorgang benachrichtigt.";
    }else{
        echo $result;
    }
}

?>
</body>
</html>