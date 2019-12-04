<?php
    require_once dirname(__file__,2).'../models/usuario.php';    


    

    function Modificar(){
        $usuario=new Usuario();
        $comparar="";
        $usuario->idusuario =$_REQUEST['idusuario'];
        $usuario->nombre =$_REQUEST['nombre'];  
        $usuario->apellido =$_REQUEST['apellido'];
        $usuario->login =$_REQUEST['login'];
        $usuario->clave =$_REQUEST['clave'];
        $usuario->tipoUser =$_REQUEST['tipo_usuario'];         
        $usuarios=$usuario->Modificar($usuario);
        $comparar=json_decode(json_encode($usuario),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../views/core/usuario.php?success=true');
        }else{
            header('Location: ../views/core/usuario.php?error=true');
        }

    }

?>
