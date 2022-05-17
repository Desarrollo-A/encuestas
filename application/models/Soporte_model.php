<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soporte_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }

   function get_sistemas_lista(){
      return $this->db->query("SELECT * FROM sistemas WHERE nombre = 'SOPORTE' ORDER BY sistemas.nombre");
   }

   function get_todos_sistemas_evaluar(){
      return $this->db->query("SELECT * FROM sistemas WHERE para_evaluar = 1 ORDER BY sistemas.nombre");
   }

   function get_todos_sistemas_lista(){
      return $this->db->query("SELECT * FROM sistemas ORDER BY sistemas.nombre");
   }

   function get_sistemas_lista_encuesta( $token ){
      return $this->db->query("SELECT * FROM sistemas WHERE sistemas.id IN ( SELECT tokenprov.sistema FROM tokenprov WHERE tokenprov.token = '$token' ) ORDER BY sistemas.nombre");
   }

   function get_sistema($valor,$fecha_ini,$fecha_fin){

      if($valor == '100'){
         return $this->db->query("SELECT @pr1 := ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 WHEN rs.respuesta_1 = 2 THEN 15 WHEN rs.respuesta_1 = 3 THEN 5 END)/COUNT(rs.respuesta_1)) AS porcentaje_1,
         ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 WHEN rs.respuesta_1 = 2 THEN 15 WHEN rs.respuesta_1 = 3 THEN 5 END)/COUNT(rs.respuesta_1)*100/25) AS mas_1,
         @pr2 := ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)) AS porcentaje_2,
         ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)*100/25) AS mas_2,
         @pr3 := ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 WHEN rs.respuesta_3 = 2 THEN 15 WHEN rs.respuesta_3 = 3 THEN 5 END)/COUNT(rs.respuesta_3)) AS porcentaje_3,
         ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 WHEN rs.respuesta_3 = 2 THEN 15 WHEN rs.respuesta_3 = 3 THEN 5 END)/COUNT(rs.respuesta_3)*100/25) AS mas_3,
         @pr4 := ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)) AS porcentaje_4,
         ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)*100/25) AS mas_4,
         COUNT(rs.respuesta_1) AS total, sistema, ROUND((SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 WHEN rs.respuesta_1 = 2 THEN 15 WHEN rs.respuesta_1 = 3 THEN 5 END)/COUNT(rs.respuesta_1))+
         (SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2))+
         (SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 WHEN rs.respuesta_3 = 2 THEN 15 WHEN rs.respuesta_3 = 3 THEN 5 END)/COUNT(rs.respuesta_3))+
         (SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4))) AS mas_5, GROUP_CONCAT(DISTINCT rs.respuesta_5 SEPARATOR ' | ' ) areas,
         GROUP_CONCAT(DISTINCT rs.comentario_adicional SEPARATOR ' | ' ) comentarios, GROUP_CONCAT(DISTINCT rs.evaluador SEPARATOR ' | ' ) nombres,
         GROUP_CONCAT(DISTINCT (CASE WHEN rs.respuesta_6 = 1 THEN 'Insuficiente' WHEN rs.respuesta_6 = 2 THEN 'Regular' WHEN rs.respuesta_6 = 3 THEN 'Bueno' WHEN rs.respuesta_6 = 4 THEN 'Muy bueno' WHEN rs.respuesta_6 = 5 THEN 'Excelente' END) SEPARATOR ' | ' ) estrellas
         FROM resultados_soporte rs WHERE rs.sistema = ".$valor." AND fecha_creacion BETWEEN '$fecha_ini 00:00:00' AND '$fecha_fin 23:59:59' GROUP BY rs.sistema");
      }
      else{
         return $this->db->query("SELECT @pr1 := ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 WHEN rs.respuesta_1 = 2 THEN 15 WHEN rs.respuesta_1 = 3 THEN 5 END)/COUNT(rs.respuesta_1)) AS porcentaje_1,
         ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 WHEN rs.respuesta_1 = 2 THEN 15 WHEN rs.respuesta_1 = 3 THEN 5 END)/COUNT(rs.respuesta_1)*100/25) AS mas_1,
         @pr2 := ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)) AS porcentaje_2,
         ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)*100/25) AD mas_2,
         @pr3 := ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 WHEN rs.respuesta_3 = 2 THEN 15 WHEN rs.respuesta_3 = 3 THEN 5 END)/COUNT(rs.respuesta_3)) AS porcentaje_3,
         ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 WHEN rs.respuesta_3 = 2 THEN 15 WHEN rs.respuesta_3 = 3 THEN 5 END)/COUNT(rs.respuesta_3)*100/25) AS mas_3,
         @pr4 := ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_5)) AS porcentaje_4,
         ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)*100/25) AS mas_4,
         COUNT(rs.respuesta_1) AS total, sistema, ROUND((SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 WHEN rs.respuesta_1 = 2 THEN 15 WHEN rs.respuesta_1 = 3 THEN 5 END)/COUNT(rs.respuesta_1))+
         (SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2))+
         (SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 WHEN rs.respuesta_3 = 2 THEN 15 WHEN rs.respuesta_3 = 3 THEN 5 END)/COUNT(rs.respuesta_3))+
         (SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4))) AS mas_5, GROUP_CONCAT(DISTINCT rs.respuesta_5 SEPARATOR ' | ' ) areas,
         GROUP_CONCAT(DISTINCT rs.comentario_adicional SEPARATOR ' | ' ) comentarios, GROUP_CONCAT(DISTINCT rs.evaluador SEPARATOR ' | ' ) nombres,
         GROUP_CONCAT(DISTINCT (CASE WHEN rs.respuesta_6 = 1 THE 'Insuficiente' WHEN rs.respuesta_6 = 2 THEN 'Regular' WHEN rs.respuesta_6 = 3 THEN 'Bueno' WHEN rs.respuesta_6 = 4 THEN 'Muy bueno' WHEN rs.respuesta_6 = 6 THEN 'Excelente' END) SEPARATOR ' | ' ) estrellas
         FROM resultados_soporte rs WHERE rs.sistema = ".$valor." AND fecha_creacion BETWEEN '$fecha_ini 00:00:00' AND '$fecha_fin 23:59:59' GROUP BY rs.sistema");

      }
   }

   function get_results_dss(){
      return $this->db->query("SELECT idtoken, correo, (CASE WHEN sistema  = 14 THEN 'Soporte' END) departamento,feccreado fecha_envio_invitacion, (CASE WHEN activo = 1 
      THEN 'Evaluación activa'  WHEN activo  = 0 THEN 'Evaluación realizada' END) estatus_evaluacion, (CASE WHEN fechausado IS NULL THEN '0000-00-00 00:00:00' 
      ELSE fechausado END) fechausado, (CASE WHEN activo  = 1 THEN CONCAT('https://encuestas.gphsis.com/index.php/Soporte/Encuesta/', token) WHEN activo  = 0 
       THEN '------------------------------' END) link FROM tokenprov WHERE sistema = 14");
   }

   function get_valores_sistema(){
      return $this->db->query("SELECT 
      SUM(case when resultados.respuesta_1 = 1 then 1 else 0 end)*100/count(resultados.respuesta_1) as mas_1,
      SUM(case when resultados.respuesta_1 = 0 then 1 else 0 end)*100/count(resultados.respuesta_1) as menos_1, 
      (count(resultados.respuesta_1)/100) as todo_uno FROM resultados");
   }

   function lista_sistemas_downloadfile(){
      return $this->db->query("SELECT s.id, s.nombre FROM sistemas s
      INNER JOIN resultados r ON r.sistema = s.id 
      ORDER BY s.nombre");
   }

}
