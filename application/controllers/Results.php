<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
      $this->load->model(array('Results_model'));
      setlocale(LC_ALL, "es_ES");
  }

  public function index(){
  }

  public function printResults($id_sistema)
    {
        $this->load->library('Pdf');
        $pdf = new TCPDF('P', 'mm', 'LETTER', 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Sistemas Victor Manuel Sanchez Ramirez');
        $pdf->SetTitle('INFORMACIÓN GENERAL DE EVALUACIÓN');
        $pdf->SetSubject('Información de la evaluación');
        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, 0);
        //relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter();
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('Helvetica', '', 9, '', true);
        $pdf->SetMargins(7, 10, 10, true);
        $pdf->AddPage('P', 'LETTER');
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $bMargin = $pdf->getBreakMargin();
        $auto_page_break = $pdf->getAutoPageBreak();
        $pdf->Image('dist/img/ar4c.png', 120, 0, 300, 0, 'PNG', '', '', false, 150, '', false, false, 0, false, false, false);
        $pdf->setPageMark();
        $information = $this->Results_model->getProyectInformation($id_sistema)->row();
        $pr = $this->Results_model->getPromedio($id_sistema)->row();
        $total = $pr->result1 + $pr->result2 + $pr->result3 + $pr->result4 + $pr->result5 + $pr->result6 + $pr->result7 + $pr->result8 + $pr->result9 + $pr->result10 + $pr->result11 + $pr->result12;
            $html = '
          <link rel="stylesheet" media="print" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                <style media="print">
            label { 
              color: black; 
              border-bottom:10em;
            }
            u {
              text-decoration: none;
              border-bottom: 10px solid black;
            }​
            tr {
              border-collapse: separate;
              border-spacing: 10;
              
              border-radius: 15px;
              -moz-border-radius: 20px;
              padding: 2px;
            }
          </style>
          <body>
            <table width="100%" style="height: 100px; border: 0px solid #fff;" width="690">
              <tr>
                <td colspan="2" align="left"><img src="'.base_url("assets/img/logo.png").'" style=" max-width: 70%; height: auto;"></td>
                <td colspan="2" align="right"><b style="font-size: 2em; ">EVALUACIÓN<br></b><small style="font-size: 2em; color: #777;">'.$information->systemName.'</small> </td>
              </tr>
            </table>
            <table>
              <tr style="color:#333;">
                <td>
                  <div align="right"><b>Fecha de impresión: </b>' . strftime("%e de  %B del %Y") . '<br><b>Evaluador: </b>'.$information->evaluador.'<br><b>Promedio general: </b>'.round($total).'%<br></div>
                </td>
              </tr>
            </table>

            <table style="font-size:12px; color:#333; background-color: #01548B;border-radius: 15px;">
              <tr style="border-radius: 15px; text-align: center;">
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>1. ¿El sistema desarrollado cumple con el proceso acordado?</b></th>
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>2. ¿Se cumplió con el objetivo buscado?</b></th>
              </tr>
            </table>
            <br><br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: center;">
                <td><b>'.$information->respuesta_1.':</b> '.$information->porque_1.'</td>
                <td><b>'.$information->respuesta_2.':</b> '.$information->porque_2.'</td>
              </tr>
            </table>
            <br>
            <br>
            <br>

            <table style="font-size:12px; color:#333; background-color: #01548B;border-radius: 15px;">
              <tr style="border-radius: 15px; text-align: center;">
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>3. ¿El sistema contribuye al mejoramiento de tus actividades?</b></th>
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>4. ¿El sistema contribuye a un mejor acceso a la información?</b></th>
              </tr>
            </table>
            <br><br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: center;">
                <td><b>'.$information->respuesta_3.':</b> '.$information->porque_3.'</td>
                <td><b>'.$information->respuesta_4.':</b> '.$information->porque_4.'</td>
              </tr>
            </table>
            <br>
            <br>
            <br>

            <table style="font-size:12px; color:#333; background-color: #01548B;border-radius: 15px;">
              <tr style="border-radius: 15px; text-align: center;">
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>5. ¿Se optimizó y agilizó el tiempo de sus procesos?</b></th>
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>6. ¿Se ha mejorado el manejo y control de información dentro del departamento?</b></th>
              </tr>
            </table>
            <br><br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: center;">
                <td><b>'.$information->respuesta_5.':</b> '.$information->porque_5.'</td>
                <td><b>'.$information->respuesta_6.':</b> '.$information->porque_6.'</td>
              </tr>
            </table>
            <br>
            <br>
            <br>

            <table style="font-size:12px; color:#333; background-color: #01548B;border-radius: 15px;">
              <tr style="border-radius: 15px; text-align: center;">
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>7. ¿De acuerdo a las funciones del sistema considera que fue optimo el tiempo de desarrollo?</b></th>
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>8. ¿La interfaz es fácil e intuitiva?</b></th>
              </tr>
            </table>
            <br><br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: center;">
                <td><b>'.$information->respuesta_7.':</b> '.$information->porque_7.'</td>
                <td><b>'.$information->respuesta_8.':</b> '.$information->porque_8.'</td>
              </tr>
            </table>
            <br>
            <br>
            <br>

            <table style="font-size:12px; color:#333; background-color: #01548B;border-radius: 15px;">
              <tr style="border-radius: 15px; text-align: center;">
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>9. ¿Contribuye este sistema al ahorro de papel?</b></th>
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>10. ¿Cómo evaluarías al sistema?</b></th>
              </tr>
            </table>
            <br><br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: center;">
                <td><b>'.$information->respuesta_9.':</b> '.$information->porque_9.'</td>
                <td>
                  <table width="100%">
                    <tr>
                        <td colspan="7"><b>'.$information->respuesta_10.'</b></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><label for="radio1"><img src="'.base_url("assets/img/estrella.png").'" width="40"></label></td>
                      <td><label for="radio2"><img src="'.base_url("assets/img/estrella.png").'" width="40"></label></td>
                      <td><label for="radio3"><img src="'.base_url("assets/img/estrella.png").'" width="40"></label></td>
                      <td><label for="radio4"><img src="'.base_url("assets/img/estrella.png").'" width="40"></label></td>
                      <td><label for="radio5"><img src="'.base_url("assets/img/estrella.png").'" width="30"></label></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <br>
            <br>
            <br>

            <table style="font-size:12px; color:#333; background-color: #01548B;border-radius: 15px;">
              <tr style="border-radius: 15px; text-align: center;">
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>11. ¿Cómo valora el trato recibido por el personal que le ha atendido?</b></th>
                <th style="background-color: #AAA183; color: #fff;"colspan="2"><b>12. ¿Cómo valora el tiempo de respuesta?</b></th>
              </tr>
            </table>
            <br><br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: center;">
                <td>
                  <table width="100%">
                    <tr>
                      <td colspan="5"><b>'.$information->respuesta_11.'</b></td>
                    </tr>
                    <tr>
                      <td colspan="5"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><label><img src="'.base_url("assets/img/bien2.png").'" width="40"></label></td>
                      <td><label><img src="'.base_url("assets/img/regular2.png").'" width="30"></label></td>
                      <td><label><img src="'.base_url("assets/img/mal2.png").'" width="30"></label></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table width="100%">
                    <tr>
                      <td colspan="5"><b>'.$information->respuesta_12.'</b></td>
                    </tr>
                    <tr>
                      <td colspan="5"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><label><img src="'.base_url("assets/img/bien2.png").'" width="40"></label></td>
                      <td><label><img src="'.base_url("assets/img/regular2.png").'" width="30"></label></td>
                      <td><label><img src="'.base_url("assets/img/mal2.png").'" width="30"></label></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <br>
            <br>
            <table style="font-size:12px; color:#333;">
              <tr style="text-align: left;">
                <td><b>Comentarios adicionales: </b>'.$information->comentario_adicional.'</td>
              </tr>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <table>
              <tr style="color:#333;">
                <td>
                  <div align="center">___________________________________</div>
                </td>
              </tr>
              <tr style="color:#333;">
                <td>
                  <div align="center">'.$information->evaluador.'</div>
                </td>
              </tr>
            </table>

          <body>
        </html>';

            $pdf->writeHTMLCell(0, 0, $x = '', $y = '10', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
            ob_end_clean();
            $pdf->Output(utf8_decode("Informacion.pdf"), 'I');
    }
 
}


  