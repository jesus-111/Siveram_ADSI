<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8">    
    <link type="text/css" href="Content/Materialize/materialize.css" rel="stylesheet"/>
    <link type="text/css" href="Content/Css/Login.css" rel="stylesheet"/>
    <script src="Script/jquery-2.1.1.js"></script>
    <script src="Script/Materialize/materialize.js"></script>
    <script src="Script/Site/MasterPage.js"></script>
</head>
<body>
    <div class="row" style="text-align: center;margin-top: 80px">
        <div class="space_login" style="width: 380px;height: 250px;">
            <div class="info_login" style="width: 340px;"> 
                <div class="input-field">
                    <select name="documento" id="documento" style="display: inline-block;">
                    <option value="Cedula">Cedula de Ciudadania</option>
                    <option value="Tarjeta">Tarjeta de identidad</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Documento">Documento Nacional de Identificacion</option>
                </select>
                </div>
                <div class="input-field">   
                    <input  id="Cedula" type="number" class="validate" required>
                    <label for="Cedula">Cedula</label>
                </div>
                <div class="input-field">
                    <input id="Contrasena" type="password" class="validate"  required>
                    <label for="Contrasena">Contraseña</label>
                </div>   
            </div>                         
        </div>
        <div>
            <button id="login" class="btn_login Triangle_Right Triangle_Left" >Iniciar Sesión</button>             
        </div>                      
        <div class="space_before">
            <div class="row">
                <div class="col l6" style="margin-top: 10px;width: 49.9%;">                    
                    <a href="View/Usuario/registro.php">Registrate</a>
                </div>
                <div class="col l6" style="margin-top: 10px;width: 49.9%;">
                    <a href="View/Usuario/restablecer_contrasena.php">Olvido su contraseña?</a>
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
    $(document).ready(function (){
        $('.modal').modal({ opacity: .5 });    
        $('#login').click(function(){
            var params = {
                "data": $('#documento option:selected').val() + ','+ $('#Cedula').val() + ',' + $('#Contrasena').val()
            };
            var inputs = document.getElementsByTagName('input');
            var valid = 0;
            $.each(inputs, function( index, value ) {
                if(! this.validity.valid){
                    valid += 1;
               }                
            });
            if (valid == 0) {
                $.ajax({
                    data: params,
                    url: './Controllers/LoginHandler.php',
                    dataType: 'html',
                    type: 'post',
                    success: function (response) {
                        var data = response.split('/');
                        switch (data[0]) { 
                            case '2': 
                                $('#contenido').text(data[1]);
                                $('#Contrasena').val('');
                                break;
                            case '3': 
                                $('#contenido').text(data[1]);
                                $('#Cedula').val('');
                                $('#Contrasena').val('');
                                break;
                            case '4': 
                                $('#contenido').text(data[1]);
                                $('#Cedula').val('');
                                $('#Contrasena').val('');
                                break;
                            case'5':
                                $('#contenido').text(data[1]);  
                                $('#Cedula').val('');
                                $('#Contrasena').val('');
                                break;
                            default:
                                $('#contenido').text(data[1]);
                                if (data[2] == "Administrador") {
                                    window.location.replace('http://localhost:8080/verificacion_ambientes/View/Master/MasterPage_Admin.php');
                                }else{
                                    window.location.replace('http://localhost:8080/verificacion_ambientes/View/Home/Home.php');
                                };
                                break;		                            
                        }                        
                        $('#modal').modal('open');
                    }
                });  
            }else{
                $('#contenido').text('Todos los campos son obligatorios');
                $('#modal').modal('open');
            };                  
        });
    });
</script>