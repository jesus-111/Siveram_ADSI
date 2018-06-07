<!DOCTYPE html>
<html >
<head>
<Title>Administrador</Title>
<link type="text/css" href="../../Content/Css/MasterPage.css" rel="stylesheet"/>
<?php 
  require_once("./Content_script.php");
  require_once("./Content_tables.php");
  session_start();
  if(isset($_SESSION["usuario"])){
    $Data =  $_SESSION["usuario"];  
  }else{
    header("Location: http://localhost:8080/verificacion_ambientes/");
    exit();
  }  
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
    <li class="bold"><a href='<?php echo 'http://localhost:8080/verificacion_ambientes/View/Home/Home.php';?>' class="waves-effect waves-teal" style="padding: 0 16px;">DashBoard<i class="material-icons">dashboard</i></a> </li>
    <li class="bold">
      <ul class="collapsible collapsible-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">Asignación<i class="material-icons">assignment</i></a>
          <div class="collapsible-body">
            <ul>
              <li><a onclick="Select_Table(this);" name="asignacion,assignments,asignaciones" style="cursor: pointer;">Asignación<i class="material-icons">assignment_ind</i></a></li>
              <li><a onclick="Select_Table(this);" name="ficha,records,fichas" style="cursor: pointer;">Ficha<i class="material-icons">developer_board</i></a></li>
              <li><a onclick="Select_Table(this);" name="programa,programs,programas" style="cursor: pointer;">Programa<i class="material-icons">developer_board</i></a></li>              
            </ul>
          </div>
        <x/li>
      </ul>            
    </li>
    <li class="bold">
      <ul class="collapsible collapsible-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">Lista Chequeo<i class="material-icons">view_list</i></a>
          <div class="collapsible-body">
            <ul>               
              <li><a onclick="Select_Table(this);" name="formulario,forms,formularios" style="cursor: pointer;">Formulario<i class="material-icons">description</i></a></li>  
              <li><a onclick="Select_Table(this);" name="detalle_formulario,detail_form,Detalles_formularios" style="cursor: pointer;">Detalle_Form <i class="material-icons">chrome_reader_mode</i></a></li>                    
              <li><a onclick="Select_Table(this);" name="pregunta,questions,preguntas" style="cursor: pointer;">Preguntas<i class="material-icons">question_answer</i></a></li>
              <li><a onclick="Select_Table(this);" name="version,versions,versiones" style="cursor: pointer;">Version<i class="material-icons">view_comfy</i></a></li>
            </ul> 
          </div>
        </li>
      </ul>            
    </li>
    <li class="bold">
      <ul class="collapsible collapsible-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">Ubicación<i class="material-icons">format_list_bulleted</i></a>
          <div class="collapsible-body">
            <ul>
              <li><a onclick="Select_Table(this);" name="departamento,government,departamentos" style="cursor: pointer;">Departamento<i class="material-icons">public</i></a></li>
              <li><a onclick="Select_Table(this);" name="ciudad,City,ciudades" style="cursor: pointer;">Ciudad<i class="material-icons">public</i></a></li>
              <li><a onclick="Select_Table(this);" name="centro,center,centros" style="cursor: pointer;">Centro<i class="material-icons">public</i></a></li>
              <li><a onclick="Select_Table(this);" name="sede,headquarters,sedes" style="cursor: pointer;">Sede<i class="material-icons">store</i></a></li>
              <li><a onclick="Select_Table(this);" name="ambiente,environment,ambientes" style="cursor: pointer;">Ambiente<i class="material-icons">event_seat</i></a></li>
            </ul>
          </div>
        </li>
      </ul>            
    </li>            
    <li class="bold"><a onclick="Select_Table(this);" name="usuario,users,usuarios" class="waves-effect waves-teal" style="padding: 0 16px;cursor: pointer;">Usuarios<i class="material-icons">people</i></a></li>            
    <li class="bold"><a onclick="closesession();" class="waves-effect waves-teal" style="padding: 0 16px;cursor: pointer;">Cerrar Sesiòn<i class="material-icons">exit_to_app</i></a></li>
  </ul>
</header>
  <div class="row">     
    <div class="col l2">
    </div>
    <div class="col l10" style="text-align: center;">
      <div class="row">
        <div class="col l4">
          <img src="../../Content/Images/Banner color.png" alt="">
        </div>
        <div class="col l4"></div>
        <div class="col l4">
          <img src="../../Content/Images/Logo color.png" alt="">
        </div>        
      </div>
      <div class="row">
       <div id="Div_Agree" style="display:none"><button id="Btn_Agree" class="btn yellow darken-3 waves-effect waves-light">Crear</button></div>
      </div>
      <div class="row">
        <div id="div_tabla">
        </div>
      </div>            
    </div>
  </div>
  <div id="modal" name="modal" class="modal bottom-sheet">
    <div class="modal-content">      
      <iframe id="Modal_Iframe" frameborder="0" style="overflow:hidden;width:100%"></iframe>
    </div>   
  </div>        
<body>