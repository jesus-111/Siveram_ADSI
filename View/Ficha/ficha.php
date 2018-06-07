<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/ambiente.php");
$environment = new environment();
$dataamb = $environment->ambientes(0,4,"0,0,0,0");
require_once("../../Controllers/programa.php");
$programs = new programs();
$dataprog = $programs->programas(0,4,"0,0,0,0"); 
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
 <script src="../../Script/Site/Limitantes.js"></script>
<div class="row">
    <form method="post" action="../../Controllers/fichaHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
            <div class="input-field">
                <input <?php if (count($data) == 0) {echo $id;} ?> id="id_ficha" name="id_ficha" type="text" class="validate"  onkeypress="return valo(event)" value="<?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="id_ficha">Id ficha</label>
            </div>
            <div class="input-field">
                <input id="nom_ficha" name="nom_ficha" type="text" class="validate" value="<?php if (count($data) != 0) {echo $data[1];} ?>">
                <label for="nom_ficha">Nombre ficha</label>
            </div>
            <div class="input-field">
                <input id="jornada" name="jornada" type="text" class="validate" onkeypress="return val(event)" value="<?php if (count($data) != 0) {echo $data[4];} ?>">
                <label for="jornada">jornada</label>
            </div>
        </div>
        <div class="col l6">
        <select name="cod_programa" id="selection" style="display: inline-block;">
                <?php 
                    for ($a=0; $a < count($dataprog) ; $a++) { 
                        if (count($data) != 0) {
                            if($dataprog[$a][0] == $data[2]){
                                echo '<option value='.$dataprog[$a][0].' selected>'.$dataprog[$a][1].'</option>';
                            }else {
                                echo '<option value='.$dataprog[$a][0].'>'.$dataprog[$a][1].'</option>';
                            }
                        }else {
                            echo '<option value='.$dataprog[$a][0].'>'.$dataprog[$a][1].'</option>';
                        }                        
                    }                    
                ?>                              
            </select>
            <div class="input-field">
                <select name="id_ambiente" id="selection" style="display: inline-block;">
                <?php 
                    for ($a=0; $a < count($dataamb) ; $a++) { 
                        if (count($data) != 0) {
                            if($dataamb[$a][0] == $data[3]){
                                echo '<option value='.$dataamb[$a][0].' selected>'.$dataamb[$a][1].'</option>';
                            }else {
                                echo '<option value='.$dataamb[$a][0].'>'.$dataamb[$a][1].'</option>';
                            }
                        }else {
                            echo '<option value='.$dataamb[$a][0].'>'.$dataamb[$a][1].'</option>';
                        }                        
                    }                    
                ?>                              
                </select>
            </div>
            <div class="row" style="margin-top: 38px;text-align: center;">
                <div class="col l6" style="margin-top: 10px;">
                    <input type="checkbox" id="estado_ficha" name="estado_ficha"<?php if (count($data) != 0) {echo $check;} ?>/>
                    <label for="estado_ficha">Activo/Inactivo</label>
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
