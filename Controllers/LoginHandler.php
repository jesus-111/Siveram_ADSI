<?php
$Data =  explode(",", $_POST['data']);
require_once ('../Controllers/Session.php');
$sesion = new sesion();
if(count($Data) > 1)
{
    require_once ('../Data/m_usuario.php');
    $entity = new usuario();
    $getus = 'get_usuario';
    $lista = $entity->$getus();
    $arr = explode(",", $lista);
    $params = "";
    for ($a=0; $a < (count($arr)+1) ; $a++) { 
        if ($a < count($Data)) {
            $params .= $Data[$a].',';
        }
        if ($a >= count($Data)) {
            if ($a < (count($arr))) {
                $params .= '0,';    
            }else {
                $params .= '0';
            }  
        }           
    }
    require_once ('../Controllers/usuario.php');
    $Users = new Users();
    $menssaje = "";
}
switch (count($Data)) {
    case 1:       
        $abrirsesion = $sesion->closesession();
        $menssaje = "Sesión cerrada";
        break;
    case 2:
        session_start();
        $user = $_SESSION["usuario"];
        $params = ",";
        break;
    case 3:
        $datausers = $Users->Usuarios(1,5,$params);
        if (count($datausers)>0) {
            if ($datausers[0][0] == $Data[0]) {
                 if ($datausers[0][2] == $Data[2]) {
                     if($datausers[0][13] != '0'){
                        $abrirsesion = $sesion->opensession($datausers);
                        $menssaje = "1/Bienvenido/" . $datausers[0][9]."/".$datausers[0][3]." ".$datausers[0][4].",".$datausers[0][10].",".$datausers[0][1];
                     }else{
                        $menssaje =  "5/Usuario Inhabilitado";
                     }                    
                }else {
                    $menssaje =  "2/Contraseña Incorrecta";
                }
            }else {
                $menssaje =  "3/tipo de documento erroneo";
            }
        }else{
            $menssaje = "4/El usuario no existe";
        }        
        break;
    case 14:
        $datausers = $Users->Usuarios(1,1,$params);
        if (count($datausers)==0) {
            $menssaje = "El usuario ha sido Creado";
        }else{
            $menssaje ='EXISTE';
        }
        break;
}
echo $menssaje;  
?>