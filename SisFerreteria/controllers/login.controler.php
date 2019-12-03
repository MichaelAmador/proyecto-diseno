<?php
    require_once './models/usuario.php';
    class LoginController{
       
        public function __CONSTRUCT()
        {
            $this->model = new usuario();
        }
    

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
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
    
                    'usuario' => trim($_POST['usuario']),
                    'clave' => trim($_POST['clave']),
                ];
    
                $loggedInUser = $this->model->login($data['usuario'], $data['clave']);
    
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $popup = 'Usuario Incorrecto';
                    $this->CargarPagina($popup);
                }
            }
        }

        public function createUserSession($user)
        {
            session_start();
            $usuarioactivo = $user->login;
            $rol = $user->tipo_usuario;
    
            $_SESSION['usuario'] = $usuarioactivo;
            $_SESSION['tipo_usuario'] = $rol;
    
            if ($_SESSION['tipo_usuario'] == 3) {
                header('Location:?c=index');
            }  else{
                header('Location:?c=login');
            }
            echo var_dump($user);
        }
        public function CargarPagina()
        {
            require_once('View/login/login.php');
        }
    }
     
   
?>