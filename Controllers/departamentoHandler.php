<?php
    $accion =$_POST['accion'];      
    require_once("./departamento.php");
    $government = new government();
    $estado = "1";
   if  ($accion == "2") {
        $cod_dep = $_POST['cod_dep'];
        $nom_dep = $_POST['nom_dep'];     
        if (!isset($_POST['estado_Departamento'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($cod_dep != "" || $nom_dep != "" ) {
            $datadep= $government->departamentos(1,$accion,$cod_dep.','.$nom_dep.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $cod_dep = $_POST['cod_dep'];
        $nom_dep = $_POST['nom_dep'];     
        if (!isset($_POST['estado_Departamento'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($cod_dep != "" || $nom_dep != "" ) {
            $datadep= $government->departamentos(1,$accion,$cod_dep.','.$nom_dep.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    
   
    }
?>
