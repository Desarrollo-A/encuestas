
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
                  url: "<?= site_url("Invitacion/invitacion_encuesta") ?>",
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
                <label>Sistema:</label>
                <select style="border:none;" name="sistema_invitacion" id="sistema_invitacion" class="form-control listado_sistemas" required/></select>
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
 <!----------------------------------------------------->
<div class="wrapper">
    <div class="content ">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-8">
                        <div class="card card-warning" style="background: #295379;">
                            <div class="card-header">
                                <center><h3 class="card-title"><h2 style="color: white;"><b>REPORTES DE EVALUACIÓN </b></h2></h3>
                                <h3 class="card-title"><h2 style="color: #B6A264; text-align:center;"><img src="<?= base_url("assets/img/logo_blanco.png")?>"></h2></h3></center>
                              </div>

                            <div class="card-body">
                                <form id="guardar_encuesta">
                                    

                                    <div class="row">
 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;">Sistema:</label>
                                               <select style="border:none;" name="sistema" id="sistema" class="form-control listado_sistemas lista_sistemas" required/></select>
                                            </div>
                                        </div>


                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="color: white;">Evaluadores</label>;
                                              <input type="text" name="evaluadores" id="evaluadores" readonly class="form-control" style="width: 100%; font-weight: bold;">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
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
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;1. ¿El sistema desarrollado cumple con el proceso acordado?</label>
                                                <div class="progress valor_uno" style="height: 5em;"></div>
                                                <div class="boton_uno" style="height: 5em;"></div>

                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->


                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;2. ¿Se cumplió con el objetivo buscado?</label>
            
                                                <div class="progress valor_dos" style="height: 5em;"></div>
                                                 <div class="boton_dos" style="height: 5em;"></div>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->




                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;3. ¿El sistema contribuye al mejoramiento de tus actividades?</label>
            
                                                <div class="progress valor_tres" style="height: 5em;"></div>
                                                 <div class="boton_tres" style="height: 5em;"></div>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->



                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;4. ¿El sistema contribuye a un mejor acceso a la información?</label>
            
                                                <div class="progress valor_cuatro" style="height: 5em;"></div>
                                                 <div class="boton_cuatro" style="height: 5em;"></div>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->



                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;5. ¿Se optimizó y agilizó el tiempo de sus procesos?</label>
            
                                                <div class="progress valor_cinco" style="height: 5em;"></div>
                                                 <div class="boton_cinco" style="height: 5em;"></div>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->



                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;6. ¿Se ha mejorado el manejo y control de información dentro del departamento?</label>
            
                                                <div class="progress valor_seis" style="height: 5em;"></div>
                                                 <div class="boton_seis" style="height: 5em;"></div>
 
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->




                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;7. ¿De acuerdo a las funciones del sistema considera que fue optimo el tiempo de desarrollo?</label>
            
                                                <div class="progress valor_siete" style="height: 5em;"></div>
                                                 <div class="boton_siete" style="height: 5em;"></div>
 
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->



                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;8. ¿La interfaz es fácil e intuitiva?</label>
            
                                                <div class="progress valor_ocho" style="height: 5em;"></div>
                                                 <div class="boton_ocho" style="height: 5em;"></div>

                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->


                                         <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;9. ¿Contribuye este sistema al ahorro de papel?</label>
            
                                                <div class="progress valor_nueve" style="height: 5em;"></div>
                                                 <div class="boton_nueve" style="height: 5em;"></div>
                                        </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->


                                          <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;10. ¿Cómo evaluarías al sistema?</label>
            
                                                     
                                                    <p class="clasificacion">
                                                <input disabled type="radio" >
                                                <label for="radio1">★</label>
                                                <input disabled type="radio">
                                                <label for="radio2">★</label>
                                                <input disabled type="radio">
                                                <label for="radio3">★</label>
                                                <input disabled type="radio">
                                                <label for="radio4">★</label>
                                                <input disabled type="radio">
                                                <label for="radio5">★</label>
                                            </p>

                                            <div class="valor_diez" style="height: 5em;"></div>
 
                                         </div>
                                        
                                        </div> 
                                        <!-- fin pregunta -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp; 11. ¿Cómo valora el trato recibido por el personal que le ha atendido?</label>
            
                                                <div class=" valor_once" style="height: 5em;">
                                                     <br> 
                                                </div>
                                         </div>
                                        </div> 
                                        <!-- fin pregunta -->
 
                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp; 12. ¿Cómo valora el tiempo de respuesta?</label>
            
                                                <div class=" valor_doce" style="height: 5em;">
                                                     <br> <br>
                                                </div>
                                         </div>
                                        </div> 
                                        <!-- fin pregunta -->



                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;13. Comentarios adicionales</label>

                                                <div class="valor_trece" style="height: 5em;">
                                                     
                                                </div>
 
                                            </div>
                                        </div>
                                        
                                        <!-- fin pregunta -->

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;Nivel de Satisfacción</label>
                                                <div class="progress valor_catorce" style="height: 5em;">
                                                     
                                                </div>
 
                                            </div>
                                        
                                        </div> 

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




  
<script>

 
      $(".listado_sistemas").ready( function(){
        $(".listado_sistemas").append('<option value="">Seleccione una opción</option>');
        $.getJSON( url2 + "Login/listado_sistemas").done( function( data ){
            $(".listado_sistemas").append('<option value="100">TODOS</option>');
            $.each( data, function( i, v){
                $(".listado_sistemas").append('<option value="'+v.id+'" data-value="'+v.id+'">'+v.nombre+'</option>');
            });
        });
    });

