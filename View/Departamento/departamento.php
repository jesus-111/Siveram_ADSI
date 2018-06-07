<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/departamento.php");
$government = new government();
$datadep = $government->departamentos(0,4,"0,0,0"); 
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
<script src="../../Script/Site/Limitantes.js"></script>
<div class="row">
    <form method="post" action="../../Controllers/departamentoHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
            <div class="input-field">
                <input id="cod_dep" name="cod_dep" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="cod_dep">Codigo Departamento</label>
            </div>
        </div>
            <div class="row" style="margin-top: 38px;text-align: center;">
                <div class="col l6">
                <div class="input-field">
                <input id="nom_dep" name="nom_dep" type="text" class="validate" onkeypress="return val(event)" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                <label for="nom_programa">Nombre Departamento</label>
            </div>
                    <div class="switch">
                        <label>
                            Inactivo                    
                            <input type="checkbox" name="estado_Departamento" id="estado_Departamento" <?php if (count($data) != 0) {echo $check;} ?>>                
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
                        <button class="btn waves-effect waves-light" type="submit" name="guardar_departamento" id="guardar_departamento" >Guardar</button>            
                    </div>
    </form>

