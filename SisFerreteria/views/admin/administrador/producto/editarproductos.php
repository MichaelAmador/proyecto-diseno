<?php
        require_once './models/producto.php';
        require_once './././models/categoria.php';
        require_once './././models/marca.php';
        $marca= new Marca();
        $marcas=$marca->listar();
        $categoria= new Categoria();
        $categorias=$categoria->listar();
        $idpro="";
        $nombre="";
        $precio="";
        if(isset($_REQUEST['verprod'])){
        $idpro=$_REQUEST['verprod'];
        $producto = new Producto();
        $productos = $producto->listardetalle($idpro);
        $array=json_decode(json_encode($productos),true);
        $nombre = $array['0']['Producto'];
        $precio = $array['0']['precio'];
    }
       
?>
  </head>
      <title>Edicion de Productos</title>
  </head>
  
  <div class="contenedor_principal">
    <h2>Editar Producto<i class="fas fa-box"></i></h2>
    <form action="?c=_aproducto&a=Editar" method="post" enctype="multipart/form-data">
        <div class="formulario">

            <input type="text" name="nombre" id="" value="<?php echo $nombre ?>">
            <select name="marca" id="">
                <?php foreach($marcas as $r): ?>
                <option value="<?php echo $r->idmarca ?>"><?php echo $r->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="precio" id="" value="<?php echo $precio ?>">

            <input type="File" name="productoimagen" id="productoimagen">

            <select name="categoria" id="" >
                <?php foreach($categorias as $colum): ?>
                <option value="<?php echo $colum->idcategoria ?>"><?php echo $colum->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Registrar</button>
            <input type="hidden" name="idproducto" value="<?php echo $idpro ?>">


        </div>
    </form>

</div>