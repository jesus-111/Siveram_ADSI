<?php
require_once ("../Master/Content_script.php");
require_once ("../../Controllers/departamento.php");
$Depto = new government();
$dataDep = $Depto->Departamentos(0, 1, "0,0,0");
require_once("../../Controllers/ciudad.php");
$City = new City();
$dataciud = $City->ciudades(0,4,"0,0,0,0"); 
$data = array();
$accion = 1;
if (isset($_GET['info'])) {
    $get = $_GET['info'];
    $data = explode(",", $get);
    $check = "";
    $id = '';
    $check2 = "";
    $id_depto ="";
    if ($data[6] == "1") {
        $check = "checked='checked'";
    }
    if($data[13] == "1"){
        $check2 = "checked='checked'";
    }
    for ($a = 0; $a < count($dataciud); $a++) {   
        if($dataciud[$a][0] == $data[7]){
            $id_depto = $dataciud[$a][2];
       }
    }
    $accion = $data[14]; 
}
?>
<div class="row">
<form action="../../Controllers/usuarioHandler.php" method="post">
    <input name="accion" type="hidden" value="<?php echo $accion ?>" />
    <div class="col l4">
        <label for="documento">Documento</label>
        <div class="input-field">
            <select name="documento" id="documento" style="display: inline-block;">
                <option value="Cedula">Cedula de Ciudadania</option>
                <option value="Tarjeta">Tarjeta de identidad</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Documento">Documento Nacional de Identificacion</option>
            </select>
        </div>
        <div class="input-field ">
            <input id="Cedula" type="number" name="num_doc" min="0" value="<?php if (count($data) != 0) {echo $data[1];} ?>" required>
            <label for="num_doc">Numero de Documento</label>
        </div> 
        <div class="input-field ">
            <input id="Contrasena" type="password" name="cof_cont" value="<?php if (count($data) != 0) {echo $data[2];} ?>" required> 
            <label for="contraseña">Contraseña</label>
        </div>
        <div class="input-field">
            <input id="nombre" type="text" name="nom" value="<?php if (count($data) != 0) {echo $data[3];} ?>" required>
            <label for="nombre">Nombre</label>
        </div>        
        <div class="input-field">
            <input id="apellido" type="text" name="ape1" value="<?php if (count($data) != 0) {echo $data[4];} ?>" required> 
            <label for="apellido">Primer Apellido</label>
        </div>          
    </div>
    <div class="col l4">
        <div class="input-field">
            <input id="segundo_apellido" type="text" name="ape2" value="<?php if (count($data) != 0) {echo $data[5];} ?>" required>
            <label for="segundo_apellido">Segundo Apellido</label>
        </div>
        <div>
            <label for="DropDepto">Departamento</label>
            <select name="DropDepto" id="DropDepto" style="display: inline-block;" >
                <?php                 
                for ($a = 0; $a < count($dataDep); $a++) {
                    if (count($data) != 0) {    
                        if($dataDep[$a][0] == $id_depto){
                            echo '<option value='.$dataDep[$a][0].' selected>'.$dataDep[$a][1].'</option>';
                        }else {
                            echo '<option value='.$dataDep[$a][0].'>'.$dataDep[$a][1].'</option>';
                        }
                    }else {
                        echo '<option value='.$dataDep[$a][0].'>'.$dataDep[$a][1].'</option>';
                    }      
                }
                ?>
            </select>
        </div>        
        <div>        
            <label for="DropDepto">Ciudad</label>                
            <select name="cityname" id="DropCity" style="display: inline-block;">
            <?php 
                for ($a=0; $a < count($dataciud) ; $a++) { 
                    if (count($data) != 0) {
                        if($dataciud[$a][0] == $data[7]){
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
        <div class="input-field ">
            <input id="fecha" type="text" name="fecha" class="datepicker" value="<?php if (count($data) != 0) {echo $data[8];} ?>" required>
            <label for="fecha">Fecha Nacimiento</label>
        </div>
        <div class="input-field">
            <select name="rol" id="rol" style="display: inline-block;">
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>                
            </select>
        </div>         
    </div>
    <div class="col l4">        
        <div class="input-field ">
            <input id="correo" type="email" name="c_elec" value="<?php if (count($data) != 0) {echo $data[10];} ?>" required>
            <label for="correo_electronico">Correo Electronico</label>
        </div>
        <div class="input-field ">
            <input id="telefono" type="number" name="tel" min="0" value="<?php if (count($data) != 0) {echo $data[11];} ?>" required> 
            <label for="telefono">Telefono</label>
        </div>
        <div class="input-field ">
            <input id="direccion" type="text" name="dir" value="<?php if (count($data) != 0) {echo $data[12];} ?>" required>
            <label for="direccion">Direccion</label>
        </div>
        <div class="row">
            <div class="col l4">
                <div class="switch" style="margin-top:20px;">
                    <label >
                        Femn.
                    <input id="sexo" name="gen" type="checkbox" <?php if (count($data) != 0) {echo $check;} ?>>
                    <span class="lever"></span>
                        Masc.
                    </label>
                </div>
            </div>
            <div class="col l4">                
                <div class="switch" style="margin-top:20px;">
                    <label>
                        Inactivo                    
                        <input type="checkbox" name="estado_usuario" id="estado_usuario" <?php if (count($data) != 0) {echo $check2;} ?>>                
                        <span class="lever"></span>
                        Activo
                    </label>
                </div>
            </div>
            <div class="col l4" style="margin-top:20px;">
                <button class="btn waves-effect waves-light" type="submit" name="guardar_centro" id="guardar_centro" >Guardar</button>            
            </div>
        </div>
    </div>
</form>
</div>
<script type="text/javascript">
$('#DropDepto').change(function(){
    var a = this.value;
    var opt_drop = $("#DropCity option");
    $.each(opt_drop, function (z,item){
        this.remove();
    })				
    if(a != "0")
    { 			
        $.post("../../Controllers/ciudadHandler.php?=", { id: a, accion : 3},
        function(data){
            var info = data.substring(0, (data.length -1));
            $.each(info.split("/"),function (a,item){
                $('#DropCity').append($('<option>', { 
                    value:  item.split(",")[0],
                    text : item.split(",")[1] 
                }));
            });					
        });
    }
    else{
        $.each(opt_drop, function (z,item){
            this.remove();
        })
    }              
});
$("#DropCity").removeAttr('disabled');	
</script>