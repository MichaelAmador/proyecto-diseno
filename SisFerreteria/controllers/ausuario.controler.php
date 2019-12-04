<?php
    require_once dirname(__file__,2).'../models/usuario.php';    
    class AusuarioController{
        public function nuevousuario(){
            require_once "views/admin/layout/ahead.php";
            require_once "views/admin/layout/header.php";
            require_once "views/admin/administrador/usuarios/agregarusuario.php";
            require_once "views/admin/layout/footer.php";
        }


        public function Guardar(){
            $usuario=new Usuario();
            $comparar="";
            $usuario->nombre =$_REQUEST['nombre'];
            $usuario->apellido =$_REQUEST['apellido'];
            $usuario->usuario=$_REQUEST['login'];
            $usuario->clave =$_REQUEST['clave'];
            $usuario->tipoUser =$_REQUEST['tipo_usuario'];             
            $usuarios=$usuario->Guardar($usuario);
            $comparar=json_decode(json_encode($usuarios),true);
            echo var_dump($comparar);
            header('Location:?c=ausuario&a=nuevousuario');
           
    
        }
    }
        

    

    

 

?>
