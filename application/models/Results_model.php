<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results_model extends CI_Model {

   function __construct(){
        parent::__construct();
    }

    function getProyectInformation($id_sistema){
        return $this->db->query("SELECT s.id, s.nombre systemName,
        CASE r.respuesta_1 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_1,
        CASE r.respuesta_2 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_2,
        CASE r.respuesta_3 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_3,
        CASE r.respuesta_4 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_4,
        CASE r.respuesta_5 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_5,
        CASE r.respuesta_6 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_6,
        CASE r.respuesta_7 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_7,
        CASE r.respuesta_8 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_8,
        CASE r.respuesta_9 WHEN 1 THEN 'Sí' ELSE 'No' END respuesta_9,
        CASE r.respuesta_10 WHEN 1 THEN 'Insuficiente' WHEN 2 THEN 'Regular' WHEN 3 THEN 'Regular' WHEN 4 THEN 'Muy bueno' WHEN 5 THEN 'Excelente' END respuesta_10,
        CASE r.respuesta_11 WHEN 1 THEN 'Bueno' WHEN 2 THEN 'Regular' WHEN 3 THEN 'Malo' END respuesta_11,
        CASE r.respuesta_12 WHEN 1 THEN 'Bueno' WHEN 2 THEN 'Regular' WHEN 3 THEN 'Malo' END respuesta_12,
        CASE WHEN r.porque_1 = '' THEN 'Comentario no especificado' ELSE r.porque_1 END porque_1, 
        CASE WHEN r.porque_2 = '' THEN 'Comentario no especificado' ELSE r.porque_2 END porque_2, 
        CASE WHEN r.porque_3 = '' THEN 'Comentario no especificado' ELSE r.porque_3 END porque_3, 
        CASE WHEN r.porque_4 = '' THEN 'Comentario no especificado' ELSE r.porque_4 END porque_4, 
        CASE WHEN r.porque_5 = '' THEN 'Comentario no especificado' ELSE r.porque_5 END porque_5, 
        CASE WHEN r.porque_6 = '' THEN 'Comentario no especificado' ELSE r.porque_6 END porque_6,
        CASE WHEN r.porque_7 = '' THEN 'Comentario no especificado' ELSE r.porque_7 END porque_7, 
        CASE WHEN r.porque_8 = '' THEN 'Comentario no especificado' ELSE r.porque_8 END porque_8, 
        CASE WHEN r.porque_9 = '' THEN 'Comentario no especificado' ELSE r.porque_9 END porque_9, r.evaluador, 
        CASE WHEN r.comentario_adicional = '' THEN 'Comentario no especificado' ELSE r.comentario_adicional END comentario_adicional
        FROM sistemas s
        INNER JOIN resultados r ON r.sistema = s.id
        WHERE s.id = $id_sistema");
    }

    function getPromedio($id_sistema){
        return $this->db->query("SELECT r.sistema, 
        CASE r.respuesta_1 WHEN 1 THEN 8.333 ELSE 0 END result1,
        CASE r.respuesta_2 WHEN 1 THEN 8.333 ELSE 0 END result2,
        CASE r.respuesta_3 WHEN 1 THEN 8.333 ELSE 0 END result3,
        CASE r.respuesta_4 WHEN 1 THEN 8.333 ELSE 0 END result4,
        CASE r.respuesta_5 WHEN 1 THEN 8.333 ELSE 0 END result5,
        CASE r.respuesta_6 WHEN 1 THEN 8.333 ELSE 0 END result6,
        CASE r.respuesta_7 WHEN 1 THEN 8.333 ELSE 0 END result7,
        CASE r.respuesta_8 WHEN 1 THEN 8.333 ELSE 0 END result8,
        CASE r.respuesta_9 WHEN 1 THEN 8.333 ELSE 0 END result9,
        CASE r.respuesta_10 WHEN 1 THEN 1.666 WHEN 2 THEN 3.332 WHEN 3 THEN 4.998 WHEN 4 THEN 6.664 WHEN 5 THEN 8.333 END result10,
        CASE r.respuesta_11 WHEN 1 THEN 8.333 WHEN 2 THEN 4.165 WHEN 3 THEN 2.0825 END result11,
        CASE r.respuesta_12 WHEN 1 THEN 8.333 WHEN 2 THEN 4.165 WHEN 3 THEN 2.0825 END result12
        FROM resultados r WHERE r.sistema = $id_sistema");
    }

}
