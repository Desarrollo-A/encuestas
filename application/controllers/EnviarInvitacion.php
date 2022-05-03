<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnviarInvitacion extends CI_Controller {
  
  public function __construct(){
    //AQUI TENIA UNA VALIDACION DE INICIO DE SESSION SE RETIRO
    parent::__construct();
    $this->load->model( array('EnviarInvitacion_model', 'Token') );  
  }
  public function index(){
      $this->load->view('v_EnviarInvitacion');
  }

  public function listado_sistemas(){
    echo json_encode($this->Soporte_model->get_sistemas_lista()->result_array());
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
      $respuesta_1 = $this->input->post("pregunta_1");
      $respuesta_2 = $this->input->post("pregunta_2");
      $respuesta_3 = $this->input->post("pregunta_3");
      $respuesta_4 = $this->input->post("pregunta_4");
      $respuesta_5 = $this->input->post("pregunta_5");

      $data = array(
        "evaluador" => $this->input->post("evaluador"),
        "sistema" => $this->input->post("sistema"),

        "comentario_adicional" => $this->input->post("comentario"),

        "respuesta_1" => $respuesta_1,
        "respuesta_2" => $respuesta_2,
        "respuesta_3" => $respuesta_3,
        "respuesta_4" => $respuesta_4,
        "respuesta_5" => $respuesta_5
      );

     $this->db->insert("resultados_soporte",$data);
     
     //DESACTIVA EL TOKEN UNA VEZ INSERTADO LA ENCUESTA EN LA BD
     $this->Token->destkn( $this->input->post("token") );

     $json['resultado'] = TRUE;

     echo json_encode( $json );
    }
}
