<?php
    $accion =$_POST['accion'];      
    require_once("./version.php");
    $versions = new versions();
    $estado = "1";
   if  ($accion == "2") {
        $id_version = $_POST['id_version'];
        $nom_version = $_POST['nom_version'];     
        if (!isset($_POST['estado_version'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($nom_version != "" ) {
            $datavers= $versions->versiones(1,$accion,$id_version.','.$nom_version.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $nom_version = $_POST['nom_version'];       
        if (!isset($_POST['estado_version'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($nom_version != "" ) {
            $datavers= $versions->versiones(1,$accion,'0,'.$nom_version.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    
   
    }
?>
