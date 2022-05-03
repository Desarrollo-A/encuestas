<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EnviarInvitacion_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

     function get_sistemas_lista(){
       return $this->db->query("SELECT * FROM sistemas WHERE nombre = 'SOPORTE' ORDER BY sistemas.nombre");
    }

    function get_sistemas_lista_encuesta( $token ){
      return $this->db->query("SELECT * FROM sistemas WHERE sistemas.id IN ( SELECT tokenprov.sistema FROM tokenprov WHERE tokenprov.token = '$token' ) ORDER BY sistemas.nombre");
   }

   function get_sistema($valor,$fecha_ini,$fecha_fin){

      if($valor == '100'){

         return $this->db->query("SELECT @pr1 := ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_1)) AS porcentaje_1,
         ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 1 ELSE 0 END)*100/COUNT(rs.respuesta_1)) AS mas_1,
         @pr2 := ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)) AS porcentaje_2,
         ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)*100/25) AS mas_2,
         @pr3 := ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_3)) AS porcentaje_3,
         ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 1 ELSE 0 END)*100/COUNT(rs.respuesta_3)) AS mas_3,
         @pr4 := ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)) AS porcentaje_4,
         ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)*100/25) AS mas_4,
         COUNT(rs.respuesta_1) AS total, sistema, ROUND((SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_1))+
        (SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2))+
        (SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_3))+
        (SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4))) AS mas_5, GROUP_CONCAT(DISTINCT rs.respuesta_5 SEPARATOR '  |  ' ) areas, 
         GROUP_CONCAT(DISTINCT rs.comentario_adicional SEPARATOR '  |  ' ) comentarios, GROUP_CONCAT(DISTINCT rs.evaluador SEPARATOR '  |  ' ) nombres
          FROM resultados_soporte rs WHERE rs.sistema = ".$valor." AND fecha_creacion BETWEEN '$fecha_ini 00:00:00' AND '$fecha_fin 23:59:59' GROUP BY rs.sistema");
      }
      else{
       return $this->db->query("SELECT @pr1 := ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_1)) AS porcentaje_1,
       ROUND(SUM(CASE WHEN rs.respuesta_1 = 1 THEN 1 ELSE 0 END)*100/COUNT(rs.respuesta_1)) AS mas_1,
       @pr2 := ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)) AS porcentaje_2,
       ROUND(SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2)*100/25) AS mas_2,
       @pr3 := ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_3)) AS porcentaje_3,
       ROUND(SUM(CASE WHEN rs.respuesta_3 = 1 THEN 1 ELSE 0 END)*100/COUNT(rs.respuesta_3)) AS mas_3,
       @pr4 := ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)) AS porcentaje_4,
       ROUND(SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4)*100/25) AS mas_4,
       COUNT(rs.respuesta_1) AS total, sistema, ROUND((SUM(CASE WHEN rs.respuesta_1 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_1))+
        (SUM(CASE WHEN rs.respuesta_2 = 1 THEN 5 WHEN rs.respuesta_2 = 2 THEN 10 WHEN rs.respuesta_2 = 3 THEN 15 WHEN rs.respuesta_2 = 4 THEN 20 WHEN rs.respuesta_2 = 5 THEN 25 END)/COUNT(rs.respuesta_2))+
        (SUM(CASE WHEN rs.respuesta_3 = 1 THEN 25 ELSE 0 END)/COUNT(rs.respuesta_3))+
        (SUM(CASE WHEN rs.respuesta_4 = 1 THEN 25 WHEN rs.respuesta_4 = 2 THEN 15 WHEN rs.respuesta_4 = 3 THEN 5 END)/COUNT(rs.respuesta_4))) AS mas_5,  GROUP_CONCAT(DISTINCT rs.respuesta_5 SEPARATOR '  |  ' ) areas, 
       GROUP_CONCAT(DISTINCT rs.comentario_adicional SEPARATOR '  |  ' ) comentarios, GROUP_CONCAT(DISTINCT rs.evaluador SEPARATOR '  |  ' ) nombres
        FROM resultados_soporte rs WHERE rs.sistema = ".$valor." AND fecha_creacion BETWEEN '$fecha_ini 00:00:00' AND '$fecha_fin 23:59:59' GROUP BY rs.sistema");

      }
    }

    function get_valores_sistema(){
       return $this->db->query("SELECT 
        SUM(case when resultados.respuesta_1 = 1 then 1 else 0 end)*100/count(resultados.respuesta_1) as mas_1,
SUM(case when resultados.respuesta_1 = 0 then 1 else 0 end)*100/count(resultados.respuesta_1) as menos_1, 
(count(resultados.respuesta_1)/100) as todo_uno FROM resultados");
    }
}
