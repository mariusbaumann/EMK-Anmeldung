<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
 <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/39876f8fd5.js" crossorigin="anonymous"></script>

  
  <style>
h5 {
  line-height: 1.5 ;
  font-size: 1.2em;
  margin-bottom: 30px;
}

.text-success {
  color: #aed361 !important;
}

.pw-description {
  margin-top: 5px;
  color: #777;
}
.list-group-item {
  padding-top: 9px;
  padding-bottom: 9px;
}


.input-group-prepend > button {
  border-radius: 0;
      border-width: 0px 0px 2px 2px;
      border-color: #cad8e2;
      background-color:#e9ecef;
}

.input-group-middle {
  border-width: 0px 0px 2px 0px !important;
}

.input-group-append > button {
  border-radius: 0;
      border-width: 0px 0px 2px 0px;
      border-color: #cad8e2;
      background-color:#e9ecef;
}


  .btn-outline-secondary {
   
  }
    .dropbtn {
      background-color: #ced4da;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
      background-color: #e9ecef;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      background-color: #f7fafc;
      min-width: 224px;
      border: solid #cad8e2;
      border-width: 0px 0px 2px 2px;
      z-index: 1;
      margin: 2px 0px 0px 40px;
      position: absolute;
      overflow: scroll;
      overflow-y: scroll;
      overflow-x: hidden;
      max-height: 400px;
    }
    
    .dropdown-content a, span {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .show {display:block;}
      
    #separateForm {
      margin-bottom: 2rem;
    }
    #loading-img{
      display:none;
    }

    .response_msg{
      margin-top:10px;
      font-size:18px;
      color:#ffffff;
    }

    .btn-form {
      width: 100%;
      border-radius: 0;
    }
    .border-red {
      border-color: red !important;
    }
    .border-orange {
      border-color: orange !important;
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
      line-height: 1.3;

    }
    a {
      color: #aed361;
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

    .input-group-text {
      border-radius: 0;
      border-width: 0px 0px 2px 0px;
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

    .container-flex {
      display: flex;
    }

    .left-box {
      flex: 1;
    }

    .right-box {
      flex: 1;
    }
    .row {
      margin-bottom: 15px;
    }

    .margin-top {
      margin-top: 20px;
    }

    @media only screean and (max-width: 700px) {
      .container-flex {
        flex-direction: column;
      }
      .left-box {
        order: 2;
      }
      .right-box {
        order: 1;
      }


    }

    .img-small {
      height: 25px;
    }

    

     /* Dropdown button on hover & focus */
     

    /* Dropdown Content (Hidden by Default) */


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
        <ul class="nav navbar-nav"></ul>  
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="row">
    <div class="col-md-12">
      <h1 id="mainTitle">Registrierung für den Internen Bereich</h1>
      <h5 id="subTitle" class="margin-top">Hier können Sie Zugriffssrechte für den Internen Bereich der EMK Schweiz und/oder Ihres Bezirks beantragen. Zugriff auf die entsprechenden Ordner gewährt nach Ihrem Antrag der entsprechende Administrator. Es kann einige Tage dauern, bis die Zugriffsrechte erteilt werden und Sie die gewünschten Ordner sehen. Über den Fortschritt werden Sie per E-Mail benachrichtigt.</h5>
      <div class="row ">
        <div class="col-md-12">
        

        <ul class="nav nav-tabs margin-top">
  <li class="nav-item" id="changeForm2">
    <a id="tr-userAndAccess" class="nav-link active"  href="#">Benutzer erstellen und Zugriffsrechte beantragen</a>
  </li>
  <li class="nav-item" id="changeForm">
    <a id="tr-onlyAccess" class="nav-link"  href="#">Nur Zugriffsrechte beantragen</a>
  </li>
  </ul>
        </div>
      </div>
      <form name="contact-form" action="" method="post" id="contact-form">
        <div class="form-group">
          <label id="eMailAdress" for="exampleInputEmail1">E-Mail-Adresse</label>
          <input id="inputEMailAdress" type="email" class="form-control" name="email" placeholder="">
          <p id="eMailNotValid" style="display: none">Die E-Mail-Adresse ist ungültig.</p>
          <p id="eMailNotValidMandatory" style="display: none">E-Mail-Adresse ist ein Pflichtfeld</p>
        </div>
        <div id="alreadyExist" class="row" style="display: none">
          <div class="col-md-12">
            <p id="tr-adressAlreadyUsed">Diese E-Mail-Adresse wurde bereits registriert. Was möchten Sie tun?</p>
    
            <a id="tr-login" href="https://cloud.methodisten.ch" class="btn btn-primary" role="button">Einloggen</a>
            <p id="tr-oder" class="margin-top">oder</p>
          </div>
        </div>
        <div id="fullform">
          <div id="hide-range">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label id="tr-firstname" for="Name">Vorname</label>
                  <input id="firstname" type="text" class="form-control" name="firstname" placeholder="" >
                  <p id="firstnameMandatory" style="display: none">Vorname ist ein Pflichtfeld</p>
                </div>
                <div class="col-md-6">
                  <label id="tr-lastname" for="Name">Name</label>
                  <input id="lastname" type="text" class="form-control" name="name" placeholder="" >
                  <p id="lastnameMandatory" style="display: none">Nachname ist ein Pflichtfeld</p>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label id="Username" for="exampleInputEmail1">Benutzername</label>
              <input id="inputUsername" type="" class="form-control" name="username" placeholder="" >
              <p id="usernameNoUmlaut" style="display: none">Der Benutzername darf keine Umlaute enthalten.</p>
              <p id="usernameNoSpace" style="display: none">Der Benutzername darf keine Abstände enthalten.</p>
              <p id="usernameNoSpecial" style="display: none">Der Benutzername darf keine Sonderzeichen enthalten.</p>
              <p id="usernameAleradyExist" style="display: none">Dieser Benutzername wird schon verwendet.</p>
              <p id="usernameMandatory" style="display: none">Benutzername ist ein Pflichtfeld</p>
            </div>  
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label id="lablePassword" for="Name">Passwort</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="" >
                    <!--<span id="validationLable" class="input-group-addon" id="basic-addon2">unsicher</span>-->
                    <div class="input-group-append">
                      <span id="validationLable" class="input-group-text" id="basic-addon2">unsicher</span>
                    </div>
                    
                  </div>
                  <p id="passwordValidMandatory" style="display: none">Passwort ist ein Pflichtfeld</p>
                  <p id="pw-description-id" class="pw-description">Das Passwort muss <span id="minEightChar" class="d-inline p-0 text-danger">mind. 8 Zeichen lang</span> sein und <span id="specialChar" class="d-inline p-0 text-danger">ein Sonderzeichen</span>, <span id="capitalChar" class="d-inline p-0 text-danger">einen Grossbuchstaben</span> und <span id="numberChar" class="d-inline p-0 text-danger">eine Zahl</span> enthalten.</p>
                  <p id="pw-description-id-fr" class="pw-description">Le mot de passe doit comprendre <span id="minEightChar-fr" class="d-inline p-0 text-danger">au moins 8 caractères</span> dont <span id="specialChar-fr" class="d-inline p-0 text-danger">un caractère spécial</span>, <span id="capitalChar-fr" class="d-inline p-0 text-danger">une majuscule </span> et <span id="numberChar-fr" class="d-inline p-0 text-danger">un chiffre.</span></p>
                </div>
                <div class="col-md-6">
                  <label id="tr-passwordAgain" for="Name">Passwort wiederholen</label>
                  <input id="secondPassword" type="password" class="form-control" name="2ndpassword" placeholder="" >
                  <p id="passwordNotMatch"  style="display: none">Die Passwörter stimmen nicht überein.</p>
                  <p id="passwordRepeatValidMandatory" style="display: none">Passwort wiederholen ist ein Pflichtfeld</p>
                </div> 
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h4 id="tr-requestAccess">Zugriffsrechte beantragen</h4>
              <p id="tr-manual">Suchen Sie im Suchfeld nach den Ordnern, auf die Sie Zugriff erhalten wollen, und fügen Sie diese der Liste durch Anklicken hinzu.</p>
            </div>
          </div>

          
            <div class="row">
              <div class="col-lg-6 order-lg-2">
                <ul id="groupSelectedItems" class="list-group">
                  <li class="list-group-item">&nbsp;</li>
                </ul>
              </div>
              <div class="col-lg-6 col-lg-pull-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                  </div>  
                  <!--<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>-->
                  <input type="text" class="form-control input-group-middle" aria-label="" id="myInput">
                  
                  <div class="input-group-append">
                    <button id="groupListDrop" class="btn btn-outline-secondary dropdown-toggle" type="button" id="button-addon2"></button>
                  </div>
                  
                </div><!-- /input-group -->
                <div id="myDropdown" class="dropdown-content">
                  <a id="loading" href="#about"><img src="Rolling-1s-200px.svg" class="img-small img-center"></a>
                </div>
                <p id="rightsNotChosen"  style="display: none">Sie haben noch keine Zugriffsrechte ausgewählt.</p>
              </div><!-- /.col-lg-6 -->
              
            </div><!-- /.row -->
          


          
        </div>   
        <div class="row">
          <div class="col-md-12">
          <p id="tr-notFound">Sollten Sie Ihren Bezirk nicht finden, gibt es in Ihrem Bezirk noch keinen Internen Bereich. Wenden Sie sich in diesem Fall an Ihre Pfarrperson.</p>
            <input type="hidden" id="detectedLang" name="detectedLang" value="noDetection">
            <input type="hidden" id="sendSelectedGroupItems" name="sendSelectedGroupItems" value="noDetection">
            <input type="hidden" id="job" name="job" value="addUser">
            <!--<div class="g-recaptcha" data-sitekey="6Lc0hLQUAAAAADYin5_3nQuP_VoDR0P4mcPg7VtG"></div>-->
            <button id="submit_form" type="submit" class="btn btn-primary" name="submit" value="Submit" >Zugriffsrechte beantragen</button>
            <img id="loading-img" src="Rolling-2s-200px.svg" class="img-center">
            <p id="language"></p>
          </div>
        </div>
        <div class="row">
        
        <div class="col-md-12">
        <div class="response_msg alert alert-success" style="display: none" >&nbsp;</div>
        </div></div>
        <div class="row">
        <div class="col-md-12">
        <a href="https://cloud.methodisten.ch" id="login-button" style="display: none" class="btn btn-primary" role="button">Einloggen</a>
        </div>
        </div>
      </div>
      
    </form>
    
    </div>
  </div>
</div>
<script src="jquery.min.js"></script>
<script>

var globalNewUser = true;


var lang = window.navigator.userLanguage || window.navigator.language;

if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
  $("#pw-description-id-fr").show();
  $("#pw-description-id").hide();
}else{
  $("#pw-description-id-fr").hide();
  $("#pw-description-id").show();
}

var globalList = [];
  $("#myInput").focus(function(){
    $("#myDropdown").show();
    $("#loading").hide();
    $("#myDropdown").css("overflow-y", "hidden");
    refreshList("getGroupListSearch", $('#myInput').val());
  });
  
  $("#myInput").keyup(function(){
    searchval = $("#myInput").val();
    refreshList("getGroupListSearch", searchval);
  });

  $("#myInput").focusout(function(){
    //$("#myDropdown").hide();
    $("#myDropdown").css("overflow-y", "scroll");
  });

  $("#firstname").focusout(function(){
    if($("#firstname").val() == ''){
      $("#firstname").addClass("border-red");
      $("#firstnameMandatory").show();
    } else {
      $("#firstname").removeClass("border-red");
      $("#firstnameMandatory").hide();
    }
  });

  $("#lastname").focusout(function(){
    if ($("#firstname").val() == ''){
      $("#lastname").addClass("border-red");
      $("#lastnameMandatory").show();
    }
    else{
      $("#lastname").removeClass("border-red");
      $("#lastnameMandatory").hide();
      
    }
  });

 



  $("#groupListDrop").click(function(){
    var content;
    $("#myDropdown").toggle();
    populateDropdown();
  });

  function populateDropdown() {
    console.log(globalList);
    content = "";
    if(globalList.length > 0) {
      $.each(JSON.parse(globalList), function(index, value){
        content = content + '<a href="#">'+ value +"</a>";
      });
    } else {
      content = '<span href="#"><img src="Rolling-1s-200px.svg" class="img-small img-center"></span>';
    }
    $("#myDropdown").html(content);
  }

  var groupSelectedItems = [];
  $("#myDropdown").on( "click", "a", function(){
    console.log($(this).text());
    groupSelectedItems.push($(this).text());
    $("#myDropdown").hide();
    $("#rightsNotChosen").hide();
    $("#myInput").removeClass("border-red");
    refreshGroupSelectedItems();
  });

  $("#groupSelectedItems").on( "click", "i", function(){
    var removeItem = $(this).parent().text();
    groupSelectedItems = $.grep(groupSelectedItems, function(value) {
        return value != removeItem;
    });
  
    refreshGroupSelectedItems();
  });
  var selectedTab = "";
    $('#changeForm').click(function(){
    globalNewUser = false;
    $("#hide-range").hide();
    $("#job").val('addUserRights');
    //$("#changeForm2").show();
    //$("#changeForm").hide();
    $("#changeForm2").find("a").removeClass("active");
    $("#changeForm").find("a").addClass("active");
    selectedTab = "only";
  });

  $('#changeForm2').click(function(){
    globalNewUser = true;
    $("#alreadyExist").hide();
    $("#hide-range").show();
    $("#job").val('addUser');
    //$("#changeForm").show();
    //$("#changeForm2").hide();
    $("#changeForm").find("a").removeClass("active");
    $("#changeForm2").find("a").addClass("active");
    selectedTab = "full";
  });

  
  

  function refreshGroupSelectedItems(){
    console.log(groupSelectedItems);
    $(".list-group").html("");
    if(groupSelectedItems.length < 1) {
      $(".list-group").append('<li class="list-group-item">&nbsp;</li>');
    }
    else {
      $("#sendSelectedGroupItems").val(groupSelectedItems);
      $.each(groupSelectedItems, function(index, value){
        $(".list-group").append('<li class="list-group-item">'+ value +'<i class="fas fa-times float-right"></i></li>');
      });
    }
  }

  function listFirstLoad() {
    job2 = $.post("/useradd.php", { job: 'getGroupListFull', value: '' }, function(data, status) {
      console.log(data);
      globalList = data;
      populateDropdown();
    });
  }

  var jobdone;
  var job;
  function refreshList(injob, searchval) {
    if (job){
      job.abort();
      jobdone = true;
      content = '<a href="#"><img src="Rolling-1s-200px.svg" class="img-small img-center"></a>';
      $("#myDropdown").html(content);
    }
    jobdone = false;
    job = $.post("/useradd.php", { job: injob, value: searchval }, function(data, status) {
      console.log(data);
      content = "";
      if(injob == "getGroupListFull" ){
        content = '<span href="#"><img src="Rolling-1s-200px.svg" class="img-small img-center"></span>';
      }
      if(searchval == "" && injob == "getGroupListSearch") {
        if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
          content = '<span href="#">Veuillez indiquer le terme recherché.</span>';
        }
        else {
          content = '<span href="#">Bitte Suchbegriff eingeben</span>';
        }
      }else{
      if (data === "\n[]") {
        if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
          content = '<a href="#">Aucun terme trouvé</a>';
        }else {
          content = '<a href="#">Kein Eitrag gefunden</a>';
        }
      }else {
        content = "";
      $.each(JSON.parse(data), function(index, value){
        
        content = content + '<a href="#">'+ value +"</a>";
      });
    }}
      console.log(content)
      $("#myDropdown").html(content);
      if (injob == "getGroupListSearch") {
        jobdone = true;
      }
    });
  }

  function filterFunction() {
  
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }

  $("#inputEMailAdress").focusout(function(){
      //alert("left");
      
    var fieldvalue = $("#inputEMailAdress").val();
    console.log((fieldvalue.search('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]+')));
    
    if(fieldvalue != "") {
      $("#eMailNotValidMandatory").hide();
      if(fieldvalue.search('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]+') < 0) {
        $("#inputEMailAdress").addClass("border-red");
        $("#eMailNotValid").show();
      }
      else {
        $("#inputEMailAdress").removeClass("border-red");
        $("#eMailNotValid").hide();
        //alert("NO");
      }
    }
    else{
      $("#eMailNotValidMandatory").show();
    }

    $.post("/useradd.php", {userItem: fieldvalue, job: "veryfiUser"}, function(data, status) {
      if(data == true){
        if(selectedTab != "only") {
          $("#alreadyExist").show();
        }
          $("#hide-range").hide();
          $("#job").val('addUserRights');
          $("#changeForm").find('a').addClass('active');
          $("#changeForm2").find('a').removeClass('active');
          globalNewUser = false;
      } else {
          $("#alreadyExist").hide();
          $("#hide-range").show();
          $("#job").val('addUser');
          $("#changeForm").find('a').removeClass('active');
          $("#changeForm2").find('a').addClass('active');
          globalNewUser = true;
      }
    });
  });

  $("#inputUsername").focusout(function(){
    var validate = 0
    var usernameinput = $("#inputUsername").val();
    //console.log(usernameinput.search('\s|ö|ü|ä|Ä|Ö|Ü|[^A-Za-z0-9\_]'));
    if ($("#inputUsername").val() != ''){
      $("#inputUsername").removeClass("border-red");
      $("#usernameMandatory").hide();
    } else {
      $("#inputUsername").addClass("border-red");
      $("#usernameMandatory").show();
    }

    if(usernameinput.search('^(?=.*[äöüÄÖÜ])') != -1) {
      $("#usernameNoUmlaut").show();
      $("#inputUsername").addClass('border-red');
      validate++;
    } else {
      $("#usernameNoUmlaut").hide();
      
    }
    if(usernameinput.search('^(?=.*[\\s])') != -1) {
      $("#usernameNoSpace").show();
      $("#inputUsername").addClass('border-red');
      validate++;
    } else {
      $("#usernameNoSpace").hide();
      
    }
    if(usernameinput.search('^(?=.*[^äöüa-zA-Z\\d])') != -1) {
      $("#usernameNoSpecial").show();
      $("#inputUsername").addClass('border-red');
      validate++;
    } else {
      $("#usernameNoSpecial").hide();
      
    }
    
    if(validate == 0) {
      $.post("/useradd.php", {userItem: usernameinput, job: "veryfiUser"}, function(data, status) {
        if(data == true){
          
          $("#inputUsername").addClass('border-red');
          $("#usernameAleradyExist").show();
          $('#submit_form').prop('disabled', true);
        } 
        else {
          if (validate == 0) {
          $("#inputUsername").removeClass('border-red');
        }
          $("#usernameAleradyExist").hide();
          $('#submit_form').prop('disabled', false);
        }
      });
    }
  });

  $("#password").keyup(function(){
    //alert("left");

    if($("#password") != ''){
      $("#password").removeClass("border-red");
      $("#passwordValidMandatory").hide();
    }
    else{
      $("#password").addClass("border-red");
      $("#passwordValidMandatory").show();
    }

    var fieldvalue = $("#password").val();
    console.log((fieldvalue.search('^(?=.*[A-Za-z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$')));
    console.log(fieldvalue.search('^(?=.*[A-Za-z])(?=.*\\d)(?=.*[^a-zA-Z\\d]).{8,}$'));
    
    if(fieldvalue.search('^(?=.*[A-Za-z])(?=.*\\d)(?=.*[^a-zA-Z\\d]).{8,}$') < 0) {
      $("#password").addClass("border-orange");
      if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
        $("#validationLable").text("faible");
      }else {
        $("#validationLable").text("unsicher");
      }
      
      
    }
    else {
      $("#password").removeClass("border-orange");
      if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
        $("#validationLable").text("sécurisé");
      } else {
        $("#validationLable").text("sicher");
      }
        //alert("NO");
    }
    //If at least 8 chars
    if(fieldvalue.search('^.{8,}$') < 0) {
      $("#minEightChar").addClass("text-danger"); 
      $("#minEightChar").removeClass("text-success");
      $("#minEightChar-fr").addClass("text-danger"); 
      $("#minEightChar-fr").removeClass("text-success");
    }
    else {
      $("#minEightChar").addClass("text-success"); 
      $("#minEightChar").removeClass("text-danger");
      $("#minEightChar-fr").addClass("text-success"); 
      $("#minEightChar-fr").removeClass("text-danger");
    }
    //If spechial char
    if(fieldvalue.search('^(?=.*[^ÄÖÜäöüa-zA-Z\\d])') < 0) {
      $("#specialChar").addClass("text-danger"); 
      $("#specialChar").removeClass("text-success");
      $("#specialChar-fr").addClass("text-danger"); 
      $("#specialChar-fr").removeClass("text-success");
    }
    else {
      $("#specialChar").addClass("text-success"); 
      $("#specialChar").removeClass("text-danger");
      $("#specialChar-fr").addClass("text-success"); 
      $("#specialChar-fr").removeClass("text-danger");
    }
    
    //If a Capital char
    if(fieldvalue.search('^(?=.*[ÄÖÜA-Z])') < 0) {
      $("#capitalChar").addClass("text-danger"); 
      $("#capitalChar").removeClass("text-success");
      $("#capitalChar-fr").addClass("text-danger"); 
      $("#capitalChar-fr").removeClass("text-success");
    }
    else {
      $("#capitalChar").addClass("text-success"); 
      $("#capitalChar").removeClass("text-danger");
      $("#capitalChar-fr").addClass("text-success"); 
      $("#capitalChar-fr").removeClass("text-danger");
    }
    //If a Number char
    if(fieldvalue.search('^(?=.*[0-9])') < 0) {
      $("#numberChar").addClass("text-danger"); 
      $("#numberChar").removeClass("text-success");
      $("#numberChar-fr").addClass("text-danger"); 
      $("#numberChar-fr").removeClass("text-success");
    }
    else {
      $("#numberChar").addClass("text-success"); 
      $("#numberChar").removeClass("text-danger");
      $("#numberChar-fr").addClass("text-success"); 
      $("#numberChar-fr").removeClass("text-danger");
    }
  });
  var globalPasswordCheck = true;
  $("#secondPassword").focusout(function(){
    if($("#secondPassword") != ''){
      $("#secondPassword").removeClass("border-red");
      $("#passwordRepeatValidMandatory").hide();
    }
    else{
      $("#secondPassword").addClass("border-red");
      $("#passwordRepeatValidMandatory").show();
    }

    if($("#password").val() != $("#secondPassword").val()) {
      $("#secondPassword").addClass("border-red");
      $("#passwordNotMatch").show();
      globalPasswordCheck = false;
      
    } else {
      $("#secondPassword").removeClass("border-red");
      $("#passwordNotMatch").hide();
      globalPasswordCheck = true;
    }
  });

    
  $(document).ready(function(){
    listFirstLoad();

    $("#myDropdown").css("width", $("#myInput").width() + 24); 
    
    $(window).resize(function() {
      $("#myDropdown").css("width", $("#myInput").width() + 24); 
    })

    
    //$("#language").text(lang);
    
    $("#detectedLang").val(lang);

    var lang_fr = {"login-button": 'Se connecter', 'tr-login': 'Se connecter',rightsNotChosen: 'Vous n\'avez encore sélectionné aucun droit d\'accès', passwordRepeatValidMandatory: 'La répétition du mot de passe est un champ obligatoire', passwordNotMatch: 'Les mots de passe ne correspondent pas', passwordValidMandatory: 'Le mot de passe est un champ obligatoire', usernameMandatory: 'Le nom d\'utilisateur est un champ obligatoire', usernameAleradyExist: 'Ce nom d\'utilisateur est déjà utilisé', usernameNoSpecial: 'Le nom d\'utilisateur ne doit contenir aucun caractère spécial.', usernameNoSpace: 'Le nom d\'utilisateur ne doit contenir aucun espace.', usernameNoUmlaut: 'Le nom d\'utilisateur ne doit contenir aucun tréma', lastnameMandatory: 'Le nom est un champ obligatoire', firstnameMandatory: 'Le prénom est un champ obligatoire', eMailNotValid: "L'adresse électronique n'est pas valide.", 'eMailNotValidMandatory': 'L\'adresse électronique est un champ obligatoire', mainTitle: 'Enregistrement dans le domaine interne', subTitle: 'Ce formulaire vous permet de demander des droits d’accès au domaine interne de l’EEM Suisse et/ou de votre circuit. L’accès aux dossiers correspondants est accordé par l’administrateur com-pétent en fonction de votre demande. Il vous faudra peut-être attendre quelques jours avant de bé-néficier des droits et de pouvoir consulter les dossiers désirés. L’avancement de la procédure vous sera communiqué par courriel.', 'tr-userAndAccess': 'Créer un profil d’utilisateur et demander des accès', 'tr-onlyAccess': 'Demander uniquement des droits d’accès', 'tr-firstname': 'Prénom', 'tr-lastname': 'Nom', Username: 'Nom d’utilisateur', lablePassword: 'Mot de passe', eMailAdress: 'Adresse électronique', validationLable: 'faible', 'tr-passwordAgain':'Répéter le mot de passe', 'tr-requestAccess': 'Demander des droits d’accès', 'tr-manual': 'Utilisez la zone de recherche pour chercher les dossiers que vous souhaitez consulter et ajoutez-les à la liste en cliquant dessus.', 'tr-notFound': 'Si vous ne trouvez pas votre circuit, c’est qu’il ne compte pas encore de domaine interne. Le cas échéant, adressez-vous à votre pasteur·e.' , submit_form: 'Demander des droits d’accès' };

    if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
      $.each(lang_fr, function(index, value){
        $('#'+ index).text(value);
      });
      //$("#language").append("true");
    }
    
    $("#contact-form").on("submit",function(e){
      e.preventDefault(); 
      if ($("#inputEMailAdress").val() == '') {
        $("#inputEMailAdress").addClass("border-red");
        $("#eMailNotValidMandatory").show();
      }
      else if (($("#firstname").val() == '') && (globalNewUser == true)){
        $("#firstname").addClass("border-red");
        $("#firstnameMandatory").show();
      } 
      else if (($("#lastname").val() == '') && (globalNewUser == true)){
        $("#lastname").addClass("border-red");
        $("#lastnameMandatory").show();
      }
      else if (($("#inputUsername").val() == '') && (globalNewUser == true)){
        $("#inputUsername").addClass("border-red");
        $("#usernameMandatory").show();
      }
      else if (($("#password").val() == '') && (globalNewUser == true)){
        $("#password").addClass("border-red");
        $("#passwordValidMandatory").show();
      }
      else if (($("#secondPassword").val() == '') && (globalNewUser == true)){
        $("#secondPassword").addClass("border-red");
        $("#passwordRepeatValidMandatory").show();
      }
      else if ($("#sendSelectedGroupItems").val() == 'noDetection'){
        $("#myInput").addClass("border-red");
        $("#rightsNotChosen").show();
      }
      else if (globalPasswordCheck == false){
        $("#secondPassword").addClass("border-red");
      }
      else {
        $("#eMailNotValidMandatory").hide();
        $("#firstnameMandatory").hide();
        $("#lastnameMandatory").hide();
        $("#usernameMandatory").hide();
        $("#passwordValidMandatory").hide();
        $("#passwordRepeatValidMandatory").hide();
        $("#loading-img").css("display","block");
        var sendData = $( this ).serialize();
        $.ajax({
          type: "POST",
          url: "/useradd.php",
          data: sendData,
          success: function(data){
            $("#loading-img").css("display","none");
            console.log(data);
            if (data == 1) {
              $(".response_msg").addClass("label-success");
              if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
                $(".response_msg").text("La demande a été acceptée. Les autorisations vous seront accordées après confirmation par les administrateurs concernés.");
              }else{
                $(".response_msg").text("Der Antrag wurde erfolgreich gestellt. Die Berechtigungen werden Ihnen nach Bestätigung der entsprechenden Administratoren erteilt.");
              }
              $(".response_msg").show()
              $('#login-button').show();
            }else{
              $(".response_msg").addClass("label-danger");
              $(".response_msg").show()
              $(".response_msg").text(data);
            }
          }
        });
      }
    });
  });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  
</body>
</html>