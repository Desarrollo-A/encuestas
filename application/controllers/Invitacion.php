<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invitacion extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Token");
        $this->load->library('phpmailer_lib');
    }

    // ENVÍO DE CORREO PARA EVALUACIÓN A LOS DISTINTOS SISTEMAS

    public function invitacion_encuesta()
    {
        $mailpr = strtolower($this->input->post("correo_invitacion"));
        $tkn = md5($mailpr.date("Ymdhis"));

        if( $this->Token->savtkn( $this->input->post("correo_invitacion"), array("correo" => $mailpr, "token"=> $tkn, "sistema" => $this->input->post("sistema_invitacion"), "activo" => 1 ) ) ){
            $mail = $this->phpmailer_lib->load();
            $mail->isSMTP();
            $mail->SMTPDebug = 3;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@ciudadmaderas.com';
            $mail->Password = 'euTan4&9';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('noreply@ciudadmaderas.com', 'Ciudad Maderas');
            $mail->addAddress($mailpr);
            /*$mail->addAddress('mariadejesus.garduno@ciudadmaderas.com');
            $mail->addAddress('mariajose.martinez@ciudadmaderas.com');
            $mail->addAddress('asistente.ti@ciudadmaderas.com');*/
            $mail->Subject = utf8_decode('Nueva solicitud de evaluación');
            $mail->isHTML(true);
            if($this->input->post("sistema_invitacion") != 14)
                $finalUrl = base_url( "index.php/Login/Encuesta/".$tkn );
            else
                $finalUrl = base_url( "index.php/Soporte/Encuesta/".$tkn );

            $mailContent = '<html>
                                <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                                          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                                </head>
                                <body>
                                <div bgcolor="#EFEEEA">
                                    <center>
                                        <table id="m_-4107947934748351806bodyTable" width="100%" height="100%" cellspacing="0" cellpadding="0"
                                               border="0" bgcolor="#EFEEEA" align="center">
                                            <tbody>
                                            <tr>
                                                <td id="m_-4107947934748351806bodyCell" style="padding-bottom:60px" valign="top" align="center">
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td style="background-color:#00538b" valign="top" bgcolor="#00538b" align="center">
                                                                <table style="max-width:640px;" width="100%" cellspacing="0" cellpadding="0" border="0"
                                                                       align="center">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding:40px" valign="top" align="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color:#ffffff;padding-top:40px">&nbsp;</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" align="center" style="background-color: #EFEEEA;">
                                                                <table style="background-color:#ffffff;max-width:640px; margin-top: -60px" width="100%"
                                                                                   cellspacing="0" cellpadding="0" border="0" bgcolor="#000000" align="center">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td valign="top" bgcolor="#FFFFFF" align="center">
                                                                                        <img style="width:60%;padding-top: 40px;"
                                                                                             src="https://encuestas.gphsis.com/assets/img/logo.png">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding-right:40px;padding-left:40px;padding-top:20px;" valign="top" align="left">
                                                                                        <p>Estimado usuario:</p>
                                                                                        <p>En el área de sistemas creemos firmemente en la mejora continua, es por ello que la presente encuesta tiene como finalidad conocer su opinión respecto a la funcionalidad de los sistemas que se manejan en Ciudad Maderas.</p>
                                                                                        <p><a href="'.$finalUrl.'">Ir a la evaluación</a></p>
                                                                                        <p>Esto nos ayudará a hacer mejoras en las herramientas actuales y brindar un mejor servicio. La encuesta sólo te tomará cinco minutos. </p>
                                                                                        <p>De antemano, agradecemos tu participación.</p>
                                                                                        <p style="font-size:10px;">Este correo fue generado de manera automática, te pedimos no respondas este correo, para cualquier duda o aclaración envía un correo a soporte@ciudadmaderas.com</p>
                                                                                        <p style="font-size:10px;">Al ingresar tus datos aceptas la política de privacidad, términos y condiciones las cuales pueden ser consultadas en nuestro sitio www.ciudadmaderas.com/legal</p>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="border-top:2px solid #efeeea;color:#6a655f;font-family:\'Helvetica Neue\', Helvetica,Arial,Verdana,sans-serif;font-size:12px;font-weight:400;line-height:24px;padding-top:40px;padding-bottom:40px;text-align:center"
                                                                                        valign="top" align="center">
                                                                                        <p style="color:#6a655f;font-family:\'Helvetica Neue\',Helvetica,Arial,Verdana,sans-serif;font-size:12px;font-weight:400;line-height:24px;padding:0 20px;margin:0;text-align:center">
                                                                                            Departamento de TI & MKTD</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </center>
                                                <div class="yj6qo"></div>
                                                <div class="adL">
                                                </div>
                                            </div>
                                            <div class="adL">
                                            </div>
                                            </div></div>
                                            <div id=":nx" class="ii gt" style="display:none">
                                                <div id=":ny" class="a3s aiL undefined"></div>
                                            </div>
                                            <div class="hi"></div>
                                            </div></div>
                                            <div class="ajx"></div>
                                            </div>
                                            </body>
                                            </html>';

            $mail->Body = utf8_decode($mailContent);
            //return $mailContent;
            if ($mail->send()) {
                echo json_encode(TRUE);
            } else {
                echo $mail->ErrorInfo;
            }
        } else {

        }
        
    }


    /*public function invitacion_encuesta_bk(){

        $respuesta = array( FALSE );

        if( isset($_POST) && !empty($_POST) ){

            $this->load->library('email');
            $this->load->model("Token");

            $mailpr = strtolower($this->input->post("correo_invitacion"));
            $tkn = md5($mailpr.date("Ymdhis"));


            if( $this->Token->savtkn( $this->input->post("correo_invitacion"), array("correo" => $mailpr, "token"=> $tkn, "sistema" => $this->input->post("sistema_invitacion"), "activo" => 1 ) ) ){
                $this->email->from('programador.analista6@ciudadmaderas.com', 'No responder');
                $this->email->to( $mailpr );
                $this->email->subject('Nueva solicitud de evaluación');
                if($this->input->post("sistema_invitacion") != 14){
                    $this->email->message('<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Document</title>
                        <style>
                            body{
                                width: 100%;
                                height: 100vh;
                                top: 0;
                                left: 0;
                                margin: 0;
                                padding: 0;
                                font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;
                            }
                            img{
                                width:50%;
                                height: auto;
                                margin: 1em 25%;
                                padding: 0;
                            }
                            p{
                                width: 50%;
                                height: auto;
                                margin: 2em 25%;
                                padding: 0;
                                text-align: justify;
                            }
                            @media only screen and (max-width: 1024px) {
                                img{
                                    width:75%;
                                    height: auto;
                                    margin: 1em 12.5%;
                                    padding: 0;
                                }
                                p{
                                    width: 75%;
                                    height: auto;
                                    margin: 2em 12.5%;
                                    padding: 0;
                                    text-align: justify;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <center><img src="http://encuestas.sisgph.com/assets/img/logo_inicio.png" style="width: 230px; height: 80px;"></center>
                        <p>Estimado usuario:</p>
                        <p>En el área de sistemas creemos firmemente en la mejora continua, es por ello que la presente encuesta tiene como finalidad conocer su opinión respecto a la funcionalidad de los sistemas que se manejan en Ciudad Maderas.</p>
                        <p><a href="'.base_url( "index.php/Login/Encuesta/".$tkn ).'">Ir a la evaluación</a></p>
                        <p>Esto nos ayudará a hacer mejoras en las herramientas actuales y brindar un mejor servicio. La encuesta sólo te tomará cinco minutos. </p>
                        <p>De antemano, agradecemos tu participación.</p>
                        <p style="font-size:10px;">Este correo fue generado de manera automática, te pedimos no respondas este correo, para cualquier duda o aclaración envía un correo a soporte@ciudadmaderas.com</p>
                        <p style="font-size:10px;">Al ingresar tus datos aceptas la política de privacidad, términos y condiciones las cuales pueden ser consultadas en nuestro sitio www.ciudadmaderas.com/legal</p>
                    </body>
                    </html>');
                }else{
                    $this->email->message('<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Document</title>
                        <style>
                            body{
                                width: 100%;
                                height: 100vh;
                                top: 0;
                                left: 0;
                                margin: 0;
                                padding: 0;
                                font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;
                            }
                            img{
                                width:50%;
                                height: auto;
                                margin: 1em 25%;
                                padding: 0;
                            }
                            p{
                                width: 50%;
                                height: auto;
                                margin: 2em 25%;
                                padding: 0;
                                text-align: justify;
                            }
                            @media only screen and (max-width: 1024px) {
                                img{
                                    width:75%;
                                    height: auto;
                                    margin: 1em 12.5%;
                                    padding: 0;
                                }
                                p{
                                    width: 75%;
                                    height: auto;
                                    margin: 2em 12.5%;
                                    padding: 0;
                                    text-align: justify;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <center><img src="http://encuestas.sisgph.com/assets/img/logo_inicio.png" style="width: 230px; height: 80px;"></center>
                        <p>Estimado usuario:</p>
                        <p>En el área de sistemas creemos firmemente en la mejora continua, es por ello que la presente encuesta tiene como finalidad conocer su opinión respecto a la funcionalidad de los sistemas que se manejan en Ciudad Maderas.</p>
                        <p><a href="'.base_url( "index.php/Soporte/Encuesta/".$tkn ).'">Ir a la evaluación</a></p>
                        <p>Esto nos ayudará a hacer mejoras en las herramientas actuales y brindar un mejor servicio. La encuesta sólo te tomará cinco minutos. </p>
                        <p>De antemano, agradecemos tu participación.</p>
                        <p style="font-size:10px;">Este correo fue generado de manera automática, te pedimos no respondas este correo, para cualquier duda o aclaración envía un correo a soporte@ciudadmaderas.com</p>
                        <p style="font-size:10px;">Al ingresar tus datos aceptas la política de privacidad, términos y condiciones las cuales pueden ser consultadas en nuestro sitio www.ciudadmaderas.com/legal</p>
                    </body>
                    </html>');
                }
            $respuesta = array( $this->email->send() );
            }
        }

        echo json_encode( $respuesta );
    }*/


    // ENVÍO DE CORREO PARA EVALUACIÓN AL DEPARTAMENTO DE SOPORTE
    public function invitacion_encuesta_soporte(){

        $respuesta = array( FALSE );

        if( isset($_POST) && !empty($_POST) ){

            $this->load->library('email');
            $this->load->model("Token");

            $mailpr = strtolower($this->input->post("correo_invitacion"));
            $tkn = md5($mailpr.date("Ymdhis"));


            if( $this->Token->savtkn( $this->input->post("correo_invitacion"), array(
                    "correo" => $mailpr,
                    "token"=> $tkn, 
                    "sistema" => $this->input->post("sistema_invitacion"), 
                    "activo" => 1 ) 
                    )
                ){
                $this->email->from('programador.analista6@ciudadmaderas.com', 'No responder');
                $this->email->to( $mailpr );
                $this->email->subject('Nueva solicitud de evaluación');
                $this->email->message('<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <style>
                body{
                    width: 100%;
                    height: 100vh;
                    top: 0;
                    left: 0;
                    margin: 0;
                    padding: 0;
                    font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;
                }
                img{
                    width:50%;
                    height: auto;
                    margin: 1em 25%;
                    padding: 0;
                }
                p{
                    width: 50%;
                    height: auto;
                    margin: 2em 25%;
                    padding: 0;
                    text-align: justify;
                }
                @media only screen and (max-width: 1024px) {
                    img{
                        width:75%;
                        height: auto;
                        margin: 1em 12.5%;
                        padding: 0;
                    }
                    p{
                        width: 75%;
                        height: auto;
                        margin: 2em 12.5%;
                        padding: 0;
                        text-align: justify;
                    }
                }
            </style>
        </head>
        <body>
            <p>Estimado usuario:</p>
            <p>En el área de sistemas creemos firmemente en la mejora continua, es por ello que la presente encuesta tiene como finalidad conocer su opinión respecto a la funcionalidad de los sistemas que se manejan en Ciudad Maderas.</p>
            <p><a href="'.base_url( "index.php/Soporte/Encuesta/".$tkn ).'">Ir a la evaluación</a></p>
            <p>Esto nos ayudará a hacer mejoras en las herramientas actuales y brindar un mejor servicio. La encuesta solo te tomará cinco minutos. </p>
            <p>De antemano, agradecemos tu participación.</p>
            <p style="font-size:10px;">Este correo fue generado de manera automática, te pedimos no respondas este correo, para cualquier duda o aclaración envía un correo a soporte@ciudadmaderas.com</p>
            <p style="font-size:10px;">Al ingresar tus datos aceptas la política de privacidad, términos y condiciones las cuales pueden ser consultadas en nuestro sitio www.ciudadmaderas.com/legal</p>
        </body>
        </html>');
            $respuesta = array( $this->email->send() );
            }
        }

        echo json_encode( $respuesta );
    }
}