<?php
    require_once './models/usuario.php';
    class _aloginController{
        public function __CONSTRUCT()
        {
            $this->model = new usuario();
        }
    
        public function loginadmin(){
            include_once "views/admin/loginadmin.php";
        }

        public function login(){
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
    
            if ($_SESSION['tipo_usuario'] == 2) {
                header('Location:?c=_homeadmin');
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