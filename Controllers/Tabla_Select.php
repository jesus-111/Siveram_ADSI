<?php
$arr_form = explode(",", $_POST['formulario']);
require_once ('../Data/m_' . $arr_form[0] . '.php');
$entity = new $arr_form[0]();
$get = 'get_' . $arr_form[0];
$lista = $entity->$get();
$arr = explode(",", $lista);
$head_table = "";
foreach ($arr as $obj)
    {
    $head_table .= '<th style="text-align: center">' . $obj . '</th>';
}
$head_table .= '<th>Editar</th>';
require_once ('./' . $arr_form[0] . '.php');
$class = new $arr_form[1]();
$params = "0,";
$parametros = "";
for ($x = 0; $x < count($arr); $x++) {
    $parametros .= $params;
}
$body_table = $class->$arr_form[2](1, 4, $parametros);
$row = "";
$id = 0;
$chk = 0;
    foreach ($body_table as $content) {
        $row .= "<tr>";
        for ($i = 0; $i < count($content); $i++) {
            if ($i == (count($content) - 1)) {
                if ($content[$i] == 1) {
                    $chk = 1;
                    $row .= '<td style="text-align: center"><div class="tooltip"><i class="material-icons tooltip" id="'.$chk.'">check_box</i><span class="tooltiptext">Activo</span></div></td>';
                }
                else {
                    $row .= '<td style="text-align: center"><div class="tooltip"><i class="material-icons tooltip"  id="'.$chk.'">check_box_outline_blank</i><span class="tooltiptext">Inactivo</span></td>';
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
        $row .= '<td style="text-align: center"><a onclick="Edit_Row(this);" name="2,' . $arr_form[0] . ',' . $id . '" style="cursor: pointer;"><i class="material-icons">edit</i></a></td></tr>';
    }

    echo "<table id='select' class='display' cellspacing='0'><thead><tr>" . $head_table . "</tr></thead><tboby>" . $row . "</tboby></table>";
?>