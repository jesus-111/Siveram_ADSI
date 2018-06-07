<?php 
$accion =$_POST['accion'];      
require_once("./usuario.php");
$Users = new Users();
$estado = "1";
$estado2 = "1";
if ($accion == "2") {
    $documento = $_POST['documento'];
    $num_doc = $_POST['num_doc'];   
    $cof_cont = $_POST['cof_cont'];
    $nom = $_POST['nom'];
    $ape1 = $_POST['ape1'];   
    $ape2 = $_POST['ape2'];  
    $cityname = $_POST['cityname']; 
    $fecha = $_POST['fecha'];   
    $rol = $_POST['rol'];
    $c_elec = $_POST['c_elec'];
    $tel = $_POST['tel'];   
    $dir = $_POST['dir'];  
    if (!isset($_POST['gen'])) {        
        $estado = "0";
    }
    if (!isset($_POST['estado_usuario'])) {        
        $estado2 = "0";
    }
    if ($documento != "" || $num_doc != "" || $cof_cont != "" || $nom != "" || $ape1 != "" || $ape2 != "" || $cityname != "" || $fecha != "" || $rol != "" || $c_elec != "" || $tel != "" || $dir != "") {
        $datauser= $Users->usuarios(2,$accion,$documento.','.$num_doc. ','.$cof_cont.','.$nom.','.$ape1. ','.$ape2.','.$estado.','.$cityname.','.$fecha.','.$rol. ','.$c_elec.','.$tel.','.$dir.','.$estado2);
        echo '<script type="text/javascript">parent.closeIFrame();</script>';
    }else{
        echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
    }
}else{
    $documento = $_POST['documento'];
    $num_doc = $_POST['num_doc'];   
    $cof_cont = $_POST['cof_cont'];
    $nom = $_POST['nom'];
    $ape1 = $_POST['ape1'];   
    $ape2 = $_POST['ape2'];  
    $cityname = $_POST['cityname'];
    $fecha = $_POST['fecha'];
    $rol = $_POST['rol'];
    $c_elec = $_POST['c_elec'];
    $tel = $_POST['tel'];   
    $dir = $_POST['dir'];  
    if (!isset($_POST['gen'])) {        
        $estado = "0";
    }
    $estado_formulario = $_POST['estado_usuario'];
    if (!isset($_POST['estado_ambiente'])) {        
        $estado2 = "0";
    }
    if ($documento != "" || $num_doc != "" || $cof_cont != "" || $nom != "" || $ape1 != "" || $ape2 != "" || $cityname != "" || $fecha != "" || $rol != "" || $c_elec != "" || $tel != "" || $dir != "") {
        $datauser= $Users->usuarios(2,$accion,$documento.','.$num_doc. ','.$cof_cont.','.$nom.','.$ape1. ','.$ape2.','.$estado.','
        .$cityname.','.$fecha.','.$rol. ','.$c_elec.','.$tel.','.$dir.','.$estado2);
        echo '<script type="text/javascript">parent.closeIFrame();</script>';
    }else{
        echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
    }
}
?>