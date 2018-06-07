<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/pregunta.php");
$questions = new questions();
$datapreg= $questions->preguntas(0,4,"0,0,0,0"); 
$data = array();
$accion = 1;
$id = 'disabled';
if (isset($_GET['info'])) {   
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $val = '';
    if ($data[3] == "0") {
        $check = "checked='checked'";
        $val = "0";
    }
    $accion = $data[4];     
}   
?>
<div class="row">
    <form method="post" action="../../Controllers/preguntaHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>">
        <div class="col l6">
            <div class="input-field">
                <input id="id_pregunta" name="id_pregunta" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="id_pregunta">Id pregunta</label>
            </div>
            <div class="input-field">
                <input id="descripcion_pregunta" name="descripcion_pregunta" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                <label for="descripcion_pregunta">Descripcion Pregunta</label>
            </div>
            <div class="switch">
                <label>
                    Inactivo                    
                    <input type="checkbox" id="estado_pregunta" name="estado_pregunta" <?php if (count($data) != 0) {echo $check;} ?>>             
                    <span class="lever"></span>
                    Activo
                </label>
            </div>  
        </div>
        <div class="col l6">
            <div class="input-field">
                <input id="id_formulario" name="id_formulario" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[2];} ?>">
                <label for="id_formulario">Id Formulario</label>
            </div>
            <div class="input-field">
                
            </div>
            <div>                            
                <button class="btn waves-effect waves-light" type="submit" name="guardar_pregunta" id="guardar_pregunta" >Guardar</button>            
            </div>
        </div>    
    </form>
</div>
