<?php
    $accion =$_POST['accion'];      
    require_once("./sede.php");
    $headquarters = new headquarters();
    $estado = "1";
   if  ($accion == "2") {
        $codigo = $_POST['codigo'];
        $nom_sede = $_POST['nom_sede'];
        $direccion = $_POST['direc'];    
        $id_centro = $_POST['id_centro']; 
        if (!isset($_POST['estado_sede'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($nom_sede != "" || $direccion != "" || $id_centro != "") {
            $dataSede= $headquarters->sedes(1,$accion,$codigo.','.$nom_sede.','.$direccion.','.$id_centro.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $codigo = $_POST['codigo'];
        $nom_sede = $_POST['nom_sede'];
        $direccion = $_POST['direc'];    
        $id_centro = $_POST['id_centro']; 
        if (!isset($_POST['estado_sede'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($nom_sede != "" || $direccion != "" || $id_centro != "") {
            $dataSede= $headquarters->sedes(1,$accion,'0'.','.$nom_sede.','.$direccion.','.$id_centro.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    
   
    }
?>