$(".lista_sistemas").change( function(){
    $sistema =$(this).val();
    $("#valor_sistema").val($sistema);

     $(".valor_uno, .boton_uno").html('');$(".valor_dos, .boton_dos").html('');$(".valor_tres, .boton_tres").html('');$(".valor_cuatro, .boton_cuatro").html('');
     $(".valor_cinco, .boton_cinco").html('');$(".valor_seis, .boton_seis").html('');$(".valor_siete, .boton_siete").html('');$(".valor_ocho, .boton_ocho").html('');
     $(".valor_nueve, .boton_nueve").html('');$(".valor_diez, .valor_once, .valor_doce, .valor_trece, .valor_catorce").html(''); 
     $("#evaluadores").html('');  

    $.getJSON( url2 + "Home/respuestas_sistema/"+$sistema).done( function( data ){

            var v = data[0];

            //$.each( data, function( i, v){
 
                document.getElementById("evaluadores").value = v.total;

                 $(".valor_uno").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_1+"%';><b style='color:black;'>"+v.mas_1+"% <br>(SI)</b></div><br>");
                 $(".boton_uno").append("<input type='button' id='id_info' value='1' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_dos").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_2+"%';><b style='color:black;'>"+v.mas_2+"% <br>(SI)</b></div>");
                 $(".boton_dos").append("<input type='button' id='id_info' value='2' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_tres").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_3+"%';><b style='color:black;'>"+v.mas_3+"% <br>(SI)</b></div>");
                 $(".boton_tres").append("<input type='button' id='id_info' value='3' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_cuatro").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_4+"%';><b style='color:black;'>"+v.mas_4+"% <br>(SI)</b></div>");
                 $(".boton_cuatro").append("<input type='button' id='id_info' value='4' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_cinco").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_5+"%';><b style='color:black;'>"+v.mas_5+"% <br>(SI)</b></div>");
                  $(".boton_cinco").append("<input type='button' id='id_info' value='5' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_seis").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_6+"%';><b style='color:black;'>"+v.mas_6+"% <br>(SI)</b></div>");
                  $(".boton_seis").append("<input type='button' id='id_info' value='6' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_siete").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_7+"%';><b style='color:black;'>"+v.mas_7+"% <br>(SI)</b></div>");
                  $(".boton_siete").append("<input type='button' id='id_info' value='7' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_ocho").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_8+"%';><b style='color:black;'>"+v.mas_8+"% <br>(SI)</b></div>");
                  $(".boton_ocho").append("<input type='button' id='id_info' value='8' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");

                 $(".valor_nueve").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+v.mas_9+"%';><b style='color:black;'>"+v.mas_9+"% <br>(SI)</b></div>");
                  $(".boton_nueve").append("<input type='button' id='id_info' value='9' class='boton_info btn btn-success' data-value='"+v.sistema+"'>");


                 $(".valor_diez").append("<span class='form-control bg-green' style='width:30%;'>Promedio: "+v.prom_estrellas+"</span>");

                 $(".valor_once").append("<center><img src='<?= base_url('assets/img/bien.png')?>' width='50'><label style='color:white;'>"+v.bien_11+"</label>&nbsp;&nbsp;&nbsp;&nbsp;<img src='<?= base_url('assets/img/regular.png')?>' width='50'><label style='color:white;'>"+v.regu_11+"</label>&nbsp;&nbsp;&nbsp;&nbsp;<img src='<?= base_url('assets/img/mal.png')?>' width='50' ><label style='color:white;'>"+v.mal_11+"</label></center>");

                  $(".valor_doce").append("<center><img src='<?= base_url('assets/img/bien.png')?>' width='50'><label style='color:white;'>"+v.bien_12+"</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='<?= base_url('assets/img/regular.png')?>' width='50'><label style='color:white;'>"+v.regu_12+"</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='<?= base_url('assets/img/mal.png')?>' width='50' ><label style='color:white;'>"+v.mal_12+"</label></center>");


                   $(".valor_trece").append("<input type='button' id='id_comentario' value='19' class='boton_comn btn btn-success' data-value='"+v.sistema+"'>");
                   

                  //EL VALOR DE CADA REACTIVO 8.33

                  /*SUMATORIA DE SATISFACCION*/
                   var satisfaccion_total = 0;
                   var valResp10 = 0;
                   var valResp11 = 0;
                   var valResp12 = 0;

                   satisfaccion_total += v.mas_1 / 100 * 8.33;
                   satisfaccion_total += v.mas_2 / 100 * 8.33;
                   satisfaccion_total += v.mas_3 / 100 * 8.33;
                   satisfaccion_total += v.mas_4 / 100 * 8.33;
                   satisfaccion_total += v.mas_5 / 100 * 8.33;
                   satisfaccion_total += v.mas_6 / 100 * 8.33;
                   satisfaccion_total += v.mas_7 / 100 * 8.33;
                   satisfaccion_total += v.mas_8 / 100 * 8.33;
                   satisfaccion_total += v.mas_9 / 100 * 8.33;


                  
                   // satisfaccion_total += v.prom_estrellas * .20 * 8.33;


                   if (v.respuesta_11 == 1) {
                      valResp11 = 8.33;
                    } else if (v.respuesta_11 == 2) {
                      valResp11 = 4.165;
                    } else if (v.respuesta_11 == 3) {
                      valResp11 = 2.0825;
                    }

                    if (v.respuesta_12 == 1) {
                      valResp12 = 8.33;
                    } else if (v.respuesta_12 == 2) {
                      valResp12 = 4.165;
                    } else if (v.respuesta_12 == 3) {
                      valResp12 = 2.0825;
                    }

                    if (v.respuesta_10 == 1) {
                      valResp10 = 1.660;
                    } else if (v.respuesta_10 == 2) {
                      valResp10 = 3.332;
                    } else if (v.respuesta_10 == 3) {
                      valResp10 = 4.998;
                    } else if (v.respuesta_10 == 4) {
                      valResp10 = 6.664;
                    } else if (v.respuesta_10 == 5) {
                      valResp10 = 8.33;
                    }

                   /*satisfaccion_total += (v.bien_11 + ( v.regu_11 * .5 )) / ( v.bien_11 + v.regu_11 ) * 8.33;
                   satisfaccion_total += (v.bien_12 + ( v.regu_12 * .5 )) / ( v.bien_11 + v.regu_11 ) * 8.33;*/


                  satisfaccion_total += valResp10;
                  satisfaccion_total += valResp11;
                  satisfaccion_total += valResp12;

                   $(".valor_catorce").append("<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:"+satisfaccion_total+"%';><b style='color:black;'>"+satisfaccion_total+"%</b></div>");
                  /*-------------------------*/
            //});
        });
                                    // alert( $(this).val());
 
 });
 

 
