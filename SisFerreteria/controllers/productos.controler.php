<?php
    class ProductosController{

        public function Index(){
        
            require_once 'views/layouts/dhead.php';
            require_once 'views/layouts/header.php';
            require_once 'views/listaproductos.php';
            require_once 'views/layouts/footer.php';
        }

        public function Index2(){
            require_once 'views/layouts/dhead.php';
            require_once 'views/layouts/header.php';
            require_once 'views/detalleproducto.php';
            require_once 'views/layouts/footer.php';
        }

    }


?>