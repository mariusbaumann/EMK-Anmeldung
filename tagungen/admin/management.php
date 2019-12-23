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

  <div class="row">
    <div class="col-3">
      <img style="height: 60px" src="../../logo.jpg" />
    </div>
    <div class="col-3">
    <label id="labelStatThun" for="Name">Thun <span class="badge badge-primary">100</span></label>
      <div class="progress">
        <div id="progThunBe" class="progress-bar" role="progressbar"  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        <div id="progThunUn" class="progress-bar bg-success" role="progressbar"  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-3">
    <label id="labelStatWinterthur" for="Name">Winterthur <span class="badge badge-primary">100</span></label>
      <div class="progress">
        <div id="progWinterthurBe" class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="80"></div>
        <div id="progWinterthurUn" class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="col-3">
    <label id="labelStatZofingen" for="Name">Zofingen <span class="badge badge-primary">100</span></label>
      <div class="progress">
        <div id="progZofingenBe" class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        <div id="progZofingenUn" class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eMailSettingsModal">
  E-Mail Einstellungen
  </button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#capacitySettingsModal">
  Platzzahl Einstellungen
  </button>
  <div id="spinner" class="spinner-border"  role="status">
  <span class="sr-only">Loading...</span>
</div>
  <hr>
  <!-- Modal Platzzahl-->
  <div class="modal fade" id="capacitySettingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">E-Mail Einstellungen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div id="" class="col">
              <label id="district" for="Name">Platzzahl Thun</label>
              <input id="fieldMaxThun" type="text" class="form-control" name="district" placeholder="" >
              <label id="district" for="Name">Platzzahl Winterthur</label>
              <input id="fieldMaxWinterthur" type="text" class="form-control" name="district" placeholder="" >
              <label id="district" for="Name">Platzzahl Zofingen</label>
              <input id="fieldMaxZofingen" type="text" class="form-control" name="district" placeholder="" >
              <hr>
              <p>Durch die Einstellung der Platzzahlen wird die Kapazitätsanzeige angepasst</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">schliessen</button>
          <button id="" type="button" class="btn btn-primary saveMaxCapacity">Speichern</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal E-Mail-->
  <div class="modal fade" id="eMailSettingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">E-Mail Einstellungen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div id="" class="col">
              <label id="district" for="Name">Betreff DE</label>
              <input type="text" class="form-control" name="district" placeholder="" >
              <label id="district" for="Name">Inhalt DE</label>
              <textarea rows="4" class="form-control" name="district" placeholder="" ></textarea>
              <label id="district" for="Name">Betreff FR</label>
              <input type="text" class="form-control" name="district" placeholder="" >
              <label id="district" for="Name">Inhalt FR</label>
              <textarea rows="4" class="form-control" name="district" placeholder="" ></textarea>
              <hr>
              <p>Durch das einfügen von Tags in {}, können Variablen in den Inhalt des e-Mails eingepflegt werden. Es gibt: {firstname}, {lastname}, {confirmdate}</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">schliessen</button>
          <button type="button" class="btn btn-primary">Speichern</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Edit -->
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
    var maxThun = 0;
    var maxWinterthur = 0;
    var maxZofingen = 0;
    
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
        }],
        columns: [
          { 
            data: 'Status',
            render: function (data, type, row) {
              return (data !== "Neu") ? '<button class="btn btn-small btn-default" disabled><span class="fas fa-check-circle" ></span> Bestätigt</button>' : '<button class="btn btn-small btn-success confirm" >Bestätigen</button>';}
              //"defaultContent": '<span class="btn btn-small btn-success" >Bestätigen</span>',
          },
          { 
            data: 'confirmationmail',
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
      });
      $('#altConfirm').children('button').each(function() {
        $(this).remove();
      });
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

          setTimeout(refresh, 500);
          //console.log(data);
        } 
      });
    });

    function refresh() {
      $.ajax({
        url: "exec-settings-anzahl.php",
        dataType: 'json',
        type: 'get',
        cache:false,
        success: function(data){
          $.each(data, function(index, value){
            if (value.Setting == "maxCapThun") {
              maxThun = value.Value;
            }
            if (value.Setting == "maxCapWinterthur") {
              maxWinterthur = value.Value;
            }
            if (value.Setting == "maxCapZofingen") {
              maxZofingen = value.Value;
            }
          });
          $("#labelStatThun").find('.badge').text(maxThun);
          $("#fieldMaxThun").val(maxThun);
          $("#labelStatWinterthur").find('.badge').text(maxWinterthur);
          $("#fieldMaxWinterthur").val(maxWinterthur);
          $("#labelStatZofingen").find('.badge').text(maxZofingen);
          $("#fieldMaxZofingen").val(maxZofingen);
        },
        error: function(d){
          /*console.log("error");
          alert("404. Please wait until the File is Loaded.");*/
          //$("#list_table_json").replaceWith('<p>Du bist nicht eingeloggt</p></p><a href="admin.php"><button class="btn btn-primary">Einloggen</button></a>');
        }
        
      });
      $.ajax({
        url: "serve-table-content.php",
        dataType: 'json',
        type: 'get',
        cache:false,
        success: function(data){
          /*console.log(data);*/
          var event_data = '';
          var thunCountUn = 0;
          var thunCountBe = 0;
          var winterthurCountBe = 0;
          var winterthurCountUn = 0;
          var zofingenCountBe = 0;
          var zofingenCountUn = 0;
          var winterthurCount = 0;
          var zofingenCount = 0;
          $.each(data, function(index, value){
            console.log(index, value);
            if (value.dateprioThun == 1) {
              if (value.Status != "Bestätigt" && value.Status != "Umgebucht"){
              thunCountUn++;
            }
            }
            if (value.confAtendenceLocation == "25.1.19 Thun"){
              thunCountBe++;
            }
            if (value.dateprioWintherthur == 1) {
              if (value.Status != "Bestätigt" && value.Status != "Umgebucht"){
              winterthurCountUn++;
              }
            }
            if (value.confAtendenceLocation == "25.1.19 Winterthur"){
              winterthurCountBe++;
            }
            if (value.dateprioZofingen == 1) {
              if (value.Status != "Bestätigt" && value.Status != "Umgebucht"){
              zofingenCountUn++;
              }
            }
              if (value.confAtendenceLocation == "11.1.19 Zofingen"){
              zofingenCountBe++;
            }
            
          });
          console.log(thunCountUn);
          console.log(thunCountBe);
          console.log("W" + winterthurCountUn);
          console.log("W" + winterthurCountBe);
          

          $('#progThunBe').text(thunCountBe);
          var percentThunBe = (100/maxThun*thunCountBe) + '%';
          $('#progThunBe').css("width", String(percentThunBe));
          $('#progThunUn').text(thunCountUn);
          var percentThunUn = (100/maxThun*thunCountUn) + '%';
          $('#progThunUn').css("width", String(percentThunUn));

          $('#progWinterthurBe').text(winterthurCountBe);
          var percentWinterthurBe = (100/maxWinterthur*winterthurCountBe) + '%';
          $('#progWinterthurBe').css("width", String(percentWinterthurBe));
          $('#progWinterthurUn').text(winterthurCountUn);
          var percentWinterthurUn = (100/maxWinterthur*winterthurCountUn) + '%';
          $('#progWinterthurUn').css("width", String(percentWinterthurUn));

          $('#progZofingenBe').text(zofingenCountBe);
          var percentZofingenBe = (100/maxZofingen*zofingenCountBe) + '%';
          $('#progZofingenBe').css("width", String(percentZofingenBe));
          $('#progZofingenUn').text(zofingenCountUn);
          var percentZofingenUn = (100/maxZofingen*zofingenCountUn) + '%';
          $('#progZofingenUn').css("width", String(percentZofingenUn));

        },
        error: function(d){
          /*console.log("error");
          alert("404. Please wait until the File is Loaded.");*/
          $("#list_table_json").replaceWith('<p>Du bist nicht eingeloggt</p></p><a href="admin.php"><button class="btn btn-primary">Einloggen</button></a>');
        }
      });

      //$('#list_table_json').DataTable().ajax.reload();
      
      $('#spinner').hide();
      table.ajax.reload(null, false);
    };

    $('#capacitySettingsModal').on('click', '.saveMaxCapacity', function () {
      console.log("fu");
      
      $.post("save-capacity.php",
      {
        maxCapThun: $('#fieldMaxThun').val(),
        maxCapWinterthur: $('#fieldMaxWinterthur').val(),
        maxCapZofingen: $('#fieldMaxWinterthur').val()
      },
      function(data, status){
        console.log("Data: " + data + "\nStatus: " + status);
      })
      setTimeout(refresh, 500);

      $('#capacitySettingsModal').modal('hide');
      $('#spinner').show();

      });



    setInterval( function () {
      refresh();
    }, 30000 );
    refresh();
    });

  </script>
</body>
</html>