$('.boton_info').on("click", function() {
 $('#myModal .modal-content').html('');
  valor1 = $(this).val();
  valor2 = $("#id_info").attr("data-value");
 
   $.getJSON( url2 + "Login/datos_porque/"+valor1+'/'+valor2).done( function( data ){


if(data!=0){
    $('#myModal .modal-content').append('<center><h3>Comentarios pregunta '+valor1+'</h3><br><img src="<?= base_url("assets/img/form.png")?>" width="120"></center>');
            $.each( data, function( i, v){
                 jQuery.noConflict();
                $('#myModal').modal('show');

                $('#myModal .modal-content').append('<label> Respuesta: '+v.porq+'</label><br>');
            });
        }
        else{
            alert("No hay comentarios");
        }
 
        });
 
});



$('.boton_comn').on("click", function() {
 
 
  valor2 = $("#id_info").attr("data-value");
  

   $.getJSON( url2 + "Login/datos_comentario/"+valor2).done( function( data ){


    if(data!=0){
    $('#myModal .modal-content').append('<center><h3>Comentarios adicionales</h3><br><img src="<?= base_url("assets/img/form.png")?>" width="120"></center>');
            $.each( data, function( i, v){
                jQuery.noConflict();
                $('#myModal').modal('show');

                $('#myModal .modal-content').append('<label> Comentarios: '+v.comentario_adicional+'</label><br>');
            });
        }
        else{
            alert("No hay comentarios");
        }



        
    
        });
 
});

// $(document).ready( function(){
//   $("#valor_sistema").change( function(){
//     //var syst = $("#valor_sistema").val();
//     alert($("#valor_sistema").val());
//     //if(syst == "" || syst == null){
//     //  $('.enviar_datos_excel').attr("disabled"); 
//     //} else{
//     //  $('.enviar_datos_excel').removeAttr("disabled"); 
//     //}
//   });
// });


$(".enviar_datos_excel").click( function(){
  // document.getElementById("valor_sistema").value = elemento;
        // elemento = document.getElementById("valor_sistema");
        var elemento = $("#valor_sistema").val();
        // alert(elemento);
        window.open(url+"index.php/Home/descargarExcel/"+elemento, "_blank");
    });
</script>
 </div><!-- /.container-fluid -->
    </section>
   </div>
</div>

</body>

 
 
</html>

 