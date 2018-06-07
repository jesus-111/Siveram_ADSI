<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ambiente</title>
        <link type="text/css" href="../../Content/Materialize/materialize.css" rel="stylesheet"/>
            <link type="text/css" href="../../Content/Css/style1.css" rel="stylesheet"><!--Busca el enlace de los css !-->
            <link href="../../Content/Materialize/materialize_icon.css" rel="stylesheet">
            <script src="../../Script/jquery-2.1.1.js"></script>
            <script src="../../Script/Materialize/materialize.js"></script>
    </head>
    <body> 
            <div id="envoltura_registro" style="width: 480px;"><!--Inicio div envoltura !--> 

            <div id="contenedor_registr"><!--Inicio div contenedor!-->

                <div id="cabecera_registr"><!--Inicio div cabecera!-->
              
                </div><!--Fin div cabecera!-->

                <div id="cuerpo_registro" style="height:380px;"><!--Inicio div cuerpo !-->

                    <form action="" method="POST">
                        <div class="input-field " style="height: 50px;">
                            <input type="number"min="1" name="id_ambiente" required="" >
                            <label for="nombre">Id del ambiente</label>
                        </div>
                        
                        <div class="input-field " style="height: 50px;">
                              <input type="text" name="nom_ambiente"  required=""> 
                              <label for="apellido">Nombre del ambiente</label>
                        </div>  

                        <div class="input-field " style="height: 50px;">
                             <input type="number" min="1" name="cod_sede"  required="">
                             <label for="segundo_apellido">Codigo de la sede</label>
                        </div>

                        <div class="switch" style="margin-top:20px;">
                            <label >
                             Inactivo
                            <input name="estado_ambiente" type="checkbox"  required="">
                            <span class="lever"></span>
                              Activo
                            </label>

                        </div>
                        <div style="margin-top:20px;">
                        </div>

                        <button class="btn waves-effect waves-light" id="botones" name="btn1" type="submit" name="action">Ingresar
                        <i class="material-icons right">send</i>
                        </button>

                    </form>

                    <button class="btn waves-effect waves-light" id="botones" name="btn1" type="button" name="action"style="float: right;top:-36px">Actualizar
                    <i class="material-icons right"></i>
                    </button>
                    
                    <button class="btn waves-effect waves-light"id="botones" name="btn1" type="button" name="action"style="float: left;top:12px">Eliminar
                    <i class="material-icons right"></i>
                    </button>

                    <button class="btn waves-effect waves-light" id="botones" name="btn1" type="button" name="action"style="float: right;top:-24px;">Volver

                    </button>  
                                
                </div><!--Fin div cuerpo !-->
            </div><!--Fin div contenedor  !--> 
        </div><!--Fin div envoltura!-->

    </body>
</html>
