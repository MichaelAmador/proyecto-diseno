<?php
        require_once './././models/proveedor.php';        
        $idpro="";
        $array="";
        $nombre="";
        $direccion="";
        $telefono="";
        $web="";
        if(isset($_REQUEST)){
            $idpro=$_REQUEST['verprov'];
            $proveedor = new Proveedor();
            $proveedors = $proveedor->DetalleProveedor($idpro);
            $array=json_decode(json_encode($proveedors),true);
            $nombre = $array['0']['nombre'];
            $direccion = $array['0']['direccion'];
            $telefono = $array['0']['telefono'];
            $web = $array['0']['web'] ;
        }      
        $array=json_decode(json_encode($proveedors),true);
        
?>
  </head>
      <title>Edicion de proveedores</title>
  </head>
  
  <div class="contenedor_principal">
    <h2>Editar proveedor<i class="fas fa-box"></i></h2>
    <form action="?c=_aproveedor&a=Editar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="" placeholder="Nombre de Proveedor" value="<?php echo $nombre;?>">
            <input type="text" name="direccion" id="" placeholder="Direccion"value="<?php echo $direccion;?>">
            <input type="text" name="telefono" id="" placeholder="Telefono"value="<?php echo $telefono; ?>">            
            <input type="text" name="web" placeholder="Web del proveedor"  id="" value="<?php echo $web; ?>">
            <button type="submit">Registrar</button>
            <input type="hidden" name="idproveedor" value="<?php echo $idpro ?>">

        </div>
    </form>

</div>