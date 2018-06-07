<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/ciudad.php");
$City = new City();
$dataciud = $City->ciudades(0,4,"0,0,0,0"); 
$data = array();
$accion = 1;
$id = 'disabled';
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $id = '';
    if ($data[5] == "0") {
        $check = "checked='checked'";
        $val = "1";
    }
    $accion = $data[6];     
}
?>

<div class="row">
    <form method="post" action="../../Controllers/centroHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
            <div class="col l6">
                <div class="input-field">
                    <input <?php if (count($data) == 0) {echo $id;} ?> id="id_centro" name="id_centro" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                    <label for="id_centro">Id Centro</label>
                </div>
			     <div class="input-field">
                    <input id="nom_centro" name="nom_centro" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[2];} ?>">
                    <label for="nom_centro">Nombre del Centro</label>
                </div>
				<div class="input-field">
                    <input id="dir_centro" name="dir_centro" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[3];} ?>">
                    <label for="dir_centro">Direccion del Centro</label>
                </div>
</div>   
<div class="row">  
    <div class="col l6">   
	         <div class="input-field">
                    <input id="cod_centro" name="cod_centro" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                    <label for="cod_centro">Codigo del Centro</label>
            </div>    
            <div class="input-field">
                <select name="cod_ciudad" id="selection" style="display: inline-block;">
                <?php 
                    for ($a=0; $a < count($dataciud) ; $a++) { 
                        if (count($data) != 0) {
                            if($dataciud[$a][0] == $data[3]){
                                echo '<option value='.$dataciud[$a][0].' selected>'.$dataciud[$a][1].'</option>';
                            }else {
                                echo '<option value='.$dataciud[$a][0].'>'.$dataciud[$a][1].'</option>';
                            }
                        }else {
                            echo '<option value='.$dataciud[$a][0].'>'.$dataciud[$a][1].'</option>';
                        }                        
                    }                    
                ?>                              
                </select>
            </div>
            
<div class="row" style="margin-top: 38px;text-align: left;">
                    <div class="switch">
                        <label>
                            Inactivo                    
                            <input type="checkbox" name="estado_centro" id="estado_centro" <?php if (count($data) != 0) {echo $check;} ?>>                
                            <span class="lever"></span>
                            Activo
                        </label>
                    </div>
</div>
                <div class="col l6">
                <div>                            
                    <button class="btn waves-effect waves-light" type="submit" name="guardar_centro" id="guardar_centro" >Guardar</button>            
                </div>    
                </div>
            </div>                        
        </div> 
    </form>
</div>