<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/departamento.php");
$government = new government();
$datasede = $government->departamentos(0,4,"0,0,0,0,0"); 
$data = array();
$accion = 1;
$val = "2";
$id = 'disabled';
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $id = '';
    if ($data[3] == "0") {
        $check = "checked='checked'";
        $val = "1";
    }
    $accion = $data[4];     
}
?>
<script src="../../Script/Site/Limitantes.js"></script>
<div class="row">
    <form method="post" action="../../Controllers/ciudadHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
                <div class="input-field">
                    <input <?php if (count($data) == 0) {echo $id;} ?> id="cod_ciudad" name="cod_ciudad" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                    <label for="cod_ciudad">cod ciudad</label>
                </div>
                <div class="input-field">
                    <input id="nom_ciudad" name="nom_ciudad" type="text" class="validate"  onkeypress="return val(event)" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                    <label for="nom_ciudad">Nombre Ciudad</label>
                </div> 
        </div>        
                <div class="col l6">
                <div class="input-field">
                    <input id="cod_dep" name="cod_dep" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[2];} ?>">
                    <label for="cod_dep">Codigo Departamento</label>
        
        </div>
</div>
                <div class="row">
                <div class="col 16">
            
            <div class="input-field">
                             
            </div>
            <div class="row" style="margin-top: 38px;text-align: center;">
            <div class="switch">
            <label>
                Inactivo                    
                <input type="checkbox" name="estado_ciudad" id="estado_ciudad" <?php if (count($data) != 0) {echo $check;} ?>>                
                <span class="lever"></span>
                Activo
            </label>
        </div>
                </div>

                <div>                            
                    <button class="btn waves-effect waves-light" type="submit" name="guardar_sede" id="guardar_sede" >Guardar</button>            
                </div>    
                </div>
                </div>                         
        </div>  
    </form>
</div>


