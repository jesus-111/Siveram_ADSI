<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/formulario.php");
$forms = new forms();
$dataform = $forms->formularios(0,4,"0,0,0,0,0"); 
$data = array();
$accion = 1;
$id = 'disabled';
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $check2 = "";
    $id = '';
    if ($data[6] == "1") {
        $check = "checked='checked'";        
    }
    if ($data[8] == "1") {
        $check2 = "checked='checked'";    
    }
    $accion = $data[9];     
}
?>
<div class="row">
    <form method="post" action="../../Controllers/detalle_formularioHandler.php">
        <input name="accion" type="hidden" value="<?php echo $accion ?>" />
            <div class="col l6">            
                <div class="input-field">
                    <input <?php if (count($data) == 0) {echo $id;} ?> id="id_detalle" name="id_detalle" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                    <label for="id_detalle">Id Detalle de Formulario</label>
                </div>
                <div class="input-field">
                    <input id="id_ficha" name="id_ficha" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[4];} ?>">
                    <label for="id_ficha">Id Ficha</label>
                </div>
                <div class="input-field">
                    <input id="id_usuario" name="id_usuario" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[2];} ?>">
                    <label for="id_usuario">Usuario: </label>
                </div>
                <div class="input-field">
                    <input id="id_pregunta" name="id_pregunta" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[3];} ?>">
                    <label for="id_pregunta">Id Pregunta</label>
                </div>                
            </div>
            <div class="col l6">
                <label for="respuesta_detalle">formulario</label>
                <div class="input-field">
                    <select name="id_formulario" id="selection" style="display: inline-block;">
                    <?php 
                        for ($a=0; $a < count($dataform) ; $a++) { 
                            if (count($data) != 0) {
                                if($dataform[$a][0] == $data[3]){
                                    echo '<option value='.$dataform[$a][0].' selected>'.$dataform[$a][1].'</option>';
                                }else {
                                    echo '<option value='.$dataform[$a][0].'>'.$dataform[$a][1].'</option>';
                                }
                            }else {
                                echo '<option value='.$dataform[$a][0].'>'.$dataform[$a][1].'</option>';
                            }                        
                        }                    
                    ?>                              
                    </select>
                </div>
                <div class="input-field">
                    <input id="observacion" name="observacion" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[7];} ?>">
                    <label for="observacion">Observacion</label>
                </div>
                <div class="input-field " style="margin-top:5px;height: 50px;">
                    <input id="fecha" type="text" name="fecha" class="datepicker" value="<?php if (count($data) != 0) {echo $data[5];} ?>" required>
                    <label for="fecha">Fecha</label>
                </div>
                <div class="row" style="margin-top: 38px;text-align: left;">
                    <div class="col l4">
                        <label for="respuesta_detalle">Respuesta</label>
                        <div class="switch">
                            <label>
                                No                   
                                <input type="checkbox" name="respuesta_detalle" id="respuesta_detalle" <?php if (count($data) != 0) {echo $check;} ?>>                
                                <span class="lever"></span>
                                Si
                            </label>
                        </div>
                    </div>
                    <div class="col l4">
                        <label for="respuesta_detalle">Sexo</label>
                        <div class="switch">
                            <label>
                                Inactivo                    
                                <input type="checkbox" name="estado_det_for" id="estado_det_for" <?php if (count($data) != 0) {echo $check2;} ?>>                
                                <span class="lever"></span>
                                Activo
                            </label>
                        </div>
                    </div>
                    <div class="col l4">
                        <button class="btn waves-effect waves-light" type="submit" name="guardar_detalle" id="guardar_detalle" >Guardar</button>            
                    </div>        
                </div>                                                        
            </div>                        
        </div>    
    </form>
</div>
