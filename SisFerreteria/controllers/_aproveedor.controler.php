<?php

    require_once dirname(__file__,2).'../models/proveedor.php';      

   class _aproveedorController{
    
    public function Index(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/proveedor/agregarproveedor.php";
        require_once "views/admin/layout/footer.php";
    }
    public function editproveedor(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/proveedor/editarproveedor.php";
        require_once "views/admin/layout/footer.php";
    }
    public function Ver(){
        require_once "views/admin/layout/ahead.php";
        require_once "views/admin/layout/header.php";
        require_once "views/admin/administrador/proveedor/alistarproveedores.php";
        require_once "views/admin/layout/footer.php";
    }
    
    public function Guardar(){
        echo var_dump($_POST);
        $proveedor = new Proveedor();
        $proveedor->nombre = $_POST['nombre'];
        $proveedor->direccion = $_POST['direccion'];
        $proveedor->telefono = $_POST['telefono'];
        $proveedor->web = $_POST['web'];
        $proveedors = $proveedor->Guardar($proveedor);
    }

    public function Editar(){
        $proveedor = new Proveedor();
        $proveedor->idproveedor = $_POST['idproveedor'];
        $proveedor->nombre = $_POST['nombre'];
        $proveedor->direccion = $_POST['direccion'];
        $proveedor->telefono = $_POST['telefono'];
        $proveedor->web = $_POST['web'];
        $proveedors = $proveedor->Modificar($proveedor);
        
        //header('Location:?c=_aproveedor&a=Ver');
    }


   }

?>