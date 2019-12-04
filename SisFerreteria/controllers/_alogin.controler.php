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

        public function Login(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
    
                    'usuario' => trim($_POST['user']),
                    'clave' => trim($_POST['pass']),
                ];
    
                $loggedInUser = $this->model->login($data['usuario'], $data['clave']);
    
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
        
                    $this->CargarPagina();
                }
            }
        }

        public function createUserSession($user)
        {
            session_start();
            $usuarioactivo = $user->login;
            $rol = $user->tipo_usuario;
            $idusuario = $user->idUsuario;
            $_SESSION['usuario'] = $usuarioactivo;
            $_SESSION['tipo_usuario'] = $rol;
            $_SESSION['idusuario'] = $idusuario;
    
            if ($_SESSION['tipo_usuario'] == 1) {
                header('Location:?c=_admin');
            }  elseif($_SESSION['tipo_usuario'] == 2){
                header('Location:?c=_admin');
            }
            echo var_dump($user);
        }
        public function CargarPagina()
        {
            require_once('views/admin/loginadmin.php');
        }





    }


?>