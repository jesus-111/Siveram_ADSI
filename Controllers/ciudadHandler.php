<?php 
    $accion = $_POST['accion'];
    require_once("./ciudad.php");
    $City = new City();
    $estado = "1";
    $data = "";  
    if($accion == "1"){
        $cod_Programa = $_POST['cod_ciudad'];
        $nom_programa = $_POST['nom_ciudad'];   
        $sigla_programa = $_POST['cod_dep'];           
        if (!isset($_POST['estado_ciudad'])) {
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($cod_ciudad != "" || $nom_ciudad != "" || $cod_dep != "") {
            $dataPro= $City->ciudades(1,$accion,$cod_ciudad.','.$nom_ciudad.','.$cod_dep.','.$estado_ciudad);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }         
    }else if($accion == "2"){
        $cod_ciudad = $_POST['cod_ciudad'];
        $nom_ciudad = $_POST['nom_ciudad'];
        $cod_dep = $_POST['cod_dep'];
        if(!isset($_POST['estado_ciudad'])){
            $check = "checked='checked'";
            $estado = "0";
        }
        if ($cod_ciudad != "" || $nom_ciudad != "" || $cod_dep != "") {
            $dataPro= $City->ciudades(1,$accion,$cod_ciudad.','.$nom_ciudad.','.$cod_dep.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $id = $_POST['id'];
        $dataPro= $City->ciudades(1,$accion,'0,0,'.$id.',0');
        foreach ($dataPro as $item) {
            $text = $item[0].",".$item[1];
            $data .= $text."/";
        }
        echo $data;
    }
?>