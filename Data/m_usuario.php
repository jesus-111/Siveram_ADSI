<?php
    class usuario{
        function get_usuario()
        {
            $obj= "tipo_documento,numero_documento,contrasena,nombres,primer_apellido,segundo_apellido,sexo,cod_ciudad,fecha_nacimiento,rol,correo,telefono,direccion,estado_usuario";
            return($obj);
        }
    }
?>