 
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelSoporte extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    // redirect("PanelSoporte", "refresh");
    $this->load->model( array('Soporte_model', 'Token') );
  }

  public function index(){
    $this->load->model('Soporte_model');
    $datos['datos_sistema']  = $this->Soporte_model->get_valores_sistema()->row();
       $this->load->view("v_PanelSoporte", $datos);
    // $this->load->view('welcome_message', $data);
  }

    public function detail_surveys_sent(){
      echo json_encode($this->Soporte_model->get_results_dss()->result_array());
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
      
      $reporte = $this->db->query('SELECT rs.evaluador, s.nombre sistema, 
      CASE WHEN rs.respuesta_1  = 1 THEN "Si" ELSE "No" END respuesta_1,
      CASE WHEN rs.respuesta_2  = 1 THEN "Insuficiente" WHEN rs.respuesta_2  = 2 THEN "Regular" WHEN rs.respuesta_2  = 3 THEN "Bueno"  WHEN rs.respuesta_2  = 4 THEN "Muy bueno" WHEN rs.respuesta_2  = 5 THEN "Excelente" END respuesta_2,
      CASE WHEN rs.respuesta_3  = 1 THEN "Si" ELSE "No" END respuesta_3,
      CASE WHEN rs.respuesta_4  = 1 THEN "Una vez" WHEN rs.respuesta_4  = 2 THEN "Dos veces seguidas" WHEN rs.respuesta_4  = 3 THEN "Más de tres veces seguidas" END respuesta_4,
      rs.respuesta_5,
      rs.comentario_adicional
      FROM resultados_soporte rs
      LEFT JOIN sistemas s ON rs.sistema = s.id
      WHERE rs.sistema = '.$sistema);
    
      //CONSULTA PARA LA GENERACION DE REPORTE AUOTIZADON DE LAS 12 PM A LAS 11:59:59 AM
      //$reporte = $this->db->query("SELECT * FROM ( ( SELECT solpagos.idsolicitud, empresas.abrev, proveedores.nombre, solpagos.nomdepto, solpagos.folio, solpagos.justificacion, autpagos.cantidad, autpagos.fecreg FROM autpagos INNER JOIN solpagos ON solpagos.idsolicitud = autpagos.idsolicitud INNER JOIN usuarios ON usuarios.idusuario = autpagos.idrealiza INNER JOIN empresas ON empresas.idempresa = solpagos.idEmpresa inner join proveedores on proveedores.idproveedor = solpagos.idProveedor WHERE autpagos.idrealiza='$valor1' and DATE_ADD( autpagos.fecreg, INTERVAL 12 HOUR) like '$valor2%' ) UNION ( SELECT 'NA' AS idsolicitud, empresas.abrev, CONCAT(usuarios.nombres, ' ', usuarios.apellidos) AS nombre, autpagos_caja_chica.nomdepto, 'NA' AS folio, 'PAGO DE CAJA CHICA' AS justificacion, autpagos_caja_chica.cantidad, autpagos_caja_chica.fecreg FROM autpagos_caja_chica INNER JOIN usuarios ON usuarios.idusuario = autpagos_caja_chica.idResponsable INNER JOIN empresas ON empresas.idempresa = autpagos_caja_chica.idEmpresa WHERE autpagos_caja_chica.idrealiza='$valor1' and  DATE_ADD( autpagos_caja_chica.fecreg, INTERVAL 12 HOUR) like '$valor2%' ) ) AS autpagos ORDER BY abrev, fecreg" );
    
    
    //  $usuario_name =  $this->db->query("SELECT nombres FROM usuarios WHERE idusuario='".$valor1."'" );
    
    
              $i = 1;
    
              $reader->getActiveSheet()->setCellValue('A'.$i, 'Nombre del evaluador');
              $reader->getActiveSheet()->setCellValue('B'.$i, 'Sistema');
              $reader->getActiveSheet()->setCellValue('C'.$i, '¿Nuestro equipo de Soporte resolvió tu solicitud/requerimiento?');
              $reader->getActiveSheet()->setCellValue('D'.$i, 'En general, ¿Cuál es su grado de satisfacción con su última interacción con nuestro Equipo de Soporte?');
              $reader->getActiveSheet()->setCellValue('E'.$i, '¿Se resolvió tu problema en un tiempo razonable?');
              $reader->getActiveSheet()->setCellValue('F'.$i, '¿Cuántas veces ha tenido que contactar con nosotros para resolver su problema?');
              $reader->getActiveSheet()->setCellValue('G'.$i, '¿Cuál es tu área?');
            //   $reader->getActiveSheet()->setCellValue('H'.$i, '¿Cómo evaluarías de manera general a los miembros de soporte?');
              $reader->getActiveSheet()->setCellValue('H'.$i, 'Comentarios adicionales');
    
              $reader->getActiveSheet()->getStyle('A1:H1')->applyFromArray($encabezados);

              $reader->getActiveSheet()->getColumnDimension('A')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('B')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('C')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('D')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('E')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('F')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('G')->setWidth(50);
              $reader->getActiveSheet()->getColumnDimension('H')->setWidth(50);
            //   $reader->getActiveSheet()->getColumnDimension('I')->setWidth(50);

    
              $i+=1;
                  if( $reporte->num_rows() > 0  ){
    
                      foreach( $reporte->result() as $row ){
                          $reader->getActiveSheet()->setCellValue('A'.$i, $row->evaluador);
                          $reader->getActiveSheet()->setCellValue('B'.$i, $row->sistema);
                          $reader->getActiveSheet()->setCellValue('C'.$i, $row->respuesta_1);
                          $reader->getActiveSheet()->setCellValue('D'.$i, $row->respuesta_2);
                          $reader->getActiveSheet()->setCellValue('E'.$i, $row->respuesta_3);
                          $reader->getActiveSheet()->setCellValue('F'.$i, $row->respuesta_4);
                          $reader->getActiveSheet()->setCellValue('G'.$i, $row->respuesta_5);
                          $reader->getActiveSheet()->setCellValue('H'.$i, $row->comentario_adicional);
                        //   $reader->getActiveSheet()->setCellValue('I'.$i, $row->comentario_adicional);
                          $reader->getActiveSheet()->getStyle("A$i:H$i")->applyFromArray($informacion);
                          $i+=1;
                      }
                  }
    
                  $writer =  \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($reader, 'Xls');
                  ob_end_clean();
    
              $temp_file = tempnam(sys_get_temp_dir(), 'PHPExcel');
              $writer->save($temp_file);
              header("Content-Disposition: attachment; filename=REPORTE_GENERAL_SOPORTE_.xls");
    
              readfile($temp_file); 
              unlink($temp_file);
    }
    
}


 
  