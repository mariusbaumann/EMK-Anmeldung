<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <script src="https://kit.fontawesome.com/39876f8fd5.js" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


  <link rel="stylesheet" href="../style.css" >
  
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
      <a class="navbar-brand" href="#"><img style="height: 60px" src="../../logo.jpg" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li > Besucherzahl: <span id="peoble-count" class="label label-success"></span> <span class="sr-only">(current)</span></li>
        <li> Anzahl Mittagessen: <span id="lunch-count" class="label label-success"></span></li>
        <li> Deutschsprachig: <span id="de-count" class="label label-success"></span></li>
        <li> Französischsprachig <span id="fr-count" class="label label-success"></span></li>
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

<!-- MODAL Bestätigen-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Akion wählen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div id="prioConfirm" class="col">
          <p>Priorität bestätigen:</p>
        </div>
      </div>
      <div class="row">
      <div id="altConfirm" class="col">
      <p>Umbuchen auf:</p>
      <!--<button type="button" class="btn btn-primary">xxxx</button>-->
      
      </div>
      </div>
      </div>
      
    </div>
  </div>
</div>

<table id="list_table_json" class="table table-striped table-hover" >
<div id="loading-img"><img class="img-center" src="Rolling-2s-200px.svg" /></div>
<thead>
        <tr>
            <th>Bestätigung</th>
            <th>Bearbeitung</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Bezrik</th>
            <th>Fuktion</th>
            <th>E-Mail</th>
            <th>Prio Thun</th>
            <th>Prio Winterthur</th>
            <th>Prio Zofingen</th> 
            <th>Alt Thun</th>
            <th>Alt Winterthur</th>
            <th>Alt Zofingen</th>
            <th>Vegi</th>
            <th>Allergien</th>
            <th>Sprache</th>
            <th>Status</th>
            <th>definitiver Teilnameort</th>
            <th>Anmeldezeitpunkt</th>
        </tr>                   
    </thead>
</table>

</div>
<script src="../../jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
  function refresh() {
      
      $.ajax({
        url: "serve-table-content.php",
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

    $(document).ready(function load(){

     
      var table = $('#list_table_json').DataTable( {
        "iDisplayLength": 20,
        "bLengthChange": false,
        "order": [[ 6, "desc" ]],
        "language": {
            "lengthMenu": "Zeige _MENU_ Einträge pro Seite",
            "zeroRecords": "Keine Einträge gefunden",
            "info": "Seite _PAGE_ von _PAGES_",
            "infoEmpty": "Keine Einträge in der Datenbank",
            "infoFiltered": "(Gefiltert aus _MAX_ Einträgen)"
        },
        "ajax": {
          url: 'serve-table-content.php',
          dataSrc: '',
        },
        "columnDefs": [ {
            "targets": 0,
            "data": null,
            
        } ],
        columns: [
          { data: 'Status',
          render: function (data, type, row) {
            return (data !== "Neu") ? '<button class="btn btn-small btn-default" disabled><span class="fas fa-check-circle" ></span> Bestätigt</button>' : '<button class="btn btn-small btn-success confirm" >Bestätigen</button>';}
            //"defaultContent": '<span class="btn btn-small btn-success" >Bestätigen</span>',
          },
          { data: 'confirmationmail',
          render: function (data, type, row) {
            return (data == 1) ? '<button class="btn btn-small btn-default" disabled><span class="glyphicon glyphicon-ok" ></span> Bearbeiten</button>' : '<button class="btn btn-small btn-success edit" >Bearbeiten</button>';}
            //"defaultContent": '<span class="btn btn-small btn-success" >Bestätigen</span>',
          },
          { data: 'firstname' },
          { data: 'lastname' },
          { data: 'district' },
          { data: 'role' },
          { data: 'eMail' },
          { data: 'dateprioThun',
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
           },
          { data: 'dateprioWintherthur', 
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
          },
          { data: 'dateprioZofingen',
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
           },
          { data: 'datealtThun',
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
           },
          { data: 'datealtWinterthur',
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
           },
          { data: 'datealtZofingen', 
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
          },
          { data: 'vegi',
            render: function (data, type, row) {
            return (data == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>';}
           },
          { data: 'allergies' },
          { data: 'detectedLang' },
          { data: 'Status' },
          { data: 'confAtendenceLocation' },
          { data: 'timestamp' },
      ]
      
      });
      var rowData
      $('#list_table_json tbody').on( 'click', '.confirm', function () {
        
        rowData = table.row( $(this).parents('tr') ).data();
        //alert( data["id"] );

        $('#prioConfirm').children('button').each(function() {
            $(this).remove();
          }
        );

        $('#altConfirm').children('button').each(function() {
            $(this).remove();
         }
        );

        if (rowData['dateprioThun'] == 1) {
          $("#prioConfirm").append('<button id="prioThun" type="button" class="btn btn-primary confirmBtn">Samstag, 25.1.19, Thun</button>');
        }
        if (rowData['dateprioWintherthur'] == 1) {
          $("#prioConfirm").append('<button id="prioWinterthur" type="button" class="btn btn-primary confirmBtn">Samstag, 25.1.19, Winterthur</button>');
        }
        if (rowData['dateprioZofingen'] == 1) {
          $("#prioConfirm").append('<button id="prioZofingen" type="button" class="btn btn-primary confirmBtn">Samstag, 11.1.19, Zofingen</button>');
        }

        if (rowData['datealtThun'] == 1) {
          $("#altConfirm").append('<button id="altThun" type="button" class="btn btn-primary confirmBtn" data="datealtThun">Samstag, 25.1.19, Thun</button>');
        }
        if (rowData['datealtWinterthur'] == 1) {
          $("#altConfirm").append('<button id="altWinterthur" type="button" class="btn btn-primary confirmBtn" data="datealtWinterthur">Samstag, 25.1.19, Winterthur</button>');
        }
        if (rowData['datealtZofingen'] == 1) {
          $("#altConfirm").append('<button id="altZofingen" type="button" class="btn btn-primary confirmBtn" data="datealtZofingen">Samstag, 11.1.19, Zofingen</button>');
        }
        
        $('#confirmModal').modal('show');
        $(this).replaceWith('<img class="loading-small" src="../../Rolling-1s-200px.svg" />');
        
        

      });

      $('#confirmModal').on( 'click', '.confirmBtn', function () {
        
        $('#confirmModal').modal('hide');
        vConfirmDate = $(this).prop('id');

        $.ajax({
        type: "POST",
        url: 'exec-confirmationmail.php',
        data: {id: rowData['id'], confirmDate: vConfirmDate},    
        timeout: 5000,
        error: function(jqXHR, textStatus, errorThrown) {
          $('.loading-small').replaceWith('<button class="btn btn-small btn-danger" disabled><span class="glyphicon glyphicon-exclamation-sign" ></span> Fehler</button>');
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        },
        success: function (data){
          
          if(data == "1"){
            $('.loading-small').replaceWith('<button class="btn btn-small btn-default" disabled><span class="glyphicon glyphicon-ok" ></span> Bestätigt</button>');
          }else{
            $('.loading-small').replaceWith('<button class="btn btn-small btn-danger" disabled><span class="glyphicon glyphicon-exclamation-sign" ></span> Fehler</button>');
          }

          setTimeout("refresh()", 1000);
          //console.log(data);
        } 
    } );

     
      setInterval( function () {
        table.ajax.reload(null, false);
        refresh();
      }, 30000 );
      refresh();

      
  });
});

  </script>
</body>
</html>