<?php
    require_once 'models/usuario.php';
    class LoginController{
       
        public function Index(){
            require_once "views/cliente/login.php";
        }

        public function registrarse(){
            include_once "views/cliente/registrar.php";
        }
       
        public function Registrar(){

        }
     

    }
   
?>