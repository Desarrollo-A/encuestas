
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
  
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
                                <h3 class="card-title"><h2 style="color: white; text-align:center;"><b>ENCUESTA DE EVALUACIÓN DE PROYECTOS</h2></h3>
                                <h3 class="card-title"><h2 style="color: #B6A264; text-align:center;"><img src="<?= base_url("assets/img/logo_blanco.png")?>"></h2></h3>
                            </div>

                            <div class="card-body">
                                <form id="guardar_encuesta">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;">La siguiente encuesta tiene la finalidad de evaluar los sistemas implementados en CIUDAD MADERAS. La información tratada en la misma, será de gran valor para tomar decisiones sobre el resultado.</label><br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label  style="color: white;">Evaluador:</label>
                                                <input type="text" class="form-control" name="evaluador" placeholder="Digite nombre del evaluador" required/>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;">Sistema:</label>
                                               <select style="border:none;" name="sistema" id="sistema" class="form-control lista_sistemas" required/></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12"><br><br></div>
                                    <div class="row">

                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;1. ¿El sistema desarrollado cumple con el proceso acordado?</label>
                                                
                                                <center> <label class="switch"><input type="checkbox" name="pregunta_1"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center>

                                                <input type="text" name="porque_1" placeholder="¿Por qué? (Pregunta 1)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div>
                                        <!-- fin pregunta -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;7. ¿De acuerdo a las funciones del sistema considera que fue optimo el tiempo de desarrollo?</label>
 
 
                                                <select style="border:none;" name="pregunta_7" id="pregunta_7" class="form-control pregunta-5" widht="50%" required />
                                                    <option selected="true" disabled="disabled">Seleccione una opción</option>
                                                    <option value="1" selected>NO APLICA</option>
                                                    <option value="1">SI AHORRA</option>
                                                    <option value="0">NO AHORRA</option>
                                                     
                                                </select>


                                                <BR>

 

                                                <input type="text" name="porque_7" placeholder="¿Por qué? (Pregunta 7)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div>
                                        <!-- fin pregunta -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;2. ¿Se cumplió con el objetivo buscado?</label>

                                                <center> <label class="switch"><input type="checkbox" name="pregunta_2"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                                <input type="text" name="porque_2" placeholder="¿Por qué? (Pregunta 2)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div>
                                        <!-- fin pregunta -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;8. ¿La interfaz es fácil e intuitiva?</label>

                                                <center> <label class="switch"><input type="checkbox" name="pregunta_8"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                                <input type="text" name="porque_8" placeholder="¿Por qué? (Pregunta 8)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div>
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;3. ¿El sistema contribuye al mejoramiento de tus actividades?</label>

                                                <center> <label class="switch"><input type="checkbox" name="pregunta_3"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                                <input type="text" name="porque_3" placeholder="¿Por qué? (Pregunta 3)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div>
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;9. ¿Contribuye este sistema al ahorro de papel?</label>

                                                <center> <label class="switch"><input type="checkbox" name="pregunta_9"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                                <input type="text" name="porque_9" placeholder="¿Por qué? (Pregunta 9)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div>
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;4. ¿El sistema contribuye a un mejor acceso a la información?</label>

                                                <center> <label class="switch"><input type="checkbox" name="pregunta_4"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                                <input type="text" name="porque_4" placeholder="¿Por qué? (Pregunta 4)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div> 
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;10. ¿Cómo evaluarías al sistema? (calificación de 1 a 5 estrellas. Siendo 1=Insuficiente, 2=Regular, 3=Bueno, 4=Muy Bueno y 5=Excelente)</label>

                                                <p class="clasificacion">
                                                <input id="radio1" type="radio" name="respuesta_10" value="5" >
                                                <label for="radio1" required >★</label>
                                                <input id="radio2" type="radio" name="respuesta_10" value="4">
                                                <label for="radio2">★</label>
                                                <input id="radio3" type="radio" name="respuesta_10" value="3">
                                                <label for="radio3">★</label>
                                                <input id="radio4" type="radio" name="respuesta_10" value="2">
                                                <label for="radio4">★</label>
                                                <input id="radio5" type="radio" name="respuesta_10" value="1">
                                                <label for="radio5">★</label>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- fin pregunta  -->


                                    <!-- pregunta -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;5. ¿Se optimizó y agilizó el tiempo de sus procesos?</label>

                                            <center> <label class="switch"><input type="checkbox" name="pregunta_5"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                            <input type="text" name="porque_5" placeholder="¿Por qué? (Pregunta 5)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                        </div>
                                    </div>
                                    <!-- fin pregunta  -->


                                    <!-- pregunta -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;11. ¿Cómo valora el trato recibido por el personal que le ha atendido?</label><br>

                                            <label><input class="radiocarita" type="radio" name="respuesta_11" value="1">
                                                <img src="<?= base_url("assets/img/bien.png")?>" width="50" ></label>
                                            <label><input class="radiocarita" type="radio" name="respuesta_11" value="2">
                                                <img src="<?= base_url("assets/img/regular.png")?>" width="50" ></label>
                                            <label><input class="radiocarita" type="radio" name="respuesta_11" value="3">
                                                <img src="<?= base_url("assets/img/mal.png")?>" width="50" ></label>
                                            </div>
                                        </div>
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;6. ¿Se ha mejorado el manejo y control de información dentro del departamento?</label>

                                                <center> <label class="switch"><input type="checkbox" name="pregunta_6"><div class="slider round"><span class="on">SÍ</span><span class="off">NO</span></div></label> </center> 

                                                <input type="text" name="porque_6" placeholder="¿Por qué? (Pregunta 6)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"><br>
                                            </div>
                                        </div> 
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;12. ¿Cómo valora el tiempo de respuesta?</label><br>

                                                <label><input class="radiocarita" type="radio" name="respuesta_12" value="1">
                                                    <img src="<?= base_url("assets/img/bien.png")?>" width="50" ></label>
                                                <label><input class="radiocarita" type="radio" name="respuesta_12" value="2">
                                                    <img src="<?= base_url("assets/img/regular.png")?>" width="50" ></label>
                                                <label><input class="radiocarita" type="radio" name="respuesta_12" value="3">
                                                    <img src="<?= base_url("assets/img/mal.png")?>" width="50" ></label>
                                            </div>
                                        </div> 
                                        <!-- fin pregunta  -->


                                        <!-- pregunta -->
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label style="color: white;font-weight: Normal;"><i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;Comentarios adicionales:</label>

                                                <textarea ype="text" name="comentario" placeholder="Describe algún comentario adicional que gustes añadir." style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off"></textarea><br>
                                                </div>
                                            </div>
                                            <!-- fin pregunta  -->
 

                                        <!-- pregunta -->
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block" style="border-radius: 20px;background: #C0B17F;"><b style="color: white;">Enviar resultados</b></button>
                                                </div>
                                            </div>
                                            <!-- fin pregunta  -->
 

                                        </div> 
                                    </div>
                                    <!-- fin row  -->
 
                                </form>
 
                            </div>
                        </div>
                    </div>



                </div>

 <div id="myModal" class="modal info" data-backdrop="static" data-keyboard="false" tabindex="3"><div class="modal-content">
                                               <center><h1>¡Agradecemos su participación!</h1><br>
                                               <h3 style="color: #E9AC09;"><b>Puede cerrar esta ventana.</b></h3></center><br>
                                               <center><img src="<?= base_url("assets/img/team.png")?>" style="width: 30%;" ></center>
                                                <h3><p style="text-align:center;">Sus respuestas se han enviado correctamente, agradecemos su tiempo brindado a esta encuesta, la cual fue elaborada con la finalidad de seguir mejorando y brindarles un mejor servicio.<BR><BR></p><br><p style="text-align:center;"><strong>Sistemas Desarrollo</strong> Ciudad Maderas.</p><br>
                                                </h3>
                                            </div>
                                        </div>
