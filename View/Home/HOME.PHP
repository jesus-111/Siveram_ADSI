<!DOCTYPE html>
<html >
<head>
<Title>Administrador</Title>
<link type="text/css" href="../../Content/Css/MasterPage.css" rel="stylesheet"/>
<?php  
require_once("../Master/Content_script.php");
require_once("../Master/Content_tables.php");
session_start();
if(isset($_SESSION["usuario"])){
  $Data =  $_SESSION["usuario"];
  $infouser = "";
  foreach ($Data[0] as $obj)
  {
    $infouser .=  $obj.',';
  }    
  $infouser .= '2';
  require_once("../../Controllers/asignacion.php");
	$assignments = new assignments();
	$datasig= $assignments->asignaciones(0,6,'0,0,'.$Data[0][2].',0');	
}else{
  header("Location: http://localhost:8080/verificacion_ambientes/");
  exit();
}
require_once("../../Controllers/asignacion.php");
$assignments = new assignments();
$datasig= $assignments->asignaciones(0,6,'0,0,'.$Data[0][1].',0');	
?>
</head>
<body>
<header>
  <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0px);width:225px;">
    <li class="logo">
      <div>
        <div style="text-align: center;">
          <i class="large material-icons" style="color:#f9a825">account_box</i>
        </div>
        <div>
          <ul>
            <li><a><?php echo $Data[0][3]; ?></a></li>
            <li><a><?php echo $Data[0][4]; ?></a></li>
            <li><a id="id_user"><?php echo $Data[0][1]; ?></a></li>
          </ul>
        </div>                       
      </div>
    </li>               
    <li class="bold">
      <ul class="collapsible collapsible-accordion">
        <?php 
        if($Data[0][9] == "Administrador")
        {
          echo '<li class="bold"><a href="http://localhost:8080/verificacion_ambientes/View/Master/MasterPage_Admin.php" class="waves-effect waves-teal" style="padding: 0 16px;">DashBoard<i class="material-icons">dashboard</i></a> </li>';
        }
        ?>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">Ambientes<i class="material-icons">event_seat</i></a>
          <div class="collapsible-body">
            <ul>
            <?php 
              for ($a=0; $a < count($datasig) ; $a++) { 
                echo '<li><a onclick="Select_form(this);" name="'.$datasig[$a][0].'" style="cursor: pointer;">'.$datasig[$a][1].'<i class="material-icons">event_seat</i></a></li>';
              }		
            ?>              
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header waves-effect waves-teal" name='<?php echo$Data[0][1]; ?>' onclick="Print_data(this);" >Informe<i class="material-icons">local_printshop</i></a>
        </li>
        <li class="bold">
          <a class="waves-effect waves-teal" style="padding: 0 16px;cursor: pointer;" onclick="restarpass();">Editar Usuario<i class="material-icons">lock</i></a>
        </li>
        <li class="bold">
          <a class="waves-effect waves-teal" style="padding: 0 16px;cursor: pointer;" onclick="closesession();">Cerrar Sesiòn<i class="material-icons">exit_to_app</i></a>
        </li>
      </ul>            
    </li>    
  </ul>
</header>
  <div class="row"> 
    <div class="row" style="text-align: center;">     
      <div id="div_Contenido">     
      </div>
    </div>
  </div> 
  <div id="info_user" style="display:none"><?php echo $infouser; ?></div> 
  <div id="modal" name="modal" class="modal bottom-sheet">
    <div class="modal-content" style="text-align:center">
      <iframe id="restar" frameborder="0" style="overflow:hidden;width:100%"></iframe>
    </div>   
  </div> 
</body>