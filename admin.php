<?php 
session_start();
$pdo = new PDO('mysql:host=emkyoung.mysql.db.internal;dbname=emkyoung_anmeldungbartel', 'emkyoung_bartel', 'byYsaSGf');
 
if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        if($_POST['email'] == "baumanma"){
          header("Location: https://anmeldung.methodisten.ch/management2.php");
        }else{
        header("Location: https://anmeldung.methodisten.ch/management2.php");
      }
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
    
}
?>
<!DOCTYPE html> 
<html> 
<body>

<head>
  <!-- Latest compiled and minified CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <title>Login</title> 
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
        <span class="icon-bar">Test</span>
        <span class="icon-bar">test</span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img style="height: 60px" src="logo.jpg" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      
    
    </div><!-- /.navbar-collapse -->
  <div class="row">
    <div class="col-md-12">
      <form name="contact-form"  action="?login=1" method="post" id="contact-form">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="Name">User</label>
              <input type="text" class="form-control" name="email" placeholder="" required>
            </div>
            <div class="col-md-6">
              <label for="Name">Passwort</label>
              <input type="password" class="form-control" name="passwort" placeholder="" required>
            </div>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Abschicken">
    </div>
  </div>
 </div>
<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 
<!--
<form action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
<input type="submit" value="Abschicken">
</form> -->

</body>
</html>