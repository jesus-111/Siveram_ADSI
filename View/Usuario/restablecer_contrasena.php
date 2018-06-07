<!DOCTYPE html>
<html lang="es">
<head>
    <title>Restablecer Contraseña</title>
    <meta charset="utf-8">    
    <link type="text/css" href="../../Content/Materialize/materialize.css" rel="stylesheet"/>
    <link type="text/css" href="../../Content/Materialize/materialize_icon.css" rel="stylesheet">
    <link type="text/css" href="../../Content/Css/Login.css" rel="stylesheet"/>        
    <script src="../../Script/jquery-2.1.1.js"></script>
    <script src="../../Script/Materialize/materialize.js"></script>
    <script src="../../Script/Site/MasterPage.js"></script>
    <body>
        <div class="row" style="text-align: center;margin-top: 80px">
            <div class="space_login" style="width: 380px;height: 250px;">
                <div class="info_login" style="width: 340px;"> 
                    <p>Se te Olvido la contraseña !!!</p>
                    <div class="input-field">   
                    <p>Por favor, introduzca su dirección de correo electrónico. Recibirá un enlace por correo electrónico para crear una nueva contraseña.</p>
                    </div>
                    <div class="input-field">
                        <input id="correo" type="email" class="validate"  required>
                        <label for="Correo">Ingrese Correo Electronico</label>
                    </div>   
                </div>                         
            </div>
            <div>
                <button id="recupe" class="btn_login Triangle_Right Triangle_Left" >Generar Nueva contraseña</button>             
            </div>                      
            <div class="space_before">
                <div class="row">
                    <div class="col l6" style="margin-top: 10px;width: 100%;">                    
                        <a href="../../index.php">Volver</a>
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
        <div id="pr"><div>
    </body>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.modal').modal({ opacity: .5 });    
            $('#recupe').click(function(){   
                $.ajax({
                    data: {"data": $('#correo').val()},
                    url: '../../Controllers/send_mail.php',
                    dataType: 'html',
                    type: 'post',
                    success: function (response) {                        
                        $('#contenido').text(response);
                        $('#modal').modal('open');
                        window.location.replace("http://localhost:8080/verificacion_ambientes/");              
                    }
                });                  
            });
        });
    </script>