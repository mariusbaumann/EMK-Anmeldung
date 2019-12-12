<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS 
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">--> 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <style>
    #separateForm {
      margin-bottom: 2rem;
    }
    #loading-img{
      display:none;
    }
    .btn-form {
      width: 100%;
      border-radius: 0;
    }
    .badge{
      margin-left: 2px;
      border-radius: 0;
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
    .btn-primary {
      background-color: #aed361;
      border: none;
      border-radius: 0; 
    }
    .form-control {
      background-color: #f7fafc;
      border-radius: 0;
      border-width: 0px 0px 2px 2px;
      border-color: #cad8e2;
    }
    .form-control:focus {
      border-color: #aed361;
      background-color: #f0f4f6;
      box-shadow: none;
    }
    .navbar {
      background-color: #fff ;
      height: 111px;
      border-left: none;
      border-top: none;
      border-right: none;
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
    .list-group-item {
      margin-left: 5px;
    }
    .margin {
      margin-left: 12px;
    }
    .space {
      margin-top: 10px;
    }
    .space-md {
      margin-top: 15px;
    }
    .space-lg {
      margin-top: 30px;
    }
    .list-group-item.active {
      background-color: #aed361;
    border-color: #aed361;
    }
    .list-group-item:first-child {
      border-radius: 0;
    }
    .list-group-item:last-child {
      border-radius: 0;
    }
    .alert-success {
      background-color: #aed361;
      font-size: 20px;
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
      <a class="navbar-brand" href="#"><img style="height: 50px" src="../logo.jpg" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="row">
    <div class="col-md-12">
      <h1 id="mainTitle">Informations-Veranstaltungen</h1>
      <h3 id="subTitle"></h3>
      <div id="fadeOut">
        <div class="row">
          <div id="separateForm" class="col-md-12 margin-bottom" >
            Wir bitten Sie, dieses Formular für jede Person separat auszufüllen. 
          </div>
        </div>
        <form name="contact-form" action="" method="post" id="contact-form" onsubmit="return false">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label id="firstname" for="Name">Vorname</label>
                <input type="text" class="form-control" name="firstname" placeholder="" >
              </div>
              <div class="col-md-6">
                <label id="lastname" for="Name">Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label id="district" for="Name">Bezirk</label>
            <input type="text" class="form-control" name="district" placeholder="" >
          </div>
          <div class="form-group">
            <label id="eMail" for="exampleInputEmail1">Email Adresse</label>
            <input type="email" class="form-control" name="eMail" placeholder="" >
          </div>
          <div class="form-group">
            
            <!--<input type="text" class="form-control" name="role" placeholder="" >-->
            <input id="persFunction" type="hidden" class="form-control" name="role" placeholder="">
            <div class="btn-group btn-form" role="group" aria-label="Button group with nested dropdown">
            
              <button id="btnDropDown" type="button" class="btn btn-secondary dropdown-toggle btn-form" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Funktion
              </button>
              <div id="functionDropDown" class="dropdown-menu btn-form" aria-labelledby="btnGroupDrop1">
                <a id="Pfarrperson" class="dropdown-item" href="#">Pfarrperson</a>
                <a id="Laienmitglied" class="dropdown-item" href="#">Laienmitglied</a>
                <a id="Mitglied Bevo" class="dropdown-item" href="#">Mitglied BeVo</a>
              </div>
             </div>
          </div>
          <div id="lunchInfoBlock" >
            <div class="row">
            <div class="col-md-6">
              <h5 id="preferedDate" for="exampleInputEmail1" class="space">Wunschtermin</h5>
              <ul  class="list-group space-md">
                <li class="list-group-item list-group-item-action radio-item active"><span  class="margin"><input class="form-check-input" type="radio" name="dateprio" id="datealtZofingen" value="Zofingen" checked ><span id="zofingen">Samstag, 11. Jan. 2020 in Zofingen</span></span> <span class="badge badge-secondary float-right">DE</span>&nbsp;</li>
                <li class="list-group-item list-group-item-action radio-item"><span class="margin"><input class="form-check-input" type="radio" name="dateprio" id="datealtWinterthur" value="Winterthur" ><span id="winterthur"> Samstag, 25. Jan. 2020 in Winterthur</span></span>  <span class="badge badge-secondary float-right">DE</span></li>
                <li class="list-group-item list-group-item-action radio-item"><span class="margin"><input class="form-check-input" type="radio" name="dateprio" id="datealtThun" value="Thun" ><span id="thun"> Samstag, 25. Jan. 2020 in Thun</span></span><span class="badge badge-secondary float-right">DE</span><span class="badge badge-secondary float-right">FR</span></li>
              </ul>
            </div>
            <div class="col-md-6">
              <h5 id="allsoPossible" for="exampleInputEmail1" class="space">Das ginge auch</h5>
                <ul class="list-group space-md">
                  <li class="list-group-item list-group-item-action check-item"><span class="margin"><input class="form-check-input" type="checkbox" name="datealtZofingen" id="datealtZofingen" value="1" ><span id="zofingen2"> Samstag, 11. Jan. 2020 in Zofingen </span></span>&nbsp;<span class="badge badge-secondary float-right">DE</span>&nbsp;</li>
                  <li class="list-group-item list-group-item-action check-item"><span class="margin"><input class="form-check-input" type="checkbox" name="datealtWinterthur" id="datealtWinterthur" value="1" ><span id="winterthur2"> Samstag, 25. Jan. 2020 in Winterthur </span></span><span class="badge badge-secondary float-right">DE</span></li>
                  <li class="list-group-item list-group-item-action check-item"><span class="margin"><input class="form-check-input" type="checkbox" name="datealtThun" id="datealtThun" value="1" ><span id="thun2"> Samstag, 25. Jan. 2020 in Thun</span></span> <span class="badge badge-secondary float-right">DE</span><span class="badge badge-secondary float-right">FR</span></li>
                </ul>
              </div>
            </div>
            <div id="lunchInfoBlock" >
              <div class="row">
                <div class="col-md-12">
                  <h5 id="foodConfig" class="space-lg">Essenswünsche</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="vegi" id="exampleRadios1"  >
                    <label id="yes" class="form-check-label" for="exampleRadios1">Vegetarier</label>
                  </div>
                  <div class="form-group space">
                    <label id="allergies" for="exampleInputEmail1">Allergien</label>
                    <input type="text" class="form-control" name="allergies" placeholder="" >
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="hidden" id="detectedLang" name="detectedLang" value="noDetection">
                      <div class="g-recaptcha" data-sitekey="6Lc0hLQUAAAAADYin5_3nQuP_VoDR0P4mcPg7VtG"></div>
                        <button id="submit_form" type="submit" class="btn btn-primary" name="submit" value="Submit" >Anmelden</button>
                        <img id="loading-img" src="../Rolling-2s-200px.svg" class="img-center">
                        <p id="language"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="response_msg alert alert-success"></div>
    <script src="../jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){

      $("#functionDropDown").find("a").click(function() {
        $("#btnDropDown").text($(this).text());
        $("#persFunction").val($(this).text());
      })

      $(".radio-item").click(function() {
        $(this).parent().find("input").prop('checked', false);
        $(this).parent().children().removeClass("active");
        $(this).addClass("active");
        $(this).find("input").prop('checked', true);
      });
      
      $(".check-item").find("input").click(function(e) {
        e.stopPropagation();
        if($(this).prop("checked") == true) {
          $(this).parent().parent().addClass("active");
        } else {
          $(this).parent().parent().removeClass("active");
        }
      });


      $(".check-item").click(function() {
        if($(this).find("input").prop("checked") == false){
          $(this).find("input").prop('checked', true);
          $(this).addClass("active");
        } else {
          $(this).find("input").prop('checked', false);
          $(this).removeClass("active");
        }
      });
      
      var lang = window.navigator.userLanguage || window.navigator.language;
      //$("#language").text(lang);
      $("#detectedLang").val(lang);

      var lang_fr = { mainTitle: "journées d'information et de discussion sur \"l’Avenir EEM\"", subTitle: '', separateForm: 'Veuillez remplir ce formulaire séparément pour chaque personne.', firstname: 'Prénom', lastname: 'Nom', city: 'Domicile', district: 'Paroisse', role: 'Fonction', eMail: 'Adresse électronique', preferedDate: 'date préférée', allsoPossible: "qui pourrait aussi être fait", yes:'végétarien', no: 'Non', lunchInfo: 'Il y a la possibilité de manger soi-même dans les environs. Nous proposons une collation pour le repas de midi contre une participation aux frais (Fr/Euros 10,-)',  submit_form: 'Inscrire', zofingen: "11.1.2020 EMK Zofingen", thun: "25.1.2020 EMK Thoune", winterthur: "25.1.2020 EMK Winterthur", zofingen2: "11.1.2020 EMK Zofingen", thun2: "25.1.2020 EMK Thoune", winterthur2: "25.1.2020 EMK Winterthur", foodConfig: "vœux culinaires", allergies: "allergies" };

      if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
        $.each(lang_fr, function(index, value){
          $('#'+ index).text(value);
        })
          //$("#language").append("true");
        }
        
        $("#contact-form").on("submit",function(e){
          var toggle = false;

          e.preventDefault();
          $("#contact-form").find("input").each(function () {
            console.log($(this).val());
            if ($(this).val() == "") {
              if($(this).prop('name') != "allergies"){
              $(this).css("border-color","#c50125");
              toggle = true;
              }
              if($(this).prop('name') == "role"){
                $(this).parent().find(".btn").css("background-color", "#c50125");
              }
            }
            else {
              $(this).css("border-color","#aed361");
              //toggle = false;
              if($(this).prop('name') == "role"){
                $(this).parent().find(".btn").css("background-color", "#6c757d");
              }
            }
          }
          );
          console.log(toggle);
          if(toggle == false){
            $("#loading-img").css("display","block");
            var sendData = $( this ).serialize();
            $.ajax({
              type: "POST",
              url: "form_process.php",
              data: sendData,
              success: function(data){
                $("#fadeOut").hide();
                $("#loading-img").css("display","none");
                $(".response_msg").show();
                $(".response_msg").text(data);
                //$("#contact-form").find("input[type=text], input[type=email], textarea").val("");
              }
            });
          }
        });
        });
  </script>
</body>
</html>