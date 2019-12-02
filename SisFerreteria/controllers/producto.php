<?php
    include dirname(__file__,2).'../models/producto.php';    

    
    if(isset($_REQUEST['nuevoProducto'])){
        if(isset($_REQUEST)){
            Guardar();
        }else{
            header('Location: ../Views/core/producto.php?error=true');
        }

    }

    if(isset($_REQUEST['modificarProducto'])){
        if(isset($_REQUEST)){
            Modificar();
        }else{
            header('Location: ../Views/core/producto.php?error=true');
        }

    }

    if(isset($_REQUEST['registrasolicitud'])){
       
        if(isset($_REQUEST)){
            GuardarS();
        }else{
            header('Location: ../Views/core/producto.php?error=true');
        }
    }

    function GuardarS(){
        $solicitud = new Cita();
        $solicituds = $solicitud;
        $comparar="";
        $solicitud->cedula = $_REQUEST['idsolicitante'];
        $solicitud->nombre = $_REQUEST['solicitante'];
        $solicitud->numerocontrato = $_REQUEST['numcontrato'];
        $solicitud->motivo = $_REQUEST['motivocita'];
        $solicituds=$solicitud->Guardar($solicitud);
        $comparar=json_decode(json_encode($solicituds),true);
        if($comparar['0']['salida']=='1'){
           header('Location: ../Views/core/producto.php?success=true');
        }else{
           header('Location: ../Views/core/producto.php?error=true');
        }
       }

    function Guardar(){
        $producto=new Producto();
        $comparar="";
        $producto->nombre =$_REQUEST['nombre'];
        $producto->marca =$_REQUEST['marca'];
        $producto->precio =$_REQUEST['precio']; 
        $producto->imagen =$_REQUEST['imagen']; 
        $producto->categoria =$_REQUEST['categoria'];        
        $productos=$producto->Guardar($producto);
        $comparar=json_decode(json_encode($producto),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../Views/core/producto.php?success=true');
        }else{
            header('Location: ../Views/core/producto.php?error=true');
        }

    }

    function Modificar(){
        $producto=new Producto();
        $comparar="";
        $producto->idproducto =$_REQUEST['idproducto'];
        $producto->nombre =$_REQUEST['nombre'];
        $producto->marca =$_REQUEST['marca'];
        $producto->precio =$_REQUEST['precio']; 
        $producto->imagen =$_REQUEST['imagen']; 
        $producto->categoria =$_REQUEST['categoria'];         
        $productos=$producto->Modificar($producto);
        $comparar=json_decode(json_encode($producto),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../Views/core/producto.php?success=true');
        }else{
            header('Location: ../Views/core/producto.php?error=true');
        }

    }

?>
