<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/version.php");
$versions = new versions();
$datavers = $versions->versiones(0,4,"0,0,0"); 
$data = array();
$accion = 1;
$id = 'disabled';   
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $id = '';
    if ($data[2] == "0") {
        $check = "checked='checked'";
        $val = "0";
    }
    $accion = $data[3];     
}
?>
<div class="row">
    <form method="post" action="../../Controllers/versionHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
            <div class="input-field">
                <input <?php if (count($data) == 0) {echo $id;} ?> id="id_version" name="id_version" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="id_version">Id Version</label>
            </div>
        </div>
            <div class="row" style="margin-top: 38px;text-align: center;">
                <div class="col l6">
                <div class="input-field">
                <input id="nom_version" name="nom_version" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                <label for="nom_version">Nombre Version</label>
            </div>
                    <div class="switch">
                        <label>
                            Inactivo                    
                            <input type="checkbox" name="estado_version" id="estado_version" <?php if (count($data) != 0) {echo $check;} ?>>                
                            <span class="lever"></span>
                            Activo
                        </label>
                    </div>    
                </div> 
                </div>
            </div>                       
        </div>
        <div class="col l6">
                    <div>                            
                        <button class="btn waves-effect waves-light" type="submit" name="guardar_version" id="guardar_version" >Guardar</button>            
                    </div>
    </form>
