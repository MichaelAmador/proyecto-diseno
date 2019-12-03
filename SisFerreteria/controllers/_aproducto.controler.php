<?php

    require_once dirname(__file__,2).'../models/producto.php';      

   class _aproductoController{
    
    public function Index(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/producto/agregarproductos.php";
        require_once "views/admin/layout/footer.php";
    }
    public function editproducto(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/producto/editarproductos.php";
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
        $producto->precio = $_POST['precio'];
        $productos = $producto->Guardar($producto);

    }

    public function Editar(){
        $producto = new Producto();
        $producto->idproducto = $_POST['idproducto'];
        $producto->nombre = $_POST['nombre'];
        $producto->precio = $_POST['precio'];
        $productos = $producto->Modificar($producto);
        echo var_dump($productos);
        //header('Location:?c=_aproducto&a=Ver');
    }


   }

?>