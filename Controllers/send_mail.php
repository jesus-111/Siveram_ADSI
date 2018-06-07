<?php
$mail =  $_POST['data'];
$params = "0,0,0,0,0,0,0,0,0,0,".$mail.",0,0,0,0";

require_once ('../Controllers/usuario.php');
$Users = new Users();
$menssaje = "";
$datausers = $Users->Usuarios(1,8,$params);

if($datausers > 0)
{
    require_once ("./class.phpmailer.php");
    $body = "La siguiente informacion se envia al email registrado por el usuario: ".$datausers[0][2]." Contraseña: ".$datausers[0][12]; 
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";      
    $mail->Host = "mail.smtp2go.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $mail->Port = "2525"; // Puerto de conexión al servidor de envio. 
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'SSL';  
    $mail->Username = "javier7m@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $mail->Password = "Jav80808565"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo    
    $mail->MsgHTML($body);
    $mail->From = "javier7m@gmail.com"; // A RELLENAR Desde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
    $mail->FromName = $datausers[0][2]; //A RELLENAR Nombre a mostrar del remitente. 
    $mail->AddAddress($datausers[0][9],''); // Esta es la dirección a donde enviamos 
    $mail->Subject = 'Envio de Password'; // Este es el titulo del email.         
    $mail->Body = ($body);
    $mail->WordWrap = 50;
    if($mail->Send())
    { 
        echo 'El correo fue enviado correctamente.'; 
    }else{ 
        echo 'Hubo un problema. Contacta a un administrador.'; 
    };
}else{
    echo 'El correo no existe en la base de datos.'; 
}
?>