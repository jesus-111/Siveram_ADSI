<?php
class sesion{    
    public function opensession($user){        
        session_start();
        $_SESSION["usuario"]=$user;
    }
    public function closesession(){
        session_start();
        unset($_SESSION["usuario"]);
    }    
}
?>