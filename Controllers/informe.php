<?php 
$user = $_POST['usuario'];
require_once ('../Data/m_detalle_formulario.php');
$entity = new detalle_formulario();
$get = 'get_detalle_formulario';
$lista = $entity->$get();
$arr = explode(",", $lista);
require_once ("./detalle_formulario.php");
$detail_form = new detail_form();
$body_table = $detail_form->Detalles_formularios(1, 7, "0-0-".$user."-0-0-0-0-0-0-0");
$row = "";
$id = 0;
foreach ($body_table as $content) {
    $row .= "<tr>";
    for ($i = 0; $i < count($content); $i++) {
        if ($i == (count($content) - 1)) {
            if ($content[$i] == 1) {
                $row .= '<td style="text-align: center"><div class="tooltip"><i class="material-icons tooltip" id="0">check_box</i><span class="tooltiptext">Activo</span></div></td>';
            }
            else {
                $row .= '<td style="text-align: center"><div class="tooltip"><i class="material-icons tooltip" id="1">check_box_outline_blank</i><span class="tooltiptext">Inactivo</span></td>';
            }
        }
        else {
            if ($i == 0) {
                $id = $content[$i];
                $row .= '<td style="text-align: center">' . $content[$i] . "</td>";
            }
            else {
                $row .= '<td style="text-align: center">' . $content[$i] . "</td>";
            }
        }
    } 
    $row .= "</tr>";   
}
$head_table = '';
echo '
<div class="col l2">
</div>
<div class="col l10">
    <div class="row">
        <div class="col l1" style="text-align:center">
            <img src="../../Content/Images/logo_sena.png" class="center-align" style="height: 110px;">
        </div>
        <div class="col l11">
            <p class="center-align">
            <b>SERVICIO NACIONAL DE APRENDIZAJE SENA</b><BR>
            <b>SISTEMA DE GESTION INTEGRADO</b><BR>
            <b>Procedimiento Ejecucion de la Formación Profesional Integral</b><BR>
                INFORME LISTA DE CHEQUEO DE AMBIENTES DE APRENDIZAJE            
            </p>
        </div>
    </div>
    <div class="row">
        <table id="select" class="display" cellspacing="0">
        <thead>
        <th style="text-align: center">No. Lista</th>
        <th style="text-align: center">No. Formulario</th>
        <th style="text-align: center">No. Usuario</th>
        <th style="text-align: center">Ficha</th>
        <th style="text-align: center">Nro. Pregunta</th>
        <th style="text-align:">Pregunta</th>
        <th style="text-align:">Respuesta</th>
        <th style="text-align:">Fecha Diligencia</th>
        <th style="text-align:">Observación</th>
        <th style="text-align:">Estado formulario</th>
        </tr>
        </thead>
        <tboby>' . $row . '</tboby>
        </table>
    </div>
</div>
';
?>