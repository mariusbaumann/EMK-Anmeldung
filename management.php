<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  
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
    .navbar-nav {
        margin-top: 20px;
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
    th {
        padding-left: 0px !important;
    }
    .img-center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
  </style>
</head>
<body>

<div class="container-fluid">
<nav class="navbar navbar-default">
  <div class="container-fluid">
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
        <li ><a href="#">Besucherzahl: <span id="peoble-count" class="label label-success"></span> <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Anzahl Mittagessen: <span id="lunch-count" class="label label-success"></span></a></li>
        <li><a href="#">Deutschsprachig: <span id="de-count" class="label label-success"></span></a></li>
        <li><a href="#">Französischsprachig <span id="fr-count" class="label label-success"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Benutzer<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="containter-fluid">
<table id="list_table_json" class="table table-striped table-hover" >
<div id="loading-img"><img class="img-center" src="Rolling-2s-200px.svg" /></div>
<thead>
        <tr>
            <th>Name</th>
            <th>Vorname</th>
            <th>e-Mail</th>
            <th>Kirchgemeinde</th>
            <th>Wohnort</th>
            <th>Anmeldezeitpunkt</th>
            <th>Mittagessen</th>
            <th>Sprache</th>                
        </tr>                   
    </thead>
</table>

</div>
<script src="jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js></script>
  <script>
    $(document).ready(function load(){
      var table = $('#list_table_json').DataTable( {
        "iDisplayLength": 20,
        "bLengthChange": false,
        "order": [[ 5, "desc" ]],
        "language": {
            "lengthMenu": "Zeige _MENU_ Einträge pro Seite",
            "zeroRecords": "Keine Einträge gefunden",
            "info": "Seite _PAGE_ von _PAGES_",
            "infoEmpty": "Keine Einträge in der Datenbank",
            "infoFiltered": "(Gefiltert aus _MAX_ Einträgen)"
        },
        "ajax": {
          url: '/serve-table-content.php',
          dataSrc: '',
        },
        columns: [ 
          { data: 'name' },
          { data: 'firstname' },
          { data: 'email' },
          { data: 'church' },
          { data: 'city' },
          { data: 'timestamp' },
          { data: 'lunch', 
          render: function (data, type, row) {
            return (data == 1) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';}
          },
          { data: 'lang',
          render: function (data, type, row) {
            return '<span class="label label-success">'+data+'</span>';}
          }
      ]
      });
      setInterval( function () {
        table.ajax.reload();
        refresh();
      }, 30000 );
      refresh();
      function refresh() {
      
      $.ajax({
        url: "/serve-table-content.php",
        dataType: 'json',
        type: 'get',
        cache:false,
        success: function(data){
          /*console.log(data);*/
          var event_data = '';
          var lunchcount = 0;
          var frcount = 0;
          var decount = 0;
          $.each(data, function(index, value){
              if (value.lunch == true) {
                  lunchcount++;
              }
              if ((value.lang == "de") || (value.lang == "de-CH") || (value.lang == "de-DE")) {
                decount++;
              }
              if ((value.lang == "fr") || (value.lang == "fr-CH") || (value.lang == "fr-FR")) {
                frcount++;
              }
          });
          $('#peoble-count').text(data.length);
          $('#lunch-count').text(lunchcount);
          $('#de-count').text(decount);
          $('#fr-count').text(frcount);
        },
        error: function(d){
            /*console.log("error");
            alert("404. Please wait until the File is Loaded.");*/
            $("#list_table_json").replaceWith('<p>Du bist nicht eingeloggt</p></p><a href="admin.php"><button class="btn btn-primary">Einloggen</button></a>');
        }
    });
  };
  });

  </script>
</body>
</html>