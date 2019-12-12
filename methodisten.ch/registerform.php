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
  <div class="row">
    <div class="col-md-12">
      <h1 id="mainTitle">Registration Interner Bereich</h1>
      <h5 id="subTitle">Beantragen sie hier Rechte für den Internen Bereich der EMK-Schweiz und ihrer Bezirke. Die beantragten Rechte werden nach der Bestätigung des entsprechenden Administrators erteilt. Sie werden über den Fortschritt per E-Mail benachrichtigt. </h5>

      
      <form name="contact-form" action="" method="post" id="contact-form">
      <div class="form-group">
          <label id="eMailAdress" for="exampleInputEmail1">Email Adresse</label>
          <input id="inputEMailAdress" type="email" class="form-control" name="email" placeholder="" required>
        </div>
        <div id="alreadyExist" class="row" style="display: none">
          <div class="col-md-12">
                <p>Diese E-Mail-Adresse wurde bereits registriert. Was möchtest du tun?</p>
        
                <a href="https://cloud.methodisten.ch" class="btn btn-primary" role="button">Einloggen</a>
               
                <button id="" type="" class="btn btn-primary" name="submit" value="Submit" >Zusätzliche Rechte beantragen</button>
            </div>
        </div>
        <div id="fullform">
            <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label id="firstname" for="Name">Vorname</label>
                <input type="text" class="form-control" name="firstname" placeholder="" required>
                </div>
                <div class="col-md-6">
                <label id="lastname" for="Name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="" required>
                </div>
            </div>
            </div>
            <div class="form-group">
            <label id="username" for="exampleInputEmail1">Benutzername</label>
            <input id="inputUsername" type="text" class="form-control" name="username" placeholder="" required>
            <p id="usernameAleradyExist" style="display: none">Dieser Benutzername wird schon verwendet.</p>
            </div>
            
            <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label id="lablepassword" for="Name">Passwort</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="" required>
                <div id="passwordmessage" style="display: none"><p>Die Passwörter stimmen nicht überrein.</p></div>
                </div>
                <div class="col-md-6">
                <label id="lablepassword" for="Name">Passwort wiederholen</label>
                <input id="2ndpassword" type="password" class="form-control" name="2ndpassword" placeholder="" required>
                
                </div>
            </div>
            </div>
        
        
        <div class="row">
          <div class="col-md-12">
          <input type="hidden" id="detectedLang" name="detectedLang" value="noDetection">
          <input type="hidden" id="job" name="job" value="addUser">

            <!--<div class="g-recaptcha" data-sitekey="6Lc0hLQUAAAAADYin5_3nQuP_VoDR0P4mcPg7VtG"></div>-->
             
             
              <button id="submit_form" type="submit" class="btn btn-primary" name="submit" value="Submit" >Weiter</button>
              <img id="loading-img" src="Rolling-2s-200px.svg" class="img-center">
              <p id="language"></p>
            </div>
          </div>
          <div></div>
          </div>
        </form>
        <div class="response_msg label label-success"></div>
      </div>
    </div>
  </div>
  <script src="jquery.min.js"></script>
  <script>
    $("#inputEMailAdress").focusout(function(){
        //alert("left");
        var fieldvalue = $("#inputEMailAdress").val();
        console.log((fieldvalue.search('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$')));
        
        if(fieldvalue.search('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$') < 0) {
          $("#inputEMailAdress").css("border","1px solid red");
        }
        else {
          $("#inputEMailAdress").css("border","");
            //alert("NO");
        }

        $.post("/useradd.php", {userItem: fieldvalue, job: "veryfiUser"}, function(data, status) {
            if(data == true){
               $("#alreadyExist").show();
               $("#fullform").hide();
            } else {
                $("#alreadyExist").hide();
               $("#fullform").show();
            }

        });
    });

    $("#inputUsername").focusout(function(){
        //alert("left");

        $.post("/useradd.php", {userItem: $("#inputUsername").val(), job: "veryfiUser"}, function(data, status) {
            if(data == true){
              $("#inputUsername").css("border","1px solid red");
              $("#usernameAleradyExist").show();
              $('#submit_form').prop('disabled', true);
            } else {
              console.log("bla");
              $("#inputUsername").css("border","1px solid white");
              $("#usernameAleradyExist").hide();
              $('#submit_form').prop('disabled', false);
            }

        });
    });
    
    $(document).ready(function(){
      var lang = window.navigator.userLanguage || window.navigator.language;
      //$("#language").text(lang);
      $("#detectedLang").val(lang);

      var lang_fr = { mainTitle: 'Bible, Église - Homosexualité', subTitle: 'Journée d\'étude 30 novembre 2019', separateForm: 'Veuillez remplir ce formulaire séparément pour chaque personne.', firstname: 'Prénom', lastname: 'Nom', city: 'Domicile', church: 'Paroisse', eMailAdress: 'Adresse électronique', lunch: 'Déjeuner sur place', yes:'Oui', no: 'Non', lunchInfo: 'Il y a la possibilité de manger soi-même dans les environs. Pour une participation aux frais (Fr/Euro 10.-) nous offrons un petit déjeuner sur place.',  submit_form: 'Inscrire' };

      if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
        $.each(lang_fr, function(index, value){
          $('#'+ index).text(value);
        }
        )
        //$("#language").append("true");
      }
     


      $("#contact-form").on("submit",function(e){
        e.preventDefault();

        if($("#password").val() != $("#2ndpassword").val()){
          alert("Passwörter stimmen nicht überein");
          $("#password").css("border","1px solid red");
          $("#2ndpassword").css("border","1px solid red");
          $("#passwordmessage").show();
        }else{
          $("#password").css("border","1px solid red");
          $("#2ndpassword").css("border","");
          $("#loading-img").css("display","block");
          var sendData = $( this ).serialize();
          alert(sendData);
          $.ajax({
            type: "POST",
            url: "/useradd.php",
            data: sendData,
            success: function(data){
              $("#loading-img").css("display","none");
              $(".response_msg").text(data);
              $(".response_msg").slideDown().fadeOut(50000);
              $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
            }
          });
        }
      });
      /*
      $("#contact-form input").blur(function(){
        var checkValue = $(this).val();
        if(checkValue != '') {
          $(this).css("border","1px solid #eeeeee");
        }
      });*/

      

    });
  </script>
</body>
</html>