<?php
class detail_form
{
	public function Detalles_formularios($form, $accion, $param)
	{
		$url = "";
		if ($form == 0) {
			$url = "../../Data/Conexion.php";
		} else {
			$url = "../Data/Conexion.php";
		}
		require_once($url);
		$data = new conect_sql();
		$Conexion = $data->Conectar();
		if (strpos($param, ',')) {
			$param = substr($param, 0, -1);
			$param = str_replace(',', '-', $param);
		}
		$parametros = explode("-", $param);
		$datos = array();
		if ($Conexion) {
			if (is_string($parametros[0])) {
				$reemplazos = array(0 => intval($parametros[0]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			if (is_string($parametros[1])) {
				$reemplazos = array(1 => intval($parametros[1]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			if (is_string($parametros[2])) {
				$reemplazos = array(2 => intval($parametros[2]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			if (is_string($parametros[3])) {
				$reemplazos = array(3 => intval($parametros[3]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			if (is_string($parametros[4])) {
				$reemplazos = array(4 => intval($parametros[4]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			if ($parametros[5] == "0") {
				$reemplazos = array(5 => "01/01/2000");
				$parametros = array_replace($parametros, $reemplazos);
			} 
			if (is_string($parametros[6])) {
				$reemplazos = array(6 => intval($parametros[6]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			if (is_string($parametros[8])) {
				$reemplazos = array(8 => intval($parametros[8]));
				$parametros = array_replace($parametros, $reemplazos);
			}
			$SP_Params = array(
				array($accion, SQLSRV_PARAM_IN),
				array($parametros[0], SQLSRV_PARAM_IN),
				array($parametros[1], SQLSRV_PARAM_IN),
				array($parametros[2], SQLSRV_PARAM_IN),
				array($parametros[3], SQLSRV_PARAM_IN),
				array($parametros[4], SQLSRV_PARAM_IN),
				array($parametros[5], SQLSRV_PARAM_IN),
				array($parametros[6], SQLSRV_PARAM_IN),
				array($parametros[7], SQLSRV_PARAM_IN),
				array($parametros[8], SQLSRV_PARAM_IN)
			);
			$query = "{call [dbo].[Sp_detalle_formulario] (?,?,?,?,?,?,?,?,?,?)}";
			$stmt = sqlsrv_query($Conexion, $query, $SP_Params);
			if ($stmt === false) {
				echo "Error in executing statement 3.\n";
				die(print_r(sqlsrv_errors(), true));
			} else {
				while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
					array_push($datos, $fila);
				}
				return $datos;
			}
			sqlsrv_free_stmt($stmt);
			sqlsrv_close($Conexion);
		} else {
			echo "No se conecta.\n";
			print('<pre>');
			die(print_r(sqlsrv_errors(), true));
			print('</pre>');
		}
	}
}
?>
