<?php
require_once './models/compras.php';
    class  _comprasController
    {
        private $cantidad="";
        private $nombre;
        private $precio;
        private $idproducto;
        private $subtotal;
        public function Index(){
            require_once 'views/admin/layout/ahead.php';
            require_once 'views/admin/layout/header.php';
            require_once 'views/admin/administrador/compras/agregarcompras.php';
            require_once 'views/admin/administrador/compras/detallecompras.php';
            require_once 'views/admin/layout/footer.php';
    
        }

  
       

        public function Agregar()
        {
            $this->model->cantidad = $_REQUEST['cantidad'];
    
            if ($this->model->cantidad > 0) {
                $this->model->idproducto = $_REQUEST['txtidproducto'];
                $this->model->nombre = $_REQUEST['txtnombre'];
                $this->model->precio = $_REQUEST['txtprecio'];
                $this->model->subtotal = $_REQUEST['txtprecio'] * $_REQUEST['cantidad'];
    
              //  $s = new Solicitud();
    
                session_start();
    
                if (isset($_SESSION['carrito'])) {
                    $carrito = $_SESSION['carrito'];
                } else {
                    $carrito = array();
                }
    
                $sumaCantidad = 0;
                foreach ($carrito as $prod) {
                    if ($prod->idproducto == $this->model->idproducto) {
                        $sumaCantidad += $prod->cantidad;
                    }
                }
                $sumaCantidad += $this->model->cantidad;
    
                if ($this->model->cantidad <= $sumaCantidad) {
                    array_push($carrito,  $this->model);
                    $_SESSION['carrito'] = $carrito;
                    echo var_dump($carrito);
                    
                   header('location:?c=_compras');
                } else {
                   // header('location:?c=carrito&m=1');
                   
                   
                }
            } else {
                //header('location:?c=_compras&a=Index&m=2');
                
            }
        }
        
        public function Comprar(){
            session_start();
            $carrito = $_SESSION['carrito'];
            $iduser = $_SESSION['idusuario'];
            $carrito2 = $carrito;
            $compra = new Compras();
            $compra->descuento=$_POST['descuento'];
            $compra->Subtotal=$_POST['total'];
            $compra->total = $_POST['total'] - $_POST['descuento'];
            $compra->fecha= $_POST['fechacompra'];
            $compra->idusuario=$iduser;
            $compra->idproveedor= $_POST['proveedor'];

            
            $detallecompra = new Compras();
            echo var_dump($compra);
            echo var_dump($carrito2);
            $detallecompra->Registrar($carrito2,$compra);
            
            $_SESSION['carrito']=null;
            header('location:?c=_compras&a=Index');


        }

        public function Quitar(){

            $index = $_GET['i'];
        session_start();

        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            unset($carrito[$index]);
            $carrito = array_values($carrito);
            $_SESSION['carrito'] = $carrito;
            
            if (count($carrito) == 0) {
                session_unset($carrito);
            }
        }
        header('location:?c=_compras&a=Index');

        }



    }
    
    


?>