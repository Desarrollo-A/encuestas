 

 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
      // redirect("Home", "refresh");
      $this->load->model( array('Login_model', 'Token') );
  }

  public function index(){
    $this->load->model('Login_model');
    $datos['datos_sistema']  = $this->Login_model->get_valores_sistema()->row();
    $this->load->view("welcome_message", $datos);
    // $this->load->view('welcome_message', $data);
  }


    public function respuestas_sistema($valor){
    // $this->load->model('Login_model');
    // $datos['datos_sistema']  = $this->Login_model->get_valores_sistema()->row();
    //    $this->load->view("welcome_message", $datos);
    // $this->load->view('welcome_message', $data);
      echo json_encode($this->Login_model->get_sistema($valor)->result_array());
}


public function descargarExcel($sistema){

  $reader = new PhpOffice\PhpSpreadsheet\Spreadsheet();
  $encabezados = [
      'font' => [
          'color' => [ 'argb' => '00000000' ],
          'bold'  => true,
          'size'  => 12,
      ],
      'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                      ],
                      'borders' => [
              'top' => [
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              ],
          ],
          'fill' => [
                  'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                  'rotation' => 0,
                  'startColor' => [
                      'rgb' => '0000FF'
                  ],
                  'endColor' => [
                      'argb' => '0000FF'
                  ],
              ],
      ];



  $informacion = [
          'borders' => [
              'top' => [
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              ],
              'bottom' => [
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              ],
              'left' => [
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              ],
              'right' => [
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              ],
          ]
      ];
  
  //CONSULTA ORIGINAL
  //$reporte = $this->db->query("SELECT solpagos.idsolicitud, empresas.abrev, proveedores.nombre, solpagos.nomdepto, solpagos.folio, solpagos.justificacion, autpagos.cantidad FROM autpagos INNER JOIN solpagos ON solpagos.idsolicitud = autpagos.idsolicitud INNER JOIN usuarios ON usuarios.idusuario = autpagos.idrealiza INNER JOIN empresas ON empresas.idempresa = solpagos.idEmpresa inner join proveedores on proveedores.idproveedor = solpagos.idProveedor WHERE autpagos.idrealiza='".$valor1."' and autpagos.fecreg like '".$valor2."%' ORDER BY empresas.abrev" );
  //CONSULTA PARA GENERACION REPORTE PARA EN BASE AUTOPAGOS Y AUTOPAGOS DE CAJA CHICA
  //CONSULTA ORIGINAL USADA HASTA EL 9 DE OCT 2019
  
  $reporte = $this->db->query('SELECT r.evaluador, s.nombre sistema, 
  "¿El sistema desarrollado cumple con el proceso acordado?" pregunta_1,
  CASE WHEN r.respuesta_1  = 1 THEN "Si" ELSE "No" END respuesta_1, r.porque_1,
  "¿Se cumplió con el objetivo buscado?" pregunta_2,
  CASE WHEN r.respuesta_2  = 1 THEN "Si" ELSE "No" END respuesta_2, r.porque_2,
  "¿El sistema contribuye al mejoramiento de tus actividades?" pregunta_3,
  CASE WHEN r.respuesta_3  = 1 THEN "Si" ELSE "No" END respuesta_3, r.porque_3,
  "¿El sistema contribuye a un mejor acceso a la información?" pregunta_4,
  CASE WHEN r.respuesta_4  = 1 THEN "Si" ELSE "No" END respuesta_4, r.porque_4,
  "¿Se optimizó y agilizó el tiempo de sus procesos?" pregunta_5,
  CASE WHEN r.respuesta_5  = 1 THEN "Si" ELSE "No" END respuesta_5, r.porque_5,
  "¿Se ha mejorado el manejo y control de información dentro del departamento?" pregunta_6,
  CASE WHEN r.respuesta_6  = 1 THEN "Si" ELSE "No" END respuesta_6, r.porque_6,
  "¿El sistema fue desarrollado en el tiempo programado?" pregunta_7,
  CASE WHEN r.respuesta_7  = 1 THEN "Si" ELSE "No" END respuesta_7, r.porque_7,
  "¿La interfaz es fácil e intuitiva?" pregunta_8,
  CASE WHEN r.respuesta_8  = 1 THEN "Si" ELSE "No" END respuesta_8, r.porque_8,
  "¿Contribuye este sistema al ahorro de papel?" pregunta_9,
  CASE WHEN r.respuesta_9  = 1 THEN "Si" ELSE "No" END respuesta_9, r.porque_9,
  "¿Cómo evaluarías al sistema?" pregunta_10,
  CASE WHEN r.respuesta_10  = 1 THEN "20%" WHEN r.respuesta_10  = 2 THEN "40%" WHEN r.respuesta_10  = 3 THEN "60%" WHEN r.respuesta_10  = 4 THEN "80%" WHEN r.respuesta_10  = 5 THEN "100%" END respuesta_10,
  "¿Cómo valora el trato recibido por el personal que le ha atendido?" pregunta_11,
  CASE WHEN r.respuesta_11  = 1 THEN "Bueno" WHEN r.respuesta_11  = 2 THEN "Regular"  ELSE "Malo" END respuesta_11,
  "¿Cómo valora el tiempo de respuesta?" pregunta_12,
  CASE WHEN r.respuesta_12  = 1 THEN "Bueno" WHEN r.respuesta_12  = 2 THEN "Regular" ELSE "Malo" END respuesta_12,
  r.comentario_adicional FROM resultados r INNER JOIN sistemas s ON r.sistema = s.id
  WHERE r.sistema = '.$sistema);

  //CONSULTA PARA LA GENERACION DE REPORTE AUOTIZADON DE LAS 12 PM A LAS 11:59:59 AM
  //$reporte = $this->db->query("SELECT * FROM ( ( SELECT solpagos.idsolicitud, empresas.abrev, proveedores.nombre, solpagos.nomdepto, solpagos.folio, solpagos.justificacion, autpagos.cantidad, autpagos.fecreg FROM autpagos INNER JOIN solpagos ON solpagos.idsolicitud = autpagos.idsolicitud INNER JOIN usuarios ON usuarios.idusuario = autpagos.idrealiza INNER JOIN empresas ON empresas.idempresa = solpagos.idEmpresa inner join proveedores on proveedores.idproveedor = solpagos.idProveedor WHERE autpagos.idrealiza='$valor1' and DATE_ADD( autpagos.fecreg, INTERVAL 12 HOUR) like '$valor2%' ) UNION ( SELECT 'NA' AS idsolicitud, empresas.abrev, CONCAT(usuarios.nombres, ' ', usuarios.apellidos) AS nombre, autpagos_caja_chica.nomdepto, 'NA' AS folio, 'PAGO DE CAJA CHICA' AS justificacion, autpagos_caja_chica.cantidad, autpagos_caja_chica.fecreg FROM autpagos_caja_chica INNER JOIN usuarios ON usuarios.idusuario = autpagos_caja_chica.idResponsable INNER JOIN empresas ON empresas.idempresa = autpagos_caja_chica.idEmpresa WHERE autpagos_caja_chica.idrealiza='$valor1' and  DATE_ADD( autpagos_caja_chica.fecreg, INTERVAL 12 HOUR) like '$valor2%' ) ) AS autpagos ORDER BY abrev, fecreg" );


//  $usuario_name =  $this->db->query("SELECT nombres FROM usuarios WHERE idusuario='".$valor1."'" );


          $i = 1;

          $reader->getActiveSheet()->setCellValue('A'.$i, 'EVALUADOR');
          $reader->getActiveSheet()->setCellValue('B'.$i, 'SISTEMA');
          $reader->getActiveSheet()->setCellValue('C'.$i, 'PREGUNTA 1');
          $reader->getActiveSheet()->setCellValue('D'.$i, 'RESPUESTA 1');
          $reader->getActiveSheet()->setCellValue('E'.$i, 'PORQUE 1');
          $reader->getActiveSheet()->setCellValue('F'.$i, 'PREGUNTA 2');
          $reader->getActiveSheet()->setCellValue('G'.$i, 'RESPUESTA 2');
          $reader->getActiveSheet()->setCellValue('H'.$i, 'PORQUE 2');
          $reader->getActiveSheet()->setCellValue('I'.$i, 'PREGUNTA 3');
          $reader->getActiveSheet()->setCellValue('J'.$i, 'RESPUESTA 2');
          $reader->getActiveSheet()->setCellValue('K'.$i, 'PORQUE 3');
          $reader->getActiveSheet()->setCellValue('L'.$i, 'PREGUNTA 4');
          $reader->getActiveSheet()->setCellValue('M'.$i, 'RESPUESTA 4');
          $reader->getActiveSheet()->setCellValue('N'.$i, 'PORQUE 4');
          $reader->getActiveSheet()->setCellValue('O'.$i, 'PREGUNTA 5');
          $reader->getActiveSheet()->setCellValue('P'.$i, 'RESPUESTA 5');
          $reader->getActiveSheet()->setCellValue('Q'.$i, 'PORQUE 5');
          $reader->getActiveSheet()->setCellValue('R'.$i, 'PREGUNTA 6');
          $reader->getActiveSheet()->setCellValue('S'.$i, 'RESPUESTA 6');
          $reader->getActiveSheet()->setCellValue('T'.$i, 'PORQUE 6');
          $reader->getActiveSheet()->setCellValue('U'.$i, 'PREGUNTA 7');
          $reader->getActiveSheet()->setCellValue('V'.$i, 'RESPUESTA 7');
          $reader->getActiveSheet()->setCellValue('W'.$i, 'PORQUE 7');
          $reader->getActiveSheet()->setCellValue('X'.$i, 'PREGUNTA 8');
          $reader->getActiveSheet()->setCellValue('Y'.$i, 'RESPUESTA 8');
          $reader->getActiveSheet()->setCellValue('Z'.$i, 'PORQUE 8');
          $reader->getActiveSheet()->setCellValue('AA'.$i, 'PREGUNTA 9');
          $reader->getActiveSheet()->setCellValue('AB'.$i, 'RESPUESTA 9');
          $reader->getActiveSheet()->setCellValue('AC'.$i, 'PORQUE 9');
          $reader->getActiveSheet()->setCellValue('AD'.$i, 'PREGUNTA 10');
          $reader->getActiveSheet()->setCellValue('AE'.$i, 'RESPUESTA 10');
          $reader->getActiveSheet()->setCellValue('AF'.$i, 'PREGUNTA 11');
          $reader->getActiveSheet()->setCellValue('AG'.$i, 'RESPUESTA 11');
          $reader->getActiveSheet()->setCellValue('AH'.$i, 'PREGUNTA 12');
          $reader->getActiveSheet()->setCellValue('AI'.$i, 'RESPUESTA 12');
          $reader->getActiveSheet()->setCellValue('AJ'.$i, 'COMENTARIOS ADICIONALES');

          $reader->getActiveSheet()->getStyle('A1:AJ1')->applyFromArray($encabezados);
          // $reader->getActiveSheet()->getColumnDimension('A1')->setAutoSize(true);
          $reader->getActiveSheet()->getColumnDimension('A')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('B')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('C')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('D')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('E')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('F')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('G')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('H')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('I')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('J')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('K')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('L')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('M')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('N')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('O')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('P')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('R')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('S')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('T')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('U')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('V')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('W')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('X')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('Y')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('Z')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AA')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AB')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AC')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AD')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AE')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AF')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AG')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AH')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AI')->setWidth(50);
          $reader->getActiveSheet()->getColumnDimension('AJ')->setWidth(150);

          $i+=1;
              if( $reporte->num_rows() > 0  ){

                  foreach( $reporte->result() as $row ){
                      $reader->getActiveSheet()->setCellValue('A'.$i, $row->evaluador);
                      $reader->getActiveSheet()->setCellValue('B'.$i, $row->sistema);
                      $reader->getActiveSheet()->setCellValue('C'.$i, $row->pregunta_1);
                      $reader->getActiveSheet()->setCellValue('D'.$i, $row->respuesta_1);
                      $reader->getActiveSheet()->setCellValue('E'.$i, $row->porque_1);
                      $reader->getActiveSheet()->setCellValue('F'.$i, $row->pregunta_2);
                      $reader->getActiveSheet()->setCellValue('G'.$i, $row->respuesta_2);
                      $reader->getActiveSheet()->setCellValue('H'.$i, $row->porque_2);
                      $reader->getActiveSheet()->setCellValue('I'.$i, $row->pregunta_3);
                      $reader->getActiveSheet()->setCellValue('J'.$i, $row->respuesta_3);
                      $reader->getActiveSheet()->setCellValue('K'.$i, $row->porque_3);
                      $reader->getActiveSheet()->setCellValue('L'.$i, $row->pregunta_4);
                      $reader->getActiveSheet()->setCellValue('M'.$i, $row->respuesta_4);
                      $reader->getActiveSheet()->setCellValue('N'.$i, $row->porque_4);
                      $reader->getActiveSheet()->setCellValue('O'.$i, $row->pregunta_5);
                      $reader->getActiveSheet()->setCellValue('P'.$i, $row->respuesta_5);
                      $reader->getActiveSheet()->setCellValue('Q'.$i, $row->porque_5);
                      $reader->getActiveSheet()->setCellValue('R'.$i, $row->pregunta_6);
                      $reader->getActiveSheet()->setCellValue('S'.$i, $row->respuesta_6);
                      $reader->getActiveSheet()->setCellValue('T'.$i, $row->porque_6);
                      $reader->getActiveSheet()->setCellValue('U'.$i, $row->pregunta_7);
                      $reader->getActiveSheet()->setCellValue('V'.$i, $row->respuesta_7);
                      $reader->getActiveSheet()->setCellValue('W'.$i, $row->porque_7);
                      $reader->getActiveSheet()->setCellValue('X'.$i, $row->pregunta_8);
                      $reader->getActiveSheet()->setCellValue('Y'.$i, $row->respuesta_8);
                      $reader->getActiveSheet()->setCellValue('Z'.$i, $row->porque_8);
                      $reader->getActiveSheet()->setCellValue('AA'.$i, $row->pregunta_9);
                      $reader->getActiveSheet()->setCellValue('AB'.$i, $row->respuesta_9);
                      $reader->getActiveSheet()->setCellValue('AC'.$i, $row->porque_9);
                      $reader->getActiveSheet()->setCellValue('AD'.$i, $row->pregunta_10);
                      $reader->getActiveSheet()->setCellValue('AE'.$i, $row->respuesta_10);
                      $reader->getActiveSheet()->setCellValue('AF'.$i, $row->pregunta_11);
                      $reader->getActiveSheet()->setCellValue('AG'.$i, $row->respuesta_11);
                      $reader->getActiveSheet()->setCellValue('AH'.$i, $row->pregunta_12);
                      $reader->getActiveSheet()->setCellValue('AI'.$i, $row->respuesta_12);
                      $reader->getActiveSheet()->setCellValue('AJ'.$i, $row->comentario_adicional);
                      $reader->getActiveSheet()->getStyle("A$i:AJ$i")->applyFromArray($informacion);
                      $i+=1;
                  }
              }

              $writer =  \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($reader, 'Xlsx');
              ob_end_clean();

          $temp_file = tempnam(sys_get_temp_dir(), 'PHPExcel');
          $writer->save($temp_file);
          header("Content-Disposition: attachment; filename=REPORTE_GENERAL_.xlsx");

          readfile($temp_file); 
          unlink($temp_file);
}

 
}


  