<?php
require_once("../Master/Content_script.php") ;   
require_once("../../Controllers/ficha.php");
$records = new records();
$dataficha = $records->fichas(0,4,"0,0,0,0,0,0"); 
require_once("../../Controllers/usuario.php");
$Users = new Users();
$datauser = $Users->usuarios(0,4,"0,0,0,0,0,0,0,0,0,0,0,0,0,0"); 
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
    <form method="post" action="../../Controllers/asignacionHandler.php">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
        <div class="col l6">
                <div class="input-field">
                <input  <?php if (count($data) == 0) {echo $id;}?> id="id_asignacion" name="id_asignacion" type="text" class="validate"  onkeypress="return valo(event)" value=" <?php if (count($data) != 0) {echo $data[0];} ?>">
                <label for="id_asignacion">Codigo de la Asignacion</label>
                         
                </div>
                
                <div class="input-field">   
                <label for="id_asignacion">Codigo de la Ficha</label>                                     
                   <br> <select name="id_ficha" id="selection" style="display: inline-block;">
                    <?php 
                        for ($a=0; $a < count($dataficha) ; $a++) { 
                            if (count($data) != 0) {
                                if($dataficha[$a][0] == $data[1]){
                                    echo '<option value='.$dataficha[$a][0].' selected>'.$dataficha[$a][1].'</option>';
                                }else {
                                    echo '<option value='.$dataficha[$a][0].'>'.$dataficha[$a][1].'</option>';
                                }
                            }else {
                                echo '<option value='.$dataficha[$a][0].'>'.$dataficha[$a][1].'</option>';
                            }                        
                        }                    
                    ?>                              
                </select>
                </div>
                
        </div>        
            <div class="col l6">
            <div class="input-field">                                        
                    <select name="num_documento" id="selection" style="display: inline-block;">
                    <?php 
                        for ($a=0; $a < count($datauser) ; $a++) { 
                            if (count($data) != 0) {
                                if($datauser[$a][1] == $data[2]){
                                    echo '<option value='.$datauser[$a][1].' selected>'.$datauser[$a][1].'</option>';
                                }else {
                                    echo '<option value='.$datauser[$a][1].'>'.$datauser[$a][1].'</option>';
                                }
                            }else {
                                echo '<option value='.$datauser[$a][1].'>'.$datauser[$a][1].'</option>';
                            }                        
                        }                    
                    ?>                              
                </select>
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
                <input type="checkbox" name="estado_asignacion" id="estado_asignacion" <?php if (count($data) != 0) {echo $check;} ?>>                
                <span class="lever"></span>
                Activo
            </label>
        </div>
                </div>

                <div>                            
                    <button class="btn waves-effect waves-light" type="submit" name="guardar_asignacion" id="guardar_asignacion" >Guardar</button>            
                </div>    
                </div>
                </div>                         
        </div>  
    </form>
</div>