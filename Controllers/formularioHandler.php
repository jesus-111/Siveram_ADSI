<?php 
    $accion = $_POST['accion'];
    require_once("./formulario.php");
    $forms = new forms();
    $estado = "1";  
    if($accion == "2"){ 
        $id_formulario = $_POST['id_formulario'];
        $id_version = $_POST['id_version'];
        $fecha = $_POST['fecha'];
        $id_asignacion = $_POST['Id_asignacion'];
        if(!isset($_POST['estado_formulario'])){
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($id_formulario != "" || $id_version != "" || $fecha != "" || $id_asignacion != "") {
            $dataPro= $forms->formularios(1,$accion,$id_formulario.','.$id_version.','.$fecha.','.$id_asignacion.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $id_version = $_POST['id_version'];   
        $fecha = $_POST['fecha']; 
        $id_asignacion = $_POST['Id_asignacion'];           
        if (!isset($_POST['estado_formulario'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($id_version != "" || $fecha != "" || $id_asignacion != "") {
            $dataPro= $forms->formularios(1,$accion,'0,'.$id_version.','.$fecha.','.$id_asignacion.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    
   
    }
?>