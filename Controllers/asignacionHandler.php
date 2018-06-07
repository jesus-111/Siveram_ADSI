<?php
    $accion =$_POST['accion'];      
    require_once("./asignacion.php");
    $assignments = new assignments();
    $estado = "1";
    if ($accion == "2") {
        $id_asignacion = $_POST['id_asignacion'];
        $id_ficha = $_POST['id_ficha'];   
        $num_documento = $_POST['num_documento'];  
        if (!isset($_POST['estado_asignacion'])) {
            $estado = "0";
        }
        if ($id_ficha != "" || $num_documento != "") {
            $datasig= $assignments->asignaciones(1,$accion,$id_asignacion.','.$id_ficha.','.$num_documento.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $id_ficha = $_POST['id_ficha'];   
        $num_documento = $_POST['num_documento'];          
        if (!isset($_POST['estado_asignacion'])) {
            $estado = "0";
        }
        if ($id_ficha != "" || $num_documento != "") {
            $dataamb= $assignments->asignaciones(1,$accion,'0,'.$id_ficha.','.$num_documento.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }
   
    
?>