<?php

    require_once dirname(__file__,2).'../models/producto.php';      

   class _aproductoController{
    
    public function Index(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/producto/agregarproducto.php";
        require_once "views/admin/layout/footer.php";
    }
    public function Ver(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/producto/alistarproductos.php";
        require_once "views/admin/layout/footer.php";
    }
    public function Guardar(){
        echo var_dump($_POST);
        $producto = new Producto();
        $producto->nombre = $_POST['nombre'];
        $productos = $producto->Guardar($producto);




    }



   }

?>