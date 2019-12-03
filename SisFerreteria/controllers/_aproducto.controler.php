<?php

    require_once dirname(__file__,2).'../models/producto.php';      

   class _aproductoController{
    
    public function Index(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/producto/agregarproducto.php";
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

        $file=$_FILES['productoimagen'];
        $nombre_file=$file['name'];
        $nombre_ruta_provisional=$file['tmp_name'];
        $type=$file["type"];

        $ruta_producto= "./assets/public/productos/".$nombre_file;
        
        if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg" || $type=="video/mp4"){
            
            $rstm=move_uploaded_file($nombre_ruta_provisional,$ruta_producto);
                if($rstm=1){
                $response=$producto->Guardar($producto,$ruta_producto);
                $response =$response[0];
                    if($response[0]=="1"){
                        echo("Insertado");
                    }else{
                        echo ("No Insertado");
                    }
                // }elseif($response[0]==""){
                // 	echo("Inserte archivo con extensión .png, .jpg, jpeg");
                    
                // 	}
                }
        }else{
            
            echo("Inserte imagen con extensión .png, .jpg, jpeg (".$type);
        }
        



        // $productos = $producto->Guardar($producto);
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