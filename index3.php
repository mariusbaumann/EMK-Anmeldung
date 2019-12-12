<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
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
      <h1 id="mainTitle">Bibel, Kirche - Homosexualität</h1>
      <h3 id="subTitle">Studientag 30.November 2019</h3>

      <div class="row">
        <div id="separateForm" class="col-md-12 margin-bottom" >
          Wir bitten Sie, dieses Formular für jede Person separat auszufüllen. 
        </div>
      </div>
      <form name="contact-form" action="" method="post" id="contact-form">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label id="firstname" for="Name">Vorname</label>
              <input type="text" class="form-control" name="firstname" placeholder="" required>
            </div>
            <div class="col-md-6">
              <label id="lastname" for="Name">Name</label>
              <input type="text" class="form-control" name="your_name" placeholder="" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label id="city" for="Name">Wohnort</label>
          <input type="text" class="form-control" name="city" placeholder="" required>
        </div>
        <div class="form-group">
          <label id="church" for="Name">Kirchgemeinde</label>
          <input type="text" class="form-control" name="church" placeholder="" required>
        </div>
        <div class="form-group">
          <label id="eMailAdress" for="exampleInputEmail1">Email Adresse</label>
          <input type="email" class="form-control" name="your_email" placeholder="" required>
        </div>
        <div id="lunchInfoBlock" style="display: none">
          <label id="lunch" for="exampleInputEmail1">Mitagessen vor Ort</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="lunch" id="exampleRadios1" value="1" >
            <label id="yes" class="form-check-label" for="exampleRadios1">
              Ja
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="lunch" id="exampleRadios2" value="0" checked>
            <label id="no" class="form-check-label" for="exampleRadios2">
              Nein
            </label>
          </div>
          <div class="row">
            <div id="lunchInfo" class="col-md-12 margin-bottom">
                  Es besteht die Möglichkeit sich in der Umgebung selber zu verpflegen. Gegen einen Unkostenbeitrag (Fr/Euro 10.-) bieten wir ein kleines Mittagessen vor Ort an.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <input type="hidden" id="detectedLang" name="detectedLang" value="noDetection">

            <div class="g-recaptcha" data-sitekey="6Lc0hLQUAAAAADYin5_3nQuP_VoDR0P4mcPg7VtG"></div>
              <button id="submit_form" type="submit" class="btn btn-primary" name="submit" value="Submit" >Anmelden</button>
              <img id="loading-img" src="Rolling-2s-200px.svg" class="img-center">
              <p id="language"></p>
            </div>
          </div>
          <div></div>
        </form>
        <div class="response_msg label label-success"></div>
      </div>
    </div>
  </div>
  <script src="jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $.get("serve-lunch-count.php", function(data, status){
      //alert("Data: " + data + "\nStatus: " + status);

      if (data == 0) {
        //
        $("#lunchInfoBlock").hide();
      }
      else {
        //$("#lunchInfoBlock").show();
        $("#lunchInfoBlock").hide();
      }
    });

    var lang = window.navigator.userLanguage || window.navigator.language;
    //$("#language").text(lang);
    $("#detectedLang").val(lang);

    var lang_fr = { mainTitle: 'Bible, Église - Homosexualité', subTitle: 'Journée d\'étude 30 novembre 2019', separateForm: 'Veuillez remplir ce formulaire séparément pour chaque personne.', firstname: 'Prénom', lastname: 'Nom', city: 'Domicile', church: 'Paroisse', eMailAdress: 'Adresse électronique', lunch: 'Déjeuner sur place', yes:'Oui', no: 'Non', lunchInfo: 'Il y a la possibilité de manger soi-même dans les environs. Nous proposons une collation pour le repas de midi contre une participation aux frais (Fr/Euros 10,-)',  submit_form: 'Inscrire' };

    if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
      $.each(lang_fr, function(index, value){
        $('#'+ index).text(value);
      })
        //$("#language").append("true");
      }

      $("#contact-form").on("submit",function(e){
        e.preventDefault();
        if($("#contact-form [name='your_name']").val() === '') {
          $("#contact-form [name='your_name']").css("border","1px solid red");
        } 
        else if ($("#contact-form [name='your_email']").val() === '') {
          $("#contact-form [name='your_email']").css("border","1px solid red");
        } 
        else {
          $("#loading-img").css("display","block");
          var sendData = $( this ).serialize();
          $.ajax({
            type: "POST",
            url: "/get_response.php",
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
     
      });
  </script>
</body>
</html>