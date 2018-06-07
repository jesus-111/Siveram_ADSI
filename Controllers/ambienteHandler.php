<?php
    $accion =$_POST['accion'];      
    require_once("./ambiente.php");
    $environment = new environment();
    $estado = "1";
    if ($accion == "2") {
        $id_ambiente = $_POST['id_ambiente'];
        $nom_ambiente = $_POST['nom_ambiente'];   
        $cod_sede = $_POST['cod_sede'];  
        if (!isset($_POST['estado_ambiente'])) {
            $check= "checked='checked'";
            $estado = "0";
        }
        if ($nom_ambiente != "" || $cod_sede != "") {
            $dataamb= $environment->ambientes(1,$accion,$id_ambiente.','.$nom_ambiente.','.$cod_sede. ','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $nom_ambiente = $_POST['nom_ambiente'];   
        $cod_sede = $_POST['cod_sede'];          
        if (!isset($_POST['estado_ambiente'])) {
            $estado = "0";
        }
        if ($nom_ambiente != "" || $cod_sede != "") {
            $dataamb= $environment->ambientes(1,$accion,'0,'.$nom_ambiente.','.$cod_sede.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }
       
?>