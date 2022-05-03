
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
  .switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}
.switch input {display:none;}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #AFAEAE;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #B6A264;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}
.on
{
  display: none;
}
.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}
input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;}
 

#form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

 

#form label {
  font-size: 10px;

}

input[type="radio"] {
  display: none;



}

label {
  color: grey;

}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
  font-size: 50px;


}

label:hover,
label:hover ~ label {
   color: #B6A264;
}

input[type="radio"]:checked ~ label {
   color: #B6A264;
   width: 
}

[class=radiocarita] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}
[class=radiocarita] + img {
  cursor: pointer;
}
[class=radiocarita]:checked + img {
  outline: 2px solid #E1D099;
  margin: 10px;
 align-items: center;
}



.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
/*  z-index: 1;  
*/  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-8">
                        <div class="card card-warning" style="background: #295379;">
                            <div class="card-header"><br>
                                <center><h3 class="card-title"><h2 style="color: white;"><b>REPORTES DE EVALUACIÓN </b></h2></h3>
                                <h3 class="card-title"><h2 style="color: #B6A264; text-align:center;"><img src="<?= base_url("assets/img/logo_blanco.png")?>"></h2></h3></center>
                              </div>

                            <div class="card-body">
                                <form id="guardar_encuesta">

                                <br>
                                <div class="row">
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <center><label style="color: white;">Fecha inicio</label></center>
                                      <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" ng-change="changefecha1()" ng-model="datos.fecha1" required>
                                  </div>
                              </div>

                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <center><label style="color: white;">Fecha final</label>;</center>
                                      <input type="date" class="form-control" name="fecha_final" id="fecha_final"  ng-change="changefecha2()" ng-model="datos.fecha2" required>
                                  </div>
                              </div>

 
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <center><label style="color: white;">Departamento</label></cetner>
                                               <select style="border:none;" name="sistema" id="sistema" class="form-control lista_sistemas" required /></select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <center><label style="color: white;"># Evaluadores</label>;</center>
                                              <input type="text" name="evaluadores" id="evaluadores" readonly class="form-control" style="width: 100%; font-weight: bold;">
                                            </div>
                                        </div>

                                       <div class="col-sm-2">
                                            <div class="form-group">
                                              <button type="button" class="enviar_datos_excel btn btn-success" style="margin-top:25px;">Exportar a Excel</button>
                                              <input type="hidden" name="valor_sistema" id="valor_sistema" class="form-control" style="width: 150%; font-weight: bold;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"><br><br></div>
                                    <div class="row">

                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;1. ¿Nuestro equipo de Soporte resolvió tu solicitud/requerimiento?</label>
                                                <div class="progress valor_uno" style="height: 5em;"></div>
                                                <!-- <div class="boton_uno" style="height: 5em;"></div> -->
                                        </div>
                                        </div> 
                                        <!-- fin pregunta -->

                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;2. En general, ¿Cuál es su grado de satisfacción con su última interacción con nuestro Equipo de Soporte?</label>
                                                <div class="progress valor_dos" style="height: 5em;"></div>
                                                 <!-- <div class="boton_dos" style="height: 5em;"></div> -->
                                        </div>
                                        </div> 
                                        <!-- fin pregunta -->

                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;3. ¿Se resolvió tu problema en un tiempo razonable?</label>
                                                <div class="progress valor_tres" style="height: 5em;"></div>
                                                 <!-- <div class="boton_tres" style="height: 5em;"></div> -->
                                        </div>
                                        </div> 
                                        <!-- fin pregunta -->

                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;4. ¿Cuántas veces ha tenido que contactar con nosotros para resolver su problema?</label>
                                                <div class="progress valor_cuatro" style="height: 5em;"></div>
                                                 <!-- <div class="boton_cuatro" style="height: 5em;"></div> -->
                                        </div>       
                                        </div>       

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;Porcentaje total de satisfacción</label>
                                                <div class="progress valor_cinco" style="height: 5em;"></div>
                                                 <!-- <div class="boton_cinco" style="height: 5em;"></div> -->
                                        </div> 
                                        </div>
                                        
                                        <!-- fin pregunta -->



                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-check-square"></i>&nbsp;Áreas</label>
                                                <textarea ype="text" id="areas" name="areas" placeholder="Áreas" style="color: #E1D099; background: none; width: 100%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"></textarea><br>
                                        </div>
                                        
                                        </div> 

                                                                                 <!-- pregunta -->
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-users"></i>&nbsp;Evaluadores</label>
                                                <textarea ype="text" id="nombres" name="nombres" placeholder="Evaluadores" style="color: #E1D099; background: none; width: 100%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"></textarea><br>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->


                                        <!-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-users"></i>&nbsp;¿Cómo evaluarías de manera general a los miembros de soporte?</label>
                                                <textarea ype="text" id="estrellas" name="estrellas" placeholder="¿Cómo evaluarías de manera general a los miembros de soporte?" style="color: #E1D099; background: none; width: 100%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"></textarea><br>
                                        </div> -->
                                        
                                        </div> 

                                        <!-- pregunta -->
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-comments"></i>&nbsp;Comentarios adicionales</label>
                                                <textarea ype="text" id="comentario" name="comentario" placeholder="Comentarios" style="color: #E1D099; background: none; width: 100%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"></textarea><br>
                                                </div>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->


                                    </div>
                                    <!-- fin row  -->
                                </form>
                            </div>
                        </div>
                    </div>



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
        $.getJSON( url2 + "Soporte/listado_sistemas").done( function( data ){
            $.each( data, function( i, v){
                $(".lista_sistemas").append('<option value="'+v.id+'" data-value="'+v.id+'">'+v.nombre+'</option>');
            });
        });
    });

