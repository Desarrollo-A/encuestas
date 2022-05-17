<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }

   function get_sistemas_lista(){
      return $this->db->query("SELECT * FROM sistemas ORDER BY sistemas.nombre");
   }

   function get_sistemas_lista_encuesta( $token ){
      return $this->db->query("SELECT * FROM sistemas WHERE sistemas.id IN ( SELECT tokenprov.sistema FROM tokenprov WHERE tokenprov.token = '$token' ) ORDER BY sistemas.nombre");
   }

   function get_porque_lista($val1, $val2){
      return $this->db->query("SELECT porque_".$val1." as porq FROM resultados WHERE sistema = ".$val2." AND porque_".$val1." not like ''");
   }

   function get_comen_lista($valor2){
      return $this->db->query("SELECT comentario_adicional FROM resultados WHERE sistema = ".$valor2." AND comentario_adicional not like ''");
   }

   function get_sistema($valor){

      if($valor == '100'){
         return $this->db->query("SELECT
         SUM(CASE WHEN resultados.respuesta_1 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_1) AS mas_1,
         SUM(CASE WHEN resultados.respuesta_2 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_2) AS mas_2,
         SUM(CASE WHEN resultados.respuesta_3 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_3) AS mas_3,
         SUM(CASE WHEN resultados.respuesta_4 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_4) AS mas_4,
         SUM(CASE WHEN resultados.respuesta_5 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_5) AS mas_5,
         SUM(CASE WHEN resultados.respuesta_6 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_6) AS mas_6,
         SUM(CASE WHEN resultados.respuesta_7 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_7) AS mas_7,
         SUM(CASE WHEN resultados.respuesta_8 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_8) AS mas_8,
         SUM(CASE WHEN resultados.respuesta_9 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_9) AS mas_9,
         SUM(respuesta_10)/COUNT(respuesta_10) AS prom_estrellas,
         SUM(CASE WHEN resultados.respuesta_11 = 1 THEN 1 ELSE 0 END) AS bien_11,
         SUM(CASE WHEN resultados.respuesta_11 = 2 THEN 1 ELSE 0 END) AS regu_11,
         SUM(CASE WHEN resultados.respuesta_11 = 3 THEN 1 ELSE 0 END) AS mal_11,
         SUM(CASE WHEN resultados.respuesta_12 = 1 THEN 1 ELSE 0 END) AS bien_12,
         SUM(CASE WHEN resultados.respuesta_12 = 2 THEN 1 ELSE 0 END) AS regu_12,
         SUM(CASE WHEN resultados.respuesta_12 = 2 THEN 1 ELSE 0 END) AS mal_12,
         resultados.respuesta_10,
         resultados.respuesta_11,
         resultados.respuesta_12,
         COUNT(resultados.respuesta_1) AS total,
         sistema
         FROM resultados");
      }
      else{
         return $this->db->query("SELECT
         SUM(CASE WHEN resultados.respuesta_1 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_1) AS mas_1,
         SUM(CASE WHEN resultados.respuesta_2 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_2) AS mas_2,
         SUM(CASE WHEN resultados.respuesta_3 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_3) AS mas_3,
         SUM(CASE WHEN resultados.respuesta_4 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_4) AS mas_4,
         SUM(CASE WHEN resultados.respuesta_5 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_5) AS mas_5,
         SUM(CASE WHEN resultados.respuesta_6 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_6) AS mas_6,
         SUM(CASE WHEN resultados.respuesta_7 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_7) AS mas_7,
         SUM(CASE WHEN resultados.respuesta_8 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_8) AS mas_8,
         SUM(CASE WHEN resultados.respuesta_9 = 1 THEN 1 ELSE 0 END)*100/COUNT(resultados.respuesta_9) AS mas_9,
         SUM(respuesta_10)/COUNT(respuesta_10) AS prom_estrellas,
         SUM(CASE WHEN resultados.respuesta_11 = 1 THEN 1 ELSE 0 END) AS bien_11,
         SUM(CASE WHEN resultados.respuesta_11 = 2 THEN 1 ELSE 0 END) AS regu_11,
         SUM(CASE WHEN resultados.respuesta_11 = 3 THEN 1 ELSE 0 END) AS mal_11,
         SUM(CASE WHEN resultados.respuesta_12 = 1 THEN 1 ELSE 0 END) AS bien_12,
         SUM(CASE WHEN resultados.respuesta_12 = 2 THEN 1 ELSE 0 END) AS regu_12,
         SUM(CASE WHEN resultados.respuesta_12 = 3 THEN 1 ELSE 0 END) AS mal_12,
         resultados.respuesta_10,
         resultados.respuesta_11,
         resultados.respuesta_12,
         COUNT(resultados.respuesta_1) AS total,
         sistema
         FROM resultados WHERE sistema = ".$valor."");
      }
   }

   function get_valores_sistema(){
      return $this->db->query("SELECT 
      SUM(case when resultados.respuesta_1 = 1 then 1 else 0 end)*100/count(resultados.respuesta_1) as mas_1,
      SUM(case when resultados.respuesta_1 = 0 then 1 else 0 end)*100/count(resultados.respuesta_1) as menos_1, 
      (count(resultados.respuesta_1)/100) as todo_uno FROM resultados");
   }
}
