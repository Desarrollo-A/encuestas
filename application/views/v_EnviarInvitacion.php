
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



  <style>
        @import url("https://fonts.googleapis.com/css?family=Dosis:400,700");

        :root {
            --main-white-color: #f2f2f2;
            --main-black-color: black;
            --main-purple-color: #333333;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        button {
            background: none;
            outline: none;
            cursor: pointer;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        body {
            font: 16px/1.5 "Dosis", sans-serif;
            /*IE FIX*/
            /*display: flex;
  flex-direction: column;*/
        }

        /* CONTAINER
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper>* {
            padding: 20px;
        }


        /* HEADER
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-header {
            background: var(--main-white-color);
        }

        .page-header nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .page-header ul {
            display: flex;
            order: 1;
            width: 100%;
            margin-top: 15px;
        }

        .page-header ul li:not(:last-child) {
            padding-right: 15px;
        }

        .page-header .cta-contact {
            font-family: inherit;
            font-size: 1.2rem;
            padding: 5px 18px;
            border: 1px solid;
            border-radius: 5px;
        }


        /* MAIN
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-grow: 1;
            min-height: 350px;
            background: var(--main-purple-color) url(https://encuestas.gphsis.com/assets/img/img_4.jpeg) no-repeat center / cover;
            background-blend-mode: multiply;
            color: var(--main-white-color);
        }

        .page-main div {
            max-width: 500px;
        }

        .page-main h1 {
            margin-bottom: 20px;
        }

        .page-main p+p {
            margin-top: 10px;
        }


        /* FOOTER
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-footer {
            display: flex;
            flex-direction: column-reverse;
            background: var(--main-white-color);
        }

        .page-footer ul {
            display: flex;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .page-footer ul li:not(:last-child) {
            margin-right: 20px;
        }


        /* MQ
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        @media screen and (min-width: 550px) {
            .page-header ul {
                width: auto;
                margin-top: 0;
            }

            .page-header .cta-contact {
                order: 1;
            }

            .page-footer {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .page-footer ul {
                margin-bottom: 0;
            }
        }

        @media screen and (min-width: 768px) {
            body {
                font-size: 18px;
            }

            .page-main {
                padding-left: 90px;
            }
        }
    </style>
 


</head>
<body>

<!----------------------------------------------------->


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

<div id="downloadFile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="margin-top:5px;">Descargar formato para firma</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="form_downloadfile">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Sistema</label>
                <select style="border:none;" name="id_sistema" id="id_sistema" class="form-control lista_sistemas_downloadfile" required /></select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              <button type="button" class="btn btn-info btn-block btn-lg" onclick="printResults()">Descargar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="wrapper">
        <main class="page-main">
            <div>
                <h1>Para agregar a un participante</h1>
                <p>Será necesario que selecciones un sistema o depatartamento e ingresar una dirección de correo electrónico para generar y enviar el acceso a dicha cuenta, el cual contendrá un un enlace
                    para ingresar a la evaluación.</p>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal_invitacion" style="font-size:20px;">Agregar participante</button>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#downloadFile" style="font-size:20px;">Descargar formato para firma</button>
                </div>
            </div>

        </main>
        <footer class="page-footer" style="text-align: center;">
              <center><small style="margin-left: 600px;">Ciudad Maderas | Departamento de Sistemas</small></center>
        </footer>
</div>



                                  <div id="myModal" class="modal dialog" tabindex="3">
                                    <div class="modal-content">
                                    </div>
                                </div>




  
<script type="text/javascript">
$(document).ready(function(){
    $("#fecha_inicio").change(function(){
            $('#fecha_final').val("");
            $('#sistema').val("");
            $('#evaluadores').val("");
            $('#areas').val("");
            $('#nombres').val("");
            $('#comentario').val("");
    });

    $("#fecha_final").change(function(){
            $('#sistema').val("");
            $('#evaluadores').val("");
            $('#areas').val("");
            $('#nombres').val("");
            $('#comentario').val("");
    });

    $("#sistema").change(function(){
            $('#evaluadores').val("");
            $('#areas').val("");
            $('#nombres').val("");
            $('#comentario').val("");
    });

});
 
      $(".lista_sistemas").ready( function(){

        $(".lista_sistemas").append('<option value="">Seleccione una opción</option>');
        $.getJSON( url2 + "Soporte/listado_sistemas_evaluar").done( function( data ){
            $.each( data, function( i, v){
                $(".lista_sistemas").append('<option value="'+v.id+'" data-value="'+v.id+'">'+v.nombre+'</option>');
            });
        });

        $(".lista_sistemas_downloadfile").append('<option value="">Seleccione una opción</option>');
        $.getJSON( url2 + "Soporte/lista_sistemas_downloadfile").done( function( data ){
            $.each( data, function( i, v){
                $(".lista_sistemas_downloadfile").append('<option value="'+v.id+'" data-value="'+v.id+'">'+v.nombre+'</option>');
            });
        });

        

    });

      $("#form_invitacion").submit( function(e) {
        e.preventDefault();
      }).validate({
          submitHandler: function( form ) {

              var data = new FormData( $(form)[0] );
              $.ajax({
                  url: "<?= site_url("Invitacion/invitacion_encuesta") ?>",
                  data: data,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: 'json',
                  method: 'POST',
                  type: 'POST', // For jQuery < 1.9
                  success: function(data){
                      if( data == true ){
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

    function printResults() {
        let id_sistema = $("#id_sistema").val();
        window.open("<?= site_url("Results/printResults/") ?>" + id_sistema, "_blank")
    }


 
 
</script>


 </div><!-- /.container-fluid -->
    </section>
   </div>
</div>

</body>
</html>

 