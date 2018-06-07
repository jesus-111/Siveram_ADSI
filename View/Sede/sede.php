<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/centro.php");
$center = new center();
$datacent= $center->centros(0,4,"0,0,0,0,0,0"); 
$data = array();
$accion = 1;
$id = 'disabled';
if (isset($_GET['info'])) {   
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $val = '';
    if ($data[4] == "0") {
        $check = "checked='checked'";
        $val = "0";
    }
    $accion = $data[5];     
}   
?>
<div class="row">
    <form method="post" action="../../Controllers/sedeHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>">
        <div class="col l6">
            <div class="input-field">
                <input id="codigo" name="codigo" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="codigo">codigo</label>
            </div>
            <div class="input-field">
                <input id="nom_sede" name="nom_sede" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                <label for="nom_sede">Nombre sede</label>
            </div>
            <div class="switch">
                <label>
                    Inactivo                    
                    <input type="checkbox" id="estado_sede" name="estado_sede" <?php if (count($data) != 0) {echo $check;} ?>>             
                    <span class="lever"></span>
                    Activo
                </label>
            </div>  
        </div>
        <div class="col l6">
            <div class="input-field">
                <input id="direc" name="direc" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[2];} ?>">
                <label for="direc">Direccion</label>
            </div>
            <div class="input-field">
                <select name="id_centro" id="selection" style="display: inline-block;">
                <?php 
                    for ($a=0; $a < count($datacent) ; $a++) { 
                        if (count($data) != 0) {
                            if($datacent[$a][0] == $data[3]){
                                echo '<option value='.$datacent[$a][0].' selected>'.$datacent[$a][2].'</option>';
                            }else {
                                echo '<option value='.$datacent[$a][0].'>'.$datacent[$a][2].'</option>';
                            }
                        }else {
                            echo '<option value='.$datacent[$a][0].'>'.$datacent[$a][2].'</option>';
                        }                        
                    }                    
                ?>                              
                </select>
            </div>
            <div>                            
                <button class="btn waves-effect waves-light" type="submit" name="guardar_sede" id="guardar_sede" >Guardar</button>            
            </div>
        </div>    
    </form>
</div>