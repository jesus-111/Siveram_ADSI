<?php
    class detalle_formulario{
        function get_detalle_formulario()
        {
            $obj= " id_detalle,id_formulario,id_usuario,id_pregunta,id_ficha,fecha,respuesta_detalle,observacion,estado_det_for";
            return($obj);
        }
    }
?>