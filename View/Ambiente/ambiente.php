<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/sede.php");
$headquarters = new headquarters();
$datasede = $headquarters->sedes(0,4,"0,0,0,0,0"); 
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
        $val = "1";
    }
    $accion = $data[4];     
}
?>

<div class="row">
    <form method="post" action="../../Controllers/ambienteHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
            <div class="col l6">
                <div class="input-field">
                    <input <?php if (count($data) == 0) {echo $id;} ?> id="id_ambiente" name="id_ambiente" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                    <label for="id_ambiente">Id Ambiente</label>
                </div>
                <div class="input-field">
                    <input id="nom_ambiente" name="nom_ambiente" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                    <label for="nom_ambiente">Nombre Ambiente</label>
            </div>
</div>   
<div class="row">  
    <div class="col l6">       
            <div class="input-field">
                <select name="cod_sede" id="selection" style="display: inline-block;">
                <?php 
                    for ($a=0; $a < count($datasede) ; $a++) { 
                        if (count($data) != 0) {
                            if($datasede[$a][0] == $data[3]){
                                echo '<option value='.$datasede[$a][0].' selected>'.$datasede[$a][1].'</option>';
                            }else {
                                echo '<option value='.$datasede[$a][0].'>'.$datasede[$a][1].'</option>';
                            }
                        }else {
                            echo '<option value='.$datasede[$a][0].'>'.$datasede[$a][1].'</option>';
                        }                        
                    }                    
                ?>                              
                </select>
            </div>
            
<div class="row" style="margin-top: 38px;text-align: left;">
                    <div class="switch">
                        <label>
                            Inactivo                    
                            <input type="checkbox" name="estado_ambiente" id="estado_ambiente" <?php if (count($data) != 0) {echo $check;} ?>>                
                            <span class="lever"></span>
                            Activo
                        </label>
                    </div>
</div>
                <div class="col l6">
                <div>                            
                    <button class="btn waves-effect waves-light" type="submit" name="guardar_sede" id="guardar_sede" >Guardar</button>            
                </div>    
                </div>
            </div>                        
        </div> 
    </form>
</div>