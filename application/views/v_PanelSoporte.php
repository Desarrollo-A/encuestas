
<!DOCTYPE html>
<html>
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Encuestas | CM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url("assets/css/font-awesome.min.css")?>">
  <link rel="stylesheet" href="<?= base_url("assets/css/ionicons.min.css")?>">
  <link rel="stylesheet" href="<?= base_url("assets/css/adminlte.min.css")?>">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>">

  <script src="<?= base_url("assets/js/jquery.min.js")?>" type="text/javascript"></script>
  <script src="<?= base_url("assets/js/bootstrap.min.js")?>" type="text/javascript"></script>
  <script src="<?= base_url("assets/js/jquery.validate.min.js")?>" type="text/javascript"></script>
  <script src="<?= base_url("assets/js/url.js")?>" type="text/javascript"></script>


  <style type="text/css">
  table th {
  text-align: center;
  font-size: 15px;
  color: #B3B6B7;
  }
  .my-custom-scrollbar {
position: relative;
height: 650px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

</style>
 


</head>
<body>

<!----------------------------------------------------->
<script>
    $(document).ready( function(){
      $("#form_invitacion").submit( function(e) {
        e.preventDefault();
      }).validate({
          submitHandler: function( form ) {

              var data = new FormData( $(form)[0] );
              $.ajax({
                  url: "<?= site_url("Invitacion/invitacion_encuesta_soporte") ?>",
                  data: data,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: 'json',
                  method: 'POST',
                  type: 'POST', // For jQuery < 1.9
                  success: function(data){
                      if( data[0] ){
                          alert("Se ha enviado con éxito la invitación al evaluador");
                          $( "#form_invitacion .form-control" ).val('');
                      }else{
                          alert("No se ha podido completar la solicitud");
                      }
                  },error: function( ){
                      alert("Error en el sistema");
                  }
              });
          }
      });
    });
  </script>

 <div id="modal_invitacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="margin-top:5px;">Generar invitación</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="form_invitacion">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Departamento a evaluar</label>
                <select style="border:none;" name="sistema_invitacion" id="sistema_invitacion" class="form-control lista_sistemas" required /></select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Correo:</label>
                <input type="mail" class="form-control" id="correo_invitacion" name="correo_invitacion" required placeholder="Ingrese su dirección de correo electrónico" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              <button type="submit" class="btn btn-info btn-block btn-lg">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
<div class="wrapper">
    <div class="content ">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning" style="background: #295379;">
                            <div class="card-header"><br>
                            <div class="col-md-8">
                                <center><h3 class="card-title"><h2 style="color: white; margin-top:60px;"><b>ESTATUS GENERAL DE SOLICITUDES ENVIADAS</b></h2></h3>
                                </div>
                            <div class="col-md-4">
                                <h3 class="card-title"><h2 style="color: #B6A264; text-align:center;"><img src="<?= base_url("assets/img/logo_blanco.png")?>"></h2></h3></center>
                              </div>
                              </div>
                            <div class="card-body">
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="general-list" style="width:100%; color:white; text-align:center;">
                            
                              <tr>
                                <th>#</th>
                                <th>Correo</th>
                                <th>Departamento</th>
                                <th>Fecha envió solicitud</th>
                                <th>Estatus</th>
                                <th>Fecha en la que se evaluó</th>
                                <th>Link de acceso</th>
                              </tr>
                              
                              </div>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>

<script>
$(".general-list").ready( function(){
  $.getJSON( url2 + "PanelSoporte/detail_surveys_sent").done( function( data ){
            $.each( data, function( i, v){
              $('.general-list tr:last').after('<tr>'+
              '<td>'+ v.idtoken+ '</td>'+
              '<td>'+ v.correo+ '</td>'+
              '<td>'+ v.departamento +'</td>'+
              '<td>'+ v.fecha_envio_invitacion +'</td>'+
              '<td>'+ v.estatus_evaluacion +'</td>'+
              '<td>'+ v.fechausado+'</td>'+
              '<td>'+ v.link+'</td>'+
              '</tr>');
            });
        });
}
);
</script>
</body>

</html> 