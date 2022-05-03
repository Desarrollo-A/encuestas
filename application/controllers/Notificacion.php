 

 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacion extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
      $this->load->model( array('Login_model', 'Token') );
  }

  public function index(){
    $this->load->view("header");
    ?>
      <center>
        <br/>
        <br/>
        <br/>
        <h1>Tienes pendiente una encuesta de responder, para reactivar el sistema es necesario que la contestes en el siguiente link.</h1>
        <p><a href="https://encuestas.gphsis.com/index.php/Login/Encuesta/3787e1d835ce1068632f59eb255edd5f">CLICK AQUI</a></p>
      </center>
    <?php
    $this->load->view("footer");
  } 
}


  