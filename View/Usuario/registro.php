<!DOCTYPE html>
<html lang="es"><!--Utiliza el atributo lang para saber el idioma del contenido-->
<head>
    <title>Registro</title>
    <link type="text/css" href="../../Content/Materialize/materialize.css" rel="stylesheet"/>
    <link type="text/css" href="../../Content/Materialize/materialize_icon.css" rel="stylesheet">
    <link type="text/css" href="../../Content/Css/Login.css" rel="stylesheet"/>        
    <script src="../../Script/jquery-2.1.1.js"></script>
    <script src="../../Script/Materialize/materialize.js"></script>
    <script src="../../Script/Site/MasterPage.js"></script>
    <script src="../../Script/Site/Limitantes.js"></script>
</script>
</head>
<body>
    <div class="row" style="text-align: center;margin-top: 20px">
        <div class="space_login" style="width: 380px">
            <div class="info_login" style="width: 340px;position: initial;padding-bottom: 10px;">
                <div style="text-align:center;">
                    <label style="color: black;"><h4>Registro</h4></label>
                </div>
                <div class="input-field " style="height: 50px;">
                    <input id="nombre" type="text" name="nom" onkeypress="return val(event)" required="" >
                    <label for="nombre">Nombre</label>
                </div>
                
                <div class="input-field " style="height: 50px;">
                    <input id="apellido" type="text" name="ape1" onkeypress="return val(event)"  required=""> 
                    <label for="apellido">Primer Apellido</label>
                </div>  

                <div class="input-field " style="height: 50px;">
                    <input id="segundo_apellido" type="text" name="ape2" onkeypress="return val(event)"  required="">
                    <label for="segundo_apellido">Segundo Apellido</label>
                </div>
                <div>
                    <label for="documento">Documento</label>
                    <div class="input-field">
                    <select name="documento" id="documento" style="display: inline-block;">
                        <option value="Cedula">Cedula de Ciudadania</option>
                        <option value="Tarjeta">Tarjeta de identidad</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Documento">Documento Nacional de Identificacion</option>
                    </select>
                </div>  
                </div>                          

                <div class="input-field " style="height: 50px;">
                    <input id="Cedula" type="number" name="num_doc" min="0" onkeypress="return valo(event)" required="">
                    <label for="num_doc">Numero de Documento</label>
                </div>

                <div class="input-field " style="height: 50px;">
                    <input id="telefono" type="number" name="tel" min="0"  onkeypress="return valo(event)"  required=""> 
                    <label for="telefono">Telefono</label>
                </div>

                <div class="input-field " style="height: 50px;">
                    <input id="direccion" type="text" name="dir" required="">
                    <label for="direccion">Direccion</label>
                </div>
                    <label for="DropDepto">Departamento</label>
                    <div class="input-field">                    
                    <select name="cityname" id="DropDepto" style="display: inline-block;" >
                        <?php
                            require_once("../../Controllers/departamento.php");
                            $Depto = new government();							
                            $dataDep = $Depto->Departamentos(0,1,"0,0,0");
                            echo "<option value='0'>Seleccione...</option>";
                            for($a = 0; $a < count($dataDep); $a++)
                            {
                                $info_dep  = $dataDep[$a];
                                echo "<option value=".$info_dep[0].">".$info_dep[1]."</option>";
                            }							
                        ?>
                    </select>
                </div>

                <div>
                    <label for="DropCity">Ciudad</label>
                    <select name="cityname" id="DropCity" style="display: inline-block;">
                    </select>
                </div>

                <div class="input-field " style="height: 50px;margin-top:10px;">
                    <input id="correo" type="email" name="c_elec" required="">
                    <label for="correo_electronico">Correo Electronico</label>
                </div>    
                
                <div class="switch" style="margin-top:20px;">
                    <label >
                        Femenino
                    <input id="sexo" name="gen" type="checkbox"  required="">
                    <span class="lever"></span>
                        Masculino
                    </label>
                </div>

                <div class="input-field " style="margin-top:5px;height: 50px;">
                    <input id="fecha" type="text" name="fecha" class="datepicker" required>
                    <label for="fecha">Fecha Nacimiento</label>
                </div>  

                <div class="input-field " style="height: 50px;">
                    <input id="Contrasena" type="password" name="cof_cont" required> 
                    <label for="contraseña">Contraseña</label>
                </div>

                <div class="input-field " style=" margin 5px 0px;">
                    <input id="Contrasena2" type="password" name="cof_cont" required> 
                    <label for="confirmar_contraseña">Confirmar Contraseña</label>
                </div>
                <div class="row">
                    <div class="col m5">
                        <input id="btn_save" class="btn_registro" type="button" value="Guardar">                        
                    </div>
                    <div class="col m2">
                    </div>
                    <div class="col m5">
                        <a href="../../index.php" class="btn_registro" id="btn_save" style="padding-top: 3px;font-size: 15px;">Salir</a>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <div id="modal" class="modal" style="width:300px">
        <div class="modal-content">
            <div style="text-align:center;">
                <label id="contenido"></label>
            </div>            
        </div>        
    </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
    $('.modal').modal({ opacity: .5 })    
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
            
    $('#btn_save').click(function(){    
        if($('#Contrasena').val()!=$('#Contrasena2').val()){
            $('#contenido').text("Las Contraseñas no coinciden");
            $('#modal').modal('open');
        }else{
            var inputs = document.getElementsByTagName('input');        
            var valid = 0;
            $.each(inputs, function( index, value ) {
                if(index != 7){
                    if(! this.validity.valid){
                        valid += 1;
                    }
                }                
            });
            if (valid == 0) {
                var check = '0';
                if ($('#sexo').is(":checked")) {
                    check = '1';
                }
                var params = {
                    "data": $('#documento option:selected').val() + ','+ $('#Cedula').val() + ',' + $('#Contrasena').val() + ',' +
                    $('#nombre').val() + ','+ $('#apellido').val() + ',' + $('#segundo_apellido').val() + ',' + check + ',' + 
                    $('#DropCity option:selected').val() + ',' + $('#fecha').val() + ',Usuario,' + $('#correo').val() + ',' + $('#telefono').val() + ',' +
                    $('#direccion').val() + ',1'                             
                };
                $.ajax({
                    data: params,
                    url: '../../Controllers/LoginHandler.php',
                    dataType: 'html',
                    type: 'post',
                    success: function (response) {
                        if(response == "EXISTE"){
                            $('#contenido').text("El usuario ya existe, diligenciar  formulario de nuevo");
                            $('#modal').modal('open');
                        }else{
                            $('#contenido').text(response);
                            $('#modal').modal('open');
                            window.location.replace("http://localhost:8080/verificacion_ambientes/");
                        }
                    }
                });
            }else{
                $('#contenido').text('Todos los campos son obligatorios');
                $('#modal').modal('open');
            };   
        }       
    })
});

</script>
</html>