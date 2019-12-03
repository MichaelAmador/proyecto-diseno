<?php
    require_once dirname(__file__,2).'../models/marca.php';    

    
    if(isset($_REQUEST['nuevaMarca'])){
        if(isset($_REQUEST)){
            Guardar();
        }else{
            header('Location: ../views/core/marca.php?error=true');
        }

    }

    if(isset($_REQUEST['modificarMarca'])){
        if(isset($_REQUEST)){
            Modificar();
        }else{
            header('Location: ../views/core/marca.php?error=true');
        }

    }

    if(isset($_REQUEST['registrasolicitud'])){
       
        if(isset($_REQUEST)){
            GuardarS();
        }else{
            header('Location: ../views/core/marca.php?error=true');
        }
    }   

    function Guardar(){
        $marca=new Marca();
        $comparar="";
        $marca->nombre =$_REQUEST['nombre'];             
        $marcas=$marca->Guardar($marca);
        $comparar=json_decode(json_encode($marca),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../views/core/marca.php?success=true');
        }else{
            header('Location: ../views/core/marca.php?error=true');
        }

    }

    function Modificar(){
        $marca=new Marca();
        $comparar="";
        $marca->idmarca =$_REQUEST['idmarca'];
        $marca->nombre =$_REQUEST['nombre'];           
        $marcas=$marca->Modificar($marca);
        $comparar=json_decode(json_encode($marca),true);
        if($comparar['0']['resultado']=='1'){
            header('Location: ../views/core/marca.php?success=true');
        }else{
            header('Location: ../views/core/marca.php?error=true');
        }

    }

?>
