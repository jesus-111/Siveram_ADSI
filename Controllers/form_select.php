<?php 
$id_asignacion = $_POST['formulario'];
require_once("./asignacion.php");
$assignments = new assignments();
$datasig = $assignments->asignaciones(1,7,$id_asignacion.",0,0,0");

date_default_timezone_set('America/Bogota');
$id_form = $datasig[0][16];

require_once("./pregunta.php");
$questions = new questions();
$datapre = $questions->preguntas(1,6,"0,0,".$id_form.",0");
$tb_pregunta = '';
for ($a=0; $a < count($datapre) ; $a++) { 
  $tb_pregunta .= 
  '<tr id="N_pregunta">
  <td>
  <b>'.$datapre[$a][1].'</b>
  </td>
  <td>
  <div class="switch">
    <label>
        No                   
        <input type="checkbox" name="'.$datapre[$a][0].'" id="respuesta_detalle">                
        <span class="lever"></span>
        Si
    </label>
  </div>
  </td>
  <td>
  <div class="input-field">  
    <textarea id="f_observacion" rows="10" class="materialize-textarea" data-length="140" maxlength="140" required></textarea>
    <label for="f_observacion" class="active">Observación</label>
  </div>
  </td>
  </tr>';
}

$fecha =  date("d")."/". date("m")."/". date("Y")." ".date("G:H");
echo 
'
<div class="col l2">
</div>
<div class="col l10">
  <div class="row">      
    <div class="col l2" style="text-align:center">
      <img src="../../Content/Images/logo_sena.png" class="center-align" style="height: 110px;">
    </div>
    <div class="col l8">
      <p class="center-align">
        <b>SERVICIO NACIONAL DE APRENDIZAJE SENA</b><BR>
        <b>SISTEMA DE GESTION INTEGRADO</b><BR>
        <b>Procedimiento Ejecucion de la Formación Profesional Integral</b><BR>
          LISTA DE CHEQUEO DE AMBIENTES DE APRENDIZAJE            
      </p>
    </div>
    <div class="col l2" style="padding: 0">
      <div>
        <b class="center-align">
          Version: '.$datasig[0][15].'
        </b>
      </div>
      <div>
        <b class="center-align" id="f_formulario">
          Código: GFPI-'.$datasig[0][16].'-'.$datasig[0][11].'
        </b>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col l12">
      <ul class="collapsible popout" data-collapsible="accordion">
        <li>
          <div class="collapsible-header grey lighten-1">
            <b class="center-align">
            1. INFORMACIÓN GENERAL - Identificación del ambiente de aprendizaje.
            </b>
          </div>
          <div class="collapsible-body">
            <table>
              <tr>  
                <td>
                  <h6><i class="material-icons prefix">public</i><b>Regional: </b><b id="f_regional">'.$datasig[0][2].'</b></h6>
                </td>
                <td>
                  <h6><i class="material-icons prefix">public</i><b>Centro Formacion: </b><b id="f_centro">'.$datasig[0][10].'</b></h6>
                </td>
              </tr>
              <tr>
                <td>
                  <h6><i class="material-icons prefix">public</i><b>Localización: </b><b id="f_direccion">'.$datasig[0][19].'</b></h6>
                </td>
                <td>
                  <h6><i class="material-icons prefix">store</i><b>Denominación: </b><b id="f_denominacion">'.$datasig[0][14].' '.$datasig[0][13].'</b></h6>
                </td>
              </tr>
              <tr>
                <td>
                  <h6><i class="material-icons prefix">store</i><b>Codigo en SOFIA: </b><b id="f_regional">'.$datasig[0][18].'</b></h6>
                </td>
                <td>
                  <h6><i class="material-icons prefix">store</i><b>Tipo de Ambiente: </b><b id="f_regional">Externo</b></h6>
                </td>
              </tr>
              <tr>
                <td>
                  <h6><i class="material-icons prefix">access_time</i><b>Fecha: </b><b id="f_fecha">'.$fecha.'</b></h6>
                </td>
                <td>
                  <h6><i class="material-icons prefix">alarm</i><b>Horario: </b><b id="f_jornada">'.$datasig[0][17].'</b></h6>
                </td>
              </tr>
              <tr>
                <td>
                  <h6><i class="material-icons prefix">developer_board</i><b>Programa: </b><b id="f_regional">'.$datasig[0][13].'</b></h6>
                </td>
                <td>
                  <h6><i class="material-icons prefix">developer_board</i><b>Codigo de ficha: </b><b id="f_regional">'.$datasig[0][12].'</b></h6>
                </td>
              </tr>
            </table>                                              
          </div>
        </li>
        <li>
          <div class="collapsible-header grey lighten-1">
            <b class="center-align">
            2. LISTA DE VERIFICACIÓN - Factores a verificar.
            </b>
          </div>
          <div class="collapsible-body">
          <div>
              <table> '
                .$tb_pregunta.                              
              '</table>              
            </div>
            <div>
              <button id="Btn_save" class="btn yellow darken-3 waves-effect waves-light" name="'.$id_asignacion.'" onclick="Save_form(this);">Guardar</button>
            </div>
          </div>          
        </li>
      </ul>                   
    </div>
  </div>
</div>
';
?>