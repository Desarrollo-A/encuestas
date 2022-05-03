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
SUM(case when resultados.respuesta_1 = 1 then 1 else 0 end)*100/count(resultados.respuesta_1) as mas_1,
SUM(case when resultados.respuesta_2 = 1 then 1 else 0 end)*100/count(resultados.respuesta_2) as mas_2,
SUM(case when resultados.respuesta_3 = 1 then 1 else 0 end)*100/count(resultados.respuesta_3) as mas_3,
SUM(case when resultados.respuesta_4 = 1 then 1 else 0 end)*100/count(resultados.respuesta_4) as mas_4,
SUM(case when resultados.respuesta_5 = 1 then 1 else 0 end)*100/count(resultados.respuesta_5) as mas_5,
SUM(case when resultados.respuesta_6 = 1 then 1 else 0 end)*100/count(resultados.respuesta_6) as mas_6,
SUM(case when resultados.respuesta_7 = 1 then 1 else 0 end)*100/count(resultados.respuesta_7) as mas_7,
SUM(case when resultados.respuesta_8 = 1 then 1 else 0 end)*100/count(resultados.respuesta_8) as mas_8,
SUM(case when resultados.respuesta_9 = 1 then 1 else 0 end)*100/count(resultados.respuesta_9) as mas_9,
SUM(respuesta_10)/count(respuesta_10) as prom_estrellas,
SUM(case when resultados.respuesta_11 = 1 then 1 else 0 end) as bien_11,
SUM(case when resultados.respuesta_11 = 2 then 1 else 0 end) as regu_11,
SUM(case when resultados.respuesta_11 = 3 then 1 else 0 end) as mal_11,
SUM(case when resultados.respuesta_12 = 1 then 1 else 0 end) as bien_12,
SUM(case when resultados.respuesta_12 = 2 then 1 else 0 end) as regu_12,
SUM(case when resultados.respuesta_12 = 3 then 1 else 0 end) as mal_12,
resultados.respuesta_10,
resultados.respuesta_11,
resultados.respuesta_12,
count(resultados.respuesta_1) as total,
sistema
FROM resultados");
      }
      else{
       return $this->db->query("SELECT 
SUM(case when resultados.respuesta_1 = 1 then 1 else 0 end)*100/count(resultados.respuesta_1) as mas_1,
SUM(case when resultados.respuesta_2 = 1 then 1 else 0 end)*100/count(resultados.respuesta_2) as mas_2,
SUM(case when resultados.respuesta_3 = 1 then 1 else 0 end)*100/count(resultados.respuesta_3) as mas_3,
SUM(case when resultados.respuesta_4 = 1 then 1 else 0 end)*100/count(resultados.respuesta_4) as mas_4,
SUM(case when resultados.respuesta_5 = 1 then 1 else 0 end)*100/count(resultados.respuesta_5) as mas_5,
SUM(case when resultados.respuesta_6 = 1 then 1 else 0 end)*100/count(resultados.respuesta_6) as mas_6,
SUM(case when resultados.respuesta_7 = 1 then 1 else 0 end)*100/count(resultados.respuesta_7) as mas_7,
SUM(case when resultados.respuesta_8 = 1 then 1 else 0 end)*100/count(resultados.respuesta_8) as mas_8,
SUM(case when resultados.respuesta_9 = 1 then 1 else 0 end)*100/count(resultados.respuesta_9) as mas_9,
SUM(respuesta_10)/count(respuesta_10) as prom_estrellas,
SUM(case when resultados.respuesta_11 = 1 then 1 else 0 end) as bien_11,
SUM(case when resultados.respuesta_11 = 2 then 1 else 0 end) as regu_11,
SUM(case when resultados.respuesta_11 = 3 then 1 else 0 end) as mal_11,
SUM(case when resultados.respuesta_12 = 1 then 1 else 0 end) as bien_12,
SUM(case when resultados.respuesta_12 = 2 then 1 else 0 end) as regu_12,
SUM(case when resultados.respuesta_12 = 3 then 1 else 0 end) as mal_12,
resultados.respuesta_10,
resultados.respuesta_11,
resultados.respuesta_12,
count(resultados.respuesta_1) as total,
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
