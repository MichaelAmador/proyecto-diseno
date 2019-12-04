<?php
require_once './models/compras.php';
    class  _comprasController
    {
        public function Index(){
            require_once 'views/admin/layout/ahead.php';
            require_once 'views/admin/layout/header.php';
            require_once 'views/admin/administrador/compras/agregarcompras.php';
            require_once 'views/admin/administrador/compras/detallecompras.php';
            require_once 'views/admin/layout/footer.php';
    
        }

        public function Agregar()
        {
    
            $this->model->Cantidad = $_REQUEST['cantidad'];
    
            if ($this->model->Cantidad > 0) {
                $this->model->IdMed = $_REQUEST['TxtIdMedicamento'];
                $this->model->Nombre = $_REQUEST['TxtNombre'];
                $this->model->Precio = $_REQUEST['TxtPrecio'];
                $this->model->Stock = $_REQUEST['TxtStock'];
                $this->model->Subtotal = $_REQUEST['TxtPrecio'] * $_REQUEST['TxtCantidad'];
    
                $s = new Solicitud();
    
                session_start();
    
                if (isset($_SESSION['carrito'])) {
                    $carrito = $_SESSION['carrito'];
                } else {
                    $carrito = array();
                }
    
                $sumaCantidad = 0;
                foreach ($carrito as $med) {
                    if ($med->IdMed == $this->model->IdMed) {
                        $sumaCantidad += $med->Cantidad;
                    }
                }
                $sumaCantidad += $this->model->Cantidad;
    
                if ($this->model->Stock >= $sumaCantidad) {
                    array_push($carrito,  $this->model);
                    $_SESSION['carrito'] = $carrito;
    
                   // header('location:?c=carrito');
                } else {
                   // header('location:?c=carrito&m=1');
                }
            } else {
                //header('location:?c=_compras&a=Index&m=2');
                var_dump[$_REQUEST];
            }
        }




    }
    
    


?>