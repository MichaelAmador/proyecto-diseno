<?php
    require_once './models/usuario.php';
    class LoginController{
       
        public function Index(){
            require_once "views/cliente/login.php";
        }

        public function registrarse(){
            require_once "views/cliente/registrar.php";
        }
       
        public function Registro(){
            $user = new usuario();
            $tipousuario=3;
            $user->nombre=$_POST['nombre'];
            $user->apellido=$_POST['apellido'];
            $user->login=$_POST['usuario'];
            $user->clave=$_POST['pass'];
            $user->tipoUser=$tipousuario;
            $usuario=$user->Guardar($user);
            echo var_dump($user);
            header('Location:?c=login&a=registrarse&success=true');
            

        }
     

    }
   
?>