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

        if(is_uploaded_file($_FILES['productoimagen']['tmp_name'])){
            $file=$_FILES['productoimagen'];
           
            $ruta="./assets/public/productos/";

            $nombre_final= trim ($file['name']);
            // $nombre_final= preg_replace (" ","",$nombre_final);
            
            $upload =$ruta.$nombre_final;
            
            $type=$file['type']; // Tipo de extensión de la imagen

            $producto->ruta_imagen=$ruta.$nombre_final; //ruta con el nombre de la imagen
            
            
            $producto->nombre_imagen=$nombre_final;//Nombre del archivo con la extensión

            // echo "<br/>".$ruta."<br>";
            
             if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
            
                if (move_uploaded_file($file['tmp_name'],$upload)) {
                    // echo "<b> Registro exitoso!. Datos:</b> <br/>";
                    // echo $file['name']."<br/>";
                    // echo $file['type'].": Nombre<br/>";
                    // echo $file['size']; // Unidad de medida en byte
                    if ($file['size']<2097152) {
                        $response=$producto->Guardar($producto);
                        if ($response[0]==1)
                            echo "Registro exitoso";
                        else
                            echo "Error al cargar el registro, intente nuevamente";

                    }else{
                        echo "El archivo sobrepasa el tamaño máximo permitido";
                    }
                }
            }else{
                echo "Tipo de archivo no valido, tiene que ser de tipo png, jpg, jpeg";
            }

        }

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