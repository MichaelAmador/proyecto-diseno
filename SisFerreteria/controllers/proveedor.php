<?php
    include dirname(__file__,2).'../models/proveedor.php';    

    
    if(isset($_REQUEST['nuevoProveedor'])){
        if(isset($_REQUEST)){
            Guardar();
        }else{
            header('Location: ../Views/core/proveedor.php?error=true');
        }

    }

    if(isset($_REQUEST['modificarProveedor'])){
        if(isset($_REQUEST)){
            Modificar();
        }else{
            header('Location: ../Views/core/proveedor.php?error=true');
        }

    }

    if(isset($_REQUEST['registrasolicitud'])){
       
        if(isset($_REQUEST)){
            GuardarS();
        }else{
            header('Location: ../Views/core/proveedor.php?error=true');
        }
    }

    function Guardar(){
        $proveedor=new Proveedor();
        $comparar="";
        $proveedor->nombre =$_REQUEST['nombre'];
        $proveedor->direccion =$_REQUEST['direccion'];
        $proveedor->telefono =$_REQUEST['telefono']; 
        $proveedor->web =$_REQUEST['web'];            
        $proveedors=$proveedor->Guardar($proveedor);
        $comparar=json_decode(json_encode($proveedor),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../Views/core/proveedor.php?success=true');
        }else{
            header('Location: ../Views/core/proveedor.php?error=true');
        }

    }

    function Modificar(){
        $proveedor=new Proveedor();
        $comparar="";
        $proveedor->idproveedor =$_REQUEST['idproveedor'];
        $proveedor->nombre =$_REQUEST['nombre'];
        $proveedor->direccion =$_REQUEST['direccion'];
        $proveedor->telefono =$_REQUEST['telefono']; 
        $proveedor->web =$_REQUEST['web'];          
        $proveedors=$proveedor->Modificar($proveedor);
        $comparar=json_decode(json_encode($proveedor),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../Views/core/proveedor.php?success=true');
        }else{
            header('Location: ../Views/core/proveedor.php?error=true');
        }

    }

?>
