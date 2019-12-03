<?php
    class IndexController{

        public function Index(){
            require_once 'views/cliente/layouts/dhead.php';
            require_once 'views/cliente/layouts/header.php';
            require_once 'views/cliente/home.php';
            require_once 'views/cliente/layouts/footer.php';

        }

            public function Cerrar()
        {
            session_start();
            session_unset();
            session_destroy();
            header('Location:?c=index');
        }









    }

?>