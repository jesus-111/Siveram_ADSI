<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/programa.php");
$programs = new programs();
$dataamb = $programs->programas(0,4,"0,0,0,0"); 
$data = array();
$accion = 1;
$id = 'disabled';   
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $id = '';
    if ($data[3] == "0") {
        $check = "checked='checked'";
        $val = "0";
    }
    $accion = $data[4];     
}
?>
 <script src="../../Script/Site/Limitantes.js"></script>
<div class="row">
    <form method="post" action="../../Controllers/programaHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
            <div class="input-field">
                <input id="cod_programa" name="cod_programa" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="cod_programa">Cod_programa</label>
            </div>
            <div class="input-field">
                <input id="sigla_programa" name="sigla_programa" type="text" class="validate" onkeypress="return val(event)"  value="<?php if (count($data) != 0) {echo $data[2];} ?>">
                <label for="sigla_programa">Sigla</label>
            </div>
        </div>
            <div class="row" style="margin-top: 38px;text-align: center;">
                <div class="col l6">
                <div class="input-field">
                <input id="nom_programa" name="nom_programa" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                <label for="nom_programa">Nombre programa</label>
            </div>
                    <div class="switch">
                        <label>
                            Inactivo                    
                            <input type="checkbox" name="estado_programa" id="estado_programa" <?php if (count($data) != 0) {echo $check;} ?>>                
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
                        <button class="btn waves-effect waves-light" type="submit" name="guardar_programa" id="guardar_programa" >Guardar</button>            
                    </div>
    </form>

