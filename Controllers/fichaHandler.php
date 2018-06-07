<?php
    $accion =$_POST['accion'];      
    require_once("./ficha.php");
    $records = new records();
    $estado = "1";
    if ($accion == "2") {
        $id_ficha = $_POST['id_ficha'];
        $nom_ficha = $_POST['nom_ficha'];   
        $cod_Programa = $_POST['cod_programa'];
        $id_ambiente = $_POST['id_ambiente'];
        $jornada = $_POST['jornada'];            
        if (!isset($_POST['estado_ficha'])) {
            $estado = "0";
        }
        if ($nom_ficha != "" || $cod_Programa != "" || $jornada != "") {
            $datafic= $records->fichas(1,$accion,$id_ficha.','.$nom_ficha.','.$cod_Programa.','.$id_ambiente.','.$jornada.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $nom_ficha = $_POST['nom_ficha'];   
        $cod_Programa = $_POST['cod_Programa'];
        $id_ambiente = $_POST['id_ambiente'];
        $jornada = $_POST['jornada'];            
        if ($_POST['estado_ficha'] == "2") {
            $estado = "0";
        }
        if ($nom_ficha != "" || $cod_Programa != "" || $jornada != "") {
            $datafic= $records->fichas(1,$accion,'0,'.$nom_ficha.','.$cod_Programa.','.$id_ambiente.','.$jornada.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }
   
    
?>