<?php
    $accion =$_POST['accion'];      
    require_once("./pregunta.php");
    $questions = new questions();
    $estado = "1";
    if ($accion == "2") {
        $id_pregunta = $_POST['id_pregunta'];
        $descripcion_pregunta = $_POST['descripcion_pregunta'];   
        $id_formulario = $_POST['id_formulario'];         
        if (!isset($_POST['estado_pregunta'])) {
            $estado = "0";
        }
        if ($descripcion_pregunta != "" || $id_formulario != "") {
            $datapre= $questions->preguntas(1,$accion,$id_pregunta.','.$descripcion_pregunta.','.$id_formulario.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }else{
        $id_pregunta = $_POST['id_pregunta'];
        $descripcion_pregunta = $_POST['descripcion_pregunta'];   
        $id_formulario = $_POST['id_formulario'];         
        if (!isset($_POST['estado_pregunta'])) {
            $estado = "0";
        }
        if ($descripcion_pregunta != "" || $id_formulario != "") {
            $datapre= $questions->preguntas(1,$accion,'0,'.$descripcion_pregunta.','.$id_formulario.','.$estado);
            echo '<script type="text/javascript">parent.closeIFrame();</script>';
        }else{
            echo '<script type="text/javascript">alert("Hay campos vacios en el formulario");</script>';
        }
    }
   
    
?>