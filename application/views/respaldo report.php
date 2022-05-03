  <?php
    require("header.php");
?>  
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url("css/login.css")?>">
 --><!--  
<link href="<?= base_url("assets/css/main.css")?>" rel="stylesheet" />
<link href="<?= base_url("assets/css/util.css")?>" rel="stylesheet" /> -->
 
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

/*------ ADDED CSS ---------*/
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

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}



  p.clasificacion {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

p.clasificacion input {
  position: absolute;
  top: -100px;
}

p.clasificacion label {
  float: right;
  color: #333;
}

p.clasificacion label:hover,
p.clasificacion label:hover ~ label,
p.clasificacion input:checked ~ label {
  color: #B6A264;
}
</style>
 
<body style="background-color: white;">

    
    <div class="col-md-5 col-md-offset-1">
        <div class="content" style="background: #295379">
    <div class="container-fluid">
        <div class="row" >
            <div class="col">
                <div class="box">
                    <div class="box-header with-border">
                        <br>
                    </div>
                    <div class="box-body">
                        <form>

                          <!--   <div class="row">
                                <div class="col-md-12">
                                <center><img src="<?= base_url("assets/img/logo_blanco_cdm.png")?>" style="width: 250px; height: 80px"><br><br>
                                        <h2 style="color: white;"><b>ENCUESTA DE EVALUACIÓN</b></h2><br>

                                        <h5 style="color: white;">La siguiente encuesta tiene la finalidad de evaluar los sistemas implementados en CIUDAD MADERAS. La información tratada en la misma, será de gran valor para tomar decisiones sobre el resultado.</h5><br></center>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="form-group col-md-6">
                                    <label style="color: white;">Evaluador:</label>
                                    <input type="text" class="form-control" id="" placeholder="Nombre del evaluador">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label style="color: white;">Sistema a evaluar:</label>
                                    <select class="form-control"></select>
                                </div>
                            </div> -->

                             <!-- <div class="row">
                                <div class="form-group col-md-12">
                                     <br>
                                </div>
                            </div> -->

  

                             <!-- <div class="row">

                          <div class="col-md-12"><br></div>
                            <div class="col-md-6">
                             <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;1. ¿El Sistema desarrollado cumple con el proceso acordado?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta1"  id="pregunta1"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque1" name="porque1" placeholder="¿Por qué?  (Pregunta 1)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off" > 

                            </div>

                           <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;2. ¿Con esta nueva forma de trabajo se optimizó y agilizó el tiempo en sus procesos? </label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta2"  id="pregunta2"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque2" name="porque2" placeholder="¿Por qué?  (Pregunta 2)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control"autocomplete="off" > 

                            </div>


                        </div> -->
                        <!--  <div class="col-md-12"><br><br></div>
                      
                        <div class="row">
                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;3. ¿Contribuye este sistema al ahorro de papel?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta3"  id="pregunta3"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              
                            </div>


                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;4. ¿Contribuye a la mejora en el manejo y control de información dentro de su departamento?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta4"  id="pregunta4"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              

                            </div>


                            </div> -->

                            <!-- <div class="col-md-12"><br><br></div>
                           <div class="row">
                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;5. ¿La interfaz del sistema es fácil e intuitiva?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta5"  id="pregunta5"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque5" name="porque5" placeholder="¿Por qué?  (Pregunta 5)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off" > 

                            </div>


                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;6. ¿El Sistema Contribuye al mejoramiento de tus tareas?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta6"  id="pregunta6"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque6" name="porque6" placeholder="¿Por qué?  (Pregunta 6)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control"autocomplete="off" > 

                            </div>

                            
                            </div> -->
<!-- 
<div class="col-md-12"><br><br></div>
                         <div class="row">
                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;7. ¿El Sistema contribuye a un mejor acceso a la información?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta7"  id="pregunta7"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque7" name="porque7" placeholder="¿Por qué?  (Pregunta 7)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off" > 

                            </div>


                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;8. ¿El sistema desarrollado cumplió con el objetivo buscado?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta8"  id="pregunta8"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque8" name="porque8" placeholder="¿Por qué?  (Pregunta 8)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off" > 

                            </div>

                            
                            </div> -->
                            <!-- <div class="col-md-12"><br><br></div>

                           <div class="row">
                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;9. ¿El sistema fue desarrollado en el tiempo programado?</label><br><br>
                              <center> <label class="switch"><input type="checkbox" ng-model="data.pregunta9"  id="pregunta9"><div class="slider round"><span class="on">SI</span><span class="off">NO</span></div></label> </center> 
                              <input type="text" ng-model="data.porque9" name="porque9" placeholder="¿Por qué?  (Pregunta 9)" style="color: #E1D099; background: none; width: 80%; border-right:none;border-left:none;border-top:none;" class="form-control" autocomplete="off" > 

                            </div>


                            <div class="col-md-6">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;10. ¿Cómo evaluarías al sistema?</label><br>

                             <p class="clasificacion" style="font-size: 50px;">
  <input  ng-model="data.radio" id="radio1" type="radio" name="radio1" value="5">
  <label for="radio1">★</label>
  <input  ng-model="data.radio" id="radio2" type="radio" name="radio2" value="4">
  <label for="radio2">★</label>
  <input  ng-model="data.radio" id="radio3" type="clasificacion" name="clasificacion3" value="3">
  <label for="radio3">★</label>
  <input  ng-model="data.radio" id="radio4" type="radio" name="radio4" value="2">
  <label for="radio4">★</label>
  <input  ng-model="data.radio" id="radio5" type="radio" name="radio5" value="1">
  <label for="radio5">★</label>
</p> 
                              
                            </div>
                            </div> -->
 
                            <!--   <div class="col-md-12"><br><br></div>

                           <div class="row">
                            <div class="col-md-12">
                              <label style="color: #fff"> <i style="color: #B6A264" class="fa fa-question-circle"></i>&nbsp;11. Comentarios adicionales</label><br><br>
                               
                              <textarea type="text" ng-model="data.porque11" name="porque11" placeholder="Comentarios" style="color: #E1D099; background: none; width: 100%; border-right:none;border-left:none;border-top:none;" class="form-control"autocomplete="off" >  </textarea> 

                            </div>
 
                            </div> -->



 
                       
                        <button type="submit" class="btn btn-primary">Enviar resultados</button><br>
                        <div class="col-md-12">
                             <br>

                            </div>
                    </form>
                    </div><!--End tab content-->
                </div><!--end box-->
            </div>
        </div>
    </div>
</div>
</div>
 </body>
</html>
