<?php
class conect_sql{
    public function Conectar() {
        //$ServerName = "DEVELOPER";
        //$ServerName = "JAVIER";
        $ServerName = "SENADEV-01";
		$InfoConexion = array("Database" => "verificacion_ambientes", "UID" => "sa", "PWD" => "Abcde123456");
		$Conexion = sqlsrv_connect($ServerName, $InfoConexion); 
        if ($Conexion == false) {
            die(print_r(sqlsrv_errors(), true));
        }else{
            return $Conexion;
        }
    }
}
