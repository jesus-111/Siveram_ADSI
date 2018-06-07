<?php
    $accion =$_POST['accion'];      
    require_once("./centro.php");
    $center = new center();
    $estado = "1";
    if ($accion == "2") {
        $id_centro = $_POST['id_centro'];
        $cod_centro = $_POST['cod_centro'];   
        $nom_centro = $_POST['nom_centro']; 
        $dir_centro = $_POST['dir_centro'];  
        $cod_ciudad = $_POST['cod_ciudad']; 
        if (!isset($_POST['estado_centro'])) {
            $check= "checked='checked'";
            $estado = "0";
        }
        if ($cod_centro != "" || $nom_centro != "" || $dir_centro != "" || $cod_ciudad != "") {
            $datacent= $center->centros(1,$accion,$id_centro.','.$cod_centro.','.$nom_centro. ','.$dir_centro. ','.$cod_ciudad. ','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $cod_centro = $_POST['cod_centro'];   
        $nom_centro = $_POST['nom_centro']; 
        $dir_centro = $_POST['dir_centro'];  
        $cod_ciudad = $_POST['cod_ciudad'];          
        if (!isset($_POST['estado_centro'])) {
            $estado = "0";
        }
        if ($cod_centro != "" || $nom_centro != "" || $dir_centro != "" || $cod_ciudad != "") {
            $datacent= $center->centros(1,$accion,'0,'.$cod_centro.','.$nom_centro. ','.$dir_centro. ','.$cod_ciudad. ','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }
   
    
?>