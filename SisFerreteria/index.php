<?php
   $controlador = "index";

   if(!isset($_REQUEST['c'])){
       require_once "controllers/$controlador.controler.php";
       $controlador = ucwords($controlador).'Controller';
       $controlador = new $controlador;
       $controlador->Index();
   }else{
        $controlador = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        require_once "controllers/$controlador.controler.php";
        $controlador = ucwords($controlador).'Controller';
        $controlador = new $controlador;

        call_user_func (array($controlador,$accion));
   }

?>