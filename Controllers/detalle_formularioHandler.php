<?php
$arr_accion = explode(",", $_POST['accion']);
$accion = $arr_accion[0];
require_once ("./detalle_formulario.php");
$detail_form = new detail_form();
$estado = "1";
$respuesta = "1";

if ($accion == "2") {
    $id_usuario = intval($_POST['id_usuario']);
    $id_detalle = intval($_POST['id_detalle']);
    $id_formulario = intval($_POST['id_formulario']);
    $id_pregunta = intval($_POST['id_pregunta']);
    $id_ficha = $_POST['id_ficha'];
    $observacion = $_POST['observacion'];
    $fecha = $_POST['fecha'];
    if (!isset($_POST['respuesta_detalle'])) {
        $respuesta = "0";
    }
    if (!isset($_POST['estado_det_for'])) {
        $estado = "0";
    }
    if ($id_formulario != 0 || $id_pregunta != 0 || $fecha != "") {
        $datadetalle = $detail_form->Detalles_formularios(1, $accion, $id_detalle . '-' . $id_formulario .'-'.$id_usuario .'-' . $id_pregunta . '-'. $id_ficha . '-' . $fecha . '-' . $respuesta . '-' . $observacion . '-' . $estado);
        echo '<script type="text/javascript">parent.closeIFrame();</script>';
    } else {
        echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
    }
} else if ($accion == "6") {
    $id_usuario = intval($_POST['id_usuario']);
    $id_detalle = intval($_POST['id_detalle']);
    $id_formulario = intval($_POST['id_formulario']);
    $id_pregunta = intval($_POST['id_pregunta']);
    $id_ficha = $_POST['id_ficha'];
    $observacion = $_POST['observacion'];
    $fecha = $_POST['fecha'];
    $respuesta = $_POST['respuesta_detalle'];
    $estado = $_POST['estado_det_for'];
    if ($id_formulario != 0 || $id_pregunta != 0 || $fecha != "") {
        $datadetalle = $detail_form->Detalles_formularios(1, $accion, $id_detalle .'-'. $id_formulario .'-'.$id_usuario.'-'. $id_pregunta . '-'. $id_ficha . '-' . $fecha . '-' . $respuesta . '-' . $observacion . '-' . $estado);
        if (count($datadetalle)>0) {
            echo $datadetalle[0][0];
        }
    }
}
?>