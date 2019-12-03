<?php
    class ProductosController{

        public function Index(){
        
            require_once 'views/cliente/layouts/dhead.php';
            require_once 'views/cliente/layouts/header.php';
            require_once 'views/cliente/producto/listaproductos.php';
            require_once 'views/cliente/layouts/footer.php';
        }

        public function Index2(){
            require_once 'views/cliente/layouts/dhead.php';
            require_once 'views/cliente/layouts/header.php';
            require_once 'views/cliente/producto/detalleproducto.php';
            require_once 'views/cliente/layouts/footer.php';
        }

    }


?>