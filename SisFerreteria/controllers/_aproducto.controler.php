<?php

    require_once 'models/producto.php';    

   class _aproductoController{
    
    public function Index(){
        include_once "views/admin/administrador/agregarproducto.php";
    }

    public function Guardar(){
        echo var_dump($_POST);
        $producto = new Producto();
        $producto->nombre = $_POST['nombre'];
        $productos = $producto->Guardar($producto);




    }



   }

?>