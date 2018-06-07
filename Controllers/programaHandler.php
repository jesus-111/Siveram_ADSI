<?php
    $accion =$_POST['accion'];      
    require_once("./programa.php");
    $programs = new programs();
    $estado = "1";
   if  ($accion == "2") {
        $cod_Programa = $_POST['cod_programa'];
        $nom_programa = $_POST['nom_programa'];   
        $sigla_programa = $_POST['sigla_programa']; 
        if (!isset($_POST['estado_programa'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($cod_Programa != "" || $nom_programa != "" || $sigla_programa != "") {
            $dataPro= $programs->programas(1,$accion,$cod_Programa.','.$nom_programa.','.$sigla_programa.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $cod_Programa = $_POST['cod_programa'];
        $nom_programa = $_POST['nom_programa'];   
        $sigla_programa = $_POST['sigla_programa'];           
        if (!isset($_POST['estado_programa'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($cod_Programa != "" || $nom_programa != "" || $sigla_programa != "") {
            $dataPro= $programs->programas(1,$accion,$cod_Programa.','.$nom_programa.','.$sigla_programa.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    
   
    }
?>
