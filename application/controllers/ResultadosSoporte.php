 
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultadosSoporte extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    // redirect("ResultadosSoporte", "refresh");
    $this->load->model( array('Soporte_model', 'Token') );
  }

  public function index(){
    $this->load->model('Soporte_model');
    $datos['datos_sistema']  = $this->Soporte_model->get_valores_sistema()->row();
       $this->load->view("v_ResultadosSoporte", $datos);
    // $this->load->view('welcome_message', $data);
  }

    public function respuestas_sistema($valor,$fecha_ini,$fecha_fin){
      echo json_encode($this->Soporte_model->get_sistema($valor,$fecha_ini,$fecha_fin)->result_array());
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
    
                  $writer =  \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($reader, 'Xlsx');
                  ob_end_clean();
    
              $temp_file = tempnam(sys_get_temp_dir(), 'PHPExcel');
              $writer->save($temp_file);
              header("Content-Disposition: attachment; filename=REPORTE_GENERAL_SOPORTE_.xlsx");
    
              readfile($temp_file); 
              unlink($temp_file);
    }
    
}


 
  