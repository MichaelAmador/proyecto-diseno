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

        public function Ingresar(){
            $login = new Usuario();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
    
                    'usuario' => trim($_POST['usuario']),
                    'clave' => trim($_POST['clave']),
                ];
    
                $loggedInUser = $login->login($data['usuario'], $data['clave']);
    
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $popup = 'Usuario Incorrecto';
                    $this->CargarPagina($popup);
                }
            }
        }
     

    }
   
?>