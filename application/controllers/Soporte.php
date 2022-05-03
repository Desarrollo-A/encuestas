<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soporte extends CI_Controller {
  
  public function __construct(){
    //AQUI TENIA UNA VALIDACION DE INICIO DE SESSION SE RETIRO
    parent::__construct();
    $this->load->model( array('Soporte_model', 'Token') );  
  }
  public function Encuesta(){
    //VERIFICACION SI TIENE UNA INVITACION ACTIVA
    if( $this->Token->invitacion( $this->uri->segment( 3 ) )->num_rows() > 0 ){
      $this->load->view('v_Soporte');
    //RESULTADO NEGATIVO AL NO TENER UNA INVITACION ACTIVA DESDE ESTA PARTE ES POSIBLE LLAMAR OTRA VISTA MAS ELEGANTE
    }else{
      echo '<!DOCTYPE html>
      <html lang="en">
      
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Obtener invitación</title>
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
      
          <div class="wrapper">
              <!-- <header class="page-header">
                                <nav>
                                  <h2 class="logo">LOGO</h2>
                                  <ul>
                                    <li>
                                      <a href="">Work</a>
                                    </li>
                                    <li>
                                      <a href="">Services</a>
                                    </li>
                                    <li>
                                      <a href="">Team</a>
                                    </li>
                                    <li>
                                      <a href="">Careers</a>
                                    </li>
                                  </ul>
                                  <button class="cta-contact">Get in touch</button>
                                </nav>
                              </header> -->
              <main class="page-main">
                  <div>
                      <h1>Actualmente no tiene permiso de acceso a esta página.</h1>
                      <p>Para desbloquear el contenido será necesario que obtengas una nueva invitación.</p>
                      <p>La cual se generará y envirá a la dirección de correo electrónico que hayas ingresado, donde encontrarás un enlace
                          para ingresar a la evaluación.</p>
                  </div>
              </main>
              <footer class="page-footer" style="text-align: center;">
              <center><small style="margin-left: 600px;">Ciudad Maderas | Departamento de Sistemas</small></center>
              </footer>
          </div>
      
      </body>
      
      </html>';
    }
  }

  public function listado_sistemas(){
    echo json_encode($this->Soporte_model->get_sistemas_lista()->result_array());
   }

   public function listado_sistemas_evaluar(){
    echo json_encode($this->Soporte_model->get_todos_sistemas_evaluar()->result_array());
   }

  public function listado_todos_sistemas(){
    echo json_encode($this->Soporte_model->get_todos_sistemas_lista()->result_array());
   }

  //NUEVA CONSULTA CON EL LISTADO DE LOS SISTEMAS A EVALUAR
  public function listado_sistemas_encuesta( $token ){
      echo json_encode($this->Soporte_model->get_sistemas_lista_encuesta( $token )->result_array());
     }

  public function datos_porque($val1, $val2){
      echo json_encode($this->Soporte_model->get_porque_lista($val1, $val2)->result_array());
     }

  public function datos_comentario($valor2){
      echo json_encode($this->Soporte_model->get_comen_lista($valor2)->result_array());
     }
     
  public function guardar_resultados_encuesta(){

        $this->load->model("Soporte_model");
        if($this->input->post("pregunta_1")==null){$respuesta_1 = 2;}else{$respuesta_1 = 1;}
        if($this->input->post("pregunta_3")==null){$respuesta_3 = 2;}else{$respuesta_3 = 1;}

        // if($this->input->post("pregunta_1")==null){$respuesta_1 = 2;}else if($this->input->post("pregunta_1")=="on"){$respuesta_1 = 1;}
        // if($this->input->post("pregunta_3")==''){$respuesta_2 = 2;}else if($this->input->post("pregunta_3")=="on"){$respuesta_3 = 1;}

    //   $respuesta_1 = $this->input->post("pregunta_1");
    //   $respuesta_2 = $this->input->post("pregunta_2");
    //   $respuesta_3 = $this->input->post("pregunta_3");
      $respuesta_4 = $this->input->post("pregunta_4");
      $respuesta_5 = $this->input->post("pregunta_5");      

      $data = array(
        "evaluador" => $this->input->post("evaluador"),
        "sistema" => $this->input->post("sistema"),

        "comentario_adicional" => $this->input->post("comentario"),

        "respuesta_1" => $respuesta_1,
        // "respuesta_2" => $respuesta_2,
        "respuesta_3" => $respuesta_3,
        "respuesta_4" => $respuesta_4,
        "respuesta_5" => $respuesta_5,
        "respuesta_2" => $this->input->post("respuesta_6")

      );

     $this->db->insert("resultados_soporte",$data);
     
     //DESACTIVA EL TOKEN UNA VEZ INSERTADO LA ENCUESTA EN LA BD
     $this->Token->destkn( $this->input->post("token") );

     $json['resultado'] = TRUE;

     echo json_encode( $json );
    }

  public function lista_sistemas_downloadfile(){
    echo json_encode($this->Soporte_model->lista_sistemas_downloadfile()->result_array());
  }

}
