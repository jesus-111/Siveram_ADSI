<?php
class City {	
	public function ciudades($form,$accion,$param)
	{
		$url = "";
		if ($form == 0)
			{
			$url ="../../Data/Conexion.php";
		}
		else {
			$url ="../Data/Conexion.php";
		}
		require_once ($url);
		// require_once("../../Data/Conexion.php"); 
		$data = new conect_sql();
		$Conexion = $data->Conectar();
		$parametros = explode(",", $param); 
		$datos = array(); 
		if($Conexion){
			$SP_Params = array(
				array($accion, SQLSRV_PARAM_IN),
				array($parametros[0], SQLSRV_PARAM_IN),
				array($parametros[1], SQLSRV_PARAM_IN),
				array($parametros[2], SQLSRV_PARAM_IN),
				array($parametros[3], SQLSRV_PARAM_IN)			
			);		
			$query = "{call [dbo].[Sp_ciudad] (?,?,?,?,?)}";			
			$stmt = sqlsrv_query($Conexion, $query, $SP_Params);						
			if($stmt === false){	
				echo "Error in executing statement 3.\n";
				die( print_r( sqlsrv_errors(), true));
			}else{	
				while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
					array_push($datos, $fila);	
				}						
				return $datos;																
			}
 			sqlsrv_free_stmt($stmt);
			sqlsrv_close($Conexion);						
		}else{
			echo "No se conecta.\n";
			print('<pre>');
			die( print_r( sqlsrv_errors(), true));
			print('</pre>');
		}
	}
}
?>