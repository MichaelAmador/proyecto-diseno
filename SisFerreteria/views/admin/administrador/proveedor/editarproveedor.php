<?php
        require_once './models/proveedor.php';
               
        $idpro="";
        $idpro=$_REQUEST['verprov'];
        $proveedor = new Proveedor();
        $proveedors = $proveedor->DetalleProveedor($idpro);        
        $array=json_decode(json_encode($proveedors),true);
        echo var_dump($array);
        
?>
  </head>
      <title>Edicion de proveedores</title>
  </head>
  
  <div class="contenedor_principal">
    <h2>Editar proveedor<i class="fas fa-box"></i></h2>
    <form action="?c=_aproveedor&a=Editar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="" value="<?php echo $array['0']['nombre'] ?>">
            <input type="text" name="direccion" id="" value="<?php echo $array['0']['direccion'] ?>">
            <input type="text" name="telefono" id="" value="<?php echo $array['0']['telefono'] ?>">            
            
            <button type="submit">Registrar</button>
            <input type="hidden" name="idproveedor" value="<?php echo $array['0']['idProveedor'] ?>">

        </div>
    </form>

</div>