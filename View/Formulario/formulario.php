<?php
require_once("../Master/Content_script.php");
require_once("../../Controllers/version.php");
$versions = new versions();
$datasede = $versions->versiones(0, 4, "0,0,0,0,0");
$data = array();
$accion = 1;
$val = "2";
$id = 'disabled';
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $id = '';
    if ($data[4] == "0") {
        $check = "checked='checked'";
        $val = "1";
    }
    $accion = $data[5];
}
?>
<div class="row">
    <form method="post" action="../../Controllers/formularioHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
                <div class="input-field">
                    <input  <?php if (count($data) == 0) {  echo $id;} ?>  id="id_formulario" name="id_formulario" type="text" class="validate" value="<?php if (count($data)!= 0){echo $data[0];} ?>">
                    <label for="id_formulario">Codigo del formulario</label>
                </div>
                <div class="input-field">
                    <input id="id_version" name="id_version" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                    <label for="id_version">Codigo de la version</label>
                </div> 
        </div>        
            <div class="col l6">
                <div class="input-field">
                    <input id="fecha" name="fecha" type="text" class="validate" value="<?php if (count($data) != 0) {  echo $data[2]; } ?>">
                    <label for="fecha">Fecha</label>
                </div>
                <div class="input-field">
                    <input id="id_asignacion" name="Id_asignacion" type="text" class="validate" value="<?php if (count($data) != 0) {   echo $data[3];  } ?>">
                    <label for="id_asignacion">Codigo de la asignacion</label>
                </div>
            </div>
            <div class="row">
                <div class="col 16">
                    <div class="input-field"></div>
            <div class="row" style="margin-top: 38px;text-align: center;">
            <div class="switch">
            <label>
                Inactivo                    
                <input type="checkbox" name="estado_formulario" id="estado_formulario" <?php if (count($data) != 0) {  echo $check; } ?>>                
                <span class="lever"></span>
                Activo
            </label>
        </div>
                </div>

                <div>                            
                    <button class="btn waves-effect waves-light" type="submit" name="guardar_formulario" id="guardar_formulario" >Guardar</button>            
                </div>    
                </div>
                </div>                         
        </div>  
    </form>
</div>


