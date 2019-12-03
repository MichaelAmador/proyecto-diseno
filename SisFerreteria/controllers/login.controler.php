<?php
    class LoginController{
       
        public function Index(){
            include_once "views/cliente/login.php";
        }

        public function registrarse(){
            include_once "views/cliente/registrar.php";
        }
       

        public function loginadmin(){
            include_once "views/admin/loginadmin.php";
        }

    }
   
?>