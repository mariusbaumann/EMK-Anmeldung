<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

  <style>
    .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover, .dropbtn:focus {
      background-color: #3e8e41;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      background-color: #f6f6f6;
      min-width: 230px;
      border: 1px solid #ddd;
      z-index: 1;
      margin: 2px 0px 0px 40px;
      position: absolute;
      overflow: scroll;
      overflow-y: scroll;
      overflow-x: hidden;
      max-height: 400px;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #f1f1f1}

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}

    #loading-img{
      display:none;
    }
    .response_msg{
      margin-top:10px;
      font-size:18px;
      color:#ffffff;
    }
    body {
      font-family: 'Roboto Slab', Verdana, Sans-Serif;
      line-height: 1.2;
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

    h3 {
      margin-bottom: 40px;
    }

    h5 {
      line-height: 1.4;
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
      <h1 id="mainTitle">Registration Interner Bereich</h1>
      <h5 id="subTitle">Beantragen sie hier Rechte für den Internen Bereich der EMK-Schweiz und ihrer Bezirke. Die beantragten Rechte werden nach der Bestätigung des entsprechenden Administrators erteilt. Sie werden über den Fortschritt per E-Mail benachrichtigt. </h5>
      <div class="row">
        <div class="col-md-12">
        <div class="btn-group" role="group" aria-label="...">
          <a type="button" id="changeForm2" class="btn btn-primary active" role="button">Benuzter erstellen und Rechte beantragen</a>
          <a type="button" id="changeForm" class="btn btn-primary " role="button" >Nur Rechte beantragen</a>
        </div>
        </div>
      </div>
      <form name="contact-form" action="" method="post" id="contact-form">
        <div class="form-group">
          <label id="eMailAdress" for="exampleInputEmail1">Email Adresse</label>
          <input id="inputEMailAdress" type="email" class="form-control" name="email" placeholder="" required>
          <p id="eMailNotValid" style="display: none">Die E-Mail-Adresse ist ungültig.</p>
        </div>
        <div id="alreadyExist" class="row" style="display: none">
          <div class="col-md-12">
            <p>Diese E-Mail-Adresse wurde bereits registriert. Was möchtest du tun?</p>
    
            <a href="https://cloud.methodisten.ch" class="btn btn-primary" role="button">Einloggen</a>
          </div>
        </div>
        <div id="fullform">
          <div id="hide-range">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label  for="Name">Vorname</label>
                  <input id="firstname" type="text" class="form-control" name="firstname" placeholder="" >
                </div>
                <div class="col-md-6">
                  <label  for="Name">Name</label>
                  <input id="lastname" type="text" class="form-control" name="name" placeholder="" >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label  for="exampleInputEmail1">Benutzername</label>
              <input id="username" type="" class="form-control" name="username" placeholder="" >
              <p id="usernameAleradyExist" style="display: none">Dieser Benutzername wird schon verwendet.</p>
            </div>  
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label id="lablePassword" for="Name">Passwort</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="" >
                    <span id="validationLable" class="input-group-addon" id="basic-addon2">unsicher</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label id="lastname" for="Name">Passwort wiederholen</label>
                  <input id="secondPassword" type="password" class="form-control" name="2ndpassword" placeholder="" >
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <label id="username" for="exampleInputEmail1">Rechte beantragen</label>
              <p>Suchen sie mit dem Suchfeld nach der gewünschten Berechtigung und fügen Sie diese durch Anklicken der Liste hinzu.</p>
            </div>
          </div>

          
            <div class="row">
              <div class="col-lg-6 col-lg-push-6">
                <ul id="groupSelectedItems" class="list-group">
                  <li class="list-group-item">&nbsp;</li>
                </ul>
              </div>
              <div class="col-lg-6 col-lg-pull-6">
                <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" aria-label="" id="myInput">
                  <div class="input-group-btn">
                    <button id="groupListDrop" type="button" class="btn btn-default dropdown-toggle" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
                <div id="myDropdown" class="dropdown-content">
                  <a id="loading" href="#about">Laden...</a>
                </div>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
          


          <p></p>
        </div>   
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" id="detectedLang" name="detectedLang" value="noDetection">
            <input type="hidden" id="sendSelectedGroupItems" name="sendSelectedGroupItems" value="noDetection">
            <input type="hidden" id="job" name="job" value="addUser">
            <!--<div class="g-recaptcha" data-sitekey="6Lc0hLQUAAAAADYin5_3nQuP_VoDR0P4mcPg7VtG"></div>-->
            <button id="submit_form" type="submit" class="btn btn-primary" name="submit" value="Submit" >Beantragen</button>
            <img id="loading-img" src="Rolling-2s-200px.svg" class="img-center">
            <p id="language"></p>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="response_msg label label-success" style="display: none" >&nbsp;</div>
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

  $("#myInput").focus(function(){
    $("#myDropdown").show();
    $("#loading").hide();
    $("#myDropdown").css("overflow-y", "hidden");
    refreshList("getGroupListSearch", "");
  });
  
  $("#myInput").keyup(function(){
    searchval = $("#myInput").val();
    refreshList("getGroupListSearch", searchval);
  });

  $("#myInput").focusout(function(){
    //$("#myDropdown").hide();
    $("#myDropdown").css("overflow-y", "scroll");
  });

  $("#groupListDrop").click(function(){
    $("#myDropdown").toggle();
    refreshList("getGroupListFull", "")
  });

  var groupSelectedItems = [];
  $("#myDropdown").on( "click", "a", function(){
    console.log($(this).text());
    groupSelectedItems.push($(this).text());
    $("#myDropdown").hide();
    refreshGroupSelectedItems();
  });

  $("#groupSelectedItems").on( "click", "span", function(){
    var removeItem = $(this).parent().text();
    groupSelectedItems = $.grep(groupSelectedItems, function(value) {
        return value != removeItem;
    });
  
    refreshGroupSelectedItems();
  });

  $('#changeForm').click(function(){
    $("#hide-range").hide();
    $("#job").val('addUserRights');
    //$("#changeForm2").show();
    //$("#changeForm").hide();
    $("#changeForm2").removeClass("active");
    $("#changeForm").addClass("active");

  });

  $('#changeForm2').click(function(){
    $("#alreadyExist").hide();
    $("#hide-range").show();
    $("#job").val('addUser');
    //$("#changeForm").show();
    //$("#changeForm2").hide();
    $("#changeForm").removeClass("active");
    $("#changeForm2").addClass("active");
    
  });

  
  function myFunction() {
  }

  function refreshGroupSelectedItems(){
    console.log(groupSelectedItems);
    $(".list-group").html("");
    if(groupSelectedItems.length < 1) {
      $(".list-group").append('<li class="list-group-item">&nbsp;</li>');
    }
    else {
      $("#sendSelectedGroupItems").val(groupSelectedItems);
      $.each(groupSelectedItems, function(index, value){
        $(".list-group").append('<li class="list-group-item">'+ value +'<span class="pull-right glyphicon glyphicon-remove" aria-hidden="true"></span></li>');
      });
  }
  }

  function refreshList(injob, searchval) {
    $.post("/useradd.php", { job: injob, value: searchval }, function(data, status) {
      //alert(data);
      console.log(data);
      content = "";
      $.each(JSON.parse(data), function(index, value){
        content = content + '<a href="#">'+ value +"</a>";
      });
      console.log(content)
      $("#myDropdown").html(content);
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
    console.log((fieldvalue.search('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$')));
    
    if(fieldvalue.search('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$') < 0) {
      $("#inputEMailAdress").css("border","1px solid red");
      $("#eMailNotValid").show();
    }
    else {
      $("#inputEMailAdress").css("border","");
      $("#eMailNotValid").hide();
      //alert("NO");
    }

    $.post("/useradd.php", {userItem: fieldvalue, job: "veryfiUser"}, function(data, status) {
      if(data == true){
          $("#alreadyExist").show();
          $("#hide-range").hide();
          $("#job").val('addUserRights');
          $("#changeForm2").show();
          $("#changeForm").hide();
      } else {
          $("#alreadyExist").hide();
          $("#hide-range").show();
          $("#job").val('addUser');
          $("#changeForm").show();
          $("#changeForm2").hide();
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
      } 
      else {
        $("#inputUsername").css("border","");
        $("#usernameAleradyExist").hide();
        $('#submit_form').prop('disabled', false);
      }
    });
  });

  $("#password").keyup(function(){
    //alert("left");

    var fieldvalue = $("#password").val();
    console.log((fieldvalue.search('^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&+])[A-Za-z\d@$!%*#?&+]{8,}$')));
    
    if(fieldvalue.search('^(?=.*[A-Za-z])(?=.*\\d)(?=.*[@$!%*#?&+])[A-Za-z\\d@$!%*#?&+]{8,}$') < 0) {
      $("#password").css("border","1px solid orange");
      $("#validationLable").text("unsicher");
      
    }
    else {
      $("#password").css("border","");
      $("#validationLable").text("sicher");
        //alert("NO");
    }
  });
    
  $(document).ready(function(){


    $("#myDropdown").css("width", $("#myInput").width() + 24); 
    
    $(window).resize(function() {
      $("#myDropdown").css("width", $("#myInput").width() + 24); 
    })

    var lang = window.navigator.userLanguage || window.navigator.language;
    //$("#language").text(lang);
    
    $("#detectedLang").val(lang);

    var lang_fr = { mainTitle: 'Bible, Église - Homosexualité', subTitle: 'Journée d\'étude 30 novembre 2019', separateForm: 'Veuillez remplir ce formulaire séparément pour chaque personne.', firstname: 'Prénom', lastname: 'Nom', city: 'Domicile', church: 'Paroisse', eMailAdress: 'Adresse électronique', lunch: 'Déjeuner sur place', yes:'Oui', no: 'Non', lunchInfo: 'Il y a la possibilité de manger soi-même dans les environs. Pour une participation aux frais (Fr/Euro 10.-) nous offrons un petit déjeuner sur place.',  submit_form: 'Inscrire' };

    if ( (lang == "fr-FR") || (lang == "fr-CH") || (lang == "fr")) {
      $.each(lang_fr, function(index, value){
        $('#'+ index).text(value);
      });
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
          url: "/useradd.php",
          data: sendData,
          success: function(data){
            $("#loading-img").css("display","none");
            console.log(data);
            if (data == 1) {
              $(".response_msg").addClass("label-success");
              $(".response_msg").text("Der Antrag wurde erfolgreich gestellt. Die Berechtigungen werden ihnen nach bestätigung der entsprechenden Administratoren erteilt.");
              $(".response_msg").show()
              $('#login-button').show();
            }else{
              $(".response_msg").addClass("label-danger");
              $(".response_msg").show()
              $(".response_msg").text(data);
            }
            $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
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