$(".lista_sistemas").change( function(){
    $sistema =$(this).val();
    $("#valor_sistema").val($sistema);
    $fecha_inicio = $("#fecha_inicio").val();
    $fecha_final = $("#fecha_final").val();

     $(".valor_uno").html('');$(".valor_dos").html('');$(".valor_tres").html('');$(".valor_cuatro").html('');$(".valor_cinco").html('');

    $.getJSON( url2 + "ResultadosSoporte/respuestas_sistema/"+$sistema+"/"+$fecha_inicio+"/"+$fecha_final+"/consulta").done( function( data ){
            $.each( data, function( i, v){
 
                document.getElementById("evaluadores").value = v.total;

                 $(".valor_uno").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_1+"%';><b style='color:black;'>"+v.mas_1+"% <br></b></div><br>");
                //  $(".boton_uno").append("<input type='button' id='id_info' value='1' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_dos").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_2+"%';><b style='color:black;'>"+v.mas_2+"% <br></b></div>");
                //  $(".boton_dos").append("<input type='button' id='id_info' value='2' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_tres").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_3+"%';><b style='color:black;'>"+v.mas_3+"% <br></b></div>");
                //  $(".boton_tres").append("<input type='button' id='id_info' value='3' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_cuatro").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_4+"%';><b style='color:black;'>"+v.mas_4+"% <br></b></div>");
                //  $(".boton_cuatro").append("<input type='button' id='id_info' value='4' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_cinco").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_5+"%';><b style='color:black;'>"+v.mas_5+"% <br></b></div>");
                //  $(".boton_cinco").append("<input type='button' id='id_info' value='5' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                  $("#nombres").val(v.nombres);
                  $("#areas").val(v.areas);
                  $("#comentario").val(v.comentarios);
                  $("#estrellas").val(v.estrellas);
            });
        });
                                    // alert( $(this).val());
 
 });
 
 $(".enviar_datos_excel").click( function(){
  // document.getElementById("valor_sistema").value = elemento;
        // elemento = document.getElementById("valor_sistema");
        var elemento = $("#valor_sistema").val();
        // alert(elemento);
        window.open(url+"index.php/ResultadosSoporte/descargarExcel/"+elemento, "_blank");
    });

</script>
 </div><!-- /.container-fluid -->
    </section>
   </div>
</div>

</body>

 
 
</html>

 