<script type="text/javascript">

 //SE MODIFICO LA LINEA DE LA CONSULTA PARA TOMAR SOLO LOS PROYECTO QUE VA A EVALUAR EN ESTA INVITACION.
      $(".lista_sistemas").ready( function(){
        //SE AGREGO DIRECTAMENTE LA INVITACION PARA EL SISTEMA A EVALUAR
        $.getJSON( url2 + "Login/listado_sistemas_encuesta/<?= $this->uri->segment( 3 ) ?>").done( function( data ){
            $.each( data, function( i, v ){
                $(".lista_sistemas").append('<option value="'+v.id+'" data-value="'+v.id+'">'+v.nombre+'</option>');
            });
        });
    });

//VARIABLE GLOBAL CON EL VALOR DEL TOKEN A USAR PARA LA ENCUESTA
    var token = "<?= $this->uri->segment( 3 ) ?>";

  $("#guardar_encuesta").submit( function(e) {
    e.preventDefault();
}).validate({
    submitHandler: function( form ) {

        var data = new FormData( $(form)[0] );
        //AGREGA EL TOKEN A USAR AL CONCLUIR EL LLENADO DE LA ENCUESTA;
        data.append( "token", token );
        $.ajax({
            url: url2 + "Login/guardar_resultados_encuesta",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            method: 'POST',
                type: 'POST', // For jQuery < 1.9validar 
                success: function(data){
                    if( data.resultado ){ 
                            llamar_fun();
                    }else{
                        alert("NO SE HA PODIDO COMPLETAR LA SOLICITUD");
                    }
                },error: function( ){
                    alert("VERIFIQUE SUS RESPUESTAS, HAY UNA NO SELECCIONADA.");
                }
            });
    }
});

</script>
<script type="text/javascript">
  function  llamar_fun(){
    // alert("llega a la funcion");
    // alert("se logró");
       
    $('#myModal').modal('show');
 
}

</script>




            </div><!-- /.container-fluid -->
    </section>
   </div>

   <footer class="main-footer" style="text-align:center;">
       <strong >Ciudad Maderas TI & MKTD | <a href="" style="color: #C0B17F;">Areá de Desarrollo</a>.</strong>
  </footer>

</div>


 
</body>
</html>
