<?php

    class _aloginController{
        
        public function loginadmin(){
            include_once "views/admin/loginadmin.php";
        }

        public function login(){
            require_once "views/admin/layout/ahead.php";
            require_once "views/admin/layout/header.php";
            require_once "views/admin/administrador/homeadmin.php";
            require_once "views/admin/layout/footer.php";
        }





    }


?>